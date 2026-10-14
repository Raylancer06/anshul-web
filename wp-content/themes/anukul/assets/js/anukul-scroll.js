/**
 * ANUKUL Ayur Vastu Harmony Clinic — Safe & Non-Destructive Scroll Engine
 * Health • Space • Lifestyle • Harmony
 */

(function () {
  'use strict';

  function initScrollEngine() {
    // Mark JS enabled
    document.documentElement.classList.add('js-enabled');

    // 1. Top Reading / Scroll Progress Bar
    let progressBar = document.getElementById('anukul-scroll-progress');
    if (!progressBar) {
      progressBar = document.createElement('div');
      progressBar.id = 'anukul-scroll-progress';
      document.body.prepend(progressBar);
    }

    // 2. Floating Back to Top Button
    let backToTop = document.getElementById('anukul-back-to-top');
    if (!backToTop) {
      backToTop = document.createElement('button');
      backToTop.id = 'anukul-back-to-top';
      backToTop.type = 'button';
      backToTop.setAttribute('aria-label', 'Return to top of sanctuary');
      backToTop.innerHTML = `
        <svg class="progress-ring" viewBox="0 0 44 44">
          <circle class="progress-ring-circle" cx="22" cy="22" r="19" stroke-dasharray="119.38" stroke-dashoffset="119.38"></circle>
        </svg>
        <span class="material-symbols-outlined text-[20px]" style="position:relative; z-index:2;">arrow_upward</span>
      `;
      document.body.appendChild(backToTop);

      backToTop.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }

    const circle = backToTop.querySelector('.progress-ring-circle');
    const circumference = 2 * Math.PI * 19; // ~119.38
    const header = document.querySelector('header');

    // Throttled Scroll Handler
    let isTicking = false;
    function handleScroll() {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
      const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      const progress = scrollHeight > 0 ? (scrollTop / scrollHeight) : 0;

      // Update progress bar
      if (progressBar) {
        progressBar.style.width = (progress * 100) + '%';
      }

      // Update Back to Top button
      if (backToTop && circle) {
        if (scrollTop > 300) {
          backToTop.classList.add('visible');
          const offset = circumference - (progress * circumference);
          circle.style.strokeDashoffset = Math.max(0, offset);
        } else {
          backToTop.classList.remove('visible');
        }
      }

      // Header shadow enhancement
      if (header) {
        if (scrollTop > 24) {
          header.classList.add('header-scrolled');
        } else {
          header.classList.remove('header-scrolled');
        }
      }

      isTicking = false;
    }

    window.addEventListener('scroll', function () {
      if (!isTicking) {
        window.requestAnimationFrame(handleScroll);
        isTicking = true;
      }
    }, { passive: true });
    handleScroll();

    // 3. Smooth Anchor Click Scroll (only for valid in-page hash links)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        const hash = this.getAttribute('href');
        if (!hash || hash === '#' || hash.startsWith('#tab-')) return;
        
        const target = document.querySelector(hash);
        if (target) {
          e.preventDefault();
          const headerOffset = 84;
          const targetY = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
          window.scrollTo({
            top: Math.max(0, targetY),
            behavior: 'smooth'
          });
        }
      });
    });

    // 4. Safe Fade-In for explicitly tagged elements only
    const fadeElements = document.querySelectorAll('.anukul-fade-in');
    if (fadeElements.length > 0 && 'IntersectionObserver' in window) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.remove('pending-reveal');
            entry.target.classList.add('revealed');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.1 });

      fadeElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
          el.classList.add('revealed');
        } else {
          el.classList.add('pending-reveal');
          observer.observe(el);
        }
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initScrollEngine);
  } else {
    initScrollEngine();
  }
})();

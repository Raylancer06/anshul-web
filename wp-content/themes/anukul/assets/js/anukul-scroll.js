/**
 * ANUKUL Ayur Vastu Harmony Clinic — Global Premium Motion & Scroll Engine
 * Health • Space • Lifestyle • Harmony
 *
 * Implements:
 * - Scroll-triggered section reveals with IntersectionObserver
 * - Staggered card grid animations
 * - Reading progress indicator & Back-to-Top circular widget
 * - Modal & drawer focus / escape-key management
 * - WooCommerce AJAX animation refresher (window.AnukulMotion)
 */

(function () {
  'use strict';

  let revealObserver = null;

  function initRevealEngine() {
    if (!('IntersectionObserver' in window)) {
      document.querySelectorAll('.anukul-reveal, .anukul-fade-up, .anukul-fade-in, .anukul-scale-in, .anukul-stagger > *')
        .forEach(el => el.classList.add('revealed'));
      return;
    }

    if (!revealObserver) {
      revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.remove('pending-reveal');
            entry.target.classList.add('revealed');
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.08,
        rootMargin: '0px 0px -30px 0px'
      });
    }

    const revealTargets = document.querySelectorAll('.anukul-reveal, .anukul-fade-up, .anukul-fade-in, .anukul-scale-in, .anukul-stagger > *');
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;

    revealTargets.forEach(el => {
      if (el.classList.contains('revealed')) return;

      const rect = el.getBoundingClientRect();
      if (rect.top < windowHeight * 0.95 && rect.bottom > 0) {
        // Element is already in the viewport upon arrival
        el.classList.add('revealed');
      } else {
        el.classList.add('pending-reveal');
        revealObserver.observe(el);
      }
    });
  }

  function initScrollEngine() {
    // 1. Mark JavaScript enabled
    document.documentElement.classList.add('js-enabled');

    // 2. Reading / Scroll Progress Bar
    let progressBar = document.getElementById('anukul-scroll-progress');
    if (!progressBar) {
      progressBar = document.createElement('div');
      progressBar.id = 'anukul-scroll-progress';
      document.body.prepend(progressBar);
    }

    // 3. Floating Back to Top Button
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
        <span class="material-symbols-outlined notranslate text-[20px]" translate="no" style="position:relative; z-index:2;">arrow_upward</span>
      `;
      document.body.appendChild(backToTop);

      backToTop.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }

    const circle = backToTop.querySelector('.progress-ring-circle');
    const circumference = 2 * Math.PI * 19; // ~119.38
    const header = document.getElementById('site-header') || document.querySelector('header');

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
        if (scrollTop > 280) {
          backToTop.classList.add('visible');
          const offset = circumference - (progress * circumference);
          circle.style.strokeDashoffset = Math.max(0, offset);
        } else {
          backToTop.classList.remove('visible');
        }
      }

      // Header shadow enhancement
      if (header) {
        if (scrollTop > 20) {
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

    // 4. Smooth Anchor Click Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        const hash = this.getAttribute('href');
        if (!hash || hash === '#' || hash.startsWith('#tab-')) return;
        
        const target = document.querySelector(hash);
        if (target) {
          e.preventDefault();
          const headerOffset = 90;
          const targetY = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
          window.scrollTo({
            top: Math.max(0, targetY),
            behavior: 'smooth'
          });
        }
      });
    });

    // 5. Global Escape Key & Modal Focus Listener
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' || e.keyCode === 27) {
        // Quick view modal
        const qvModal = document.getElementById('quick-view-modal');
        if (qvModal && !qvModal.classList.contains('hidden')) {
          qvModal.classList.add('hidden');
          document.body.style.overflow = '';
        }

        // Image inspect modal
        const imgModal = document.getElementById('image-modal');
        if (imgModal && !imgModal.classList.contains('hidden')) {
          imgModal.classList.add('hidden');
          document.body.style.overflow = '';
        }

        // Language dropdown
        const langDropdown = document.getElementById('anukul-lang-dropdown');
        if (langDropdown && !langDropdown.classList.contains('hidden')) {
          langDropdown.classList.add('hidden');
        }

        // Mobile menu drawer
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileIcon = document.getElementById('mobile-menu-icon');
        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
          if (mobileIcon) mobileIcon.textContent = 'menu';
          document.body.style.overflow = '';
        }
      }
    });

    // 6. Mobile drawer scroll lock enhancement
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileBtn && mobileMenu) {
      mobileBtn.addEventListener('click', function () {
        setTimeout(function () {
          if (!mobileMenu.classList.contains('hidden')) {
            document.body.style.overflow = 'hidden';
          } else {
            document.body.style.overflow = '';
          }
        }, 50);
      });
    }

    // 7. Initialize reveal observer
    initRevealEngine();
  }

  // Expose global controller for WooCommerce & dynamic content
  window.AnukulMotion = {
    refresh: initRevealEngine
  };

  // Listen to WooCommerce jQuery events if present
  if (window.jQuery) {
    window.jQuery(document).on('updated_cart_totals added_to_cart updated_checkout', function () {
      initRevealEngine();
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initScrollEngine);
  } else {
    initScrollEngine();
  }
})();

<?php
/**
 * Login Form
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="flex flex-col w-full">
<!-- Sub-navigation & Sacred Axis Breadcrumbs -->
<section class="w-full bg-surface-bright py-space-sm">
<div class="max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm">
<nav aria-label="Breadcrumb" class="flex items-center gap-space-xs tracking-wider">
<a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( "/" ) ); ?>">Home</a>
<span class="opacity-40">/</span>
<a class="hover:text-primary transition-colors" data-path="account" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>">My Account</a>
<span class="opacity-40">/</span>
<span aria-current="page" class="text-primary font-medium">Login</span>
</nav>
<div class="hidden sm:flex items-center gap-space-xs font-label-sm text-label-sm uppercase tracking-[0.2em] text-secondary">
<span class="inline-block w-1.5 h-1.5 rounded-full bg-secondary"></span>
        Ishanya Portal • SSL 256-Bit Encrypted
      </div>
</div>
</section>
<!-- Main Sanctuary Authentication Module -->
<section class="w-full py-space-lg lg:py-space-xl">
<div class="max-w-5xl mx-auto px-6 lg:px-12">
<!-- Interactive State Controller (Design System Showcase) -->
<div class="mb-space-md p-space-xs bg-surface-container-high rounded-lg flex flex-wrap items-center justify-between gap-space-sm text-on-surface">
<div class="flex items-center gap-space-xs px-space-xs">
<span class="material-symbols-outlined text-[18px] text-primary">tune</span>
<span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Portal State Demo:</span>
</div>
<div class="flex items-center gap-1.5">
<button class="px-3 py-1.5 rounded text-xs font-label-md uppercase tracking-wider bg-surface-container-lowest text-primary shadow-sm font-semibold transition-all" id="btn-state-normal" type="button">
            Default State
          </button>
<button class="px-3 py-1.5 rounded text-xs font-label-md uppercase tracking-wider bg-transparent text-on-surface-variant hover:text-on-surface transition-all" id="btn-state-error" type="button">
            Validation Error
          </button>
<button class="px-3 py-1.5 rounded text-xs font-label-md uppercase tracking-wider bg-transparent text-on-surface-variant hover:text-on-surface transition-all" id="btn-state-submitting" type="button">
            Submitting State
          </button>
</div>
</div>
<!-- Architectural Split Card -->
<div class="grid grid-cols-1 lg:grid-cols-12 bg-surface-container-lowest rounded-xl shadow-xl overflow-hidden relative">
<!-- Left Cardinal Sanctuary Panel (5 Columns) -->
<div class="lg:col-span-5 bg-primary-container text-surface flex flex-col justify-between p-space-lg lg:p-space-xl relative overflow-hidden">
<!-- Geometric Sacred Compass Watermark Overlay -->
<div class="absolute -right-16 -top-16 w-64 h-64 opacity-5 pointer-events-none">
<svg class="w-full h-full stroke-current" fill="none" stroke-width="0.75" viewbox="0 0 100 100">
<circle cx="50" cy="50" r="46"></circle>
<circle cx="50" cy="50" r="32"></circle>
<rect height="50" transform="rotate(45 50 50)" width="50" x="25" y="25"></rect>
<rect height="50" width="50" x="25" y="25"></rect>
<line x1="50" x2="50" y1="2" y2="98"></line>
<line x1="2" x2="98" y1="50" y2="50"></line>
</svg>
</div>
<div class="relative z-10 space-y-space-md">
<div class="inline-flex items-center gap-space-xs px-2.5 py-1 bg-surface-container-lowest/10 rounded text-secondary-fixed font-label-sm text-label-sm uppercase tracking-[0.2em]">
<span class="material-symbols-outlined text-[14px]">auto_stories</span>
              Panchamahabhuta Portal
            </div>
<div class="space-y-space-xs">
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-secondary-fixed-dim block">Vedic Tenet · Chapter IV</span>
<p class="font-editorial-quote text-editorial-quote italic text-surface-bright leading-relaxed">
                “Balance is not a static state, but an agile harmony between the inner spirit and surrounding space.”
              </p>
</div>
</div>
<!-- Editorial Botanical Inset Feature -->
<div class="relative z-10 my-space-md bg-surface-container-lowest/5 p-space-md rounded-lg backdrop-blur-sm space-y-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-full bg-secondary/30 flex items-center justify-center text-secondary-fixed">
<span class="material-symbols-outlined text-[20px]">spa</span>
</div>
<div>
<h4 class="font-headline-sm text-headline-sm text-surface-bright leading-tight">Ayur Vastu Ledger</h4>
<p class="font-body-sm text-body-sm text-surface-dim">Bespoke formulations, Vastu surveys &amp; Panchakarma protocols.</p>
</div>
</div>
<div class="pt-space-xs grid grid-cols-2 gap-2 text-surface-container-high font-label-sm text-label-sm">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-secondary-fixed text-[14px]">verified</span>
<span>Dosha Records</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-secondary-fixed text-[14px]">verified</span>
<span>Apothecary Orders</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-secondary-fixed text-[14px]">verified</span>
<span>Spatial Audits</span>
</div>
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-secondary-fixed text-[14px]">verified</span>
<span>Vaidya Messages</span>
</div>
</div>
</div>
<div class="relative z-10 pt-space-sm flex items-center justify-between font-label-sm text-label-sm text-surface-dim uppercase tracking-wider">
<span>Sanctuary Verified</span>
<span class="flex items-center gap-1 text-secondary-fixed">
<span class="material-symbols-outlined text-[16px]">lock</span>
              Protected Session
            </span>
</div>
</div>
<!-- Right Authentication Form Panel (7 Columns) -->
<div class="lg:col-span-7 bg-surface-container-lowest p-space-lg lg:p-space-xl flex flex-col justify-between">
<div>
<!-- Form Header -->
<div class="mb-space-md space-y-1">
<span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-secondary font-bold">Secure Account Access</span>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-wide">WELCOME BACK</h1>
<p class="font-body-md text-body-md text-on-surface-variant">
                Sign in to your ANUKUL sanctuary account to view your therapeutic orders and spatial alignment consultations.
              </p>
</div>
<!-- Dynamic Error State Banner (Hidden by default, triggered by demo script or login failure) -->
<div class="hidden mb-space-md p-space-md bg-error-container text-on-error-container rounded-lg" id="login-error-banner">
<div class="flex items-start gap-space-sm">
<span class="material-symbols-outlined text-error text-[20px] shrink-0 mt-0.5">error</span>
<div class="space-y-1">
<h4 class="font-headline-sm text-headline-sm text-error font-medium">Authentication Failed</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                    The password you entered for <strong class="text-on-surface font-semibold">ananya.sharma@example.com</strong> is incorrect. Please verify your credentials or reset your passphrase.
                  </p>
</div>
</div>
</div>
<!-- Login Form -->
<form action="#" class="space-y-space-md" id="anukul-login-form" method="POST" onsubmit="event.preventDefault(); simulateSubmission();">
<!-- Email / Username Field -->
<div class="space-y-1.5">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md uppercase tracking-wider text-on-surface" for="username">
                    Email Address or Username <span aria-hidden="true" class="text-error">*</span>
</label>
<span class="font-body-sm text-body-sm text-on-surface-variant opacity-75">Required</span>
</div>
<div class="relative">
<span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-on-surface-variant opacity-60">
<span class="material-symbols-outlined text-[18px]">alternate_email</span>
</span>
<input autocomplete="username" class="w-full pl-10 pr-4 py-3 bg-surface-container-low text-on-surface rounded-lg font-body-md text-body-md placeholder:text-outline-variant focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" id="username" name="username" placeholder="e.g., ananya.sharma@example.com" required="" type="text" value="ananya.sharma@example.com"/>
</div>
</div>
<!-- Password Field with Visibility Toggle -->
<div class="space-y-1.5">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md uppercase tracking-wider text-on-surface" for="password">
                    Password <span aria-hidden="true" class="text-error">*</span>
</label>
<a class="font-label-md text-label-md text-secondary hover:text-primary transition-colors tracking-wide underline decoration-secondary/30 underline-offset-4" data-path="forgot-password" href="password%20reset.html">
                    Forgot password?
                  </a>
</div>
<div class="relative">
<span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-on-surface-variant opacity-60">
<span class="material-symbols-outlined text-[18px]">lock</span>
</span>
<input autocomplete="current-password" class="w-full pl-10 pr-12 py-3 bg-surface-container-low text-on-surface rounded-lg font-body-md text-body-md placeholder:text-outline-variant focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" id="password" name="password" placeholder="Enter your confidential passphrase" required="" type="password" value="••••••••••••"/>
<button aria-label="Toggle password visibility" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-on-surface-variant hover:text-primary transition-colors" id="toggle-password-btn" type="button">
<span class="material-symbols-outlined text-[20px]" id="password-toggle-icon">visibility</span>
</button>
</div>
</div>
<!-- Remember Me & Micro-actions Row -->
<div class="flex items-center justify-between pt-1">
<label class="flex items-center gap-space-xs cursor-pointer select-none group">
<input checked="" class="sr-only peer" id="rememberme" name="rememberme" type="checkbox"/>
<div class="w-4 h-4 rounded bg-surface-container-high peer-checked:bg-primary-container flex items-center justify-center transition-all group-hover:scale-105">
<span class="material-symbols-outlined text-[13px] text-on-primary font-bold opacity-0 peer-checked:opacity-100 transition-opacity">check</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant group-hover:text-on-surface transition-colors">
                    Keep me signed in on this sanctum device
                  </span>
</label>
</div>
<!-- Primary Submit CTA Button with Submitting Spinner State -->
<div class="pt-space-xs">
<button class="w-full py-3.5 px-6 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md uppercase tracking-[0.15em] font-semibold hover:bg-tertiary-container hover:text-on-tertiary shadow-md transition-all flex items-center justify-center gap-2 group cursor-pointer" id="submit-login-btn" type="submit">
<span id="btn-text">SIGN IN TO SANCTUM</span>
<span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform" id="btn-icon">arrow_forward</span>
<span class="hidden" id="btn-spinner">
<svg class="animate-spin h-5 w-5 text-on-primary" fill="none" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
<path class="opacity-75" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" fill="currentColor"></path>
</svg>
</span>
</button>
</div>
</form>
<!-- Subtle Gold/Sand Hairline Divider -->
<div class="my-space-lg relative flex items-center justify-center">
<div class="w-full h-px bg-surface-variant"></div>
<span class="absolute px-4 bg-surface-container-lowest font-label-sm text-label-sm uppercase tracking-[0.2em] text-outline">
                New to ANUKUL?
              </span>
</div>
<!-- Create Account Secondary Action -->
<div class="space-y-space-sm">
<a class="w-full py-3 px-6 rounded-lg bg-surface-container-low text-primary hover:bg-secondary-fixed hover:text-on-secondary-fixed transition-colors font-label-md text-label-md uppercase tracking-[0.15em] font-semibold text-center block shadow-sm" data-path="register" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>">
                Create An Account
              </a>
<div class="flex items-center justify-between pt-space-xs font-body-sm text-body-sm">
<a class="inline-flex items-center gap-1.5 text-on-surface-variant hover:text-primary transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">
<span class="material-symbols-outlined text-[16px]">arrow_back</span>
<span>Return to Herbal Apothecary</span>
</a>
<a class="text-on-surface-variant hover:text-secondary transition-colors" data-path="contact" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>">
                  Need Vaidya Assistance?
                </a>
</div>
</div>
</div>
<!-- Footer Trust Credential Note -->
<div class="mt-space-lg pt-space-md bg-surface-container-low/60 -mx-space-lg -mb-space-lg p-space-md lg:-mx-space-xl lg:-mb-space-xl lg:px-space-xl flex flex-wrap items-center justify-between gap-space-sm text-on-surface-variant font-label-sm text-label-sm">
<div class="flex items-center gap-space-xs">
<span class="material-symbols-outlined text-secondary text-[16px]">verified_user</span>
<span>Standard ANUKUL Secure Authentication</span>
</div>
<div class="flex items-center gap-space-xs text-outline">
<span class="material-symbols-outlined text-[14px]">shield</span>
<span>ISO 27001 Clinical Privacy Standard</span>
</div>
</div>
</div>
</div>
<!-- Ancillary Clarification Card on Consultations & Deliveries -->
<div class="mt-space-lg grid grid-cols-1 md:grid-cols-3 gap-space-md">
<div class="bg-surface-container-low p-space-md rounded-lg flex items-start gap-space-sm shadow-sm">
<div class="w-8 h-8 rounded bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">calendar_month</span>
</div>
<div>
<h4 class="font-headline-sm text-headline-sm text-primary leading-tight">Clinical Appointments</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Review booked pulse diagnosis &amp; remote Vastu energy assessments.</p>
</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg flex items-start gap-space-sm shadow-sm">
<div class="w-8 h-8 rounded bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">inventory_2</span>
</div>
<div>
<h4 class="font-headline-sm text-headline-sm text-primary leading-tight">Apothecary Logistics</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Live tracking for handcrafted rasayanas and sanctified brass yantras.</p>
</div>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg flex items-start gap-space-sm shadow-sm">
<div class="w-8 h-8 rounded bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">encrypted</span>
</div>
<div>
<h4 class="font-headline-sm text-headline-sm text-primary leading-tight">Sacred Confidentiality</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Health charts and residential blueprints stored on encrypted servers.</p>
</div>
</div>
</div>
</div>
</section>
<!-- Inline Script for UI Micro-Interactions (Show/Hide Password, State Switching) -->
<script>
    (function initAuthInteractions() {
      const passwordInput = document.getElementById('password');
      const togglePasswordBtn = document.getElementById('toggle-password-btn');
      const passwordToggleIcon = document.getElementById('password-toggle-icon');
      
      const errorBanner = document.getElementById('login-error-banner');
      const submitBtn = document.getElementById('submit-login-btn');
      const btnText = document.getElementById('btn-text');
      const btnIcon = document.getElementById('btn-icon');
      const btnSpinner = document.getElementById('btn-spinner');

      const btnStateNormal = document.getElementById('btn-state-normal');
      const btnStateError = document.getElementById('btn-state-error');
      const btnStateSubmitting = document.getElementById('btn-state-submitting');

      // Password visibility toggle
      if (togglePasswordBtn && passwordInput) {
        togglePasswordBtn.addEventListener('click', function() {
          const isPassword = passwordInput.getAttribute('type') === 'password';
          passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
          passwordToggleIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
        });
      }

      function resetDemoButtons() {
        [btnStateNormal, btnStateError, btnStateSubmitting].forEach(btn => {
          btn.classList.remove('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'font-semibold');
          btn.classList.add('bg-transparent', 'text-on-surface-variant');
        });
      }

      function setNormalState() {
        resetDemoButtons();
        btnStateNormal.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'font-semibold');
        btnStateNormal.classList.remove('bg-transparent', 'text-on-surface-variant');

        errorBanner.classList.add('hidden');
        btnText.textContent = 'SIGN IN TO SANCTUM';
        btnIcon.classList.remove('hidden');
        btnSpinner.classList.add('hidden');
        submitBtn.removeAttribute('disabled');
      }

      function setErrorState() {
        resetDemoButtons();
        btnStateError.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'font-semibold');
        btnStateError.classList.remove('bg-transparent', 'text-on-surface-variant');

        errorBanner.classList.remove('hidden');
        btnText.textContent = 'SIGN IN TO SANCTUM';
        btnIcon.classList.remove('hidden');
        btnSpinner.classList.add('hidden');
        submitBtn.removeAttribute('disabled');
      }

      function setSubmittingState() {
        resetDemoButtons();
        btnStateSubmitting.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'font-semibold');
        btnStateSubmitting.classList.remove('bg-transparent', 'text-on-surface-variant');

        errorBanner.classList.add('hidden');
        btnText.textContent = 'VERIFYING CREDENTIALS...';
        btnIcon.classList.add('hidden');
        btnSpinner.classList.remove('hidden');
        submitBtn.setAttribute('disabled', 'true');
      }

      btnStateNormal.addEventListener('click', setNormalState);
      btnStateError.addEventListener('click', setErrorState);
      btnStateSubmitting.addEventListener('click', setSubmittingState);

      window.simulateSubmission = function() {
        setSubmittingState();
        setTimeout(() => {
          setErrorState();
        }, 1200);
      };
    })();
  </script>
</div>

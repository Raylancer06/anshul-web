<?php
/**
 * Login / Register Form
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="flex flex-col w-full">
  <!-- Sub-navigation & Sacred Axis Breadcrumbs -->
  <section class="w-full bg-surface-bright py-space-sm border-b border-[#E8D8BC]">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm">
      <nav aria-label="Breadcrumb" class="flex items-center gap-space-xs tracking-wider">
        <a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <span class="opacity-40">/</span>
        <a class="hover:text-primary transition-colors" data-path="account" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' ) ); ?>">My Account</a>
        <span class="opacity-40">/</span>
        <span aria-current="page" class="text-primary font-medium">Portal Access</span>
      </nav>
      <div class="hidden sm:flex items-center gap-space-xs font-label-sm text-label-sm uppercase tracking-[0.2em] text-secondary">
        <span class="inline-block w-1.5 h-1.5 rounded-full bg-secondary"></span>
        Ishanya Portal &bull; SSL 256-Bit Encrypted
      </div>
    </div>
  </section>

  <!-- Main Sanctuary Authentication Module -->
  <section class="w-full py-space-lg lg:py-space-xl">
    <div class="max-w-5xl mx-auto px-6 lg:px-12">

      <!-- Dynamic WooCommerce Notices Output -->
      <?php if ( function_exists( 'woocommerce_output_all_notices' ) ) : ?>
        <div class="mb-space-md anukul-wc-notices">
          <?php woocommerce_output_all_notices(); ?>
        </div>
      <?php endif; ?>

      <!-- Architectural Split Card -->
      <div class="grid grid-cols-1 lg:grid-cols-12 bg-surface-container-lowest rounded-xl shadow-xl overflow-hidden relative border border-[#E8D8BC]/60">
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
              <span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-secondary-fixed-dim block">Vedic Tenet &bull; Chapter IV</span>
              <p class="font-editorial-quote text-editorial-quote italic text-surface-bright leading-relaxed">
                &ldquo;Balance is not a static state, but an agile harmony between the inner spirit and surrounding space.&rdquo;
              </p>
            </div>
          </div>
          <!-- Editorial Botanical Inset Feature -->
          <div class="relative z-10 my-space-md bg-surface-container-lowest/5 p-space-md rounded-lg backdrop-blur-sm space-y-space-sm border border-white/10">
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
            <!-- Form Tabs (Login vs Register) -->
            <div class="flex items-center gap-4 border-b border-[#E8D8BC] pb-3 mb-space-md">
              <button type="button" id="tab-btn-login" onclick="toggleAuthForm('login')" class="font-label-sm text-xs uppercase tracking-[0.2em] font-bold text-primary border-b-2 border-primary pb-2 -mb-[14px] transition-colors">
                Sign In
              </button>
              <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
                <button type="button" id="tab-btn-register" onclick="toggleAuthForm('register')" class="font-label-sm text-xs uppercase tracking-[0.2em] font-bold text-outline hover:text-primary pb-2 -mb-[14px] transition-colors">
                  Create Account
                </button>
              <?php endif; ?>
            </div>

            <!-- LOGIN FORM VIEW -->
            <div id="auth-view-login">
              <!-- Form Header -->
              <div class="mb-space-md space-y-1">
                <span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-secondary font-bold">Secure Account Access</span>
                <h1 class="font-headline-lg text-headline-lg text-primary tracking-wide">WELCOME BACK</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">
                  Sign in to your ANUKUL sanctuary account to view your therapeutic orders and spatial alignment consultations.
                </p>
              </div>

              <!-- WooCommerce Login Form -->
              <form class="woocommerce-form woocommerce-form-login login space-y-space-md" method="post">
                <?php do_action( 'woocommerce_login_form_start' ); ?>

                <!-- Email / Username Field -->
                <div class="space-y-1.5">
                  <div class="flex items-center justify-between">
                    <label class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-semibold" for="username">
                      Email Address or Username <span aria-hidden="true" class="text-error">*</span>
                    </label>
                    <span class="font-body-sm text-body-sm text-on-surface-variant opacity-75">Required</span>
                  </div>
                  <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-on-surface-variant opacity-60">
                      <span class="material-symbols-outlined text-[18px]">alternate_email</span>
                    </span>
                    <input autocomplete="username" class="w-full pl-10 pr-4 py-3 bg-surface-container-low text-on-surface rounded-lg font-body-md text-body-md placeholder:text-outline-variant focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" id="username" name="username" placeholder="Enter your email or username" required type="text" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"/>
                  </div>
                </div>

                <!-- Password Field with Visibility Toggle -->
                <div class="space-y-1.5">
                  <div class="flex items-center justify-between">
                    <label class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-semibold" for="password">
                      Password <span aria-hidden="true" class="text-error">*</span>
                    </label>
                    <a class="font-label-md text-label-md text-secondary hover:text-primary transition-colors tracking-wide underline decoration-secondary/30 underline-offset-4" href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
                      Forgot password?
                    </a>
                  </div>
                  <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-on-surface-variant opacity-60">
                      <span class="material-symbols-outlined text-[18px]">lock</span>
                    </span>
                    <input autocomplete="current-password" class="w-full pl-10 pr-12 py-3 bg-surface-container-low text-on-surface rounded-lg font-body-md text-body-md placeholder:text-outline-variant focus:bg-surface-container-lowest focus:outline-none focus:ring-2 focus:ring-primary-container transition-all" id="password" name="password" placeholder="Enter your confidential passphrase" required type="password" value=""/>
                    <button aria-label="Toggle password visibility" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-on-surface-variant hover:text-primary transition-colors" id="toggle-password-btn" type="button">
                      <span class="material-symbols-outlined text-[20px]" id="password-toggle-icon">visibility</span>
                    </button>
                  </div>
                </div>

                <!-- Remember Me Row -->
                <div class="flex items-center justify-between pt-1">
                  <label class="flex items-center gap-space-xs cursor-pointer select-none group">
                    <input class="sr-only peer" id="rememberme" name="rememberme" type="checkbox" value="forever" checked/>
                    <div class="w-4 h-4 rounded bg-surface-container-high peer-checked:bg-primary-container flex items-center justify-center transition-all group-hover:scale-105">
                      <span class="material-symbols-outlined text-[13px] text-on-primary font-bold opacity-0 peer-checked:opacity-100 transition-opacity">check</span>
                    </div>
                    <span class="font-body-sm text-body-sm text-on-surface-variant group-hover:text-on-surface transition-colors">
                      Keep me signed in on this sanctum device
                    </span>
                  </label>
                </div>

                <?php do_action( 'woocommerce_login_form' ); ?>

                <!-- Submit Button -->
                <div class="pt-space-xs">
                  <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                  <button class="w-full py-3.5 px-6 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-[0.15em] font-semibold hover:bg-tertiary shadow-md transition-all flex items-center justify-center gap-2 group cursor-pointer" id="submit-login-btn" name="login" type="submit" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">
                    <span>SIGN IN TO SANCTUM</span>
                    <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                  </button>
                </div>

                <?php do_action( 'woocommerce_login_form_end' ); ?>
              </form>

              <!-- Divider -->
              <div class="my-space-lg relative flex items-center justify-center">
                <div class="w-full h-px bg-surface-variant"></div>
                <span class="absolute px-4 bg-surface-container-lowest font-label-sm text-label-sm uppercase tracking-[0.2em] text-outline">
                  New to ANUKUL?
                </span>
              </div>

              <!-- Create Account Action -->
              <div class="space-y-space-sm">
                <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
                  <button type="button" onclick="toggleAuthForm('register')" class="w-full py-3 px-6 rounded-lg bg-surface-container-low text-primary hover:bg-secondary-fixed hover:text-on-secondary-fixed transition-colors font-label-md text-label-md uppercase tracking-[0.15em] font-semibold text-center block shadow-sm">
                    Create An Account
                  </button>
                <?php else : ?>
                  <a class="w-full py-3 px-6 rounded-lg bg-surface-container-low text-primary hover:bg-secondary-fixed hover:text-on-secondary-fixed transition-colors font-label-md text-label-md uppercase tracking-[0.15em] font-semibold text-center block shadow-sm" href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>">
                    Book A Clinical Consultation
                  </a>
                <?php endif; ?>

                <div class="flex items-center justify-between pt-space-xs font-body-sm text-body-sm">
                  <a class="inline-flex items-center gap-1.5 text-on-surface-variant hover:text-primary transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                    <span>Return to Herbal Apothecary</span>
                  </a>
                  <a class="text-on-surface-variant hover:text-secondary transition-colors" data-path="contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                    Need Vaidya Assistance?
                  </a>
                </div>
              </div>
            </div>

            <!-- REGISTRATION FORM VIEW (If Enabled) -->
            <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
              <div id="auth-view-register" class="hidden">
                <div class="mb-space-md space-y-1">
                  <span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-secondary font-bold">New Seeker Enrollment</span>
                  <h2 class="font-headline-lg text-headline-lg text-primary tracking-wide">CREATE SANCTUARY ACCOUNT</h2>
                  <p class="font-body-md text-body-md text-on-surface-variant">
                    Register to maintain your clinical records, order consecrated formulations, and access private consultation dossiers.
                  </p>
                </div>

                <form method="post" class="woocommerce-form woocommerce-form-register register space-y-space-md" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
                  <?php do_action( 'woocommerce_register_form_start' ); ?>

                  <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                    <div class="space-y-1.5">
                      <label class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-semibold" for="reg_username">
                        Username <span class="text-error">*</span>
                      </label>
                      <input type="text" class="w-full px-4 py-3 bg-surface-container-low text-on-surface rounded-lg font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary-container" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required />
                    </div>
                  <?php endif; ?>

                  <div class="space-y-1.5">
                    <label class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-semibold" for="reg_email">
                      Email Address <span class="text-error">*</span>
                    </label>
                    <input type="email" class="w-full px-4 py-3 bg-surface-container-low text-on-surface rounded-lg font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary-container" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required />
                  </div>

                  <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                    <div class="space-y-1.5">
                      <label class="font-label-md text-label-md uppercase tracking-wider text-on-surface font-semibold" for="reg_password">
                        Passphrase <span class="text-error">*</span>
                      </label>
                      <input type="password" class="w-full px-4 py-3 bg-surface-container-low text-on-surface rounded-lg font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary-container" name="password" id="reg_password" autocomplete="new-password" required />
                    </div>
                  <?php else : ?>
                    <p class="font-body-sm text-body-sm text-on-surface-variant italic">
                      A secure passkey will be transmitted to your email address.
                    </p>
                  <?php endif; ?>

                  <?php do_action( 'woocommerce_register_form' ); ?>

                  <div class="pt-space-xs">
                    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                    <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit w-full py-3.5 px-6 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-[0.15em] font-semibold hover:bg-tertiary shadow-md transition-all flex items-center justify-center gap-2 group cursor-pointer" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">
                      <span>CREATE SANCTUARY ACCOUNT</span>
                      <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                  </div>

                  <div class="pt-2 text-center">
                    <button type="button" onclick="toggleAuthForm('login')" class="text-xs uppercase font-label-sm text-secondary hover:text-primary transition-colors underline tracking-wider font-semibold">
                      Already have an account? Sign In
                    </button>
                  </div>

                  <?php do_action( 'woocommerce_register_form_end' ); ?>
                </form>
              </div>
            <?php endif; ?>

          </div>

          <!-- Footer Trust Credential Note -->
          <div class="mt-space-lg pt-space-md bg-surface-container-low/60 -mx-space-lg -mb-space-lg p-space-md lg:-mx-space-xl lg:-mb-space-xl lg:px-space-xl flex flex-wrap items-center justify-between gap-space-sm text-on-surface-variant font-label-sm text-label-sm border-t border-[#E8D8BC]/50">
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

      <!-- Ancillary Clarification Cards -->
      <div class="mt-space-lg grid grid-cols-1 md:grid-cols-3 gap-space-md">
        <div class="bg-surface-container-low p-space-md rounded-lg flex items-start gap-space-sm shadow-sm border border-[#E8D8BC]/60">
          <div class="w-8 h-8 rounded bg-primary-container text-on-primary flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-[18px]">calendar_month</span>
          </div>
          <div>
            <h4 class="font-headline-sm text-headline-sm text-primary leading-tight">Clinical Appointments</h4>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Review booked pulse diagnosis &amp; remote Vastu energy assessments.</p>
          </div>
        </div>
        <div class="bg-surface-container-low p-space-md rounded-lg flex items-start gap-space-sm shadow-sm border border-[#E8D8BC]/60">
          <div class="w-8 h-8 rounded bg-primary-container text-on-primary flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-[18px]">inventory_2</span>
          </div>
          <div>
            <h4 class="font-headline-sm text-headline-sm text-primary leading-tight">Apothecary Logistics</h4>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">Live tracking for handcrafted rasayanas and sanctified brass yantras.</p>
          </div>
        </div>
        <div class="bg-surface-container-low p-space-md rounded-lg flex items-start gap-space-sm shadow-sm border border-[#E8D8BC]/60">
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

  <!-- Interactive JavaScript for Form Interaction -->
  <script>
    function toggleAuthForm(mode) {
      const loginView = document.getElementById('auth-view-login');
      const registerView = document.getElementById('auth-view-register');
      const tabLogin = document.getElementById('tab-btn-login');
      const tabRegister = document.getElementById('tab-btn-register');

      if (mode === 'register' && registerView) {
        if (loginView) loginView.classList.add('hidden');
        registerView.classList.remove('hidden');
        if (tabRegister) {
          tabRegister.classList.add('text-primary', 'border-b-2', 'border-primary');
          tabRegister.classList.remove('text-outline');
        }
        if (tabLogin) {
          tabLogin.classList.remove('text-primary', 'border-b-2', 'border-primary');
          tabLogin.classList.add('text-outline');
        }
      } else {
        if (loginView) loginView.classList.remove('hidden');
        if (registerView) registerView.classList.add('hidden');
        if (tabLogin) {
          tabLogin.classList.add('text-primary', 'border-b-2', 'border-primary');
          tabLogin.classList.remove('text-outline');
        }
        if (tabRegister) {
          tabRegister.classList.remove('text-primary', 'border-b-2', 'border-primary');
          tabRegister.classList.add('text-outline');
        }
      }
    }

    // Password visibility toggle
    (function initPasswordToggle() {
      const passwordInput = document.getElementById('password');
      const togglePasswordBtn = document.getElementById('toggle-password-btn');
      const passwordToggleIcon = document.getElementById('password-toggle-icon');

      if (togglePasswordBtn && passwordInput) {
        togglePasswordBtn.addEventListener('click', function() {
          const isPassword = passwordInput.getAttribute('type') === 'password';
          passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
          if (passwordToggleIcon) {
            passwordToggleIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
          }
        });
      }
    })();
  </script>
</div>

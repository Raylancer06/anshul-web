<?php
/**
 * Login / Register Form (ANUKUL Panchamahabhuta Sanctuary Portal)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="flex flex-col w-full">
  <!-- Navigation & Breadcrumbs -->
  <section class="anukul-breadcrumb-bar w-full bg-[#F5EFE3] border-b border-[#E5D5BA] py-4 sm:py-5 shadow-[0_1px_3px_rgba(0,0,0,0.02)]">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 flex items-center justify-between text-[#414944] font-body-sm text-[13px]">
      <nav aria-label="Breadcrumb" class="flex items-center gap-space-xs tracking-wider">
        <a class="hover:text-[#023625] transition-colors font-medium" data-path="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <span class="opacity-40">/</span>
        <a class="hover:text-[#023625] transition-colors font-medium" data-path="account" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' ) ); ?>">My Account</a>
        <span class="opacity-40">/</span>
        <span id="auth-breadcrumb-current" aria-current="page" class="text-[#023625] font-semibold">Account Login</span>
      </nav>
      <div class="hidden sm:flex items-center gap-space-xs font-label-sm text-[10px] uppercase tracking-[0.18em] text-[#974800] font-bold">
        <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#974800]"></span>
        Client Portal &bull; SSL 256-Bit Encrypted
      </div>
    </div>
  </section>

  <!-- Main Sanctuary Authentication Module -->
  <section class="w-full py-space-lg lg:py-space-xl">
    <div class="max-w-5xl mx-auto px-6 lg:px-12">

      <!-- Dynamic WooCommerce Notices Output (Standard Secure WP/WC Notice System) -->
      <?php if ( function_exists( 'woocommerce_output_all_notices' ) ) : ?>
        <div class="mb-space-md anukul-wc-notices">
          <?php woocommerce_output_all_notices(); ?>
        </div>
      <?php endif; ?>

      <!-- Architectural Split Card -->
      <div class="grid grid-cols-1 lg:grid-cols-12 bg-white rounded-xl shadow-xl overflow-hidden relative border border-[#E8D8BC]/60">
        <!-- Left Cardinal Sanctuary Panel (5 Columns) -->
        <div class="lg:col-span-5 bg-[#1F4D3A] text-[#FFF8F4] flex flex-col justify-between p-space-lg lg:p-space-xl relative overflow-hidden">
          <!-- Geometric Sacred Compass Watermark Overlay -->
          <div class="absolute -right-16 -top-16 w-64 h-64 opacity-5 pointer-events-none">
            <svg class="w-full h-full stroke-current" fill="none" stroke-width="0.75" viewBox="0 0 100 100">
              <circle cx="50" cy="50" r="46"></circle>
              <circle cx="50" cy="50" r="32"></circle>
              <rect height="50" transform="rotate(45 50 50)" width="50" x="25" y="25"></rect>
              <rect height="50" width="50" x="25" y="25"></rect>
              <line x1="50" x2="50" y1="2" y2="98"></line>
              <line x1="2" x2="98" y1="50" y2="50"></line>
            </svg>
          </div>
          <div class="relative z-10 space-y-space-md">
            <div class="inline-flex items-center gap-space-xs px-2.5 py-1 bg-white/10 rounded text-[#ffdbc7] font-label-sm text-[10px] uppercase tracking-[0.2em] w-fit">
              <span class="material-symbols-outlined notranslate text-[14px] leading-none shrink-0" translate="no">auto_stories</span>
              <span class="whitespace-nowrap leading-none font-semibold">Panchamahabhuta Portal</span>
            </div>
            <div class="space-y-space-xs">
              <span class="font-label-sm text-[10px] uppercase tracking-[0.25em] text-[#ffb688] block font-semibold">Vedic Tenet &bull; Chapter IV</span>
              <p class="font-editorial-quote text-[24px] sm:text-[26px] italic text-[#FFF8F4] leading-relaxed">
                &ldquo;Balance is not a static state, but an agile harmony between the inner spirit and surrounding space.&rdquo;
              </p>
            </div>
          </div>
          <!-- Editorial Botanical Inset Feature -->
          <div class="relative z-10 my-space-md bg-white/5 p-space-md rounded-lg backdrop-blur-sm space-y-space-sm border border-white/10">
            <div class="flex items-center gap-space-sm">
              <div class="w-10 h-10 rounded-full bg-[#974800]/30 flex items-center justify-center text-[#ffdbc7] shrink-0">
                <span class="material-symbols-outlined notranslate text-[20px]" translate="no">spa</span>
              </div>
              <div>
                <h4 class="font-headline-sm text-[20px] text-[#FFF8F4] leading-tight font-serif">Ayur Vastu Ledger</h4>
                <p class="font-body-sm text-[13px] text-[#e2d8d0]">Bespoke formulations, Vastu surveys &amp; Panchakarma protocols.</p>
              </div>
            </div>
            <div class="pt-space-xs grid grid-cols-2 gap-2 text-[#f1e6de] font-label-sm text-[10px] uppercase tracking-wider font-semibold">
              <div class="flex items-center gap-1.5">
                <span class="material-symbols-outlined notranslate text-[#ffdbc7] text-[14px]" translate="no">verified</span>
                <span>Dosha Records</span>
              </div>
              <div class="flex items-center gap-1.5">
                <span class="material-symbols-outlined notranslate text-[#ffdbc7] text-[14px]" translate="no">verified</span>
                <span>Apothecary Orders</span>
              </div>
              <div class="flex items-center gap-1.5">
                <span class="material-symbols-outlined notranslate text-[#ffdbc7] text-[14px]" translate="no">verified</span>
                <span>Spatial Audits</span>
              </div>
              <div class="flex items-center gap-1.5">
                <span class="material-symbols-outlined notranslate text-[#ffdbc7] text-[14px]" translate="no">verified</span>
                <span>Vaidya Messages</span>
              </div>
            </div>
          </div>
          <div class="relative z-10 pt-space-sm flex items-center justify-between font-label-sm text-[11px] text-[#e2d8d0] uppercase tracking-wider">
            <span>Sanctuary Verified</span>
            <span class="flex items-center gap-1 text-[#ffdbc7] font-semibold">
              <span class="material-symbols-outlined notranslate text-[16px]" translate="no">lock</span>
              Protected Session
            </span>
          </div>
        </div>

        <!-- Right Authentication Form Panel (7 Columns) -->
        <div class="lg:col-span-7 bg-white p-space-lg lg:p-space-xl flex flex-col justify-between">
          <div>
            <!-- Form Tabs (Login vs Register) -->
            <div class="flex items-center gap-6 border-b border-[#E8D8BC] pb-3 mb-space-md">
              <button type="button" id="tab-btn-login" onclick="toggleAuthForm('login')" class="font-label-sm text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold text-[#023625] border-b-2 border-[#023625] pb-2 -mb-[14px] transition-colors cursor-pointer">
                Sign In
              </button>
              <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
                <button type="button" id="tab-btn-register" onclick="toggleAuthForm('register')" class="font-label-sm text-[11px] sm:text-xs uppercase tracking-[0.2em] font-bold text-[#717973] hover:text-[#023625] pb-2 -mb-[14px] transition-colors cursor-pointer">
                  Create Account
                </button>
              <?php endif; ?>
            </div>

            <!-- ========================================== -->
            <!-- 1. LOGIN FORM VIEW                        -->
            <!-- ========================================== -->
            <div id="auth-view-login">
              <!-- Form Header -->
              <div class="mb-space-md space-y-1">
                <span class="font-label-sm text-[11px] uppercase tracking-[0.25em] text-[#974800] font-bold block">Secure Account Access</span>
                <h1 class="font-headline-lg font-serif text-[28px] sm:text-[34px] lg:text-[38px] text-[#023625] tracking-wide leading-tight uppercase font-medium">WELCOME BACK</h1>
                <p class="font-body-md text-[14px] sm:text-[15px] text-[#414944] leading-relaxed">
                  Sign in to your ANUKUL sanctuary account to view your therapeutic orders and spatial alignment consultations.
                </p>
              </div>

              <!-- Native WordPress / WooCommerce Login Form -->
              <form class="woocommerce-form woocommerce-form-login login space-y-space-md" method="post">
                <?php do_action( 'woocommerce_login_form_start' ); ?>

                <!-- Email / Username Field -->
                <div class="space-y-1.5">
                  <div class="flex items-center justify-between">
                    <label class="font-label-md text-[11px] sm:text-[12px] uppercase tracking-wider text-[#1f1b16] font-bold" for="username">
                      Email Address or Username <span aria-hidden="true" class="text-[#ba1a1a]">*</span>
                    </label>
                    <span class="font-label-sm text-[10px] uppercase tracking-widest text-[#974800] font-bold">Required</span>
                  </div>
                  <div class="relative flex items-center">
                    <span class="absolute left-3.5 flex items-center pointer-events-none text-[#717973]">
                      <span class="material-symbols-outlined notranslate text-[18px]" translate="no">alternate_email</span>
                    </span>
                    <input autocomplete="username" class="w-full pl-10 pr-4 py-3 bg-[#fcf2ea] text-[#1f1b16] rounded-lg font-body-md text-[14px] sm:text-[15px] placeholder:text-[#717973] border border-transparent focus:border-[#B38A3E] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#1F4D3A] transition-all" id="username" name="username" placeholder="e.g. yourname@domain.com" required type="text" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"/>
                  </div>
                </div>

                <!-- Password Field with Visibility Toggle -->
                <div class="space-y-1.5">
                  <div class="flex items-center justify-between">
                    <label class="font-label-md text-[11px] sm:text-[12px] uppercase tracking-wider text-[#1f1b16] font-bold" for="password">
                      Password <span aria-hidden="true" class="text-[#ba1a1a]">*</span>
                    </label>
                    <a class="font-label-md text-[11px] sm:text-[12px] text-[#974800] hover:text-[#023625] transition-colors tracking-wide underline decoration-[#974800]/40 underline-offset-4 font-semibold" href="<?php echo esc_url( wp_lostpassword_url() ); ?>">
                      Forgot password?
                    </a>
                  </div>
                  <div class="relative flex items-center">
                    <span class="absolute left-3.5 flex items-center pointer-events-none text-[#717973]">
                      <span class="material-symbols-outlined notranslate text-[18px]" translate="no">lock</span>
                    </span>
                    <input autocomplete="current-password" class="w-full pl-10 pr-12 py-3 bg-[#fcf2ea] text-[#1f1b16] rounded-lg font-body-md text-[14px] sm:text-[15px] placeholder:text-[#717973] border border-transparent focus:border-[#B38A3E] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#1F4D3A] transition-all" id="password" name="password" placeholder="Enter your confidential passphrase" required type="password" value=""/>
                    <button aria-label="Toggle password visibility" class="absolute right-3 pr-1 flex items-center text-[#717973] hover:text-[#023625] transition-colors cursor-pointer p-1" id="toggle-login-password-btn" type="button">
                      <span class="material-symbols-outlined notranslate text-[20px]" translate="no" id="login-password-toggle-icon">visibility</span>
                    </button>
                  </div>
                </div>

                <!-- Remember Me Row -->
                <div class="flex items-center justify-between pt-1">
                  <label class="flex items-center gap-space-xs cursor-pointer select-none group">
                    <input class="sr-only peer" id="rememberme" name="rememberme" type="checkbox" value="forever" checked/>
                    <div class="w-4 h-4 rounded bg-[#f1e6de] peer-checked:bg-[#1F4D3A] flex items-center justify-center transition-all group-hover:scale-105 border border-[#c0c9c2]">
                      <span class="material-symbols-outlined notranslate text-[13px] text-white font-bold opacity-0 peer-checked:opacity-100 transition-opacity" translate="no">check</span>
                    </div>
                    <span class="font-body-sm text-[13px] text-[#414944] group-hover:text-[#1f1b16] transition-colors">
                      Keep me signed in on this sanctum device
                    </span>
                  </label>
                </div>

                <?php do_action( 'woocommerce_login_form' ); ?>

                <!-- Submit Button -->
                <div class="pt-space-xs">
                  <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                  <button class="w-full py-3.5 px-6 rounded-lg bg-[#1F4D3A] text-white font-label-md text-xs sm:text-[13px] uppercase tracking-[0.15em] font-semibold hover:bg-[#7b2739] shadow-md transition-all flex items-center justify-center gap-2 group cursor-pointer" id="submit-login-btn" name="login" type="submit" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">
                    <span>SIGN IN TO SANCTUM</span>
                    <span class="material-symbols-outlined notranslate text-[18px] group-hover:translate-x-1 transition-transform" translate="no">arrow_forward</span>
                  </button>
                </div>

                <?php do_action( 'woocommerce_login_form_end' ); ?>
              </form>

              <!-- Divider -->
              <div class="my-space-lg relative flex items-center justify-center">
                <div class="w-full h-px bg-[#ebe1d9]"></div>
                <span class="absolute px-4 bg-white font-label-sm text-[10px] uppercase tracking-[0.2em] text-[#717973] font-semibold">
                  New to ANUKUL?
                </span>
              </div>

              <!-- Create Account Action -->
              <div class="space-y-space-sm">
                <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
                  <button type="button" onclick="toggleAuthForm('register')" class="w-full py-3 px-6 rounded-lg bg-[#fcf2ea] text-[#023625] hover:bg-[#ffdbc7] hover:text-[#311300] transition-colors font-label-md text-xs sm:text-[13px] uppercase tracking-[0.15em] font-semibold text-center block shadow-sm cursor-pointer">
                    Create An Account
                  </button>
                <?php else : ?>
                  <a class="w-full py-3 px-6 rounded-lg bg-[#fcf2ea] text-[#023625] hover:bg-[#ffdbc7] hover:text-[#311300] transition-colors font-label-md text-xs sm:text-[13px] uppercase tracking-[0.15em] font-semibold text-center block shadow-sm" href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>">
                    Book A Clinical Consultation
                  </a>
                <?php endif; ?>

                <div class="flex items-center justify-between pt-space-xs font-body-sm text-[13px]">
                  <a class="inline-flex items-center gap-1.5 text-[#414944] hover:text-[#023625] transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>">
                    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">arrow_back</span>
                    <span>Return to Herbal Apothecary</span>
                  </a>
                  <a class="text-[#414944] hover:text-[#974800] transition-colors font-medium" data-path="contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                    Need Vaidya Assistance?
                  </a>
                </div>
              </div>
            </div>

            <!-- ========================================== -->
            <!-- 2. REGISTRATION FORM VIEW                 -->
            <!-- ========================================== -->
            <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
              <div id="auth-view-register" class="hidden">
                <div class="mb-space-md space-y-1">
                  <span class="font-label-sm text-[11px] uppercase tracking-[0.25em] text-[#974800] font-bold block">New Seeker Enrollment</span>
                  <h2 class="font-headline-lg font-serif text-[28px] sm:text-[34px] lg:text-[38px] text-[#023625] tracking-wide leading-tight uppercase font-medium">CREATE SANCTUARY ACCOUNT</h2>
                  <p class="font-body-md text-[14px] sm:text-[15px] text-[#414944] leading-relaxed">
                    Register to maintain your clinical records, order consecrated formulations, and access private consultation dossiers.
                  </p>
                </div>

                <!-- Native WordPress / WooCommerce Registration Form -->
                <form method="post" class="woocommerce-form woocommerce-form-register register space-y-space-md" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
                  <?php do_action( 'woocommerce_register_form_start' ); ?>

                  <!-- First Name & Last Name (Saved to customer user meta) -->
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                    <div class="flex flex-col gap-1.5">
                      <div class="flex items-center justify-between">
                        <label class="font-label-md text-[11px] sm:text-[12px] text-[#1f1b16] uppercase tracking-wider font-bold" for="reg_billing_first_name">
                          First Name
                        </label>
                        <span class="font-label-sm text-[10px] text-[#717973] uppercase tracking-wider font-medium">(Optional)</span>
                      </div>
                      <input autocomplete="given-name" class="w-full bg-[#fcf2ea] px-4 py-3 rounded-lg font-body-md text-[14px] sm:text-[15px] text-[#1f1b16] border border-transparent focus:border-[#B38A3E] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#1F4D3A] transition-all placeholder:text-[#717973]" id="reg_billing_first_name" name="billing_first_name" placeholder="e.g. Aranya" type="text" value="<?php echo ( ! empty( $_POST['billing_first_name'] ) ) ? esc_attr( wp_unslash( $_POST['billing_first_name'] ) ) : ''; ?>"/>
                    </div>
                    <div class="flex flex-col gap-1.5">
                      <div class="flex items-center justify-between">
                        <label class="font-label-md text-[11px] sm:text-[12px] text-[#1f1b16] uppercase tracking-wider font-bold" for="reg_billing_last_name">
                          Last Name
                        </label>
                        <span class="font-label-sm text-[10px] text-[#717973] uppercase tracking-wider font-medium">(Optional)</span>
                      </div>
                      <input autocomplete="family-name" class="w-full bg-[#fcf2ea] px-4 py-3 rounded-lg font-body-md text-[14px] sm:text-[15px] text-[#1f1b16] border border-transparent focus:border-[#B38A3E] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#1F4D3A] transition-all placeholder:text-[#717973]" id="reg_billing_last_name" name="billing_last_name" placeholder="e.g. Varma" type="text" value="<?php echo ( ! empty( $_POST['billing_last_name'] ) ) ? esc_attr( wp_unslash( $_POST['billing_last_name'] ) ) : ''; ?>"/>
                    </div>
                  </div>

                  <!-- Username (If Required) -->
                  <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                    <div class="space-y-1.5">
                      <div class="flex items-center justify-between">
                        <label class="font-label-md text-[11px] sm:text-[12px] uppercase tracking-wider text-[#1f1b16] font-bold" for="reg_username">
                          Username <span class="text-[#ba1a1a]">*</span>
                        </label>
                        <span class="font-label-sm text-[10px] text-[#974800] uppercase tracking-widest font-bold">Required</span>
                      </div>
                      <div class="relative flex items-center">
                        <span class="material-symbols-outlined notranslate absolute left-3.5 text-[#717973] text-[18px] pointer-events-none" translate="no">account_circle</span>
                        <input type="text" class="w-full pl-10 pr-4 py-3 bg-[#fcf2ea] text-[#1f1b16] rounded-lg font-body-md text-[14px] sm:text-[15px] border border-transparent focus:border-[#B38A3E] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#1F4D3A] transition-all placeholder:text-[#717973]" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="Choose a unique username" required />
                      </div>
                    </div>
                  <?php endif; ?>

                  <!-- Email Address -->
                  <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                      <label class="font-label-md text-[11px] sm:text-[12px] uppercase tracking-wider text-[#1f1b16] font-bold" for="reg_email">
                        Email Address <span class="text-[#ba1a1a]">*</span>
                      </label>
                      <span class="font-label-sm text-[10px] text-[#974800] uppercase tracking-widest font-bold">Required</span>
                    </div>
                    <div class="relative flex items-center">
                      <span class="material-symbols-outlined notranslate absolute left-3.5 text-[#717973] text-[18px] pointer-events-none" translate="no">mail</span>
                      <input type="email" class="w-full pl-10 pr-4 py-3 bg-[#fcf2ea] text-[#1f1b16] rounded-lg font-body-md text-[14px] sm:text-[15px] border border-transparent focus:border-[#B38A3E] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#1F4D3A] transition-all placeholder:text-[#717973]" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" placeholder="name@example.com" required />
                    </div>
                  </div>

                  <!-- Password & Confirm Password (If not auto-generated) -->
                  <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                    <div class="space-y-1.5">
                      <div class="flex items-center justify-between">
                        <label class="font-label-md text-[11px] sm:text-[12px] uppercase tracking-wider text-[#1f1b16] font-bold" for="reg_password">
                          Password <span class="text-[#ba1a1a]">*</span>
                        </label>
                        <span class="font-label-sm text-[10px] text-[#974800] uppercase tracking-widest font-bold">Required</span>
                      </div>
                      <div class="relative flex items-center">
                        <span class="material-symbols-outlined notranslate absolute left-3.5 text-[#717973] text-[18px] pointer-events-none" translate="no">lock</span>
                        <input type="password" class="w-full pl-10 pr-12 py-3 bg-[#fcf2ea] text-[#1f1b16] rounded-lg font-body-md text-[14px] sm:text-[15px] border border-transparent focus:border-[#B38A3E] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#1F4D3A] transition-all placeholder:text-[#717973]" name="password" id="reg_password" autocomplete="new-password" oninput="updatePasswordStrength(this.value)" placeholder="••••••••••••" required />
                        <button aria-label="Toggle password visibility" class="absolute right-3 text-[#717973] hover:text-[#023625] transition-colors p-1 cursor-pointer" onclick="toggleRegPassword('reg_password', this)" type="button">
                          <span class="material-symbols-outlined notranslate text-[20px]" translate="no">visibility</span>
                        </button>
                      </div>

                      <!-- Password Strength Meter Component -->
                      <div class="mt-2 bg-[#fcf2ea] p-3 rounded-lg border border-[#E8D8BC]">
                        <div class="flex items-center justify-between mb-1.5">
                          <span class="font-label-sm text-[10px] text-[#414944] uppercase tracking-wider font-semibold">Security Alignment:</span>
                          <span class="font-label-sm text-[10px] uppercase tracking-widest font-semibold text-[#717973]" id="strength-label">Pondering</span>
                        </div>
                        <div class="w-full h-1.5 bg-[#ebe1d9] rounded-full overflow-hidden flex gap-1">
                          <div class="h-full w-1/4 bg-[#e2d8d0] rounded-full transition-colors duration-300" id="meter-segment-1"></div>
                          <div class="h-full w-1/4 bg-[#e2d8d0] rounded-full transition-colors duration-300" id="meter-segment-2"></div>
                          <div class="h-full w-1/4 bg-[#e2d8d0] rounded-full transition-colors duration-300" id="meter-segment-3"></div>
                          <div class="h-full w-1/4 bg-[#e2d8d0] rounded-full transition-colors duration-300" id="meter-segment-4"></div>
                        </div>
                        <div class="flex items-center gap-2 mt-2 font-body-sm text-[11px] text-[#414944]">
                          <span class="material-symbols-outlined notranslate text-[14px] text-[#974800]" translate="no">info</span>
                          <span>Minimum 8 characters combining letters, numbers, and sacred marks</span>
                        </div>
                      </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-1.5">
                      <div class="flex items-center justify-between">
                        <label class="font-label-md text-[11px] sm:text-[12px] uppercase tracking-wider text-[#1f1b16] font-bold" for="reg_confirm_password">
                          Confirm Password <span class="text-[#ba1a1a]">*</span>
                        </label>
                        <span class="font-label-sm text-[10px] uppercase tracking-wider text-[#717973] flex items-center gap-1 font-semibold" id="match-indicator">
                          <span class="material-symbols-outlined notranslate text-[14px]" translate="no">remove</span> Awaiting input
                        </span>
                      </div>
                      <div class="relative flex items-center">
                        <span class="material-symbols-outlined notranslate absolute left-3.5 text-[#717973] text-[18px] pointer-events-none" translate="no">lock_reset</span>
                        <input type="password" class="w-full pl-10 pr-12 py-3 bg-[#fcf2ea] text-[#1f1b16] rounded-lg font-body-md text-[14px] sm:text-[15px] border border-transparent focus:border-[#B38A3E] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#1F4D3A] transition-all placeholder:text-[#717973]" name="confirm_password" id="reg_confirm_password" autocomplete="new-password" oninput="checkPasswordMatch()" placeholder="••••••••••••" required />
                        <button aria-label="Toggle confirm password visibility" class="absolute right-3 text-[#717973] hover:text-[#023625] transition-colors p-1 cursor-pointer" onclick="toggleRegPassword('reg_confirm_password', this)" type="button">
                          <span class="material-symbols-outlined notranslate text-[20px]" translate="no">visibility</span>
                        </button>
                      </div>
                    </div>
                  <?php else : ?>
                    <p class="font-body-sm text-[13px] text-[#414944] italic">
                      A secure passkey will be transmitted to your email address.
                    </p>
                  <?php endif; ?>

                  <!-- Privacy Policy Agreement -->
                  <div class="pt-1">
                    <label class="flex items-start gap-3 cursor-pointer select-none group">
                      <input class="mt-1 w-4 h-4 rounded text-[#1F4D3A] accent-[#1F4D3A] focus:ring-0 cursor-pointer" id="agree-privacy-policy" name="privacy_policy" required type="checkbox" checked />
                      <span class="font-body-sm text-[13px] text-[#414944] leading-snug">
                        I consent to the sanctuary storing my health records and orders in accordance with the 
                        <a href="<?php echo esc_url( home_url( '/contact/#privacy' ) ); ?>" class="text-[#974800] hover:text-[#023625] underline font-medium">Privacy Policy</a>.
                      </span>
                    </label>
                  </div>

                  <?php do_action( 'woocommerce_register_form' ); ?>

                  <!-- Submit Register Button -->
                  <div class="pt-space-xs">
                    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                    <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit w-full py-3.5 px-6 rounded-lg bg-[#1F4D3A] text-white font-label-md text-xs sm:text-[13px] uppercase tracking-[0.15em] font-semibold hover:bg-[#7b2739] shadow-md transition-all flex items-center justify-center gap-2 group cursor-pointer" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">
                      <span>CREATE SANCTUARY ACCOUNT</span>
                      <span class="material-symbols-outlined notranslate text-[18px] group-hover:translate-x-1 transition-transform" translate="no">arrow_forward</span>
                    </button>
                  </div>

                  <div class="pt-2 text-center">
                    <button type="button" onclick="toggleAuthForm('login')" class="text-xs uppercase font-label-sm text-[#974800] hover:text-[#023625] transition-colors underline tracking-wider font-semibold cursor-pointer">
                      Already have an account? Sign In
                    </button>
                  </div>

                  <?php do_action( 'woocommerce_register_form_end' ); ?>
                </form>
              </div>
            <?php endif; ?>

          </div>

          <!-- Footer Trust Credential Note -->
          <div class="mt-space-lg pt-space-md bg-[#fcf2ea]/60 -mx-space-lg -mb-space-lg p-space-md lg:-mx-space-xl lg:-mb-space-xl lg:px-space-xl flex flex-wrap items-center justify-between gap-space-sm text-[#414944] font-label-sm text-[11px] border-t border-[#E8D8BC]/50">
            <div class="flex items-center gap-space-xs">
              <span class="material-symbols-outlined notranslate text-[#974800] text-[16px]" translate="no">verified_user</span>
              <span>Standard ANUKUL Secure Authentication</span>
            </div>
            <div class="flex items-center gap-space-xs text-[#717973]">
              <span class="material-symbols-outlined notranslate text-[14px]" translate="no">shield</span>
              <span>ISO 27001 Clinical Privacy Standard</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Ancillary Clarification Cards -->
      <div class="mt-space-lg grid grid-cols-1 md:grid-cols-3 gap-space-md">
        <div class="bg-[#fcf2ea] p-space-md rounded-lg flex items-start gap-space-sm shadow-sm border border-[#E8D8BC]/60">
          <div class="w-8 h-8 rounded bg-[#1F4D3A] text-white flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined notranslate text-[18px]" translate="no">calendar_month</span>
          </div>
          <div>
            <h4 class="font-headline-sm font-serif text-[18px] text-[#023625] leading-tight font-semibold">Clinical Appointments</h4>
            <p class="font-body-sm text-[13px] text-[#414944] mt-1 leading-relaxed">Review booked pulse diagnosis &amp; remote Vastu energy assessments.</p>
          </div>
        </div>
        <div class="bg-[#fcf2ea] p-space-md rounded-lg flex items-start gap-space-sm shadow-sm border border-[#E8D8BC]/60">
          <div class="w-8 h-8 rounded bg-[#1F4D3A] text-white flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined notranslate text-[18px]" translate="no">inventory_2</span>
          </div>
          <div>
            <h4 class="font-headline-sm font-serif text-[18px] text-[#023625] leading-tight font-semibold">Apothecary Logistics</h4>
            <p class="font-body-sm text-[13px] text-[#414944] mt-1 leading-relaxed">Live tracking for handcrafted rasayanas and sanctified brass yantras.</p>
          </div>
        </div>
        <div class="bg-[#fcf2ea] p-space-md rounded-lg flex items-start gap-space-sm shadow-sm border border-[#E8D8BC]/60">
          <div class="w-8 h-8 rounded bg-[#1F4D3A] text-white flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined notranslate text-[18px]" translate="no">encrypted</span>
          </div>
          <div>
            <h4 class="font-headline-sm font-serif text-[18px] text-[#023625] leading-tight font-semibold">Sacred Confidentiality</h4>
            <p class="font-body-sm text-[13px] text-[#414944] mt-1 leading-relaxed">Health charts and residential blueprints stored on encrypted servers.</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Interactive JavaScript for Form Interaction, Password Toggles & Strength Meter -->
  <script>
    function toggleAuthForm(mode) {
      const loginView = document.getElementById('auth-view-login');
      const registerView = document.getElementById('auth-view-register');
      const tabLogin = document.getElementById('tab-btn-login');
      const tabRegister = document.getElementById('tab-btn-register');
      const breadcrumb = document.getElementById('auth-breadcrumb-current');

      if (mode === 'register' && registerView) {
        if (loginView) loginView.classList.add('hidden');
        registerView.classList.remove('hidden');
        if (tabRegister) {
          tabRegister.classList.add('text-[#023625]', 'border-b-2', 'border-[#023625]');
          tabRegister.classList.remove('text-[#717973]');
        }
        if (tabLogin) {
          tabLogin.classList.remove('text-[#023625]', 'border-b-2', 'border-[#023625]');
          tabLogin.classList.add('text-[#717973]');
        }
        if (breadcrumb) {
          breadcrumb.textContent = 'Register';
        }
        window.location.hash = '#register';
      } else {
        if (loginView) loginView.classList.remove('hidden');
        if (registerView) registerView.classList.add('hidden');
        if (tabLogin) {
          tabLogin.classList.add('text-[#023625]', 'border-b-2', 'border-[#023625]');
          tabLogin.classList.remove('text-[#717973]');
        }
        if (tabRegister) {
          tabRegister.classList.remove('text-[#023625]', 'border-b-2', 'border-[#023625]');
          tabRegister.classList.add('text-[#717973]');
        }
        if (breadcrumb) {
          breadcrumb.textContent = 'Login';
        }
        if (window.location.hash === '#register') {
          history.replaceState(null, null, ' ');
        }
      }
    }

    // Auto-open register tab if URL hash is #register
    if (window.location.hash === '#register') {
      toggleAuthForm('register');
    }

    // Password visibility toggle for Login
    (function initLoginPasswordToggle() {
      const passwordInput = document.getElementById('password');
      const togglePasswordBtn = document.getElementById('toggle-login-password-btn');
      const passwordToggleIcon = document.getElementById('login-password-toggle-icon');

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

    // Password visibility toggle for Register
    function toggleRegPassword(fieldId, triggerBtn) {
      const field = document.getElementById(fieldId);
      const icon = triggerBtn.querySelector('.material-symbols-outlined');
      if (field) {
        const isPassword = field.type === 'password';
        field.type = isPassword ? 'text' : 'password';
        if (icon) {
          icon.textContent = isPassword ? 'visibility_off' : 'visibility';
        }
      }
    }

    // Password Strength Dynamic Evaluation
    function updatePasswordStrength(val) {
      const label = document.getElementById('strength-label');
      const seg1 = document.getElementById('meter-segment-1');
      const seg2 = document.getElementById('meter-segment-2');
      const seg3 = document.getElementById('meter-segment-3');
      const seg4 = document.getElementById('meter-segment-4');
      
      if (!label || !seg1) return;

      const reset = () => {
        [seg1, seg2, seg3, seg4].forEach(s => {
          s.className = 'h-full w-1/4 bg-[#e2d8d0] rounded-full transition-colors duration-300';
        });
      };

      if (!val || val.length === 0) {
        label.textContent = 'Pondering';
        label.className = 'font-label-sm text-[10px] uppercase tracking-widest font-semibold text-[#717973]';
        reset();
        return;
      }

      let score = 0;
      if (val.length >= 8) score++;
      if (/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
      if (/[0-9]/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val)) score++;

      reset();

      if (score <= 1) {
        label.textContent = 'Fragile';
        label.className = 'font-label-sm text-[10px] uppercase tracking-widest font-semibold text-[#ba1a1a]';
        seg1.classList.replace('bg-[#e2d8d0]', 'bg-[#ba1a1a]');
      } else if (score === 2) {
        label.textContent = 'Nascent';
        label.className = 'font-label-sm text-[10px] uppercase tracking-widest font-semibold text-[#974800]';
        seg1.classList.replace('bg-[#e2d8d0]', 'bg-[#974800]');
        seg2.classList.replace('bg-[#e2d8d0]', 'bg-[#974800]');
      } else if (score === 3) {
        label.textContent = 'Harmonious';
        label.className = 'font-label-sm text-[10px] uppercase tracking-widest font-semibold text-[#023625]';
        seg1.classList.replace('bg-[#e2d8d0]', 'bg-[#1F4D3A]');
        seg2.classList.replace('bg-[#e2d8d0]', 'bg-[#1F4D3A]');
        seg3.classList.replace('bg-[#e2d8d0]', 'bg-[#1F4D3A]');
      } else {
        label.textContent = 'Equilibrium Achieved';
        label.className = 'font-label-sm text-[10px] uppercase tracking-widest font-semibold text-[#023625]';
        seg1.classList.replace('bg-[#e2d8d0]', 'bg-[#023625]');
        seg2.classList.replace('bg-[#e2d8d0]', 'bg-[#023625]');
        seg3.classList.replace('bg-[#e2d8d0]', 'bg-[#023625]');
        seg4.classList.replace('bg-[#e2d8d0]', 'bg-[#023625]');
      }

      checkPasswordMatch();
    }

    // Check Password Match between Password & Confirm Password
    function checkPasswordMatch() {
      const pass = document.getElementById('reg_password');
      const confirmPass = document.getElementById('reg_confirm_password');
      const indicator = document.getElementById('match-indicator');
      if (!pass || !confirmPass || !indicator) return;

      if (!confirmPass.value) {
        indicator.innerHTML = '<span class="material-symbols-outlined notranslate text-[14px]" translate="no">remove</span> Awaiting input';
        indicator.className = 'font-label-sm text-[10px] uppercase tracking-wider text-[#717973] flex items-center gap-1 font-semibold';
        return;
      }

      if (pass.value === confirmPass.value) {
        indicator.innerHTML = '<span class="material-symbols-outlined notranslate text-[14px]" translate="no">check_circle</span> Passwords Match';
        indicator.className = 'font-label-sm text-[10px] uppercase tracking-wider text-[#023625] font-semibold flex items-center gap-1';
      } else {
        indicator.innerHTML = '<span class="material-symbols-outlined notranslate text-[14px]" translate="no">cancel</span> Mismatch';
        indicator.className = 'font-label-sm text-[10px] uppercase tracking-wider text-[#ba1a1a] font-semibold flex items-center gap-1';
      }
    }
  </script>
</div>

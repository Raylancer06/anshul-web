<?php
/**
 * ANUKUL WooCommerce Checkout Form
 * Perfectly mirrors Main/checkout.html design with 100% native WooCommerce order processing.
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Check if user must be logged in to checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo '<div class="max-w-[1440px] mx-auto px-6 lg:px-margin py-16 text-center">';
    echo '<h2 class="font-headline-md text-headline-md text-primary mb-4">' . esc_html__( 'Patron Authentication Required', 'anukul' ) . '</h2>';
    echo '<p class="font-body-md text-on-surface-variant mb-6">' . esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to complete your checkout.', 'woocommerce' ) ) ) . '</p>';
    echo '<a href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '" class="inline-flex px-8 py-3.5 bg-primary text-on-primary rounded-lg font-label-md uppercase tracking-wider font-semibold">' . esc_html__( 'Sign In / Register', 'anukul' ) . '</a>';
    echo '</div>';
    return;
}
?>

<div class="flex flex-col w-full">
    <!-- Subtle Architectural Watermark / Atmosphere Accent -->
    <div class="relative w-full max-w-[1320px] mx-auto px-6 sm:px-10 lg:px-16 pt-6 pb-24">
        
        <?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
        
        <!-- BREADCRUMBS & TOP EDITORIAL PROGRESS -->
        <div class="flex flex-col gap-4 mb-8">
            <!-- Breadcrumb Nav -->
            <nav aria-label="Breadcrumb" class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">
                <a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'anukul' ); ?></a>
                <span class="text-outline-variant">/</span>
                <a class="hover:text-primary transition-colors" data-path="shop" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Shop', 'anukul' ); ?></a>
                <span class="text-outline-variant">/</span>
                <a class="hover:text-primary transition-colors" data-path="cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php esc_html_e( 'Cart', 'anukul' ); ?></a>
                <span class="text-outline-variant">/</span>
                <span class="text-primary font-semibold"><?php esc_html_e( 'Checkout', 'anukul' ); ?></span>
            </nav>

            <!-- Main Title & Spatial Subhead -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-surface-variant">
                <div class="space-y-1">
                    <span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-secondary"><?php esc_html_e( 'Sacred Commerce • Verified Protocol', 'anukul' ); ?></span>
                    <h1 class="font-headline-lg text-headline-lg text-primary tracking-tight uppercase"><?php esc_html_e( 'Complete Your Order', 'anukul' ); ?></h1>
                    <p class="font-body-md text-body-md text-on-surface-variant max-w-xl">
                        <?php esc_html_e( 'Review your ceremonial apothecary items, precise dispatch coordinates, and secure transaction credentials.', 'anukul' ); ?>
                    </p>
                </div>

                <!-- Multi-Step Indicator -->
                <div class="flex items-center gap-3 sm:gap-6 bg-surface-container-low px-5 py-3 rounded-xl border border-surface-variant/60 shadow-sm self-start md:self-auto">
                    <!-- Step 1: Cart Completed -->
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-primary-container text-surface flex items-center justify-center font-label-sm text-label-sm">
                            <span class="material-symbols-outlined notranslate text-[14px]" translate="no">done</span>
                        </span>
                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-primary transition-colors"><?php esc_html_e( 'Cart', 'anukul' ); ?></a>
                    </div>
                    <div class="w-8 h-[1px] bg-outline-variant/60"></div>
                    <!-- Step 2: Checkout Active -->
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-label-sm font-bold shadow-sm">2</span>
                        <span class="font-label-md text-label-md uppercase tracking-wider text-primary font-bold"><?php esc_html_e( 'Checkout', 'anukul' ); ?></span>
                    </div>
                    <div class="w-8 h-[1px] bg-outline-variant/60"></div>
                    <!-- Step 3: Confirmation Upcoming -->
                    <div class="flex items-center gap-2 opacity-50">
                        <span class="w-6 h-6 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-label-sm text-label-sm">3</span>
                        <span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant"><?php esc_html_e( 'Confirmation', 'anukul' ); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- WOOCOMMERCE FORM WRAPPER -->
        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

            <!-- MAIN GRID CONTAINER -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-gutter-lg items-start">
                
                <!-- LEFT COLUMN: Checkout Form Sections (62% Desktop) -->
                <div class="lg:col-span-7 xl:col-span-8 flex flex-col gap-8">
                    
                    <?php if ( ! is_user_logged_in() ) : ?>
                    <!-- Returning Customer Notice -->
                    <div class="bg-surface-container-low border border-surface-variant rounded-xl p-4 sm:p-5 flex items-center justify-between gap-4 shadow-sm">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined notranslate text-secondary text-[22px]" translate="no">account_circle</span>
                            <p class="font-body-md text-body-md text-on-surface">
                                <?php esc_html_e( 'Returning patron to the sanctuary?', 'anukul' ); ?> 
                                <a class="font-semibold text-primary underline underline-offset-4 hover:text-tertiary transition-colors ml-1" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"><?php esc_html_e( 'Log in here', 'anukul' ); ?></a>
                            </p>
                        </div>
                        <span class="hidden sm:inline-block font-label-sm text-label-sm uppercase tracking-widest text-outline"><?php esc_html_e( 'Express Access', 'anukul' ); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                    <!-- SECTION 1: CUSTOMER INFORMATION -->
                    <section class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-8 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1.5 h-full bg-primary"></div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <span class="font-editorial-quote text-editorial-quote italic text-secondary">01</span>
                                <div>
                                    <h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide"><?php esc_html_e( 'Your Details', 'anukul' ); ?></h2>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Primary contact for consignment notifications and consultation records.', 'anukul' ); ?></p>
                                </div>
                            </div>
                            <span class="material-symbols-outlined notranslate text-outline-variant" translate="no">badge</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_first_name">
                                    <?php esc_html_e( 'First Name', 'anukul' ); ?> <span class="text-tertiary">*</span>
                                </label>
                                <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="billing_first_name" name="billing_first_name" placeholder="First Name" required="" type="text" value="<?php echo esc_attr( $checkout->get_value( 'billing_first_name' ) ); ?>" autocomplete="given-name" />
                            </div>
                            <div>
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_last_name">
                                    <?php esc_html_e( 'Last Name', 'anukul' ); ?> <span class="text-tertiary">*</span>
                                </label>
                                <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="billing_last_name" name="billing_last_name" placeholder="Last Name" required="" type="text" value="<?php echo esc_attr( $checkout->get_value( 'billing_last_name' ) ); ?>" autocomplete="family-name" />
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_email">
                                    <?php esc_html_e( 'Email Address', 'anukul' ); ?> <span class="text-tertiary">*</span>
                                </label>
                                <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="billing_email" name="billing_email" placeholder="name@domain.com" required="" type="email" value="<?php echo esc_attr( $checkout->get_value( 'billing_email' ) ); ?>" autocomplete="email username" />
                                <p class="font-body-sm text-body-sm text-outline mt-1.5 flex items-center gap-1.5">
                                    <span class="material-symbols-outlined notranslate text-[14px]" translate="no">lock</span>
                                    <?php esc_html_e( 'Your invoice and clinical batch test certs will be dispatched to this address.', 'anukul' ); ?>
                                </p>
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_phone">
                                    <?php esc_html_e( 'Mobile Number (Dispatch Coordination)', 'anukul' ); ?> <span class="text-tertiary">*</span>
                                </label>
                                <div class="flex rounded-lg overflow-hidden border border-surface-variant focus-within:border-primary focus-within:ring-1 focus-within:ring-primary bg-surface/70 transition-all">
                                    <div class="bg-surface-container px-4 py-3 font-body-md text-on-surface border-r border-surface-variant flex items-center gap-1 select-none">
                                        <span class="text-secondary font-semibold">🇮🇳 +91</span>
                                    </div>
                                    <input class="input-text w-full bg-transparent px-4 py-3 font-body-md text-on-surface focus:outline-none placeholder:text-outline-variant/60" id="billing_phone" name="billing_phone" placeholder="98765 43210" required="" type="tel" value="<?php echo esc_attr( $checkout->get_value( 'billing_phone' ) ); ?>" autocomplete="tel" />
                                </div>
                            </div>
                            <?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
                            <div class="sm:col-span-2 pt-1">
                                <label class="flex items-start gap-3 cursor-pointer group">
                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox mt-1 w-4 h-4 rounded border-surface-variant text-primary focus:ring-primary accent-primary" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" />
                                    <span class="font-body-sm text-body-sm text-on-surface-variant group-hover:text-on-surface transition-colors">
                                        <?php esc_html_e( 'Create an ANUKUL Sanctuary Account for expedited re-orders and personalized constitutional tracking.', 'anukul' ); ?>
                                    </span>
                                </label>
                            </div>
                            <?php endif; ?>
                        </div>
                    </section>

                    <!-- SECTION 2: BILLING ADDRESS -->
                    <section class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-8 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1.5 h-full bg-secondary"></div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <span class="font-editorial-quote text-editorial-quote italic text-secondary">02</span>
                                <div>
                                    <h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide"><?php esc_html_e( 'Billing Coordinates', 'anukul' ); ?></h2>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Official address associated with your payment instrument.', 'anukul' ); ?></p>
                                </div>
                            </div>
                            <span class="material-symbols-outlined notranslate text-outline-variant" translate="no">home_pin</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-5">
                            <div class="sm:col-span-6">
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_country">
                                    <?php esc_html_e( 'Country / Region', 'anukul' ); ?> <span class="text-tertiary">*</span>
                                </label>
                                <div class="relative">
                                    <?php
                                    $countries = WC()->countries->get_shipping_countries();
                                    $current_country = $checkout->get_value( 'billing_country' ) ?: 'IN';
                                    ?>
                                    <select class="country_to_state country_select w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all appearance-none cursor-pointer" id="billing_country" name="billing_country" autocomplete="country">
                                        <?php foreach ( $countries as $code => $country_name ) : ?>
                                            <option value="<?php echo esc_attr( $code ); ?>" <?php selected( $current_country, $code ); ?>><?php echo esc_html( $country_name ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="material-symbols-outlined notranslate absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-outline" translate="no">expand_more</span>
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_address_1">
                                    <?php esc_html_e( 'Street Address', 'anukul' ); ?> <span class="text-tertiary">*</span>
                                </label>
                                <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="billing_address_1" name="billing_address_1" placeholder="House number, residential enclave, or street name" required="" type="text" value="<?php echo esc_attr( $checkout->get_value( 'billing_address_1' ) ); ?>" autocomplete="address-line1" />
                            </div>
                            <div class="sm:col-span-6">
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_address_2">
                                    <?php esc_html_e( 'Apartment, Suite, Unit, Villa', 'anukul' ); ?> <span class="text-outline text-label-sm font-normal">(Optional)</span>
                                </label>
                                <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="billing_address_2" name="billing_address_2" placeholder="Tower B, Penthouse 4B / Spatial Sector 7" type="text" value="<?php echo esc_attr( $checkout->get_value( 'billing_address_2' ) ); ?>" autocomplete="address-line2" />
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_city">
                                    <?php esc_html_e( 'City / District', 'anukul' ); ?> <span class="text-tertiary">*</span>
                                </label>
                                <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="billing_city" name="billing_city" placeholder="Bengaluru" required="" type="text" value="<?php echo esc_attr( $checkout->get_value( 'billing_city' ) ); ?>" autocomplete="address-level2" />
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_state">
                                    <?php esc_html_e( 'State', 'anukul' ); ?> <span class="text-tertiary">*</span>
                                </label>
                                <div class="relative">
                                    <?php
                                    $states = WC()->countries->get_states( $current_country );
                                    $current_state = $checkout->get_value( 'billing_state' ) ?: 'KA';
                                    if ( ! empty( $states ) ) :
                                    ?>
                                    <select class="state_select w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all appearance-none cursor-pointer" id="billing_state" name="billing_state" autocomplete="address-level1">
                                        <?php foreach ( $states as $code => $state_name ) : ?>
                                            <option value="<?php echo esc_attr( $code ); ?>" <?php selected( $current_state, $code ); ?>><?php echo esc_html( $state_name ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="material-symbols-outlined notranslate absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-outline" translate="no">expand_more</span>
                                    <?php else : ?>
                                    <input type="text" class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary" id="billing_state" name="billing_state" value="<?php echo esc_attr( $current_state ); ?>" placeholder="State / Province" />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="billing_postcode">
                                    <?php esc_html_e( 'PIN Code', 'anukul' ); ?> <span class="text-tertiary">*</span>
                                </label>
                                <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="billing_postcode" name="billing_postcode" pattern="[0-9]{6}" placeholder="560034" required="" type="text" value="<?php echo esc_attr( $checkout->get_value( 'billing_postcode' ) ); ?>" autocomplete="postal-code" />
                            </div>
                        </div>
                    </section>

                    <!-- SECTION 3: DELIVERY DETAILS & METHODS -->
                    <section class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-8 shadow-sm relative overflow-hidden">
                        <div class="absolute top-0 left-0 w-1.5 h-full bg-primary-container"></div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <span class="font-editorial-quote text-editorial-quote italic text-secondary">03</span>
                                <div>
                                    <h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide"><?php esc_html_e( 'Delivery Logistics', 'anukul' ); ?></h2>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Mindfully packaged in ecological, vibration-dampening craft paper.', 'anukul' ); ?></p>
                                </div>
                            </div>
                            <span class="material-symbols-outlined notranslate text-outline-variant" translate="no">local_shipping</span>
                        </div>
                        
                        <!-- Ship to different address toggle -->
                        <div class="mb-6 p-4 bg-surface-container-low rounded-lg border border-surface-variant/70">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox w-4 h-4 rounded border-surface-variant text-primary focus:ring-primary accent-primary" id="ship-to-different-address-checkbox" name="ship_to_different_address" value="1" type="checkbox" onchange="document.getElementById('altShippingWrap').classList.toggle('hidden', !this.checked)" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> />
                                <span class="font-body-md text-body-md font-medium text-on-surface"><?php esc_html_e( 'Ship to a different physical address?', 'anukul' ); ?></span>
                            </label>
                            
                            <div class="hidden mt-4 pt-4 border-t border-surface-variant/50 space-y-4" id="altShippingWrap">
                                <p class="font-body-sm text-body-sm text-outline"><?php esc_html_e( 'Specify secondary sanctuary location or recipient details:', 'anukul' ); ?></p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-2.5 font-body-sm text-on-surface focus:outline-none focus:border-primary" name="shipping_first_name" id="shipping_first_name" placeholder="Recipient First Name" type="text" value="<?php echo esc_attr( $checkout->get_value( 'shipping_first_name' ) ); ?>" />
                                    <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-2.5 font-body-sm text-on-surface focus:outline-none focus:border-primary" name="shipping_last_name" id="shipping_last_name" placeholder="Recipient Last Name" type="text" value="<?php echo esc_attr( $checkout->get_value( 'shipping_last_name' ) ); ?>" />
                                </div>
                                <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-2.5 font-body-sm text-on-surface focus:outline-none focus:border-primary" name="shipping_address_1" id="shipping_address_1" placeholder="Destination Street & Residential Enclave" type="text" value="<?php echo esc_attr( $checkout->get_value( 'shipping_address_1' ) ); ?>" />
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-2.5 font-body-sm text-on-surface focus:outline-none focus:border-primary" name="shipping_city" id="shipping_city" placeholder="City" type="text" value="<?php echo esc_attr( $checkout->get_value( 'shipping_city' ) ); ?>" />
                                    <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-2.5 font-body-sm text-on-surface focus:outline-none focus:border-primary" name="shipping_state" id="shipping_state" placeholder="State" type="text" value="<?php echo esc_attr( $checkout->get_value( 'shipping_state' ) ); ?>" />
                                    <input class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-2.5 font-body-sm text-on-surface focus:outline-none focus:border-primary" name="shipping_postcode" id="shipping_postcode" placeholder="PIN Code" type="text" value="<?php echo esc_attr( $checkout->get_value( 'shipping_postcode' ) ); ?>" />
                                </div>
                            </div>
                        </div>

                        <!-- Special Dispatch / Practitioner Instructions -->
                        <div class="mb-6">
                            <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="order_comments">
                                <?php esc_html_e( 'Sanctuary Clinical Delivery Notes', 'anukul' ); ?> <span class="text-outline text-label-sm font-normal">(Optional)</span>
                            </label>
                            <textarea class="input-text w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="order_comments" name="order_comments" rows="2" placeholder="e.g. Leave with security, ring door chime, or notes for consecrated packaging..."><?php echo esc_textarea( $checkout->get_value( 'order_comments' ) ); ?></textarea>
                        </div>

                        <!-- Shipping Options Selection -->
                        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                            <label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-3"><?php esc_html_e( 'Select Dispatch Cadence', 'anukul' ); ?></label>
                            <div class="space-y-3">
                                <?php wc_cart_totals_shipping_html(); ?>
                            </div>
                        <?php else : ?>
                            <div class="p-4 rounded-xl border border-primary/30 bg-primary/5 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined notranslate text-primary text-[20px]" translate="no">verified</span>
                                    <div>
                                        <span class="font-body-md text-body-md font-semibold text-primary"><?php esc_html_e( 'Standard Insured Carriage Included', 'anukul' ); ?></span>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Insured pan-India dispatch via climate-monitored courier network.', 'anukul' ); ?></p>
                                    </div>
                                </div>
                                <span class="font-label-sm text-label-sm bg-surface-container px-2 py-0.5 rounded text-secondary font-medium tracking-wider uppercase"><?php esc_html_e( 'Complimentary', 'anukul' ); ?></span>
                            </div>
                        <?php endif; ?>
                    </section>

                    <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                    <!-- SECTION 4: PAYMENT SELECTION -->
                    <section class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-8 shadow-sm relative overflow-hidden" id="payment">
                        <div class="absolute top-0 left-0 w-1.5 h-full bg-tertiary"></div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <span class="font-editorial-quote text-editorial-quote italic text-secondary">04</span>
                                <div>
                                    <h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide"><?php esc_html_e( 'Payment Gateway', 'anukul' ); ?></h2>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'RBI authorized payment rails with 256-bit AES encryption.', 'anukul' ); ?></p>
                                </div>
                            </div>
                            <span class="material-symbols-outlined notranslate text-outline-variant" translate="no">encrypted</span>
                        </div>
                        
                        <div class="space-y-4">
                            <?php
                            $available_gateways = WC()->payment_gateways->get_available_payment_gateways();
                            if ( ! empty( $available_gateways ) ) :
                                $chosen_gateway = WC()->session->get( 'chosen_payment_method' );
                                if ( empty( $chosen_gateway ) || ! isset( $available_gateways[ $chosen_gateway ] ) ) {
                                    $chosen_gateway = current( array_keys( $available_gateways ) );
                                }
                                foreach ( $available_gateways as $gateway ) :
                                    $is_chosen = ( $gateway->id === $chosen_gateway );
                            ?>
                                <div class="payment-card border <?php echo $is_chosen ? 'border-primary bg-primary/5' : 'border-surface-variant bg-surface/50'; ?> rounded-xl overflow-hidden transition-all duration-200" id="card_gateway_<?php echo esc_attr( $gateway->id ); ?>">
                                    <label class="flex items-center justify-between p-4 cursor-pointer hover:bg-surface-container-low transition-colors" for="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
                                        <div class="flex items-center gap-3">
                                            <input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio w-4 h-4 text-primary accent-primary" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $is_chosen, true ); ?> onchange="window.selectPaymentGateway('<?php echo esc_attr( $gateway->id ); ?>')" />
                                            <div>
                                                <span class="font-body-md text-body-md font-semibold text-primary"><?php echo esc_html( $gateway->get_title() ); ?></span>
                                                <p class="font-body-sm text-body-sm text-on-surface-variant">
                                                    <?php
                                                    if ( $gateway->id === 'bacs' ) {
                                                        esc_html_e( 'Instant processing via Direct Bank Settlement, UPI & NetBanking', 'anukul' );
                                                    } elseif ( $gateway->id === 'cod' ) {
                                                        esc_html_e( 'Remit payment in cash upon consignment hand-off / clinical arrival', 'anukul' );
                                                    } else {
                                                        echo wp_kses_post( $gateway->get_description() );
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <!-- Payment Badges -->
                                        <div class="flex items-center gap-1.5 text-outline">
                                            <?php if ( $gateway->id === 'bacs' ) : ?>
                                                <span class="font-label-sm text-label-sm bg-surface-container px-2 py-1 rounded text-primary font-bold">UPI</span>
                                                <span class="font-label-sm text-label-sm bg-surface-container px-2 py-1 rounded text-primary font-bold">CARDS</span>
                                                <span class="font-label-sm text-label-sm bg-surface-container px-2 py-1 rounded text-primary font-bold">NETBANKING</span>
                                            <?php elseif ( $gateway->id === 'cod' ) : ?>
                                                <span class="font-label-sm text-label-sm bg-surface-variant text-on-surface-variant px-2.5 py-1 rounded tracking-wider uppercase font-semibold">VERIFIED PINS</span>
                                            <?php endif; ?>
                                        </div>
                                    </label>
                                    
                                    <!-- Nested details drawer -->
                                    <div class="payment-box-drawer p-4 border-t border-surface-variant bg-surface-container-low/50 <?php echo $is_chosen ? '' : 'hidden'; ?>" id="details_gateway_<?php echo esc_attr( $gateway->id ); ?>">
                                        <div class="flex items-start gap-3">
                                            <span class="material-symbols-outlined notranslate text-secondary text-[20px] mt-0.5" translate="no">verified_user</span>
                                            <div class="space-y-1">
                                                <p class="font-body-sm text-body-sm text-on-surface">
                                                    <?php
                                                    if ( $gateway->has_fields() || $gateway->get_description() ) {
                                                        echo wp_kses_post( $gateway->get_description() );
                                                    } else {
                                                        esc_html_e( 'Your transaction is safeguarded by 256-bit AES encryption. Complete your order securely.', 'anukul' );
                                                    }
                                                    ?>
                                                </p>
                                                <p class="font-label-sm text-label-sm uppercase text-outline tracking-wider"><?php esc_html_e( 'Zero Transaction Surcharge • 100% Secure Enclave', 'anukul' ); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endforeach;
                            else :
                                echo '<p class="font-body-sm text-body-sm text-on-surface-variant">' . esc_html__( 'No payment methods are currently configured for your location.', 'woocommerce' ) . '</p>';
                            endif;
                            ?>
                        </div>
                    </section>

                    <!-- SECTION 5: STATUTORY TERMS & CONFIRMATION NOTE -->
                    <section class="bg-surface-container-low border border-surface-variant/80 rounded-xl p-6 space-y-4">
                        <label class="flex items-start gap-3 cursor-pointer group">
                            <input checked="" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox mt-1 w-4 h-4 rounded border-surface-variant text-primary focus:ring-primary accent-primary" id="termsCheck" name="terms" required="" type="checkbox"/>
                            <span class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                                <?php esc_html_e( 'I have read, comprehended, and solemnly agree to the', 'anukul' ); ?> 
                                <a class="text-primary font-semibold underline underline-offset-2 hover:text-tertiary" data-path="terms" href="<?php echo esc_url( home_url( '/contact/#terms' ) ); ?>" target="_blank"><?php esc_html_e( 'Terms & Conditions', 'anukul' ); ?></a>, 
                                <a class="text-primary font-semibold underline underline-offset-2 hover:text-tertiary" data-path="privacy-policy" href="<?php echo esc_url( home_url( '/contact/#privacy' ) ); ?>" target="_blank"><?php esc_html_e( 'Privacy Policy', 'anukul' ); ?></a>, <?php esc_html_e( 'and', 'anukul' ); ?> 
                                <a class="text-primary font-semibold underline underline-offset-2 hover:text-tertiary" data-path="disclaimer" href="<?php echo esc_url( home_url( '/contact/#disclaimer' ) ); ?>" target="_blank"><?php esc_html_e( 'Ayurvedic Practice & Spatial Alignment Disclaimers', 'anukul' ); ?></a>.
                            </span>
                        </label>
                        <div class="p-3 bg-surface rounded-lg border border-surface-variant flex items-center gap-3">
                            <span class="material-symbols-outlined notranslate text-outline-variant text-[20px]" translate="no">fact_check</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">
                                <?php esc_html_e( 'Kindly inspect all shipping details prior to executing order. Once consecrated, custom engraved Vastu Yantras cannot be recalled.', 'anukul' ); ?>
                            </p>
                        </div>
                    </section>

                </div>

                <!-- RIGHT COLUMN: Sticky Order Summary & Direct Actions (38% Desktop) -->
                <aside class="lg:col-span-5 xl:col-span-4 sticky top-24 space-y-6">
                    <div class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-7 shadow-md">
                        
                        <!-- Summary Header -->
                        <div class="flex items-center justify-between pb-4 border-b border-surface-variant">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined notranslate text-secondary text-[22px]" translate="no">shopping_bag</span>
                                <h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide"><?php esc_html_e( 'Your Order', 'anukul' ); ?></h2>
                            </div>
                            <a class="font-label-md text-label-md uppercase tracking-wider text-secondary hover:text-primary transition-colors flex items-center gap-1 font-semibold" data-path="cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                                <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_back</span>
                                <?php esc_html_e( 'Edit Cart', 'anukul' ); ?>
                            </a>
                        </div>

                        <!-- Product Cart Items Loop -->
                        <div class="divide-y divide-surface-variant/60 py-2 max-h-[380px] overflow-y-auto pr-1">
                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                    $thumbnail = $_product->get_image( 'woocommerce_gallery_thumbnail', array( 'class' => 'w-full h-full object-cover' ) );
                                    $product_name = $_product->get_name();
                                    $categories = wp_get_post_terms( $product_id, 'product_cat', array( 'fields' => 'names' ) );
                                    $category_tag = ! empty( $categories ) ? $categories[0] : __( 'Apothecary', 'anukul' );
                            ?>
                                <div class="py-4 flex gap-4 items-center">
                                    <div class="cart-item-thumb relative w-16 h-16 rounded-lg overflow-hidden border border-surface-variant bg-surface-container shrink-0">
                                        <?php if ( empty( $thumbnail ) ) : ?>
                                            <div class="w-full h-full flex items-center justify-center text-outline">
                                                <span class="material-symbols-outlined notranslate text-[24px]" translate="no">spa</span>
                                            </div>
                                        <?php else : ?>
                                            <div class="w-full h-full">
                                                <?php echo $thumbnail; ?>
                                            </div>
                                        <?php endif; ?>
                                        <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-primary text-surface flex items-center justify-center font-label-sm text-label-sm font-bold shadow-sm">
                                            <?php echo esc_html( $cart_item['quantity'] ); ?>
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-body-md text-body-md font-semibold text-primary truncate">
                                            <?php if ( $product_permalink ) : ?>
                                                <a href="<?php echo esc_url( $product_permalink ); ?>" class="hover:text-tertiary transition-colors"><?php echo esc_html( $product_name ); ?></a>
                                            <?php else : ?>
                                                <?php echo esc_html( $product_name ); ?>
                                            <?php endif; ?>
                                        </h3>
                                        <p class="font-body-sm text-body-sm text-outline-variant truncate">
                                            <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                                        </p>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span class="font-label-sm text-label-sm bg-surface-container px-2 py-0.5 rounded text-on-surface-variant uppercase tracking-wider">
                                                <?php echo esc_html( strtoupper( $category_tag ) ); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-right shrink-0">
                                        <span class="font-body-md text-body-md font-bold text-on-surface">
                                            <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                                        </span>
                                    </div>
                                </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>

                        <!-- Financial Calculation Matrix -->
                        <div class="space-y-3 pt-4 border-t border-surface-variant font-body-md text-body-md">
                            <div class="flex justify-between text-on-surface-variant">
                                <span><?php esc_html_e( 'Items Subtotal', 'anukul' ); ?></span>
                                <span class="font-medium text-on-surface" id="calcSubtotal"><?php wc_cart_totals_subtotal_html(); ?></span>
                            </div>
                            
                            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                            <div class="flex justify-between text-on-surface-variant items-center">
                                <div class="flex items-center gap-1.5">
                                    <span><?php esc_html_e( 'Sanctuary Dispatch', 'anukul' ); ?></span>
                                    <span class="material-symbols-outlined notranslate text-[14px] text-outline cursor-help" translate="no" title="<?php esc_attr_e( 'Standard insured pan-India carriage', 'anukul' ); ?>">info</span>
                                </div>
                                <span class="font-medium text-on-surface" id="calcShipping">
                                    <?php
                                    $shipping_total = WC()->cart->get_shipping_total();
                                    echo $shipping_total > 0 ? wc_price( $shipping_total ) : __( 'Calculated at dispatch', 'anukul' );
                                    ?>
                                </span>
                            </div>
                            <?php endif; ?>

                            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                            <div class="flex justify-between text-secondary">
                                <span><?php esc_html_e( 'Concession', 'anukul' ); ?> (<?php echo esc_html( $code ); ?>)</span>
                                <span class="font-semibold"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
                            </div>
                            <?php endforeach; ?>

                            <!-- Dynamic Taxes from WooCommerce -->
                            <?php if ( wc_tax_enabled() ) : ?>
                                <?php
                                $tax_totals = WC()->cart->get_tax_totals();
                                if ( ! empty( $tax_totals ) ) :
                                    foreach ( $tax_totals as $code => $tax ) : ?>
                                        <div class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?> flex justify-between text-outline text-body-sm">
                                            <span class="flex items-center gap-1">
                                                <?php echo esc_html( $tax->label ); ?>
                                                <?php if ( WC()->cart->display_prices_including_tax() ) : ?>
                                                    <span class="text-[11px] text-surface-tint font-medium">(<?php esc_html_e( 'Included', 'anukul' ); ?>)</span>
                                                <?php endif; ?>
                                            </span>
                                            <span class="font-medium text-on-surface"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
                                        </div>
                                    <?php endforeach;
                                elseif ( WC()->cart->get_taxes_total() > 0 ) : ?>
                                    <div class="tax-total flex justify-between text-outline text-body-sm">
                                        <span class="flex items-center gap-1">
                                            <?php echo esc_html( WC()->countries->tax_or_vat() ); ?>
                                            <?php if ( WC()->cart->display_prices_including_tax() ) : ?>
                                                <span class="text-[11px] text-surface-tint font-medium">(<?php esc_html_e( 'Included', 'anukul' ); ?>)</span>
                                            <?php endif; ?>
                                        </span>
                                        <span class="font-medium text-on-surface"><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></span>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <!-- Total Line -->
                            <div class="flex justify-between items-baseline pt-4 border-t border-surface-variant">
                                <div>
                                    <span class="font-label-md text-label-md uppercase tracking-wider text-secondary font-bold block"><?php esc_html_e( 'Final Remittance', 'anukul' ); ?></span>
                                    <span class="font-body-sm text-body-sm text-outline"><?php esc_html_e( 'All statutory levies included', 'anukul' ); ?></span>
                                </div>
                                <div class="text-right">
                                    <span class="font-headline-md text-headline-md text-primary font-bold" id="calcTotal">
                                        <?php wc_cart_totals_order_total_html(); ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Main CTA: Place Order Button with native WooCommerce attributes -->
                        <div class="mt-6">
                            <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
                            <button type="submit" class="button alt w-full bg-[#1F4D3A] hover:bg-[#7A2638] text-[#F7F1E3] py-4 px-6 rounded-lg font-label-md text-label-md uppercase tracking-widest transition-all duration-300 flex items-center justify-center gap-3 shadow-md hover:shadow-lg active:scale-[0.99] group cursor-pointer" name="woocommerce_checkout_place_order" id="place_order" value="<?php esc_attr_e( 'Place order', 'woocommerce' ); ?>" data-value="<?php esc_attr_e( 'Place order', 'woocommerce' ); ?>">
                                <span class="material-symbols-outlined notranslate text-[20px] transition-transform group-hover:translate-x-0.5" translate="no">lock</span>
                                <span id="placeOrderText"><?php esc_html_e( 'Place Order — ', 'anukul' ); ?><?php wc_cart_totals_order_total_html(); ?></span>
                            </button>
                            <p class="font-label-sm text-label-sm text-center text-outline uppercase tracking-wider mt-2.5">
                                <?php esc_html_e( 'Instant Order Confirmation Via WhatsApp & Email', 'anukul' ); ?>
                            </p>
                        </div>

                        <!-- Trust Badges -->
                        <div class="mt-6 pt-6 border-t border-surface-variant/70 space-y-3.5">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined notranslate text-secondary text-[20px] shrink-0 mt-0.5" translate="no">workspace_premium</span>
                                <div>
                                    <h4 class="font-label-md text-label-md uppercase font-bold text-primary tracking-wide"><?php esc_html_e( 'Handcrafted & Authenticated', 'anukul' ); ?></h4>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Forged from pure Vedic metals and organically sourced snehana herbs.', 'anukul' ); ?></p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined notranslate text-secondary text-[20px] shrink-0 mt-0.5" translate="no">verified</span>
                                <div>
                                    <h4 class="font-label-md text-label-md uppercase font-bold text-primary tracking-wide"><?php esc_html_e( 'Secure 256-bit Encrypted Checkout', 'anukul' ); ?></h4>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Compliant with the highest Indian banking cybersecurity guidelines.', 'anukul' ); ?></p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined notranslate text-secondary text-[20px] shrink-0 mt-0.5" translate="no">spatial_tracking</span>
                                <div>
                                    <h4 class="font-label-md text-label-md uppercase font-bold text-primary tracking-wide"><?php esc_html_e( 'Verified Real-Time Consignment Tracking', 'anukul' ); ?></h4>
                                    <p class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Live WhatsApp & SMS updates upon sanctuary release and courier dispatch.', 'anukul' ); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Assistance Box -->
                        <div class="mt-6 p-4 bg-surface-container rounded-lg border border-surface-variant text-center">
                            <p class="font-body-sm text-body-sm text-on-surface">
                                <?php esc_html_e( 'Need assistance with your formulation selection?', 'anukul' ); ?>
                            </p>
                            <a class="inline-flex items-center gap-1.5 font-label-md text-label-md uppercase tracking-wider text-secondary font-bold hover:text-primary transition-colors mt-1" data-path="contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                                <span class="material-symbols-outlined notranslate text-[16px]" translate="no">support_agent</span>
                                <?php esc_html_e( 'Contact Sanctuary Concierge', 'anukul' ); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Cardinal Vastu Orientation Micro-Indicator -->
                    <div class="p-4 bg-surface-container-low rounded-xl border border-surface-variant flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full border border-secondary/40 flex items-center justify-center text-secondary">
                                <span class="material-symbols-outlined notranslate text-[18px]" translate="no">explore</span>
                            </div>
                            <div>
                                <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block font-bold"><?php esc_html_e( 'Vastu Aligned Packaging', 'anukul' ); ?></span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Stored and assembled in the Ishanya (NE) zone.', 'anukul' ); ?></span>
                            </div>
                        </div>
                        <span class="font-editorial-quote text-editorial-quote italic text-secondary/60"> ईशान </span>
                    </div>

                </aside>

            </div>

        </form>

    </div>
</div>

<script>
window.selectPaymentGateway = function(gatewayId) {
    // Hide all drawers
    document.querySelectorAll('.payment-box-drawer').forEach(function(drawer) {
        drawer.classList.add('hidden');
    });
    // Reset all card borders
    document.querySelectorAll('.payment-card').forEach(function(card) {
        card.classList.remove('border-primary', 'bg-primary/5');
        card.classList.add('border-surface-variant', 'bg-surface/50');
    });
    // Activate selected
    var selectedCard = document.getElementById('card_gateway_' + gatewayId);
    var selectedDrawer = document.getElementById('details_gateway_' + gatewayId);
    if (selectedCard) {
        selectedCard.classList.remove('border-surface-variant', 'bg-surface/50');
        selectedCard.classList.add('border-primary', 'bg-primary/5');
    }
    if (selectedDrawer) {
        selectedDrawer.classList.remove('hidden');
    }
};
</script>

<?php
do_action( 'woocommerce_after_checkout_form', $checkout );

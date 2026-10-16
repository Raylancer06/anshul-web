<?php
/**
 * ANUKUL WooCommerce Cart Template
 * Matches Main/cart.html approved design specifications while maintaining 100% WooCommerce functionality.
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_cart' );

// If Cart is Empty
if ( WC()->cart->is_empty() ) : ?>
<div class="flex flex-col w-full">
    <!-- Stepper & Editorial Cart Header -->
    <section class="w-full bg-surface-container-low/60 border-b border-surface-variant/70">
        <div class="max-w-[1320px] mx-auto px-6 sm:px-10 lg:px-16 pt-8 pb-10">
            <!-- Breadcrumb -->
            <nav aria-label="Breadcrumb" class="flex items-center gap-2 font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/80 mb-6">
                <a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'anukul' ); ?></a>
                <span class="text-outline-variant text-[10px]">•</span>
                <a class="hover:text-primary transition-colors" data-path="shop" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Shop', 'anukul' ); ?></a>
                <span class="text-outline-variant text-[10px]">•</span>
                <span class="text-secondary font-semibold"><?php esc_html_e( 'Cart', 'anukul' ); ?></span>
            </nav>
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-lg text-secondary font-label-sm text-label-sm uppercase tracking-[0.16em] mb-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                        <?php esc_html_e( 'Sanctuary Apothecary & Instruments', 'anukul' ); ?>
                    </div>
                    <h1 class="font-headline-lg text-headline-lg text-primary tracking-tight"><?php esc_html_e( 'Your Shopping Cart', 'anukul' ); ?></h1>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-xl">
                        <?php esc_html_e( 'Review your selection of authentic botanical formulations and handcrafted Ayurvedic instruments before proceeding to sacred checkout.', 'anukul' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Empty Cart View (from Main/cart.html) -->
    <div class="flex flex-col items-center justify-center py-20 px-6 max-w-2xl mx-auto text-center" id="empty-cart-container">
        <!-- Architectural Sacred Geometry Motif Icon -->
        <div class="relative w-32 h-32 rounded-full bg-surface-container-high/60 border border-secondary/30 flex items-center justify-center mb-8 shadow-inner">
            <div class="absolute inset-2 rounded-full border border-dashed border-secondary/20"></div>
            <div class="w-16 h-16 rounded-full bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm">
                <span class="material-symbols-outlined notranslate text-[36px] text-secondary" translate="no">shopping_bag</span>
            </div>
        </div>
        <div class="inline-flex items-center gap-1 px-3 py-1 bg-surface-container rounded-md text-secondary font-label-sm text-label-sm uppercase tracking-widest mb-3">
            <?php esc_html_e( 'Vedic Vessel Empty', 'anukul' ); ?>
        </div>
        <h2 class="font-headline-lg text-headline-lg text-primary tracking-tight"><?php esc_html_e( 'Your Cart is Waiting for You', 'anukul' ); ?></h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mt-3 max-w-md leading-relaxed">
            <?php esc_html_e( 'Your sacred basket currently holds no preparations. Explore our apothecary of doshic herbs, classical oils, and hand-forged bronze instruments.', 'anukul' ); ?>
        </p>
        <div class="mt-8 flex flex-col sm:flex-row items-center gap-4">
            <a class="w-full sm:w-auto px-8 py-4 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-[0.14em] hover:bg-tertiary transition-all shadow-md flex items-center justify-center gap-2 font-bold" data-path="shop" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">
                <span class="material-symbols-outlined notranslate text-[18px]" translate="no">storefront</span>
                <?php esc_html_e( 'Explore the Shop', 'anukul' ); ?>
            </a>
            <a class="w-full sm:w-auto px-6 py-4 rounded-lg border border-secondary text-primary font-label-md text-label-md uppercase tracking-wider hover:bg-secondary-fixed/30 transition-colors" href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>">
                <?php esc_html_e( 'Book Consultation', 'anukul' ); ?>
            </a>
        </div>
        <!-- Quick Category Recommendations for Empty Basket -->
        <div class="mt-14 pt-10 border-t border-surface-variant w-full">
            <span class="font-label-md text-label-md uppercase tracking-widest text-outline block mb-5"><?php esc_html_e( 'Recommended Curations', 'anukul' ); ?></span>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-left">
                <a class="p-3.5 rounded-lg bg-surface-container-lowest border border-surface-variant hover:border-secondary transition-colors group shadow-sm" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>?category=instruments">
                    <span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider block font-bold"><?php esc_html_e( 'Instrument', 'anukul' ); ?></span>
                    <span class="font-body-md text-body-md text-primary font-medium group-hover:text-tertiary mt-1 block"><?php esc_html_e( 'Kansa Wand Massager', 'anukul' ); ?></span>
                </a>
                <a class="p-3.5 rounded-lg bg-surface-container-lowest border border-surface-variant hover:border-secondary transition-colors group shadow-sm" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>?category=ayurveda">
                    <span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider block font-bold"><?php esc_html_e( 'Abhyanga', 'anukul' ); ?></span>
                    <span class="font-body-md text-body-md text-primary font-medium group-hover:text-tertiary mt-1 block"><?php esc_html_e( 'Cold-Pressed Taila', 'anukul' ); ?></span>
                </a>
                <a class="p-3.5 rounded-lg bg-surface-container-lowest border border-surface-variant hover:border-secondary transition-colors group col-span-2 sm:col-span-1 shadow-sm" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>?category=vastu">
                    <span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider block font-bold"><?php esc_html_e( 'Space & Vastu', 'anukul' ); ?></span>
                    <span class="font-body-md text-body-md text-primary font-medium group-hover:text-tertiary mt-1 block"><?php esc_html_e( 'Consecrated Yantra', 'anukul' ); ?></span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php return; endif; ?>

<!-- Active Cart View -->
<div class="flex flex-col w-full">
    <!-- Stepper & Editorial Cart Header -->
    <section class="w-full bg-surface-container-low/60 border-b border-surface-variant/70">
        <div class="max-w-[1320px] mx-auto px-6 sm:px-10 lg:px-16 pt-8 pb-10">
            <!-- Breadcrumb -->
            <nav aria-label="Breadcrumb" class="flex items-center gap-2 font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/80 mb-6">
                <a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'anukul' ); ?></a>
                <span class="text-outline-variant text-[10px]">•</span>
                <a class="hover:text-primary transition-colors" data-path="shop" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Shop', 'anukul' ); ?></a>
                <span class="text-outline-variant text-[10px]">•</span>
                <span class="text-secondary font-semibold"><?php esc_html_e( 'Cart', 'anukul' ); ?></span>
            </nav>
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-lg text-secondary font-label-sm text-label-sm uppercase tracking-[0.16em] mb-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                        <?php esc_html_e( 'Sanctuary Apothecary & Instruments', 'anukul' ); ?>
                    </div>
                    <h1 class="font-headline-lg text-headline-lg text-primary tracking-tight"><?php esc_html_e( 'Your Shopping Cart', 'anukul' ); ?></h1>
                    <p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-xl">
                        <?php esc_html_e( 'Review your selection of authentic botanical formulations and handcrafted Ayurvedic instruments before proceeding to sacred checkout.', 'anukul' ); ?>
                    </p>
                </div>
                <!-- Checkout Stepper Progress -->
                <div class="bg-surface-container-lowest p-3 rounded-xl shadow-sm border border-surface-variant flex items-center gap-3 sm:gap-6 self-start lg:self-auto">
                    <!-- Step 1 (Active) -->
                    <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-label-sm font-bold shadow-sm">
                            01
                        </div>
                        <div class="flex flex-col">
                            <span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold"><?php esc_html_e( 'Cart', 'anukul' ); ?></span>
                            <span class="text-[10px] text-secondary font-medium tracking-wide"><?php esc_html_e( 'Review Items', 'anukul' ); ?></span>
                        </div>
                    </div>
                    <div class="h-0.5 w-6 bg-secondary/40"></div>
                    <!-- Step 2 -->
                    <div class="flex items-center gap-2.5 opacity-60">
                        <div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-sm text-label-sm">
                            02
                        </div>
                        <div class="flex flex-col">
                            <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium"><?php esc_html_e( 'Checkout', 'anukul' ); ?></span>
                            <span class="text-[10px] text-outline tracking-wide"><?php esc_html_e( 'Address & Payment', 'anukul' ); ?></span>
                        </div>
                    </div>
                    <div class="h-0.5 w-6 bg-surface-variant"></div>
                    <!-- Step 3 -->
                    <div class="flex items-center gap-2.5 opacity-60">
                        <div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-sm text-label-sm">
                            03
                        </div>
                        <div class="flex flex-col">
                            <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium"><?php esc_html_e( 'Confirmation', 'anukul' ); ?></span>
                            <span class="text-[10px] text-outline tracking-wide"><?php esc_html_e( 'Sacred Dispatch', 'anukul' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Dispatch Banner -->
    <div class="w-full bg-surface-container-high/40 border-b border-surface-variant/40">
        <div class="max-w-[1320px] mx-auto px-6 sm:px-10 lg:px-16 py-2.5 flex items-center justify-between">
            <div class="flex items-center gap-2 font-body-sm text-body-sm text-on-surface-variant">
                <span class="material-symbols-outlined notranslate text-[16px] text-secondary" translate="no">local_shipping</span>
                <span><?php esc_html_e( 'Complimentary Sanctuary Surface Dispatch on all sacred orders across India.', 'anukul' ); ?></span>
            </div>
            <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="font-label-md text-label-md uppercase tracking-wider text-primary hover:text-tertiary transition-colors flex items-center gap-1.5 font-semibold">
                <span class="material-symbols-outlined notranslate text-[18px]" translate="no">storefront</span>
                <span><?php esc_html_e( 'Browse Remedies', 'anukul' ); ?></span>
            </a>
        </div>
    </div>

    <!-- Primary Cart Form Area -->
    <div class="w-full max-w-[1320px] mx-auto px-6 sm:px-10 lg:px-16 py-10 lg:py-14">
        <?php wc_print_notices(); ?>

        <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            <?php do_action( 'woocommerce_before_cart_table' ); ?>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-gutter-lg items-start" id="active-cart-container">
                <!-- Left Column (8 Cols): Items Table & Actions -->
                <div class="lg:col-span-8 flex flex-col space-y-6">
                    <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-surface-variant overflow-hidden">
                        <!-- Desktop Table Header -->
                        <div class="hidden sm:grid sm:grid-cols-12 px-6 py-4 bg-surface-container border-b border-surface-variant font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">
                            <div class="col-span-6"><?php esc_html_e( 'Sanctuary Item', 'anukul' ); ?></div>
                            <div class="col-span-2 text-center"><?php esc_html_e( 'Unit Price', 'anukul' ); ?></div>
                            <div class="col-span-2 text-center"><?php esc_html_e( 'Quantity', 'anukul' ); ?></div>
                            <div class="col-span-2 text-right"><?php esc_html_e( 'Subtotal', 'anukul' ); ?></div>
                        </div>

                        <!-- Items List -->
                        <div class="divide-y divide-surface-variant" id="cart-item-list">
                            <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                if ( ! $_product || ! $_product->exists() || $cart_item['quantity'] <= 0 || ! apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                    continue;
                                }

                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'woocommerce_thumbnail', array( 'class' => 'w-full h-full object-cover' ) ), $cart_item, $cart_item_key );
                                
                                // Fetch category or default category subtitle
                                $terms = get_the_terms( $product_id, 'product_cat' );
                                $cat_title = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : __( 'Vedic Botanical Formulation', 'anukul' );
                            ?>
                                <div class="cart-item p-6 transition-all duration-300">
                                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
                                        <!-- Product Media & Details (6 cols) -->
                                        <div class="sm:col-span-6 flex items-start gap-4">
                                            <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg bg-surface-container-low overflow-hidden flex-shrink-0 relative border border-surface-variant/80">
                                                <?php if ( ! $product_permalink ) : ?>
                                                    <?php echo $thumbnail; // PHPCS: XSS ok. ?>
                                                <?php else : ?>
                                                    <a href="<?php echo esc_url( $product_permalink ); ?>">
                                                        <?php echo $thumbnail; // PHPCS: XSS ok. ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-semibold">
                                                    <?php echo esc_html( $cat_title ); ?>
                                                </span>
                                                <h3 class="font-headline-sm text-headline-sm text-primary font-medium mt-0.5">
                                                    <?php if ( ! $product_permalink ) : ?>
                                                        <?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' ); ?>
                                                    <?php else : ?>
                                                        <a href="<?php echo esc_url( $product_permalink ); ?>" class="hover:text-secondary transition-colors">
                                                            <?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </h3>
                                                <?php
                                                // Meta data
                                                echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                                // Backorder notification
                                                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification font-body-sm text-xs text-secondary mt-1">' . esc_html__( 'Available on backorder', 'anukul' ) . '</p>', $product_id ) );
                                                }
                                                ?>
                                                <span class="font-label-sm text-label-sm text-surface-tint mt-1 flex items-center gap-1 font-semibold">
                                                    <span class="material-symbols-outlined notranslate text-[14px]" translate="no">check_circle</span>
                                                    <?php echo $_product->is_in_stock() ? esc_html__( 'In Stock · Blessed & Tuned', 'anukul' ) : esc_html__( 'Reserved Allocation', 'anukul' ); ?>
                                                </span>
                                                
                                                <!-- Mobile remove link -->
                                                <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>" class="remove sm:hidden mt-3 inline-flex items-center gap-1 font-label-sm text-label-sm text-tertiary hover:underline uppercase tracking-wider" aria-label="<?php echo esc_attr( sprintf( __( 'Remove %s from cart', 'anukul' ), wp_strip_all_tags( $_product->get_name() ) ) ); ?>">
                                                    <span class="material-symbols-outlined notranslate text-[15px]" translate="no">delete</span>
                                                    <?php esc_html_e( 'Remove', 'anukul' ); ?>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Unit Price (2 cols) -->
                                        <div class="sm:col-span-2 flex items-center sm:justify-center">
                                            <span class="font-body-md text-body-md text-on-surface font-semibold sm:font-normal">
                                                <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok. ?>
                                            </span>
                                        </div>

                                        <!-- Quantity Control (2 cols) -->
                                        <div class="sm:col-span-2 flex items-center sm:justify-center">
                                            <div class="inline-flex items-center rounded-lg border border-surface-variant bg-surface-container-lowest shadow-sm">
                                                <button type="button" aria-label="Decrease quantity" class="qty-btn-minus px-2.5 py-1.5 text-primary hover:bg-surface-container transition-colors rounded-l-lg" onclick="anukulAdjustQty(this, -1)">
                                                    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">remove</span>
                                                </button>
                                                <?php
                                                if ( $_product->is_sold_individually() ) {
                                                    $min_quantity = 1;
                                                    $max_quantity = 1;
                                                } else {
                                                    $min_quantity = 0;
                                                    $max_quantity = $_product->get_max_purchase_quantity();
                                                }

                                                $product_quantity = woocommerce_quantity_input(
                                                    array(
                                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                                        'input_value'  => $cart_item['quantity'],
                                                        'max_value'    => $max_quantity,
                                                        'min_value'    => $min_quantity,
                                                        'product_name' => $_product->get_name(),
                                                        'classes'      => array( 'w-10', 'text-center', 'font-body-md', 'text-body-md', 'text-on-surface', 'bg-transparent', 'border-none', 'p-0', 'focus:ring-0', 'quantity-input' ),
                                                    ),
                                                    $_product,
                                                    false
                                                );

                                                echo $product_quantity; // PHPCS: XSS ok.
                                                ?>
                                                <button type="button" aria-label="Increase quantity" class="qty-btn-plus px-2.5 py-1.5 text-primary hover:bg-surface-container transition-colors rounded-r-lg" onclick="anukulAdjustQty(this, 1)">
                                                    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">add</span>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Subtotal & Desktop Remove Action (2 cols) -->
                                        <div class="sm:col-span-2 flex items-center justify-between sm:justify-end gap-3">
                                            <span class="font-headline-sm text-headline-sm text-primary font-bold">
                                                <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok. ?>
                                            </span>
                                            <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>" class="remove hidden sm:inline-flex p-1.5 text-outline hover:text-tertiary hover:bg-error-container/20 rounded-lg transition-colors" aria-label="<?php echo esc_attr( sprintf( __( 'Remove %s from cart', 'anukul' ), wp_strip_all_tags( $_product->get_name() ) ) ); ?>" title="<?php esc_attr_e( 'Remove item', 'anukul' ); ?>">
                                                <span class="material-symbols-outlined notranslate text-[20px]" translate="no">delete_outline</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Cart Bottom Actions Row -->
                        <div class="px-6 py-4 bg-surface-container-low border-t border-surface-variant flex flex-col sm:flex-row items-center justify-between gap-4">
                            <a class="inline-flex items-center gap-2 font-label-md text-label-md uppercase tracking-wider text-primary hover:text-secondary transition-colors font-semibold" data-path="shop" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">
                                <span class="material-symbols-outlined notranslate text-[18px]" translate="no">arrow_back</span>
                                <?php esc_html_e( 'Continue Shopping', 'anukul' ); ?>
                            </a>
                            <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                                <button type="submit" class="button px-6 py-2.5 rounded-lg border border-primary text-primary hover:bg-primary hover:text-on-primary font-label-md text-label-md uppercase tracking-wider transition-all flex items-center gap-1.5 font-bold cursor-pointer shadow-sm" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'anukul' ); ?>">
                                    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">sync</span>
                                    <?php esc_html_e( 'Update Cart', 'anukul' ); ?>
                                </button>
                                <?php do_action( 'woocommerce_cart_actions' ); ?>
                                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Coupon Voucher Accordion Box -->
                    <?php if ( wc_coupons_enabled() ) : ?>
                        <div class="bg-surface-container-lowest rounded-xl shadow-sm border border-surface-variant p-6">
                            <div class="flex items-center justify-between cursor-pointer select-none" onclick="document.getElementById('coupon-accordion-body').classList.toggle('hidden'); document.getElementById('coupon-chevron').classList.toggle('rotate-180');">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined notranslate text-secondary text-[22px]" translate="no">sell</span>
                                    <div>
                                        <h4 class="font-headline-sm text-headline-sm text-primary"><?php esc_html_e( 'Have a Sanctuary Coupon?', 'anukul' ); ?></h4>
                                        <p class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Apply your clinic privilege or seasonal discount code.', 'anukul' ); ?></p>
                                    </div>
                                </div>
                                <span class="material-symbols-outlined notranslate text-outline transition-transform duration-200" id="coupon-chevron" translate="no">expand_more</span>
                            </div>
                            <div class="mt-4 pt-4 border-t border-surface-variant" id="coupon-accordion-body">
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <div class="flex-grow relative">
                                        <input type="text" name="coupon_code" class="w-full bg-surface-container-low/70 border border-outline-variant/60 rounded-lg px-4 py-3 font-body-md text-body-md text-on-surface uppercase placeholder:normal-case placeholder:text-outline focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'e.g. HARMONY10, VASTU2025', 'anukul' ); ?>" />
                                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-outline-variant text-[11px] font-label-sm uppercase tracking-widest hidden sm:inline select-none">PROMO</span>
                                    </div>
                                    <button type="submit" class="button px-6 py-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-tertiary transition-colors shadow-sm flex items-center justify-center gap-2 font-bold cursor-pointer" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'anukul' ); ?>">
                                        <?php esc_html_e( 'Apply Coupon', 'anukul' ); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Trust & Consultation Notice Section (Under Items) -->
                    <div class="bg-surface-container-high/40 rounded-xl p-6 border border-surface-variant/80 flex flex-col md:flex-row gap-6 items-start">
                        <div class="w-12 h-12 rounded-xl bg-primary text-on-primary flex items-center justify-center flex-shrink-0 shadow-sm">
                            <span class="material-symbols-outlined notranslate text-[24px]" translate="no">contact_support</span>
                        </div>
                        <div class="flex-grow">
                            <div class="inline-flex items-center gap-1.5 font-label-sm text-label-sm text-secondary uppercase tracking-widest font-bold">
                                <?php esc_html_e( 'Personalized Guidance', 'anukul' ); ?>
                            </div>
                            <h4 class="font-headline-sm text-headline-sm text-primary mt-1"><?php esc_html_e( 'Need help with your Ayurvedic instruments & tailas?', 'anukul' ); ?></h4>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-1.5 leading-relaxed">
                                <?php esc_html_e( 'Our clinical vaidya team is available to assist with questions regarding proper Dinacharya usage rituals, doshic balance suitability, or customized delivery coordination.', 'anukul' ); ?>
                            </p>
                            <div class="mt-4 flex flex-wrap items-center gap-4">
                                <a class="inline-flex items-center gap-1.5 font-label-md text-label-md uppercase tracking-wider text-primary hover:text-tertiary transition-colors underline underline-offset-4 font-bold" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                                    <?php esc_html_e( 'Consult with our Clinic Concierge (+91 7624012501)', 'anukul' ); ?>
                                    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">arrow_forward</span>
                                </a>
                                <span class="text-outline-variant">•</span>
                                <a class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-primary transition-colors font-medium" href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>">
                                    <?php esc_html_e( 'Book Clinical Assessment', 'anukul' ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column (4 Cols): Order Summary Panel -->
                <div class="lg:col-span-4 flex flex-col space-y-6 lg:sticky lg:top-28">
                    <div class="bg-surface-container-low rounded-xl p-6 sm:p-7 shadow-sm border border-surface-variant relative overflow-hidden">
                        <!-- Subtle Decorative Cardinal Watermark -->
                        <div class="absolute -right-10 -bottom-10 w-36 h-36 rounded-full border border-secondary/10 flex items-center justify-center pointer-events-none opacity-40">
                            <span class="material-symbols-outlined notranslate text-secondary/30 text-[90px]" translate="no">explore</span>
                        </div>
                        <div class="flex items-center justify-between pb-4 border-b border-surface-variant">
                            <h2 class="font-headline-md text-headline-md text-primary tracking-tight"><?php esc_html_e( 'Order Summary', 'anukul' ); ?></h2>
                            <span class="font-label-sm text-label-sm uppercase tracking-widest px-2.5 py-1 bg-surface-container rounded-md text-secondary font-bold">
                                <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?> <?php esc_html_e( 'Items', 'anukul' ); ?>
                            </span>
                        </div>

                        <!-- Line Items List -->
                        <div class="py-5 space-y-3.5 border-b border-surface-variant">
                            <!-- Cart Subtotal -->
                            <div class="flex items-center justify-between font-body-md text-body-md text-on-surface">
                                <span class="text-on-surface-variant"><?php esc_html_e( 'Cart Subtotal', 'anukul' ); ?></span>
                                <span class="font-semibold text-primary"><?php wc_cart_totals_subtotal_html(); ?></span>
                            </div>

                            <!-- Coupons Applied -->
                            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                                <div class="flex items-center justify-between font-body-md text-body-md text-secondary">
                                    <div class="flex items-center gap-1.5">
                                        <span><?php esc_html_e( 'Privilege Discount', 'anukul' ); ?></span>
                                        <span class="text-[11px] px-1.5 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed uppercase font-mono font-bold"><?php echo esc_html( $code ); ?></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="font-semibold"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <!-- Shipping -->
                            <div class="flex items-start justify-between font-body-md text-body-md">
                                <div class="flex flex-col">
                                    <span class="text-on-surface-variant"><?php esc_html_e( 'Sanctuary Surface Dispatch', 'anukul' ); ?></span>
                                    <span class="text-[11px] text-surface-tint font-medium"><?php esc_html_e( 'Across all serviceable Indian PIN codes', 'anukul' ); ?></span>
                                </div>
                                <span class="text-surface-tint font-semibold uppercase font-label-sm text-label-sm tracking-wider">
                                    <?php
                                    if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) {
                                        echo WC()->cart->get_cart_shipping_total(); // PHPCS: XSS ok.
                                    } else {
                                        esc_html_e( 'Free', 'anukul' );
                                    }
                                    ?>
                                </span>
                            </div>

                            <!-- Taxes -->
                            <div class="flex items-center justify-between font-body-sm text-body-sm text-outline">
                                <span class="flex items-center gap-1">
                                    <?php esc_html_e( 'Applicable Taxes (GST 5% & 18%)', 'anukul' ); ?>
                                    <span class="material-symbols-outlined notranslate text-[14px]" translate="no" title="<?php esc_attr_e( 'Taxes calculated according to classical botanical and metallurgical schedules.', 'anukul' ); ?>">help_outline</span>
                                </span>
                                <span><?php esc_html_e( 'Included in INR', 'anukul' ); ?></span>
                            </div>
                        </div>

                        <!-- Grand Total Calculation -->
                        <div class="py-5">
                            <div class="flex items-baseline justify-between mb-1">
                                <span class="font-headline-sm text-headline-sm text-primary font-bold"><?php esc_html_e( 'Grand Total', 'anukul' ); ?></span>
                                <div class="text-right">
                                    <span class="font-display-mobile text-display-mobile text-primary font-bold tracking-tight">
                                        <?php wc_cart_totals_order_total_html(); ?>
                                    </span>
                                </div>
                            </div>
                            <p class="font-body-sm text-body-sm text-outline text-right"><?php esc_html_e( 'Standard dispatch within 24–48 hours', 'anukul' ); ?></p>
                        </div>

                        <!-- Proceed to Checkout Primary CTA -->
                        <div class="pt-2 flex flex-col space-y-3">
                            <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="w-full py-4 px-6 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-[0.14em] hover:bg-tertiary transition-all duration-200 shadow-md flex items-center justify-center gap-2.5 text-center group font-bold">
                                <span class="material-symbols-outlined notranslate text-[20px] transition-transform group-hover:scale-110" translate="no">lock</span>
                                <span><?php esc_html_e( 'Proceed to Sacred Checkout', 'anukul' ); ?></span>
                            </a>
                            <div class="text-center pt-2">
                                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors inline-flex items-center gap-1 font-medium">
                                    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">arrow_back</span>
                                    <?php esc_html_e( 'Continue browsing Sanctuary Shop', 'anukul' ); ?>
                                </a>
                            </div>
                        </div>

                        <!-- Security and Guarantee Badges -->
                        <div class="mt-6 pt-6 border-t border-surface-variant/80 space-y-3">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined notranslate text-secondary text-[20px]" translate="no">encrypted</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( '256-Bit Encrypted Secure Checkout', 'anukul' ); ?></span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined notranslate text-secondary text-[20px]" translate="no">verified</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Pure Bell-Metal & Botanical Lineage', 'anukul' ); ?></span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined notranslate text-secondary text-[20px]" translate="no">local_shipping</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant"><?php esc_html_e( 'Sacred Packaging with Natural Husk Fill', 'anukul' ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php do_action( 'woocommerce_after_cart_table' ); ?>
        </form>
    </div>
</div>

<script>
function anukulAdjustQty(button, delta) {
    var container = button.closest('div');
    if (!container) return;
    var input = container.querySelector('input.qty, input.quantity-input, input[type="number"]');
    if (!input) return;
    var current = parseInt(input.value) || 0;
    var min = parseInt(input.getAttribute('min')) || 0;
    var max = parseInt(input.getAttribute('max')) || 9999;
    var newVal = Math.max(min, Math.min(max, current + delta));
    input.value = newVal;
    
    // Enable update cart button
    var updateBtn = document.querySelector('button[name="update_cart"]');
    if (updateBtn) {
        updateBtn.disabled = false;
        updateBtn.classList.add('ring-2', 'ring-primary');
    }
}
</script>

<?php do_action( 'woocommerce_after_cart' ); ?>

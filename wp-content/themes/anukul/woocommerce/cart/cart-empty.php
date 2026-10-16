<?php
/**
 * Empty Cart Page
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
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

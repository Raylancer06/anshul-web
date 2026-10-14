<?php
/**
 * Header template for ANUKUL theme
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="web_standard" name="shell-type">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-surface font-body-md text-on-surface antialiased selection:bg-primary-container selection:text-on-primary' ); ?>>
<?php wp_body_open(); ?>

<!-- Header / Navigation Bar -->
<header class="fixed top-0 w-full z-50 bg-[#F7F1E3]/95 backdrop-blur-md border-b border-[#E8D8BC] shadow-[0_1px_8px_rgba(0,0,0,0.03)]">
    <div class="h-20 max-w-[1440px] mx-auto px-6 lg:px-margin flex items-center justify-between gap-4">
        
        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center select-none py-1">
            <img src="<?php echo esc_url( anukul_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-14 sm:h-16 w-auto max-h-[64px] object-contain">
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden xl:flex items-center gap-6 lg:gap-space-md" data-active-classes="text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false,
                ) );
            } else {
                // Fallback canonical links matching source
                $current_url = home_url( add_query_arg( array(), $GLOBALS['wp']->request ) );
                $nav_items = array(
                    'Home'      => home_url( '/' ),
                    'Ayurveda'  => home_url( '/ayurveda/' ),
                    'Vastu'     => home_url( '/vastu/' ),
                    'Services'  => home_url( '/services/' ),
                    'Shop'      => function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ),
                    'Blog'      => get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ),
                    'Gallery'   => home_url( '/gallery/' ),
                    'Contact'   => home_url( '/contact/' ),
                );

                foreach ( $nav_items as $title => $url ) {
                    $is_active = ( rtrim( $current_url, '/' ) === rtrim( $url, '/' ) || ( $title === 'Home' && is_front_page() ) );
                    $active_class = $is_active ? 'text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]' : 'text-on-surface-variant hover:text-primary';
                    echo '<a class="font-label-md text-label-md uppercase transition-colors tracking-widest ' . esc_attr( $active_class ) . '" href="' . esc_url( $url ) . '">' . esc_html( $title ) . '</a>';
                }
            }
            ?>
        </nav>

        <!-- Right Header Actions -->
        <div class="flex items-center gap-2 sm:gap-3">
            <!-- Search -->
            <a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" title="<?php esc_attr_e( 'Search Wisdom & Remedies', 'anukul' ); ?>" class="flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors">
                <span class="material-symbols-outlined text-[22px]">search</span>
            </a>

            <!-- Cart Icon with Live Counter -->
            <?php
            $cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart/' );
            $cart_count = ( function_exists( 'WC' ) && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
            ?>
            <a href="<?php echo esc_url( $cart_url ); ?>" title="<?php esc_attr_e( 'Shopping Cart', 'anukul' ); ?>" class="relative flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors">
                <span class="material-symbols-outlined text-[22px]">shopping_bag</span>
                <span class="anukul-cart-badge absolute top-1 right-1 w-4 h-4 bg-secondary text-on-secondary text-[10px] font-bold rounded-full flex items-center justify-center leading-none"><?php echo esc_html( $cart_count ); ?></span>
            </a>

            <!-- Book Consultation CTA Button -->
            <?php
            $booking_page = get_page_by_path( 'book-your-consultation' );
            $booking_url = $booking_page ? get_permalink( $booking_page ) : home_url( '/book-your-consultation/' );
            ?>
            <a href="<?php echo esc_url( $booking_url ); ?>" class="hidden sm:inline-flex items-center justify-center bg-[#1F4D3A] text-[#F7F1E3] font-label-md text-label-md px-5 py-2.5 rounded-lg tracking-wider uppercase transition-colors duration-200 hover:bg-secondary shadow-sm font-semibold">
                <?php esc_html_e( 'BOOK CONSULTATION', 'anukul' ); ?>
            </a>

            <!-- Client Account Icon -->
            <?php
            $account_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/account/' );
            ?>
            <a href="<?php echo esc_url( $account_url ); ?>" title="<?php esc_attr_e( 'Client Sanctuary Portal', 'anukul' ); ?>" class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary hover:bg-secondary transition-colors shadow-sm">
                <span class="material-symbols-outlined text-[18px]">person</span>
            </a>

            <!-- Mobile Drawer Button -->
            <button id="mobile-menu-btn" type="button" aria-label="<?php esc_attr_e( 'Toggle navigation', 'anukul' ); ?>" class="xl:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg text-primary hover:bg-[#E8D8BC]/60 focus:outline-none transition-colors">
                <span class="material-symbols-outlined text-[26px]" id="mobile-menu-icon">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer Content -->
    <div id="mobile-menu" class="hidden xl:hidden w-full bg-[#F7F1E3] border-b border-[#E8D8BC] shadow-lg transition-all">
        <div class="px-6 py-5 space-y-4 max-h-[calc(100vh-80px)] overflow-y-auto">
            <nav class="flex flex-col space-y-1.5">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                    ) );
                } else {
                    foreach ( $nav_items as $title => $url ) {
                        $is_active = ( rtrim( $current_url, '/' ) === rtrim( $url, '/' ) || ( $title === 'Home' && is_front_page() ) );
                        $active_class = $is_active ? 'bg-surface-container text-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-container hover:text-primary';
                        echo '<a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest transition-colors ' . esc_attr( $active_class ) . '" href="' . esc_url( $url ) . '">' . esc_html( $title ) . '</a>';
                    }
                }
                ?>
            </nav>
            <div class="pt-4 border-t border-[#E8D8BC] flex flex-col gap-3">
                <a href="<?php echo esc_url( $booking_url ); ?>" class="w-full text-center bg-[#1F4D3A] text-[#F7F1E3] font-label-md text-label-md py-3 rounded-lg tracking-wider uppercase font-semibold hover:bg-secondary transition-colors shadow-sm">
                    <?php esc_html_e( 'BOOK CONSULTATION', 'anukul' ); ?>
                </a>
                <div class="grid grid-cols-3 gap-2 pt-1 text-center text-xs font-label-md">
                    <a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors">
                        <span class="material-symbols-outlined text-[20px] mb-1">search</span><?php esc_html_e( 'Search', 'anukul' ); ?>
                    </a>
                    <a href="<?php echo esc_url( $cart_url ); ?>" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors relative">
                        <span class="material-symbols-outlined text-[20px] mb-1">shopping_bag</span><?php printf( esc_html__( 'Cart (%d)', 'anukul' ), esc_html( $cart_count ) ); ?>
                    </a>
                    <a href="<?php echo esc_url( $account_url ); ?>" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors">
                        <span class="material-symbols-outlined text-[20px] mb-1">person</span><?php esc_html_e( 'Account', 'anukul' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Sanctuary Wrapper -->
<main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)]">

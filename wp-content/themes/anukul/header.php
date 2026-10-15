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
    
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..700;1,400..700&amp;family=Manrope:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/assets/css/anukul-animations.css' ); ?>">
    
    <style>
    @layer base {
        html, body { margin: 0; padding: 0; }
        body { overscroll-behavior: none; }
        main > :first-child { margin-top: 0 !important; }
        main > :last-child { margin-bottom: 0 !important; }
    }
    ::-webkit-scrollbar { display: none; }
    @keyframes mandalaSpin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .mandala-rotate {
        animation: mandalaSpin 65s linear infinite;
        transform-origin: 50% 50%;
        will-change: transform;
    }
    </style>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "outline-variant": "#c0c9c2",
                    "error-container": "#ffdad6",
                    "on-tertiary-fixed": "#400012",
                    "surface-container": "#f6ece4",
                    "on-secondary-fixed": "#311300",
                    "surface-dim": "#e2d8d0",
                    "on-secondary-container": "#6e3300",
                    "primary-fixed-dim": "#a1d1b8",
                    "tertiary": "#5d0f24",
                    "on-primary-fixed": "#002114",
                    "primary": "#023625",
                    "primary-dark": "#023625",
                    "on-primary-fixed-variant": "#214f3c",
                    "secondary-fixed-dim": "#ffb688",
                    "surface-tint": "#3a6753",
                    "on-secondary": "#ffffff",
                    "primary-container": "#1f4d3a",
                    "surface-variant": "#ebe1d9",
                    "error": "#ba1a1a",
                    "on-secondary-fixed-variant": "#733600",
                    "background": "#fff8f4",
                    "on-background": "#1f1b16",
                    "surface-container-highest": "#ebe1d9",
                    "surface-container-low": "#fcf2ea",
                    "on-error": "#ffffff",
                    "on-primary": "#ffffff",
                    "on-tertiary": "#ffffff",
                    "on-surface": "#1f1b16",
                    "secondary-container": "#ff964c",
                    "on-tertiary-fixed-variant": "#7d283a",
                    "surface": "#fff8f4",
                    "tertiary-fixed-dim": "#ffb2bc",
                    "on-tertiary-container": "#ff93a4",
                    "surface-container-high": "#f1e6de",
                    "on-error-container": "#93000a",
                    "tertiary-container": "#7b2739",
                    "secondary-fixed": "#ffdbc7",
                    "tertiary-fixed": "#ffd9dd",
                    "on-surface-variant": "#414944",
                    "outline": "#717973",
                    "secondary": "#974800",
                    "secondary-dark": "#974800",
                    "gold": "#B38A3E",
                    "primary-fixed": "#bceed3",
                    "inverse-surface": "#352f2a",
                    "inverse-primary": "#a1d1b8",
                    "inverse-on-surface": "#f9efe7",
                    "surface-bright": "#fff8f4",
                    "surface-container-lowest": "#ffffff",
                    "on-primary-container": "#8dbda4"
                },
                borderRadius: {
                    DEFAULT: "0.125rem",
                    lg: "0.25rem",
                    xl: "0.5rem",
                    full: "0.75rem"
                },
                spacing: {
                    "space-lg": "1.75rem",
                    "space-md": "1rem",
                    "gutter-lg": "2.5rem",
                    "space-2xl": "5rem",
                    "space-xs": "0.25rem",
                    "space-sm": "0.5rem",
                    "margin-md": "3rem",
                    "space-xl": "3rem",
                    "margin": "1.5rem",
                    "margin-lg": "5rem",
                    "gutter": "1.5rem"
                },
                fontFamily: {
                    "body-lg": ["Manrope"],
                    "body-sm": ["Manrope"],
                    "display-mobile": ["EB Garamond"],
                    "label-sm": ["Manrope"],
                    "display": ["EB Garamond"],
                    "headline-sm": ["EB Garamond"],
                    "body-md": ["Manrope"],
                    "editorial-quote": ["EB Garamond"],
                    "headline-lg": ["EB Garamond"],
                    "headline-lg-mobile": ["EB Garamond"],
                    "label-md": ["Manrope"],
                    "headline-md": ["EB Garamond"]
                },
                fontSize: {
                    "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
                    "body-sm": ["13px", { lineHeight: "20px", fontWeight: "400" }],
                    "display-mobile": ["38px", { lineHeight: "44px", letterSpacing: "-0.01em", fontWeight: "400" }],
                    "label-sm": ["10px", { lineHeight: "14px", letterSpacing: "0.12em", fontWeight: "700" }],
                    "display": ["56px", { lineHeight: "64px", letterSpacing: "-0.01em", fontWeight: "400" }],
                    "headline-sm": ["22px", { lineHeight: "28px", fontWeight: "600" }],
                    "body-md": ["15px", { lineHeight: "24px", fontWeight: "400" }],
                    "editorial-quote": ["26px", { lineHeight: "36px", letterSpacing: "0.01em", fontWeight: "400" }],
                    "headline-lg": ["40px", { lineHeight: "48px", fontWeight: "400" }],
                    "headline-lg-mobile": ["30px", { lineHeight: "36px", fontWeight: "500" }],
                    "label-md": ["12px", { lineHeight: "16px", letterSpacing: "0.08em", fontWeight: "600" }],
                    "headline-md": ["28px", { lineHeight: "36px", fontWeight: "500" }]
                }
            }
        }
    };
    </script>
    
    <?php wp_head(); ?>
    <style>
      body.admin-bar #site-header { top: 32px !important; }
      @media screen and (max-width: 782px) {
        body.admin-bar #site-header { top: 46px !important; }
      }
    </style>
</head>
<body <?php body_class( 'bg-surface font-body-md text-on-surface antialiased selection:bg-primary-container selection:text-on-primary' ); ?>>
<?php wp_body_open(); ?>

<!-- Header / Navigation Bar -->
<header id="site-header" class="fixed top-0 w-full z-50 bg-[#F7F1E3]/95 backdrop-blur-md border-b border-[#E8D8BC] shadow-[0_1px_8px_rgba(0,0,0,0.03)] transition-[top] duration-200">
    <div class="h-20 max-w-[1440px] mx-auto px-6 lg:px-margin flex items-center justify-between gap-4">
        
        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center select-none py-1">
            <img src="<?php echo esc_url( anukul_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-14 sm:h-16 w-auto max-h-[64px] object-contain">
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden xl:flex items-center gap-6 lg:gap-space-md" data-active-classes="text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]">
            <?php anukul_render_nav_desktop(); ?>
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
            $account_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' );
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
                <?php anukul_render_nav_mobile(); ?>
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

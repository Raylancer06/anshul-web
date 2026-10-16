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

    /* Google Translate Icon & Layout Protection */
    .material-symbols-outlined,
    .material-symbols,
    [class*="material-symbols"],
    [class*="bi-"],
    .bi,
    .notranslate,
    [translate="no"] {
        -webkit-font-feature-settings: 'liga' 1;
        font-feature-settings: 'liga' 1;
        font-variant-ligatures: discretionary-ligatures;
        text-transform: none !important;
        font-style: normal;
    }
    font {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        letter-spacing: inherit !important;
        background: transparent !important;
        box-shadow: none !important;
        display: inline !important;
    }

    /* Clean Google Translate Integration - Suppress Intrusive Banners & Toolbars */
    body > .skiptranslate,
    .goog-te-banner-frame.skiptranslate,
    .goog-te-banner-frame,
    #goog-gt-tt,
    .goog-te-balloon-frame {
        display: none !important;
        visibility: hidden !important;
        height: 0 !important;
        overflow: hidden !important;
    }
    body {
        top: 0px !important;
        position: static !important;
    }
    .skiptranslate iframe {
        visibility: hidden !important;
        display: none !important;
    }
    .goog-logo-link {
        display: none !important;
    }
    .goog-te-gadget {
        font-size: 0 !important;
    }
    .goog-te-gadget .goog-te-combo {
        display: none !important;
    }
    .goog-text-highlight {
        background: none !important;
        box-shadow: none !important;
    }
    </style>

    <!-- Early Icon & Ligature Protection against Translation Engine -->
    <script>
    (function() {
      function tagUntranslatable() {
        var targets = document.querySelectorAll('.material-symbols-outlined, .material-symbols, [class*="material-symbols"], [class*="bi-"], svg, svg *, .anukul-cart-badge, .woocommerce-Price-currencySymbol, .currency-symbol, .anukul-lang-component, select, option, .notranslate');
        for (var i = 0; i < targets.length; i++) {
          targets[i].classList.add('notranslate');
          targets[i].setAttribute('translate', 'no');
        }
      }
      tagUntranslatable();
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', tagUntranslatable);
      }
      if (window.MutationObserver) {
        new MutationObserver(function() {
          tagUntranslatable();
        }).observe(document.documentElement, { childList: true, subtree: true });
      }
    })();
    </script>

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
    <!-- Top Utility Bar: Sanskrit Invocation, Operating Hours & Contact Coordinates -->
    <div id="top-utility-bar" class="w-full bg-[#1F4D3A] text-[#F7F1E3] text-[11px] font-label-md uppercase tracking-wider py-1.5 px-4 lg:px-margin border-b border-[#023625] notranslate" translate="no">
        <div class="max-w-[1440px] mx-auto flex items-center justify-between gap-3">
            <!-- Left: Sacred Clinic Motto & Hours -->
            <div class="flex items-center gap-2 overflow-hidden text-ellipsis whitespace-nowrap">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#B38A3E] animate-pulse shrink-0"></span>
                <span class="hidden lg:inline font-medium tracking-widest text-[#E8D8BC]">सर्वे भवन्तु सुखिनः सर्वे सन्तु निरामयाः</span>
                <span class="hidden lg:inline text-[#B38A3E]/60">·</span>
                <span class="font-medium text-white/95 tracking-wider">Mon–Sat: 9:30 AM TO 6:30 PM</span>
            </div>

            <!-- Right: Clinic Phones & Top Language Selector -->
            <div class="flex items-center gap-3 shrink-0">
                <!-- Phone Coordinates -->
                <div class="hidden sm:flex items-center gap-3 text-[11px] text-[#E8D8BC]">
                    <a href="https://wa.me/917624012501" target="_blank" class="hover:text-white transition-colors flex items-center gap-1 font-semibold">
                        <span class="text-[#25D366]">WhatsApp:</span> +91 7624012501
                    </a>
                    <span class="text-[#B38A3E]/40">·</span>
                    <a href="tel:+916356019951" class="hover:text-white transition-colors">
                        Desk: +91 63560 19951
                    </a>
                </div>

                <!-- Hidden Google Translate Element -->
                <div id="google_translate_element" style="display:none;"></div>

                <!-- Top Language Dropdown Pill -->
                <div class="relative inline-flex items-center gap-1.5 bg-[#023625]/80 hover:bg-[#023625] px-2.5 py-1 rounded-md border border-[#B38A3E]/50 transition-colors">
                    <span class="material-symbols-outlined notranslate text-[14px] text-[#B38A3E]" translate="no">translate</span>
                    <select id="anukul-lang-select" onchange="changeSanctuaryLanguage(this.value)" class="bg-transparent text-[#F7F1E3] text-[11px] font-semibold tracking-wider cursor-pointer focus:outline-none pr-3 appearance-none border-0 p-0 m-0 notranslate" translate="no" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2210%22%20height%3D%2210%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23B38A3E%22%3E%3Cpath%20d%3D%22M7%2010l5%205%205-5z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 0 center;">
                        <option value="en" class="bg-[#1F4D3A] text-white">English (Default)</option>
                        <option value="hi" class="bg-[#1F4D3A] text-white">हिन्दी (Hindi)</option>
                        <option value="mr" class="bg-[#1F4D3A] text-white">मराठी (Marathi)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="h-20 max-w-[1440px] mx-auto px-6 lg:px-margin flex items-center justify-between gap-4">
        
        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center select-none py-1 notranslate" translate="no">
            <img src="<?php echo esc_url( anukul_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-14 sm:h-16 w-auto max-h-[64px] object-contain">
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden xl:flex items-center gap-6 lg:gap-space-md" data-active-classes="text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]">
            <?php anukul_render_nav_desktop(); ?>
        </nav>

        <!-- Right Header Actions -->
        <div class="flex items-center gap-2 sm:gap-3">
            <!-- Desktop Language Pill Menu -->
            <div class="relative hidden sm:inline-flex items-center notranslate" translate="no">
                <button type="button" id="anukul-lang-toggle-btn" onclick="toggleLangMenu()" class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg border border-[#E8D8BC] bg-surface-container/70 hover:bg-surface-container text-primary text-xs font-semibold uppercase tracking-wider transition-colors shadow-2xs">
                    <span class="material-symbols-outlined notranslate text-[16px] text-[#B38A3E]" translate="no">translate</span>
                    <span id="active-lang-code" class="font-bold">EN</span>
                    <span class="material-symbols-outlined notranslate text-[14px] text-outline transition-transform duration-200" id="lang-chevron" translate="no">expand_more</span>
                </button>
                <div id="anukul-lang-dropdown" class="hidden absolute top-full right-0 mt-1.5 w-40 bg-[#F7F1E3] rounded-lg shadow-lg border border-[#E8D8BC] py-1 z-50">
                    <button type="button" onclick="changeSanctuaryLanguage('en')" class="w-full text-left px-3 py-2 text-xs font-medium text-primary hover:bg-[#E8D8BC]/60 flex items-center justify-between transition-colors">
                        <span>English</span>
                        <span id="check-en" class="material-symbols-outlined notranslate text-[14px] text-secondary" translate="no">check</span>
                    </button>
                    <button type="button" onclick="changeSanctuaryLanguage('hi')" class="w-full text-left px-3 py-2 text-xs font-medium text-primary hover:bg-[#E8D8BC]/60 flex items-center justify-between transition-colors">
                        <span>हिन्दी (Hindi)</span>
                        <span id="check-hi" class="hidden material-symbols-outlined notranslate text-[14px] text-secondary" translate="no">check</span>
                    </button>
                    <button type="button" onclick="changeSanctuaryLanguage('mr')" class="w-full text-left px-3 py-2 text-xs font-medium text-primary hover:bg-[#E8D8BC]/60 flex items-center justify-between transition-colors">
                        <span>मराठी (Marathi)</span>
                        <span id="check-mr" class="hidden material-symbols-outlined notranslate text-[14px] text-secondary" translate="no">check</span>
                    </button>
                </div>
            </div>

            <!-- Search -->
            <a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" title="<?php esc_attr_e( 'Search Wisdom & Remedies', 'anukul' ); ?>" class="flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors notranslate" translate="no">
                <span class="material-symbols-outlined notranslate text-[22px]" translate="no">search</span>
            </a>

            <!-- Cart Icon with Live Counter -->
            <?php
            $cart_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart/' );
            $cart_count = ( function_exists( 'WC' ) && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
            ?>
            <a href="<?php echo esc_url( $cart_url ); ?>" title="<?php esc_attr_e( 'Shopping Cart', 'anukul' ); ?>" class="relative flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors notranslate" translate="no">
                <span class="material-symbols-outlined notranslate text-[22px]" translate="no">shopping_bag</span>
                <span class="anukul-cart-badge absolute top-1 right-1 w-4 h-4 bg-secondary text-on-secondary text-[10px] font-bold rounded-full flex items-center justify-center leading-none notranslate" translate="no"><?php echo esc_html( $cart_count ); ?></span>
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
            <a href="<?php echo esc_url( $account_url ); ?>" title="<?php esc_attr_e( 'Client Sanctuary Portal', 'anukul' ); ?>" class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary hover:bg-secondary transition-colors shadow-sm notranslate" translate="no">
                <span class="material-symbols-outlined notranslate text-[18px]" translate="no">person</span>
            </a>

            <!-- Mobile Drawer Button -->
            <button id="mobile-menu-btn" type="button" aria-label="<?php esc_attr_e( 'Toggle navigation', 'anukul' ); ?>" class="xl:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg text-primary hover:bg-[#E8D8BC]/60 focus:outline-none transition-colors notranslate" translate="no">
                <span class="material-symbols-outlined notranslate text-[26px]" translate="no" id="mobile-menu-icon">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer Content -->
    <div id="mobile-menu" class="hidden xl:hidden w-full bg-[#F7F1E3] border-b border-[#E8D8BC] shadow-lg transition-all">
        <div class="px-6 py-5 space-y-4 max-h-[calc(100vh-114px)] overflow-y-auto">
            <!-- Mobile Language Selector Tabs -->
            <div class="p-3 rounded-lg bg-surface-container border border-[#E8D8BC] notranslate" translate="no">
                <div class="flex items-center justify-between mb-2">
                    <span class="flex items-center gap-1.5 text-primary font-semibold text-xs uppercase tracking-wider">
                        <span class="material-symbols-outlined notranslate text-[17px] text-[#B38A3E]" translate="no">translate</span>
                        <span>Language / भाषा</span>
                    </span>
                    <span class="text-[11px] text-[#717973]">Select preferred language</span>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <button type="button" onclick="changeSanctuaryLanguage('en')" id="mob-btn-en" class="py-2 px-2 text-center text-xs font-bold rounded border transition-colors bg-primary text-white border-primary">
                        English
                    </button>
                    <button type="button" onclick="changeSanctuaryLanguage('hi')" id="mob-btn-hi" class="py-2 px-2 text-center text-xs font-medium rounded border border-[#E8D8BC] bg-[#F7F1E3] text-primary hover:bg-surface-container transition-colors">
                        हिन्दी
                    </button>
                    <button type="button" onclick="changeSanctuaryLanguage('mr')" id="mob-btn-mr" class="py-2 px-2 text-center text-xs font-medium rounded border border-[#E8D8BC] bg-[#F7F1E3] text-primary hover:bg-surface-container transition-colors">
                        मराठी
                    </button>
                </div>
            </div>

            <!-- Mobile Contact Coordinates -->
            <div class="p-3 rounded-lg bg-[#1F4D3A] text-white text-xs space-y-1.5 notranslate" translate="no">
                <div class="text-[#E8D8BC] font-semibold uppercase tracking-wider text-[11px]">Sanctuary Concierge</div>
                <div class="flex items-center justify-between">
                    <span>WhatsApp / Booking:</span>
                    <a href="https://wa.me/917624012501" target="_blank" class="text-[#25D366] font-bold">+91 7624012501</a>
                </div>
                <div class="flex items-center justify-between">
                    <span>Helpline Desk:</span>
                    <a href="tel:+916356019951" class="text-white font-medium">+91 63560 19951</a>
                </div>
                <div class="flex items-center justify-between text-[#E8D8BC]/80 pt-1 border-t border-white/10 text-[11px]">
                    <span>Operating Hours:</span>
                    <span>9:30 AM TO 6:30 PM (Mon–Sat)</span>
                </div>
            </div>

            <nav class="flex flex-col space-y-1.5">
                <?php anukul_render_nav_mobile(); ?>
            </nav>
            <div class="pt-4 border-t border-[#E8D8BC] flex flex-col gap-3">
                <a href="<?php echo esc_url( $booking_url ); ?>" class="w-full text-center bg-[#1F4D3A] text-[#F7F1E3] font-label-md text-label-md py-3 rounded-lg tracking-wider uppercase font-semibold hover:bg-secondary transition-colors shadow-sm">
                    <?php esc_html_e( 'BOOK CONSULTATION', 'anukul' ); ?>
                </a>
                <div class="grid grid-cols-3 gap-2 pt-1 text-center text-xs font-label-md notranslate" translate="no">
                    <a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors">
                        <span class="material-symbols-outlined notranslate text-[20px] mb-1" translate="no">search</span><?php esc_html_e( 'Search', 'anukul' ); ?>
                    </a>
                    <a href="<?php echo esc_url( $cart_url ); ?>" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors relative">
                        <span class="material-symbols-outlined notranslate text-[20px] mb-1" translate="no">shopping_bag</span><?php printf( esc_html__( 'Cart (%d)', 'anukul' ), esc_html( $cart_count ) ); ?>
                    </a>
                    <a href="<?php echo esc_url( $account_url ); ?>" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors">
                        <span class="material-symbols-outlined notranslate text-[20px] mb-1" translate="no">person</span><?php esc_html_e( 'Account', 'anukul' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Google Translate Integration & Language Controller -->
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'en,hi,mr',
      autoDisplay: false
    }, 'google_translate_element');
    syncLanguageSelectors();
  }

  function toggleLangMenu() {
    const menu = document.getElementById('anukul-lang-dropdown');
    const chevron = document.getElementById('lang-chevron');
    if (!menu) return;
    const isHidden = menu.classList.contains('hidden');
    if (isHidden) {
      menu.classList.remove('hidden');
      if (chevron) chevron.classList.add('rotate-180');
    } else {
      menu.classList.add('hidden');
      if (chevron) chevron.classList.remove('rotate-180');
    }
  }

  document.addEventListener('click', function(e) {
    const btn = document.getElementById('anukul-lang-toggle-btn');
    const menu = document.getElementById('anukul-lang-dropdown');
    if (btn && menu && !btn.contains(e.target) && !menu.contains(e.target)) {
      menu.classList.add('hidden');
      const chevron = document.getElementById('lang-chevron');
      if (chevron) chevron.classList.remove('rotate-180');
    }
  });

  function syncLanguageSelectors() {
    let currentLang = 'en';
    const cookieMatch = document.cookie.match(/googtrans=\/en\/([a-z]{2})/i);
    if (cookieMatch && cookieMatch[1]) {
      currentLang = cookieMatch[1].toLowerCase();
    } else {
      const stored = localStorage.getItem('anukul_preferred_lang');
      if (stored) currentLang = stored.toLowerCase();
    }

    // Top Select
    const selectTop = document.getElementById('anukul-lang-select');
    if (selectTop) selectTop.value = currentLang;

    // Desktop Nav Button Label
    const activeLabel = document.getElementById('active-lang-code');
    if (activeLabel) {
      activeLabel.textContent = currentLang.toUpperCase();
    }

    // Dropdown Checkmarks
    ['en', 'hi', 'mr'].forEach(function(l) {
      const check = document.getElementById('check-' + l);
      if (check) {
        if (l === currentLang) check.classList.remove('hidden');
        else check.classList.add('hidden');
      }

      // Mobile Buttons
      const mobBtn = document.getElementById('mob-btn-' + l);
      if (mobBtn) {
        if (l === currentLang) {
          mobBtn.className = 'py-2 px-2 text-center text-xs font-bold rounded border transition-colors bg-primary text-white border-primary';
        } else {
          mobBtn.className = 'py-2 px-2 text-center text-xs font-medium rounded border border-[#E8D8BC] bg-[#F7F1E3] text-primary hover:bg-surface-container transition-colors';
        }
      }
    });
  }

  function changeSanctuaryLanguage(lang) {
    localStorage.setItem('anukul_preferred_lang', lang);
    const domain = window.location.hostname;
    const pair = (lang === 'en') ? '/en/en' : ('/en/' + lang);

    // Update googtrans cookies
    document.cookie = 'googtrans=' + pair + '; path=/; SameSite=Lax';
    document.cookie = 'googtrans=' + pair + '; domain=' + domain + '; path=/; SameSite=Lax';
    if (domain.indexOf('.') !== -1) {
      const parts = domain.split('.');
      if (parts.length > 1) {
        const rootDomain = '.' + parts.slice(-2).join('.');
        document.cookie = 'googtrans=' + pair + '; domain=' + rootDomain + '; path=/; SameSite=Lax';
      }
    }

    if (lang === 'en') {
      document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; SameSite=Lax';
      document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=' + domain + '; path=/; SameSite=Lax';
    }

    // Retag untranslatables immediately
    if (window.tagUntranslatable) window.tagUntranslatable();

    // Trigger Google combo if present
    const combo = document.querySelector('.goog-te-combo');
    if (combo) {
      combo.value = lang;
      combo.dispatchEvent(new Event('change'));
      syncLanguageSelectors();
      const menu = document.getElementById('anukul-lang-dropdown');
      if (menu) menu.classList.add('hidden');
    } else {
      window.location.reload();
    }
  }

  document.addEventListener('DOMContentLoaded', syncLanguageSelectors);
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- Main Sanctuary Wrapper -->
<main class="w-full pt-[114px] bg-surface min-h-[calc(100vh-114px)]">

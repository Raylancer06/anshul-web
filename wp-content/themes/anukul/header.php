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

    /* Clean Google Translate Integration - Suppress Intrusive Banners & Toolbars */
    .goog-te-banner-frame.skiptranslate,
    .goog-te-banner-frame,
    #goog-gt-tt,
    .goog-te-balloon-frame {
        display: none !important;
        visibility: hidden !important;
    }
    body {
        top: 0px !important;
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
    <!-- Top Utility Bar: Sanskrit Invocation & Language Translation -->
    <div id="top-utility-bar" class="w-full bg-[#1F4D3A] text-[#F7F1E3] text-[11px] font-label-md uppercase tracking-wider py-1.5 px-6 lg:px-margin border-b border-[#023625]">
        <div class="max-w-[1440px] mx-auto flex items-center justify-between gap-4">
            <!-- Left: Sacred Clinic Motto -->
            <div class="flex items-center gap-2">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-[#B38A3E] animate-pulse"></span>
                <span class="hidden md:inline font-medium tracking-widest text-[#E8D8BC]">सर्वे भवन्तु सुखिनः सर्वे सन्तु निरामयाः</span>
                <span class="hidden md:inline text-[#B38A3E]/60">·</span>
                <span class="text-xs tracking-wider text-white/90">ANUKUL Ayur Vastu Harmony Clinic</span>
            </div>

            <!-- Right: Google Translate Language Switcher -->
            <div class="flex items-center gap-3">
                <!-- Hidden Google Translate Element -->
                <div id="google_translate_element" style="display:none;"></div>

                <div class="relative inline-flex items-center gap-1.5 bg-[#023625]/60 hover:bg-[#023625] px-2.5 py-1 rounded-md border border-[#B38A3E]/40 transition-colors">
                    <span class="material-symbols-outlined text-[15px] text-[#B38A3E]">translate</span>
                    <label for="anukul-lang-select" class="sr-only"><?php esc_html_e( 'Select Language', 'anukul' ); ?></label>
                    <select id="anukul-lang-select" onchange="changeSanctuaryLanguage(this.value)" class="bg-transparent text-[#F7F1E3] text-[11px] font-semibold tracking-wider cursor-pointer focus:outline-none pr-3 appearance-none border-0 p-0 m-0" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2210%22%20height%3D%2210%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23B38A3E%22%3E%3Cpath%20d%3D%22M7%2010l5%205%205-5z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right 0 center;">
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
        <div class="px-6 py-5 space-y-4 max-h-[calc(100vh-114px)] overflow-y-auto">
            <!-- Mobile Language Selector -->
            <div class="flex items-center justify-between p-3 rounded-lg bg-surface-container border border-[#E8D8BC]">
                <span class="flex items-center gap-2 text-primary font-semibold text-xs uppercase tracking-wider">
                    <span class="material-symbols-outlined text-[18px] text-secondary">translate</span>
                    <?php esc_html_e( 'Language / भाषा', 'anukul' ); ?>
                </span>
                <select id="anukul-lang-select-mobile" onchange="changeSanctuaryLanguage(this.value)" class="bg-surface-container-lowest text-primary text-xs font-semibold rounded border border-[#E8D8BC] px-3 py-1.5 focus:outline-none focus:border-secondary">
                    <option value="en">English (Default)</option>
                    <option value="hi">हिन्दी (Hindi)</option>
                    <option value="mr">मराठी (Marathi)</option>
                </select>
            </div>

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

<!-- Google Translate Integration Script -->
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'en,hi,mr',
      autoDisplay: false
    }, 'google_translate_element');
    syncLanguageSelectors();
  }

  function syncLanguageSelectors() {
    let currentLang = 'en';
    const cookieMatch = document.cookie.match(/googtrans=\/en\/([a-z]{2})/i);
    if (cookieMatch && cookieMatch[1]) {
      currentLang = cookieMatch[1];
    } else {
      const stored = localStorage.getItem('anukul_preferred_lang');
      if (stored) currentLang = stored;
    }

    const selectDesktop = document.getElementById('anukul-lang-select');
    const selectMobile = document.getElementById('anukul-lang-select-mobile');
    if (selectDesktop) selectDesktop.value = currentLang;
    if (selectMobile) selectMobile.value = currentLang;
  }

  function changeSanctuaryLanguage(lang) {
    localStorage.setItem('anukul_preferred_lang', lang);
    const domain = window.location.hostname;
    const pair = (lang === 'en') ? '/en/en' : `/en/${lang}`;

    // Update googtrans cookies
    document.cookie = `googtrans=${pair}; path=/`;
    document.cookie = `googtrans=${pair}; domain=${domain}; path=/`;
    if (domain.indexOf('.') !== -1) {
      const rootDomain = domain.split('.').slice(-2).join('.');
      document.cookie = `googtrans=${pair}; domain=.${rootDomain}; path=/`;
    }

    // Trigger select element inside Google Translate widget if loaded
    const combo = document.querySelector('.goog-te-combo');
    if (combo) {
      combo.value = lang;
      combo.dispatchEvent(new Event('change'));
    } else {
      window.location.reload();
    }
  }

  document.addEventListener('DOMContentLoaded', syncLanguageSelectors);
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<!-- Main Sanctuary Wrapper -->
<main class="w-full pt-[114px] bg-surface min-h-[calc(100vh-114px)]">

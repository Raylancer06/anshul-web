<?php
/**
 * ANUKUL Ayur Vastu Harmony Clinic Theme Functions
 *
 * @package Anukul
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'ANUKUL_VERSION', '1.0.0' );
define( 'ANUKUL_DIR', get_template_directory() );
define( 'ANUKUL_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function anukul_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 675, true );

    // Custom Logo support.
    add_theme_support( 'custom-logo', array(
        'height'      => 64,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // HTML5 markup support.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register Navigation Menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Sanctuary Navigation', 'anukul' ),
        'footer'  => __( 'Sanctuary Footer Explorations', 'anukul' ),
    ) );

    // WooCommerce Theme Support.
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'anukul_theme_setup' );

/**
 * Enqueue Theme Scripts and Styles
 */
function anukul_enqueue_assets() {
    // Google Fonts: EB Garamond & Manrope.
    wp_enqueue_style(
        'anukul-fonts',
        'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..700;1,400..700&family=Manrope:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Google Material Symbols Outlined.
    wp_enqueue_style(
        'anukul-material-symbols',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200',
        array(),
        null
    );

    // Bootstrap Icons.
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        array(),
        '1.11.3'
    );

    // Core Animation Styles.
    wp_enqueue_style(
        'anukul-animations',
        ANUKUL_URI . '/assets/css/anukul-animations.css',
        array(),
        ANUKUL_VERSION
    );

    // Main Theme Stylesheet.
    wp_enqueue_style(
        'anukul-style',
        get_stylesheet_uri(),
        array( 'anukul-animations' ),
        ANUKUL_VERSION
    );

    // Tailwind CSS Runtime Engine with ANUKUL Design Tokens.
    wp_enqueue_script(
        'tailwind-cdn',
        'https://cdn.tailwindcss.com?plugins=forms,container-queries',
        array(),
        '3.4.0',
        false
    );

    // Inline Tailwind Configuration Script matching approved source.
    $tailwind_config = '
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#1F4D3A",
            "primary-container": "#023625",
            "on-primary": "#ffffff",
            "secondary": "#B38A3E",
            "secondary-container": "#ff964c",
            "secondary-fixed": "#ffdbc7",
            "secondary-fixed-dim": "#ffb688",
            "on-secondary": "#ffffff",
            "on-secondary-fixed": "#311300",
            "tertiary": "#C66A22",
            "tertiary-container": "#7A2638",
            "on-tertiary": "#ffffff",
            "surface": "#F7F1E3",
            "surface-bright": "#FFF8F4",
            "surface-dim": "#e2d8d0",
            "surface-container": "#f6ece4",
            "surface-container-low": "#fcf2ea",
            "surface-container-lowest": "#ffffff",
            "surface-container-high": "#f1e6de",
            "surface-container-highest": "#ebe1d9",
            "surface-variant": "#ebe1d9",
            "on-surface": "#2E2924",
            "on-surface-variant": "#5D544C",
            "outline": "#717973",
            "outline-variant": "#c0c9c2",
            "background": "#FFF8F4",
            "on-background": "#2E2924"
          },
          fontFamily: {
            display: ["EB Garamond", "serif"],
            headline: ["EB Garamond", "serif"],
            body: ["Manrope", "sans-serif"],
            label: ["Manrope", "sans-serif"],
            "font-display": ["EB Garamond", "serif"],
            "font-body-md": ["Manrope", "sans-serif"],
            "font-body-sm": ["Manrope", "sans-serif"],
            "font-label-md": ["Manrope", "sans-serif"],
            "font-label-sm": ["Manrope", "sans-serif"]
          },
          spacing: {
            "space-xs": "0.25rem",
            "space-sm": "0.5rem",
            "space-md": "1rem",
            "space-lg": "1.75rem",
            "space-xl": "3rem",
            "space-2xl": "5rem",
            "margin": "1.5rem",
            "margin-md": "3rem",
            "margin-lg": "5rem",
            "gutter": "1.5rem",
            "gutter-lg": "2.5rem"
          }
        }
      }
    };
    ';
    wp_add_inline_script( 'tailwind-cdn', $tailwind_config, 'after' );

    // Scroll Reveal Script.
    wp_enqueue_script(
        'anukul-scroll',
        ANUKUL_URI . '/assets/js/anukul-scroll.js',
        array(),
        ANUKUL_VERSION,
        true
    );

    // Dynamic Mobile Navigation & AJAX Handler.
    $theme_inline_js = '
    document.addEventListener("DOMContentLoaded", function() {
      // Mobile Drawer Toggle
      var btn = document.getElementById("mobile-menu-btn");
      var menu = document.getElementById("mobile-menu");
      var icon = document.getElementById("mobile-menu-icon");
      if (btn && menu) {
        btn.onclick = function() {
          var isHidden = menu.classList.contains("hidden");
          if (isHidden) {
            menu.classList.remove("hidden");
            if (icon) icon.textContent = "close";
          } else {
            menu.classList.add("hidden");
            if (icon) icon.textContent = "menu";
          }
        };
      }
    });
    ';
    wp_add_inline_script( 'anukul-scroll', $theme_inline_js, 'after' );
}
add_action( 'wp_enqueue_scripts', 'anukul_enqueue_assets' );

/**
 * Customizer Configuration for Dynamic Clinic Data
 */
function anukul_customize_register( $wp_customize ) {
    // Clinic Identity & Contact Section
    $wp_customize->add_section( 'anukul_clinic_info', array(
        'title'    => __( 'ANUKUL Clinic Information', 'anukul' ),
        'priority' => 30,
    ) );

    // Phone
    $wp_customize->add_setting( 'anukul_phone', array(
        'default'           => '+91 (011) 2614-1008',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'anukul_phone', array(
        'label'    => __( 'Concierge Phone', 'anukul' ),
        'section'  => 'anukul_clinic_info',
        'type'     => 'text',
    ) );

    // Email
    $wp_customize->add_setting( 'anukul_email', array(
        'default'           => 'sanctuary@anukul-harmony.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'anukul_email', array(
        'label'    => __( 'Concierge Email', 'anukul' ),
        'section'  => 'anukul_clinic_info',
        'type'     => 'text',
    ) );

    // Hours
    $wp_customize->add_setting( 'anukul_hours', array(
        'default'           => 'Monday — Saturday: 08:00 AM – 07:00 PM IST',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'anukul_hours', array(
        'label'    => __( 'Sanctuary Operating Hours', 'anukul' ),
        'section'  => 'anukul_clinic_info',
        'type'     => 'text',
    ) );

    // Address
    $wp_customize->add_setting( 'anukul_address', array(
        'default'           => 'Prime Vedic Enclave, Cultural Quarter',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'anukul_address', array(
        'label'    => __( 'Clinic Location', 'anukul' ),
        'section'  => 'anukul_clinic_info',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'anukul_customize_register' );

/**
 * WooCommerce AJAX Header Cart Count Fragment
 */
function anukul_woocommerce_cart_count_fragment( $fragments ) {
    if ( class_exists( 'WooCommerce' ) ) {
        $count = WC()->cart->get_cart_contents_count();
        $fragments['span.anukul-cart-badge'] = '<span class="anukul-cart-badge absolute top-1 right-1 w-4 h-4 bg-secondary text-on-secondary text-[10px] font-bold rounded-full flex items-center justify-center leading-none">' . esc_html( $count ) . '</span>';
    }
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'anukul_woocommerce_cart_count_fragment' );

/**
 * Helper: Get dynamic logo URL with fallback to theme asset
 */
function anukul_get_logo_url() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    if ( $custom_logo_id ) {
        $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
        if ( ! empty( $logo[0] ) ) {
            return $logo[0];
        }
    }
    return ANUKUL_URI . '/assets/images/logo.png';
}

/**
 * Helper: Consultation Pricing Tiers Specification
 */
function anukul_get_consultation_tiers() {
    return array(
        'health' => array(
            'id'       => 'health',
            'title'    => __( 'Only Online Health Consultation', 'anukul' ),
            'tag'      => __( 'Prakriti & Health', 'anukul' ),
            'price'    => 1000,
            'duration' => '45 mins',
            'format'   => __( 'Video Call (Secure Tele-Health)', 'anukul' ),
            'desc'     => __( 'In-depth clinical discussion of Ayurvedic principles, doshic balance, dinacharya routines, tailored herbal formulations, and dietary guidance.', 'anukul' ),
        ),
        'medico-vastu' => array(
            'id'       => 'medico-vastu',
            'title'    => __( 'Medico-Vastu Consultation', 'anukul' ),
            'tag'      => __( 'Spatial Geometry', 'anukul' ),
            'price'    => 3100,
            'duration' => '60 mins',
            'format'   => __( 'Floor Plan Audit & Video Analysis', 'anukul' ),
            'desc'     => __( 'Evaluation of architectural layout, directional orientation, Ishanya/Brahmasthan flow, room usage, and non-destructive remedial harmonizers.', 'anukul' ),
        ),
        'astro-construction' => array(
            'id'       => 'astro-construction',
            'title'    => __( 'Medico-Astro-Vastu Construction', 'anukul' ),
            'tag'      => __( 'Architectural & Astro', 'anukul' ),
            'price'    => 4100,
            'duration' => '75 mins',
            'format'   => __( 'Architectural & Planetary Blueprint Audit', 'anukul' ),
            'desc'     => __( 'Architectural blueprint guidance aligning structural construction or renovation with planetary influences, cardinal energy grids, and health energetics.', 'anukul' ),
        ),
        'complete' => array(
            'id'       => 'complete',
            'title'    => __( 'Complete Medico-Astro Vastu Numerology Consultation', 'anukul' ),
            'tag'      => __( '4-Pillar Master Alignment', 'anukul' ),
            'price'    => 5100,
            'duration' => '90 mins',
            'format'   => __( 'Complete 4-Pillar Master Consultation', 'anukul' ),
            'desc'     => __( 'Definitive master consultation integrating Ayurvedic somatic diagnostics, astrological horoscopy, Vastu architecture, and sacred numerological analysis.', 'anukul' ),
            'featured' => true,
        ),
    );
}

/**
 * Navigation Menu Helpers - 100% Exact HTML preservation matching approved design
 */
function anukul_get_nav_items() {
    $menu_name = 'primary';
    $locations = get_nav_menu_locations();
    $items = array();

    if ( isset( $locations[ $menu_name ] ) ) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        if ( $menu ) {
            $menu_items = wp_get_nav_menu_items( $menu->term_id );
            if ( ! empty( $menu_items ) ) {
                foreach ( $menu_items as $mi ) {
                    $slug = sanitize_title( $mi->title );
                    if ( $mi->object === 'page' ) {
                        $p = get_post( $mi->object_id );
                        if ( $p ) {
                            $slug = $p->post_name;
                        }
                    }
                    $items[] = array(
                        'title' => $mi->title,
                        'url'   => $mi->url,
                        'slug'  => $slug,
                    );
                }
            }
        }
    }

    if ( empty( $items ) ) {
        $items = array(
            array( 'title' => 'Home',      'url' => home_url( '/' ),          'slug' => 'home' ),
            array( 'title' => 'Ayurveda',  'url' => home_url( '/ayurveda/' ),  'slug' => 'ayurveda' ),
            array( 'title' => 'Vastu',     'url' => home_url( '/vastu/' ),     'slug' => 'vastu' ),
            array( 'title' => 'Services',  'url' => home_url( '/services/' ),  'slug' => 'services' ),
            array( 'title' => 'Shop',      'url' => ( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ), 'slug' => 'shop' ),
            array( 'title' => 'Blog',      'url' => ( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ), 'slug' => 'blog' ),
            array( 'title' => 'Gallery',   'url' => home_url( '/gallery/' ),   'slug' => 'gallery' ),
            array( 'title' => 'Contact',   'url' => home_url( '/contact/' ),   'slug' => 'contact' ),
        );
    }
    return $items;
}

function anukul_is_nav_item_active( $item ) {
    global $wp;
    $current_url = trailingslashit( home_url( add_query_arg( array(), $wp->request ) ) );
    $item_url    = trailingslashit( $item['url'] );

    if ( $item['slug'] === 'home' || $item['title'] === 'Home' ) {
        return ( is_front_page() || $current_url === trailingslashit( home_url( '/' ) ) );
    }

    if ( $item['slug'] === 'blog' || $item['title'] === 'Blog' ) {
        return ( is_home() || is_singular( 'post' ) || is_category() || is_tag() );
    }

    if ( function_exists( 'is_woocommerce' ) && ( $item['slug'] === 'shop' || $item['title'] === 'Shop' ) ) {
        return ( is_shop() || is_product_taxonomy() || is_product() );
    }

    if ( is_page( $item['slug'] ) ) {
        return true;
    }

    return ( $current_url === $item_url );
}

function anukul_render_nav_desktop() {
    $items = anukul_get_nav_items();
    foreach ( $items as $item ) {
        $active = anukul_is_nav_item_active( $item );
        if ( $active ) {
            echo '<a aria-current="page" class="font-label-md text-label-md uppercase transition-colors tracking-widest text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]" data-path="' . esc_attr( $item['slug'] ) . '" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
        } else {
            echo '<a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="' . esc_attr( $item['slug'] ) . '" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
        }
    }
}

function anukul_render_nav_mobile() {
    $items = anukul_get_nav_items();
    foreach ( $items as $item ) {
        $active = anukul_is_nav_item_active( $item );
        if ( $active ) {
            echo '<a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest bg-surface-container text-primary font-semibold transition-colors" data-path="' . esc_attr( $item['slug'] ) . '" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
        } else {
            echo '<a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="' . esc_attr( $item['slug'] ) . '" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
        }
    }
}

function anukul_render_nav_footer() {
    $items = anukul_get_nav_items();
    foreach ( $items as $item ) {
        echo '<a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="' . esc_attr( $item['slug'] ) . '" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
    }
}

/**
 * Remove conflicting default WordPress block styles on front end
 */
function anukul_dequeue_conflicting_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'classic-theme-styles' );
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'anukul_dequeue_conflicting_styles', 100 );

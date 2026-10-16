<?php
/**
 * ANUKUL Navigation Walkers & Dynamic Menu Rendering
 *
 * Provides native WordPress menu integration with support for:
 * - Nested dropdown menus (Desktop & Mobile)
 * - Custom active states
 * - Graceful fallbacks matching the ANUKUL design system
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Check if a menu item or URL corresponds to the currently viewed page
 */
function anukul_is_url_active( $url ) {
    global $wp;
    $current_url = trailingslashit( home_url( add_query_arg( array(), $wp->request ) ) );
    $target_url  = trailingslashit( $url );

    if ( $target_url === trailingslashit( home_url( '/' ) ) ) {
        return ( is_front_page() || $current_url === $target_url );
    }

    if ( strpos( $target_url, '/shop' ) !== false && function_exists( 'is_woocommerce' ) ) {
        return ( is_shop() || is_product_taxonomy() || is_product() );
    }

    if ( strpos( $target_url, '/blog' ) !== false ) {
        return ( is_home() || is_singular( 'post' ) || is_category() || is_tag() );
    }

    return ( $current_url === $target_url );
}

/**
 * Desktop Navigation Walker supporting dropdowns & active indicators
 */
class Anukul_Desktop_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"dropdown-menu absolute left-0 top-full hidden group-hover:block group-focus-within:block bg-[#F7F1E3] border border-[#E8D8BC] rounded-lg shadow-xl py-2 min-w-[230px] z-50 text-left transition-all duration-200 mt-1\">\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "$indent</ul>\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_child = in_array( 'menu-item-has-children', $classes, true );

        $is_active = in_array( 'current-menu-item', $classes, true ) ||
                     in_array( 'current-menu-parent', $classes, true ) ||
                     in_array( 'current-menu-ancestor', $classes, true ) ||
                     anukul_is_url_active( $item->url );

        if ( $depth === 0 ) {
            if ( $has_child ) {
                $output .= $indent . '<div class="relative group inline-flex items-center">';
                $output .= '<a href="' . esc_url( $item->url ) . '" class="font-label-md text-label-md uppercase tracking-widest inline-flex items-center gap-1 transition-colors ' . ( $is_active ? 'text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]' : 'text-on-surface-variant hover:text-primary' ) . '">';
                $output .= esc_html( $item->title );
                $output .= '<span class="material-symbols-outlined notranslate text-[15px] text-outline group-hover:rotate-180 transition-transform duration-200" translate="no">expand_more</span>';
                $output .= '</a>';
            } else {
                $output .= $indent . '<a href="' . esc_url( $item->url ) . '" class="font-label-md text-label-md uppercase tracking-widest transition-colors ' . ( $is_active ? 'text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]' : 'text-on-surface-variant hover:text-primary' ) . '">';
                $output .= esc_html( $item->title );
                $output .= '</a>';
            }
        } else {
            // Submenu item
            $output .= $indent . '<li class="px-1"><a href="' . esc_url( $item->url ) . '" class="block px-4 py-2 rounded font-label-md text-xs uppercase tracking-wider transition-colors ' . ( $is_active ? 'text-secondary font-bold bg-[#E8D8BC]/50' : 'text-primary hover:bg-[#E8D8BC]/40 hover:text-secondary' ) . '">';
            $output .= esc_html( $item->title );
            $output .= '</a>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_child = in_array( 'menu-item-has-children', $classes, true );

        if ( $depth === 0 ) {
            if ( $has_child ) {
                $output .= "</div>\n";
            } else {
                $output .= "\n";
            }
        } else {
            $output .= "</li>\n";
        }
    }
}

/**
 * Mobile Drawer Navigation Walker supporting collapsible submenus
 */
class Anukul_Mobile_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "\n<div class=\"mobile-submenu hidden pl-3 py-1 space-y-1 border-l-2 border-[#B38A3E]/40 ml-3 my-1\">\n";
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= "</div>\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_child = in_array( 'menu-item-has-children', $classes, true );

        $is_active = in_array( 'current-menu-item', $classes, true ) ||
                     in_array( 'current-menu-parent', $classes, true ) ||
                     in_array( 'current-menu-ancestor', $classes, true ) ||
                     anukul_is_url_active( $item->url );

        if ( $depth === 0 ) {
            if ( $has_child ) {
                $output .= '<div class="mobile-nav-group flex flex-col">';
                $output .= '<div class="flex items-center justify-between py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest transition-colors ' . ( $is_active ? 'bg-surface-container text-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-container hover:text-primary' ) . '">';
                $output .= '<a href="' . esc_url( $item->url ) . '" class="flex-1">' . esc_html( $item->title ) . '</a>';
                $output .= '<button type="button" onclick="var sub = this.closest(\'.mobile-nav-group\').querySelector(\'.mobile-submenu\'); if (sub) { sub.classList.toggle(\'hidden\'); this.querySelector(\'span\').classList.toggle(\'rotate-180\'); }" class="p-1 text-outline hover:text-primary transition-transform notranslate" translate="no"><span class="material-symbols-outlined notranslate text-[18px]" translate="no">expand_more</span></button>';
                $output .= '</div>';
            } else {
                $output .= '<a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest transition-colors ' . ( $is_active ? 'bg-surface-container text-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-container hover:text-primary' ) . '" href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
            }
        } else {
            $output .= '<a class="block py-1.5 px-2.5 rounded font-label-md text-xs uppercase tracking-wider transition-colors ' . ( $is_active ? 'text-secondary font-bold bg-[#E8D8BC]/50' : 'text-on-surface-variant hover:text-primary hover:bg-[#E8D8BC]/30' ) . '" href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $has_child = in_array( 'menu-item-has-children', $classes, true );

        if ( $depth === 0 && $has_child ) {
            $output .= "</div>\n";
        }
    }
}

/**
 * Render Desktop Primary Navigation
 */
function anukul_render_nav_desktop() {
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Anukul_Desktop_Nav_Walker(),
            'fallback_cb'    => 'anukul_default_desktop_nav',
            'depth'          => 2,
        ) );
    } else {
        anukul_default_desktop_nav();
    }
}

/**
 * Render Mobile Drawer Navigation
 */
function anukul_render_nav_mobile() {
    $theme_loc = has_nav_menu( 'mobile' ) ? 'mobile' : ( has_nav_menu( 'primary' ) ? 'primary' : '' );
    if ( $theme_loc ) {
        wp_nav_menu( array(
            'theme_location' => $theme_loc,
            'container'      => false,
            'items_wrap'     => '%3$s',
            'walker'         => new Anukul_Mobile_Nav_Walker(),
            'fallback_cb'    => 'anukul_default_mobile_nav',
            'depth'          => 2,
        ) );
    } else {
        anukul_default_mobile_nav();
    }
}

/**
 * Render Footer Explorations Navigation
 */
function anukul_render_nav_footer() {
    if ( has_nav_menu( 'footer' ) ) {
        $locations = get_nav_menu_locations();
        $menu_obj  = wp_get_nav_menu_object( $locations['footer'] );
        if ( $menu_obj ) {
            $items = wp_get_nav_menu_items( $menu_obj->term_id );
            if ( ! empty( $items ) ) {
                foreach ( $items as $item ) {
                    echo '<a class="font-body-sm text-body-sm text-[#E8D8BC]/85 hover:text-[#B38A3E] transition-colors" href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>' . "\n";
                }
                return;
            }
        }
    }
    anukul_default_footer_nav();
}

/**
 * Render Footer Legal / Policy Navigation
 */
function anukul_render_nav_policy() {
    if ( has_nav_menu( 'policy' ) ) {
        $locations = get_nav_menu_locations();
        $menu_obj  = wp_get_nav_menu_object( $locations['policy'] );
        if ( $menu_obj ) {
            $items = wp_get_nav_menu_items( $menu_obj->term_id );
            if ( ! empty( $items ) ) {
                $count = count( $items );
                $i = 0;
                foreach ( $items as $item ) {
                    echo '<a class="hover:text-[#B38A3E] transition-colors" href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
                    if ( ++$i < $count ) {
                        echo '<span class="text-[#B38A3E]/40">&bull;</span>';
                    }
                }
                return;
            }
        }
    }
    anukul_default_policy_nav();
}

/**
 * Default 8 Items Desktop Navigation Fallback
 */
function anukul_default_desktop_nav() {
    $defaults = anukul_get_core_nav_defaults();
    foreach ( $defaults as $item ) {
        $is_active = anukul_is_url_active( $item['url'] );
        if ( $is_active ) {
            echo '<a aria-current="page" class="font-label-md text-label-md uppercase transition-colors tracking-widest text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
        } else {
            echo '<a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
        }
    }
}

/**
 * Default 8 Items Mobile Navigation Fallback
 */
function anukul_default_mobile_nav() {
    $defaults = anukul_get_core_nav_defaults();
    foreach ( $defaults as $item ) {
        $is_active = anukul_is_url_active( $item['url'] );
        if ( $is_active ) {
            echo '<a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest bg-surface-container text-primary font-semibold transition-colors" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
        } else {
            echo '<a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
        }
    }
}

/**
 * Default Footer Navigation Fallback
 */
function anukul_default_footer_nav() {
    $defaults = anukul_get_core_nav_defaults();
    foreach ( $defaults as $item ) {
        echo '<a class="font-body-sm text-body-sm text-[#E8D8BC]/85 hover:text-[#B38A3E] transition-colors" href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['title'] ) . '</a>' . "\n";
    }
}

/**
 * Default Policy Navigation Fallback
 */
function anukul_default_policy_nav() {
    echo '<a class="hover:text-[#B38A3E] transition-colors" href="' . esc_url( home_url( '/contact/#privacy' ) ) . '">' . esc_html__( 'Privacy Policy', 'anukul' ) . '</a>';
    echo '<span class="text-[#B38A3E]/40">&bull;</span>';
    echo '<a class="hover:text-[#B38A3E] transition-colors" href="' . esc_url( home_url( '/contact/#terms' ) ) . '">' . esc_html__( 'Terms', 'anukul' ) . '</a>';
    echo '<span class="text-[#B38A3E]/40">&bull;</span>';
    echo '<a class="hover:text-[#B38A3E] transition-colors" href="' . esc_url( home_url( '/contact/#disclaimer' ) ) . '">' . esc_html__( 'Disclaimer', 'anukul' ) . '</a>';
}

/**
 * Core Navigation Defaults
 */
function anukul_get_core_nav_defaults() {
    return array(
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

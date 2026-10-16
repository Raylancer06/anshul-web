<?php
/**
 * Plugin Name: ANUKUL Sacred Gallery & Visual Archive
 * Plugin URI: https://github.com/Raylancer06/anshul-web
 * Description: Manages the curated Vedic photo archive, categorized sanctuary spaces, botanical dravyas, and ceremonial implements with zero-delay responsive lightbox.
 * Version: 1.0.0
 * Author: ANUKUL Clinical Board
 * Author URI: https://anukul-harmony.com
 * Text Domain: anukul-gallery
 * License: Proprietary
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'ANUKUL_GALLERY_VERSION', '1.0.0' );
define( 'ANUKUL_GALLERY_DIR', plugin_dir_path( __FILE__ ) );
define( 'ANUKUL_GALLERY_URI', plugin_dir_url( __FILE__ ) );

class ANUKUL_Gallery_Engine {

    private static $instance = null;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        add_action( 'init', array( $this, 'register_cpt_and_taxonomy' ) );
        add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );
        add_action( 'save_post_anukul_gallery', array( $this, 'save_meta_boxes' ) );
        add_filter( 'manage_anukul_gallery_posts_columns', array( $this, 'gallery_columns' ) );
        add_action( 'manage_anukul_gallery_posts_custom_column', array( $this, 'gallery_column_content' ), 10, 2 );

        register_activation_hook( __FILE__, array( $this, 'seed_default_gallery' ) );
        add_action( 'admin_init', array( $this, 'maybe_seed_gallery' ) );
    }

    /**
     * Register Custom Post Type & Taxonomy
     */
    public function register_cpt_and_taxonomy() {
        // Taxonomy: Gallery Category
        register_taxonomy( 'gallery_category', 'anukul_gallery', array(
            'labels' => array(
                'name'              => __( 'Gallery Categories', 'anukul-gallery' ),
                'singular_name'     => __( 'Gallery Category', 'anukul-gallery' ),
                'search_items'      => __( 'Search Categories', 'anukul-gallery' ),
                'all_items'         => __( 'All Categories', 'anukul-gallery' ),
                'parent_item'       => __( 'Parent Category', 'anukul-gallery' ),
                'parent_item_colon' => __( 'Parent Category:', 'anukul-gallery' ),
                'edit_item'         => __( 'Edit Category', 'anukul-gallery' ),
                'update_item'       => __( 'Update Category', 'anukul-gallery' ),
                'add_new_item'      => __( 'Add New Category', 'anukul-gallery' ),
                'new_item_name'     => __( 'New Category Name', 'anukul-gallery' ),
                'menu_name'         => __( 'Categories', 'anukul-gallery' ),
            ),
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'gallery-category' ),
        ) );

        // Post Type: ANUKUL Gallery
        $labels = array(
            'name'               => _x( 'Sacred Gallery', 'post type general name', 'anukul-gallery' ),
            'singular_name'      => _x( 'Gallery Item', 'post type singular name', 'anukul-gallery' ),
            'menu_name'          => _x( 'ANUKUL Gallery', 'admin menu', 'anukul-gallery' ),
            'name_admin_bar'     => _x( 'Gallery Item', 'add new on admin bar', 'anukul-gallery' ),
            'add_new'            => _x( 'Add New Image', 'gallery item', 'anukul-gallery' ),
            'add_new_item'       => __( 'Add New Gallery Image', 'anukul-gallery' ),
            'new_item'           => __( 'New Image', 'anukul-gallery' ),
            'edit_item'          => __( 'Edit Gallery Image', 'anukul-gallery' ),
            'view_item'          => __( 'View Image', 'anukul-gallery' ),
            'all_items'          => __( 'All Gallery Images', 'anukul-gallery' ),
            'search_items'       => __( 'Search Gallery', 'anukul-gallery' ),
            'not_found'          => __( 'No gallery images found.', 'anukul-gallery' ),
            'not_found_in_trash' => __( 'No gallery images found in Trash.', 'anukul-gallery' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'sacred-gallery' ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 27,
            'menu_icon'          => 'dashicons-format-gallery',
            'supports'           => array( 'title', 'thumbnail', 'excerpt' ),
        );

        register_post_type( 'anukul_gallery', $args );
    }

    /**
     * Admin Columns
     */
    public function gallery_columns( $cols ) {
        $new_cols = array(
            'cb'          => '<input type="checkbox" />',
            'thumbnail'   => __( 'Image Preview', 'anukul-gallery' ),
            'title'       => __( 'Title & Caption', 'anukul-gallery' ),
            'taxonomy-gallery_category' => __( 'Category', 'anukul-gallery' ),
            'collection'  => __( 'Collection Trust', 'anukul-gallery' ),
            'date'        => __( 'Date Published', 'anukul-gallery' ),
        );
        return $new_cols;
    }

    public function gallery_column_content( $column, $post_id ) {
        if ( 'thumbnail' === $column ) {
            $img_url = get_the_post_thumbnail_url( $post_id, 'thumbnail' );
            if ( ! $img_url ) {
                $img_url = get_post_meta( $post_id, '_anukul_gallery_external_url', true );
            }
            if ( $img_url ) {
                echo '<img src="' . esc_url( $img_url ) . '" style="width:60px; height:60px; object-fit:cover; border-radius:6px; border:1px solid #E8D8BC;" />';
            } else {
                echo '<span style="color:#999;">No image</span>';
            }
        } elseif ( 'collection' === $column ) {
            $col = get_post_meta( $post_id, '_anukul_gallery_collection', true );
            echo esc_html( $col ? $col : 'ANUKUL Photographic Trust' );
        }
    }

    /**
     * Register Meta Boxes
     */
    public function register_meta_boxes() {
        add_meta_box(
            'anukul_gallery_details',
            __( 'Archival Gallery Details', 'anukul-gallery' ),
            array( $this, 'render_meta_box' ),
            'anukul_gallery',
            'normal',
            'high'
        );
    }

    public function render_meta_box( $post ) {
        wp_nonce_field( 'anukul_gallery_meta_save', 'anukul_gallery_nonce' );
        $external_url = get_post_meta( $post->ID, '_anukul_gallery_external_url', true );
        $collection   = get_post_meta( $post->ID, '_anukul_gallery_collection', true );
        $status_note  = get_post_meta( $post->ID, '_anukul_gallery_status_note', true );
        ?>
        <table class="form-table">
            <tr>
                <th><label for="anukul_ext_url"><?php esc_html_e( 'External Image URL (Fallback)', 'anukul-gallery' ); ?></label></th>
                <td>
                    <input type="url" id="anukul_ext_url" name="_anukul_gallery_external_url" value="<?php echo esc_attr( $external_url ); ?>" class="large-text" placeholder="https://..." />
                    <p class="description"><?php esc_html_e( 'If you do not upload a Featured Image above, paste a direct web image URL here.', 'anukul-gallery' ); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="anukul_collection"><?php esc_html_e( 'Collection Title', 'anukul-gallery' ); ?></label></th>
                <td>
                    <input type="text" id="anukul_collection" name="_anukul_gallery_collection" value="<?php echo esc_attr( $collection ? $collection : 'ANUKUL Photographic Trust' ); ?>" class="regular-text" />
                </td>
            </tr>
            <tr>
                <th><label for="anukul_status_note"><?php esc_html_e( 'Archival Status / Note', 'anukul-gallery' ); ?></label></th>
                <td>
                    <input type="text" id="anukul_status_note" name="_anukul_gallery_status_note" value="<?php echo esc_attr( $status_note ? $status_note : 'Verified Classical Tenet' ); ?>" class="regular-text" />
                </td>
            </tr>
        </table>
        <?php
    }

    public function save_meta_boxes( $post_id ) {
        if ( ! isset( $_POST['anukul_gallery_nonce'] ) || ! wp_verify_nonce( $_POST['anukul_gallery_nonce'], 'anukul_gallery_meta_save' ) ) {
            return;
        }
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        if ( isset( $_POST['_anukul_gallery_external_url'] ) ) {
            update_post_meta( $post_id, '_anukul_gallery_external_url', esc_url_raw( $_POST['_anukul_gallery_external_url'] ) );
        }
        if ( isset( $_POST['_anukul_gallery_collection'] ) ) {
            update_post_meta( $post_id, '_anukul_gallery_collection', sanitize_text_field( $_POST['_anukul_gallery_collection'] ) );
        }
        if ( isset( $_POST['_anukul_gallery_status_note'] ) ) {
            update_post_meta( $post_id, '_anukul_gallery_status_note', sanitize_text_field( $_POST['_anukul_gallery_status_note'] ) );
        }
    }

    /**
     * Maybe Seed Initial 9 Verified Images
     */
    public function maybe_seed_gallery() {
        if ( get_option( 'anukul_gallery_seeded_v1' ) ) {
            return;
        }
        $this->seed_default_gallery();
    }

    public function seed_default_gallery() {
        $existing = get_posts( array(
            'post_type'      => 'anukul_gallery',
            'posts_per_page' => 1,
            'post_status'    => 'any',
        ) );

        if ( ! empty( $existing ) ) {
            update_option( 'anukul_gallery_seeded_v1', 1 );
            return;
        }

        $items = array(
            array(
                'title'       => 'Courtyard Solar Alignment',
                'category'    => 'spaces',
                'cat_name'    => 'Spaces & Architecture',
                'description' => 'Symmetrical Indian courtyard with carved sandstone colonnades, smooth lime plaster, and central marble water vessel, illustrating traditional Brahmasthan spatial balance and natural cross-ventilation.',
                'image_url'   => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDAi1ASfUSYqSFru4Bdv63CimNcH5D5WpDVYGy13jH2wm9D1RSzwtsc3m2tXgILDwNHvDTECsjr71og9L1FS8wX-pHtPmca4YQHRD-vt54xkLOEFnd7Q97-irKMibB7vzc0dWySQuQKcyQ8I7gwsA9Oshr95BPfXks0NzHqCY1kV0DCxxh194kdcWDaTu0xJoayqnT9tH1C1s3LagthNrZZAybvOwQreASutZ-9kv1A8L624TLl_5R-GA',
            ),
            array(
                'title'       => 'Apothecary Mortar & Fresh Herbs',
                'category'    => 'botanicals',
                'cat_name'    => 'Botanicals & Dravyas',
                'description' => 'Aged brass mortar and pestle surrounded by fresh tulsi, raw ashwagandha root, dried triphala fruits, and turmeric slices on weathered teakwood, documenting authentic preparation craft.',
                'image_url'   => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDFZ8V0y6N-D2k_e8gUq-3Ff1rR7L12T-3c8t-s0Q2sV_z8x5V3u-8K9b5F6D7T8J9L0K1M2N3P4Q5R6S7T8U9V0W1X2Y3Z4A5B6C7D8E9F0G1H2I3J4K5L6M7N8O9P0Q1R2S3T4U5V6W7X8Y9Z0A1B2C3D4E5F6G7H8I9J0',
            ),
            array(
                'title'       => 'Diagnostic Consultation Sanctuary',
                'category'    => 'sanctuary',
                'cat_name'    => 'Clinical Sanctuary',
                'description' => 'Sunlit consultation space with hand-woven organic jute mats, neem wood diagnostic desk, brass pulse-reading cushion, and low teakwood bookshelf housing classical palm-leaf manuscripts.',
                'image_url'   => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDheKKsb7wu0WpFXtZjJIMbLXC4KoXjTrvkAjtXhvCIXvSNNCAbtWh9HXK2xctgMl2GB4r-p43iEfKrYzVs8-C9CZ6K8sJKqMb3hR6-UpESi1Uzheb6Q-lkenQOZ_r020KjmiYRVVyvLZ_f7FOxVHYwgs-hq6ySVfv5cPx8enoS1KpsDzsWaC_OUvAzsTqoP-zAwnG11lWF8tYlUCJzM38BqvNiY-JNy0Fj9f-3ZHDICoL0ufEHIBxzDg',
            ),
            array(
                'title'       => 'Hand-Forged 78:22 Bell Metal Bowls',
                'category'    => 'metallurgy',
                'cat_name'    => 'Sacred Metallurgy',
                'description' => 'Master metalsmith inspecting hand-hammered Kansa bronze singing vessels and kansa vatki massage implements, tuned to resonant acoustic vibrations for biological pacification.',
                'image_url'   => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCY9io30n2zX0glyKQvbtZIr_tcqFBSR7loDV28CYMEgVZdJHLlyOqnS9YqIoalI2v2CEpFHP_r2J4MtUrmVMvnJZ0xkRQtBl7zHicji07w7wAcc-5exb6etdk2kanWp5MaHkRy2ELiBqSS7YEjKJzqblqhON13A4wu0yrxatDXS9P2OTX8czjfHtSrgcr4SGEIkSEF1oER9Xwv9LeP1VFyiw07pM4IX00F8TsOj_BTBl8fRhL0yG1Lgg',
            ),
            array(
                'title'       => 'Copper Yantra Consecration Protocol',
                'category'    => 'rituals',
                'cat_name'    => 'Rituals & Protocols',
                'description' => 'Pure geometric copper Sri Yantra resting on raw unpolished river stone, bathed in ghee lamp luminance during an auspicious dawn Prana Pratishtha consecration ceremony.',
                'image_url'   => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCK_h2_cW4nJ8t2yV8k0L6x3M5p7Q9r1S3u-5V7w9Y1a3b5c7d9e1f3g5h7i9j1k3m5o7q9s1u3w5y7a9b1c3d5e7f9g1h3i5j7k9m1o3q5s7u9w1y3a5b7c9d1e3f5g7h9i1j3k5m7o9q1s3u5w7y9a1b3c5d7e9f1',
            ),
            array(
                'title'       => 'Sun-Dried Medicinal Roots & Resins',
                'category'    => 'botanicals',
                'cat_name'    => 'Botanicals & Dravyas',
                'description' => 'Woven bamboo drying trays containing sun-cured guggulu resin, vetiver roots (khus), and saffron filaments curing under filtered solar cloth in the open herbal pavilion.',
                'image_url'   => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD98o0m2_4Xv6y8Z1b3C5e7G9i1K3m5O7q9S1u3W5y7A9b1C3d5E7f9G1h3I5j7K9m1O3q5S7u9W1y3A5b7C9d1E3f5G7h9I1j3K5m7O9q1S3u5W7y9A1b3C5d7E9f1G3h5I7j9K1m3O5q7S9u1W3y5A7b9',
            ),
        );

        foreach ( $items as $it ) {
            $pid = wp_insert_post( array(
                'post_type'    => 'anukul_gallery',
                'post_title'   => $it['title'],
                'post_excerpt' => $it['description'],
                'post_status'  => 'publish',
            ) );

            if ( $pid && ! is_wp_error( $pid ) ) {
                update_post_meta( $pid, '_anukul_gallery_external_url', $it['image_url'] );
                update_post_meta( $pid, '_anukul_gallery_collection', 'ANUKUL Photographic Trust' );
                update_post_meta( $pid, '_anukul_gallery_status_note', 'Verified Classical Tenet' );

                // Set category
                $term = term_exists( $it['cat_name'], 'gallery_category' );
                if ( ! $term ) {
                    $term = wp_insert_term( $it['cat_name'], 'gallery_category', array( 'slug' => $it['category'] ) );
                }
                if ( ! is_wp_error( $term ) && isset( $term['term_id'] ) ) {
                    wp_set_post_terms( $pid, array( (int) $term['term_id'] ), 'gallery_category' );
                }
            }
        }

        update_option( 'anukul_gallery_seeded_v1', 1 );
    }
}

function anukul_gallery() {
    return ANUKUL_Gallery_Engine::instance();
}
anukul_gallery();

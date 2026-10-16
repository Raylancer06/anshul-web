<?php
/**
 * Plugin Name: ANUKUL Consultation Booking & Verification Engine
 * Plugin URI: https://github.com/Raylancer06/anshul-web
 * Description: Manages paid Vedic consultation bookings, calendar slot allocation, double-booking prevention, WooCommerce checkout bridge, admin WhatsApp notifications (7624012501), and consultation rules/plans.
 * Version: 1.1.0
 * Author: ANUKUL Clinical Board
 * Author URI: https://anukul-harmony.com
 * Text Domain: anukul-booking
 * License: Proprietary
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'ANUKUL_BOOKING_VERSION', '1.1.0' );
define( 'ANUKUL_BOOKING_DIR', plugin_dir_path( __FILE__ ) );
define( 'ANUKUL_BOOKING_URI', plugin_dir_url( __FILE__ ) );
define( 'ANUKUL_ADMIN_WHATSAPP_DEFAULT', '917624012501' );

class ANUKUL_Booking_Engine {

    private static $instance = null;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        add_action( 'init', array( $this, 'register_booking_cpt' ) );
        add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
        add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );
        add_action( 'save_post_anukul_booking', array( $this, 'save_booking_meta' ) );

        // Admin Custom Columns
        add_filter( 'manage_anukul_booking_posts_columns', array( $this, 'booking_columns' ) );
        add_action( 'manage_anukul_booking_posts_custom_column', array( $this, 'booking_column_content' ), 10, 2 );
        add_action( 'admin_action_anukul_quick_status', array( $this, 'handle_quick_status' ) );

        // AJAX handlers
        add_action( 'wp_ajax_anukul_book_slot', array( $this, 'ajax_book_slot' ) );
        add_action( 'wp_ajax_nopriv_anukul_book_slot', array( $this, 'ajax_book_slot' ) );
        add_action( 'wp_ajax_anukul_check_availability', array( $this, 'ajax_check_availability' ) );
        add_action( 'wp_ajax_nopriv_anukul_check_availability', array( $this, 'ajax_check_availability' ) );

        // WooCommerce Order Status Synchronization
        add_action( 'woocommerce_order_status_completed', array( $this, 'on_payment_verified' ) );
        add_action( 'woocommerce_order_status_processing', array( $this, 'on_payment_verified' ) );
        add_action( 'woocommerce_order_status_on-hold', array( $this, 'on_payment_on_hold' ) );
        add_action( 'woocommerce_order_status_failed', array( $this, 'on_payment_failed' ) );
        add_action( 'woocommerce_order_status_cancelled', array( $this, 'on_payment_cancelled' ) );

        // WooCommerce Product Order WhatsApp Notification
        add_action( 'woocommerce_new_order', array( $this, 'on_new_woocommerce_order' ), 20, 2 );
        add_action( 'woocommerce_admin_order_data_after_billing_address', array( $this, 'render_order_whatsapp_button' ) );
    }

    /**
     * Defined 4 Consultation Tiers (Supports Custom Admin Overrides)
     */
    public static function get_tiers() {
        $custom = get_option( 'anukul_booking_tiers_custom', array() );
        
        $defaults = array(
            'health' => array(
                'sku'      => 'ANK-MED-01',
                'title'    => 'Only Online Health Consultation',
                'price'    => 1000,
                'duration' => '45 mins',
                'format'   => 'Video Call (Secure Tele-Health)',
            ),
            'medico-vastu' => array(
                'sku'      => 'ANK-MED-02',
                'title'    => 'Medico-Vastu Consultation',
                'price'    => 3100,
                'duration' => '60 mins',
                'format'   => 'Floor Plan Audit & Video Analysis',
            ),
            'astro-construction' => array(
                'sku'      => 'ANK-MED-03',
                'title'    => 'Medico-Astro-Vastu Construction',
                'price'    => 4100,
                'duration' => '75 mins',
                'format'   => 'Architectural & Planetary Blueprint Audit',
            ),
            'complete' => array(
                'sku'      => 'ANK-MED-04',
                'title'    => 'Complete Medico-Astro Vastu Numerology Consultation',
                'price'    => 5100,
                'duration' => '90 mins',
                'format'   => 'Complete 4-Pillar Master Consultation',
            ),
        );

        if ( ! empty( $custom ) && is_array( $custom ) ) {
            foreach ( $defaults as $k => $def ) {
                if ( isset( $custom[ $k ] ) ) {
                    $defaults[ $k ]['title']    = ! empty( $custom[ $k ]['title'] ) ? $custom[ $k ]['title'] : $def['title'];
                    $defaults[ $k ]['price']    = isset( $custom[ $k ]['price'] ) ? (float) $custom[ $k ]['price'] : $def['price'];
                    $defaults[ $k ]['duration'] = ! empty( $custom[ $k ]['duration'] ) ? $custom[ $k ]['duration'] : $def['duration'];
                    $defaults[ $k ]['format']   = ! empty( $custom[ $k ]['format'] ) ? $custom[ $k ]['format'] : $def['format'];
                }
            }
        }

        return $defaults;
    }

    /**
     * Get Configured Admin WhatsApp Number
     */
    public static function get_admin_whatsapp_number() {
        $num = get_option( 'anukul_admin_whatsapp_number', ANUKUL_ADMIN_WHATSAPP_DEFAULT );
        $clean = preg_replace( '/[^0-9]/', '', $num );
        return ! empty( $clean ) ? $clean : ANUKUL_ADMIN_WHATSAPP_DEFAULT;
    }

    /**
     * Get or create consultation virtual product in WooCommerce
     */
    public static function get_tier_product_id( $tier_key ) {
        $tiers = self::get_tiers();
        if ( ! isset( $tiers[ $tier_key ] ) || ! class_exists( 'WooCommerce' ) ) {
            return 0;
        }
        $info = $tiers[ $tier_key ];
        $product_id = wc_get_product_id_by_sku( $info['sku'] );
        if ( $product_id ) {
            return $product_id;
        }

        // Create virtual product if missing
        $product = new WC_Product_Simple();
        $product->set_name( $info['title'] );
        $product->set_sku( $info['sku'] );
        $product->set_regular_price( $info['price'] );
        $product->set_price( $info['price'] );
        $product->set_virtual( true );
        $product->set_status( 'publish' );
        return $product->save();
    }

    /**
     * Register Custom Post Type for Bookings
     */
    public function register_booking_cpt() {
        $labels = array(
            'name'               => _x( 'Consultation Bookings', 'post type general name', 'anukul-booking' ),
            'singular_name'      => _x( 'Consultation Booking', 'post type singular name', 'anukul-booking' ),
            'menu_name'          => _x( 'ANUKUL Bookings', 'admin menu', 'anukul-booking' ),
            'name_admin_bar'     => _x( 'Booking', 'add new on admin bar', 'anukul-booking' ),
            'add_new'            => _x( 'Add New Booking', 'booking', 'anukul-booking' ),
            'add_new_item'       => __( 'Add New Consultation Booking', 'anukul-booking' ),
            'new_item'           => __( 'New Booking', 'anukul-booking' ),
            'edit_item'          => __( 'Edit Booking', 'anukul-booking' ),
            'view_item'          => __( 'View Booking', 'anukul-booking' ),
            'all_items'          => __( 'All Bookings', 'anukul-booking' ),
            'search_items'       => __( 'Search Bookings', 'anukul-booking' ),
            'not_found'          => __( 'No bookings discovered.', 'anukul-booking' ),
            'not_found_in_trash' => __( 'No bookings found in Trash.', 'anukul-booking' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => false,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => false,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 26,
            'menu_icon'          => 'dashicons-calendar-alt',
            'supports'           => array( 'title' ),
        );

        register_post_type( 'anukul_booking', $args );
    }

    /**
     * Admin Submenus
     */
    public function register_admin_menu() {
        add_submenu_page(
            'edit.php?post_type=anukul_booking',
            __( 'Consultation Plans & Rules', 'anukul-booking' ),
            __( 'Plans & Rules', 'anukul-booking' ),
            'manage_options',
            'anukul-booking-plans',
            array( $this, 'render_plans_and_rules_page' )
        );
    }

    /**
     * Admin Custom Columns in All Bookings
     */
    public function booking_columns( $cols ) {
        $new_cols = array(
            'cb'          => '<input type="checkbox" />',
            'ref'         => __( 'Reference', 'anukul-booking' ),
            'client'      => __( 'Client Details', 'anukul-booking' ),
            'tier'        => __( 'Consultation Modality', 'anukul-booking' ),
            'slot'        => __( 'Date & Muhurta', 'anukul-booking' ),
            'fee'         => __( 'Fee (INR)', 'anukul-booking' ),
            'status'      => __( 'Payment Status', 'anukul-booking' ),
            'quick_act'   => __( 'WhatsApp & Actions', 'anukul-booking' ),
        );
        return $new_cols;
    }

    public function booking_column_content( $column, $post_id ) {
        $ref    = get_post_meta( $post_id, '_anukul_reference', true );
        $name   = get_post_meta( $post_id, '_anukul_client_name', true );
        $phone  = get_post_meta( $post_id, '_anukul_client_phone', true );
        $email  = get_post_meta( $post_id, '_anukul_client_email', true );
        $tier   = get_post_meta( $post_id, '_anukul_tier_title', true );
        $date   = get_post_meta( $post_id, '_anukul_slot_date', true );
        $slot   = get_post_meta( $post_id, '_anukul_slot_time', true );
        $price  = get_post_meta( $post_id, '_anukul_price', true );
        $status = get_post_meta( $post_id, '_anukul_payment_status', true );
        if ( empty( $status ) ) $status = 'pending_verification';

        switch ( $column ) {
            case 'ref':
                echo '<strong>' . esc_html( $ref ? $ref : '#' . $post_id ) . '</strong>';
                break;

            case 'client':
                echo '<strong>' . esc_html( $name ) . '</strong><br>';
                echo '<a href="tel:' . esc_attr( $phone ) . '">' . esc_html( $phone ) . '</a><br>';
                echo '<span style="color:#666; font-size:12px;">' . esc_html( $email ) . '</span>';
                break;

            case 'tier':
                echo esc_html( $tier );
                break;

            case 'slot':
                echo '<strong>' . esc_html( $date ) . '</strong><br>';
                echo '<span style="color:#1F4D3A; font-weight:600;">' . esc_html( $slot ) . '</span>';
                break;

            case 'fee':
                echo '₹ ' . esc_html( number_format( (float) $price, 2 ) );
                break;

            case 'status':
                $bg = '#FFF2D6'; $color = '#974800'; $label = 'Pending';
                if ( 'confirmed' === $status ) {
                    $bg = '#D4EDDA'; $color = '#155724'; $label = 'Confirmed';
                } elseif ( 'cancelled' === $status || 'payment_failed' === $status ) {
                    $bg = '#F8D7DA'; $color = '#721C24'; $label = ucfirst( str_replace( '_', ' ', $status ) );
                }
                echo '<span style="background:' . $bg . '; color:' . $color . '; padding:4px 8px; border-radius:4px; font-weight:600; font-size:11px; text-transform:uppercase;">' . esc_html( $label ) . '</span>';
                break;

            case 'quick_act':
                $admin_wa = self::get_admin_whatsapp_number();
                $admin_msg = sprintf(
                    "🌿 *ANUKUL Harmony Clinic Booking Alert*\nRef: %s\nClient: %s (%s)\nTier: %s\nDate: %s @ %s\nFee: ₹%s\nStatus: %s",
                    $ref, $name, $phone, $tier, $date, $slot, $price, $status
                );
                $admin_wa_url = 'https://wa.me/' . $admin_wa . '?text=' . rawurlencode( $admin_msg );

                $client_clean_phone = preg_replace( '/[^0-9]/', '', $phone );
                if ( strlen( $client_clean_phone ) === 10 ) $client_clean_phone = '91' . $client_clean_phone;
                $client_msg = sprintf(
                    "Namaste %s,\nYour ANUKUL Consultation (Ref: %s) for %s on %s at %s is noted.\nFor queries, reply to this message.",
                    $name, $ref, $tier, $date, $slot
                );
                $client_wa_url = 'https://wa.me/' . $client_clean_phone . '?text=' . rawurlencode( $client_msg );

                echo '<div style="display:flex; flex-direction:column; gap:4px;">';
                echo '<a href="' . esc_url( $admin_wa_url ) . '" target="_blank" class="button button-small" style="background:#25D366; color:#fff; border-color:#20ba59; font-weight:600; font-size:11px;">📲 Admin Alert (' . esc_html( $admin_wa ) . ')</a>';
                if ( ! empty( $client_clean_phone ) ) {
                    echo '<a href="' . esc_url( $client_wa_url ) . '" target="_blank" class="button button-small" style="font-size:11px;">💬 WhatsApp Client</a>';
                }
                
                // Quick Confirm / Cancel Links
                $nonce = wp_create_nonce( 'anukul_quick_status_nonce' );
                if ( 'confirmed' !== $status ) {
                    $confirm_url = admin_url( 'admin.php?action=anukul_quick_status&id=' . $post_id . '&status=confirmed&_wpnonce=' . $nonce );
                    echo '<a href="' . esc_url( $confirm_url ) . '" style="color:#155724; font-size:11px; text-decoration:none;">✓ Mark Confirmed</a>';
                }
                if ( 'cancelled' !== $status ) {
                    $cancel_url = admin_url( 'admin.php?action=anukul_quick_status&id=' . $post_id . '&status=cancelled&_wpnonce=' . $nonce );
                    echo '<a href="' . esc_url( $cancel_url ) . '" style="color:#721C24; font-size:11px; text-decoration:none;">✕ Cancel Slot</a>';
                }
                echo '</div>';
                break;
        }
    }

    /**
     * Handle Admin Quick Status Action
     */
    public function handle_quick_status() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( 'Unauthorized' );
        }
        check_admin_referer( 'anukul_quick_status_nonce' );

        $post_id = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;
        $status  = isset( $_GET['status'] ) ? sanitize_text_field( $_GET['status'] ) : '';

        if ( $post_id && in_array( $status, array( 'confirmed', 'pending_verification', 'cancelled' ) ) ) {
            update_post_meta( $post_id, '_anukul_payment_status', $status );
        }

        wp_safe_redirect( admin_url( 'edit.php?post_type=anukul_booking' ) );
        exit;
    }

    /**
     * Register Meta Boxes
     */
    public function register_meta_boxes() {
        add_meta_box(
            'anukul_booking_details',
            __( 'Consultation Booking Dossier', 'anukul-booking' ),
            array( $this, 'render_booking_meta_box' ),
            'anukul_booking',
            'normal',
            'high'
        );
    }

    public function render_booking_meta_box( $post ) {
        wp_nonce_field( 'anukul_booking_meta_save', 'anukul_booking_nonce' );

        $ref    = get_post_meta( $post->ID, '_anukul_reference', true );
        $tier   = get_post_meta( $post->ID, '_anukul_tier', true );
        $title  = get_post_meta( $post->ID, '_anukul_tier_title', true );
        $price  = get_post_meta( $post->ID, '_anukul_price', true );
        $date   = get_post_meta( $post->ID, '_anukul_slot_date', true );
        $slot   = get_post_meta( $post->ID, '_anukul_slot_time', true );
        $name   = get_post_meta( $post->ID, '_anukul_client_name', true );
        $phone  = get_post_meta( $post->ID, '_anukul_client_phone', true );
        $email  = get_post_meta( $post->ID, '_anukul_client_email', true );
        $notes  = get_post_meta( $post->ID, '_anukul_intake_notes', true );
        $status = get_post_meta( $post->ID, '_anukul_payment_status', true );
        $order_id = get_post_meta( $post->ID, '_anukul_order_id', true );

        $admin_wa = self::get_admin_whatsapp_number();
        ?>
        <table class="form-table">
            <tr>
                <th><label><?php esc_html_e( 'Booking Reference', 'anukul-booking' ); ?></label></th>
                <td><strong style="font-size:16px; color:#1F4D3A;"><?php echo esc_html( $ref ); ?></strong></td>
            </tr>
            <tr>
                <th><label for="anukul_client_name"><?php esc_html_e( 'Client Name', 'anukul-booking' ); ?></label></th>
                <td><input type="text" id="anukul_client_name" name="_anukul_client_name" value="<?php echo esc_attr( $name ); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="anukul_client_phone"><?php esc_html_e( 'Phone Number', 'anukul-booking' ); ?></label></th>
                <td><input type="text" id="anukul_client_phone" name="_anukul_client_phone" value="<?php echo esc_attr( $phone ); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="anukul_client_email"><?php esc_html_e( 'Email Address', 'anukul-booking' ); ?></label></th>
                <td><input type="email" id="anukul_client_email" name="_anukul_client_email" value="<?php echo esc_attr( $email ); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="anukul_slot_date"><?php esc_html_e( 'Consultation Date', 'anukul-booking' ); ?></label></th>
                <td><input type="date" id="anukul_slot_date" name="_anukul_slot_date" value="<?php echo esc_attr( $date ); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="anukul_slot_time"><?php esc_html_e( 'Consultation Time Slot', 'anukul-booking' ); ?></label></th>
                <td><input type="text" id="anukul_slot_time" name="_anukul_slot_time" value="<?php echo esc_attr( $slot ); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th><label for="anukul_price"><?php esc_html_e( 'Consultation Fee (INR)', 'anukul-booking' ); ?></label></th>
                <td>₹ <input type="number" step="0.01" id="anukul_price" name="_anukul_price" value="<?php echo esc_attr( $price ); ?>" class="small-text" /></td>
            </tr>
            <tr>
                <th><label for="anukul_payment_status"><?php esc_html_e( 'Payment & Booking Status', 'anukul-booking' ); ?></label></th>
                <td>
                    <select id="anukul_payment_status" name="_anukul_payment_status">
                        <option value="pending_verification" <?php selected( $status, 'pending_verification' ); ?>>Pending Verification</option>
                        <option value="confirmed" <?php selected( $status, 'confirmed' ); ?>>Confirmed (Approved)</option>
                        <option value="cancelled" <?php selected( $status, 'cancelled' ); ?>>Cancelled / Slot Released</option>
                        <option value="payment_failed" <?php selected( $status, 'payment_failed' ); ?>>Payment Failed</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="anukul_intake_notes"><?php esc_html_e( 'Intake & Health Notes', 'anukul-booking' ); ?></label></th>
                <td><textarea id="anukul_intake_notes" name="_anukul_intake_notes" rows="4" class="large-text"><?php echo esc_textarea( $notes ); ?></textarea></td>
            </tr>
            <?php if ( $order_id ) : ?>
            <tr>
                <th><label><?php esc_html_e( 'WooCommerce Order', 'anukul-booking' ); ?></label></th>
                <td><a href="<?php echo esc_url( admin_url( 'post.php?post=' . $order_id . '&action=edit' ) ); ?>" class="button button-secondary">View Order #<?php echo esc_html( $order_id ); ?></a></td>
            </tr>
            <?php endif; ?>
        </table>
        <?php
    }

    public function save_booking_meta( $post_id ) {
        if ( ! isset( $_POST['anukul_booking_nonce'] ) || ! wp_verify_nonce( $_POST['anukul_booking_nonce'], 'anukul_booking_meta_save' ) ) {
            return;
        }
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }

        $fields = array(
            '_anukul_client_name'   => 'sanitize_text_field',
            '_anukul_client_phone'  => 'sanitize_text_field',
            '_anukul_client_email'  => 'sanitize_email',
            '_anukul_slot_date'     => 'sanitize_text_field',
            '_anukul_slot_time'     => 'sanitize_text_field',
            '_anukul_price'         => 'floatval',
            '_anukul_payment_status'=> 'sanitize_text_field',
            '_anukul_intake_notes'  => 'sanitize_textarea_field',
        );

        foreach ( $fields as $key => $sanitizer ) {
            if ( isset( $_POST[ $key ] ) ) {
                update_post_meta( $post_id, $key, call_user_func( $sanitizer, $_POST[ $key ] ) );
            }
        }
    }

    /**
     * Admin Consultation Plans & Rules Manager Screen
     */
    public function render_plans_and_rules_page() {
        if ( isset( $_POST['anukul_save_rules'] ) && check_admin_referer( 'anukul_rules_nonce' ) ) {
            // Save Tiers
            $tiers = array();
            if ( isset( $_POST['tiers'] ) && is_array( $_POST['tiers'] ) ) {
                foreach ( $_POST['tiers'] as $k => $data ) {
                    $tiers[ $k ] = array(
                        'title'    => sanitize_text_field( $data['title'] ),
                        'price'    => (float) $data['price'],
                        'duration' => sanitize_text_field( $data['duration'] ),
                        'format'   => sanitize_text_field( $data['format'] ),
                    );
                }
                update_option( 'anukul_booking_tiers_custom', $tiers );
            }

            // Save Admin WhatsApp & CallMeBot API key
            if ( isset( $_POST['admin_whatsapp_number'] ) ) {
                update_option( 'anukul_admin_whatsapp_number', sanitize_text_field( $_POST['admin_whatsapp_number'] ) );
            }
            if ( isset( $_POST['callmebot_api_key'] ) ) {
                update_option( 'anukul_callmebot_api_key', sanitize_text_field( $_POST['callmebot_api_key'] ) );
            }
            if ( isset( $_POST['custom_webhook_url'] ) ) {
                update_option( 'anukul_whatsapp_webhook_url', esc_url_raw( $_POST['custom_webhook_url'] ) );
            }

            echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Consultation plans and WhatsApp notification settings saved successfully.', 'anukul-booking' ) . '</p></div>';
        }

        $tiers = self::get_tiers();
        $admin_wa = self::get_admin_whatsapp_number();
        $callmebot = get_option( 'anukul_callmebot_api_key', '' );
        $webhook   = get_option( 'anukul_whatsapp_webhook_url', '' );
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'ANUKUL Consultation Plans, Pricing & WhatsApp Rules', 'anukul-booking' ); ?></h1>
            <p><?php esc_html_e( 'Manage live consultation tiers, fees in INR, and automatic WhatsApp notification endpoints for bookings and orders.', 'anukul-booking' ); ?></p>

            <form method="post" action="">
                <?php wp_nonce_field( 'anukul_rules_nonce' ); ?>

                <!-- WhatsApp Notifications Box -->
                <div style="background:#fff; padding:20px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.1); margin-top:20px; border-left:4px solid #25D366;">
                    <h2>📲 <?php esc_html_e( 'WhatsApp Notifications Settings', 'anukul-booking' ); ?></h2>
                    <table class="form-table">
                        <tr>
                            <th><label for="admin_whatsapp_number"><?php esc_html_e( 'Admin Alert WhatsApp Number', 'anukul-booking' ); ?></label></th>
                            <td>
                                <input type="text" id="admin_whatsapp_number" name="admin_whatsapp_number" value="<?php echo esc_attr( $admin_wa ); ?>" class="regular-text" />
                                <p class="description"><?php esc_html_e( 'Configured Indian phone number (with country code 91, e.g. 917624012501). Alerts will be sent to this number for both new appointment bookings and product orders.', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="callmebot_api_key"><?php esc_html_e( 'CallMeBot Free WhatsApp API Key (Optional)', 'anukul-booking' ); ?></label></th>
                            <td>
                                <input type="text" id="callmebot_api_key" name="callmebot_api_key" value="<?php echo esc_attr( $callmebot ); ?>" class="regular-text" placeholder="e.g. 123456" />
                                <p class="description"><?php esc_html_e( 'CallMeBot allows 100% free automated personal WhatsApp messages. If you have an API key, enter it here for silent instant delivery. Leave empty to use pre-filled one-click dispatch links.', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="custom_webhook_url"><?php esc_html_e( 'Custom Webhook URL (Optional)', 'anukul-booking' ); ?></label></th>
                            <td>
                                <input type="url" id="custom_webhook_url" name="custom_webhook_url" value="<?php echo esc_attr( $webhook ); ?>" class="large-text" placeholder="https://..." />
                                <p class="description"><?php esc_html_e( 'Optional Webhook (Zapier, Make, Wati, UltraMsg) to receive JSON payloads whenever a booking or product order occurs.', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Consultation Tiers Box -->
                <div style="background:#fff; padding:20px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.1); margin-top:20px;">
                    <h2>🌿 <?php esc_html_e( 'Consultation Tiers & Pricing (INR)', 'anukul-booking' ); ?></h2>
                    <table class="widefat fixed striped" style="margin-top:12px;">
                        <thead>
                            <tr>
                                <th><?php esc_html_e( 'Plan Title', 'anukul-booking' ); ?></th>
                                <th><?php esc_html_e( 'Fee (₹ INR)', 'anukul-booking' ); ?></th>
                                <th><?php esc_html_e( 'Allocated Duration', 'anukul-booking' ); ?></th>
                                <th><?php esc_html_e( 'Delivery Format', 'anukul-booking' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $tiers as $key => $tier ) : ?>
                                <tr>
                                    <td>
                                        <input type="text" name="tiers[<?php echo esc_attr( $key ); ?>][title]" value="<?php echo esc_attr( $tier['title'] ); ?>" class="widefat" />
                                        <small style="color:#777;">Key: <?php echo esc_html( $key ); ?></small>
                                    </td>
                                    <td>
                                        ₹ <input type="number" step="0.01" name="tiers[<?php echo esc_attr( $key ); ?>][price]" value="<?php echo esc_attr( $tier['price'] ); ?>" style="width:100px;" />
                                    </td>
                                    <td>
                                        <input type="text" name="tiers[<?php echo esc_attr( $key ); ?>][duration]" value="<?php echo esc_attr( $tier['duration'] ); ?>" class="widefat" />
                                    </td>
                                    <td>
                                        <input type="text" name="tiers[<?php echo esc_attr( $key ); ?>][format]" value="<?php echo esc_attr( $tier['format'] ); ?>" class="widefat" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <p class="submit" style="margin-top:20px;">
                    <input type="submit" name="anukul_save_rules" class="button button-primary button-large" value="<?php esc_attr_e( 'Save Plans & WhatsApp Settings', 'anukul-booking' ); ?>" />
                </p>
            </form>
        </div>
        <?php
    }

    /**
     * Server-side Slot Availability Check (Prevents Double-Booking)
     */
    public function is_slot_available( $date, $slot ) {
        $existing = get_posts( array(
            'post_type'      => 'anukul_booking',
            'post_status'    => array( 'publish' ),
            'posts_per_page' => 1,
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => '_anukul_slot_date',
                    'value'   => sanitize_text_field( $date ),
                    'compare' => '=',
                ),
                array(
                    'key'     => '_anukul_slot_time',
                    'value'   => sanitize_text_field( $slot ),
                    'compare' => '=',
                ),
                array(
                    'key'     => '_anukul_payment_status',
                    'value'   => array( 'confirmed', 'pending_verification' ),
                    'compare' => 'IN',
                ),
            ),
        ) );

        return empty( $existing );
    }

    /**
     * AJAX Check Availability
     */
    public function ajax_check_availability() {
        check_ajax_referer( 'anukul_booking_nonce', 'nonce' );

        $date = isset( $_POST['date'] ) ? sanitize_text_field( $_POST['date'] ) : '';
        $slot = isset( $_POST['slot'] ) ? sanitize_text_field( $_POST['slot'] ) : '';

        if ( empty( $date ) || empty( $slot ) ) {
            wp_send_json_error( array( 'message' => __( 'Missing date or slot time.', 'anukul-booking' ) ) );
        }

        $available = $this->is_slot_available( $date, $slot );
        wp_send_json_success( array( 'available' => $available ) );
    }

    /**
     * AJAX Booking Creation & WooCommerce Order Bridge
     */
    public function ajax_book_slot() {
        check_ajax_referer( 'anukul_booking_nonce', 'nonce' );

        $tier_key       = isset( $_POST['tier'] ) ? sanitize_text_field( $_POST['tier'] ) : '';
        $date           = isset( $_POST['date'] ) ? sanitize_text_field( $_POST['date'] ) : '';
        $slot           = isset( $_POST['slot'] ) ? sanitize_text_field( $_POST['slot'] ) : '';
        $name           = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
        $email          = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
        $phone          = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
        $notes          = isset( $_POST['notes'] ) ? sanitize_textarea_field( $_POST['notes'] ) : '';
        $payment_method = isset( $_POST['payment_method'] ) ? sanitize_text_field( $_POST['payment_method'] ) : 'bacs';

        $tiers = self::get_tiers();
        if ( ! isset( $tiers[ $tier_key ] ) ) {
            wp_send_json_error( array( 'message' => __( 'Invalid consultation modality selected.', 'anukul-booking' ) ) );
        }

        // Server-Side Double Booking Verification
        if ( ! $this->is_slot_available( $date, $slot ) ) {
            wp_send_json_error( array( 'message' => __( 'This appointment slot has just been reserved by another client. Please select an alternate time.', 'anukul-booking' ) ) );
        }

        $tier_info = $tiers[ $tier_key ];

        // Identify Customer
        $user_id = get_current_user_id();
        if ( ! $user_id && ! empty( $email ) ) {
            $existing_user = get_user_by( 'email', $email );
            if ( $existing_user ) {
                $user_id = $existing_user->ID;
            }
        }

        // Create Booking Record in CPT
        $booking_id = wp_insert_post( array(
            'post_type'   => 'anukul_booking',
            'post_title'  => sprintf( '%s - %s (%s @ %s)', $name, $tier_info['title'], $date, $slot ),
            'post_status' => 'publish',
        ) );

        if ( is_wp_error( $booking_id ) ) {
            wp_send_json_error( array( 'message' => __( 'Could not initialize consultation reservation.', 'anukul-booking' ) ) );
        }

        // Reference Token
        $reference = 'ANKL-' . date( 'Y' ) . '-' . rand( 1000, 9999 );

        update_post_meta( $booking_id, '_anukul_reference', $reference );
        update_post_meta( $booking_id, '_anukul_tier', $tier_key );
        update_post_meta( $booking_id, '_anukul_tier_title', $tier_info['title'] );
        update_post_meta( $booking_id, '_anukul_price', $tier_info['price'] );
        update_post_meta( $booking_id, '_anukul_duration', $tier_info['duration'] );
        update_post_meta( $booking_id, '_anukul_slot_date', $date );
        update_post_meta( $booking_id, '_anukul_slot_time', $slot );
        update_post_meta( $booking_id, '_anukul_client_name', $name );
        update_post_meta( $booking_id, '_anukul_client_email', $email );
        update_post_meta( $booking_id, '_anukul_client_phone', $phone );
        update_post_meta( $booking_id, '_anukul_intake_notes', $notes );
        update_post_meta( $booking_id, '_anukul_payment_method', $payment_method );
        update_post_meta( $booking_id, '_anukul_payment_status', 'pending_verification' );
        if ( $user_id ) {
            update_post_meta( $booking_id, '_anukul_customer_id', $user_id );
        }

        // Trigger WhatsApp Notification for Booking
        $this->dispatch_booking_whatsapp_notification( $booking_id );

        $redirect_url = home_url( '/booking-confirmation/?ref=' . $reference );

        // If WooCommerce is active, create real order
        if ( class_exists( 'WooCommerce' ) ) {
            $order = wc_create_order( array(
                'customer_id' => $user_id ? $user_id : 0,
            ) );

            $product_id = self::get_tier_product_id( $tier_key );
            $product    = $product_id ? wc_get_product( $product_id ) : null;

            if ( $product ) {
                $item_id = $order->add_product( $product, 1, array(
                    'subtotal' => $tier_info['price'],
                    'total'    => $tier_info['price'],
                ) );
            } else {
                $item_id = $order->add_product( null, 1, array(
                    'name'     => $tier_info['title'] . ' (' . $date . ' @ ' . $slot . ')',
                    'subtotal' => $tier_info['price'],
                    'total'    => $tier_info['price'],
                ) );
            }

            if ( $item_id ) {
                wc_add_order_item_meta( $item_id, 'Booking Reference', $reference );
                wc_add_order_item_meta( $item_id, 'Appointment Date', $date );
                wc_add_order_item_meta( $item_id, 'Appointment Slot', $slot );
                wc_add_order_item_meta( $item_id, 'Specialist', 'Dr. Nishigandha Chaudhari & Master Panel' );
            }

            $order->set_address( array(
                'first_name' => $name,
                'email'      => $email,
                'phone'      => $phone,
            ), 'billing' );

            if ( ! empty( $notes ) ) {
                $order->set_customer_note( $notes );
            }

            // Bind chosen payment gateway
            $gateways = WC()->payment_gateways->get_available_payment_gateways();
            $chosen_gw = isset( $gateways[ $payment_method ] ) ? $gateways[ $payment_method ] : ( ! empty( $gateways ) ? reset( $gateways ) : null );

            if ( $chosen_gw ) {
                $order->set_payment_method( $chosen_gw );
            }

            $order->calculate_totals();
            $order->update_status( 'pending', sprintf( __( 'ANUKUL Consultation Booking Reservation: %s', 'anukul-booking' ), $reference ) );

            $order_id = $order->get_id();
            update_post_meta( $booking_id, '_anukul_order_id', $order_id );
            update_post_meta( $order_id, '_anukul_booking_id', $booking_id );

            // Process payment through WooCommerce gateway
            if ( $chosen_gw ) {
                $result = $chosen_gw->process_payment( $order_id );
                if ( isset( $result['result'] ) && 'success' === $result['result'] && ! empty( $result['redirect'] ) ) {
                    $redirect_url = $result['redirect'];
                }
            }

            if ( empty( $redirect_url ) ) {
                $redirect_url = $order->get_checkout_payment_url();
            }
        }

        wp_send_json_success( array(
            'booking_id'   => $booking_id,
            'order_id'     => isset( $order_id ) ? $order_id : 0,
            'reference'    => $reference,
            'redirect_url' => $redirect_url,
            'message'      => __( 'Slot provisionally secured. Proceeding to settlement.', 'anukul-booking' ),
        ) );
    }

    /**
     * Dispatch WhatsApp Alert for Booking to Admin (7624012501)
     */
    public function dispatch_booking_whatsapp_notification( $booking_id ) {
        $admin_wa = self::get_admin_whatsapp_number();
        $ref      = get_post_meta( $booking_id, '_anukul_reference', true );
        $name     = get_post_meta( $booking_id, '_anukul_client_name', true );
        $phone    = get_post_meta( $booking_id, '_anukul_client_phone', true );
        $email    = get_post_meta( $booking_id, '_anukul_client_email', true );
        $tier     = get_post_meta( $booking_id, '_anukul_tier_title', true );
        $date     = get_post_meta( $booking_id, '_anukul_slot_date', true );
        $slot     = get_post_meta( $booking_id, '_anukul_slot_time', true );
        $price    = get_post_meta( $booking_id, '_anukul_price', true );
        $status   = get_post_meta( $booking_id, '_anukul_payment_status', true );
        $notes    = get_post_meta( $booking_id, '_anukul_intake_notes', true );

        $msg = "🌿 *ANUKUL Harmony Clinic — New Appointment Booking!*\n"
             . "━━━━━━━━━━━━━━━━━━\n"
             . "👤 *Client Name:* " . $name . "\n"
             . "📞 *Client Phone:* " . $phone . "\n"
             . "📧 *Client Email:* " . $email . "\n"
             . "📅 *Date:* " . $date . "\n"
             . "⏰ *Slot:* " . $slot . "\n"
             . "🩺 *Modality:* " . $tier . "\n"
             . "💰 *Fee:* ₹" . number_format( (float) $price, 2 ) . "\n"
             . "🏷️ *Booking Ref:* " . $ref . "\n"
             . "📝 *Intake Notes:* " . ( ! empty( $notes ) ? $notes : 'None' ) . "\n"
             . "━━━━━━━━━━━━━━━━━━\n"
             . "✅ *Status:* " . strtoupper( str_replace( '_', ' ', $status ) );

        $dispatch_url = 'https://wa.me/' . $admin_wa . '?text=' . rawurlencode( $msg );
        update_post_meta( $booking_id, '_anukul_whatsapp_admin_url', $dispatch_url );

        // If CallMeBot API key is configured, trigger silent dispatch
        $callmebot = get_option( 'anukul_callmebot_api_key', '' );
        if ( ! empty( $callmebot ) ) {
            $api_url = 'https://api.callmebot.com/whatsapp.php?phone=+' . $admin_wa . '&text=' . rawurlencode( $msg ) . '&apikey=' . $callmebot;
            wp_remote_get( $api_url, array( 'timeout' => 5 ) );
        }

        // Custom Webhook if configured
        $webhook = get_option( 'anukul_whatsapp_webhook_url', '' );
        if ( ! empty( $webhook ) ) {
            wp_remote_post( $webhook, array(
                'headers' => array( 'Content-Type' => 'application/json' ),
                'body'    => wp_json_encode( array(
                    'event'       => 'appointment_booking',
                    'admin_phone' => $admin_wa,
                    'reference'   => $ref,
                    'client_name' => $name,
                    'phone'       => $phone,
                    'date'        => $date,
                    'slot'        => $slot,
                    'tier'        => $tier,
                    'price'       => $price,
                ) ),
                'timeout' => 5,
            ) );
        }
    }

    /**
     * Dispatch WhatsApp Alert for New WooCommerce Product Order to Admin (7624012501)
     */
    public function on_new_woocommerce_order( $order_id, $order = null ) {
        if ( ! $order ) {
            $order = wc_get_order( $order_id );
        }
        if ( ! $order ) return;

        // Skip if this order is already linked to a booking (avoid duplicate alert)
        $booking_id = get_post_meta( $order_id, '_anukul_booking_id', true );
        if ( $booking_id ) return;

        $admin_wa   = self::get_admin_whatsapp_number();
        $name       = $order->get_formatted_billing_full_name();
        $phone      = $order->get_billing_phone();
        $email      = $order->get_billing_email();
        $total      = $order->get_total();
        $gateway    = $order->get_payment_method_title();
        $city       = $order->get_billing_city();
        $pincode    = $order->get_billing_postcode();

        $items_text = '';
        foreach ( $order->get_items() as $item ) {
            $items_text .= '• ' . $item->get_name() . ' × ' . $item->get_quantity() . ' (₹' . $item->get_total() . ")\n";
        }

        $msg = "🛍️ *ANUKUL Sanctuary — New Product Order #" . $order_id . "!*\n"
             . "━━━━━━━━━━━━━━━━━━\n"
             . "👤 *Customer:* " . $name . "\n"
             . "📞 *Phone:* " . $phone . "\n"
             . "📧 *Email:* " . $email . "\n"
             . "📦 *Items Ordered:*\n" . $items_text
             . "💰 *Order Total:* ₹" . number_format( (float) $total, 2 ) . "\n"
             . "💳 *Payment Method:* " . $gateway . "\n"
             . "🏠 *Location:* " . $city . ' ' . $pincode . "\n"
             . "━━━━━━━━━━━━━━━━━━\n"
             . "🔗 *Admin Order:* " . admin_url( 'post.php?post=' . $order_id . '&action=edit' );

        $dispatch_url = 'https://wa.me/' . $admin_wa . '?text=' . rawurlencode( $msg );
        update_post_meta( $order_id, '_anukul_whatsapp_admin_url', $dispatch_url );

        // Add order note with one-click dispatch link
        $order->add_order_note(
            sprintf(
                __( '📲 WhatsApp Notification prepared for Admin (+%s). Click to notify: %s', 'anukul-booking' ),
                $admin_wa,
                $dispatch_url
            )
        );

        // Silent CallMeBot dispatch if API key provided
        $callmebot = get_option( 'anukul_callmebot_api_key', '' );
        if ( ! empty( $callmebot ) ) {
            $api_url = 'https://api.callmebot.com/whatsapp.php?phone=+' . $admin_wa . '&text=' . rawurlencode( $msg ) . '&apikey=' . $callmebot;
            wp_remote_get( $api_url, array( 'timeout' => 5 ) );
        }

        // Custom Webhook if configured
        $webhook = get_option( 'anukul_whatsapp_webhook_url', '' );
        if ( ! empty( $webhook ) ) {
            wp_remote_post( $webhook, array(
                'headers' => array( 'Content-Type' => 'application/json' ),
                'body'    => wp_json_encode( array(
                    'event'       => 'new_product_order',
                    'order_id'    => $order_id,
                    'admin_phone' => $admin_wa,
                    'customer'    => $name,
                    'phone'       => $phone,
                    'total'       => $total,
                ) ),
                'timeout' => 5,
            ) );
        }
    }

    /**
     * Render One-Click WhatsApp Button in Admin Order View
     */
    public function render_order_whatsapp_button( $order ) {
        $dispatch_url = get_post_meta( $order->get_id(), '_anukul_whatsapp_admin_url', true );
        $admin_wa     = self::get_admin_whatsapp_number();
        if ( $dispatch_url ) {
            echo '<div style="margin-top:12px; padding:10px; background:#e8f5e9; border:1px solid #c8e6c9; border-radius:6px;">';
            echo '<strong style="color:#2e7d32; display:block; margin-bottom:6px;">📲 Admin WhatsApp Notification (' . esc_html( $admin_wa ) . ')</strong>';
            echo '<a href="' . esc_url( $dispatch_url ) . '" target="_blank" class="button button-primary" style="background:#25D366; border-color:#20ba59; color:#fff;">Send Order Alert to Admin WhatsApp</a>';
            echo '</div>';
        }
    }

    /**
     * Server-side Hook: On Payment On-Hold
     */
    public function on_payment_on_hold( $order_id ) {
        $booking_id = get_post_meta( $order_id, '_anukul_booking_id', true );
        if ( $booking_id ) {
            update_post_meta( $booking_id, '_anukul_payment_status', 'pending_verification' );
        }
    }

    /**
     * Server-side Verification Hook: On Payment Success
     */
    public function on_payment_verified( $order_id ) {
        $booking_id = get_post_meta( $order_id, '_anukul_booking_id', true );
        if ( $booking_id ) {
            update_post_meta( $booking_id, '_anukul_payment_status', 'confirmed' );
            update_post_meta( $booking_id, '_anukul_verified_at', current_time( 'mysql' ) );

            // Client Notification Dispatch
            $email = get_post_meta( $booking_id, '_anukul_client_email', true );
            $name  = get_post_meta( $booking_id, '_anukul_client_name', true );
            $ref   = get_post_meta( $booking_id, '_anukul_reference', true );
            $tier  = get_post_meta( $booking_id, '_anukul_tier_title', true );
            $date  = get_post_meta( $booking_id, '_anukul_slot_date', true );
            $slot  = get_post_meta( $booking_id, '_anukul_slot_time', true );

            $subject = sprintf( __( 'Consultation Confirmed [%s] — ANUKUL Harmony Clinic', 'anukul-booking' ), $ref );
            $message = sprintf(
                __( "Dear %s,\n\nYour sacred consultation appointment has been authorized and recorded in our clinic register.\n\nBooking Reference: %s\nConsultation Type: %s\nAppointment Slot: %s at %s\nPractitioner: Dr. Nishigandha Chaudhari\n\nYour encrypted tele-health conference link and diagnostic preparation dossier have been securely allocated.\n\nIn Peace & Harmony,\nANUKUL Ayur Vastu Harmony Clinic", 'anukul-booking' ),
                $name, $ref, $tier, $date, $slot
            );

            wp_mail( $email, $subject, $message );

            // Re-trigger WhatsApp alert with confirmed status
            $this->dispatch_booking_whatsapp_notification( $booking_id );
        }
    }

    /**
     * Server-side Hook: On Payment Failed
     */
    public function on_payment_failed( $order_id ) {
        $booking_id = get_post_meta( $order_id, '_anukul_booking_id', true );
        if ( $booking_id ) {
            update_post_meta( $booking_id, '_anukul_payment_status', 'payment_failed' );
        }
    }

    /**
     * Server-side Hook: On Payment Cancelled (Releases slot)
     */
    public function on_payment_cancelled( $order_id ) {
        $booking_id = get_post_meta( $order_id, '_anukul_booking_id', true );
        if ( $booking_id ) {
            update_post_meta( $booking_id, '_anukul_payment_status', 'cancelled' );
        }
    }
}

function anukul_booking() {
    return ANUKUL_Booking_Engine::instance();
}
anukul_booking();

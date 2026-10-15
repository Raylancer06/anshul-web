<?php
/**
 * Plugin Name: ANUKUL Consultation Booking & Verification Engine
 * Plugin URI: https://github.com/Raylancer06/anshul-web
 * Description: Manages paid Vedic consultation bookings, calendar slot allocation, double-booking prevention, WooCommerce checkout bridge, and server-side payment verification.
 * Version: 1.0.0
 * Author: ANUKUL Clinical Board
 * Author URI: https://anukul-harmony.com
 * Text Domain: anukul-booking
 * License: Proprietary
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'ANUKUL_BOOKING_VERSION', '1.0.0' );
define( 'ANUKUL_BOOKING_DIR', plugin_dir_path( __FILE__ ) );
define( 'ANUKUL_BOOKING_URI', plugin_dir_url( __FILE__ ) );

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
        add_action( 'wp_ajax_anukul_book_slot', array( $this, 'ajax_book_slot' ) );
        add_action( 'wp_ajax_nopriv_anukul_book_slot', array( $this, 'ajax_book_slot' ) );
        add_action( 'wp_ajax_anukul_check_availability', array( $this, 'ajax_check_availability' ) );
        add_action( 'wp_ajax_nopriv_anukul_check_availability', array( $this, 'ajax_check_availability' ) );

        // WooCommerce Order Payment Synchronization
        add_action( 'woocommerce_order_status_completed', array( $this, 'on_payment_verified' ) );
        add_action( 'woocommerce_order_status_processing', array( $this, 'on_payment_verified' ) );
        add_action( 'woocommerce_order_status_on-hold', array( $this, 'on_payment_on_hold' ) );
        add_action( 'woocommerce_order_status_failed', array( $this, 'on_payment_failed' ) );
        add_action( 'woocommerce_order_status_cancelled', array( $this, 'on_payment_cancelled' ) );
    }

    /**
     * Defined 4 Consultation Tiers
     */
    public static function get_tiers() {
        return array(
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

        // Create if missing
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
     * Admin Management Screen
     */
    public function register_admin_menu() {
        add_submenu_page(
            'edit.php?post_type=anukul_booking',
            __( 'Schedule & Slots', 'anukul-booking' ),
            __( 'Calendar Slots', 'anukul-booking' ),
            'manage_options',
            'anukul-slots-schedule',
            array( $this, 'render_schedule_page' )
        );
    }

    public function render_schedule_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'ANUKUL Muhurta Calendar & Booking Management', 'anukul-booking' ); ?></h1>
            <p><?php esc_html_e( 'All verified individual consultations calibrated against biological diurnal cycles and practitioner availability.', 'anukul-booking' ); ?></p>
            
            <div style="background:#fff; padding:20px; border-radius:8px; box-shadow:0 1px 3px rgba(0,0,0,0.1); margin-top:20px;">
                <h2><?php esc_html_e( 'Active Consultation Tiers & Fees', 'anukul-booking' ); ?></h2>
                <table class="widefat fixed striped">
                    <thead>
                        <tr>
                            <th><?php esc_html_e( 'Modality', 'anukul-booking' ); ?></th>
                            <th><?php esc_html_e( 'Standard Fee (INR)', 'anukul-booking' ); ?></th>
                            <th><?php esc_html_e( 'Allocated Duration', 'anukul-booking' ); ?></th>
                            <th><?php esc_html_e( 'Delivery Format', 'anukul-booking' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( self::get_tiers() as $key => $tier ) : ?>
                            <tr>
                                <td><strong><?php echo esc_html( $tier['title'] ); ?></strong></td>
                                <td>₹ <?php echo esc_html( number_format( $tier['price'], 2 ) ); ?></td>
                                <td><?php echo esc_html( $tier['duration'] ); ?></td>
                                <td><?php echo esc_html( $tier['format'] ); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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

        // Identify Customer (logged-in or existing by email)
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

        $redirect_url = home_url( '/booking-confirmation/?ref=' . $reference );

        // If WooCommerce is active, create real order and process payment
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
     * Server-side Hook: On Payment On-Hold (BACS / Bank Transfer)
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

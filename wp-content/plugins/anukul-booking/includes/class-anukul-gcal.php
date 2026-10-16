<?php
/**
 * ANUKUL Google Calendar Synchronization Engine
 *
 * @package Anukul_Booking
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ANUKUL_GCal_Sync {

    private static $instance = null;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'register_menu' ) );
        add_action( 'add_meta_boxes', array( $this, 'register_meta_box' ) );
        add_action( 'admin_action_anukul_sync_gcal', array( $this, 'handle_manual_sync' ) );
        add_action( 'init', array( $this, 'handle_ics_download' ) );
    }

    /**
     * Register Submenu Page
     */
    public function register_menu() {
        add_submenu_page(
            'edit.php?post_type=anukul_booking',
            __( 'Google Calendar Sync', 'anukul-booking' ),
            __( 'Google Calendar Sync', 'anukul-booking' ),
            'manage_options',
            'anukul-booking-gcal',
            array( $this, 'render_admin_page' )
        );
    }

    /**
     * Get Configured Google Calendar Settings
     */
    public static function get_settings() {
        $defaults = array(
            'enabled'              => '1',
            'calendar_id'          => 'primary',
            'service_account_json' => '',
            'event_title'          => 'ANUKUL Consultation: {client_name} - {tier_title}',
            'event_location'       => 'ANUKUL Tele-Health Video Consultation Room (Google Meet)',
            'event_description'    => "🌿 ANUKUL Ayur Vastu Harmony Clinic\n━━━━━━━━━━━━━━━━━━\nBooking Ref: {ref}\nClient: {client_name}\nPhone: {phone}\nEmail: {email}\nConsultation: {tier_title}\nDate: {date} @ {slot}\nFee: ₹{price}\nIntake Notes: {notes}\nHotline: +91 7624012501\n━━━━━━━━━━━━━━━━━━",
            'auto_sync'            => '1',
        );
        $saved = get_option( 'anukul_gcal_settings', array() );
        return wp_parse_args( $saved, $defaults );
    }

    /**
     * Parse Booking Date and Slot Time into Start and End Datetimes
     */
    public static function get_booking_datetimes( $booking_id ) {
        $date_str = get_post_meta( $booking_id, '_anukul_slot_date', true );
        $slot_str = get_post_meta( $booking_id, '_anukul_slot_time', true );

        $timestamp = strtotime( $date_str );
        if ( ! $timestamp ) {
            $timestamp = current_time( 'timestamp' );
        }
        $date_ymd = date( 'Y-m-d', $timestamp );

        // Extract start and end times from slot string (e.g. "09:30 AM – 11:00 AM IST")
        $parts = explode( '–', str_ireplace( 'IST', '', $slot_str ) );
        if ( count( $parts ) < 2 ) {
            $parts = explode( '-', str_ireplace( 'IST', '', $slot_str ) );
        }
        $start_raw = trim( $parts[0] );
        $end_raw   = isset( $parts[1] ) ? trim( $parts[1] ) : '';

        try {
            $tz_ist   = new DateTimeZone( 'Asia/Kolkata' );
            $start_dt = new DateTime( $date_ymd . ' ' . $start_raw, $tz_ist );
            if ( ! empty( $end_raw ) ) {
                $end_dt = new DateTime( $date_ymd . ' ' . $end_raw, $tz_ist );
            } else {
                $end_dt = clone $start_dt;
                $end_dt->modify( '+60 minutes' );
            }
        } catch ( Exception $e ) {
            $tz_ist   = new DateTimeZone( 'Asia/Kolkata' );
            $start_dt = new DateTime( 'now', $tz_ist );
            $end_dt   = clone $start_dt;
            $end_dt->modify( '+60 minutes' );
        }

        $tz_utc    = new DateTimeZone( 'UTC' );
        $start_utc = clone $start_dt;
        $start_utc->setTimezone( $tz_utc );
        $end_utc   = clone $end_dt;
        $end_utc->setTimezone( $tz_utc );

        return array(
            'date_ymd'   => $date_ymd,
            'start_dt'   => $start_dt,
            'end_dt'     => $end_dt,
            'start_iso'  => $start_dt->format( 'Y-m-d\TH:i:sP' ),
            'end_iso'    => $end_dt->format( 'Y-m-d\TH:i:sP' ),
            'gcal_dates' => $start_utc->format( 'Ymd\THis\Z' ) . '/' . $end_utc->format( 'Ymd\THis\Z' ),
        );
    }

    /**
     * Generate 1-Click "Add to Google Calendar" URL
     */
    public static function generate_gcal_url( $booking_id ) {
        $settings = self::get_settings();
        $dt_info  = self::get_booking_datetimes( $booking_id );

        $ref   = get_post_meta( $booking_id, '_anukul_reference', true );
        $name  = get_post_meta( $booking_id, '_anukul_client_name', true );
        $phone = get_post_meta( $booking_id, '_anukul_client_phone', true );
        $email = get_post_meta( $booking_id, '_anukul_client_email', true );
        $tier  = get_post_meta( $booking_id, '_anukul_tier_title', true );
        $slot  = get_post_meta( $booking_id, '_anukul_slot_time', true );
        $date  = get_post_meta( $booking_id, '_anukul_slot_date', true );
        $price = get_post_meta( $booking_id, '_anukul_price', true );
        $notes = get_post_meta( $booking_id, '_anukul_intake_notes', true );

        $tags = array(
            '{ref}'         => $ref ?: '#' . $booking_id,
            '{client_name}' => $name ?: 'Patient',
            '{phone}'       => $phone ?: '',
            '{email}'       => $email ?: '',
            '{tier_title}'  => $tier ?: 'Consultation',
            '{date}'        => $date ?: '',
            '{slot}'        => $slot ?: '',
            '{price}'       => number_format( (float) $price, 2 ),
            '{notes}'       => $notes ?: 'None',
        );

        $title       = str_replace( array_keys( $tags ), array_values( $tags ), $settings['event_title'] );
        $description = str_replace( array_keys( $tags ), array_values( $tags ), $settings['event_description'] );
        $location    = $settings['event_location'];

        $url = 'https://calendar.google.com/calendar/render?action=TEMPLATE'
            . '&text=' . rawurlencode( $title )
            . '&dates=' . rawurlencode( $dt_info['gcal_dates'] )
            . '&details=' . rawurlencode( $description )
            . '&location=' . rawurlencode( $location );

        return $url;
    }

    /**
     * Generate RFC 5545 iCalendar (.ics) File Content
     */
    public static function generate_ics_content( $booking_id ) {
        $dt_info = self::get_booking_datetimes( $booking_id );
        $ref     = get_post_meta( $booking_id, '_anukul_reference', true ) ?: 'ANKL-' . $booking_id;
        $name    = get_post_meta( $booking_id, '_anukul_client_name', true ) ?: 'Client';
        $tier    = get_post_meta( $booking_id, '_anukul_tier_title', true ) ?: 'Consultation';
        $notes   = get_post_meta( $booking_id, '_anukul_intake_notes', true );

        $start_utc = clone $dt_info['start_dt'];
        $start_utc->setTimezone( new DateTimeZone( 'UTC' ) );
        $end_utc = clone $dt_info['end_dt'];
        $end_utc->setTimezone( new DateTimeZone( 'UTC' ) );

        $dtstart = $start_utc->format( 'Ymd\THis\Z' );
        $dtend   = $end_utc->format( 'Ymd\THis\Z' );
        $stamp   = gmdate( 'Ymd\THis\Z' );
        $uid     = 'anukul-' . $booking_id . '-' . time() . '@anukul-harmony.com';

        $summary     = 'ANUKUL Consultation: ' . $name . ' (' . $tier . ')';
        $description = "ANUKUL Ayur Vastu Harmony Clinic\\nRef: {$ref}\\nPatient: {$name}\\nTier: {$tier}\\nOnline Tele-Health Gateway Allocated.\\nHotline: +91 7624012501";

        $ics  = "BEGIN:VCALENDAR\r\n";
        $ics .= "VERSION:2.0\r\n";
        $ics .= "PRODID:-//ANUKUL Ayur Vastu Harmony Clinic//NONSGML v1.0//EN\r\n";
        $ics .= "CALSCALE:GREGORIAN\r\n";
        $ics .= "METHOD:REQUEST\r\n";
        $ics .= "BEGIN:VEVENT\r\n";
        $ics .= "UID:{$uid}\r\n";
        $ics .= "DTSTAMP:{$stamp}\r\n";
        $ics .= "DTSTART:{$dtstart}\r\n";
        $ics .= "DTEND:{$dtend}\r\n";
        $ics .= "SUMMARY:{$summary}\r\n";
        $ics .= "DESCRIPTION:{$description}\r\n";
        $ics .= "LOCATION:ANUKUL Tele-Health Video Consultation Room\r\n";
        $ics .= "STATUS:CONFIRMED\r\n";
        $ics .= "SEQUENCE:0\r\n";
        $ics .= "BEGIN:VALARM\r\n";
        $ics .= "TRIGGER:-PT60M\r\n";
        $ics .= "ACTION:DISPLAY\r\n";
        $ics .= "DESCRIPTION:Reminder: ANUKUL Consultation in 1 hour\r\n";
        $ics .= "END:VALARM\r\n";
        $ics .= "END:VEVENT\r\n";
        $ics .= "END:VCALENDAR\r\n";

        return $ics;
    }

    public function handle_ics_download() {
        if ( isset( $_GET['anukul_download_ics'] ) ) {
            $param = sanitize_text_field( $_GET['anukul_download_ics'] );
            $booking_id = absint( $param );
            if ( $booking_id && 'anukul_booking' === get_post_type( $booking_id ) ) {
                $ref = get_post_meta( $booking_id, '_anukul_reference', true ) ?: 'ANUKUL-Booking-' . $booking_id;
                $filename = sanitize_file_name( $ref ) . '.ics';
                $content  = self::generate_ics_content( $booking_id );
            } else {
                $filename = 'ANUKUL-Consultation-Sanctuary.ics';
                $content  = self::generate_ics_content( 0 );
            }

            header( 'Content-Type: text/calendar; charset=utf-8' );
            header( 'Content-Disposition: attachment; filename="' . $filename . '"' );
            header( 'Content-Length: ' . strlen( $content ) );
            header( 'Connection: close' );
            echo $content;
            exit;
        }
    }

    /**
     * Sync Booking to Google Calendar via Google Calendar API v3
     */
    public static function sync_booking( $booking_id ) {
        $settings  = self::get_settings();
        $gcal_url  = self::generate_gcal_url( $booking_id );
        update_post_meta( $booking_id, '_anukul_gcal_url', $gcal_url );

        if ( empty( $settings['enabled'] ) || '1' !== (string) $settings['enabled'] ) {
            return array( 'success' => false, 'message' => __( 'Google Calendar sync is disabled.', 'anukul-booking' ) );
        }

        $sa_json = trim( $settings['service_account_json'] );
        if ( empty( $sa_json ) ) {
            update_post_meta( $booking_id, '_anukul_gcal_synced', 'ready_for_gcal' );
            return array(
                'success'   => true,
                'mode'      => 'link',
                'gcal_url'  => $gcal_url,
                'message'   => __( '1-Click Google Calendar link ready (Service Account JSON credentials not configured yet).', 'anukul-booking' ),
            );
        }

        $credentials = json_decode( $sa_json, true );
        if ( ! is_array( $credentials ) || empty( $credentials['client_email'] ) || empty( $credentials['private_key'] ) ) {
            return array( 'success' => false, 'message' => __( 'Invalid Google Service Account JSON structure.', 'anukul-booking' ) );
        }

        // Generate RS256 Signed JWT for Google OAuth2
        $client_email = $credentials['client_email'];
        $private_key  = $credentials['private_key'];
        $now          = time();

        $header = rtrim( strtr( base64_encode( wp_json_encode( array( 'alg' => 'RS256', 'typ' => 'JWT' ) ) ), '+/', '-_' ), '=' );
        $claims = rtrim( strtr( base64_encode( wp_json_encode( array(
            'iss'   => $client_email,
            'scope' => 'https://www.googleapis.com/auth/calendar',
            'aud'   => 'https://oauth2.googleapis.com/token',
            'exp'   => $now + 3600,
            'iat'   => $now,
        ) ) ), '+/', '-_' ), '=' );

        $signature = '';
        $signed    = openssl_sign( $header . '.' . $claims, $signature, $private_key, OPENSSL_ALGO_SHA256 );
        if ( ! $signed ) {
            return array( 'success' => false, 'message' => __( 'Could not sign JWT token with private key.', 'anukul-booking' ) );
        }
        $jwt = $header . '.' . $claims . '.' . rtrim( strtr( base64_encode( $signature ), '+/', '-_' ), '=' );

        // Request Access Token
        $token_response = wp_remote_post( 'https://oauth2.googleapis.com/token', array(
            'body'    => array(
                'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion'  => $jwt,
            ),
            'timeout' => 15,
        ) );

        if ( is_wp_error( $token_response ) ) {
            return array( 'success' => false, 'message' => 'Token exchange failed: ' . $token_response->get_error_message() );
        }

        $token_body = json_decode( wp_remote_retrieve_body( $token_response ), true );
        if ( empty( $token_body['access_token'] ) ) {
            $err = isset( $token_body['error_description'] ) ? $token_body['error_description'] : ( isset( $token_body['error'] ) ? $token_body['error'] : 'Token error' );
            return array( 'success' => false, 'message' => 'OAuth error: ' . $err );
        }

        $access_token = $token_body['access_token'];
        $calendar_id  = rawurlencode( ! empty( $settings['calendar_id'] ) ? $settings['calendar_id'] : 'primary' );

        // Assemble Event Data
        $dt_info = self::get_booking_datetimes( $booking_id );
        $ref     = get_post_meta( $booking_id, '_anukul_reference', true );
        $name    = get_post_meta( $booking_id, '_anukul_client_name', true );
        $phone   = get_post_meta( $booking_id, '_anukul_client_phone', true );
        $email   = get_post_meta( $booking_id, '_anukul_client_email', true );
        $tier    = get_post_meta( $booking_id, '_anukul_tier_title', true );
        $date    = get_post_meta( $booking_id, '_anukul_slot_date', true );
        $slot    = get_post_meta( $booking_id, '_anukul_slot_time', true );
        $price   = get_post_meta( $booking_id, '_anukul_price', true );
        $notes   = get_post_meta( $booking_id, '_anukul_intake_notes', true );

        $tags = array(
            '{ref}'         => $ref ?: '#' . $booking_id,
            '{client_name}' => $name ?: 'Patient',
            '{phone}'       => $phone ?: '',
            '{email}'       => $email ?: '',
            '{tier_title}'  => $tier ?: 'Consultation',
            '{date}'        => $date ?: '',
            '{slot}'        => $slot ?: '',
            '{price}'       => number_format( (float) $price, 2 ),
            '{notes}'       => $notes ?: 'None',
        );

        $title       = str_replace( array_keys( $tags ), array_values( $tags ), $settings['event_title'] );
        $description = str_replace( array_keys( $tags ), array_values( $tags ), $settings['event_description'] );
        $location    = $settings['event_location'];

        $event_payload = array(
            'summary'     => $title,
            'description' => $description,
            'location'    => $location,
            'start'       => array(
                'dateTime' => $dt_info['start_iso'],
                'timeZone' => 'Asia/Kolkata',
            ),
            'end'         => array(
                'dateTime' => $dt_info['end_iso'],
                'timeZone' => 'Asia/Kolkata',
            ),
            'reminders'   => array(
                'useDefault' => false,
                'overrides'  => array(
                    array( 'method' => 'email', 'minutes' => 1440 ),
                    array( 'method' => 'popup', 'minutes' => 60 ),
                ),
            ),
        );

        if ( ! empty( $email ) && is_email( $email ) ) {
            $event_payload['attendees'] = array(
                array( 'email' => $email, 'displayName' => $name ),
            );
        }

        $existing_event_id = get_post_meta( $booking_id, '_anukul_gcal_event_id', true );
        $api_url           = "https://www.googleapis.com/calendar/v3/calendars/{$calendar_id}/events";
        $method            = 'POST';

        if ( ! empty( $existing_event_id ) ) {
            $api_url .= '/' . rawurlencode( $existing_event_id );
            $method   = 'PATCH';
        }

        $resp = wp_remote_request( $api_url, array(
            'method'  => $method,
            'headers' => array(
                'Authorization' => 'Bearer ' . $access_token,
                'Content-Type'  => 'application/json',
            ),
            'body'    => wp_json_encode( $event_payload ),
            'timeout' => 15,
        ) );

        if ( is_wp_error( $resp ) ) {
            return array( 'success' => false, 'message' => 'Calendar API error: ' . $resp->get_error_message() );
        }

        $code = wp_remote_retrieve_response_code( $resp );
        $body = json_decode( wp_remote_retrieve_body( $resp ), true );

        if ( $code >= 200 && $code < 300 && ! empty( $body['id'] ) ) {
            update_post_meta( $booking_id, '_anukul_gcal_synced', 'yes' );
            update_post_meta( $booking_id, '_anukul_gcal_event_id', sanitize_text_field( $body['id'] ) );
            if ( ! empty( $body['htmlLink'] ) ) {
                update_post_meta( $booking_id, '_anukul_gcal_event_link', esc_url_raw( $body['htmlLink'] ) );
            }
            return array(
                'success'    => true,
                'event_id'   => $body['id'],
                'html_link'  => isset( $body['htmlLink'] ) ? $body['htmlLink'] : '',
                'message'    => __( 'Event successfully synchronized with Google Calendar.', 'anukul-booking' ),
            );
        } else {
            $err_msg = isset( $body['error']['message'] ) ? $body['error']['message'] : 'HTTP Code ' . $code;
            return array( 'success' => false, 'message' => 'Calendar API error: ' . $err_msg );
        }
    }

    /**
     * Handle Admin Manual Sync Quick Action
     */
    public function handle_manual_sync() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( 'Unauthorized' );
        }
        check_admin_referer( 'anukul_sync_gcal_nonce' );

        $booking_id = isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0;
        if ( $booking_id ) {
            $result = self::sync_booking( $booking_id );
            if ( $result['success'] ) {
                add_settings_error( 'anukul_gcal', 'sync_success', $result['message'], 'updated' );
            } else {
                add_settings_error( 'anukul_gcal', 'sync_error', $result['message'], 'error' );
            }
        }

        $redirect = wp_get_referer() ? wp_get_referer() : admin_url( 'edit.php?post_type=anukul_booking' );
        wp_safe_redirect( $redirect );
        exit;
    }

    /**
     * Register Meta Box on Booking Screen
     */
    public function register_meta_box() {
        add_meta_box(
            'anukul_gcal_meta_box',
            __( 'Google Calendar Synchronization', 'anukul-booking' ),
            array( $this, 'render_booking_meta_box' ),
            'anukul_booking',
            'side',
            'default'
        );
    }

    public function render_booking_meta_box( $post ) {
        $synced   = get_post_meta( $post->ID, '_anukul_gcal_synced', true );
        $event_id = get_post_meta( $post->ID, '_anukul_gcal_event_id', true );
        $link     = get_post_meta( $post->ID, '_anukul_gcal_event_link', true );
        $gcal_url = get_post_meta( $post->ID, '_anukul_gcal_url', true );
        if ( empty( $gcal_url ) ) {
            $gcal_url = self::generate_gcal_url( $post->ID );
        }

        $nonce = wp_create_nonce( 'anukul_sync_gcal_nonce' );
        $sync_url = admin_url( 'admin.php?action=anukul_sync_gcal&id=' . $post->ID . '&_wpnonce=' . $nonce );
        $ics_url  = home_url( '/?anukul_download_ics=' . $post->ID );

        ?>
        <div style="padding:4px 0;">
            <p>
                <strong><?php esc_html_e( 'Sync Status:', 'anukul-booking' ); ?></strong>
                <?php if ( 'yes' === $synced ) : ?>
                    <span style="color:#155724; background:#d4edda; padding:2px 8px; border-radius:4px; font-weight:bold; font-size:11px;">✓ <?php esc_html_e( 'SYNCED TO GCAL', 'anukul-booking' ); ?></span>
                <?php else : ?>
                    <span style="color:#856404; background:#fff3cd; padding:2px 8px; border-radius:4px; font-weight:bold; font-size:11px;"><?php esc_html_e( 'READY FOR GCAL', 'anukul-booking' ); ?></span>
                <?php endif; ?>
            </p>

            <?php if ( ! empty( $link ) ) : ?>
                <p>
                    <a href="<?php echo esc_url( $link ); ?>" target="_blank" class="button button-secondary button-small" style="width:100%; text-align:center;">
                        🔗 <?php esc_html_e( 'Open in Google Calendar', 'anukul-booking' ); ?>
                    </a>
                </p>
            <?php endif; ?>

            <p>
                <a href="<?php echo esc_url( $gcal_url ); ?>" target="_blank" class="button button-primary button-small" style="width:100%; text-align:center; background:#4285F4; border-color:#3367D6;">
                    📅 <?php esc_html_e( '1-Click Add to Google Calendar', 'anukul-booking' ); ?>
                </a>
            </p>

            <p>
                <a href="<?php echo esc_url( $sync_url ); ?>" class="button button-small" style="width:100%; text-align:center;">
                    🔄 <?php esc_html_e( 'Force Sync via API', 'anukul-booking' ); ?>
                </a>
            </p>

            <p style="margin-top:10px; border-top:1px solid #ddd; pt-2;">
                <a href="<?php echo esc_url( $ics_url ); ?>" class="button button-small" style="width:100%; text-align:center;">
                    📥 <?php esc_html_e( 'Download .ICS File', 'anukul-booking' ); ?>
                </a>
            </p>
        </div>
        <?php
    }

    /**
     * Render Admin Google Calendar Sync Settings Screen
     */
    public function render_admin_page() {
        if ( isset( $_POST['anukul_save_gcal_settings'] ) && check_admin_referer( 'anukul_gcal_settings_nonce' ) ) {
            $settings = array(
                'enabled'              => isset( $_POST['enabled'] ) ? '1' : '0',
                'calendar_id'          => sanitize_text_field( $_POST['calendar_id'] ),
                'service_account_json' => trim( $_POST['service_account_json'] ),
                'event_title'          => sanitize_text_field( $_POST['event_title'] ),
                'event_location'       => sanitize_text_field( $_POST['event_location'] ),
                'event_description'    => sanitize_textarea_field( $_POST['event_description'] ),
                'auto_sync'            => isset( $_POST['auto_sync'] ) ? '1' : '0',
            );
            update_option( 'anukul_gcal_settings', $settings );
            echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__( 'Google Calendar settings saved successfully.', 'anukul-booking' ) . '</strong></p></div>';
        }

        $settings = self::get_settings();
        $is_enabled = ( '1' === (string) $settings['enabled'] );
        $has_json   = ! empty( $settings['service_account_json'] );
        ?>
        <div class="wrap">
            <h1 style="color:#1F4D3A; font-family:'EB Garamond', serif; font-size:28px;">
                📅 <?php esc_html_e( 'Google Calendar Synchronization Settings', 'anukul-booking' ); ?>
            </h1>
            <p style="color:#555; font-size:14px;">
                <?php esc_html_e( 'Connect ANUKUL appointment bookings directly to Google Calendar. Appointments are automatically booked into your calendar, with real-time sync, 1-click links for patients, and .ICS calendar files.', 'anukul-booking' ); ?>
            </p>

            <form method="post" action="">
                <?php wp_nonce_field( 'anukul_gcal_settings_nonce' ); ?>

                <!-- Settings Box -->
                <div style="background:#fff; padding:24px; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.08); margin-top:20px; border-left:4px solid #4285F4;">
                    <h2 style="margin-top:0; color:#1F4D3A;">⚙️ <?php esc_html_e( 'Integration & Credentials', 'anukul-booking' ); ?></h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Enable Synchronization', 'anukul-booking' ); ?></th>
                            <td>
                                <label style="font-weight:600; font-size:14px;">
                                    <input type="checkbox" name="enabled" value="1" <?php checked( $is_enabled ); ?> />
                                    <?php esc_html_e( 'Activate Google Calendar synchronization for all consultations', 'anukul-booking' ); ?>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="calendar_id"><?php esc_html_e( 'Google Calendar ID', 'anukul-booking' ); ?></label></th>
                            <td>
                                <input type="text" id="calendar_id" name="calendar_id" value="<?php echo esc_attr( $settings['calendar_id'] ); ?>" class="regular-text" placeholder="primary or clinic@gmail.com" />
                                <p class="description"><?php esc_html_e( 'Enter "primary" for default calendar, or your clinic Google account email address.', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="service_account_json"><?php esc_html_e( 'Google Service Account JSON (For Silent Background API Sync)', 'anukul-booking' ); ?></label></th>
                            <td>
                                <textarea id="service_account_json" name="service_account_json" rows="6" class="large-text code" placeholder='{"type": "service_account", "project_id": "...", "private_key": "...", "client_email": "..."}'><?php echo esc_textarea( $settings['service_account_json'] ); ?></textarea>
                                <p class="description" style="margin-top:8px;">
                                    <strong><?php esc_html_e( 'Setup Instructions:', 'anukul-booking' ); ?></strong><br>
                                    1. Go to <a href="https://console.cloud.google.com/" target="_blank">Google Cloud Console</a> & create or select a project.<br>
                                    2. Enable the <strong>Google Calendar API</strong>.<br>
                                    3. Create a <strong>Service Account</strong>, generate a <strong>JSON Key</strong>, and paste the entire JSON content above.<br>
                                    4. In Google Calendar, go to <em>Settings → Share with specific people</em> and add the Service Account's <code>client_email</code> with <em>"Make changes to events"</em> permission.<br>
                                    <em>*Note: Even without a Service Account, instant 1-Click "Add to Google Calendar" links and .ICS downloads remain fully active for both doctor and patients!</em>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Automatic Sync on Booking', 'anukul-booking' ); ?></th>
                            <td>
                                <label style="font-weight:500;">
                                    <input type="checkbox" name="auto_sync" value="1" <?php checked( '1' === (string) $settings['auto_sync'] ); ?> />
                                    <?php esc_html_e( 'Instantly dispatch new bookings to Google Calendar as soon as the client selects an appointment', 'anukul-booking' ); ?>
                                </label>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Event Details Formatting Box -->
                <div style="background:#fff; padding:24px; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.08); margin-top:24px; border-left:4px solid #1F4D3A;">
                    <h2 style="margin-top:0; color:#1F4D3A;">📝 <?php esc_html_e( 'Google Calendar Event Template', 'anukul-booking' ); ?></h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label for="event_title"><?php esc_html_e( 'Event Title Template', 'anukul-booking' ); ?></label></th>
                            <td>
                                <input type="text" id="event_title" name="event_title" value="<?php echo esc_attr( $settings['event_title'] ); ?>" class="large-text" />
                                <p class="description"><?php esc_html_e( 'Available tags: {client_name}, {tier_title}, {ref}, {date}, {slot}', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="event_location"><?php esc_html_e( 'Event Location', 'anukul-booking' ); ?></label></th>
                            <td>
                                <input type="text" id="event_location" name="event_location" value="<?php echo esc_attr( $settings['event_location'] ); ?>" class="large-text" />
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="event_description"><?php esc_html_e( 'Event Description Template', 'anukul-booking' ); ?></label></th>
                            <td>
                                <textarea id="event_description" name="event_description" rows="5" class="large-text"><?php echo esc_textarea( $settings['event_description'] ); ?></textarea>
                                <p class="description"><?php esc_html_e( 'Available tags: {ref}, {client_name}, {phone}, {email}, {tier_title}, {date}, {slot}, {price}, {notes}', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>

                <p class="submit" style="margin-top:24px;">
                    <input type="submit" name="anukul_save_gcal_settings" class="button button-primary button-large" value="<?php esc_attr_e( 'Save Google Calendar Configuration', 'anukul-booking' ); ?>" />
                </p>
            </form>
        </div>
        <?php
    }
}

ANUKUL_GCal_Sync::instance();

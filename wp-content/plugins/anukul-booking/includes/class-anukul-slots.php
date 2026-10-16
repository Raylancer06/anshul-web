<?php
/**
 * ANUKUL Available Slots & Operating Schedule Manager
 *
 * @package Anukul_Booking
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ANUKUL_Slots_Manager {

    private static $instance = null;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'register_menu' ) );
        add_action( 'wp_ajax_anukul_get_available_slots', array( $this, 'ajax_get_available_slots' ) );
        add_action( 'wp_ajax_nopriv_anukul_get_available_slots', array( $this, 'ajax_get_available_slots' ) );
    }

    /**
     * Register Submenu Page
     */
    public function register_menu() {
        add_submenu_page(
            'edit.php?post_type=anukul_booking',
            __( 'Available Slots & Schedule', 'anukul-booking' ),
            __( 'Slots & Schedule', 'anukul-booking' ),
            'manage_options',
            'anukul-booking-schedule',
            array( $this, 'render_admin_page' )
        );
    }

    /**
     * Schedule & Clinic Operating Settings
     */
    public static function get_schedule_settings() {
        $defaults = array(
            'operating_days' => array( 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday' ),
            'hours_start'    => '09:30 AM',
            'hours_end'      => '06:30 PM',
            'min_notice'     => 2,
            'max_advance'    => 30,
            'blackout_dates' => '',
        );
        $saved = get_option( 'anukul_booking_schedule_settings', array() );
        return wp_parse_args( $saved, $defaults );
    }

    /**
     * Default Classical Consultation Slots
     */
    public static function get_default_slots() {
        return array(
            array(
                'id'       => 'slot_1',
                'time'     => '09:30 AM – 11:00 AM IST',
                'start'    => '09:30',
                'end'      => '11:00',
                'period'   => 'morning',
                'status'   => 'active',
                'capacity' => 1,
                'label'    => 'High Bio-Prana Flow',
            ),
            array(
                'id'       => 'slot_2',
                'time'     => '11:00 AM – 12:30 PM IST',
                'start'    => '11:00',
                'end'      => '12:30',
                'period'   => 'morning',
                'status'   => 'active',
                'capacity' => 1,
                'label'    => 'Shubha Muhurta (Optimal Vitality)',
            ),
            array(
                'id'       => 'slot_3',
                'time'     => '02:30 PM – 04:00 PM IST',
                'start'    => '14:30',
                'end'      => '16:00',
                'period'   => 'afternoon',
                'status'   => 'active',
                'capacity' => 1,
                'label'    => 'Reflective Analysis',
            ),
            array(
                'id'       => 'slot_4',
                'time'     => '04:00 PM – 05:30 PM IST',
                'start'    => '16:00',
                'end'      => '17:30',
                'period'   => 'afternoon',
                'status'   => 'active',
                'capacity' => 1,
                'label'    => 'Reflective Analysis',
            ),
            array(
                'id'       => 'slot_5',
                'time'     => '05:30 PM – 06:30 PM IST',
                'start'    => '17:30',
                'end'      => '18:30',
                'period'   => 'afternoon',
                'status'   => 'active',
                'capacity' => 1,
                'label'    => 'Twilight Equilibrium',
            ),
        );
    }

    /**
     * Get All Configured Slots
     */
    public static function get_slots( $only_active = false ) {
        $slots = get_option( 'anukul_booking_slots', null );
        if ( is_null( $slots ) || ! is_array( $slots ) || empty( $slots ) ) {
            $slots = self::get_default_slots();
        }

        if ( $only_active ) {
            $filtered = array();
            foreach ( $slots as $s ) {
                if ( isset( $s['status'] ) && 'active' === $s['status'] ) {
                    $filtered[] = $s;
                }
            }
            return $filtered;
        }

        return $slots;
    }

    /**
     * Check If a Specific Date Is Operating Day
     */
    public static function is_date_open( $date_ymd ) {
        $settings = self::get_schedule_settings();
        $op_days  = isset( $settings['operating_days'] ) && is_array( $settings['operating_days'] ) ? $settings['operating_days'] : array();

        $day_name = strtolower( date( 'l', strtotime( $date_ymd ) ) );
        if ( ! in_array( $day_name, $op_days, true ) ) {
            return false;
        }

        // Check blackout dates
        $blackout_raw = isset( $settings['blackout_dates'] ) ? (string) $settings['blackout_dates'] : '';
        if ( ! empty( $blackout_raw ) ) {
            $lines = preg_split( '/[\r\n,]+/', $blackout_raw );
            foreach ( $lines as $line ) {
                $trimmed = trim( $line );
                if ( ! empty( $trimmed ) ) {
                    $parsed = date( 'Y-m-d', strtotime( $trimmed ) );
                    if ( $parsed === $date_ymd ) {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    /**
     * Count Current Bookings for a Specific Date & Slot
     */
    public static function get_slot_booking_count( $date, $slot_time ) {
        $posts = get_posts( array(
            'post_type'      => 'anukul_booking',
            'post_status'    => array( 'publish' ),
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => '_anukul_slot_date',
                    'value'   => sanitize_text_field( $date ),
                    'compare' => '=',
                ),
                array(
                    'key'     => '_anukul_slot_time',
                    'value'   => sanitize_text_field( $slot_time ),
                    'compare' => '=',
                ),
                array(
                    'key'     => '_anukul_payment_status',
                    'value'   => array( 'confirmed', 'pending_verification' ),
                    'compare' => 'IN',
                ),
            ),
        ) );

        return is_array( $posts ) ? count( $posts ) : 0;
    }

    /**
     * AJAX Endpoint: Get Available Slots for Selected Date
     */
    public function ajax_get_available_slots() {
        check_ajax_referer( 'anukul_booking_nonce', 'nonce' );

        $raw_date = isset( $_POST['date'] ) ? sanitize_text_field( $_POST['date'] ) : '';
        if ( empty( $raw_date ) ) {
            wp_send_json_error( array( 'message' => __( 'Missing date parameter.', 'anukul-booking' ) ) );
        }

        $timestamp = strtotime( $raw_date );
        if ( ! $timestamp ) {
            wp_send_json_error( array( 'message' => __( 'Invalid date format.', 'anukul-booking' ) ) );
        }

        $date_ymd = date( 'Y-m-d', $timestamp );
        $is_open  = self::is_date_open( $date_ymd );

        $all_slots = self::get_slots();
        $response_slots = array();

        foreach ( $all_slots as $slot ) {
            $is_active = ( isset( $slot['status'] ) && 'active' === $slot['status'] );
            $capacity  = isset( $slot['capacity'] ) ? max( 1, absint( $slot['capacity'] ) ) : 1;

            if ( ! $is_open || ! $is_active ) {
                $available = false;
                $reason    = ! $is_open ? 'Clinic Closed' : 'Unavailable';
            } else {
                $booked_count = self::get_slot_booking_count( $raw_date, $slot['time'] );
                if ( $booked_count >= $capacity ) {
                    $available = false;
                    $reason    = 'Booked';
                } else {
                    $available = true;
                    $reason    = 'Available';
                }
            }

            $response_slots[] = array(
                'id'           => $slot['id'],
                'time'         => $slot['time'],
                'start'        => isset( $slot['start'] ) ? $slot['start'] : '',
                'end'          => isset( $slot['end'] ) ? $slot['end'] : '',
                'period'       => isset( $slot['period'] ) ? $slot['period'] : 'morning',
                'label'        => isset( $slot['label'] ) ? $slot['label'] : '',
                'is_available' => $available,
                'reason'       => $reason,
                'capacity'     => $capacity,
            );
        }

        wp_send_json_success( array(
            'date_raw'       => $raw_date,
            'date_ymd'       => $date_ymd,
            'is_date_open'   => $is_open,
            'slots'          => $response_slots,
        ) );
    }

    /**
     * Render Admin Slots & Schedule Manager Screen
     */
    public function render_admin_page() {
        if ( isset( $_POST['anukul_save_slots_schedule'] ) && check_admin_referer( 'anukul_slots_schedule_nonce' ) ) {
            // Save Schedule Settings
            $operating_days = isset( $_POST['operating_days'] ) && is_array( $_POST['operating_days'] ) ? array_map( 'sanitize_key', $_POST['operating_days'] ) : array();
            $schedule_settings = array(
                'operating_days' => $operating_days,
                'hours_start'    => sanitize_text_field( $_POST['hours_start'] ),
                'hours_end'      => sanitize_text_field( $_POST['hours_end'] ),
                'min_notice'     => absint( $_POST['min_notice'] ),
                'max_advance'    => absint( $_POST['max_advance'] ),
                'blackout_dates' => sanitize_textarea_field( $_POST['blackout_dates'] ),
            );
            update_option( 'anukul_booking_schedule_settings', $schedule_settings );

            // Save Slots Array
            $slots = array();
            if ( isset( $_POST['slots'] ) && is_array( $_POST['slots'] ) ) {
                $idx = 0;
                foreach ( $_POST['slots'] as $s_data ) {
                    $idx++;
                    $time = sanitize_text_field( $s_data['time'] );
                    if ( empty( $time ) ) continue;

                    $slots[] = array(
                        'id'       => 'slot_' . $idx,
                        'time'     => $time,
                        'start'    => sanitize_text_field( $s_data['start'] ),
                        'end'      => sanitize_text_field( $s_data['end'] ),
                        'period'   => in_array( $s_data['period'], array( 'morning', 'afternoon' ), true ) ? $s_data['period'] : 'morning',
                        'status'   => isset( $s_data['status'] ) && 'active' === $s_data['status'] ? 'active' : 'inactive',
                        'capacity' => isset( $s_data['capacity'] ) ? max( 1, absint( $s_data['capacity'] ) ) : 1,
                        'label'    => sanitize_text_field( $s_data['label'] ),
                    );
                }
            }
            update_option( 'anukul_booking_slots', $slots );

            echo '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__( 'Available slots and clinic schedule updated successfully.', 'anukul-booking' ) . '</strong></p></div>';
        }

        $schedule = self::get_schedule_settings();
        $slots    = self::get_slots();
        $op_days  = isset( $schedule['operating_days'] ) && is_array( $schedule['operating_days'] ) ? $schedule['operating_days'] : array();

        $all_days = array(
            'monday'    => __( 'Monday', 'anukul-booking' ),
            'tuesday'   => __( 'Tuesday', 'anukul-booking' ),
            'wednesday' => __( 'Wednesday', 'anukul-booking' ),
            'thursday'  => __( 'Thursday', 'anukul-booking' ),
            'friday'    => __( 'Friday', 'anukul-booking' ),
            'saturday'  => __( 'Saturday', 'anukul-booking' ),
            'sunday'    => __( 'Sunday', 'anukul-booking' ),
        );
        ?>
        <div class="wrap">
            <h1 style="color:#1F4D3A; font-family:'EB Garamond', serif; font-size:28px;">
                🌿 <?php esc_html_e( 'ANUKUL Available Slots & Operating Schedule', 'anukul-booking' ); ?>
            </h1>
            <p style="color:#555; font-size:14px;">
                <?php esc_html_e( 'Configure clinic consultation hours, active days of the week, blackout holiday dates, and customizable daily muhurta time slots.', 'anukul-booking' ); ?>
            </p>

            <form method="post" action="">
                <?php wp_nonce_field( 'anukul_slots_schedule_nonce' ); ?>

                <!-- Operating Days & Hours Box -->
                <div style="background:#fff; padding:24px; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.08); margin-top:20px; border-left:4px solid #1F4D3A;">
                    <h2 style="margin-top:0; color:#1F4D3A;">📅 <?php esc_html_e( 'Operating Schedule & Working Days', 'anukul-booking' ); ?></h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><label><?php esc_html_e( 'Consultation Days', 'anukul-booking' ); ?></label></th>
                            <td>
                                <div style="display:flex; flex-wrap:wrap; gap:16px;">
                                    <?php foreach ( $all_days as $slug => $label ) : ?>
                                        <label style="display:inline-flex; align-items:center; gap:6px; font-weight:500;">
                                            <input type="checkbox" name="operating_days[]" value="<?php echo esc_attr( $slug ); ?>" <?php checked( in_array( $slug, $op_days, true ) ); ?> />
                                            <?php echo esc_html( $label ); ?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                                <p class="description"><?php esc_html_e( 'Unchecked days are marked closed on the patient booking calendar.', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="hours_start"><?php esc_html_e( 'Clinic Operating Hours', 'anukul-booking' ); ?></label></th>
                            <td>
                                <input type="text" id="hours_start" name="hours_start" value="<?php echo esc_attr( $schedule['hours_start'] ); ?>" style="width:130px;" />
                                <span> <?php esc_html_e( 'to', 'anukul-booking' ); ?> </span>
                                <input type="text" id="hours_end" name="hours_end" value="<?php echo esc_attr( $schedule['hours_end'] ); ?>" style="width:130px;" />
                                <p class="description"><?php esc_html_e( 'Clinic standard operating hours (e.g. 9:30 AM TO 6:30 PM).', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="min_notice"><?php esc_html_e( 'Minimum Advance Notice', 'anukul-booking' ); ?></label></th>
                            <td>
                                <input type="number" id="min_notice" name="min_notice" value="<?php echo esc_attr( $schedule['min_notice'] ); ?>" style="width:80px;" min="0" /> <?php esc_html_e( 'hours', 'anukul-booking' ); ?>
                                <p class="description"><?php esc_html_e( 'Minimum hours in advance a patient must book before the session starts.', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="max_advance"><?php esc_html_e( 'Maximum Advance Window', 'anukul-booking' ); ?></label></th>
                            <td>
                                <input type="number" id="max_advance" name="max_advance" value="<?php echo esc_attr( $schedule['max_advance'] ); ?>" style="width:80px;" min="1" max="180" /> <?php esc_html_e( 'days', 'anukul-booking' ); ?>
                                <p class="description"><?php esc_html_e( 'How many calendar days into the future patients can reserve slots.', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="blackout_dates"><?php esc_html_e( 'Clinic Holidays / Blackout Dates', 'anukul-booking' ); ?></label></th>
                            <td>
                                <textarea id="blackout_dates" name="blackout_dates" rows="3" class="large-text" placeholder="2026-10-24&#10;2026-11-01"><?php echo esc_textarea( $schedule['blackout_dates'] ); ?></textarea>
                                <p class="description"><?php esc_html_e( 'Enter one date per line in YYYY-MM-DD format (e.g. 2026-10-24). Bookings on these dates are disabled.', 'anukul-booking' ); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Configured Slots Table -->
                <div style="background:#fff; padding:24px; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.08); margin-top:24px; border-left:4px solid #C66A22;">
                    <div style="display:flex; align-items:center; justify-between; margin-bottom:12px;">
                        <div>
                            <h2 style="margin:0; color:#1F4D3A;">⏰ <?php esc_html_e( 'Consultation Time Slots & Muhurta Windows', 'anukul-booking' ); ?></h2>
                            <p style="margin:4px 0 0; color:#666; font-size:13px;"><?php esc_html_e( 'Manage daily time slots. Add new slots, toggle active/inactive status, adjust capacity, or remove slots.', 'anukul-booking' ); ?></p>
                        </div>
                    </div>

                    <table class="widefat fixed striped" id="anukul-slots-table" style="margin-top:16px;">
                        <thead>
                            <tr>
                                <th style="width:50px; text-align:center;"><?php esc_html_e( 'Status', 'anukul-booking' ); ?></th>
                                <th style="width:240px;"><?php esc_html_e( 'Slot Display Label (e.g. 09:30 AM – 11:00 AM IST)', 'anukul-booking' ); ?></th>
                                <th style="width:110px;"><?php esc_html_e( 'Start (24h)', 'anukul-booking' ); ?></th>
                                <th style="width:110px;"><?php esc_html_e( 'End (24h)', 'anukul-booking' ); ?></th>
                                <th style="width:160px;"><?php esc_html_e( 'Period (Muhurta)', 'anukul-booking' ); ?></th>
                                <th><?php esc_html_e( 'Clinical Subtitle / Bio-Prana Note', 'anukul-booking' ); ?></th>
                                <th style="width:80px;"><?php esc_html_e( 'Capacity', 'anukul-booking' ); ?></th>
                                <th style="width:70px; text-align:center;"><?php esc_html_e( 'Action', 'anukul-booking' ); ?></th>
                            </tr>
                        </thead>
                        <tbody id="anukul-slots-tbody">
                            <?php foreach ( $slots as $i => $s ) : 
                                $is_active = ( isset( $s['status'] ) && 'active' === $s['status'] );
                            ?>
                                <tr class="slot-row">
                                    <td style="text-align:center; vertical-align:middle;">
                                        <input type="checkbox" name="slots[<?php echo esc_attr( $i ); ?>][status]" value="active" <?php checked( $is_active ); ?> title="Active slot toggle" />
                                    </td>
                                    <td>
                                        <input type="text" name="slots[<?php echo esc_attr( $i ); ?>][time]" value="<?php echo esc_attr( $s['time'] ); ?>" class="widefat" required />
                                    </td>
                                    <td>
                                        <input type="time" name="slots[<?php echo esc_attr( $i ); ?>][start]" value="<?php echo esc_attr( isset( $s['start'] ) ? $s['start'] : '09:30' ); ?>" class="widefat" />
                                    </td>
                                    <td>
                                        <input type="time" name="slots[<?php echo esc_attr( $i ); ?>][end]" value="<?php echo esc_attr( isset( $s['end'] ) ? $s['end'] : '11:00' ); ?>" class="widefat" />
                                    </td>
                                    <td>
                                        <select name="slots[<?php echo esc_attr( $i ); ?>][period]" class="widefat">
                                            <option value="morning" <?php selected( isset( $s['period'] ) ? $s['period'] : 'morning', 'morning' ); ?>><?php esc_html_e( 'Morning Muhurta', 'anukul-booking' ); ?></option>
                                            <option value="afternoon" <?php selected( isset( $s['period'] ) ? $s['period'] : '', 'afternoon' ); ?>><?php esc_html_e( 'Afternoon & Twilight', 'anukul-booking' ); ?></option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="slots[<?php echo esc_attr( $i ); ?>][label]" value="<?php echo esc_attr( isset( $s['label'] ) ? $s['label'] : '' ); ?>" class="widefat" placeholder="e.g. High Bio-Prana Flow" />
                                    </td>
                                    <td>
                                        <input type="number" min="1" max="10" name="slots[<?php echo esc_attr( $i ); ?>][capacity]" value="<?php echo esc_attr( isset( $s['capacity'] ) ? $s['capacity'] : 1 ); ?>" class="widefat" />
                                    </td>
                                    <td style="text-align:center; vertical-align:middle;">
                                        <button type="button" class="button button-small delete-slot-btn" style="color:#d63638;" onclick="removeSlotRow(this)">✕</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div style="margin-top:16px;">
                        <button type="button" class="button button-secondary" onclick="addNewSlotRow()">
                            + <?php esc_html_e( 'Add Another Slot', 'anukul-booking' ); ?>
                        </button>
                    </div>
                </div>

                <p class="submit" style="margin-top:24px;">
                    <input type="submit" name="anukul_save_slots_schedule" class="button button-primary button-large" value="<?php esc_attr_e( 'Save Available Slots & Schedule', 'anukul-booking' ); ?>" />
                </p>
            </form>
        </div>

        <script>
        function removeSlotRow(btn) {
            const row = btn.closest('tr');
            if (row && document.querySelectorAll('#anukul-slots-tbody tr').length > 1) {
                row.remove();
            } else {
                alert('You must have at least one slot configured.');
            }
        }

        function addNewSlotRow() {
            const tbody = document.getElementById('anukul-slots-tbody');
            const rowCount = tbody.querySelectorAll('tr').length;
            const newIndex = rowCount + Date.now();
            const tr = document.createElement('tr');
            tr.className = 'slot-row';
            tr.innerHTML = `
                <td style="text-align:center; vertical-align:middle;">
                    <input type="checkbox" name="slots[${newIndex}][status]" value="active" checked title="Active slot toggle" />
                </td>
                <td>
                    <input type="text" name="slots[${newIndex}][time]" value="06:30 PM – 07:30 PM IST" class="widefat" required />
                </td>
                <td>
                    <input type="time" name="slots[${newIndex}][start]" value="18:30" class="widefat" />
                </td>
                <td>
                    <input type="time" name="slots[${newIndex}][end]" value="19:30" class="widefat" />
                </td>
                <td>
                    <select name="slots[${newIndex}][period]" class="widefat">
                        <option value="morning">Morning Muhurta</option>
                        <option value="afternoon" selected>Afternoon & Twilight</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="slots[${newIndex}][label]" value="Evening Harmonization" class="widefat" />
                </td>
                <td>
                    <input type="number" min="1" max="10" name="slots[${newIndex}][capacity]" value="1" class="widefat" />
                </td>
                <td style="text-align:center; vertical-align:middle;">
                    <button type="button" class="button button-small delete-slot-btn" style="color:#d63638;" onclick="removeSlotRow(this)">✕</button>
                </td>
            `;
            tbody.appendChild(tr);
        }
        </script>
        <?php
    }
}

ANUKUL_Slots_Manager::instance();

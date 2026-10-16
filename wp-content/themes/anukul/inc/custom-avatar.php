<?php
/**
 * ANUKUL Custom User Avatar Management
 *
 * Allows clients to upload, update, and manage profile avatar pictures directly from the Sanctuary account dashboard.
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Filter get_avatar_url and pre_get_avatar_data to serve custom user avatars
 */
function anukul_custom_avatar_data( $args, $id_or_email ) {
    $user_id = 0;
    if ( is_numeric( $id_or_email ) ) {
        $user_id = (int) $id_or_email;
    } elseif ( is_string( $id_or_email ) && ( $user = get_user_by( 'email', $id_or_email ) ) ) {
        $user_id = $user->ID;
    } elseif ( is_object( $id_or_email ) ) {
        if ( isset( $id_or_email->user_id ) && $id_or_email->user_id ) {
            $user_id = (int) $id_or_email->user_id;
        } elseif ( isset( $id_or_email->ID ) && $id_or_email->ID ) {
            $user_id = (int) $id_or_email->ID;
        }
    }

    if ( $user_id ) {
        $custom_url = get_user_meta( $user_id, '_anukul_avatar_url', true );
        if ( ! empty( $custom_url ) ) {
            $args['url'] = $custom_url;
        }
    }
    return $args;
}
add_filter( 'pre_get_avatar_data', 'anukul_custom_avatar_data', 20, 2 );

/**
 * AJAX Handler: Upload and set custom avatar
 */
function anukul_handle_avatar_upload() {
    check_ajax_referer( 'anukul_avatar_nonce', 'security' );

    if ( ! is_user_logged_in() ) {
        wp_send_json_error( array( 'message' => __( 'Authentication required. Please log in.', 'anukul' ) ) );
    }

    $user_id = get_current_user_id();

    if ( empty( $_FILES['avatar'] ) || empty( $_FILES['avatar']['name'] ) ) {
        wp_send_json_error( array( 'message' => __( 'No image file was provided for upload.', 'anukul' ) ) );
    }

    $file = $_FILES['avatar'];

    // Validate image mime type
    $allowed_mimes = array( 'image/jpeg', 'image/png', 'image/webp', 'image/jpg' );
    $file_info     = wp_check_filetype( basename( $file['name'] ) );
    if ( ! in_array( $file['type'], $allowed_mimes, true ) ) {
        wp_send_json_error( array( 'message' => __( 'Invalid image format. Please select a JPG, PNG, or WebP photo.', 'anukul' ) ) );
    }

    // Validate maximum file size (5MB)
    if ( $file['size'] > 5 * 1024 * 1024 ) {
        wp_send_json_error( array( 'message' => __( 'Image size exceeds maximum allowable limit of 5MB.', 'anukul' ) ) );
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    // Upload file using WordPress standard upload handler
    $upload = wp_handle_upload( $file, array( 'test_form' => false ) );

    if ( isset( $upload['error'] ) && ! empty( $upload['error'] ) ) {
        wp_send_json_error( array( 'message' => $upload['error'] ) );
    }

    $avatar_url = $upload['url'];
    update_user_meta( $user_id, '_anukul_avatar_url', $avatar_url );

    wp_send_json_success( array(
        'message'    => __( 'Sanctuary profile avatar updated successfully.', 'anukul' ),
        'avatar_url' => $avatar_url,
    ) );
}
add_action( 'wp_ajax_anukul_upload_avatar', 'anukul_handle_avatar_upload' );

/**
 * AJAX Handler: Remove custom avatar and revert to default
 */
function anukul_handle_avatar_remove() {
    check_ajax_referer( 'anukul_avatar_nonce', 'security' );

    if ( ! is_user_logged_in() ) {
        wp_send_json_error( array( 'message' => __( 'Authentication required.', 'anukul' ) ) );
    }

    $user_id = get_current_user_id();
    delete_user_meta( $user_id, '_anukul_avatar_url' );

    // Re-fetch default avatar
    $default_url = get_avatar_url( $user_id, array( 'size' => 128 ) );

    wp_send_json_success( array(
        'message'     => __( 'Profile photo removed. Reverted to default avatar.', 'anukul' ),
        'default_url' => $default_url,
    ) );
}
add_action( 'wp_ajax_anukul_remove_avatar', 'anukul_handle_avatar_remove' );

function anukul_enqueue_avatar_script_data() {
    if ( is_user_logged_in() ) {
        $config = array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'anukul_avatar_nonce' ),
        );
        wp_add_inline_script( 'tailwind-cdn', 'window.anukulAvatarConfig = ' . wp_json_encode( $config ) . ';', 'after' );
    }
}
add_action( 'wp_enqueue_scripts', 'anukul_enqueue_avatar_script_data' );


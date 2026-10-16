<?php
/**
 * ANUKUL WordPress Theme Customizer Integration
 *
 * Provides comprehensive native Customizer settings for:
 * - Header coordinates, Sanskrit motto, hours, CTA
 * - Footer logo, ethos, contacts, social links, copyright
 * - WhatsApp Floating Concierge Widget
 * - Home Page Hero & Editorial Section Controls
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Sanitize Checkbox (returns 1 or 0)
 */
function anukul_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === (bool) $checked ) ? 1 : 0 );
}

/**
 * Register Customizer Settings and Controls
 */
function anukul_customize_register( $wp_customize ) {

    // Main Theme Settings Panel
    $wp_customize->add_panel( 'anukul_sanctuary_panel', array(
        'title'       => __( 'ANUKUL Sanctuary Customization', 'anukul' ),
        'description' => __( 'Configure header, footer, clinic details, WhatsApp concierge, and home page sections.', 'anukul' ),
        'priority'    => 25,
    ) );

    /* ==========================================================================
       1. HEADER & TOP UTILITY CONTROLS
       ========================================================================== */
    $wp_customize->add_section( 'anukul_header_section', array(
        'title'       => __( 'Header & Navigation Controls', 'anukul' ),
        'panel'       => 'anukul_sanctuary_panel',
        'priority'    => 10,
    ) );

    // Sanskrit Motto / Invocation
    $wp_customize->add_setting( 'anukul_sanskrit_motto', array(
        'default'           => 'सर्वे भवन्तु सुखिनः सर्वे सन्तु निरामयाः',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_sanskrit_motto', array(
        'label'       => __( 'Top Bar Sanskrit Invocation', 'anukul' ),
        'description' => __( 'Appears on the left side of the top green utility bar.', 'anukul' ),
        'section'     => 'anukul_header_section',
        'type'        => 'text',
    ) );

    // Operating Hours
    $wp_customize->add_setting( 'anukul_hours', array(
        'default'           => 'Mon–Sat: 9:30 AM TO 6:30 PM',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_hours', array(
        'label'       => __( 'Sanctuary Operating Hours', 'anukul' ),
        'section'     => 'anukul_header_section',
        'type'        => 'text',
    ) );

    // Primary & WhatsApp Phone
    $wp_customize->add_setting( 'anukul_phone', array(
        'default'           => '+91 7624012501',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_phone', array(
        'label'       => __( 'Primary & WhatsApp Phone Number', 'anukul' ),
        'section'     => 'anukul_header_section',
        'type'        => 'text',
    ) );

    // Secondary Helpline Phone
    $wp_customize->add_setting( 'anukul_phone_secondary', array(
        'default'           => '+91 63560 19951',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_phone_secondary', array(
        'label'       => __( 'Secondary Helpline Desk Number', 'anukul' ),
        'section'     => 'anukul_header_section',
        'type'        => 'text',
    ) );

    // Header CTA Button Text
    $wp_customize->add_setting( 'anukul_header_cta_text', array(
        'default'           => 'BOOK CONSULTATION',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_header_cta_text', array(
        'label'       => __( 'Header CTA Button Label', 'anukul' ),
        'section'     => 'anukul_header_section',
        'type'        => 'text',
    ) );

    // Header CTA Button Destination URL
    $wp_customize->add_setting( 'anukul_header_cta_url', array(
        'default'           => home_url( '/book-your-consultation/' ),
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_header_cta_url', array(
        'label'       => __( 'Header CTA Button URL', 'anukul' ),
        'section'     => 'anukul_header_section',
        'type'        => 'url',
    ) );

    // Sticky Header Toggle
    $wp_customize->add_setting( 'anukul_sticky_header', array(
        'default'           => 1,
        'sanitize_callback' => 'anukul_sanitize_checkbox',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_sticky_header', array(
        'label'       => __( 'Enable Sticky Fixed Header', 'anukul' ),
        'description' => __( 'Keeps the header bar fixed at the top during scrolling.', 'anukul' ),
        'section'     => 'anukul_header_section',
        'type'        => 'checkbox',
    ) );

    /* ==========================================================================
       2. FOOTER CONTROLS
       ========================================================================== */
    $wp_customize->add_section( 'anukul_footer_section', array(
        'title'       => __( 'Footer Controls & Branding', 'anukul' ),
        'panel'       => 'anukul_sanctuary_panel',
        'priority'    => 20,
    ) );

    // Footer Logo
    $wp_customize->add_setting( 'anukul_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'anukul_footer_logo', array(
        'label'       => __( 'Custom Footer Logo (Optional)', 'anukul' ),
        'description' => __( 'Overrides the default header logo in the footer if specified.', 'anukul' ),
        'section'     => 'anukul_footer_section',
    ) ) );

    // Footer Brand Tagline
    $wp_customize->add_setting( 'anukul_footer_tagline', array(
        'default'           => 'Health • Space • Lifestyle • Harmony',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_footer_tagline', array(
        'label'       => __( 'Footer Brand Tagline', 'anukul' ),
        'section'     => 'anukul_footer_section',
        'type'        => 'text',
    ) );

    // Footer Ethos & Description
    $wp_customize->add_setting( 'anukul_footer_ethos', array(
        'default'           => 'Anchored in classical Vedic sciences, spatial alignment, and holistic constitutional balance for serene modern living.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_footer_ethos', array(
        'label'       => __( 'Footer Ethos / About Paragraph', 'anukul' ),
        'section'     => 'anukul_footer_section',
        'type'        => 'textarea',
    ) );

    // Clinic Physical Address
    $wp_customize->add_setting( 'anukul_address', array(
        'default'           => 'Prime Vedic Enclave, Cultural Quarter',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_address', array(
        'label'       => __( 'Clinic Physical Address', 'anukul' ),
        'section'     => 'anukul_footer_section',
        'type'        => 'text',
    ) );

    // Concierge Email
    $wp_customize->add_setting( 'anukul_email', array(
        'default'           => 'sanctuary@anukul-harmony.com',
        'sanitize_callback' => 'sanitize_email',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_email', array(
        'label'       => __( 'Concierge Email Address', 'anukul' ),
        'section'     => 'anukul_footer_section',
        'type'        => 'email',
    ) );

    // Footer Copyright Text
    $wp_customize->add_setting( 'anukul_footer_copyright', array(
        'default'           => '© ' . date( 'Y' ) . ' ANUKUL Ayur Vastu Harmony Clinic. All rights reserved. Responsible Vedic Clinical Practice.',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_footer_copyright', array(
        'label'       => __( 'Footer Copyright Notice', 'anukul' ),
        'section'     => 'anukul_footer_section',
        'type'        => 'text',
    ) );

    // Social Links
    $wp_customize->add_setting( 'anukul_instagram_url', array(
        'default'           => 'https://instagram.com',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_instagram_url', array(
        'label'       => __( 'Instagram Profile URL', 'anukul' ),
        'section'     => 'anukul_footer_section',
        'type'        => 'url',
    ) );

    $wp_customize->add_setting( 'anukul_facebook_url', array(
        'default'           => 'https://facebook.com',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_facebook_url', array(
        'label'       => __( 'Facebook Page URL', 'anukul' ),
        'section'     => 'anukul_footer_section',
        'type'        => 'url',
    ) );

    $wp_customize->add_setting( 'anukul_youtube_url', array(
        'default'           => 'https://youtube.com',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_youtube_url', array(
        'label'       => __( 'YouTube Channel URL', 'anukul' ),
        'section'     => 'anukul_footer_section',
        'type'        => 'url',
    ) );

    /* ==========================================================================
       3. FLOATING WHATSAPP CHAT WIDGET
       ========================================================================== */
    $wp_customize->add_section( 'anukul_whatsapp_section', array(
        'title'       => __( 'WhatsApp Concierge Widget', 'anukul' ),
        'panel'       => 'anukul_sanctuary_panel',
        'priority'    => 30,
    ) );

    $wp_customize->add_setting( 'anukul_whatsapp_enable', array(
        'default'           => 1,
        'sanitize_callback' => 'anukul_sanitize_checkbox',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_whatsapp_enable', array(
        'label'       => __( 'Enable Floating WhatsApp Button', 'anukul' ),
        'section'     => 'anukul_whatsapp_section',
        'type'        => 'checkbox',
    ) );

    $wp_customize->add_setting( 'anukul_whatsapp_number', array(
        'default'           => '+91 7624012501',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_whatsapp_number', array(
        'label'       => __( 'WhatsApp Number for Inquiries', 'anukul' ),
        'section'     => 'anukul_whatsapp_section',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'anukul_whatsapp_greeting', array(
        'default'           => 'Namaste ANUKUL Sanctuary, I would like to inquire about appointments and consultations.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_whatsapp_greeting', array(
        'label'       => __( 'Pre-filled WhatsApp Message', 'anukul' ),
        'section'     => 'anukul_whatsapp_section',
        'type'        => 'textarea',
    ) );

    /* ==========================================================================
       4. HOME PAGE HERO & EDITORIAL SECTIONS
       ========================================================================== */
    $wp_customize->add_section( 'anukul_homepage_section', array(
        'title'       => __( 'Home Page Section Content', 'anukul' ),
        'panel'       => 'anukul_sanctuary_panel',
        'priority'    => 40,
    ) );

    // Eyebrow
    $wp_customize->add_setting( 'anukul_hero_eyebrow', array(
        'default'           => 'AYURVEDA • VASTU • SPIRITUAL LIVING',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_hero_eyebrow', array(
        'label'       => __( 'Hero Eyebrow Pill Text', 'anukul' ),
        'section'     => 'anukul_homepage_section',
        'type'        => 'text',
    ) );

    // Hero Title
    $wp_customize->add_setting( 'anukul_hero_title', array(
        'default'           => 'UNDERSTAND THE PERSON. UNDERSTAND THE SPACE. CREATE HARMONY.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_hero_title', array(
        'label'       => __( 'Hero Main Heading', 'anukul' ),
        'section'     => 'anukul_homepage_section',
        'type'        => 'textarea',
    ) );

    // Hero Subtitle
    $wp_customize->add_setting( 'anukul_hero_subtitle', array(
        'default'           => 'Traditional Indian wisdom for a more conscious relationship between health, lifestyle, and space. Grounded in classical insight, calibrated for modern living.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_hero_subtitle', array(
        'label'       => __( 'Hero Supporting Subtitle', 'anukul' ),
        'section'     => 'anukul_homepage_section',
        'type'        => 'textarea',
    ) );

    // Primary CTA Text & Link
    $wp_customize->add_setting( 'anukul_hero_cta_primary_text', array(
        'default'           => 'BOOK A CONSULTATION',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_hero_cta_primary_text', array(
        'label'       => __( 'Primary CTA Button Label', 'anukul' ),
        'section'     => 'anukul_homepage_section',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'anukul_hero_cta_primary_url', array(
        'default'           => home_url( '/book-your-consultation/' ),
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_hero_cta_primary_url', array(
        'label'       => __( 'Primary CTA Destination URL', 'anukul' ),
        'section'     => 'anukul_homepage_section',
        'type'        => 'url',
    ) );

    // Secondary CTA Text & Link
    $wp_customize->add_setting( 'anukul_hero_cta_secondary_text', array(
        'default'           => 'EXPLORE ANUKUL',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_hero_cta_secondary_text', array(
        'label'       => __( 'Secondary CTA Button Label', 'anukul' ),
        'section'     => 'anukul_homepage_section',
        'type'        => 'text',
    ) );

    $wp_customize->add_setting( 'anukul_hero_cta_secondary_url', array(
        'default'           => '#anukul-intro',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_hero_cta_secondary_url', array(
        'label'       => __( 'Secondary CTA Destination URL', 'anukul' ),
        'section'     => 'anukul_homepage_section',
        'type'        => 'text',
    ) );

    // Hero Showcase Image
    $wp_customize->add_setting( 'anukul_hero_image', array(
        'default'           => 'https://lh3.googleusercontent.com/aida-public/AB6AXuARURrR0Kw5gjirMZTLQppRiurndYOzz-q26ZyVH5BRqjan8gZ03mJK25nedxOY61sM_O-6tgKqV7PXM71xDlTQu3cfOyQGC4U8PPinjsiq1xlMQdVZKzjUVCPpmCzaDnfmKMEOgNFcVSuv8ECgV_hpgCfDPl0pvmVWgx9mM4OmRNej83R2A7vvhxVHds-YP19hxjBSFbP6nEkcamfdpvU-Aw5o8zEUt-2DTRmgYL_VwmLWgUvgGBVuzw',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'anukul_hero_image', array(
        'label'       => __( 'Hero Architectural Showcase Image', 'anukul' ),
        'description' => __( 'Upload or select an image for the grand central sanctuary showcase.', 'anukul' ),
        'section'     => 'anukul_homepage_section',
    ) ) );

    // Responsible Practice Notice
    $wp_customize->add_setting( 'anukul_practice_notice', array(
        'default'           => 'Responsible Practice Notice: ANUKUL practices traditional Ayurvedic wellness, constitutional balancing, and spatial harmony principles. Our consultations and remedies support holistic wellbeing and do not replace emergency medical intervention or allopathic surgical diagnosis.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( 'anukul_practice_notice', array(
        'label'       => __( 'Responsible Practice Notice Disclaimer', 'anukul' ),
        'section'     => 'anukul_homepage_section',
        'type'        => 'textarea',
    ) );
}
add_action( 'customize_register', 'anukul_customize_register' );

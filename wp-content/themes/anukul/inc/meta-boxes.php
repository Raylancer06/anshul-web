<?php
/**
 * ANUKUL Native Meta Boxes & Structured Custom Fields
 *
 * Provides native WordPress post/page meta boxes for managing page hero text,
 * editorial lead headings, and call-to-action buttons directly within the WordPress Page Editor.
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Page Editorial Meta Box
 */
function anukul_register_page_meta_boxes() {
    add_meta_box(
        'anukul_page_settings',
        __( 'ANUKUL Sanctuary: Editorial Header & Hero Options', 'anukul' ),
        'anukul_render_page_meta_box',
        'page',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'anukul_register_page_meta_boxes' );

/**
 * Render Page Editorial Meta Box
 */
function anukul_render_page_meta_box( $post ) {
    wp_nonce_field( 'anukul_save_page_meta', 'anukul_page_meta_nonce' );

    $eyebrow    = get_post_meta( $post->ID, '_anukul_page_eyebrow', true );
    $headline   = get_post_meta( $post->ID, '_anukul_page_headline', true );
    $subheading = get_post_meta( $post->ID, '_anukul_page_subheading', true );
    $cta_text   = get_post_meta( $post->ID, '_anukul_page_cta_text', true );
    $cta_url    = get_post_meta( $post->ID, '_anukul_page_cta_url', true );
    $hero_img   = get_post_meta( $post->ID, '_anukul_hero_image_url', true );
    ?>
    <div style="padding: 10px 0;">
        <p style="margin-bottom: 15px; color: #555;">
            <?php esc_html_e( 'Customize page-level presentation. Leave fields blank to use standard defaults or Customizer settings.', 'anukul' ); ?>
        </p>

        <table class="form-table" role="presentation">
            <tr>
                <th scope="row"><label for="anukul_page_eyebrow"><?php esc_html_e( 'Editorial Eyebrow / Pill', 'anukul' ); ?></label></th>
                <td>
                    <input type="text" name="anukul_page_eyebrow" id="anukul_page_eyebrow" value="<?php echo esc_attr( $eyebrow ); ?>" class="regular-text" placeholder="e.g. AYURVEDA • VASTU • SPIRITUAL LIVING" style="width: 100%; max-width: 500px;">
                    <p class="description"><?php esc_html_e( 'Small uppercase category banner above the main heading.', 'anukul' ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="anukul_page_headline"><?php esc_html_e( 'Custom Hero Heading', 'anukul' ); ?></label></th>
                <td>
                    <input type="text" name="anukul_page_headline" id="anukul_page_headline" value="<?php echo esc_attr( $headline ); ?>" class="regular-text" placeholder="Overrides default page title" style="width: 100%; max-width: 500px;">
                    <p class="description"><?php esc_html_e( 'Grand hero headline displayed at the top of the page.', 'anukul' ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="anukul_page_subheading"><?php esc_html_e( 'Lead Subheading Narrative', 'anukul' ); ?></label></th>
                <td>
                    <textarea name="anukul_page_subheading" id="anukul_page_subheading" rows="3" style="width: 100%; max-width: 600px;"><?php echo esc_textarea( $subheading ); ?></textarea>
                    <p class="description"><?php esc_html_e( 'Supporting editorial explanation or philosophical invocation.', 'anukul' ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="anukul_hero_image_url"><?php esc_html_e( 'Custom Hero Showcase Image URL', 'anukul' ); ?></label></th>
                <td>
                    <input type="url" name="anukul_hero_image_url" id="anukul_hero_image_url" value="<?php echo esc_url( $hero_img ); ?>" class="regular-text" placeholder="https://..." style="width: 100%; max-width: 500px;">
                    <p class="description"><?php esc_html_e( 'Hero showcase image URL (from Media Library or external URL).', 'anukul' ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="anukul_page_cta_text"><?php esc_html_e( 'Page CTA Button Text', 'anukul' ); ?></label></th>
                <td>
                    <input type="text" name="anukul_page_cta_text" id="anukul_page_cta_text" value="<?php echo esc_attr( $cta_text ); ?>" class="regular-text" placeholder="e.g. BOOK A CONSULTATION" style="width: 100%; max-width: 300px;">
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="anukul_page_cta_url"><?php esc_html_e( 'Page CTA Destination URL', 'anukul' ); ?></label></th>
                <td>
                    <input type="url" name="anukul_page_cta_url" id="anukul_page_cta_url" value="<?php echo esc_url( $cta_url ); ?>" class="regular-text" placeholder="/book-your-consultation/" style="width: 100%; max-width: 500px;">
                </td>
            </tr>
        </table>
    </div>
    <?php
}

/**
 * Save Page Editorial Meta Box Data
 */
function anukul_save_page_meta_boxes( $post_id ) {
    if ( ! isset( $_POST['anukul_page_meta_nonce'] ) || ! wp_verify_nonce( $_POST['anukul_page_meta_nonce'], 'anukul_save_page_meta' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['anukul_page_eyebrow'] ) ) {
        update_post_meta( $post_id, '_anukul_page_eyebrow', sanitize_text_field( $_POST['anukul_page_eyebrow'] ) );
    }

    if ( isset( $_POST['anukul_page_headline'] ) ) {
        update_post_meta( $post_id, '_anukul_page_headline', sanitize_text_field( $_POST['anukul_page_headline'] ) );
    }

    if ( isset( $_POST['anukul_page_subheading'] ) ) {
        update_post_meta( $post_id, '_anukul_page_subheading', sanitize_textarea_field( $_POST['anukul_page_subheading'] ) );
    }

    if ( isset( $_POST['anukul_hero_image_url'] ) ) {
        update_post_meta( $post_id, '_anukul_hero_image_url', esc_url_raw( $_POST['anukul_hero_image_url'] ) );
    }

    if ( isset( $_POST['anukul_page_cta_text'] ) ) {
        update_post_meta( $post_id, '_anukul_page_cta_text', sanitize_text_field( $_POST['anukul_page_cta_text'] ) );
    }

    if ( isset( $_POST['anukul_page_cta_url'] ) ) {
        update_post_meta( $post_id, '_anukul_page_cta_url', esc_url_raw( $_POST['anukul_page_cta_url'] ) );
    }
}
add_action( 'save_post', 'anukul_save_page_meta_boxes' );

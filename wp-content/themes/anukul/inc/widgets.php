<?php
/**
 * ANUKUL Theme Widget Areas & Custom Widgets Registration
 *
 * Registers native sidebars for Footer columns, Shop sidebar, and Blog sidebar,
 * alongside custom widgets designed for the classical ANUKUL aesthetic.
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Widget Areas / Sidebars
 */
function anukul_widgets_init() {

    // Footer Column 1: Brand & Ethos
    register_sidebar( array(
        'name'          => __( 'Footer Column 1 (Brand & Ethos)', 'anukul' ),
        'id'            => 'footer-1',
        'description'   => __( 'First footer column. Displays brand identity, logo, and clinic mission.', 'anukul' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s flex flex-col justify-start space-y-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold mb-2">',
        'after_title'   => '</h3>',
    ) );

    // Footer Column 2: Explorations & Navigation
    register_sidebar( array(
        'name'          => __( 'Footer Column 2 (Explorations & Navigation)', 'anukul' ),
        'id'            => 'footer-2',
        'description'   => __( 'Second footer column. Displays sanctuary navigation links or custom menus.', 'anukul' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s flex flex-col justify-start space-y-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold mb-2">',
        'after_title'   => '</h3>',
    ) );

    // Footer Column 3: Sanctuary Hours & Concierge
    register_sidebar( array(
        'name'          => __( 'Footer Column 3 (Sanctuary Hours & Concierge)', 'anukul' ),
        'id'            => 'footer-3',
        'description'   => __( 'Third footer column. Displays operating hours, phone numbers, and physical location.', 'anukul' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s flex flex-col justify-start space-y-2.5">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold mb-2">',
        'after_title'   => '</h3>',
    ) );

    // Footer Column 4: Newsletter & Credentials
    register_sidebar( array(
        'name'          => __( 'Footer Column 4 (Newsletter & Credentials)', 'anukul' ),
        'id'            => 'footer-4',
        'description'   => __( 'Optional fourth footer column for accreditation badges, newsletter, or certifications.', 'anukul' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s flex flex-col justify-start space-y-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold mb-2">',
        'after_title'   => '</h3>',
    ) );

    // Shop Catalog Sidebar
    register_sidebar( array(
        'name'          => __( 'Shop Catalog Sidebar', 'anukul' ),
        'id'            => 'sidebar-shop',
        'description'   => __( 'Widget area appearing in the dispensary shop and catalog filter zone.', 'anukul' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s p-4 bg-surface-container/60 rounded-lg border border-[#E8D8BC] mb-4 space-y-2">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-2 pb-1 border-b border-[#E8D8BC]">',
        'after_title'   => '</h4>',
    ) );

    // Blog & Wisdom Sidebar
    register_sidebar( array(
        'name'          => __( 'Blog & Wisdom Sidebar', 'anukul' ),
        'id'            => 'sidebar-blog',
        'description'   => __( 'Widget area appearing on blog and classical discourse pages.', 'anukul' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s p-5 bg-surface rounded-lg shadow-sm border border-[#E8D8BC] mb-6 space-y-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="font-headline-sm text-lg text-primary font-bold mb-2">',
        'after_title'   => '</h4>',
    ) );

    // Register Custom ANUKUL Widgets
    register_widget( 'Anukul_Contact_Widget' );
    register_widget( 'Anukul_Social_Widget' );
    register_widget( 'Anukul_Consultation_CTA_Widget' );
}
add_action( 'widgets_init', 'anukul_widgets_init' );

/**
 * ANUKUL Contact Coordinates Widget
 */
class Anukul_Contact_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'anukul_contact_widget',
            __( 'ANUKUL: Contact & Sanctuary Coordinates', 'anukul' ),
            array( 'description' => __( 'Displays formatted clinic hours, phone numbers, email, and physical address.', 'anukul' ) )
        );
    }

    public function widget( $args, $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Sanctuary Hours & Concierge', 'anukul' );
        $phone           = get_theme_mod( 'anukul_phone', '+91 7624012501' );
        $phone_secondary = get_theme_mod( 'anukul_phone_secondary', '+91 63560 19951' );
        $hours           = get_theme_mod( 'anukul_hours', "Mon–Sat: 9:30 AM TO 6:30 PM" );
        $address         = get_theme_mod( 'anukul_address', 'Prime Vedic Enclave, Cultural Quarter' );

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
        }
        ?>
        <div class="font-body-sm text-body-sm text-[#F7F1E3]/90 space-y-2">
            <p class="leading-relaxed">
                <span class="text-[#B38A3E] font-medium block"><?php esc_html_e( 'Operating Hours:', 'anukul' ); ?></span>
                <?php echo esc_html( $hours ); ?>
            </p>
            <div class="space-y-1 pt-1 notranslate" translate="no">
                <div>
                    <span class="text-[#B38A3E] font-medium"><?php esc_html_e( 'WhatsApp / Bookings:', 'anukul' ); ?></span><br>
                    <a href="https://wa.me/917624012501" target="_blank" class="hover:text-[#B38A3E] transition-colors font-medium text-white"><?php echo esc_html( $phone ); ?></a>
                </div>
                <div>
                    <span class="text-[#B38A3E] font-medium"><?php esc_html_e( 'Helpline Desk:', 'anukul' ); ?></span><br>
                    <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9\+]/', '', $phone_secondary ) ); ?>" class="hover:text-[#B38A3E] transition-colors"><?php echo esc_html( $phone_secondary ); ?></a>
                </div>
            </div>
            <p class="pt-1">
                <span class="text-[#B38A3E] font-medium"><?php esc_html_e( 'Location:', 'anukul' ); ?></span> <?php echo esc_html( $address ); ?>
            </p>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Sanctuary Hours & Concierge', 'anukul' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'anukul' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p class="description"><?php esc_html_e( 'Phone numbers and operating hours are managed dynamically via Appearance → Customize → ANUKUL Sanctuary Customization.', 'anukul' ); ?></p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        return $instance;
    }
}

/**
 * ANUKUL Social Media Links Widget
 */
class Anukul_Social_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'anukul_social_widget',
            __( 'ANUKUL: Social Media Channels', 'anukul' ),
            array( 'description' => __( 'Displays Instagram, Facebook, and YouTube channels with consecrated styling.', 'anukul' ) )
        );
    }

    public function widget( $args, $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Connect With Sanctuary', 'anukul' );
        $insta = get_theme_mod( 'anukul_instagram_url', 'https://instagram.com' );
        $fb    = get_theme_mod( 'anukul_facebook_url', 'https://facebook.com' );
        $yt    = get_theme_mod( 'anukul_youtube_url', 'https://youtube.com' );

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
        }
        ?>
        <div class="flex items-center gap-3 pt-1">
            <?php if ( $insta ) : ?>
                <a href="<?php echo esc_url( $insta ); ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-[#1F4D3A] border border-[#B38A3E]/40 flex items-center justify-center text-[#E8D8BC] hover:text-white hover:border-[#B38A3E] transition-colors" title="Instagram">
                    <i class="bi bi-instagram text-sm"></i>
                </a>
            <?php endif; ?>
            <?php if ( $fb ) : ?>
                <a href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-[#1F4D3A] border border-[#B38A3E]/40 flex items-center justify-center text-[#E8D8BC] hover:text-white hover:border-[#B38A3E] transition-colors" title="Facebook">
                    <i class="bi bi-facebook text-sm"></i>
                </a>
            <?php endif; ?>
            <?php if ( $yt ) : ?>
                <a href="<?php echo esc_url( $yt ); ?>" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-[#1F4D3A] border border-[#B38A3E]/40 flex items-center justify-center text-[#E8D8BC] hover:text-white hover:border-[#B38A3E] transition-colors" title="YouTube">
                    <i class="bi bi-youtube text-sm"></i>
                </a>
            <?php endif; ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Connect With Sanctuary', 'anukul' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'anukul' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p class="description"><?php esc_html_e( 'Social URLs are configured via Appearance → Customize → Footer Controls.', 'anukul' ); ?></p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        return $instance;
    }
}

/**
 * ANUKUL Consultation CTA Banner Widget
 */
class Anukul_Consultation_CTA_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'anukul_consultation_cta_widget',
            __( 'ANUKUL: Booking Call to Action', 'anukul' ),
            array( 'description' => __( 'Displays a compact sanctuary consultation booking promotion box.', 'anukul' ) )
        );
    }

    public function widget( $args, $instance ) {
        $title    = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Sacred Consultations', 'anukul' );
        $desc     = ! empty( $instance['desc'] ) ? $instance['desc'] : __( 'Schedule an individual Vedic assessment of Prakriti and spatial Vastu.', 'anukul' );
        $btn_text = ! empty( $instance['btn_text'] ) ? $instance['btn_text'] : __( 'BOOK CONSULTATION', 'anukul' );
        $btn_url  = home_url( '/book-your-consultation/' );

        echo $args['before_widget'];
        ?>
        <div class="p-5 rounded-lg bg-[#023625] border border-[#B38A3E]/30 text-white space-y-3">
            <span class="font-label-sm text-[10px] uppercase tracking-widest text-[#B38A3E] font-bold block"><?php echo esc_html( $title ); ?></span>
            <p class="font-body-sm text-body-sm text-[#F7F1E3]/90 leading-relaxed"><?php echo esc_html( $desc ); ?></p>
            <a href="<?php echo esc_url( $btn_url ); ?>" class="inline-block w-full text-center bg-[#B38A3E] text-white hover:bg-[#C66A22] font-label-md text-xs uppercase tracking-wider py-2.5 px-4 rounded font-semibold transition-colors shadow-sm">
                <?php echo esc_html( $btn_text ); ?>
            </a>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title    = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Sacred Consultations', 'anukul' );
        $desc     = ! empty( $instance['desc'] ) ? $instance['desc'] : __( 'Schedule an individual Vedic assessment of Prakriti and spatial Vastu.', 'anukul' );
        $btn_text = ! empty( $instance['btn_text'] ) ? $instance['btn_text'] : __( 'BOOK CONSULTATION', 'anukul' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Eyebrow / Title:', 'anukul' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Description:', 'anukul' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>"><?php esc_html_e( 'Button Text:', 'anukul' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_text' ) ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title']    = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['desc']     = ( ! empty( $new_instance['desc'] ) ) ? sanitize_textarea_field( $new_instance['desc'] ) : '';
        $instance['btn_text'] = ( ! empty( $new_instance['btn_text'] ) ) ? sanitize_text_field( $new_instance['btn_text'] ) : '';
        return $instance;
    }
}

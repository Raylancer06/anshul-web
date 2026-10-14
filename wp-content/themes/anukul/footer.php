<?php
/**
 * Footer template for ANUKUL theme
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$phone   = get_theme_mod( 'anukul_phone', '+91 (011) 2614-1008' );
$email   = get_theme_mod( 'anukul_email', 'sanctuary@anukul-harmony.com' );
$hours   = get_theme_mod( 'anukul_hours', "Monday &mdash; Saturday\n08:00 AM &ndash; 07:00 PM IST" );
$address = get_theme_mod( 'anukul_address', 'Prime Vedic Enclave, Cultural Quarter' );
?>
</main><!-- /main -->

<!-- Universal Sanctuary Footer -->
<footer class="w-full bg-[#1F4D3A] text-[#F7F1E3] border-t border-[#B38A3E]/30">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-margin pt-space-xl pb-space-lg">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-gutter-lg pb-space-xl border-b border-[#B38A3E]/20">
            
            <!-- Col 1: Identity & Ethos (5 Cols) -->
            <div class="md:col-span-5 flex flex-col justify-start space-y-space-sm">
                <div class="flex flex-col items-start">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block select-none mb-2">
                        <img src="<?php echo esc_url( anukul_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-16 w-auto object-contain bg-[#F7F1E3] p-1.5 rounded shadow-sm">
                    </a>
                </div>
                <p class="font-body-md text-body-md text-surface-container-high/90 max-w-md pt-2">
                    <?php bloginfo( 'name' ); ?> &mdash; Health &bull; Space &bull; Lifestyle &bull; Harmony
                </p>
                <p class="font-body-sm text-body-sm text-outline-variant max-w-sm pt-1">
                    Anchored in classical Vedic sciences, spatial alignment, and holistic constitutional balance for serene modern living.
                </p>
            </div>

            <!-- Col 2: Explorations Navigation (4 Cols) -->
            <div class="md:col-span-4 flex flex-col justify-start space-y-3">
                <h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold">
                    <?php esc_html_e( 'Explorations', 'anukul' ); ?>
                </h3>
                <nav class="grid grid-cols-2 gap-y-2 gap-x-4">
                    <?php anukul_render_nav_footer(); ?>
                </nav>
            </div>

            <!-- Col 3: Sanctuary Hours & Details (3 Cols) -->
            <div class="md:col-span-3 flex flex-col justify-start space-y-3">
                <h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold">
                    <?php esc_html_e( 'Sanctuary Hours', 'anukul' ); ?>
                </h3>
                <p class="font-body-sm text-body-sm text-surface-container-high/80">
                    <?php echo nl2br( wp_kses_post( $hours ) ); ?>
                </p>
                <p class="font-body-sm text-body-sm text-surface-container-high/80 pt-2">
                    <span class="text-[#B38A3E] font-medium"><?php esc_html_e( 'Location:', 'anukul' ); ?></span> <?php echo esc_html( $address ); ?>
                </p>
            </div>
        </div>

        <!-- Bottom Copyright & Legal Sub-bar -->
        <div class="pt-space-md flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="font-body-sm text-body-sm text-outline-variant text-center sm:text-left">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. Responsible Vedic Clinical Practice.
            </p>
            <div class="flex items-center gap-6 font-body-sm text-body-sm text-surface-container-high/70">
                <a class="hover:text-[#B38A3E] transition-colors" href="<?php echo esc_url( home_url( '/contact/#privacy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'anukul' ); ?></a>
                <span class="text-[#B38A3E]/40">&bull;</span>
                <a class="hover:text-[#B38A3E] transition-colors" href="<?php echo esc_url( home_url( '/contact/#terms' ) ); ?>"><?php esc_html_e( 'Terms', 'anukul' ); ?></a>
                <span class="text-[#B38A3E]/40">&bull;</span>
                <a class="hover:text-[#B38A3E] transition-colors" href="<?php echo esc_url( home_url( '/contact/#disclaimer' ) ); ?>"><?php esc_html_e( 'Disclaimer', 'anukul' ); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

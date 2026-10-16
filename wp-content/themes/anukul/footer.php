<?php
/**
 * Footer template for ANUKUL theme
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$phone           = get_theme_mod( 'anukul_phone', '+91 7624012501' );
$phone_secondary = get_theme_mod( 'anukul_phone_secondary', '+91 63560 19951' );
$email           = get_theme_mod( 'anukul_email', 'sanctuary@anukul-harmony.com' );
$hours           = get_theme_mod( 'anukul_hours', "Monday &mdash; Saturday\n9:30 AM TO 6:30 PM" );
$address         = get_theme_mod( 'anukul_address', 'Prime Vedic Enclave, Cultural Quarter' );
?>
</main><!-- /main -->

<!-- Universal Sanctuary Footer -->
<footer class="w-full bg-[#1F4D3A] text-[#F7F1E3] border-t border-[#B38A3E]/30 relative z-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-margin pt-12 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-10 pb-10 border-b border-[#B38A3E]/20">
            
            <!-- Col 1: Identity & Ethos (5 Cols) -->
            <div class="md:col-span-5 flex flex-col justify-start space-y-3">
                <div class="flex flex-col items-start">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block select-none mb-2">
                        <img src="<?php echo esc_url( anukul_get_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-14 sm:h-16 w-auto object-contain brightness-105">
                    </a>
                </div>
                <p class="font-body-md text-body-md text-[#F7F1E3]/95 max-w-md pt-1 font-medium">
                    <?php bloginfo( 'name' ); ?> &mdash; Health &bull; Space &bull; Lifestyle &bull; Harmony
                </p>
                <p class="font-body-sm text-body-sm text-[#E8D8BC]/85 max-w-sm pt-1 leading-relaxed">
                    Anchored in classical Vedic sciences, spatial alignment, and holistic constitutional balance for serene modern living.
                </p>
            </div>

            <!-- Col 2: Explorations Navigation (4 Cols) -->
            <div class="md:col-span-4 flex flex-col justify-start space-y-3">
                <h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold">
                    <?php esc_html_e( 'Explorations', 'anukul' ); ?>
                </h3>
                <nav class="grid grid-cols-2 gap-y-2.5 gap-x-4">
                    <?php anukul_render_nav_footer(); ?>
                </nav>
            </div>

            <!-- Col 3: Sanctuary Hours & Details (3 Cols) -->
            <div class="md:col-span-3 flex flex-col justify-start space-y-2.5">
                <h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold">
                    <?php esc_html_e( 'Sanctuary Hours & Concierge', 'anukul' ); ?>
                </h3>
                <p class="font-body-sm text-body-sm text-[#F7F1E3]/90 leading-relaxed">
                    <span class="text-[#B38A3E] font-medium block"><?php esc_html_e( 'Operating Hours:', 'anukul' ); ?></span>
                    <?php echo nl2br( wp_kses_post( $hours ) ); ?>
                </p>
                <div class="font-body-sm text-body-sm text-[#F7F1E3]/90 space-y-1 pt-1 notranslate" translate="no">
                    <div>
                        <span class="text-[#B38A3E] font-medium"><?php esc_html_e( 'WhatsApp / Bookings:', 'anukul' ); ?></span><br>
                        <a href="https://wa.me/917624012501" target="_blank" class="hover:text-[#B38A3E] transition-colors font-medium text-white"><?php echo esc_html( $phone ); ?></a>
                    </div>
                    <div>
                        <span class="text-[#B38A3E] font-medium"><?php esc_html_e( 'Helpline Desk:', 'anukul' ); ?></span><br>
                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9\+]/', '', $phone_secondary ) ); ?>" class="hover:text-[#B38A3E] transition-colors"><?php echo esc_html( $phone_secondary ); ?></a>
                    </div>
                </div>
                <p class="font-body-sm text-body-sm text-[#F7F1E3]/85 pt-1">
                    <span class="text-[#B38A3E] font-medium"><?php esc_html_e( 'Location:', 'anukul' ); ?></span> <?php echo esc_html( $address ); ?>
                </p>
            </div>
        </div>

        <!-- Bottom Copyright & Legal Sub-bar -->
        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="font-body-sm text-body-sm text-[#E8D8BC]/70 text-center sm:text-left">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. Responsible Vedic Clinical Practice.
            </p>
            <div class="flex items-center gap-6 font-body-sm text-body-sm text-[#E8D8BC]/75">
                <a class="hover:text-[#B38A3E] transition-colors" href="<?php echo esc_url( home_url( '/contact/#privacy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'anukul' ); ?></a>
                <span class="text-[#B38A3E]/40">&bull;</span>
                <a class="hover:text-[#B38A3E] transition-colors" href="<?php echo esc_url( home_url( '/contact/#terms' ) ); ?>"><?php esc_html_e( 'Terms', 'anukul' ); ?></a>
                <span class="text-[#B38A3E]/40">&bull;</span>
                <a class="hover:text-[#B38A3E] transition-colors" href="<?php echo esc_url( home_url( '/contact/#disclaimer' ) ); ?>"><?php esc_html_e( 'Disclaimer', 'anukul' ); ?></a>
            </div>
        </div>
    </div>
</footer>

<!-- Floating WhatsApp Chat Widget -->
<div id="anukul-whatsapp-widget" class="fixed bottom-6 right-6 z-50 flex items-center notranslate" translate="no">
    <a href="https://wa.me/917624012501?text=<?php echo rawurlencode( 'Namaste ANUKUL Sanctuary, I would like to inquire about appointments and consultations.' ); ?>" target="_blank" rel="noopener noreferrer" class="group flex items-center gap-2.5 bg-[#25D366] hover:bg-[#20ba59] text-white px-4 py-3 rounded-full shadow-[0_4px_20px_rgba(37,211,102,0.4)] transition-all duration-300 hover:scale-105 active:scale-95" title="<?php esc_attr_e( 'Chat with ANUKUL on WhatsApp (+91 7624012501)', 'anukul' ); ?>">
        <svg class="w-6 h-6 fill-current shrink-0" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span class="font-label-md text-xs uppercase tracking-wider font-bold pr-1">WhatsApp Chat</span>
    </a>
</div>

<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="min-h-[60vh] flex flex-col items-center justify-center text-center px-6 py-20">
    <div class="w-20 h-20 rounded-full bg-surface-container flex items-center justify-center text-secondary mb-6 shadow-sm">
        <span class="material-symbols-outlined text-[42px]">explore_off</span>
    </div>

    <span class="font-label-sm text-label-sm text-secondary tracking-[0.25em] uppercase font-semibold block mb-2">
        <?php esc_html_e( 'Pathway Unaligned · 404', 'anukul' ); ?>
    </span>

    <h1 class="font-display text-4xl sm:text-6xl text-primary font-normal mb-4">
        <?php esc_html_e( 'The Space You Seek Is Elsewhere', 'anukul' ); ?>
    </h1>

    <div class="w-16 h-[2px] bg-secondary mx-auto mb-6"></div>

    <p class="font-body-md text-lg text-on-surface-variant max-w-lg mb-8 leading-relaxed font-light">
        <?php esc_html_e( 'Like an uncalibrated cardinal vector, this URL does not lead to an active chamber in our sanctuary archive.', 'anukul' ); ?>
    </p>

    <div class="flex flex-wrap items-center justify-center gap-4">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center justify-center bg-primary text-on-primary font-label-md text-label-md px-8 py-3.5 rounded-lg tracking-wider uppercase hover:bg-secondary transition-colors shadow-sm font-semibold">
            <?php esc_html_e( 'Return to Sanctuary Home', 'anukul' ); ?>
        </a>
        <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="inline-flex items-center justify-center border border-primary text-primary font-label-md text-label-md px-8 py-3.5 rounded-lg tracking-wider uppercase hover:bg-primary/5 transition-colors font-semibold">
            <?php esc_html_e( 'Explore Services', 'anukul' ); ?>
        </a>
    </div>
</div>

<?php
get_footer();

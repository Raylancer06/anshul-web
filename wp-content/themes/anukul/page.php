<?php
/**
 * The template for displaying all individual pages
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="max-w-[1000px] mx-auto px-6 lg:px-margin py-16">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'space-y-8' ); ?>>
            <header class="text-center pb-8 border-b border-[#B38A3E]/30">
                <span class="font-label-sm text-label-sm text-secondary tracking-[0.25em] uppercase block mb-2">
                    <?php esc_html_e( 'Sanctuary Document', 'anukul' ); ?>
                </span>
                <h1 class="font-display text-4xl sm:text-5xl text-primary font-normal">
                    <?php the_title(); ?>
                </h1>
                <div class="w-16 h-[2px] bg-secondary mx-auto mt-4"></div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="w-full aspect-[21/9] overflow-hidden rounded-xl shadow-sm my-8">
                    <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                </div>
            <?php endif; ?>

            <div class="font-body-md text-body-md text-on-surface leading-relaxed space-y-6 prose max-w-none">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();

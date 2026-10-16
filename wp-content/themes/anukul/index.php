<?php
/**
 * Main Template File (Fallback)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="max-w-[1440px] mx-auto px-6 lg:px-margin py-16">
    <div class="mb-12 text-center max-w-2xl mx-auto">
        <span class="font-label-sm text-label-sm text-secondary tracking-[0.25em] uppercase block mb-2">
            <?php esc_html_e( 'Sacred Repository', 'anukul' ); ?>
        </span>
        <h1 class="font-display text-4xl sm:text-5xl text-primary font-normal">
            <?php single_post_title(); ?>
        </h1>
        <div class="w-16 h-[2px] bg-secondary mx-auto mt-4 mb-4"></div>
    </div>

    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'flex flex-col bg-surface-container rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="relative w-full aspect-[16/10] overflow-hidden bg-surface-dim">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover transition-transform duration-500 hover:scale-105' ) ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="p-6 flex flex-col flex-grow justify-between gap-4">
                        <div class="flex flex-col gap-2">
                            <span class="font-label-sm text-label-sm text-secondary uppercase font-semibold">
                                <?php echo esc_html( get_the_date() ); ?>
                            </span>
                            <h2 class="font-headline-sm text-xl text-primary hover:text-tertiary transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="font-body-md text-sm text-on-surface-variant line-clamp-3">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-surface-container-high flex items-center justify-between">
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-1 font-label-md text-xs uppercase text-primary font-semibold hover:text-secondary transition-colors">
                                <span><?php esc_html_e( 'Read Exploration', 'anukul' ); ?></span>
                                <span class="material-symbols-outlined notranslate text-[16px]" translate="no">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="mt-12 flex justify-center">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '<span class="material-symbols-outlined notranslate text-sm" translate="no">chevron_left</span>',
                'next_text' => '<span class="material-symbols-outlined notranslate text-sm" translate="no">chevron_right</span>',
            ) );
            ?>
        </div>
    <?php else : ?>
        <div class="text-center py-16 bg-surface-container rounded-xl p-8">
            <h2 class="font-headline-md text-2xl text-primary mb-2"><?php esc_html_e( 'No Records Discovered', 'anukul' ); ?></h2>
            <p class="font-body-md text-on-surface-variant max-w-md mx-auto"><?php esc_html_e( 'We could not find any publications matching your current query.', 'anukul' ); ?></p>
        </div>
    <?php endif; ?>
</div>

<?php
get_footer();

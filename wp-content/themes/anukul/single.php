<?php
/**
 * The template for displaying all single posts
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="max-w-[960px] mx-auto px-6 lg:px-margin py-16">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'space-y-8' ); ?>>
            <!-- Post Header -->
            <header class="text-center pb-8 border-b border-[#B38A3E]/30 space-y-4">
                <div class="flex items-center justify-center gap-3">
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                    <span class="font-label-sm text-label-sm text-secondary tracking-[0.2em] uppercase font-semibold">
                        <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo esc_html( $categories[0]->name );
                        } else {
                            esc_html_e( 'Vedic Exploration', 'anukul' );
                        }
                        ?>
                    </span>
                    <span class="w-2 h-2 rounded-full bg-secondary"></span>
                </div>

                <h1 class="font-display text-3xl sm:text-5xl text-primary font-normal max-w-3xl mx-auto leading-tight">
                    <?php the_title(); ?>
                </h1>

                <div class="flex items-center justify-center gap-4 text-xs font-label-md text-on-surface-variant uppercase tracking-wider">
                    <span><?php echo esc_html( get_the_date() ); ?></span>
                    <span>•</span>
                    <span><?php printf( esc_html__( 'By %s', 'anukul' ), esc_html( get_the_author() ) ); ?></span>
                </div>
            </header>

            <!-- Featured Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="w-full aspect-[16/9] overflow-hidden rounded-xl shadow-md my-8">
                    <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                </div>
            <?php endif; ?>

            <!-- Article Body -->
            <div class="font-body-md text-lg text-on-surface leading-[1.8] space-y-6">
                <?php the_content(); ?>
            </div>

            <!-- Post Navigation -->
            <div class="pt-8 mt-12 border-t border-[#B38A3E]/30 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <?php previous_post_link( '<div class="text-xs uppercase text-secondary font-label-md">Previous</div>%link' ); ?>
                </div>
                <div class="text-right">
                    <?php next_post_link( '<div class="text-xs uppercase text-secondary font-label-md">Next</div>%link' ); ?>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();

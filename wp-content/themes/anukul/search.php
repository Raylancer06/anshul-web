<?php
/**
 * The template for displaying search results pages
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$search_query = get_search_query();
?>

<!-- SECTION 1: SEARCH HEADER & QUERY BOX -->
<section class="w-full bg-surface-container py-space-xl px-margin md:px-margin-md lg:px-margin-lg border-b border-surface-container-highest">
    <div class="max-w-4xl mx-auto flex flex-col items-center text-center">
        <span class="font-label-sm text-label-sm uppercase tracking-[0.25em] text-secondary font-bold mb-space-xs">
            <?php esc_html_e( 'Sacred Search & Discoveries', 'anukul' ); ?>
        </span>
        <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary font-normal mb-space-md">
            <?php esc_html_e( 'Search Wisdom & Remedies', 'anukul' ); ?>
        </h1>
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="w-full max-w-2xl relative flex items-center shadow-sm rounded-xl overflow-hidden bg-surface">
            <span class="material-symbols-outlined notranslate text-outline pl-space-md text-[22px]" translate="no">search</span>
            <input type="search" name="s" value="<?php echo esc_attr( $search_query ); ?>" placeholder="<?php esc_attr_e( 'Search remedies, herbs, Vastu tools, or articles...', 'anukul' ); ?>" class="w-full py-4 pl-space-sm pr-space-xl bg-transparent font-body-md text-on-surface focus:outline-none border-none">
            <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 px-5 py-2.5 bg-primary text-on-primary rounded-lg font-label-md text-label-md uppercase tracking-wider hover:bg-secondary transition-colors">
                <?php esc_html_e( 'Search', 'anukul' ); ?>
            </button>
        </form>
    </div>
</section>

<!-- SECTION 2: RESULTS SECTION -->
<section class="w-full bg-surface-container-low py-space-md shadow-sm">
    <div class="max-w-7xl mx-auto px-margin md:px-margin-md lg:px-margin-lg flex flex-col md:flex-row md:items-center justify-between gap-space-md">
        <div class="flex items-baseline gap-space-sm flex-wrap">
            <h2 class="font-headline-sm text-headline-sm text-primary">
                <?php printf( esc_html__( 'Search results for “%s”', 'anukul' ), '<span class="italic text-secondary font-display">' . esc_html( $search_query ) . '</span>' ); ?>
            </h2>
            <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant px-2.5 py-1 bg-surface-container rounded-full">
                <?php printf( esc_html__( '%d matches found', 'anukul' ), (int) $wp_query->found_posts ); ?>
            </span>
        </div>
    </div>
</section>

<section class="w-full max-w-7xl mx-auto px-margin md:px-margin-md lg:px-margin-lg py-16">
    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'flex flex-col bg-surface rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 border border-surface-container-high' ); ?>>
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
                                <?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?>
                            </span>
                            <h3 class="font-headline-sm text-xl text-primary hover:text-secondary transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="font-body-md text-sm text-on-surface-variant line-clamp-3">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-surface-container-high flex items-center justify-between">
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-1 font-label-md text-xs uppercase text-primary font-semibold hover:text-secondary transition-colors">
                                <span><?php esc_html_e( 'View Details', 'anukul' ); ?></span>
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
        <div class="text-center py-20 bg-surface-container rounded-xl p-8 max-w-xl mx-auto">
            <span class="material-symbols-outlined notranslate text-secondary text-[48px] mb-3" translate="no">search_off</span>
            <h2 class="font-headline-md text-2xl text-primary mb-2"><?php esc_html_e( 'No Direct Results Found', 'anukul' ); ?></h2>
            <p class="font-body-md text-on-surface-variant mb-6"><?php esc_html_e( 'Please check your spelling or explore our classical consultations and pharmacy catalogue.', 'anukul' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center justify-center bg-primary text-on-primary font-label-md text-label-md px-6 py-3 rounded-lg tracking-wider uppercase">
                <?php esc_html_e( 'Return to Sanctuary Home', 'anukul' ); ?>
            </a>
        </div>
    <?php endif; ?>
</section>

<?php
get_footer();

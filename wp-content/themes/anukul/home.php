<?php
/**
 * Blog Listing Template (The ANUKUL Chronicle)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<!-- SECTION 1: EDITORIAL HEADER -->
<section class="w-full bg-surface border-b border-surface-container-highest pt-space-xl pb-space-lg px-margin md:px-margin-md lg:px-margin-lg">
    <div class="max-w-[1440px] mx-auto flex flex-col gap-space-md">
        <div class="flex items-center gap-space-xs font-label-sm text-label-sm uppercase tracking-widest text-secondary font-semibold">
            <span class="w-2 h-2 rounded-full bg-secondary"></span>
            <span><?php esc_html_e( 'Academic Papers, Clinical Essays & Sanctuary Dispatches', 'anukul' ); ?></span>
        </div>
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md">
            <h1 class="font-display text-4xl sm:text-6xl text-primary font-normal leading-tight">
                <?php esc_html_e( 'The ANUKUL Chronicle', 'anukul' ); ?>
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-xl font-light leading-relaxed">
                <?php esc_html_e( 'Rigorous classical Ayurvedic treatises, Vastu spatial geomancy case files, botanical monographs, and living philosophies published by our clinical practitioners.', 'anukul' ); ?>
            </p>
        </div>

        <!-- Category Pills Filter Bar -->
        <div class="flex flex-wrap items-center justify-between gap-space-sm pt-4 border-t border-surface-container-highest">
            <div class="flex flex-wrap items-center gap-space-xs">
                <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>" class="category-pill <?php echo ! is_category() ? 'bg-primary text-surface' : 'bg-surface-container hover:bg-surface-container-highest text-on-surface-variant'; ?> font-label-md text-label-md uppercase tracking-wider px-space-md py-2 rounded-lg transition-all duration-150">
                    <?php esc_html_e( 'All Articles', 'anukul' ); ?>
                </a>
                <?php
                $categories = get_categories( array( 'hide_empty' => false ) );
                foreach ( $categories as $cat ) {
                    $is_current = is_category( $cat->term_id );
                    $pill_class = $is_current ? 'bg-primary text-surface' : 'bg-surface-container hover:bg-surface-container-highest text-on-surface-variant';
                    echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="category-pill ' . esc_attr( $pill_class ) . ' font-label-md text-label-md uppercase tracking-wider px-space-md py-2 rounded-lg transition-all duration-150">' . esc_html( $cat->name ) . '</a>';
                }
                ?>
            </div>
            <div class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant py-1">
                <span><?php printf( esc_html__( '%d Publications Available', 'anukul' ), (int) $wp_query->found_posts ); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 2: ARTICLES GRID -->
<section class="w-full bg-surface py-space-xl pb-space-2xl px-margin md:px-margin-md lg:px-margin-lg">
    <div class="max-w-[1440px] mx-auto">
        <?php if ( have_posts() ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter-lg" id="articlesGrid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'article-card group flex flex-col bg-surface-container rounded-xl overflow-hidden shadow-sm transition-all duration-300 hover:-translate-y-1' ); ?>>
                        <div class="relative w-full aspect-[16/10] overflow-hidden bg-surface-dim">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="w-full h-full block">
                                    <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105' ) ); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" class="w-full h-full flex items-center justify-center bg-surface-container-high text-primary/30">
                                    <span class="material-symbols-outlined text-[48px]">menu_book</span>
                                </a>
                            <?php endif; ?>

                            <?php
                            $cats = get_the_category();
                            if ( ! empty( $cats ) ) : ?>
                                <span class="absolute top-3 left-3 bg-primary text-surface font-label-sm text-label-sm uppercase px-space-sm py-1 rounded-sm tracking-wider">
                                    <?php echo esc_html( $cats[0]->name ); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="p-space-lg flex flex-col flex-grow justify-between gap-space-md">
                            <div class="flex flex-col gap-space-xs">
                                <span class="font-label-sm text-label-sm text-secondary uppercase font-semibold">
                                    <?php echo esc_html( get_the_date() ); ?>
                                </span>
                                <h2 class="font-headline-sm text-headline-sm text-primary group-hover:text-tertiary transition-colors duration-200">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="font-body-md text-body-md text-on-surface-variant line-clamp-3">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>

                            <div class="pt-space-sm border-t border-surface-container-high flex items-center justify-between">
                                <span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">
                                    <?php printf( esc_html__( 'By %s', 'anukul' ), esc_html( get_the_author() ) ); ?>
                                </span>
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-1 font-label-md text-xs uppercase text-primary font-semibold hover:text-secondary transition-colors">
                                    <span><?php esc_html_e( 'Read Paper', 'anukul' ); ?></span>
                                    <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="mt-16 flex justify-center">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '<span class="material-symbols-outlined text-sm">chevron_left</span>',
                    'next_text' => '<span class="material-symbols-outlined text-sm">chevron_right</span>',
                ) );
                ?>
            </div>
        <?php else : ?>
            <div class="text-center py-20 bg-surface-container rounded-xl p-8 max-w-xl mx-auto">
                <span class="material-symbols-outlined text-secondary text-[40px] mb-2">auto_stories</span>
                <h2 class="font-headline-md text-2xl text-primary mb-2"><?php esc_html_e( 'No Chronicle Publications Found', 'anukul' ); ?></h2>
                <p class="font-body-md text-on-surface-variant"><?php esc_html_e( 'Check back soon as our clinical directors publish new Ayurvedic & Vastu research.', 'anukul' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();

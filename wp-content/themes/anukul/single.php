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

<!-- Breadcrumbs Bar -->
<section class="w-full bg-[#F7F1E3]/80 border-b border-[#E8D8BC] py-3.5">
  <div class="max-w-[1440px] mx-auto px-6 lg:px-12 flex items-center justify-between text-on-surface-variant font-body-sm text-sm">
    <nav aria-label="Breadcrumb" class="flex items-center gap-2 tracking-wider">
      <a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <span class="opacity-40">/</span>
      <a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">The Journal</a>
      <span class="opacity-40">/</span>
      <span class="text-primary font-semibold truncate max-w-xs sm:max-w-md"><?php the_title(); ?></span>
    </nav>
    <div class="hidden sm:flex items-center gap-2 font-label-sm text-xs uppercase tracking-[0.2em] text-secondary font-bold">
      <span class="inline-block w-2 h-2 rounded-full bg-secondary"></span>
      The ANUKUL Journal &bull; Classical Folio
    </div>
  </div>
</section>

<div class="w-full bg-surface-bright py-12 lg:py-16">
  <div class="max-w-[880px] mx-auto px-6 lg:px-8">
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'space-y-10' ); ?>>
        <!-- Article Header -->
        <header class="text-center pb-8 border-b border-[#E8D8BC] space-y-4">
          <div class="flex items-center justify-center gap-3">
            <span class="w-2 h-2 rounded-full bg-secondary"></span>
            <span class="font-label-sm text-xs uppercase tracking-[0.2em] text-secondary font-bold">
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

          <h1 class="font-headline-lg text-3xl sm:text-5xl text-primary font-normal leading-tight">
            <?php the_title(); ?>
          </h1>

          <div class="flex flex-wrap items-center justify-center gap-4 text-xs font-label-md text-on-surface-variant uppercase tracking-wider pt-2">
            <span><?php echo esc_html( get_the_date() ); ?></span>
            <span>&bull;</span>
            <span><?php printf( esc_html__( 'By %s', 'anukul' ), esc_html( get_the_author() ) ); ?></span>
            <span>&bull;</span>
            <span class="text-secondary font-semibold">Curated Dispatches</span>
          </div>
        </header>

        <!-- Featured Image (if set) -->
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="w-full aspect-[16/9] overflow-hidden rounded-xl shadow-md bg-surface-dim">
            <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
          </div>
        <?php endif; ?>

        <!-- Article Rich Content -->
        <div class="prose prose-lg max-w-none font-body-md text-base sm:text-lg text-on-surface leading-[1.8] space-y-6">
          <?php the_content(); ?>
        </div>

        <!-- Editorial Author Plaque -->
        <div class="bg-surface-container-low p-6 sm:p-8 rounded-xl border border-[#E8D8BC]/60 flex flex-col sm:flex-row items-center gap-5 mt-12">
          <div class="w-16 h-16 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-headline-sm text-2xl shrink-0 shadow-inner">
            अ
          </div>
          <div class="text-center sm:text-left flex-1">
            <span class="font-label-sm text-xs uppercase tracking-wider text-secondary font-bold">ANUKUL Directorate of Research</span>
            <h3 class="font-headline-sm text-xl text-primary mt-0.5"><?php the_author(); ?></h3>
            <p class="font-body-sm text-xs text-on-surface-variant mt-1 leading-relaxed">
              Contributing scholar at ANUKUL Ayur Vastu Harmony Clinic, dedicated to preserving and articulating classical Vedic diagnostic treatises, spatial geometries, and therapeutic formulations.
            </p>
          </div>
        </div>

        <!-- Post Navigation & Return Button -->
        <div class="pt-8 border-t border-[#E8D8BC] flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-label-md uppercase tracking-wider">
          <div>
            <?php previous_post_link( '<div class="text-outline mb-1 text-[11px]">Previous Article</div><div class="text-primary font-bold hover:text-secondary transition-colors">%link</div>' ); ?>
          </div>
          <div>
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-surface-container-high text-primary hover:bg-primary hover:text-on-primary transition-colors font-semibold">
              <span class="material-symbols-outlined text-[16px]">menu_book</span> Back to Journal
            </a>
          </div>
          <div class="text-right">
            <?php next_post_link( '<div class="text-outline mb-1 text-[11px]">Next Article</div><div class="text-primary font-bold hover:text-secondary transition-colors">%link</div>' ); ?>
          </div>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</div>

<?php
get_footer();

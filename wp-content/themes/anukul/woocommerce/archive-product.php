<?php
/**
 * The Template for displaying product archives, including the main shop page
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header( 'shop' );

// Dynamic categories & counts from WooCommerce
$dispensary_cat_defs = array(
    'ayurveda' => 'Classical Ayurveda',
    'wellness' => 'Dinacharya Tools',
    'vastu'    => 'Vastu Yantras',
    'tea'      => 'Tisanes & Teas',
);

$cat_counts = array();
$total_products_count = 0;
foreach ( $dispensary_cat_defs as $c_slug => $c_label ) {
    $c_term = get_term_by( 'slug', $c_slug, 'product_cat' );
    $count = ( $c_term && ! is_wp_error( $c_term ) ) ? (int) $c_term->count : 0;
    $cat_counts[ $c_slug ] = $count;
    $total_products_count += $count;
}
?>

<!-- HERO SECTION: VEDIC APOTHECARY & DISPENSARY -->
    <section class="w-full bg-gradient-to-b from-[#F7F1E3] to-surface py-12 lg:py-16 border-b border-[#E8D8BC]">
      <div class="max-w-[1440px] mx-auto px-6 lg:px-margin">
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
          <div class="max-w-2xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-full border border-surface-variant text-secondary text-xs uppercase tracking-widest font-semibold mb-4">
              <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
              THE ANUKUL VEDIC DISPENSARY &amp; STORE
            </div>
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl text-primary tracking-tight leading-[1.1] mb-4">
              Sacred Remedies &amp; <span class="italic font-editorial-quote text-secondary font-normal">Vedic Living</span> Artifacts.
            </h1>
            <p class="font-body text-base lg:text-lg text-on-surface-variant leading-relaxed mb-6">
              Handcrafted Kansa metallurgy, certified small-batch Rasayanas, cold-pressed classical Tailas, and energized Vastu spatial corrections curated under authentic Vaidya oversight.
            </p>
            <div class="flex flex-wrap items-center gap-3">
              <a href="#product-catalog" class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white text-xs font-semibold uppercase tracking-wider rounded-lg shadow-sm hover:bg-secondary transition-colors">
                <span>Browse Dispensary Catalogue</span>
                <span class="material-symbols-outlined notranslate text-[18px]" translate="no">south</span>
              </a>
              <a href="<?php echo esc_url( home_url( "/book-your-consultation/" ) ); ?>" class="inline-flex items-center gap-2 px-5 py-3 bg-white border border-[#E8D8BC] text-primary text-xs font-semibold uppercase tracking-wider rounded-lg hover:bg-surface-container transition-colors">
                <span>Prescription / Prakriti Query</span>
                <span class="material-symbols-outlined notranslate text-[18px]" translate="no">medical_services</span>
              </a>
            </div>
          </div>

          <!-- Feature Trust Badges Ribbon -->
          <div class="grid grid-cols-2 gap-3 w-full lg:w-auto shrink-0 max-w-md">
            <div class="p-4 bg-white/80 rounded-xl border border-[#E8D8BC] shadow-xs flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined notranslate text-[22px]" translate="no">verified</span>
              </div>
              <div>
                <h4 class="font-display text-sm font-semibold text-primary">Classical Tenets</h4>
                <p class="text-xs text-on-surface-variant">Sharangadhara Standards</p>
              </div>
            </div>
            <div class="p-4 bg-white/80 rounded-xl border border-[#E8D8BC] shadow-xs flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined notranslate text-[22px]" translate="no">workspace_premium</span>
              </div>
              <div>
                <h4 class="font-display text-sm font-semibold text-primary">78:22 Bell Metal</h4>
                <p class="text-xs text-on-surface-variant">Lead-free Certified Kansa</p>
              </div>
            </div>
            <div class="p-4 bg-white/80 rounded-xl border border-[#E8D8BC] shadow-xs flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined notranslate text-[22px]" translate="no">auto_awesome</span>
              </div>
              <div>
                <h4 class="font-display text-sm font-semibold text-primary">Muhurta Energized</h4>
                <p class="text-xs text-on-surface-variant">Consecrated Spatial Yantras</p>
              </div>
            </div>
            <div class="p-4 bg-white/80 rounded-xl border border-[#E8D8BC] shadow-xs flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined notranslate text-[22px]" translate="no">local_shipping</span>
              </div>
              <div>
                <h4 class="font-display text-sm font-semibold text-primary">Secure Delivery</h4>
                <p class="text-xs text-on-surface-variant">Eco-Cushioned All India</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- QUICK CATEGORY PILLS BAR -->
    <section class="w-full bg-[#F6ECE4] border-b border-[#E8D8BC] sticky top-20 z-30 shadow-xs">
      <div class="max-w-[1440px] mx-auto px-6 lg:px-margin py-3 flex items-center justify-between gap-4 overflow-x-auto no-scrollbar">
        <div class="flex items-center gap-2 shrink-0" id="quick-category-pills">
          <button type="button" data-category="all" class="category-pill active-pill px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-primary text-white border border-primary shadow-xs">
            All Products (<span id="all-count-pill"><?php echo esc_html( $total_products_count ); ?></span>)
          </button>
          <?php foreach ( $dispensary_cat_defs as $c_slug => $c_label ) : ?>
          <button type="button" data-category="<?php echo esc_attr( $c_slug ); ?>" class="category-pill px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-white text-on-surface-variant hover:text-primary hover:bg-white/90 border border-surface-variant">
            <?php echo esc_html( $c_label ); ?> (<?php echo esc_html( $cat_counts[ $c_slug ] ); ?>)
          </button>
          <?php endforeach; ?>
        </div>

        <!-- Mobile Filter Button (visible on small/medium screens) -->
        <button id="mobile-filter-trigger" type="button" class="lg:hidden shrink-0 inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary text-white rounded-lg text-xs font-semibold uppercase tracking-wider shadow-xs">
          <span class="material-symbols-outlined notranslate text-[16px]" translate="no">tune</span>
          <span>Filters</span>
          <span id="mobile-filter-badge" class="hidden w-4 h-4 bg-secondary text-white text-[10px] rounded-full flex items-center justify-center">0</span>
        </button>
      </div>
    </section>

    <!-- MAIN SHOP INTERACTION GRID -->
    <section class="w-full bg-surface py-8 lg:py-12" id="product-catalog">
      <div class="max-w-[1440px] mx-auto px-6 lg:px-margin">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
          
          <!-- LEFT COLUMN: STICKY FILTER SIDEBAR (Desktop) -->
          <aside class="hidden lg:block lg:col-span-3 sticky top-36 space-y-6">
            <div class="bg-white rounded-xl border border-surface-variant p-6 shadow-sm space-y-6">
              
              <!-- Filter Header & Reset -->
              <div class="flex items-center justify-between border-b border-surface-variant/80 pb-4">
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined notranslate text-secondary text-[20px]" translate="no">filter_alt</span>
                  <h3 class="font-display text-lg font-bold text-primary tracking-wide uppercase">Refine Remedies</h3>
                </div>
                <button type="button" id="reset-filters-btn" class="text-xs text-secondary hover:text-primary underline font-semibold transition-colors">
                  Reset All
                </button>
              </div>

              <!-- Keyword Search Box -->
              <div class="space-y-2">
                <label for="shop-search-input" class="text-xs font-semibold uppercase tracking-wider text-on-surface-variant block">Search Dispensary</label>
                <div class="relative">
                  <input type="text" id="shop-search-input" placeholder="e.g. Kansa, Taila, Brahmi, Yantra..." class="w-full bg-surface-container-low border border-surface-variant rounded-lg pl-9 pr-8 py-2 text-xs text-on-surface placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all">
                  <span class="material-symbols-outlined notranslate absolute left-2.5 top-2.5 text-outline text-[16px]" translate="no">search</span>
                  <button type="button" id="clear-search-btn" class="hidden absolute right-2.5 top-2.5 text-outline hover:text-primary">
                    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">close</span>
                  </button>
                </div>
              </div>

              <!-- Category Radio / Selection -->
              <div class="space-y-3 pt-2 border-t border-surface-variant/80">
                <h4 class="text-xs font-bold uppercase tracking-wider text-primary">Dispensary Category</h4>
                <div class="space-y-1.5 text-xs text-on-surface">
                  <label class="flex items-center justify-between cursor-pointer py-1 px-2 rounded-lg hover:bg-surface-container transition-colors">
                    <span class="flex items-center gap-2">
                      <input type="radio" name="sidebar-category" value="all" checked class="text-primary focus:ring-primary rounded-full">
                      <span>All Sacred Items</span>
                    </span>
                    <span class="text-outline text-[11px]"><?php echo esc_html( $total_products_count ); ?></span>
                  </label>
                  <?php foreach ( $dispensary_cat_defs as $c_slug => $c_label ) : ?>
                  <label class="flex items-center justify-between cursor-pointer py-1 px-2 rounded-lg hover:bg-surface-container transition-colors">
                    <span class="flex items-center gap-2">
                      <input type="radio" name="sidebar-category" value="<?php echo esc_attr( $c_slug ); ?>" class="text-primary focus:ring-primary rounded-full">
                      <span><?php echo esc_html( $c_label ); ?></span>
                    </span>
                    <span class="text-outline text-[11px]"><?php echo esc_html( $cat_counts[ $c_slug ] ); ?></span>
                  </label>
                  <?php endforeach; ?>
                </div>
              </div>

              <!-- Dosha Constitution Filter -->
              <div class="space-y-3 pt-3 border-t border-surface-variant/80">
                <div class="flex items-center justify-between">
                  <h4 class="text-xs font-bold uppercase tracking-wider text-primary">Dosha / Harmony</h4>
                  <span class="text-[11px] text-secondary font-medium">Prakriti Fit</span>
                </div>
                <div class="grid grid-cols-2 gap-1.5 text-xs">
                  <button type="button" data-dosha="all" class="dosha-btn active-dosha py-1.5 px-2.5 rounded-lg border border-primary bg-primary text-white text-center font-medium transition-colors">
                    All Doshas
                  </button>
                  <button type="button" data-dosha="tridoshic" class="dosha-btn py-1.5 px-2.5 rounded-lg border border-surface-variant bg-surface-container-low text-on-surface text-center font-medium hover:border-primary transition-colors">
                    Tridoshic
                  </button>
                  <button type="button" data-dosha="vata" class="dosha-btn py-1.5 px-2.5 rounded-lg border border-surface-variant bg-surface-container-low text-on-surface text-center font-medium hover:border-primary transition-colors">
                    Vata Calming
                  </button>
                  <button type="button" data-dosha="pitta" class="dosha-btn py-1.5 px-2.5 rounded-lg border border-surface-variant bg-surface-container-low text-on-surface text-center font-medium hover:border-primary transition-colors">
                    Pitta Cooling
                  </button>
                </div>
              </div>

              <!-- Price Range Filter -->
              <div class="space-y-3 pt-3 border-t border-surface-variant/80">
                <div class="flex items-center justify-between">
                  <h4 class="text-xs font-bold uppercase tracking-wider text-primary">Price Range</h4>
                  <span id="price-display-label" class="text-xs font-semibold text-primary">Up to ₹ 5,000</span>
                </div>
                <input type="range" id="price-range-slider" min="400" max="5000" step="100" value="5000" class="w-full accent-primary cursor-pointer">
                <div class="flex justify-between text-[11px] text-outline">
                  <span>₹ 400</span>
                  <span>₹ 2,500</span>
                  <span>₹ 5,000+</span>
                </div>
                
                <!-- Quick Price Tiers -->
                <div class="flex flex-wrap gap-1.5 pt-1">
                  <button type="button" data-maxprice="1000" class="price-tier-btn text-[11px] py-1 px-2 rounded bg-surface-container-low hover:bg-surface-container text-on-surface-variant border border-surface-variant transition-colors">
                    Under ₹1,000
                  </button>
                  <button type="button" data-maxprice="2500" class="price-tier-btn text-[11px] py-1 px-2 rounded bg-surface-container-low hover:bg-surface-container text-on-surface-variant border border-surface-variant transition-colors">
                    Under ₹2,500
                  </button>
                  <button type="button" data-maxprice="5000" class="price-tier-btn text-[11px] py-1 px-2 rounded bg-surface-container-low hover:bg-surface-container text-on-surface-variant border border-surface-variant transition-colors">
                    All Prices
                  </button>
                </div>
              </div>

              <!-- Stock & Certification Checks -->
              <div class="space-y-2 pt-3 border-t border-surface-variant/80">
                <h4 class="text-xs font-bold uppercase tracking-wider text-primary">Dispensary Status</h4>
                <div class="space-y-1.5 text-xs text-on-surface">
                  <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="instock-only-check" class="rounded text-primary focus:ring-primary border-surface-variant">
                    <span>In Stock Only (Ready Dispatch)</span>
                  </label>
                  <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" id="consecrated-only-check" class="rounded text-primary focus:ring-primary border-surface-variant">
                    <span>Vaidya Certified / Consecrated</span>
                  </label>
                </div>
              </div>

              <!-- Need Guidance Banner -->
              <div class="p-4 bg-gradient-to-br from-surface-container to-[#F7F1E3] rounded-xl border border-[#E8D8BC] space-y-2">
                <div class="flex items-center gap-1.5 text-secondary font-semibold text-xs uppercase tracking-wider">
                  <span class="material-symbols-outlined notranslate text-[16px]" translate="no">stethoscope</span>
                  <span>Need Doshic Guidance?</span>
                </div>
                <p class="text-xs text-on-surface-variant leading-relaxed">
                  Unsure which classical formulation aligns with your constitutional Prakriti?
                </p>
                <a href="<?php echo esc_url( home_url( "/book-your-consultation/" ) ); ?>" class="inline-flex items-center gap-1 text-xs font-bold text-primary hover:text-secondary uppercase tracking-wider pt-1 transition-colors">
                  <span>Book Vaidya Session</span>
                  <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_forward</span>
                </a>
              </div>

            </div>
          </aside>

          <!-- RIGHT COLUMN: PRODUCT CATALOGUE & CONTROLS -->
          <div class="col-span-12 lg:col-span-9 space-y-6">

            <!-- CATALOGUE TOOLBAR -->
            <div class="bg-white rounded-xl border border-surface-variant p-4 shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
              
              <!-- Result Count & Active Filter Indicator -->
              <div class="flex flex-wrap items-center gap-2">
                <p class="text-xs sm:text-sm text-on-surface-variant font-medium">
                  Showing <span id="visible-count-text" class="font-bold text-primary"><?php echo esc_html( $total_products_count ); ?></span> of <span class="font-bold text-primary"><?php echo esc_html( $total_products_count ); ?></span> sacred dispensary items
                </p>
                <div id="active-filter-tags" class="flex flex-wrap gap-1.5">
                  <!-- Dynamically inserted active filter chips -->
                </div>
              </div>

              <!-- Sorting & Layout Controls -->
              <div class="flex items-center gap-3 w-full sm:w-auto justify-between sm:justify-end">
                <div class="flex items-center gap-2 text-xs">
                  <label for="shop-sort-select" class="text-on-surface-variant uppercase tracking-wider font-semibold whitespace-nowrap">Sort:</label>
                  <div class="relative">
                    <select id="shop-sort-select" class="appearance-none bg-surface-container-low text-primary text-xs font-semibold pl-3 pr-8 py-2 rounded-lg border border-surface-variant focus:outline-none focus:border-primary cursor-pointer">
                      <option value="featured">Vaidya Recommended</option>
                      <option value="price-asc">Price: Low to High</option>
                      <option value="price-desc">Price: High to Low</option>
                      <option value="rating">Highest Rated</option>
                      <option value="name">Alphabetical (A–Z)</option>
                    </select>
                    <span class="material-symbols-outlined notranslate absolute right-2 top-2 text-primary pointer-events-none text-[16px]" translate="no">expand_more</span>
                  </div>
                </div>

                <!-- Grid / List Switcher -->
                <div class="flex items-center bg-surface-container-low p-1 rounded-lg border border-surface-variant">
                  <button id="view-mode-grid" type="button" title="Grid View" class="p-1.5 rounded bg-white text-primary shadow-xs transition-colors">
                    <span class="material-symbols-outlined notranslate text-[18px] block" translate="no">grid_view</span>
                  </button>
                  <button id="view-mode-list" type="button" title="List View" class="p-1.5 rounded text-outline hover:text-primary transition-colors">
                    <span class="material-symbols-outlined notranslate text-[18px] block" translate="no">view_list</span>
                  </button>
                </div>
              </div>

            </div>

            <!-- PRODUCT GRID -->
            <div id="products-grid-container" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 transition-all duration-300 anukul-stagger">

              <?php
              $args = array(
                  'post_type'      => 'product',
                  'post_status'    => 'publish',
                  'posts_per_page' => -1,
                  'orderby'        => 'menu_order title',
                  'order'          => 'ASC',
                  'tax_query'      => array(
                      array(
                          'taxonomy' => 'product_cat',
                          'field'    => 'slug',
                          'terms'    => array( 'ayurveda', 'wellness', 'vastu', 'tea' ),
                          'operator' => 'IN',
                      ),
                  ),
              );
              $products_query = new WP_Query( $args );

              if ( $products_query->have_posts() ) :
                  while ( $products_query->have_posts() ) :
                      $products_query->the_post();
                      $p_id       = get_the_ID();
                      $product    = wc_get_product( $p_id );
                      if ( ! $product ) continue;

                      $title      = $product->get_name();
                      $permalink  = $product->get_permalink();
                      $reg_price  = (float) $product->get_regular_price();
                      $sale_price = (float) $product->get_sale_price();
                      $price      = (float) $product->get_price();

                      $terms      = get_the_terms( $p_id, 'product_cat' );
                      $cat_slug   = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->slug : 'ayurveda';
                      $cat_name   = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Classical Ayurveda';

                      $dosha       = get_post_meta( $p_id, '_dosha', true ) ?: 'tridoshic';
                      $badge       = get_post_meta( $p_id, '_badge', true ) ?: 'Vaidya Grade';
                      $subheading  = get_post_meta( $p_id, '_ritual_subheading', true ) ?: 'Classical Formulation';
                      $consecrated = get_post_meta( $p_id, '_consecrated', true ) === 'yes';
                      $rating      = get_post_meta( $p_id, '_average_rating', true ) ?: '4.9';
                      $reviews     = get_post_meta( $p_id, '_rating_count', true ) ?: '40';
                      $img_url     = get_post_meta( $p_id, '_anukul_image_url', true ) ?: ( has_post_thumbnail( $p_id ) ? get_the_post_thumbnail_url( $p_id, 'large' ) : wc_placeholder_img_src() );
                      $short_desc  = $product->get_short_description() ?: wp_trim_words( $product->get_description(), 20 );

                      $discount_pct = ( $reg_price > 0 && $sale_price > 0 && $reg_price > $sale_price )
                          ? round( ( ( $reg_price - $sale_price ) / $reg_price ) * 100 )
                          : 0;

                      $dosha_label = ( $dosha === 'vata' ) ? 'Vata Pacifying' : ( ( $dosha === 'pitta' ) ? 'Pitta Cooling' : 'Tridoshic' );
                      ?>
                      <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between anukul-card-lift"
                               data-id="<?php echo esc_attr( $p_id ); ?>"
                               data-category="<?php echo esc_attr( $cat_slug ); ?>"
                               data-dosha="<?php echo esc_attr( $dosha ); ?>"
                               data-price="<?php echo esc_attr( $price ); ?>"
                               data-rating="<?php echo esc_attr( $rating ); ?>"
                               data-instock="<?php echo $product->is_in_stock() ? 'true' : 'false'; ?>"
                               data-consecrated="<?php echo $consecrated ? 'true' : 'false'; ?>"
                               data-name="<?php echo esc_attr( $title ); ?>">
                        <div class="flex flex-col">
                          <!-- Media Box -->
                          <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                            <img src="<?php echo esc_url( $img_url ); ?>"
                                 alt="<?php echo esc_attr( $title ); ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3 flex flex-col items-start gap-1.5 z-10 pointer-events-none">
                              <span class="inline-flex items-center px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider shadow-xs"><?php echo esc_html( $cat_name ); ?></span>
                              <span class="inline-flex items-center px-2 py-0.5 rounded bg-[#C66A22] text-white text-[10px] font-bold uppercase tracking-wider shadow-xs"><?php echo esc_html( $dosha_label ); ?></span>
                            </div>
                            <span class="absolute top-3 right-3 z-10 pointer-events-none inline-flex items-center px-2 py-0.5 rounded bg-white/95 text-primary text-[10px] font-bold uppercase tracking-wider border border-[#E8D8BC] shadow-xs notranslate" translate="no"><?php echo esc_html( $badge ); ?></span>

                            <!-- Quick Actions Overlay -->
                            <div class="absolute inset-0 z-20 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                              <button type="button" onclick="openQuickViewModal(<?php echo $p_id; ?>, <?php echo esc_attr( wp_json_encode( $title ) ); ?>, '₹ <?php echo number_format( $price ); ?>', '₹ <?php echo number_format( $reg_price ?: $price ); ?>', <?php echo esc_attr( wp_json_encode( $cat_name ) ); ?>, <?php echo esc_attr( wp_json_encode( $dosha_label ) ); ?>, <?php echo esc_attr( wp_json_encode( $short_desc ) ); ?>, <?php echo esc_attr( wp_json_encode( $img_url ) ); ?>, <?php echo esc_attr( wp_json_encode( $permalink ) ); ?>)" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md notranslate" translate="no" title="Quick View">
                                <span class="material-symbols-outlined notranslate text-[20px] block" translate="no">visibility</span>
                              </button>
                              <button type="button" onclick="addToCart(<?php echo $p_id; ?>, <?php echo esc_attr( wp_json_encode( $title ) ); ?>, <?php echo $price; ?>)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md notranslate" translate="no" title="Add to Bag">
                                <span class="material-symbols-outlined notranslate text-[20px] block" translate="no">add_shopping_cart</span>
                              </button>
                            </div>
                          </div>

                          <!-- Content Details -->
                          <div class="p-5 flex flex-col gap-2">
                            <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                              <span class="text-secondary font-semibold"><?php echo esc_html( $subheading ); ?></span>
                              <div class="flex items-center gap-1 text-[#B38A3E]">
                                <span class="material-symbols-outlined notranslate text-[14px]" translate="no">star</span>
                                <span class="font-bold text-on-surface notranslate" translate="no"><?php echo esc_html( $rating ); ?></span>
                                <span class="text-outline text-[10px] notranslate" translate="no">(<?php echo esc_html( $reviews ); ?>)</span>
                              </div>
                            </div>

                            <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                              <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
                            </h3>
                            
                            <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                              <?php echo esc_html( $short_desc ); ?>
                            </p>

                            <!-- Price Box -->
                            <div class="pt-2 flex items-baseline gap-2 notranslate" translate="no">
                              <span class="font-display text-xl font-bold text-primary">₹ <?php echo number_format( $price ); ?></span>
                              <?php if ( $discount_pct > 0 ) : ?>
                                <span class="text-xs text-outline line-through">₹ <?php echo number_format( $reg_price ); ?></span>
                                <span class="text-[11px] font-semibold text-secondary">Save <?php echo $discount_pct; ?>%</span>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>

                        <!-- Card Bottom Actions -->
                        <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                          <a href="<?php echo esc_url( $permalink ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                            Details
                          </a>
                          <button type="button" onclick="addToCart(<?php echo $p_id; ?>, <?php echo esc_attr( wp_json_encode( $title ) ); ?>, <?php echo $price; ?>)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1 notranslate" translate="no">
                            <span class="material-symbols-outlined notranslate text-[16px]" translate="no">shopping_bag</span>
                            <span>Add</span>
                          </button>
                        </div>
                      </article>
                      <?php
                  endwhile;
                  wp_reset_postdata();
              endif;
              ?>

            </div>

            <!-- EMPTY STATE: NO MATCHING REMEDIES -->
            <div id="no-products-state" class="hidden bg-white rounded-xl border border-surface-variant p-12 text-center space-y-4">
              <div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center mx-auto text-secondary">
                <span class="material-symbols-outlined notranslate text-[32px]" translate="no">filter_list_off</span>
              </div>
              <h3 class="font-display text-2xl font-bold text-primary">No Dispensary Remedies Found</h3>
              <p class="text-sm text-on-surface-variant max-w-md mx-auto leading-relaxed">
                No items match your active filter criteria. Try expanding your price range, searching for different botanical herbs, or clearing your filters.
              </p>
              <button type="button" onclick="resetAllFilters()" class="inline-flex items-center gap-2 px-6 py-2.5 bg-primary text-white text-xs font-semibold uppercase tracking-wider rounded-lg hover:bg-secondary transition-colors">
                <span class="material-symbols-outlined notranslate text-[16px]" translate="no">restart_alt</span>
                <span>Reset All Filters</span>
              </button>
            </div>

          </div>

        </div>
      </div>
    </section>

    <!-- ASSURANCE & ETHICAL SOURCING PILLARS -->
    <section class="w-full bg-[#F6ECE4] py-16 border-t border-[#E8D8BC]">
      <div class="max-w-[1440px] mx-auto px-6 lg:px-margin">
        <div class="text-center max-w-2xl mx-auto mb-12">
          <span class="text-xs uppercase font-bold tracking-widest text-secondary block mb-2">The ANUKUL Dispensary Standard</span>
          <h2 class="font-display text-3xl sm:text-4xl text-primary font-bold tracking-tight">Authentic Vaidya Oversight &amp; Metallurgy</h2>
          <p class="text-sm text-on-surface-variant mt-3 leading-relaxed">
            Every botanical batch and sacred metal instrument is prepared under verified classical protocols, free from commercial shortcuts.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-white rounded-xl p-6 border border-[#E8D8BC] shadow-xs flex flex-col justify-between">
            <div class="space-y-3">
              <div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center text-primary">
                <span class="material-symbols-outlined notranslate text-[26px]" translate="no">biotech</span>
              </div>
              <h3 class="font-display text-lg font-bold text-primary">Certified Heavy Metal Testing</h3>
              <p class="text-xs text-on-surface-variant leading-relaxed">
                All classical herbs, Rasayanas, and Bhasma compounds are rigorously laboratory-tested for purity, microbial safety, and permissible mineral trace integrity.
              </p>
            </div>
            <div class="pt-4 mt-4 border-t border-surface-variant text-[11px] font-bold uppercase tracking-wider text-secondary">
              100% Classical Purity
            </div>
          </div>

          <div class="bg-white rounded-xl p-6 border border-[#E8D8BC] shadow-xs flex flex-col justify-between">
            <div class="space-y-3">
              <div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center text-primary">
                <span class="material-symbols-outlined notranslate text-[26px]" translate="no">balance</span>
              </div>
              <h3 class="font-display text-lg font-bold text-primary">78:22 Bell Metal Guarantee</h3>
              <p class="text-xs text-on-surface-variant leading-relaxed">
                Our Kansa Vatki massage bowls and puja utensils are forged by traditional hereditary bronze smiths with exact 78% copper and 22% tin ratios, zero lead, and zero zinc.
              </p>
            </div>
            <div class="pt-4 mt-4 border-t border-surface-variant text-[11px] font-bold uppercase tracking-wider text-secondary">
              Hand-Beaten Metallurgy
            </div>
          </div>

          <div class="bg-white rounded-xl p-6 border border-[#E8D8BC] shadow-xs flex flex-col justify-between">
            <div class="space-y-3">
              <div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center text-primary">
                <span class="material-symbols-outlined notranslate text-[26px]" translate="no">psychology_alt</span>
              </div>
              <h3 class="font-display text-lg font-bold text-primary">Prakriti &amp; Nadi Harmony</h3>
              <p class="text-xs text-on-surface-variant leading-relaxed">
                We believe in tailored wellness over mass consumption. You can schedule a direct constitutional consultation to verify exact herbal compatibility.
              </p>
            </div>
            <div class="pt-4 mt-4 border-t border-surface-variant text-[11px] font-bold uppercase tracking-wider text-secondary">
              Direct Clinical Advice
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- DISPENSARY FAQ ACCORDION -->
    <section class="w-full bg-white py-16 border-t border-surface-variant" id="shop-faqs">
      <div class="max-w-[1000px] mx-auto px-6 lg:px-margin">
        <div class="text-center mb-12">
          <span class="text-xs uppercase font-bold tracking-widest text-secondary block mb-2">Clarity &amp; Dispensary Care</span>
          <h2 class="font-display text-3xl sm:text-4xl text-primary font-bold tracking-tight">Frequently Asked Questions</h2>
          <p class="text-sm text-on-surface-variant mt-2 max-w-lg mx-auto">
            Practical guidance regarding classical formulations, shipping timelines, and practitioner consultation.
          </p>
        </div>

        <div class="space-y-3" id="faq-accordion">
          
          <div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all">
            <button type="button" aria-expanded="false" class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left focus:outline-none">
              <span class="font-display text-base sm:text-lg font-semibold text-primary">How do I verify which products suit my biological constitution (Prakriti)?</span>
              <span class="material-symbols-outlined notranslate text-secondary transition-transform duration-200" translate="no">add</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-on-surface-variant border-t border-surface-variant/40 pt-3 leading-relaxed">
              Every remedy features clear Doshic indicators (Vata, Pitta, Kapha, or Tridoshic). If you are uncertain about your current biological state (Vikriti), we strongly recommend booking a brief pulse analysis (Nadi Pariksha) or introductory clinical video consultation before initiating intensive internal Rasayanas.
            </div>
          </div>

          <div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all">
            <button type="button" aria-expanded="false" class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left focus:outline-none">
              <span class="font-display text-base sm:text-lg font-semibold text-primary">What makes ANUKUL Kansa Vatki bowls distinct from mass commercial bronze?</span>
              <span class="material-symbols-outlined notranslate text-secondary transition-transform duration-200" translate="no">add</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-on-surface-variant border-t border-surface-variant/40 pt-3 leading-relaxed">
              Commercial bronze often contains traces of lead, nickel, or zinc to reduce manufacturing costs. ANUKUL Kansa bowls are strictly crafted from 78% pure copper and 22% pure tin bell-metal alloys, hand-hammered by hereditary artisan families and verified safe for prolonged skin contact with warm ghee or medicated oils.
            </div>
          </div>

          <div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all">
            <button type="button" aria-expanded="false" class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left focus:outline-none">
              <span class="font-display text-base sm:text-lg font-semibold text-primary">What are your domestic dispatch and temperature-cushioned delivery timelines?</span>
              <span class="material-symbols-outlined notranslate text-secondary transition-transform duration-200" translate="no">add</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-on-surface-variant border-t border-surface-variant/40 pt-3 leading-relaxed">
              All physical orders are processed within 24 to 48 hours. Classical herbal oils and sensitive Rasayanas are packaged in recyclable, temperature-buffered natural fibers. Standard surface delivery spans 3 to 6 business days across India, with live tracking sent via SMS and WhatsApp.
            </div>
          </div>

          <div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all">
            <button type="button" aria-expanded="false" class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left focus:outline-none">
              <span class="font-display text-base sm:text-lg font-semibold text-primary">Are your Vastu Yantras consecrated prior to shipment?</span>
              <span class="material-symbols-outlined notranslate text-secondary transition-transform duration-200" translate="no">add</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-on-surface-variant border-t border-surface-variant/40 pt-3 leading-relaxed">
              Yes. All copper Sri Yantras and directional brass implements undergo classical Vedic consecration (Prana Pratishtha) during auspicious planetary hours (Shubh Muhurta) by our senior sanctuary priests before being sealed and dispatched.
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- CONSULTATION CALL-TO-ACTION BANNER -->
    <section class="w-full bg-[#1F4D3A] text-white py-14 border-t border-[#B38A3E]/30">
      <div class="max-w-[1000px] mx-auto px-6 lg:px-margin text-center space-y-4">
        <span class="inline-block text-xs uppercase font-bold tracking-[0.2em] text-[#B38A3E]">Personalized Vaidya Guidance</span>
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-normal leading-tight">
          Not Sure Which Formulation Suits You?
        </h2>
        <p class="font-body text-sm sm:text-base text-white/80 max-w-xl mx-auto leading-relaxed">
          Book an individual clinical assessment with Dr. Anshul to receive customized constitutional advice, herbal prescriptions, and residential Vastu recommendations.
        </p>
        <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
          <a href="<?php echo esc_url( home_url( "/book-your-consultation/" ) ); ?>" class="px-8 py-3.5 bg-[#B38A3E] text-white hover:bg-secondary text-xs uppercase font-bold tracking-wider rounded-lg shadow-md transition-colors">
            Book Nadi Pariksha Session
          </a>
          <a href="<?php echo esc_url( home_url( "/services/" ) ); ?>" class="px-6 py-3.5 bg-transparent border border-white/40 hover:bg-white/10 text-white text-xs uppercase font-bold tracking-wider rounded-lg transition-colors">
            Explore Clinical Services
          </a>
        </div>
      </div>
    </section>

    <!-- DISCLAIMER NOTICE -->
    <aside class="w-full bg-surface-container-high py-4 border-b border-surface-variant text-xs text-on-surface-variant">
      <div class="max-w-[1440px] mx-auto px-6 lg:px-margin flex flex-col md:flex-row items-center justify-between gap-2">
        <div class="flex items-center gap-2">
          <span class="material-symbols-outlined notranslate text-secondary text-[18px]" translate="no">info</span>
          <p>
            <strong>Responsible Practice Note:</strong> Products and information are presented for verified traditional Ayurvedic wellness and spatial study. These are not intended to replace licensed medical emergency treatment.
          </p>
        </div>
        <a href="<?php echo esc_url( home_url( '/contact/#disclaimer' ) ); ?>" class="font-semibold text-secondary hover:text-primary underline whitespace-nowrap">
          Read Disclaimer →
        </a>
      </div>
    </aside>

    <!-- ZERO-DELAY QUICK VIEW MODAL -->
    <div id="quick-view-modal" class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm opacity-0 pointer-events-none transition-all duration-200">
      <div id="quick-view-dialog" class="bg-white rounded-2xl max-w-2xl w-full p-6 sm:p-8 border border-[#E8D8BC] shadow-2xl relative overflow-hidden max-h-[90vh] overflow-y-auto transform scale-95 transition-all duration-200">
        <button type="button" onclick="closeQuickViewModal()" aria-label="Close modal" class="absolute top-5 right-5 text-outline hover:text-primary p-1 rounded-full hover:bg-surface-container transition-colors notranslate" translate="no">
          <span class="material-symbols-outlined notranslate text-[24px] block" translate="no">close</span>
        </button>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
          <div class="aspect-square bg-surface-container rounded-xl overflow-hidden border border-surface-variant flex items-center justify-center">
            <img id="modal-img" src="" alt="Sacred Remedy" class="w-full h-full object-cover">
          </div>

          <div class="space-y-4">
            <div>
              <span id="modal-category" class="text-[10px] font-bold uppercase tracking-wider text-secondary block mb-1">Classical Ayurveda</span>
              <h3 id="modal-title" class="font-display text-2xl font-bold text-primary leading-tight">Remedy Title</h3>
              <span id="modal-dosha" class="inline-block mt-1 px-2.5 py-0.5 rounded-full bg-surface-container text-primary text-[10px] font-semibold uppercase tracking-wider">Tridoshic</span>
            </div>

            <div class="flex items-baseline gap-2">
              <span id="modal-price" class="font-display text-2xl font-bold text-primary notranslate" translate="no">₹ 0</span>
              <span id="modal-original-price" class="text-sm text-outline line-through notranslate" translate="no">₹ 0</span>
            </div>

            <p id="modal-desc" class="text-xs text-on-surface-variant leading-relaxed">
              Traditional botanical preparation.
            </p>

            <div class="space-y-3 pt-2 border-t border-surface-variant">
              <div class="flex items-center gap-3">
                <span class="text-xs uppercase font-bold text-primary">Quantity:</span>
                <div class="flex items-center bg-surface-container rounded-lg border border-surface-variant overflow-hidden">
                  <button type="button" onclick="adjustModalQty(-1)" class="px-3 py-1 text-primary hover:bg-surface-container-high font-bold transition-colors">−</button>
                  <span id="modal-qty" class="px-4 py-1 text-xs font-bold text-primary select-none notranslate" translate="no">1</span>
                  <button type="button" onclick="adjustModalQty(1)" class="px-3 py-1 text-primary hover:bg-surface-container-high font-bold transition-colors">+</button>
                </div>
              </div>

              <div class="grid grid-cols-2 gap-2 pt-1">
                <button type="button" id="modal-add-btn" class="w-full py-2.5 px-4 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1.5 notranslate" translate="no">
                  <span class="material-symbols-outlined notranslate text-[16px]" translate="no">shopping_bag</span>
                  <span>Add to Bag</span>
                </button>
                <a id="modal-permalink" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>" class="w-full py-2.5 px-4 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                  Full Details
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MOBILE FILTER SLIDE-OVER DRAWER -->
    <div id="mobile-filter-drawer" class="fixed inset-0 z-50 flex justify-end bg-black/50 backdrop-blur-xs hidden transition-opacity">
      <div class="w-full max-w-xs bg-white h-full shadow-2xl p-6 overflow-y-auto space-y-6 flex flex-col justify-between">
        <div class="space-y-6">
          <div class="flex items-center justify-between border-b border-surface-variant pb-4">
            <div class="flex items-center gap-2">
              <span class="material-symbols-outlined notranslate text-secondary text-[20px]" translate="no">tune</span>
              <h3 class="font-display text-lg font-bold text-primary">Filter Remedies</h3>
            </div>
            <button type="button" onclick="toggleMobileFilterDrawer(false)" class="text-outline hover:text-primary notranslate" translate="no">
              <span class="material-symbols-outlined notranslate text-[24px]" translate="no">close</span>
            </button>
          </div>

          <!-- Search in Mobile -->
          <div class="space-y-1">
            <label class="text-xs font-semibold uppercase text-on-surface-variant">Search Dispensary</label>
            <input type="text" id="mobile-search-input" placeholder="Search remedies..." class="w-full bg-surface-container-low border border-surface-variant rounded-lg px-3 py-2 text-xs">
          </div>

          <!-- Categories Mobile -->
          <div class="space-y-2">
            <h4 class="text-xs font-bold uppercase text-primary">Category</h4>
            <div class="space-y-1 text-xs">
              <button type="button" onclick="setCategoryFilter('all'); toggleMobileFilterDrawer(false);" class="w-full text-left py-1.5 px-2 rounded hover:bg-surface-container">All Products</button>
              <button type="button" onclick="setCategoryFilter('ayurveda'); toggleMobileFilterDrawer(false);" class="w-full text-left py-1.5 px-2 rounded hover:bg-surface-container">Classical Ayurveda</button>
              <button type="button" onclick="setCategoryFilter('wellness'); toggleMobileFilterDrawer(false);" class="w-full text-left py-1.5 px-2 rounded hover:bg-surface-container">Dinacharya Tools</button>
              <button type="button" onclick="setCategoryFilter('vastu'); toggleMobileFilterDrawer(false);" class="w-full text-left py-1.5 px-2 rounded hover:bg-surface-container">Vastu Yantras</button>
              <button type="button" onclick="setCategoryFilter('tea'); toggleMobileFilterDrawer(false);" class="w-full text-left py-1.5 px-2 rounded hover:bg-surface-container">Tisanes &amp; Teas</button>
            </div>
          </div>

          <!-- Dosha Mobile -->
          <div class="space-y-2">
            <h4 class="text-xs font-bold uppercase text-primary">Dosha / Harmony</h4>
            <div class="grid grid-cols-2 gap-1.5 text-xs">
              <button type="button" onclick="setDoshaFilter('all'); toggleMobileFilterDrawer(false);" class="py-1.5 px-2 border rounded text-center font-medium">All</button>
              <button type="button" onclick="setDoshaFilter('tridoshic'); toggleMobileFilterDrawer(false);" class="py-1.5 px-2 border rounded text-center font-medium">Tridoshic</button>
              <button type="button" onclick="setDoshaFilter('vata'); toggleMobileFilterDrawer(false);" class="py-1.5 px-2 border rounded text-center font-medium">Vata</button>
              <button type="button" onclick="setDoshaFilter('pitta'); toggleMobileFilterDrawer(false);" class="py-1.5 px-2 border rounded text-center font-medium">Pitta</button>
            </div>
          </div>
        </div>

        <div class="pt-4 border-t border-surface-variant space-y-2">
          <button type="button" onclick="toggleMobileFilterDrawer(false)" class="w-full py-3 bg-primary text-white font-semibold text-xs uppercase tracking-wider rounded-lg shadow-sm">
            Apply Filters
          </button>
          <button type="button" onclick="resetAllFilters(); toggleMobileFilterDrawer(false);" class="w-full py-2 text-center text-xs text-secondary font-semibold uppercase">
            Reset Filters
          </button>
        </div>
      </div>
    </div>

    <!-- ZERO-DELAY VEDIC CART TOAST -->
    <div id="cart-toast" class="fixed bottom-6 right-6 z-[70] hidden bg-[#1F4D3A] text-white px-5 py-3.5 rounded-xl shadow-2xl flex items-center gap-3 border border-[#B38A3E] transition-all duration-300 transform translate-y-4 notranslate" translate="no">
      <span class="material-symbols-outlined notranslate text-[#B38A3E] text-[24px]" translate="no">check_circle</span>
      <div>
        <div class="text-[11px] font-bold uppercase tracking-wider text-[#B38A3E]">Added to Sacred Bag</div>
        <div id="toast-item-name" class="text-xs text-white/95 font-medium max-w-[220px] truncate">Remedy Name</div>
      </div>
      <a href="<?php echo esc_url( function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart/' ) ); ?>" class="ml-2 px-3 py-1 bg-[#B38A3E] hover:bg-secondary text-white rounded text-[11px] font-bold uppercase tracking-wider whitespace-nowrap transition-colors shadow-xs">
        View Bag →
      </a>
    </div>

    <!-- INTERACTIVE DISPENSARY LOGIC -->
    <script>
      (function() {
        var state = {
          category: 'all',
          dosha: 'all',
          maxPrice: 5000,
          search: '',
          inStockOnly: false,
          consecratedOnly: false,
          sort: 'featured',
          cartCount: parseInt(localStorage.getItem('anukul_cart_count') || '0', 10)
        };

        var productsGrid = document.getElementById('products-grid-container');
        var productItems = Array.prototype.slice.call(document.querySelectorAll('.product-item'));
        var visibleCountText = document.getElementById('visible-count-text');
        var noProductsState = document.getElementById('no-products-state');
        var priceSlider = document.getElementById('price-range-slider');
        var priceLabel = document.getElementById('price-display-label');
        var searchInput = document.getElementById('shop-search-input');
        var clearSearchBtn = document.getElementById('clear-search-btn');
        var sortSelect = document.getElementById('shop-sort-select');

        // Sync header cart badges initially
        function syncCartBadges() {
          var badges = document.querySelectorAll('.anukul-cart-badge');
          badges.forEach(function(badge) {
            badge.textContent = state.cartCount;
          });
        }
        syncCartBadges();

        // Refresh cart count live from WooCommerce session
        fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>?action=anukul_get_cart_count')
          .then(function(res) { return res.json(); })
          .then(function(res) {
            if (res && res.success && res.data && typeof res.data.cart_count !== 'undefined') {
              state.cartCount = res.data.cart_count;
              localStorage.setItem('anukul_cart_count', state.cartCount);
              syncCartBadges();
            }
          })
          .catch(function(){});

        // Filter engine
        window.applyFilters = function() {
          var visibleCount = 0;
          productItems.forEach(function(item) {
            var itemCategory = item.getAttribute('data-category');
            var itemDosha = item.getAttribute('data-dosha');
            var itemPrice = parseFloat(item.getAttribute('data-price')) || 0;
            var itemInStock = item.getAttribute('data-instock') === 'true';
            var itemConsecrated = item.getAttribute('data-consecrated') === 'true';
            var itemName = (item.getAttribute('data-name') || '').toLowerCase();

            var matches = true;
            if (state.category !== 'all' && itemCategory !== state.category) matches = false;
            if (state.dosha !== 'all') {
              if (state.dosha === 'tridoshic' && itemDosha !== 'tridoshic') matches = false;
              if (state.dosha === 'vata' && itemDosha.indexOf('vata') === -1) matches = false;
              if (state.dosha === 'pitta' && itemDosha.indexOf('pitta') === -1) matches = false;
            }
            if (itemPrice > state.maxPrice) matches = false;
            if (state.inStockOnly && !itemInStock) matches = false;
            if (state.consecratedOnly && !itemConsecrated) matches = false;
            if (state.search) {
              var q = state.search.toLowerCase().trim();
              if (itemName.indexOf(q) === -1) matches = false;
            }

            if (matches) {
              item.style.display = '';
              visibleCount++;
            } else {
              item.style.display = 'none';
            }
          });

          if (visibleCountText) visibleCountText.textContent = visibleCount;
          if (noProductsState) {
            if (visibleCount === 0) noProductsState.classList.remove('hidden');
            else noProductsState.classList.add('hidden');
          }

          sortProducts();
          updateActiveFilterTags();
        };

        function sortProducts() {
          if (!productsGrid) return;
          var sorted = productItems.slice().sort(function(a, b) {
            var priceA = parseFloat(a.getAttribute('data-price')) || 0;
            var priceB = parseFloat(b.getAttribute('data-price')) || 0;
            var ratingA = parseFloat(a.getAttribute('data-rating')) || 0;
            var ratingB = parseFloat(b.getAttribute('data-rating')) || 0;
            var nameA = a.getAttribute('data-name') || '';
            var nameB = b.getAttribute('data-name') || '';

            switch (state.sort) {
              case 'price-asc': return priceA - priceB;
              case 'price-desc': return priceB - priceA;
              case 'rating': return ratingB - ratingA;
              case 'name': return nameA.localeCompare(nameB);
              default: return 0;
            }
          });
          sorted.forEach(function(item) { productsGrid.appendChild(item); });
        }

        function updateActiveFilterTags() {
          var container = document.getElementById('active-filter-tags');
          if (!container) return;
          container.innerHTML = '';

          if (state.category !== 'all') {
            createFilterTag('Category: ' + state.category, function() { setCategoryFilter('all'); });
          }
          if (state.dosha !== 'all') {
            createFilterTag('Dosha: ' + state.dosha, function() { setDoshaFilter('all'); });
          }
          if (state.maxPrice < 5000) {
            createFilterTag('≤ ₹' + state.maxPrice, function() {
              state.maxPrice = 5000;
              if (priceSlider) priceSlider.value = 5000;
              if (priceLabel) priceLabel.textContent = 'Up to ₹ 5,000';
              applyFilters();
            });
          }
          if (state.search) {
            createFilterTag('"' + state.search + '"', function() {
              state.search = '';
              if (searchInput) searchInput.value = '';
              if (clearSearchBtn) clearSearchBtn.classList.add('hidden');
              applyFilters();
            });
          }
        }

        function createFilterTag(label, onRemove) {
          var container = document.getElementById('active-filter-tags');
          var tag = document.createElement('span');
          tag.className = 'inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-surface-container text-primary text-[10px] font-semibold border border-surface-variant';
          tag.innerHTML = '<span>' + label + '</span><button type="button" class="hover:text-secondary ml-1 font-bold">×</button>';
          tag.querySelector('button').onclick = onRemove;
          container.appendChild(tag);
        }

        window.setCategoryFilter = function(cat) {
          state.category = cat;
          document.querySelectorAll('.category-pill').forEach(function(btn) {
            if (btn.getAttribute('data-category') === cat) {
              btn.classList.add('bg-primary', 'text-white', 'border-primary', 'shadow-xs');
              btn.classList.remove('bg-white', 'text-on-surface-variant');
            } else {
              btn.classList.remove('bg-primary', 'text-white', 'border-primary', 'shadow-xs');
              btn.classList.add('bg-white', 'text-on-surface-variant');
            }
          });

          var radio = document.querySelector('input[name="sidebar-category"][value="' + cat + '"]');
          if (radio) radio.checked = true;

          applyFilters();
        };

        window.setDoshaFilter = function(dosha) {
          state.dosha = dosha;
          document.querySelectorAll('.dosha-btn').forEach(function(btn) {
            if (btn.getAttribute('data-dosha') === dosha) {
              btn.classList.add('bg-primary', 'text-white', 'border-primary');
              btn.classList.remove('bg-surface-container-low', 'text-on-surface');
            } else {
              btn.classList.remove('bg-primary', 'text-white', 'border-primary');
              btn.classList.add('bg-surface-container-low', 'text-on-surface');
            }
          });
          applyFilters();
        };

        window.resetAllFilters = function() {
          state.category = 'all';
          state.dosha = 'all';
          state.maxPrice = 5000;
          state.search = '';
          state.inStockOnly = false;
          state.consecratedOnly = false;
          state.sort = 'featured';

          if (searchInput) searchInput.value = '';
          if (clearSearchBtn) clearSearchBtn.classList.add('hidden');
          if (priceSlider) priceSlider.value = 5000;
          if (priceLabel) priceLabel.textContent = 'Up to ₹ 5,000';
          var inStockCheck = document.getElementById('instock-only-check');
          if (inStockCheck) inStockCheck.checked = false;
          var consecratedCheck = document.getElementById('consecrated-only-check');
          if (consecratedCheck) consecratedCheck.checked = false;
          if (sortSelect) sortSelect.value = 'featured';

          setCategoryFilter('all');
          setDoshaFilter('all');
          applyFilters();
        };

        // Event Listeners for filters
        document.querySelectorAll('.category-pill').forEach(function(btn) {
          btn.addEventListener('click', function() {
            setCategoryFilter(btn.getAttribute('data-category'));
          });
        });

        document.querySelectorAll('input[name="sidebar-category"]').forEach(function(radio) {
          radio.addEventListener('change', function() {
            setCategoryFilter(radio.value);
          });
        });

        document.querySelectorAll('.dosha-btn').forEach(function(btn) {
          btn.addEventListener('click', function() {
            setDoshaFilter(btn.getAttribute('data-dosha'));
          });
        });

        if (priceSlider) {
          priceSlider.addEventListener('input', function(e) {
            state.maxPrice = parseInt(e.target.value, 10);
            if (priceLabel) priceLabel.textContent = 'Up to ₹ ' + state.maxPrice.toLocaleString('en-IN');
            applyFilters();
          });
        }

        document.querySelectorAll('.price-tier-btn').forEach(function(btn) {
          btn.addEventListener('click', function() {
            var max = parseInt(btn.getAttribute('data-maxprice'), 10);
            state.maxPrice = max;
            if (priceSlider) priceSlider.value = max;
            if (priceLabel) priceLabel.textContent = 'Up to ₹ ' + max.toLocaleString('en-IN');
            applyFilters();
          });
        });

        var inStockCheck = document.getElementById('instock-only-check');
        if (inStockCheck) inStockCheck.addEventListener('change', function(e) {
          state.inStockOnly = e.target.checked;
          applyFilters();
        });

        var consecratedCheck = document.getElementById('consecrated-only-check');
        if (consecratedCheck) consecratedCheck.addEventListener('change', function(e) {
          state.consecratedOnly = e.target.checked;
          applyFilters();
        });

        if (searchInput) {
          searchInput.addEventListener('input', function(e) {
            state.search = e.target.value;
            if (clearSearchBtn) {
              if (state.search) clearSearchBtn.classList.remove('hidden');
              else clearSearchBtn.classList.add('hidden');
            }
            applyFilters();
          });
        }

        if (clearSearchBtn) {
          clearSearchBtn.addEventListener('click', function() {
            state.search = '';
            if (searchInput) searchInput.value = '';
            clearSearchBtn.classList.add('hidden');
            applyFilters();
          });
        }

        var mobileSearchInput = document.getElementById('mobile-search-input');
        if (mobileSearchInput) {
          mobileSearchInput.addEventListener('input', function(e) {
            state.search = e.target.value;
            if (searchInput) searchInput.value = e.target.value;
            applyFilters();
          });
        }

        if (sortSelect) {
          sortSelect.addEventListener('change', function(e) {
            state.sort = e.target.value;
            sortProducts();
          });
        }

        var resetBtn = document.getElementById('reset-filters-btn');
        if (resetBtn) resetBtn.addEventListener('click', resetAllFilters);

        // View Mode Switcher
        var viewGridBtn = document.getElementById('view-mode-grid');
        var viewListBtn = document.getElementById('view-mode-list');
        if (viewGridBtn && viewListBtn && productsGrid) {
          viewGridBtn.addEventListener('click', function() {
            productsGrid.classList.remove('grid-cols-1');
            productsGrid.classList.add('sm:grid-cols-2', 'xl:grid-cols-3');
            viewGridBtn.classList.add('bg-white', 'text-primary', 'shadow-xs');
            viewGridBtn.classList.remove('text-outline');
            viewListBtn.classList.remove('bg-white', 'text-primary', 'shadow-xs');
            viewListBtn.classList.add('text-outline');
          });

          viewListBtn.addEventListener('click', function() {
            productsGrid.classList.remove('sm:grid-cols-2', 'xl:grid-cols-3');
            productsGrid.classList.add('grid-cols-1');
            viewListBtn.classList.add('bg-white', 'text-primary', 'shadow-xs');
            viewListBtn.classList.remove('text-outline');
            viewGridBtn.classList.remove('bg-white', 'text-primary', 'shadow-xs');
            viewGridBtn.classList.add('text-outline');
          });
        }

        // Mobile Filter Drawer Toggle
        var mobileFilterTrigger = document.getElementById('mobile-filter-trigger');
        var mobileFilterDrawer = document.getElementById('mobile-filter-drawer');
        window.toggleMobileFilterDrawer = function(show) {
          if (!mobileFilterDrawer) return;
          if (show) {
            mobileFilterDrawer.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
          } else {
            mobileFilterDrawer.classList.add('hidden');
            document.body.style.overflow = '';
          }
        };
        if (mobileFilterTrigger) {
          mobileFilterTrigger.addEventListener('click', function() {
            toggleMobileFilterDrawer(true);
          });
        }

        // ZERO-DELAY QUICK VIEW MODAL CONTROLLER
        var modalQty = 1;
        var quickViewModal = document.getElementById('quick-view-modal');
        var quickViewDialog = document.getElementById('quick-view-dialog');

        window.openQuickViewModal = function(id, name, price, origPrice, cat, dosha, desc, img, permalink) {
          modalQty = 1;
          document.getElementById('modal-title').textContent = name;
          document.getElementById('modal-price').textContent = price;
          document.getElementById('modal-original-price').textContent = origPrice;
          document.getElementById('modal-category').textContent = cat;
          document.getElementById('modal-dosha').textContent = dosha;
          document.getElementById('modal-desc').textContent = desc;
          document.getElementById('modal-img').src = img;
          document.getElementById('modal-qty').textContent = '1';

          var linkBtn = document.getElementById('modal-permalink');
          if (linkBtn && permalink) linkBtn.href = permalink;

          var addBtn = document.getElementById('modal-add-btn');
          addBtn.onclick = function() {
            var rawPrice = parseInt(price.replace(/[^0-9]/g, ''), 10) || 1000;
            addToCart(id, name, rawPrice, modalQty);
            closeQuickViewModal();
          };

          // Instant zero-lag show with hardware acceleration
          quickViewModal.classList.remove('opacity-0', 'pointer-events-none');
          quickViewDialog.classList.remove('scale-95');
          quickViewDialog.classList.add('scale-100');
          document.body.style.overflow = 'hidden';
        };

        window.closeQuickViewModal = function() {
          if (!quickViewModal) return;
          quickViewModal.classList.add('opacity-0', 'pointer-events-none');
          if (quickViewDialog) {
            quickViewDialog.classList.remove('scale-100');
            quickViewDialog.classList.add('scale-95');
          }
          document.body.style.overflow = '';
        };

        window.adjustModalQty = function(delta) {
          modalQty = Math.max(1, Math.min(99, modalQty + delta));
          document.getElementById('modal-qty').textContent = modalQty;
        };

        // Close modal on outside backdrop click
        if (quickViewModal) {
          quickViewModal.addEventListener('click', function(e) {
            if (e.target === quickViewModal) {
              closeQuickViewModal();
            }
          });
        }

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape') {
            closeQuickViewModal();
            toggleMobileFilterDrawer(false);
          }
        });

        // ZERO-DELAY ADD TO CART & VEDIC TOAST WITH WOOCOMMERCE AJAX
        var toastTimer = null;
        window.addToCart = function(productId, name, price, qty) {
          qty = qty || 1;
          state.cartCount += qty;
          localStorage.setItem('anukul_cart_count', state.cartCount);
          syncCartBadges();

          var toast = document.getElementById('cart-toast');
          var toastName = document.getElementById('toast-item-name');
          if (toast && toastName) {
            toastName.textContent = name + (qty > 1 ? ' (' + qty + ' units)' : '');
            toast.classList.remove('hidden');
            
            // Trigger hardware accelerated slide up immediately
            requestAnimationFrame(function() {
              toast.classList.remove('translate-y-4');
            });

            if (toastTimer) clearTimeout(toastTimer);
            toastTimer = setTimeout(function() {
              toast.classList.add('translate-y-4');
              setTimeout(function() {
                toast.classList.add('hidden');
              }, 300);
            }, 3500);
          }

          // Direct asynchronous WooCommerce cart synchronization
          if (productId) {
            var ajaxUrl = '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>';
            var formData = new FormData();
            formData.append('action', 'anukul_add_to_cart');
            formData.append('product_id', productId);
            formData.append('quantity', qty);

            fetch(ajaxUrl, {
              method: 'POST',
              body: formData
            })
            .then(function(res) { return res.json(); })
            .then(function(res) {
              if (res && res.success && res.data && typeof res.data.cart_count !== 'undefined') {
                state.cartCount = res.data.cart_count;
                localStorage.setItem('anukul_cart_count', state.cartCount);
                syncCartBadges();
              }
            })
            .catch(function(err) {
              console.warn('WooCommerce cart sync notice:', err);
            });
          }
        };

        // FAQ Accordion
        document.querySelectorAll('.faq-toggle').forEach(function(button) {
          button.addEventListener('click', function() {
            var item = button.closest('.faq-item');
            var content = item.querySelector('.faq-content');
            var isExpanded = button.getAttribute('aria-expanded') === 'true';

            document.querySelectorAll('.faq-content').forEach(function(c) { c.classList.add('hidden'); });
            document.querySelectorAll('.faq-toggle').forEach(function(b) {
              b.setAttribute('aria-expanded', 'false');
              var ic = b.querySelector('.material-symbols-outlined');
              if (ic) ic.textContent = 'add';
            });

            if (!isExpanded) {
              content.classList.remove('hidden');
              button.setAttribute('aria-expanded', 'true');
              var icon = button.querySelector('.material-symbols-outlined');
              if (icon) icon.textContent = 'remove';
            }
          });
        });

      })();
    </script>

<?php
get_footer( 'shop' );

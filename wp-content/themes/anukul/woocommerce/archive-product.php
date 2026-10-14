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
                <span class="material-symbols-outlined text-[18px]">south</span>
              </a>
              <a href="<?php echo esc_url( home_url( "/book-your-consultation/" ) ); ?>" class="inline-flex items-center gap-2 px-5 py-3 bg-white border border-[#E8D8BC] text-primary text-xs font-semibold uppercase tracking-wider rounded-lg hover:bg-surface-container transition-colors">
                <span>Prescription / Prakriti Query</span>
                <span class="material-symbols-outlined text-[18px]">medical_services</span>
              </a>
            </div>
          </div>

          <!-- Feature Trust Badges Ribbon -->
          <div class="grid grid-cols-2 gap-3 w-full lg:w-auto shrink-0 max-w-md">
            <div class="p-4 bg-white/80 rounded-xl border border-[#E8D8BC] shadow-xs flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined text-[22px]">verified</span>
              </div>
              <div>
                <h4 class="font-display text-sm font-semibold text-primary">Classical Tenets</h4>
                <p class="text-xs text-on-surface-variant">Sharangadhara Standards</p>
              </div>
            </div>
            <div class="p-4 bg-white/80 rounded-xl border border-[#E8D8BC] shadow-xs flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined text-[22px]">workspace_premium</span>
              </div>
              <div>
                <h4 class="font-display text-sm font-semibold text-primary">78:22 Bell Metal</h4>
                <p class="text-xs text-on-surface-variant">Lead-free Certified Kansa</p>
              </div>
            </div>
            <div class="p-4 bg-white/80 rounded-xl border border-[#E8D8BC] shadow-xs flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined text-[22px]">auto_awesome</span>
              </div>
              <div>
                <h4 class="font-display text-sm font-semibold text-primary">Muhurta Energized</h4>
                <p class="text-xs text-on-surface-variant">Consecrated Spatial Yantras</p>
              </div>
            </div>
            <div class="p-4 bg-white/80 rounded-xl border border-[#E8D8BC] shadow-xs flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-surface-container flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined text-[22px]">local_shipping</span>
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
            All Products (<span id="all-count-pill">12</span>)
          </button>
          <button type="button" data-category="ayurveda" class="category-pill px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-white text-on-surface-variant hover:text-primary hover:bg-white/90 border border-surface-variant">
            Classical Ayurveda (4)
          </button>
          <button type="button" data-category="wellness" class="category-pill px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-white text-on-surface-variant hover:text-primary hover:bg-white/90 border border-surface-variant">
            Dinacharya Tools (3)
          </button>
          <button type="button" data-category="vastu" class="category-pill px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-white text-on-surface-variant hover:text-primary hover:bg-white/90 border border-surface-variant">
            Vastu Yantras (3)
          </button>
          <button type="button" data-category="tea" class="category-pill px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider transition-all bg-white text-on-surface-variant hover:text-primary hover:bg-white/90 border border-surface-variant">
            Tisanes &amp; Teas (2)
          </button>
        </div>

        <!-- Mobile Filter Button (visible on small/medium screens) -->
        <button id="mobile-filter-trigger" type="button" class="lg:hidden shrink-0 inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary text-white rounded-lg text-xs font-semibold uppercase tracking-wider shadow-xs">
          <span class="material-symbols-outlined text-[16px]">tune</span>
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
                  <span class="material-symbols-outlined text-secondary text-[20px]">filter_alt</span>
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
                  <span class="material-symbols-outlined absolute left-2.5 top-2.5 text-outline text-[16px]">search</span>
                  <button type="button" id="clear-search-btn" class="hidden absolute right-2.5 top-2.5 text-outline hover:text-primary">
                    <span class="material-symbols-outlined text-[16px]">close</span>
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
                    <span class="text-outline text-[11px]">12</span>
                  </label>
                  <label class="flex items-center justify-between cursor-pointer py-1 px-2 rounded-lg hover:bg-surface-container transition-colors">
                    <span class="flex items-center gap-2">
                      <input type="radio" name="sidebar-category" value="ayurveda" class="text-primary focus:ring-primary rounded-full">
                      <span>Classical Ayurveda</span>
                    </span>
                    <span class="text-outline text-[11px]">4</span>
                  </label>
                  <label class="flex items-center justify-between cursor-pointer py-1 px-2 rounded-lg hover:bg-surface-container transition-colors">
                    <span class="flex items-center gap-2">
                      <input type="radio" name="sidebar-category" value="wellness" class="text-primary focus:ring-primary rounded-full">
                      <span>Dinacharya Tools</span>
                    </span>
                    <span class="text-outline text-[11px]">3</span>
                  </label>
                  <label class="flex items-center justify-between cursor-pointer py-1 px-2 rounded-lg hover:bg-surface-container transition-colors">
                    <span class="flex items-center gap-2">
                      <input type="radio" name="sidebar-category" value="vastu" class="text-primary focus:ring-primary rounded-full">
                      <span>Vastu Yantras &amp; Brass</span>
                    </span>
                    <span class="text-outline text-[11px]">3</span>
                  </label>
                  <label class="flex items-center justify-between cursor-pointer py-1 px-2 rounded-lg hover:bg-surface-container transition-colors">
                    <span class="flex items-center gap-2">
                      <input type="radio" name="sidebar-category" value="tea" class="text-primary focus:ring-primary rounded-full">
                      <span>Tisanes &amp; Teas</span>
                    </span>
                    <span class="text-outline text-[11px]">2</span>
                  </label>
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
                  <span class="material-symbols-outlined text-[16px]">stethoscope</span>
                  <span>Need Doshic Guidance?</span>
                </div>
                <p class="text-xs text-on-surface-variant leading-relaxed">
                  Unsure which classical formulation aligns with your constitutional Prakriti?
                </p>
                <a href="<?php echo esc_url( home_url( "/book-your-consultation/" ) ); ?>" class="inline-flex items-center gap-1 text-xs font-bold text-primary hover:text-secondary uppercase tracking-wider pt-1 transition-colors">
                  <span>Book Vaidya Session</span>
                  <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
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
                  Showing <span id="visible-count-text" class="font-bold text-primary">12</span> of <span class="font-bold text-primary">12</span> sacred dispensary items
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
                    <span class="material-symbols-outlined absolute right-2 top-2 text-primary pointer-events-none text-[16px]">expand_more</span>
                  </div>
                </div>

                <!-- Grid / List Switcher -->
                <div class="flex items-center bg-surface-container-low p-1 rounded-lg border border-surface-variant">
                  <button id="view-mode-grid" type="button" title="Grid View" class="p-1.5 rounded bg-white text-primary shadow-xs transition-colors">
                    <span class="material-symbols-outlined text-[18px] block">grid_view</span>
                  </button>
                  <button id="view-mode-list" type="button" title="List View" class="p-1.5 rounded text-outline hover:text-primary transition-colors">
                    <span class="material-symbols-outlined text-[18px] block">view_list</span>
                  </button>
                </div>
              </div>

            </div>

            <!-- PRODUCT GRID -->
            <div id="products-grid-container" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 transition-all duration-300">

              <!-- PRODUCT 1: Kansa Vatki Bowl -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="wellness"
                       data-dosha="tridoshic"
                       data-price="1850"
                       data-rating="5.0"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Handcrafted Bronze Kansa Vatki Bowl">
                <div class="flex flex-col">
                  <!-- Media Box -->
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBy7aSAl3W3ReW2vdIEVLdvkv0kf5eJjOgS8Zf9cSUEevLbOm7X-XHElOIEesBPv2TeYk1y_geSf3x2cYWpc8tngJ-wS-99G3yVO4k5RCEDq_f_uALszwduwHP1BFsEMdokmgJxtIFci71GnJ5iTA8cZy8hsEIdoNsWuHvuqfIgSFNsvem80f6I1lgAigwHgS6fxHuur0Vh2rhlqWWZmIOSGeRdTpMSY0CUPHCWSQINiWSmvPME27m40Q"
                         alt="Handcrafted Kansa Vatki Bowl"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Dinacharya Tool
                      </span>
                      <span class="px-2 py-0.5 rounded bg-[#C66A22] text-white text-[10px] font-bold uppercase tracking-wider">
                        Tridoshic
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-white/90 text-primary text-[10px] font-bold uppercase tracking-wider border border-surface-variant">
                      78:22 Bronze
                    </span>

                    <!-- Quick Actions Overlay -->
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Handcrafted Bronze Kansa Vatki Bowl', '₹ 1,850', '₹ 2,200', 'Dinacharya &amp; Wellness Tools', 'Tridoshic (All Types)', 'Classical 78:22 copper-tin bronze alloy bowl for evening Padabhyanga foot massage. Calms the nervous system, soothes Pitta heat, and grounds erratic Vata before sleep.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBy7aSAl3W3ReW2vdIEVLdvkv0kf5eJjOgS8Zf9cSUEevLbOm7X-XHElOIEesBPv2TeYk1y_geSf3x2cYWpc8tngJ-wS-99G3yVO4k5RCEDq_f_uALszwduwHP1BFsEMdokmgJxtIFci71GnJ5iTA8cZy8hsEIdoNsWuHvuqfIgSFNsvem80f6I1lgAigwHgS6fxHuur0Vh2rhlqWWZmIOSGeRdTpMSY0CUPHCWSQINiWSmvPME27m40Q')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md" title="Quick View">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Handcrafted Bronze Kansa Vatki Bowl', 1850)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md" title="Add to Cart">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <!-- Content Details -->
                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Padabhyanga Ritual</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">5.0</span>
                        <span class="text-outline text-[10px]">(64)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Handcrafted Bronze Kansa Vatki Bowl</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Classical 78:22 copper-tin bronze alloy bowl for evening Padabhyanga massage, soothing Pitta heat and drawing out fatigue.
                    </p>

                    <!-- Price Box -->
                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 1,850</span>
                      <span class="text-xs text-outline line-through">₹ 2,200</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 16%</span>
                    </div>
                  </div>
                </div>

                <!-- Card Bottom Actions -->
                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Handcrafted Bronze Kansa Vatki Bowl', 1850)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 2: Shankhpushpi Medhya Rasayana -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="ayurveda"
                       data-dosha="vata"
                       data-price="980"
                       data-rating="4.9"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Shankhpushpi Medhya Rasayana (500g)">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCn4C4nGq0-WEybx_Q4SAeLyf2LIa1qqmGqxAgw-65WQDSw5adk3hlkLersofCRxd-il-LCdQ2QlMsRpvb08dXYu-s6uPJrntMZy1AqArqn5CdhiKPnCutjIOQwkZslx2h4aRpW3_ymOKdwprIuocLibL-ROW0fIrFRMBH0ZQk97wVUgnGDqq9qMhFRVoqzUaqou7bGUTX96MPVWD-ZoBgK-hOB_DewjwxDdEKu0ZHrbcS5rR0bBGsq7w"
                         alt="Shankhpushpi Medhya Rasayana"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Classical Ayurveda
                      </span>
                      <span class="px-2 py-0.5 rounded bg-surface-container-high text-primary text-[10px] font-bold uppercase tracking-wider border border-surface-variant">
                        Vata-Pitta
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-[#C66A22] text-white text-[10px] font-bold uppercase tracking-wider">
                      Vaidya Grade
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Shankhpushpi Medhya Rasayana (500g)', '₹ 980', '₹ 1,150', 'Classical Ayurveda', 'Vata-Pitta Calming', 'Traditional herbal paste prepared in strict accordance with Sharangadhara tenets. Enhances cognitive acuity, memory recall, and deep mental tranquility without sedation.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCn4C4nGq0-WEybx_Q4SAeLyf2LIa1qqmGqxAgw-65WQDSw5adk3hlkLersofCRxd-il-LCdQ2QlMsRpvb08dXYu-s6uPJrntMZy1AqArqn5CdhiKPnCutjIOQwkZslx2h4aRpW3_ymOKdwprIuocLibL-ROW0fIrFRMBH0ZQk97wVUgnGDqq9qMhFRVoqzUaqou7bGUTX96MPVWD-ZoBgK-hOB_DewjwxDdEKu0ZHrbcS5rR0bBGsq7w')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Shankhpushpi Medhya Rasayana (500g)', 980)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Cognitive Nourishment</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">4.9</span>
                        <span class="text-outline text-[10px]">(48)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Shankhpushpi Medhya Rasayana</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Wild Shankhpushpi, Brahmi, and Amla suspended in organic forest honey for cognitive clarity and emotional poise.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 980</span>
                      <span class="text-xs text-outline line-through">₹ 1,150</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 15%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Shankhpushpi Medhya Rasayana (500g)', 980)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 3: Directional Brass Spatial Compass -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="vastu"
                       data-dosha="tridoshic"
                       data-price="2200"
                       data-rating="4.9"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Directional Brass Spatial Compass">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAC-7Yx0d7ZTJMTu3irF0Z9L-Hv7FuJQEd7m_mlORbrwfetEjhIiNLehqZFn1WZwri3E_4bW6kcUFBWmd8Lbt0P4jpDtZ4kSVbcA0ZKIfzprSsSIP2gBGHKko4gTnrevoemBu9aBdgsb6RyUk5cDzivcEDDuyLi25Ac2FzQqop2mJCrVeRRBTZ4mpZBpXmMsUFqgItGdl9YfWEMWX3ws_wbofM8q_DOErtw_rpsIl20lVuOeTQGtnuNbQ"
                         alt="Directional Brass Spatial Compass"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Vastu Instrument
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-surface-container-high text-primary text-[10px] font-bold uppercase tracking-wider border border-surface-variant">
                      Sapphire Pivot
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Directional Brass Spatial Compass', '₹ 2,200', '₹ 2,600', 'Vastu Yantras &amp; Instruments', 'Spatial Assessment', 'Calibrated architectural orientation instrument engraved with 8 cardinal Sanskrit directional deities (Ashta Dikpalas) for residential spatial assessment.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuAC-7Yx0d7ZTJMTu3irF0Z9L-Hv7FuJQEd7m_mlORbrwfetEjhIiNLehqZFn1WZwri3E_4bW6kcUFBWmd8Lbt0P4jpDtZ4kSVbcA0ZKIfzprSsSIP2gBGHKko4gTnrevoemBu9aBdgsb6RyUk5cDzivcEDDuyLi25Ac2FzQqop2mJCrVeRRBTZ4mpZBpXmMsUFqgItGdl9YfWEMWX3ws_wbofM8q_DOErtw_rpsIl20lVuOeTQGtnuNbQ')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Directional Brass Spatial Compass', 2200)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Ishanya Alignment</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">4.9</span>
                        <span class="text-outline text-[10px]">(26)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Directional Brass Spatial Compass</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Hand-engraved Sanskrit directional markers with sapphire bearing for home and clinic spatial alignment.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 2,200</span>
                      <span class="text-xs text-outline line-through">₹ 2,600</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 15%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Directional Brass Spatial Compass', 2200)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 4: Cold-Pressed Ksheerabala Taila 101 -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="ayurveda"
                       data-dosha="vata"
                       data-price="640"
                       data-rating="4.8"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Cold-Pressed Ksheerabala Taila 101 (200ml)">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDzS8zZ9hTvmWXyEaVWRRb7ydgc1M6YKS1gbWzGeE9BKZDKaHLHr2VUFz4VJjYH4imAUA9HGIpgQxVGHHF4FHlmm7loRr5YUrWrfWNF80PTlprOxp4zkgI-0tkxvJYjkPFCBizEjj_VUrdbx7hLsKBUsgUjaoD9ITXqogppedMJtsdvadG_z_Hfod6WbSltecAewhrzhtoJ6mNWPwk-MqFAiKFDY2XnjgZktyg97f_gfKfa-tCv_xdqng"
                         alt="Cold-Pressed Ksheerabala Taila 101"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Classical Oil
                      </span>
                      <span class="px-2 py-0.5 rounded bg-surface-container-high text-primary text-[10px] font-bold uppercase tracking-wider border border-surface-variant">
                        Vata Pacifying
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-[#C66A22] text-white text-[10px] font-bold uppercase tracking-wider">
                      101 Avartana
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Cold-Pressed Ksheerabala Taila 101 (200ml)', '₹ 640', '₹ 750', 'Classical Ayurveda', 'Vata Pacifying', 'Traditional botanical infused carrier oil cold-pressed and potentiated 101 times for seasonal external Abhyanga and nervous grounding.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDzS8zZ9hTvmWXyEaVWRRb7ydgc1M6YKS1gbWzGeE9BKZDKaHLHr2VUFz4VJjYH4imAUA9HGIpgQxVGHHF4FHlmm7loRr5YUrWrfWNF80PTlprOxp4zkgI-0tkxvJYjkPFCBizEjj_VUrdbx7hLsKBUsgUjaoD9ITXqogppedMJtsdvadG_z_Hfod6WbSltecAewhrzhtoJ6mNWPwk-MqFAiKFDY2XnjgZktyg97f_gfKfa-tCv_xdqng')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Cold-Pressed Ksheerabala Taila 101 (200ml)', 640)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">External Snehana</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">4.8</span>
                        <span class="text-outline text-[10px]">(37)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Cold-Pressed Ksheerabala Taila 101</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Potentiated Bala root infusion cooked in black sesame oil and organic milk for joint ease and restorative sleep.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 640</span>
                      <span class="text-xs text-outline line-through">₹ 750</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 15%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Cold-Pressed Ksheerabala Taila 101 (200ml)', 640)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 5: Pure Hammered Copper Tamra Vessel -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="wellness"
                       data-dosha="tridoshic"
                       data-price="1650"
                       data-rating="4.9"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Pure Hammered Copper Tamra Vessel (950ml)">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDnp39dHEB6sqonm09KgyS9uLrEMJkVLKEFJ6nUwyWgeSxGHq71h6J8O_ZurTCgpJz7pnvsNg-CO6KFcxDxISHTbkpko1Mpofyx1-hqyFIpW8cjPoTptfPKHaivJJSu0X29LNrZTI5nL32l7QMuZ_TG2zpcouh4p9kbQ22r7q3IqJJdJwNbn27yJ4AAQE5xcwVHHxcC5Xkpch2w1ml2Da-PhSLfPdSkuJ_PRZ-9JoqteiZVwi2kZDUOyw"
                         alt="Pure Hammered Copper Tamra Vessel"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Dinacharya Tool
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-surface-container-high text-primary text-[10px] font-bold uppercase tracking-wider border border-surface-variant">
                      99.7% Pure Tamra
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Pure Hammered Copper Tamra Vessel (950ml)', '₹ 1,650', '₹ 1,900', 'Dinacharya &amp; Wellness Tools', 'Tridoshic (All Types)', 'Seamless hand-hammered therapeutic copper water carafe for overnight water ionization (Tamra Jal) to nourish digestive fire.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDnp39dHEB6sqonm09KgyS9uLrEMJkVLKEFJ6nUwyWgeSxGHq71h6J8O_ZurTCgpJz7pnvsNg-CO6KFcxDxISHTbkpko1Mpofyx1-hqyFIpW8cjPoTptfPKHaivJJSu0X29LNrZTI5nL32l7QMuZ_TG2zpcouh4p9kbQ22r7q3IqJJdJwNbn27yJ4AAQE5xcwVHHxcC5Xkpch2w1ml2Da-PhSLfPdSkuJ_PRZ-9JoqteiZVwi2kZDUOyw')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Pure Hammered Copper Tamra Vessel (950ml)', 1650)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Ushapan Ritual</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">4.9</span>
                        <span class="text-outline text-[10px]">(53)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Pure Hammered Copper Tamra Vessel</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Handcrafted seamless pure copper vessel for morning Tamra Jal, stimulating natural digestive Agni.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 1,650</span>
                      <span class="text-xs text-outline line-through">₹ 1,900</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 13%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Pure Hammered Copper Tamra Vessel (950ml)', 1650)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 6: Consecrated Pure Copper Sri Yantra -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="vastu"
                       data-dosha="tridoshic"
                       data-price="1350"
                       data-rating="5.0"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Consecrated Pure Copper Sri Yantra (6x6 inch)">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD8juB7TBTktsdUCBiK4KbanpwQ77NnlBbrbNqBhbp37-5czt7yG2FU3SCzIVGXPwrI1KMUAG7y8ag9IW6lX5yGXlUAuBSUCq-46Nf6cM_FZIt_jpmCcW3mMDmSodkof__MGonX9MBbdHQDhLAeO4ttTZOV2tGm2Pc2DD-YWKoQE0bcec3OwMdV1bQMFt5NXgFyiXqwDmUvqllEQ_yOQyS2Z_E3xs6asw68M_fT1yY1j5CXFtTfzpM1xA"
                         alt="Consecrated Pure Copper Sri Yantra"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Vastu Remedy
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-[#B38A3E] text-white text-[10px] font-bold uppercase tracking-wider">
                      Consecrated
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Consecrated Pure Copper Sri Yantra (6x6 inch)', '₹ 1,350', '₹ 1,600', 'Vastu Yantras &amp; Instruments', 'Spatial Energization', 'Deeply etched sacred geometry plate in pure heavy copper. Consecrated during auspicious lunar nakshatra to harmonize North-East residential vectors.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuD8juB7TBTktsdUCBiK4KbanpwQ77NnlBbrbNqBhbp37-5czt7yG2FU3SCzIVGXPwrI1KMUAG7y8ag9IW6lX5yGXlUAuBSUCq-46Nf6cM_FZIt_jpmCcW3mMDmSodkof__MGonX9MBbdHQDhLAeO4ttTZOV2tGm2Pc2DD-YWKoQE0bcec3OwMdV1bQMFt5NXgFyiXqwDmUvqllEQ_yOQyS2Z_E3xs6asw68M_fT1yY1j5CXFtTfzpM1xA')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Consecrated Pure Copper Sri Yantra (6x6 inch)', 1350)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Spatial Alignment</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">5.0</span>
                        <span class="text-outline text-[10px]">(42)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Consecrated Pure Copper Sri Yantra</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Heavy gauge pure copper sheet engraved with classical 9 cosmic interlocking triangles for spatial peace.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 1,350</span>
                      <span class="text-xs text-outline line-through">₹ 1,600</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 15%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Consecrated Pure Copper Sri Yantra (6x6 inch)', 1350)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 7: Natural Fibre Kusha Grass Meditation Mat -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="wellness"
                       data-dosha="tridoshic"
                       data-price="1420"
                       data-rating="4.8"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Natural Fibre Kusha Grass Meditation Mat">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9kEViU2A22uD9e8QNOQfRdX5oDuXGhHq4IFaXv9XB3C7e3Cjy_WmL5yFj56RW_p3N90eMlzTxzaTefRY7Lrc6u-rLSSNxhUCJRRXgcXhPncL1dEmY0tCcURGPDutavGCFSVrHX4PDVCE-8jvDGISKV0-qw3XW-OdsQdclRDOiYM1yPf1yFAqcXsZBvgSd1v0YLTT8dH_DCwOhg2fMqBrtXI1_aNAtC_f-CuKoEuXZBflZKNJBJMDD4g"
                         alt="Natural Fibre Kusha Grass Meditation Mat"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Dinacharya Tool
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-surface-container-high text-primary text-[10px] font-bold uppercase tracking-wider border border-surface-variant">
                      Hand-Loomed
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Natural Fibre Kusha Grass Meditation Mat', '₹ 1,420', '₹ 1,700', 'Dinacharya &amp; Wellness Tools', 'Tridoshic (All Types)', 'Handwoven organic cotton and kusha grass mat intended for daily contemplative routines, pranayama, and grounded stillness.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuA9kEViU2A22uD9e8QNOQfRdX5oDuXGhHq4IFaXv9XB3C7e3Cjy_WmL5yFj56RW_p3N90eMlzTxzaTefRY7Lrc6u-rLSSNxhUCJRRXgcXhPncL1dEmY0tCcURGPDutavGCFSVrHX4PDVCE-8jvDGISKV0-qw3XW-OdsQdclRDOiYM1yPf1yFAqcXsZBvgSd1v0YLTT8dH_DCwOhg2fMqBrtXI1_aNAtC_f-CuKoEuXZBflZKNJBJMDD4g')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Natural Fibre Kusha Grass Meditation Mat', 1420)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Pranayama Sadhana</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">4.8</span>
                        <span class="text-outline text-[10px]">(38)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Natural Fibre Kusha Meditation Mat</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Handwoven sacred Kusha grass interwoven with unbleached cotton for grounded seated stability.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 1,420</span>
                      <span class="text-xs text-outline line-through">₹ 1,700</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 16%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Natural Fibre Kusha Grass Meditation Mat', 1420)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 8: Tejas Digestive Botanical Herbal Tisane -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="tea"
                       data-dosha="tridoshic"
                       data-price="520"
                       data-rating="4.7"
                       data-instock="true"
                       data-consecrated="false"
                       data-name="Tejas Digestive Botanical Herbal Tisane (250g)">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBROB01nkP9QXGg6FnyBdk6s5yY1ZD61TBlFzfvkfiTFl5_WLU3sTBbk0BUtoOtIWQhGFuuExi-N_qCMDiswF4pnzlwwklyAsTkh_VZx24h2Ykmm3L0ejQ0LUmASphfVRk9fccMlUj5EYYBuSZ8KkPe1anV1xa-62WQHsCEpzVdAfvljOc0CizI7aflg5dLi_1sSwKOp4OTSGu23jmXwqrYgLRVtClWkAjfVyZVbpg0bTQ5yxMdA2DfPw"
                         alt="Tejas Digestive Botanical Herbal Tisane"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Botanical Tisane
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-surface-container-high text-primary text-[10px] font-bold uppercase tracking-wider border border-surface-variant">
                      Caffeine-Free
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Tejas Digestive Botanical Herbal Tisane (250g)', '₹ 520', '₹ 620', 'Tisanes &amp; Teas', 'Agni Support / Tridoshic', 'Digestive botanical infusion crafted with traditional culinary spices to support physiological metabolism and mental lightness without stimulating excess Pitta.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBROB01nkP9QXGg6FnyBdk6s5yY1ZD61TBlFzfvkfiTFl5_WLU3sTBbk0BUtoOtIWQhGFuuExi-N_qCMDiswF4pnzlwwklyAsTkh_VZx24h2Ykmm3L0ejQ0LUmASphfVRk9fccMlUj5EYYBuSZ8KkPe1anV1xa-62WQHsCEpzVdAfvljOc0CizI7aflg5dLi_1sSwKOp4OTSGu23jmXwqrYgLRVtClWkAjfVyZVbpg0bTQ5yxMdA2DfPw')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Tejas Digestive Botanical Herbal Tisane (250g)', 520)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Agni Enhancement</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">4.7</span>
                        <span class="text-outline text-[10px]">(49)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Tejas Digestive Herbal Tisane</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Dry ginger, cardamom, holy basil, and roasted cumin to kindle digestion without aggravating Pitta heat.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 520</span>
                      <span class="text-xs text-outline line-through">₹ 620</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 16%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Tejas Digestive Botanical Herbal Tisane (250g)', 520)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 9: Brahmi Vati Gold Grade -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="ayurveda"
                       data-dosha="pitta"
                       data-price="950"
                       data-rating="4.9"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Brahmi Vati Gold Grade (60 Tablets)">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDb6QxaPzM40dQy9YjSGVey-gVhll5SEY7Ir_xH6Fzzg1NSd2Fors_n8mtyXLZvjrsxRSZqA6RRwsrEsoLscnTHQly16AhlZjB4mmff8G9Do1fqvaujacy3_G8UCM8bhpzhOdKI0r9bi-FfSB8ItNtx7gI6YbAwJ2cddqXejqchE_7RxH0ejS49E4Ndn3MWPje1I6TYDE2avBWVV6QpVGVBlJ-5xf064KYQefqsbMppdpgxfmZPfSZdqQ"
                         alt="Brahmi Vati Gold Grade"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Classical Ayurveda
                      </span>
                      <span class="px-2 py-0.5 rounded bg-surface-container-high text-primary text-[10px] font-bold uppercase tracking-wider border border-surface-variant">
                        Pitta Cooling
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-[#C66A22] text-white text-[10px] font-bold uppercase tracking-wider">
                      Suvarna Vati
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Brahmi Vati Gold Grade (60 Tablets)', '₹ 950', '₹ 1,100', 'Classical Ayurveda', 'Pitta-Vata Calming', 'Standardized classical tablet preparation featuring purified Bacopa monnieri, Shankhpushpi, and Swarna Bhasma traces for acute cognitive exhaustion.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDb6QxaPzM40dQy9YjSGVey-gVhll5SEY7Ir_xH6Fzzg1NSd2Fors_n8mtyXLZvjrsxRSZqA6RRwsrEsoLscnTHQly16AhlZjB4mmff8G9Do1fqvaujacy3_G8UCM8bhpzhOdKI0r9bi-FfSB8ItNtx7gI6YbAwJ2cddqXejqchE_7RxH0ejS49E4Ndn3MWPje1I6TYDE2avBWVV6QpVGVBlJ-5xf064KYQefqsbMppdpgxfmZPfSZdqQ')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Brahmi Vati Gold Grade (60 Tablets)', 950)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Medhya Support</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">4.9</span>
                        <span class="text-outline text-[10px]">(58)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Brahmi Vati Gold Grade</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Micro-pulverized Brahmi with Suvarna micro-traces for mental stamina, memory retention, and nervous equilibrium.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 950</span>
                      <span class="text-xs text-outline line-through">₹ 1,100</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 14%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Brahmi Vati Gold Grade (60 Tablets)', 950)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 10: Vastu Brass Pyramid Energy Stabilizer -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="vastu"
                       data-dosha="tridoshic"
                       data-price="4800"
                       data-rating="5.0"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Vastu Brass Pyramid Energy Stabilizer (Set of 9)">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDG3b7zIrv33h2LYwhCoyPOHqkymSSlMyK_sZEGTIH8dqMfS8Os5x6IOGsW4dZ_YyGtlmGrsmIjQfRDGlyM3FL5P0clSVLzeZrRg_av2Anp2pxaoSHsP8k8uzc2Hi9N65vTxEhFSNUyEh1_tFDcO_FDu4jReOmNt7bhz9jqWac8cDm7ENDczBmYWeE9oprMHlcu5WEnfmfbaPUPdzZ4XaAnnIa5o5n5wf0ikii1-BVF0P6Ihx2W-X_7Lg"
                         alt="Vastu Brass Pyramid Energy Stabilizer"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Vastu Remedy
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-[#B38A3E] text-white text-[10px] font-bold uppercase tracking-wider">
                      Master Instrument
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Vastu Brass Pyramid Energy Stabilizer (Set of 9)', '₹ 4,800', '₹ 5,400', 'Vastu Yantras &amp; Instruments', 'Spatial Energization', 'Solid bell-brass pyramid grid engineered to harmonize directional faults without structural demolition in residences and workspaces.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDG3b7zIrv33h2LYwhCoyPOHqkymSSlMyK_sZEGTIH8dqMfS8Os5x6IOGsW4dZ_YyGtlmGrsmIjQfRDGlyM3FL5P0clSVLzeZrRg_av2Anp2pxaoSHsP8k8uzc2Hi9N65vTxEhFSNUyEh1_tFDcO_FDu4jReOmNt7bhz9jqWac8cDm7ENDczBmYWeE9oprMHlcu5WEnfmfbaPUPdzZ4XaAnnIa5o5n5wf0ikii1-BVF0P6Ihx2W-X_7Lg')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Vastu Brass Pyramid Energy Stabilizer (Set of 9)', 4800)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Bio-Geometric Rectification</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">5.0</span>
                        <span class="text-outline text-[10px]">(21)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Vastu Brass Pyramid Energy Stabilizer</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Solid brass 9-pyramid grid engineered for non-destructive energy amplification in compromised floor plans.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 4,800</span>
                      <span class="text-xs text-outline line-through">₹ 5,400</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 11%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Vastu Brass Pyramid Energy Stabilizer (Set of 9)', 4800)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 11: Kumkumadi Tailam Miraculous Saffron Oil -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="ayurveda"
                       data-dosha="tridoshic"
                       data-price="1650"
                       data-rating="5.0"
                       data-instock="true"
                       data-consecrated="true"
                       data-name="Kumkumadi Tailam Saffron Beauty Oil (30ml)">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDzS8zZ9hTvmWXyEaVWRRb7ydgc1M6YKS1gbWzGeE9BKZDKaHLHr2VUFz4VJjYH4imAUA9HGIpgQxVGHHF4FHlmm7loRr5YUrWrfWNF80PTlprOxp4zkgI-0tkxvJYjkPFCBizEjj_VUrdbx7hLsKBUsgUjaoD9ITXqogppedMJtsdvadG_z_Hfod6WbSltecAewhrzhtoJ6mNWPwk-MqFAiKFDY2XnjgZktyg97f_gfKfa-tCv_xdqng"
                         alt="Kumkumadi Tailam Saffron Beauty Oil"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Classical Ayurveda
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-[#C66A22] text-white text-[10px] font-bold uppercase tracking-wider">
                      Pure Saffron
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Kumkumadi Tailam Saffron Beauty Oil (30ml)', '₹ 1,650', '₹ 1,950', 'Classical Ayurveda', 'Tridoshic Beauty', 'Formulated according to Ashtanga Hridaya using 26 precious herbs, Kashmiri saffron, red sandalwood, and organic goat milk for cellular radiance.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuDzS8zZ9hTvmWXyEaVWRRb7ydgc1M6YKS1gbWzGeE9BKZDKaHLHr2VUFz4VJjYH4imAUA9HGIpgQxVGHHF4FHlmm7loRr5YUrWrfWNF80PTlprOxp4zkgI-0tkxvJYjkPFCBizEjj_VUrdbx7hLsKBUsgUjaoD9ITXqogppedMJtsdvadG_z_Hfod6WbSltecAewhrzhtoJ6mNWPwk-MqFAiKFDY2XnjgZktyg97f_gfKfa-tCv_xdqng')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Kumkumadi Tailam Saffron Beauty Oil (30ml)', 1650)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Varnya Radiance</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">5.0</span>
                        <span class="text-outline text-[10px]">(91)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Kumkumadi Tailam Saffron Oil</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Classical Ashtanga formulation cooked with pure Kashmiri saffron for cellular brightness and tone clarity.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 1,650</span>
                      <span class="text-xs text-outline line-through">₹ 1,950</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 15%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Kumkumadi Tailam Saffron Beauty Oil (30ml)', 1650)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

              <!-- PRODUCT 12: Shanti Ayurvedic Herbal Sleep Tisane -->
              <article class="product-item group bg-white rounded-xl overflow-hidden border border-surface-variant hover:border-[#B38A3E] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between"
                       data-category="tea"
                       data-dosha="vata"
                       data-price="480"
                       data-rating="4.8"
                       data-instock="true"
                       data-consecrated="false"
                       data-name="Shanti Ayurvedic Herbal Sleep Tisane (200g)">
                <div class="flex flex-col">
                  <div class="relative w-full aspect-square bg-surface-container overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBROB01nkP9QXGg6FnyBdk6s5yY1ZD61TBlFzfvkfiTFl5_WLU3sTBbk0BUtoOtIWQhGFuuExi-N_qCMDiswF4pnzlwwklyAsTkh_VZx24h2Ykmm3L0ejQ0LUmASphfVRk9fccMlUj5EYYBuSZ8KkPe1anV1xa-62WQHsCEpzVdAfvljOc0CizI7aflg5dLi_1sSwKOp4OTSGu23jmXwqrYgLRVtClWkAjfVyZVbpg0bTQ5yxMdA2DfPw"
                         alt="Shanti Ayurvedic Herbal Sleep Tisane"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                      <span class="px-2.5 py-1 rounded bg-[#1F4D3A] text-white text-[10px] font-bold uppercase tracking-wider">
                        Botanical Tisane
                      </span>
                    </div>
                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded bg-surface-container-high text-primary text-[10px] font-bold uppercase tracking-wider border border-surface-variant">
                      Night Elixir
                    </span>

                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center justify-center gap-2">
                      <button type="button" onclick="openQuickViewModal('Shanti Ayurvedic Herbal Sleep Tisane (200g)', '₹ 480', '₹ 580', 'Tisanes &amp; Teas', 'Vata-Pitta Relaxing', 'Soothing bedtime infusion of Indian valerian (Tagara), Shankhpushpi, nutmeg, and organic chamomile to promote deep, uninterrupted REM rest.', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBROB01nkP9QXGg6FnyBdk6s5yY1ZD61TBlFzfvkfiTFl5_WLU3sTBbk0BUtoOtIWQhGFuuExi-N_qCMDiswF4pnzlwwklyAsTkh_VZx24h2Ykmm3L0ejQ0LUmASphfVRk9fccMlUj5EYYBuSZ8KkPe1anV1xa-62WQHsCEpzVdAfvljOc0CizI7aflg5dLi_1sSwKOp4OTSGu23jmXwqrYgLRVtClWkAjfVyZVbpg0bTQ5yxMdA2DfPw')" class="p-2.5 bg-white text-primary rounded-full hover:bg-secondary hover:text-white transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">visibility</span>
                      </button>
                      <button type="button" onclick="addToCart('Shanti Ayurvedic Herbal Sleep Tisane (200g)', 480)" class="p-2.5 bg-primary text-white rounded-full hover:bg-secondary transition-colors shadow-md">
                        <span class="material-symbols-outlined text-[20px] block">add_shopping_cart</span>
                      </button>
                    </div>
                  </div>

                  <div class="p-5 flex flex-col gap-2">
                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant uppercase tracking-wider">
                      <span class="text-secondary font-semibold">Nidra Support</span>
                      <div class="flex items-center gap-1 text-[#B38A3E]">
                        <span class="material-symbols-outlined text-[14px]">star</span>
                        <span class="font-bold text-on-surface">4.8</span>
                        <span class="text-outline text-[10px]">(34)</span>
                      </div>
                    </div>

                    <h3 class="font-display text-lg font-bold text-primary group-hover:text-secondary transition-colors leading-snug">
                      <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Shanti Herbal Sleep Tisane</a>
                    </h3>
                    
                    <p class="text-xs text-on-surface-variant line-clamp-2 leading-relaxed">
                      Tagara, Shankhpushpi, and fragrant chamomile blended to soothe nervous over-stimulation before nightfall.
                    </p>

                    <div class="pt-2 flex items-baseline gap-2">
                      <span class="font-display text-xl font-bold text-primary">₹ 480</span>
                      <span class="text-xs text-outline line-through">₹ 580</span>
                      <span class="text-[11px] font-semibold text-secondary">Save 17%</span>
                    </div>
                  </div>
                </div>

                <div class="p-5 pt-0 grid grid-cols-2 gap-2">
                  <a href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>" class="py-2.5 px-3 text-center rounded-lg border border-surface-variant text-primary hover:bg-surface-container font-semibold text-xs uppercase tracking-wider transition-colors">
                    Details
                  </a>
                  <button type="button" onclick="addToCart('Shanti Ayurvedic Herbal Sleep Tisane (200g)', 480)" class="py-2.5 px-3 bg-primary text-white hover:bg-secondary rounded-lg font-semibold text-xs uppercase tracking-wider transition-colors shadow-xs flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-[16px]">shopping_bag</span>
                    <span>Add</span>
                  </button>
                </div>
              </article>

            </div>

            <!-- EMPTY STATE: NO MATCHING REMEDIES -->
            <div id="no-products-state" class="hidden bg-white rounded-xl border border-surface-variant p-12 text-center space-y-4">
              <div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center mx-auto text-secondary">
                <span class="material-symbols-outlined text-[32px]">filter_list_off</span>
              </div>
              <h3 class="font-display text-2xl font-bold text-primary">No Dispensary Remedies Found</h3>
              <p class="text-sm text-on-surface-variant max-w-md mx-auto leading-relaxed">
                No items match your active filter criteria. Try expanding your price range, searching for different botanical herbs, or clearing your filters.
              </p>
              <button type="button" onclick="resetAllFilters()" class="inline-flex items-center gap-2 px-6 py-2.5 bg-primary text-white text-xs font-semibold uppercase tracking-wider rounded-lg hover:bg-secondary transition-colors">
                <span class="material-symbols-outlined text-[16px]">restart_alt</span>
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
                <span class="material-symbols-outlined text-[26px]">biotech</span>
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
                <span class="material-symbols-outlined text-[26px]">balance</span>
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
                <span class="material-symbols-outlined text-[26px]">psychology_alt</span>
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
              <span class="material-symbols-outlined text-secondary transition-transform duration-200">add</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-on-surface-variant border-t border-surface-variant/40 pt-3 leading-relaxed">
              Every remedy features clear Doshic indicators (Vata, Pitta, Kapha, or Tridoshic). If you are uncertain about your current biological state (Vikriti), we strongly recommend booking a brief pulse analysis (Nadi Pariksha) or introductory clinical video consultation before initiating intensive internal Rasayanas.
            </div>
          </div>

          <div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all">
            <button type="button" aria-expanded="false" class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left focus:outline-none">
              <span class="font-display text-base sm:text-lg font-semibold text-primary">What makes ANUKUL Kansa Vatki bowls distinct from mass commercial bronze?</span>
              <span class="material-symbols-outlined text-secondary transition-transform duration-200">add</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-on-surface-variant border-t border-surface-variant/40 pt-3 leading-relaxed">
              Commercial bronze often contains traces of lead, nickel, or zinc to reduce manufacturing costs. ANUKUL Kansa bowls are strictly crafted from 78% pure copper and 22% pure tin bell-metal alloys, hand-hammered by hereditary artisan families and verified safe for prolonged skin contact with warm ghee or medicated oils.
            </div>
          </div>

          <div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all">
            <button type="button" aria-expanded="false" class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left focus:outline-none">
              <span class="font-display text-base sm:text-lg font-semibold text-primary">What are your domestic dispatch and temperature-cushioned delivery timelines?</span>
              <span class="material-symbols-outlined text-secondary transition-transform duration-200">add</span>
            </button>
            <div class="faq-content hidden px-6 pb-5 text-xs sm:text-sm text-on-surface-variant border-t border-surface-variant/40 pt-3 leading-relaxed">
              All physical orders are processed within 24 to 48 hours. Classical herbal oils and sensitive Rasayanas are packaged in recyclable, temperature-buffered natural fibers. Standard surface delivery spans 3 to 6 business days across India, with live tracking sent via SMS and WhatsApp.
            </div>
          </div>

          <div class="faq-item rounded-xl bg-surface-container-low border border-surface-variant overflow-hidden transition-all">
            <button type="button" aria-expanded="false" class="faq-toggle w-full px-6 py-4 flex items-center justify-between text-left focus:outline-none">
              <span class="font-display text-base sm:text-lg font-semibold text-primary">Are your Vastu Yantras consecrated prior to shipment?</span>
              <span class="material-symbols-outlined text-secondary transition-transform duration-200">add</span>
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
          <span class="material-symbols-outlined text-secondary text-[18px]">info</span>
          <p>
            <strong>Responsible Practice Note:</strong> Products and information are presented for verified traditional Ayurvedic wellness and spatial study. These are not intended to replace licensed medical emergency treatment.
          </p>
        </div>
        <a href="contact.html#disclaimer" class="font-semibold text-secondary hover:text-primary underline whitespace-nowrap">
          Read Disclaimer →
        </a>
      </div>
    </aside>

<?php
get_footer( 'shop' );

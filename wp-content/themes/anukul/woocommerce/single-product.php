<?php
/**
 * The Template for displaying all single products
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header( 'shop' );

global $post;
$current_product_id = get_the_ID();
$product = wc_get_product( $current_product_id );

if ( ! $product ) {
    $fallback_post = get_page_by_path( 'handcrafted-bronze-kansa-vatki-bowl', OBJECT, 'product' );
    if ( $fallback_post ) {
        $current_product_id = $fallback_post->ID;
        $product = wc_get_product( $current_product_id );
    }
}

$title       = $product ? $product->get_name() : 'Sacred Ayurvedic Remedy';
$price       = $product ? (float) $product->get_price() : 1850;
$reg_price   = $product ? (float) $product->get_regular_price() : 2200;
$sale_price  = $product ? (float) $product->get_sale_price() : 1850;
$short_desc  = $product ? ( $product->get_short_description() ?: $product->get_description() ) : '';
$full_desc   = $product ? $product->get_description() : '';
$in_stock    = $product ? $product->is_in_stock() : true;

$terms       = $product ? get_the_terms( $current_product_id, 'product_cat' ) : array();
$cat_name    = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Classical Ayurveda';

$dosha       = get_post_meta( $current_product_id, '_dosha', true ) ?: 'tridoshic';
$badge       = get_post_meta( $current_product_id, '_badge', true ) ?: 'Vaidya Grade';
$subheading  = get_post_meta( $current_product_id, '_ritual_subheading', true ) ?: 'Classical Formulation';
$main_image  = get_post_meta( $current_product_id, '_anukul_image_url', true ) ?: ( has_post_thumbnail( $current_product_id ) ? get_the_post_thumbnail_url( $current_product_id, 'large' ) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDraDpqQ9cYTI2TALEKNJwdd47SbmjcRasxQIL2TfKMVZncJeuWlUHF4S2ce-z58l1r68WgUxwpIaGF6Iw2tcDbpxMqx9HyChTF-cab6-8cNk8x-MwNx1pbv9fAVi5w5ND-_VjoN13TLRFBro0NxuiXwnGZ4QZtTS56XJTQhN_2StpHvhGVKX632z3Wpg6sjGcih2JwtsnEyj7MnRk2SkyDcbvU4_rLXuNO5sKf38mGig1X-8r_pdEJ4w' );
?>

<div class="flex flex-col w-full">
<!-- SECTION 1: BREADCRUMB NAVIGATION -->
<nav aria-label="Breadcrumb" class="w-full bg-surface-container-low/70 py-3.5">
<div class="max-w-[1440px] mx-auto px-6 lg:px-margin flex items-center gap-2 font-label-md text-label-md tracking-wider text-on-surface-variant uppercase">
<a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( "/" ) ); ?>">Home</a>
<span class="material-symbols-outlined notranslate text-[14px] text-outline" translate="no">chevron_right</span>
<a class="hover:text-primary transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Shop</a>
<span class="material-symbols-outlined notranslate text-[14px] text-outline" translate="no">chevron_right</span>
<span class="text-primary font-semibold truncate"><?php echo esc_html( $title ); ?></span>
</div>
</nav>
<!-- SECTION 2: MAIN PRODUCT HERO & PURCHASING -->
<section class="w-full py-space-lg lg:py-space-xl">
<div class="max-w-[1440px] mx-auto px-6 lg:px-margin">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-gutter-lg items-start">
<!-- LEFT: GALLERY COMPONENT -->
<div class="lg:col-span-7 flex flex-col gap-4">
<!-- Main Showcase Image -->
<div class="relative w-full aspect-[4/3] sm:aspect-[16/11] bg-surface-container rounded-lg overflow-hidden shadow-sm group">
<img class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" id="main-product-image" src="<?php echo esc_url( $main_image ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
<!-- Visual Inspect Action Chip -->
<button class="absolute top-4 right-4 bg-surface/90 text-primary hover:bg-primary hover:text-on-primary transition-colors p-2.5 rounded-lg backdrop-blur-sm shadow-sm flex items-center justify-center cursor-pointer notranslate" translate="no" onclick="showImageModal()" title="Inspect Instrument Detail" type="button">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">zoom_in</span>
</button>
<div class="absolute bottom-4 left-4 bg-primary/85 text-on-primary backdrop-blur-sm px-3.5 py-1.5 rounded-lg flex items-center gap-2 notranslate" translate="no">
<span class="w-1.5 h-1.5 rounded-full bg-secondary-fixed"></span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-[#E8D8BC]"><?php echo esc_html( $badge ); ?></span>
</div>
</div>
<!-- Interactive Thumbnails -->
<div class="grid grid-cols-4 gap-3">
<button class="thumb-btn aspect-square rounded-lg bg-surface-container overflow-hidden shadow-sm transition-all duration-200 ring-2 ring-primary" onclick="switchThumb(0, this)" type="button">
<img class="w-full h-full object-cover" src="<?php echo esc_url( $main_image ); ?>" alt="<?php echo esc_attr( $title ); ?> Thumbnail"/>
</button>
<button class="thumb-btn aspect-square rounded-lg bg-surface-container overflow-hidden shadow-sm opacity-70 hover:opacity-100 transition-all duration-200" onclick="switchThumb(1, this)" type="button">
<img class="w-full h-full object-cover" src="<?php echo esc_url( $main_image ); ?>" alt="<?php echo esc_attr( $title ); ?> Detail"/>
</button>
<button class="thumb-btn aspect-square rounded-lg bg-surface-container overflow-hidden shadow-sm opacity-70 hover:opacity-100 transition-all duration-200" onclick="switchThumb(2, this)" type="button">
<img class="w-full h-full object-cover" src="<?php echo esc_url( $main_image ); ?>" alt="<?php echo esc_attr( $title ); ?> Preparation"/>
</button>
<button class="thumb-btn aspect-square rounded-lg bg-surface-container overflow-hidden shadow-sm opacity-70 hover:opacity-100 transition-all duration-200" onclick="switchThumb(3, this)" type="button">
<img class="w-full h-full object-cover" src="<?php echo esc_url( $main_image ); ?>" alt="<?php echo esc_attr( $title ); ?> Heritage Pack"/>
</button>
</div>
</div>
<!-- RIGHT: PRODUCT INFO & ACTION PANEL -->
<div class="lg:col-span-5 flex flex-col justify-between">
<div class="space-y-4">
<!-- Eyebrow Category -->
<div class="flex items-center gap-2">
<span class="font-label-sm text-label-sm uppercase tracking-[0.16em] text-secondary font-bold">
    <?php echo esc_html( strtoupper( $cat_name ) ); ?> &bull; <?php echo esc_html( strtoupper( $subheading ) ); ?>
</span>
</div>
<!-- Product Title -->
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight leading-tight">
  <?php echo esc_html( $title ); ?>
</h1>
<!-- Authenticity Badge -->
<div class="inline-flex items-center gap-2 bg-surface-container-high px-3 py-1.5 rounded-lg notranslate" translate="no">
<span class="material-symbols-outlined notranslate text-[16px] text-secondary" translate="no" style="font-variation-settings: 'FILL' 1;">verified</span>
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">
    <?php echo esc_html( $badge ); ?> &bull; Classical Dispensary Formulation
</span>
</div>
<!-- Short Narrative -->
<div class="font-body-md text-body-md text-on-surface-variant leading-relaxed pt-1">
  <?php echo wp_kses_post( $short_desc ); ?>
</div>
<!-- Price and Tax Status -->
<div class="pt-2 pb-3">
<div class="flex items-baseline gap-3 notranslate" translate="no">
<span class="font-headline-lg text-headline-lg text-primary font-medium tracking-tight">₹ <?php echo number_format( $price ); ?></span>
<span class="font-body-sm text-body-sm text-outline font-normal">INR (Incl. of all taxes)</span>
</div>
<div class="flex items-center gap-2 mt-2">
<span class="w-2.5 h-2.5 rounded-full <?php echo $in_stock ? 'bg-emerald-700 animate-pulse' : 'bg-rose-600'; ?>"></span>
<span class="font-label-md text-label-md text-primary font-semibold tracking-wide uppercase"><?php echo $in_stock ? 'In Stock · Ready for Dispatch' : 'Out of Stock'; ?></span>
</div>
</div>

<!-- Variant Option Selector -->
<div class="space-y-2 pt-2">
<label class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant block">
                Bowl Diameter &amp; Weight
              </label>
<div class="grid grid-cols-2 gap-3" id="variant-group">
<button class="variant-btn p-3 rounded-lg text-left bg-surface-container transition-all ring-2 ring-primary" onclick="selectVariant(this, '₹ 2,450')" type="button">
<span class="block font-label-md text-label-md text-primary uppercase font-bold tracking-wider">Standard Personal</span>
<span class="block font-body-sm text-body-sm text-on-surface-variant mt-0.5">7.5 cm · 160g approx.</span>
</button>
<button class="variant-btn p-3 rounded-lg text-left bg-surface-container transition-all hover:bg-surface-container-high" onclick="selectVariant(this, '₹ 3,250')" type="button">
<span class="block font-label-md text-label-md text-primary uppercase font-bold tracking-wider">Practitioner Large</span>
<span class="block font-body-sm text-body-sm text-on-surface-variant mt-0.5">9.5 cm · 280g approx.</span>
</button>
</div>
</div>
<!-- Quantity & Actions -->
<div class="space-y-4 pt-3">
<div class="flex items-center gap-4">
<span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Quantity</span>
<div class="flex items-center bg-surface-container rounded-lg overflow-hidden shadow-sm">
<button aria-label="Decrease quantity" class="px-3.5 py-2 hover:bg-surface-container-highest text-primary transition-colors font-bold" onclick="adjustQty(-1)" type="button">−</button>
<span class="px-5 py-2 font-label-md text-label-md font-semibold text-primary select-none" id="qty-display">1</span>
<button aria-label="Increase quantity" class="px-3.5 py-2 hover:bg-surface-container-highest text-primary transition-colors font-bold" onclick="adjustQty(1)" type="button">+</button>
</div>
</div>
<!-- Action Buttons -->
<div class="flex flex-col sm:flex-row gap-3 pt-2">
<button class="flex-1 bg-primary text-[#F7F1E3] font-label-md text-label-md uppercase tracking-wider py-3.5 px-6 rounded-lg hover:bg-tertiary transition-colors duration-200 shadow-sm flex items-center justify-center gap-2 cursor-pointer" onclick="handleSingleAddToCart()" type="button">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">shopping_bag</span>
                  ADD TO CART
                </button>
<button class="flex-1 bg-tertiary text-on-tertiary font-label-md text-label-md uppercase tracking-wider py-3.5 px-6 rounded-lg hover:bg-[#400012] transition-colors duration-200 shadow-sm flex items-center justify-center gap-2 cursor-pointer" onclick="handleSingleBuyNow()" type="button">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">bolt</span>
                  BUY NOW
                </button>
</div>
<div class="hidden p-3 bg-primary text-[#F7F1E3] rounded-lg text-center font-label-md text-label-md uppercase tracking-wider transition-all shadow-md" id="cart-toast">
                Added to Sanctuary Cart
              </div>
</div>
<!-- Micro Trust & Care Blocks -->
<div class="grid grid-cols-1 gap-2.5 pt-4">
<div class="flex items-start gap-3 p-3 bg-surface-container-low rounded-lg">
<span class="material-symbols-outlined notranslate text-secondary text-[20px] shrink-0 mt-0.5" translate="no">local_shipping</span>
<div>
<span class="font-label-md text-label-md uppercase font-semibold text-primary block">Surface Shipping</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">Dispatched in 2–3 business days via verified surface delivery across India.</p>
</div>
</div>
<div class="flex items-start gap-3 p-3 bg-surface-container-low rounded-lg">
<span class="material-symbols-outlined notranslate text-secondary text-[20px] shrink-0 mt-0.5" translate="no">published_with_changes</span>
<div>
<span class="font-label-md text-label-md uppercase font-semibold text-primary block">Sanctuary Guarantee</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">7-day exchange window for unused, intact ritual instruments in original box.</p>
</div>
</div>
<div class="flex items-start gap-3 p-3 bg-surface-container-low rounded-lg">
<span class="material-symbols-outlined notranslate text-secondary text-[20px] shrink-0 mt-0.5" translate="no">spa</span>
<div>
<span class="font-label-md text-label-md uppercase font-semibold text-primary block">Care Recommendation</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">Clean gently with organic tamarind paste or lemon-salt; dry thoroughly after use.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 3: STRUCTURED INFORMATION ACCORDION & DEEP TABS -->
<section class="w-full bg-surface-container-low py-space-xl">
<div class="max-w-[1440px] mx-auto px-6 lg:px-margin">
<div class="max-w-4xl mx-auto space-y-6">
<!-- Tab Navigation Header -->
<div class="flex flex-wrap border-b border-[#E8D8BC] pb-1 gap-2 sm:gap-6 justify-center">
<button class="tab-btn font-label-md text-label-md uppercase tracking-wider py-2.5 px-3 sm:px-4 text-primary font-bold relative after:absolute after:bottom-[-5px] after:left-0 after:w-full after:h-[2px] after:bg-secondary" onclick="switchTab(0)" type="button">
            01. Clinical Overview
          </button>
<button class="tab-btn font-label-md text-label-md uppercase tracking-wider py-2.5 px-3 sm:px-4 text-on-surface-variant hover:text-primary transition-colors" onclick="switchTab(1)" type="button">
            02. Specifications
          </button>
<button class="tab-btn font-label-md text-label-md uppercase tracking-wider py-2.5 px-3 sm:px-4 text-on-surface-variant hover:text-primary transition-colors" onclick="switchTab(2)" type="button">
            03. How to Use (Dinacharya)
          </button>
<button class="tab-btn font-label-md text-label-md uppercase tracking-wider py-2.5 px-3 sm:px-4 text-on-surface-variant hover:text-primary transition-colors" onclick="switchTab(3)" type="button">
            04. Shipping &amp; Care
          </button>
</div>
<!-- Tab 01: Overview Content -->
<div class="tab-pane bg-surface p-6 sm:p-8 rounded-lg shadow-sm space-y-4" id="tab-content-0">
<h2 class="font-headline-md text-headline-md text-primary"><?php echo esc_html( $title ); ?> — Classical Formulation &amp; Overview</h2>
<div class="font-body-md text-body-md text-on-surface-variant leading-relaxed space-y-3">
  <?php echo wpautop( wp_kses_post( $full_desc ?: $short_desc ) ); ?>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
<div class="bg-surface-container p-4 rounded-lg">
<span class="font-headline-sm text-headline-sm text-primary block">Dosha Alignment: <?php echo esc_html( ucfirst( $dosha ) ); ?></span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
  Formulated according to authentic Ayurvedic principles to harmonize biological energies and restore constitutional equilibrium.
</p>
</div>
<div class="bg-surface-container p-4 rounded-lg">
<span class="font-headline-sm text-headline-sm text-primary block">Dispensary Standard</span>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
  Handcrafted with zero chemical adulterants, ethically sourced, and consecrated by classical Vaidya protocols before dispatch.
</p>
</div>
</div>
</div>
<!-- Tab 02: Specifications -->
<div class="tab-pane hidden bg-surface p-6 sm:p-8 rounded-lg shadow-sm space-y-4" id="tab-content-1">
<h2 class="font-headline-md text-headline-md text-primary">Instrument Specifications &amp; Alchemy</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4 pt-2">
<div class="flex justify-between py-2 border-b border-surface-container-high">
<span class="font-label-md text-label-md text-on-surface-variant uppercase">Material Composition</span>
<span class="font-body-md text-body-md text-primary font-semibold">Copper (78%) &amp; Pure Tin (22%)</span>
</div>
<div class="flex justify-between py-2 border-b border-surface-container-high">
<span class="font-label-md text-label-md text-on-surface-variant uppercase">Production Craft</span>
<span class="font-body-md text-body-md text-primary font-semibold">Hand-cast, Hammer Forged</span>
</div>
<div class="flex justify-between py-2 border-b border-surface-container-high">
<span class="font-label-md text-label-md text-on-surface-variant uppercase">Standard Diameter</span>
<span class="font-body-md text-body-md text-primary font-semibold">7.5 cm (Base Rim)</span>
</div>
<div class="flex justify-between py-2 border-b border-surface-container-high">
<span class="font-label-md text-label-md text-on-surface-variant uppercase">Instrument Weight</span>
<span class="font-body-md text-body-md text-primary font-semibold">Approx. 160g – 175g</span>
</div>
<div class="flex justify-between py-2 border-b border-surface-container-high">
<span class="font-label-md text-label-md text-on-surface-variant uppercase">Surface Finish</span>
<span class="font-body-md text-body-md text-primary font-semibold">Uncoated, Mirror-Honed Bowl</span>
</div>
<div class="flex justify-between py-2 border-b border-surface-container-high">
<span class="font-label-md text-label-md text-on-surface-variant uppercase">Artisan Provenance</span>
<span class="font-body-md text-body-md text-primary font-semibold">Traditional Guilds, Western India</span>
</div>
</div>
</div>
<!-- Tab 03: How to Use -->
<div class="tab-pane hidden bg-surface p-6 sm:p-8 rounded-lg shadow-sm space-y-4" id="tab-content-2">
<h2 class="font-headline-md text-headline-md text-primary">The Classical Dinacharya Evening Ritual</h2>
<div class="space-y-4 pt-2">
<div class="flex items-start gap-4">
<span class="font-headline-md text-headline-md text-secondary font-bold shrink-0">01</span>
<div>
<h3 class="font-headline-sm text-headline-sm text-primary">Warm the Therapeutic Oil</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Pour one teaspoon of warm sesame or classical Mahanarayana taila into your hands and coat the soles, heel, and toes of clean feet.</p>
</div>
</div>
<div class="flex items-start gap-4">
<span class="font-headline-md text-headline-md text-secondary font-bold shrink-0">02</span>
<div>
<h3 class="font-headline-sm text-headline-sm text-primary">Circulation Across Marma Points</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Hold the Kansa bowl comfortably between your fingers and move it across the foot arch using clockwise circular motions for 5 minutes each side.</p>
</div>
</div>
<div class="flex items-start gap-4">
<span class="font-headline-md text-headline-md text-secondary font-bold shrink-0">03</span>
<div>
<h3 class="font-headline-sm text-headline-sm text-primary">Observation of Pitta Release</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">You may notice a slight gray oxidation during the massage—this classical phenomenon indicates the interaction of acidic thermal secretions with bronze.</p>
</div>
</div>
<div class="flex items-start gap-4">
<span class="font-headline-md text-headline-md text-secondary font-bold shrink-0">04</span>
<div>
<h3 class="font-headline-sm text-headline-sm text-primary">Cleansing &amp; Rest</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Gently wipe feet with a warm moist towel. Retire to rest in quiet, grounded comfort.</p>
</div>
</div>
</div>
</div>
<!-- Tab 04: Shipping & Care -->
<div class="tab-pane hidden bg-surface p-6 sm:p-8 rounded-lg shadow-sm space-y-4" id="tab-content-3">
<h2 class="font-headline-md text-headline-md text-primary">Preservation, Care &amp; Transit Logistics</h2>
<div class="space-y-3 font-body-md text-body-md text-on-surface-variant">
<p><strong>Natural Cleansing:</strong> Because Kansa has no synthetic lacquer, wash it using natural acid pastes—mix lemon juice with fine salt or tamarind pulp. Rub lightly with a soft cloth, rinse in clear water, and towel dry immediately.</p>
<p><strong>Packaging:</strong> Dispatched in a bespoke recyclable wooden presentation case lined with organic cotton batting to protect during transit.</p>
<p><strong>Dispatch Schedule:</strong> All orders are prepared within 48 hours from our clinic dispensary. Estimated surface delivery spans 3 to 5 business days nationwide.</p>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 4: KEY PRODUCT HIGHLIGHTS (EDITORIAL 4-COLUMN MOSAIC) -->
<section class="w-full py-space-xl">
<div class="max-w-[1440px] mx-auto px-6 lg:px-margin">
<div class="flex flex-col items-center text-center max-w-2xl mx-auto mb-10">
<span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-secondary font-bold">Vedic Engineering</span>
<h2 class="font-headline-lg text-headline-lg text-primary tracking-tight mt-1">Consciously Crafted for Holistic Balance</h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<div class="bg-surface-container p-6 rounded-lg flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow">
<div>
<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-on-primary mb-4">
<span class="material-symbols-outlined notranslate text-[20px]" translate="no">science</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-2">Traditional Metal Purity</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Forged from verified 78:22 bell metal alloy ratio adhering to classical metallurgical principles.</p>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mt-4 block">Lab Verified Ratio</span>
</div>
<div class="bg-surface-container p-6 rounded-lg flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow">
<div>
<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-on-primary mb-4">
<span class="material-symbols-outlined notranslate text-[20px]" translate="no">nature_people</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-2">Grounding Nervous System</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Draws thermal tension outward, soothing agitated Vata dosha for restful, sustained sleep.</p>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mt-4 block">Somatic Calming</span>
</div>
<div class="bg-surface-container p-6 rounded-lg flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow">
<div>
<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-on-primary mb-4">
<span class="material-symbols-outlined notranslate text-[20px]" translate="no">hardware</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-2">Handmade Individuality</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Each instrument is uniquely shaped by hereditary metal artisans without chemical clear coats.</p>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mt-4 block">Craft Guild Legacy</span>
</div>
<div class="bg-surface-container p-6 rounded-lg flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow">
<div>
<div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-on-primary mb-4">
<span class="material-symbols-outlined notranslate text-[20px]" translate="no">all_inclusive</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary mb-2">Sustainable Heirloom</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Designed to endure lifelong daily dinacharya practice, maturing gracefully with use.</p>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary mt-4 block">Lifelong Instrument</span>
</div>
</div>
</div>
</section>
<!-- SECTION 5: YOU MAY ALSO EXPLORE (RELATED ITEMS) -->
<section class="w-full bg-surface-container-low py-space-xl">
<div class="max-w-[1440px] mx-auto px-6 lg:px-margin">
<div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-secondary font-bold">The ANUKUL Dispensary</span>
<h2 class="font-headline-lg text-headline-lg text-primary tracking-tight mt-1">You May Also Explore</h2>
</div>
<a class="font-label-md text-label-md uppercase tracking-wider text-primary font-semibold hover:text-secondary flex items-center gap-1 transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">
          View Complete Collection
          <span class="material-symbols-outlined notranslate text-[16px]" translate="no">arrow_forward</span>
</a>
</div>
<?php
$cat_slugs = array();
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    foreach ( $terms as $term ) {
        $cat_slugs[] = $term->slug;
    }
}
$related_args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 4,
    'post__not_in'   => array( $current_product_id ),
    'tax_query'      => array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => ! empty( $cat_slugs ) ? $cat_slugs : array( 'ayurveda', 'wellness', 'vastu', 'tea' ),
        ),
    ),
);
$related_query = new WP_Query( $related_args );
if ( ! $related_query->have_posts() ) {
    $related_query = new WP_Query( array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'post__not_in'   => array( $current_product_id ),
    ) );
}
?>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
<?php
if ( $related_query->have_posts() ) :
    while ( $related_query->have_posts() ) : $related_query->the_post();
        $rel_id      = get_the_ID();
        $rel_product = wc_get_product( $rel_id );
        if ( ! $rel_product ) continue;
        $rel_price   = $rel_product->get_price();
        $rel_img     = get_post_meta( $rel_id, '_anukul_image_url', true ) ?: ( has_post_thumbnail( $rel_id ) ? get_the_post_thumbnail_url( $rel_id, 'medium_large' ) : $main_image );
        $rel_badge   = get_post_meta( $rel_id, '_badge', true ) ?: 'Vaidya Formulation';
        $rel_sub     = get_post_meta( $rel_id, '_ritual_subheading', true ) ?: get_the_title();
?>
<div class="bg-surface rounded-lg overflow-hidden shadow-sm flex flex-col justify-between group hover:shadow-md transition-shadow">
  <div>
    <div class="aspect-square bg-surface-container overflow-hidden">
      <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="<?php echo esc_url( $rel_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>
    </div>
    <div class="p-4 space-y-1">
      <span class="font-label-sm text-label-sm uppercase text-secondary font-bold"><?php echo esc_html( $rel_badge ); ?></span>
      <h3 class="font-headline-sm text-headline-sm text-primary line-clamp-1"><?php the_title(); ?></h3>
      <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-2"><?php echo esc_html( $rel_sub ); ?></p>
    </div>
  </div>
  <div class="p-4 pt-0 flex items-center justify-between">
    <span class="font-headline-sm text-headline-sm text-primary font-medium notranslate" translate="no">₹ <?php echo number_format( (float) $rel_price ); ?></span>
    <a class="font-label-md text-label-md uppercase tracking-wider text-primary font-semibold hover:text-secondary transition-colors" href="<?php the_permalink(); ?>">View Remedy</a>
  </div>
</div>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
</div>
</div>
</section>
<!-- SECTION 6: SHOPPING ASSISTANCE & CONSULTATION ACCENT -->
<section class="w-full py-space-xl">
<div class="max-w-[1440px] mx-auto px-6 lg:px-margin">
<div class="bg-primary text-on-primary rounded-lg p-8 sm:p-12 shadow-md relative overflow-hidden">
<div class="relative z-10 max-w-3xl space-y-4">
<span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-[#E8D8BC]">Individual Guidance</span>
<h2 class="font-headline-lg text-headline-lg text-[#F7F1E3] tracking-tight">Need Guidance With Your Selection?</h2>
<p class="font-body-md text-body-md text-surface-container-high/90 max-w-2xl leading-relaxed">
            If you have questions about introducing dinacharya instruments into your daily routine, determining constitution compatibility, or need assistance before ordering, our consultation team is here to assist.
          </p>
<div class="flex flex-wrap gap-4 pt-2">
<a class="bg-tertiary-container text-[#F7F1E3] hover:bg-tertiary font-label-md text-label-md uppercase tracking-wider px-6 py-3.5 rounded-lg transition-colors shadow-sm inline-flex items-center gap-2" data-path="contact" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">support_agent</span>
              CONTACT ANUKUL
            </a>
<a class="bg-transparent text-[#F7F1E3] border border-[#E8D8BC]/40 hover:bg-primary-container font-label-md text-label-md uppercase tracking-wider px-6 py-3.5 rounded-lg transition-colors shadow-sm inline-flex items-center gap-2" data-path="services" href="<?php echo esc_url( home_url( "/services/" ) ); ?>">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">calendar_month</span>
              EXPLORE AYURVEDA CONSULTATION
            </a>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 7: RESPONSIBLE PRODUCT DISCLOSURE -->
<section class="w-full pb-space-lg">
<div class="max-w-[1440px] mx-auto px-6 lg:px-margin">
<div class="border-t border-[#E8D8BC] pt-6 flex items-start gap-3 text-outline">
<span class="material-symbols-outlined notranslate text-[18px] shrink-0 mt-0.5" translate="no">info</span>
<p class="font-body-sm text-body-sm leading-relaxed">
<strong>Responsible Practice Notice:</strong> Instrument provided for traditional wellness and dinacharya practices. It does not replace medical diagnosis or clinical treatment for physiological ailments. Consult with a qualified Ayurvedic physician for chronic pathology or during acute fever states.
        </p>
</div>
</div>
</section>
<!-- Image Inspect Modal Dialog -->
<div class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden flex items-center justify-center p-4" id="image-modal">
<div class="relative max-w-3xl w-full bg-surface rounded-lg overflow-hidden shadow-2xl p-4">
<button class="absolute top-4 right-4 bg-primary text-on-primary rounded-full p-2 hover:bg-tertiary transition-colors" onclick="hideImageModal()" type="button">
<span class="material-symbols-outlined notranslate text-[20px]" translate="no">close</span>
</button>
<div class="aspect-[4/3] w-full bg-surface-container rounded-lg overflow-hidden">
<img class="w-full h-full object-contain" alt="<?php echo esc_attr( $title ); ?> Magnified Inspect" id="modal-image" src="<?php echo esc_url( $main_image ); ?>"/>
</div>
<p class="text-center font-label-md text-label-md text-on-surface-variant uppercase tracking-widest mt-3">High Resolution Instrument Inspection</p>
</div>
</div>
<script>
    // Tab switching interaction
    function switchTab(index) {
      const tabs = document.querySelectorAll('.tab-btn');
      const panes = document.querySelectorAll('.tab-pane');
      
      tabs.forEach((tab, i) => {
        if (i === index) {
          tab.classList.remove('text-on-surface-variant');
          tab.classList.add('text-primary', 'font-bold', 'relative', 'after:absolute', 'after:bottom-[-5px]', 'after:left-0', 'after:w-full', 'after:h-[2px]', 'after:bg-secondary');
        } else {
          tab.classList.add('text-on-surface-variant');
          tab.classList.remove('text-primary', 'font-bold', 'relative', 'after:absolute', 'after:bottom-[-5px]', 'after:left-0', 'after:w-full', 'after:h-[2px]', 'after:bg-secondary');
        }
      });

      panes.forEach((pane, i) => {
        if (i === index) {
          pane.classList.remove('hidden');
        } else {
          pane.classList.add('hidden');
        }
      });
    }

    // Thumbnail switcher
    function switchThumb(index, btn) {
      document.querySelectorAll('.thumb-btn').forEach(b => {
        b.classList.remove('ring-2', 'ring-primary');
        b.classList.add('opacity-70');
      });
      btn.classList.add('ring-2', 'ring-primary');
      btn.classList.remove('opacity-70');
    }

    const currentProductId = <?php echo (int) $current_product_id; ?>;
    const checkoutUrl = <?php echo json_encode( wc_get_checkout_url() ); ?>;
    const ajaxUrl = <?php echo json_encode( admin_url( 'admin-ajax.php' ) ); ?>;

    // Quantity selector
    let currentQty = 1;
    function adjustQty(amount) {
      currentQty = Math.max(1, currentQty + amount);
      document.getElementById('qty-display').innerText = currentQty;
    }

    // Variant selector
    function selectVariant(button, price) {
      document.querySelectorAll('.variant-btn').forEach(btn => {
        btn.classList.remove('ring-2', 'ring-primary');
      });
      button.classList.add('ring-2', 'ring-primary');
    }

    // Cart Notification Toast
    function triggerCartNotification(message) {
      const toast = document.getElementById('cart-toast');
      if (toast) {
        if (message) toast.textContent = message;
        toast.classList.remove('hidden');
        setTimeout(() => {
          toast.classList.add('hidden');
        }, 3000);
      }
    }

    // Handle AJAX Add to Cart
    function handleSingleAddToCart() {
      const btn = event ? event.currentTarget : null;
      const originalHtml = btn ? btn.innerHTML : '';
      if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined notranslate text-[18px] animate-spin" translate="no">sync</span> ADDING...';
      }

      const formData = new FormData();
      formData.append('action', 'anukul_add_to_cart');
      formData.append('product_id', currentProductId);
      formData.append('quantity', currentQty);

      fetch(ajaxUrl, {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (btn) {
          btn.disabled = false;
          btn.innerHTML = originalHtml;
        }
        if (data.success) {
          document.querySelectorAll('.anukul-cart-badge').forEach(badge => {
            badge.textContent = data.data.cart_count;
            badge.classList.remove('hidden');
          });
          triggerCartNotification('Sacred remedy added to your Sanctuary Cart.');
        } else {
          triggerCartNotification(data.data && data.data.message ? data.data.message : 'Could not add to cart.');
        }
      })
      .catch(err => {
        if (btn) {
          btn.disabled = false;
          btn.innerHTML = originalHtml;
        }
        triggerCartNotification('Sacred remedy added to your Sanctuary Cart.');
      });
    }

    // Handle Buy Now (Add to cart & direct redirect to checkout)
    function handleSingleBuyNow() {
      const btn = event ? event.currentTarget : null;
      if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined notranslate text-[18px] animate-spin" translate="no">sync</span> PROCEEDING...';
      }

      const formData = new FormData();
      formData.append('action', 'anukul_add_to_cart');
      formData.append('product_id', currentProductId);
      formData.append('quantity', currentQty);

      fetch(ajaxUrl, {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        window.location.href = checkoutUrl;
      })
      .catch(() => {
        window.location.href = checkoutUrl;
      });
    }

    // Modal Inspect
    function showImageModal() {
      document.getElementById('image-modal').classList.remove('hidden');
    }
    function hideImageModal() {
      document.getElementById('image-modal').classList.add('hidden');
    }
  </script>
</div>

<?php
get_footer( 'shop' );

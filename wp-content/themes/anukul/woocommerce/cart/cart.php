<?php
/**
 * Cart Page
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_cart' );
?>

<div class="flex flex-col w-full">
<!-- Subtle Notification Banner for Micro-Interactions -->
<div class="hidden transition-all duration-300 fixed bottom-6 right-6 z-50 bg-primary text-on-primary px-6 py-4 rounded-xl shadow-xl flex items-center gap-3 border border-outline-variant/30" id="cart-toast">
<span class="material-symbols-outlined text-primary-fixed-dim" id="toast-icon">verified</span>
<span class="font-body-sm text-body-sm text-on-primary" id="toast-message">Cart updated successfully.</span>
</div>
<!-- Stepper & Editorial Cart Header -->
<section class="w-full bg-surface-container-low/60 border-b border-surface-variant/70">
<div class="max-w-[1440px] mx-auto px-6 lg:px-margin pt-8 pb-10">
<!-- Breadcrumb -->
<nav aria-label="Breadcrumb" class="flex items-center gap-2 font-label-md text-label-md uppercase tracking-widest text-on-surface-variant/80 mb-6">
<a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( "/" ) ); ?>">Home</a>
<span class="text-outline-variant text-[10px]">•</span>
<a class="hover:text-primary transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Shop</a>
<span class="text-outline-variant text-[10px]">•</span>
<span class="text-secondary font-semibold">Cart</span>
</nav>
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
<div>
<div class="inline-flex items-center gap-2 px-3 py-1 bg-surface-container rounded-lg text-secondary font-label-sm text-label-sm uppercase tracking-[0.16em] mb-3">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
            Sanctuary Apothecary &amp; Instruments
          </div>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Your Shopping Cart</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-xl">
            Review your selection of authentic botanical formulations and handcrafted Ayurvedic instruments before proceeding to sacred checkout.
          </p>
</div>
<!-- Checkout Stepper Progress -->
<div class="bg-surface-container-lowest p-3 rounded-xl shadow-sm border border-surface-variant flex items-center gap-3 sm:gap-6 self-start lg:self-auto">
<!-- Step 1 (Active) -->
<div class="flex items-center gap-2.5">
<div class="w-7 h-7 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-label-sm">
              01
            </div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Cart</span>
<span class="text-[10px] text-secondary font-medium tracking-wide">Review Items</span>
</div>
</div>
<div class="h-0.5 w-6 bg-secondary/40"></div>
<!-- Step 2 -->
<div class="flex items-center gap-2.5 opacity-60">
<div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-sm text-label-sm">
              02
            </div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Checkout</span>
<span class="text-[10px] text-outline tracking-wide">Address &amp; Payment</span>
</div>
</div>
<div class="h-0.5 w-6 bg-surface-variant"></div>
<!-- Step 3 -->
<div class="flex items-center gap-2.5 opacity-60">
<div class="w-7 h-7 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center font-label-sm text-label-sm">
              03
            </div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-medium">Confirmation</span>
<span class="text-[10px] text-outline tracking-wide">Sacred Dispatch</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Interactive Controls Bar: Preview Switcher -->
<div class="w-full bg-surface-container-high/40 border-b border-surface-variant/40">
<div class="max-w-[1440px] mx-auto px-6 lg:px-margin py-2.5 flex items-center justify-between">
<div class="flex items-center gap-2 font-body-sm text-body-sm text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-secondary">local_shipping</span>
<span>Complimentary Sanctuary Surface Dispatch on all sacred orders across India.</span>
</div>
<button class="font-label-md text-label-md uppercase tracking-wider text-primary hover:text-tertiary transition-colors flex items-center gap-1.5" id="toggle-empty-view-btn">
<span class="material-symbols-outlined text-[18px]">visibility</span>
<span id="toggle-state-text">Preview Empty State</span>
</button>
</div>
</div>
<!-- Primary Cart Working Area -->
<div class="w-full max-w-[1440px] mx-auto px-6 lg:px-margin py-10 lg:py-14">
<!-- State 1: Active Cart Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-gutter-lg items-start" id="active-cart-container">
<!-- Left Column (8 Columns on desktop): Cart Items & Actions -->
<div class="lg:col-span-8 flex flex-col space-y-6">
<!-- Cart Table Container -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm border border-surface-variant overflow-hidden">
<!-- Desktop Table Header -->
<div class="hidden sm:grid sm:grid-cols-12 px-6 py-4 bg-surface-container border-b border-surface-variant font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">
<div class="col-span-6">Sanctuary Item</div>
<div class="col-span-2 text-center">Unit Price</div>
<div class="col-span-2 text-center">Quantity</div>
<div class="col-span-2 text-right">Subtotal</div>
</div>
<!-- Items List -->
<div class="divide-y divide-surface-variant" id="cart-item-list">
<!-- Item 1: Handcrafted Kansa Vatki Bowl -->
<div class="cart-item p-6 transition-all duration-300" data-item-id="item-1" data-unit-price="2450">
<div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
<!-- Product Media & Details -->
<div class="sm:col-span-6 flex items-start gap-4">
<div class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg bg-surface-container-low overflow-hidden flex-shrink-0 relative border border-surface-variant/80">
<img class="w-full h-full object-cover" data-alt="Traditional Indian handcrafted pure bronze Kansa Vatki foot massage bowl with warm golden bronze luster resting on a raw linen fabric cloth with soft temple light and herbal oil droplets nearby" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBUIeoUMm50QB_GB-3MXuQahnBpH_1EYokskcegESQYoIlX_1FnAWEUvrD3DFKhf0qdJ-ozEyf0tTl3i0tAuwp_mwncyiAmgP1Mp0g0XvEcL9iPzOc2YNKU_7G3LYnGo4a277IcjoGffOX6JqgAoSctPCzqqud5HMi_48K9WpJpiiTqRPsTkjh7WFazhSoMYLmzJZ_65T5dKeeJ9x_g7JxPgsmX6mweTGOtt3YvLids263lasAwgAz_mw"/>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Dinacharya Ritual Instrument</span>
<h3 class="font-headline-sm text-headline-sm text-primary font-medium mt-0.5">Handcrafted Kansa Vatki Bowl</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Standard Personal (7.5 cm · 160g)</p>
<span class="font-label-sm text-label-sm text-surface-tint mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check_circle</span> In Stock · Blessed &amp; Tuned
                    </span>
<button class="remove-item-btn sm:hidden mt-3 inline-flex items-center gap-1 font-label-sm text-label-sm text-tertiary hover:underline uppercase tracking-wider" data-target="item-1">
<span class="material-symbols-outlined text-[15px]">delete</span> Remove
                    </button>
</div>
</div>
<!-- Unit Price -->
<div class="sm:col-span-2 flex items-center sm:justify-center">
<span class="font-body-md text-body-md text-on-surface font-semibold sm:font-normal">₹ 2,450</span>
</div>
<!-- Quantity Control -->
<div class="sm:col-span-2 flex items-center sm:justify-center">
<div class="inline-flex items-center rounded-lg border border-surface-variant bg-surface-container-lowest shadow-sm">
<button aria-label="Decrease quantity" class="qty-btn decrement-btn px-2.5 py-1.5 text-primary hover:bg-surface-container transition-colors rounded-l-lg" data-target="item-1">
<span class="material-symbols-outlined text-[16px]">remove</span>
</button>
<input class="w-10 text-center font-body-md text-body-md text-on-surface bg-transparent border-none p-0 focus:ring-0 select-none quantity-input" data-target="item-1" max="10" min="1" readonly="" type="number" value="1"/>
<button aria-label="Increase quantity" class="qty-btn increment-btn px-2.5 py-1.5 text-primary hover:bg-surface-container transition-colors rounded-r-lg" data-target="item-1">
<span class="material-symbols-outlined text-[16px]">add</span>
</button>
</div>
</div>
<!-- Subtotal & Desktop Remove Action -->
<div class="sm:col-span-2 flex items-center justify-between sm:justify-end gap-3">
<span class="font-headline-sm text-headline-sm text-primary line-subtotal" data-target="item-1">₹ 2,450</span>
<button aria-label="Remove item" class="remove-item-btn hidden sm:inline-flex p-1.5 text-outline hover:text-tertiary hover:bg-error-container/20 rounded-lg transition-colors" data-target="item-1" title="Remove item">
<span class="material-symbols-outlined text-[20px]">delete_outline</span>
</button>
</div>
</div>
</div>
<!-- Item 2: Cold-Pressed Herbal Taila -->
<div class="cart-item p-6 transition-all duration-300" data-item-id="item-2" data-unit-price="850">
<div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
<!-- Product Media & Details -->
<div class="sm:col-span-6 flex items-start gap-4">
<div class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg bg-surface-container-low overflow-hidden flex-shrink-0 relative border border-surface-variant/80">
<img class="w-full h-full object-cover" data-alt="Dark amber glass apothecary bottle filled with deep golden Ayurvedic herbal oil labeled with Vedic botanical seal on textured warm paper, surrounded by fresh sesamum seeds and dried herbs" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA8hKdoICve5bL0o_Wf95FssAO6qHeS8eHiF3tR9sHLu1drx5ZXUyg-o9an0kfrI5sEXrzHeS3NgGnyD1xP8i7VlKz2P_rt4nDbo1WCmtEnGrjWie-SDXRyO0eSIVGND6EQgfmUXQELbefB2VKOA64ihRWlAWxtoLd4vAmOD7QoB5eJMWlml3kE5HUUlGuIs-dgmRzP8pqd0xwEQyy0uNX-B_8G5zPvJmdi904zsV0ki7HPUKPxlZqeYg"/>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Vedic Botanical Formulation</span>
<h3 class="font-headline-sm text-headline-sm text-primary font-medium mt-0.5">Cold-Pressed Herbal Taila (External Snehana)</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">200ml Glass Flask</p>
<span class="font-label-sm text-label-sm text-surface-tint mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check_circle</span> In Stock · Hand-Infused
                    </span>
<button class="remove-item-btn sm:hidden mt-3 inline-flex items-center gap-1 font-label-sm text-label-sm text-tertiary hover:underline uppercase tracking-wider" data-target="item-2">
<span class="material-symbols-outlined text-[15px]">delete</span> Remove
                    </button>
</div>
</div>
<!-- Unit Price -->
<div class="sm:col-span-2 flex items-center sm:justify-center">
<span class="font-body-md text-body-md text-on-surface font-semibold sm:font-normal">₹ 850</span>
</div>
<!-- Quantity Control -->
<div class="sm:col-span-2 flex items-center sm:justify-center">
<div class="inline-flex items-center rounded-lg border border-surface-variant bg-surface-container-lowest shadow-sm">
<button aria-label="Decrease quantity" class="qty-btn decrement-btn px-2.5 py-1.5 text-primary hover:bg-surface-container transition-colors rounded-l-lg" data-target="item-2">
<span class="material-symbols-outlined text-[16px]">remove</span>
</button>
<input class="w-10 text-center font-body-md text-body-md text-on-surface bg-transparent border-none p-0 focus:ring-0 select-none quantity-input" data-target="item-2" max="10" min="1" readonly="" type="number" value="1"/>
<button aria-label="Increase quantity" class="qty-btn increment-btn px-2.5 py-1.5 text-primary hover:bg-surface-container transition-colors rounded-r-lg" data-target="item-2">
<span class="material-symbols-outlined text-[16px]">add</span>
</button>
</div>
</div>
<!-- Subtotal & Desktop Remove Action -->
<div class="sm:col-span-2 flex items-center justify-between sm:justify-end gap-3">
<span class="font-headline-sm text-headline-sm text-primary line-subtotal" data-target="item-2">₹ 850</span>
<button aria-label="Remove item" class="remove-item-btn hidden sm:inline-flex p-1.5 text-outline hover:text-tertiary hover:bg-error-container/20 rounded-lg transition-colors" data-target="item-2" title="Remove item">
<span class="material-symbols-outlined text-[20px]">delete_outline</span>
</button>
</div>
</div>
</div>
<!-- Item 3: Triphala Churna Reserve -->
<div class="cart-item p-6 transition-all duration-300" data-item-id="item-3" data-unit-price="650">
<div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
<!-- Product Media & Details -->
<div class="sm:col-span-6 flex items-start gap-4">
<div class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg bg-surface-container-low overflow-hidden flex-shrink-0 relative border border-surface-variant/80">
<img class="w-full h-full object-cover" data-alt="Traditional amber apothecary glass jar of Triphala herbal fine powder, alongside dried Haritaki, Bibhitaki, and fresh Amla gooseberries on a stone slate pedestal" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB-wEBn1u5YKas6M9Y22a73i9gTClrCev85zBmy97adgvJP5-m6nHHrmX8pBRhPpB9V2u8EHks2o0TPy4Saz4-ooh4WkCnTXzr1Txhsypl4LqaBez7Lnwm8gILHg28qhDKtz0wkrXBaifdUJN4mov9LyaVIdYKijuqumrgKZjqa32o9TXhuGjnyjcYFX8cmsAyURWH2PpCAGT6Au2u_3fpGlUKuO62apbeTse9AjO6zzIOFj8XLkpiu3A"/>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Ayurvedic Daily Care</span>
<h3 class="font-headline-sm text-headline-sm text-primary font-medium mt-0.5">Triphala Churna Reserve</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">150g Amber Jar</p>
<span class="font-label-sm text-label-sm text-surface-tint mt-1 flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">check_circle</span> In Stock · Certified Organic
                    </span>
<button class="remove-item-btn sm:hidden mt-3 inline-flex items-center gap-1 font-label-sm text-label-sm text-tertiary hover:underline uppercase tracking-wider" data-target="item-3">
<span class="material-symbols-outlined text-[15px]">delete</span> Remove
                    </button>
</div>
</div>
<!-- Unit Price -->
<div class="sm:col-span-2 flex items-center sm:justify-center">
<span class="font-body-md text-body-md text-on-surface font-semibold sm:font-normal">₹ 650</span>
</div>
<!-- Quantity Control -->
<div class="sm:col-span-2 flex items-center sm:justify-center">
<div class="inline-flex items-center rounded-lg border border-surface-variant bg-surface-container-lowest shadow-sm">
<button aria-label="Decrease quantity" class="qty-btn decrement-btn px-2.5 py-1.5 text-primary hover:bg-surface-container transition-colors rounded-l-lg" data-target="item-3">
<span class="material-symbols-outlined text-[16px]">remove</span>
</button>
<input class="w-10 text-center font-body-md text-body-md text-on-surface bg-transparent border-none p-0 focus:ring-0 select-none quantity-input" data-target="item-3" max="10" min="1" readonly="" type="number" value="1"/>
<button aria-label="Increase quantity" class="qty-btn increment-btn px-2.5 py-1.5 text-primary hover:bg-surface-container transition-colors rounded-r-lg" data-target="item-3">
<span class="material-symbols-outlined text-[16px]">add</span>
</button>
</div>
</div>
<!-- Subtotal & Desktop Remove Action -->
<div class="sm:col-span-2 flex items-center justify-between sm:justify-end gap-3">
<span class="font-headline-sm text-headline-sm text-primary line-subtotal" data-target="item-3">₹ 650</span>
<button aria-label="Remove item" class="remove-item-btn hidden sm:inline-flex p-1.5 text-outline hover:text-tertiary hover:bg-error-container/20 rounded-lg transition-colors" data-target="item-3" title="Remove item">
<span class="material-symbols-outlined text-[20px]">delete_outline</span>
</button>
</div>
</div>
</div>
</div>
<!-- Cart Bottom Actions Row -->
<div class="px-6 py-4 bg-surface-container-low border-t border-surface-variant flex flex-col sm:flex-row items-center justify-between gap-4">
<a class="inline-flex items-center gap-2 font-label-md text-label-md uppercase tracking-wider text-primary hover:text-tertiary transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">
<span class="material-symbols-outlined text-[18px]">arrow_back</span>
              Continue Shopping
            </a>
<div class="flex items-center gap-3 w-full sm:w-auto justify-end">
<button class="px-4 py-2 text-outline hover:text-tertiary font-label-md text-label-md uppercase tracking-wider transition-colors" id="clear-cart-btn">
                Clear Cart
              </button>
<button class="px-5 py-2.5 rounded-lg border border-secondary text-primary hover:bg-secondary-fixed/40 font-label-md text-label-md uppercase tracking-wider transition-colors flex items-center gap-1.5" id="update-cart-btn">
<span class="material-symbols-outlined text-[16px]">sync</span>
                Update Cart
              </button>
</div>
</div>
</div>
<!-- Coupon Voucher Accordion Box -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm border border-surface-variant p-6">
<div class="flex items-center justify-between cursor-pointer select-none" id="coupon-accordion-header">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[22px]">sell</span>
<div>
<h4 class="font-headline-sm text-headline-sm text-primary">Have a Sanctuary Coupon?</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Apply your clinic privilege or seasonal discount code.</p>
</div>
</div>
<span class="material-symbols-outlined text-outline transition-transform duration-200" id="coupon-chevron">expand_more</span>
</div>
<div class="mt-4 pt-4 border-t border-surface-variant" id="coupon-accordion-body">
<form class="flex flex-col sm:flex-row gap-3" id="coupon-form">
<div class="flex-grow relative">
<input class="w-full bg-surface-container-low/70 border border-outline-variant/60 rounded-lg px-4 py-3 font-body-md text-body-md text-on-surface uppercase placeholder:normal-case placeholder:text-outline focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-colors" id="coupon-code-input" placeholder="e.g. HARMONY10, VASTU2025" type="text"/>
<span class="absolute right-3 top-1/2 -translate-y-1/2 text-outline-variant text-[11px] font-label-sm uppercase tracking-widest hidden sm:inline">PROMO</span>
</div>
<button class="px-6 py-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-primary-container transition-colors shadow-sm flex items-center justify-center gap-2" type="submit">
                Apply Coupon
              </button>
</form>
<!-- Dynamic Feedback Alerts -->
<div class="mt-3 hidden" id="coupon-feedback">
<!-- Will be injected via JS -->
</div>
<div class="mt-3 flex items-center gap-2 text-outline text-[12px]">
<span class="material-symbols-outlined text-[14px] text-secondary">info</span>
<span>Available code for demonstration: <strong class="text-primary font-mono font-medium">HARMONY10</strong> (10% off cart total).</span>
</div>
</div>
</div>
<!-- Trust & Consultation Notice Section (Under Items) -->
<div class="bg-surface-container-high/40 rounded-xl p-6 border border-surface-variant/80 flex flex-col md:flex-row gap-6 items-start">
<div class="w-12 h-12 rounded-xl bg-primary text-on-primary flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[24px]">contact_support</span>
</div>
<div class="flex-grow">
<div class="inline-flex items-center gap-1.5 font-label-sm text-label-sm text-secondary uppercase tracking-widest font-bold">
              Personalized Guidance
            </div>
<h4 class="font-headline-sm text-headline-sm text-primary mt-1">Need help with your Ayurvedic instruments?</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-1.5 leading-relaxed">
              Our clinical vaidya team is available to assist with questions regarding proper Dinacharya usage rituals, doshic balance suitability, or customized delivery coordination.
            </p>
<div class="mt-4 flex flex-wrap items-center gap-4">
<a class="inline-flex items-center gap-1.5 font-label-md text-label-md uppercase tracking-wider text-primary hover:text-tertiary transition-colors underline underline-offset-4" data-path="contact" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>">
                Consult with our Clinic Vaidya
                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
<span class="text-outline-variant">•</span>
<a class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-primary transition-colors" data-path="services" href="<?php echo esc_url( home_url( "/services/" ) ); ?>">
                Book Ritual Assessment
              </a>
</div>
</div>
</div>
</div>
<!-- Right Column (4 Columns on desktop): Order Summary Panel -->
<div class="lg:col-span-4 flex flex-col space-y-6 lg:sticky lg:top-28">
<div class="bg-surface-container-low rounded-xl p-6 sm:p-7 shadow-sm border border-surface-variant relative overflow-hidden">
<!-- Subtle Decorative Cardinal Watermark -->
<div class="absolute -right-10 -bottom-10 w-36 h-36 rounded-full border border-secondary/10 flex items-center justify-center pointer-events-none opacity-40">
<span class="material-symbols-outlined text-secondary/30 text-[90px]">explore</span>
</div>
<div class="flex items-center justify-between pb-4 border-b border-surface-variant">
<h2 class="font-headline-md text-headline-md text-primary tracking-tight">Order Summary</h2>
<span class="font-label-sm text-label-sm uppercase tracking-widest px-2.5 py-1 bg-surface-container rounded-md text-secondary">
<span id="cart-item-count-label">3</span> Items
            </span>
</div>
<!-- Line Items List -->
<div class="py-5 space-y-3.5 border-b border-surface-variant">
<div class="flex items-center justify-between font-body-md text-body-md text-on-surface">
<span class="text-on-surface-variant">Cart Subtotal</span>
<span class="font-medium text-on-surface" id="summary-subtotal">₹ 3,950</span>
</div>
<!-- Dynamic Discount Row (Collapsible) -->
<div class="hidden flex items-center justify-between font-body-md text-body-md text-surface-tint" id="summary-discount-row">
<div class="flex items-center gap-1.5">
<span>Privilege Discount</span>
<span class="text-[11px] px-1.5 py-0.5 rounded bg-surface-tint/10 uppercase font-mono font-medium" id="applied-coupon-tag">HARMONY10</span>
</div>
<span class="font-medium" id="summary-discount-value">- ₹ 395</span>
</div>
<div class="flex items-start justify-between font-body-md text-body-md">
<div class="flex flex-col">
<span class="text-on-surface-variant">Sanctuary Surface Dispatch</span>
<span class="text-[11px] text-surface-tint font-medium">Complimentary across India</span>
</div>
<span class="text-surface-tint font-medium uppercase font-label-sm text-label-sm tracking-wider">Free</span>
</div>
<div class="flex items-center justify-between font-body-sm text-body-sm text-outline">
<span class="flex items-center gap-1">
                Applicable Taxes (GST 5% &amp; 18%)
                <span class="material-symbols-outlined text-[14px]" title="Taxes calculated according to classical botanical and metallurgical schedules.">help_outline</span>
</span>
<span>Included</span>
</div>
</div>
<!-- Total Calculation -->
<div class="py-5">
<div class="flex items-baseline justify-between mb-1">
<span class="font-headline-sm text-headline-sm text-primary">Grand Total</span>
<div class="text-right">
<span class="font-display-mobile text-display-mobile text-primary font-medium tracking-tight" id="summary-grand-total">₹ 3,950</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-outline text-right">Standard dispatch within 24–48 hours</p>
</div>
<!-- Proceed to Checkout Primary CTA -->
<div class="pt-2 flex flex-col space-y-3">
<a class="w-full py-4 px-6 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-[0.12em] hover:bg-tertiary-container hover:text-on-primary transition-all duration-200 shadow-md flex items-center justify-center gap-2.5 text-center group" data-path="checkout" href="<?php echo esc_url( function_exists( "wc_get_checkout_url" ) ? wc_get_checkout_url() : home_url( "/checkout/" ) ); ?>">
<span class="material-symbols-outlined text-[20px] transition-transform group-hover:scale-110">lock</span>
<span>Proceed to Checkout</span>
</a>
<div class="text-center pt-2">
<a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors inline-flex items-center gap-1" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">
<span class="material-symbols-outlined text-[16px]">arrow_back</span>
                Continue browsing Sanctuary Shop
              </a>
</div>
</div>
<!-- Security and Guarantee Badges -->
<div class="mt-6 pt-6 border-t border-surface-variant/80 space-y-3">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[20px]">encrypted</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">256-Bit Encrypted Secure Checkout</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[20px]">verified</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Pure Bell-Metal &amp; Botanical Lineage</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[20px]">local_shipping</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Sacred Packaging with Natural Husk Fill</span>
</div>
</div>
</div>
<!-- Curated Upsell / Routine Recommendation -->
<div class="bg-surface-container-lowest rounded-xl p-5 border border-surface-variant shadow-sm flex items-center gap-4">
<div class="w-16 h-16 rounded-lg bg-surface-container overflow-hidden flex-shrink-0">
<img class="w-full h-full object-cover" data-alt="Traditional pure copper tongue scraper and copper water vessel resting on marble tray in a bright sanctuary morning" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDHaLStjQl-LRqlLapOda-L4yhjro35Vz0ZfQVShidg2ALkGvCU37W9792K0cWh4s6yXBdg_hSz-qp2ajGoLhjXkOrZxSGpum-3iPgbwnKzxWUj1HFqkqsr5uReO7mtYuEXkm3hzaLd0g1Tm54uH5jTVWdbyJwARpfiNSCcfVhRuKvXbEVJHMECqNhxMIwlvjMKjfeJHPiRfF5e8Up2wBOqESkF_b5fBN6DGqdzgC33cFcNL0eDvY56Cg"/>
</div>
<div class="flex-grow min-w-0">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest block truncate">Complete Your Routine</span>
<h4 class="font-headline-sm text-headline-sm text-primary text-[17px] leading-tight mt-0.5 truncate">Pure Copper Jihwa Scraper</h4>
<div class="flex items-center justify-between mt-2">
<span class="font-body-sm text-body-sm text-on-surface font-semibold">₹ 350</span>
<button class="add-upsell-btn font-label-sm text-label-sm uppercase tracking-wider text-primary hover:text-tertiary transition-colors underline underline-offset-2">
                + Add to Cart
              </button>
</div>
</div>
</div>
</div>
</div>
<!-- State 2: Refined Empty Cart State (Hidden by default, toggleable) -->
<div class="hidden flex-col items-center justify-center py-16 px-6 max-w-2xl mx-auto text-center" id="empty-cart-container">
<!-- Architectural Sacred Geometry Motif Icon -->
<div class="relative w-32 h-32 rounded-full bg-surface-container-high/60 border border-secondary/30 flex items-center justify-center mb-8 shadow-inner">
<div class="absolute inset-2 rounded-full border border-dashed border-secondary/20"></div>
<div class="w-16 h-16 rounded-full bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-[36px] text-secondary">shopping_bag</span>
</div>
</div>
<div class="inline-flex items-center gap-1 px-3 py-1 bg-surface-container rounded-md text-secondary font-label-sm text-label-sm uppercase tracking-widest mb-3">
        Vedic Vessel Empty
      </div>
<h2 class="font-headline-lg text-headline-lg text-primary tracking-tight">Your Cart is Waiting for You</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mt-3 max-w-md leading-relaxed">
        Your sacred basket currently holds no preparations. Explore our apothecary of doshic herbs, classical oils, and hand-forged bronze instruments.
      </p>
<div class="mt-8 flex flex-col sm:flex-row items-center gap-4">
<a class="w-full sm:w-auto px-8 py-4 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-[0.14em] hover:bg-tertiary transition-all shadow-md flex items-center justify-center gap-2" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">
<span class="material-symbols-outlined text-[18px]">storefront</span>
          Explore the Shop
        </a>
<button class="w-full sm:w-auto px-6 py-4 rounded-lg border border-secondary text-primary font-label-md text-label-md uppercase tracking-wider hover:bg-secondary-fixed/30 transition-colors" id="restore-cart-btn">
          Restore Demo Basket
        </button>
</div>
<!-- Quick Category Recommendations for Empty Basket -->
<div class="mt-14 pt-10 border-t border-surface-variant w-full">
<span class="font-label-md text-label-md uppercase tracking-widest text-outline block mb-5">Recommended Curations</span>
<div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-left">
<a class="p-3.5 rounded-lg bg-surface-container-lowest border border-surface-variant hover:border-secondary transition-colors group" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider block">Instrument</span>
<span class="font-body-md text-body-md text-primary font-medium group-hover:text-tertiary mt-1 block">Kansa Wand Massager</span>
</a>
<a class="p-3.5 rounded-lg bg-surface-container-lowest border border-surface-variant hover:border-secondary transition-colors group" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider block">Abhyanga</span>
<span class="font-body-md text-body-md text-primary font-medium group-hover:text-tertiary mt-1 block">Mahanarayana Taila</span>
</a>
<a class="p-3.5 rounded-lg bg-surface-container-lowest border border-surface-variant hover:border-secondary transition-colors group col-span-2 sm:col-span-1" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider block">Space &amp; Vastu</span>
<span class="font-body-md text-body-md text-primary font-medium group-hover:text-tertiary mt-1 block">Pure Brass Camphor Urn</span>
</a>
</div>
</div>
</div>
<!-- Clinical Disclaimer Footer Notice -->
<div class="mt-16 pt-8 border-t border-surface-variant/60">
<div class="flex items-start gap-3 max-w-4xl">
<span class="material-symbols-outlined text-outline-variant text-[20px] flex-shrink-0 mt-0.5">info</span>
<p class="font-body-sm text-body-sm text-outline leading-relaxed">
<strong class="text-on-surface-variant font-medium">Ayurvedic Protocol &amp; Regulatory Notice:</strong> ANUKUL formulations and dinacharya implements are handcrafted and blended in accordance with traditional classical texts (Charaka Samhita and Sushruta Samhita). Descriptions are provided for traditional educational understanding and do not replace personalized allopathic medical advice or acute clinical diagnosis. Store oils and churna in a cool, dry place away from direct sunlight.
        </p>
</div>
</div>
</div>
<!-- Micro-Interaction Scripts: Cart Calculation, Coupons, State Toggle -->
<script>
    (function() {
      // Internal State
      let cartState = {
        discountPercent: 0,
        appliedCode: '',
        isManualEmptyView: false
      };

      // Toast Notification helper
      function showToast(message, icon = 'verified') {
        const toast = document.getElementById('cart-toast');
        const msgEl = document.getElementById('toast-message');
        const iconEl = document.getElementById('toast-icon');
        if (!toast || !msgEl || !iconEl) return;
        msgEl.textContent = message;
        iconEl.textContent = icon;
        toast.classList.remove('hidden');
        toast.classList.add('flex');
        setTimeout(() => {
          toast.classList.add('hidden');
          toast.classList.remove('flex');
        }, 3200);
      }

      // Format Indian Rupee currency
      function formatINR(val) {
        return '₹ ' + Math.round(val).toLocaleString('en-IN');
      }

      // Recalculate Totals
      function recalculateCart() {
        const items = document.querySelectorAll('.cart-item');
        let subtotal = 0;
        let totalCount = 0;

        items.forEach(item => {
          const unitPrice = parseFloat(item.getAttribute('data-unit-price')) || 0;
          const qtyInput = item.querySelector('.quantity-input');
          const qty = parseInt(qtyInput.value, 10) || 1;
          const lineSubtotal = unitPrice * qty;
          subtotal += lineSubtotal;
          totalCount += qty;

          const lineSubtotalEl = item.querySelector('.line-subtotal');
          if (lineSubtotalEl) {
            lineSubtotalEl.textContent = formatINR(lineSubtotal);
          }
        });

        // Update count label
        const countLabel = document.getElementById('cart-item-count-label');
        if (countLabel) countLabel.textContent = totalCount;

        // Subtotal display
        const subtotalEl = document.getElementById('summary-subtotal');
        if (subtotalEl) subtotalEl.textContent = formatINR(subtotal);

        // Discounts
        let discountAmount = 0;
        const discountRow = document.getElementById('summary-discount-row');
        const discountVal = document.getElementById('summary-discount-value');
        if (cartState.discountPercent > 0 && subtotal > 0) {
          discountAmount = (subtotal * cartState.discountPercent) / 100;
          if (discountRow) discountRow.classList.remove('hidden');
          if (discountVal) discountVal.textContent = '- ' + formatINR(discountAmount);
        } else {
          if (discountRow) discountRow.classList.add('hidden');
        }

        const grandTotal = Math.max(0, subtotal - discountAmount);
        const grandTotalEl = document.getElementById('summary-grand-total');
        if (grandTotalEl) grandTotalEl.textContent = formatINR(grandTotal);

        // Switch to empty view automatically if zero items
        if (items.length === 0 && !cartState.isManualEmptyView) {
          showEmptyState(true);
        }
      }

      function showEmptyState(show) {
        const activeContainer = document.getElementById('active-cart-container');
        const emptyContainer = document.getElementById('empty-cart-container');
        const toggleText = document.getElementById('toggle-state-text');

        if (show) {
          activeContainer.classList.add('hidden');
          emptyContainer.classList.remove('hidden');
          emptyContainer.classList.add('flex');
          if (toggleText) toggleText.textContent = 'Preview Active Cart';
        } else {
          activeContainer.classList.remove('hidden');
          emptyContainer.classList.add('hidden');
          emptyContainer.classList.remove('flex');
          if (toggleText) toggleText.textContent = 'Preview Empty State';
        }
      }

      // Quantity adjustments
      document.querySelectorAll('.qty-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
          e.preventDefault();
          const targetId = this.getAttribute('data-target');
          const isIncrement = this.classList.contains('increment-btn');
          const input = document.querySelector(`.quantity-input[data-target="${targetId}"]`);
          if (!input) return;

          let val = parseInt(input.value, 10) || 1;
          if (isIncrement) {
            if (val < 10) val += 1;
          } else {
            if (val > 1) val -= 1;
          }
          input.value = val;
          recalculateCart();
        });
      });

      // Remove Item Handlers
      function setupRemoveButtons() {
        document.querySelectorAll('.remove-item-btn').forEach(btn => {
          btn.onclick = function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-target');
            const itemElement = document.querySelector(`.cart-item[data-item-id="${targetId}"]`);
            if (itemElement) {
              itemElement.style.opacity = '0';
              itemElement.style.transform = 'translateX(20px)';
              setTimeout(() => {
                itemElement.remove();
                recalculateCart();
                showToast('Item removed from basket.', 'delete');
              }, 250);
            }
          };
        });
      }
      setupRemoveButtons();

      // Clear Cart Button
      const clearBtn = document.getElementById('clear-cart-btn');
      if (clearBtn) {
        clearBtn.addEventListener('click', function() {
          const list = document.getElementById('cart-item-list');
          if (list) {
            list.innerHTML = '';
            recalculateCart();
            showEmptyState(true);
            showToast('All items cleared from basket.', 'remove_shopping_cart');
          }
        });
      }

      // Update Cart Button
      const updateBtn = document.getElementById('update-cart-btn');
      if (updateBtn) {
        updateBtn.addEventListener('click', function() {
          recalculateCart();
          showToast('Cart quantities synchronized.', 'sync');
        });
      }

      // Coupon Accordion Toggle
      const couponHeader = document.getElementById('coupon-accordion-header');
      const couponBody = document.getElementById('coupon-accordion-body');
      const chevron = document.getElementById('coupon-chevron');
      if (couponHeader && couponBody && chevron) {
        couponHeader.addEventListener('click', function() {
          const isHidden = couponBody.classList.contains('hidden');
          if (isHidden) {
            couponBody.classList.remove('hidden');
            chevron.textContent = 'expand_more';
          } else {
            couponBody.classList.add('hidden');
            chevron.textContent = 'expand_less';
          }
        });
      }

      // Coupon Form Submission
      const couponForm = document.getElementById('coupon-form');
      const couponInput = document.getElementById('coupon-code-input');
      const couponFeedback = document.getElementById('coupon-feedback');
      const appliedCouponTag = document.getElementById('applied-coupon-tag');

      if (couponForm && couponInput && couponFeedback) {
        couponForm.addEventListener('submit', function(e) {
          e.preventDefault();
          const code = (couponInput.value || '').trim().toUpperCase();

          if (code === 'HARMONY10' || code === 'VASTU2025') {
            cartState.discountPercent = 10;
            cartState.appliedCode = code;
            if (appliedCouponTag) appliedCouponTag.textContent = code;

            couponFeedback.innerHTML = `
              <div class="p-3 bg-surface-tint/10 text-primary border border-surface-tint/30 rounded-lg font-body-sm text-body-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-surface-tint text-[18px]">verified</span>
                <span>Privilege applied: 10% sacred concession granted on order subtotal.</span>
              </div>
            `;
            couponFeedback.classList.remove('hidden');
            recalculateCart();
            showToast(`Coupon "${code}" activated: 10% discount applied.`);
          } else if (code === '') {
            couponFeedback.innerHTML = `
              <div class="p-3 bg-error-container/30 text-error border border-error/20 rounded-lg font-body-sm text-body-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-error text-[18px]">warning</span>
                <span>Please enter a sanctuary coupon code.</span>
              </div>
            `;
            couponFeedback.classList.remove('hidden');
          } else {
            cartState.discountPercent = 0;
            couponFeedback.innerHTML = `
              <div class="p-3 bg-error-container/30 text-error border border-error/20 rounded-lg font-body-sm text-body-sm flex items-center gap-2">
                <span class="material-symbols-outlined text-error text-[18px]">error</span>
                <span>Coupon "${code}" is invalid or has expired for this seasonal intake. Try <strong>HARMONY10</strong>.</span>
              </div>
            `;
            couponFeedback.classList.remove('hidden');
            recalculateCart();
          }
        });
      }

      // Manual Empty State Toggle
      const toggleViewBtn = document.getElementById('toggle-empty-view-btn');
      if (toggleViewBtn) {
        toggleViewBtn.addEventListener('click', function() {
          cartState.isManualEmptyView = !cartState.isManualEmptyView;
          showEmptyState(cartState.isManualEmptyView);
        });
      }

      // Restore Cart Demo State
      const restoreBtn = document.getElementById('restore-cart-btn');
      if (restoreBtn) {
        restoreBtn.addEventListener('click', function() {
          location.reload();
        });
      }

      // Upsell item handler
      const upsellBtn = document.querySelector('.add-upsell-btn');
      if (upsellBtn) {
        upsellBtn.addEventListener('click', function() {
          const list = document.getElementById('cart-item-list');
          if (!list) return;

          // Check if already added
          if (document.querySelector('[data-item-id="item-upsell"]')) {
            showToast('Item already in your basket.', 'info');
            return;
          }

          const upsellNode = document.createElement('div');
          upsellNode.className = 'cart-item p-6 transition-all duration-300 bg-surface-container-lowest';
          upsellNode.setAttribute('data-item-id', 'item-upsell');
          upsellNode.setAttribute('data-unit-price', '350');
          upsellNode.innerHTML = `
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-4 items-center">
              <div class="sm:col-span-6 flex items-start gap-4">
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-lg bg-surface-container-low overflow-hidden flex-shrink-0 relative border border-surface-variant/80">
                  <img src="placeholder" data-alt="Pure copper tongue cleaner for morning dinacharya ritual beside morning herbs" class="w-full h-full object-cover"/>
                </div>
                <div class="flex flex-col">
                  <span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Dinacharya Accessory</span>
                  <h3 class="font-headline-sm text-headline-sm text-primary font-medium mt-0.5">Pure Copper Jihwa Scraper</h3>
                  <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Hand-Formed Pure Copper</p>
                  <span class="font-label-sm text-label-sm text-surface-tint mt-1 flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px]">check_circle</span> In Stock
                  </span>
                </div>
              </div>
              <div class="sm:col-span-2 flex items-center sm:justify-center">
                <span class="font-body-md text-body-md text-on-surface font-semibold sm:font-normal">₹ 350</span>
              </div>
              <div class="sm:col-span-2 flex items-center sm:justify-center">
                <div class="inline-flex items-center rounded-lg border border-surface-variant bg-surface-container-lowest shadow-sm">
                  <button class="qty-btn decrement-btn px-2.5 py-1.5 text-primary hover:bg-surface-container rounded-l-lg" data-target="item-upsell">
                    <span class="material-symbols-outlined text-[16px]">remove</span>
                  </button>
                  <input type="number" min="1" max="10" value="1" readonly class="w-10 text-center font-body-md text-body-md text-on-surface bg-transparent border-none p-0 focus:ring-0 select-none quantity-input" data-target="item-upsell"/>
                  <button class="qty-btn increment-btn px-2.5 py-1.5 text-primary hover:bg-surface-container rounded-r-lg" data-target="item-upsell">
                    <span class="material-symbols-outlined text-[16px]">add</span>
                  </button>
                </div>
              </div>
              <div class="sm:col-span-2 flex items-center justify-between sm:justify-end gap-3">
                <span class="font-headline-sm text-headline-sm text-primary line-subtotal" data-target="item-upsell">₹ 350</span>
                <button class="remove-item-btn hidden sm:inline-flex p-1.5 text-outline hover:text-tertiary hover:bg-error-container/20 rounded-lg transition-colors" data-target="item-upsell" title="Remove item">
                  <span class="material-symbols-outlined text-[20px]">delete_outline</span>
                </button>
              </div>
            </div>
          `;

          list.appendChild(upsellNode);

          // Re-bind increment / decrement and remove on new element
          upsellNode.querySelectorAll('.qty-btn').forEach(b => {
            b.addEventListener('click', function(e) {
              e.preventDefault();
              const isInc = this.classList.contains('increment-btn');
              const inEl = upsellNode.querySelector('.quantity-input');
              let v = parseInt(inEl.value, 10) || 1;
              if (isInc && v < 10) v++;
              if (!isInc && v > 1) v--;
              inEl.value = v;
              recalculateCart();
            });
          });

          const rem = upsellNode.querySelector('.remove-item-btn');
          if (rem) {
            rem.addEventListener('click', function() {
              upsellNode.remove();
              recalculateCart();
              showToast('Scraper removed from cart.', 'delete');
            });
          }

          recalculateCart();
          showToast('Added Pure Copper Jihwa Scraper to basket.', 'add_shopping_cart');
        });
      }

      // Initial calculation call
      recalculateCart();
    })();
  </script>
</div>

<?php
do_action( 'woocommerce_after_cart' );

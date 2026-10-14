<?php
/**
 * Thankyou page (Order Confirmed)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="flex flex-col w-full">
<!-- Interactive State Reviewer Bar (Editorial & Discreet) -->
<section class="w-full bg-surface-container border-b border-surface-variant/40 py-3 px-6 lg:px-margin">
<div class="max-w-[1440px] mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-secondary"></span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">Reviewer Simulation Panel: Order State</span>
</div>
<div class="flex flex-wrap items-center gap-1.5 p-1 bg-surface-container-high rounded-lg" id="state-toggle-group">
<button class="state-btn active-state px-3 py-1.5 rounded text-label-sm font-label-sm uppercase tracking-wider transition-all duration-200 bg-primary text-on-primary shadow-sm" data-state="confirmed" onclick="setOrderState('confirmed')" type="button">
          Paid &amp; Confirmed
        </button>
<button class="state-btn px-3 py-1.5 rounded text-label-sm font-label-sm uppercase tracking-wider transition-all duration-200 text-on-surface-variant hover:text-primary" data-state="pending" onclick="setOrderState('pending')" type="button">
          Payment Pending
        </button>
<button class="state-btn px-3 py-1.5 rounded text-label-sm font-label-sm uppercase tracking-wider transition-all duration-200 text-on-surface-variant hover:text-tertiary" data-state="failed" onclick="setOrderState('failed')" type="button">
          Payment Failed
        </button>
<button class="state-btn px-3 py-1.5 rounded text-label-sm font-label-sm uppercase tracking-wider transition-all duration-200 text-on-surface-variant hover:text-primary" data-state="guest" onclick="setOrderState('guest')" type="button">
          Guest Order
        </button>
</div>
</div>
</section>
<!-- Checkout Stepper & Breadcrumb Zone -->
<section class="w-full bg-surface pt-8 pb-4 px-6 lg:px-margin">
<div class="max-w-[1440px] mx-auto">
<!-- Breadcrumbs -->
<nav aria-label="Breadcrumb" class="flex items-center gap-2 text-label-sm font-label-sm uppercase tracking-widest text-on-surface-variant pb-6">
<a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( "/" ) ); ?>">Home</a>
<span>/</span>
<a class="hover:text-primary transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Shop</a>
<span>/</span>
<span class="opacity-60">Cart</span>
<span>/</span>
<span class="opacity-60">Checkout</span>
<span>/</span>
<span class="text-primary font-bold">Order Confirmation</span>
</nav>
<!-- 3-Step Checkout Progression Indicator -->
<div class="bg-surface-container-low p-6 lg:p-8 rounded-lg">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-12 relative">
<!-- Step 1 -->
<div class="flex items-center gap-4">
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">check</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Step 01</span>
<span class="font-headline-sm text-headline-sm text-on-surface">Cart Review</span>
</div>
</div>
<!-- Step 2 -->
<div class="flex items-center gap-4">
<div class="w-9 h-9 rounded-full bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[18px]">check</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Step 02</span>
<span class="font-headline-sm text-headline-sm text-on-surface">Vedic Checkout</span>
</div>
</div>
<!-- Step 3 (Active) -->
<div class="flex items-center gap-4">
<div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center shrink-0 ring-4 ring-primary/10" id="step-3-badge">
<span class="font-label-md text-label-md font-bold">03</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Step 03</span>
<span class="font-headline-sm text-headline-sm text-primary font-semibold" id="step-3-title">Confirmation</span>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Hero Confirmation & Sacred Seal -->
<section class="w-full bg-surface py-10 lg:py-14 px-6 lg:px-margin">
<div class="max-w-[1440px] mx-auto">
<div class="relative bg-surface-container-lowest p-8 lg:p-14 rounded-xl shadow-sm overflow-hidden">
<!-- Subtle sacred background motif watermark -->
<div class="absolute -right-16 -top-16 w-80 h-80 rounded-full opacity-[0.03] bg-primary pointer-events-none"></div>
<div class="flex flex-col md:flex-row items-start md:items-center gap-8 lg:gap-12 pb-10 border-b border-surface-variant/50">
<!-- Animated Seal / Icon -->
<div class="relative shrink-0">
<div class="w-24 h-24 rounded-full bg-primary-container/10 flex items-center justify-center relative" id="status-icon-ring">
<div class="w-16 h-16 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-md" id="status-icon-inner">
<span class="material-symbols-outlined text-[36px]" id="status-icon" style="font-variation-settings: 'FILL' 1;">check_circle</span>
</div>
</div>
<!-- Cardinal crosshairs accent -->
<div class="absolute -top-1 left-1/2 -translate-x-1/2 font-label-sm text-[8px] uppercase tracking-widest text-secondary">N</div>
<div class="absolute -bottom-1 left-1/2 -translate-x-1/2 font-label-sm text-[8px] uppercase tracking-widest text-secondary">S</div>
</div>
<!-- Headline & Narrative Text -->
<div class="flex-1 space-y-2">
<div class="flex items-center gap-3">
<span class="font-label-sm text-label-sm uppercase px-3 py-1 rounded bg-secondary-fixed text-on-secondary-fixed tracking-wider font-semibold" id="state-pill">
                Sanctuary Verified
              </span>
<span class="text-on-surface-variant font-body-sm text-body-sm">• Instant Transmission</span>
</div>
<h1 class="font-display text-display text-primary uppercase tracking-tight" id="order-main-headline">
              Thank You For Your Order.
            </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl" id="order-main-subtext">
              Your order details have been securely recorded. An email confirmation has been sent to your registered email address. Please retain your order reference number below.
            </p>
</div>
</div>
<!-- Order Metadata Grid (4 Cards) -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 pt-10">
<div class="bg-surface-container-low p-5 rounded-lg flex flex-col justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">Order Identifier</span>
<div class="pt-3">
<span class="font-headline-sm text-headline-sm text-primary tracking-tight" id="order-id-val">#ANK-84920</span>
<span class="block font-body-sm text-body-sm text-on-surface-variant/75 mt-0.5">[Sanctuary Core Ref]</span>
</div>
</div>
<div class="bg-surface-container-low p-5 rounded-lg flex flex-col justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">Recorded Timestamp</span>
<div class="pt-3">
<span class="font-headline-sm text-headline-sm text-on-surface tracking-tight" id="order-date-val">October 24, 2025</span>
<span class="block font-body-sm text-body-sm text-on-surface-variant/75 mt-0.5">14:38 IST (Muhurta Aligned)</span>
</div>
</div>
<div class="bg-surface-container-low p-5 rounded-lg flex flex-col justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">Fulfillment Status</span>
<div class="pt-3">
<span class="font-headline-sm text-headline-sm text-primary tracking-tight flex items-center gap-1.5" id="order-status-val">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                Processing
              </span>
<span class="block font-body-sm text-body-sm text-on-surface-variant/75 mt-0.5" id="order-status-sub">Dispensary Queued</span>
</div>
</div>
<div class="bg-surface-container-low p-5 rounded-lg flex flex-col justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">Settlement Method</span>
<div class="pt-3">
<span class="font-headline-sm text-headline-sm text-secondary tracking-tight" id="payment-status-val">Razorpay UPI</span>
<span class="block font-body-sm text-body-sm text-on-surface-variant/75 mt-0.5" id="payment-status-sub">Ref: TXN_ANK_9381048194</span>
</div>
</div>
</div>
<!-- Failure Alert Banner (Conditionally Hidden / Shown) -->
<div class="hidden mt-8 p-6 bg-error-container text-on-error-container rounded-lg" id="failure-alert-banner">
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[28px] text-error">error</span>
<div>
<p class="font-headline-sm text-headline-sm font-semibold text-error">Transaction Declined by Gateway</p>
<p class="font-body-sm text-body-sm mt-0.5">Bank response: 104 - Institutional gateway timeout. Your cart items have been reserved for 12 hours.</p>
</div>
</div>
<a class="px-6 py-2.5 rounded-lg bg-error text-on-error font-label-md text-label-md uppercase tracking-wider shadow-sm hover:opacity-90 transition-opacity whitespace-nowrap" href="#payment-card">
              Retry Payment Now
            </a>
</div>
</div>
<!-- Guest Order Notice (Conditionally Hidden / Shown) -->
<div class="hidden mt-8 p-6 bg-secondary-fixed text-on-secondary-fixed rounded-lg" id="guest-alert-banner">
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-[28px] text-secondary">person_pin</span>
<div>
<p class="font-headline-sm text-headline-sm font-semibold">Guest Sanctuary Checkout</p>
<p class="font-body-sm text-body-sm mt-0.5">No login session was detected. You can bind this order reference to an ANUKUL profile with a single click.</p>
</div>
</div>
<button class="px-6 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider shadow-sm hover:bg-tertiary-container transition-colors whitespace-nowrap" type="button">
              Create My Account
            </button>
</div>
</div>
</div>
</div>
</section>
<!-- Two-Column Master Order Architecture -->
<section class="w-full bg-surface pb-20 px-6 lg:px-margin">
<div class="max-w-[1440px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-gutter-lg items-start">
<!-- Left Column: Order Items & Sequence Assurance (8 Columns) -->
<div class="lg:col-span-7 xl:col-span-8 flex flex-col space-y-8">
<!-- Summary Box -->
<div class="bg-surface-container-lowest p-6 lg:p-10 rounded-xl shadow-sm">
<div class="flex items-center justify-between pb-6 border-b border-surface-variant/40">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[24px]">shopping_bag</span>
<h2 class="font-headline-md text-headline-md text-primary uppercase">Your Order Summary</h2>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant font-medium">2 Items Selected</span>
</div>
<!-- Product Item 1 -->
<div class="py-6 border-b border-surface-variant/30 flex flex-col sm:flex-row items-start sm:items-center gap-5">
<div class="w-24 h-24 rounded-lg bg-surface-container shrink-0 overflow-hidden relative">
<img class="w-full h-full object-cover" data-alt="Traditional handcrafted bronze Kansa Vatki massage bowl resting on unpolished teakwood surface with soft botanical shadows and warm temple lighting, Ayurvedic wellness authentic product photography." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDLv9L89sGDmUIaSB7I9iteYt7Nzigo_vrWWkSwZSZOHrX5gcx0NnLELqzqdOyVp_yOikMhl5zhnvGV2KEKfjhHybgS_tk_JINgYcg_gvoItnGicmsz-c6YA6OTEDWW1D8WdTtKUc2YytOVseLl_ShqIG4fNyTpMwzgZL_IJQORkniJgopEqd2LhLAhDj1Q0USMNRQJU_-x5-5KGlfWamMlACgYbZ_uFmqCoIueWdeNdxdTrcUW8Gk6FA"/>
</div>
<div class="flex-1 min-w-0">
<div class="flex flex-wrap items-center gap-2 mb-1">
<span class="font-label-sm text-[11px] px-2 py-0.5 rounded bg-surface-container-high text-on-surface-variant font-medium uppercase tracking-wider">Ayurvedic Implement</span>
<span class="font-label-sm text-[11px] px-2 py-0.5 rounded bg-surface-container text-secondary font-medium">Kansa Vatki</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold truncate">Handcrafted Kansa Vatki Bowl</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Selected Variant: Standard Personal 7.5cm · 160g bell metal alloy</p>
<div class="flex items-center gap-4 mt-2">
<span class="font-label-md text-label-md text-on-surface-variant">Qty: <strong class="text-on-surface">1</strong></span>
<span class="font-label-md text-label-md text-on-surface-variant">Unit: ₹ 2,450</span>
</div>
</div>
<div class="text-right self-end sm:self-center">
<span class="font-headline-md text-headline-md text-primary font-medium">₹ 2,450</span>
<span class="block font-label-sm text-[10px] text-on-surface-variant/60 uppercase">Incl. 12% GST</span>
</div>
</div>
<!-- Product Item 2 -->
<div class="py-6 border-b border-surface-variant/30 flex flex-col sm:flex-row items-start sm:items-center gap-5">
<div class="w-24 h-24 rounded-lg bg-surface-container shrink-0 overflow-hidden relative">
<img class="w-full h-full object-cover" data-alt="Dark amber glass herbal oil bottle labeled with Sanskrit calligraphy, surrounded by raw Ashwagandha roots and fresh green herbs on a warm stone pedestal, luxury Ayurvedic clinic product photography." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDieFACqGOBomlGVVnqbZocgqWZjfzkSvluP8H_FjsKV6DQ3C0mrPUaNCiN-YElgN_IVj5fJAIDqgmm7AcVl2WRQFrPc0ofh1fBv3WHs7fyaHHesnQzUxVRnHWgwS8zjZjlpsYSyVHiSKKBiNzSupXI5hg7pb1d3XPjYVPMjdZMnl2CDLcYsF8PEBZPz72lyV-H_RXMzaAZiWVMslwZY_XNBGgRqqIIaCMF_NlzHqDvuSBWLKkNNKfIwQ"/>
</div>
<div class="flex-1 min-w-0">
<div class="flex flex-wrap items-center gap-2 mb-1">
<span class="font-label-sm text-[11px] px-2 py-0.5 rounded bg-surface-container-high text-on-surface-variant font-medium uppercase tracking-wider">Botanical Taila</span>
<span class="font-label-sm text-[11px] px-2 py-0.5 rounded bg-surface-container text-secondary font-medium">Dosha Balancer</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-semibold truncate">Cold-Pressed Herbal Taila</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Infused with Ashwagandha &amp; Bala · 200ml Amber Dispensary Vessel</p>
<div class="flex items-center gap-4 mt-2">
<span class="font-label-md text-label-md text-on-surface-variant">Qty: <strong class="text-on-surface">1</strong></span>
<span class="font-label-md text-label-md text-on-surface-variant">Unit: ₹ 850</span>
</div>
</div>
<div class="text-right self-end sm:self-center">
<span class="font-headline-md text-headline-md text-primary font-medium">₹ 850</span>
<span class="block font-label-sm text-[10px] text-on-surface-variant/60 uppercase">Incl. 5% GST</span>
</div>
</div>
<!-- Subtotal Breakdown Accounting Block -->
<div class="pt-6 space-y-3">
<div class="flex justify-between items-center text-body-md font-body-md text-on-surface-variant">
<span>Catalog Gross Subtotal</span>
<span class="font-semibold text-on-surface">₹ 3,300</span>
</div>
<div class="flex justify-between items-center text-body-md font-body-md text-secondary">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px]">local_offer</span>
                Promotional Concession (Code: <code class="text-primary font-bold">VEDICSOLSTICE</code>)
              </span>
<span class="font-semibold">- ₹ 330</span>
</div>
<div class="flex justify-between items-center text-body-md font-body-md text-on-surface-variant">
<span class="flex items-center gap-1.5">
                Surface Sanctuary Shipping (Verified India Delivery)
                <span class="font-label-sm text-[10px] text-primary bg-primary-fixed px-1.5 py-0.2 rounded font-semibold">Complimentary</span>
</span>
<span class="font-semibold text-primary">₹ 0</span>
</div>
<div class="flex justify-between items-center text-body-sm font-body-sm text-outline">
<span>Integrated Central &amp; State Taxes (5% &amp; 12% Goods Schedules)</span>
<span>Included</span>
</div>
<!-- Prominent Grand Total Line -->
<div class="pt-4 mt-2 border-t border-surface-variant/60 flex justify-between items-baseline">
<div>
<span class="font-headline-sm text-headline-sm text-primary uppercase block">Final Order Total</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">All statutory charges accounted for</span>
</div>
<div class="text-right">
<span class="font-display text-display text-primary font-medium leading-none">₹ 2,970</span>
<span class="block font-label-sm text-label-sm uppercase tracking-wider text-secondary mt-1">Total INR (Paid)</span>
</div>
</div>
</div>
</div>
<!-- 3-Step Assurance Sequence ("What Happens Next?") -->
<div class="bg-surface-container-low p-6 lg:p-10 rounded-xl">
<div class="flex items-center gap-3 pb-6 border-b border-surface-variant/40">
<span class="material-symbols-outlined text-primary text-[24px]">history_edu</span>
<h2 class="font-headline-md text-headline-md text-primary uppercase">What Happens Next?</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6">
<div class="bg-surface-container-lowest p-6 rounded-lg relative">
<div class="font-display text-headline-lg text-secondary/30 italic absolute top-4 right-4 leading-none">01</div>
<span class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center font-label-md font-bold mb-4">
<span class="material-symbols-outlined text-[18px]">inventory_2</span>
</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold mb-2">Order Received</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Your sacred items and consultation accompaniments have been registered in our dispensary queue for chronological intake.
              </p>
</div>
<div class="bg-surface-container-lowest p-6 rounded-lg relative">
<div class="font-display text-headline-lg text-secondary/30 italic absolute top-4 right-4 leading-none">02</div>
<span class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center font-label-md font-bold mb-4">
<span class="material-symbols-outlined text-[18px]">verified</span>
</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold mb-2">Mindful Preparation</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Every bronze vessel is hand-inspected and herbal preparations are fresh-sealed per classical preservation standards.
              </p>
</div>
<div class="bg-surface-container-lowest p-6 rounded-lg relative">
<div class="font-display text-headline-lg text-secondary/30 italic absolute top-4 right-4 leading-none">03</div>
<span class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center font-label-md font-bold mb-4">
<span class="material-symbols-outlined text-[18px]">local_shipping</span>
</span>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold mb-2">Dispatch &amp; Coordinates</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Once dispatched via temperature-regulated courier, tracking coordinates will be transmitted to your email and SMS.
              </p>
</div>
</div>
<!-- Dispensary Note Banner -->
<div class="mt-6 p-4 bg-surface-container rounded-lg flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[20px] shrink-0">hourglass_top</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Estimated preparation time: <strong class="text-on-surface font-semibold">24–48 hours</strong>. Delivery within metropolitan zones typically completes in 3–5 working days.
            </p>
</div>
</div>
</div>
<!-- Right Column: Contextual Details & Logistics (4 Columns) -->
<div class="lg:col-span-5 xl:col-span-4 flex flex-col space-y-6">
<!-- Card 1: Payment Details -->
<div class="bg-surface-container-lowest p-6 lg:p-8 rounded-xl shadow-sm" id="payment-card">
<div class="flex items-center justify-between pb-4 border-b border-surface-variant/40">
<h3 class="font-headline-sm text-headline-sm text-primary uppercase font-bold">Payment Details</h3>
<span class="font-label-sm text-label-sm uppercase px-2.5 py-1 rounded bg-primary-fixed text-on-primary-fixed font-semibold" id="payment-badge-status">
              Verified
            </span>
</div>
<div class="pt-5 space-y-4">
<div class="flex justify-between items-center text-body-sm font-body-sm">
<span class="text-on-surface-variant">Gateway Channel</span>
<span class="font-semibold text-on-surface" id="pmt-method">UPI / Netbanking (Razorpay)</span>
</div>
<div class="flex justify-between items-center text-body-sm font-body-sm">
<span class="text-on-surface-variant">Gateway Trans. ID</span>
<span class="font-mono text-xs text-primary font-medium" id="pmt-txnid">TXN_ANK_9381048194</span>
</div>
<div class="flex justify-between items-center text-body-sm font-body-sm">
<span class="text-on-surface-variant">Settlement Currency</span>
<span class="font-semibold text-on-surface">INR (₹) Domestic</span>
</div>
<div class="flex justify-between items-center text-body-sm font-body-sm pt-2 border-t border-surface-variant/30">
<span class="text-on-surface font-semibold">Amount Remitted</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold" id="pmt-amount">₹ 2,970</span>
</div>
<!-- Retry button container (Active only in failed state) -->
<div class="hidden pt-4" id="retry-button-zone">
<button class="w-full py-3 px-4 rounded-lg bg-tertiary-container text-on-primary font-label-md text-label-md uppercase tracking-wider font-semibold shadow hover:bg-tertiary transition-colors flex items-center justify-center gap-2" type="button">
<span class="material-symbols-outlined text-[18px]">sync</span>
                Retry Payment via Razorpay
              </button>
<p class="font-body-sm text-[12px] text-on-surface-variant text-center mt-2">
                Or select alternative UPI, Netbanking, or Debit Card.
              </p>
</div>
</div>
</div>
<!-- Card 2: Delivery & Billing Coordinates (Interactive Tabbed) -->
<div class="bg-surface-container-lowest p-6 lg:p-8 rounded-xl shadow-sm">
<div class="flex items-center justify-between pb-4 border-b border-surface-variant/40">
<h3 class="font-headline-sm text-headline-sm text-primary uppercase font-bold">Coordinates</h3>
<div class="flex gap-1 p-1 bg-surface-container rounded-md">
<button class="px-2.5 py-1 text-label-sm font-label-sm uppercase rounded bg-surface-container-lowest text-primary font-bold shadow-xs transition-all" id="tab-btn-shipping" onclick="switchAddressTab('shipping')" type="button">
                Shipping
              </button>
<button class="px-2.5 py-1 text-label-sm font-label-sm uppercase rounded text-on-surface-variant hover:text-primary transition-all" id="tab-btn-billing" onclick="switchAddressTab('billing')" type="button">
                Billing
              </button>
</div>
</div>
<!-- Shipping Content -->
<div class="pt-5 space-y-2" id="tab-content-shipping">
<div class="flex items-center gap-2 mb-3">
<span class="material-symbols-outlined text-secondary text-[20px]">pin_drop</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Consignee Destination</span>
</div>
<p class="font-headline-sm text-headline-sm text-on-surface font-semibold">Devavrata Somvanshi</p>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Apartment 402, Prana Vihara Enclave<br/>
              Near Sacred Fig Grove, Temple Road<br/>
              Bengaluru, Karnataka — 560034<br/>
              India
            </p>
<div class="pt-3 border-t border-surface-variant/30 flex items-center justify-between text-body-sm font-body-sm">
<span class="text-on-surface-variant">Dispatch Contact:</span>
<span class="text-on-surface font-medium">+91 98450 12894</span>
</div>
</div>
<!-- Billing Content (Hidden by Default) -->
<div class="hidden pt-5 space-y-2" id="tab-content-billing">
<div class="flex items-center gap-2 mb-3">
<span class="material-symbols-outlined text-secondary text-[20px]">receipt_long</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Statutory Billing Address</span>
</div>
<p class="font-headline-sm text-headline-sm text-on-surface font-semibold">Devavrata Somvanshi</p>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              Same as shipping destination coordinates.<br/>
              GSTIN: Unregistered Consumer (B2C)
            </p>
<div class="pt-3 border-t border-surface-variant/30 flex items-center justify-between text-body-sm font-body-sm">
<span class="text-on-surface-variant">Tax Invoice:</span>
<span class="text-primary font-medium">Auto-Generated GST-01</span>
</div>
</div>
</div>
<!-- Card 3: Order Actions & Account Pathways -->
<div class="bg-surface-container-lowest p-6 lg:p-8 rounded-xl shadow-sm space-y-3">
<a class="w-full py-3.5 px-6 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider flex items-center justify-center gap-2 shadow-sm hover:bg-tertiary-container transition-colors" href="#">
<span class="material-symbols-outlined text-[18px]">download</span>
            Download GST Tax Invoice (PDF)
          </a>
<a class="w-full py-3.5 px-6 rounded-lg bg-surface-container text-primary hover:bg-surface-variant/60 font-label-md text-label-md uppercase tracking-wider flex items-center justify-center gap-2 transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">
<span class="material-symbols-outlined text-[18px]">storefront</span>
            Continue Browsing Shop
          </a>
<div class="pt-2 text-center">
<a class="font-label-md text-label-md uppercase text-secondary hover:text-primary tracking-widest inline-flex items-center gap-1 transition-colors" data-path="my-account" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>">
              Go To My Account Dashboard
              <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</a>
</div>
</div>
<!-- Card 4: Have a Question About Your Order? -->
<div class="bg-surface-container-high p-6 lg:p-8 rounded-xl flex flex-col justify-between space-y-4">
<div class="space-y-2">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">support_agent</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Dispensary Inquiry</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-on-surface font-semibold">Have questions on usage or delivery?</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Our clinical dispensary attendants are available Monday to Saturday to assist with dosha alignment, formulation usage, or tracking.
            </p>
</div>
<div class="pt-2">
<a class="inline-flex items-center justify-center w-full py-3 px-4 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-primary transition-colors gap-2" data-path="contact" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>">
<span class="material-symbols-outlined text-[16px]">mail</span>
              Contact Clinic Desk
            </a>
</div>
</div>
</div>
</div>
</section>
<!-- Responsible Practice Disclaimer & Vedic Wellness Note -->
<section class="w-full bg-surface-container-low py-10 px-6 lg:px-margin border-t border-surface-variant/30">
<div class="max-w-[1440px] mx-auto flex flex-col md:flex-row items-center gap-6 justify-between text-center md:text-left">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center shrink-0 text-primary">
<span class="material-symbols-outlined text-[24px]">balance</span>
</div>
<div>
<h5 class="font-headline-sm text-headline-sm text-primary uppercase">Responsible Vedic Clinical Practice</h5>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-3xl mt-1">
            ANUKUL's traditional ayurvedic and vastu implements support conscious daily living. Order dispatches adhere to standard botanical storage and artisanal handling. Formulations are prepared in accordance with classical textual recipes under registered Ayurvedic supervision.
          </p>
</div>
</div>
<div class="shrink-0 flex items-center gap-3">
<span class="font-label-sm text-label-sm uppercase px-3 py-1.5 rounded bg-surface-container text-secondary tracking-widest font-bold">
          AYUSH Standards
        </span>
<span class="font-label-sm text-label-sm uppercase px-3 py-1.5 rounded bg-surface-container text-secondary tracking-widest font-bold">
          Bronze Purity Tested
        </span>
</div>
</div>
</section>
</div>
<script>
  function switchAddressTab(type) {
    const shippingTab = document.getElementById('tab-content-shipping');
    const billingTab = document.getElementById('tab-content-billing');
    const btnShipping = document.getElementById('tab-btn-shipping');
    const btnBilling = document.getElementById('tab-btn-billing');

    if (type === 'shipping') {
      shippingTab.classList.remove('hidden');
      billingTab.classList.add('hidden');
      btnShipping.classList.add('bg-surface-container-lowest', 'text-primary', 'font-bold', 'shadow-xs');
      btnShipping.classList.remove('text-on-surface-variant');
      btnBilling.classList.remove('bg-surface-container-lowest', 'text-primary', 'font-bold', 'shadow-xs');
      btnBilling.classList.add('text-on-surface-variant');
    } else {
      shippingTab.classList.add('hidden');
      billingTab.classList.remove('hidden');
      btnBilling.classList.add('bg-surface-container-lowest', 'text-primary', 'font-bold', 'shadow-xs');
      btnBilling.classList.remove('text-on-surface-variant');
      btnShipping.classList.remove('bg-surface-container-lowest', 'text-primary', 'font-bold', 'shadow-xs');
      btnShipping.classList.add('text-on-surface-variant');
    }
  }

  function setOrderState(state) {
    const buttons = document.querySelectorAll('.state-btn');
    buttons.forEach(btn => {
      if (btn.getAttribute('data-state') === state) {
        btn.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
        btn.classList.remove('text-on-surface-variant');
      } else {
        btn.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
        btn.classList.add('text-on-surface-variant');
      }
    });

    const headline = document.getElementById('order-main-headline');
    const subtext = document.getElementById('order-main-subtext');
    const statusIcon = document.getElementById('status-icon');
    const iconInner = document.getElementById('status-icon-inner');
    const iconRing = document.getElementById('status-icon-ring');
    const statePill = document.getElementById('state-pill');

    const orderStatusVal = document.getElementById('order-status-val');
    const orderStatusSub = document.getElementById('order-status-sub');
    const pmtStatusVal = document.getElementById('payment-status-val');
    const pmtStatusSub = document.getElementById('payment-status-sub');
    const pmtBadgeStatus = document.getElementById('payment-badge-status');
    const retryZone = document.getElementById('retry-button-zone');
    const failBanner = document.getElementById('failure-alert-banner');
    const guestBanner = document.getElementById('guest-alert-banner');

    // Reset default visuals
    failBanner.classList.add('hidden');
    guestBanner.classList.add('hidden');
    retryZone.classList.add('hidden');

    if (state === 'confirmed') {
      headline.innerText = 'Thank You For Your Order.';
      subtext.innerText = 'Your order details have been securely recorded. An email confirmation has been sent to your registered email address. Please retain your order reference number below.';
      statusIcon.innerText = 'check_circle';
      iconInner.className = 'w-16 h-16 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-md';
      iconRing.className = 'w-24 h-24 rounded-full bg-primary-container/10 flex items-center justify-center relative';
      statePill.innerText = 'Sanctuary Verified';
      statePill.className = 'font-label-sm text-label-sm uppercase px-3 py-1 rounded bg-secondary-fixed text-on-secondary-fixed tracking-wider font-semibold';

      orderStatusVal.innerHTML = '<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Processing';
      orderStatusSub.innerText = 'Dispensary Queued';
      pmtStatusVal.innerText = 'Razorpay UPI';
      pmtStatusSub.innerText = 'Ref: TXN_ANK_9381048194';
      pmtBadgeStatus.innerText = 'Verified';
      pmtBadgeStatus.className = 'font-label-sm text-label-sm uppercase px-2.5 py-1 rounded bg-primary-fixed text-on-primary-fixed font-semibold';
    } 
    else if (state === 'pending') {
      headline.innerText = 'Order Received · Payment Pending';
      subtext.innerText = 'Your order has been received and payment is awaiting confirmation from your payment provider. We will update this invoice as soon as authorization completes.';
      statusIcon.innerText = 'schedule';
      iconInner.className = 'w-16 h-16 rounded-full bg-secondary text-on-secondary flex items-center justify-center shadow-md';
      iconRing.className = 'w-24 h-24 rounded-full bg-secondary-fixed/40 flex items-center justify-center relative';
      statePill.innerText = 'Awaiting Authorization';
      statePill.className = 'font-label-sm text-label-sm uppercase px-3 py-1 rounded bg-secondary-fixed text-on-secondary-fixed tracking-wider font-semibold';

      orderStatusVal.innerHTML = '<span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span> Payment Pending';
      orderStatusSub.innerText = 'Pending Gateway Webhook';
      pmtStatusVal.innerText = 'UPI Awaiting Sync';
      pmtStatusSub.innerText = 'UTR Verification in Progress';
      pmtBadgeStatus.innerText = 'Pending';
      pmtBadgeStatus.className = 'font-label-sm text-label-sm uppercase px-2.5 py-1 rounded bg-secondary-fixed text-on-secondary-fixed font-semibold';
    } 
    else if (state === 'failed') {
      headline.innerText = "We Couldn't Confirm Your Payment.";
      subtext.innerText = 'Please review your payment details and retry using an alternative method. Your reserved apothecary items will remain secured for the next 12 hours.';
      statusIcon.innerText = 'error';
      iconInner.className = 'w-16 h-16 rounded-full bg-error text-on-error flex items-center justify-center shadow-md';
      iconRing.className = 'w-24 h-24 rounded-full bg-error-container flex items-center justify-center relative';
      statePill.innerText = 'Action Required';
      statePill.className = 'font-label-sm text-label-sm uppercase px-3 py-1 rounded bg-error-container text-on-error-container tracking-wider font-semibold';

      orderStatusVal.innerHTML = '<span class="w-2 h-2 rounded-full bg-error"></span> Payment Failed';
      orderStatusSub.innerText = 'Action Required to Dispatch';
      pmtStatusVal.innerText = 'Declined';
      pmtStatusSub.innerText = 'Gateway Code: 104 Timeout';
      pmtBadgeStatus.innerText = 'Failed';
      pmtBadgeStatus.className = 'font-label-sm text-label-sm uppercase px-2.5 py-1 rounded bg-error-container text-on-error-container font-semibold';
      
      failBanner.classList.remove('hidden');
      retryZone.classList.remove('hidden');
    } 
    else if (state === 'guest') {
      headline.innerText = 'Thank You For Your Guest Order.';
      subtext.innerText = 'Your order #ANK-84920 has been placed as a guest user. We have dispatched your dispatch coordinates to your contact email address.';
      statusIcon.innerText = 'person';
      iconInner.className = 'w-16 h-16 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-md';
      iconRing.className = 'w-24 h-24 rounded-full bg-primary-container/10 flex items-center justify-center relative';
      statePill.innerText = 'Guest Session';
      statePill.className = 'font-label-sm text-label-sm uppercase px-3 py-1 rounded bg-surface-variant text-on-surface-variant tracking-wider font-semibold';

      guestBanner.classList.remove('hidden');
      orderStatusVal.innerHTML = '<span class="w-2 h-2 rounded-full bg-primary"></span> Processing';
      orderStatusSub.innerText = 'Dispensary Queued';
      pmtStatusVal.innerText = 'Razorpay UPI';
      pmtStatusSub.innerText = 'Ref: TXN_ANK_9381048194';
      pmtBadgeStatus.innerText = 'Verified';
      pmtBadgeStatus.className = 'font-label-sm text-label-sm uppercase px-2.5 py-1 rounded bg-primary-fixed text-on-primary-fixed font-semibold';
    }
  }
</script>

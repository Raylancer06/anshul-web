<?php
/**
 * Checkout Form
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );
?>

<div class="flex flex-col w-full">
<!-- Subtle Architectural Watermark / Atmosphere Accent -->
<div class="relative w-full max-w-[1440px] mx-auto px-6 lg:px-margin pt-6 pb-20">
<!-- BREADCRUMBS & TOP EDITORIAL PROGRESS -->
<div class="flex flex-col gap-4 mb-8">
<!-- Breadcrumb Nav -->
<nav aria-label="Breadcrumb" class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">
<a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( "/" ) ); ?>">Home</a>
<span class="text-outline-variant">/</span>
<a class="hover:text-primary transition-colors" data-path="shop" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>">Shop</a>
<span class="text-outline-variant">/</span>
<a class="hover:text-primary transition-colors" data-path="cart" href="<?php echo esc_url( function_exists( "wc_get_cart_url" ) ? wc_get_cart_url() : home_url( "/cart/" ) ); ?>">Cart</a>
<span class="text-outline-variant">/</span>
<span class="text-primary font-semibold">Checkout</span>
</nav>
<!-- Main Title & Spatial Subhead -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-surface-variant">
<div class="space-y-1">
<span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-secondary">Sacred Commerce • Verified Protocol</span>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight uppercase">Complete Your Order</h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-xl">
            Review your ceremonial apothecary items, precise dispatch coordinates, and secure transaction credentials.
          </p>
</div>
<!-- Multi-Step Indicator -->
<div class="flex items-center gap-3 sm:gap-6 bg-surface-container-low px-5 py-3 rounded-xl border border-surface-variant/60 shadow-sm self-start md:self-auto">
<!-- Step 1: Cart Completed -->
<div class="flex items-center gap-2">
<span class="w-6 h-6 rounded-full bg-primary-container text-surface flex items-center justify-center font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[14px]">done</span>
</span>
<span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Cart</span>
</div>
<div class="w-8 h-[1px] bg-outline-variant/60"></div>
<!-- Step 2: Checkout Active -->
<div class="flex items-center gap-2">
<span class="w-6 h-6 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-sm text-label-sm font-bold shadow-sm">
              2
            </span>
<span class="font-label-md text-label-md uppercase tracking-wider text-primary font-bold">Checkout</span>
</div>
<div class="w-8 h-[1px] bg-outline-variant/60"></div>
<!-- Step 3: Confirmation Upcoming -->
<div class="flex items-center gap-2 opacity-50">
<span class="w-6 h-6 rounded-full bg-surface-variant text-on-surface-variant flex items-center justify-center font-label-sm text-label-sm">
              3
            </span>
<span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Confirmation</span>
</div>
</div>
</div>
</div>
<!-- MAIN GRID CONTAINER -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-gutter-lg items-start">
<!-- LEFT COLUMN: Checkout Form Sections (62% Desktop) -->
<form class="lg:col-span-7 xl:col-span-8 flex flex-col gap-8" id="checkoutForm" onsubmit="event.preventDefault();">
<!-- Returning Customer Notice -->
<div class="bg-surface-container-low border border-surface-variant rounded-xl p-4 sm:p-5 flex items-center justify-between gap-4 shadow-sm">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary text-[22px]">account_circle</span>
<p class="font-body-md text-body-md text-on-surface">
              Returning patron to the sanctuary? 
              <a class="font-semibold text-primary underline underline-offset-4 hover:text-tertiary transition-colors ml-1" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>">Log in here</a>
</p>
</div>
<span class="hidden sm:inline-block font-label-sm text-label-sm uppercase tracking-widest text-outline">Express Access</span>
</div>
<!-- SECTION 1: CUSTOMER INFORMATION -->
<section class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-8 shadow-sm relative overflow-hidden">
<div class="absolute top-0 left-0 w-1.5 h-full bg-primary"></div>
<div class="flex items-center justify-between mb-6">
<div class="flex items-center gap-3">
<span class="font-editorial-quote text-editorial-quote italic text-secondary">01</span>
<div>
<h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide">Your Details</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Primary contact for consignment notifications and consultation records.</p>
</div>
</div>
<span class="material-symbols-outlined text-outline-variant">badge</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
<div>
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="firstName">
                First Name <span class="text-tertiary">*</span>
</label>
<input class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="firstName" placeholder="Aarav" required="" type="text"/>
</div>
<div>
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="lastName">
                Last Name <span class="text-tertiary">*</span>
</label>
<input class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="lastName" placeholder="Nambiar" required="" type="text"/>
</div>
<div class="sm:col-span-2">
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="email">
                Email Address <span class="text-tertiary">*</span>
</label>
<input class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="email" placeholder="aarav.nambiar@sanctuary.in" required="" type="email"/>
<p class="font-body-sm text-body-sm text-outline mt-1.5 flex items-center gap-1.5">
<span class="material-symbols-outlined text-[14px]">lock</span>
                Your invoice and clinical batch test certs will be dispatched to this address.
              </p>
</div>
<div class="sm:col-span-2">
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="phone">
                Mobile Number (Dispatch Coordination) <span class="text-tertiary">*</span>
</label>
<div class="flex rounded-lg overflow-hidden border border-surface-variant focus-within:border-primary focus-within:ring-1 focus-within:ring-primary bg-surface/70 transition-all">
<div class="bg-surface-container px-4 py-3 font-body-md text-on-surface border-r border-surface-variant flex items-center gap-1 select-none">
<span class="text-secondary font-semibold">🇮🇳 +91</span>
</div>
<input class="w-full bg-transparent px-4 py-3 font-body-md text-on-surface focus:outline-none placeholder:text-outline-variant/60" id="phone" placeholder="98765 43210" required="" type="tel"/>
</div>
</div>
<div class="sm:col-span-2 pt-1">
<label class="flex items-start gap-3 cursor-pointer group">
<input class="mt-1 w-4 h-4 rounded border-surface-variant text-primary focus:ring-primary accent-primary" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface-variant group-hover:text-on-surface transition-colors">
                  Create an ANUKUL Sanctuary Account for expedited re-orders and personalized constitutional tracking.
                </span>
</label>
</div>
</div>
</section>
<!-- SECTION 2: BILLING ADDRESS -->
<section class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-8 shadow-sm relative overflow-hidden">
<div class="absolute top-0 left-0 w-1.5 h-full bg-secondary"></div>
<div class="flex items-center justify-between mb-6">
<div class="flex items-center gap-3">
<span class="font-editorial-quote text-editorial-quote italic text-secondary">02</span>
<div>
<h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide">Billing Coordinates</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Official address associated with your payment instrument.</p>
</div>
</div>
<span class="material-symbols-outlined text-outline-variant">home_pin</span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-6 gap-5">
<div class="sm:col-span-6">
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="country">
                Country / Region <span class="text-tertiary">*</span>
</label>
<div class="relative">
<select class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all appearance-none cursor-pointer" id="country">
<option selected="" value="IN">India (Bharat)</option>
<option value="AE">United Arab Emirates</option>
<option value="SG">Singapore</option>
<option value="UK">United Kingdom</option>
<option value="US">United States</option>
</select>
<span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-outline">expand_more</span>
</div>
</div>
<div class="sm:col-span-6">
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="street">
                Street Address <span class="text-tertiary">*</span>
</label>
<input class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="street" placeholder="House number, residential enclave, or street name" required="" type="text"/>
</div>
<div class="sm:col-span-6">
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="apartment">
                Apartment, Suite, Unit, Villa <span class="text-outline text-label-sm font-normal">(Optional)</span>
</label>
<input class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="apartment" placeholder="Tower B, Penthouse 4B / Spatial Sector 7" type="text"/>
</div>
<div class="sm:col-span-2">
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="city">
                City / District <span class="text-tertiary">*</span>
</label>
<input class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="city" placeholder="Bengaluru" required="" type="text"/>
</div>
<div class="sm:col-span-2">
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="state">
                State <span class="text-tertiary">*</span>
</label>
<div class="relative">
<select class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all appearance-none cursor-pointer" id="state">
<option selected="" value="KA">Karnataka</option>
<option value="MH">Maharashtra</option>
<option value="DL">Delhi NCR</option>
<option value="TN">Tamil Nadu</option>
<option value="KL">Kerala</option>
<option value="TS">Telangana</option>
<option value="GJ">Gujarat</option>
<option value="WB">West Bengal</option>
</select>
<span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-outline">expand_more</span>
</div>
</div>
<div class="sm:col-span-2">
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="pincode">
                PIN Code <span class="text-tertiary">*</span>
</label>
<input class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-3 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all placeholder:text-outline-variant/60" id="pincode" pattern="[0-9]{6}" placeholder="560034" required="" type="text"/>
</div>
</div>
</section>
<!-- SECTION 3: DELIVERY DETAILS & METHODS -->
<section class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-8 shadow-sm relative overflow-hidden">
<div class="absolute top-0 left-0 w-1.5 h-full bg-primary-container"></div>
<div class="flex items-center justify-between mb-6">
<div class="flex items-center gap-3">
<span class="font-editorial-quote text-editorial-quote italic text-secondary">03</span>
<div>
<h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide">Delivery Logistics</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Mindfully packaged in ecological, vibration-dampening craft paper.</p>
</div>
</div>
<span class="material-symbols-outlined text-outline-variant">local_shipping</span>
</div>
<!-- Ship to different address toggle -->
<div class="mb-6 p-4 bg-surface-container-low rounded-lg border border-surface-variant/70">
<label class="flex items-center gap-3 cursor-pointer">
<input class="w-4 h-4 rounded border-surface-variant text-primary focus:ring-primary accent-primary" id="shipDifferent" onchange="document.getElementById('altShippingWrap').classList.toggle('hidden', !this.checked)" type="checkbox"/>
<span class="font-body-md text-body-md font-medium text-on-surface">Ship to a different physical address?</span>
</label>
<div class="hidden mt-4 pt-4 border-t border-surface-variant/50 space-y-4" id="altShippingWrap">
<p class="font-body-sm text-body-sm text-outline">Specify secondary sanctuary location or recipient details:</p>
<input class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-2.5 font-body-sm text-on-surface focus:outline-none focus:border-primary" placeholder="Recipient Full Name &amp; Contact" type="text"/>
<input class="w-full bg-surface/70 border border-surface-variant rounded-lg px-4 py-2.5 font-body-sm text-on-surface focus:outline-none focus:border-primary" placeholder="Destination Street, City &amp; PIN Code" type="text"/>
</div>
</div>
<!-- Shipping Options Selection -->
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-3">Select Dispatch Cadence</label>
<div class="space-y-3">
<!-- Option 1: Standard Surface -->
<label class="flex items-start justify-between p-4 rounded-xl border border-primary bg-primary/5 cursor-pointer transition-all">
<div class="flex items-start gap-3">
<input checked="" class="mt-1 w-4 h-4 text-primary accent-primary" name="shipping_method" onchange="window.updateShipping(150, 'Standard Surface Sanctuary Delivery')" type="radio" value="150"/>
<div>
<div class="flex items-center gap-2">
<span class="font-body-md text-body-md font-semibold text-primary">Standard Surface Sanctuary Delivery</span>
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-0.5 rounded text-secondary font-medium tracking-wider">ECO-CONSCIOUS</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Dispatched in 2-3 business days across India via insured clinical couriers.</p>
</div>
</div>
<span class="font-headline-sm text-headline-sm text-primary ml-4">₹150</span>
</label>
<!-- Option 2: Express Air Dispatch -->
<label class="flex items-start justify-between p-4 rounded-xl border border-surface-variant bg-surface-container-low hover:border-secondary transition-all cursor-pointer">
<div class="flex items-start gap-3">
<input class="mt-1 w-4 h-4 text-primary accent-primary" name="shipping_method" onchange="window.updateShipping(350, 'Express Air Dispatch (Priority)')" type="radio" value="350"/>
<div>
<div class="flex items-center gap-2">
<span class="font-body-md text-body-md font-semibold text-on-surface">Express Air Dispatch</span>
<span class="font-label-sm text-label-sm bg-secondary-fixed text-on-secondary-fixed px-2 py-0.5 rounded font-bold tracking-wider">PRIORITY</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Expedited 24–48 hour transit for temperature-sensitive tailas and astrological metals.</p>
</div>
</div>
<span class="font-headline-sm text-headline-sm text-on-surface ml-4">₹350</span>
</label>
</div>
</section>
<!-- SECTION 4: PAYMENT SELECTION -->
<section class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-8 shadow-sm relative overflow-hidden">
<div class="absolute top-0 left-0 w-1.5 h-full bg-tertiary"></div>
<div class="flex items-center justify-between mb-6">
<div class="flex items-center gap-3">
<span class="font-editorial-quote text-editorial-quote italic text-secondary">04</span>
<div>
<h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide">Payment Gateway</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">RBI authorized payment rails with 256-bit AES encryption.</p>
</div>
</div>
<span class="material-symbols-outlined text-outline-variant">encrypted</span>
</div>
<div class="space-y-4">
<!-- Payment Option 1: Online Gateway -->
<div class="border border-primary rounded-xl overflow-hidden bg-surface/50">
<label class="flex items-center justify-between p-4 bg-primary/5 cursor-pointer">
<div class="flex items-center gap-3">
<input checked="" class="w-4 h-4 text-primary accent-primary" name="payment_method" onchange="document.getElementById('onlineDetails').classList.remove('hidden'); document.getElementById('codDetails').classList.add('hidden');" type="radio" value="online"/>
<div>
<span class="font-body-md text-body-md font-semibold text-primary">Instant Online Transfer (UPI • Cards • NetBanking)</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">Instant processing via Razorpay &amp; CCAvenue</p>
</div>
</div>
<!-- Payment Badge Icons -->
<div class="flex items-center gap-1.5 text-outline">
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-1 rounded text-primary font-bold">UPI</span>
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-1 rounded text-primary font-bold">CARDS</span>
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-1 rounded text-primary font-bold">NETBANKING</span>
</div>
</label>
<!-- Nested online options notice -->
<div class="p-4 border-t border-surface-variant bg-surface-container-low/50" id="onlineDetails">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[20px] mt-0.5">verified_user</span>
<div class="space-y-1">
<p class="font-body-sm text-body-sm text-on-surface">
                      Upon clicking <strong class="text-primary font-semibold">Place Order</strong>, you will be redirected to the secure portal to complete your transaction via Google Pay, PhonePe, Paytm, RuPay, Visa, Mastercard, or Major Indian Banks.
                    </p>
<p class="font-label-sm text-label-sm uppercase text-outline tracking-wider">Zero Transaction Surcharge • 100% Secure Enclave</p>
</div>
</div>
</div>
</div>
<!-- Payment Option 2: Cash on Delivery -->
<div class="border border-surface-variant rounded-xl overflow-hidden bg-surface/50">
<label class="flex items-center justify-between p-4 cursor-pointer hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-3">
<input class="w-4 h-4 text-primary accent-primary" name="payment_method" onchange="document.getElementById('onlineDetails').classList.add('hidden'); document.getElementById('codDetails').classList.remove('hidden');" type="radio" value="cod"/>
<div>
<span class="font-body-md text-body-md font-semibold text-on-surface">Cash On Delivery (COD)</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">Remit payment in cash upon consignment hand-off</p>
</div>
</div>
<span class="font-label-sm text-label-sm bg-surface-variant text-on-surface-variant px-2.5 py-1 rounded tracking-wider uppercase font-semibold">VERIFIED PINS</span>
</label>
<div class="hidden p-4 border-t border-surface-variant bg-surface-container-low/50" id="codDetails">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-tertiary text-[20px] mt-0.5">info</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                    Please keep the exact sum ready. Our courier partners require an OTP confirmation delivered to your mobile upon handoff. Available for orders up to ₹10,000 across serviceable Indian pincodes.
                  </p>
</div>
</div>
</div>
</div>
</section>
<!-- SECTION 5: STATUTORY TERMS & CONFIRMATION NOTE -->
<section class="bg-surface-container-low border border-surface-variant/80 rounded-xl p-6 space-y-4">
<label class="flex items-start gap-3 cursor-pointer group">
<input checked="" class="mt-1 w-4 h-4 rounded border-surface-variant text-primary focus:ring-primary accent-primary" id="termsCheck" required="" type="checkbox"/>
<span class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              I have read, comprehended, and solemnly agree to the 
              <a class="text-primary font-semibold underline underline-offset-2 hover:text-tertiary" data-path="terms" href="contact.html#terms">Terms &amp; Conditions</a>, 
              <a class="text-primary font-semibold underline underline-offset-2 hover:text-tertiary" data-path="privacy-policy" href="contact.html#privacy">Privacy Policy</a>, and 
              <a class="text-primary font-semibold underline underline-offset-2 hover:text-tertiary" data-path="disclaimer" href="contact.html#disclaimer">Ayurvedic Practice &amp; Spatial Alignment Disclaimers</a>.
            </span>
</label>
<div class="p-3 bg-surface rounded-lg border border-surface-variant flex items-center gap-3">
<span class="material-symbols-outlined text-outline-variant text-[20px]">fact_check</span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
              Kindly inspect all shipping details prior to executing order. Once consecrated, custom engraved Vastu Yantras cannot be recalled.
            </p>
</div>
</section>
</form>
<!-- RIGHT COLUMN: Sticky Order Summary & Direct Actions (38% Desktop) -->
<aside class="lg:col-span-5 xl:col-span-4 sticky top-24 space-y-6">
<div class="bg-surface-container-lowest border border-surface-variant rounded-xl p-6 sm:p-7 shadow-md">
<!-- Summary Header -->
<div class="flex items-center justify-between pb-4 border-b border-surface-variant">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[22px]">shopping_bag</span>
<h2 class="font-headline-sm text-headline-sm text-primary uppercase tracking-wide">Your Order</h2>
</div>
<a class="font-label-md text-label-md uppercase tracking-wider text-secondary hover:text-primary transition-colors flex items-center gap-1 font-semibold" data-path="cart" href="<?php echo esc_url( function_exists( "wc_get_cart_url" ) ? wc_get_cart_url() : home_url( "/cart/" ) ); ?>">
<span class="material-symbols-outlined text-[14px]">arrow_back</span>
              Edit Cart
            </a>
</div>
<!-- Product Cart Items -->
<div class="divide-y divide-surface-variant/60 py-2">
<!-- Item 1: Handcrafted Kansa Vatki Bowl -->
<div class="py-4 flex gap-4 items-center">
<div class="relative w-16 h-16 rounded-lg overflow-hidden border border-surface-variant bg-surface-container shrink-0">
<img alt="Kansa Vatki Bowl" class="w-full h-full object-cover" data-alt="Handcrafted authentic Kansa bronze foot massage bowl glowing softly in warm temple courtyard lighting with delicate bronze bell metal reflections, sitting on aged teak wood in an Ayurvedic clinic setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOVcEryGcIhA-t1oObsRQiV8oIENzr-MuvAiFYOuBKXk8pA0rObHIoZ_Z0Jvk5Hc9ZuinDZTirDVtlSwIfgD5sw2yC7qSPI_cdKXCng4Pt1t36PDrLX69WKngjRNzJUUcLZ5eeaoQ_6V4y-snMacX3SLNnYs8ljnq1HDNsGh03U3f-2Ct340eS3Ai6DadnXN3__-1lJZQZ54SjMInhvX0jU2QGxMi9UumVpnR6gpZFRaXG7BcWxOl7uQ"/>
<span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-primary text-surface flex items-center justify-center font-label-sm text-label-sm font-bold shadow-sm">
                  1
                </span>
</div>
<div class="flex-1 min-w-0">
<h3 class="font-body-md text-body-md font-semibold text-primary truncate">Handcrafted Kansa Vatki Bowl</h3>
<p class="font-body-sm text-body-sm text-outline-variant truncate">Standard Personal • 7.5cm (Cu-Sn Alloy)</p>
<div class="flex items-center gap-2 mt-1">
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-0.5 rounded text-on-surface-variant uppercase tracking-wider">CONSECRATED</span>
</div>
</div>
<div class="text-right shrink-0">
<span class="font-body-md text-body-md font-bold text-on-surface">₹2,450</span>
</div>
</div>
<!-- Item 2: Cold-Pressed Herbal Taila -->
<div class="py-4 flex gap-4 items-center">
<div class="relative w-16 h-16 rounded-lg border border-surface-variant bg-surface-container shrink-0 overflow-hidden">
<img alt="Cold-Pressed Herbal Taila" class="w-full h-full object-cover" data-alt="Amber glass apothecary bottle of traditional cold pressed Ayurvedic herbal oil with gold foil botanical calligraphy label, placed next to fresh vetiver roots and dried sandalwood on a warm cream stone background." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBKP79LIS_TX2b7jentWyGNY63JqrnFahBsfazpoHgo3re-jgxJUEZUykNsa6pOrgD-X-JozeLI7ebmqc4I-NIZzciwscEskjKZsTb-z1Ro-VRnKnjVpBcym31kas8A7KXfu9J46qiT4_0fcw6PdRBcbptCsVR921Nv_TjcKBAGqcWSZ3-VJfyAKYFIicrL2M1vLR2ciGwnMGnufCJh-gNzu6V5GLKFfWtws5_X1OafrPanTt2NbTTFYg"/>
<span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-primary text-surface flex items-center justify-center font-label-sm text-label-sm font-bold shadow-sm">
                  1
                </span>
</div>
<div class="flex-1 min-w-0">
<h3 class="font-body-md text-body-md font-semibold text-primary truncate">Cold-Pressed Herbal Taila</h3>
<p class="font-body-sm text-body-sm text-outline-variant truncate">External Snehana • 200ml Glass Flask</p>
<div class="flex items-center gap-2 mt-1">
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-0.5 rounded text-on-surface-variant uppercase tracking-wider">VEDIC HERBAL</span>
</div>
</div>
<div class="text-right shrink-0">
<span class="font-body-md text-body-md font-bold text-on-surface">₹850</span>
</div>
</div>
</div>
<!-- Coupon Code Input Box -->
<div class="pt-2 pb-5 border-t border-surface-variant/80">
<label class="block font-label-md text-label-md uppercase text-on-surface-variant tracking-wider mb-2" for="couponCode">Sanctuary Voucher / Gift Code</label>
<div class="flex gap-2">
<input class="flex-1 bg-surface/70 border border-surface-variant rounded-lg px-3 py-2.5 font-body-sm text-on-surface uppercase tracking-wider placeholder:normal-case placeholder:tracking-normal focus:outline-none focus:border-primary" id="couponCode" placeholder="Enter coupon code" type="text"/>
<button class="px-5 py-2.5 bg-surface-container hover:bg-surface-variant text-primary font-label-md text-label-md uppercase tracking-wider rounded-lg transition-colors font-bold border border-surface-variant" onclick="window.applyCoupon()" type="button">
                Apply
              </button>
</div>
<div class="hidden mt-2 p-2 bg-primary/10 rounded text-primary font-body-sm text-body-sm flex items-center gap-1.5" id="couponNotice">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
<span>Code applied: <strong>VASTU10</strong> (-₹330)</span>
</div>
</div>
<!-- Financial Calculation Matrix -->
<div class="space-y-3 pt-4 border-t border-surface-variant font-body-md text-body-md">
<div class="flex justify-between text-on-surface-variant">
<span>Items Subtotal</span>
<span class="font-medium text-on-surface" id="calcSubtotal">₹3,300</span>
</div>
<div class="flex justify-between text-on-surface-variant items-center">
<div class="flex items-center gap-1.5">
<span>Sanctuary Dispatch</span>
<span class="material-symbols-outlined text-[14px] text-outline cursor-help" title="Standard insured pan-India carriage">info</span>
</div>
<span class="font-medium text-on-surface" id="calcShipping">₹150</span>
</div>
<div class="hidden justify-between text-secondary" id="discountRow">
<span>Vedic Privilege Concession</span>
<span class="font-semibold">-₹330</span>
</div>
<div class="flex justify-between text-outline text-body-sm">
<span>Estimated GST / Harmonized Tax</span>
<span class="text-outline font-normal">Inclusive (18% / 12% GST)</span>
</div>
<!-- Total Line -->
<div class="flex justify-between items-baseline pt-4 border-t border-surface-variant">
<div>
<span class="font-label-md text-label-md uppercase tracking-wider text-secondary font-bold block">Final Remittance</span>
<span class="font-body-sm text-body-sm text-outline">All statutory levies included</span>
</div>
<div class="text-right">
<span class="font-headline-md text-headline-md text-primary font-bold" id="calcTotal">₹3,450</span>
</div>
</div>
</div>
<!-- Main CTA: Place Order Button -->
<div class="mt-6">
<button class="w-full bg-[#1F4D3A] hover:bg-[#7A2638] text-[#F7F1E3] py-4 px-6 rounded-lg font-label-md text-label-md uppercase tracking-widest transition-all duration-300 flex items-center justify-center gap-3 shadow-md hover:shadow-lg active:scale-[0.99] group cursor-pointer" id="submitOrderBtn" onclick="window.handlePlaceOrder()" type="button">
<span class="material-symbols-outlined text-[20px] transition-transform group-hover:translate-x-0.5">lock</span>
<span id="placeOrderText">Place Order — ₹3,450</span>
</button>
<p class="font-label-sm text-label-sm text-center text-outline uppercase tracking-wider mt-2.5">
              Instant Order Confirmation Via SMS &amp; Email
            </p>
</div>
<!-- Trust Badges -->
<div class="mt-6 pt-6 border-t border-surface-variant/70 space-y-3.5">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[20px] shrink-0 mt-0.5">workspace_premium</span>
<div>
<h4 class="font-label-md text-label-md uppercase font-bold text-primary tracking-wide">Handcrafted &amp; Authenticated</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Forged from pure Vedic metals and organically sourced snehana herbs.</p>
</div>
</div>
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[20px] shrink-0 mt-0.5">verified</span>
<div>
<h4 class="font-label-md text-label-md uppercase font-bold text-primary tracking-wide">Secure 256-bit Encrypted Checkout</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Compliant with the highest Indian banking cybersecurity guidelines.</p>
</div>
</div>
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[20px] shrink-0 mt-0.5">spatial_tracking</span>
<div>
<h4 class="font-label-md text-label-md uppercase font-bold text-primary tracking-wide">Verified Real-Time Consignment Tracking</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant">Live SMS updates upon warehouse release and local courier dispatch.</p>
</div>
</div>
</div>
<!-- Assistance Box -->
<div class="mt-6 p-4 bg-surface-container rounded-lg border border-surface-variant text-center">
<p class="font-body-sm text-body-sm text-on-surface">
              Need assistance with your formulation selection?
            </p>
<a class="inline-flex items-center gap-1.5 font-label-md text-label-md uppercase tracking-wider text-secondary font-bold hover:text-primary transition-colors mt-1" data-path="contact" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>">
<span class="material-symbols-outlined text-[16px]">support_agent</span>
              Contact Sanctuary Concierge
            </a>
</div>
</div>
<!-- Cardinal Vastu Orientation Micro-Indicator (Aesthetic Brand Grounding) -->
<div class="p-4 bg-surface-container-low rounded-xl border border-surface-variant flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full border border-secondary/40 flex items-center justify-center text-secondary">
<span class="material-symbols-outlined text-[18px]">explore</span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block font-bold">Vastu Aligned Packaging</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Stored and assembled in the Ishanya (NE) zone.</span>
</div>
</div>
<span class="font-editorial-quote text-editorial-quote italic text-secondary/60"> ईशान </span>
</div>
</aside>
</div>
</div>
<!-- Micro-Interactions Script -->
<script>
    (function() {
      let currentShipping = 150;
      let currentDiscount = 0;
      const subtotal = 3300;

      window.updateShipping = function(amount, label) {
        currentShipping = amount;
        recalculate();
      };

      window.applyCoupon = function() {
        const input = document.getElementById('couponCode');
        const notice = document.getElementById('couponNotice');
        const discountRow = document.getElementById('discountRow');
        
        if (input && input.value.trim().toUpperCase() === 'VASTU10') {
          currentDiscount = 330;
          notice.classList.remove('hidden');
          discountRow.classList.remove('hidden');
          discountRow.classList.add('flex');
          recalculate();
        } else if (input && input.value.trim().length > 0) {
          // generic fallback coupon demo
          currentDiscount = 150;
          notice.innerHTML = '<span class="material-symbols-outlined text-[16px]">check_circle</span><span>Concession Applied: -₹150</span>';
          notice.classList.remove('hidden');
          discountRow.classList.remove('hidden');
          discountRow.classList.add('flex');
          recalculate();
        }
      };

      function recalculate() {
        const total = subtotal + currentShipping - currentDiscount;
        const totalFormatted = '₹' + total.toLocaleString('en-IN');
        
        const calcShipping = document.getElementById('calcShipping');
        const calcTotal = document.getElementById('calcTotal');
        const placeOrderText = document.getElementById('placeOrderText');

        if (calcShipping) calcShipping.innerText = '₹' + currentShipping;
        if (calcTotal) calcTotal.innerText = totalFormatted;
        if (placeOrderText) placeOrderText.innerText = 'Place Order — ' + totalFormatted;
      }

      window.handlePlaceOrder = function() {
        const btn = document.getElementById('submitOrderBtn');
        const textSpan = document.getElementById('placeOrderText');
        const termsCheck = document.getElementById('termsCheck');
        
        if (termsCheck && !termsCheck.checked) {
          alert('Kindly endorse the website Terms & Conditions and Privacy Policy prior to order confirmation.');
          termsCheck.focus();
          return;
        }

        const requiredFields = ['firstName', 'lastName', 'email', 'phone', 'street', 'city', 'pincode'];
        for (let id of requiredFields) {
          const el = document.getElementById(id);
          if (el && !el.value.trim()) {
            el.focus();
            el.classList.add('ring-2', 'ring-tertiary');
            setTimeout(() => el.classList.remove('ring-2', 'ring-tertiary'), 2500);
            return;
          }
        }

        if (btn && textSpan) {
          btn.disabled = true;
          textSpan.innerText = 'Encrypting & Generating Consignment...';
          btn.classList.add('opacity-80');
          setTimeout(() => {
            textSpan.innerText = 'Redirecting to Payment Gateway...';
            setTimeout(() => {
              alert('Order successfully initiated! In production, this completes the secure gateway transaction and transfers to Step 3 (Order Confirmation).');
              btn.disabled = false;
              recalculate();
            }, 1000);
          }, 1200);
        }
      };
    })();
  </script>
</div>

<?php
do_action( 'woocommerce_after_checkout_form', $checkout );

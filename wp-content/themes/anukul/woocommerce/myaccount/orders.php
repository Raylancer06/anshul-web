<?php
/**
 * Orders history tab
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="flex flex-col w-full pb-margin-lg">
<!-- Minimalist Breadcrumb Bar -->
<nav aria-label="Breadcrumb" class="w-full py-space-sm mb-space-md flex items-center justify-between">
<ol class="flex items-center gap-space-xs font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">
<li><a class="hover:text-primary transition-colors" href="<?php echo esc_url( home_url( "/" ) ); ?>">Home</a></li>
<li class="text-outline-variant font-normal">/</li>
<li><a class="hover:text-primary transition-colors" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>">My Account</a></li>
<li class="text-outline-variant font-normal">/</li>
<li><a class="hover:text-primary transition-colors" href="#">Orders</a></li>
<li class="text-outline-variant font-normal">/</li>
<li class="text-primary font-semibold">#AN-84920</li>
</ol>
<div class="hidden lg:flex items-center gap-space-sm">
<span class="inline-flex items-center gap-1.5 px-3 py-1 bg-surface-container rounded-lg font-label-sm text-label-sm text-secondary uppercase tracking-widest">
<span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
        Muhurta Blessed • Trayodashi Tithi
      </span>
</div>
</nav>
<!-- Two-Column Architectural Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg w-full items-start">
<!-- LEFT SIDEBAR: Account Sanctuary Profile & Nav (3 cols) -->
<aside class="lg:col-span-3 flex flex-col gap-space-md">
<!-- Kundali / Client Identity Capsule -->
<div class="bg-surface-container-low p-space-lg rounded-xl shadow-sm relative overflow-hidden">
<div class="relative z-10 flex flex-col">
<div class="flex items-center gap-space-md mb-space-sm">
<div class="w-12 h-12 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-display text-headline-sm">
              AN
            </div>
<div class="flex flex-col min-w-0">
<span class="font-headline-sm text-headline-sm text-primary leading-tight truncate">Aarav Nambiar</span>
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">Pitta-Vata Sadhaka</span>
</div>
</div>
<div class="pt-space-sm mt-space-sm bg-surface-container/60 p-space-sm rounded-lg flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Sanctuary Tier</span>
<span class="font-label-md text-label-md text-primary font-semibold">Samyama Patron</span>
</div>
</div>
</div>
<!-- Account Directory Navigation -->
<nav class="bg-surface-container-lowest p-space-sm rounded-xl shadow-sm flex flex-col gap-1">
<a class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all" href="#">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-[19px]">dashboard</span>
<span class="font-body-md text-body-md">Dashboard</span>
</div>
<span class="material-symbols-outlined text-outline-variant text-[16px]">chevron_right</span>
</a>
<!-- Active Link -->
<a class="flex items-center justify-between px-space-md py-space-sm rounded-lg bg-primary text-on-primary font-medium transition-all shadow-sm" href="#">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-[19px]" style="font-variation-settings: 'FILL' 1;">package_2</span>
<span class="font-body-md text-body-md">Orders</span>
</div>
<span class="font-label-sm text-label-sm bg-on-primary/20 text-on-primary px-2 py-0.5 rounded">Active</span>
</a>
<a class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all" href="#">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-[19px]">domain</span>
<span class="font-body-md text-body-md">Addresses</span>
</div>
<span class="material-symbols-outlined text-outline-variant text-[16px]">chevron_right</span>
</a>
<a class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all" href="#">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-[19px]">badge</span>
<span class="font-body-md text-body-md">Account Details</span>
</div>
<span class="material-symbols-outlined text-outline-variant text-[16px]">chevron_right</span>
</a>
<a class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all" href="#">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-[19px]">file_download</span>
<span class="font-body-md text-body-md">Downloads</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold">2</span>
</a>
<div class="my-space-xs h-px bg-surface-container-high mx-space-sm"></div>
<a class="flex items-center gap-space-sm px-space-md py-space-sm rounded-lg text-error hover:bg-error-container/40 transition-all" href="#">
<span class="material-symbols-outlined text-[19px]">logout</span>
<span class="font-body-md text-body-md font-medium">Logout</span>
</a>
</nav>
<!-- Vastu Compass Directional Anchor -->
<div class="bg-surface-container-high/60 p-space-md rounded-xl flex items-center justify-between">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-full bg-surface-container-lowest flex items-center justify-center text-primary font-serif">
            NE
          </div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">Sanctuary Zone</span>
<span class="font-body-sm text-body-sm text-primary font-semibold">Ishanya (Northeast) Gate</span>
</div>
</div>
<span class="material-symbols-outlined text-secondary text-[20px]">explore</span>
</div>
</aside>
<!-- RIGHT MAIN CONTENT: Architectural Order Record (9 cols) -->
<main class="lg:col-span-9 flex flex-col gap-space-lg">
<!-- Top Action Navigation -->
<div class="flex items-center justify-between">
<a class="inline-flex items-center gap-space-xs font-label-md text-label-md text-primary hover:text-secondary uppercase tracking-wider font-semibold group transition-colors" href="#">
<span class="material-symbols-outlined text-[18px] group-hover:-translate-x-1 transition-transform">arrow_left_alt</span>
          Back to My Orders
        </a>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest hidden sm:inline">
          Vedic Consecration ID: #VC-2025-BLR
        </span>
</div>
<!-- Main Header & Order Status Ledger -->
<section class="bg-surface-container-lowest p-space-lg lg:p-space-xl rounded-xl shadow-sm flex flex-col gap-space-md">
<div class="flex flex-col sm:flex-row sm:items-baseline justify-between gap-space-sm pb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block mb-1">Ritual Fulfillment Log</span>
<h1 class="font-display text-display text-primary tracking-tight">Order Details</h1>
</div>
<div class="flex items-center gap-2 self-start sm:self-auto">
<span class="w-2.5 h-2.5 rounded-full bg-secondary-container animate-pulse"></span>
<span class="px-3 py-1 bg-surface-container font-label-md text-label-md uppercase tracking-wider text-secondary font-semibold rounded-lg">
              Processing • In Consecration
            </span>
</div>
</div>
<!-- Meta Summary Grid -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-space-md p-space-md bg-surface-container-low rounded-xl">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-1">Order Index</span>
<span class="font-headline-sm text-headline-sm text-primary">#AN-84920</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-1">Placed On</span>
<span class="font-body-md text-body-md text-on-surface font-semibold">October 24, 2025</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">14:32 IST (Shubha Hora)</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-1">Payment Method</span>
<span class="font-body-md text-body-md text-primary font-semibold">Instant UPI Wire</span>
<span class="font-label-sm text-label-sm text-secondary">256-Bit Encrypted</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant mb-1">Settlement</span>
<span class="font-body-md text-body-md text-primary-container font-semibold flex items-center gap-1">
<span class="material-symbols-outlined text-[16px] text-primary">verified</span> Paid in Full
            </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">₹ 3,450.00</span>
</div>
</div>
<!-- Progress Step Indicator -->
<div class="pt-space-sm flex flex-col gap-2">
<div class="flex justify-between items-center text-label-sm font-label-sm uppercase tracking-widest text-on-surface-variant">
<span class="text-primary font-bold">1. Verified (Oct 24)</span>
<span class="text-secondary font-bold">2. Consecration &amp; Packing (Current)</span>
<span class="text-outline-variant">3. Sanctuary Dispatch</span>
<span class="text-outline-variant">4. Delivered</span>
</div>
<div class="w-full bg-surface-container h-2 rounded-full overflow-hidden flex">
<div class="bg-primary h-full w-1/4"></div>
<div class="bg-secondary-container h-full w-1/4"></div>
<div class="bg-surface-container-high h-full w-2/4"></div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant italic">
            Formulations are currently resting in temperature-regulated sandalwood chambers under Ishanya orientation.
          </p>
</div>
</section>
<!-- ITEMS IN YOUR ORDER -->
<section class="bg-surface-container-lowest p-space-lg lg:p-space-xl rounded-xl shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-sm">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[22px]">local_pharmacy</span>
<h2 class="font-headline-md text-headline-md text-primary">Items In Your Order</h2>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">3 Curated Artifacts</span>
</div>
<div class="flex flex-col gap-space-md">
<!-- Item 1: Handcrafted Kansa Vatki Bowl -->
<article class="p-space-md bg-surface-container-low hover:bg-surface-container transition-colors rounded-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md min-w-0">
<div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 bg-surface-container relative">
<img class="w-full h-full object-cover" data-alt="A sacred bronze Kansa Vatki massage bowl resting on unbleached linen with dried marigold petals and soft warm temple lighting in an architectural Ayurvedic apothecary." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAK9jKda6e4LzEcH-qhYIiF7-5OhD3ohark0BG4sG7KhAiw4pekTK41nKOcAiGZYm7oEG2Llr-OkuQeCYkbnXpS0prLK7-Is8NyqetOh7bRsaohYhEaU6jL7kG8tPSuWuccWvqwZbV4Jvvt4tjvwsn6BiAudt2vT5eTUnxYC4hBoOXFClOHrb7v88wrdVw4tA3C-DJ0q7DFfZzz-1ZyKSxttDwX--_IHb-oGym6eLvymqSEjYjLMSGcRQ"/>
<span class="absolute bottom-1 right-1 font-label-sm text-[9px] bg-primary text-on-primary px-1 rounded">Vastu 7.5cm</span>
</div>
<div class="flex flex-col min-w-0">
<a class="font-headline-sm text-headline-sm text-primary hover:text-secondary transition-colors truncate" href="#">
                  Handcrafted Kansa Vatki Bowl
                </a>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  Standard Personal (7.5cm • 160g bell-metal) • Consecrated via Gayatri Chants
                </p>
<div class="flex items-center gap-2 mt-1.5">
<span class="font-label-sm text-label-sm px-2 py-0.5 bg-surface-container-highest text-primary font-semibold rounded">
                    Batch: #KV-BLR-88
                  </span>
<span class="font-label-sm text-label-sm text-secondary">Dosha: Pitta Pacifying</span>
</div>
</div>
</div>
<div class="flex items-center justify-between md:justify-end gap-space-xl w-full md:w-auto pt-space-xs md:pt-0">
<div class="text-left md:text-right">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block">Qty &amp; Unit</span>
<span class="font-body-md text-body-md text-on-surface font-medium">1 × ₹ 2,450</span>
</div>
<div class="text-right min-w-[90px]">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block">Line Total</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold">₹ 2,450</span>
</div>
</div>
</article>
<!-- Item 2: Cold-Pressed Herbal Taila -->
<article class="p-space-md bg-surface-container-low hover:bg-surface-container transition-colors rounded-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md min-w-0">
<div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 bg-surface-container relative">
<img class="w-full h-full object-cover" data-alt="An amber glass apothecary flask filled with golden infused Ayurvedic herbal oil with sesame seeds and fresh Brahmi leaves on a carved stone shelf." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDR1k6DvBSwXw236lP7JctJ9ic19xawRlRByPDTVsM5S1BETDi8p0Kf0G2LoI1Cf23bdfO4ovlyN6Ox6JIK3zH3V1IysTreZ-OG2033ReriwS3YwiCAQ0s8G5DobGv5grHO_YqlkfDynegpFqzfbAS_17s0ZRGeb4i5SRxYRVTUyNBeTOswZ10aOcU0S0hdjSh8LuHh8Tki_rGpB3M3wJ5dwHsTp1HVuwhgk0WI2CQo-viActAnNsF7sg"/>
<span class="absolute bottom-1 right-1 font-label-sm text-[9px] bg-secondary text-on-secondary px-1 rounded">200ml</span>
</div>
<div class="flex flex-col min-w-0">
<a class="font-headline-sm text-headline-sm text-primary hover:text-secondary transition-colors truncate" href="#">
                  Cold-Pressed Herbal Taila (External Snehana)
                </a>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  200ml Amber Glass Flask • Solar-Macerated • Batch #AY-OCT25
                </p>
<div class="flex items-center gap-2 mt-1.5">
<span class="font-label-sm text-label-sm px-2 py-0.5 bg-surface-container-highest text-primary font-semibold rounded">
                    Sadhana Grade
                  </span>
<span class="font-label-sm text-label-sm text-secondary">Dosha: Vata Calming</span>
</div>
</div>
</div>
<div class="flex items-center justify-between md:justify-end gap-space-xl w-full md:w-auto pt-space-xs md:pt-0">
<div class="text-left md:text-right">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block">Qty &amp; Unit</span>
<span class="font-body-md text-body-md text-on-surface font-medium">1 × ₹ 850</span>
</div>
<div class="text-right min-w-[90px]">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block">Line Total</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold">₹ 850</span>
</div>
</div>
</article>
<!-- Item 3: Complimentary Botanical Sample -->
<article class="p-space-md bg-surface-container-high/40 hover:bg-surface-container-high/70 transition-colors rounded-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-space-md">
<div class="flex items-center gap-space-md min-w-0">
<div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0 bg-surface-container-highest flex items-center justify-center">
<span class="material-symbols-outlined text-secondary text-[36px]">spa</span>
</div>
<div class="flex flex-col min-w-0">
<div class="flex items-center gap-2">
<h3 class="font-headline-sm text-headline-sm text-primary truncate">
                    Ashwagandha Root Infusion Tea
                  </h3>
<span class="font-label-sm text-label-sm bg-secondary/15 text-secondary px-2 py-0.5 rounded font-semibold">
                    Sanctuary Gift
                  </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                  15g Botanical Sachet • Hand-Harvested Nagori Variety • Ojas Restorative
                </p>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-1">Complimentary with Order #AN-84920</span>
</div>
</div>
<div class="flex items-center justify-between md:justify-end gap-space-xl w-full md:w-auto pt-space-xs md:pt-0">
<div class="text-left md:text-right">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block">Quantity</span>
<span class="font-body-md text-body-md text-on-surface font-medium">1 Sachet</span>
</div>
<div class="text-right min-w-[90px]">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider block">Line Total</span>
<span class="font-headline-sm text-headline-sm text-secondary font-semibold">₹ 0.00</span>
</div>
</div>
</article>
</div>
</section>
<!-- DUAL COLUMNS / GRID: Financial Ledger & Address Sanctuaries -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-space-lg">
<!-- COLUMN A: Financial Totals & Payment Audit (7 cols) -->
<div class="md:col-span-7 flex flex-col gap-space-md">
<!-- Financial Calculations -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col gap-space-sm">
<h3 class="font-headline-sm text-headline-sm text-primary mb-space-xs flex items-center justify-between">
<span>Financial Settlement</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">INR (₹)</span>
</h3>
<div class="flex justify-between items-center py-1.5 font-body-md text-body-md">
<span class="text-on-surface-variant">Items Subtotal</span>
<span class="font-medium text-on-surface">₹ 3,300.00</span>
</div>
<div class="flex justify-between items-center py-1.5 font-body-md text-body-md">
<div class="flex items-center gap-2">
<span class="text-on-surface-variant">Coupon Rebate</span>
<span class="font-label-sm text-label-sm bg-surface-container px-2 py-0.5 rounded text-secondary font-mono">HARMONY10</span>
</div>
<span class="font-medium text-secondary">-₹ 0.00</span>
</div>
<div class="flex justify-between items-center py-1.5 font-body-md text-body-md">
<span class="text-on-surface-variant">Sanctuary Dispatch (Standard Surface)</span>
<span class="font-medium text-on-surface">₹ 150.00</span>
</div>
<div class="flex justify-between items-center py-1.5 font-body-sm text-body-sm text-on-surface-variant">
<span>Statutory Goods &amp; Services Tax (GST Inclusive)</span>
<span class="italic">Included (₹ 382.00)</span>
</div>
<div class="h-px bg-surface-container my-space-xs"></div>
<div class="flex justify-between items-baseline pt-space-xs">
<div>
<span class="font-headline-md text-headline-md text-primary font-bold">Total Paid</span>
<span class="block font-label-sm text-label-sm uppercase tracking-wider text-secondary">Zero Dues Outstanding</span>
</div>
<span class="font-display text-headline-lg text-primary font-medium">₹ 3,450.00</span>
</div>
</div>
<!-- Payment Verification Card -->
<div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col gap-space-sm shadow-sm">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-semibold">Payment Audit</span>
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary font-semibold">
<span class="material-symbols-outlined text-[15px] text-primary">lock</span> 256-Bit SSL Secured
              </span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm pt-space-xs">
<div class="bg-surface-container-lowest p-space-sm rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase tracking-wider">Gateway Rails</span>
<span class="font-body-md text-body-md text-primary font-semibold">Razorpay • UPI Direct</span>
</div>
<div class="bg-surface-container-lowest p-space-sm rounded-lg">
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase tracking-wider">Status</span>
<span class="font-body-md text-body-md text-primary-container font-semibold">Confirmed &amp; Settled</span>
</div>
</div>
<div class="p-space-sm bg-surface-container-lowest rounded-lg flex items-center justify-between font-mono text-body-sm">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant font-sans uppercase tracking-wider">TXN Reference Key</span>
<span class="text-on-surface select-all">#TXN_UPI_98241088421</span>
</div>
<button class="p-1.5 text-on-surface-variant hover:text-primary transition-colors" onclick="navigator.clipboard.writeText('TXN_UPI_98241088421')" title="Copy Transaction ID">
<span class="material-symbols-outlined text-[18px]">content_copy</span>
</button>
</div>
</div>
</div>
<!-- COLUMN B: Sanctuary Address Cards (5 cols) -->
<div class="md:col-span-5 flex flex-col gap-space-md">
<!-- Dispatch / Delivery Address -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between h-full">
<div>
<div class="flex items-center justify-between mb-space-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[20px]">local_shipping</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Shipping Sanctuary</span>
</div>
<span class="font-label-sm text-label-sm bg-surface-container text-primary px-2 py-0.5 rounded">Default</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-primary mb-1">Aarav Nambiar</h4>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                Flat 402, Shanti Vihar Residency<br/>
                12th Cross Road, Indiranagar<br/>
                Bengaluru, Karnataka — 560038<br/>
                India
              </p>
</div>
<div class="mt-space-md pt-space-sm bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">Dispatch Protocol</span>
<span class="font-body-sm text-body-sm text-primary font-semibold">
                Standard Surface (Ishanya NE Aligned Packaging)
              </span>
</div>
</div>
<!-- Billing Record Card -->
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 mb-space-sm">
<span class="material-symbols-outlined text-primary text-[20px]">receipt_long</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Billing Record</span>
</div>
<h4 class="font-headline-sm text-headline-sm text-primary mb-1">Aarav Nambiar</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed mb-space-sm">
                Flat 402, Shanti Vihar Residency, Indiranagar, Bengaluru, KA 560038
              </p>
</div>
<div class="space-y-1.5 pt-space-xs font-body-sm text-body-sm text-on-surface-variant">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-secondary">phone</span>
<span>+91 98765 43210</span>
</div>
<div class="flex items-center gap-2 truncate">
<span class="material-symbols-outlined text-[16px] text-secondary">alternate_email</span>
<span class="truncate">aarav.nambiar@sanctuary.in</span>
</div>
</div>
</div>
</div>
</div>
<!-- Chronological Order Updates & Vedic Milestones -->
<section class="bg-surface-container-lowest p-space-lg lg:p-space-xl rounded-xl shadow-sm flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-sm">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[22px]">history_edu</span>
<h2 class="font-headline-md text-headline-md text-primary">Order Chronology</h2>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-semibold">Sequential Sadhana Log</span>
</div>
<div class="relative pl-6 space-y-space-md before:content-[''] before:absolute before:left-2 before:top-2 before:bottom-2 before:w-0.5 before:bg-surface-container-highest">
<!-- Event 3 (Latest) -->
<div class="relative flex flex-col gap-1 group">
<span class="absolute -left-[27px] top-1.5 w-3.5 h-3.5 rounded-full bg-secondary ring-4 ring-surface-container-lowest"></span>
<div class="flex items-center gap-space-sm">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-wider font-bold">Oct 25, 2025 • 09:00 IST</span>
<span class="font-label-sm text-[10px] bg-secondary-fixed text-on-secondary-fixed px-2 py-0.5 rounded font-semibold">Active Phase</span>
</div>
<p class="font-body-md text-body-md text-on-surface font-medium">
              Order marked as Processing. Protective organic herbal husk packaging initiated to maintain prana during transit.
            </p>
</div>
<!-- Event 2 -->
<div class="relative flex flex-col gap-1">
<span class="absolute -left-[27px] top-1.5 w-3.5 h-3.5 rounded-full bg-primary ring-4 ring-surface-container-lowest"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Oct 24, 2025 • 16:15 IST</span>
<p class="font-body-md text-body-md text-on-surface-variant">
              Formulations retrieved from temperature-regulated apothecary and queued for ritual blessing and batch stamp verification.
            </p>
</div>
<!-- Event 1 -->
<div class="relative flex flex-col gap-1">
<span class="absolute -left-[27px] top-1.5 w-3.5 h-3.5 rounded-full bg-outline-variant ring-4 ring-surface-container-lowest"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Oct 24, 2025 • 14:32 IST</span>
<p class="font-body-md text-body-md text-on-surface-variant">
              Order received and payment successfully verified via UPI transaction <span class="font-mono text-body-sm text-primary font-medium">#TXN_UPI_98241088421</span>.
            </p>
</div>
</div>
</section>
<!-- Customer Actions & Concierge Support Sanctuary -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
<!-- Action Utilities Bar (7 cols) -->
<div class="lg:col-span-7 bg-surface-container-low p-space-lg rounded-xl flex flex-col justify-between gap-space-md shadow-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block mb-1">Administrative Protocols</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Client Actions &amp; Archives</h3>
</div>
<div class="flex flex-wrap items-center gap-space-sm">
<button class="inline-flex items-center gap-2 px-space-md py-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-tertiary transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]">download</span>
              Download Tax Invoice (PDF)
            </button>
<button class="inline-flex items-center gap-2 px-space-md py-3 rounded-lg bg-surface-container-lowest text-primary hover:bg-surface-container font-label-md text-label-md uppercase tracking-wider transition-colors shadow-sm">
<span class="material-symbols-outlined text-[18px]">cached</span>
              Reorder Items
            </button>
<button class="inline-flex items-center gap-2 px-space-md py-3 rounded-lg bg-surface-container-lowest text-on-surface-variant hover:text-primary hover:bg-surface-container font-label-md text-label-md uppercase tracking-wider transition-colors shadow-sm" onclick="window.print()">
<span class="material-symbols-outlined text-[18px]">print</span>
              Print Details
            </button>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">
            Invoices are stamped with GSTIN 29AAACA1122C1Z4 and sacred authenticity seal.
          </span>
</div>
<!-- Help & Vaidya Concierge Card (5 cols) -->
<div class="lg:col-span-5 bg-primary-container text-on-primary p-space-lg rounded-xl flex flex-col justify-between gap-space-md shadow-md relative overflow-hidden">
<div class="relative z-10 flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-on-primary-container font-semibold mb-1">Vaidya Advisory</span>
<h3 class="font-headline-sm text-headline-sm text-on-primary">Need Help With This Order?</h3>
<p class="font-body-sm text-body-sm text-inverse-on-surface mt-2 leading-relaxed">
              If you have questions regarding your formulation dispatch or constitutional guidance, our sanctuary concierge and Vaidyas are here to assist.
            </p>
</div>
<div class="relative z-10 pt-space-xs">
<a class="inline-flex items-center justify-center gap-2 w-full py-3 px-space-md rounded-lg bg-surface-container-lowest text-primary hover:bg-surface-container-high transition-colors font-label-md text-label-md uppercase tracking-widest font-bold shadow-sm" href="#">
<span class="material-symbols-outlined text-[18px]">forum</span>
              Contact ANUKUL Concierge
            </a>
</div>
<!-- Decorative subtle mandala-like pattern element -->
<div class="absolute -right-8 -bottom-8 w-36 h-36 rounded-full bg-on-primary/5 pointer-events-none"></div>
</div>
</section>
</div>
<script>
  // Simple print handling enhancement
  window.addEventListener('beforeprint', () => {
    document.title = "ANUKUL Order #AN-84920 Details";
  });
</script>

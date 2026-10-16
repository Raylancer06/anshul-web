<?php
/**
 * View Order details tab
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="flex flex-col w-full pb-16">
<!-- Subtle Spatial Ambience Anchor -->
<div class="relative w-full mb-8 pt-4">
<!-- Breadcrumb -->
<nav aria-label="Breadcrumb" class="flex items-center gap-2 mb-6">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors tracking-widest uppercase" href="<?php echo esc_url( home_url( "/" ) ); ?>">Home</a>
<span class="text-on-surface-variant/40 font-body-sm text-body-sm">/</span>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors tracking-widest uppercase" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>">My Account</a>
<span class="text-on-surface-variant/40 font-body-sm text-body-sm">/</span>
<span class="font-label-md text-label-md text-primary font-semibold tracking-widest uppercase">Orders</span>
</nav>
<!-- Top Sanctuary Quote / Affirmation Band -->
<div class="bg-surface-container-low px-6 py-4 rounded-xl flex flex-col md:flex-row md:items-center justify-between gap-4 shadow-sm">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-secondary shadow-sm">
<span class="material-symbols-outlined notranslate text-[19px]" translate="no">spa</span>
</div>
<div>
<p class="font-label-sm text-label-sm text-secondary uppercase tracking-widest">Ritual &amp; Material Alignment</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">Consecrated apothecary formulations &amp; sacred architectural remedies dispatched under auspicious lunar muhurtas.</p>
</div>
</div>
<div class="flex items-center gap-2 self-start md:self-auto">
<span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant tracking-wider uppercase">Active Dispatch: Varanasi Ashram Vault</span>
</div>
</div>
</div>
<!-- Primary Asymmetric Two-Column Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
<!-- LEFT SIDEBAR: Account Navigation (Span 3) -->
<aside class="lg:col-span-3 flex flex-col gap-6">
<div class="bg-surface-container-lowest rounded-xl p-5 shadow-sm">
<div class="pb-4 mb-4">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Account Sanctuary</span>
<h2 class="font-headline-sm text-headline-sm text-primary tracking-tight mt-0.5">Navigation</h2>
</div>
<nav aria-label="Customer Account Navigation" class="flex flex-col gap-1.5">
<a class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-all group" href="account.html#dashboard">
<span class="flex items-center gap-3 font-body-md text-body-md">
<span class="material-symbols-outlined notranslate text-[19px] text-on-surface-variant group-hover:text-primary transition-colors" translate="no">grid_view</span>
              Dashboard
            </span>
<span class="material-symbols-outlined notranslate text-[16px] text-on-surface-variant/40 group-hover:translate-x-0.5 transition-transform" translate="no">chevron_right</span>
</a>
<!-- Active State: Orders -->
<a class="flex items-center justify-between px-3.5 py-2.5 rounded-lg bg-surface-container-low text-primary font-semibold shadow-sm transition-all group" href="account.html#orders">
<span class="flex items-center gap-3 font-body-md text-body-md">
<span class="material-symbols-outlined notranslate text-[19px] text-primary" translate="no" style="font-variation-settings: 'FILL' 1;">local_mall</span>
              Orders
            </span>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-primary-container text-on-primary">3</span>
</a>
<a class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-all group" href="account.html#addresses">
<span class="flex items-center gap-3 font-body-md text-body-md">
<span class="material-symbols-outlined notranslate text-[19px] text-on-surface-variant group-hover:text-primary transition-colors" translate="no">location_on</span>
              Addresses
            </span>
<span class="material-symbols-outlined notranslate text-[16px] text-on-surface-variant/40 group-hover:translate-x-0.5 transition-transform" translate="no">chevron_right</span>
</a>
<a class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-all group" href="account.html#account-details">
<span class="flex items-center gap-3 font-body-md text-body-md">
<span class="material-symbols-outlined notranslate text-[19px] text-on-surface-variant group-hover:text-primary transition-colors" translate="no">badge</span>
              Account Details
            </span>
<span class="material-symbols-outlined notranslate text-[16px] text-on-surface-variant/40 group-hover:translate-x-0.5 transition-transform" translate="no">chevron_right</span>
</a>
<a class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-all group" href="account.html#downloads">
<span class="flex items-center gap-3 font-body-md text-body-md">
<span class="material-symbols-outlined notranslate text-[19px] text-on-surface-variant group-hover:text-primary transition-colors" translate="no">download</span>
              Downloads
            </span>
<span class="font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant">2</span>
</a>
<div class="my-2 h-[1px] bg-surface-container"></div>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-tertiary hover:bg-tertiary-fixed/30 transition-colors" href="#">
<span class="material-symbols-outlined notranslate text-[19px]" translate="no">logout</span>
<span class="font-body-md text-body-md font-medium">Log out</span>
</a>
</nav>
</div>
<!-- Member Constitutional Status Badge Card -->
<div class="bg-surface-container-high rounded-xl p-5 shadow-sm relative overflow-hidden">
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-secondary/10 pointer-events-none"></div>
<div class="flex items-center gap-3 mb-3">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-display text-headline-sm font-medium">
            A
          </div>
<div class="min-w-0">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block truncate">Sanctuary Member</span>
<h3 class="font-body-md text-body-md font-semibold text-primary truncate">Aarav Nambiar</h3>
</div>
</div>
<div class="bg-surface-container-lowest p-3 rounded-lg shadow-sm">
<div class="flex items-center justify-between mb-1">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Dosha Alignment</span>
<span class="font-label-sm text-label-sm text-secondary font-bold">Pitta-Vata</span>
</div>
<div class="w-full bg-surface-container h-1.5 rounded-full overflow-hidden mb-2">
<div class="bg-secondary-container h-full rounded-full w-[68%]"></div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[12px] leading-tight">
            Remedies tailored to cooling bio-energetic thermal patterns and pacifying air-element flux.
          </p>
</div>
</div>
<!-- Vastu Sanctuary Directional Accent Box -->
<div class="bg-surface-container-low rounded-xl p-5 shadow-sm">
<div class="flex items-center justify-between mb-3">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-primary font-bold">Vedic Dispatch Clock</span>
<span class="material-symbols-outlined notranslate text-secondary text-[18px]" translate="no">explore</span>
</div>
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm font-display text-headline-sm">
            शु
          </div>
<div>
<p class="font-body-sm text-body-sm font-semibold text-on-surface">Shukra Muhurta Active</p>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[12px]">Consecration bath completed for active order items.</p>
</div>
</div>
</div>
</aside>
<!-- RIGHT MAIN CONTENT: Orders Overview & History (Span 9) -->
<main class="lg:col-span-9 flex flex-col gap-8">
<!-- Page Header & Discovery Meta -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-2">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block mb-1">Apothecary &amp; Spatial Acquisitions</span>
<h1 class="font-display text-display text-primary tracking-tight font-normal leading-none">MY ORDERS</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-2 max-w-2xl">
            View your previous purchases, review consecrated formulation batches, tracking logs, and access available order actions.
          </p>
</div>
<div class="flex items-center gap-2 self-start md:self-auto">
<a class="px-4 py-2.5 rounded-lg bg-surface-container text-primary font-label-md text-label-md uppercase tracking-wider hover:bg-surface-container-high transition-colors flex items-center gap-2 shadow-sm" href="client_portal_order_history.html">
<span class="material-symbols-outlined notranslate text-[16px]" translate="no">receipt_long</span>
            Tax Summaries
          </a>
</div>
</div>
<!-- Order Discovery & Status Filter Tabs -->
<div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-4 bg-surface-container-low p-2 rounded-xl shadow-sm">
<div aria-label="Filter Orders" class="flex items-center gap-1.5 overflow-x-auto scrollbar-none py-1 px-1" role="tablist">
<button aria-selected="true" class="px-4 py-2 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md uppercase tracking-wider shadow-sm transition-all whitespace-nowrap flex items-center gap-1.5" id="tab-all" onclick="filterOrders('all')" role="tab">
<span>All Orders</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-container-lowest/20 text-on-primary font-label-sm text-label-sm">3</span>
</button>
<button aria-selected="false" class="px-4 py-2 rounded-lg bg-transparent text-on-surface-variant hover:text-primary hover:bg-surface-container font-label-md text-label-md uppercase tracking-wider transition-all whitespace-nowrap flex items-center gap-1.5" id="tab-processing" onclick="filterOrders('processing')" role="tab">
<span>Processing</span>
<span class="px-1.5 py-0.2 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">1</span>
</button>
<button aria-selected="false" class="px-4 py-2 rounded-lg bg-transparent text-on-surface-variant hover:text-primary hover:bg-surface-container font-label-md text-label-md uppercase tracking-wider transition-all whitespace-nowrap flex items-center gap-1.5" id="tab-completed" onclick="filterOrders('completed')" role="tab">
<span>Completed</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-container-highest text-primary font-label-sm text-label-sm">2</span>
</button>
<button aria-selected="false" class="px-4 py-2 rounded-lg bg-transparent text-on-surface-variant/60 hover:text-on-surface hover:bg-surface-container font-label-md text-label-md uppercase tracking-wider transition-all whitespace-nowrap flex items-center gap-1.5" id="tab-cancelled" onclick="filterOrders('cancelled')" role="tab">
<span>Cancelled</span>
<span class="px-1.5 py-0.2 rounded-full bg-surface-container text-on-surface-variant/70 font-label-sm text-label-sm">0</span>
</button>
</div>
<div class="relative px-1">
<input class="w-full sm:w-64 bg-surface-container-lowest text-on-surface font-body-sm text-body-sm pl-9 pr-3 py-2 rounded-lg shadow-sm placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="Search orders by remedy or ID..." type="text"/>
<span class="material-symbols-outlined notranslate absolute left-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant/60 text-[18px]" translate="no">search</span>
</div>
</div>
<!-- Order History Desktop Table / Responsive Card Deck -->
<div class="bg-surface-container-lowest rounded-xl shadow-sm overflow-hidden" id="orders-container">
<!-- Desktop Table View (Hidden on mobile) -->
<div class="hidden md:block overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-4 px-6 font-semibold">Order ID</th>
<th class="py-4 px-6 font-semibold">Ordered Date</th>
<th class="py-4 px-6 font-semibold">Equilibrium Status</th>
<th class="py-4 px-6 font-semibold">Consignment Total</th>
<th class="py-4 px-6 font-semibold text-right">Sanctuary Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container">
<!-- Row 1: Processing -->
<tr class="order-row hover:bg-surface-container-low/40 transition-colors" data-status="processing">
<td class="py-5 px-6 align-top">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-secondary-fixed/50 flex items-center justify-center text-secondary">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">hourglass_top</span>
</div>
<div>
<span class="font-body-md text-body-md font-bold text-primary block">#AN-84920</span>
<span class="font-label-sm text-label-sm text-secondary tracking-widest uppercase">Expedited Muhurta</span>
</div>
</div>
</td>
<td class="py-5 px-6 align-top">
<p class="font-body-md text-body-md text-on-surface font-medium">October 24, 2025</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">4:18 PM • Ashwini Nakshatra</p>
</td>
<td class="py-5 px-6 align-top">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed shadow-sm">
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">autorenew</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider font-semibold">Processing</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[11px] mt-1">Herbal extraction maceration</p>
</td>
<td class="py-5 px-6 align-top">
<p class="font-headline-sm text-headline-sm font-semibold text-primary leading-tight">₹ 3,450</p>
<p class="font-body-sm text-body-sm text-on-surface-variant font-medium">2 Sanctuary Remedies</p>
<p class="font-body-sm text-body-sm text-on-surface-variant/70 text-[12px] truncate max-w-xs mt-0.5" title="Handcrafted Kansa Vatki Bowl, Cold-Pressed Herbal Taila">
                    Handcrafted Kansa Vatki Bowl, Cold-Pressed Herbal Taila
                  </p>
</td>
<td class="py-5 px-6 align-top text-right">
<div class="flex flex-col items-end gap-2">
<a class="px-4 py-2 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-tertiary-container transition-colors shadow-sm inline-flex items-center gap-1.5" href="client_portal_order_history.html">
<span>VIEW ORDER</span>
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_forward</span>
</a>
<a class="inline-flex items-center gap-1 font-label-md text-label-md text-secondary hover:text-primary transition-colors tracking-wide" href="#">
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">download</span>
                      Invoice PDF
                    </a>
</div>
</td>
</tr>
<!-- Row 2: Completed -->
<tr class="order-row hover:bg-surface-container-low/40 transition-colors" data-status="completed">
<td class="py-5 px-6 align-top">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-primary-fixed/60 flex items-center justify-center text-primary">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">verified</span>
</div>
<div>
<span class="font-body-md text-body-md font-bold text-primary block">#AN-78214</span>
<span class="font-label-sm text-label-sm text-on-surface-variant tracking-widest uppercase">Delivered Sanctuary</span>
</div>
</div>
</td>
<td class="py-5 px-6 align-top">
<p class="font-body-md text-body-md text-on-surface font-medium">September 12, 2025</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">10:45 AM • Rohini Nakshatra</p>
</td>
<td class="py-5 px-6 align-top">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-semibold shadow-sm">
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">check_circle</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider">Completed</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[11px] mt-1">Delivered via Speed Vaidya</p>
</td>
<td class="py-5 px-6 align-top">
<p class="font-headline-sm text-headline-sm font-semibold text-primary leading-tight">₹ 1,850</p>
<p class="font-body-sm text-body-sm text-on-surface-variant font-medium">3 Sanctuary Remedies</p>
<p class="font-body-sm text-body-sm text-on-surface-variant/70 text-[12px] truncate max-w-xs mt-0.5" title="Triphala Churna Reserve, Copper Jihwa Scraper, Kumkumadi Taila">
                    Triphala Churna Reserve, Copper Jihwa Scraper, Kumkumadi Taila
                  </p>
</td>
<td class="py-5 px-6 align-top text-right">
<div class="flex flex-col items-end gap-2">
<a class="px-4 py-2 rounded-lg bg-surface-container text-primary font-label-md text-label-md uppercase tracking-wider hover:bg-surface-container-high transition-colors shadow-sm inline-flex items-center gap-1.5" href="#">
<span>VIEW ORDER</span>
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_forward</span>
</a>
<a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary font-semibold hover:text-secondary transition-colors tracking-wide" href="#">
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">restart_alt</span>
                      Reorder Items
                    </a>
</div>
</td>
</tr>
<!-- Row 3: Completed -->
<tr class="order-row hover:bg-surface-container-low/40 transition-colors" data-status="completed">
<td class="py-5 px-6 align-top">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-primary-fixed/60 flex items-center justify-center text-primary">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">verified</span>
</div>
<div>
<span class="font-body-md text-body-md font-bold text-primary block">#AN-65108</span>
<span class="font-label-sm text-label-sm text-on-surface-variant tracking-widest uppercase">Sacred Vastu Installation</span>
</div>
</div>
</td>
<td class="py-5 px-6 align-top">
<p class="font-body-md text-body-md text-on-surface font-medium">July 05, 2025</p>
<p class="font-body-sm text-body-sm text-on-surface-variant">08:15 AM • Pushya Nakshatra</p>
</td>
<td class="py-5 px-6 align-top">
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-semibold shadow-sm">
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">check_circle</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider">Completed</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[11px] mt-1">Ishanya Zone Energized</p>
</td>
<td class="py-5 px-6 align-top">
<p class="font-headline-sm text-headline-sm font-semibold text-primary leading-tight">₹ 4,200</p>
<p class="font-body-sm text-body-sm text-on-surface-variant font-medium">1 Sanctuary Remedial Artifact</p>
<p class="font-body-sm text-body-sm text-on-surface-variant/70 text-[12px] truncate max-w-xs mt-0.5" title="Consecrated Surya Yantra Plaque — Brass 6x6">
                    Consecrated Surya Yantra Plaque — Brass 6x6
                  </p>
</td>
<td class="py-5 px-6 align-top text-right">
<div class="flex flex-col items-end gap-2">
<a class="px-4 py-2 rounded-lg bg-surface-container text-primary font-label-md text-label-md uppercase tracking-wider hover:bg-surface-container-high transition-colors shadow-sm inline-flex items-center gap-1.5" href="#">
<span>VIEW ORDER</span>
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_forward</span>
</a>
<a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary font-semibold hover:text-secondary transition-colors tracking-wide" href="#">
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">restart_alt</span>
                      Reorder Items
                    </a>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Mobile Card Deck View (Visible on mobile screens) -->
<div class="md:hidden flex flex-col divide-y divide-surface-container">
<!-- Mobile Card 1 -->
<div class="p-5 flex flex-col gap-4 order-row" data-status="processing">
<div class="flex items-center justify-between">
<div>
<span class="font-body-md text-body-md font-bold text-primary">#AN-84920</span>
<span class="block font-body-sm text-body-sm text-on-surface-variant">October 24, 2025</span>
</div>
<div class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold uppercase tracking-wider">
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">autorenew</span>
                Processing
              </div>
</div>
<div class="bg-surface-container-low p-3.5 rounded-lg flex flex-col gap-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Items Ordered</span>
<p class="font-body-sm text-body-sm text-on-surface font-medium leading-snug">Handcrafted Kansa Vatki Bowl, Cold-Pressed Herbal Taila</p>
<div class="flex items-center justify-between mt-2 pt-2 border-t border-surface-container">
<span class="font-body-sm text-body-sm text-on-surface-variant">2 items total:</span>
<span class="font-headline-sm text-headline-sm font-semibold text-primary">₹ 3,450</span>
</div>
</div>
<div class="flex items-center gap-3 pt-1">
<a class="flex-1 py-2.5 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md uppercase tracking-wider text-center shadow-sm" href="#">
                VIEW ORDER
              </a>
<a class="px-4 py-2.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md uppercase tracking-wider inline-flex items-center justify-center gap-1" href="#">
<span class="material-symbols-outlined notranslate text-[16px]" translate="no">download</span>
                PDF
              </a>
</div>
</div>
<!-- Mobile Card 2 -->
<div class="p-5 flex flex-col gap-4 order-row" data-status="completed">
<div class="flex items-center justify-between">
<div>
<span class="font-body-md text-body-md font-bold text-primary">#AN-78214</span>
<span class="block font-body-sm text-body-sm text-on-surface-variant">September 12, 2025</span>
</div>
<div class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-bold uppercase tracking-wider">
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">check_circle</span>
                Completed
              </div>
</div>
<div class="bg-surface-container-low p-3.5 rounded-lg flex flex-col gap-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Items Ordered</span>
<p class="font-body-sm text-body-sm text-on-surface font-medium leading-snug">Triphala Churna Reserve, Copper Jihwa Scraper, Kumkumadi Taila</p>
<div class="flex items-center justify-between mt-2 pt-2 border-t border-surface-container">
<span class="font-body-sm text-body-sm text-on-surface-variant">3 items total:</span>
<span class="font-headline-sm text-headline-sm font-semibold text-primary">₹ 1,850</span>
</div>
</div>
<div class="flex items-center gap-3 pt-1">
<a class="flex-1 py-2.5 rounded-lg bg-surface-container text-primary font-label-md text-label-md uppercase tracking-wider text-center shadow-sm" href="#">
                VIEW ORDER
              </a>
<a class="px-4 py-2.5 rounded-lg bg-surface-container-high text-primary font-label-md text-label-md uppercase tracking-wider inline-flex items-center justify-center gap-1 font-semibold" href="#">
                Reorder
              </a>
</div>
</div>
<!-- Mobile Card 3 -->
<div class="p-5 flex flex-col gap-4 order-row" data-status="completed">
<div class="flex items-center justify-between">
<div>
<span class="font-body-md text-body-md font-bold text-primary">#AN-65108</span>
<span class="block font-body-sm text-body-sm text-on-surface-variant">July 05, 2025</span>
</div>
<div class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm font-bold uppercase tracking-wider">
<span class="material-symbols-outlined notranslate text-[14px]" translate="no">check_circle</span>
                Completed
              </div>
</div>
<div class="bg-surface-container-low p-3.5 rounded-lg flex flex-col gap-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Items Ordered</span>
<p class="font-body-sm text-body-sm text-on-surface font-medium leading-snug">Consecrated Surya Yantra Plaque — Brass 6x6</p>
<div class="flex items-center justify-between mt-2 pt-2 border-t border-surface-container">
<span class="font-body-sm text-body-sm text-on-surface-variant">1 artifact total:</span>
<span class="font-headline-sm text-headline-sm font-semibold text-primary">₹ 4,200</span>
</div>
</div>
<div class="flex items-center gap-3 pt-1">
<a class="flex-1 py-2.5 rounded-lg bg-surface-container text-primary font-label-md text-label-md uppercase tracking-wider text-center shadow-sm" href="#">
                VIEW ORDER
              </a>
<a class="px-4 py-2.5 rounded-lg bg-surface-container-high text-primary font-label-md text-label-md uppercase tracking-wider inline-flex items-center justify-center gap-1 font-semibold" href="#">
                Reorder
              </a>
</div>
</div>
</div>
<!-- Pagination Bar -->
<div class="px-6 py-4 bg-surface-container-low/60 flex flex-col sm:flex-row items-center justify-between gap-4">
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Showing <span class="font-semibold text-primary">1–3</span> of <span class="font-semibold text-primary">3</span> sacred orders
          </p>
<div class="flex items-center gap-2">
<button class="px-3.5 py-1.5 rounded-lg bg-surface-container text-on-surface-variant/40 font-label-md text-label-md uppercase tracking-wider cursor-not-allowed flex items-center gap-1 shadow-none" disabled="">
<span class="material-symbols-outlined notranslate text-[16px]" translate="no">chevron_left</span>
              Previous
            </button>
<span class="px-3 py-1 rounded-lg bg-primary text-on-primary font-label-md text-label-md font-semibold">1</span>
<button class="px-3.5 py-1.5 rounded-lg bg-surface-container text-on-surface-variant/40 font-label-md text-label-md uppercase tracking-wider cursor-not-allowed flex items-center gap-1 shadow-none" disabled="">
              Next
              <span class="material-symbols-outlined notranslate text-[16px]" translate="no">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Rich Visual Component: Consecrated Formulation Lifecycle -->
<div class="bg-surface-container-low rounded-xl p-6 shadow-sm flex flex-col md:flex-row gap-6 items-center">
<div class="w-full md:w-1/3 flex flex-col gap-2">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Sacred Provenance</span>
<h3 class="font-headline-sm text-headline-sm text-primary leading-tight">Order #AN-84920 Astrological Transit</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Cold-pressed Taila undergoes 21-day solar infusion under brass dome energizers before final dispatch seal.</p>
</div>
<!-- Inline Sacred Botanical Geometry Chart -->
<div class="w-full md:w-2/3 flex items-center justify-between bg-surface-container-lowest p-4 rounded-xl shadow-sm overflow-x-auto gap-4">
<div class="flex flex-col items-center text-center min-w-[70px]">
<div class="w-10 h-10 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-bold text-sm mb-1.5 shadow-sm">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">verified</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-semibold">Ordered</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Oct 24</span>
</div>
<div class="flex-1 h-0.5 bg-secondary-fixed relative min-w-[30px]">
<div class="absolute inset-0 bg-secondary w-full"></div>
</div>
<div class="flex-col items-center text-center min-w-[70px] flex">
<div class="w-10 h-10 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center font-bold text-sm mb-1.5 shadow-sm">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">nature</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-semibold">Infusion</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">In Chamber</span>
</div>
<div class="flex-1 h-0.5 bg-surface-container relative min-w-[30px]">
<div class="absolute inset-0 bg-surface-container-highest w-1/3"></div>
</div>
<div class="flex flex-col items-center text-center min-w-[70px] opacity-50">
<div class="w-10 h-10 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-sm mb-1.5">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">mark_email_read</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Sealed</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Muhurta 3</span>
</div>
<div class="flex-1 h-0.5 bg-surface-container relative min-w-[30px]"></div>
<div class="flex flex-col items-center text-center min-w-[70px] opacity-50">
<div class="w-10 h-10 rounded-full bg-surface-container text-on-surface-variant flex items-center justify-center font-bold text-sm mb-1.5">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">home_pin</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold">Sanctuary</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Delivery</span>
</div>
</div>
</div>
<!-- Empty State Toggle & Reference (Hidden by default, can be toggled via JS filter or shown here) -->
<div class="hidden bg-surface-container-lowest rounded-xl p-8 sm:p-12 shadow-sm text-center flex-col items-center justify-center gap-4 transition-all" id="empty-state-view">
<!-- Delicate Botanical Bronze Mandala SVG Accent -->
<div class="w-20 h-20 rounded-full bg-surface-container-low flex items-center justify-center text-secondary mb-2 shadow-sm">
<svg class="w-12 h-12 text-secondary" fill="none" stroke="currentColor" stroke-width="1.5" viewbox="0 0 100 100">
<circle cx="50" cy="50" r="42" stroke-dasharray="2 3"></circle>
<circle cx="50" cy="50" r="30"></circle>
<circle cx="50" cy="50" r="16"></circle>
<path d="M50 8 V92 M8 50 H92 M20 20 L80 80 M20 80 L80 20" stroke-opacity="0.5"></path>
<polygon fill="currentColor" fill-opacity="0.1" points="50,22 62,42 84,50 62,58 50,78 38,58 16,50 38,42"></polygon>
</svg>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Uninscribed Ledger</span>
<h3 class="font-headline-md text-headline-md text-primary font-normal tracking-tight">YOUR ORDER HISTORY STARTS HERE</h3>
<p class="font-body-md text-body-md text-on-surface-variant max-w-md mx-auto">
          You haven't placed an order yet in this category. Explore the ANUKUL collection to discover certified medicinal oils, ritual kansa, and sacred Vastu alignments.
        </p>
<div class="flex flex-col sm:flex-row items-center gap-3 mt-4">
<a class="w-full sm:w-auto px-6 py-3 rounded-lg bg-primary-container text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-tertiary-container transition-colors shadow-sm" href="client_portal_order_history.html">
            EXPLORE THE SHOP
          </a>
<a class="w-full sm:w-auto px-6 py-3 rounded-lg bg-surface-container text-primary font-label-md text-label-md uppercase tracking-wider hover:bg-surface-container-high transition-colors shadow-sm" href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>">
            MY ACCOUNT DASHBOARD
          </a>
</div>
</div>
<!-- Need Assistance Bar at Bottom -->
<div class="bg-surface-container rounded-xl p-6 sm:p-7 flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm">
<div class="flex items-center gap-4 text-center md:text-left">
<div class="w-12 h-12 rounded-full bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm flex-shrink-0">
<span class="material-symbols-outlined notranslate text-[24px]" translate="no">support_agent</span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold block mb-0.5">Concierge Oversight</span>
<h4 class="font-headline-sm text-headline-sm text-primary font-medium">Have a question about your past orders?</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
              Contact our Vaidya Dispensary Concierge for herbal batch certificates, transit muhurta inquiries, or order adjustments.
            </p>
</div>
</div>
<a class="w-full md:w-auto px-6 py-3 rounded-lg bg-surface-container-lowest text-primary font-label-md text-label-md uppercase tracking-wider hover:bg-primary hover:text-on-primary transition-all whitespace-nowrap shadow-sm text-center flex items-center justify-center gap-2" href="client_portal_order_history.html">
<span>CONTACT SANCTUARY</span>
<span class="material-symbols-outlined notranslate text-[16px]" translate="no">support</span>
</a>
</div>

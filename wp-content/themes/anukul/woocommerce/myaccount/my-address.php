<?php
/**
 * My Addresses tab
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="flex flex-col w-full">
<!-- Interactive State Script & Notifications -->
<div class="px-8 pt-8 pb-4">
<!-- View State Switcher Bar -->
<div class="bg-surface-container-low p-2 rounded-xl flex flex-wrap items-center justify-between gap-3 shadow-sm mb-6">
<div class="flex items-center gap-2 px-3 py-1 text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">
<span class="material-symbols-outlined text-[16px] text-secondary">tune</span>
<span>Review State:</span>
</div>
<div class="flex flex-wrap items-center gap-1.5" id="state-switcher">
<button class="px-3.5 py-1.5 rounded font-label-md text-label-md uppercase tracking-wider transition-all bg-primary-container text-on-primary font-semibold shadow-sm" id="btn-state-overview" onclick="switchState('overview')" type="button">
          1. Saved Addresses Overview
        </button>
<button class="px-3.5 py-1.5 rounded font-label-md text-label-md uppercase tracking-wider transition-all bg-surface hover:bg-surface-container text-on-surface-variant" id="btn-state-edit-billing" onclick="switchState('edit-billing')" type="button">
          2. Edit Billing Address
        </button>
<button class="px-3.5 py-1.5 rounded font-label-md text-label-md uppercase tracking-wider transition-all bg-surface hover:bg-surface-container text-on-surface-variant" id="btn-state-edit-shipping" onclick="switchState('edit-shipping')" type="button">
          3. Edit Shipping Address
        </button>
<button class="px-3.5 py-1.5 rounded font-label-md text-label-md uppercase tracking-wider transition-all bg-surface hover:bg-surface-container text-on-surface-variant" id="btn-state-empty-shipping" onclick="switchState('empty-shipping')" type="button">
          4. Empty Shipping State
        </button>
</div>
</div>
<!-- Account Layout Container (Sub-Navigation & Main Workspace) -->
<div class="grid grid-cols-12 gap-8 items-start">
<!-- Left Account Sub-Sidebar (Internal Account Hub) -->
<aside class="col-span-12 lg:col-span-4 xl:col-span-3 flex flex-col gap-6">
<!-- Identity Card -->
<div class="bg-surface-container-low p-6 rounded-xl shadow-sm relative overflow-hidden">
<div class="absolute -right-4 -bottom-4 opacity-5 pointer-events-none text-primary">
<span class="material-symbols-outlined text-[140px]">spa</span>
</div>
<div class="flex items-start gap-4 mb-4">
<div class="w-14 h-14 rounded-full bg-primary-container text-on-primary flex items-center justify-center font-headline-sm text-headline-sm flex-shrink-0 shadow-sm">
              AS
            </div>
<div class="min-w-0 flex-1">
<h2 class="font-headline-sm text-headline-sm text-primary tracking-tight truncate">Ananya Sharma</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant truncate">ananya.sharma@example.com</p>
<div class="mt-2 inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-surface-container text-secondary font-label-sm text-label-sm uppercase tracking-wider font-semibold">
<span class="material-symbols-outlined text-[14px]">verified</span>
<span>Sanctuary Pass</span>
</div>
</div>
</div>
<div class="pt-4 mt-2 bg-surface-container-high/40 p-3 rounded-lg flex items-center justify-between text-on-surface-variant">
<span class="font-label-sm text-label-sm uppercase tracking-wider">Prakriti Archetype</span>
<span class="font-label-md text-label-md font-semibold text-primary">Pitta-Vata (Balanced)</span>
</div>
</div>
<!-- Account Nav Links -->
<div class="bg-surface-container-low p-3 rounded-xl shadow-sm flex flex-col space-y-1">
<a class="flex items-center justify-between px-3.5 py-2.5 rounded text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-colors font-body-sm text-body-sm" href="account.html#dashboard">
<span class="flex items-center gap-3">
<span class="material-symbols-outlined text-[18px]">dashboard</span>
<span>Dashboard</span>
</span>
<span class="material-symbols-outlined text-[16px] text-outline-variant">chevron_right</span>
</a>
<a class="flex items-center justify-between px-3.5 py-2.5 rounded text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-colors font-body-sm text-body-sm" href="account.html#orders">
<span class="flex items-center gap-3">
<span class="material-symbols-outlined text-[18px]">inventory_2</span>
<span>Dispensary Orders</span>
</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm">3 active</span>
</a>
<a class="flex items-center justify-between px-3.5 py-2.5 rounded bg-primary-container text-on-primary font-body-sm text-body-sm font-semibold shadow-sm" href="client_portfal_address.html">
<span class="flex items-center gap-3">
<span class="material-symbols-outlined text-[18px]">explore</span>
<span>Premises &amp; Addresses</span>
</span>
<span class="w-1.5 h-1.5 rounded-full bg-primary-fixed"></span>
</a>
<a class="flex items-center justify-between px-3.5 py-2.5 rounded text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-colors font-body-sm text-body-sm" href="account.html#account-details">
<span class="flex items-center gap-3">
<span class="material-symbols-outlined text-[18px]">manage_accounts</span>
<span>Account Details</span>
</span>
<span class="material-symbols-outlined text-[16px] text-outline-variant">chevron_right</span>
</a>
<a class="flex items-center justify-between px-3.5 py-2.5 rounded text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-colors font-body-sm text-body-sm" href="#">
<span class="flex items-center gap-3">
<span class="material-symbols-outlined text-[18px]">file_download</span>
<span>Vastu Blueprints</span>
</span>
<span class="material-symbols-outlined text-[16px] text-outline-variant">chevron_right</span>
</a>
<div class="my-1 h-[1px] bg-surface-container-highest/60"></div>
<a class="flex items-center gap-3 px-3.5 py-2 rounded text-secondary hover:bg-surface-container transition-colors font-body-sm text-body-sm" href="#">
<span class="material-symbols-outlined text-[18px]">logout</span>
<span>Sign Out</span>
</a>
</div>
<!-- Subtle Vastu Directional Guidance Widget -->
<div class="bg-surface-container p-5 rounded-xl shadow-sm relative overflow-hidden">
<div class="flex items-center gap-2 mb-2 text-secondary">
<span class="material-symbols-outlined text-[20px]">compass_calibration</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest font-bold">Vastu Spatial Alignment</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
            Ensure dispatch coordinates mirror certified postcodes. Exact geospatial alignments preserve apothecary prana and expedite herbal transit.
          </p>
<div class="mt-4 pt-3 flex items-center justify-between text-outline text-[11px] font-mono uppercase tracking-wider">
<span>Coordinate Lock</span>
<span class="text-primary font-bold">28.5672° N, 77.1610° E</span>
</div>
</div>
<!-- Clinic Botanical Imagery Vignette -->
<div class="bg-surface-container-low p-4 rounded-xl shadow-sm space-y-3">
<div class="w-full h-36 rounded-lg bg-cover bg-center overflow-hidden relative shadow-inner" data-alt="Traditional Ayurvedic brass apothecary mortar and pestle resting on reclaimed aged teak wood with fresh dried holy basil tulsi leaves, triphala berries, and warm golden afternoon temple courtyard sunlight." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAzYazIdHSwAJa1pM6yGqghC1y-Y9FOaySZQZ23KaDokweaPR3Ub8QFcUVeheOyZalNPLkkUQf_dfwmRbFNVXhBorlQ4zDCZqFwuewgf5y-NP-nTA4V96Lg3tPiyxLzMwEwTew2YFz0OK8zqD3Yq8T5R_01-eBFrsvV7Dqv5cfJ6SKI_d_BGPjIJM-tl5ilEA3doM2s4zugKXFx9K-gEITVbfzVYRxPZyXixK4ByK_APHBJJyJxhQ7KlA')">
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent flex items-end p-3">
<span class="text-on-primary font-label-sm text-label-sm uppercase tracking-wider">Herbal Dispensary Batch #842</span>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant italic">
            "Space, direction, and pure botanical integrity converge at the doorway of healing."
          </p>
</div>
</aside>
<!-- Main Account Content Area -->
<main class="col-span-12 lg:col-span-8 xl:col-span-9 flex flex-col gap-8">
<!-- Page Header -->
<div class="bg-surface-container-low p-8 rounded-xl shadow-sm relative overflow-hidden">
<div class="max-w-2xl">
<div class="flex items-center gap-2 mb-2 text-secondary">
<span class="material-symbols-outlined text-[18px]">share_location</span>
<span class="font-label-sm text-label-sm uppercase tracking-widest font-bold">Delivery &amp; Fiscal Destinations</span>
</div>
<h1 class="font-display text-display text-primary tracking-tight leading-tight mb-3">Addresses</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
              The following addresses will be used on the dispensary checkout page by default. Manage your registered tax invoicing and primary spatial delivery residences below.
            </p>
</div>
<!-- Subtle 8-Direction Cardinal Mark Top-Right Decorative -->
<div class="absolute right-6 top-6 hidden sm:flex items-center justify-center w-20 h-20 rounded-full bg-surface-container-high/60 pointer-events-none text-primary">
<svg class="w-16 h-16 opacity-30 animate-[spin_60s_linear_infinite]" fill="none" stroke="currentColor" stroke-width="1.2" viewbox="0 0 100 100">
<circle cx="50" cy="50" r="44"></circle>
<circle cx="50" cy="50" r="32"></circle>
<line x1="50" x2="50" y1="6" y2="94"></line>
<line x1="6" x2="94" y1="50" y2="50"></line>
<line x1="19" x2="81" y1="19" y2="81"></line>
<line x1="19" x2="81" y1="81" y2="19"></line>
<polygon fill="currentColor" points="50,10 53,24 47,24"></polygon>
</svg>
</div>
</div>
<!-- SECTION A: SAVED ADDRESSES OVERVIEW (Shown in 'overview' & 'empty-shipping' states) -->
<div class="flex flex-col gap-6" id="section-overview">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Card 1: Billing Address -->
<div class="bg-surface-container-low rounded-xl p-7 shadow-sm flex flex-col justify-between relative group hover:shadow-md transition-shadow">
<div>
<!-- Card Header -->
<div class="flex items-start justify-between gap-3 pb-5 mb-5 bg-surface-container/60 -mx-7 -mt-7 p-7 rounded-t-xl">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block mb-1">Tax &amp; Legal Entity</span>
<h2 class="font-headline-sm text-headline-sm text-primary">Billing Address</h2>
</div>
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-surface-container-highest text-secondary font-label-sm text-label-sm uppercase tracking-wider font-semibold">
<span class="material-symbols-outlined text-[13px]">receipt_long</span>
<span>GST Invoicing</span>
</span>
</div>
<!-- Address Body -->
<div class="space-y-4 font-body-md text-body-md text-on-surface">
<div>
<p class="font-headline-sm text-headline-sm text-on-surface font-medium">Ananya Sharma</p>
<p class="font-body-sm text-body-sm text-secondary font-semibold">Vedic Wellness Studio (Proprietorship)</p>
</div>
<div class="bg-surface-container/40 p-4 rounded-lg space-y-1 font-body-sm text-body-sm text-on-surface-variant">
<p class="text-on-surface font-medium">42 Nilgiri Enclave, Vasant Vihar</p>
<p>Apartment 304, Third Floor</p>
<p>New Delhi, Delhi — 110057</p>
<p class="font-medium text-primary">India (Bharat)</p>
</div>
<div class="space-y-2 pt-2 text-on-surface-variant font-body-sm text-body-sm">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-outline">call</span>
<span>+91 98112 00482</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-[16px] text-outline">mail</span>
<span>ananya.sharma@example.com</span>
</div>
<div class="flex items-center gap-2 pt-1 text-primary">
<span class="material-symbols-outlined text-[16px] text-secondary">verified_user</span>
<span class="font-mono text-label-sm text-label-sm tracking-wider uppercase font-bold">GSTIN: 07AAAAA0000A1Z5</span>
</div>
</div>
</div>
</div>
<!-- Action Link -->
<div class="pt-6 mt-6 bg-surface-container-highest/20 -mx-7 -mb-7 p-7 rounded-b-xl flex items-center justify-between">
<span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Default Billing Target</span>
<button class="inline-flex items-center gap-2 px-4 py-2 rounded bg-surface hover:bg-surface-container text-primary font-label-md text-label-md uppercase tracking-wider transition-colors shadow-sm" onclick="switchState('edit-billing')" type="button">
<span class="material-symbols-outlined text-[16px]">edit</span>
<span>Edit Billing Address</span>
</button>
</div>
</div>
<!-- Card 2: Shipping Address (Active Populated State) -->
<div class="bg-surface-container-low rounded-xl p-7 shadow-sm flex flex-col justify-between relative group hover:shadow-md transition-shadow" id="card-shipping-populated">
<div>
<!-- Card Header -->
<div class="flex items-start justify-between gap-3 pb-5 mb-5 bg-surface-container/60 -mx-7 -mt-7 p-7 rounded-t-xl">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block mb-1">Sanctuary Dispensary</span>
<h2 class="font-headline-sm text-headline-sm text-primary">Shipping Address</h2>
</div>
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-primary-container text-on-primary font-label-sm text-label-sm uppercase tracking-wider font-semibold">
<span class="material-symbols-outlined text-[13px]">home_pin</span>
<span>Primary Sanctuary</span>
</span>
</div>
<!-- Address Body -->
<div class="space-y-4 font-body-md text-body-md text-on-surface">
<div>
<p class="font-headline-sm text-headline-sm text-on-surface font-medium">Ananya Sharma</p>
<p class="font-body-sm text-body-sm text-outline">Residential Sanctuary</p>
</div>
<div class="bg-surface-container/40 p-4 rounded-lg space-y-1 font-body-sm text-body-sm text-on-surface-variant">
<p class="text-on-surface font-medium">42 Nilgiri Enclave, Vasant Vihar</p>
<p>Apartment 304, Third Floor</p>
<p>New Delhi, Delhi — 110057</p>
<p class="font-medium text-primary">India (Bharat)</p>
</div>
<!-- Vastu Orientation Badge -->
<div class="p-3 rounded-lg bg-surface-container-high/60 flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[20px] flex-shrink-0 mt-0.5">explore</span>
<div>
<p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Vastu Cardinal Orientation</p>
<p class="font-body-sm text-body-sm text-primary font-medium">Ishanya (North-East Plot) — Verified</p>
<p class="text-outline text-[11px] leading-tight mt-0.5">Optimal water-ether element resonance for herb absorption.</p>
</div>
</div>
</div>
</div>
<!-- Action Link -->
<div class="pt-6 mt-6 bg-surface-container-highest/20 -mx-7 -mb-7 p-7 rounded-b-xl flex items-center justify-between">
<span class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Default Courier Target</span>
<button class="inline-flex items-center gap-2 px-4 py-2 rounded bg-surface hover:bg-surface-container text-primary font-label-md text-label-md uppercase tracking-wider transition-colors shadow-sm" onclick="switchState('edit-shipping')" type="button">
<span class="material-symbols-outlined text-[16px]">edit</span>
<span>Edit Shipping Address</span>
</button>
</div>
</div>
<!-- Card 2 Alternate: Empty Shipping State (Toggleable) -->
<div class="hidden bg-surface-container-low rounded-xl p-7 shadow-sm flex-col justify-between relative border-dashed" id="card-shipping-empty">
<div class="flex items-start justify-between gap-3 pb-5 mb-5 bg-surface-container/60 -mx-7 -mt-7 p-7 rounded-t-xl">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block mb-1">Sanctuary Dispensary</span>
<h2 class="font-headline-sm text-headline-sm text-primary">Shipping Address</h2>
</div>
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-surface-container-highest text-outline font-label-sm text-label-sm uppercase tracking-wider font-semibold">
<span class="material-symbols-outlined text-[13px]">info</span>
<span>Not Configured</span>
</span>
</div>
<div class="py-10 flex flex-col items-center justify-center text-center px-4 space-y-3">
<div class="w-16 h-16 rounded-full bg-surface-container flex items-center justify-center text-outline">
<span class="material-symbols-outlined text-[32px]">local_shipping</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-primary">No shipping address recorded yet.</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-sm">
                  Add your home sanctuary or clinical treatment quarters to calculate Vastu delivery windows and automated dispatch routing.
                </p>
</div>
<div class="pt-6 mt-6 bg-surface-container-highest/20 -mx-7 -mb-7 p-7 rounded-b-xl flex items-center justify-center">
<button class="inline-flex items-center gap-2 px-5 py-2.5 rounded bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-tertiary-container transition-colors shadow-sm" onclick="switchState('edit-shipping')" type="button">
<span class="material-symbols-outlined text-[18px]">add_location_alt</span>
<span>Add Shipping Address</span>
</button>
</div>
</div>
</div>
</div>
<!-- SECTION B: INLINE EDIT ADDRESS PANEL (Form Mode for Billing or Shipping) -->
<div class="hidden bg-surface-container-low rounded-xl p-8 shadow-sm" id="section-edit-form">
<div class="flex flex-wrap items-center justify-between gap-4 pb-6 mb-8 bg-surface-container/50 -mx-8 -mt-8 p-8 rounded-t-xl">
<div>
<div class="flex items-center gap-2 mb-1">
<span class="material-symbols-outlined text-secondary text-[18px]" id="edit-form-icon">receipt_long</span>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold" id="edit-form-eyebrow">Fiscal Profile</span>
</div>
<h2 class="font-headline-lg text-headline-lg text-primary" id="edit-form-title">Editing Billing Address</h2>
</div>
<div class="flex items-center gap-2">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded bg-surface-container-highest text-on-surface font-label-sm text-label-sm uppercase tracking-wider">
<span class="material-symbols-outlined text-[14px] text-primary">check_circle</span>
<span>Sanctuary Address Form</span>
</span>
<button class="p-2 rounded hover:bg-surface-container text-on-surface-variant" onclick="switchState('overview')" title="Close editor" type="button">
<span class="material-symbols-outlined">close</span>
</button>
</div>
</div>
<!-- Address Edit Form -->
<form class="space-y-6" onsubmit="handleSaveAddress(event)">
<!-- Row 1: Name Fields -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_first_name">
                  First Name <span class="text-error">*</span>
</label>
<input class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20" id="billing_first_name" name="first_name" required="" type="text" value="Ananya"/>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_last_name">
                  Last Name <span class="text-error">*</span>
</label>
<input class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20" id="billing_last_name" name="last_name" required="" type="text" value="Sharma"/>
</div>
</div>
<!-- Row 2: Company -->
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_company">
                Company Name <span class="text-outline font-normal">(Optional)</span>
</label>
<input class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20" id="billing_company" name="company" type="text" value="Vedic Wellness Studio"/>
</div>
<!-- Row 3: Country / Region -->
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_country">
                Country / Region <span class="text-error">*</span>
</label>
<div class="relative">
<select class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md appearance-none shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20 cursor-pointer" id="billing_country" name="country">
<option selected="" value="IN">India (Bharat)</option>
<option value="US">United States</option>
<option value="GB">United Kingdom</option>
<option value="SG">Singapore</option>
<option value="AE">United Arab Emirates</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3.5 pointer-events-none text-outline">expand_more</span>
</div>
</div>
<!-- Row 4: Street Address -->
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_address_1">
                Street Address <span class="text-error">*</span>
</label>
<input class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20" id="billing_address_1" name="address_1" placeholder="House number and street name" required="" type="text" value="42 Nilgiri Enclave, Vasant Vihar"/>
</div>
<!-- Row 5: Apartment Suite Unit -->
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_address_2">
                Apartment, Suite, Unit, etc. <span class="text-outline font-normal">(Optional)</span>
</label>
<input class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20" id="billing_address_2" name="address_2" placeholder="Apartment, suite, unit, building, floor, etc." type="text" value="Apartment 304"/>
</div>
<!-- Row 6: Town, State, PIN -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_city">
                  Town / City <span class="text-error">*</span>
</label>
<input class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20" id="billing_city" name="city" required="" type="text" value="New Delhi"/>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_state">
                  State / County <span class="text-error">*</span>
</label>
<div class="relative">
<select class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md appearance-none shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20 cursor-pointer" id="billing_state" name="state">
<option selected="" value="DL">Delhi</option>
<option value="MH">Maharashtra</option>
<option value="KA">Karnataka</option>
<option value="TN">Tamil Nadu</option>
<option value="UP">Uttar Pradesh</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-3.5 pointer-events-none text-outline">expand_more</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_postcode">
                  PIN Code <span class="text-error">*</span>
</label>
<input class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20" id="billing_postcode" name="postcode" required="" type="text" value="110057"/>
</div>
</div>
<!-- Row 7: Phone and Email -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6" id="row-contact-info">
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_phone">
                  Phone <span class="text-error">*</span>
</label>
<div class="relative">
<input class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20" id="billing_phone" name="phone" required="" type="tel" value="+91 98112 00482"/>
<span class="material-symbols-outlined absolute right-3 top-3.5 text-outline text-[18px]">call</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-semibold" for="billing_email">
                  Email Address <span class="text-error">*</span>
</label>
<div class="relative">
<input class="w-full px-4 py-3 rounded bg-surface text-on-surface font-body-md text-body-md shadow-inner focus:outline-none focus:ring-2 focus:ring-primary/20" id="billing_email" name="email" required="" type="email" value="ananya.sharma@example.com"/>
<span class="material-symbols-outlined absolute right-3 top-3.5 text-outline text-[18px]">mail</span>
</div>
</div>
</div>
<!-- Vastu Special Spatial Coordinates (Shown in Shipping Mode) -->
<div class="hidden p-5 rounded-lg bg-surface-container space-y-3" id="row-vastu-custom">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">explore</span>
<span>Spatial Alignment Parameter (Vastu Shastra)</span>
</span>
<span class="font-label-sm text-label-sm uppercase text-primary font-bold">Ishanya Verified</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                Our Vaidyas formulate individualized decoction batches according to cardinal transit bearings. Select your master premise entrance orientation:
              </p>
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-1">
<label class="flex items-center gap-2 p-2.5 rounded bg-surface cursor-pointer text-body-sm">
<input checked="" class="text-primary focus:ring-primary" name="vastu_direction" type="radio" value="NE"/>
<span>North-East (Ishanya)</span>
</label>
<label class="flex items-center gap-2 p-2.5 rounded bg-surface cursor-pointer text-body-sm">
<input class="text-primary focus:ring-primary" name="vastu_direction" type="radio" value="E"/>
<span>East (Purva)</span>
</label>
<label class="flex items-center gap-2 p-2.5 rounded bg-surface cursor-pointer text-body-sm">
<input class="text-primary focus:ring-primary" name="vastu_direction" type="radio" value="N"/>
<span>North (Uttara)</span>
</label>
<label class="flex items-center gap-2 p-2.5 rounded bg-surface cursor-pointer text-body-sm">
<input class="text-primary focus:ring-primary" name="vastu_direction" type="radio" value="OTHER"/>
<span>Other / Undetermined</span>
</label>
</div>
</div>
<!-- Form Action Buttons -->
<div class="pt-6 flex flex-wrap items-center gap-4">
<button class="px-8 py-3.5 rounded bg-primary-container text-on-primary font-label-md text-label-md uppercase tracking-wider font-semibold hover:bg-tertiary-container hover:text-on-tertiary transition-colors shadow-sm inline-flex items-center gap-2" type="submit">
<span class="material-symbols-outlined text-[18px]">done</span>
<span>Save Address</span>
</button>
<button class="px-6 py-3.5 rounded bg-surface hover:bg-surface-container text-on-surface font-label-md text-label-md uppercase tracking-wider transition-colors shadow-sm" onclick="switchState('overview')" type="button">
                Cancel
              </button>
<span class="text-outline font-body-sm text-body-sm sm:ml-auto">
                All changes synchronize directly with Sanctuary profile.
              </span>
</div>
</form>
</div>
<!-- Section C: Visual Architectural Blueprint & Dispatch Assurance -->
<div class="bg-surface-container-low rounded-xl p-8 shadow-sm">
<div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
<div class="md:col-span-7 space-y-4">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-surface-container text-secondary font-label-sm text-label-sm uppercase tracking-wider font-semibold">
<span class="material-symbols-outlined text-[16px]">domain_verification</span>
<span>Spatial Diagnostic Integrity</span>
</div>
<h3 class="font-headline-md text-headline-md text-primary">Precise coordinates for bespoke botanical delivery.</h3>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                Ayurvedic herbs are live organic conductors. We track temperature, lunar cycles, and spatial entrance vectors to guarantee all churnams, tailams, and gold-bhasma remedies arrive with pristine bio-potency.
              </p>
<div class="grid grid-cols-3 gap-4 pt-2">
<div class="bg-surface p-3.5 rounded-lg text-center shadow-inner">
<p class="font-headline-sm text-headline-sm text-primary">100%</p>
<p class="font-label-sm text-label-sm uppercase text-outline mt-0.5">Cold-Chain Potency</p>
</div>
<div class="bg-surface p-3.5 rounded-lg text-center shadow-inner">
<p class="font-headline-sm text-headline-sm text-secondary">24h</p>
<p class="font-label-sm text-label-sm uppercase text-outline mt-0.5">Apothecary Dispatch</p>
</div>
<div class="bg-surface p-3.5 rounded-lg text-center shadow-inner">
<p class="font-headline-sm text-headline-sm text-primary">Vedic</p>
<p class="font-label-sm text-label-sm uppercase text-outline mt-0.5">Mandala Shield</p>
</div>
</div>
</div>
<div class="md:col-span-5">
<div class="bg-surface rounded-xl p-5 shadow-sm space-y-4 relative">
<div class="flex items-center justify-between pb-3 bg-surface-container-low/60 -mx-5 -mt-5 p-5 rounded-t-xl">
<span class="font-label-md text-label-md uppercase tracking-wider text-primary font-bold">Mandala Grid Reference</span>
<span class="font-mono text-[11px] text-outline">LOC-VAS-DEL-057</span>
</div>
<!-- Architectural Geometric Blueprint Illustration (SVG) -->
<div class="flex justify-center py-2">
<svg class="w-48 h-48 text-primary/70" fill="none" stroke="currentColor" viewbox="0 0 200 200">
<!-- Concentric Sacred Squares -->
<rect class="text-primary/40" height="180" stroke-width="1.5" width="180" x="10" y="10"></rect>
<rect class="text-outline-variant" height="140" stroke-width="1" width="140" x="30" y="30"></rect>
<rect class="text-secondary/60" height="100" stroke-width="1.2" width="100" x="50" y="50"></rect>
<rect class="text-primary" fill="currentColor" fill-opacity="0.06" height="50" stroke-width="1.5" width="50" x="75" y="75"></rect>
<!-- Brahma Sthan Center Circle -->
<circle class="text-secondary" cx="100" cy="100" r="14" stroke-width="1"></circle>
<circle class="text-secondary" cx="100" cy="100" fill="currentColor" r="3"></circle>
<!-- Axis Cross lines -->
<line class="text-outline" stroke-dasharray="3 3" stroke-width="0.75" x1="100" x2="100" y1="10" y2="190"></line>
<line class="text-outline" stroke-dasharray="3 3" stroke-width="0.75" x1="10" x2="190" y1="100" y2="100"></line>
<line class="text-outline-variant" stroke-dasharray="2 2" stroke-width="0.5" x1="10" x2="190" y1="10" y2="190"></line>
<line class="text-outline-variant" stroke-dasharray="2 2" stroke-width="0.5" x1="10" x2="190" y1="190" y2="10"></line>
<!-- Cardinal Labels -->
<text fill="currentColor" font-size="9" font-weight="700" text-anchor="middle" x="100" y="24">N (Uttara)</text>
<text fill="currentColor" font-size="9" font-weight="700" text-anchor="middle" x="100" y="184">S (Dakshina)</text>
<text fill="currentColor" font-size="9" font-weight="700" text-anchor="middle" x="24" y="103">W</text>
<text fill="currentColor" font-size="9" font-weight="700" text-anchor="middle" x="176" y="103">E</text>
<text fill="#974800" font-size="8" font-weight="700" text-anchor="middle" x="160" y="38">NE (Ishanya)</text>
</svg>
</div>
<div class="pt-2 text-center">
<p class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Plot #42 Nilgiri Orient: Verified Ishanya</p>
<p class="font-body-sm text-body-sm text-outline mt-0.5">Purity quotient verified for herbal dispensation.</p>
</div>
</div>
</div>
</div>
</div>
<!-- Section D: Assistance Callout Card -->
<div class="bg-surface-container rounded-xl p-6 shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
<div class="flex items-start gap-4">
<div class="w-12 h-12 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center flex-shrink-0 mt-0.5">
<span class="material-symbols-outlined text-[24px]">support_agent</span>
</div>
<div>
<h4 class="font-headline-sm text-headline-sm text-primary">Need to dispatch to a retreat or international address?</h4>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
                Our clinical dispatch liaisons handle custom customs clearances and temperature-regulated pilgrimage shipments.
              </p>
</div>
</div>
<a class="px-5 py-2.5 rounded bg-surface hover:bg-surface-container-highest text-primary font-label-md text-label-md uppercase tracking-wider transition-colors shadow-sm flex items-center gap-2 whitespace-nowrap self-end sm:self-center" href="mailto:support@anukulharmony.in">
<span class="material-symbols-outlined text-[16px]">mail</span>
<span>support@anukulharmony.in</span>
</a>
</div>

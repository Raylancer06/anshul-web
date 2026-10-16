<?php
/**
 * Template Name: Book Your Consultation
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$b_curr_user = wp_get_current_user();
$default_booking_name  = $b_curr_user->ID ? ($b_curr_user->display_name ?: $b_curr_user->user_nicename) : '';
$default_booking_email = $b_curr_user->ID ? $b_curr_user->user_email : '';
$default_booking_phone = $b_curr_user->ID ? get_user_meta( $b_curr_user->ID, 'billing_phone', true ) : '';
?>

<div class="flex flex-col w-full">
<!-- Subtle Status Ribbon & Coordinates -->
<div class="w-full bg-surface-container py-2.5 px-margin md:px-margin-md lg:px-margin-lg">
<div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-space-xs text-on-surface-variant font-label-md text-label-md tracking-wider">
<div class="flex items-center gap-space-sm">
<span class="w-2 h-2 rounded-full bg-primary-container animate-pulse"></span>
<span class="text-on-surface uppercase font-semibold">Indian Standard Time (IST · UTC+5:30)</span>
<span class="hidden md:inline text-outline">·</span>
<span class="hidden md:inline">256-Bit SSL Encrypted Healthcare Gateway</span>
</div>
<div class="flex items-center gap-space-sm font-label-sm text-label-sm text-secondary tracking-widest uppercase">
<span class="material-symbols-outlined notranslate text-[15px]" translate="no">verified_user</span>
<span>NABH &amp; Ayush Aligned Protocols</span>
</div>
</div>
</div>
<!-- Page Header & Stepper Section -->
<section class="w-full bg-surface pt-space-lg pb-space-xl px-margin md:px-margin-md lg:px-margin-lg">
<div class="max-w-7xl mx-auto">
<!-- Breadcrumb -->
<nav aria-label="Breadcrumb" class="flex items-center gap-space-xs font-label-md text-label-md text-on-surface-variant mb-space-md pt-2">
<a class="hover:text-primary transition-colors font-medium" href="<?php echo esc_url( home_url( "/" ) ); ?>">Home</a>
<span class="text-outline text-[12px]">/</span>
<a class="hover:text-primary transition-colors font-medium" href="<?php echo esc_url( home_url( "/services/" ) ); ?>">Consultations</a>
<span class="text-outline text-[12px]">/</span>
<span class="text-primary font-semibold">Book Your Consultation</span>
</nav>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-end pb-space-lg">
<div class="lg:col-span-8 flex flex-col gap-space-xs">
<span class="font-label-sm text-label-sm text-secondary uppercase tracking-[0.18em] font-bold">ONLINE &amp; IN-CLINIC APPOINTMENTS</span>
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tight">Book Your Consultation</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mt-space-xs">
            Select your consultation service, choose your preferred appointment date and time slot, and confirm your booking securely.
          </p>
</div>
<div class="lg:col-span-4 flex lg:justify-end">
<div class="p-space-md bg-surface-container rounded-lg flex items-center gap-space-md w-full sm:w-auto shadow-sm">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary flex items-center justify-center shrink-0">
<span class="material-symbols-outlined notranslate text-[20px]" translate="no">timer</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary">Slot Hold Timer</span>
<span class="font-headline-sm text-headline-sm text-primary leading-tight" id="countdown-timer">14:59</span>
<span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Held exclusively for your session</span>
</div>
</div>
</div>
</div>
<!-- 4-Step Interactive Progress Tracker -->
<div class="w-full bg-surface-container-low p-space-md md:p-space-lg rounded-xl shadow-sm">
<ol class="grid grid-cols-2 md:grid-cols-4 gap-space-md relative">
<!-- Step 1 Indicator -->
<li class="cursor-pointer group" onclick="goToStep(1)">
<div class="flex items-center gap-space-sm pb-space-xs">
<div class="w-8 h-8 rounded-full bg-primary text-on-primary font-headline-sm text-[16px] flex items-center justify-center font-bold" id="badge-step-1">1</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Step 01</span>
<span class="font-body-md text-body-md font-semibold text-primary" id="title-step-1">Consultation</span>
</div>
</div>
<div class="h-1 w-full bg-primary rounded-full transition-all duration-300" id="bar-step-1"></div>
</li>
<!-- Step 2 Indicator -->
<li class="cursor-pointer group" onclick="goToStep(2)">
<div class="flex items-center gap-space-sm pb-space-xs">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant font-headline-sm text-[16px] flex items-center justify-center font-bold" id="badge-step-2">2</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-outline font-bold">Step 02</span>
<span class="font-body-md text-body-md font-normal text-on-surface-variant" id="title-step-2">Time Slot</span>
</div>
</div>
<div class="h-1 w-full bg-surface-container-highest rounded-full transition-all duration-300" id="bar-step-2"></div>
</li>
<!-- Step 3 Indicator -->
<li class="cursor-pointer group" onclick="goToStep(3)">
<div class="flex items-center gap-space-sm pb-space-xs">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant font-headline-sm text-[16px] flex items-center justify-center font-bold" id="badge-step-3">3</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-outline font-bold">Step 03</span>
<span class="font-body-md text-body-md font-normal text-on-surface-variant" id="title-step-3">Your Details</span>
</div>
</div>
<div class="h-1 w-full bg-surface-container-highest rounded-full transition-all duration-300" id="bar-step-3"></div>
</li>
<!-- Step 4 Indicator -->
<li class="cursor-pointer group" onclick="goToStep(4)">
<div class="flex items-center gap-space-sm pb-space-xs">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant font-headline-sm text-[16px] flex items-center justify-center font-bold" id="badge-step-4">4</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-outline font-bold">Step 04</span>
<span class="font-body-md text-body-md font-normal text-on-surface-variant" id="title-step-4">Payment</span>
</div>
</div>
<div class="h-1 w-full bg-surface-container-highest rounded-full transition-all duration-300" id="bar-step-4"></div>
</li>
</ol>
</div>
</div>
</section>
<!-- Notification Banner (State: Slot conflict or alerts) -->
<div class="hidden w-full bg-error-container text-on-error-container py-3 px-margin md:px-margin-md lg:px-margin-lg shadow-sm" id="alert-banner">
<div class="max-w-7xl mx-auto flex items-center justify-between gap-space-md">
<div class="flex items-center gap-space-sm font-body-sm text-body-sm">
<span class="material-symbols-outlined notranslate text-error" translate="no">notification_important</span>
<span><strong>Attention:</strong> The previously selected slot on 11:00 AM IST was claimed by another patient during verification. Please choose another muhurta from Step 2.</span>
</div>
<button class="text-on-error-container hover:text-error" onclick="dismissAlert()">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">close</span>
</button>
</div>
</div>
<!-- Primary Dynamic Content Container -->
<main class="w-full bg-surface py-space-xl px-margin md:px-margin-md lg:px-margin-lg flex-1">
<div class="max-w-7xl mx-auto">
<!-- ================= STEP 1: CONSULTATION SELECTION ================= -->
<section class="step-view flex flex-col gap-space-xl" id="step-content-1">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md pb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Primary Diagnostic Modality</span>
<h2 class="font-headline-md text-headline-md text-primary">Select Clinical Consultation</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Our certified vaidyas and vastu shastra acharyas offer individualized evaluations rooted in foundational Vedic manuscripts.</p>
</div>
<div class="flex items-center gap-space-sm font-label-md text-label-md text-on-surface-variant shrink-0">
<span class="material-symbols-outlined notranslate text-primary text-[18px]" translate="no">verified</span>
<span>All fees inclusive of statutory GST (18%)</span>
</div>
</div>
<!-- 4 Cards Responsive Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-space-md anukul-stagger">
<!-- CARD 1: Only Online Health Consultation -->
<div class="consultation-card cursor-pointer bg-surface-container-lowest p-space-md lg:p-space-lg rounded-xl flex flex-col justify-between transition-all duration-300 shadow-sm hover:shadow-md relative group anukul-card-lift" id="card-health" onclick="selectConsultation('health', 1000, 'Only Online Health Consultation', '45 mins', 'Video Call (Secure Tele-Health)')">
<div class="flex flex-col">
<div class="flex items-start justify-between gap-space-sm mb-space-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[11px] uppercase tracking-wider font-semibold">Prakriti &amp; Health</span>
<span class="font-label-sm text-[11px] uppercase tracking-widest text-secondary font-bold">45 Mins</span>
</div>
<h3 class="font-headline-sm text-[20px] text-primary mb-1 leading-snug">Only Online Health Consultation</h3>
<p class="font-label-sm text-secondary font-semibold mb-space-xs text-[12px]">Classical Prakriti &amp; Constitutional Assessment</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
  In-depth clinical discussion of Ayurvedic principles, doshic balance, dinacharya routines, tailored herbal formulations, and dietary guidance.
</p>
<div class="bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-1.5 font-body-sm text-[12px] text-on-surface-variant mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-primary" translate="no">video_camera_front</span>
<span>Video Call (Secure Tele-Health)</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-primary" translate="no">clinical_notes</span>
<span>Personalized Ahara-Vihara Dossier</span>
</div>
</div>
</div>
<div class="pt-space-sm border-t border-surface-container flex items-center justify-between">
<div>
<span class="font-label-sm text-[11px] uppercase text-outline">Fee</span>
<div class="font-headline-sm text-[22px] text-primary font-bold">₹ 1,000</div>
</div>
<button class="select-btn px-4 py-1.5 rounded-lg bg-surface-container-high text-on-surface font-label-sm uppercase tracking-wider group-hover:bg-primary group-hover:text-on-primary transition-colors" type="button">
  Select
</button>
</div>
</div>

<!-- CARD 2: Medico-Vastu Consultation -->
<div class="consultation-card cursor-pointer bg-surface-container-lowest p-space-md lg:p-space-lg rounded-xl flex flex-col justify-between transition-all duration-300 shadow-sm hover:shadow-md relative group anukul-card-lift" id="card-medico-vastu" onclick="selectConsultation('medico-vastu', 3100, 'Medico-Vastu Consultation', '60 mins', 'Floor Plan Audit &amp; Video Analysis')">
<div class="flex flex-col">
<div class="flex items-start justify-between gap-space-sm mb-space-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[11px] uppercase tracking-wider font-semibold">Spatial Geometry</span>
<span class="font-label-sm text-[11px] uppercase tracking-widest text-secondary font-bold">60 Mins</span>
</div>
<h3 class="font-headline-sm text-[20px] text-primary mb-1 leading-snug">Medico-Vastu Consultation</h3>
<p class="font-label-sm text-secondary font-semibold mb-space-xs text-[12px]">Residential &amp; Workspace Spatial Audit</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
  Evaluation of architectural layout, directional orientation, Ishanya/Brahmasthan flow, room usage, and non-destructive remedial harmonizers.
</p>
<div class="bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-1.5 font-body-sm text-[12px] text-on-surface-variant mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-primary" translate="no">architecture</span>
<span>Blueprint Review &amp; Video Analysis</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-primary" translate="no">compass_calibration</span>
<span>Mandala Grid &amp; Remedial Overlay</span>
</div>
</div>
</div>
<div class="pt-space-sm border-t border-surface-container flex items-center justify-between">
<div>
<span class="font-label-sm text-[11px] uppercase text-outline">Fee</span>
<div class="font-headline-sm text-[22px] text-primary font-bold">₹ 3,100</div>
</div>
<button class="select-btn px-4 py-1.5 rounded-lg bg-surface-container-high text-on-surface font-label-sm uppercase tracking-wider group-hover:bg-primary group-hover:text-on-primary transition-colors" type="button">
  Select
</button>
</div>
</div>

<!-- CARD 3: Medico-Astro-Vastu Construction -->
<div class="consultation-card cursor-pointer bg-surface-container-lowest p-space-md lg:p-space-lg rounded-xl flex flex-col justify-between transition-all duration-300 shadow-sm hover:shadow-md relative group anukul-card-lift" id="card-astro-construction" onclick="selectConsultation('astro-construction', 4100, 'Medico-Astro-Vastu Construction', '75 mins', 'Architectural &amp; Planetary Blueprint Audit')">
<div class="flex flex-col">
<div class="flex items-start justify-between gap-space-sm mb-space-sm">
<span class="px-2 py-0.5 rounded bg-surface-container text-on-surface-variant font-label-sm text-[11px] uppercase tracking-wider font-semibold">Architectural &amp; Astro</span>
<span class="font-label-sm text-[11px] uppercase tracking-widest text-secondary font-bold">75 Mins</span>
</div>
<h3 class="font-headline-sm text-[20px] text-primary mb-1 leading-snug">Medico-Astro-Vastu Construction</h3>
<p class="font-label-sm text-secondary font-semibold mb-space-xs text-[12px]">Site Planning &amp; Planetary Construction Alignment</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
  Architectural blueprint guidance aligning structural construction or renovation with planetary influences, cardinal energy grids, and health energetics.
</p>
<div class="bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-1.5 font-body-sm text-[12px] text-on-surface-variant mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-primary" translate="no">domain_add</span>
<span>Structural &amp; Site Blueprint Audit</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-primary" translate="no">auto_graph</span>
<span>Planetary &amp; Energetic Grid Calibration</span>
</div>
</div>
</div>
<div class="pt-space-sm border-t border-surface-container flex items-center justify-between">
<div>
<span class="font-label-sm text-[11px] uppercase text-outline">Fee</span>
<div class="font-headline-sm text-[22px] text-primary font-bold">₹ 4,100</div>
</div>
<button class="select-btn px-4 py-1.5 rounded-lg bg-surface-container-high text-on-surface font-label-sm uppercase tracking-wider group-hover:bg-primary group-hover:text-on-primary transition-colors" type="button">
  Select
</button>
</div>
</div>

<!-- CARD 4: Complete Medico-Astro Vastu Numerology Consultation (RECOMMENDED DEFAULT) -->
<div class="consultation-card active-card cursor-pointer bg-surface-container-lowest p-space-md lg:p-space-lg rounded-xl flex flex-col justify-between transition-all duration-300 shadow-md relative group ring-2 ring-primary anukul-card-lift" id="card-complete" onclick="selectConsultation('complete', 5100, 'Complete Medico-Astro Vastu Numerology Consultation', '90 mins', 'Complete 4-Pillar Master Consultation')">
<!-- Active Recommended Badge -->
<div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-secondary text-on-secondary px-3 py-0.5 rounded-full font-label-sm text-[10px] uppercase tracking-widest font-bold shadow-sm flex items-center gap-1 whitespace-nowrap">
<span class="material-symbols-outlined notranslate text-[13px]" translate="no">auto_awesome</span>
Recommended Protocol
</div>
<div class="flex flex-col">
<div class="flex items-start justify-between gap-space-sm mb-space-sm pt-1">
<span class="px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed font-label-sm text-[11px] uppercase tracking-wider font-semibold">4-Pillar Master Alignment</span>
<span class="font-label-sm text-[11px] uppercase tracking-widest text-secondary font-bold">90 Mins</span>
</div>
<h3 class="font-headline-sm text-[20px] text-primary mb-1 leading-snug">Complete Medico-Astro Vastu Numerology Consultation</h3>
<p class="font-label-sm text-secondary font-semibold mb-space-xs text-[12px]">Unified 4-Pillar Master Alignment Protocol</p>
<p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md leading-relaxed">
  Definitive master consultation integrating Ayurvedic somatic diagnostics, astrological horoscopy, Vastu architecture, and sacred numerological analysis.
</p>
<div class="bg-surface-container-low p-space-sm rounded-lg flex flex-col gap-1.5 font-body-sm text-[12px] text-on-surface-variant mb-space-md">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-primary" translate="no">workspace_premium</span>
<span>Complete 4-Pillar Master Consultation</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-primary" translate="no">folder_special</span>
<span>Unified Multi-Dossier &amp; Blueprint Plan</span>
</div>
</div>
</div>
<div class="pt-space-sm border-t border-surface-container flex items-center justify-between">
<div>
<span class="font-label-sm text-[11px] uppercase text-outline">Fee</span>
<div class="font-headline-sm text-[22px] text-primary font-bold">₹ 5,100</div>
</div>
<button class="select-btn px-4 py-1.5 rounded-lg bg-primary text-on-primary font-label-sm uppercase tracking-wider" type="button">
  Selected
</button>
</div>
</div>
</div>
<!-- Step 1 Actions -->
<div class="flex justify-end pt-space-lg">
<button class="inline-flex items-center gap-space-sm px-8 py-3.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-tertiary transition-colors duration-200 shadow-md" onclick="goToStep(2)" type="button">
<span>Proceed to Choose Slot</span>
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">arrow_forward</span>
</button>
</div>
</section>
<!-- ================= STEP 2: CHOOSE APPOINTMENT (CALENDAR & SLOTS) ================= -->
<section class="step-view hidden flex-col gap-space-xl" id="step-content-2">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md pb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Rhythmic Chronobiology</span>
<h2 class="font-headline-md text-headline-md text-primary">Select Auspicious Appointment Slot</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Calendar slots are calibrated against diurnal bio-rhythms (Brahma Muhurta, Pitta metabolic peak, and Vata twilight calmness).</p>
</div>
<div class="bg-surface-container px-4 py-2 rounded-lg flex items-center gap-space-xs text-primary font-body-sm text-body-sm">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">schedule</span>
<span class="font-semibold" id="active-consultation-banner">Complete Medico-Astro Vastu Numerology Consultation (90 Mins)</span>
</div>
</div>
<!-- Dual Column: Calendar & Time Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
<!-- Left: Calendar Widget (7 Cols) -->
<div class="lg:col-span-7 bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between pb-space-md mb-space-md">
<div class="flex items-center gap-space-sm">
<h3 class="font-headline-sm text-headline-sm text-primary" id="cal-month-title">Loading Month...</h3>
<span class="px-2 py-0.5 rounded bg-surface-container text-secondary font-label-sm text-label-sm uppercase tracking-wider" id="cal-sub-title">Shubha Muhurta</span>
</div>
<div class="flex items-center gap-1">
<button class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-colors" onclick="changeCalendarMonth(-1)" title="Previous Month" type="button">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-surface-container-high transition-colors" onclick="changeCalendarMonth(1)" title="Next Month" type="button">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">chevron_right</span>
</button>
</div>
</div>
<!-- Day Headers -->
<div class="grid grid-cols-7 gap-1 text-center font-label-md text-label-md text-on-surface-variant pb-2">
<span>SUN</span><span>MON</span><span>TUE</span><span>WED</span><span>THU</span><span>FRI</span><span>SAT</span>
</div>
<!-- Calendar Days Grid -->
<div class="grid grid-cols-7 gap-2 text-center font-body-md text-body-md" id="calendar-days">
<!-- Dynamic Day Buttons populated via JS -->
</div>
</div>
<!-- Calendar Legend -->
<div class="pt-space-md mt-space-md flex flex-wrap items-center justify-between gap-space-sm font-label-sm text-label-sm text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded-full bg-primary inline-block"></span>
<span>Selected Date</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-secondary inline-block"></span>
<span>Shubha Muhurta (Optimal Vitality)</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded-full bg-surface-container-highest inline-block"></span>
<span>Completed / Reserved</span>
</div>
</div>
</div>
<!-- Right: Time Slot Selector (5 Cols) -->
<div class="lg:col-span-5 bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col justify-between">
<div class="flex flex-col gap-space-md">
<div class="flex items-center justify-between pb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">Selected Consultation Day</span>
<h3 class="font-headline-sm text-headline-sm text-primary" id="current-chosen-date">Select a Date</h3>
</div>
<span class="material-symbols-outlined notranslate text-primary text-[24px]" translate="no">event_available</span>
</div>

<!-- Closed Day Banner (Hidden by default) -->
<div id="clinic-closed-notice" class="hidden p-4 rounded-lg bg-amber-50 border border-amber-200 text-amber-900 font-body-sm text-sm">
  <div class="flex items-center gap-2 font-semibold mb-1">
    <span class="material-symbols-outlined text-[18px] text-amber-700">event_busy</span>
    <span>Sanctuary Schedule Notice</span>
  </div>
  <p id="clinic-closed-msg">The sanctuary is closed for appointments on this date. Please choose an alternate date from the calendar.</p>
</div>

<!-- Loading Slots State -->
<div id="slots-loading" class="hidden py-8 text-center text-on-surface-variant font-body-sm">
  <div class="inline-block w-6 h-6 border-2 border-primary border-t-transparent rounded-full animate-spin mb-2"></div>
  <p>Checking available muhurta slots...</p>
</div>

<div id="slots-container" class="flex flex-col gap-space-md">
<!-- Time Slot Section 1: Morning -->
<div class="flex flex-col gap-space-xs" id="morning-slots-wrapper">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Morning Muhurta (09:00 – 12:30 IST)</span>
<span class="font-label-sm text-label-sm text-outline">High Bio-Prana Flow</span>
</div>
<div class="grid grid-cols-2 gap-space-sm pt-1" id="morning-slots-grid">
<!-- Populated by fetchAvailableSlots -->
</div>
</div>
<!-- Time Slot Section 2: Afternoon & Evening -->
<div class="flex flex-col gap-space-xs pt-space-xs" id="afternoon-slots-wrapper">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-semibold">Afternoon &amp; Twilight (14:00 – 18:30 IST)</span>
<span class="font-label-sm text-label-sm text-outline">Reflective Analysis</span>
</div>
<div class="grid grid-cols-2 gap-space-sm pt-1" id="afternoon-slots-grid">
<!-- Populated by fetchAvailableSlots -->
</div>
</div>
</div>

<!-- Timezone & Notification Notice -->
<div class="bg-surface-container p-space-sm rounded-lg flex items-start gap-space-xs text-on-surface-variant font-body-sm text-body-sm text-[12px] leading-relaxed">
<span class="material-symbols-outlined notranslate text-primary text-[18px] shrink-0" translate="no">public</span>
<p>All consultation times are shown in Indian Standard Time (IST · UTC+5:30). An automatic Google Calendar invite with local timezone conversion will be dispatched upon confirmation.</p>
</div>
</div>
<!-- Step 2 Navigation -->
<div class="pt-space-md flex items-center justify-between">
<button class="px-5 py-2.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md uppercase tracking-wider hover:bg-surface-container-high transition-colors" onclick="goToStep(1)" type="button">
                Back
              </button>
<button id="step2-continue-btn" class="inline-flex items-center gap-space-xs px-6 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-tertiary transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed" onclick="goToStep(3)" type="button">
<span>Continue to Details</span>
<span class="material-symbols-outlined notranslate text-[16px]" translate="no">arrow_forward</span>
</button>
</div>
</div>
</div>
</section>
<!-- ================= STEP 3: CUSTOMER DETAILS & INTAKE ================= -->
<section class="step-view hidden flex-col gap-space-xl" id="step-content-3">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md pb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Confidential Dossier Preparation</span>
<h2 class="font-headline-md text-headline-md text-primary">Enter Patient &amp; Spatial Details</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">This intake equips Dr. Chaudhari and the spatial audit team with initial context prior to your session.</p>
</div>
<div class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined notranslate text-primary text-[18px]" translate="no">lock</span>
<span>HIPAA &amp; Digital Health Data Compliant</span>
</div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
<!-- Left: Structured Form (8 cols) -->
<form class="lg:col-span-8 bg-surface-container-lowest p-space-lg md:p-space-xl rounded-xl shadow-sm flex flex-col gap-space-md" id="intake-form" onsubmit="event.preventDefault(); goToStep(4);">

<!-- 1. CLIENT / PATIENT DETAILS -->
<div class="pb-2 border-b border-[#E8D8BC]/60 flex items-center justify-between">
  <div>
    <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Section 1</span>
    <h3 class="font-headline-sm text-lg text-primary">Client &amp; Patient Coordinates</h3>
  </div>
  <span class="text-xs font-semibold px-2.5 py-1 rounded bg-[#1F4D3A]/10 text-primary">
    NABH &amp; Ayush Compliant
  </span>
</div>

<!-- Full Name & Age/DOB -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
  <div class="flex flex-col gap-1.5">
    <label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold" for="full-name">Full Legal Name <span class="text-error">*</span></label>
    <input class="w-full bg-surface-container-low px-4 py-3 rounded-lg text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" id="full-name" placeholder="e.g. Ramesh Patel" required="" type="text" value="<?php echo esc_attr( $default_booking_name ); ?>" oninput="updateConsentSignature(this.value)"/>
  </div>
  <div class="flex flex-col gap-1.5">
    <label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold" for="age-dob">Age / Date of Birth <span class="text-error">*</span></label>
    <input class="w-full bg-surface-container-low px-4 py-3 rounded-lg text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" id="age-dob" placeholder="e.g. 34 Years or 15-Aug-1990" required="" type="text"/>
  </div>
</div>

<!-- Mobile Number & Email -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
  <div class="flex flex-col gap-1.5">
    <label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold" for="phone">Mobile Number (WhatsApp Ready) <span class="text-error">*</span></label>
    <div class="flex">
      <span class="inline-flex items-center px-3 rounded-l-lg bg-surface-container text-on-surface font-body-md text-body-md select-none">+91</span>
      <input class="w-full bg-surface-container-low px-4 py-3 rounded-r-lg text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" id="phone" placeholder="98201 00000" required="" type="tel" value="<?php echo esc_attr( $default_booking_phone ); ?>"/>
    </div>
  </div>
  <div class="flex flex-col gap-1.5">
    <label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold" for="email">Email Address <span class="text-error">*</span></label>
    <input class="w-full bg-surface-container-low px-4 py-3 rounded-lg text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" id="email" placeholder="name@domain.com" required="" type="email" value="<?php echo esc_attr( $default_booking_email ); ?>"/>
  </div>
</div>

<!-- City & State & Consultation Format -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
  <div class="flex flex-col gap-1.5">
    <label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold" for="city-state">City &amp; State <span class="text-error">*</span></label>
    <input class="w-full bg-surface-container-low px-4 py-3 rounded-lg text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" id="city-state" placeholder="e.g. Pune, Maharashtra" required="" type="text"/>
  </div>
  <div class="flex flex-col gap-1.5">
    <label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold" for="consultation-format">Consultation Medium <span class="text-error">*</span></label>
    <select class="w-full bg-surface-container-low px-4 py-3 rounded-lg text-on-surface font-body-md text-body-md focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" id="consultation-format">
      <option selected="" value="video">Secure Video Call (Google Meet / Zoom Healthcare)</option>
      <option value="clinic">In-Clinic Sanctuary Visit (Bengaluru Center)</option>
    </select>
  </div>
</div>

<!-- Property Address (For Vastu) & Guardian Name (For Minors) -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
  <div class="flex flex-col gap-1.5">
    <div class="flex items-center justify-between">
      <label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold" for="property-address">Property Address (If Vastu)</label>
      <span class="text-[11px] text-secondary font-medium">Required for Vastu</span>
    </div>
    <input class="w-full bg-surface-container-low px-4 py-3 rounded-lg text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" id="property-address" placeholder="Residence / Commercial premises location" type="text"/>
  </div>
  <div class="flex flex-col gap-1.5">
    <div class="flex items-center justify-between">
      <label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold" for="guardian-name">Parent / Guardian Name</label>
      <span class="text-[11px] text-outline font-medium">If applicable</span>
    </div>
    <input class="w-full bg-surface-container-low px-4 py-3 rounded-lg text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" id="guardian-name" placeholder="If booking for a minor or assisted seeker" type="text"/>
  </div>
</div>

<!-- Health & Space Focus / Intake Notes -->
<div class="flex flex-col gap-1.5">
  <div class="flex items-center justify-between">
    <label class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface font-bold" for="intake-notes">Health Symptoms &amp; Spatial Focus Notes</label>
    <span class="font-label-sm text-label-sm text-outline">Optional Preliminary Context</span>
  </div>
  <textarea class="w-full bg-surface-container-low p-4 rounded-lg text-on-surface font-body-md text-body-md placeholder:text-outline focus:outline-none focus:ring-1 focus:ring-primary shadow-inner" id="intake-notes" placeholder="Describe symptoms, existing diagnosis, or specific floor plan questions for Dr. Chaudhari..." rows="3"></textarea>
</div>

<!-- ============================================================== -->
<!-- ONLINE CONSULTATION CONSENT FORM — ANUKUL CLINIC              -->
<!-- ============================================================== -->
<div class="mt-4 p-5 sm:p-6 rounded-xl bg-surface border-2 border-[#E8D8BC] space-y-4 shadow-sm">
  <!-- Clinic Header Plaque -->
  <div class="pb-3 border-b border-[#E8D8BC]/80">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
      <div>
        <span class="inline-block px-2.5 py-0.5 rounded-full bg-primary/10 text-primary font-label-sm text-[10px] uppercase font-bold tracking-wider">Official Medical &amp; Spatial Charter</span>
        <h3 class="font-headline-sm text-xl text-primary font-bold mt-1 tracking-tight">ONLINE CONSULTATION CONSENT FORM</h3>
        <p class="font-body-sm text-xs text-secondary font-semibold">ANUKUL HEALTH AND VASTU HARMONY CLINIC</p>
      </div>
      <div class="text-left sm:text-right text-xs font-body-sm text-on-surface-variant">
        <p class="font-bold text-primary">Director / Consultant: Dr. Nishigandha Chaudhari</p>
        <p class="text-[11px] text-outline">12+ Years Experience in Ayurveda and Vastu Consulting</p>
        <a href="https://anukulayurvastu.in" target="_blank" class="text-secondary hover:underline font-medium text-[11px]">https://anukulayurvastu.in</a>
      </div>
    </div>
    <p class="font-body-sm text-xs text-on-surface-variant italic mt-2.5 bg-surface-container-high/60 p-2.5 rounded-lg border border-[#E8D8BC]/60">
      Please read this form carefully before submitting your details and proceeding to payment.
    </p>
  </div>

  <!-- Scrollable 10-Point Consent Text Box -->
  <div class="max-h-64 overflow-y-auto pr-2 space-y-4 text-xs font-body-sm text-on-surface-variant leading-relaxed bg-surface-container-lowest p-4 rounded-lg border border-[#E8D8BC]/60">
    <!-- Section 2 -->
    <div>
      <h4 class="font-headline-sm text-sm font-bold text-primary mb-1">2. Consent for Online Consultation</h4>
      <p>I voluntarily request an online consultation from ANUKUL Health and Vastu Harmony Clinic and consent to communicate through the available consultation platform, telephone, video call, email or other agreed digital method.</p>
      <p class="mt-1">I understand that I must provide accurate information relevant to my selected service. I may ask questions about the consultation process, fees, limitations and recommendations before proceeding.</p>
      <p class="mt-1 font-semibold text-primary">I understand that online consultation may have limitations because the consultant may not be able to conduct a physical examination, directly inspect a property, or independently verify every detail I submit.</p>
    </div>

    <!-- Section 3 -->
    <div class="pt-2 border-t border-[#E8D8BC]/40">
      <h4 class="font-headline-sm text-sm font-bold text-primary mb-1">3. Ayurveda Health Consultation — Patient Declaration</h4>
      <p>If I select Ayurveda Health Consultation, I understand and agree that:</p>
      <ol class="list-decimal pl-4 space-y-1 mt-1">
        <li>I will provide accurate information about my symptoms, medical history, existing diagnoses, allergies, medicines, supplements, pregnancy status where relevant, and previous investigations.</li>
        <li>The consultation may include discussion of my health history, diet, lifestyle, sleep, digestion, Prakriti Parikshan and other relevant traditional Ayurveda assessment methods, as appropriate to the service.</li>
        <li>Any assessment or recommendations will depend on the information available and the practitioner’s professional scope.</li>
        <li>An online consultation may not be sufficient to assess every health condition. I may be advised to obtain an in-person examination, laboratory investigation, specialist opinion or emergency care.</li>
        <li>I will not discontinue prescribed medicines or delay necessary medical treatment on the basis of an online consultation.</li>
        <li>I understand that no guarantee of cure, recovery time or specific health outcome is being offered.</li>
      </ol>
      <div class="mt-2 p-2 rounded bg-red-50 border border-red-200 text-red-900 text-[11px] font-medium">
        <strong>Emergency Disclaimer:</strong> This service is not an emergency medical service. For severe chest pain, difficulty breathing, stroke symptoms, collapse or another medical emergency, I will seek immediate emergency medical assistance.
      </div>
    </div>

    <!-- Section 4 -->
    <div class="pt-2 border-t border-[#E8D8BC]/40">
      <h4 class="font-headline-sm text-sm font-bold text-primary mb-1">4. Residential and Commercial Vastu Consultation</h4>
      <p>If I select Vastu Examination, I understand and agree that:</p>
      <ol class="list-decimal pl-4 space-y-1 mt-1">
        <li>I will provide the floor plan, property measurements, direction/orientation details, photographs and other information reasonably required for the assessment.</li>
        <li>I confirm that I am authorized to share the submitted property information and images.</li>
        <li>The analysis may include directional assessment, Vastu gridding, Vastu Purusha Mandala, room usage, layout observations and traditional Vastu interpretations.</li>
        <li>Recommendations are advisory. They do not guarantee health, relationship, career, business or financial outcomes.</li>
        <li>Any structural alteration, electrical work, plumbing work or renovation must be assessed by an appropriately qualified professional.</li>
        <li>I am free to accept, modify or decline recommendations. I am not required to purchase products, perform rituals or undertake expensive remedies.</li>
      </ol>
    </div>

    <!-- Section 5 -->
    <div class="pt-2 border-t border-[#E8D8BC]/40">
      <h4 class="font-headline-sm text-sm font-bold text-primary mb-1">5. Astro Nadi, Kundali and Numerology Consultation</h4>
      <p>If I select an astrology, Astro Nadi or numerology service, I understand and agree that:</p>
      <ol class="list-decimal pl-4 space-y-1 mt-1">
        <li>I may be asked to provide my date of birth, birth time, birthplace, name or other information relevant to the selected service.</li>
        <li>I understand that interpretations depend on the information supplied and the traditional method used.</li>
        <li>These interpretations are offered as traditional, cultural or spiritual guidance and are not scientifically established methods for diagnosing disease or guaranteeing future events.</li>
        <li>Astrology and numerology do not replace medical, psychological, legal, financial or other professional advice.</li>
        <li>No guaranteed prediction regarding illness, fertility, marriage, death, business success or financial gain is promised.</li>
      </ol>
    </div>

    <!-- Section 6 -->
    <div class="pt-2 border-t border-[#E8D8BC]/40">
      <h4 class="font-headline-sm text-sm font-bold text-primary mb-1">6. Consent to Submit Information and Process Personal Data</h4>
      <p>I understand that the clinic will use the information I submit for purposes relevant to my requested service, including identification, scheduling, reviewing data, delivering recommendations, payment processing, and meeting recordkeeping requirements.</p>
      <p class="mt-1">My information will not be used for unrelated marketing without separate permission. I understand digital communications involve security risks despite reasonable safeguards.</p>
      <p class="mt-1 font-semibold text-primary">Privacy Contact: contact@anukulayurvastu.in &bull; WhatsApp: +91 7624012501</p>
    </div>

    <!-- Section 7 -->
    <div class="pt-2 border-t border-[#E8D8BC]/40">
      <h4 class="font-headline-sm text-sm font-bold text-primary mb-1">7. Photographs, Reports and Recordings</h4>
      <p>I understand that property photographs, floor plans, and health documents uploaded may be reviewed for my consultation. Recording, promotional use, or case studies require separate consent. I can decline promotional use without affecting consultation eligibility.</p>
    </div>

    <!-- Section 8 -->
    <div class="pt-2 border-t border-[#E8D8BC]/40">
      <h4 class="font-headline-sm text-sm font-bold text-primary mb-1">8. Fees, Payment and Booking</h4>
      <p>The consultation fee and specific service included are displayed before payment. Payment confirms the booking under stated terms. Payment does not guarantee a particular medical, Vastu, astrological or financial outcome.</p>
      <p class="mt-1"><strong>Cancellation &amp; Refund Policy:</strong> Handled in accordance with the clinic’s disclosed policy (free rescheduling or cancellation up to 24 hours prior to appointment time). <a href="<?php echo esc_url( home_url( '/return-policy/' ) ); ?>" target="_blank" class="text-secondary underline">View Refund Terms</a>.</p>
    </div>

    <!-- Section 9 & 10 -->
    <div class="pt-2 border-t border-[#E8D8BC]/40">
      <h4 class="font-headline-sm text-sm font-bold text-primary mb-1">9. Client Declaration &amp; 10. Consent Confirmation</h4>
      <p>I declare that the information provided is accurate; I have read and understood the scope and limitations; I had the opportunity to ask questions; and if submitting for another person, I have the authority to do so.</p>
      <p class="mt-1 font-semibold text-primary">By selecting the confirmation boxes below, I voluntarily consent to the selected service.</p>
    </div>
  </div>

  <!-- Mandatory Confirmation Checkboxes -->
  <div class="space-y-3 pt-2">
    <!-- Checkbox 1 -->
    <label class="flex items-start gap-3 cursor-pointer group">
      <input type="checkbox" id="consent-online" required class="mt-1 w-4 h-4 rounded text-primary focus:ring-primary border-[#E8D8BC] cursor-pointer"/>
      <span class="font-body-sm text-xs text-on-surface-variant group-hover:text-primary transition-colors">
        <strong>1. Online Consultation &amp; Data Consent:</strong> I voluntarily request an online consultation from ANUKUL Health and Vastu Harmony Clinic and consent to digital communications and data processing for my selected service. <span class="text-error font-bold">*</span>
      </span>
    </label>

    <!-- Checkbox 2 -->
    <label class="flex items-start gap-3 cursor-pointer group">
      <input type="checkbox" id="consent-declarations" required class="mt-1 w-4 h-4 rounded text-primary focus:ring-primary border-[#E8D8BC] cursor-pointer"/>
      <span class="font-body-sm text-xs text-on-surface-variant group-hover:text-primary transition-colors">
        <strong>2. Clinical &amp; Spatial Declarations:</strong> I confirm that I have read and agree to the specific Patient Declarations for Ayurveda Health, Vastu Examination, and Astro Nadi, and acknowledge that this service is not an emergency medical service and offers no guarantee of cure or predictions. <span class="text-error font-bold">*</span>
      </span>
    </label>

    <!-- Checkbox 3 -->
    <label class="flex items-start gap-3 cursor-pointer group">
      <input type="checkbox" id="consent-declaration-truth" required class="mt-1 w-4 h-4 rounded text-primary focus:ring-primary border-[#E8D8BC] cursor-pointer"/>
      <span class="font-body-sm text-xs text-on-surface-variant group-hover:text-primary transition-colors">
        <strong>3. Accuracy &amp; Voluntary Confirmation:</strong> I declare that all information provided is accurate to the best of my knowledge and I voluntarily confirm my informed consent. <span class="text-error font-bold">*</span>
      </span>
    </label>
  </div>

  <!-- Digital Signature Footer Plaque -->
  <div class="p-3 rounded-lg bg-surface-container-high/80 border border-[#E8D8BC]/80 flex flex-col sm:flex-row sm:items-center justify-between gap-2 text-xs">
    <div>
      <span class="text-outline uppercase text-[10px] tracking-wider block font-semibold">Digital Consent Signature</span>
      <span id="consent-signature-preview" class="font-bold text-primary text-sm"><?php echo esc_html( $default_booking_name ?: 'Your Legal Name' ); ?></span>
    </div>
    <div class="sm:text-right">
      <span class="text-outline uppercase text-[10px] tracking-wider block font-semibold">Date of Declaration</span>
      <span class="font-semibold text-secondary"><?php echo esc_html( date_i18n( 'l, F j, Y' ) ); ?> &bull; IST</span>
    </div>
  </div>
</div>

<!-- Step 3 Navigation -->
<div class="pt-space-md flex items-center justify-between">
  <button class="px-5 py-2.5 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md uppercase tracking-wider hover:bg-surface-container-high transition-colors" onclick="goToStep(2)" type="button">
    Back to Time Slot
  </button>
  <button class="inline-flex items-center gap-space-xs px-6 py-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-tertiary transition-colors shadow-sm font-bold" type="submit">
    <span>Sign Consent &amp; Proceed to Payment</span>
    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">arrow_forward</span>
  </button>
</div>
</form>
<!-- Right: Summary Sidebar (4 cols) -->
<div class="lg:col-span-4 flex flex-col gap-space-md">
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col gap-space-md">
<div class="flex items-center gap-space-sm pb-space-sm">
<span class="material-symbols-outlined notranslate text-secondary text-[22px]" translate="no">medical_services</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Session Overview</h3>
</div>
<div class="flex flex-col gap-space-sm font-body-sm text-body-sm">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-outline">Selected Type</span>
<span class="font-semibold text-primary" id="summary-sidebar-type">Complete Medico-Astro Vastu Numerology Consultation</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-outline">Scheduled Slot</span>
<span class="font-semibold text-on-surface" id="summary-sidebar-slot">Tuesday, November 18, 2025 · 11:00 AM IST</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-outline">Duration</span>
<span class="text-on-surface" id="summary-sidebar-duration">90 Minutes Master Assessment</span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-outline">Assigned Lead</span>
<span class="text-on-surface">Dr. Nishigandha Chaudhari &amp; Master Panel</span>
</div>
</div>
<div class="bg-surface-container p-space-sm rounded-lg flex items-center justify-between">
<span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant font-bold">Total Payable</span>
<span class="font-headline-sm text-headline-sm text-primary" id="summary-sidebar-total">₹ 5,100</span>
</div>
</div>
<!-- Sanctuary Guarantee Card -->
<div class="bg-surface-container p-space-md rounded-xl flex items-start gap-space-sm">
<span class="material-symbols-outlined notranslate text-secondary text-[24px] shrink-0" translate="no">spa</span>
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold">Preparation Dossier Included</span>
<p class="font-body-sm text-body-sm text-on-surface-variant text-[12px] leading-relaxed">
                  Upon completion, you will receive a digital intake questionnaire and an orientation kit explaining how to photograph your floor plan and prepare your pulse assessment.
                </p>
</div>
</div>
</div>
</div>
</section>
<!-- ================= STEP 4: PAYMENT & CONFIRMATION SUMMARY ================= -->
<section class="step-view hidden flex-col gap-space-xl" id="step-content-4">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md pb-space-sm">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-bold">Step 04 · Verification &amp; Gateway</span>
<h2 class="font-headline-md text-headline-md text-primary">Payment &amp; Booking Summary</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">Review your consultation details and complete authorization via our encrypted banking rails.</p>
</div>
<div class="flex items-center gap-space-xs font-label-sm text-label-sm uppercase tracking-wider text-secondary font-bold">
<span class="material-symbols-outlined notranslate text-[18px]" translate="no">lock</span>
<span>256-Bit SSL Encrypted Gateway</span>
</div>
</div>
<!-- 2 Column Sticky Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg items-start">
<!-- LEFT: Payment Rail Configuration (7 cols) -->
<div class="lg:col-span-7 flex flex-col gap-space-lg">
<!-- Gateway Accordion Options (Connected to WooCommerce Payment Gateways) -->
<?php
$wc_gateways = function_exists( 'WC' ) && WC()->payment_gateways ? WC()->payment_gateways->get_available_payment_gateways() : array();
?>
<div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col gap-space-md">
  <div class="flex items-center justify-between pb-2 border-b border-[#E8D8BC]/50">
    <div>
      <h3 class="font-headline-sm text-headline-sm text-primary">Select Preferred Payment Gateway</h3>
      <p class="font-body-sm text-xs text-on-surface-variant">Processed securely through WooCommerce Payment Rails</p>
    </div>
    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-[#1F4D3A]/10 text-primary font-label-sm text-xs font-semibold">
      <span class="material-symbols-outlined notranslate text-[14px]" translate="no">lock</span> Verified Gateway
    </span>
  </div>

  <?php if ( ! empty( $wc_gateways ) ) : ?>
    <div class="flex flex-col gap-3" id="wc-payment-options">
      <?php 
      $first = true;
      foreach ( $wc_gateways as $gw_id => $gateway ) : 
        $is_checked = $first ? 'checked' : '';
        $first = false;
        $icon_name = 'account_balance';
        if ( in_array( $gw_id, array( 'cod' ) ) ) {
          $icon_name = 'medical_services';
        } elseif ( in_array( $gw_id, array( 'bacs' ) ) ) {
          $icon_name = 'account_balance';
        } elseif ( in_array( $gw_id, array( 'razorpay', 'stripe', 'card' ) ) ) {
          $icon_name = 'credit_card';
        }
      ?>
        <div class="pay-option rounded-xl p-space-md border border-[#E8D8BC]/60 hover:border-primary/50 transition-all cursor-pointer bg-surface-container-low" onclick="selectPayGateway('<?php echo esc_attr( $gw_id ); ?>')">
          <label class="flex items-start justify-between cursor-pointer w-full">
            <div class="flex items-start gap-space-sm">
              <input <?php echo $is_checked; ?> class="mt-1 text-primary focus:ring-primary h-4 w-4" name="pay-method" type="radio" value="<?php echo esc_attr( $gw_id ); ?>" id="pay-gw-<?php echo esc_attr( $gw_id ); ?>"/>
              <div class="flex flex-col">
                <span class="font-body-md text-body-md font-semibold text-primary flex items-center gap-2">
                  <?php echo esc_html( $gateway->get_title() ); ?>
                  <?php if ( $gw_id === 'bacs' ) : ?>
                    <span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-[10px] uppercase font-bold">NEFT / IMPS / UPI</span>
                  <?php endif; ?>
                </span>
                <?php if ( $gateway->get_description() ) : ?>
                  <span class="font-body-sm text-xs text-on-surface-variant mt-1 leading-relaxed">
                    <?php echo wp_kses_post( $gateway->get_description() ); ?>
                  </span>
                <?php endif; ?>
              </div>
            </div>
            <span class="material-symbols-outlined notranslate text-secondary text-[22px] shrink-0" translate="no"><?php echo esc_html( $icon_name ); ?></span>
          </label>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else : ?>
    <div class="p-4 rounded-lg bg-surface-container text-on-surface-variant font-body-sm text-sm">
      Direct Sanctuary Settlement will be confirmed via WooCommerce.
      <input type="hidden" name="pay-method" value="bacs" />
    </div>
  <?php endif; ?>
</div>
<!-- Trust & Policy Badges -->
<div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col gap-space-sm shadow-sm">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined notranslate text-primary text-[22px]" translate="no">shield</span>
<span class="font-headline-sm text-headline-sm text-primary text-[18px]">Clinical Appointment Guarantees</span>
</div>
<ul class="flex flex-col gap-2 font-body-sm text-body-sm text-on-surface-variant">
<li class="flex items-start gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-secondary mt-0.5" translate="no">check_circle</span>
<span><strong>Instant Dispatch:</strong> Telehealth meeting link &amp; clinical intake form delivered via WhatsApp and Email upon confirmation.</span>
</li>
<li class="flex items-start gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-secondary mt-0.5" translate="no">check_circle</span>
<span><strong>Slot Lock Protocol:</strong> This appointment is temporarily held for 15 minutes during checkout to avoid double booking.</span>
</li>
<li class="flex items-start gap-2">
<span class="material-symbols-outlined notranslate text-[16px] text-secondary mt-0.5" translate="no">check_circle</span>
<span><strong>Flexible Rescheduling:</strong> Free reschedule or 100% refund up to 24 hours prior to appointment time.</span>
</li>
</ul>
</div>
</div>
<!-- RIGHT: Order Summary Card (Sticky Rail - 5 cols) -->
<div class="lg:col-span-5 sticky top-24">
<div class="bg-surface-container-lowest p-space-lg md:p-space-xl rounded-xl shadow-md flex flex-col gap-space-lg">
<div class="flex items-center justify-between pb-space-sm">
<h3 class="font-headline-sm text-headline-sm text-primary">Booking Summary</h3>
<span class="px-2.5 py-1 rounded bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm uppercase tracking-wider font-bold">Confirmed Hold</span>
</div>
<!-- Line item details -->
<div class="flex flex-col gap-space-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase text-outline">Consultation Modality</span>
<span class="font-headline-sm text-headline-sm text-primary text-[20px]" id="checkout-title">Complete Medico-Astro Vastu Numerology Consultation</span>
<span class="font-body-sm text-body-sm text-on-surface-variant" id="checkout-duration">90 Minutes Master Assessment Protocol</span>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg flex flex-col gap-2 font-body-sm text-body-sm">
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Consultation Date:</span>
<span class="font-semibold text-primary" id="checkout-date">Tuesday, Nov 18, 2025</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Muhurta Time:</span>
<span class="font-semibold text-primary" id="checkout-time">11:00 AM – 12:30 PM IST</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Attending Specialist:</span>
<span class="font-semibold text-primary">Dr. Nishigandha Chaudhari</span>
</div>
<div class="flex items-center justify-between">
<span class="text-on-surface-variant">Consultation Format:</span>
<span class="font-semibold text-primary" id="checkout-format">Complete 4-Pillar Master Consultation</span>
</div>
</div>
<!-- Price Breakdown -->
<div class="flex flex-col gap-space-xs pt-space-xs font-body-sm text-body-sm">
<div class="flex items-center justify-between text-on-surface-variant">
<span>Clinical Consultation Base Fee</span>
<span id="checkout-base-fee">₹ 4,322.03</span>
</div>
<div class="flex items-center justify-between text-on-surface-variant">
<span>Statutory GST (18%)</span>
<span id="checkout-gst">₹ 777.97</span>
</div>
<div class="flex items-center justify-between font-label-sm text-label-sm text-secondary">
<span>Platform &amp; Health Records Fee</span>
<span>WAIVED (₹ 0)</span>
</div>
<div class="pt-space-md mt-space-xs flex items-center justify-between">
<span class="font-headline-sm text-headline-sm text-primary text-[20px]">Final Amount Payable</span>
<span class="font-headline-sm text-headline-sm text-primary text-[26px] font-bold" id="checkout-grand-total">₹ 5,100</span>
</div>
<span class="font-body-sm text-body-sm text-outline text-[11px] text-right">All Taxes &amp; GST Included in INR</span>
</div>
</div>

<!-- Informed Consent Certified Audit Plaque -->
<div class="p-3.5 rounded-lg bg-surface-container-high/90 border border-[#E8D8BC] flex items-start gap-3 text-xs text-on-surface-variant">
  <span class="material-symbols-outlined notranslate text-[22px] text-primary shrink-0 mt-0.5" translate="no">verified_user</span>
  <div>
    <p class="font-bold text-primary text-sm">Online Consultation Consent Form (v1.0) Certified</p>
    <p class="text-[11px] leading-relaxed mt-0.5">
      Digitally executed by <strong class="text-primary font-semibold" id="checkout-signed-name"><?php echo esc_html( $default_booking_name ?: 'Sanctuary Seeker' ); ?></strong> for ANUKUL Health and Vastu Harmony Clinic. Subject to clinical review &amp; clearance by <strong>Dr. Nishigandha Chaudhari</strong>.
    </p>
  </div>
</div>

<!-- Main Action CTA Button -->
<div class="flex flex-col gap-space-xs">
<button class="w-full py-4 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-widest font-bold hover:bg-tertiary transition-all duration-200 shadow-md flex items-center justify-center gap-space-sm group" id="pay-button" onclick="executePayment()" type="button">
<span id="pay-btn-label">PAY &amp; CONFIRM BOOKING — ₹ 5,100</span>
<span class="material-symbols-outlined notranslate text-[18px] group-hover:translate-x-1 transition-transform" translate="no">lock</span>
</button>
<div class="flex items-center justify-center gap-2 pt-1 font-label-sm text-label-sm text-outline uppercase tracking-wider">
<span class="material-symbols-outlined notranslate text-[14px] text-primary" translate="no">verified</span>
<span>Authorized by ANUKUL Clinical Board</span>
</div>
</div>
<div class="flex items-center justify-between pt-space-xs">
<button class="text-on-surface-variant hover:text-primary font-label-sm text-label-sm uppercase tracking-wider underline underline-offset-4" onclick="goToStep(3)" type="button">
                  Edit Personal Details
                </button>
<span class="font-body-sm text-body-sm text-secondary font-semibold">Step 4 of 4</span>
</div>
</div>
</div>
</div>
</section>
<!-- ================= CONFIRMATION SUCCESS VIEW (Triggered on Complete) ================= -->
<section class="step-view hidden flex-col items-center justify-center py-space-xl text-center max-w-3xl mx-auto" id="step-content-success">
<div class="w-20 h-20 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center mb-space-md shadow-md animate-bounce">
<span class="material-symbols-outlined notranslate text-[42px]" translate="no">check</span>
</div>
<span class="font-label-sm text-label-sm uppercase tracking-[0.2em] text-secondary font-bold">RESERVATION AUTHORIZED &amp; SECURED</span>
<h2 class="font-headline-lg text-headline-lg text-primary mt-1 mb-space-xs">Consultation Confirmed</h2>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-space-lg max-w-xl">
          Your sacred appointment has been scheduled and recorded in the clinic register. A confirmation dossier along with your encrypted meeting gateway link has been dispatched to <strong class="text-primary" id="success-email">ananya.deshmukh@wellness.in</strong>.
        </p>
<!-- Booking Pass Card -->
<div class="w-full bg-surface-container-lowest p-space-lg md:p-space-xl rounded-xl shadow-md text-left mb-space-lg">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pb-space-md">
<div>
<span class="font-label-sm text-label-sm uppercase text-outline">Booking Reference</span>
<div class="font-headline-sm text-headline-sm text-primary tracking-wider" id="success-reference">ANKL-2025-8841</div>
</div>
<div class="flex items-center gap-2">
<span class="px-3 py-1 rounded-full bg-surface-container text-primary font-label-sm text-label-sm uppercase tracking-wider font-semibold">Payment Received</span>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-space-md py-space-md font-body-sm text-body-sm">
<div>
<span class="font-label-sm text-label-sm uppercase text-outline">Consultation Type</span>
<p class="font-semibold text-primary" id="success-type">Complete Medico-Astro Vastu Numerology Consultation</p>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase text-outline">Date &amp; Muhurta Time</span>
<p class="font-semibold text-primary" id="success-slot">Tuesday, Nov 18, 2025 · 11:00 AM IST</p>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase text-outline">Patient</span>
<p class="font-semibold text-on-surface" id="success-name"><?php echo esc_html( $default_booking_name ?: 'Sanctuary Seeker' ); ?></p>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase text-outline">Channel</span>
<p class="font-semibold text-on-surface">Secure Video Call (Google Meet)</p>
</div>
</div>
<!-- Consent & Clinical Review Audit Ribbon -->
<div class="mt-4 p-3 rounded-lg bg-[#1F4D3A]/5 border border-[#1F4D3A]/20 flex flex-col sm:flex-row sm:items-center justify-between gap-2 text-xs">
  <div class="flex items-center gap-2 text-primary font-medium">
    <span class="material-symbols-outlined notranslate text-[18px] text-primary" translate="no">verified</span>
    <span>Online Consultation Consent Form (v1.0) Certified &amp; Recorded</span>
  </div>
  <span class="font-mono text-secondary text-[11px] font-bold">Pending Clinical Review &bull; Dr. Nishigandha Chaudhari</span>
</div>
<div class="bg-surface-container-low p-space-md rounded-lg flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-sm mt-space-sm">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined notranslate text-secondary text-[24px]" translate="no">calendar_add_on</span>
<div class="flex flex-col">
<span class="font-body-md text-body-md font-semibold text-primary">Add to Personal Calendar</span>
<span class="font-body-sm text-body-sm text-outline text-[12px]">Google Calendar · Apple Calendar · Outlook</span>
</div>
</div>
<div class="flex items-center gap-2">
  <a id="success-gcal-link" target="_blank" class="px-4 py-2 rounded bg-primary text-on-primary font-label-sm text-label-sm uppercase tracking-wider font-bold hover:bg-tertiary transition-colors inline-flex items-center gap-1.5 shadow-sm" href="#">
    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">event</span>
    Google Calendar
  </a>
  <a id="success-ics-link" class="px-4 py-2 rounded bg-surface-container text-primary font-label-sm text-label-sm uppercase tracking-wider font-bold hover:bg-surface-container-high transition-colors inline-flex items-center gap-1.5" href="#">
    <span class="material-symbols-outlined notranslate text-[16px]" translate="no">download</span>
    Download .ICS
  </a>
</div>
</div>
</div>
<div class="flex flex-wrap items-center justify-center gap-space-md">
<button class="px-6 py-3 rounded-lg bg-surface-container text-on-surface font-label-md text-label-md uppercase tracking-wider hover:bg-surface-container-high transition-colors" onclick="goToStep(1)" type="button">
            Book Another Consultation
          </button>
<a class="px-8 py-3 rounded-lg bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider hover:bg-tertiary transition-colors shadow-md" href="<?php echo esc_url( home_url( "/" ) ); ?>">
            Return to Sanctuary Home
          </a>
</div>
</section>
</div>
</main>

<script>
  // ANUKUL Booking Engine State Store
  const state = {
    step: 1,
    consultationId: 'complete',
    consultationTitle: 'Complete Medico-Astro Vastu Numerology Consultation',
    duration: '90 mins',
    format: 'Complete 4-Pillar Master Consultation',
    price: 5100,
    date: '',
    dateYmd: '',
    slot: '',
    name: <?php echo json_encode( $default_booking_name ); ?>,
    email: <?php echo json_encode( $default_booking_email ); ?>,
    phone: <?php echo json_encode( $default_booking_phone ); ?>
  };

  // Calendar State
  let currentCalDate = new Date();
  if (currentCalDate.getHours() >= 18) {
    currentCalDate.setDate(currentCalDate.getDate() + 1);
  }
  let calYear = currentCalDate.getFullYear();
  let calMonth = currentCalDate.getMonth();

  // Step Navigation
  function goToStep(stepNumber) {
    state.step = stepNumber;
    
    // Hide all step sections
    document.querySelectorAll('.step-view').forEach(view => {
      view.classList.add('hidden');
      view.classList.remove('flex');
    });

    // Show target section
    const targetSection = document.getElementById(`step-content-${stepNumber}`);
    if (targetSection) {
      targetSection.classList.remove('hidden');
      targetSection.classList.add('flex');
    }

    if (stepNumber === 4) {
      const nameInput = document.getElementById('full-name');
      const sigPreview = document.getElementById('checkout-signed-name');
      if (nameInput && sigPreview && nameInput.value.trim()) {
        sigPreview.textContent = nameInput.value.trim();
      }
    }

    // Update Progress Stepper UI
    updateStepperUI(stepNumber);
    window.scrollTo({ top: 120, behavior: 'smooth' });
  }

  function updateConsentSignature(name) {
    const sigElem = document.getElementById('consent-signature-preview');
    if (sigElem) sigElem.textContent = name.trim() || 'Your Legal Name';
    const checkSig = document.getElementById('checkout-signed-name');
    if (checkSig) checkSig.textContent = name.trim() || 'Sanctuary Seeker';
  }

  function updateStepperUI(currentStep) {
    for (let i = 1; i <= 4; i++) {
      const badge = document.getElementById(`badge-step-${i}`);
      const title = document.getElementById(`title-step-${i}`);
      const bar = document.getElementById(`bar-step-${i}`);

      if (!badge || !title || !bar) continue;

      if (i < currentStep) {
        badge.className = "w-8 h-8 rounded-full bg-primary text-on-primary font-headline-sm text-[16px] flex items-center justify-center font-bold";
        badge.innerHTML = `<span class="material-symbols-outlined notranslate text-[16px]" translate="no">check</span>`;
        title.className = "font-body-md text-body-md font-semibold text-primary";
        bar.className = "h-1 w-full bg-primary rounded-full transition-all duration-300";
      } else if (i === currentStep) {
        badge.className = "w-8 h-8 rounded-full bg-primary text-on-primary font-headline-sm text-[16px] flex items-center justify-center font-bold ring-4 ring-primary/20";
        badge.textContent = i;
        title.className = "font-body-md text-body-md font-bold text-primary";
        bar.className = "h-1 w-full bg-primary rounded-full transition-all duration-300";
      } else {
        badge.className = "w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant font-headline-sm text-[16px] flex items-center justify-center font-bold";
        badge.textContent = i;
        title.className = "font-body-md text-body-md font-normal text-on-surface-variant";
        bar.className = "h-1 w-full bg-surface-container-highest rounded-full transition-all duration-300";
      }
    }
  }

  // Step 1: Select Consultation Card
  function selectConsultation(type, price, title, duration, format) {
    state.consultationId = type;
    state.price = price;
    state.consultationTitle = title;
    state.duration = duration;
    state.format = format;

    // Reset card borders
    const cards = document.querySelectorAll('.consultation-card');
    cards.forEach(c => {
      c.classList.remove('active-card', 'ring-2', 'ring-primary');
      const btn = c.querySelector('.select-btn');
      if (btn) {
        btn.className = "select-btn px-4 py-1.5 rounded-lg bg-surface-container-high text-on-surface font-label-sm uppercase tracking-wider group-hover:bg-primary group-hover:text-on-primary transition-colors";
        btn.textContent = "Select";
      }
    });

    // Mark current selected card
    const targetCard = document.getElementById(`card-${type}`);
    if (targetCard) {
      targetCard.classList.add('active-card', 'ring-2', 'ring-primary');
      const activeBtn = targetCard.querySelector('.select-btn');
      if (activeBtn) {
        activeBtn.className = "select-btn px-4 py-1.5 rounded-lg bg-primary text-on-primary font-label-sm uppercase tracking-wider";
        activeBtn.textContent = "Selected";
      }
    }

    updateSummaryViews();
  }

  // Dynamic Calendar Engine
  function renderCalendar(year, month) {
    const monthNames = [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];
    const calTitle = document.getElementById('cal-month-title');
    if (calTitle) {
      calTitle.textContent = `${monthNames[month]} ${year}`;
    }

    const daysGrid = document.getElementById('calendar-days');
    if (!daysGrid) return;
    daysGrid.innerHTML = '';

    const firstDay = new Date(year, month, 1).getDay(); // 0 is Sun
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const prevMonthDays = new Date(year, month, 0).getDate();

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    // Trailing days from previous month
    for (let i = firstDay - 1; i >= 0; i--) {
      const span = document.createElement('span');
      span.className = "p-2.5 rounded text-outline-variant opacity-40 select-none";
      span.textContent = (prevMonthDays - i).toString();
      daysGrid.appendChild(span);
    }

    // Current month days
    for (let d = 1; d <= daysInMonth; d++) {
      const thisDate = new Date(year, month, d);
      thisDate.setHours(0, 0, 0, 0);

      const isPast = thisDate < today;
      const isToday = thisDate.getTime() === today.getTime();

      const ymd = `${year}-${String(month + 1).padStart(2, '0')}-${String(d).padStart(2, '0')}`;
      const dateFormatted = thisDate.toLocaleDateString('en-US', {
        weekday: 'short',
        year: 'numeric',
        month: 'short',
        day: 'numeric'
      });

      const isSelected = (state.dateYmd === ymd);

      if (isPast) {
        const span = document.createElement('span');
        span.className = "p-2.5 rounded text-on-surface-variant/30 select-none";
        span.textContent = d.toString();
        daysGrid.appendChild(span);
      } else {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.setAttribute('data-ymd', ymd);
        btn.setAttribute('data-formatted', dateFormatted);
        btn.className = isSelected 
          ? "cal-day p-2.5 rounded-lg bg-primary text-on-primary font-bold shadow-sm relative transition-colors"
          : "cal-day p-2.5 rounded-lg hover:bg-surface-container font-medium text-on-surface transition-colors relative";
        
        btn.innerHTML = `<span>${d}</span>` + (isToday ? `<span class="w-1.5 h-1.5 rounded-full bg-secondary-fixed absolute bottom-1 left-1/2 -translate-x-1/2"></span>` : '');
        
        btn.onclick = function() {
          selectDate(dateFormatted, ymd, this);
        };
        daysGrid.appendChild(btn);
      }
    }
  }

  function changeCalendarMonth(delta) {
    calMonth += delta;
    if (calMonth < 0) {
      calMonth = 11;
      calYear--;
    } else if (calMonth > 11) {
      calMonth = 0;
      calYear++;
    }
    renderCalendar(calYear, calMonth);
  }

  // Step 2: Select Date & Time (Invokes Live AJAX Slots Availability)
  function selectDate(dateString, ymd, element) {
    state.date = dateString;
    state.dateYmd = ymd;

    document.querySelectorAll('.cal-day').forEach(b => {
      b.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm', 'font-bold');
      b.classList.add('hover:bg-surface-container', 'text-on-surface', 'font-medium');
    });
    if (element) {
      element.classList.remove('hover:bg-surface-container', 'text-on-surface', 'font-medium');
      element.classList.add('bg-primary', 'text-on-primary', 'shadow-sm', 'font-bold');
    }

    const chosenDateElem = document.getElementById('current-chosen-date');
    if (chosenDateElem) chosenDateElem.textContent = dateString;

    fetchAvailableSlots(ymd);
    updateSummaryViews();
  }

  function fetchAvailableSlots(dateYmd) {
    const loading = document.getElementById('slots-loading');
    const container = document.getElementById('slots-container');
    const closedNotice = document.getElementById('clinic-closed-notice');
    const closedMsg = document.getElementById('clinic-closed-msg');
    const morningGrid = document.getElementById('morning-slots-grid');
    const afternoonGrid = document.getElementById('afternoon-slots-grid');
    const continueBtn = document.getElementById('step2-continue-btn');

    if (loading) loading.classList.remove('hidden');
    if (container) container.classList.add('hidden');
    if (closedNotice) closedNotice.classList.add('hidden');

    const formData = new FormData();
    formData.append('action', 'anukul_get_available_slots');
    formData.append('nonce', '<?php echo wp_create_nonce( "anukul_booking_nonce" ); ?>');
    formData.append('date', dateYmd);

    fetch('<?php echo esc_url( admin_url( "admin-ajax.php" ) ); ?>', {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(res => {
      if (loading) loading.classList.add('hidden');

      if (!res.success || !res.data) {
        if (closedNotice) {
          closedNotice.classList.remove('hidden');
          if (closedMsg) closedMsg.textContent = 'Could not load schedule for this date. Please select an alternate date.';
        }
        if (continueBtn) continueBtn.disabled = true;
        return;
      }

      const data = res.data;
      if (!data.is_date_open) {
        if (closedNotice) {
          closedNotice.classList.remove('hidden');
          if (closedMsg) closedMsg.textContent = 'The clinic sanctuary is closed on this date (Scheduled off or Vedic holiday). Please choose another date on the calendar.';
        }
        if (continueBtn) continueBtn.disabled = true;
        state.slot = '';
        updateSummaryViews();
        return;
      }

      if (container) container.classList.remove('hidden');
      if (morningGrid) morningGrid.innerHTML = '';
      if (afternoonGrid) afternoonGrid.innerHTML = '';

      let firstAvailableSlot = null;
      let hasAvailableSlots = false;

      data.slots.forEach(s => {
        const grid = (s.period === 'morning') ? morningGrid : afternoonGrid;
        if (!grid) return;

        if (s.is_available) {
          hasAvailableSlots = true;
          if (!firstAvailableSlot) firstAvailableSlot = s.time;

          const isCurrentlySelected = (state.slot === s.time);
          const btn = document.createElement('button');
          btn.type = 'button';
          btn.className = isCurrentlySelected
            ? "time-slot-btn selected-slot px-4 py-3 rounded-lg bg-primary text-on-primary font-body-sm text-body-sm font-semibold shadow-sm transition-all text-left flex items-center justify-between"
            : "time-slot-btn px-4 py-3 rounded-lg bg-surface-container text-on-surface font-body-sm text-body-sm font-medium hover:bg-surface-container-high transition-all text-left flex items-center justify-between";
          btn.setAttribute('data-slot-time', s.time);
          btn.onclick = function() {
            selectTimeSlot(s.time, this);
          };
          btn.innerHTML = `
            <div class="flex flex-col">
              <span class="font-semibold">${s.time.split('–')[0].trim()} IST</span>
              ${s.label ? `<span class="text-[11px] opacity-80">${s.label}</span>` : ''}
            </div>
            <span class="material-symbols-outlined notranslate text-[16px] ${isCurrentlySelected ? 'text-on-primary' : 'text-primary'}" translate="no">${isCurrentlySelected ? 'check_circle' : 'circle'}</span>
          `;
          grid.appendChild(btn);
        } else {
          const div = document.createElement('div');
          div.className = "px-4 py-3 rounded-lg bg-surface-container-highest text-on-surface-variant/50 font-body-sm text-body-sm flex items-center justify-between cursor-not-allowed";
          div.innerHTML = `
            <div class="flex flex-col">
              <span class="line-through">${s.time.split('–')[0].trim()} IST</span>
              ${s.label ? `<span class="text-[11px] opacity-60">${s.label}</span>` : ''}
            </div>
            <span class="font-label-sm text-label-sm uppercase tracking-widest text-outline text-[9px]">${s.reason || 'Booked'}</span>
          `;
          grid.appendChild(div);
        }
      });

      if (!hasAvailableSlots) {
        if (closedNotice) {
          closedNotice.classList.remove('hidden');
          if (closedMsg) closedMsg.textContent = 'All consultation slots are fully reserved for this date. Please pick an alternative date.';
        }
        if (continueBtn) continueBtn.disabled = true;
        state.slot = '';
      } else {
        if (continueBtn) continueBtn.disabled = false;
        // Check if previously selected slot is still available on new date
        const stillValid = data.slots.some(s => s.is_available && s.time === state.slot);
        if (!stillValid && firstAvailableSlot) {
          const firstBtn = document.querySelector(`.time-slot-btn[data-slot-time="${firstAvailableSlot}"]`);
          selectTimeSlot(firstAvailableSlot, firstBtn);
        }
      }
      updateSummaryViews();
    })
    .catch(err => {
      console.error('Slot loading error:', err);
      if (loading) loading.classList.add('hidden');
      if (closedNotice) {
        closedNotice.classList.remove('hidden');
        if (closedMsg) closedMsg.textContent = 'Unable to check slot availability. Please refresh and try again.';
      }
    });
  }

  function selectTimeSlot(slotString, element) {
    state.slot = slotString;
    document.querySelectorAll('.time-slot-btn').forEach(btn => {
      btn.classList.remove('bg-primary', 'text-on-primary', 'selected-slot', 'shadow-sm', 'font-semibold');
      btn.classList.add('bg-surface-container', 'text-on-surface', 'font-medium');
      const icon = btn.querySelector('.material-symbols-outlined');
      if (icon) {
        icon.textContent = 'circle';
        icon.className = 'material-symbols-outlined notranslate text-[16px] text-primary';
      }
    });

    if (element) {
      element.classList.remove('bg-surface-container', 'text-on-surface', 'font-medium');
      element.classList.add('bg-primary', 'text-on-primary', 'selected-slot', 'shadow-sm', 'font-semibold');
      const activeIcon = element.querySelector('.material-symbols-outlined');
      if (activeIcon) {
        activeIcon.textContent = 'check_circle';
        activeIcon.className = 'material-symbols-outlined notranslate text-[16px] text-on-primary';
      }
    }

    const continueBtn = document.getElementById('step2-continue-btn');
    if (continueBtn) continueBtn.disabled = !state.slot;

    updateSummaryViews();
  }

  // Payment Tabs Toggle
  function togglePayTab(tabName) {
    ['upi', 'netbanking', 'card'].forEach(t => {
      const panel = document.getElementById(`tab-content-${t}`);
      if (panel) {
        if (t === tabName) {
          panel.classList.remove('hidden');
        } else {
          panel.classList.add('hidden');
        }
      }
    });
  }

  // Update Summary Views
  function updateSummaryViews() {
    const banner = document.getElementById('active-consultation-banner');
    if (banner) banner.textContent = `${state.consultationTitle} (${state.duration})`;

    const sideType = document.getElementById('summary-sidebar-type');
    const sideSlot = document.getElementById('summary-sidebar-slot');
    const sideDur = document.getElementById('summary-sidebar-duration');
    const sideTotal = document.getElementById('summary-sidebar-total');
    if (sideType) sideType.textContent = state.consultationTitle;
    if (sideSlot) sideSlot.textContent = `${state.date} · ${state.slot ? state.slot.split('–')[0].trim() : 'Select Slot'}`;
    if (sideDur) sideDur.textContent = `${state.duration} Assessment`;
    if (sideTotal) sideTotal.textContent = `₹ ${state.price.toLocaleString('en-IN')}`;

    const checkTitle = document.getElementById('checkout-title');
    const checkDur = document.getElementById('checkout-duration');
    const checkDate = document.getElementById('checkout-date');
    const checkTime = document.getElementById('checkout-time');
    const checkGrand = document.getElementById('checkout-grand-total');
    const payLabel = document.getElementById('pay-btn-label');

    if (checkTitle) checkTitle.textContent = state.consultationTitle;
    if (checkDur) checkDur.textContent = `${state.duration} Assessment Protocol`;
    if (checkDate) checkDate.textContent = state.date;
    if (checkTime) checkTime.textContent = state.slot || 'Muhurta Pending';
    if (checkGrand) checkGrand.textContent = `₹ ${state.price.toLocaleString('en-IN')}`;
    if (payLabel) payLabel.textContent = `PAY & CONFIRM BOOKING — ₹ ${state.price.toLocaleString('en-IN')}`;

    const gstRate = 0.18;
    const baseFee = Math.round((state.price / (1 + gstRate)) * 100) / 100;
    const gstVal = Math.round((state.price - baseFee) * 100) / 100;
    const baseElem = document.getElementById('checkout-base-fee');
    const gstElem = document.getElementById('checkout-gst');
    if (baseElem) baseElem.textContent = `₹ ${baseFee.toLocaleString('en-IN', {minimumFractionDigits: 2})}`;
    if (gstElem) gstElem.textContent = `₹ ${gstVal.toLocaleString('en-IN', {minimumFractionDigits: 2})}`;
  }

  function dismissAlert() {
    const banner = document.getElementById('alert-banner');
    if (banner) banner.classList.add('hidden');
  }

  // Select Payment Gateway Helper
  function selectPayGateway(gwId) {
    const radio = document.getElementById(`pay-gw-${gwId}`);
    if (radio) {
      radio.checked = true;
    }
  }

  // Execute Payment and Register Real Booking via AJAX
  function executePayment() {
    const payBtn = document.getElementById('pay-button');
    const label = document.getElementById('pay-btn-label');
    if (payBtn) {
      payBtn.disabled = true;
      if (label) label.textContent = "VERIFYING AUTHORIZATION & CONNECTING WOOCOMMERCE...";
    }

    const inputName = document.getElementById('full-name');
    const inputEmail = document.getElementById('email');
    const inputPhone = document.getElementById('phone');
    const inputAgeDob = document.getElementById('age-dob');
    const inputCityState = document.getElementById('city-state');
    const inputPropAddress = document.getElementById('property-address');
    const inputGuardianName = document.getElementById('guardian-name');
    const inputNotes = document.getElementById('intake-notes');

    const checkConsent1 = document.getElementById('consent-online');
    const checkConsent2 = document.getElementById('consent-declarations');
    const checkConsent3 = document.getElementById('consent-declaration-truth');

    if (!checkConsent1 || !checkConsent1.checked || !checkConsent2 || !checkConsent2.checked || !checkConsent3 || !checkConsent3.checked) {
      alert('Informed Consent Confirmation Required: Please review and select all 3 confirmation checkboxes in the Online Consultation Consent Form before proceeding.');
      if (payBtn) {
        payBtn.disabled = false;
        if (label) label.textContent = `PAY & CONFIRM BOOKING — ₹ ${state.price.toLocaleString('en-IN')}`;
      }
      goToStep(3);
      return;
    }

    const clientName = (inputName && inputName.value) ? inputName.value : state.name;
    const clientEmail = (inputEmail && inputEmail.value) ? inputEmail.value : state.email;
    const clientPhone = (inputPhone && inputPhone.value) ? inputPhone.value : state.phone;
    const clientAgeDob = (inputAgeDob && inputAgeDob.value) ? inputAgeDob.value : '';
    const clientCityState = (inputCityState && inputCityState.value) ? inputCityState.value : '';
    const clientPropAddress = (inputPropAddress && inputPropAddress.value) ? inputPropAddress.value : '';
    const clientGuardianName = (inputGuardianName && inputGuardianName.value) ? inputGuardianName.value : '';
    const clientNotes = inputNotes ? inputNotes.value : '';

    const selectedPayRadio = document.querySelector('input[name="pay-method"]:checked');
    const paymentMethod = selectedPayRadio ? selectedPayRadio.value : 'bacs';

    const formData = new FormData();
    formData.append('action', 'anukul_book_slot');
    formData.append('nonce', '<?php echo wp_create_nonce( "anukul_booking_nonce" ); ?>');
    formData.append('tier', state.consultationId);
    formData.append('date', state.date);
    formData.append('slot', state.slot);
    formData.append('name', clientName);
    formData.append('email', clientEmail);
    formData.append('phone', clientPhone);
    formData.append('age_dob', clientAgeDob);
    formData.append('city_state', clientCityState);
    formData.append('property_address', clientPropAddress);
    formData.append('guardian_name', clientGuardianName);
    formData.append('consent_agreed', 'yes');
    formData.append('notes', clientNotes);
    formData.append('payment_method', paymentMethod);

    fetch('<?php echo esc_url( admin_url( "admin-ajax.php" ) ); ?>', {
      method: 'POST',
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      if (data.success && data.data) {
        if (label) label.textContent = "MUHURTA SECURED · REDIRECTING...";
        
        // Populate Google Calendar & ICS links in Confirmation Screen
        if (data.data.gcal_url) {
          const gcalBtn = document.getElementById('success-gcal-link');
          if (gcalBtn) gcalBtn.href = data.data.gcal_url;
        }
        if (data.data.ics_url) {
          const icsBtn = document.getElementById('success-ics-link');
          if (icsBtn) icsBtn.href = data.data.ics_url;
        }

        // If redirect URL provided by WooCommerce checkout, redirect to complete gateway transaction
        if (data.data.redirect_url && !data.data.redirect_url.includes('booking-confirmation')) {
          window.location.href = data.data.redirect_url;
          return;
        }

        document.querySelectorAll('.step-view').forEach(view => {
          view.classList.add('hidden');
          view.classList.remove('flex');
        });

        const succ = document.getElementById('step-content-success');
        if (succ) {
          succ.classList.remove('hidden');
          succ.classList.add('flex');
        }

        const succEmail = document.getElementById('success-email');
        const succType = document.getElementById('success-type');
        const succSlot = document.getElementById('success-slot');
        const succName = document.getElementById('success-name');
        const succRef = document.getElementById('success-reference');

        if (succEmail) succEmail.textContent = clientEmail;
        if (succType) succType.textContent = state.consultationTitle;
        if (succSlot) succSlot.textContent = `${state.date} · ${state.slot}`;
        if (succName) succName.textContent = clientName;
        if (succRef && data.data && data.data.reference) succRef.textContent = data.data.reference;

        for (let i = 1; i <= 4; i++) {
          const badge = document.getElementById(`badge-step-${i}`);
          const bar = document.getElementById(`bar-step-${i}`);
          if (badge) {
            badge.className = "w-8 h-8 rounded-full bg-primary text-on-primary font-headline-sm text-[16px] flex items-center justify-center font-bold";
            badge.innerHTML = `<span class="material-symbols-outlined notranslate text-[16px]" translate="no">check</span>`;
          }
          if (bar) bar.className = "h-1 w-full bg-primary rounded-full";
        }

        window.scrollTo({ top: 120, behavior: 'smooth' });
      } else {
        if (payBtn) {
          payBtn.disabled = false;
          if (label) label.textContent = `PAY & CONFIRM BOOKING — ₹ ${state.price.toLocaleString('en-IN')}`;
        }
        const banner = document.getElementById('alert-banner');
        if (banner) {
          if (data.data && data.data.message) {
            const msgSpan = banner.querySelector('span');
            if (msgSpan) msgSpan.innerHTML = `<strong>Attention:</strong> ${data.data.message}`;
          }
          banner.classList.remove('hidden');
          window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        goToStep(2);
      }
    })
    .catch(err => {
      console.error(err);
      if (payBtn) {
        payBtn.disabled = false;
        if (label) label.textContent = `PAY & CONFIRM BOOKING — ₹ ${state.price.toLocaleString('en-IN')}`;
      }
    });
  }

  // Real-time Countdown timer (15 mins)
  let timeRemaining = 14 * 60 + 59;
  const timerElem = document.getElementById('countdown-timer');
  setInterval(() => {
    if (timeRemaining > 0) {
      timeRemaining--;
      const mins = Math.floor(timeRemaining / 60);
      const secs = timeRemaining % 60;
      if (timerElem) {
        timerElem.textContent = `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
      }
    }
  }, 1000);

  // Initialize view on load
  document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize Calendar
    renderCalendar(calYear, calMonth);

    // 2. Select first available calendar day
    const firstActiveDayBtn = document.querySelector('.cal-day');
    if (firstActiveDayBtn) {
      const ymd = firstActiveDayBtn.getAttribute('data-ymd');
      const fmt = firstActiveDayBtn.getAttribute('data-formatted');
      selectDate(fmt, ymd, firstActiveDayBtn);
    }

    // 3. Modality Selection from URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const type = urlParams.get('type');
    if (type === 'health' || type === 'ayurveda') {
      selectConsultation('health', 1000, 'Only Online Health Consultation', '45 mins', 'Video Call (Secure Tele-Health)');
    } else if (type === 'medico-vastu' || type === 'vastu') {
      selectConsultation('medico-vastu', 3100, 'Medico-Vastu Consultation', '60 mins', 'Floor Plan Audit & Video Analysis');
    } else if (type === 'astro-construction' || type === 'construction') {
      selectConsultation('astro-construction', 4100, 'Medico-Astro-Vastu Construction', '75 mins', 'Architectural & Planetary Blueprint Audit');
    } else if (type === 'complete' || type === 'integrated') {
      selectConsultation('complete', 5100, 'Complete Medico-Astro Vastu Numerology Consultation', '90 mins', 'Complete 4-Pillar Master Consultation');
    } else {
      updateSummaryViews();
    }
  });
</script>

<?php
get_footer();


<?php
/**
 * Template Name: Booking Confirmation Pass
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="flex flex-col w-full">
<!-- Interactive Reviewer State Controller Banner -->
<aside aria-label="Reviewer state switcher" class="w-full bg-surface-container-high py-3 px-6 lg:px-12 sticky top-20 z-40 shadow-sm">
<div class="max-w-[1440px] mx-auto flex flex-col md:flex-row items-start md:items-center justify-between gap-3">
<div class="flex items-center gap-2">
<span class="inline-block w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-on-surface-variant">Reviewer Switcher • Transaction State Matrix</span>
</div>
<div class="flex flex-wrap gap-1.5 sm:gap-2">
<button class="state-btn active-state px-3 py-1.5 rounded font-label-sm text-label-sm uppercase tracking-wider bg-primary text-on-primary transition-all shadow-sm" data-state-btn="state-confirmed" onclick="switchBookingState('state-confirmed')" type="button">
          A: Confirmed (Success)
        </button>
<button class="state-btn px-3 py-1.5 rounded font-label-sm text-label-sm uppercase tracking-wider bg-surface-container text-on-surface hover:bg-surface-variant transition-all" data-state-btn="state-pending" onclick="switchBookingState('state-pending')" type="button">
          B: Payment Pending
        </button>
<button class="state-btn px-3 py-1.5 rounded font-label-sm text-label-sm uppercase tracking-wider bg-surface-container text-on-surface hover:bg-surface-variant transition-all" data-state-btn="state-failed" onclick="switchBookingState('state-failed')" type="button">
          C: Declined / Retry
        </button>
<button class="state-btn px-3 py-1.5 rounded font-label-sm text-label-sm uppercase tracking-wider bg-surface-container text-on-surface hover:bg-surface-variant transition-all" data-state-btn="state-unavailable" onclick="switchBookingState('state-unavailable')" type="button">
          D: Slot Unavailable
        </button>
<button class="state-btn px-3 py-1.5 rounded font-label-sm text-label-sm uppercase tracking-wider bg-surface-container text-on-surface hover:bg-surface-variant transition-all" data-state-btn="state-loading" onclick="switchBookingState('state-loading')" type="button">
          E: Verifying (Loading)
        </button>
</div>
</div>
</aside>
<!-- Main View Container -->
<div class="w-full max-w-[1440px] mx-auto px-6 lg:px-12 py-10 lg:py-16">
<!-- ========================================================================= -->
<!-- STATE A: CONFIRMED (DEFAULT ACTIVE)                                       -->
<!-- ========================================================================= -->
<section class="state-view flex flex-col space-y-12" id="state-confirmed">
<!-- Confirmation Header Band -->
<div class="relative bg-surface-container-low rounded-xl p-8 lg:p-12 shadow-sm overflow-hidden">
<!-- Directional Crosshair & Sacred Geometry Motif (Subtle Top-Right Accent) -->
<div class="absolute -right-8 -top-8 w-64 h-64 opacity-[0.06] pointer-events-none text-primary">
<svg class="w-full h-full stroke-current" fill="none" stroke-width="1.2" viewbox="0 0 200 200">
<circle cx="100" cy="100" r="90"></circle>
<circle cx="100" cy="100" r="65"></circle>
<circle cx="100" cy="100" r="40"></circle>
<line x1="100" x2="100" y1="0" y2="200"></line>
<line x1="0" x2="200" y1="100" y2="100"></line>
<rect height="90" transform="rotate(45 100 100)" width="90" x="55" y="55"></rect>
</svg>
</div>
<div class="max-w-3xl space-y-4 relative z-10">
<div class="flex flex-wrap items-center gap-3">
<div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm uppercase tracking-widest">
<span class="material-symbols-outlined text-[14px]">check_circle</span>
<span>Consultation Appointment Confirmed • Server Verified</span>
</div>
<span class="font-label-sm text-label-sm tracking-wider uppercase text-secondary font-mono">Ishanya Axis • Sanctum Slot 04-A</span>
</div>
<h1 class="font-display text-display text-primary leading-tight">
            Your consultation is confirmed.
          </h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
            Thank you for choosing ANUKUL. Your appointment details are sealed and registered. A calendar invite, cardinal intake brief, and confidential preparation dossier have been dispatched to your verified email.
          </p>
<div class="pt-2 flex flex-wrap items-center gap-4">
<div class="inline-flex items-center gap-2 px-4 py-2 bg-surface-container rounded font-label-md text-label-md text-on-surface">
<span class="w-2.5 h-2.5 rounded-full bg-primary-container"></span>
<span class="font-semibold text-primary">Payment Confirmed &amp; Slot Reserved</span>
<span class="text-outline">•</span>
<span class="font-mono text-secondary">Reference #ANK-CNS-94812</span>
</div>
<div class="text-body-sm font-body-sm text-outline flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">verified_user</span>
<span>Encrypted Vedic Clinical Record</span>
</div>
</div>
</div>
</div>
<!-- Two-Column Asymmetrical Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
<!-- Left Column: Detailed Appointment & Practitioner Overview (7 Columns) -->
<div class="lg:col-span-7 space-y-8">
<!-- Card 1: Confirmed Appointment Details -->
<div class="bg-surface-container-lowest rounded-xl p-8 shadow-sm space-y-6">
<div class="flex items-center justify-between pb-4 border-b border-surface-variant">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-primary-container text-on-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">calendar_today</span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Session Profile</span>
<h2 class="font-headline-sm text-headline-sm text-primary">Confirmed Appointment Record</h2>
</div>
</div>
<span class="hidden sm:inline-block px-3 py-1 rounded bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm uppercase tracking-wider">
                Vedic Diagnostic
              </span>
</div>
<!-- Practitioner & Diagnostic Overview -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 bg-surface-container-low p-5 rounded-lg">
<div class="space-y-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block">Consultation Type</span>
<p class="font-body-md text-body-md font-semibold text-primary">
                  Integrated Health &amp; Space Consultation
                </p>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                  Ayurveda (Dosha Analysis) + Vastu Shastra Spatial Harmony
                </p>
</div>
<div class="space-y-1 sm:pl-4 sm:border-l sm:border-surface-variant">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block">Lead Consultant</span>
<p class="font-body-md text-body-md font-semibold text-primary">
                  Dr. Nishigandha Chaudhari
                </p>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                  Founder &amp; Director, Senior Ayur-Vastu Physician
                </p>
</div>
</div>
<!-- Date, Time, Duration & Modality -->
<div class="space-y-4">
<div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3 p-4 bg-surface-container rounded-lg">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary text-[22px] mt-0.5">schedule</span>
<div>
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block">Confirmed Timing</span>
<p class="font-body-md text-body-md font-medium text-on-surface">
                      Thursday, November 14, 2025 • 10:30 AM – 11:45 AM IST
                    </p>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                      Indian Standard Time (GMT+5:30) • Planetary Hora: Mercury / Budha
                    </p>
</div>
</div>
<div class="sm:text-right shrink-0">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block">Session Duration</span>
<span class="font-body-md text-body-md font-semibold text-primary">75 Minutes Full Diagnostic</span>
</div>
</div>
<div class="flex items-start gap-3 p-4 bg-surface-container rounded-lg">
<span class="material-symbols-outlined text-primary text-[22px] mt-0.5">videocam</span>
<div class="space-y-1">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block">Format &amp; Mode</span>
<p class="font-body-md text-body-md font-medium text-on-surface">
                    Private Video Sanctuary (Encrypted Tele-Consultation)
                  </p>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                    Your unique, end-to-end encrypted video meeting link will be dispatched to your email and SMS 30 minutes prior to session commencement.
                  </p>
</div>
</div>
</div>
<!-- Calendar Synchronisation Actions -->
<div class="pt-2 flex flex-wrap items-center gap-3">
<a class="inline-flex items-center gap-2 bg-primary text-on-primary hover:bg-tertiary transition-colors px-5 py-3 rounded font-label-md text-label-md tracking-wider uppercase" href="#add-to-calendar" onclick="alert('Adding appointment to Google Calendar...')">
<span class="material-symbols-outlined text-[18px]">event_available</span>
<span>Add to Google Calendar</span>
</a>
<a class="inline-flex items-center gap-2 bg-surface-container text-primary hover:bg-surface-variant transition-colors px-5 py-3 rounded font-label-md text-label-md tracking-wider uppercase" href="#download-ical" onclick="alert('Downloading iCal (.ics) invite...')">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Download iCal / Outlook</span>
</a>
</div>
</div>
<!-- Card 2: What Happens Next & How to Prepare -->
<div class="bg-surface-container-lowest rounded-xl p-8 shadow-sm space-y-6">
<div class="flex items-center gap-3 pb-3 border-b border-surface-variant">
<div class="w-10 h-10 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">self_improvement</span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Pre-Session Protocols</span>
<h2 class="font-headline-sm text-headline-sm text-primary">What Happens Next &amp; How to Prepare</h2>
</div>
</div>
<div class="space-y-5">
<!-- Step 1 -->
<div class="flex items-start gap-4">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary font-headline-sm text-headline-sm flex items-center justify-center italic shrink-0">
                  1
                </div>
<div class="space-y-1">
<h3 class="font-body-md text-body-md font-semibold text-primary">Preparation Dossier Formulation</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                    Note down your past 14 days of dietary rhythms, sleep-wake cycles, and major digestive cues. If seeking residential Vastu analysis, have your floor plan sketch and rough compass orientations (East / North openings) handy.
                  </p>
</div>
</div>
<!-- Step 2 -->
<div class="flex items-start gap-4">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary font-headline-sm text-headline-sm flex items-center justify-center italic shrink-0">
                  2
                </div>
<div class="space-y-1">
<h3 class="font-body-md text-body-md font-semibold text-primary">5-Minute Prakriti Intake Questionnaire</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                    A personalized constitutional questionnaire has been sent to your inbox. Please complete this at least 24 hours prior to our session to enable Dr. Chaudhari to calculate elemental ratios (Vata, Pitta, Kapha).
                  </p>
</div>
</div>
<!-- Step 3 -->
<div class="flex items-start gap-4">
<div class="w-8 h-8 rounded-full bg-primary-container text-on-primary font-headline-sm text-headline-sm flex items-center justify-center italic shrink-0">
                  3
                </div>
<div class="space-y-1">
<h3 class="font-body-md text-body-md font-semibold text-primary">Establish a Calm Sanctuary Space</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                    Join the consultation from an undisturbed, well-lit space facing East or North if possible. Keep fresh drinking water, a journal, and pen accessible for dietary guidelines and energetic recommendations.
                  </p>
</div>
</div>
</div>
</div>
<!-- Card 3: Rescheduling & Cancellation Policy -->
<div class="bg-surface-container-low rounded-xl p-6 shadow-sm space-y-4">
<div class="flex items-start gap-3">
<span class="material-symbols-outlined text-secondary text-[24px]">policy</span>
<div class="space-y-2">
<h3 class="font-headline-sm text-headline-sm text-primary">Rescheduling &amp; Cancellation Policy</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                  We recognize that unpredictable cycles emerge. Rescheduling is complimentary up to 24 hours prior to your scheduled consultation. Changes within 24 hours incur a 50% reservation retention to honor our consultant’s devoted study time.
                </p>
<div class="pt-2 flex items-center gap-4">
<a class="inline-flex items-center gap-1 font-label-md text-label-md uppercase tracking-wider text-primary hover:text-secondary font-semibold transition-colors" href="#manage-booking" onclick="alert('Redirecting to Secure Appointment Management Portal...')">
<span>Manage Booking / Request Reschedule</span>
<span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</a>
</div>
</div>
</div>
</div>
</div>
<!-- Right Column: Financial & Verification Breakdown (5 Columns) -->
<div class="lg:col-span-5 space-y-8">
<!-- Card 1: Verified Booking Record & Receipt Summary -->
<div class="bg-surface-container-lowest rounded-xl p-8 shadow-sm space-y-6">
<div class="flex items-center justify-between pb-4 border-b border-surface-variant">
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Official Ledger</span>
<h2 class="font-headline-sm text-headline-sm text-primary">Receipt &amp; Tax Invoice</h2>
</div>
<span class="px-2.5 py-1 rounded bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm uppercase tracking-wider font-semibold">
                Settled
              </span>
</div>
<!-- Booking & Payment Metadata -->
<div class="space-y-3 font-body-sm text-body-sm">
<div class="flex items-center justify-between py-2 border-b border-surface-container">
<span class="text-on-surface-variant">Booking Reference</span>
<span class="font-mono font-semibold text-primary">#ANK-CNS-94812</span>
</div>
<div class="flex items-center justify-between py-2 border-b border-surface-container">
<span class="text-on-surface-variant">Transaction ID</span>
<span class="font-mono text-on-surface">TXN_RAZOR_ANK_773192</span>
</div>
<div class="flex items-start justify-between py-2 border-b border-surface-container">
<span class="text-on-surface-variant">Billed Client</span>
<div class="text-right">
<span class="font-medium text-primary block">Ananya Sharma</span>
<span class="text-on-surface-variant block">ananya.sharma@example.com</span>
<span class="text-outline font-mono block">+91 98112 00482</span>
</div>
</div>
<div class="flex items-center justify-between py-2 border-b border-surface-container">
<span class="text-on-surface-variant">Payment Channel</span>
<span class="text-on-surface">Razorpay UPI (Verified)</span>
</div>
</div>
<!-- Price Breakdown Calculation -->
<div class="bg-surface-container-low p-4 rounded-lg space-y-2.5">
<div class="flex items-center justify-between font-body-sm text-body-sm">
<span class="text-on-surface-variant">Consultation Base Fee</span>
<span class="font-mono text-on-surface">₹ 4,500.00</span>
</div>
<div class="flex items-center justify-between font-body-sm text-body-sm">
<span class="text-on-surface-variant">GST / Integrated Services Tax (18%)</span>
<span class="font-mono text-on-surface">₹ 810.00</span>
</div>
<div class="pt-2 border-t border-surface-variant flex items-center justify-between font-body-md text-body-md font-semibold">
<span class="text-primary">Total Paid</span>
<span class="font-headline-sm text-headline-sm text-primary">₹ 5,310.00</span>
</div>
</div>
<!-- Invoice Actions -->
<div class="space-y-3 pt-2">
<button class="w-full flex items-center justify-center gap-2 bg-primary text-on-primary hover:bg-tertiary transition-colors py-3 px-4 rounded font-label-md text-label-md uppercase tracking-wider" onclick="window.print()" type="button">
<span class="material-symbols-outlined text-[18px]">download</span>
<span>Download Tax Invoice (PDF)</span>
</button>
<button class="w-full flex items-center justify-center gap-2 bg-surface-container text-primary hover:bg-surface-variant transition-colors py-3 px-4 rounded font-label-md text-label-md uppercase tracking-wider" onclick="window.print()" type="button">
<span class="material-symbols-outlined text-[18px]">print</span>
<span>Print Confirmation</span>
</button>
</div>
</div>
<!-- Card 2: Need Assistance or Urgent Inquiries? -->
<div class="bg-surface-container-lowest rounded-xl p-8 shadow-sm space-y-5">
<div class="flex items-center gap-3 pb-3 border-b border-surface-variant">
<div class="w-10 h-10 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">support_agent</span>
</div>
<div>
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Sanctuary Concierge</span>
<h3 class="font-headline-sm text-headline-sm text-primary">Need Assistance?</h3>
</div>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
              If your intake files fail to arrive or you require cardinal architectural clarification ahead of your slot, our administrative Vaidya desk is at your service.
            </p>
<div class="space-y-2 font-body-sm text-body-sm">
<div class="flex items-center gap-2 text-on-surface">
<span class="material-symbols-outlined text-[18px] text-primary">mail</span>
<span class="font-mono text-primary font-medium">sanctuary@anukul-harmony.org</span>
</div>
<div class="flex items-center gap-2 text-on-surface">
<span class="material-symbols-outlined text-[18px] text-primary">call</span>
<span class="font-mono text-primary font-medium">+91 98112 00482</span>
</div>
<div class="flex items-center gap-2 text-on-surface-variant pt-1">
<span class="material-symbols-outlined text-[18px] text-outline">schedule</span>
<span>Clinical Desk: Mon – Sat 09:00 – 17:30 IST</span>
</div>
</div>
</div>
<!-- Card 3: Complementary Sanctuary Dispatch (Visual Accent) -->
<div class="relative rounded-xl overflow-hidden shadow-sm bg-primary text-on-primary p-6 space-y-4">
<div class="space-y-1">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary-fixed block">Vedic Environmental Wisdom</span>
<h4 class="font-headline-sm text-headline-sm text-surface">Brahma Sthan Orientation</h4>
</div>
<p class="font-body-sm text-body-sm text-primary-fixed-dim leading-relaxed">
              Prior to your diagnostic, consider inspecting the exact center of your home (the Brahma Sthan). Keeping this spatial locus uncluttered fosters immediate coherence with the clinical recommendations to follow.
            </p>
<div class="pt-2 flex items-center justify-between text-secondary-fixed font-label-sm text-label-sm uppercase tracking-wider">
<span>Sanctuary Dispatch #12</span>
<span class="material-symbols-outlined text-[18px]">explore</span>
</div>
</div>
</div>
</div>
</section>
<!-- ========================================================================= -->
<!-- STATE B: PAYMENT PENDING / RECONCILIATION                                 -->
<!-- ========================================================================= -->
<section class="state-view hidden flex flex-col space-y-8" id="state-pending">
<div class="bg-surface-container-low rounded-xl p-8 lg:p-12 shadow-sm max-w-4xl mx-auto w-full">
<div class="flex items-start gap-4 pb-6 border-b border-surface-variant">
<div class="w-12 h-12 rounded-full bg-secondary-fixed text-on-secondary-fixed-variant flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[28px] animate-spin">sync</span>
</div>
<div class="space-y-2">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Gateway Reconciliation • Reserved Hold</span>
<h1 class="font-headline-lg text-headline-lg text-primary">Your payment is being verified.</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
              Your banking gateway transaction is currently undergoing inter-bank reconciliation. Your selected consultation slot is temporarily held for <strong>15 minutes</strong> while verification finishes. Please do not re-book or submit another payment to prevent duplicate charges.
            </p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 py-6">
<div class="p-4 bg-surface-container rounded-lg">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block">Hold Expiration</span>
<span class="font-headline-sm text-headline-sm text-secondary font-mono">13:42 mins</span>
</div>
<div class="p-4 bg-surface-container rounded-lg">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block">Pending Order ID</span>
<span class="font-body-md text-body-md font-mono text-primary font-semibold">ORD_ANK_992147</span>
</div>
<div class="p-4 bg-surface-container rounded-lg">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline block">Gateway Status</span>
<span class="font-body-md text-body-md text-on-surface font-medium flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-secondary animate-ping"></span>
              Awaiting NPCI settlement
            </span>
</div>
</div>
<div class="pt-4 flex flex-wrap gap-4">
<button class="inline-flex items-center gap-2 bg-primary text-on-primary hover:bg-tertiary transition-colors px-6 py-3 rounded font-label-md text-label-md uppercase tracking-wider" onclick="simulateVerificationRefresh()" type="button">
<span class="material-symbols-outlined text-[18px]">refresh</span>
<span>Refresh Verification Status</span>
</button>
<a class="inline-flex items-center gap-2 bg-surface-container text-primary hover:bg-surface-variant transition-colors px-6 py-3 rounded font-label-md text-label-md uppercase tracking-wider" href="mailto:sanctuary@anukul-harmony.org">
<span class="material-symbols-outlined text-[18px]">support</span>
<span>Contact Clinic Accounts</span>
</a>
</div>
</div>
</section>
<!-- ========================================================================= -->
<!-- STATE C: PAYMENT DECLINED / RETRY                                         -->
<!-- ========================================================================= -->
<section class="state-view hidden flex flex-col space-y-8" id="state-failed">
<div class="bg-surface-container-low rounded-xl p-8 lg:p-12 shadow-sm max-w-4xl mx-auto w-full">
<div class="flex items-start gap-4 pb-6 border-b border-surface-variant">
<div class="w-12 h-12 rounded-full bg-error-container text-error flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[28px]">error</span>
</div>
<div class="space-y-2">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-error block">Transaction Unsuccessful • No Debits Captured</span>
<h1 class="font-headline-lg text-headline-lg text-primary">We couldn't confirm your payment.</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
              Your transaction was interrupted or declined by your financial institution. No charges were captured and no duplicate consultation was booked. Your selected slot will remain locked for the next 8 minutes so you can re-attempt without losing your date.
            </p>
</div>
</div>
<div class="bg-error-container/30 border border-error/20 p-5 rounded-lg space-y-2 my-6">
<div class="flex items-center gap-2 text-error font-semibold font-body-md text-body-md">
<span class="material-symbols-outlined text-[20px]">warning</span>
<span>Issuer Response: 05 – Transaction Not Authorized by Issuing Bank</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Common reasons include daily card limits, OTP timeouts, or 2FA cancellation. You may use a different UPI App (Google Pay, PhonePe, Paytm) or NetBanking.
          </p>
</div>
<div class="pt-2 flex flex-wrap gap-4">
<button class="inline-flex items-center gap-2 bg-primary text-on-primary hover:bg-tertiary transition-colors px-6 py-3 rounded font-label-md text-label-md uppercase tracking-wider" onclick="alert('Launching Razorpay checkout modal with reserved slot token...')" type="button">
<span class="material-symbols-outlined text-[18px]">payment</span>
<span>Retry Payment for Reserved Slot</span>
</button>
<button class="inline-flex items-center gap-2 bg-surface-container text-primary hover:bg-surface-variant transition-colors px-6 py-3 rounded font-label-md text-label-md uppercase tracking-wider" onclick="alert('Opening alternate payment rails (Card / NetBanking / NEFT)...')" type="button">
<span class="material-symbols-outlined text-[18px]">account_balance</span>
<span>Select Another Payment Method</span>
</button>
</div>
</div>
</section>
<!-- ========================================================================= -->
<!-- STATE D: APPOINTMENT SLOT UNAVAILABLE                                     -->
<!-- ========================================================================= -->
<section class="state-view hidden flex flex-col space-y-8" id="state-unavailable">
<div class="bg-surface-container-low rounded-xl p-8 lg:p-12 shadow-sm max-w-4xl mx-auto w-full">
<div class="flex items-start gap-4 pb-6 border-b border-surface-variant">
<div class="w-12 h-12 rounded-full bg-secondary-fixed text-on-secondary-fixed flex items-center justify-center shrink-0">
<span class="material-symbols-outlined text-[28px]">event_busy</span>
</div>
<div class="space-y-2">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Slot Released • Automatic Refund Guard</span>
<h1 class="font-headline-lg text-headline-lg text-primary">Appointment slot no longer available.</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant leading-relaxed">
              The requested time slot was reserved by another client during checkout or has closed. Any pending transaction authorization will be automatically reversed to your original payment rail within 24–48 banking hours.
            </p>
</div>
</div>
<div class="p-6 bg-surface-container rounded-lg space-y-4 my-6">
<h2 class="font-headline-sm text-headline-sm text-primary">Recommended Alternate Consultation Windows</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
<div class="p-4 bg-surface-container-lowest rounded flex items-center justify-between">
<div>
<span class="font-body-md text-body-md font-semibold text-primary block">Friday, Nov 15, 2025</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">02:30 PM – 03:45 PM IST</span>
</div>
<button class="px-3 py-1.5 bg-primary text-on-primary rounded font-label-sm text-label-sm uppercase" onclick="alert('Reserving Friday Nov 15 slot...')" type="button">Select</button>
</div>
<div class="p-4 bg-surface-container-lowest rounded flex items-center justify-between">
<div>
<span class="font-body-md text-body-md font-semibold text-primary block">Monday, Nov 18, 2025</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">11:00 AM – 12:15 PM IST</span>
</div>
<button class="px-3 py-1.5 bg-primary text-on-primary rounded font-label-sm text-label-sm uppercase" onclick="alert('Reserving Monday Nov 18 slot...')" type="button">Select</button>
</div>
</div>
</div>
<div class="pt-2 flex flex-wrap gap-4">
<a class="inline-flex items-center gap-2 bg-primary text-on-primary hover:bg-tertiary transition-colors px-6 py-3 rounded font-label-md text-label-md uppercase tracking-wider" data-path="book-consultation" href="<?php echo esc_url( home_url( "/book-your-consultation/" ) ); ?>">
<span class="material-symbols-outlined text-[18px]">calendar_month</span>
<span>Choose Another Appointment Date</span>
</a>
<a class="inline-flex items-center gap-2 bg-surface-container text-primary hover:bg-surface-variant transition-colors px-6 py-3 rounded font-label-md text-label-md uppercase tracking-wider" data-path="services" href="<?php echo esc_url( home_url( "/services/" ) ); ?>">
<span class="material-symbols-outlined text-[18px]">person_search</span>
<span>View Consultant Availability</span>
</a>
</div>
</div>
</section>
<!-- ========================================================================= -->
<!-- STATE E: VERIFYING WITH SERVER (LOADING)                                 -->
<!-- ========================================================================= -->
<section class="state-view hidden flex flex-col items-center justify-center py-20" id="state-loading">
<div class="bg-surface-container-lowest rounded-xl p-12 max-w-lg w-full text-center space-y-6 shadow-sm">
<div class="relative w-20 h-20 mx-auto">
<!-- Animated Concentric Rings for Vedic Aura -->
<div class="absolute inset-0 rounded-full border-2 border-primary/20 animate-ping"></div>
<div class="w-full h-full rounded-full bg-primary-container text-on-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-[36px] animate-spin">hourglass_top</span>
</div>
</div>
<div class="space-y-2">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Cryptographic Handshake</span>
<h2 class="font-headline-md text-headline-md text-primary">Verifying Session with Server...</h2>
<p class="font-body-md text-body-md text-on-surface-variant">
            Confirming your digital reservation tokens and allocating your confidential tele-sanctuary stream.
          </p>
</div>
<div class="w-full bg-surface-container-high h-1.5 rounded-full overflow-hidden">
<div class="bg-primary h-full rounded-full animate-pulse w-3/4"></div>
</div>
<p class="font-label-sm text-label-sm text-outline uppercase tracking-wider">Securing connection to Ishanya Gateway • Reference #ANK-CNS-94812</p>
</div>
</section>
<!-- ========================================================================= -->
<!-- BOTTOM CLOSING BANNER (SHARED ACROSS FLOW)                                -->
<!-- ========================================================================= -->
<div class="mt-16 pt-12 border-t border-surface-variant">
<div class="bg-surface-container rounded-xl p-8 lg:p-12 flex flex-col md:flex-row items-center justify-between gap-6">
<div class="space-y-2 text-center md:text-left">
<span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Continuous Harmony</span>
<h2 class="font-headline-lg text-headline-lg text-primary">We look forward to connecting with you.</h2>
<p class="font-body-md text-body-md text-on-surface-variant max-w-xl">
            May your transition toward equilibrium be supported by pure elements and auspicious spatial alignments.
          </p>
</div>
<div class="flex flex-wrap items-center gap-4 shrink-0">
<a class="inline-flex items-center justify-center bg-primary text-on-primary hover:bg-tertiary transition-colors px-6 py-3.5 rounded font-label-md text-label-md tracking-wider uppercase" data-path="home" href="<?php echo esc_url( home_url( "/" ) ); ?>">
<span>Return to Home</span>
</a>
<a class="inline-flex items-center justify-center bg-surface-container-lowest text-primary hover:bg-surface-variant transition-colors px-6 py-3.5 rounded font-label-md text-label-md tracking-wider uppercase border border-surface-variant" data-path="ayurveda" href="<?php echo esc_url( home_url( "/ayurveda/" ) ); ?>">
<span>Explore Ayurveda &amp; Vastu</span>
</a>
</div>
</div>
</div>
</div>
<!-- Vanilla JS Interactive State Switcher -->
<script>
    function switchBookingState(stateId) {
      // Hide all states
      const views = document.querySelectorAll('.state-view');
      views.forEach(v => {
        v.classList.add('hidden');
      });

      // Show requested state
      const targetView = document.getElementById(stateId);
      if (targetView) {
        targetView.classList.remove('hidden');
      }

      // Update button styles
      const buttons = document.querySelectorAll('.state-btn');
      buttons.forEach(btn => {
        if (btn.getAttribute('data-state-btn') === stateId) {
          btn.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
          btn.classList.remove('bg-surface-container', 'text-on-surface');
        } else {
          btn.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
          btn.classList.add('bg-surface-container', 'text-on-surface');
        }
      });

      // Smooth scroll if scrolled far down
      if (window.scrollY > 150) {
        window.scrollTo({ top: 80, behavior: 'smooth' });
      }
    }

    function simulateVerificationRefresh() {
      switchBookingState('state-loading');
      setTimeout(() => {
        switchBookingState('state-confirmed');
      }, 1500);
    }
  </script>
</div>

<?php
get_footer();

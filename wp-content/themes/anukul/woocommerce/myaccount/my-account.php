<?php
/**
 * My Account page (ANUKUL Sanctuary Dashboard)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$current_user = wp_get_current_user();
$user_id      = $current_user->ID;
$display_name = ! empty( $current_user->display_name ) ? $current_user->display_name : ( ! empty( $current_user->user_nicename ) ? $current_user->user_nicename : 'Seeker' );
$first_name   = ! empty( $current_user->first_name ) ? $current_user->first_name : $display_name;
$last_name    = ! empty( $current_user->last_name ) ? $current_user->last_name : '';
$full_name    = trim( $first_name . ' ' . $last_name );
if ( empty( $full_name ) ) {
    $full_name = $display_name;
}
$user_email   = $current_user->user_email;
$avatar_url   = get_avatar_url( $user_id, array( 'size' => 128 ) );

// Fetch Real WooCommerce Orders
$customer_orders = function_exists( 'wc_get_orders' ) ? wc_get_orders( array(
    'customer' => $user_id,
    'limit'    => 20,
    'status'   => array_keys( wc_get_order_statuses() ),
) ) : array();

$order_count = count( $customer_orders );
$active_orders = 0;
foreach ( $customer_orders as $ord ) {
    if ( in_array( $ord->get_status(), array( 'processing', 'on-hold', 'pending' ) ) ) {
        $active_orders++;
    }
}

// Fetch All Real Consultation Bookings for this Client
$customer_bookings = get_posts( array(
    'post_type'      => 'anukul_booking',
    'post_status'    => array( 'publish' ),
    'posts_per_page' => -1,
    'meta_query'     => array(
        'relation' => 'OR',
        array(
            'key'     => '_anukul_customer_id',
            'value'   => $user_id,
            'compare' => '=',
        ),
        array(
            'key'     => '_anukul_client_email',
            'value'   => $user_email,
            'compare' => '=',
        ),
    ),
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

$booking_count  = count( $customer_bookings );
$has_booking    = ! empty( $customer_bookings );
$latest_booking = $has_booking ? $customer_bookings[0] : null;
$booking_post   = $latest_booking;

// Formatted Addresses
$billing_address = function_exists( 'wc_get_account_formatted_address' ) ? wc_get_account_formatted_address( 'billing' ) : '';
$shipping_address = function_exists( 'wc_get_account_formatted_address' ) ? wc_get_account_formatted_address( 'shipping' ) : '';
?>

<!-- Breadcrumb Bar -->
<section class="w-full bg-[#F7F1E3]/80 border-b border-[#E8D8BC] py-3.5">
  <div class="max-w-[1440px] mx-auto px-6 lg:px-12 flex items-center justify-between text-on-surface-variant font-body-sm text-sm">
    <nav aria-label="Breadcrumb" class="flex items-center gap-2 tracking-wider">
      <a class="hover:text-primary transition-colors" data-path="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <span class="opacity-40">/</span>
      <a class="hover:text-primary transition-colors" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' ) ); ?>">My Account</a>
      <span class="opacity-40">/</span>
      <span id="account-breadcrumb-current" class="text-primary font-semibold">Sanctuary Overview</span>
    </nav>
    <div class="hidden sm:flex items-center gap-2 font-label-sm text-xs uppercase tracking-[0.2em] text-secondary font-bold">
      <span class="inline-block w-2 h-2 rounded-full bg-secondary"></span>
      Ishanya Portal &bull; Client Sanctuary
    </div>
  </div>
</section>

<!-- Sanctuary Account Workspace Grid -->
<div class="relative w-full px-6 lg:px-12 py-8 max-w-[1440px] mx-auto">
  <div class="absolute top-0 right-0 w-96 h-96 bg-primary-fixed-dim/20 rounded-full blur-3xl pointer-events-none -mr-20 -mt-20"></div>

  <!-- Notices Output -->
  <?php if ( function_exists( 'woocommerce_output_all_notices' ) ) : ?>
    <div class="mb-6 anukul-wc-notices">
      <?php woocommerce_output_all_notices(); ?>
    </div>
  <?php endif; ?>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
    
    <!-- ========================================== -->
    <!-- UNIFIED LEFT SIDEBAR (Span 4)             -->
    <!-- ========================================== -->
    <aside class="lg:col-span-4 flex flex-col gap-6">
      <!-- Identity Sanctuary Profile Plaque -->
      <div class="bg-surface-container-low rounded-xl p-6 shadow-sm border border-[#E8D8BC]/60 relative overflow-hidden">
        <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-surface-container-high rounded-full opacity-60 pointer-events-none"></div>
        <div class="flex items-center gap-4">
          <div class="relative">
            <div class="w-16 h-16 rounded-full bg-cover bg-center overflow-hidden shadow-inner ring-2 ring-primary-container/20" style="background-image: url('<?php echo esc_url( $avatar_url ); ?>')"></div>
            <span class="absolute bottom-0 right-0 w-5 h-5 rounded-full bg-primary-container flex items-center justify-center text-on-primary text-[10px] shadow" title="Clinical Sanctuary Verified">
              <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">verified</span>
            </span>
          </div>
          <div class="min-w-0 flex-1">
            <div class="flex items-center gap-1.5 mb-1">
              <span class="font-label-sm text-xs uppercase tracking-wider text-secondary font-bold">Seeker Profile</span>
            </div>
            <h2 class="font-headline-sm text-2xl text-primary tracking-tight truncate"><?php echo esc_html( $full_name ); ?></h2>
            <p class="font-body-sm text-xs text-on-surface-variant truncate"><?php echo esc_html( $user_email ); ?></p>
          </div>
        </div>
        <div class="mt-5 pt-4 border-t border-[#E8D8BC]/50 flex items-center justify-between text-xs">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high text-secondary font-label-md tracking-wider uppercase font-semibold">
            <span class="material-symbols-outlined text-[14px]">spa</span>
            Prakriti Sanctuary Pass
          </span>
          <span class="font-label-sm text-outline font-semibold">ID: ANK-<?php echo esc_html( 1000 + $user_id ); ?></span>
        </div>
      </div>

      <!-- Master Multi-Tab In-Page Navigation Menu -->
      <nav class="bg-surface-container-low rounded-xl p-3 shadow-sm border border-[#E8D8BC]/60 flex flex-col gap-1.5" id="account-nav-tabs">
        
        <!-- Tab 1: Dashboard -->
        <button type="button" onclick="switchAccountTab('dashboard')" id="nav-tab-dashboard" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm transition-all w-full text-left bg-primary text-on-primary font-semibold shadow-md">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[20px]">dashboard</span>
            <span>Dashboard</span>
          </div>
          <span class="material-symbols-outlined text-[16px] text-primary-fixed tab-chevron">arrow_forward</span>
        </button>

        <!-- Tab 2: Consultations & Sessions -->
        <button type="button" onclick="switchAccountTab('bookings')" id="nav-tab-bookings" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[20px]">calendar_month</span>
            <span>Consultations</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-[11px] font-bold">
              <?php echo esc_html( $booking_count ); ?> booked
            </span>
            <span class="material-symbols-outlined text-[16px] text-outline-variant tab-chevron">chevron_right</span>
          </div>
        </button>

        <!-- Tab 3: Orders -->
        <button type="button" onclick="switchAccountTab('orders')" id="nav-tab-orders" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[20px]">inventory_2</span>
            <span>Orders</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-[11px] font-bold">
              <?php echo esc_html( $order_count ); ?> total
            </span>
            <span class="material-symbols-outlined text-[16px] text-outline-variant tab-chevron">chevron_right</span>
          </div>
        </button>

        <!-- Tab 3: Addresses -->
        <button type="button" onclick="switchAccountTab('addresses')" id="nav-tab-addresses" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[20px]">pin_drop</span>
            <span>Addresses</span>
          </div>
          <span class="material-symbols-outlined text-[16px] text-outline-variant tab-chevron">chevron_right</span>
        </button>

        <!-- Tab 4: Account Details -->
        <button type="button" onclick="switchAccountTab('account-details')" id="nav-tab-account-details" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[20px]">manage_accounts</span>
            <span>Account Details</span>
          </div>
          <span class="material-symbols-outlined text-[16px] text-outline-variant tab-chevron">chevron_right</span>
        </button>

        <!-- Tab 5: Downloads -->
        <button type="button" onclick="switchAccountTab('downloads')" id="nav-tab-downloads" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[20px]">file_download</span>
            <span>Downloads</span>
          </div>
          <span class="material-symbols-outlined text-[16px] text-outline-variant tab-chevron">chevron_right</span>
        </button>

        <div class="my-1.5 mx-2 h-px bg-surface-container-highest opacity-70"></div>

        <!-- Real WooCommerce Sign Out Link -->
        <a class="flex items-center justify-between px-4 py-2.5 rounded-lg text-error hover:bg-error-container/20 transition-all font-body-sm text-sm" href="<?php echo esc_url( wc_logout_url() ); ?>">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-[20px]">logout</span>
            <span>Sign Out</span>
          </div>
          <span class="material-symbols-outlined text-[16px] text-outline-variant">chevron_right</span>
        </a>
      </nav>

      <!-- Sanctuary Concierge Help Desk Card -->
      <div class="bg-surface-container rounded-xl p-5 shadow-sm border border-[#E8D8BC]/60 relative overflow-hidden">
        <div class="flex items-start gap-3.5">
          <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center shrink-0 text-secondary">
            <span class="material-symbols-outlined text-[22px]">support_agent</span>
          </div>
          <div class="flex-1">
            <h3 class="font-headline-sm text-xl text-primary mb-1">Dispensary Desk</h3>
            <p class="font-body-sm text-xs text-on-surface-variant leading-relaxed mb-3">
              Need assistance with your clinical orders, dosha constitution, or spatial blueprint audits?
            </p>
            <a class="inline-flex items-center gap-1.5 text-secondary hover:text-primary transition-colors font-label-md text-xs tracking-wider uppercase font-bold" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
              <span>Contact Sanctuary Concierge</span>
              <span class="material-symbols-outlined text-[14px]">north_east</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Sacred Geometry Watermark Vignette -->
      <div class="p-4 rounded-xl bg-surface-container-lowest border border-[#E8D8BC]/50 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center shrink-0">
          <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 100 100">
            <circle cx="50" cy="50" opacity="0.3" r="42"></circle>
            <polygon opacity="0.6" points="50,15 82,75 18,75"></polygon>
            <polygon opacity="0.6" points="50,85 18,25 82,25"></polygon>
            <circle cx="50" cy="50" fill="currentColor" fill-opacity="0.15" r="10"></circle>
            <circle cx="50" cy="50" fill="currentColor" r="3"></circle>
          </svg>
        </div>
        <div>
          <p class="font-label-sm text-[11px] tracking-wider uppercase text-outline font-bold">Vastu Harmony Index</p>
          <p class="font-body-sm text-xs text-on-surface font-semibold">Brahmasthan Alignment: 98.4% Balanced</p>
        </div>
      </div>
    </aside>

    <!-- ========================================== -->
    <!-- MAIN WORKSPACE TAB PANES (Span 8)          -->
    <!-- ========================================== -->
    <main class="lg:col-span-8 flex flex-col gap-6 min-h-[600px]">

      <!-- ====================================== -->
      <!-- 1. DASHBOARD TAB PANE                  -->
      <!-- ====================================== -->
      <div id="tab-pane-dashboard" class="space-y-8">
        <!-- Header Panel -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
          <div>
            <div class="flex items-center gap-2 mb-1.5">
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">SANCTUARY OVERVIEW &bull; PRAKRITI HARMONY</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Sanctuary Core</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">NAMASTE, <?php echo esc_html( strtoupper( $first_name ) ); ?></h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              Welcome to your personal clinical sanctuary. Your health ledger, spatial coordinates, and consecrated botanical orders are preserved in your profile.
            </p>
          </div>
          <div class="flex items-center gap-2 self-start md:self-auto shrink-0">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary/10 text-primary font-label-sm text-xs font-semibold">
              <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
              Active Sanctuary Session
            </span>
          </div>
        </div>

        <!-- 4 Summary KPI Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
          <div class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors">
            <div class="flex items-center justify-between mb-2">
              <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Prakriti Status</span>
              <span class="material-symbols-outlined text-primary text-[20px]">spa</span>
            </div>
            <p class="font-headline-sm text-2xl text-primary font-serif whitespace-nowrap">Pitta-Vata</p>
            <p class="font-body-sm text-xs text-on-surface-variant mt-1">Holistic Harmony Regimen</p>
          </div>

          <div onclick="switchAccountTab('orders')" class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors cursor-pointer">
            <div class="flex items-center justify-between mb-2">
              <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Dispensary Orders</span>
              <span class="material-symbols-outlined text-primary text-[20px]">inventory_2</span>
            </div>
            <p class="font-headline-sm text-2xl text-primary font-serif whitespace-nowrap"><?php echo esc_html( $order_count ); ?> Total <span class="text-xs font-sans text-secondary font-semibold">(<?php echo esc_html( $active_orders ); ?> Active)</span></p>
            <p class="font-body-sm text-xs text-secondary mt-1 flex items-center gap-1 font-medium">View dispatches <span class="material-symbols-outlined text-[14px]">arrow_forward</span></p>
          </div>

          <div onclick="switchAccountTab('bookings')" class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors cursor-pointer">
            <div class="flex items-center justify-between mb-2">
              <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Consultations</span>
              <span class="material-symbols-outlined text-primary text-[20px]">calendar_month</span>
            </div>
            <p class="font-headline-sm text-2xl text-primary font-serif whitespace-nowrap"><?php echo esc_html( $booking_count ); ?> Booked <span class="text-xs font-sans text-secondary font-semibold"><?php echo $has_booking ? '(Active)' : ''; ?></span></p>
            <p class="font-body-sm text-xs text-secondary mt-1 flex items-center gap-1 font-medium">View history <span class="material-symbols-outlined text-[14px]">arrow_forward</span></p>
          </div>

          <div onclick="switchAccountTab('downloads')" class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors cursor-pointer">
            <div class="flex items-center justify-between mb-2">
              <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Vedic Blueprints</span>
              <span class="material-symbols-outlined text-primary text-[20px]">file_download</span>
            </div>
            <p class="font-headline-sm text-2xl text-primary font-serif whitespace-nowrap">4 Documents</p>
            <p class="font-body-sm text-xs text-secondary mt-1 flex items-center gap-1 font-medium">Download PDFs <span class="material-symbols-outlined text-[14px]">arrow_forward</span></p>
          </div>
        </div>

        <!-- Dynamic Recent Order / Dispatch Banner -->
        <?php if ( ! empty( $customer_orders ) ) : 
          $latest_order = $customer_orders[0];
        ?>
          <div class="bg-primary-container text-on-primary p-6 sm:p-7 rounded-xl shadow-md relative overflow-hidden">
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
              <div class="space-y-2 max-w-xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-on-primary/10 text-primary-fixed font-label-sm text-xs uppercase tracking-wider font-semibold">
                  <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                  Order #<?php echo esc_html( $latest_order->get_order_number() ); ?> &bull; Status: <?php echo esc_html( wc_get_order_status_name( $latest_order->get_status() ) ); ?>
                </div>
                <h3 class="font-headline-sm text-2xl sm:text-3xl text-on-primary font-normal">
                  Total: <?php echo wp_kses_post( $latest_order->get_formatted_order_total() ); ?>
                </h3>
                <p class="font-body-sm text-sm text-inverse-on-surface leading-relaxed">
                  Placed on <?php echo esc_html( wc_format_datetime( $latest_order->get_date_created() ) ); ?> &bull; <?php echo esc_html( $latest_order->get_item_count() ); ?> items in this dispatch.
                </p>
              </div>
              <div class="flex flex-col sm:flex-row md:flex-col gap-3 shrink-0">
                <button onclick="switchAccountTab('orders')" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-surface text-primary hover:bg-[#F7F1E3] font-label-md text-xs uppercase tracking-wider font-bold transition-all shadow-sm">
                  Track Order Details
                </button>
              </div>
            </div>
            <div class="absolute -right-10 -bottom-10 w-44 h-44 rounded-full bg-white/5 pointer-events-none"></div>
          </div>
        <?php else : ?>
          <div class="bg-primary-container text-on-primary p-6 sm:p-7 rounded-xl shadow-md relative overflow-hidden">
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
              <div class="space-y-2 max-w-xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-on-primary/10 text-primary-fixed font-label-sm text-xs uppercase tracking-wider font-semibold">
                  <span class="w-2 h-2 rounded-full bg-secondary"></span>
                  Welcome to ANUKUL Sanctuary
                </div>
                <h3 class="font-headline-sm text-2xl sm:text-3xl text-on-primary font-normal">Authentic Herbal Formulations &amp; Consultations</h3>
                <p class="font-body-sm text-sm text-inverse-on-surface leading-relaxed">
                  Explore our classical dispensary formulations or schedule your one-on-one Vedic health assessment.
                </p>
              </div>
              <div class="flex flex-col sm:flex-row gap-3 shrink-0">
                <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-surface text-primary hover:bg-[#F7F1E3] font-label-md text-xs uppercase tracking-wider font-bold transition-all shadow-sm">
                  Visit Dispensary
                </a>
                <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg border border-on-primary/30 text-on-primary hover:bg-on-primary/10 font-label-md text-xs uppercase tracking-wider transition-all">
                  Book Consultation
                </a>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <!-- Split Grid: Quick Address & Next Consultation Session -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Default Address Card -->
          <div class="bg-surface-container-low p-6 rounded-xl border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                <h4 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                  <span class="material-symbols-outlined text-secondary text-[18px]">location_on</span>
                  Default Sanctuary Address
                </h4>
                <button onclick="switchAccountTab('addresses')" class="text-xs uppercase font-label-sm text-secondary hover:text-primary transition-colors font-bold">Edit</button>
              </div>
              <?php if ( ! empty( $billing_address ) ) : ?>
                <div class="font-body-sm text-sm text-on-surface-variant mt-1 leading-relaxed">
                  <?php echo wp_kses_post( $billing_address ); ?>
                </div>
              <?php else : ?>
                <p class="font-body-sm text-sm text-on-surface-variant mt-1 italic">
                  No default address recorded yet. Configure your billing and shipping address for consecrated dispatches.
                </p>
              <?php endif; ?>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E8D8BC]/30 flex items-center justify-between text-xs">
              <span class="text-on-surface-variant">Validated for Consecrated Deliveries</span>
              <span class="text-primary font-semibold flex items-center gap-1">Verified <span class="material-symbols-outlined text-[14px]">check_circle</span></span>
            </div>
          </div>

          <!-- Upcoming Consultation Card -->
          <div class="bg-surface-container-low p-6 rounded-xl border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                <h4 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                  <span class="material-symbols-outlined text-secondary text-[18px]">calendar_month</span>
                  Upcoming Consultation
                </h4>
                <span class="text-xs uppercase font-label-sm text-primary font-bold px-2 py-0.5 rounded bg-primary-fixed/40">
                  <?php echo $has_booking ? 'Confirmed' : 'Available'; ?>
                </span>
              </div>
              <?php if ( $has_booking && $booking_post ) : 
                $tier_title = get_post_meta( $booking_post->ID, '_anukul_tier_title', true );
                $slot_date  = get_post_meta( $booking_post->ID, '_anukul_slot_date', true );
                $slot_time  = get_post_meta( $booking_post->ID, '_anukul_slot_time', true );
                $booking_ref = get_post_meta( $booking_post->ID, '_anukul_reference', true );
              ?>
                <p class="font-headline-sm text-lg text-primary"><?php echo esc_html( $tier_title ); ?></p>
                <p class="font-body-sm text-sm text-on-surface-variant mt-1 leading-relaxed">
                  Attending: Dr. Nishigandha Chaudhari &bull; Ref: <?php echo esc_html( $booking_ref ); ?>
                </p>
                <div class="mt-3 p-3 rounded-lg bg-surface-container flex items-center gap-3">
                  <span class="material-symbols-outlined text-secondary text-[22px]">schedule</span>
                  <div>
                    <p class="font-label-md text-xs font-bold text-primary uppercase tracking-wider"><?php echo esc_html( $slot_date . ' &bull; ' . $slot_time ); ?></p>
                    <p class="font-body-sm text-[11px] text-on-surface-variant">Private Video Sanctuary link sent via email</p>
                  </div>
                </div>
              <?php else : ?>
                <p class="font-headline-sm text-lg text-primary">Reserve Your Muhurta Session</p>
                <p class="font-body-sm text-sm text-on-surface-variant mt-1 leading-relaxed">
                  Personalized pulse diagnosis, Astro-Vastu spatial analysis, and constitutional balance with Dr. Nishigandha Chaudhari.
                </p>
                <div class="mt-3 p-3 rounded-lg bg-surface-container flex items-center gap-3">
                  <span class="material-symbols-outlined text-secondary text-[22px]">schedule</span>
                  <div>
                    <p class="font-label-md text-xs font-bold text-primary uppercase tracking-wider">Morning &amp; Afternoon Slots Open</p>
                    <p class="font-body-sm text-[11px] text-on-surface-variant">Aligned with biological diurnal rhythms</p>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E8D8BC]/30 flex items-center justify-between">
              <?php if ( $has_booking ) : ?>
                <button type="button" onclick="switchAccountTab('bookings')" class="text-xs uppercase font-label-sm text-secondary hover:text-primary transition-colors font-bold flex items-center gap-1">
                  View Consultation History (<?php echo esc_html( $booking_count ); ?>) <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                </button>
              <?php endif; ?>
              <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="text-xs uppercase font-label-sm text-primary hover:text-secondary transition-colors font-bold flex items-center gap-1">
                Book Consultation Now <span class="material-symbols-outlined text-[14px]">add_circle</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ====================================== -->
      <!-- 2. CONSULTATIONS TAB PANE              -->
      <!-- ====================================== -->
      <div id="tab-pane-bookings" class="hidden space-y-6">
        <!-- Header Panel -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
          <div>
            <div class="flex items-center gap-2 mb-1.5">
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">CLINICAL REGISTRY &bull; MUHURTA APPOINTMENTS</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Consultation History</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">MY CONSULTATIONS &amp; SESSIONS</h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              Your personalized Ayurvedic clinical assessments, Vastu architectural audits, and Muhurta alignment sessions conducted with our panel of specialists.
            </p>
          </div>
          <div class="flex items-center gap-2">
            <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm">
              <span class="material-symbols-outlined text-[16px]">add_circle</span>
              Book New Consultation
            </a>
          </div>
        </div>

        <?php if ( ! empty( $customer_bookings ) ) : ?>
          <!-- Consultation Cards List -->
          <div class="space-y-4">
            <?php foreach ( $customer_bookings as $booking ) : 
              $b_id       = $booking->ID;
              $ref        = get_post_meta( $b_id, '_anukul_reference', true );
              $tier_title = get_post_meta( $b_id, '_anukul_tier_title', true );
              $price      = get_post_meta( $b_id, '_anukul_price', true );
              $duration   = get_post_meta( $b_id, '_anukul_duration', true );
              $slot_date  = get_post_meta( $b_id, '_anukul_slot_date', true );
              $slot_time  = get_post_meta( $b_id, '_anukul_slot_time', true );
              $pay_status = get_post_meta( $b_id, '_anukul_payment_status', true );
              $order_id   = get_post_meta( $b_id, '_anukul_order_id', true );
              $notes      = get_post_meta( $b_id, '_anukul_intake_notes', true );

              $linked_order = $order_id ? wc_get_order( $order_id ) : null;
              $is_confirmed = in_array( $pay_status, array( 'confirmed', 'completed' ) ) || ( $linked_order && in_array( $linked_order->get_status(), array( 'processing', 'completed' ) ) );
              $is_pending   = in_array( $pay_status, array( 'pending', 'pending_verification' ) ) || ( $linked_order && in_array( $linked_order->get_status(), array( 'pending', 'on-hold' ) ) );
            ?>
              <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-6 shadow-sm hover:border-primary/40 transition-colors">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-[#E8D8BC]/50">
                  <div>
                    <div class="flex items-center gap-2">
                      <span class="font-headline-sm text-xl text-primary font-serif font-bold"><?php echo esc_html( $tier_title ); ?></span>
                      <?php if ( $is_confirmed ) : ?>
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-primary/10 text-primary text-[11px] font-label-md uppercase tracking-wider font-bold">
                          <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                          Confirmed &bull; Scheduled
                        </span>
                      <?php elseif ( $is_pending ) : ?>
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed text-[11px] font-label-md uppercase tracking-wider font-bold">
                          <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                          Payment / Verification Pending
                        </span>
                      <?php else : ?>
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container-high text-outline text-[11px] font-label-md uppercase tracking-wider font-bold">
                          <?php echo esc_html( ucfirst( $pay_status ) ); ?>
                        </span>
                      <?php endif; ?>
                    </div>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-1">
                      Booking Ref: <strong class="text-secondary"><?php echo esc_html( $ref ); ?></strong> &bull; Attending: <strong>Dr. Nishigandha Chaudhari &amp; Master Panel</strong>
                    </p>
                  </div>
                  <div class="text-left sm:text-right">
                    <p class="font-headline-sm text-2xl text-primary font-bold">₹ <?php echo esc_html( number_format( (float) $price, 0 ) ); ?></p>
                    <p class="font-body-sm text-xs text-outline"><?php echo esc_html( $duration ); ?> Allocated Session</p>
                  </div>
                </div>

                <!-- Appointment details -->
                <div class="py-4 grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs bg-surface-container/40 p-3.5 rounded-lg my-3">
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary text-[18px]">calendar_today</span>
                    <div>
                      <span class="text-outline uppercase font-label-sm block text-[10px]">Date</span>
                      <span class="font-semibold text-primary"><?php echo esc_html( $slot_date ); ?></span>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary text-[18px]">schedule</span>
                    <div>
                      <span class="text-outline uppercase font-label-sm block text-[10px]">Muhurta Slot</span>
                      <span class="font-semibold text-primary"><?php echo esc_html( $slot_time ); ?> IST</span>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary text-[18px]">videocam</span>
                    <div>
                      <span class="text-outline uppercase font-label-sm block text-[10px]">Session Delivery</span>
                      <span class="font-semibold text-primary">Private Video &amp; Tele-Health</span>
                    </div>
                  </div>
                </div>

                <?php if ( ! empty( $notes ) ) : ?>
                  <div class="text-xs text-on-surface-variant bg-surface-container-lowest p-3 rounded-lg border border-[#E8D8BC]/40 mb-3">
                    <strong class="text-primary block mb-0.5">Clinical Intake Focus:</strong>
                    <?php echo esc_html( $notes ); ?>
                  </div>
                <?php endif; ?>

                <div class="pt-3 border-t border-[#E8D8BC]/50 flex flex-wrap items-center justify-between gap-3 text-xs">
                  <div class="flex items-center gap-2 text-on-surface-variant">
                    <span class="material-symbols-outlined text-secondary text-[16px]">verified</span>
                    <span>Status: <strong class="text-primary font-semibold"><?php echo $is_confirmed ? 'Slot Consecrated &amp; Confirmed' : 'Awaiting Settlement'; ?></strong></span>
                    <?php if ( $linked_order ) : ?>
                      <span class="text-outline-variant">&bull;</span>
                      <span>WooCommerce Order: <strong>#<?php echo esc_html( $linked_order->get_order_number() ); ?></strong></span>
                    <?php endif; ?>
                  </div>
                  <div class="flex items-center gap-2">
                    <?php if ( $linked_order ) : ?>
                      <a href="<?php echo esc_url( $linked_order->get_view_order_url() ); ?>" class="px-3.5 py-1.5 rounded-lg bg-surface-container text-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-surface-container-high transition-colors">
                        View Order
                      </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="px-3.5 py-1.5 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors">
                      Book Another
                    </a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else : ?>
          <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-12 text-center space-y-4">
            <span class="material-symbols-outlined text-secondary text-[48px]">calendar_month</span>
            <h3 class="font-headline-sm text-2xl text-primary">No Consultations Reserved Yet</h3>
            <p class="font-body-md text-sm text-on-surface-variant max-w-md mx-auto">
              Reserve your personalized Vedic health diagnosis, floor plan audit, or Muhurta alignment session directly through our consultation portal.
            </p>
            <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-[#1F4D3A] text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm">
              <span class="material-symbols-outlined text-[16px]">event_available</span>
              Book Your Consultation Now
            </a>
          </div>
        <?php endif; ?>
      </div>

      <!-- ====================================== -->
      <!-- 3. ORDERS TAB PANE                     -->
      <!-- ====================================== -->
      <div id="tab-pane-orders" class="hidden space-y-6">
        <!-- Header Panel -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
          <div>
            <div class="flex items-center gap-2 mb-1.5">
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">DISPENSARY APOTHECARY &bull; SACRED REMEDIES</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Order History</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">MY ORDERS &amp; DISPATCHES</h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              Consecrated botanical formulations, classical tailas, and sacred architectural geometry remedies dispatched under auspicious lunar muhurtas.
            </p>
          </div>
          <div class="flex items-center gap-2">
            <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm">
              <span class="material-symbols-outlined text-[16px]">local_mall</span>
              Explore Dispensary
            </a>
          </div>
        </div>

        <?php if ( ! empty( $customer_orders ) ) : ?>
          <!-- Order Cards List -->
          <div class="space-y-4">
            <?php foreach ( $customer_orders as $order ) : 
              $items = $order->get_items();
            ?>
              <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-6 shadow-sm hover:border-primary/40 transition-colors">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-[#E8D8BC]/50">
                  <div>
                    <div class="flex items-center gap-2">
                      <span class="font-headline-sm text-xl text-primary font-serif font-bold">#<?php echo esc_html( $order->get_order_number() ); ?></span>
                      <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed text-[11px] font-label-md uppercase tracking-wider font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                        <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
                      </span>
                    </div>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-1">
                      Placed on <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?> &bull; Payment: <?php echo esc_html( $order->get_payment_method_title() ); ?>
                    </p>
                  </div>
                  <div class="text-left sm:text-right">
                    <p class="font-headline-sm text-2xl text-primary font-bold"><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></p>
                    <p class="font-body-sm text-xs text-outline"><?php echo esc_html( $order->get_item_count() ); ?> items included</p>
                  </div>
                </div>

                <div class="py-4 space-y-3">
                  <?php foreach ( $items as $item ) : ?>
                    <div class="flex items-center gap-4 text-sm">
                      <span class="w-2 h-2 rounded-full bg-[#B38A3E]"></span>
                      <span class="font-semibold text-primary"><?php echo esc_html( $item->get_name() ); ?></span>
                      <span class="text-xs text-on-surface-variant">&times; <?php echo esc_html( $item->get_quantity() ); ?></span>
                      <span class="ml-auto font-medium text-primary"><?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?></span>
                    </div>
                  <?php endforeach; ?>
                </div>

                <div class="pt-4 border-t border-[#E8D8BC]/50 flex flex-wrap items-center justify-between gap-3 text-xs">
                  <div class="flex items-center gap-2 text-on-surface-variant">
                    <span class="material-symbols-outlined text-secondary text-[16px]">local_shipping</span>
                    <span>Status: <strong class="text-primary font-semibold"><?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></strong></span>
                  </div>
                  <div class="flex items-center gap-3">
                    <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md uppercase tracking-wider font-semibold hover:bg-secondary transition-colors">
                      View Order Details
                    </a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else : ?>
          <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-12 text-center space-y-4">
            <span class="material-symbols-outlined text-secondary text-[48px]">inventory_2</span>
            <h3 class="font-headline-sm text-2xl text-primary">No Dispensary Orders Yet</h3>
            <p class="font-body-md text-sm text-on-surface-variant max-w-md mx-auto">
              Your therapeutic rasayanas, consecrated copper yantras, and customized oils will be chronicled here once ordered.
            </p>
            <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm">
              Explore Apothecary
            </a>
          </div>
        <?php endif; ?>
      </div>

      <!-- ====================================== -->
      <!-- 3. ADDRESSES TAB PANE                  -->
      <!-- ====================================== -->
      <div id="tab-pane-addresses" class="hidden space-y-6">
        <!-- Header Panel -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
          <div>
            <div class="flex items-center gap-2 mb-1.5">
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">PREMISES &amp; COORDINATES</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Sanctuary Delivery Points</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">SAVED ADDRESSES</h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              The following addresses will be calibrated for consecrated dispensary deliveries, herbal formulations, and architectural audit reports.
            </p>
          </div>
        </div>

        <!-- Two Address Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Billing Address Card -->
          <div class="bg-surface-container-low rounded-xl p-6 border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                <h3 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                  <span class="material-symbols-outlined text-secondary text-[18px]">receipt_long</span>
                  Billing Coordinates
                </h3>
              </div>
              <?php if ( ! empty( $billing_address ) ) : ?>
                <div class="font-body-sm text-sm text-on-surface-variant mt-2 leading-relaxed">
                  <?php echo wp_kses_post( $billing_address ); ?>
                </div>
              <?php else : ?>
                <p class="font-body-sm text-sm text-on-surface-variant mt-2 italic">
                  You have not set up a billing address yet.
                </p>
              <?php endif; ?>
            </div>
            <div class="pt-5 mt-4 border-t border-[#E8D8BC]/30 flex items-center justify-between">
              <a href="<?php echo esc_url( function_exists( 'wc_get_endpoint_url' ) ? wc_get_endpoint_url( 'edit-address', 'billing' ) : '#' ); ?>" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[16px]">edit</span> Edit Billing Address
              </a>
            </div>
          </div>

          <!-- Shipping Address Card -->
          <div class="bg-surface-container-low rounded-xl p-6 border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                <h3 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                  <span class="material-symbols-outlined text-secondary text-[18px]">local_shipping</span>
                  Sanctuary Delivery Address
                </h3>
              </div>
              <?php if ( ! empty( $shipping_address ) ) : ?>
                <div class="font-body-sm text-sm text-on-surface-variant mt-2 leading-relaxed">
                  <?php echo wp_kses_post( $shipping_address ); ?>
                </div>
              <?php else : ?>
                <p class="font-body-sm text-sm text-on-surface-variant mt-2 italic">
                  You have not set up a delivery address yet.
                </p>
              <?php endif; ?>
            </div>
            <div class="pt-5 mt-4 border-t border-[#E8D8BC]/30 flex items-center justify-between">
              <a href="<?php echo esc_url( function_exists( 'wc_get_endpoint_url' ) ? wc_get_endpoint_url( 'edit-address', 'shipping' ) : '#' ); ?>" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[16px]">edit</span> Edit Delivery Address
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- ====================================== -->
      <!-- 4. ACCOUNT DETAILS TAB PANE            -->
      <!-- ====================================== -->
      <div id="tab-pane-account-details" class="hidden space-y-6">
        <!-- Header Panel -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
          <div>
            <div class="flex items-center gap-2 mb-1.5">
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">SANCTUARY CREDENTIALS &amp; IDENTITY</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Sanctuary Core</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">ACCOUNT DETAILS</h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              Keep your personal information up to date so you can manage your ANUKUL account, Ayurvedic dispensary prescriptions, and spatial consultations with seamless clarity.
            </p>
          </div>
          <div class="flex items-center gap-2 self-start md:self-auto shrink-0">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-primary-fixed/30 text-primary font-label-sm text-xs font-semibold">
              <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
              Secure Session
            </span>
          </div>
        </div>

        <!-- Form Card Container -->
        <div class="bg-surface-container-low rounded-xl p-8 sm:p-10 shadow-sm border border-[#E8D8BC]/60 relative overflow-hidden">
          <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-secondary/20 via-primary to-secondary/20"></div>

          <form class="woocommerce-EditAccountForm edit-account space-y-8" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
            <?php do_action( 'woocommerce_edit_account_form_start' ); ?>

            <!-- SECTION 1: Personal Information -->
            <section class="space-y-5">
              <div class="flex items-center gap-3 pb-2 border-b border-[#E8D8BC]/40">
                <span class="w-7 h-7 rounded-full bg-primary/10 text-primary font-headline-sm text-base flex items-center justify-center italic">I</span>
                <h2 class="font-headline-md text-xl text-primary tracking-tight">PERSONAL IDENTITY</h2>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                  <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="account_first_name">First Name *</label>
                  <input type="text" id="account_first_name" name="account_first_name" value="<?php echo esc_attr( $first_name ); ?>" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                </div>
                <div>
                  <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="account_last_name">Last Name *</label>
                  <input type="text" id="account_last_name" name="account_last_name" value="<?php echo esc_attr( $last_name ); ?>" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                  <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="account_display_name">Display Name *</label>
                  <input type="text" id="account_display_name" name="account_display_name" value="<?php echo esc_attr( $display_name ); ?>" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                  <span class="text-[11px] text-outline mt-1 block">This is how your name will appear in consultation notes &amp; orders.</span>
                </div>
                <div>
                  <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="account_email">Email Address *</label>
                  <input type="email" id="account_email" name="account_email" value="<?php echo esc_attr( $user_email ); ?>" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                </div>
              </div>
            </section>

            <!-- SECTION 2: Password / Security -->
            <section class="space-y-5 pt-4">
              <div class="flex items-center gap-3 pb-2 border-b border-[#E8D8BC]/40">
                <span class="w-7 h-7 rounded-full bg-primary/10 text-primary font-headline-sm text-base flex items-center justify-center italic">II</span>
                <h2 class="font-headline-md text-xl text-primary tracking-tight">SECURITY &amp; PASSPHRASE</h2>
              </div>

              <div>
                <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="password_current">Current Password (leave blank to leave unchanged)</label>
                <input type="password" id="password_current" name="password_current" placeholder="••••••••••••" class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                  <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="password_1">New Password (leave blank to leave unchanged)</label>
                  <input type="password" id="password_1" name="password_1" placeholder="Minimum 8 characters" class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                </div>
                <div>
                  <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="password_2">Confirm New Password</label>
                  <input type="password" id="password_2" name="password_2" placeholder="Re-enter new password" class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                </div>
              </div>
            </section>

            <?php do_action( 'woocommerce_edit_account_form' ); ?>

            <!-- Save Action Button -->
            <div class="pt-4 flex items-center gap-4">
              <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
              <button type="submit" class="woocommerce-Button button px-8 py-3 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-bold hover:bg-secondary transition-colors shadow-sm" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">
                Save Changes
              </button>
              <input type="hidden" name="action" value="save_account_details" />
            </div>

            <?php do_action( 'woocommerce_edit_account_form_end' ); ?>
          </form>
        </div>
      </div>

      <!-- ====================================== -->
      <!-- 5. DOWNLOADS TAB PANE                  -->
      <!-- ====================================== -->
      <div id="tab-pane-downloads" class="hidden space-y-6">
        <!-- Header Panel -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
          <div>
            <div class="flex items-center gap-2 mb-1.5">
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">SACRED BLUEPRINTS &amp; CLINICAL FILES</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Sanctuary Vault</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">SANCTUARY DOWNLOADS</h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              Certified Vastu spatial audit blueprints, personalized Ayurvedic dinacharya regimens, and consultation files available for permanent reference.
            </p>
          </div>
        </div>

        <!-- Downloads List -->
        <div class="space-y-4">
          <div class="bg-surface-container-low rounded-xl p-5 border border-[#E8D8BC]/60 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-primary/40 transition-colors">
            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                <span class="material-symbols-outlined text-[26px]">architecture</span>
              </div>
              <div>
                <h3 class="font-headline-sm text-lg text-primary font-bold">Ishanya &amp; Brahmasthan Spatial Alignment Blueprint</h3>
                <p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Vastu Spatial Audit &bull; Consecrated by Dr. Nishigandha Chaudhari &bull; High-Res Vector PDF</p>
              </div>
            </div>
            <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
              <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="px-4 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-1.5">
                <span class="material-symbols-outlined text-[16px]">support_agent</span> Request Dossier
              </a>
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- Tab Navigation Switching Script -->
<script>
  function switchAccountTab(tabKey, scroll = true) {
    const tabs = ['dashboard', 'bookings', 'orders', 'addresses', 'account-details', 'downloads'];
    
    tabs.forEach(t => {
      const pane = document.getElementById(`tab-pane-${t}`);
      const btn = document.getElementById(`nav-tab-${t}`);
      
      if (pane) {
        if (t === tabKey) {
          pane.classList.remove('hidden');
        } else {
          pane.classList.add('hidden');
        }
      }

      if (btn) {
        if (t === tabKey) {
          btn.classList.add('bg-primary', 'text-on-primary', 'font-semibold', 'shadow-md');
          btn.classList.remove('text-on-surface-variant', 'hover:bg-surface-container', 'hover:text-on-surface');
          const chevron = btn.querySelector('.tab-chevron');
          if (chevron) {
            chevron.textContent = 'arrow_forward';
            chevron.classList.add('text-primary-fixed');
            chevron.classList.remove('text-outline-variant');
          }
        } else {
          btn.classList.remove('bg-primary', 'text-on-primary', 'font-semibold', 'shadow-md');
          btn.classList.add('text-on-surface-variant', 'hover:bg-surface-container', 'hover:text-on-surface');
          const chevron = btn.querySelector('.tab-chevron');
          if (chevron) {
            chevron.textContent = 'chevron_right';
            chevron.classList.remove('text-primary-fixed');
            chevron.classList.add('text-outline-variant');
          }
        }
      }
    });

    const crumbElem = document.getElementById('account-breadcrumb-current');
    if (crumbElem) {
      const names = {
        'dashboard': 'Sanctuary Overview',
        'bookings': 'Consultations & Sessions',
        'orders': 'Orders & Dispatches',
        'addresses': 'Premises Coordinates',
        'account-details': 'Account Credentials',
        'downloads': 'Sacred Vault Files'
      };
      crumbElem.textContent = names[tabKey] || 'Account';
    }

    if (scroll) {
      window.scrollTo({ top: 80, behavior: 'smooth' });
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    const hash = window.location.hash.replace('#', '');
    const validTabs = ['dashboard', 'bookings', 'orders', 'addresses', 'account-details', 'downloads'];
    if (hash && validTabs.includes(hash)) {
      switchAccountTab(hash, false);
    }
  });
</script>

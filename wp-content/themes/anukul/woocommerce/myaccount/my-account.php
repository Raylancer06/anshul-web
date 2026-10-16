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

// Fetch Real Customer Downloads
$customer_downloads = function_exists( 'wc_get_customer_available_downloads' ) ? wc_get_customer_available_downloads( $user_id ) : array();
$download_count     = count( $customer_downloads );

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

// Dynamic Prakriti & Vastu Data
$user_prakriti = get_user_meta( $user_id, '_anukul_prakriti', true );
if ( empty( $user_prakriti ) ) {
    foreach ( $customer_bookings as $b ) {
        $meta_p = get_post_meta( $b->ID, '_anukul_prakriti_status', true );
        if ( ! empty( $meta_p ) ) {
            $user_prakriti = $meta_p;
            break;
        }
    }
}

$user_vastu = get_user_meta( $user_id, '_anukul_vastu_status', true );
if ( empty( $user_vastu ) ) {
    foreach ( $customer_bookings as $b ) {
        $tier = get_post_meta( $b->ID, '_anukul_tier_title', true );
        if ( stripos( $tier, 'vastu' ) !== false || stripos( $tier, 'spatial' ) !== false ) {
            $user_vastu = 'Spatial Audit Scheduled (' . $tier . ')';
            break;
        }
    }
}

// Formatted Addresses
$billing_address = function_exists( 'wc_get_account_formatted_address' ) ? wc_get_account_formatted_address( 'billing' ) : '';
$shipping_address = function_exists( 'wc_get_account_formatted_address' ) ? wc_get_account_formatted_address( 'shipping' ) : '';

// Endpoint handling for view-order and edit-address
$is_view_order   = function_exists( 'is_wc_endpoint_url' ) && is_wc_endpoint_url( 'view-order' );
$view_order_id   = $is_view_order ? absint( get_query_var( 'view-order' ) ) : 0;
$view_order      = $view_order_id ? wc_get_order( $view_order_id ) : null;
$is_edit_address = function_exists( 'is_wc_endpoint_url' ) && is_wc_endpoint_url( 'edit-address' );
$load_address    = $is_edit_address ? sanitize_key( get_query_var( 'edit-address' ) ) : '';
?>

<!-- Breadcrumb Bar -->
<section class="anukul-breadcrumb-bar w-full bg-[#F5EFE3] border-b border-[#E5D5BA] py-4 sm:py-5 shadow-[0_1px_3px_rgba(0,0,0,0.02)]">
  <div class="max-w-[1440px] mx-auto px-6 lg:px-12 flex items-center justify-between text-on-surface-variant font-body-sm text-sm">
    <nav aria-label="Breadcrumb" class="flex items-center gap-2 tracking-wider">
      <a class="hover:text-primary transition-colors font-medium" data-path="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
      <span class="opacity-40">/</span>
      <a class="hover:text-primary transition-colors font-medium" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' ) ); ?>">My Account</a>
      <span class="opacity-40">/</span>
      <span id="account-breadcrumb-current" class="text-primary font-semibold">Dashboard</span>
    </nav>
    <div class="hidden sm:flex items-center gap-2 font-label-sm text-xs uppercase tracking-[0.18em] text-secondary font-bold">
      <span class="inline-block w-2 h-2 rounded-full bg-secondary"></span>
      Client Portal &bull; My Account
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
      <!-- Identity Profile Plaque -->
      <div class="bg-surface-container-low rounded-xl p-6 shadow-sm border border-[#E8D8BC]/60 relative overflow-hidden">
        <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-surface-container-high rounded-full opacity-60 pointer-events-none"></div>
        <div class="flex items-center gap-4">
          <div class="relative group/avatar cursor-pointer" onclick="document.getElementById('anukul-avatar-sidebar-input').click();" title="<?php esc_attr_e( 'Click to change avatar photo', 'anukul' ); ?>">
            <div id="sanctuary-user-sidebar-avatar" class="w-16 h-16 rounded-full bg-cover bg-center overflow-hidden shadow-inner ring-2 ring-primary-container/20 group-hover/avatar:ring-primary-container transition-all relative" style="background-image: url('<?php echo esc_url( $avatar_url ); ?>')">
              <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-white opacity-0 group-hover/avatar:opacity-100 transition-opacity">
                <span class="material-symbols-outlined notranslate text-[20px]" translate="no">photo_camera</span>
                <span class="text-[9px] font-bold uppercase tracking-wider">Edit</span>
              </div>
            </div>
            <span class="absolute bottom-0 right-0 w-5 h-5 rounded-full bg-primary-container flex items-center justify-center text-on-primary text-[10px] shadow" title="Verified Account">
              <span class="material-symbols-outlined notranslate text-[12px]" translate="no" style="font-variation-settings: 'FILL' 1;">verified</span>
            </span>
          </div>
          <input type="file" id="anukul-avatar-sidebar-input" accept="image/jpeg,image/png,image/webp" class="hidden" onchange="handleSanctuaryAvatarUpload(this)">
          <div class="min-w-0 flex-1">
            <div class="flex items-center gap-1.5 mb-1">
              <span class="font-label-sm text-xs uppercase tracking-wider text-secondary font-bold">My Profile</span>
            </div>
            <h2 class="font-headline-sm text-2xl text-primary tracking-tight truncate"><?php echo esc_html( $full_name ); ?></h2>
            <p class="font-body-sm text-xs text-on-surface-variant truncate"><?php echo esc_html( $user_email ); ?></p>
          </div>
        </div>
        <div class="mt-5 pt-4 border-t border-[#E8D8BC]/50 flex items-center justify-between text-xs">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high text-secondary font-label-md tracking-wider uppercase font-semibold">
            <span class="material-symbols-outlined notranslate text-[14px]" translate="no">spa</span>
            <?php echo ! empty( $user_prakriti ) ? esc_html( $user_prakriti ) . ' Regimen' : 'Registered Client'; ?>
          </span>
          <span class="font-label-sm text-outline font-semibold">ID: ANK-<?php echo esc_html( 1000 + $user_id ); ?></span>
        </div>
      </div>

      <!-- Master Multi-Tab In-Page Navigation Menu -->
      <nav class="bg-surface-container-low rounded-xl p-3 shadow-sm border border-[#E8D8BC]/60 flex flex-col gap-1.5" id="account-nav-tabs">
        
        <!-- Tab 1: Dashboard -->
        <button type="button" onclick="switchAccountTab('dashboard')" id="nav-tab-dashboard" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm transition-all w-full text-left bg-primary text-on-primary font-semibold shadow-md">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined notranslate text-[20px]" translate="no">dashboard</span>
            <span>Dashboard</span>
          </div>
          <span class="material-symbols-outlined notranslate text-[16px] text-primary-fixed tab-chevron" translate="no">arrow_forward</span>
        </button>

        <!-- Tab 2: Consultations & Sessions -->
        <button type="button" onclick="switchAccountTab('bookings')" id="nav-tab-bookings" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined notranslate text-[20px]" translate="no">calendar_month</span>
            <span>Consultations</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-[11px] font-bold">
              <?php echo esc_html( $booking_count ); ?> booked
            </span>
            <span class="material-symbols-outlined notranslate text-[16px] text-outline-variant tab-chevron" translate="no">chevron_right</span>
          </div>
        </button>

        <!-- Tab 3: Orders -->
        <button type="button" onclick="switchAccountTab('orders')" id="nav-tab-orders" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined notranslate text-[20px]" translate="no">inventory_2</span>
            <span>Orders</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-[11px] font-bold">
              <?php echo esc_html( $order_count ); ?> total
            </span>
            <span class="material-symbols-outlined notranslate text-[16px] text-outline-variant tab-chevron" translate="no">chevron_right</span>
          </div>
        </button>

        <!-- Tab 3: Addresses -->
        <button type="button" onclick="switchAccountTab('addresses')" id="nav-tab-addresses" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined notranslate text-[20px]" translate="no">pin_drop</span>
            <span>Addresses</span>
          </div>
          <span class="material-symbols-outlined notranslate text-[16px] text-outline-variant tab-chevron" translate="no">chevron_right</span>
        </button>

        <!-- Tab 4: Account Details -->
        <button type="button" onclick="switchAccountTab('account-details')" id="nav-tab-account-details" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined notranslate text-[20px]" translate="no">manage_accounts</span>
            <span>Account Details</span>
          </div>
          <span class="material-symbols-outlined notranslate text-[16px] text-outline-variant tab-chevron" translate="no">chevron_right</span>
        </button>

        <!-- Tab 5: Downloads -->
        <button type="button" onclick="switchAccountTab('downloads')" id="nav-tab-downloads" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined notranslate text-[20px]" translate="no">file_download</span>
            <span>Downloads</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-[11px] font-bold">
              <?php echo esc_html( $download_count ); ?> <?php echo $download_count === 1 ? 'file' : 'files'; ?>
            </span>
            <span class="material-symbols-outlined notranslate text-[16px] text-outline-variant tab-chevron" translate="no">chevron_right</span>
          </div>
        </button>

        <div class="my-1.5 mx-2 h-px bg-surface-container-highest opacity-70"></div>

        <!-- Real WooCommerce Sign Out Link -->
        <a class="flex items-center justify-between px-4 py-2.5 rounded-lg text-error hover:bg-error-container/20 transition-all font-body-sm text-sm" href="<?php echo esc_url( wc_logout_url() ); ?>">
          <div class="flex items-center gap-3">
            <span class="material-symbols-outlined notranslate text-[20px]" translate="no">logout</span>
            <span>Sign Out</span>
          </div>
          <span class="material-symbols-outlined notranslate text-[16px] text-outline-variant" translate="no">chevron_right</span>
        </a>
      </nav>

      <!-- Clinic Support & Help Desk Card -->
      <div class="bg-surface-container rounded-xl p-5 shadow-sm border border-[#E8D8BC]/60 relative overflow-hidden">
        <div class="flex items-start gap-3.5">
          <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center shrink-0 text-secondary">
            <span class="material-symbols-outlined notranslate text-[22px]" translate="no">support_agent</span>
          </div>
          <div class="flex-1">
            <h3 class="font-headline-sm text-xl text-primary mb-1">Clinic Helpdesk</h3>
            <p class="font-body-sm text-xs text-on-surface-variant leading-relaxed mb-3">
              Need assistance with your orders, consultations, or health records?
            </p>
            <a class="inline-flex items-center gap-1.5 text-secondary hover:text-primary transition-colors font-label-md text-xs tracking-wider uppercase font-bold" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
              <span>Contact Clinic Support</span>
              <span class="material-symbols-outlined notranslate text-[14px]" translate="no">north_east</span>
            </a>
          </div>
        </div>
      </div>

      <!-- Vastu Harmony Card -->
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
          <p class="font-label-sm text-[11px] tracking-wider uppercase text-outline font-bold">Vastu Harmony Status</p>
          <?php if ( ! empty( $user_vastu ) ) : ?>
            <p class="font-body-sm text-xs text-on-surface font-semibold"><?php echo esc_html( $user_vastu ); ?></p>
          <?php else : ?>
            <p class="font-body-sm text-xs text-on-surface-variant">Property Audit: <span class="text-secondary font-medium">Pending</span></p>
            <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="font-label-sm text-[10px] text-primary hover:text-secondary uppercase tracking-wider font-semibold block mt-0.5">Schedule Review &rarr;</a>
          <?php endif; ?>
        </div>
      </div>
    </aside>

    <!-- ========================================== -->
    <!-- MAIN WORKSPACE TAB PANES (Span 8)          -->
    <!-- ========================================== -->
    <main class="lg:col-span-8 flex flex-col gap-6 min-h-[600px]">

      <?php if ( $is_view_order && $view_order ) : 
        $items    = $view_order->get_items();
        $v_status = $view_order->get_status();
      ?>
        <!-- Dedicated Order Details Pane -->
        <div class="space-y-6">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-[#E8D8BC]">
            <div>
              <div class="flex items-center gap-2 mb-1">
                <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' ) ); ?>#orders" class="text-xs uppercase font-label-sm text-secondary hover:text-primary transition-colors font-bold flex items-center gap-1">
                  <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_back</span>
                  Back to Orders
                </a>
                <span class="text-outline-variant">&bull;</span>
                <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Order Details</span>
              </div>
              <h1 class="font-headline-lg text-3xl text-primary tracking-tight">ORDER #<?php echo esc_html( $view_order->get_order_number() ); ?></h1>
              <p class="font-body-sm text-xs text-on-surface-variant mt-1">
                Placed on <?php echo esc_html( wc_format_datetime( $view_order->get_date_created() ) ); ?> &bull; Payment via <?php echo esc_html( $view_order->get_payment_method_title() ); ?>
              </p>
            </div>
            <div class="flex items-center gap-2">
              <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-md text-xs uppercase tracking-wider font-bold">
                <span class="w-2 h-2 rounded-full bg-secondary"></span>
                Status: <?php echo esc_html( wc_get_order_status_name( $v_status ) ); ?>
              </span>
            </div>
          </div>

          <!-- Items Table -->
          <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-6 shadow-sm">
            <h3 class="font-headline-sm text-lg text-primary mb-4 pb-2 border-b border-[#E8D8BC]/40 font-bold">Consignment Remedies</h3>
            <div class="divide-y divide-[#E8D8BC]/40">
              <?php foreach ( $items as $item ) : ?>
                <div class="py-3.5 flex items-center justify-between gap-4">
                  <div class="flex items-center gap-3">
                    <span class="w-2.5 h-2.5 rounded-full bg-secondary"></span>
                    <div>
                      <p class="font-semibold text-primary text-sm"><?php echo esc_html( $item->get_name() ); ?></p>
                      <p class="font-body-sm text-xs text-on-surface-variant">Quantity: &times; <?php echo esc_html( $item->get_quantity() ); ?></p>
                    </div>
                  </div>
                  <p class="font-headline-sm text-base text-primary font-bold">
                    <?php echo wp_kses_post( $view_order->get_formatted_line_subtotal( $item ) ); ?>
                  </p>
                </div>
              <?php endforeach; ?>
            </div>

            <!-- Totals Breakdown -->
            <div class="mt-6 pt-4 border-t border-[#E8D8BC]/60 space-y-2 text-sm">
              <div class="flex justify-between text-on-surface-variant text-xs">
                <span>Subtotal</span>
                <span class="font-medium text-primary"><?php echo wp_kses_post( wc_price( $view_order->get_subtotal() ) ); ?></span>
              </div>
              <?php if ( (float) $view_order->get_shipping_total() > 0 ) : ?>
                <div class="flex justify-between text-on-surface-variant text-xs">
                  <span>Shipping (<?php echo esc_html( $view_order->get_shipping_method() ); ?>)</span>
                  <span class="font-medium text-primary"><?php echo wp_kses_post( wc_price( $view_order->get_shipping_total() ) ); ?></span>
                </div>
              <?php endif; ?>
              <?php foreach ( $view_order->get_tax_totals() as $code => $tax ) : ?>
                <div class="flex justify-between text-on-surface-variant text-xs">
                  <span><?php echo esc_html( $tax->label ); ?></span>
                  <span class="font-medium text-primary"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
                </div>
              <?php endforeach; ?>
              <div class="flex justify-between items-center pt-3 border-t border-[#E8D8BC]/40 text-base font-bold text-primary">
                <span>Total</span>
                <span class="text-xl font-headline-sm"><?php echo wp_kses_post( $view_order->get_formatted_order_total() ); ?></span>
              </div>
            </div>
          </div>

          <!-- Addresses Grid -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-5 shadow-sm">
              <h4 class="font-label-md text-xs uppercase tracking-wider text-secondary font-bold mb-2">Billing Coordinates</h4>
              <div class="text-xs text-on-surface-variant leading-relaxed">
                <?php echo wp_kses_post( $view_order->get_formatted_billing_address() ?: 'No billing address recorded.' ); ?>
              </div>
            </div>
            <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-5 shadow-sm">
              <h4 class="font-label-md text-xs uppercase tracking-wider text-secondary font-bold mb-2">Delivery Coordinates</h4>
              <div class="text-xs text-on-surface-variant leading-relaxed">
                <?php echo wp_kses_post( $view_order->get_formatted_shipping_address() ?: 'No delivery address recorded.' ); ?>
              </div>
            </div>
          </div>
        </div>
      <?php elseif ( $is_edit_address ) : ?>
        <!-- Dedicated Edit Address Pane -->
        <div class="space-y-6">
          <div class="pb-3 border-b border-[#E8D8BC] flex items-center justify-between">
            <div>
              <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' ) ); ?>#addresses" class="text-xs uppercase font-label-sm text-secondary hover:text-primary transition-colors font-bold flex items-center gap-1 mb-1">
                <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_back</span>
                Back to Addresses
              </a>
              <h1 class="font-headline-lg text-3xl text-primary tracking-tight">Edit <?php echo esc_html( ucfirst( $load_address ) ); ?> Coordinates</h1>
            </div>
          </div>
          <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-6 shadow-sm">
            <?php 
              if ( function_exists( 'woocommerce_account_edit_address' ) ) {
                woocommerce_account_edit_address( $load_address );
              }
            ?>
          </div>
        </div>
      <?php else : ?>

      <!-- ====================================== -->
      <!-- 1. DASHBOARD TAB PANE                  -->
      <!-- ====================================== -->
      <div id="tab-pane-dashboard" class="space-y-8">
        <!-- Header Panel -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
          <div>
            <div class="flex items-center gap-2 mb-1.5">
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">ACCOUNT DASHBOARD</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Account Overview</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">NAMASTE, <?php echo esc_html( strtoupper( $first_name ) ); ?></h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              Welcome to your ANUKUL client account. You can view your consultations, prescriptions, orders, and saved addresses here.
            </p>
          </div>
          <div class="flex items-center gap-2 self-start md:self-auto shrink-0">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary/10 text-primary font-label-sm text-xs font-semibold">
              <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
              Account Active
            </span>
          </div>
        </div>

        <!-- 4 Summary KPI Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
          <div class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors">
            <div class="flex items-center justify-between mb-2">
              <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Prakriti Status</span>
              <span class="material-symbols-outlined notranslate text-primary text-[20px]" translate="no">spa</span>
            </div>
            <?php if ( ! empty( $user_prakriti ) ) : ?>
              <p class="font-headline-sm text-2xl text-primary font-serif whitespace-nowrap"><?php echo esc_html( $user_prakriti ); ?></p>
              <p class="font-body-sm text-xs text-secondary mt-1 font-medium">Holistic Regimen Active</p>
            <?php else : ?>
              <p class="font-headline-sm text-2xl text-primary font-serif whitespace-nowrap">Assessment Pending</p>
              <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="font-body-sm text-xs text-secondary hover:text-primary mt-1 flex items-center gap-1 font-medium">
                Book Diagnosis <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_forward</span>
              </a>
            <?php endif; ?>
          </div>

          <div onclick="switchAccountTab('orders')" class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors cursor-pointer">
            <div class="flex items-center justify-between mb-2">
              <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Dispensary Orders</span>
              <span class="material-symbols-outlined notranslate text-primary text-[20px]" translate="no">inventory_2</span>
            </div>
            <p class="font-headline-sm text-2xl text-primary font-serif whitespace-nowrap"><?php echo esc_html( $order_count ); ?> Total <span class="text-xs font-sans text-secondary font-semibold">(<?php echo esc_html( $active_orders ); ?> Active)</span></p>
            <p class="font-body-sm text-xs text-secondary mt-1 flex items-center gap-1 font-medium">View dispatches <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_forward</span></p>
          </div>

          <div onclick="switchAccountTab('bookings')" class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors cursor-pointer">
            <div class="flex items-center justify-between mb-2">
              <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Consultations</span>
              <span class="material-symbols-outlined notranslate text-primary text-[20px]" translate="no">calendar_month</span>
            </div>
            <p class="font-headline-sm text-2xl text-primary font-serif whitespace-nowrap"><?php echo esc_html( $booking_count ); ?> Booked <span class="text-xs font-sans text-secondary font-semibold"><?php echo $has_booking ? '(Active)' : ''; ?></span></p>
            <p class="font-body-sm text-xs text-secondary mt-1 flex items-center gap-1 font-medium">View history <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_forward</span></p>
          </div>

          <div onclick="switchAccountTab('downloads')" class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors cursor-pointer">
            <div class="flex items-center justify-between mb-2">
              <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Vedic Blueprints</span>
              <span class="material-symbols-outlined notranslate text-primary text-[20px]" translate="no">file_download</span>
            </div>
            <p class="font-headline-sm text-2xl text-primary font-serif whitespace-nowrap">
              <?php echo esc_html( $download_count ); ?> <?php echo $download_count === 1 ? 'Document' : 'Documents'; ?>
            </p>
            <?php if ( $download_count > 0 ) : ?>
              <p class="font-body-sm text-xs text-secondary mt-1 flex items-center gap-1 font-medium">Download PDFs <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_forward</span></p>
            <?php else : ?>
              <p class="font-body-sm text-xs text-on-surface-variant mt-1">None Purchased</p>
            <?php endif; ?>
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
                  Welcome to ANUKUL Clinic
                </div>
                <h3 class="font-headline-sm text-2xl sm:text-3xl text-on-primary font-normal">Authentic Herbal Formulations &amp; Consultations</h3>
                <p class="font-body-sm text-sm text-inverse-on-surface leading-relaxed">
                  Explore our classical Ayurveda formulations or schedule your one-on-one health assessment.
                </p>
              </div>
              <div class="flex flex-col sm:flex-row gap-3 shrink-0">
                <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-surface text-primary hover:bg-[#F7F1E3] font-label-md text-xs uppercase tracking-wider font-bold transition-all shadow-sm">
                  Browse Shop
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
                  <span class="material-symbols-outlined notranslate text-secondary text-[18px]" translate="no">location_on</span>
                  Default Address
                </h4>
                <button onclick="switchAccountTab('addresses')" class="text-xs uppercase font-label-sm text-secondary hover:text-primary transition-colors font-bold">Edit</button>
              </div>
              <?php if ( ! empty( $billing_address ) ) : ?>
                <div class="font-body-sm text-sm text-on-surface-variant mt-1 leading-relaxed">
                  <?php echo wp_kses_post( $billing_address ); ?>
                </div>
              <?php else : ?>
                <p class="font-body-sm text-sm text-on-surface-variant mt-1 italic">
                  No default address recorded yet. Configure your billing and shipping address for smooth order dispatches.
                </p>
              <?php endif; ?>
            </div>
            <div class="pt-4 mt-4 border-t border-[#E8D8BC]/30 flex items-center justify-between text-xs">
              <span class="text-on-surface-variant">Saved Delivery Address</span>
              <span class="text-primary font-semibold flex items-center gap-1">Verified <span class="material-symbols-outlined notranslate text-[14px]" translate="no">check_circle</span></span>
            </div>
          </div>

          <!-- Upcoming Consultation Card -->
          <div class="bg-surface-container-low p-6 rounded-xl border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                <h4 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                  <span class="material-symbols-outlined notranslate text-secondary text-[18px]" translate="no">calendar_month</span>
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
                  <span class="material-symbols-outlined notranslate text-secondary text-[22px]" translate="no">schedule</span>
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
                  <span class="material-symbols-outlined notranslate text-secondary text-[22px]" translate="no">schedule</span>
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
                  View Consultation History (<?php echo esc_html( $booking_count ); ?>) <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_forward</span>
                </button>
              <?php endif; ?>
              <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="text-xs uppercase font-label-sm text-primary hover:text-secondary transition-colors font-bold flex items-center gap-1">
                Book Consultation Now <span class="material-symbols-outlined notranslate text-[14px]" translate="no">add_circle</span>
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
              <span class="material-symbols-outlined notranslate text-[16px]" translate="no">add_circle</span>
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
                    <span class="material-symbols-outlined notranslate text-secondary text-[18px]" translate="no">calendar_today</span>
                    <div>
                      <span class="text-outline uppercase font-label-sm block text-[10px]">Date</span>
                      <span class="font-semibold text-primary"><?php echo esc_html( $slot_date ); ?></span>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined notranslate text-secondary text-[18px]" translate="no">schedule</span>
                    <div>
                      <span class="text-outline uppercase font-label-sm block text-[10px]">Muhurta Slot</span>
                      <span class="font-semibold text-primary"><?php echo esc_html( $slot_time ); ?> IST</span>
                    </div>
                  </div>
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined notranslate text-secondary text-[18px]" translate="no">videocam</span>
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

                <?php
                $b_consent_agreed = get_post_meta( $b_id, '_anukul_consent_agreed', true );
                $b_approval_stat  = get_post_meta( $b_id, '_anukul_consent_approval_status', true );
                $b_approver       = get_post_meta( $b_id, '_anukul_consent_approved_by', true );
                ?>
                <div class="mb-3 px-3 py-2 rounded-lg bg-surface-container/60 border border-[#E8D8BC]/50 flex flex-wrap items-center justify-between gap-2 text-[11px]">
                  <div class="flex items-center gap-1.5 text-primary">
                    <span class="material-symbols-outlined notranslate text-[15px] text-secondary" translate="no">verified_user</span>
                    <span>Online Consultation Consent (v1.0): <strong>Digitally Signed</strong></span>
                  </div>
                  <div>
                    <?php if ( 'approved' === $b_approval_stat ) : ?>
                      <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-[#D4EDDA] text-[#155724] font-bold">
                        ✓ Clinically Cleared <?php echo $b_approver ? 'by ' . esc_html( $b_approver ) : ''; ?>
                      </span>
                    <?php else : ?>
                      <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-secondary-fixed text-on-secondary-fixed font-bold">
                        ⏳ Pending Doctor Review (Dr. Chaudhari)
                      </span>
                    <?php endif; ?>
                  </div>
                </div>

                <div class="pt-3 border-t border-[#E8D8BC]/50 flex flex-wrap items-center justify-between gap-3 text-xs">
                  <div class="flex items-center gap-2 text-on-surface-variant">
                    <span class="material-symbols-outlined notranslate text-secondary text-[16px]" translate="no">verified</span>
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
            <span class="material-symbols-outlined notranslate text-secondary text-[48px]" translate="no">calendar_month</span>
            <h3 class="font-headline-sm text-2xl text-primary">No Consultations Reserved Yet</h3>
            <p class="font-body-md text-sm text-on-surface-variant max-w-md mx-auto">
              Reserve your personalized Vedic health diagnosis, floor plan audit, or Muhurta alignment session directly through our consultation portal.
            </p>
            <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-[#1F4D3A] text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm">
              <span class="material-symbols-outlined notranslate text-[16px]" translate="no">event_available</span>
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
              <span class="material-symbols-outlined notranslate text-[16px]" translate="no">local_mall</span>
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
                    <span class="material-symbols-outlined notranslate text-secondary text-[16px]" translate="no">local_shipping</span>
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
            <span class="material-symbols-outlined notranslate text-secondary text-[48px]" translate="no">inventory_2</span>
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
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">BILLING &amp; SHIPPING</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Delivery Addresses</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">SAVED ADDRESSES</h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              The following addresses are used on the checkout page for order deliveries and consultation invoices.
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
                  <span class="material-symbols-outlined notranslate text-secondary text-[18px]" translate="no">receipt_long</span>
                  Billing Address
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
                <span class="material-symbols-outlined notranslate text-[16px]" translate="no">edit</span> Edit Billing Address
              </a>
            </div>
          </div>

          <!-- Shipping Address Card -->
          <div class="bg-surface-container-low rounded-xl p-6 border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
            <div>
              <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                <h3 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                  <span class="material-symbols-outlined notranslate text-secondary text-[18px]" translate="no">local_shipping</span>
                  Shipping Address
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
                <span class="material-symbols-outlined notranslate text-[16px]" translate="no">edit</span> Edit Delivery Address
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
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">PROFILE &amp; SECURITY</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Account Details</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">ACCOUNT DETAILS</h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              Keep your personal information up to date so you can manage your ANUKUL account, Ayurveda prescriptions, and consultations with ease.
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

            <!-- SECTION 0: Profile Avatar Setup -->
            <section class="p-6 rounded-xl bg-surface border border-[#E8D8BC]/80 space-y-4">
              <div class="flex items-center justify-between pb-3 border-b border-[#E8D8BC]/50">
                <div class="flex items-center gap-3">
                  <span class="w-7 h-7 rounded-full bg-primary/10 text-primary flex items-center justify-center">
                    <span class="material-symbols-outlined notranslate text-[18px]" translate="no">account_circle</span>
                  </span>
                  <div>
                    <h2 class="font-headline-md text-lg text-primary tracking-tight">PROFILE PICTURE</h2>
                    <p class="font-body-sm text-xs text-on-surface-variant">Personalize your profile picture across your account and consultations</p>
                  </div>
                </div>
                <div id="sanctuary-avatar-status" class="hidden text-xs font-semibold px-3 py-1 rounded-full"></div>
              </div>

              <div class="flex flex-col sm:flex-row items-center gap-6 pt-1">
                <!-- Avatar Preview -->
                <div class="relative group/avatar cursor-pointer shrink-0" onclick="document.getElementById('anukul-avatar-main-input').click();" title="<?php esc_attr_e( 'Click to choose new photo', 'anukul' ); ?>">
                  <div id="sanctuary-avatar-preview" class="w-24 h-24 rounded-full bg-cover bg-center overflow-hidden shadow-md ring-4 ring-primary-container/20 group-hover/avatar:ring-primary-container transition-all relative" style="background-image: url('<?php echo esc_url( $avatar_url ); ?>')">
                    <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-white opacity-0 group-hover/avatar:opacity-100 transition-opacity">
                      <span class="material-symbols-outlined notranslate text-[24px]" translate="no">photo_camera</span>
                      <span class="text-[10px] font-bold tracking-wider uppercase mt-0.5">Change</span>
                    </div>
                  </div>
                </div>

                <input type="file" id="anukul-avatar-main-input" accept="image/jpeg,image/png,image/webp" class="hidden" onchange="handleSanctuaryAvatarUpload(this)">

                <!-- Controls & Info -->
                <div class="flex-1 space-y-2.5 text-center sm:text-left">
                  <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3">
                    <button type="button" onclick="document.getElementById('anukul-avatar-main-input').click();" id="btn-upload-avatar" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white font-label-md text-xs font-bold uppercase tracking-wider hover:bg-primary-container transition-colors shadow-sm">
                      <span class="material-symbols-outlined notranslate text-[16px]" translate="no">upload</span>
                      <span>Upload Profile Photo</span>
                    </button>
                    <button type="button" onclick="handleSanctuaryAvatarRemove();" id="btn-remove-avatar" class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg border border-[#E8D8BC] bg-surface-container text-outline hover:text-red-700 hover:border-red-300 font-label-md text-xs font-semibold transition-colors">
                      <span class="material-symbols-outlined notranslate text-[16px]" translate="no">delete</span>
                      <span>Remove</span>
                    </button>
                  </div>
                  <p class="font-body-sm text-xs text-on-surface-variant leading-relaxed">
                    Accepted formats: JPG, PNG, WebP (Max 5MB). Updates instantly on your consultation portal and header dropdown.
                  </p>
                </div>
              </div>
            </section>

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
              <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">REPORTS &amp; DOWNLOADS</span>
              <span class="text-outline-variant">&bull;</span>
              <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Downloads</span>
            </div>
            <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">MY DOWNLOADS</h1>
            <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
              Download your consultation reports, Vastu audit recommendations, and digital purchases directly here.
            </p>
          </div>
          <?php if ( ! empty( $customer_downloads ) ) : ?>
            <div class="flex items-center gap-2">
              <span class="px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-xs font-bold">
                <?php echo esc_html( $download_count ); ?> available
              </span>
            </div>
          <?php endif; ?>
        </div>

        <?php if ( ! empty( $customer_downloads ) ) : ?>
          <!-- Downloads List (Dynamic WooCommerce Downloads) -->
          <div class="space-y-4">
            <?php foreach ( $customer_downloads as $download ) : 
              $file_name   = ! empty( $download['download_name'] ) ? $download['download_name'] : ( ! empty( $download['product_name'] ) ? $download['product_name'] : 'Document' );
              $file_url    = ! empty( $download['download_url'] ) ? $download['download_url'] : '#';
              $order_num   = ! empty( $download['order_id'] ) ? $download['order_id'] : '';
              $remaining   = isset( $download['downloads_remaining'] ) ? $download['downloads_remaining'] : '';
              $expires     = ! empty( $download['access_expires'] ) ? date_i18n( get_option( 'date_format' ), strtotime( $download['access_expires'] ) ) : 'Never';
            ?>
              <div class="bg-surface-container-low rounded-xl p-5 border border-[#E8D8BC]/60 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-primary/40 transition-colors">
                <div class="flex items-start gap-4">
                  <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                    <span class="material-symbols-outlined notranslate text-[26px]" translate="no">description</span>
                  </div>
                  <div>
                    <h3 class="font-headline-sm text-lg text-primary font-bold"><?php echo esc_html( $file_name ); ?></h3>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-0.5">
                      <?php if ( ! empty( $download['product_name'] ) && $download['product_name'] !== $file_name ) : ?>
                        <?php echo esc_html( $download['product_name'] ); ?> &bull; 
                      <?php endif; ?>
                      <?php if ( $order_num ) : ?>
                        Order #<?php echo esc_html( $order_num ); ?> &bull; 
                      <?php endif; ?>
                      Downloads: <?php echo esc_html( $remaining === '' || $remaining === 'unlimited' ? 'Unlimited' : $remaining . ' remaining' ); ?>
                      <?php if ( $expires !== 'Never' ) : ?>
                        &bull; Expires: <?php echo esc_html( $expires ); ?>
                      <?php endif; ?>
                    </p>
                  </div>
                </div>
                <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
                  <a href="<?php echo esc_url( $file_url ); ?>" class="px-5 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-2" download>
                    <span class="material-symbols-outlined notranslate text-[18px]" translate="no">download</span> Download File
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else : ?>
          <!-- Clean Empty State When No Downloads Exist -->
          <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-12 text-center space-y-4">
            <div class="w-16 h-16 mx-auto rounded-full bg-primary/10 flex items-center justify-center text-primary">
              <span class="material-symbols-outlined notranslate text-[36px]" translate="no">folder_open</span>
            </div>
            <h3 class="font-headline-sm text-2xl text-primary">No Downloadable Files Yet</h3>
            <p class="font-body-md text-sm text-on-surface-variant max-w-md mx-auto">
              You have not purchased any downloadable blueprints, consecrated PDF regimens, or architectural dossiers yet. Any digital guides from your purchases or consultation reviews will appear here.
            </p>
            <div class="pt-2 flex flex-wrap items-center justify-center gap-3">
              <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg bg-[#1F4D3A] text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm">
                <span class="material-symbols-outlined notranslate text-[16px]" translate="no">storefront</span>
                Explore Dispensary
              </a>
              <a href="<?php echo esc_url( home_url( '/book-your-consultation/' ) ); ?>" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-lg border border-primary text-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-primary hover:text-white transition-colors">
                <span class="material-symbols-outlined notranslate text-[16px]" translate="no">calendar_month</span>
                Book Consultation
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <?php endif; // End endpoint check ?>

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
        'dashboard': 'Dashboard',
        'bookings': 'My Consultations',
        'orders': 'My Orders',
        'addresses': 'Saved Addresses',
        'account-details': 'Profile & Account Details',
        'downloads': 'Downloads & Reports'
      };
      crumbElem.textContent = names[tabKey] || 'Dashboard';
    }

    if (scroll) {
      window.scrollTo({ top: 80, behavior: 'smooth' });
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    let activeTab = window.location.hash.replace('#', '');
    const validTabs = ['dashboard', 'bookings', 'orders', 'addresses', 'account-details', 'downloads'];

    <?php if ( function_exists( 'is_wc_endpoint_url' ) ) : ?>
      <?php if ( is_wc_endpoint_url( 'orders' ) ) : ?>
        if (!activeTab) activeTab = 'orders';
      <?php elseif ( is_wc_endpoint_url( 'downloads' ) ) : ?>
        if (!activeTab) activeTab = 'downloads';
      <?php elseif ( is_wc_endpoint_url( 'edit-address' ) && empty( $load_address ) ) : ?>
        if (!activeTab) activeTab = 'addresses';
      <?php elseif ( is_wc_endpoint_url( 'edit-account' ) ) : ?>
        if (!activeTab) activeTab = 'account-details';
      <?php endif; ?>
    <?php endif; ?>

    if (activeTab && validTabs.includes(activeTab)) {
      switchAccountTab(activeTab, false);
    }
  });

  // Sanctuary Avatar AJAX Handlers
  window.anukulAvatarConfig = window.anukulAvatarConfig || {
    ajaxUrl: '<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>',
    nonce: '<?php echo esc_js( wp_create_nonce( 'anukul_avatar_nonce' ) ); ?>'
  };

  function setAvatarStatus(message, isError) {
    const statusElem = document.getElementById('sanctuary-avatar-status');
    if (!statusElem) return;
    statusElem.textContent = message;
    statusElem.className = 'text-xs font-semibold px-3 py-1 rounded-full ' + (isError ? 'bg-red-100 text-red-800 border border-red-200' : 'bg-emerald-100 text-emerald-800 border border-emerald-200');
    statusElem.style.display = 'inline-block';
    setTimeout(function() {
      statusElem.style.display = 'none';
    }, 5000);
  }

  function updateAllAvatarElements(newUrl) {
    const ids = [
      'sanctuary-user-sidebar-avatar',
      'sanctuary-avatar-preview',
      'header-avatar-badge',
      'header-dropdown-avatar-badge',
      'mob-header-avatar-badge'
    ];
    ids.forEach(function(id) {
      const el = document.getElementById(id);
      if (el) {
        el.style.backgroundImage = 'url("' + newUrl + '")';
      }
    });
  }

  function handleSanctuaryAvatarUpload(input) {
    if (!input.files || !input.files[0]) return;
    const file = input.files[0];

    // Check size on client side (5MB)
    if (file.size > 5 * 1024 * 1024) {
      setAvatarStatus('Image exceeds maximum size of 5MB. Please choose a smaller photo.', true);
      input.value = '';
      return;
    }

    const btnUpload = document.getElementById('btn-upload-avatar');
    let originalText = '';
    if (btnUpload) {
      originalText = btnUpload.innerHTML;
      btnUpload.disabled = true;
      btnUpload.innerHTML = '<span class="material-symbols-outlined notranslate animate-spin text-[16px]" translate="no">sync</span><span>Uploading...</span>';
    }

    const formData = new FormData();
    formData.append('action', 'anukul_upload_avatar');
    formData.append('security', window.anukulAvatarConfig.nonce);
    formData.append('avatar', file);

    fetch(window.anukulAvatarConfig.ajaxUrl, {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
      if (btnUpload) {
        btnUpload.disabled = false;
        btnUpload.innerHTML = originalText;
      }
      if (data && data.success && data.data && data.data.avatar_url) {
        updateAllAvatarElements(data.data.avatar_url);
        setAvatarStatus(data.data.message || 'Profile picture updated successfully.', false);
      } else {
        const msg = (data && data.data && data.data.message) ? data.data.message : 'Upload failed. Please try again.';
        setAvatarStatus(msg, true);
      }
      input.value = '';
    })
    .catch(function(err) {
      if (btnUpload) {
        btnUpload.disabled = false;
        btnUpload.innerHTML = originalText;
      }
      setAvatarStatus('Network error occurred while uploading avatar.', true);
      input.value = '';
    });
  }

  function handleSanctuaryAvatarRemove() {
    if (!confirm('Revert profile photo to the default seeker avatar?')) {
      return;
    }

    const btnRemove = document.getElementById('btn-remove-avatar');
    let originalText = '';
    if (btnRemove) {
      originalText = btnRemove.innerHTML;
      btnRemove.disabled = true;
      btnRemove.innerHTML = '<span class="material-symbols-outlined notranslate animate-spin text-[16px]" translate="no">sync</span><span>Removing...</span>';
    }

    const formData = new FormData();
    formData.append('action', 'anukul_remove_avatar');
    formData.append('security', window.anukulAvatarConfig.nonce);

    fetch(window.anukulAvatarConfig.ajaxUrl, {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
      if (btnRemove) {
        btnRemove.disabled = false;
        btnRemove.innerHTML = originalText;
      }
      if (data && data.success && data.data && data.data.default_url) {
        updateAllAvatarElements(data.data.default_url);
        setAvatarStatus(data.data.message || 'Avatar photo removed.', false);
      } else {
        const msg = (data && data.data && data.data.message) ? data.data.message : 'Could not remove avatar.';
        setAvatarStatus(msg, true);
      }
    })
    .catch(function(err) {
      if (btnRemove) {
        btnRemove.disabled = false;
        btnRemove.innerHTML = originalText;
      }
      setAvatarStatus('Network error while removing avatar.', true);
    });
  }
</script>

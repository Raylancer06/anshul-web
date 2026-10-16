<?php
/**
 * View Order details tab (Dynamic WooCommerce Order Details)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$order = isset( $order_id ) ? wc_get_order( $order_id ) : null;
$account_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' );

if ( ! $order ) {
    ?>
    <p class="p-6 text-center text-on-surface-variant font-body-sm">
        Invalid order request. <a href="<?php echo esc_url( $account_url ); ?>#orders" class="text-primary font-bold underline">Return to Sanctuary Orders</a>
    </p>
    <?php
    return;
}

$items = $order->get_items();
$status = $order->get_status();
?>
<div class="space-y-6 max-w-4xl mx-auto py-8 px-4">
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-[#E8D8BC]">
    <div>
      <div class="flex items-center gap-2 mb-1">
        <a href="<?php echo esc_url( $account_url ); ?>#orders" class="text-xs uppercase font-label-sm text-secondary hover:text-primary transition-colors font-bold flex items-center gap-1">
          <span class="material-symbols-outlined notranslate text-[14px]" translate="no">arrow_back</span>
          Back to Orders
        </a>
        <span class="text-outline-variant">&bull;</span>
        <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Sanctuary Dispatch</span>
      </div>
      <h1 class="font-headline-lg text-3xl text-primary tracking-tight">ORDER #<?php echo esc_html( $order->get_order_number() ); ?></h1>
      <p class="font-body-sm text-xs text-on-surface-variant mt-1">
        Placed on <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?> &bull; Payment via <?php echo esc_html( $order->get_payment_method_title() ); ?>
      </p>
    </div>
    <div class="flex items-center gap-2">
      <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-md text-xs uppercase tracking-wider font-bold">
        <span class="w-2 h-2 rounded-full bg-secondary"></span>
        Status: <?php echo esc_html( wc_get_order_status_name( $status ) ); ?>
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
            <?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Totals Breakdown -->
    <div class="mt-6 pt-4 border-t border-[#E8D8BC]/60 space-y-2 text-sm">
      <div class="flex justify-between text-on-surface-variant text-xs">
        <span>Subtotal</span>
        <span class="font-medium text-primary"><?php echo wp_kses_post( wc_price( $order->get_subtotal() ) ); ?></span>
      </div>
      <?php if ( (float) $order->get_shipping_total() > 0 ) : ?>
        <div class="flex justify-between text-on-surface-variant text-xs">
          <span>Shipping (<?php echo esc_html( $order->get_shipping_method() ); ?>)</span>
          <span class="font-medium text-primary"><?php echo wp_kses_post( wc_price( $order->get_shipping_total() ) ); ?></span>
        </div>
      <?php endif; ?>
      <?php foreach ( $order->get_tax_totals() as $code => $tax ) : ?>
        <div class="flex justify-between text-on-surface-variant text-xs">
          <span><?php echo esc_html( $tax->label ); ?></span>
          <span class="font-medium text-primary"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
        </div>
      <?php endforeach; ?>
      <div class="flex justify-between items-center pt-3 border-t border-[#E8D8BC]/40 text-base font-bold text-primary">
        <span>Total</span>
        <span class="text-xl font-headline-sm"><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></span>
      </div>
    </div>
  </div>

  <!-- Addresses Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-5 shadow-sm">
      <h4 class="font-label-md text-xs uppercase tracking-wider text-secondary font-bold mb-2">Billing Coordinates</h4>
      <div class="text-xs text-on-surface-variant leading-relaxed">
        <?php echo wp_kses_post( $order->get_formatted_billing_address() ?: 'No billing address recorded.' ); ?>
      </div>
    </div>
    <div class="bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-5 shadow-sm">
      <h4 class="font-label-md text-xs uppercase tracking-wider text-secondary font-bold mb-2">Delivery Coordinates</h4>
      <div class="text-xs text-on-surface-variant leading-relaxed">
        <?php echo wp_kses_post( $order->get_formatted_shipping_address() ?: 'No delivery address recorded.' ); ?>
      </div>
    </div>
  </div>
</div>

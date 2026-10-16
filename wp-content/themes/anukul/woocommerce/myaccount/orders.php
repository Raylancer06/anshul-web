<?php
/**
 * Orders tab template (delegated to ANUKUL Sanctuary unified workspace)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$account_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' );
?>
<script>
  window.location.replace("<?php echo esc_url( $account_url ); ?>#orders");
</script>
<noscript>
  <meta http-equiv="refresh" content="0;url=<?php echo esc_url( $account_url ); ?>#orders">
  <p class="p-6 text-center"><a href="<?php echo esc_url( $account_url ); ?>#orders" class="text-primary font-bold">Click here to view your Dispensary Orders</a></p>
</noscript>

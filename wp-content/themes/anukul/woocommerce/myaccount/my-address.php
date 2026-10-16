<?php
/**
 * My Addresses tab template (delegated to ANUKUL Sanctuary unified workspace)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$account_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : home_url( '/my-account/' );
?>
<script>
  window.location.replace("<?php echo esc_url( $account_url ); ?>#addresses");
</script>
<noscript>
  <meta http-equiv="refresh" content="0;url=<?php echo esc_url( $account_url ); ?>#addresses">
  <p class="p-6 text-center"><a href="<?php echo esc_url( $account_url ); ?>#addresses" class="text-primary font-bold">Click here to view your Sanctuary Premises &amp; Addresses</a></p>
</noscript>

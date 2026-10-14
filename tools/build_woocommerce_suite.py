import os
import re

URL_REPLACEMENTS = [
    (r'href=["\']home\.html["\']', 'href="<?php echo esc_url( home_url( "/" ) ); ?>"'),
    (r'href=["\']index\.html["\']', 'href="<?php echo esc_url( home_url( "/" ) ); ?>"'),
    (r'href=["\']ayurveda\.html["\']', 'href="<?php echo esc_url( home_url( "/ayurveda/" ) ); ?>"'),
    (r'href=["\']vastu\.html["\']', 'href="<?php echo esc_url( home_url( "/vastu/" ) ); ?>"'),
    (r'href=["\']services\.html["\']', 'href="<?php echo esc_url( home_url( "/services/" ) ); ?>"'),
    (r'href=["\']consultancy\.html["\']', 'href="<?php echo esc_url( home_url( "/consultancy/" ) ); ?>"'),
    (r'href=["\']contact\.html["\']', 'href="<?php echo esc_url( home_url( "/contact/" ) ); ?>"'),
    (r'href=["\']gallery\.html["\']', 'href="<?php echo esc_url( home_url( "/gallery/" ) ); ?>"'),
    (r'href=["\']shop\.html["\']', 'href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>"'),
    (r'href=["\']cart\.html["\']', 'href="<?php echo esc_url( function_exists( "wc_get_cart_url" ) ? wc_get_cart_url() : home_url( "/cart/" ) ); ?>"'),
    (r'href=["\']checkout\.html["\']', 'href="<?php echo esc_url( function_exists( "wc_get_checkout_url" ) ? wc_get_checkout_url() : home_url( "/checkout/" ) ); ?>"'),
    (r'href=["\']account\.html["\']', 'href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>"'),
    (r'href=["\']login\.html["\']', 'href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>"'),
    (r'href=["\']registration\.html["\']', 'href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "myaccount" ) : home_url( "/my-account/" ) ); ?>"'),
    (r'href=["\']password reset\.html["\']', 'href="<?php echo esc_url( wp_lostpassword_url() ); ?>"'),
    (r'href=["\']book_your_consultation\.html["\']', 'href="<?php echo esc_url( home_url( "/book-your-consultation/" ) ); ?>"'),
    (r'href=["\']booking_confirmation\.html["\']', 'href="<?php echo esc_url( home_url( "/booking-confirmation/" ) ); ?>"'),
    (r'href=["\']blog\.html["\']', 'href="<?php echo esc_url( get_permalink( get_option( "page_for_posts" ) ) ?: home_url( "/blog/" ) ); ?>"'),
    (r'href=["\']search_result\.html["\']', 'href="<?php echo esc_url( home_url( "/?s=" ) ); ?>"'),
    (r'href=["\']single_product\.html["\']', 'href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>"'),
]

IMAGE_REPLACEMENTS = [
    (r'src=["\']images/monal_doc\.jpeg["\']', 'src="<?php echo esc_url( ANUKUL_URI . "/assets/images/monal_doc.jpeg" ); ?>"'),
    (r'src=["\']images/doctor\.jpg["\']', 'src="<?php echo esc_url( ANUKUL_URI . "/assets/images/doctor.jpg" ); ?>"'),
    (r'src=["\']images/doctor_hd\.jpg["\']', 'src="<?php echo esc_url( ANUKUL_URI . "/assets/images/doctor_hd.jpg" ); ?>"'),
    (r'src=["\']images/logo\.png["\']', 'src="<?php echo esc_url( anukul_get_logo_url() ); ?>"'),
]

def extract_main(filepath):
    with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
        html = f.read()
    m = re.search(r'<main[^>]*>(.*?)</main>', html, re.DOTALL | re.IGNORECASE)
    if not m:
        raise ValueError(f"No <main> tag in {filepath}")
    content = m.group(1).strip()
    for p, r in URL_REPLACEMENTS:
        content = re.sub(p, r, content)
    for p, r in IMAGE_REPLACEMENTS:
        content = re.sub(p, r, content)
    return content

# 1. Archive Product (Shop)
shop_content = extract_main('Main/shop.html')
archive_product_php = """<?php
/**
 * The Template for displaying product archives, including the main shop page
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header( 'shop' );
?>

""" + shop_content + """

<?php
get_footer( 'shop' );
"""
with open('wp-content/themes/anukul/woocommerce/archive-product.php', 'w', encoding='utf-8') as f:
    f.write(archive_product_php)
print("Generated: woocommerce/archive-product.php")

# 2. Single Product
single_content = extract_main('Main/single_product.html')
single_product_php = """<?php
/**
 * The Template for displaying all single products
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header( 'shop' );
?>

""" + single_content + """

<?php
get_footer( 'shop' );
"""
with open('wp-content/themes/anukul/woocommerce/single-product.php', 'w', encoding='utf-8') as f:
    f.write(single_product_php)
print("Generated: woocommerce/single-product.php")

# 3. Cart
cart_content = extract_main('Main/cart.html')
cart_php = """<?php
/**
 * Cart Page
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_cart' );
?>

""" + cart_content + """

<?php
do_action( 'woocommerce_after_cart' );
"""
with open('wp-content/themes/anukul/woocommerce/cart/cart.php', 'w', encoding='utf-8') as f:
    f.write(cart_php)
print("Generated: woocommerce/cart/cart.php")

# 4. Checkout
checkout_content = extract_main('Main/checkout.html')
checkout_php = """<?php
/**
 * Checkout Form
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );
?>

""" + checkout_content + """

<?php
do_action( 'woocommerce_after_checkout_form', $checkout );
"""
with open('wp-content/themes/anukul/woocommerce/checkout/form-checkout.php', 'w', encoding='utf-8') as f:
    f.write(checkout_php)
print("Generated: woocommerce/checkout/form-checkout.php")

# 5. Order Received / Thank you
thankyou_content = extract_main('Main/order_confirnation.html')
thankyou_php = """<?php
/**
 * Thankyou page (Order Confirmed)
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

""" + thankyou_content + """
"""
with open('wp-content/themes/anukul/woocommerce/checkout/thankyou.php', 'w', encoding='utf-8') as f:
    f.write(thankyou_php)
print("Generated: woocommerce/checkout/thankyou.php")

# 6. My Account
myaccount_content = extract_main('Main/account.html')
myaccount_php = """<?php
/**
 * My Account page
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

""" + myaccount_content + """
"""
with open('wp-content/themes/anukul/woocommerce/myaccount/my-account.php', 'w', encoding='utf-8') as f:
    f.write(myaccount_php)
print("Generated: woocommerce/myaccount/my-account.php")

# 7. Orders Tab
orders_content = extract_main('Main/client_portal_order_history.html')
orders_php = """<?php
/**
 * Orders history tab
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

""" + orders_content + """
"""
with open('wp-content/themes/anukul/woocommerce/myaccount/orders.php', 'w', encoding='utf-8') as f:
    f.write(orders_php)
print("Generated: woocommerce/myaccount/orders.php")

# 8. View Order Tab
view_order_content = extract_main('Main/client_order.html')
view_order_php = """<?php
/**
 * View Order details tab
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

""" + view_order_content + """
"""
with open('wp-content/themes/anukul/woocommerce/myaccount/view-order.php', 'w', encoding='utf-8') as f:
    f.write(view_order_php)
print("Generated: woocommerce/myaccount/view-order.php")

# 9. Addresses Tab
address_content = extract_main('Main/client_portfal_address.html')
address_php = """<?php
/**
 * My Addresses tab
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

""" + address_content + """
"""
with open('wp-content/themes/anukul/woocommerce/myaccount/my-address.php', 'w', encoding='utf-8') as f:
    f.write(address_php)
print("Generated: woocommerce/myaccount/my-address.php")

# 10. Login Form
login_content = extract_main('Main/login.html')
login_php = """<?php
/**
 * Login Form
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

""" + login_content + """
"""
with open('wp-content/themes/anukul/woocommerce/myaccount/form-login.php', 'w', encoding='utf-8') as f:
    f.write(login_php)
print("Generated: woocommerce/myaccount/form-login.php")

# 11. Lost Password
lost_content = extract_main('Main/password reset.html')
lost_php = """<?php
/**
 * Lost Password Form
 *
 * @package Anukul
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

""" + lost_content + """
"""
with open('wp-content/themes/anukul/woocommerce/myaccount/form-lost-password.php', 'w', encoding='utf-8') as f:
    f.write(lost_php)
print("Generated: woocommerce/myaccount/form-lost-password.php")

print("\nAll WooCommerce templates generated successfully!")

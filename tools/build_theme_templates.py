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
    (r'href=["\']book_your_consultation\.html\?type=([^"\']+)["\']', r'href="<?php echo esc_url( add_query_arg( "type", "\1", home_url( "/book-your-consultation/" ) ) ); ?>"'),
    (r'href=["\']booking_confirmation\.html["\']', 'href="<?php echo esc_url( home_url( "/booking-confirmation/" ) ); ?>"'),
    (r'href=["\']blog\.html["\']', 'href="<?php echo esc_url( get_permalink( get_option( "page_for_posts" ) ) ?: home_url( "/blog/" ) ); ?>"'),
    (r'href=["\']search_result\.html["\']', 'href="<?php echo esc_url( home_url( "/?s=" ) ); ?>"'),
    (r'href=["\']single_product\.html["\']', 'href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>"'),
    (r'href=["\']product_categories\.html["\']', 'href="<?php echo esc_url( function_exists( "wc_get_page_permalink" ) ? wc_get_page_permalink( "shop" ) : home_url( "/shop/" ) ); ?>"'),
]

IMAGE_REPLACEMENTS = [
    (r'src=["\']images/monal_doc\.jpeg["\']', 'src="<?php echo esc_url( ANUKUL_URI . "/assets/images/monal_doc.jpeg" ); ?>"'),
    (r'src=["\']images/doctor\.jpg["\']', 'src="<?php echo esc_url( ANUKUL_URI . "/assets/images/doctor.jpg" ); ?>"'),
    (r'src=["\']images/doctor_hd\.jpg["\']', 'src="<?php echo esc_url( ANUKUL_URI . "/assets/images/doctor_hd.jpg" ); ?>"'),
    (r'src=["\']images/logo\.png["\']', 'src="<?php echo esc_url( anukul_get_logo_url() ); ?>"'),
    (r'url\([\'"]images/monal_doc\.jpeg[\'"]\)', "url('<?php echo esc_url( ANUKUL_URI . '/assets/images/monal_doc.jpeg' ); ?>')"),
    (r'url\([\'"]images/doctor\.jpg[\'"]\)', "url('<?php echo esc_url( ANUKUL_URI . '/assets/images/doctor.jpg' ); ?>')"),
    (r'url\([\'"]images/doctor_hd\.jpg[\'"]\)', "url('<?php echo esc_url( ANUKUL_URI . '/assets/images/doctor_hd.jpg' ); ?>')"),
]

def extract_main_content(filepath):
    with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
        html = f.read()

    # Match everything between <main...> and </main>
    m = re.search(r'<main[^>]*>(.*?)</main>', html, re.DOTALL | re.IGNORECASE)
    if not m:
        raise ValueError(f"Could not find <main> block in {filepath}")
    
    content = m.group(1).strip()
    
    # Apply replacements
    for pattern, repl in URL_REPLACEMENTS:
        content = re.sub(pattern, repl, content)
        
    for pattern, repl in IMAGE_REPLACEMENTS:
        content = re.sub(pattern, repl, content)
        
    return content

PAGE_MAP = {
    'home.html': ('front-page.php', 'Front Page - Editorial Master'),
    'ayurveda.html': ('template-ayurveda.php', 'Ayurveda Consultation & Principles'),
    'vastu.html': ('template-vastu.php', 'Vastu Shastra & Space Harmonisation'),
    'services.html': ('template-services.php', 'Clinical Pathways & Services'),
    'consultancy.html': ('template-consultancy.php', 'Clinical Consultancy & Leadership'),
    'contact.html': ('template-contact.php', 'Contact & Sanctuary Desk'),
    'gallery.html': ('template-gallery.php', 'Visual Archive & Gallery'),
    'book_your_consultation.html': ('template-booking.php', 'Book Your Consultation'),
    'booking_confirmation.html': ('template-booking-confirmation.php', 'Booking Confirmation Pass'),
}

theme_dir = 'wp-content/themes/anukul'

for src_name, (dest_name, template_name) in PAGE_MAP.items():
    src_path = os.path.join('Main', src_name)
    dest_path = os.path.join(theme_dir, dest_name)
    
    body_content = extract_main_content(src_path)
    
    php_header = "<?php\n"
    if dest_name.startswith('template-'):
        php_header += f"/**\n * Template Name: {template_name}\n *\n * @package Anukul\n */\n\n"
    else:
        php_header += f"/**\n * {template_name}\n *\n * @package Anukul\n */\n\n"
    
    php_header += "if ( ! defined( 'ABSPATH' ) ) {\n    exit;\n}\n\n"
    php_header += "get_header();\n?>\n\n"
    
    php_footer = "\n\n<?php\nget_footer();\n"
    
    full_php = php_header + body_content + php_footer
    
    with open(dest_path, 'w', encoding='utf-8') as f:
        f.write(full_php)
        
    print(f"Generated: {dest_name} ({len(full_php):,} chars) from {src_name}")

print("\nAll core page templates generated successfully!")

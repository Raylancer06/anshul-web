import urllib.request
import re

pages = [
    ('/', 'Home'),
    ('/ayurveda/', 'Ayurveda'),
    ('/vastu/', 'Vastu'),
    ('/services/', 'Services'),
    ('/consultancy/', 'Consultancy'),
    ('/gallery/', 'Gallery'),
    ('/contact/', 'Contact'),
    ('/book-your-consultation/', 'Book Consultation'),
    ('/booking-confirmation/', 'Booking Confirmation'),
    ('/blog/', 'Blog'),
    ('/shop/', 'Shop'),
    ('/cart/', 'Cart'),
    ('/checkout/', 'Checkout'),
    ('/my-account/', 'My Account')
]

print("=== VERIFYING ALL LIVE PAGES ===")
for path, name in pages:
    url = f"http://localhost:8000{path}"
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        res = urllib.request.urlopen(req)
        status = res.status
        html = res.read().decode('utf-8', errors='ignore')
        
        has_nav_li = '<li id="menu-item-' in html
        has_mandala = 'mandalaSpin' in html
        has_layer_base = '@layer base' in html
        has_tailwind = 'cdn.tailwindcss.com' in html
        has_fontsize = 'display-mobile' in html
        sections = len(re.findall(r'<section\b', html))
        
        print(f"[{status}] {name:22} | Secs: {sections:2} | nav_li: {str(has_nav_li):5} | mandala: {str(has_mandala):5} | tailwind: {str(has_tailwind):5} | fontSize: {str(has_fontsize):5}")
    except Exception as e:
        print(f"[ERR] {name:22} -> {e}")

print("=== VERIFICATION COMPLETE ===")

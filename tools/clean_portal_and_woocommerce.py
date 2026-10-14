import os
import re
import glob

MAIN_DIR = r"c:\Users\0610s\Music\Anshul_web\Anshul\Main"

HEADER_ACCOUNT_ACTIVE = '''<header class="fixed top-0 w-full z-50 bg-[#F7F1E3]/95 backdrop-blur-md border-b border-[#E8D8BC] shadow-[0_1px_8px_rgba(0,0,0,0.03)]"><div class="h-20 max-w-[1440px] mx-auto px-6 lg:px-margin flex items-center justify-between gap-4"><a href="home.html" data-path="home" class="flex items-center select-none py-1"><img src="images/logo.png" alt="ANUKUL Logo" class="h-14 sm:h-16 w-auto max-h-[64px] object-contain"></a><nav class="hidden xl:flex items-center gap-6 lg:gap-space-md" data-active-classes="text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]"><a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="home" href="home.html">Home</a><a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="ayurveda" href="ayurveda.html">Ayurveda</a><a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="vastu" href="vastu.html">Vastu</a><a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="services" href="services.html">Services</a><a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="shop" href="shop.html">Shop</a><a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="blog" href="blog.html">Blog</a><a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="gallery" href="gallery.html">Gallery</a><a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="contact" href="contact.html">Contact</a></nav><div class="flex items-center gap-2 sm:gap-3"><a href="search_result.html" data-path="search" title="Search Wisdom &amp; Remedies" class="flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors"><span class="material-symbols-outlined text-[22px]">search</span></a><a href="cart.html" data-path="cart" title="Shopping Cart" class="relative flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors"><span class="material-symbols-outlined text-[22px]">shopping_bag</span><span class="absolute top-1 right-1 w-4 h-4 bg-secondary text-on-secondary text-[10px] font-bold rounded-full flex items-center justify-center leading-none">2</span></a><a href="book_your_consultation.html" data-path="book-consultation" class="hidden sm:inline-flex items-center justify-center bg-[#1F4D3A] text-[#F7F1E3] font-label-md text-label-md px-5 py-2.5 rounded-lg tracking-wider uppercase transition-colors duration-200 hover:bg-secondary shadow-sm font-semibold">BOOK CONSULTATION</a><a href="account.html" data-path="account" title="Client Sanctuary Portal" class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary hover:bg-secondary transition-colors shadow-sm ring-2 ring-[#B38A3E]"><span class="material-symbols-outlined text-[18px]">person</span></a><button id="mobile-menu-btn" type="button" aria-label="Toggle navigation" class="xl:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg text-primary hover:bg-[#E8D8BC]/60 focus:outline-none transition-colors"><span class="material-symbols-outlined text-[26px]" id="mobile-menu-icon">menu</span></button></div></div><div id="mobile-menu" class="hidden xl:hidden w-full bg-[#F7F1E3] border-b border-[#E8D8BC] shadow-lg transition-all"><div class="px-6 py-5 space-y-4 max-h-[calc(100vh-80px)] overflow-y-auto"><nav class="flex flex-col space-y-1.5"><a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="home" href="home.html">Home</a><a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="ayurveda" href="ayurveda.html">Ayurveda</a><a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="vastu" href="vastu.html">Vastu</a><a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="services" href="services.html">Services</a><a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="shop" href="shop.html">Shop</a><a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="blog" href="blog.html">Blog</a><a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="gallery" href="gallery.html">Gallery</a><a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="contact" href="contact.html">Contact</a></nav><div class="pt-4 border-t border-[#E8D8BC] flex flex-col gap-3"><a href="book_your_consultation.html" data-path="book-consultation" class="w-full text-center bg-[#1F4D3A] text-[#F7F1E3] font-label-md text-label-md py-3 rounded-lg tracking-wider uppercase font-semibold hover:bg-secondary transition-colors shadow-sm">BOOK CONSULTATION</a><div class="grid grid-cols-3 gap-2 pt-1 text-center text-xs font-label-md"><a href="search_result.html" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors"><span class="material-symbols-outlined text-[20px] mb-1">search</span>Search</a><a href="cart.html" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors relative"><span class="material-symbols-outlined text-[20px] mb-1">shopping_bag</span>Cart (2)</a><a href="account.html" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors"><span class="material-symbols-outlined text-[20px] mb-1">person</span>Account</a></div></div></div></div><script>(function(){var btn=document.getElementById('mobile-menu-btn');var menu=document.getElementById('mobile-menu');var icon=document.getElementById('mobile-menu-icon');if(btn&&menu){btn.onclick=function(){var isHidden=menu.classList.contains('hidden');if(isHidden){menu.classList.remove('hidden');if(icon)icon.textContent='close';}else{menu.classList.add('hidden');if(icon)icon.textContent='menu';}};}})();</script></header>'''

PORTAL_FILES = [
    "account.html",
    "client_portfal_address.html",
    "client_portal_order_history.html",
    "client_order.html"
]

def clean_portal_page(filename):
    filepath = os.path.join(MAIN_DIR, filename)
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()

    # 1. Remove the fixed left sidebar: <aside class="fixed left-0 top-0 h-full w-72 ...">...</aside>
    # Match from <aside class="fixed left-0 top-0 h-full w-72 to </aside>
    aside_pattern = re.compile(r'<aside class="fixed left-0 top-0 h-full w-72[^>]*>[\s\S]*?</aside>', re.DOTALL)
    if not aside_pattern.search(content):
        print(f"Warning: No fixed aside found in {filename}")
    else:
        content = aside_pattern.sub('', content)
        print(f"Removed fixed aside in {filename}")

    # 2. Remove <div class="pl-72">
    content = re.sub(r'<div class="pl-72">', '', content)

    # 3. Replace the offset header <header class="fixed top-0 left-72 right-0... with the standard unified header
    old_header_pattern = re.compile(r'<header class="fixed top-0 left-72 right-0[^>]*>[\s\S]*?</header>', re.DOTALL)
    if old_header_pattern.search(content):
        content = old_header_pattern.sub(HEADER_ACCOUNT_ACTIVE, content)
        print(f"Replaced offset header with standard header in {filename}")
    else:
        print(f"Warning: Old offset header not found in {filename}")

    # 4. Remove the extra closing </div> before </footer> or at the bottom
    # Look for </div></main><footer or </main></div></div>...
    # In account.html: </div></main><footer...
    # In client_portfal_address.html: </div></body></html> or </div></footer>
    # Let's cleanly balance closing tags
    # If there was a <div class="pl-72">, there was one corresponding </div> right before </footer> or </body>
    content = re.sub(r'</div>\s*<footer', '<footer', content)
    content = re.sub(r'</div>\s*</body>', '</body>', content)

    # 5. Fix <main> tag to have standard width and styling
    content = re.sub(r'<main class="relative pt-20 bg-surface min-h-screen">', '<main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)] flex-grow">', content)
    content = re.sub(r'<main class="relative pt-20 w-full px-8 bg-surface">', '<main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)] flex-grow">', content)

    # Ensure body tag is clean
    content = re.sub(r'<body class="bg-surface font-body-md text-on-surface antialiased">', '<body class="bg-surface font-body-md text-on-surface antialiased min-h-screen flex flex-col">', content)

    with open(filepath, "w", encoding="utf-8") as f:
        f.write(content)

# Clean portal files
for pf in PORTAL_FILES:
    clean_portal_page(pf)

# Now clean WooCommerce references across all files
WOO_REPLACEMENTS = [
    ("WooCommerce Account", "Client Sanctuary Account"),
    ("WooCommerce Core", "Sanctuary Core"),
    ("WooCommerce Verified", "Sanctuary Verified"),
    ("WooCommerce Standard Form", "Sanctuary Address Form"),
    ("WooCommerce database", "Sanctuary profile"),
    ("WooCommerce 256-Bit Cryptographic Vault", "Sanctuary 256-Bit Cryptographic Vault"),
    ("WooCommerce 256-bit SSL", "Sanctuary 256-bit SSL"),
    ("WooCommerce Test Mode:", "Secure Test Mode:"),
    ("WooCommerce Simulation Bar", "Simulation Bar"),
    ("Simulate WooCommerce webhook", "Simulate gateway webhook"),
    ("WooCommerce Login Form", "Login Form"),
    ("WooCommerce Registration", "Sanctuary Registration"),
    ("WooCommerce Password Reset", "Password Reset"),
    ("WooCommerce Category", "Category"),
    ("WooCommerce Orders", "Sanctuary Orders"),
    ("WooCommerce", "ANUKUL"),
    ("woocommerce", "anukul"),
]

all_html = glob.glob(os.path.join(MAIN_DIR, "*.html"))
for html_path in all_html:
    with open(html_path, "r", encoding="utf-8") as f:
        file_text = f.read()

    changed = False
    for old_str, new_str in WOO_REPLACEMENTS:
        if old_str in file_text:
            file_text = file_text.replace(old_str, new_str)
            changed = True

    if changed:
        with open(html_path, "w", encoding="utf-8") as f:
            f.write(file_text)
        print(f"Cleaned WooCommerce strings in {os.path.basename(html_path)}")

print("Done processing!")

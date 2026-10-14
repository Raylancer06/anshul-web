import os
import re
import glob

NAV_ITEMS = [
    ("home", "Home", "home.html"),
    ("ayurveda", "Ayurveda", "ayurveda.html"),
    ("vastu", "Vastu", "vastu.html"),
    ("services", "Services", "services.html"),
    ("shop", "Shop", "shop.html"),
    ("blog", "Blog", "blog.html"),
    ("gallery", "Gallery", "gallery.html"),
    ("contact", "Contact", "contact.html"),
]

PAGE_MAP = {
    "home.html": "home",
    "ayurveda.html": "ayurveda",
    "vastu.html": "vastu",
    "services.html": "services",
    "consultancy.html": "services",
    "shop.html": "shop",
    "single_product.html": "shop",
    "product_categories.html": "shop",
    "cart.html": "cart",
    "checkout.html": "checkout",
    "failed_payment.html": "checkout",
    "order_confirnation.html": "shop",
    "blog.html": "blog",
    "gallery.html": "gallery",
    "contact.html": "contact",
    "book_your_consultation.html": "book_consultation",
    "booking_confirmation.html": "book_consultation",
    "account.html": "account",
    "login.html": "account",
    "registration.html": "account",
    "password reset.html": "account",
    "search_result.html": "search",
    "client_order.html": "account",
    "client_portal_order_history.html": "account",
    "client_portfal_address.html": "account",
}

PORTAL_PAGES = {
    "account.html",
    "client_order.html",
    "client_portal_order_history.html",
    "client_portfal_address.html",
}

MASTER_TAILWIND_CONFIG = '''<script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{"colors":{"outline-variant":"#c0c9c2","error-container":"#ffdad6","on-tertiary-fixed":"#400012","surface-container":"#f6ece4","on-secondary-fixed":"#311300","surface-dim":"#e2d8d0","on-secondary-container":"#6e3300","primary-fixed-dim":"#a1d1b8","tertiary":"#5d0f24","on-primary-fixed":"#002114","primary":"#023625","on-primary-fixed-variant":"#214f3c","secondary-fixed-dim":"#ffb688","surface-tint":"#3a6753","on-secondary":"#ffffff","primary-container":"#1f4d3a","surface-variant":"#ebe1d9","error":"#ba1a1a","on-secondary-fixed-variant":"#733600","background":"#fff8f4","on-background":"#1f1b16","surface-container-highest":"#ebe1d9","surface-container-low":"#fcf2ea","on-error":"#ffffff","on-primary":"#ffffff","on-tertiary":"#ffffff","on-surface":"#1f1b16","secondary-container":"#ff964c","on-tertiary-fixed-variant":"#7d283a","surface":"#fff8f4","tertiary-fixed-dim":"#ffb2bc","on-tertiary-container":"#ff93a4","surface-container-high":"#f1e6de","on-error-container":"#93000a","tertiary-container":"#7b2739","secondary-fixed":"#ffdbc7","tertiary-fixed":"#ffd9dd","on-surface-variant":"#414944","outline":"#717973","secondary":"#974800","primary-fixed":"#bceed3","inverse-surface":"#352f2a","inverse-primary":"#a1d1b8","inverse-on-surface":"#f9efe7","surface-bright":"#fff8f4","surface-container-lowest":"#ffffff","on-primary-container":"#8dbda4"},"borderRadius":{"DEFAULT":"0.125rem","lg":"0.25rem","xl":"0.5rem","full":"0.75rem"},"spacing":{"space-lg":"1.75rem","space-md":"1rem","gutter-lg":"2.5rem","space-2xl":"5rem","space-xs":"0.25rem","space-sm":"0.5rem","margin-md":"3rem","space-xl":"3rem","margin":"1.5rem","margin-lg":"5rem","gutter":"1.5rem"},"fontFamily":{"body-lg":["Manrope"],"body-sm":["Manrope"],"display-mobile":["EB Garamond"],"label-sm":["Manrope"],"display":["EB Garamond"],"headline-sm":["EB Garamond"],"body-md":["Manrope"],"editorial-quote":["EB Garamond"],"headline-lg":["EB Garamond"],"headline-lg-mobile":["EB Garamond"],"label-md":["Manrope"],"headline-md":["EB Garamond"]},"fontSize":{"body-lg":["18px",{"lineHeight":"28px","fontWeight":"400"}],"body-sm":["13px",{"lineHeight":"20px","fontWeight":"400"}],"display-mobile":["38px",{"lineHeight":"44px","letterSpacing":"-0.01em","fontWeight":"400"}],"label-sm":["10px",{"lineHeight":"14px","letterSpacing":"0.12em","fontWeight":"700"}],"display":["56px",{"lineHeight":"64px","letterSpacing":"-0.01em","fontWeight":"400"}],"headline-sm":["22px",{"lineHeight":"28px","fontWeight":"600"}],"body-md":["15px",{"lineHeight":"24px","fontWeight":"400"}],"editorial-quote":["26px",{"lineHeight":"36px","letterSpacing":"0.01em","fontWeight":"400"}],"headline-lg":["40px",{"lineHeight":"48px","fontWeight":"400"}],"headline-lg-mobile":["30px",{"lineHeight":"36px","fontWeight":"500"}],"label-md":["12px",{"lineHeight":"16px","letterSpacing":"0.08em","fontWeight":"600"}],"headline-md":["28px",{"lineHeight":"36px","fontWeight":"500"}]}}}};</script>'''

MASTER_FONTS_AND_ICONS = '''<link href="https://fonts.googleapis.com" rel="preconnect"><link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"><link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..700;1,400..700&amp;family=Manrope:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">'''

HEADER_TEMPLATE = '''<header class="fixed top-0 w-full z-50 bg-[#F7F1E3]/95 backdrop-blur-md border-b border-[#E8D8BC] shadow-[0_1px_8px_rgba(0,0,0,0.03)]"><div class="h-20 max-w-[1440px] mx-auto px-6 lg:px-margin flex items-center justify-between gap-4"><a href="home.html" data-path="home" class="flex items-center select-none py-1"><img src="images/logo.png" alt="ANUKUL Logo" class="h-14 sm:h-16 w-auto max-h-[64px] object-contain"></a><nav class="hidden xl:flex items-center gap-6 lg:gap-space-md" data-active-classes="text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]">__DESKTOP_NAV__</nav><div class="flex items-center gap-2 sm:gap-3"><a href="search_result.html" data-path="search" title="Search Wisdom &amp; Remedies" class="flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors__SEARCH_ACTIVE__"><span class="material-symbols-outlined text-[22px]">search</span></a><a href="cart.html" data-path="cart" title="Shopping Cart" class="relative flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors__CART_ACTIVE__"><span class="material-symbols-outlined text-[22px]">shopping_bag</span><span class="absolute top-1 right-1 w-4 h-4 bg-secondary text-on-secondary text-[10px] font-bold rounded-full flex items-center justify-center leading-none">2</span></a><a href="book_your_consultation.html" data-path="book-consultation" class="hidden sm:inline-flex items-center justify-center bg-[#1F4D3A] text-[#F7F1E3] font-label-md text-label-md px-5 py-2.5 rounded-lg tracking-wider uppercase transition-colors duration-200 hover:bg-secondary shadow-sm font-semibold">BOOK CONSULTATION</a><a href="account.html" data-path="account" title="Client Sanctuary Portal" class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary hover:bg-secondary transition-colors shadow-sm__ACCOUNT_ACTIVE__"><span class="material-symbols-outlined text-[18px]">person</span></a><button id="mobile-menu-btn" type="button" aria-label="Toggle navigation" class="xl:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg text-primary hover:bg-[#E8D8BC]/60 focus:outline-none transition-colors"><span class="material-symbols-outlined text-[26px]" id="mobile-menu-icon">menu</span></button></div></div><div id="mobile-menu" class="hidden xl:hidden w-full bg-[#F7F1E3] border-b border-[#E8D8BC] shadow-lg transition-all"><div class="px-6 py-5 space-y-4 max-h-[calc(100vh-80px)] overflow-y-auto"><nav class="flex flex-col space-y-1.5">__MOBILE_NAV__</nav><div class="pt-4 border-t border-[#E8D8BC] flex flex-col gap-3"><a href="book_your_consultation.html" data-path="book-consultation" class="w-full text-center bg-[#1F4D3A] text-[#F7F1E3] font-label-md text-label-md py-3 rounded-lg tracking-wider uppercase font-semibold hover:bg-secondary transition-colors shadow-sm">BOOK CONSULTATION</a><div class="grid grid-cols-3 gap-2 pt-1 text-center text-xs font-label-md"><a href="search_result.html" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors"><span class="material-symbols-outlined text-[20px] mb-1">search</span>Search</a><a href="cart.html" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors relative"><span class="material-symbols-outlined text-[20px] mb-1">shopping_bag</span>Cart (2)</a><a href="account.html" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors"><span class="material-symbols-outlined text-[20px] mb-1">person</span>Account</a></div></div></div></div><script>(function(){var btn=document.getElementById('mobile-menu-btn');var menu=document.getElementById('mobile-menu');var icon=document.getElementById('mobile-menu-icon');if(btn&&menu){btn.onclick=function(){var isHidden=menu.classList.contains('hidden');if(isHidden){menu.classList.remove('hidden');if(icon)icon.textContent='close';}else{menu.classList.add('hidden');if(icon)icon.textContent='menu';}};}})();</script></header>'''

MASTER_FOOTER = '''<footer class="w-full bg-[#1F4D3A] text-[#F7F1E3] border-t border-[#B38A3E]/30"><div class="max-w-[1440px] mx-auto px-6 lg:px-margin pt-space-xl pb-space-lg"><div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-gutter-lg pb-space-xl border-b border-[#B38A3E]/20"><div class="md:col-span-5 flex flex-col justify-start space-y-space-sm"><div class="flex flex-col items-start"><a href="home.html" data-path="home" class="inline-block select-none mb-2"><img src="images/logo.png" alt="ANUKUL Logo" class="h-16 w-auto object-contain bg-[#F7F1E3] p-1.5 rounded shadow-sm"></a></div><p class="font-body-md text-body-md text-surface-container-high/90 max-w-md pt-2">ANUKUL Ayur Vastu Harmony Clinic — Health • Space • Lifestyle • Harmony</p><p class="font-body-sm text-body-sm text-outline-variant max-w-sm pt-1">Anchored in classical Vedic sciences, spatial alignment, and holistic constitutional balance for serene modern living.</p></div><div class="md:col-span-4 flex flex-col justify-start space-y-3"><h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold">Explorations</h3><nav class="grid grid-cols-2 gap-y-2 gap-x-4"><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="home" href="home.html">Home</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="ayurveda" href="ayurveda.html">Ayurveda</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="vastu" href="vastu.html">Vastu</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="services" href="services.html">Services</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="shop" href="shop.html">Shop</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="blog" href="blog.html">Blog</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="gallery" href="gallery.html">Gallery</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="contact" href="contact.html">Contact</a></nav></div><div class="md:col-span-3 flex flex-col justify-start space-y-3"><h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold">Sanctuary Hours</h3><p class="font-body-sm text-body-sm text-surface-container-high/80">Monday — Saturday<br>08:00 AM – 07:00 PM IST</p><p class="font-body-sm text-body-sm text-surface-container-high/80 pt-2"><span class="text-[#B38A3E] font-medium">Location:</span> Prime Vedic Enclave, Cultural Quarter</p></div></div><div class="pt-space-md flex flex-col sm:flex-row items-center justify-between gap-4"><p class="font-body-sm text-body-sm text-outline-variant text-center sm:text-left">© 2025 ANUKUL Ayur Vastu Harmony Clinic. All rights reserved. Responsible Vedic Clinical Practice.</p><div class="flex items-center gap-6 font-body-sm text-body-sm text-surface-container-high/70"><a class="hover:text-[#B38A3E] transition-colors" data-path="privacy-policy" href="contact.html#privacy">Privacy Policy</a><span class="text-[#B38A3E]/40">•</span><a class="hover:text-[#B38A3E] transition-colors" data-path="terms" href="contact.html#terms">Terms</a><span class="text-[#B38A3E]/40">•</span><a class="hover:text-[#B38A3E] transition-colors" data-path="disclaimer" href="contact.html#disclaimer">Disclaimer</a></div></div></div></footer>'''

def build_desktop_nav(active_page):
    links = []
    for path_id, label, filename in NAV_ITEMS:
        if active_page == path_id:
            cls = "font-label-md text-label-md uppercase transition-colors tracking-widest text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]"
            aria = ' aria-current="page"'
        else:
            cls = "font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest"
            aria = ""
        links.append(f'<a{aria} class="{cls}" data-path="{path_id}" href="{filename}">{label}</a>')
    return "".join(links)

def build_mobile_nav(active_page):
    links = []
    for path_id, label, filename in NAV_ITEMS:
        if active_page == path_id:
            cls = "py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest bg-surface-container text-primary font-semibold transition-colors"
        else:
            cls = "py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors"
        links.append(f'<a class="{cls}" data-path="{path_id}" href="{filename}">{label}</a>')
    return "".join(links)

def build_header(active_page):
    d_nav = build_desktop_nav(active_page)
    m_nav = build_mobile_nav(active_page)
    cart_act = " bg-[#E8D8BC]/80 text-secondary" if active_page == "cart" else ""
    search_act = " bg-[#E8D8BC]/80 text-secondary" if active_page == "search" else ""
    acc_act = " ring-2 ring-[#B38A3E]" if active_page == "account" else ""

    h = HEADER_TEMPLATE.replace("__DESKTOP_NAV__", d_nav)
    h = h.replace("__MOBILE_NAV__", m_nav)
    h = h.replace("__SEARCH_ACTIVE__", search_act)
    h = h.replace("__CART_ACTIVE__", cart_act)
    h = h.replace("__ACCOUNT_ACTIVE__", acc_act)
    return h

DATA_PATH_MAPPINGS = {
    'home': 'home.html',
    'ayurveda': 'ayurveda.html',
    'vastu': 'vastu.html',
    'services': 'services.html',
    'shop': 'shop.html',
    'blog': 'blog.html',
    'gallery': 'gallery.html',
    'contact': 'contact.html',
    'book-consultation': 'book_your_consultation.html',
    'consultation-booking': 'book_your_consultation.html',
    'cart': 'cart.html',
    'checkout': 'checkout.html',
    'account': 'account.html',
    'my-account': 'account.html',
    'account-dashboard': 'account.html',
    'portal-overview': 'account.html',
    'orders': 'client_portal_order_history.html',
    'account-orders': 'client_portal_order_history.html',
    'addresses': 'client_portfal_address.html',
    'account-addresses': 'client_portfal_address.html',
    'login': 'login.html',
    'register': 'registration.html',
    'forgot-password': 'password%20reset.html',
    'product': 'single_product.html',
    'product-kansa-vatki': 'single_product.html',
    'product-kansa-wand': 'single_product.html',
    'shop-tailas': 'shop.html',
    'shop-kansa': 'shop.html',
    'shop-vastu': 'shop.html',
    'privacy-policy': 'contact.html#privacy',
    'terms': 'contact.html#terms',
    'disclaimer': 'contact.html#disclaimer',
    'terms-of-service': 'contact.html#terms',
    'clinical-disclaimer': 'contact.html#disclaimer',
    'ethics-charter': 'contact.html#ethics',
    'ethical-code': 'contact.html#ethics',
    'vastu-terms': 'contact.html#terms',
    'prescriptions': 'account.html',
    'vastu-audits': 'vastu.html',
    'consultation-sessions': 'book_your_consultation.html',
    'account-consultations': 'book_your_consultation.html',
    'account-downloads': 'account.html',
    'account-payment-methods': 'account.html',
    'account-details': 'account.html',
}

def update_links_in_content(content):
    for dp, url in DATA_PATH_MAPPINGS.items():
        pattern1 = rf'(data-path="{dp}"[^>]*?)href="#"'
        content = re.sub(pattern1, rf'\1href="{url}"', content)
        pattern2 = rf'href="#"([^>]*?data-path="{dp}")'
        content = re.sub(pattern2, rf'href="{url}"\1', content)

    content = content.replace('href="#consultation-flow"', 'href="book_your_consultation.html"')
    content = content.replace('href="#consultation-tier"', 'href="book_your_consultation.html"')
    return content

def update_file(filepath):
    filename = os.path.basename(filepath)
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    active_page = PAGE_MAP.get(filename, "home")
    is_portal = filename in PORTAL_PAGES

    # 1. Update <head>
    if 'bootstrap-icons' not in content:
        content = content.replace('</head>', '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"></head>')

    if 'tailwind.config=' not in content:
        content = content.replace('</head>', f'{MASTER_TAILWIND_CONFIG}</head>')
    else:
        content = re.sub(r'<script id="tailwind-config">tailwind\.config\s*=\s*\{[\s\S]*?\};</script>', MASTER_TAILWIND_CONFIG, content)

    if 'EB+Garamond' not in content or 'Manrope' not in content:
        content = content.replace('<head>', f'<head>{MASTER_FONTS_AND_ICONS}')

    # 2. Update Header
    if not is_portal:
        content = re.sub(r'<header[\s\S]*?</header>', build_header(active_page), content, count=1)
    else:
        # Portal page: wire links
        content = re.sub(r'<a class="flex flex-col"[^>]*?data-path="home"[^>]*?href="#"', '<a class="flex flex-col" data-path="home" href="home.html"', content)
        content = re.sub(r'data-path="home"[^>]*?href="#"', 'data-path="home" href="home.html"', content)
        content = re.sub(r'data-path="shop"[^>]*?href="#"', 'data-path="shop" href="shop.html"', content)
        content = re.sub(r'data-path="book-consultation"[^>]*?href="#"', 'data-path="book-consultation" href="book_your_consultation.html"', content)
        content = re.sub(r'data-path="account-dashboard"[^>]*?href="#"', 'data-path="account-dashboard" href="account.html"', content)
        content = re.sub(r'data-path="account-orders"[^>]*?href="#"', 'data-path="account-orders" href="client_portal_order_history.html"', content)
        content = re.sub(r'data-path="orders"[^>]*?href="#"', 'data-path="orders" href="client_portal_order_history.html"', content)
        content = re.sub(r'data-path="addresses"[^>]*?href="#"', 'data-path="addresses" href="client_portfal_address.html"', content)
        content = re.sub(r'data-path="account-addresses"[^>]*?href="#"', 'data-path="account-addresses" href="client_portfal_address.html"', content)

    # 3. Update Footer
    if not is_portal:
        if '<footer' in content:
            content = re.sub(r'<footer[\s\S]*?</footer>', MASTER_FOOTER, content, count=1)
        else:
            content = content.replace('</body>', f'{MASTER_FOOTER}</body>')
    else:
        if '<footer' in content:
            content = re.sub(r'<footer[\s\S]*?</footer>', MASTER_FOOTER, content, count=1)
        else:
            if '</div></body>' in content:
                content = content.replace('</div></body>', f'{MASTER_FOOTER}</div></body>')
            else:
                content = content.replace('</body>', f'{MASTER_FOOTER}</body>')

    # 4. Update internal links
    content = update_links_in_content(content)

    # 5. Specific Page Link Refinements
    if filename == "ayurveda.html":
        content = re.sub(r'href="#"([^>]*?>\s*BOOK AN AYURVEDA CONSULTATION)', r'href="book_your_consultation.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*CONTACT ANUKUL)', r'href="contact.html"\1', content, flags=re.I)
    elif filename == "vastu.html":
        content = re.sub(r'href="#"([^>]*?>\s*Book a Vastu Consultation)', r'href="book_your_consultation.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Contact ANUKUL)', r'href="contact.html"\1', content, flags=re.I)
    elif filename == "cart.html":
        content = re.sub(r'href="#"([^>]*?>\s*PROCEED TO CHECKOUT)', r'href="checkout.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*CONTINUE SHOPPING)', r'href="shop.html"\1', content, flags=re.I)
    elif filename == "checkout.html":
        content = re.sub(r'href="#"([^>]*?>\s*PAY &amp; CONFIRM ORDER)', r'href="order_confirnation.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*PLACE ORDER)', r'href="order_confirnation.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Log in here)', r'href="login.html"\1', content, flags=re.I)
    elif filename == "order_confirnation.html":
        content = re.sub(r'href="#"([^>]*?>\s*VIEW ORDER STATUS)', r'href="client_order.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*CONTINUE SHOPPING)', r'href="shop.html"\1', content, flags=re.I)
    elif filename == "failed_payment.html":
        content = re.sub(r'href="#"([^>]*?>\s*RETRY PAYMENT)', r'href="checkout.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*RETURN TO CART)', r'href="cart.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*CONTACT CONCIERGE)', r'href="contact.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Sanctuary Home)', r'href="home.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Vedic Dispensary)', r'href="shop.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Checkout)', r'href="checkout.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Change Delivery Address or Items)', r'href="cart.html"\1', content, flags=re.I)
    elif filename == "book_your_consultation.html":
        content = re.sub(r'href="#"([^>]*?>\s*CONFIRM APPOINTMENT)', r'href="booking_confirmation.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*PROCEED TO CONFIRMATION)', r'href="booking_confirmation.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Return to Sanctuary Home)', r'href="home.html"\1', content, flags=re.I)
    elif filename == "booking_confirmation.html":
        content = re.sub(r'href="#"([^>]*?>\s*VIEW IN CLIENT PORTAL)', r'href="account.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*RETURN TO SANCTUARY HOME)', r'href="home.html"\1', content, flags=re.I)
    elif filename == "login.html":
        content = re.sub(r'href="#"([^>]*?>\s*Create New Sanctuary Account)', r'href="registration.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Forgot Password\?)', r'href="password%20reset.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*SIGN IN)', r'href="account.html"\1', content, flags=re.I)
    elif filename == "registration.html":
        content = re.sub(r'href="#"([^>]*?>\s*Already have an account\? Sign In)', r'href="login.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*CREATE ACCOUNT)', r'href="account.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Privacy Policy)', r'href="contact.html#privacy"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Terms of Service)', r'href="contact.html#terms"\1', content, flags=re.I)
    elif filename == "password reset.html":
        content = re.sub(r'href="#"([^>]*?>\s*Remember your credentials\? Sign In)', r'href="login.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Return to Login)', r'href="login.html"\1', content, flags=re.I)
    elif filename == "shop.html":
        content = re.sub(r'href="#"([^>]*?>\s*ADD TO CART)', r'href="cart.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*VIEW REMEDY)', r'href="single_product.html"\1', content, flags=re.I)
    elif filename == "single_product.html":
        content = re.sub(r'href="#"([^>]*?>\s*ADD TO CART)', r'href="cart.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*BUY NOW)', r'href="checkout.html"\1', content, flags=re.I)
    elif filename == "client_portal_order_history.html":
        content = re.sub(r'href="#"([^>]*?>\s*View Order Details)', r'href="client_order.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*View Order)', r'href="client_order.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*Home)', r'href="home.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*My Account)', r'href="account.html"\1', content, flags=re.I)
    elif filename == "client_order.html":
        content = re.sub(r'href="#"([^>]*?>\s*Home)', r'href="home.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>\s*My Account)', r'href="account.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Dashboard)', r'href="account.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Orders)', r'href="client_portal_order_history.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Addresses)', r'href="client_portfal_address.html"\1', content, flags=re.I)
    elif filename == "account.html":
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Dashboard)', r'href="account.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Orders)', r'href="client_portal_order_history.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Addresses)', r'href="client_portfal_address.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Account Details)', r'href="account.html"\1', content, flags=re.I)
    elif filename == "client_portfal_address.html":
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Dashboard)', r'href="account.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Orders)', r'href="client_portal_order_history.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Addresses)', r'href="client_portfal_address.html"\1', content, flags=re.I)
        content = re.sub(r'href="#"([^>]*?>[\s\S]*?Account Details)', r'href="account.html"\1', content, flags=re.I)

    # 6. Remove any remaining [CLIENT LOGO]
    content = content.replace('[CLIENT LOGO]', '')

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
    print(f'Updated {filename}')

def main():
    files = sorted(glob.glob('Main/*.html'))
    print(f'Starting processing of {len(files)} files...')
    for f in files:
        update_file(f)
    print('All files successfully updated!')

if __name__ == '__main__':
    main()

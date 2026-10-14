import glob
import re

for f in sorted(glob.glob('Main/*.html')):
    with open(f, 'r', encoding='utf-8') as fp:
        c = fp.read()
    orig = c
    c = re.sub(r'href="#"([^>]*?>\s*(?:Sign Out|Log out))', r'href="login.html"\1', c, flags=re.I)
    c = re.sub(r'href="#"([^>]*?>\s*Contact (?:Sanctuary )?Concierge)', r'href="contact.html"\1', c, flags=re.I)
    c = re.sub(r'href="#"([^>]*?>\s*My Orders)', r'href="client_portal_order_history.html"\1', c, flags=re.I)
    c = re.sub(r'href="#"([^>]*?>\s*View Full Invoiced Order)', r'href="client_portal_order_history.html"\1', c, flags=re.I)
    c = re.sub(r'href="#"([^>]*?>\s*Home\s*</a>)', r'href="home.html"\1', c, flags=re.I)
    c = re.sub(r'href="#"([^>]*?>\s*Consultations\s*</a>)', r'href="services.html"\1', c, flags=re.I)
    c = re.sub(r'href="#"([^>]*?>\s*My Account\s*</a>)', r'href="account.html"\1', c, flags=re.I)
    if c != orig:
        with open(f, 'w', encoding='utf-8') as fp:
            fp.write(c)
        print('Cleaned up additional links in', f)

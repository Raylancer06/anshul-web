import os
import subprocess
import json

BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
WP_DIR = os.path.join(BASE_DIR, 'wordpress')
WP_CLI = os.path.join(BASE_DIR, 'wp-cli.phar')

def wp(args):
    cmd = ['php', WP_CLI] + args + [f'--path={WP_DIR}']
    res = subprocess.run(cmd, capture_output=True, text=True)
    return res.stdout.strip()

print("Setting up Pages, Front Page, and Menu in ANUKUL WordPress...")

pages = [
    ('Home', 'home', 'front-page.php'),
    ('Ayurveda', 'ayurveda', 'template-ayurveda.php'),
    ('Vastu', 'vastu', 'template-vastu.php'),
    ('Services', 'services', 'template-services.php'),
    ('Consultancy', 'consultancy', 'template-consultancy.php'),
    ('Gallery', 'gallery', 'template-gallery.php'),
    ('Contact', 'contact', 'template-contact.php'),
    ('Book Your Consultation', 'book-your-consultation', 'template-booking.php'),
    ('Booking Confirmation', 'booking-confirmation', 'template-booking-confirmation.php'),
    ('Blog', 'blog', ''),
]

page_ids = {}

for title, slug, template in pages:
    # Check if page exists
    existing = wp(['post', 'list', '--post_type=page', f'--name={slug}', '--field=ID', '--format=ids'])
    if existing:
        pid = existing.split()[0]
        print(f"Page '{title}' already exists (ID: {pid})")
    else:
        pid = wp(['post', 'create', f'--post_title={title}', f'--post_name={slug}', '--post_type=page', '--post_status=publish', '--porcelain'])
        print(f"Created page '{title}' (ID: {pid})")
        
    page_ids[slug] = pid
    if template:
        wp(['post', 'meta', 'set', pid, '_wp_page_template', template])

# Set Front Page & Blog Page
if 'home' in page_ids and 'blog' in page_ids:
    wp(['option', 'set', 'show_on_front', 'page'])
    wp(['option', 'set', 'page_on_front', page_ids['home']])
    wp(['option', 'set', 'page_for_posts', page_ids['blog']])
    print("Static front page set to 'Home' and posts page set to 'Blog'.")

# Install WooCommerce standard pages
print("Installing WooCommerce pages...")
wp(['wc', '--user=anukul_admin', 'tool', 'run', 'install_pages'])

# Create Primary Navigation Menu
menu_id = wp(['menu', 'create', 'Primary Sanctuary Navigation', '--porcelain'])
if 'Error' in menu_id:
    # Get existing menu ID
    menu_list = wp(['menu', 'list', '--format=json'])
    try:
        menus = json.loads(menu_list)
        for m in menus:
            if m.get('name') == 'Primary Sanctuary Navigation':
                menu_id = str(m.get('term_id'))
                break
    except:
        pass

if menu_id and not 'Error' in menu_id:
    print(f"Assigning menu items to Menu ID {menu_id}...")
    menu_slugs = ['home', 'ayurveda', 'vastu', 'services', 'shop', 'blog', 'gallery', 'contact']
    for slug in menu_slugs:
        pid = page_ids.get(slug)
        if not pid:
            # Check if WC shop page
            wc_pid = wp(['post', 'list', '--post_type=page', f'--name={slug}', '--field=ID', '--format=ids'])
            if wc_pid:
                pid = wc_pid.split()[0]
        if pid:
            wp(['menu', 'item', 'add-post', menu_id, pid])

    # Assign menu to primary location
    wp(['menu', 'location', 'assign', menu_id, 'primary'])
    wp(['menu', 'location', 'assign', menu_id, 'footer'])
    print("Primary and Footer menu locations assigned.")

print("\nPages and Menu configuration completed successfully!")

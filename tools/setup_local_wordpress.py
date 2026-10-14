import os
import shutil
import urllib.request
import zipfile
import io
import subprocess

BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
WP_DIR = os.path.join(BASE_DIR, 'wordpress')
TOOLS_DIR = os.path.join(BASE_DIR, 'tools')
WP_CLI = os.path.join(BASE_DIR, 'wp-cli.phar')

print(f"=== ANUKUL Local WordPress Installer ===")
print(f"Target Directory: {WP_DIR}")

# 1. Download & Extract WordPress Core
if not os.path.exists(os.path.join(WP_DIR, 'wp-load.php')):
    print("\n[1/6] Downloading WordPress Core (latest.zip)...")
    wp_zip_url = 'https://wordpress.org/latest.zip'
    with urllib.request.urlopen(wp_zip_url) as resp:
        print("  Extracting WordPress into destination...")
        with zipfile.ZipFile(io.BytesIO(resp.read())) as z:
            for member in z.namelist():
                # Strip leading 'wordpress/'
                if member.startswith('wordpress/'):
                    rel_path = member[len('wordpress/'):]
                    if not rel_path:
                        continue
                    target_path = os.path.join(WP_DIR, rel_path)
                    if member.endswith('/'):
                        os.makedirs(target_path, exist_ok=True)
                    else:
                        os.makedirs(os.path.dirname(target_path), exist_ok=True)
                        with z.open(member) as src, open(target_path, 'wb') as dst:
                            dst.write(src.read())
    print("  WordPress Core extracted successfully.")
else:
    print("\n[1/6] WordPress Core already present.")

# 2. SQLite Database Integration
sqlite_plugin_dir = os.path.join(WP_DIR, 'wp-content', 'plugins', 'sqlite-database-integration')
db_php = os.path.join(WP_DIR, 'wp-content', 'db.php')
db_dir = os.path.join(WP_DIR, 'wp-content', 'database')

if not os.path.exists(db_php):
    print("\n[2/6] Downloading & Setting up SQLite integration...")
    sqlite_url = 'https://downloads.wordpress.org/plugin/sqlite-database-integration.latest-stable.zip'
    with urllib.request.urlopen(sqlite_url) as resp:
        with zipfile.ZipFile(io.BytesIO(resp.read())) as z:
            z.extractall(os.path.join(WP_DIR, 'wp-content', 'plugins'))
    
    # Copy db.copy to db.php
    db_copy_path = os.path.join(sqlite_plugin_dir, 'db.copy')
    shutil.copyfile(db_copy_path, db_php)
    os.makedirs(db_dir, exist_ok=True)
    print("  SQLite database integration drop-in configured.")
else:
    print("\n[2/6] SQLite drop-in already configured.")

# 3. Copy ANUKUL Theme & Booking Plugin
print("\n[3/6] Syncing ANUKUL Theme and Booking Plugin...")
target_theme = os.path.join(WP_DIR, 'wp-content', 'themes', 'anukul')
source_theme = os.path.join(BASE_DIR, 'wp-content', 'themes', 'anukul')
if os.path.exists(target_theme):
    shutil.rmtree(target_theme)
shutil.copytree(source_theme, target_theme)
print("  Theme synced to wp-content/themes/anukul.")

target_plugin = os.path.join(WP_DIR, 'wp-content', 'plugins', 'anukul-booking')
source_plugin = os.path.join(BASE_DIR, 'wp-content', 'plugins', 'anukul-booking')
if os.path.exists(target_plugin):
    shutil.rmtree(target_plugin)
shutil.copytree(source_plugin, target_plugin)
print("  Plugin synced to wp-content/plugins/anukul-booking.")

# 4. Download WooCommerce
wc_plugin_dir = os.path.join(WP_DIR, 'wp-content', 'plugins', 'woocommerce')
if not os.path.exists(wc_plugin_dir):
    print("\n[4/6] Downloading WooCommerce plugin...")
    wc_url = 'https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip'
    with urllib.request.urlopen(wc_url) as resp:
        with zipfile.ZipFile(io.BytesIO(resp.read())) as z:
            z.extractall(os.path.join(WP_DIR, 'wp-content', 'plugins'))
    print("  WooCommerce extracted.")
else:
    print("\n[4/6] WooCommerce already present.")

# 5. Create wp-config.php
print("\n[5/6] Generating wp-config.php...")
wp_config_path = os.path.join(WP_DIR, 'wp-config.php')
wp_config_content = """<?php
/**
 * ANUKUL WordPress Localhost Configuration
 */

define( 'DB_NAME', 'anukul_local_db' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// Secret Keys
define( 'AUTH_KEY',         'anukul_auth_key_938172948719284719284' );
define( 'SECURE_AUTH_KEY',  'anukul_sec_auth_key_10293847561029384' );
define( 'LOGGED_IN_KEY',    'anukul_logged_key_4758392019485736291' );
define( 'NONCE_KEY',        'anukul_nonce_key_8473629104958372615' );
define( 'AUTH_SALT',        'anukul_auth_salt_9584736201948573629' );
define( 'SECURE_AUTH_SALT', 'anukul_sec_salt_1948573620194857362' );
define( 'LOGGED_IN_SALT',   'anukul_logged_salt_84736201948573629' );
define( 'NONCE_SALT',       'anukul_nonce_salt_194857362019485736' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

// Local URLs
define( 'WP_HOME', 'http://localhost:8000' );
define( 'WP_SITEURL', 'http://localhost:8000' );

// Absolute path to the WordPress directory.
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
"""

with open(wp_config_path, 'w', encoding='utf-8') as f:
    f.write(wp_config_content)
print("  wp-config.php generated successfully.")

# 6. Run WP-CLI to Install Core & Activate Components
print("\n[6/6] Executing WP-CLI automated installation...")

def run_wp(args):
    cmd = ['php', WP_CLI] + args + [f'--path={WP_DIR}']
    res = subprocess.run(cmd, capture_output=True, text=True)
    print("  WP-CLI:", ' '.join(args[:4]), "->", res.stdout.strip() or res.stderr.strip())
    return res

# Check if installed
check = run_wp(['core', 'is-installed'])
if check.returncode != 0:
    print("  Running core install...")
    run_wp([
        'core', 'install',
        '--url=http://localhost:8000',
        '--title=ANUKUL Ayur Vastu Harmony Clinic',
        '--admin_user=anukul_admin',
        '--admin_password=anukul_admin_2025',
        '--admin_email=sanctuary@anukul-harmony.com',
        '--skip-email'
    ])
else:
    print("  Core already installed.")

# Activate theme
run_wp(['theme', 'activate', 'anukul'])

# Activate plugins
run_wp(['plugin', 'activate', 'anukul-booking'])
run_wp(['plugin', 'activate', 'woocommerce'])

# Set permalink structure
run_wp(['rewrite', 'structure', '/%postname%/'])

print("\n=== Local WordPress Installation Complete ===")
print("Site URL:    http://localhost:8000")
print("Admin URL:   http://localhost:8000/wp-admin")
print("Username:    anukul_admin")
print("Password:    anukul_admin_2025")

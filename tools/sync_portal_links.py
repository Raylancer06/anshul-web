import os
import re

MAIN_DIR = r"c:\Users\0610s\Music\Anshul_web\Anshul\Main"

# In client_order.html, update the sidebar links
order_path = os.path.join(MAIN_DIR, "client_order.html")
with open(order_path, "r", encoding="utf-8") as f:
    order_content = f.read()

order_content = re.sub(r'href="account\.html"(.*?>\s*<span[^>]*>\s*<span[^>]*>grid_view</span>\s*Dashboard)', r'href="account.html#dashboard"\1', order_content)
order_content = re.sub(r'href="account\.html"(.*?>\s*<span[^>]*>\s*<span[^>]*>local_mall</span>\s*Orders)', r'href="account.html#orders"\1', order_content)
order_content = re.sub(r'href="client_portal_order_history\.html"(.*?>\s*<span[^>]*>\s*<span[^>]*>location_on</span>\s*Addresses)', r'href="account.html#addresses"\1', order_content)
order_content = re.sub(r'href="account\.html"(.*?>\s*<span[^>]*>\s*<span[^>]*>badge</span>\s*Account Details)', r'href="account.html#account-details"\1', order_content)
order_content = re.sub(r'href="client_portal_order_history\.html"(.*?>\s*<span[^>]*>\s*<span[^>]*>download</span>\s*Downloads)', r'href="account.html#downloads"\1', order_content)
order_content = re.sub(r'href="#"(.*?>\s*<span[^>]*>logout</span>\s*Log out)', r'href="login.html"\1', order_content)

with open(order_path, "w", encoding="utf-8") as f:
    f.write(order_content)

# In client_portfal_address.html, update the sidebar links
addr_path = os.path.join(MAIN_DIR, "client_portfal_address.html")
with open(addr_path, "r", encoding="utf-8") as f:
    addr_content = f.read()

addr_content = re.sub(r'href="account\.html"(.*?>\s*<span[^>]*>\s*<span[^>]*>dashboard</span>\s*<span>Dashboard)', r'href="account.html#dashboard"\1', addr_content)
addr_content = re.sub(r'href="client_portal_order_history\.html"(.*?>\s*<span[^>]*>\s*<span[^>]*>inventory_2</span>\s*<span>Dispensary Orders)', r'href="account.html#orders"\1', addr_content)
addr_content = re.sub(r'href="client_portfal_address\.html"(.*?>\s*<span[^>]*>\s*<span[^>]*>manage_accounts</span>)', r'href="account.html#account-details"\1', addr_content)

with open(addr_path, "w", encoding="utf-8") as f:
    f.write(addr_content)

# In client_portal_order_history.html, update the sidebar links
hist_path = os.path.join(MAIN_DIR, "client_portal_order_history.html")
with open(hist_path, "r", encoding="utf-8") as f:
    hist_content = f.read()

hist_content = re.sub(r'href="account\.html"(.*?>\s*<div[^>]*>\s*<span[^>]*>grid_view</span>\s*<span[^>]*>Dashboard)', r'href="account.html#dashboard"\1', hist_content)
hist_content = re.sub(r'href="client_portfal_address\.html"(.*?>\s*<div[^>]*>\s*<span[^>]*>domain</span>\s*<span[^>]*>Addresses)', r'href="account.html#addresses"\1', hist_content)
hist_content = re.sub(r'href="account\.html"(.*?>\s*<div[^>]*>\s*<span[^>]*>badge</span>\s*<span[^>]*>Account Details)', r'href="account.html#account-details"\1', hist_content)
hist_content = re.sub(r'href="client_order\.html"(.*?>\s*<div[^>]*>\s*<span[^>]*>file_download</span>\s*<span[^>]*>Downloads)', r'href="account.html#downloads"\1', hist_content)

with open(hist_path, "w", encoding="utf-8") as f:
    f.write(hist_content)

print("Synchronized portal links successfully!")

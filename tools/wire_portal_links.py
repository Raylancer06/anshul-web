with open('Main/client_portal_order_history.html', 'r', encoding='utf-8') as f:
    c = f.read()

c = c.replace('href="#" class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all">\n<div class="flex items-center gap-space-sm">\n<span class="material-symbols-outlined text-[19px]">domain</span>\n<span class="font-body-md text-body-md">Addresses</span>', 'href="client_portfal_address.html" class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all">\n<div class="flex items-center gap-space-sm">\n<span class="material-symbols-outlined text-[19px]">domain</span>\n<span class="font-body-md text-body-md">Addresses</span>')
c = c.replace('href="#" class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all">\n<div class="flex items-center gap-space-sm">\n<span class="material-symbols-outlined text-[19px]">badge</span>\n<span class="font-body-md text-body-md">Account Details</span>', 'href="account.html" class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all">\n<div class="flex items-center gap-space-sm">\n<span class="material-symbols-outlined text-[19px]">badge</span>\n<span class="font-body-md text-body-md">Account Details</span>')
c = c.replace('href="#" class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all">\n<div class="flex items-center gap-space-sm">\n<span class="material-symbols-outlined text-[19px]">file_download</span>\n<span class="font-body-md text-body-md">Downloads</span>', 'href="client_order.html" class="flex items-center justify-between px-space-md py-space-sm rounded-lg text-on-surface-variant hover:bg-surface-container hover:text-primary transition-all">\n<div class="flex items-center gap-space-sm">\n<span class="material-symbols-outlined text-[19px]">file_download</span>\n<span class="font-body-md text-body-md">Downloads</span>')
c = c.replace('href="#" class="flex items-center gap-space-sm px-space-md py-space-sm rounded-lg text-error hover:bg-error-container/40 transition-all"', 'href="login.html" class="flex items-center gap-space-sm px-space-md py-space-sm rounded-lg text-error hover:bg-error-container/40 transition-all"')

with open('Main/client_portal_order_history.html', 'w', encoding='utf-8') as f:
    f.write(c)

with open('Main/client_order.html', 'r', encoding='utf-8') as f:
    c = f.read()

c = c.replace('href="#">\n<span class="flex items-center gap-3 font-body-md text-body-md">\n<span class="material-symbols-outlined text-[19px] text-on-surface-variant group-hover:text-primary transition-colors">badge</span>\n              Account Details', 'href="account.html">\n<span class="flex items-center gap-3 font-body-md text-body-md">\n<span class="material-symbols-outlined text-[19px] text-on-surface-variant group-hover:text-primary transition-colors">badge</span>\n              Account Details')
c = c.replace('href="#">\n<span class="flex items-center gap-3 font-body-md text-body-md">\n<span class="material-symbols-outlined text-[19px] text-on-surface-variant group-hover:text-primary transition-colors">download</span>\n              Downloads', 'href="client_portal_order_history.html">\n<span class="flex items-center gap-3 font-body-md text-body-md">\n<span class="material-symbols-outlined text-[19px] text-on-surface-variant group-hover:text-primary transition-colors">download</span>\n              Downloads')
c = c.replace('href="#">\n<span class="flex items-center gap-3 font-body-md text-body-md">\n<span class="material-symbols-outlined text-[19px] text-error">logout</span>\n              Log out', 'href="login.html">\n<span class="flex items-center gap-3 font-body-md text-body-md">\n<span class="material-symbols-outlined text-[19px] text-error">logout</span>\n              Log out')

with open('Main/client_order.html', 'w', encoding='utf-8') as f:
    f.write(c)

with open('Main/account.html', 'r', encoding='utf-8') as f:
    c = f.read()

c = c.replace('class="flex items-center justify-between px-4 py-3 rounded text-error hover:bg-error-container/20 transition-all font-body-sm text-body-sm" href="#"', 'class="flex items-center justify-between px-4 py-3 rounded text-error hover:bg-error-container/20 transition-all font-body-sm text-body-sm" href="login.html"')
c = c.replace('href="#">\n<div class="flex items-center gap-3">\n<span class="material-symbols-outlined text-[20px]">logout</span>\n<span>Sign Out</span>', 'href="login.html">\n<div class="flex items-center gap-3">\n<span class="material-symbols-outlined text-[20px]">logout</span>\n<span>Sign Out</span>')
c = c.replace('href="#">\n<span>Contact Sanctuary Concierge</span>', 'href="contact.html">\n<span>Contact Sanctuary Concierge</span>')

with open('Main/account.html', 'w', encoding='utf-8') as f:
    f.write(c)

with open('Main/client_portfal_address.html', 'r', encoding='utf-8') as f:
    c = f.read()

c = c.replace('href="#" class="flex items-center justify-between px-3 py-2 rounded-lg text-error hover:bg-error-container/20 transition-all font-body-sm text-body-sm"', 'href="login.html" class="flex items-center justify-between px-3 py-2 rounded-lg text-error hover:bg-error-container/20 transition-all font-body-sm text-body-sm"')

with open('Main/client_portfal_address.html', 'w', encoding='utf-8') as f:
    f.write(c)

print('Interlinked portal pages successfully!')

import urllib.request
import re

html = urllib.request.urlopen('http://localhost:8000/').read().decode('utf-8', errors='ignore')

print("Has tailwind script:", 'cdn.tailwindcss.com' in html)
print("Has tailwind.config:", 'tailwind.config' in html)
print("Has header nav li:", '<li id="menu-item-' in html)
print("Has mandalaSpin:", 'mandalaSpin' in html)
print("Has layer base:", '@layer base' in html)

# Check image URLs in HTML
imgs = re.findall(r'<img[^>]+src="([^"]+)"', html)
print(f"Total img tags: {len(imgs)}")
for img in imgs[:5]:
    print("  Image src:", img)

# Check background images
bg_imgs = re.findall(r'background-image:\s*url\([\'"]?([^\'")]+)[\'"]?\)', html)
print(f"Total background-image URLs: {len(bg_imgs)}")
for bg in bg_imgs[:5]:
    print("  BG src:", bg)

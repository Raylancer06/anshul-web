import glob
import re

files = glob.glob('Main/*.html')
for f in files:
    with open(f, 'r', encoding='utf-8') as fh:
        c = fh.read()
    m = re.search(r'<footer[^>]*>(.*?)</footer>', c, re.DOTALL)
    if m:
        img_match = re.search(r'<img[^>]+alt="ANUKUL Logo"[^>]*>', m.group(0))
        bg_match = re.search(r'<footer class="([^"]+)"', c)
        img_tag = img_match.group(0) if img_match else "NO LOGO"
        bg_class = bg_match.group(1) if bg_match else "NONE"
        print(f"{f:32} | bg: {bg_class[:35]:35} | img: {img_tag}")

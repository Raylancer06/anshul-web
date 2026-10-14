import os
import glob
import re
from collections import defaultdict

html_files = sorted(glob.glob('Main/*.html'))
print(f"Total HTML files in Main: {len(html_files)}")

css_links = defaultdict(list)
scripts = defaultdict(list)
tailwind_or_bootstrap = set()

for path in html_files:
    fname = os.path.basename(path)
    with open(path, 'r', encoding='utf-8', errors='ignore') as f:
        text = f.read()

    # Find stylesheets
    for m in re.finditer(r'<link\s+[^>]*href=["\']([^"\']+)["\']', text, re.IGNORECASE):
        href = m.group(1)
        css_links[href].append(fname)

    # Find scripts
    for m in re.finditer(r'<script\s+[^>]*src=["\']([^"\']+)["\']', text, re.IGNORECASE):
        src = m.group(1)
        scripts[src].append(fname)

    # Check styling framework
    if 'cdn.tailwindcss.com' in text or 'tailwind' in text.lower():
        tailwind_or_bootstrap.add((fname, 'Tailwind'))
    if 'bootstrap' in text.lower():
        tailwind_or_bootstrap.add((fname, 'Bootstrap'))

print("\n--- STYLESHEETS & FONTS FOUND ---")
for k, v in sorted(css_links.items()):
    print(f"{k} -> Used in {len(v)} files")

print("\n--- SCRIPTS FOUND ---")
for k, v in sorted(scripts.items()):
    print(f"{k} -> Used in {len(v)} files")

print("\n--- FRAMEWORKS DETECTED ---")
for f, framework in sorted(tailwind_or_bootstrap):
    print(f"{f}: {framework}")

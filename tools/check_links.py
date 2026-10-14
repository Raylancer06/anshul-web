import glob
import re

for f in sorted(glob.glob('Main/*.html')):
    with open(f, 'r', encoding='utf-8') as fp:
        c = fp.read()
    hash_links = re.findall(r'<a[^>]*?href="#"[^>]*?>([\s\S]*?)</a>', c)
    if hash_links:
        print(f'{f:35} has {len(hash_links)} remaining href="#" links')
        for hl in hash_links[:5]:
            cleaned = re.sub(r'<[^>]+>', '', hl).strip()
            print(f'   - {cleaned[:50]}')

import urllib.request
import re

html = urllib.request.urlopen('http://localhost:8000/').read().decode('utf-8', errors='ignore')
footer_m = re.search(r'<footer.*?</footer>', html, re.DOTALL)
if footer_m:
    footer = footer_m.group(0)
    print("=== FOOTER HTML ===")
    print(footer)
    print("===================")
    imgs = re.findall(r'<img[^>]+src="([^"]+)"', footer)
    print("Footer images found:", imgs)
    for img in imgs:
        try:
            res = urllib.request.urlopen(img)
            print(f"Status for {img}: {res.status}, Content-Type: {res.headers.get('content-type')}, Length: {res.headers.get('content-length')}")
        except Exception as e:
            print(f"FAILED loading {img}: {e}")
else:
    print("Footer not found!")

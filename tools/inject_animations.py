import os
import glob

def main():
    main_dir = os.path.abspath('Main')
    html_files = glob.glob(os.path.join(main_dir, '*.html'))
    print(f"Found {len(html_files)} HTML files in {main_dir}")

    css_tag = '<link rel="stylesheet" href="css/anukul-animations.css">'
    js_tag = '<script src="js/anukul-scroll.js"></script>'

    updated_count = 0

    for fpath in sorted(html_files):
        fname = os.path.basename(fpath)
        with open(fpath, 'r', encoding='utf-8') as f:
            content = f.read()

        modified = False

        if 'css/anukul-animations.css' not in content:
            if '</head>' in content:
                content = content.replace('</head>', f'{css_tag}</head>', 1)
                modified = True
            else:
                print(f"Warning: No </head> found in {fname}")

        if 'js/anukul-scroll.js' not in content:
            if '</body>' in content:
                content = content.replace('</body>', f'{js_tag}</body>', 1)
                modified = True
            else:
                print(f"Warning: No </body> found in {fname}")

        if modified:
            with open(fpath, 'w', encoding='utf-8') as f:
                f.write(content)
            print(f"Updated: {fname}")
            updated_count += 1
        else:
            print(f"Already configured: {fname}")

    print(f"\nDone! Updated {updated_count} files.")

if __name__ == '__main__':
    main()

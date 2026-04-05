"""
SEO Fix Script for ivankapcov.ru
Fixes: lang attribute, viewport, titles, meta descriptions, robots.txt, sitemap.xml
"""

import os
import re
from pathlib import Path
from datetime import date

ROOT = Path(__file__).parent
DOMAIN = "https://ivankapcov.ru"
TODAY = date.today().isoformat()

# ── helpers ──────────────────────────────────────────────────────────────────

def read(path: Path) -> str:
    return path.read_text(encoding="utf-8")

def write(path: Path, content: str):
    path.write_text(content, encoding="utf-8")
    print(f"  ✓ {path.relative_to(ROOT)}")

def fix_lang(html: str) -> str:
    return re.sub(r'<html\s+lang="en"', '<html lang="ru"', html)

def fix_viewport(html: str) -> str:
    # Replace the restrictive viewport with a clean accessible one
    return re.sub(
        r'<meta\s+name="viewport"[^>]+>',
        '<meta name="viewport" content="width=device-width,initial-scale=1">',
        html
    )

def get_first_paragraph(html: str) -> str:
    """Extract first non-empty <p> text and truncate to ~160 chars."""
    paragraphs = re.findall(r'<p[^>]*>\s*(.*?)\s*</p>', html, re.DOTALL)
    for p in paragraphs:
        text = re.sub(r'<[^>]+>', '', p).strip()
        text = re.sub(r'\s+', ' ', text)
        if len(text) > 40:  # skip very short ones
            if len(text) > 160:
                text = text[:157].rsplit(' ', 1)[0] + '…'
            return text
    return ""

def set_meta_description(html: str, description: str) -> str:
    """Add or replace <meta name="description"> in <head>."""
    if not description:
        return html
    tag = f'<meta name="description" content="{description}">'
    if 'name="description"' in html:
        return re.sub(r'<meta\s+name="description"[^>]+>', tag, html)
    # Insert right after <meta charset=...>
    return re.sub(
        r'(<meta\s+charset=[^>]+>)',
        r'\1\n\t' + tag,
        html
    )

def set_title(html: str, new_title: str) -> str:
    """Replace <title> content."""
    return re.sub(r'<title>.*?</title>', f'<title>{new_title}</title>', html, flags=re.DOTALL)

# ── step 1: parse paulgraham index to get slug → Russian title ─────────────

def parse_pg_index() -> dict[str, str]:
    """Returns {slug: russian_title} from paulgraham/index.html."""
    index_path = ROOT / "paulgraham" / "index.html"
    html = read(index_path)
    # Pattern: <a href="/paulgraham/SLUG">RUSSIAN TITLE (English Title)</a>
    #      or: <a href="/paulgraham/SLUG">RUSSIAN TITLE</a>
    pattern = r'<a href="/paulgraham/([^"]+)">(.*?)</a>'
    mapping = {}
    for slug, link_text in re.findall(pattern, html):
        link_text = link_text.strip()
        # Remove HTML tags if any
        link_text = re.sub(r'<[^>]+>', '', link_text).strip()
        # If format is "Russian (English)", extract only Russian part
        m = re.match(r'^(.+?)\s*\([^)]+\)\s*$', link_text)
        if m:
            russian_title = m.group(1).strip()
        else:
            russian_title = link_text.strip()
        mapping[slug] = russian_title
    print(f"  Parsed {len(mapping)} essay titles from paulgraham/index.html")
    return mapping

# ── step 2: fix all HTML files ─────────────────────────────────────────────

def fix_html_files(pg_titles: dict[str, str]):
    html_files = list(ROOT.rglob("index.html"))
    print(f"\nFound {len(html_files)} HTML files to process...\n")

    for fpath in sorted(html_files):
        rel = fpath.relative_to(ROOT)
        parts = rel.parts  # e.g. ('paulgraham', 'greatwork', 'index.html')
        html = read(fpath)
        changed = False

        # 1. Fix lang
        new_html = fix_lang(html)
        if new_html != html:
            html = new_html
            changed = True

        # 2. Fix viewport
        new_html = fix_viewport(html)
        if new_html != html:
            html = new_html
            changed = True

        # 3. Fix paulgraham essay pages specifically
        is_pg_essay = (
            len(parts) == 3
            and parts[0] == "paulgraham"
            and parts[2] == "index.html"
        )
        if is_pg_essay:
            slug = parts[1]
            ru_title = pg_titles.get(slug)

            # 3a. Update <title>
            if ru_title:
                new_title = f"{ru_title} — Пол Грэм (перевод на русском)"
            else:
                # Keep existing English title, just add suffix
                m = re.search(r'<title>(.*?)</title>', html, re.DOTALL)
                existing = m.group(1).strip() if m else slug
                new_title = f"{existing} — Пол Грэм (перевод на русском)"

            new_html = set_title(html, new_title)
            if new_html != html:
                html = new_html
                changed = True

            # 3b. Add meta description from first paragraph
            if 'name="description"' not in html:
                desc = get_first_paragraph(html)
                if desc:
                    new_html = set_meta_description(html, desc)
                    if new_html != html:
                        html = new_html
                        changed = True

        # 4. Fix the paulgraham index page title
        if rel == Path("paulgraham/index.html"):
            new_html = set_title(html, "Эссе Пола Грэма на русском языке — переводы всех эссе")
            if new_html != html:
                html = new_html
                changed = True
            if 'name="description"' not in html:
                desc = "Все эссе Пола Грэма на русском языке. Переводы более 200 статей о стартапах, программировании, жизни и мышлении."
                new_html = set_meta_description(html, desc)
                if new_html != html:
                    html = new_html
                    changed = True

        # 5. Fix root index.html
        if rel == Path("index.html"):
            new_html = set_title(html, "Иван Капцов — Переводы эссе Пола Грэма и Дерека Сиверса на русском")
            if new_html != html:
                html = new_html
                changed = True
            if 'name="description"' not in html:
                desc = "Личный сайт Ивана Капцова. Переводы эссе Пола Грэма и Дерека Сиверса на русский язык."
                new_html = set_meta_description(html, desc)
                if new_html != html:
                    html = new_html
                    changed = True

        if changed:
            write(fpath, html)
        else:
            print(f"  — {rel} (no changes)")

# ── step 3: create robots.txt ──────────────────────────────────────────────

def create_robots_txt():
    content = f"""User-agent: *
Allow: /

Sitemap: {DOMAIN}/sitemap.xml
"""
    robots_path = ROOT / "robots.txt"
    write(robots_path, content)

# ── step 4: create sitemap.xml ─────────────────────────────────────────────

def create_sitemap(pg_titles: dict[str, str]):
    urls = []

    # Root pages
    static_pages = [
        ("", "1.0", "monthly"),
        ("paulgraham", "0.9", "weekly"),
        ("sivers", "0.9", "weekly"),
        ("readandwatch", "0.7", "monthly"),
        ("donation", "0.5", "yearly"),
    ]
    for path, priority, changefreq in static_pages:
        url = f"{DOMAIN}/{path}" if path else DOMAIN
        urls.append((url, TODAY, changefreq, priority))

    # paulgraham essays
    pg_dir = ROOT / "paulgraham"
    for slug_dir in sorted(pg_dir.iterdir()):
        if slug_dir.is_dir() and (slug_dir / "index.html").exists():
            url = f"{DOMAIN}/paulgraham/{slug_dir.name}"
            urls.append((url, TODAY, "yearly", "0.8"))

    # sivers essays
    sivers_dir = ROOT / "sivers"
    if sivers_dir.exists():
        for slug_dir in sorted(sivers_dir.iterdir()):
            if slug_dir.is_dir() and (slug_dir / "index.html").exists():
                url = f"{DOMAIN}/sivers/{slug_dir.name}"
                urls.append((url, TODAY, "yearly", "0.7"))

    entries = []
    for url, lastmod, changefreq, priority in urls:
        entries.append(f"""  <url>
    <loc>{url}</loc>
    <lastmod>{lastmod}</lastmod>
    <changefreq>{changefreq}</changefreq>
    <priority>{priority}</priority>
  </url>""")

    sitemap = f"""<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
{chr(10).join(entries)}
</urlset>
"""
    sitemap_path = ROOT / "sitemap.xml"
    write(sitemap_path, sitemap)
    print(f"  Total URLs in sitemap: {len(urls)}")

# ── main ──────────────────────────────────────────────────────────────────

if __name__ == "__main__":
    print("=" * 60)
    print("SEO Fix Script for ivankapcov.ru")
    print("=" * 60)

    print("\n[1/4] Parsing paulgraham essay titles...")
    pg_titles = parse_pg_index()

    print("\n[2/4] Fixing HTML files...")
    fix_html_files(pg_titles)

    print("\n[3/4] Creating robots.txt...")
    create_robots_txt()

    print("\n[4/4] Creating sitemap.xml...")
    create_sitemap(pg_titles)

    print("\n" + "=" * 60)
    print("✅ Done! Next steps:")
    print("  1. Review a few changed files to make sure everything looks good")
    print("  2. Commit and push to GitHub")
    print("  3. Submit sitemap in Google Search Console:")
    print("     https://search.google.com/search-console")
    print("=" * 60)

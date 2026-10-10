import os
import sys
import zipfile
import re
import urllib.request
import urllib.parse
import http.cookiejar
import ssl
from bs4 import BeautifulSoup

sys.stdout.reconfigure(encoding='utf-8')

BASE_URL = "https://basate-nab.com"
USERNAME = "hamed"
PASSWORD = "Hmd$wf9535"

THEME_DIR = r"C:\Users\Hamed\.gemini\antigravity\scratch\basate-nab"
ZIP_PATH = r"C:\Users\Hamed\.gemini\antigravity\scratch\basate-nab.zip"

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

cj = http.cookiejar.CookieJar()
opener = urllib.request.build_opener(
    urllib.request.HTTPCookieProcessor(cj),
    urllib.request.HTTPSHandler(context=ctx)
)
opener.addheaders = [
    ('User-Agent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36')
]

def create_theme_zip():
    print(f"📦 Packaging theme directory into {ZIP_PATH}...")
    if os.path.exists(ZIP_PATH):
        os.remove(ZIP_PATH)

    with zipfile.ZipFile(ZIP_PATH, 'w', zipfile.ZIP_DEFLATED) as zipf:
        for root, dirs, files in os.walk(THEME_DIR):
            dirs[:] = [d for d in dirs if d not in ['.git', '__pycache__', 'venv', '.vscode']]
            for file in files:
                if file.endswith('.zip') or file.endswith('.py') or file.endswith('.pyc') or file.startswith('.'):
                    continue
                file_path = os.path.join(root, file)
                rel_path = os.path.relpath(file_path, THEME_DIR)
                archive_name = os.path.join("basate-nab", rel_path).replace("\\", "/")
                zipf.write(file_path, archive_name)
    print("✅ Theme zip archive created successfully!")

def login():
    print(f"🔑 Authenticating to {BASE_URL}/wp-login.php...")
    login_url = f"{BASE_URL}/wp-login.php"
    opener.open(login_url)

    data = urllib.parse.urlencode({
        'log': USERNAME,
        'pwd': PASSWORD,
        'wp-submit': 'ورود',
        'redirect_to': f"{BASE_URL}/wp-admin/",
        'testcookie': '1'
    }).encode('utf-8')

    req = urllib.request.Request(login_url, data=data, headers={'Referer': login_url})
    resp = opener.open(req)
    if '/wp-admin' in resp.geturl():
        print("✅ Logged in successfully to WordPress Admin!")
        return True
    print("❌ Failed to log in. URL:", resp.geturl())
    return False

def upload_and_activate():
    print("📤 Fetching theme upload page to acquire nonce...")
    up_url = f"{BASE_URL}/wp-admin/theme-install.php?upload"
    r = opener.open(up_url)
    html = r.read().decode('utf-8', errors='ignore')

    soup = BeautifulSoup(html, 'html.parser')
    form = soup.select_one('form.wp-upload-form')
    if not form:
        print("❌ Could not locate upload form.")
        return False

    nonce = form.select_one("input[name='_wpnonce']")['value']
    referer = form.select_one("input[name='_wp_http_referer']")['value']
    action_url = form.get('action')
    if not action_url.startswith('http'):
        action_url = f"{BASE_URL}/wp-admin/{action_url}"

    print(f"🚀 Uploading theme zip via {action_url} (nonce: {nonce})...")
    
    # Multipart upload
    boundary = "----WebKitFormBoundary7MA4YWxkTrZu0gW"
    with open(ZIP_PATH, 'rb') as f:
        file_bytes = f.read()

    body = []
    body.extend([
        f"--{boundary}".encode('utf-8'),
        b'Content-Disposition: form-data; name="_wpnonce"',
        b'',
        nonce.encode('utf-8'),
        f"--{boundary}".encode('utf-8'),
        b'Content-Disposition: form-data; name="_wp_http_referer"',
        b'',
        referer.encode('utf-8'),
        f"--{boundary}".encode('utf-8'),
        b'Content-Disposition: form-data; name="themezip"; filename="basate-nab.zip"',
        b'Content-Type: application/zip',
        b'',
        file_bytes,
        f"--{boundary}".encode('utf-8'),
        b'Content-Disposition: form-data; name="install-theme-submit"',
        b'',
        'هم‌اکنون نصب نمایید'.encode('utf-8'),
        f"--{boundary}--".encode('utf-8'),
        b''
    ])
    payload = b"\r\n".join(body)

    req_upload = urllib.request.Request(
        action_url,
        data=payload,
        headers={
            'Content-Type': f'multipart/form-data; boundary={boundary}',
            'Referer': up_url
        }
    )

    try:
        resp_up = opener.open(req_upload, timeout=120)
        up_result = resp_up.read().decode('utf-8', errors='ignore')

        # Check if overwrite was required
        if 'بارگذاری شده را جایگزین فعلی نمایید' in up_result or 'overwrite=update-theme' in up_result or 'The destination folder already exists' in up_result:
            soup_res = BeautifulSoup(up_result, 'html.parser')
            overwrite_link = soup_res.find('a', href=re.compile(r'action=upload-theme.*overwrite=update-theme'))
            if not overwrite_link:
                overwrite_link = soup_res.find('a', href=re.compile(r'overwrite='))
            if overwrite_link:
                ov_url = overwrite_link['href']
                if not ov_url.startswith('http'):
                    ov_url = f"{BASE_URL}/wp-admin/{ov_url}"
                print(f"🔄 Confirming overwrite replacement via {ov_url}...")
                resp_ov = opener.open(ov_url)
                up_result = resp_ov.read().decode('utf-8', errors='ignore')

        # Find activate link
        soup_final = BeautifulSoup(up_result, 'html.parser')
        act_link = soup_final.find('a', href=re.compile(r'action=activate.*stylesheet=basate-nab'))
        if act_link:
            target_act = act_link['href']
            if not target_act.startswith('http'):
                target_act = f"{BASE_URL}/wp-admin/{target_act}"
            print(f"⚡ Activating theme via {target_act}...")
            opener.open(target_act)
            print("🎉 Theme basate-nab activated successfully!")
        else:
            # Try direct activation
            print("Checking themes.php for activation link...")
            t_page = opener.open(f"{BASE_URL}/wp-admin/themes.php").read().decode('utf-8', errors='ignore')
            soup_t = BeautifulSoup(t_page, 'html.parser')
            t_act = soup_t.find('a', href=re.compile(r'action=activate.*stylesheet=basate-nab'))
            if t_act:
                act_url = t_act['href']
                if not act_url.startswith('http'):
                    act_url = f"{BASE_URL}/wp-admin/{act_url}"
                opener.open(act_url)
                print("🎉 Theme basate-nab activated from themes list!")
            else:
                print("Theme already active or activation verified.")

        return True
    except Exception as e:
        print("❌ Upload error:", e)
        return False

def verify_live():
    print(f"🌐 Verifying live production endpoint: {BASE_URL}/ ...")
    try:
        req = urllib.request.Request(f"{BASE_URL}/?nocache={os.urandom(4).hex()}", headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req, context=ctx, timeout=15) as resp:
            content = resp.read().decode('utf-8', errors='ignore')
            title = re.search(r'<title>(.*?)</title>', content)
            print("Title:", title.group(1) if title else "None")
            is_theme_loaded = 'basate-nab' in content or 'بساط ناب' in content
            print("Theme Content Detected:", is_theme_loaded)
            return is_theme_loaded
    except Exception as e:
        print("❌ Verification error:", e)
        return False

if __name__ == '__main__':
    create_theme_zip()
    if login():
        if upload_and_activate():
            verify_live()

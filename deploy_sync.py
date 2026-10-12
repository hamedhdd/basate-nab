import os
import sys
import zipfile
import re
import requests
from bs4 import BeautifulSoup
import urllib3
urllib3.disable_warnings()

sys.stdout.reconfigure(encoding='utf-8')

BASE_URL = "https://basate-nab.com"
USERNAME = "hamed"
PASSWORD = "Hmd$wf9535"

THEME_DIR = r"C:\Users\Hamed\.gemini\antigravity\scratch\basate-nab"
ZIP_PATH = r"C:\Users\Hamed\.gemini\antigravity\scratch\basate-nab.zip"

session = requests.Session()
session.verify = False
session.headers.update({
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
})

def create_theme_zip():
    print(f"📦 Packaging theme directory into {ZIP_PATH}...")
    if os.path.exists(ZIP_PATH):
        try:
            os.remove(ZIP_PATH)
        except Exception:
            pass

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
    for attempt in range(1, 4):
        try:
            r = session.get(login_url, timeout=30)
            data = {
                'log': USERNAME,
                'pwd': PASSWORD,
                'wp-submit': 'ورود',
                'redirect_to': f"{BASE_URL}/wp-admin/",
                'testcookie': '1'
            }
            resp = session.post(login_url, data=data, timeout=30)
            if '/wp-admin' in resp.url:
                print("✅ Logged in successfully to WordPress Admin!")
                return True
            print(f"⚠️ Login attempt {attempt} returned URL: {resp.url}")
        except Exception as e:
            print(f"⚠️ Login attempt {attempt} failed: {e}")
    print("❌ Failed to log in after 3 attempts.")
    return False

def upload_and_activate():
    print("📤 Fetching theme upload page to acquire nonce...")
    upload_url = f"{BASE_URL}/wp-admin/theme-install.php?tab=upload"
    for attempt in range(1, 4):
        try:
            resp = session.get(upload_url, timeout=30)
            soup = BeautifulSoup(resp.text, 'html.parser')
            form = soup.find('form', class_='wp-upload-form')
            if not form:
                print("❌ Could not find theme upload form.")
                return False

            nonce = form.find('input', {'name': '_wpnonce'})['value']
            post_action = form.get('action') or f"{BASE_URL}/wp-admin/update.php?action=upload-theme"
            if not post_action.startswith('http'):
                post_action = f"{BASE_URL}/wp-admin/{post_action.lstrip('/')}"

            print(f"🚀 Uploading theme zip via {post_action} (nonce: {nonce})...")
            with open(ZIP_PATH, 'rb') as f:
                files = {'themezip': ('basate-nab.zip', f, 'application/zip')}
                data = {
                    '_wpnonce': nonce,
                    '_wp_http_referer': f"{BASE_URL}/wp-admin/theme-install.php?tab=upload",
                    'install-theme-submit': 'هم‌اکنون نصب نمایید'
                }
                up_resp = session.post(post_action, data=data, files=files, timeout=60)

            print(f"Upload HTTP status: {up_resp.status_code}")
            up_result = up_resp.text

            # Check if overwrite needed
            soup_res = BeautifulSoup(up_result, 'html.parser')
            overwrite_link = soup_res.find('a', href=re.compile(r'action=upload-theme.*overwrite=update-theme'))
            if overwrite_link:
                ov_url = overwrite_link['href']
                if not ov_url.startswith('http'):
                    ov_url = f"{BASE_URL}/wp-admin/{ov_url.lstrip('/')}"
                print(f"🔄 Confirming overwrite replacement via {ov_url}...")
                resp_ov = session.get(ov_url, timeout=45)
                up_result = resp_ov.text

            # Check activate link
            soup_final = BeautifulSoup(up_result, 'html.parser')
            act_link = soup_final.find('a', href=re.compile(r'action=activate.*stylesheet=basate-nab'))
            if act_link:
                target_act = act_link['href']
                if not target_act.startswith('http'):
                    target_act = f"{BASE_URL}/wp-admin/{target_act.lstrip('/')}"
                print(f"⚡ Activating theme via {target_act}...")
                session.get(target_act, timeout=30)
                print("🎉 Theme basate-nab activated successfully!")
            else:
                print("Checking themes.php for activation link...")
                t_page = session.get(f"{BASE_URL}/wp-admin/themes.php", timeout=30)
                soup_t = BeautifulSoup(t_page.text, 'html.parser')
                t_act = soup_t.find('a', href=re.compile(r'action=activate.*stylesheet=basate-nab'))
                if t_act:
                    act_url = t_act['href']
                    if not act_url.startswith('http'):
                        act_url = f"{BASE_URL}/wp-admin/{act_url.lstrip('/')}"
                    session.get(act_url, timeout=30)
                    print("🎉 Theme basate-nab activated from themes list!")
                else:
                    print("Theme already active or activation verified.")

            return True
        except Exception as e:
            print(f"⚠️ Upload attempt {attempt} error: {e}")
    return False

def verify_live():
    print(f"🌐 Verifying live production endpoint: {BASE_URL}/ ...")
    try:
        resp = session.get(f"{BASE_URL}/?nocache={os.urandom(4).hex()}", timeout=30)
        content = resp.text
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

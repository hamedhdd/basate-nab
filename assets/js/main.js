/**
 * Basate Nab (بساط ناب) - Main JavaScript
 * Interactive UX, Mobile Drawer, AJAX Search, Countdown & Cart Drawer
 */

document.addEventListener('DOMContentLoaded', () => {
  initMobileDrawer();
  initBackToTop();
  initCountdown();
  initLiveSearch();
  initMobileNavSync();
  initAuthTabs();
});

// 1. Mobile Drawer (Navigation & Categories)
function initMobileDrawer() {
  const openButtons = document.querySelectorAll('[data-toggle="mobile-drawer"]');
  const drawer = document.getElementById('mobile-drawer');
  const backdrop = document.getElementById('drawer-backdrop');
  const closeButton = document.getElementById('close-drawer-btn');

  if (!drawer || !backdrop) return;

  function openDrawer() {
    drawer.classList.add('active');
    backdrop.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    drawer.classList.remove('active');
    backdrop.classList.remove('active');
    document.body.style.overflow = '';
  }

  openButtons.forEach(btn => btn.addEventListener('click', (e) => {
    e.preventDefault();
    openDrawer();
  }));

  if (closeButton) closeButton.addEventListener('click', closeDrawer);
  backdrop.addEventListener('click', closeDrawer);

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer.classList.contains('active')) {
      closeDrawer();
    }
  });
}

// 2. Back to Top Button
function initBackToTop() {
  const btn = document.getElementById('back-to-top');
  if (!btn) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
      btn.classList.add('visible');
    } else {
      btn.classList.remove('visible');
    }
  }, { passive: true });

  btn.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
}

// 3. Countdown Timer (پیشنهاد شگفت‌انگیز عتیقه)
function initCountdown() {
  const countBoxes = document.querySelectorAll('[data-countdown]');
  if (!countBoxes.length) return;

  // 24 hours timer loop
  let targetTime = Date.now() + (18 * 3600 + 45 * 60 + 20) * 1000;

  function update() {
    const diff = targetTime - Date.now();
    if (diff <= 0) {
      targetTime = Date.now() + 24 * 3600 * 1000;
      return;
    }

    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((diff / (1000 * 60)) % 60);
    const seconds = Math.floor((diff / 1000) % 60);

    const hElem = document.getElementById('cd-hours');
    const mElem = document.getElementById('cd-minutes');
    const sElem = document.getElementById('cd-seconds');

    if (hElem) hElem.textContent = toFaNum(String(hours).padStart(2, '0'));
    if (mElem) mElem.textContent = toFaNum(String(minutes).padStart(2, '0'));
    if (sElem) sElem.textContent = toFaNum(String(seconds).padStart(2, '0'));
  }

  update();
  setInterval(update, 1000);
}

// 4. Convert digits to Persian
function toFaNum(str) {
  const faDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
  return String(str).replace(/[0-9]/g, w => faDigits[+w]);
}

// 5. Live Search Instant Query
function initLiveSearch() {
  const searchInput = document.getElementById('header-search-input');
  const resultsContainer = document.getElementById('live-search-results');
  if (!searchInput || !resultsContainer) return;

  let debounceTimer;

  searchInput.addEventListener('input', (e) => {
    clearTimeout(debounceTimer);
    const query = e.target.value.trim();

    if (query.length < 2) {
      resultsContainer.innerHTML = '';
      resultsContainer.style.display = 'none';
      return;
    }

    debounceTimer = setTimeout(() => {
      fetch(`/wp-json/wp/v2/product?search=${encodeURIComponent(query)}&per_page=5`)
        .then(res => res.json())
        .then(products => {
          if (!products || !products.length) {
            resultsContainer.innerHTML = '<div class="p-3 text-center text-muted">موردی یافت نشد.</div>';
            resultsContainer.style.display = 'block';
            return;
          }

          let html = '<ul class="live-search-list">';
          products.forEach(p => {
            html += `
              <li>
                <a href="${p.link}" class="live-search-item">
                  <span class="live-search-title">${p.title.rendered}</span>
                </a>
              </li>
            `;
          });
          html += '</ul>';
          resultsContainer.innerHTML = html;
          resultsContainer.style.display = 'block';
        })
        .catch(() => {
          resultsContainer.style.display = 'none';
        });
    }, 300);
  });

  document.addEventListener('click', (e) => {
    if (!searchInput.contains(e.target) && !resultsContainer.contains(e.target)) {
      resultsContainer.style.display = 'none';
    }
  });
}

// 6. Mobile Navigation Active Sync
function initMobileNavSync() {
  const currentPath = window.location.pathname;
  const navItems = document.querySelectorAll('.mobile-app-bar .mobile-nav-item');

  navItems.forEach(item => {
    const href = item.getAttribute('href');
    if (href && (href === currentPath || (href !== '/' && currentPath.startsWith(href)))) {
      navItems.forEach(i => i.classList.remove('active'));
      item.classList.add('active');
    }
  });
}

// 7. Customer Auth Tabs Switching (Login & Register)
function initAuthTabs() {
  const loginTabBtn = document.getElementById('tab-login-btn');
  const registerTabBtn = document.getElementById('tab-register-btn');
  const loginCol = document.getElementById('customer_login_col');
  const registerCol = document.getElementById('customer_register_col');

  if (!loginTabBtn || !registerTabBtn || !loginCol || !registerCol) return;

  function showLogin() {
    loginTabBtn.classList.add('active');
    registerTabBtn.classList.remove('active');
    if (window.innerWidth < 900) {
      loginCol.style.display = 'block';
      registerCol.style.display = 'none';
    }
  }

  function showRegister() {
    registerTabBtn.classList.add('active');
    loginTabBtn.classList.remove('active');
    if (window.innerWidth < 900) {
      registerCol.style.display = 'block';
      loginCol.style.display = 'none';
    }
  }

  loginTabBtn.addEventListener('click', (e) => {
    e.preventDefault();
    showLogin();
  });

  registerTabBtn.addEventListener('click', (e) => {
    e.preventDefault();
    showRegister();
  });

  document.querySelectorAll('.auth-switch-link').forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const target = link.getAttribute('href');
      if (target === '#customer_register_col') {
        showRegister();
      } else {
        showLogin();
      }
      const pageWrapper = document.querySelector('.auth-page-wrapper');
      if (pageWrapper) {
        window.scrollTo({ top: pageWrapper.offsetTop - 80, behavior: 'smooth' });
      }
    });
  });

  function handleResize() {
    if (window.innerWidth < 900) {
      if (window.location.hash === '#customer_register_col') {
        showRegister();
      } else {
        showLogin();
      }
    } else {
      loginCol.style.display = '';
      registerCol.style.display = '';
    }
  }

  handleResize();
  window.addEventListener('resize', handleResize);
}


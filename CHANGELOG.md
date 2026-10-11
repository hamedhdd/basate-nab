# Changelog

All notable changes to the **Basate Nab** WordPress Theme project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.5.0] - 2026-10-11

### Added
- **Authentic Instagram Reels & Videos Integration for Products**:
  - Downloaded and converted genuine video streams (12 MP4 files) from [@basate_nab](https://www.instagram.com/basate_nab/) matching all 12 vintage store products into `assets/videos/instagram_products/`.
  - Added `basate_nab_get_product_video_data()` in `functions.php` mapping each WooCommerce product ID (45 through 56) to its corresponding high-definition MP4 video, original Instagram Reel shortcode, and descriptive Persian video title.
  - Implemented `.product-video-showcase-card` on the single product page summary featuring:
    - Dedicated "ویدیوی محصول" badge pill.
    - Direct hyperlink to the original Instagram Reel on `@basate_nab`.
    - HTML5 responsive video player with `controls`, `playsinline`, and product cover frame poster.
    - Persian caption describing the video's focus (e.g. testing crystal cuts, opal glass illumination, brass fittings).
  - Added a dedicated "🎬 ویدیوی معرفی و تست کالا" tab to the WooCommerce product information tabs (`woocommerce_product_tabs`).
  - Added a "دارای ویدیو" badge (`.badge-video-available`) on catalog and homepage product cards alerting users that a video inspection is available.
  - Implemented responsive styles in `assets/css/main.css` for mobile and desktop video presentation.

### Changed
- **Product Video Tab & Terminology Modernization**:
  - Renamed the single product WooCommerce tab from "🎬 ویدیوی معرفی و تست کالا" to "🎬 ویدیوی محصول".
  - Updated single product video card badge header from "ویدیو تست و بررسی اصالت در اینستاگرام" to "ویدیوی محصول".
  - Purged all occurrences of the word "تست" across product descriptions, video titles, tooltips, and showcase copy, replacing them with clear vintage product presentation descriptions.

## [1.4.1] - 2026-10-11

### Fixed
- **Registration Form Mobile Toggle Stability (`/my-account/`)**:
  - Resolved a race condition where viewport resize events caused by mobile address-bar collapse inadvertently reset the active tab back to the login form.
  - Replaced hash/inline-style manipulation with CSS class-based tab visibility rules (`.show-login` and `.show-register`) on `#auth-page-wrapper`.
  - Converted anchor tab toggles to semantic `<button type="button">` elements preventing page URL jumps.
  - Ensured persistent tab locking so clicking the registration tab or inline switch link permanently keeps the signup form open until the user switches.

## [1.4.0] - 2026-10-11

### Added
- **Customer Registration & Dual Auth System (`/my-account/`)**:
  - Enabled WordPress core membership (`users_can_register = 1`) and WooCommerce customer account registration (`woocommerce_enable_myaccount_registration = yes`).
  - Enabled direct password specification during registration (`woocommerce_registration_generate_password = no`) allowing customers to set their credentials immediately without email dependence.
  - Enabled username selection (`woocommerce_registration_generate_username = no`) and checkout registration (`woocommerce_enable_signup_and_login_from_checkout = yes`).
  - Created dedicated WooCommerce template override [`woocommerce/myaccount/form-login.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/woocommerce/myaccount/form-login.php) featuring side-by-side Login & Registration cards on desktop and tabbed switching on mobile.
  - Implemented interactive tab switching and smooth scrolling in [`assets/js/main.js`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/assets/js/main.js) (`initAuthTabs`).
  - Added vintage retro card styling for login and registration forms in [`assets/css/main.css`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/assets/css/main.css) with golden focus rings, icons, and RTL-tailored typography.

## [1.3.0] - 2026-10-11

### Fixed
- **Mobile Responsive Header & Layout Overflow**:
  - Implemented authentic 2-row mobile header matching `noor3tar.ir`:
    - **Row 1**: Hamburger drawer button + brand logo & title (`بساط ناب`) on the right; Instagram pill, user account icon, and WooCommerce cart badge on the left.
    - **Row 2**: Full-width responsive search bar directly below Row 1 with live AJAX product suggestions dropdown.
  - Added comprehensive responsive display utilities (`.d-none`, `.d-block`, `.d-inline`, `.d-flex`, `.d-sm-*`, `.d-md-*`, `.d-lg-*`, `.d-xl-*`) resolving header overcrowding on screens under 992px.
  - Eliminated horizontal viewport overflow (`320px` to `991px`) across all mobile and tablet viewports.
  - Added mobile body bottom padding (`padding-bottom: calc(var(--mobile-bar-height) + 16px)`) preventing the fixed bottom app bar from obscuring footer content and SilverSky credits.
- **Mobile Typography & Component Sizing**:
  - Refined `.hero-main-card`, `.hero-title`, `.hero-btn-row`, `.special-offer-banner`, and `.trust-badges-grid` paddings and font sizes for high readability and compact presentation on small viewports.
  - Adjusted `.products-grid` card padding and title clamp heights for clean side-by-side 2-column mobile viewing.
  - Optimized `.top-announcement` bar to center text and hide extraneous elements on narrow devices.

## [1.2.0] - 2026-10-10

### Changed
- **Footer Credits**:
  - Updated theme development signature in `footer.php` to "طراحی اختصاصی و پیاده سازی by SilverSky" linking directly to `https://silversky.ir/`.
- **Contact Info & Inquiries**:
  - Temporarily removed phone numbers from top announcement bar, mobile drawer, footer, and promotional banners (leaving fields empty as requested pending future update).
  - Directed customer consultations and inquiries directly to Instagram Direct (`@basate_nab`).

### Removed
- **Product Prices & Sale Badges**:
  - Removed all product price figures and Toman currency amounts across the storefront.
  - Removed discount percentage badges from product cards.
  - Cleared numerical prices from the WooCommerce product catalog database.
  - Added global filter `woocommerce_get_price_html` returning empty string across shop archives and product views.

### Added
- **Catalog Inquiries CTA**:
  - Added dedicated product inquiry banner on single product views (`woocommerce_single_product_summary`) linking to Instagram direct `@basate_nab`.
  - Replaced product card cart buttons with "مشاهده و جزئیات" linking to the product page.
  - Updated JSON-LD structured data engine to omit price offers when products are unpriced.

## [1.1.0] - 2026-10-10

### Added
- **Authentic Instagram Media Ingestion (`@basate_nab`)**:
  - Downloaded 12 authentic product photographs directly from the store's Instagram page `@basate_nab` via residential proxy.
  - Uploaded all genuine photos to the WordPress Media Library (Attachment IDs 32 through 43) and bundled local assets into `assets/images/instagram_products/`.
  - Added dedicated authentic products to WooCommerce with Persian titles, descriptions, categories, and prices in Toman:
    1. آباژور رومیزی کریستال تراش‌خورده با پایه استیل صیقلی رترو
    2. چراغ رومیزی قارچی (Mushroom Lamp) رترو شیشه اپالین سفید
    3. آباژور رومیزی مدرن رترو مدل بشقاب‌پرنده UFO شیشه اپالین
    4. آباژور ایستاده سالنی شید شیاردار خربزه‌ای سبز مغزپسته‌ای وینتیج
    5. چراغ خواب رومیزی گوی اپالین مات با پایه ستونی متالیک نقره‌ای
    6. آباژور رومیزی مخروطی اشکی استیل براق سبک مینیمال رترو
    7. چراغ رومیزی پایه بلند کلاسیک فرانسوی با شید طرح‌دار سندبلاست
    8. آباژور سالنی ایستاده طبقاتی باهاوس پگودا سبز یشمی و کلاهک پلیسه
    9. چراغ رومیزی رترو راه‌راه کهربایی و سفید دهه ۷۰ (Space Age)
    10. آباژور پایه‌دار برنجی آنتیک با حباب لاله دست‌ساز لیمویی
    11. چراغ دیوارکوب تک‌شاخه برنزی آنتیک با کریستال آویز تراش‌خورده
    12. آباژور رومیزی کلاسیک شید مخمل دست‌دوز با پایه برنز کهنه‌کاری
- **Instagram Showcase Enhancement (`front-page.php`)**:
  - Replaced SVG placeholder boxes in the "همراه ما در اینستاگرام بساط ناب باشید" section with the 6 genuine Instagram post photos linking to `@basate_nab`.
  - Expanded homepage product query limit from 8 to 12 items to feature all genuine inventory on the storefront.

### Removed
- **Complete Purge of AI-Generated Content**:
  - Automatically deleted legacy mock products (IDs 19–26) and permanently removed all AI-generated image attachments (IDs 27–30) from the WordPress Media Library, strictly enforcing 100% authentic photography.

---

## [1.0.0] - 2026-10-10

### Added
- **Core Theme Architecture (`style.css`, `assets/css/main.css`)**:
  - Vintage & retro design tokens: Antique brass (`#B8860B`), deep walnut (`#231709`), parchment linen (`#FBF9F4`) and terracotta accent (`#A8422B`).
  - Google / jsDelivr CDN Vazirmatn Persian typography.
  - Sticky glassmorphic header with live AJAX search, cart badge, and Instagram trigger.
  - Category story circles navigation inspired by `noor3tar.ir`.
  - Mobile bottom navigation app bar (`#mobile-app-bar`) with active state and cart counter.
- **WooCommerce Integration**:
  - Full support for WooCommerce shop archive, single product pages, cart, and checkout.
  - Currency symbol configuration to Iranian Toman (`تومان`).
  - Automated Persian digits formatting (`basate_fa_num`) for prices and counts.
  - Dynamic AJAX cart fragments synchronization.
- **Technical SEO & Structured Data Engine**:
  - JSON-LD Structured Data: `WebSite` with Sitelinks Searchbox, `Organization` & `HomeGoodsStore` with link to Instagram `@basate_nab`, `Product` schema with offers and currency in IRT, and `BreadcrumbList`.
  - Open Graph (`og:*`) & Twitter Cards (`summary_large_image`).
  - Permalinks migration to clean URL structure (`/%postname%/`).
  - Canonical links and robots indexing directives.
- **DevOps & Continuous Deployment**:
  - `deploy_sync.py`: Automated packaging, authenticated admin upload, overwrite replacement, and live verification.
  - Operational runbook saved to `C:\Users\Hamed\Documents\Antigravity_Docs\basate_nab_wordpress_tech_runbook.md`.

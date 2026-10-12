# Changelog

All notable changes to the **Basate Nab** WordPress Theme project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2026-10-12

### Added
- **Essential WordPress Add-ons Suite (SilverSky Parity)**:
  - **All in One SEO (AIOSEO)** (`all-in-one-seo-pack`): Installed and activated for catalog-wide TruSEO, dynamic meta descriptions, Open Graph, Twitter Cards, and Google Sitemaps.
  - **AIOSEO Broken Link Checker** (`broken-link-checker-seo`): Installed and activated for automated link integrity monitoring.
  - **WP-Parsidate** (`wp-parsidate`): Installed and activated for native Solar Hijri (Shamsi / Jalali) date conversion and Persian numerals.
  - **Smush Image Optimizer** (`wp-smushit`): Installed and activated for automated image compression, WebP conversions, and lazy loading.
  - **Google Analytics / MonsterInsights** (`google-analytics-for-wordpress`): Installed and activated for store metrics and audience analytics.
  - **Persian WooCommerce SMS** (`persian-woocommerce-sms`): Installed and activated for Iranian customer notification infrastructure.
- **Theme Integration & Zero-Conflict Architecture**:
  - Implemented `basate_nab_date()` in `functions.php` with direct hooks into `get_the_date` using WP-Parsidate's `parsidate()` engine and zero-dependency fallbacks.
  - Added duplicate SEO tag detection in `basate_nab_seo_meta_tags()` ensuring graceful delegation when AIOSEO is active.
  - Hooked `aioseo_robots_meta` to guarantee search engines crawl paginated WooCommerce archives without erroneous `noindex` / `nofollow` tags.
  - Updated footer copyright to display current Shamsi year (`۱۴۰۵`) dynamically via `basate_nab_date('Y')`.

## [1.9.1] - 2026-10-12

### Added
- **Fundamental Project Flow & Anti-Stall Documentation (`PROJECT_FLOW.md`)**:
  - Authored comprehensive project lifecycle guidelines and operational protocols for Basate Nab in [`PROJECT_FLOW.md`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/PROJECT_FLOW.md) and persistent global document [`FUNDAMENTAL_PROJECT_FLOW.md`](file:///C:/Users/Hamed/Documents/Antigravity_Docs/FUNDAMENTAL_PROJECT_FLOW.md).
  - Formalized the 5-step continuous lifecycle flow: (1) Targeted Inspection & Anti-Stall, (2) Living Documentation, (3) Git & GitHub Push, (4) Automated Live Deployment & Verification, (5) Persistent Documentation Preservation.
  - Added Rule 7 to global [`GEMINI.md`](file:///C:/Users/Hamed/.gemini/config/GEMINI.md) preventing agents from getting stalled on repetitive bulk CSS reads and ensuring rapid horizontal layout resolution.

## [1.9.0] - 2026-10-12

### Added
- **Official Telegram & Bale Channels Integration**:
  - Integrated official Telegram channel (`https://t.me/basate_nab`) and Bale channel (`https://ble.ir/basatenab`) across the entire website alongside Instagram (`@basate_nab`).
  - **Homepage Hero Section**: Updated the hero card ("آباژورهای دست‌ساز وینتیج و روشنایی رترو") with 3 textless icon-only pill buttons (Instagram, Telegram, Bale) displayed inline with the primary CTA button.
  - **Unified Social Button Styles (Homepage & Product Page)**: Standardized all social action buttons (`Instagram`, `Telegram`, and `Bale`) on the homepage showcase and single product inquiry box to match the refined pill style (subtle gradient backgrounds, sleek border, matching typography, and branded hover states).
  - **Single Articles / Blog Posts**: Embedded `.post-social-channels-box` directly under the content of every blog post with dedicated join pills for Telegram, Bale, and Instagram.
  - **Single Product Page**: Enhanced inquiry box with quick-action links to Telegram, Bale, and Instagram Direct.
  - **Top Navigation Category Bar**: Replaced the text link with 3 compact icon-only circular pill buttons for Instagram, Telegram, and Bale (`.nav-strip-social-icons`) with branded hover glows.
  - **Top Announcement Bar, Mobile Drawer, and Footer**: Added Telegram and Bale channel links with clean icons across all site layouts.

## [1.8.1] - 2026-10-12

### Fixed
- **Desktop Top Navigation Bar Layout & Button Styles**:
  - Resolved issue where top category navigation links wrapped into two lines or appeared square-like on desktop screens.
  - Implemented single-line horizontal layout (`flex-wrap: nowrap; white-space: nowrap`) with smooth invisible horizontal overflow handling.
  - Restored rounded pill styling (`border-radius: var(--radius-full)`) with consistent padding (`6px 12px`), optimal gap (`6px`), and active/hover glow in Logo Red (`#E5392E`).
  - Ensured contact prompt and all 10 product categories align cleanly in a single horizontal strip.

## [1.8.0] - 2026-10-12

### Changed
- **Logo-Based Color Palette Overhaul (Red & Carbon Blue)**:
  - Replaced legacy gold/walnut/cream color palette with authentic **Logo Red** (`#E5392E`) and **Carbon Blue (آبی کربنی)** (`#16223B`, `#1E3A8A`, `#0F172A`).
  - Switched background to crisp, modern off-white slate (`#F8FAFC`) with clean borders (`#E2E8F0`).
  - Updated all UI components (announcement bar, buttons, search bar, badges, category story rings, product cards, video showcase, and footer) to the new Red and Carbon Blue identity.
  - Rendered authentic logo image (`assets/images/logo.jpg`) in the site header and mobile navigation drawer.

### Added
- **Exact 10 Product Categories Synchronization**:
  - Implemented automated category synchronizer [`inc/category-seeder.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/inc/category-seeder.php) establishing the 10 exact categories requested:
    1. *آباژور رومیزی* (`table-lamps`)
    2. *آباژور قدی* (`floor-lamps`)
    3. *لوستر* (`chandeliers`)
    4. *چراغ مطالعه* (`study-lamps`)
    5. *چراغ دیواری* (`wall-lamps`)
    6. *ساعت دکوری* (`decorative-clocks`)
    7. *آینه محدب* (`convex-mirrors`)
    8. *آینه های دکوری* (`decorative-mirrors`)
    9. *وسایل وینتیج* (`vintage-decor`)
    10. *تابلو های رترو* (`retro-frames`)
  - Mapped all 12 authentic store products across the new categories and purged legacy empty terms.
  - Updated **Category Stories Bar** on homepage [`front-page.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/front-page.php) with all 10 categories and custom handcrafted SVG icons.
  - Updated Desktop Navigation Bar, Mobile Navigation Drawer in [`header.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/header.php), and Footer Links in [`footer.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/footer.php) to feature all 10 categories.

## [1.7.0] - 2026-10-11

### Changed
- **Separation of Blog Photography from Store Product Images**:
  - Removed all store product images (`ig_product_*.jpg`) from blog featured images and post content to preserve catalog uniqueness.
  - Sourced and bundled 12 high-resolution, professional editorial interior design and lighting photographs into `assets/images/blog/`.
  - Implemented `basate_nab_get_blog_post_image_url()` in [`functions.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/functions.php) guaranteeing zero usage of product media attachments for articles across Open Graph, Twitter Cards, Google JSON-LD `BlogPosting` schema, archive cards, and single pages.

### Added
- **Expanded Blog to 12 Long-Form SEO Articles**:
  - Added 6 new comprehensive Persian articles in [`inc/blog-seeder.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/inc/blog-seeder.php):
    7. *راهنمای جامع انتخاب چراغ مطالعه رترو برای میز کار و اتاق مطالعه*
    8. *آباژور قدی (کنار سالنی): خلق یک گوشه دنج و دلنشین (Cozy Corner) در خانه*
    9. *شکوه لوسترهای برنجی و کریستال آنتیک در دکوراسیون پذیرایی معاصر*
    10. *تفاوت سبک‌های وینتیج، رترو و آنتیک: راهنمای جامع برای علاقه‌مندان به دکوراسیون*
    11. *اصول تلفیق مدرن و وینتیج: چگونه بدون شلوغی، اصالت را به خانه بیاوریم؟*
    12. *حباب‌های عتیقه و شیشه‌های دست‌ساز: هنر فراموش‌شده در روشنایی‌های کلاسیک*
- **Contextual Store & Product References (`.blog-product-reference-box`)**:
  - Embedded elegant retro reference callout boxes in every article pointing users to relevant store product categories (`/product-category/table-lamps/`, `/product-category/floor-lamps/`, `/product-category/retro-frames/`, `/product-category/vintage-decor/`, `/product-category/gramophone-radio/`).
- **Enhanced Single Post Template (`single.php`)**:
  - Added breadcrumbs navigation, category badge, publication date in Persian numerals, author bio box, and a 3-column "سایر مقالات خواندنی وبلاگ" (Related Articles) section.
- **Styling**:
  - Added CSS classes for `.blog-product-reference-box`, `.ref-badge`, `.ref-btn`, and responsive mobile button stacks in [`assets/css/main.css`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/assets/css/main.css).

## [1.6.0] - 2026-10-11

### Added
- **Dedicated Blog Page & Rich SEO Articles System (`/blog/`)**:
  - Created dedicated blog archive template [`page-blog.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/page-blog.php) with vintage card typography, cover badges, excerpt previews, reading time, and clean responsive pagination.
  - Developed automated post seeder [`inc/blog-seeder.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/inc/blog-seeder.php) generating 6 in-depth, original Persian SEO articles targeted at high-value search keywords:
    1. *اصول نورپردازی داخلی در دکوراسیون مید سنتری مدرن (Mid Century) با آباژور و لوستر وینتیج*
    2. *جادوی آینه محدب و وسایل دکوری وینتیج در عمق‌بخشی به چیدمان خانه*
    3. *آباژور تک نسخه و دست‌ساز: چرا نورپردازی اختصاصی هویت‌بخش فضای شماست؟*
    4. *تابلوهای رترو و قاب فلزی: تزئین دیوار با پوسترهای کلاسیک و نوستالژیک*
    5. *ساعت رترو و تلفن وینتیج: اکسسوری‌های نمادین روی میز کار و کنسول*
    6. *راهنمای خرید عتیقه‌جات و وسایل دکوری وینتیج در ایران: از سمساری تا بساط ناب*
  - Attached authentic featured images from genuine store media library to each blog post.
  - Added structured data: `BlogPosting` JSON-LD schema with author, publisher, datePublished, and image graph for search engines.
  - Added **Latest Articles Showcase Section** (`.home-blog-showcase`) on homepage [`front-page.php`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/front-page.php) for internal link equity and user discovery.
  - Added "وبلاگ و دانشنامه" links to desktop header navigation, mobile drawer menu, and footer links.
  - Added blog and single article typography rules in [`assets/css/main.css`](file:///C:/Users/Hamed/.gemini/antigravity/scratch/basate-nab/assets/css/main.css).

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

### Fixed
- **Mobile PageSpeed & Accessibility Optimization**:
  - Fixed "Links do not have a discernible name" audit by adding explicit `aria-label="<?php the_title_attribute(); ?>"` and image `alt` attributes to all product thumbnail links in `.products-grid`.
  - Added non-blocking `defer` attribute to `basate-main.js` reducing render-blocking resources.
  - **Self-Hosted Local Typography (Zero External CDN Dependency)**:
    - Downloaded and bundled Woff2 webfonts for Vazirmatn locally into `assets/fonts/vazirmatn/` (`Light`, `Regular`, `Medium`, `SemiBold`, `Bold`).
    - Embedded local `@font-face` definitions directly into `style.css` with `font-display: swap`.
    - Removed remote `cdn.jsdelivr.net` CSS dependency from `functions.php` enqueue queue, completely eliminating third-party DNS lookup, SSL handshake, and round-trip latency.
    - Preloaded local `Vazirmatn-Regular.woff2` via `<link rel="preload">` in `header.php` for instant font rendering.

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

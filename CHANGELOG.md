# Changelog

All notable changes to the **Basate Nab** WordPress Theme project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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

# Changelog

All notable changes to the **Basate Nab** WordPress Theme project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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
  - Automated seed generator for 8 vintage antique catalog products with pricing, stock, categories, and descriptions.
  - High-resolution editorial photography generation and attachment to products.
- **Technical SEO & Structured Data Engine**:
  - JSON-LD Structured Data: `WebSite` with Sitelinks Searchbox, `Organization` & `HomeGoodsStore` with link to Instagram `@basate_nab`, `Product` schema with offers and currency in IRT, and `BreadcrumbList`.
  - Open Graph (`og:*`) & Twitter Cards (`summary_large_image`).
  - Permalinks migration to clean URL structure (`/%postname%/`).
  - Canonical links and robots indexing directives.
- **DevOps & Continuous Deployment**:
  - `deploy_sync.py`: Automated packaging, authenticated admin upload, overwrite replacement, and live verification.
  - Operational runbook saved to `C:\Users\Hamed\Documents\Antigravity_Docs\basate_nab_wordpress_tech_runbook.md`.

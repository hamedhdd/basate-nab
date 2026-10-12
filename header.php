<?php
/**
 * Basate Nab - header.php
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="<?php echo esc_url(get_template_directory_uri() . '/assets/fonts/vazirmatn/Vazirmatn-Regular.woff2'); ?>" as="font" type="font/woff2" crossorigin>
    <link rel="dns-prefetch" href="https://www.instagram.com">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- 1. Top Announcement Bar -->
<div class="top-announcement">
    <div class="container top-announcement-inner">
        <div class="announcement-text">
            <span class="announcement-badge">ارسال ایمن</span>
            <span>بسته‌بندی ویژه و ضدضربه آباژور و اشیای آنتیک با ضمانت ۱۰۰٪ سلامت فیزیکی</span>
        </div>
        <div class="announcement-socials">
            <a href="https://t.me/basate_nab" target="_blank" rel="noopener noreferrer" title="کانال تلگرام بساط ناب">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m21.5 2.5-19 8.5 7 3.5 3.5 7 2-4.5 6.5 4.5 3-19z"/><path d="m9.5 14.5 12-12"/></svg>
                <span class="d-none d-sm-inline">تلگرام</span>
            </a>
            <a href="https://ble.ir/basatenab" target="_blank" rel="noopener noreferrer" title="کانال بله بساط ناب">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/><circle cx="9" cy="12" r="1" fill="currentColor"/><circle cx="12" cy="12" r="1" fill="currentColor"/><circle cx="15" cy="12" r="1" fill="currentColor"/></svg>
                <span class="d-none d-sm-inline">بله</span>
            </a>
            <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener noreferrer" title="اینستاگرام بساط ناب">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                <span class="d-none d-sm-inline">اینستاگرام</span>
            </a>
        </div>
    </div>
</div>

<!-- 2. Sticky Header -->
<header id="masthead" class="site-header">
    <div class="container header-inner">
        <!-- Brand & Mobile Toggle Group -->
        <div class="header-brand-side">
            <!-- Mobile Menu Toggle -->
            <button type="button" class="action-btn mobile-menu-toggle d-lg-none" data-toggle="mobile-drawer" aria-label="منوی سایت">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>

            <!-- Brand Identity -->
            <div class="brand-wrapper">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link">
                    <div class="brand-logo-icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.jpg'); ?>" alt="لوگوی بساط ناب" style="width:100%; height:100%; object-fit:cover; border-radius:inherit;" loading="eager">
                    </div>
                    <div class="brand-text-block">
                        <span class="brand-title">بساط ناب</span>
                        <span class="brand-tagline">آباژور و دکوراتیو وینتیج</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Search Bar (Row 2 on Mobile, Center on Desktop) -->
        <div class="header-search">
            <form role="search" method="get" class="search-form-wrapper" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="hidden" name="post_type" value="product">
                <input type="search" id="header-search-input" name="s" placeholder="جستجوی آباژور، لوستر، آینه محدب، چراغ مطالعه، تابلو..." value="<?php echo get_search_query(); ?>" autocomplete="off" required>
                <button type="submit" class="search-submit-btn" aria-label="جستجو">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>
            <div id="live-search-results" class="live-search-results-dropdown"></div>
        </div>

        <!-- Actions -->
        <div class="header-actions">
            <!-- Instagram Button -->
            <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener noreferrer" class="action-btn instagram-pill" title="مشاهده استوری و جدیدترین اجناس">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                <span class="d-none d-md-inline">اینستاگرام</span>
            </a>

            <!-- User Account -->
            <?php 
            $account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : wp_login_url();
            ?>
            <a href="<?php echo esc_url($account_url); ?>" class="action-btn account-pill" title="حساب کاربری">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span class="d-none d-lg-inline"><?php echo is_user_logged_in() ? 'حساب من' : 'ورود / ثبت‌نام'; ?></span>
            </a>

            <!-- Cart Pill -->
            <?php 
            $cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : '#';
            $cart_count = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
            ?>
            <a href="<?php echo esc_url($cart_url); ?>" class="action-btn cart-pill" title="سبد خرید">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                <span class="cart-badge-count"><?php echo basate_fa_num($cart_count); ?></span>
                <span class="d-none d-lg-inline">سبد خرید</span>
            </a>
        </div>
    </div>

    <!-- Navigation Menu Strip (Desktop) -->
    <div class="header-nav-strip">
        <div class="container nav-strip-inner">
            <nav class="nav-strip-menu">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo is_front_page() ? 'active' : ''; ?>">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
                    صفحه نخست
                </a>
                <a href="<?php echo esc_url(home_url('/product-category/table-lamps/')); ?>">آباژور رومیزی</a>
                <a href="<?php echo esc_url(home_url('/product-category/floor-lamps/')); ?>">آباژور قدی</a>
                <a href="<?php echo esc_url(home_url('/product-category/chandeliers/')); ?>">لوستر</a>
                <a href="<?php echo esc_url(home_url('/product-category/study-lamps/')); ?>">چراغ مطالعه</a>
                <a href="<?php echo esc_url(home_url('/product-category/wall-lamps/')); ?>">چراغ دیواری</a>
                <a href="<?php echo esc_url(home_url('/product-category/decorative-clocks/')); ?>">ساعت دکوری</a>
                <a href="<?php echo esc_url(home_url('/product-category/convex-mirrors/')); ?>">آینه محدب</a>
                <a href="<?php echo esc_url(home_url('/product-category/decorative-mirrors/')); ?>">آینه‌های دکوری</a>
                <a href="<?php echo esc_url(home_url('/product-category/vintage-decor/')); ?>">وسایل وینتیج</a>
                <a href="<?php echo esc_url(home_url('/product-category/retro-frames/')); ?>">تابلوهای رترو</a>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="<?php echo (is_page('blog') || is_home() || is_singular('post')) ? 'active' : ''; ?>">
                    وبلاگ و دانشنامه
                </a>
            </nav>
            <div class="nav-strip-contact" style="display:flex !important; flex-direction:row !important; align-items:center !important;">
                <div class="nav-strip-social-icons" style="display:flex !important; flex-direction:row !important; align-items:center !important; gap:8px !important;">
                    <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener noreferrer" class="nav-strip-social-btn ig" title="پیج اینستاگرام بساط ناب" aria-label="اینستاگرام">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <a href="https://t.me/basate_nab" target="_blank" rel="noopener noreferrer" class="nav-strip-social-btn tg" title="کانال تلگرام بساط ناب" aria-label="تلگرام">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m21.5 2.5-19 8.5 7 3.5 3.5 7 2-4.5 6.5 4.5 3-19z"/><path d="m9.5 14.5 12-12"/></svg>
                    </a>
                    <a href="https://ble.ir/basatenab" target="_blank" rel="noopener noreferrer" class="nav-strip-social-btn bale" title="کانال بله بساط ناب" aria-label="بله">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/><circle cx="9" cy="12" r="1" fill="currentColor"/><circle cx="12" cy="12" r="1" fill="currentColor"/><circle cx="15" cy="12" r="1" fill="currentColor"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div id="drawer-backdrop" class="drawer-backdrop"></div>
<aside id="mobile-drawer" class="mobile-drawer">
    <div class="drawer-header">
        <div style="display:flex; align-items:center; gap:8px;">
            <div class="brand-logo-icon" style="width:36px; height:36px;">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.jpg'); ?>" alt="لوگوی بساط ناب" style="width:100%; height:100%; object-fit:cover; border-radius:inherit;">
            </div>
            <strong style="color:var(--color-dark); font-size:1.1rem;">بساط ناب</strong>
        </div>
        <button id="close-drawer-btn" style="background:none; color:#666; font-size:1.4rem; cursor:pointer;" aria-label="بستن منو">&times;</button>
    </div>
    <div class="drawer-content">
        <ul class="drawer-menu-list">
            <li><a href="<?php echo esc_url(home_url('/')); ?>">🏠 صفحه نخست</a></li>
            <li><a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">🛍️ همه محصولات فروشگاه</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/table-lamps/')); ?>">💡 آباژور رومیزی</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/floor-lamps/')); ?>">🛋️ آباژور قدی</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/chandeliers/')); ?>">🕯️ لوستر</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/study-lamps/')); ?>">📖 چراغ مطالعه</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/wall-lamps/')); ?>">🏮 چراغ دیواری</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/decorative-clocks/')); ?>">⏰ ساعت دکوری</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/convex-mirrors/')); ?>">🪞 آینه محدب</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/decorative-mirrors/')); ?>">✨ آینه‌های دکوری</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/vintage-decor/')); ?>">📻 وسایل وینتیج</a></li>
            <li><a href="<?php echo esc_url(home_url('/product-category/retro-frames/')); ?>">🖼️ تابلوهای رترو</a></li>
            <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">📚 وبلاگ و دانشنامه دکوراسیون</a></li>
            <li><a href="https://t.me/basate_nab" target="_blank" rel="noopener">✈️ کانال تلگرام @basate_nab</a></li>
            <li><a href="https://ble.ir/basatenab" target="_blank" rel="noopener">💬 کانال بله @basatenab</a></li>
            <li><a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener">📸 پیج اینستاگرام @basate_nab</a></li>
            <li><a href="<?php echo esc_url($account_url); ?>">👤 حساب کاربری من</a></li>
        </ul>
        <div style="margin-top:24px; padding-top:16px; border-top:1px solid var(--color-border); font-size:0.85rem; color:var(--color-text-muted);">
            <p><strong>کانال‌ها و ارتباط مستقیم:</strong></p>
            <p style="margin-top:6px; display:flex; flex-direction:column; gap:6px;">
                <a href="https://t.me/basate_nab" target="_blank" rel="noopener" style="color:#229ED9; font-weight:700;">• تلگرام: t.me/basate_nab</a>
                <a href="https://ble.ir/basatenab" target="_blank" rel="noopener" style="color:#00A693; font-weight:700;">• بله: ble.ir/basatenab</a>
                <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener" style="color:var(--color-primary); font-weight:700;">• اینستاگرام: @basate_nab</a>
            </p>
        </div>
    </div>
</aside>

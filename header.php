<?php
/**
 * Basate Nab - header.php
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener noreferrer" title="اینستاگرام بساط ناب">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                <span>@basate_nab</span>
            </a>
            <a href="tel:09198321361" title="تماس و مشاوره">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                <span>۰۹۱۹۸۳۲۱۳۶۱</span>
            </a>
        </div>
    </div>
</div>

<!-- 2. Sticky Header -->
<header id="masthead" class="site-header">
    <div class="container header-inner">
        <!-- Mobile Menu Toggle -->
        <button type="button" class="action-btn d-lg-none" data-toggle="mobile-drawer" aria-label="منوی سایت" style="display:inline-flex; width:40px; height:40px; padding:0; justify-content:center; align-items:center;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </button>

        <!-- Brand Identity -->
        <div class="brand-wrapper">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link" style="display:flex; align-items:center; gap:12px;">
                <div class="brand-logo-icon">
                    <!-- Vintage Lamp SVG Icon -->
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 2h6l3 7H6l3-7z"/>
                        <path d="M12 9v9"/>
                        <path d="M8 22h8"/>
                        <path d="M10 18h4"/>
                    </svg>
                </div>
                <div class="brand-text-block">
                    <span class="brand-title">بساط ناب</span>
                    <span class="brand-tagline">آباژور و دکوراتیو وینتیج</span>
                </div>
            </a>
        </div>

        <!-- Search Bar -->
        <div class="header-search">
            <form role="search" method="get" class="search-form-wrapper" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="hidden" name="post_type" value="product">
                <input type="search" id="header-search-input" name="s" placeholder="جستجوی آباژور، تابلو رترو، چراغ رومیزی، آنتیک..." value="<?php echo get_search_query(); ?>" autocomplete="off" required>
                <button type="submit" class="search-submit-btn" aria-label="جستجو">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>
            <div id="live-search-results" style="display:none; position:absolute; top:calc(100% + 8px); left:0; right:0; background:#fff; border:1px solid var(--color-border); border-radius:var(--radius-md); box-shadow:var(--shadow-lg); z-index:110; max-height:320px; overflow-y:auto;"></div>
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
            <a href="<?php echo esc_url($account_url); ?>" class="action-btn" title="حساب کاربری">
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
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">
                    فروشگاه و همه محصولات
                </a>
                <a href="<?php echo esc_url(home_url('/?s=آباژور&post_type=product')); ?>">
                    آباژورهای وینتیج
                </a>
                <a href="<?php echo esc_url(home_url('/?s=تابلو&post_type=product')); ?>">
                    تابلوهای رترو
                </a>
                <a href="<?php echo esc_url(home_url('/?s=آنتیک&post_type=product')); ?>">
                    اشیاء و ظروف آنتیک
                </a>
                <a href="<?php echo esc_url(home_url('/?s=ساعت&post_type=product')); ?>">
                    ساعت و گرامافون
                </a>
                <a href="#special-offers" class="highlight">
                    🔥 تخفیف‌های ویژه عتیقه
                </a>
            </nav>
            <div class="nav-strip-contact">
                <span>مشاوره و ثبت سفارش: ۰۹۱۹۸۳۲۱۳۶۱</span>
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
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 2h6l3 7H6l3-7z"/><path d="M12 9v9"/><path d="M8 22h8"/></svg>
            </div>
            <strong style="color:var(--color-dark); font-size:1.1rem;">بساط ناب</strong>
        </div>
        <button id="close-drawer-btn" style="background:none; color:#666; font-size:1.4rem; cursor:pointer;" aria-label="بستن منو">&times;</button>
    </div>
    <div class="drawer-content">
        <ul class="drawer-menu-list">
            <li><a href="<?php echo esc_url(home_url('/')); ?>">🏠 صفحه نخست</a></li>
            <li><a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">🛍️ همه محصولات فروشگاه</a></li>
            <li><a href="<?php echo esc_url(home_url('/?s=آباژور&post_type=product')); ?>">💡 آباژور و چراغ‌های وینتیج</a></li>
            <li><a href="<?php echo esc_url(home_url('/?s=تابلو&post_type=product')); ?>">🖼️ تابلوهای رترو و کهنه‌کاری</a></li>
            <li><a href="<?php echo esc_url(home_url('/?s=آنتیک&post_type=product')); ?>">🏺 ظروف و اشیای آنتیک</a></li>
            <li><a href="<?php echo esc_url(home_url('/?s=گرامافون&post_type=product')); ?>">📻 گرامافون و رادیوهای کلاسیک</a></li>
            <li><a href="<?php echo esc_url(home_url('/?s=ساعت&post_type=product')); ?>">⏰ ساعت‌های دیواری و رومیزی رترو</a></li>
            <li><a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener">📸 پیج اینستاگرام @basate_nab</a></li>
            <li><a href="<?php echo esc_url($account_url); ?>">👤 حساب کاربری من</a></li>
        </ul>
        <div style="margin-top:24px; padding-top:16px; border-top:1px solid var(--color-border); font-size:0.85rem; color:var(--color-text-muted);">
            <p><strong>پشتیبانی و سفارش تلفنی:</strong></p>
            <p style="margin-top:4px;"><a href="tel:09198321361" style="color:var(--color-dark); font-weight:700;">۰۹۱۹۸۳۲۱۳۶۱</a></p>
        </div>
    </div>
</aside>

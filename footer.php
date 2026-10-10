<?php
/**
 * Basate Nab - footer.php
 */
?>
<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-top-grid">
            <!-- Col 1: About -->
            <div class="footer-col">
                <h4>درباره فروشگاه بساط ناب</h4>
                <p>
                    مجموعه «بساط ناب» مرجع تخصصی طراحی، گردآوری و عرضه انواع آباژورهای وینتیج، چراغ‌های رومیزی و کنارسالنی برنجی، تابلوهای دکوراتیو رترو، ظروف کهنه‌کاری و اشیای آنتیک دست‌ساز در ایران است.
                </p>
                <p>
                    تمامی اقلام با بسته‌بندی ایمن چندلایه ضدضربه و ضمانت ۱۰۰٪ سلامت فیزیکی به سراسر شهرهای کشور ارسال می‌شوند.
                </p>
            </div>

            <!-- Col 2: Categories -->
            <div class="footer-col">
                <h4>دسته‌بندی‌های محبوب</h4>
                <ul class="footer-links-list">
                    <li><a href="<?php echo esc_url(home_url('/?s=آباژور+رومیزی&post_type=product')); ?>">آباژور و چراغ‌های رومیزی</a></li>
                    <li><a href="<?php echo esc_url(home_url('/?s=آباژور+ایستاده&post_type=product')); ?>">آباژورهای ایستاده و سالنی</a></li>
                    <li><a href="<?php echo esc_url(home_url('/?s=تابلو+رترو&post_type=product')); ?>">تابلوهای رترو و قاب کهنه‌کاری</a></li>
                    <li><a href="<?php echo esc_url(home_url('/?s=گرامافون&post_type=product')); ?>">گرامافون، رادیو و والو کلاسیک</a></li>
                    <li><a href="<?php echo esc_url(home_url('/?s=آنتیک&post_type=product')); ?>">ظروف برنجی و اشیای آنتیک</a></li>
                </ul>
            </div>

            <!-- Col 3: Contact Info -->
            <div class="footer-col">
                <h4>ارتباط با ما</h4>
                <ul class="footer-links-list">
                    <li>
                        <strong>تلفن و مشاوره:</strong>
                        <a href="tel:09198321361" dir="ltr">0919 832 1361</a>
                    </li>
                    <li>
                        <strong>سفارش آنلاین اینستاگرام:</strong>
                        <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener">@basate_nab</a>
                    </li>
                    <li>
                        <strong>ساعات پاسخگویی:</strong>
                        <span>همه‌روزه ۱۰ صبح الی ۲۱</span>
                    </li>
                    <li>
                        <strong>ارسال سفارشات:</strong>
                        <span>از طریق پست پیشتاز، تیپاکس و باربری ایمن</span>
                    </li>
                </ul>
            </div>

            <!-- Col 4: Trust Badges & Socials -->
            <div class="footer-col">
                <h4>مجوزها و اصالت خرید</h4>
                <div class="footer-trust-box">
                    <div class="trust-badge-placeholder" title="نماد اعتماد الکترونیکی">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--color-primary)" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <div class="trust-badge-placeholder" title="ضمانت سلامت فیزیکی کالا">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--color-dark)" stroke-width="1.8"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                    </div>
                </div>
                <div style="margin-top:16px;">
                    <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener" class="action-btn instagram-pill" style="width:100%; justify-content:center;">
                        عضویت در اینستاگرام بساط ناب
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright Bar -->
        <div class="footer-bottom-bar">
            <div>
                © <?php echo basate_fa_num(date('Y')); ?> تمامی حقوق مادی و معنوی محفوظ و متعلق به فروشگاه <strong>بساط ناب</strong> است.
            </div>
            <div>
                طراحی اختصاصی رترو و بهینه‌سازی فروشگاهی با ووکامرس
            </div>
        </div>
    </div>
</footer>

<!-- Mobile Bottom Navigation Bar (Matching noor3tar.ir exact UX) -->
<nav class="mobile-app-bar" aria-label="ناوبری موبایل">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav-item active">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>
        <span>خانه</span>
    </a>
    <a href="#" class="mobile-nav-item" data-toggle="mobile-drawer">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
        <span>دسته‌ها</span>
    </a>
    <?php 
    $cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : '#';
    $cart_count = (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
    ?>
    <a href="<?php echo esc_url($cart_url); ?>" class="mobile-nav-item">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
        <span class="mobile-nav-badge"><?php echo basate_fa_num($cart_count); ?></span>
        <span>سبد خرید</span>
    </a>
    <?php 
    $account_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : wp_login_url();
    ?>
    <a href="<?php echo esc_url($account_url); ?>" class="mobile-nav-item">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        <span>حساب من</span>
    </a>
    <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener" class="mobile-nav-item">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path></svg>
        <span>اینستاگرام</span>
    </a>
</nav>

<!-- Back to Top Button -->
<button id="back-to-top" class="back-to-top-btn" aria-label="بازگشت به بالای صفحه">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
</button>

<?php wp_footer(); ?>
</body>
</html>

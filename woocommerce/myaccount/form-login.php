<?php
/**
 * Basate Nab - WooCommerce Login & Registration Template
 * Template Override: woocommerce/myaccount/form-login.php
 */

if (!defined('ABSPATH')) {
    exit;
}

do_action('woocommerce_before_customer_login_form'); ?>

<div class="auth-page-wrapper">
    <!-- Quick Nav Toggle for Mobile / Quick Jumping -->
    <div class="auth-tabs-nav">
        <a href="#customer_login_col" class="auth-tab-btn active" id="tab-login-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
            <span>ورود به حساب کاربری</span>
        </a>
        <a href="#customer_register_col" class="auth-tab-btn" id="tab-register-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
            <span>عضویت و ثبت‌نام جدید</span>
        </a>
    </div>

    <div class="u-columns col2-set auth-grid-container" id="customer_login">

        <!-- Column 1: Login Form -->
        <div class="u-column1 col-1 auth-card" id="customer_login_col">
            <div class="auth-card-header">
                <div class="auth-icon-circle">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
                <div>
                    <h2 class="auth-card-title">ورود به حساب کاربری</h2>
                    <p class="auth-card-subtitle">اگر قبلاً در بساط ناب حساب ساخته‌اید، وارد شوید</p>
                </div>
            </div>

            <form class="woocommerce-form woocommerce-form-login login auth-form" method="post">
                <?php do_action('woocommerce_login_form_start'); ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="username">نام کاربری یا نشانی ایمیل&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" placeholder="مثال: info@example.com یا نام کاربری" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" required />
                </p>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password">گذرواژه (رمز عبور)&nbsp;<span class="required">*</span></label>
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" placeholder="••••••••" required />
                </p>

                <?php do_action('woocommerce_login_form'); ?>

                <div class="auth-remember-row">
                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                        <span>مرا به خاطر بسپار</span>
                    </label>
                    <p class="woocommerce-LostPassword lost_password">
                        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>">فراموشی رمز عبور؟</a>
                    </p>
                </div>

                <p class="form-row auth-submit-row">
                    <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit auth-submit-btn" name="login" value="ورود">
                        <span>ورود به حساب</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </p>

                <div class="auth-switch-footer d-md-none">
                    <span>حساب کاربری ندارید؟</span>
                    <a href="#customer_register_col" class="auth-switch-link">ثبت‌نام و عضویت در سایت</a>
                </div>

                <?php do_action('woocommerce_login_form_end'); ?>
            </form>
        </div>

        <!-- Column 2: Register Form -->
        <div class="u-column2 col-2 auth-card" id="customer_register_col">
            <div class="auth-card-header">
                <div class="auth-icon-circle highlight">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                </div>
                <div>
                    <h2 class="auth-card-title">عضویت و ثبت‌نام در بساط ناب</h2>
                    <p class="auth-card-subtitle">ایجاد حساب سریع جهت پیگیری علاقه‌مندی‌ها و سفارشات</p>
                </div>
            </div>

            <form method="post" class="woocommerce-form woocommerce-form-register register auth-form" <?php do_action('woocommerce_register_form_tag'); ?> >
                <?php do_action('woocommerce_register_form_start'); ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_username">نام کاربری دلخواه&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" placeholder="یک نام کاربری به انگلیسی یا شماره موبایل" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" required />
                </p>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_email">نشانی ایمیل معتبر&nbsp;<span class="required">*</span></label>
                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" placeholder="example@gmail.com" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" required />
                </p>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="reg_password">رمز عبور دلخواه&nbsp;<span class="required">*</span></label>
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" placeholder="حداقل ۶ کاراکتر با امنیت مناسب" required />
                </p>

                <div class="auth-privacy-notice">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span>اطلاعات شما نزد فروشگاه بساط ناب محفوظ است و صرفاً برای مدیریت سفارشات و حساب کاربری استفاده می‌شود.</span>
                </div>

                <?php do_action('woocommerce_register_form'); ?>

                <p class="woocommerce-form-row form-row auth-submit-row">
                    <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                    <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit auth-submit-btn register-btn" name="register" value="عضویت در سایت">
                        <span>ایجاد حساب کاربری</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </p>

                <div class="auth-switch-footer d-md-none">
                    <span>قبلاً عضو شده‌اید؟</span>
                    <a href="#customer_login_col" class="auth-switch-link">ورود به حساب کاربری</a>
                </div>

                <?php do_action('woocommerce_register_form_end'); ?>
            </form>
        </div>

    </div>
</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>

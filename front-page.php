<?php
/**
 * Basate Nab - front-page.php
 * E-commerce Homepage matching noor3tar.ir layout & vintage aesthetic
 */
get_header();
?>

<main id="primary" class="site-main">
    <div class="container">

        <!-- 1. Category Stories (Circular Navigation - 10 Requested Categories) -->
        <section class="category-stories-section">
            <div class="category-stories-scroll">
                <!-- 1. آباژور رومیزی -->
                <a href="<?php echo esc_url(home_url('/product-category/table-lamps/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 2h6l3 7H6l3-7z"/><path d="M12 9v9"/><path d="M8 22h8"/></svg>
                        </div>
                    </div>
                    <span class="story-label">آباژور رومیزی</span>
                </a>

                <!-- 2. آباژور قدی -->
                <a href="<?php echo esc_url(home_url('/product-category/floor-lamps/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M10 2h4l2 6H8l2-6z"/><line x1="12" y1="8" x2="12" y2="21"/><line x1="7" y1="21" x2="17" y2="21"/></svg>
                        </div>
                    </div>
                    <span class="story-label">آباژور قدی</span>
                </a>

                <!-- 3. لوستر -->
                <a href="<?php echo esc_url(home_url('/product-category/chandeliers/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><line x1="12" y1="2" x2="12" y2="8"/><path d="M4 10c0 4 3.5 7 8 7s8-3 8-7"/><path d="M5 10v-2"/><path d="M19 10v-2"/><path d="M12 17v4"/><circle cx="12" cy="10" r="1.5"/></svg>
                        </div>
                    </div>
                    <span class="story-label">لوستر</span>
                </a>

                <!-- 4. چراغ مطالعه -->
                <a href="<?php echo esc_url(home_url('/product-category/study-lamps/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M5 21h14"/><path d="M8 21v-4l4-8 4-4"/><circle cx="16" cy="5" r="2.5"/><path d="M12 9l4 2"/></svg>
                        </div>
                    </div>
                    <span class="story-label">چراغ مطالعه</span>
                </a>

                <!-- 5. چراغ دیواری -->
                <a href="<?php echo esc_url(home_url('/product-category/wall-lamps/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 8v8"/><path d="M4 12h6"/><path d="M10 8l4-3v7l-4-1z"/><circle cx="17" cy="10" r="2"/></svg>
                        </div>
                    </div>
                    <span class="story-label">چراغ دیواری</span>
                </a>

                <!-- 6. ساعت دکوری -->
                <a href="<?php echo esc_url(home_url('/product-category/decorative-clocks/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="13" r="8"/><polyline points="12 9 12 13 15 15"/><path d="M5 4L3 6"/><path d="M19 4l2 2"/></svg>
                        </div>
                    </div>
                    <span class="story-label">ساعت دکوری</span>
                </a>

                <!-- 7. آینه محدب -->
                <a href="<?php echo esc_url(home_url('/product-category/convex-mirrors/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="6" stroke-dasharray="2 2"/><circle cx="12" cy="12" r="2"/></svg>
                        </div>
                    </div>
                    <span class="story-label">آینه محدب</span>
                </a>

                <!-- 8. آینه های دکوری -->
                <a href="<?php echo esc_url(home_url('/product-category/decorative-mirrors/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="3" width="16" height="18" rx="8"/><circle cx="12" cy="12" r="4"/></svg>
                        </div>
                    </div>
                    <span class="story-label">آینه‌های دکوری</span>
                </a>

                <!-- 9. وسایل وینتیج -->
                <a href="<?php echo esc_url(home_url('/product-category/vintage-decor/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3"/><line x1="12" y1="4" x2="12" y2="9"/><path d="M12 15v5"/></svg>
                        </div>
                    </div>
                    <span class="story-label">وسایل وینتیج</span>
                </a>

                <!-- 10. تابلو های رترو -->
                <a href="<?php echo esc_url(home_url('/product-category/retro-frames/')); ?>" class="story-item">
                    <div class="story-circle">
                        <div class="story-circle-inner">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        </div>
                    </div>
                    <span class="story-label">تابلوهای رترو</span>
                </a>
            </div>
        </section>

        <!-- 2. Hero Showcase Grid -->
        <section class="hero-showcase">
            <div class="hero-grid">
                <!-- Main Showcase Card -->
                <div class="hero-main-card">
                    <div>
                        <span class="hero-tag">کلکسیون جدید پاییزه</span>
                        <h2 class="hero-title">آباژورهای دست‌ساز وینتیج و روشنایی رترو</h2>
                        <p class="hero-desc">
                            ترکیب اصالت فلزات برنجی کهنه‌کاری شده با پایه‌های چوب گردو و کلاه‌های پارچه‌ای دست‌دوز. نوری گرم و دل‌نشین برای فضاهای نوستالژیک و دکوراسیون خاص شما.
                        </p>
                    </div>
                    <div class="hero-btn-row">
                        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-primary-retro">
                            <span>مشاهده و خرید محصولات</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                        <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener" class="btn-outline-retro">
                            <span>پیج اینستاگرام @basate_nab</span>
                        </a>
                    </div>
                </div>

                <!-- Side Cards -->
                <div class="hero-side-grid">
                    <div class="hero-side-card antique-gold">
                        <div>
                            <h3>تابلوهای دکوراتیو رترو</h3>
                            <p>قاب‌های چوبی کهنه‌کاری شده با طرح‌های نوستالژیک سینمایی و هنری قرن بیستم</p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/?s=تابلو&post_type=product')); ?>" class="hero-side-link">
                            <span>مشاهده کلکسیون تابلوها &larr;</span>
                        </a>
                    </div>
                    <div class="hero-side-card vintage-brick">
                        <div>
                            <h3>اشیای آنتیک و اکسسوری کلاسیک</h3>
                            <p>گرامافون‌های شیپوری، رادیوهای لامپی، ظروف برنجی و اشیای نایاب کلکسیونی</p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/?s=آنتیک&post_type=product')); ?>" class="hero-side-link">
                            <span>کشف عتیقه‌جات خاص &larr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Flash Sale / Special Offer Banner -->
        <section id="special-offers" class="special-offer-banner" data-countdown>
            <div class="offer-header-info">
                <div class="offer-icon-box">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                </div>
                <div class="offer-title">
                    <h3>ویترین عتیقه‌جات و آباژورهای تک‌نسخه</h3>
                    <p>جهت استعلام موجودی، قیمت و ثبت سفارش با ما در ارتباط باشید</p>
                </div>
            </div>
            <div class="countdown-box">
                <div class="countdown-item">
                    <div id="cd-seconds" class="countdown-val">۴۵</div>
                    <div class="countdown-label">ثانیه</div>
                </div>
                <div class="countdown-item">
                    <div id="cd-minutes" class="countdown-val">۲۸</div>
                    <div class="countdown-label">دقیقه</div>
                </div>
                <div class="countdown-item">
                    <div id="cd-hours" class="countdown-val">۱۴</div>
                    <div class="countdown-label">ساعت</div>
                </div>
            </div>
        </section>

        <!-- 4. Featured Products Grid (آباژورها و روشنایی وینتیج) -->
        <section class="section-block">
            <div class="section-title-strip">
                <div class="section-heading-group">
                    <div class="section-heading-indicator"></div>
                    <h3 class="section-heading-title">جدیدترین آباژورهای رومیزی و کنارسالنی</h3>
                </div>
                <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="section-view-all">
                    <span>مشاهده همه</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </a>
            </div>

            <div class="products-grid">
                <?php
                // Fetch real WooCommerce products
                $args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 12,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        global $product;
                        $price = $product->get_price();
                        $regular_price = $product->get_regular_price();
                        $is_on_sale = $product->is_on_sale();
                        $discount_percent = 0;
                        if ($is_on_sale && $regular_price > 0 && !empty($price)) {
                            $discount_percent = round((($regular_price - $price) / $regular_price) * 100);
                        }
                        ?>
                        <article class="retro-product-card">
                            <div class="product-thumb-wrapper">
                                <?php if ($is_on_sale && !empty($price)) : ?>
                                    <span class="badge-discount"><?php echo basate_fa_num($discount_percent); ?>٪ تخفیف</span>
                                <?php endif; ?>
                                <span class="badge-antique">وینتیج</span>
                                <?php if (function_exists('basate_nab_get_product_video_data') && basate_nab_get_product_video_data(get_the_ID())) : ?>
                                    <span class="badge-video-available" title="دارای ویدیوی محصول در اینستاگرام">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                                        <span>دارای ویدیو</span>
                                    </span>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', array('loading' => 'lazy', 'alt' => get_the_title())); ?>
                                    <?php else : ?>
                                        <div style="display:flex; align-items:center; justify-content:center; width:100%; height:100%; background:#f5efe6; color:#9c8c7d;">
                                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 2h6l3 7H6l3-7z"/><path d="M12 9v9"/><path d="M8 22h8"/></svg>
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="product-info-body">
                                <div>
                                    <div class="product-category-tag">
                                        <?php 
                                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                                        echo ($terms && !is_wp_error($terms)) ? esc_html($terms[0]->name) : 'دکوراتیو وینتیج';
                                        ?>
                                    </div>
                                    <h4 class="product-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                </div>
                                <div>
                                    <div class="product-pricing-row">
                                        <?php if (!empty($price)) : ?>
                                            <div class="product-price-current">
                                                <?php echo basate_fa_num(number_format((float)$price)); ?> <span class="currency">تومان</span>
                                            </div>
                                            <?php if ($is_on_sale && $regular_price) : ?>
                                                <div class="product-price-regular">
                                                    <?php echo basate_fa_num(number_format((float)$regular_price)); ?>
                                                </div>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <div class="product-price-current">
                                                <span class="price-on-request" style="font-size:0.85rem; color:var(--color-primary); font-weight:700;">استعلام قیمت در دایرکت</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-card-cta">
                                        <?php if (!empty($price)) : ?>
                                            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>" class="btn-add-cart-card">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                                افزودن به سبد خرید
                                            </a>
                                        <?php else : ?>
                                            <a href="<?php the_permalink(); ?>" class="btn-add-cart-card">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                                                مشاهده و جزئیات
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback sample cards if store is freshly initialized
                    $samples = array(
                        array('title' => 'آباژور رومیزی برنجی طرح لاله عباسی کهنه‌کاری', 'price' => 1850000, 'old' => 2200000, 'cat' => 'آباژور رومیزی'),
                        array('title' => 'آباژور سالنی پایه چوب گردو با شید کتان دست‌دوز', 'price' => 3450000, 'old' => 3900000, 'cat' => 'آباژور ایستاده'),
                        array('title' => 'چراغ رومیزی صنعتی رترو با لامپ ادیسونی دیمردار', 'price' => 1290000, 'old' => 1550000, 'cat' => 'چراغ رترو'),
                        array('title' => 'تابلو رترو فلزی دیواری طرح تبلیغات کلاسیک ۱۹۶۰', 'price' => 480000, 'old' => 590000, 'cat' => 'تابلوهای رترو'),
                        array('title' => 'گرامافون شیپوری برنجی آنتیک با موتور هندلی اصل', 'price' => 8900000, 'old' => 9800000, 'cat' => 'گرامافون و آنتیک'),
                        array('title' => 'رادیو ترانزیستوری چوبی رترو بلوتوث‌دار شارژی', 'price' => 2150000, 'old' => 2400000, 'cat' => 'رادیو کلاسیک'),
                        array('title' => 'ساعت رومیزی زنگ‌دار مکانیکی برنجی انگلیسی', 'price' => 1650000, 'old' => 1950000, 'cat' => 'ساعت وینتیج'),
                        array('title' => 'تلفن هندلی دیواری چوب بلوط طرح آنتیک سوئدی', 'price' => 4200000, 'old' => 4800000, 'cat' => 'اکسسوری آنتیک'),
                    );
                    foreach ($samples as $s) : ?>
                        <article class="retro-product-card">
                            <div class="product-thumb-wrapper">
                                <span class="badge-antique">وینتیج</span>
                                <div style="display:flex; align-items:center; justify-content:center; width:100%; height:100%; background:linear-gradient(135deg, #f7f1e6, #ebdcc7); color:#7d6b58;">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 2h6l3 7H6l3-7z"/><path d="M12 9v9"/><path d="M8 22h8"/></svg>
                                </div>
                            </div>
                            <div class="product-info-body">
                                <div>
                                    <div class="product-category-tag"><?php echo esc_html($s['cat']); ?></div>
                                    <h4 class="product-title">
                                        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"><?php echo esc_html($s['title']); ?></a>
                                    </h4>
                                </div>
                                <div>
                                    <div class="product-pricing-row">
                                        <div class="product-price-current">
                                            <span class="price-on-request" style="font-size:0.85rem; color:var(--color-primary); font-weight:700;">استعلام قیمت در دایرکت</span>
                                        </div>
                                    </div>
                                    <div class="product-card-cta">
                                        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn-add-cart-card">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                                            مشاهده و جزئیات
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach;
                endif; ?>
            </div>
        </section>

        <!-- 5. Promotional Banners (2-Columns) -->
        <section class="promo-grid-2">
            <div class="promo-banner-card bg-walnut">
                <h4>طراحی اختصاصی آباژور به سفارش مشتری</h4>
                <p>امکان تغییر رنگ کلاهک، جنس پایه و نوع سرپیچ متناسب با تم دکوراسیون منزل شما</p>
                <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener" class="btn-primary-retro" style="width:fit-content; padding:8px 20px; font-size:0.85rem;">
                    مشاوره و سفارش در دایرکت
                </a>
            </div>
            <div class="promo-banner-card bg-cream">
                <h4>کلکسیون تابلوهای متال رترو</h4>
                <p>پلاک‌های برجسته فلزی وارداتی مقاوم در برابر رطوبت و نور آفتاب با رنگ ثابت</p>
                <a href="<?php echo esc_url(home_url('/?s=تابلو&post_type=product')); ?>" class="hero-side-link" style="font-size:0.95rem;">
                    مشاهده طرح‌های موجود &larr;
                </a>
            </div>
        </section>

        <!-- 6. Trust Badges (مزایای خرید از بساط ناب) -->
        <section class="trust-badges-grid">
            <div class="trust-badge-card">
                <div class="trust-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                </div>
                <div class="trust-info">
                    <h4>ارسال ایمن و بیمه‌شده</h4>
                    <p>پست پیشتاز، تیپاکس و باربری</p>
                </div>
            </div>
            <div class="trust-badge-card">
                <div class="trust-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                </div>
                <div class="trust-info">
                    <h4>بسته‌بندی ضدضربه</h4>
                    <p>فوم و کارتن ۵ لایه عتیقه‌جات</p>
                </div>
            </div>
            <div class="trust-badge-card">
                <div class="trust-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div class="trust-info">
                    <h4>ضمانت اصالت و سلامت</h4>
                    <p>تضمین تطابق ۱۰۰٪ با عکس و ویدیو</p>
                </div>
            </div>
            <div class="trust-badge-card">
                <div class="trust-icon-box">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <div class="trust-info">
                    <h4>مشاوره چیدمان دکور</h4>
                    <p>پشتیبانی مستقیم در دایرکت اینستاگرام</p>
                </div>
            </div>
        </section>

        <!-- 7. Latest Blog & Vintage Interior Design Articles -->
        <section class="home-blog-showcase" style="margin-bottom:56px;">
            <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px; flex-wrap:wrap; gap:12px;">
                <div>
                    <span class="badge-antique" style="position:static; display:inline-block; margin-bottom:8px; padding:4px 12px; font-size:0.75rem;">دانشنامه و مقالات تخصصی</span>
                    <h3 style="font-size:1.45rem; font-weight:800; color:var(--color-dark); margin:0;">راهنمای دکوراسیون رترو، مید سنتری و نورپردازی وینتیج</h3>
                </div>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="view-all-link" style="display:inline-flex; align-items:center; gap:6px; color:var(--color-primary); font-weight:700; font-size:0.9rem;">
                    <span>مشاهده همه مقالات وبلاگ</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </a>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:22px;">
                <?php
                $recent_posts = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                    'post_status'    => 'publish'
                ));
                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                        ?>
                        <article class="home-blog-card" style="background:#ffffff; border:1px solid #e2e8f0; border-radius:14px; overflow:hidden; box-shadow:0 3px 12px rgba(15,23,42,0.05); display:flex; flex-direction:column; transition:transform 0.2s ease;">
                            <?php 
                            $blog_img_url = basate_nab_get_blog_post_image_url(get_the_ID());
                            ?>
                            <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>" style="display:block; height:160px; overflow:hidden;">
                                <img src="<?php echo esc_url($blog_img_url); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" loading="lazy">
                            </a>
                            <div style="padding:16px; display:flex; flex-direction:column; flex:1; justify-content:space-between;">
                                <div>
                                    <span style="font-size:0.75rem; color:var(--color-primary); font-weight:600;"><?php echo basate_fa_num(get_the_date('j F Y')); ?></span>
                                    <h4 style="font-size:0.98rem; font-weight:800; line-height:1.45; margin:6px 0 8px;">
                                        <a href="<?php the_permalink(); ?>" style="color:var(--color-dark); text-decoration:none;">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    <p style="font-size:0.82rem; color:var(--color-text-muted); line-height:1.6; margin:0 0 10px;">
                                        <?php echo wp_trim_words(get_the_excerpt(), 14); ?>
                                    </p>
                                </div>
                                <a href="<?php the_permalink(); ?>" style="color:var(--color-primary); font-weight:700; font-size:0.8rem; display:inline-flex; align-items:center; gap:4px;">
                                    <span>مطالعه مقاله</span>
                                    <span>&larr;</span>
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <!-- 8. Instagram Showcase Section (@basate_nab) -->
        <section class="instagram-showcase-box">
            <div class="instagram-title-area">
                <h3>همراه ما در اینستاگرام بساط ناب باشید</h3>
                <p>جدیدترین آنتیک‌های وارداتی، ویدیوهای معرفی محصولات و استوری‌های تخفیف روزانه را در پیج دنبال کنید</p>
            </div>
            <div class="instagram-gallery-grid">
                <?php 
                $ig_posts = array(
                    array('id' => 32, 'file' => 'ig_product_1.jpg'),
                    array('id' => 33, 'file' => 'ig_product_2.jpg'),
                    array('id' => 34, 'file' => 'ig_product_3.jpg'),
                    array('id' => 35, 'file' => 'ig_product_4.jpg'),
                    array('id' => 39, 'file' => 'ig_product_8.jpg'),
                    array('id' => 40, 'file' => 'ig_product_12.jpg'),
                );
                foreach ($ig_posts as $post_img) :
                    $img_url = wp_get_attachment_image_url($post_img['id'], 'medium_large');
                    if (!$img_url) {
                        $img_url = wp_get_attachment_image_url($post_img['id'], 'full');
                    }
                    if (!$img_url) {
                        $img_url = get_template_directory_uri() . '/assets/images/instagram_products/' . $post_img['file'];
                    }
                ?>
                    <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener" class="instagram-img-slot" title="مشاهده محصول در اینستاگرام @basate_nab">
                        <img src="<?php echo esc_url($img_url); ?>" alt="محصولات اینستاگرام بساط ناب" loading="lazy" />
                    </a>
                <?php endforeach; ?>
            </div>
            <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener" class="instagram-cta-btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                <span>دنبال کردن @basate_nab در اینستاگرام</span>
            </a>
        </section>

    </div>
</main>

<?php
get_footer();

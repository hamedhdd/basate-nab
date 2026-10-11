<?php
/**
 * Basate Nab (بساط ناب) - functions.php
 * Comprehensive WooCommerce Integration, Technical SEO & Iranian Store Optimization
 */

if (!defined('ABSPATH')) {
    exit;
}

define('BASATE_VERSION', '1.1.0');
define('BASATE_DIR', get_template_directory());
define('BASATE_URI', get_template_directory_uri());

// 1. Theme Setup
function basate_nab_setup() {
    load_theme_textdomain('basate-nab', BASATE_DIR . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // WooCommerce Support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register Navigation Menus
    register_nav_menus(array(
        'primary-menu'   => __('فهرست اصلی هدر', 'basate-nab'),
        'mobile-menu'    => __('منوی کشویی موبایل', 'basate-nab'),
        'footer-menu-1'  => __('فوتر دسته‌بندی‌ها', 'basate-nab'),
        'footer-menu-2'  => __('فوتر خدمات مشتریان', 'basate-nab'),
    ));
}
add_action('after_setup_theme', 'basate_nab_setup');

// 2. Enqueue Assets (Self-Hosted Local Zero-External Network Delay)
function basate_nab_scripts() {
    wp_enqueue_style('basate-style', get_stylesheet_uri(), array(), BASATE_VERSION);
    wp_enqueue_style('basate-main', BASATE_URI . '/assets/css/main.css', array('basate-style'), BASATE_VERSION);

    wp_enqueue_script('basate-main-js', BASATE_URI . '/assets/js/main.js', array(), BASATE_VERSION, true);

    wp_localize_script('basate-main-js', 'basateData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('basate_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'basate_nab_scripts');

// Add defer attribute to non-critical scripts
add_filter('script_loader_tag', 'basate_nab_defer_scripts', 10, 3);
function basate_nab_defer_scripts($tag, $handle, $src) {
    if ($handle === 'basate-main-js') {
        if (false === strpos($tag, 'defer')) {
            $tag = str_replace('<script ', '<script defer ', $tag);
        }
    }
    return $tag;
}

// 3. Persian Digits Helper
function basate_fa_num($number) {
    $en = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $fa = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
    return str_replace($en, $fa, (string)$number);
}

// 4. WooCommerce Iranian Store Customizations
// Format Currency Symbol to Toman
add_filter('woocommerce_currency_symbol', 'basate_nab_currency_symbol', 10, 2);
function basate_nab_currency_symbol($symbol, $currency) {
    if ($currency === 'IRT' || $currency === 'IRR') {
        return 'تومان';
    }
    return $symbol;
}

// Convert numbers in WooCommerce price HTML to Persian digits
add_filter('formatted_woocommerce_price', function($formatted_price) {
    return basate_fa_num($formatted_price);
});

// Update Cart Count via AJAX fragments
add_filter('woocommerce_add_to_cart_fragments', 'basate_nab_cart_fragments');
function basate_nab_cart_fragments($fragments) {
    if (!class_exists('WooCommerce')) return $fragments;
    
    $count = WC()->cart->get_cart_contents_count();
    $fragments['span.cart-badge-count'] = '<span class="cart-badge-count">' . basate_fa_num($count) . '</span>';
    $fragments['span.mobile-nav-badge'] = '<span class="mobile-nav-badge">' . basate_fa_num($count) . '</span>';
    return $fragments;
}

// 5. Advanced SEO Optimization Engine (Standards matching silversky.ir)
function basate_nab_seo_meta_tags() {
    $site_title = get_bloginfo('name') ?: 'بساط ناب';
    $site_desc = get_bloginfo('description') ?: 'فروشگاه تخصصی آباژور و دکوراتیو وینتیج، تابلوهای رترو و وسایل آنتیک بساط ناب با ارسال ایمن به سراسر کشور';
    $canonical_url = is_front_page() ? home_url('/') : get_permalink();
    $og_title = $site_title . ' | آباژور و دکوراتیو وینتیج و وسایل آنتیک';
    $og_desc = $site_desc;
    $og_image = BASATE_URI . '/assets/images/og-cover.jpg';
    $og_type = 'website';

    if (is_singular('product') && function_exists('wc_get_product')) {
        global $post;
        $product = wc_get_product($post->ID);
        if ($product) {
            $og_title = $product->get_name() . ' | ' . $site_title;
            $og_desc = wp_strip_all_tags($product->get_short_description() ?: $product->get_description() ?: $site_desc);
            $og_type = 'product';
            if ($product->get_image_id()) {
                $img = wp_get_attachment_image_src($product->get_image_id(), 'large');
                if ($img) $og_image = $img[0];
            }
        }
    } elseif (is_singular('post') || is_page()) {
        global $post;
        $og_title = get_the_title() . ' | ' . $site_title;
        $og_desc = wp_strip_all_tags(get_the_excerpt() ?: $site_desc);
        $og_type = 'article';
        if (has_post_thumbnail()) {
            $og_image = get_the_post_thumbnail_url($post->ID, 'large');
        }
    }

    echo "\n<!-- Basate Nab Advanced SEO Engine -->\n";
    echo '<meta name="description" content="' . esc_attr($og_desc) . '">' . "\n";
    echo '<meta name="robots" content="index, follow, max-image-preview:large">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">' . "\n";
    
    // Open Graph
    echo '<meta property="og:locale" content="fa_IR">' . "\n";
    echo '<meta property="og:type" content="' . esc_attr($og_type) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($og_title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($og_desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($canonical_url) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr($site_title) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";

    // Twitter Cards
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($og_title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($og_desc) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($og_image) . '">' . "\n";

    // JSON-LD Structured Data
    basate_nab_schema_jsonld();
    echo "<!-- /Basate Nab Advanced SEO Engine -->\n\n";
}
add_action('wp_head', 'basate_nab_seo_meta_tags', 1);

// JSON-LD Schema Generator
function basate_nab_schema_jsonld() {
    $schema_graph = array();

    // 1. Organization & Local Store
    $org_schema = array(
        '@type' => array('Organization', 'HomeGoodsStore'),
        '@id'   => home_url('/#organization'),
        'name'  => 'بساط ناب - فروشگاه آباژور و دکوراتیو وینتیج',
        'url'   => home_url('/'),
        'logo'  => array(
            '@type' => 'ImageObject',
            '@id'   => home_url('/#logo'),
            'url'   => BASATE_URI . '/assets/images/logo.png',
            'caption' => 'بساط ناب'
        ),
        'sameAs' => array(
            'https://www.instagram.com/basate_nab'
        ),
        'description' => 'فروشگاه تخصصی آباژور و چراغ‌های وینتیج، تابلوهای رترو، ظروف کهنه‌کاری و اشیای آنتیک دست‌ساز و وارداتی',
        'address' => array(
            '@type' => 'PostalAddress',
            'addressCountry' => 'IR',
            'addressRegion' => 'Tehran'
        ),
        'priceRange' => '$$'
    );
    $schema_graph[] = $org_schema;

    // 2. WebSite Schema with Sitelinks Searchbox
    $website_schema = array(
        '@type' => 'WebSite',
        '@id'   => home_url('/#website'),
        'url'   => home_url('/'),
        'name'  => 'بساط ناب',
        'publisher' => array('@id' => home_url('/#organization')),
        'potentialAction' => array(
            '@type' => 'SearchAction',
            'target' => array(
                '@type' => 'EntryPoint',
                'urlTemplate' => home_url('/?s={search_term_string}&post_type=product')
            ),
            'query-input' => 'required name=search_term_string'
        )
    );
    $schema_graph[] = $website_schema;

    // 3. Product Schema on Single Product
    if (is_singular('product') && function_exists('wc_get_product')) {
        global $post;
        $product = wc_get_product($post->ID);
        if ($product) {
            $prod_schema = array(
                '@type' => 'Product',
                '@id'   => get_permalink($post->ID) . '#product',
                'name'  => $product->get_name(),
                'description' => wp_strip_all_tags($product->get_short_description() ?: $product->get_description()),
                'url'   => get_permalink($post->ID),
                'brand' => array(
                    '@type' => 'Brand',
                    'name' => 'بساط ناب'
                )
            );
            $p_price = $product->get_price();
            if (!empty($p_price)) {
                $prod_schema['offers'] = array(
                    '@type' => 'Offer',
                    'price' => $p_price,
                    'priceCurrency' => 'IRT',
                    'availability' => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
                    'url' => get_permalink($post->ID),
                    'seller' => array('@id' => home_url('/#organization'))
                );
            }
            if ($product->get_image_id()) {
                $img = wp_get_attachment_image_src($product->get_image_id(), 'full');
                if ($img) $prod_schema['image'] = $img[0];
            }
            $schema_graph[] = $prod_schema;
        }
    }

    // 4. Article Schema on Single Blog Posts
    if (is_singular('post')) {
        global $post;
        $article_schema = array(
            '@type'            => 'BlogPosting',
            '@id'              => get_permalink($post->ID) . '#article',
            'headline'         => get_the_title($post->ID),
            'description'      => wp_strip_all_tags(get_the_excerpt($post->ID) ?: $site_desc),
            'url'              => get_permalink($post->ID),
            'datePublished'    => get_the_date('c', $post->ID),
            'dateModified'     => get_the_modified_date('c', $post->ID),
            'inLanguage'       => 'fa-IR',
            'mainEntityOfPage' => array(
                '@type' => 'WebPage',
                '@id'   => get_permalink($post->ID)
            ),
            'publisher' => array('@id' => home_url('/#organization')),
            'author'    => array(
                '@type' => 'Person',
                'name'  => get_the_author_meta('display_name', $post->post_author) ?: 'تحریریه بساط ناب'
            )
        );
        if (has_post_thumbnail($post->ID)) {
            $img = get_the_post_thumbnail_url($post->ID, 'large');
            if ($img) $article_schema['image'] = $img;
        }
        $schema_graph[] = $article_schema;
    }

    $final_schema = array(
        '@context' => 'https://schema.org',
        '@graph'   => $schema_graph
    );

    echo '<script type="application/ld+json">' . json_encode($final_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

// 6. Automated WooCommerce Synchronizer for Authentic Instagram Products (@basate_nab)
function basate_nab_sync_authentic_instagram_products() {
    if (!class_exists('WooCommerce')) return;
    if (get_option('basate_nab_real_ig_products_synced_v3') === '1') return;

    // Purge legacy mock products
    $mock_post_ids = array(19, 20, 21, 22, 23, 24, 25, 26);
    foreach ($mock_post_ids as $mp_id) {
        if (get_post($mp_id)) {
            wp_delete_post($mp_id, true);
        }
    }

    // Purge legacy AI-generated media attachments
    $mock_media_ids = array(27, 28, 29, 30);
    foreach ($mock_media_ids as $mm_id) {
        if (get_post($mm_id)) {
            wp_delete_attachment($mm_id, true);
        }
    }

    // 12 Authentic Products Extracted from @basate_nab Instagram Page
    $authentic_items = array(
        array(
            'name'     => 'آباژور رومیزی کریستال تراش‌خورده با پایه استیل صیقلی رترو',
            'desc'     => 'آباژور رومیزی وینتیج اصل با حباب کریستالی تراش‌خورده و پایه استیل کروم براق. سیم‌کشی بازبینی شده و آماده استفاده با سرپیچ استاندارد.',
            'price'    => '2850000',
            'regular'  => '3200000',
            'cat'      => 'آباژور رومیزی',
            'media_id' => 32
        ),
        array(
            'name'     => 'چراغ رومیزی قارچی (Mushroom Lamp) رترو شیشه اپالین سفید',
            'desc'     => 'چراغ قارچی نوستالژیک عصر فضا با حباب تمام شیشه سفید یکپارچه اپالین و پخش نور ملایم ۳۶۰ درجه. طراحی مدرن قرن بیستم، بدون کوچک‌ترین خط و خش.',
            'price'    => '3400000',
            'regular'  => '3900000',
            'cat'      => 'چراغ رترو',
            'media_id' => 33
        ),
        array(
            'name'     => 'آباژور رومیزی مدرن رترو مدل بشقاب‌پرنده UFO شیشه اپالین',
            'desc'     => 'آباژور رومیزی خاص و کمیاب طرح یوفو دهه ۷۰ با بدنه فلزی و حباب شیشه‌ای تخت اپالین. نورپردازی ملایم با سوییچ بین‌راهی اورجینال.',
            'price'    => '3650000',
            'regular'  => '4100000',
            'cat'      => 'آباژور رومیزی',
            'media_id' => 34
        ),
        array(
            'name'     => 'آباژور ایستاده سالنی شید شیاردار خربزه‌ای سبز مغزپسته‌ای وینتیج',
            'desc'     => 'آباژور سالنی کنار مبلی بلند با کلاهک خربزه‌ای پارچه‌ای پلیسه با نوار حاشیه ابریشمی و پایه استیل پایدار. زیبایی چشم‌نواز در دکوراسیون وینتیج.',
            'price'    => '5800000',
            'regular'  => '6500000',
            'cat'      => 'آباژور سالنی',
            'media_id' => 35
        ),
        array(
            'name'     => 'چراغ خواب رومیزی گوی اپالین مات با پایه ستونی متالیک نقره‌ای',
            'desc'     => 'چراغ خواب مینیمال و کلاسیک طرح گوی شیشه‌ای برفی با پایه سیلور متالیک. نوری ملایم و آرامش‌بخش مناسب اتاق خواب و میز پاتختی.',
            'price'    => '2150000',
            'regular'  => '2500000',
            'cat'      => 'چراغ رترو',
            'media_id' => 36
        ),
        array(
            'name'     => 'آباژور رومیزی مخروطی اشکی استیل براق سبک مینیمال رترو',
            'desc'     => 'چراغ رومیزی تمام فلزی با فرم اشکی صیقلی، بازتاب نور متمرکز و سرپیچ برنجی مرغوب. انتخابی لوکس برای میز کار و کنسول پذیرایی.',
            'price'    => '2900000',
            'regular'  => '3300000',
            'cat'      => 'آباژور رومیزی',
            'media_id' => 37
        ),
        array(
            'name'     => 'چراغ رومیزی پایه بلند کلاسیک فرانسوی با شید طرح‌دار سندبلاست',
            'desc'     => 'آباژور رومیزی کلاسیک با حباب شیشه‌ای نقوش اسلیمی برجسته و پایه فلزی آنتیک. پخش نور گرم و هارمونی بی‌نظیر با مبلمان سنتی و نئوکلاسیک.',
            'price'    => '3150000',
            'regular'  => '3600000',
            'cat'      => 'آباژور رومیزی',
            'media_id' => 38
        ),
        array(
            'name'     => 'آباژور سالنی ایستاده طبقاتی باهاوس پگودا سبز یشمی و کلاهک پلیسه',
            'desc'     => 'آباژور ایستاده چشم‌نواز با رنگ بدنه خاص سبز یشمی و دیسک‌های طبقاتی سبک باهاوس. سلامت کامل بدنه و سیم‌کشی استاندارد.',
            'price'    => '6400000',
            'regular'  => '7200000',
            'cat'      => 'آباژور سالنی',
            'media_id' => 39
        ),
        array(
            'name'     => 'چراغ رومیزی رترو راه‌راه کهربایی و سفید دهه ۷۰ (Space Age)',
            'desc'     => 'چراغ رومیزی کمیاب کلکسیونی با کلاهک شیشه فانتزی راه‌راه دورنگ نارنجی کهربایی و سفید. بدنه کروم درخشان بدون ماتی و رنگ‌پریدگی.',
            'price'    => '3950000',
            'regular'  => '4500000',
            'cat'      => 'چراغ رترو',
            'media_id' => 40
        ),
        array(
            'name'     => 'آباژور پایه‌دار برنجی آنتیک با حباب لاله دست‌ساز لیمویی',
            'desc'     => 'آباژور رومیزی برنج سنگین پتینه‌کاری شده با لاله شیشه‌ای دست‌دمیده زرد ملایم. قطعه‌ای اصیل و ماندگار برای دکوراسیون وینتیج.',
            'price'    => '4100000',
            'regular'  => '4700000',
            'cat'      => 'دکوراتیو وینتیج',
            'media_id' => 41
        ),
        array(
            'name'     => 'چراغ دیوارکوب تک‌شاخه برنزی آنتیک با کریستال آویز تراش‌خورده',
            'desc'     => 'دیوارکوب آنتیک فرانسوی برنز اصیل با آویزهای کریستالی اشکی شفاف. قابلیت نصب آسان روی دیوار با اتصال برق شهری.',
            'price'    => '2600000',
            'regular'  => '2950000',
            'cat'      => 'دکوراتیو وینتیج',
            'media_id' => 42
        ),
        array(
            'name'     => 'آباژور رومیزی کلاسیک شید مخمل دست‌دوز با پایه برنز کهنه‌کاری',
            'desc'     => 'آباژور فاخر رومیزی با کلاهک مخمل زرشکی منگوله‌دار کار دست و پایه برنز سنگین با نقش برجسته کلاسیک اروپایی.',
            'price'    => '4850000',
            'regular'  => '5400000',
            'cat'      => 'آباژور رومیزی',
            'media_id' => 43
        ),
    );

    foreach ($authentic_items as $item) {
        $p = new WC_Product_Simple();
        $p->set_name($item['name']);
        $p->set_description($item['desc']);
        $p->set_short_description($item['desc']);
        $p->set_status('publish');
        $p->set_regular_price($item['regular']);
        $p->set_sale_price($item['price']);
        $p->set_price($item['price']);
        $p->set_manage_stock(false);
        $p->set_stock_status('instock');

        $term = term_exists($item['cat'], 'product_cat');
        if (!$term) {
            $term = wp_insert_term($item['cat'], 'product_cat');
        }
        if (!is_wp_error($term)) {
            $term_id = is_array($term) ? $term['term_id'] : $term;
            $p->set_category_ids(array($term_id));
        }

        $pid = $p->save();
        if ($pid && !empty($item['media_id'])) {
            set_post_thumbnail($pid, $item['media_id']);
        }
    }

    update_option('basate_nab_real_ig_products_synced_v3', '1');
}
add_action('init', 'basate_nab_sync_authentic_instagram_products');

// 7. Remove/Hide Prices Globally (per user instruction)
add_filter('woocommerce_get_price_html', '__return_empty_string', 99, 2);

// Single Product Page: Inquire Box instead of Add to Cart
add_action('woocommerce_single_product_summary', 'basate_nab_render_inquiry_box_on_single', 30);
function basate_nab_render_inquiry_box_on_single() {
    echo '<div class="product-inquire-box" style="margin:24px 0; padding:18px 22px; background:linear-gradient(135deg, #fcf9f3, #f5ecd9); border:1px solid #dfceb7; border-radius:12px;">';
    echo '<p style="margin:0 0 10px; font-weight:700; color:#231709; font-size:0.95rem;">جهت استعلام موجودی، اطلاعات بیشتر و ثبت سفارش این اثر وینتیج:</p>';
    echo '<a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener" class="btn-primary-retro" style="display:inline-flex; align-items:center; gap:8px; padding:10px 22px; width:fit-content;">';
    echo '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>';
    echo '<span>استعلام و ثبت سفارش در دایرکت @basate_nab</span>';
    echo '</a>';
    echo '</div>';
}

// 8. Clear all numerical prices from WooCommerce database products
function basate_nab_clear_product_prices_db() {
    if (get_option('basate_nab_prices_cleared_done') === '1') return;
    if (!class_exists('WooCommerce')) return;

    $products = wc_get_products(array('limit' => -1));
    foreach ($products as $p) {
        $p->set_regular_price('');
        $p->set_sale_price('');
        $p->set_price('');
        $p->save();
    }
    update_option('basate_nab_prices_cleared_done', '1');
}
add_action('init', 'basate_nab_clear_product_prices_db');

// 9. Disable WooCommerce Coming Soon mode so store and product pages are publicly live
function basate_nab_disable_coming_soon() {
    if (get_option('woocommerce_coming_soon') === 'yes') {
        update_option('woocommerce_coming_soon', 'no');
        update_option('woocommerce_store_pages_only', 'no');
    }
}
add_action('init', 'basate_nab_disable_coming_soon');

// 10. Enable Customer Registration on WooCommerce My Account Page
function basate_nab_enable_customer_registration() {
    // 1. Enable WordPress core registration
    if (get_option('users_can_register') != 1) {
        update_option('users_can_register', 1);
    }
    // 2. Enable WooCommerce My Account registration
    if (get_option('woocommerce_enable_myaccount_registration') !== 'yes') {
        update_option('woocommerce_enable_myaccount_registration', 'yes');
    }
    // 3. Allow customer to choose their password directly during registration
    if (get_option('woocommerce_registration_generate_password') !== 'no') {
        update_option('woocommerce_registration_generate_password', 'no');
    }
    // 4. Allow customer to choose their username
    if (get_option('woocommerce_registration_generate_username') !== 'no') {
        update_option('woocommerce_registration_generate_username', 'no');
    }
    // 5. Enable checkout registration
    if (get_option('woocommerce_enable_signup_and_login_from_checkout') !== 'yes') {
        update_option('woocommerce_enable_signup_and_login_from_checkout', 'yes');
    }
}
add_action('init', 'basate_nab_enable_customer_registration');

// 11. Authentic Instagram Video & Reel Mapping for WooCommerce Products
function basate_nab_get_product_video_data($product_id = null) {
    if (!$product_id) {
        $product_id = get_the_ID();
    }

    // Mapping of Product ID to genuine Instagram Reel videos & shortcodes
    $video_map = array(
        45 => array('file' => 'ig_product_1.mp4',  'code' => 'DeAOPv-qVEO', 'title' => 'ویدیوی معرفی و جزئیات تراش کریستال آباژور'),
        46 => array('file' => 'ig_product_2.mp4',  'code' => 'DduUtiEq--V', 'title' => 'ویدیوی روشنایی و کیفیت شیشه اپالین چراغ قارچی'),
        47 => array('file' => 'ig_product_3.mp4',  'code' => 'DdZyCGBq_8-', 'title' => 'ویدیوی زاویه دید ۳۶۰ درجه و نوردهی آباژور UFO'),
        48 => array('file' => 'ig_product_4.mp4',  'code' => 'DdKIC3FK_Tf', 'title' => 'ویدیوی نمایش ایستایی و رنگ خاص شید خربزه‌ای'),
        49 => array('file' => 'ig_product_5.mp4',  'code' => 'Dc4BJhbK9Ey', 'title' => 'ویدیوی درخشش گوی اپالین و پایه ستونی در تاریکی'),
        50 => array('file' => 'ig_product_6.mp4',  'code' => 'DccDp5LqO8q', 'title' => 'ویدیوی بازتاب بدنه استیل صیقلی و اتصالات برنجی'),
        51 => array('file' => 'ig_product_7.mp4',  'code' => 'DcJoSw-Kt_t', 'title' => 'ویدیوی جلوه نقوش سندبلاست و پایه بلند فرانسوی'),
        52 => array('file' => 'ig_product_8.mp4',  'code' => 'Db_PLUaqBVH', 'title' => 'ویدیوی طبقات باهاوس و نور کلاهک پلیسه'),
        53 => array('file' => 'ig_product_12.mp4', 'code' => 'DbRdBr8PbM-', 'title' => 'ویدیوی خطوط راه‌راه کهربایی Space Age در حالت روشن'),
        54 => array('file' => 'ig_product_9.mp4',  'code' => 'DbyztrnqqNq', 'title' => 'ویدیوی ظرافت برنج آنتیک و حباب لاله دست‌ساز'),
        55 => array('file' => 'ig_product_10.mp4', 'code' => 'DbjXTA2vZpW', 'title' => 'ویدیوی بازتاب منشورهای کریستال و دیوارکوب برنزی'),
        56 => array('file' => 'ig_product_11.mp4', 'code' => 'DbgmDhNKQJd', 'title' => 'ویدیوی لمس بافت مخمل دست‌دوز و پایه سنگین برنز'),
    );

    if (isset($video_map[$product_id])) {
        $item = $video_map[$product_id];
        $item['video_url'] = BASATE_URI . '/assets/videos/instagram_products/' . $item['file'];
        $item['reel_url']  = 'https://www.instagram.com/reel/' . $item['code'] . '/';
        return $item;
    }

    return null;
}

// Render Authentic Product Video Showcase on Single Product Page
add_action('woocommerce_single_product_summary', 'basate_nab_render_product_video_showcase', 35);
function basate_nab_render_product_video_showcase() {
    $video = basate_nab_get_product_video_data();
    if (!$video) return;
    ?>
    <div class="product-video-showcase-card">
        <div class="video-showcase-header">
            <div class="video-badge-pill">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                <span>ویدیوی محصول</span>
            </div>
            <a href="<?php echo esc_url($video['reel_url']); ?>" target="_blank" rel="noopener" class="video-ig-link" title="مشاهده ریلز این محصول در اینستاگرام">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                <span>مشاهده ریلز در @basate_nab</span>
            </a>
        </div>
        
        <div class="video-player-container">
            <video 
                class="retro-product-video-player" 
                controls 
                preload="metadata" 
                playsinline 
                poster="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>"
            >
                <source src="<?php echo esc_url($video['video_url']); ?>" type="video/mp4">
                مرورگر شما از پخش مستقیم ویدیو پشتیبانی نمی‌کند.
            </video>
        </div>

        <div class="video-caption-footer">
            <span class="video-caption-icon">🎬</span>
            <span class="video-caption-text"><?php echo esc_html($video['title']); ?></span>
        </div>
    </div>
    <?php
}

// Add Video Tab to WooCommerce Product Tabs
add_filter('woocommerce_product_tabs', 'basate_nab_add_product_video_tab');
function basate_nab_add_product_video_tab($tabs) {
    $video = basate_nab_get_product_video_data();
    if ($video) {
        $tabs['basate_video_tab'] = array(
            'title'    => '🎬 ویدیوی محصول',
            'priority' => 15,
            'callback' => 'basate_nab_render_product_video_tab_content'
        );
    }
    return $tabs;
}

function basate_nab_render_product_video_tab_content() {
    $video = basate_nab_get_product_video_data();
    if (!$video) return;
    ?>
    <div class="product-video-tab-content">
        <h3 style="font-size:1.15rem; font-weight:700; color:var(--color-dark); margin-bottom:12px; display:flex; align-items:center; gap:8px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>
            <?php echo esc_html($video['title']); ?>
        </h3>
        <p style="font-size:0.9rem; color:var(--color-text-muted); line-height:1.8; margin-bottom:18px;">
            این ویدیو به صورت زنده از پیج رسمی <strong>بساط ناب (@basate_nab)</strong> ضبط شده تا وضعیت ظاهری، ابعاد، درخشش بدنه و نورپردازی این قطعه عتیقه را به صورت ۱۰۰٪ شفاف مشاهده نمایید.
        </p>
        <div style="max-width:540px; margin:0 auto; border-radius:16px; overflow:hidden; box-shadow:0 8px 30px rgba(35,23,9,0.12); border:1px solid #ebd9c4;">
            <video controls preload="metadata" playsinline style="width:100%; display:block; background:#000;">
                <source src="<?php echo esc_url($video['video_url']); ?>" type="video/mp4">
            </video>
        </div>
        <div style="text-align:center; margin-top:16px;">
            <a href="<?php echo esc_url($video['reel_url']); ?>" target="_blank" rel="noopener" class="btn-primary-retro" style="display:inline-flex; align-items:center; gap:8px; padding:10px 24px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                <span>مشاهده نظرات و ثبت استعلام در پیج @basate_nab</span>
            </a>
        </div>
    </div>
    <?php
}

// 12. Automated SEO Blog Posts & Blog Page Initialization
require_once BASATE_DIR . '/inc/blog-seeder.php';

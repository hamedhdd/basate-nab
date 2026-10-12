<?php
/**
 * Basate Nab - WooCommerce Category Synchronizer
 * Establishes the exact 10 requested categories and reassigns products:
 * 1. آباژور رومیزی (table-lamps)
 * 2. آباژور قدی (floor-lamps)
 * 3. لوستر (chandeliers)
 * 4. چراغ مطالعه (study-lamps)
 * 5. چراغ دیواری (wall-lamps)
 * 6. ساعت دکوری (decorative-clocks)
 * 7. آینه محدب (convex-mirrors)
 * 8. آینه های دکوری (decorative-mirrors)
 * 9. وسایل وینتیج (vintage-decor)
 * 10. تابلو های رترو (retro-frames)
 */

function basate_nab_sync_product_categories() {
    if (!class_exists('WooCommerce')) {
        return;
    }

    if (get_option('basate_nab_categories_synced_v4') === '1') {
        return;
    }

    $required_categories = array(
        array('name' => 'آباژور رومیزی',   'slug' => 'table-lamps',        'desc' => 'انواع آباژورهای رومیزی وینتیج، کریستال و برنجی دست‌ساز با پایه‌های کهنه‌کاری'),
        array('name' => 'آباژور قدی',     'slug' => 'floor-lamps',        'desc' => 'آباژورهای ایستاده و سالنی با ارتفاع بلند، پایه‌های برنجی و چوبی برای گوشه‌های دنج'),
        array('name' => 'لوستر',          'slug' => 'chandeliers',        'desc' => 'لوسترهای شاخه‌ای برنجی و کریستال‌های تراش‌خورده آنتیک فرانسوی و اروپایی'),
        array('name' => 'چراغ مطالعه',    'slug' => 'study-lamps',        'desc' => 'چراغ‌های مطالعه رترو، بازودار برنجی و بانکداری با ارگونومی استاندارد مطالعه'),
        array('name' => 'چراغ دیواری',    'slug' => 'wall-lamps',         'desc' => 'دیوارکوب‌های برنزی و آنتیک تک‌شاخه و چندشاخه با لاله‌ها و کریستال‌های اصل'),
        array('name' => 'ساعت دکوری',     'slug' => 'decorative-clocks',  'desc' => 'ساعت‌های رومیزی و دیواری رترو، مکانیکی زنگوله‌دار و طراحی‌های Space Age دهه هفتاد'),
        array('name' => 'آینه محدب',      'slug' => 'convex-mirrors',     'desc' => 'آینه‌های چشم‌ماهی و محدب با قاب‌های برنجی و خورشیدی برای خلق نقطه کانونی'),
        array('name' => 'آینه های دکوری', 'slug' => 'decorative-mirrors', 'desc' => 'آینه‌های دکوراتیو با فریم‌های کهنه‌کاری، چوبی و برنزی برای سالن پذیرایی و کنسول'),
        array('name' => 'وسایل وینتیج',   'slug' => 'vintage-decor',      'desc' => 'اکسسوری‌ها، ظروف کهنه‌کاری، رادیوهای لامپی و اشیای نوستالژیک کلکسیونی'),
        array('name' => 'تابلو های رترو', 'slug' => 'retro-frames',       'desc' => 'تابلوهای قاب فلزی، پلاک‌های برجسته و پوسترهای تبلیغاتی و سینمایی کلاسیک')
    );

    $cat_ids = array();

    foreach ($required_categories as $rc) {
        $term = get_term_by('slug', $rc['slug'], 'product_cat');
        if (!$term) {
            $term = get_term_by('name', $rc['name'], 'product_cat');
        }

        if ($term) {
            // Update name and description to ensure exact match
            wp_update_term($term->term_id, 'product_cat', array(
                'name'        => $rc['name'],
                'slug'        => $rc['slug'],
                'description' => $rc['desc']
            ));
            $cat_ids[$rc['slug']] = (int)$term->term_id;
        } else {
            $inserted = wp_insert_term($rc['name'], 'product_cat', array(
                'slug'        => $rc['slug'],
                'description' => $rc['desc']
            ));
            if (!is_wp_error($inserted)) {
                $cat_ids[$rc['slug']] = (int)$inserted['term_id'];
            }
        }
    }

    // Map 12 Authentic Products (IDs 45 to 56) to the new categories
    $product_mappings = array(
        45 => array('table-lamps', 'vintage-decor'),
        46 => array('study-lamps', 'table-lamps'),
        47 => array('table-lamps'),
        48 => array('table-lamps'),
        49 => array('floor-lamps'),
        50 => array('floor-lamps'),
        51 => array('chandeliers'),
        52 => array('study-lamps'),
        53 => array('wall-lamps'),
        54 => array('decorative-clocks', 'vintage-decor'),
        55 => array('convex-mirrors', 'decorative-mirrors'),
        56 => array('table-lamps', 'vintage-decor')
    );

    foreach ($product_mappings as $pid => $slug_list) {
        $term_ids = array();
        foreach ($slug_list as $slug) {
            if (isset($cat_ids[$slug])) {
                $term_ids[] = $cat_ids[$slug];
            }
        }
        if (!empty($term_ids)) {
            wp_set_object_terms($pid, $term_ids, 'product_cat');
        }
    }

    // Remove legacy/deprecated categories if empty
    $obsolete_slugs = array('آباژور-سالنی', 'چراغ-رترو', 'دکوراتیو-وینتیج', 'رادیو-کلاسیک', 'ساعت-رترو', 'ظروف-آنتیک', 'گرامافون-و-آنتیک', 'تابلوهای-رترو');
    foreach ($obsolete_slugs as $obs) {
        $term = get_term_by('slug', $obs, 'product_cat');
        if ($term && $term->count === 0) {
            wp_delete_term($term->term_id, 'product_cat');
        }
    }

    update_option('basate_nab_categories_synced_v4', '1');
}
add_action('init', 'basate_nab_sync_product_categories', 15);

<?php
/**
 * Template Name: وبلاگ و مقالات دکوراسیون وینتیج
 * Description: قالب اختصاصی وبلاگ و مقالات سئو برای بساط ناب
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top:40px; padding-bottom:70px;">
        <!-- Blog Header -->
        <header class="blog-archive-header" style="margin-bottom:36px; text-align:center; max-width:800px; margin-left:auto; margin-right:auto;">
            <span class="badge-antique" style="position:static; display:inline-block; margin-bottom:12px; padding:6px 16px; font-size:0.85rem;">دانشنامه دکوراسیون و عتیقه‌جات</span>
            <h1 class="blog-archive-title" style="font-size:2rem; font-weight:900; color:var(--color-dark); line-height:1.4; margin-bottom:14px;">
                راهنمای سبک‌های رترو، مید سنتری و نورپردازی وینتیج
            </h1>
            <p style="color:var(--color-text-muted); font-size:1rem; line-height:1.8;">
                بررسی تاریخچه آباژورهای دست‌ساز، اصول انتخاب آینه محدب، تابلوهای قاب فلزی رترو، وسایل دکوری آنتیک و ایده‌های چیدمان مدرن با اشیای کلاسیک بساط ناب.
            </p>
        </header>

        <!-- Blog Posts Grid -->
        <div class="blog-posts-grid" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px, 1fr)); gap:28px;">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 12,
                'paged'          => $paged,
                'post_status'    => 'publish'
            );
            $blog_query = new WP_Query($args);

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-card-item'); ?> style="background:#ffffff; border:1px solid #e2e8f0; border-radius:16px; overflow:hidden; box-shadow:0 4px 18px rgba(15,23,42,0.06); display:flex; flex-direction:column; transition:transform 0.25s ease, box-shadow 0.25s ease;">
                        <?php 
                        $blog_img_url = basate_nab_get_blog_post_image_url(get_the_ID());
                        $cats = get_the_category();
                        $cat_label = !empty($cats) ? esc_html($cats[0]->name) : 'دکوراسیون وینتیج';
                        ?>
                        <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>" style="display:block; height:210px; overflow:hidden; position:relative; background:#0f172a;">
                            <img src="<?php echo esc_url($blog_img_url); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease;" loading="lazy">
                            <span class="badge-antique" style="position:absolute; top:12px; right:12px; font-size:0.75rem; padding:3px 10px; background:rgba(15,23,42,0.9); color:#ffffff; border:1px solid var(--color-primary);"><?php echo $cat_label; ?></span>
                        </a>

                        <div style="padding:24px; display:flex; flex-direction:column; flex:1; justify-content:space-between;">
                            <div>
                                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px; font-size:0.8rem; color:var(--color-primary); font-weight:700;">
                                    <span><?php echo basate_fa_num(get_the_date('j F Y')); ?></span>
                                    <span>بساط ناب</span>
                                </div>
                                <h2 style="font-size:1.15rem; font-weight:800; line-height:1.5; margin:0 0 12px;">
                                    <a href="<?php the_permalink(); ?>" style="color:var(--color-dark); text-decoration:none;">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <p style="font-size:0.88rem; color:var(--color-text-muted); line-height:1.7; margin:0 0 16px;">
                                    <?php echo wp_trim_words(get_the_excerpt(), 24); ?>
                                </p>
                            </div>

                            <div style="padding-top:14px; border-top:1px solid #f1f5f9; display:flex; align-items:center; justify-content:space-between;">
                                <a href="<?php the_permalink(); ?>" style="color:var(--color-primary); font-weight:800; font-size:0.88rem; display:inline-flex; align-items:center; gap:6px;">
                                    <span>مطالعه مقاله کامل</span>
                                    <span>&larr;</span>
                                </a>
                                <span style="font-size:0.75rem; color:#64748b;">۵ دقیقه مطالعه</span>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <div style="grid-column:1/-1; text-align:center; padding:40px; background:#fff; border-radius:16px;">
                    <p style="font-size:1.1rem; color:var(--color-text-muted);">مقاله‌ای یافت نشد.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();

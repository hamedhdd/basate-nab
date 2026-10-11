<?php
/**
 * Basate Nab - single.php
 * Single Article Template with Editorial Photography, Breadcrumbs, Social Sharing, and Contextual Store References
 */
get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top:32px; padding-bottom:70px;">
        <?php
        while (have_posts()) : the_post();
            $blog_img_url = basate_nab_get_blog_post_image_url(get_the_ID());
            $categories = get_the_category();
            $cat_name = !empty($categories) ? esc_html($categories[0]->name) : 'دکوراسیون وینتیج';
            ?>
            <!-- Breadcrumbs -->
            <nav aria-label="مسیر راهنما" style="margin-bottom:20px; font-size:0.85rem; color:var(--color-text-muted);">
                <a href="<?php echo esc_url(home_url('/')); ?>" style="color:var(--color-text-muted); text-decoration:none;">صفحه اصلی</a>
                <span style="margin:0 6px;">/</span>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" style="color:var(--color-text-muted); text-decoration:none;">وبلاگ و دانشنامه</a>
                <span style="margin:0 6px;">/</span>
                <span style="color:var(--color-primary-hover); font-weight:600;"><?php the_title(); ?></span>
            </nav>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background:#fff; border:1px solid #ebd9c4; border-radius:18px; padding:36px; box-shadow:0 4px 20px rgba(35,23,9,0.06); max-width:920px; margin:0 auto;">
                <header class="entry-header" style="margin-bottom:28px; border-bottom:1px solid #f2e7db; padding-bottom:20px;">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px; flex-wrap:wrap;">
                        <span class="badge-antique" style="position:static; padding:4px 12px; font-size:0.78rem;"><?php echo $cat_name; ?></span>
                        <span style="font-size:0.85rem; color:var(--color-primary-hover); font-weight:700;">
                            <?php echo basate_fa_num(get_the_date('j F Y')); ?>
                        </span>
                        <span style="color:#d5c4b0;">•</span>
                        <span style="font-size:0.85rem; color:var(--color-text-muted);">تحریریه تخصصی بساط ناب</span>
                    </div>
                    <h1 class="entry-title" style="font-size:1.9rem; font-weight:900; color:var(--color-dark); line-height:1.45; margin:0 0 10px;">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <?php if ($blog_img_url) : ?>
                    <div style="margin-bottom:32px; border-radius:14px; overflow:hidden; box-shadow:0 6px 22px rgba(35,23,9,0.1); background:#231709;">
                        <img src="<?php echo esc_url($blog_img_url); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%; height:auto; max-height:480px; object-fit:cover; display:block;">
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="line-height:2.05; font-size:1.06rem; color:#2b1f14;">
                    <?php the_content(); ?>
                </div>

                <!-- Footer Author & Share Box -->
                <div style="margin-top:40px; padding:24px; background:#faf7f2; border:1px solid #ebd9c4; border-radius:14px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:16px;">
                    <div style="display:flex; align-items:center; gap:14px;">
                        <div style="width:48px; height:48px; border-radius:50%; background:var(--color-primary); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:900; font-size:1.2rem;">
                            ب
                        </div>
                        <div>
                            <strong style="color:var(--color-dark); font-size:0.95rem; display:block;">تحریریه و کارشناسی عتیقه‌جات بساط ناب</strong>
                            <span style="color:var(--color-text-muted); font-size:0.82rem;">ارائه‌دهنده مقالات تخصصی شناخت اشیای آنتیک، نورپردازی رترو و دکوراسیون اصیل</span>
                        </div>
                    </div>
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="ref-btn" style="padding:8px 18px; font-size:0.85rem; text-decoration:none;">
                        بازگشت به آرشیو مقالات &larr;
                    </a>
                </div>
            </article>

            <!-- Related Articles Section -->
            <section style="max-width:920px; margin:48px auto 0;">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px;">
                    <h3 style="font-size:1.3rem; font-weight:800; color:var(--color-dark); margin:0;">سایر مقالات خواندنی وبلاگ</h3>
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" style="color:var(--color-primary-hover); font-weight:700; font-size:0.88rem; text-decoration:none;">مشاهده همه &larr;</a>
                </div>

                <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px, 1fr)); gap:20px;">
                    <?php
                    $related = new WP_Query(array(
                        'post_type'      => 'post',
                        'posts_per_page' => 3,
                        'post__not_in'   => array(get_the_ID()),
                        'post_status'    => 'publish'
                    ));
                    if ($related->have_posts()) :
                        while ($related->have_posts()) : $related->the_post();
                            $rel_img = basate_nab_get_blog_post_image_url(get_the_ID());
                            ?>
                            <div class="home-blog-card" style="background:#fff; border:1px solid #ebd9c4; border-radius:14px; overflow:hidden; box-shadow:0 3px 12px rgba(35,23,9,0.05); display:flex; flex-direction:column; transition:transform 0.25s ease;">
                                <a href="<?php the_permalink(); ?>" style="display:block; height:150px; overflow:hidden;">
                                    <img src="<?php echo esc_url($rel_img); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%; height:100%; object-fit:cover;" loading="lazy">
                                </a>
                                <div style="padding:16px; display:flex; flex-direction:column; flex:1; justify-content:space-between;">
                                    <h4 style="font-size:0.95rem; font-weight:800; line-height:1.5; margin:0 0 10px;">
                                        <a href="<?php the_permalink(); ?>" style="color:var(--color-dark); text-decoration:none;">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    <a href="<?php the_permalink(); ?>" style="color:var(--color-primary); font-weight:700; font-size:0.82rem; text-decoration:none;">
                                        مطالعه مقاله &larr;
                                    </a>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </section>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();

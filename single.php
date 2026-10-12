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

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background:#fff; border:1px solid #e2e8f0; border-radius:18px; padding:36px; box-shadow:0 4px 20px rgba(15,23,42,0.06); max-width:920px; margin:0 auto;">
                <header class="entry-header" style="margin-bottom:28px; border-bottom:1px solid #f1f5f9; padding-bottom:20px;">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px; flex-wrap:wrap;">
                        <span class="badge-antique" style="position:static; padding:4px 12px; font-size:0.78rem;"><?php echo $cat_name; ?></span>
                        <span style="font-size:0.85rem; color:var(--color-primary); font-weight:700;">
                            <?php echo basate_fa_num(get_the_date('j F Y')); ?>
                        </span>
                        <span style="color:#cbd5e1;">•</span>
                        <span style="font-size:0.85rem; color:var(--color-text-muted);">تحریریه تخصصی بساط ناب</span>
                    </div>
                    <h1 class="entry-title" style="font-size:1.9rem; font-weight:900; color:var(--color-dark); line-height:1.45; margin:0 0 10px;">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <?php if ($blog_img_url) : ?>
                    <div style="margin-bottom:32px; border-radius:14px; overflow:hidden; box-shadow:0 6px 22px rgba(15,23,42,0.1); background:#0f172a;">
                        <img src="<?php echo esc_url($blog_img_url); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%; height:auto; max-height:480px; object-fit:cover; display:block;">
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="line-height:2.05; font-size:1.06rem; color:#1e293b;">
                    <?php the_content(); ?>
                </div>

                <!-- Social Channels Box Under Every Post -->
                <div class="post-social-channels-box">
                    <div class="post-social-header">
                        <div class="post-social-icon-badge">
                            ✨
                        </div>
                        <div>
                            <h4>عضویت در شبکه‌های بساط ناب</h4>
                            <p>برای مشاهده ویدیوهای اختصاصی، معرفی کارهای جدید، موجودی لحظه‌ای و استعلام قیمت در کانال‌های رسمی ما عضو شوید:</p>
                        </div>
                    </div>
                    <div class="post-social-links-grid">
                        <a href="https://t.me/basate_nab" target="_blank" rel="noopener" class="channel-link-pill tg-channel">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m21.5 2.5-19 8.5 7 3.5 3.5 7 2-4.5 6.5 4.5 3-19z"/><path d="m9.5 14.5 12-12"/></svg>
                            <span>کانال تلگرام @basate_nab</span>
                        </a>
                        <a href="https://ble.ir/basatenab" target="_blank" rel="noopener" class="channel-link-pill bale-channel">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/><circle cx="9" cy="12" r="1" fill="currentColor"/><circle cx="12" cy="12" r="1" fill="currentColor"/><circle cx="15" cy="12" r="1" fill="currentColor"/></svg>
                            <span>کانال بله @basatenab</span>
                        </a>
                        <a href="https://www.instagram.com/basate_nab" target="_blank" rel="noopener" class="channel-link-pill ig-channel">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            <span>پیج اینستاگرام @basate_nab</span>
                        </a>
                    </div>
                </div>

                <!-- Footer Author & Share Box -->
                <div style="margin-top:24px; padding:24px; background:#f8fafc; border:1px solid #e2e8f0; border-radius:14px; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:16px;">
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
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" style="color:var(--color-primary); font-weight:700; font-size:0.88rem; text-decoration:none;">مشاهده همه &larr;</a>
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
                            <div class="home-blog-card" style="background:#fff; border:1px solid #e2e8f0; border-radius:14px; overflow:hidden; box-shadow:0 3px 12px rgba(15,23,42,0.05); display:flex; flex-direction:column; transition:transform 0.25s ease;">
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

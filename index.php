<?php
/**
 * Basate Nab - index.php
 */
get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top:36px; padding-bottom:60px;">
        <header class="page-header" style="margin-bottom:32px; border-bottom:2px solid var(--color-border); padding-bottom:14px;">
            <h1 class="page-title" style="font-size:1.6rem; font-weight:900; color:var(--color-dark);">وبلاگ و مقالات دکوراسیون وینتیج</h1>
        </header>

        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:24px;">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background:#fff; border:1px solid var(--color-border); border-radius:var(--radius-md); overflow:hidden; box-shadow:var(--shadow-sm); display:flex; flex-direction:column;">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" style="display:block; height:180px; overflow:hidden;">
                                <?php the_post_thumbnail('medium', array('style' => 'width:100%; height:100%; object-fit:cover;')); ?>
                            </a>
                        <?php endif; ?>
                        <div style="padding:20px; display:flex; flex-direction:column; flex:1; justify-content:space-between;">
                            <div>
                                <span style="font-size:0.75rem; color:var(--color-text-muted);"><?php echo basate_fa_num(get_the_date('j F Y')); ?></span>
                                <h3 style="font-size:1.1rem; font-weight:800; margin:8px 0 10px; line-height:1.4;">
                                    <a href="<?php the_permalink(); ?>" style="color:var(--color-dark);"><?php the_title(); ?></a>
                                </h3>
                                <p style="font-size:0.88rem; color:var(--color-text-muted); line-height:1.6;">
                                    <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                                </p>
                            </div>
                            <div style="margin-top:16px;">
                                <a href="<?php the_permalink(); ?>" style="color:var(--color-primary-hover); font-weight:700; font-size:0.85rem;">مطالعه ادامه مطلب &larr;</a>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
            else :
                echo '<p>هنوز مطلبی منتشر نشده است.</p>';
            endif;
            ?>
        </div>
    </div>
</main>

<?php
get_footer();

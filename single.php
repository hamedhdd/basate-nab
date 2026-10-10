<?php
/**
 * Basate Nab - single.php
 */
get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top:36px; padding-bottom:60px;">
        <?php
        while (have_posts()) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background:#fff; border:1px solid var(--color-border); border-radius:var(--radius-lg); padding:36px; box-shadow:var(--shadow-sm); max-width:900px; margin:0 auto;">
                <header class="entry-header" style="margin-bottom:24px; border-bottom:1px solid var(--color-border); padding-bottom:16px;">
                    <div style="font-size:0.85rem; color:var(--color-primary-hover); font-weight:700; margin-bottom:8px;">
                        <?php echo basate_fa_num(get_the_date('j F Y')); ?>
                    </div>
                    <h1 class="entry-title" style="font-size:1.8rem; font-weight:900; color:var(--color-dark); line-height:1.4;"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div style="margin-bottom:28px; border-radius:var(--radius-md); overflow:hidden;">
                        <?php the_post_thumbnail('large', array('style' => 'width:100%; height:auto;')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="line-height:1.9; font-size:1.05rem; color:var(--color-text-body);">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();

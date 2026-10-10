<?php
/**
 * Basate Nab - page.php
 */
get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top:36px; padding-bottom:60px;">
        <?php
        while (have_posts()) : the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background:#fff; border:1px solid var(--color-border); border-radius:var(--radius-lg); padding:32px; box-shadow:var(--shadow-sm);">
                <header class="entry-header" style="margin-bottom:24px; border-bottom:1px solid var(--color-border); padding-bottom:14px;">
                    <h1 class="entry-title" style="font-size:1.6rem; font-weight:800; color:var(--color-dark);"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content" style="line-height:1.8; color:var(--color-text-body);">
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

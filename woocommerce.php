<?php
/**
 * Basate Nab - woocommerce.php
 * WooCommerce Template Wrapper
 */
get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top:28px; padding-bottom:60px;">
        <?php woocommerce_content(); ?>
    </div>
</main>

<?php
get_footer();

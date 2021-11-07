<?php
    global $product, $post;
?>

<article <?php post_class('vl-product-standard cbp-item'); ?> id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink(); ?>">
        <div class="vl-product-inner">
            <?php if(has_post_thumbnail()): ?>
                <div class="vl-product-thumbnail">
                    <?php echo woocommerce_show_product_sale_flash(); ?>
                    <?php the_post_thumbnail('vinero_md_square'); ?>
                </div>
            <?php endif; ?>
            <div class="vl-product-content">
                <h3 class="vl-product-title"><?php the_title(); ?></h3>
                <div class="vl-product-price">
                    <?php echo woocommerce_template_loop_price(); ?>
                </div>
            </div>
        </div>
    </a>
</article>
<!--/.vl-product-standard-->



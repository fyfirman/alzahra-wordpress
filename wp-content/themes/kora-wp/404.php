<?php get_header(); ?>
<section class="section-150px">
    <div class="container">
        <?php $error_404 = kora_wp_option('error_404');
        if(!empty($error_404)){
            echo do_shortcode($error_404);
        } else{ ?>
            <div class="tittle-block margin-bottom-40">
                <h2 class="margin-bottom-30"><?php echo esc_html__('Page Not Found!','kora-wp'); ?></h2>
                <p><?php echo esc_html__('Please try again! The page you are looking for is not found.','kora-wp'); ?></p>
            </div>
        <?php } ?>
    </div>
</section>
<?php get_footer(); ?>
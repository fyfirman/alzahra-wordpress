<div class="case-studio section-150px">
    <div class="container">
        <?php while(have_posts()): the_post();
        $post_animations_type = kora_get_field('post_animations_type');
        $post_animation_duration = kora_get_field('post_animation_duration'); ?>
        <!-- BLOG ROW -->
        <div class="blog-page blog-style-3 animate <?php echo esc_attr($post_animations_type); ?>" data-wow-delay="<?php echo esc_attr($post_animation_duration); ?>s">
            <div class="row">
                <?php if(has_post_thumbnail()){
                    $column = 'col-md-6'; ?>
                <!-- Case Img -->
                <div class="col-md-6">
                    <img class="img-responsive" src="<?php echo get_feature_image_url(get_the_ID()); ?>" alt="">
                </div>
                <?php } else {
                    $column = 'col-md-6 col-md-offset-3';
                }?>
                <!-- Case Text -->
                <div class="<?php echo esc_attr($column); ?>">
                    <h3><?php the_title(); ?></h3>
                    <p class="margin-bottom-20"><?php esc_html_e('By','kora-wp'); ?> <span class="text-dark"><?php the_author(); ?></span></p>
                    <p><?php the_excerpt(); ?></p>
                    <div class="row text-left">
                        <div class="col-md-4">
                            <a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('Continue Reading','kora-wp'); ?></a>
                        </div>
                        <div class="col-md-4">
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink();?>&amp;t=<?php echo get_the_title(); ?>" class="btn"><?php esc_html_e('Share','kora-wp'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <!-- Pagination -->
        <div class="clearfix"></div>
        <div class="_none"><?php the_post_thumbnail(); ?></div>
        <div class="margin-top-80"></div>
        <?php kora_pagination($pages = '', $range = 2); ?>
    </div>
</div>
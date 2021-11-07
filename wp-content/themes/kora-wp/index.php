<?php get_header(); ?>
    <!-- CASE STUDIO -->
    <div class="blog-page section-150px">
        <div class="container">
            <ul class="text-center">
                <?php while(have_posts()): the_post();
                    $post_animations_type = kora_get_field('post_animations_type');
                    $post_animation_duration = kora_get_field('post_animation_duration'); ?>
                    <li class="animate <?php echo esc_attr($post_animations_type); ?>" data-wow-delay="<?php echo esc_attr($post_animation_duration);?>s">
                        <article>
                            <a href="<?php the_permalink(); ?>" class="tittle-post"><?php the_title(); ?></a>
                            <p><?php esc_html_e('By','kora-wp'); ?>  <span><?php the_author(); ?></span></p>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn no-padding margin-right-20"><?php esc_html_e('Continue Reading','kora-wp'); ?></a>
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink();?>&amp;t=<?php echo get_the_title(); ?>" class="btn no-padding margin-left-20"><?php esc_html_e('Share','kora-wp'); ?></a>
                        </article>
                    </li>
                <?php endwhile; ?>
            </ul>
            <!-- Pagination -->
            <?php kora_pagination($pages = '', $range = 2); ?>
        </div>
    </div>
<?php get_footer(); ?>
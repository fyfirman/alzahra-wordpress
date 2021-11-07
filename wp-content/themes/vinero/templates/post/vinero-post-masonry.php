<article <?php post_class('vl-post-masonry cbp-item'); ?> id="post-<?php the_ID(); ?>">
    <div class="vl-post-inner">
        <?php if(has_post_thumbnail()): ?>
            <div class="vl-post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('vinero_fullheight_2col'); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="vl-post-content">

            <div class="vl-post-meta">
                <span class="vl-post-author"><i class="fa fa-fw fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
                <span class="vl-post-date"><i class="fa fa-fw fa-clock-o"></i><time datetime="<?php the_time( 'c' ); ?>'"><?php echo get_the_date(); ?></time></span>
            </div>

            <h3 class="vl-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <div class="vl-post-excerpt">
                <?php echo vinero_limit_text(get_the_content(), 20); ?>

            </div>

            <div class="vl-post-footer">
                <a href="<?php the_permalink(); ?>" class="vl-link reverse"><?php esc_html_e('Read More', 'vinero'); ?></a>
            </div>

        </div>
    </div>
</article>
<!--/.vl-post-masonry-->













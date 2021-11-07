<?php while(have_posts()): the_post();
    $post_animations_type = kora_get_field('post_animations_type');
    $post_animation_duration = kora_get_field('post_animation_duration');
    $post_sidebar_position = kora_get_field('post_sidebar_position'); ?>
    <div class="blog-page section-150px">
        <div class="container">
            <div class="blog-post">
                <article class="margin-bottom-50">
                    <h2 class="pst-title"><?php the_title(); ?></h2>
                    <?php if(has_post_thumbnail()){ ?>
                        <img class="img-responsive w-100" src="<?php echo get_feature_image_url(get_the_ID()); ?>" alt="" >
                    <?php } ?>
                </article>
                <div class="row">
                    <!-- ADMIN INFO -->
                    <?php $hide_category = kora_wp_option('hide_category');
                    $hide_date = kora_wp_option('hide_date');
                    $hide_author = kora_wp_option('hide_author');
                    $hide_social = kora_wp_option('hide_social');
                    ?>
                    <div class="col-md-3">
                        <?php if($hide_author != 1){ ?>
                            <p><?php esc_html_e('By','kora-wp'); echo ' '.get_the_author();  ?></p>
                        <?php } if($hide_date != 1){ ?>
                            <p><?php echo get_the_time('M d Y'); ?></p>
                        <?php } if($hide_category != 1){ ?>
                            <p>
                                <?php $cats = get_the_category(get_the_ID());
                                if(is_array($cats)){
                                    $i = 0;
                                    $len = count($cats);
                                    foreach($cats as $cat){
                                        if ($i == $len - 1) {
                                            echo esc_attr($cat->name);
                                        } else {
                                            echo esc_attr($cat->name).', ';
                                        }
                                        $i++;
                                    }
                                }?>
                            </p>
                        <?php } if($hide_social != 1){ ?>
                            <h6 class="font-bold margin-top-50 margin-bottom-20"><?php esc_html_e('SHARE THIS VIA:','kora-wp'); ?></h6>
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink();?>&amp;t=<?php echo get_the_title(); ?>" class="font-italic"><?php esc_html_e('Facebook','kora-wp'); ?> </a> <br>
                            <br>
                            <a href="https://twitter.com/intent/tweet?original_referer=<?php echo get_the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php echo get_the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>" class="font-italic"> <?php esc_html_e('Twitter','kora-wp'); ?> </a> <br>
                            <br>
                            <a href="//pinterest.com/pin/create/button/?url=<?php echo get_the_permalink();?>&amp;media=<?php echo get_feature_image_url(get_the_ID()); ?>&amp;description=<?php echo get_the_title(); ?>" class="font-italic"> <?php esc_html_e('Pinterest','kora-wp'); ?></a>
                        <?php } ?>
                    </div>

                    <!-- Post Detail -->
                    <div class="col-md-9">
                        <?php the_content(); ?>
                        <div class="clear"></div>
                        <?php posts_nav_link(); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'kora-wp' ), 'after' => '</div>' ) ); ?>
                        <div class="clearfix"></div>
                        <div class="next-prev">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <?php $nepo = get_next_post();
                                    if(!empty($nepo)){
                                        $nepoid = $nepo->ID;
                                        $next_post_url = get_permalink($nepoid);
                                    } else {
                                        $next_post_url = "no-posts";
                                    }
                                    if($next_post_url != "no-posts"){ ?>
                                        <a href="<?php echo ''.$next_post_url; ?>"  class="font-16px font-crimson text-uppercase">
                                            <i class="fa fa-long-arrow-left margin-right-15"></i>
                                            <?php esc_html_e('PREVIOUS Article','kora-wp'); ?>
                                        </a>
                                    <?php } else{ ?>
                                        <a href="javascript:void(0);" class="font-16px font-crimson text-uppercase">
                                            <i class="fa fa-long-arrow-left margin-right-15"></i>
                                            <?php esc_html_e('PREVIOUS Article','kora-wp'); ?>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6 text-right">
                                    <?php $prpo=get_previous_post();
                                    if(!empty($prpo)){
                                        $prpoid = $prpo->ID;
                                        $prev_post_url = get_permalink($prpoid);
                                    } else {
                                        $prev_post_url = "no-post"; }
                                    if($prev_post_url != "no-post"){ ?>
                                        <a href="<?php echo ''.$prev_post_url; ?>" class="font-16px font-crimson text-uppercase">
                                            <?php esc_html_e('Next Article','kora-wp'); ?>
                                            <i class="fa fa-long-arrow-right margin-left-15"></i>
                                        </a>
                                    <?php } else{ ?>
                                        <a href="javascript:void(0);" class="font-16px font-crimson text-uppercase">
                                            <?php esc_html_e('Next Article','kora-wp'); ?>
                                            <i class="fa fa-long-arrow-right margin-left-15"></i>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- Start Comments -->
                        <?php comments_template(); ?>
                        <!-- End Comments -->
                    </div>
                </div>
            </div>
            <div <?php post_class(); ?>></div>
        </div>
    </div>
<?php endwhile; ?>
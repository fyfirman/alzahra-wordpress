<?php get_header();
include_once(get_template_directory() . "/includes/single-portfolio/single-variables.php"); ?>
<!-- CASE STUDIO -->
    <div class="case-studio section-150px">
        <div class="container">
            <!-- CASE STUDIO ROW -->
            <ul class="row">
                <!-- Case Text -->
                <li class="col-md-6">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
                </li>
                <!-- Case Img -->
                <li class="col-md-12 margin-top-40 margin-bottom-40">
                    <?php if(has_post_thumbnail()){ ?>
                        <img class="img-responsive" src="<?php echo get_feature_image_url(get_the_ID()); ?>" alt="">
                    <?php } ?>
                </li>
                <li class="col-md-6">
                    <?php if(!empty($brief_heading)){ ?>
                        <h6 class="font-bold text-uppercase"><?php echo esc_attr($brief_heading); ?></h6>
                    <?php } if(!empty($brief_text)){ ?>
                        <p><?php echo do_shortcode($brief_text); ?></p>
                    <?php } ?>
                    <div class="row text-left margin-top-30">
                        <?php if(!empty($get_in_touch_text)){ ?>
                            <div class="col-md-6">
                                <a class="btn" href="<?php echo esc_url($get_in_touch_link); ?>"><?php echo esc_attr($get_in_touch_text); ?></a>
                            </div>
                        <?php } if(!empty($next_project_text)){
                            $prpo = get_previous_post();
                        if(!empty($prpo)){
                            $prpoid = $prpo->ID;
                            $prev_post_url = get_permalink($prpoid);
                        } else {
                            $prev_post_url = "no-post";
                        }
                        if($prev_post_url != "no-post"){ ?>
                            <div class="col-md-6">
                                <a class="btn" href="<?php echo esc_url($prev_post_url); ?>"><?php echo esc_attr($next_project_text); ?> <i class="fa fa-angle-right"></i></a>
                            </div>
                        <?php }
                        } ?>
                    </div>
                </li>
                <li class="col-md-6">
                    <h6 class="font-bold text-uppercase"><?php echo esc_attr($more_from_this_project); ?></h6>
                    <div class="row more-projects">
                        <?php $img_count = 1;
                        if(is_array($column3_small_images)){
                            foreach($column3_small_images as $img){ ?>
                                <div class="col-sm-4 margin-bottom-30">
                                    <img class="img-responsive" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                                </div>
                        <?php if($img_count % 3 == 0) {
                                echo '<div class="clear clearfix"></div>';
                           } $img_count++; }
                        } ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<?php get_footer(); ?>
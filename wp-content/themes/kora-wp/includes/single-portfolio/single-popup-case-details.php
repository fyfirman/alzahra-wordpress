<?php include_once(get_template_directory() . "/includes/single-portfolio/single-variables.php"); ?>
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
            <li class="col-md-4">
                <h6 class="font-bold text-uppercase"><?php echo esc_attr($brief_heading); ?></h6>
                <p><?php echo do_shortcode($brief_text); ?></p>
            </li>
            <li class="col-md-4">
                <h6 class="font-bold text-uppercase"><?php echo esc_attr($project_insight_heading); ?></h6>
                <p><?php echo do_shortcode($project_insight_text); ?></p>
            </li>
            <li class="col-md-4">
                <div class="row text-center margin-top-30">
                    <?php if(!empty($get_in_touch_text)){ ?>
                        <div class="col-md-6"> <a class="btn" href="<?php echo esc_url($get_in_touch_link); ?>"><?php echo esc_attr($get_in_touch_text); ?></a> </div>
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
        </ul>

        <!-- Start Case -->
        <?php while ( have_rows('details_add_cases') ) : the_row();
            $da_case_title = get_sub_field('da_case_title');
            $da_description = get_sub_field('da_description');
            $da_case_image = get_sub_field('da_case_image');
            ?>
            <ul class="row margin-top-80">
                <!-- Case Text -->
                <li class="col-md-4">
                    <h3 class="font-bold margin-bottom-30"><?php echo esc_attr($da_case_title); ?></h3>
                    <p><?php echo do_shortcode($da_description); ?></p>
                    <ul class="points-case">
                        <?php while ( have_rows('da_case_points') ) : the_row(); ?>
                            <li><?php echo get_sub_field('da_case_points_2'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <?php if(!empty($da_case_image)){ ?>
                    <li class="col-md-8">
                        <img class="img-responsive" src="<?php echo esc_url($da_case_image); ?>" alt="" >
                    </li>
                <?php } ?>
            </ul>
            <!-- Case Images -->
            <ul class="row margin-top-30">
                <?php while ( have_rows('da_case_gallery') ) : the_row(); ?>
                    <li class="col-md-<?php echo get_sub_field('da2_image_column'); ?>">
                        <img class="img-responsive margin-top-30" src="<?php echo get_sub_field('da2_image'); ?>" alt="" >
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endwhile; ?>
        <!-- End Case -->
    </div>
</div>
</div>
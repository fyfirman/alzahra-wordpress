<?php include_once(get_template_directory() . "/includes/single-portfolio/single-variables.php"); ?>
<!-- CASE STUDIO -->
<div class="case-studio section-150px">
    <div class="container">
        <?php while ( have_rows('smc_add_cases') ) : the_row();
            $smc_case_title = get_sub_field('smc_case_title');
            $smc_description = get_sub_field('smc_description');
            $smc_view_full_study_text = get_sub_field('smc_view_full_study_text');
            $smc_view_full_study_link = get_sub_field('smc_view_full_study_link');
            $smc_hide_share = get_sub_field('smc_hide_share');
            $smc_content_position = get_sub_field('smc_content_position');
            $smc_case_image = get_sub_field('smc_case_image');
            if($smc_content_position == 'left'){ ?>
            <!-- CASE STUDIO ROW -->
            <ul class="row">
                <!-- Case Text -->
                <li class="col-md-6">
                    <h2><?php echo esc_attr($smc_case_title); ?></h2>
                    <p><?php echo do_shortcode($smc_description); ?></p>
                    <ul class="points-case">
                        <?php while ( have_rows('smc_case_points') ) : the_row();
                            $smc2_case_point = get_sub_field('smc2_case_point'); ?>
                            <li><?php echo esc_attr($smc2_case_point); ?></li>
                        <?php endwhile; ?>
                    </ul>
                    <div class="row text-left">
                        <?php if(!empty($smc_view_full_study_text)){ ?>
                            <div class="col-md-4"> <a href="<?php echo esc_url($smc_view_full_study_link); ?>" class="btn"><?php echo esc_attr($smc_view_full_study_text); ?></a> </div>
                        <?php } if($smc_hide_share != 'yes'){ ?>
                            <div class="col-md-4">
                                <a href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink();?>&amp;t=<?php echo get_the_title(); ?>" class="btn"><?php echo esc_html__('Share','kora-wp'); ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </li>
                <?php if(!empty($smc_case_image)){ ?>
                    <!-- Case Img -->
                    <li class="col-md-6">
                        <img class="img-responsive" src="<?php echo esc_url($smc_case_image); ?>" alt="">
                    </li>
                <?php } ?>
            </ul>
            <?php } else{ ?>
            <!-- CASE STUDIO ROW -->
            <ul class="row text-right">
                <?php if(!empty($smc_case_image)){ ?>
                    <!-- Case Img -->
                    <li class="col-md-6">
                        <img class="img-responsive" src="<?php echo esc_url($smc_case_image); ?>" alt="">
                    </li>
                <?php } ?>
                <!-- Case Text -->
                <li class="col-md-6">
                    <h2><?php echo esc_attr($smc_case_title); ?></h2>
                    <p><?php echo do_shortcode($smc_description); ?></p>
                    <ul class="points-case">
                        <?php while ( have_rows('smc_case_points') ) : the_row();
                            $smc2_case_point = get_sub_field('smc2_case_point'); ?>
                            <li><?php echo esc_attr($smc2_case_point); ?></li>
                        <?php endwhile; ?>
                    </ul>
                    <div class="row text-right">
                        <?php if($smc_hide_share != 'yes'){ ?>
                            <div class="col-md-8">
                                <a href="http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink();?>&amp;t=<?php echo get_the_title(); ?>" class="btn"><?php echo esc_html__('Share','kora-wp'); ?></a>
                            </div>
                        <?php } if(!empty($smc_view_full_study_text)){ ?>
                            <div class="col-md-4">
                                <a href="<?php echo esc_url($smc_view_full_study_link); ?>" class="btn"><?php echo esc_attr($smc_view_full_study_text); ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        <?php }
            echo '<div class="margin-top-80"></div>';
        endwhile; ?>
    </div>
</div>
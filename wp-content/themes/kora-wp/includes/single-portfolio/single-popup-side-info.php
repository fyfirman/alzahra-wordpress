<?php include_once(get_template_directory() . "/includes/single-portfolio/single-variables.php"); ?>
<!-- PORTFOLIO -->
<section class="portfolio port-wrap padding-top-80 padding-bottom-80">
    <!-- PORTFOLIO ITEMS -->
    <div class="container">
        <?php if(is_array($info_popup_slides)){ ?>
            <div class="cbp-slider" style="max-width: 100%;">
                <ul class="cbp-slider-wrap">
                    <?php foreach($info_popup_slides as $img){ ?>
                        <li class="cbp-slider-item">
                            <img class="img-responsive" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" >
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <div class="margin-top-50 margin-bottom-80"></div>
        <div class="row">
            <div class="col-md-8 padding-right-30">
                <h3 class="margin-top-0 margin-bottom-20"><?php the_title(); ?></h3>
                <p><?php the_content(); ?></p>
            </div>
            <!-- PORTFOLIO INFO -->
            <div class="col-md-4">
                <ul class="project-info">
                    <li>
                        <h6><?php echo esc_attr($client_heading); ?></h6>
                        <span class="text-color-primary"><?php echo do_shortcode($client_text); ?></span>
                        <h6><?php echo esc_attr($date_heading); ?></h6>
                        <span class="text-color-primary"><?php echo esc_attr($date_text); ?></span>
                        <h6><?php echo esc_attr($skills_heading); ?></h6>
                        <span class="text-color-primary"><?php echo esc_attr($skills_text); ?></span>
                    </li>
                </ul>
                <?php if(!empty($view_demo_text)){ ?>
                    <a href="<?php echo esc_url($view_demo_link); ?>" class="btn btn-med btn-color white-text font-normal margin-top-50"><?php echo esc_attr($view_demo_text); ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
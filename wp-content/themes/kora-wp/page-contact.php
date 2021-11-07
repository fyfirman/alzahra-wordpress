<?php
/*
 * Template Name: Contact Page
 */
get_header();
while(have_posts()): the_post();
    $map_height = get_field('map_height');
    if(!empty($map_height)){
        $height = $map_height;
    } else {
        $height = '';
    }
    // Banners
    get_template_part('includes/kora','banners'); ?>
<!-- CASE STUDIO -->
<div class="contact-us section-150px">
    <div class="container-fluid">
        <div class="row">
            <!-- CONTACT INFO -->
            <div class="col-md-6">
                <div class="contact-left">
                    <?php the_content(); ?>
                    <div class="write-some margin-top-50 animate fadeInUp" data-wow-delay="0.4s">
                        <?php $form_heading = get_field('form_heading');
                        $contact_form_7_shortcode = get_field('contact_form_7_shortcode');
                        if(!empty($form_heading)){ ?>
                            <h3 class="font-bold"><?php echo esc_attr($form_heading); ?></h3>
                        <?php } ?>
                        <div class="contact-right padding-top-30 ">
                            <!-- FORM -->
                            <div id="contact_form" class="contact-form">
                                <?php echo do_shortcode($contact_form_7_shortcode); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAP -->
            <div class="col-md-6">
                <div id="map" <?php if(!empty($height)){ ?> style="height: <?php echo esc_attr($height); ?>px;" <?php } ?>></div>
            </div>
        </div>
    </div>
</div>
<?php endwhile;
get_footer(); ?>
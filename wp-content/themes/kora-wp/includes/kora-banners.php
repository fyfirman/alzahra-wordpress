<?php
/*
 * Kora Banners
 */
if(is_category()){
    $queried_object = get_queried_object();
    $choose_banner_type = kora_get_field('choose_banner_type');
    $banner_heading = kora_get_field('banner_heading');
    $banner_small_caption = kora_get_field('banner_small_caption');
    $banner_image = kora_get_field('banner_image');
    $slider_revolution_alias = kora_get_field('slider_revolution_alias');
} else {
    $choose_banner_type = kora_get_field('choose_banner_type');
    $banner_heading = kora_get_field('banner_heading');
    $banner_small_caption = kora_get_field('banner_small_caption');
    $banner_image = kora_get_field('banner_image');
    $slider_revolution_alias = kora_get_field('slider_revolution_alias');
}
if($choose_banner_type == 'slider'){ ?>
<!-- Slider -->
<section class="home-slider">
    <?php if(function_exists('putRevSlider')){
        putRevSlider($slider_revolution_alias, $slider_revolution_alias);
    } ?>
</section>
<?php } elseif($choose_banner_type == 'image'){ ?>
    <section class="sub-banner" <?php if(!empty($banner_image)){?> style="background: url(<?php echo esc_url($banner_image); ?>) fixed center center no-repeat;" <?php } ?>>
        <div class="container">
            <?php if(!empty($banner_heading)){ ?>
                <h2><?php echo esc_attr($banner_heading); ?></h2>
            <?php } if(!empty($banner_small_caption)){ ?>
                <p><?php echo esc_attr($banner_small_caption); ?></p>
            <?php } ?>
        </div>
    </section>
<?php } else{
    echo '<div class="hide-bn"></div>';
} ?>
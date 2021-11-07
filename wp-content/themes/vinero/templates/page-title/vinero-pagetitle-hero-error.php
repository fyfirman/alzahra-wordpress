<?php
	$error_title = get_theme_mod('error_title', esc_html__('Error 404', 'vinero'));
	$error_subtitle = get_theme_mod('error_subtitle', esc_html__('Enter a subtitle for page 404', 'vinero'));
?>


<div class="vl-hero-title-holder jarallax" style="background-image: url('<?php echo get_theme_mod('error_bg', VINERO_THEME_DIRECTORY . 'assets/img/index.jpg'); ?>');">
    <div class="vl-hero-title-inner">
        <h1 class="vl-hero-title"><?php echo esc_html($error_title); ?></h1>
        <p class="vl-hero-subtitle"><?php echo esc_html($error_subtitle); ?></p>
    </div>
</div>
<!--/.vl-hero-title-holder-->
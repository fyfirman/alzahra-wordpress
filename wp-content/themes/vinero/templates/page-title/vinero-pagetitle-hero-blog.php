<?php
	$blog_title = get_theme_mod('blog_title', esc_html__('Recent News', 'vinero'));
	$blog_subtitle = get_theme_mod('blog_subtitle', esc_html__('Read the latest news and stories.', 'vinero'));
?>

<div class="vl-hero-title-holder jarallax" style="background-image: url('<?php echo get_theme_mod('blog_bg', VINERO_THEME_DIRECTORY . 'assets/img/index.jpg'); ?>');">
    <div class="vl-hero-title-inner">
        <h1 class="vl-hero-title"><?php echo esc_html($blog_title); ?></h1>
        <p class="vl-hero-subtitle"><?php echo esc_html($blog_subtitle); ?></p>
    </div>
</div>
<!--/.vl-hero-title-holder-->
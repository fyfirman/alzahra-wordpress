<?php

$page_title = '';
$page_subtitle = '';

if(is_category()) {

	$page_title .= esc_html__('Categories Archives', 'vinero') ;
	$page_subtitle .= get_category(get_query_var('cat'))->name;

} else if(is_author()) {

	$page_title .= esc_html__('Author Archives', 'vinero');
	$page_subtitle .= get_userdata(get_query_var('author'))->display_name;


} else if(is_tag()) {

	$page_title .= esc_html__('Tags Archives', 'vinero');
	$page_subtitle .= single_tag_title('', false);

} else if(is_day()) {

	$page_title .= esc_html__('Daily Archives', 'vinero');
	$page_subtitle .= get_the_date();

} else if(is_month()) {

	$page_title .= esc_html__('Monthly Archives', 'vinero');
	$page_subtitle .= get_the_date('F Y');

} else if(is_year()) {

	$page_title .= esc_html__('Yearly Archives', 'vinero');
	$page_subtitle .= get_the_date('Y');

}


?>


<div class="vl-hero-title-holder jarallax" style="background-image: url('<?php echo get_theme_mod('archive_bg', VINERO_THEME_DIRECTORY . 'assets/img/index.jpg'); ?>');">
    <div class="vl-hero-title-inner">
        <h1 class="vl-hero-title"><?php echo esc_html($page_title); ?></h1>
        <p class="vl-hero-subtitle"><?php echo esc_html($page_subtitle); ?></p>
    </div>
</div>
<!--/.vl-hero-title-holder-->
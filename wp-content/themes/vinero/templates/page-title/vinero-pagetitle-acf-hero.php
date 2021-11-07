<?php

	$page_title = get_field('page_title', get_queried_object_id());
	$page_title = $page_title ? $page_title : get_the_title();
	$page_subtitle = get_field('page_subtitle', get_queried_object_id());

?>

<div class="vl-hero-title-holder jarallax" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
    <div class="vl-hero-title-inner">
        <h1 class="vl-hero-title"><?php echo esc_html($page_title); ?></h1>
        <?php if($page_subtitle): ?>
            <p class="vl-hero-subtitle"><?php echo esc_html($page_subtitle); ?></p>
        <?php endif; ?>
    </div>
</div>
<!--/.vl-hero-title-holder-->
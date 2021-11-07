<?php get_header(); the_post();?>

<?php get_template_part('templates/page-title/vinero-pagetitle', 'singlepost'); ?>

<main class="vl-main-holder vl-main-padding">
	<div class="container">

	<?php get_template_part('templates/post/vinero-post', 'single'); ?>

	<?php

		if(get_theme_mod('singlepost_recent_news', false)){
			get_template_part('loop/loop', 'recent-news');
		}

	?>

	</div>
</main>
<!--/.vl-main-holder .vl-main-padding-->


<?php get_footer(); ?>

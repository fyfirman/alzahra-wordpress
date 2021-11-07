<?php get_header(); the_post();?>


<main class="vl-main-holder">
	<div class="container">
	<?php get_template_part('templates/portfolio/vinero-portfolio', 'single'); ?>
	</div>
	<?php
		if(get_theme_mod('singleportfolio_navigation', true)){
			echo vinero_portfolio_navigation();
		}
	?>
</main>
<!--/.vl-main-holder .vl-main-padding-->


<?php get_footer(); ?>

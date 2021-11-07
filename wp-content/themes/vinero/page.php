<?php get_header(); ?>

<?php 

	if(class_exists('acf')) {
		get_template_part('templates/page-title/vinero-pagetitle-acf', vinero_get_title_layout());
	}else{
		get_template_part('templates/page-title/vinero-pagetitle', 'hero');
	}

?>


<main class="vl-main-holder vl-main-padding">
	<div class="container">
		<?php

		while (have_posts()) : the_post();

			get_template_part('templates/content/vinero-content', 'page');

			if (comments_open() || get_comments_number()){
				comments_template();
			}

		endwhile;

		?>
	</div>
</main>




<?php get_footer(); ?>



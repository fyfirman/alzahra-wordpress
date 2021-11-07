<?php

// Template Name: Custom Page

get_header();

?>

<main class="vl-main-holder">
	<div class="container">
		<?php 
			while (have_posts()) : the_post();
				the_content();
			endwhile; 
		?>
	</div>
</main>
<!--/.vl-main-holder-->
   

<?php get_footer(); ?>
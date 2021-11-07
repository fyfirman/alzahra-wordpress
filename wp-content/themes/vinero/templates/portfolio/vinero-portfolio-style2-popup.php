<article <?php post_class('cbp-item vl-portfolio-grid-item vl-portfolio-style2'); ?> id="post-<?php the_ID(); ?>">
	<div class="vl-portfolio-grid-image">
		<a class="vl-portfolio-grid-link lightbox-link" href="<?php the_post_thumbnail_url('vinero_fullsize'); ?>">
			<?php
				if(has_post_thumbnail()):
					the_post_thumbnail('vinero_fullsize');
				endif;
			?>
		</a>
	</div>
	<div class="vl-portfolio-grid-content">
		<h5 class="vl-portfolio-grid-title"><?php the_title(); ?></h5>
		<p class="vl-portfolio-grid-cat"><?php echo vinero_post_taxonomy(get_the_ID(), 'portfolio_category', ', ', 'name', false); ?></p>
	</div>
</article>
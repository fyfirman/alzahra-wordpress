<article <?php post_class('vl-post-recent-popular'); ?> id="post-<?php the_ID(); ?>">
	<div class="vl-post-inner">
		<span class="vl-post-reading-time">
			<?php echo vinero_reading_time(); ?>
		</span>
		<h3 class="vl-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="vl-post-meta">
			<?php echo vinero_post_taxonomy(get_the_ID(), 'category'); ?>
		</div>

		<?php if(has_post_thumbnail()): ?>
		<div class="vl-scalable-thumbnail"><?php the_post_thumbnail('vinero_xs_blog_4by3'); ?></div>
		<?php endif; ?>
	</div>
</article>

<div class="vl-postlist-recent-popular">
	<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 4,
			'meta_key' => 'vinero_post_views_count',
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
			'ignore_sticky_posts' => true
		);
		$new_query = new WP_Query($args);
	?>
	<hr>

	<div class="vl-postlist-recent-popular-title">
		<h5><?php esc_html_e('Popular News', 'vinero'); ?></h5>
	</div>
	<div class="row">
		<?php if ($new_query->have_posts()): while ($new_query->have_posts()): $new_query->the_post(); ?>
			<div class="col-md-3">
				<?php get_template_part('templates/post/vinero-post', 'recent-popular'); ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>
<!--/.vl-postlist-recent-popular-->
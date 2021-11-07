<div class="vl-postlist vl-postlist-products cubeportfolio clearfix" data-gutter="<?php echo get_theme_mod('shop_gutter', 30); ?>">

	<?php
		while (have_posts()) : the_post();
			get_template_part('templates/shop/vinero-shop', 'product');
		endwhile;
	?>

</div>
<!--/.vl-postlist .vl-postlist-products .cubeportfolio .clearfix-->



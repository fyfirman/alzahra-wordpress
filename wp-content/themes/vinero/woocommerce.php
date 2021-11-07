<?php get_header(); ?>

<?php if(is_singular()): ?>
	<?php get_template_part('templates/page-title/vinero-pagetitle-hero', 'shop'); ?>
	<?php get_template_part('woocommerce/single', 'product'); ?>
<?php else: ?>
	<?php get_template_part('templates/page-title/vinero-pagetitle-hero', 'shop'); ?>
	<main class="vl-main-holder vl-main-padding">
		<div class="container">
			<?php if (have_posts()):
					get_template_part('woocommerce/archive', 'product');
				else:
					get_template_part('templates/content/vinero-content', 'none');
				endif;
			?>
		</div>
	</main>
<?php endif; ?>

<?php get_footer(); ?>

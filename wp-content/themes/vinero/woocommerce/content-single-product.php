<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */

	if ( post_password_required() ) {
		echo get_the_password_form();
		return;
	}

	//woocommerce_before_single_product_summary
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	
	add_action( 'woocommerce_before_single_product_summary_product_images', 'woocommerce_show_product_images', 20 );

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
				
	add_action( 'woocommerce_single_product_summary_single_title', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary_single_rating', 'woocommerce_template_single_rating', 10 );
	add_action( 'woocommerce_single_product_summary_single_excerpt', 'woocommerce_template_single_excerpt', 20 );
	add_action( 'woocommerce_single_product_summary_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 30 );
	add_action( 'woocommerce_single_product_summary_single_meta', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_single_product_summary_single_price', 'woocommerce_template_single_price', 10 );

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

	add_action( 'woocommerce_after_single_product_summary_data_tabs', 'woocommerce_output_product_data_tabs', 10 );
	add_action( 'woocommerce_after_single_product_summary_related_products', 'woocommerce_output_related_products', 20 );


	function woocommerce_single_product_summary_single() { 
		echo '<div class="vl-post-share">';
		echo vinero_post_share_buttons();
		echo '</div>';
	}   
	add_action( 'woocommerce_single_product_summary', 'woocommerce_single_product_summary_single'); 

	do_action( 'woocommerce_before_single_product' );


?>
	

<article <?php post_class('vl-product-single'); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="vl-product-thumbnail">
			<?php do_action('woocommerce_before_single_product_summary_product_images'); ?>
		</div>
		<div class="vl-product-summary">
			<div class="vl-product-summary-header">
				<?php
					do_action( 'woocommerce_single_product_summary_single_title' );
					do_action( 'woocommerce_single_product_summary_single_rating' ); 
				?>
			</div>
			<?php
				do_action( 'woocommerce_single_product_summary_single_excerpt' );
				do_action( 'woocommerce_single_product_summary_single_price' );
				if (get_theme_mod('shop_catalog_mode', false)) {
					do_action( 'woocommerce_single_product_summary_single_add_to_cart' );
				}
			?>
			<div class="vl-product-summary-footer">
				<?php do_action( 'woocommerce_single_product_summary'); ?>
			</div>
		</div>
	</div>
</article>


<div class="vl-product-description">
	<?php do_action( 'woocommerce_single_product_summary_single_meta' ); ?>
	<?php do_action( 'woocommerce_after_single_product_summary_data_tabs' ); ?>
</div>



<?php do_action( 'woocommerce_after_single_product_summary_related_products' ); ?>







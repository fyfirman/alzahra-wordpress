<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();


remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action( 'woocommerce_cross_sell_display_action', 'woocommerce_cross_sell_display');


do_action( 'woocommerce_before_cart' ); ?>

<form class="vl-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>
	<table class="vl-cart-form-content">
		<thead>
			<tr>
				<th class="vl-product-item"><?php esc_html_e( 'Product', 'vinero' ); ?></th>
				<th class="vl-product-quantity"><?php esc_html_e( 'Quantity', 'vinero' ); ?></th>
				<th class="vl-product-price hidden-sm-down"><?php esc_html_e( 'Price', 'vinero' ); ?></th>
				<th class="vl-product-remove"><?php esc_html_e('Remove', 'vinero'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="vl-cart-product-item">

						<td class="vl-product-item-content">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							
								printf( '<div class="vl-product-item-thumbnail">%s</div>', $thumbnail );
					
								if ( ! $product_permalink ) {
									echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
								} else {
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="vl-product-item-permalink">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								}

								// Meta data
								echo WC()->cart->get_item_data( $cart_item );

								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'vinero' ) . '</p>';
								}
							?>

						</td>

						<td class="vl-product-quantity-content" data-title="<?php esc_html_e( 'Quantity', 'vinero' ); ?>">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
										'min_value'   => '0',
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
						</td>

						<td class="vl-product-price-content hidden-sm-down" data-title="<?php esc_html_e( 'Price', 'vinero' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</td>

						<td class="vl-product-remove-content">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="vl-remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">'.esc_html__( 'X', 'vinero' ).'</a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									esc_html__( 'Remove this item', 'vinero' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>

					</tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>


	<table class="vl-cart-form-actions">
		<tbody>
			<?php do_action( 'woocommerce_cart_contents' ); ?>
			<tr>
				<th class="vl-cart-coupon">
					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="vl-coupon">
							<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="">
							<input type="submit" class="vl-btn vl-btn-primary" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'vinero' ); ?>">
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>
				</th>
				<th class="vl-cart-update">
					<input type="submit" class="vl-update-cart" name="update_cart" value="<?php esc_html_e( 'Update Shopping Cart', 'vinero' ); ?>" />
					<?php do_action( 'woocommerce_cart_actions' ); ?>
					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				</th>
			</tr>
			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>

	<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>


<div class="vl-cart-collaterals">
	<?php do_action( 'woocommerce_cart_collaterals' ); ?>
</div>

<?php do_action('woocommerce_cross_sell_display_action'); ?>


<?php do_action( 'woocommerce_after_cart' ); ?>

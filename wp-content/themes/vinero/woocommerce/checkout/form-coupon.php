<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
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
 * @version 2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! wc_coupons_enabled() ) {
	return;
}


if ( empty( WC()->cart->applied_coupons ) ) {
	$info_message = apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'vinero' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'vinero' ) . '</a>' );
	wc_print_notice( $info_message, 'notice' );
}
?>

<form class="vl-checkout-coupon checkout_coupon" method="post" style="display:none">

	<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" />
	<input type="submit" class="vl-btn vl-btn-primary" name="apply_coupon" value="<?php esc_html_e( 'Apply coupon', 'vinero' ); ?>" />

	<div class="clear"></div>
</form>


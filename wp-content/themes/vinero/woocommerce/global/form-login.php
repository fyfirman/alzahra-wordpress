<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
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
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form class="vl-form-login login" method="post" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>

	<div class="vl-form-group">
		<label for="username"><?php esc_html_e( 'Username', 'vinero' ); ?></label>
		<input type="text" class="input-text" name="username" id="username" />
	</div>

	<div class="vl-form-group">
		<label for="password"><?php esc_html_e( 'Password', 'vinero' ); ?></label>
		<input class="input-text" type="password" name="password" id="password" />
	</div>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<div class="vl-form-group">
		<?php wp_nonce_field( 'woocommerce-login' ); ?>
		<input type="submit" class="vl-btn vl-btn-primary vl-btn-lg block" name="login" value="<?php esc_html_e( 'Login', 'vinero' ); ?>" />
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
		<label class="vl-remember-me">
			<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'vinero' ); ?></span>
		</label>
	</div>
	<div class="vl-lost-password">
		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'vinero' ); ?></a>
	</div>


	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>

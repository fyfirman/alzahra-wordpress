<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
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
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


<form id="searchform" class="vl-search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="vl-form-group">
        <label for="s"><?php esc_html_e('Search', 'vinero'); ?></label>
        <input type="text" id="s" name="s" class="vl-form-control">
        <input type="hidden" name="post_type" value="product" />
    </div>
</form>
<!--/.vl-search-form-->




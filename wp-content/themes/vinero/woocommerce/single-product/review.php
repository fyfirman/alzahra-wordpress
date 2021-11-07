<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<li class="vl-review-item">

	<div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
        <div class="vl-review-left">
            <div class="vl-review-avatar">
                <?php echo get_avatar($comment, 50, $default = ''); ?>
            </div>
        </div>

        <div class="vl-review-content">
            <div class="vl-review-header-holder">
                <div class="vl-review-header">
                    <h6 class="vl-review-author">
                        <?php comment_author(); ?>
                    </h6>
                    <div class="vl-review-meta">
                        <?php do_action( 'woocommerce_review_before_comment_meta', $comment ); ?>
                    </div>
                </div>
            </div>
            <div class="vl-review-text">
                <?php comment_text(); ?>
                <?php if ($comment->comment_approved == '0'): ?>
                    <i class="moderate">
                        <?php esc_html_e('Your review is awaiting moderation.', 'vinero'); ?>
                    </i>
                <?php endif; ?>
            </div>
        </div>

	</div>

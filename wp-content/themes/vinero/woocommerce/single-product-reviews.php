<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
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
 * @version     2.3.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div class="vl-reviews" id="reviews">
	<div class="vl-reviews-holder" id="comments">

		<?php if ( have_comments() ) : ?>

			<ul class="vl-reviews-list">
				<?php 
					$args = array(
                        'callback' => 'woocommerce_comments',
                    );
				wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', $args ) ); ?>
			</ul>

			 <?php echo vinero_comment_pagination(); ?>

		<?php else : ?>

			<em class="vl-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'vinero' ); ?></em>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div class="vl-review-form-holder">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Add a review', 'vinero' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'vinero' ), get_the_title() ),
						'title_reply_to'       => __( 'Leave a Reply to %s', 'vinero' ),
                    'title_reply_before' => '<h3 id="reply-title">',
                    'title_reply_after' => '</h3>',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<div class="vl-form-group">' . '<label for="author">' . esc_html__( 'Name', 'vinero' ) . ' <span class="required">*</span></label> ' .
										'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" required /></div>',
							'email'  => '<div class="vl-form-group"><label for="email">' . esc_html__( 'Email', 'vinero' ) . ' <span class="required">*</span></label> ' .
										'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" required /></div>',
						),
						'label_submit'  => __( 'Submit', 'vinero' ),
						'class_submit' => 'vl-btn vl-btn-primary',
						'logged_in_as'  => '',
						'comment_field' => '',
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'vinero' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<div class="vl-review-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'vinero' ) . '</label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'vinero' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'vinero' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'vinero' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'vinero' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'vinero' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'vinero' ) . '</option>
						</select></div>';
					}

					$comment_form['comment_field'] .= '<div class="vl-form-group"><label for="comment">' . esc_html__( 'Your review', 'vinero' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" rows="4" aria-required="true" required></textarea></div>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'vinero' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>

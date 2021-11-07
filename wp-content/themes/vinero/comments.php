<div class="vl-comments" id="comments">
	<div class="row">

		<div class="col-md-6">
			<div class="vl-comments-holder">


				<h5 class="vl-comment-title" ><?php esc_html_e('Comments', 'vinero'); ?></h5>
				<p class="vl-comments-number">
					<?php comments_number(esc_html__('No Comments', 'vinero') , esc_html__('One Comment', 'vinero') , esc_html__('% Comments', 'vinero')); ?>
				</p>

				<?php if (have_comments()): ?>

					<ul class="vl-comments-list">
						<?php
							$args = array(
								'callback' => 'vinero_custom_comment',
								'type' => 'all',
							);
							wp_list_comments($args);
						?>
					</ul>

					<?php echo vinero_comment_pagination(); ?>

				<?php endif; ?>

				<?php if(!comments_open() && get_comments_number() && post_type_supports(get_post_type() , 'comments')): ?>

					<em class="comments-closed"><?php esc_html_e('Comments are closed.', 'vinero'); ?></em>

				<?php endif; ?>

			</div>
			<!--/.vl-comments-holder-->

		</div>

		<?php if (comments_open()): ?>

		<div class="col-md-6">

			<?php

				$commenter = wp_get_current_commenter();
				$args = array(
					'class_form' => 'vl-comment-form',
					'label_submit' => esc_html__('Post Comment', 'vinero') ,
					'title_reply' => esc_html__('Leave a comment', 'vinero') ,
					'title_reply_before' => '<h5 class="vl-comment-reply-title" id="reply-title">',
					'title_reply_after' => '</h5>',
					'cancel_reply_before' => '',
					'cancel_reply_after' => '',
					'title_reply_to' => esc_html__('Leave a reply to', 'vinero') . ' %s',
					'cancel_reply_link' => esc_html__('Cancel Reply', 'vinero'),
					'submit_button' => '<button type="submit" id="%2$s" class="%3$s">%4$s</button>',
					'class_submit' => 'vl-btn vl-btn-primary',
					'fields' => apply_filters('comment_form_default_fields', array(
						'author' => '<div class="row"><div class="col-md-6"><div class="vl-form-group"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" class="vl-form-control" placeholder="'.esc_attr__('Name', 'vinero').'"/></div></div>',
						'email' => '<div class="col-md-6"><div class="vl-form-group"><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" class="vl-form-control" placeholder="' . esc_attr__('E-mail', 'vinero') . '"></div></div></div>',
					)),
					'comment_field' => '<div class="vl-form-group"><textarea id="comment" name="comment" rows="8" class="vl-form-control" placeholder="' . esc_attr('Comment', 'vinero') . '"></textarea></div>',
				);
			?>

			<div class="vl-comment-form-holder">
				<?php comment_form($args); ?>
			</div>
			<!--/.vl-comments-form-holder-->

		</div>

		<?php  endif; ?>

	</div>

</div>
<!--/.vl-comments .vl-general-spacing .vl-main-padding-->

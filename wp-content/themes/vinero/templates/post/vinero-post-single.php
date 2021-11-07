
<article <?php post_class('vl-post-single'); ?> id="post-<?php the_ID(); ?>">

	<div class="row">
		<div class="col-md-10 offset-md-1">

			<div class="vl-post-content">

				<?php 

					the_content(); 
					wp_link_pages(array(
						'before'  => '<nav class="vl-page-navigation">',
						'after' => '</nav>',
						'next_or_number' => 'next',
						'nextpagelink' => '<i class="icon-Arrow-OutRight"></i>',
						'previouspagelink' => '<i class="icon-Arrow-OutLeft"></i>',
					));
					edit_post_link(esc_html__('Edit', 'vinero'), '<span class="edit-link">', '</span>');

				?>

					<div class="vl-post-footer">
						<div class="vl-post-share">
							<?php echo vinero_post_share_buttons(); ?>
						</div>
						<?php if(get_the_tags()): ?>
							<div class="vl-post-tags">
								<?php the_tags('', '', ''); ?>
							</div>
						<?php endif; ?>
					</div>
					<!--/.vl-post-footer-->
				


			</div>
			<!--/.vl-post-content-->

			<hr>


	


		</div>

	

	</div>


</article>
<!--/.vl-post-single-->



		<?php 

				if(comments_open()){
					comments_template();
				}

			?>


<div class="vl-content-empty">
	<?php if (is_home() && current_user_can('publish_posts')): ?>
		<h5><?php esc_html_e('No Content', 'vinero'); ?></h5>
		<p><?php printf(wp_kses(__('Ready to publish your first post? <a href="%1$s" class="vl-link reverse">Get started here</a>.', 'vinero'), array('a' => array('href' => array(), 'class' => array()))), esc_url(admin_url('post-new.php'))); ?></p>
	<?php elseif (is_search()): ?>
		<h5><?php esc_html_e('No Content', 'vinero'); ?></h5>
		<p><?php esc_html_e('Sorry, but nothing matched your search terms.', 'vinero'); ?></p>
	<?php elseif (is_404()): ?>
		<p><?php esc_html_e('We couldn`t find the page you were looking for.', 'vinero'); ?></p>
		<a class="vl-btn vl-btn-primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to Home', 'vinero'); ?></a>
	<?php else: ?>
		<h5><?php esc_html_e('No Content', 'vinero'); ?></h5>
		<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for.', 'vinero'); ?></p>
		<div class="vl-content-empty-input">
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</div>

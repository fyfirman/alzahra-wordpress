<div class="vl-postlist vl-postlist-minimal clearfix">

	<?php
		while (have_posts()) : the_post();
			get_template_part('templates/post/vinero-post-minimal', get_post_format());
		endwhile;
	?>

</div>
<!--/.vl-postlist .vl-postlist-minimal .clearfix-->


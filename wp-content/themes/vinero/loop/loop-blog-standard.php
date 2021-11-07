<div class="vl-postlist vl-postlist-standard cubeportfolio clearfix">

	<?php
		while (have_posts()) : the_post();
			get_template_part('templates/post/vinero-post', 'standard');
		endwhile;
	?>

</div>
<!--/.vl-postlist .vl-postlist-standard .cubeportfolio .clearfix-->


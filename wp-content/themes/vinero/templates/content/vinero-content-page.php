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


<?php


function vinero_load_more_btn($wp_query = null) {

	if($wp_query == null) {
		global $wp_query;
	} else {
		$wp_query = $wp_query;
	}

	$max = $wp_query->max_num_pages;
	$paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;

	wp_localize_script(
		'vl-custom-script',
		'load_more_btn',
		array(
			'startPage' => $paged,
			'maxPages' => $max,
			'nextLink' => next_posts($max, false),
			'loadMoreButtonNone' => esc_html__('No More Posts', 'vinero'),
			'loadMoreButtonText' => array(
				esc_html__('Stop', 'vinero'),
				esc_html__('Do not Click', 'vinero'),
				esc_html__('Nothing Here', 'vinero'),
				esc_html__('Hey?', 'vinero'),
				esc_html__('What?', 'vinero'),
				esc_html__('Are you Crazy?', 'vinero'),
				esc_html__('OMG', 'vinero'),
				esc_html__('Unbelievable', 'vinero'),
				esc_html__('Get Lost!', 'vinero'),
			)
		)
	);
}


function vinero_infinity_scroll($wp_query = null) {

    if($wp_query == null) {
        global $wp_query;
    } else {
        $wp_query = $wp_query;
    }

    $max = $wp_query->max_num_pages;

    wp_localize_script(
        'vl-custom-script',
        'infinity_scroll',
        array(
            'maxPages' => $max,
            'loadMore' => esc_html__('Loading...', 'vinero'),
            'loadMoreNone' => esc_html__('No more posts', 'vinero')
        )
    );
}



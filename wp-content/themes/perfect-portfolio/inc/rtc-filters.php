<?php
/**
 * Filter to modify functionality of RaraTheme Companion plugin.
 *
 * @package Perfect_Portfolio
 */

if( ! function_exists( 'perfect_portfolio_cta_section_bgcolor_filter' ) ){
	/**
	 * Filter to add bg color of cta section widget
	 */    
	function perfect_portfolio_cta_section_bgcolor_filter(){
		return '#05d584';
	}
}
add_filter( 'rrtc_cta_bg_color', 'perfect_portfolio_cta_section_bgcolor_filter' );

if( ! function_exists( 'perfect_portfolio_cta_btn_alignment_filter' ) ){
	/**
	 * Filter to add btn alignment of cta section widget
	 */    
	function perfect_portfolio_cta_btn_alignment_filter(){
		return 'centered';
	}
}
add_filter( 'rrtc_cta_btn_alignment', 'perfect_portfolio_cta_btn_alignment_filter' );

if( ! function_exists( 'perfect_portfolio_rara_portfolio_filter' ) ){
	/**
	 * Filter to add bg color of cta section widget
	 */    
	function perfect_portfolio_rara_portfolio_filter(){
		$posts = array(
			'rara-portfolio' => array( 
				'singular_name'		  => __( 'Portfolio', 'perfect-portfolio' ),
				'general_name'		  => __( 'Portfolios', 'perfect-portfolio' ),
				'dashicon'			  => 'dashicons-portfolio',
				'taxonomy'			  => 'rara_portfolio_categories',
				'taxonomy_slug'		  => 'portfolio-category',
				'has_archive'         => false,		
				'exclude_from_search' => false,
				'show_in_nav_menus'	  => true,
				'show_in_rest'   	  => true,
				'supports' 			  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
				'rewrite' 			  => array( 'slug' => 'portfolio' ),
				'hierarchical'		  => true
			),
		);
		return $posts;
	}
}
add_filter( 'rc_get_posttype_array', 'perfect_portfolio_rara_portfolio_filter' );


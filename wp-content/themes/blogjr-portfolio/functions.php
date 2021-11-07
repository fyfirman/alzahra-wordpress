<?php
/**
 * Theme functions and definitions
 *
 * @package blogjr_portfolio
 */ 


if ( ! function_exists( 'blogjr_portfolio_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function blogjr_portfolio_enqueue_styles() {
		wp_enqueue_style( 'blogjr-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'blogjr-portfolio-style', get_stylesheet_directory_uri() . '/style.css', array( 'blogjr-style-parent' ), '1.0.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'blogjr_portfolio_enqueue_styles', 99 );

function blogjr_portfolio_remove_action() {
	add_action( 'customize_register', 'blogjr_portfolio_remove_control' );
	add_action( 'customize_register', 'blogjr_portfolio_add_control' );
}
add_action( 'init', 'blogjr_portfolio_remove_action');

function blogjr_portfolio_remove_control( $wp_customize ) {
    $wp_customize->remove_control('blogjr_theme_options[blog_layout]');
    $wp_customize->remove_control('blogjr_theme_options[blog_column_type]');
}

function blogjr_portfolio_add_control( $wp_customize ) {

	$wp_customize->add_control( 'blogjr_theme_options[blog_layout]', array(
		'label'             => esc_html__( 'Layout', 'blogjr-portfolio' ),
		'section'           => 'blogjr_latest_blog_section',
		'type'				=> 'radio',
		'choices'			=> array( 
			'left-align' 		=> esc_html__( 'Left Align', 'blogjr-portfolio' ),
			'center-align' 		=> esc_html__( 'Center Align', 'blogjr-portfolio' ),
			'image-focus-dark' 		=> esc_html__( 'Image Focus Dark', 'blogjr-portfolio' ),
		),
	) );

	$wp_customize->add_control( 'blogjr_theme_options[blog_column_type]', array(
		'label'             => esc_html__( 'Column', 'blogjr-portfolio' ),
		'section'           => 'blogjr_latest_blog_section',
		'type'				=> 'radio',
		'choices'			=> array( 
			'column-1' 		=> esc_html__( 'One Column', 'blogjr-portfolio' ),
			'column-2' 		=> esc_html__( 'Two Column', 'blogjr-portfolio' ),
			'column-3' 		=> esc_html__( 'Three Column', 'blogjr-portfolio' ),
			'column-zigzag' => esc_html__( 'One Column ZigZag', 'blogjr-portfolio' ),
			'column-horizontal' => esc_html__( 'One Column Horizontal', 'blogjr-portfolio' ),
		),
	) );

}

if ( ! function_exists( 'blogjr_portfolio_theme_defaults' ) ) :
    /**
     * Customize theme defaults.
     *
     * @since 1.0.0
     *
     * @param array $defaults Theme defaults.
     * @param array Custom theme defaults.
     */
    function blogjr_portfolio_theme_defaults( $defaults ) {
        $defaults['enable_slider'] = false;
        $defaults['blog_column_type'] = 'column-3';
        $defaults['blog_layout'] = 'image-focus-dark';
        $defaults['show_date'] = false;
        $defaults['show_author'] = false;
        $defaults['show_read_time'] = false;

        return $defaults;
    }
endif;
add_filter( 'blogjr_default_theme_options', 'blogjr_portfolio_theme_defaults', 99 );


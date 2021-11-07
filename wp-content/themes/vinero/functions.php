<?php

define('VINERO_THEME_DIRECTORY', esc_url(trailingslashit(get_template_directory_uri())));
define('VINERO_REQUIRE_DIRECTORY', trailingslashit(get_template_directory()));
define('VINERO_DEVELOPMENT', false);


/*
 * After Init
 * */

function vinero_theme_setup(){
	load_theme_textdomain('vinero', VINERO_THEME_DIRECTORY . 'languages');
	register_nav_menus	(array(
		'primary-menu' => esc_html__('Primary Menu', 'vinero'),
		'footer-menu' => esc_html__('Footer Menu', 'vinero'),
	));
	add_image_size('vinero_xs_blog_4by3', 150, 113, true);
	add_image_size('vinero_sm_blog_4by3', 250, 188, true);
	add_image_size('vinero_md_square', 700, 700, true);
	add_image_size('vinero_fullheight_3col', 468, '', false);
	add_image_size('vinero_fullheight_2col', 700, '', false);
    add_image_size('vinero_standard_post', 920, '', false);
	add_image_size('vinero_fullsize', 1920, '', false);
	
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-slider');
	add_theme_support('menus');
	add_theme_support('title-tag');
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'vinero_theme_setup');


/*
 * Content width
 * */

function vinero_content_width() {
	$GLOBALS['content_width'] = apply_filters('vinero/content_width', 1140);
}

add_action('after_setup_theme', 'vinero_content_width');


/*
 * If devmode disabled
 * */

if(!VINERO_DEVELOPMENT) {
	add_filter('acf/settings/show_admin', '__return_false');
	require_once VINERO_REQUIRE_DIRECTORY . 'includes/helper/custom-fields/custom-fields.php';
}


/*
 * Save acf options to json files
 * */

function vinero_acf_save_json($path) {
	$path = VINERO_REQUIRE_DIRECTORY . 'includes/helper/custom-fields';
	return $path;
}

add_filter('acf/settings/save_json', 'vinero_acf_save_json');


/*
 * Load acf options from json files
 * */

function vinero_acf_load_json($paths) {
	unset($paths[0]);
	$paths[] = VINERO_REQUIRE_DIRECTORY . 'includes/helper/custom-fields';
	return $paths;
}

add_filter('acf/settings/load_json', 'vinero_acf_load_json');


/*
 * Dashboard
 * */

require_once VINERO_REQUIRE_DIRECTORY . 'admin/dashboard.php';


/*
 * Require Files
 * */

require_once VINERO_REQUIRE_DIRECTORY . 'includes/vlthemes-includes.php';
require_once VINERO_REQUIRE_DIRECTORY . 'includes/vlthemes-required-plugins.php';
require_once VINERO_REQUIRE_DIRECTORY . 'includes/vlthemes-enqueue.php';
require_once VINERO_REQUIRE_DIRECTORY . 'includes/vlthemes-functions.php';
require_once VINERO_REQUIRE_DIRECTORY . 'includes/vlthemes-actions.php';
require_once VINERO_REQUIRE_DIRECTORY . 'includes/vlthemes-filters.php';
require_once VINERO_REQUIRE_DIRECTORY . 'includes/vlthemes-menus.php';
require_once VINERO_REQUIRE_DIRECTORY . 'includes/vlthemes-woo.php';


<?php

/*
 * Required Plugins
 * */

remove_action('vc_activation_hook', 'vc_page_welcome_set_redirect');
remove_action('admin_init', 'vc_page_welcome_redirect');

function vinero_include_required_plugins() {
	$plugins = array(
		array(
			'name' => esc_html__('Kirki', 'vinero'),
			'slug' => 'kirki',
			'required' => true,
		),	
		array(
			'name' => esc_html__('Vinero Helper Plugin', 'vinero'),
			'slug' => 'vinero_portfolio_helper_plugin',
			'source' => esc_url('http://vlthemes.com/plugins/vinero_portfolio_helper_plugin.zip'),
			'required' => true,
		),
		array(
			'name' => esc_html__('Advanced Custom Fields PRO', 'vinero'),
			'slug' => 'acf_pro',
			'source' => esc_url('http://vlthemes.com/plugins/advanced-custom-fields-pro.zip'),
			'required' => true,
		),
        array(
		 	'name' => esc_html__('One Click Demo Import', 'vinero'),
		 	'slug' => 'one-click-demo-import',
		 	'required' => true,
        ),
		array(
			'name' => esc_html__('Slider Revolution', 'vinero'),
			'slug' => 'revslider',
			'source' => esc_url('http://vlthemes.com/plugins/revslider.zip'),
			'required' => false,
		),
		array(
			'name' => esc_html__('WPBakery Visual Composer', 'vinero'),
			'slug' => 'js_composer',
			'source' => esc_url('http://vlthemes.com/plugins/js_composer.zip'),
			'required' => false,
		),
		array(
			'name' => esc_html__('Envato Market', 'vinero'),
			'slug' => 'envato_market',
			'source' => esc_url('http://vlthemes.com/plugins/envato-market.zip'),
			'required' => false,
		),
		array(
			'name' => esc_html__('Contact Form 7', 'vinero'),
			'slug' => 'contact-form-7',
			'required' => false,
		),
	);


	tgmpa( $plugins );
}

add_action('tgmpa_register', 'vinero_include_required_plugins');



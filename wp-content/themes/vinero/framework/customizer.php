<?php

$theme_path_images = VINERO_THEME_DIRECTORY . 'assets/img/';

function vinero_social_icons(){
    $social_icons = array(
        'fa-heart' => 'Bloglovin',
        'fa-dribbble' => 'Dribbble',
        'fa-envelope' => 'Email',
        'fa-facebook' => 'Facebook',
        'fa-flickr' => 'Flickr',
        'fa-github' => 'GitHub',
        'fa-google-plus' => 'Google+',
        'fa-instagram' => 'Instagram',
        'fa-linkedin' => 'LinkedIn',
        'fa-pinterest' => 'Pinterest',
        'fa-rss' => 'RSS',
        'fa-stumbleupon' => 'Stumbleupon',
        'fa-tumblr' => 'Tumblr',
        'fa-twitter' => 'Twitter',
        'fa-vimeo-square' => 'Vimeo',
        'fa-youtube' => 'YouTube',
        'fa-vk' => 'Vkontakte',
    );
    return apply_filters('vinero/social_icons', $social_icons);
}


/*
 * Kirki config
 * */


Kirki::add_config('vinero_customize', array(
    'capability' => 'edit_theme_options',
    'option_type' => 'theme_mod',
));

function vinero_kirki_update_config($config) {
    $config['url_path'] = VINERO_THEME_DIRECTORY . 'framework/kirki';
    return $config;
}

add_filter('kirki/config', 'vinero_kirki_update_config');



$first_level = 10;
$second_level = 10;

/*
 * General
 * */

Kirki::add_panel('panel_general', array(
    'priority' => $first_level++,
    'title' => esc_html__('General', 'vinero'),
    'description' => esc_html__('General Settings', 'vinero'),
));

Kirki::add_section('section_general', array(
    'title' => esc_html__('General', 'vinero'),
    'panel' => 'panel_general',
    'priority' => $second_level++,
));

Kirki::add_section('general_preloader', array(
    'title' => esc_html__('Preloader', 'vinero'),
    'panel' => 'panel_general',
    'priority' => $second_level++,
));

Kirki::add_section('general_selection', array(
    'title' => esc_html__('Selection', 'vinero'),
    'panel' => 'panel_general',
    'priority' => $second_level++,
));

Kirki::add_section('general_scrollbar', array(
    'title' => esc_html__('Scrollbar', 'vinero'),
    'panel' => 'panel_general',
    'priority' => $second_level++,
));

Kirki::add_section('general_site_border', array(
    'title' => esc_html__('Site Border', 'vinero'),
    'panel' => 'panel_general',
    'priority' => $second_level++,
));

Kirki::add_section('general_login_logo', array(
    'title' => esc_html__('Login', 'vinero'),
    'panel' => 'panel_general',
    'priority' => $second_level++,
));

require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-general.php';


/*
 * Header
 * */

Kirki::add_panel('panel_header', array(
    'priority' => $first_level++,
    'title' => esc_html__('Header & Menu', 'vinero'),
));


Kirki::add_section('section_header_general', array(
    'title' => esc_html__('General', 'vinero'),
    'panel' => 'panel_header',
    'priority' => $second_level++,
));

Kirki::add_section('section_navbar', array(
    'title' => esc_html__('Menu Settings', 'vinero'),
    'panel' => 'panel_header',
    'priority' => $second_level++,
));

Kirki::add_section('section_navbar_social', array(
    'title' => esc_html__('Socials', 'vinero'),
    'panel' => 'panel_header',
    'priority' => $second_level++,
));

require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-header.php';


/*
 * Sidebar
 * */

Kirki::add_section('section_sidebar', array(
    'title' => esc_html__('Sidebar', 'vinero'),
    'priority' => $first_level++,
    'theme_supports' => 'fa fa-fw fa-list-alt'
));

require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-sidebar.php';



/*
 * Pages
 * */

Kirki::add_panel('panel_page', array(
    'priority' => $first_level++,
    'title' => esc_html__('Pages', 'vinero'),
));

Kirki::add_section('section_blog', array(
    'title' => esc_html__('Blog', 'vinero'),
    'panel' => 'panel_page',
    'priority' => $second_level++,
));

Kirki::add_section('section_archive', array(
    'title' => esc_html__('Archive', 'vinero'),
    'panel' => 'panel_page',
    'priority' => $second_level++,
));

Kirki::add_section('section_search', array(
    'title' => esc_html__('Search', 'vinero'),
    'panel' => 'panel_page',
    'priority' => $second_level++,
));

Kirki::add_section('section_singlepost', array(
    'title' => esc_html__('Single Post', 'vinero'),
    'panel' => 'panel_page',
    'priority' => $second_level++,
));

Kirki::add_section('section_error', array(
    'title' => esc_html__('Error 404', 'vinero'),
    'panel' => 'panel_page',
    'priority' => $second_level++,
));

require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-pages.php';

/*
 * Single Portfolio
 * */

Kirki::add_section('section_singleportfolio', array(
    'title' => esc_html__('Single Portfolio', 'vinero'),
    'panel' => '',
    'priority' => $first_level++,
));

require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-single-portfolio.php';

/*
 * WooCommerce
 * */

if(class_exists('WooCommerce')){

    Kirki::add_section('section_woo', array(
        'title' => esc_html__('WooCommerce', 'vinero'),
        'panel' => '',
        'priority' => $first_level++,
    ));

    require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-woo.php';

}


/*
 * Footer
 * */


Kirki::add_section('section_footer_general', array(
    'title' => esc_html__('Footer', 'vinero'),
    'panel' => '',
    'priority' => $first_level++,
));

require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-footer.php';

/*
 * Elements
 * */

Kirki::add_panel('panel_elements', array(
    'priority' => $first_level++,
    'title' => esc_html__('Elements', 'vinero'),
));

Kirki::add_section('elements_blockquote', array(
    'title' => esc_html__('Blockquote', 'vinero'),
    'panel' => 'panel_elements',
    'priority' => $second_level++,
));

Kirki::add_section('elements_buttons', array(
    'title' => esc_html__('Buttons', 'vinero'),
    'panel' => 'panel_elements',
    'priority' => $second_level++,
));

Kirki::add_section('elements_input_fields', array(
    'title' => esc_html__('Input Fields', 'vinero'),
    'panel' => 'panel_elements',
    'priority' => $second_level++,
));

require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-elements.php';


/*
 * Typography
 * */

Kirki::add_panel('panel_typography', array(
    'priority' => $first_level++,
    'title' => esc_html__('Typography', 'vinero'),
    'description' => esc_html__('Typography Settings', 'vinero'),
));

Kirki::add_section('typography_text', array(
    'title' => esc_html__('Text', 'vinero'),
    'panel' => 'panel_typography',
    'priority' => $second_level++,
));


Kirki::add_section('typography_headings', array(
    'title' => esc_html__('Headings', 'vinero'),
    'panel' => 'panel_typography',
    'priority' => $second_level++,
));

require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-typography.php';


/*
 * Typekit
 * */

Kirki::add_section('section_typekit', array(
    'title' => esc_html__('Adobe Typekit', 'vinero'),
    'priority' => $first_level++,
));

require_once VINERO_REQUIRE_DIRECTORY . 'framework/setup/vinero-section-typekit.php';


/*
 * Load all font variants
 * */


function vinero_font_add_all_variants() {
    if (class_exists('Kirki_Fonts_Google')) {
        Kirki_Fonts_Google::$force_load_all_variants = true;
        Kirki_Fonts_Google::$force_load_all_subsets = true;
    }
}

add_action('after_setup_theme', 'vinero_font_add_all_variants');


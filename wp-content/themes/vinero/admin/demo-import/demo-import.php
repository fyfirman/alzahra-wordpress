<?php

function vinero_demo_import() {

	$data_url = get_template_directory() . VLThemesDashboard::DASHBOARD_DIRECTORY . 'demo-import/';
	return array(
	    array(
	        'import_file_name' => esc_html__('Demo Default', 'vinero'),
	        'local_import_file' => $data_url . 'demo-content.xml',
	        'local_import_widget_file' => $data_url . 'widgets.json',
	        'local_import_customizer_file' => $data_url . 'customizer1.dat',
	        'import_preview_image_url' => ''
	    )
	);

}

add_filter('pt-ocdi/import_files', 'vinero_demo_import');


function vinero_demo_after_import() {

	$primary_menu = get_term_by('name', 'Primary Menu', 'nav_menu');
	$footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');

	set_theme_mod('nav_menu_locations', array(
		'primary-menu' => $primary_menu->term_id,
		'footer-menu' => $footer_menu->term_id,
	));

	$front_page_id = get_page_by_title('Landing');
	update_option('show_on_front', 'page');
	update_option('page_on_front', $front_page_id->ID);

}

add_action('pt-ocdi/after_import', 'vinero_demo_after_import');


function vinero_demo_setup($default_settings) {
	$default_settings['page_title'] = esc_html__('One Click Demo Import', 'vinero');
	$default_settings['menu_title'] = esc_html__('Import Demo', 'vinero');
	$default_settings['menu_slug'] = vinero_dashboard()->demoimportslug;
	return $default_settings;
}

add_filter('pt-ocdi/plugin_page_setup', 'vinero_demo_setup');

add_filter('pt-ocdi/disable_pt_branding', '__return_true');

<?php

/*
 * Section Woo
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
	'type' => 'text',
	'settings' => 'shop_title',
	'label' => esc_html__('Shop Title', 'vinero'),
    'description' => esc_html__('Title for shop page', 'vinero'),
	'section' => 'section_woo',
	'default' => esc_html__('Online Store', 'vinero'),
    'transport' => 'auto',
	'priority' => $priority++,
));

Kirki::add_field('vinero_customize', array(
	'type' => 'textarea',
	'settings' => 'shop_subtitle',
	'label' => esc_html__('Shop Subtitle', 'vinero'),
    'description' => esc_html__('Subtitle for shop page', 'vinero'),
	'section' => 'section_woo',
	'default' => esc_html__('There are some things money can\'t buy.'
        , 'vinero'),
    'transport' => 'auto',
	'priority' => $priority++,
));

Kirki::add_field('vinero_customize', array(
    'type' => 'image',
    'settings' => 'shop_bg',
    'label' => esc_html__('Shop Background Image', 'vinero'),
    'section' => 'section_woo',
    'default' => $theme_path_images . 'index.jpg',
    'priority' => $priority++,
    'transport' => 'auto',
));

Kirki::add_field('vinero_customize', array(
	'type' => 'number',
	'settings' => 'shop_max_products',
	'label' => esc_html__('The number of products displayed', 'vinero'),
    'description' => esc_html__('Maximum products per page', 'vinero'),
	'section' => 'section_woo',
	'default' => '6',
    'transport' => 'auto',
	'priority' => $priority++,
));


Kirki::add_field('vinero_customize', array(
	'type' => 'select',
	'settings' => 'shop_type_pagination',
    'label' => esc_html__('Type Pagination', 'vinero'),
    'description' => esc_html__('Select the type of navigation below', 'vinero'),
	'section' => 'section_woo',
    'default' => 'infinite',
    'transport' => 'auto',
    'priority' => $priority++,
    'choices' => array(
        'none' => esc_html__('None', 'vinero'),
        'buttons' => esc_html__('Prev/Next buttons', 'vinero'),
        'numeric' => esc_html__('Numeric', 'vinero'),
        'ajax' => esc_html__('Load More Button', 'vinero'),
        'infinite' => esc_html__('Infinite Scroll', 'vinero')
    )
) );


Kirki::add_field('vinero_customize', array(
    'type' => 'number',
    'settings' => 'shop_gutter',
    'label' => esc_html__('Gutter between products', 'vinero'),
    'section' => 'section_woo',
    'default' => 30,
    'transport' => 'auto',
    'priority' => $priority++,
    'choices' => array(
        'min' => 0,
        'max' => 100,
        'step' => 5,
    ),
));


Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'shop_catalog_mode',
    'label' => esc_html__('Catalog Mode', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to show sidebar', 'vinero'),
    'section' => 'section_woo',
    'default' => '0',
    'transport' => 'auto',
    'priority' => $priority++,
    'choices' => array(
        'on'  => esc_html__('Enable', 'vinero'),
        'off' => esc_html__('Disable', 'vinero')
    )
));


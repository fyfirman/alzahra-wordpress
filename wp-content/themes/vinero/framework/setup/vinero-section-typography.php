<?php


/*
 * Headings
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
	'type' => 'typography',
	'settings' => 'h1_typography',
	'label' => esc_html__('H1 Typography', 'vinero'),
	'section' => 'typography_headings',
	'priority' => $priority++,
    'transport' => 'auto',
	'default' => array(
		'font-family' => 'Source Sans Pro',
		'variant' => '700',
		'font-size' => '40px',
		'line-height' => '1.9',
        'letter-spacing' => '',
		'color' => '#000000',
		'text-transform' => 'none'
	),
	'output' => array(
        array(
            'element' => 'h1, .h1'
        )
	)
));

Kirki::add_field('vinero_customize', array(
	'type' => 'typography',
	'settings' => 'h2_typography',
	'label' => esc_html__('H2 Typography', 'vinero'),
	'section' => 'typography_headings',
	'priority' => $priority++,
    'transport' => 'auto',
	'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => '700',
        'font-size' => '34px',
        'line-height' => '1.9',
        'letter-spacing' => '',
        'color' => '#000000',
        'text-transform' => 'none'
	),
    'output' => array(
        array(
            'element' => 'h2, .h2'
        )
    )
));

Kirki::add_field('vinero_customize', array(
	'type' => 'typography',
	'settings' => 'h3_typography',
	'label' => esc_html__('H3 Typography', 'vinero'),
	'section' => 'typography_headings',
	'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => '700',
        'font-size' => '24px',
        'line-height' => '1.9',
        'letter-spacing' => '',
        'color' => '#000000',
        'text-transform' => 'none'
    ),
    'output' => array(
        array(
            'element' => 'h3, .h3'
        )
    )
));


Kirki::add_field('vinero_customize', array(
	'type' => 'typography',
	'settings' => 'h4_typography',
	'label' => esc_html__('H4 Typography', 'vinero'),
	'section' => 'typography_headings',
	'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => '700',
        'font-size' => '22px',
        'line-height' => '1.9',
        'letter-spacing' => '',
        'color' => '#000000',
        'text-transform' => 'none'
    ),
    'output' => array(
        array(
            'element' => 'h4, .h4'
        )
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'typography',
    'settings' => 'h5_typography',
    'label' => esc_html__('H5 Typography', 'vinero'),
    'section' => 'typography_headings',
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => '700',
        'font-size' => '18px',
        'line-height' => '1.9',
        'letter-spacing' => '',
        'color' => '#000000',
        'text-transform' => 'none'
    ),
    'output' => array(
        array(
            'element' => 'h5, .h5'
        )
    )
));

Kirki::add_field('vinero_customize', array(
	'type' => 'typography',
	'settings' => 'h6_typography',
	'label' => esc_html__('H6 Typography', 'vinero'),
	'section' => 'typography_headings',
	'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => '700',
        'font-size' => '16px',
        'line-height' => '1.9',
        'letter-spacing' => '',
        'color' => '#000000',
        'text-transform' => 'none'
    ),
    'output' => array(
        array(
            'element' => 'h6, .h6'
        )
    )
));




/*
 * Text Typography
 * */


$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'typography',
    'settings' => 'text_typography',
    'label' => esc_html__('Text Typography', 'vinero'),
    'section' => 'typography_text',
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => 'regular',
        'font-size' => '15px',
        'line-height' => '1.9',
        'letter-spacing' => '',
        'color' => '#555555',
        'text-transform' => 'none'
    ),
    'output' => array(
        array(
            'element' => 'body'
        )
    )
));


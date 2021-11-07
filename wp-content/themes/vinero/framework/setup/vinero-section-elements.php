<?php


/*
 * Blockquote
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'typography',
    'settings' => 'blockquote_typography',
    'label' => esc_html__('Blockquote Typography', 'vinero'),
    'section' => 'elements_blockquote',
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Droid Serif',
        'variant' => 'italic',
        'font-size' => '18px',
        'line-height' => '1.9',
        'letter-spacing' => '0',
        'color' => '#000000',
        'text-transform' => 'none'
    ),
    'output' => array(
        array(
            'element' => 'blockquote'
        )
    )
));



/*
 * Buttons
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'typography',
    'settings' => 'typography_button',
    'label' => esc_html__('Button Typography', 'vinero'),
    'section' => 'elements_buttons',
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => '700',
        'font-size' => '15px',
        'line-height' => '1.9',
        'letter-spacing' => '0.03em',
        'text-transform' => 'none'
    ),
    'output' => array(
        array(
            'element' => '.vl-btn'
        )
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'multicolor',
    'settings' => 'primary_button',
    'label' => esc_html__('Primary Button', 'vinero'),
    'section' => 'elements_buttons',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'color' => esc_html__('Color', 'vinero'),
        'background-color' => esc_html__('Background', 'vinero'),
    ),
    'default' => array(
        'color' => '#ffffff',
        'background' => '#000000',
    ),
    'output' => array(
        array(
            'choice' => 'color',
            'element' => '.vl-btn-primary',
            'property' => 'color',
        ),
        array(
            'choice' => 'background',
            'element' => '.vl-btn-primary',
            'property' => 'background-color',
        ),
    ),
));


Kirki::add_field('vinero_customize', array(
    'type' => 'multicolor',
    'settings' => 'primary_button_hover',
    'label' => esc_html__('Primary Button Hover', 'vinero'),
    'section' => 'elements_buttons',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'color' => esc_html__('Color', 'vinero'),
        'background-color' => esc_html__('Background', 'vinero'),
    ),
    'default' => array(
        'color' => '#ffffff',
        'background' => '#333333',
    ),
    'output' => array(
        array(
            'choice' => 'color',
            'element' => '.vl-btn-primary:hover',
            'property' => 'color',
        ),
        array(
            'choice' => 'background',
            'element' => '.vl-btn-primary:hover',
            'property' => 'background-color',
        ),
    ),
));


Kirki::add_field('vinero_customize', array(
    'type' => 'multicolor',
    'settings' => 'secondary_button',
    'label' => esc_html__('Secondary Button', 'vinero'),
    'section' => 'elements_buttons',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'color' => esc_html__('Color', 'vinero'),
        'background' => esc_html__('Background', 'vinero'),
    ),
    'default' => array(
        'color' => '#000000',
        'background-color' => '#efefef',
    ),
    'output' => array(
        array(
            'choice' => 'color',
            'element' => '.vl-btn-secondary',
            'property' => 'color',
        ),
        array(
            'choice' => 'background',
            'element' => '.vl-btn-secondary',
            'property' => 'background-color',
        ),
    ),
));


Kirki::add_field('vinero_customize', array(
    'type' => 'multicolor',
    'settings' => 'secondary_button_hover',
    'label' => esc_html__('Secondary Button Hover', 'vinero'),
    'section' => 'elements_buttons',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'color' => esc_html__('Color', 'vinero'),
        'background' => esc_html__('Background', 'vinero'),
    ),
    'default' => array(
        'color' => '#ffffff',
        'background-color' => '#000000',
    ),
    'output' => array(
        array(
            'choice' => 'color',
            'element' => '.vl-btn-secondary:hover',
            'property' => 'color',
        ),
        array(
            'choice' => 'background',
            'element' => '.vl-btn-secondary:hover',
            'property' => 'background-color',
        ),
    ),
));



/*
 * Input
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'typography',
    'settings' => 'typography_input',
    'label' => esc_html__('Input Typography', 'vinero'),
    'section' => 'elements_input_fields',
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => 'regular',
        'font-size' => '15px',
        'letter-spacing' => '0.03em',
        'line-height' => '1.9',
        'color' => '#000000',
        'text-transform' => 'none'
    ),
    'output' => array(
        array(
            'element' => 'input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="url"], input[type="search"], input[type="number"], textarea, select, .select2-container .select2-selection--single'
        )
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'typography',
    'settings' => 'typography_label',
    'label' => esc_html__('Label Typography', 'vinero'),
    'section' => 'elements_input_fields',
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => 'regular',
        'font-size' => '15px',
        'line-height' => '1.5',
        'color' => '#000000',
        'letter-spacing' => '0.03em',
        'text-transform' => 'none'
    ),
    'output' => array(
        array(
            'element' => 'label'
        )
    )
));
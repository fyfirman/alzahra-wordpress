<?php

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'typography',
    'settings' => 'typography_widget_title',
    'label' => esc_html__('Widget Title Typography', 'vinero'),
    'section' => 'section_sidebar',
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => array(
        'font-family' => 'Source Sans Pro',
        'variant' => '700',
        'font-size' => '15px',
        'line-height' => '1.9',
        'letter-spacing' => '0.03em',
        'color' => '#000000',
        'text-transform' => 'uppercase'
    ),
    'output' => array(
        array(
            'element' => '.vl-widget-title'
        )
    )
));

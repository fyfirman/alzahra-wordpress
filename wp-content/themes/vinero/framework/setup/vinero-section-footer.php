<?php

/*
 * Footer General
 * */

$priority = 0;



Kirki::add_field('vinero_customize', array(
    'type' => 'select',
    'settings' => 'footer_layout',
    'label' => esc_html__('Footer Layout', 'vinero'),
    'description' => esc_html__('Select footer layout', 'vinero'),
    'section' => 'section_footer_general',
    'default' => 'minimal',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'standard' => esc_html__('Standard', 'vinero'),
        'minimal' => esc_html__('Minimal', 'vinero'),
    ),
));


Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'footer_fixed',
    'label' => esc_html__('Fixed Footer', 'vinero'),
    'description' => esc_html__('Switch "Enable" if you want to activate fixed effect', 'vinero'),
    'section' => 'section_footer_general',
    'default' => '1',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__('Enable', 'vinero'),
        'off' => esc_html__('Disable', 'vinero')
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'color',
    'settings' => 'footer_bg',
    'label' => esc_html__('Footer Background', 'vinero'),
    'description' => esc_html__('Select background color for footer', 'vinero'),
    'section' => 'section_footer_general',
    'default' => '#efefef',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'alpha' => false
    ),
    'output' => array(
        array(
            'element' => '.vl-footer-inner',
            'property' => 'background-color'
        )
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'footer_logo',
    'label' => esc_html__('Show Logo', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to show logo', 'vinero'),
    'section' => 'section_footer_general',
    'default' => '1',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    ),
    'active_callback' => array(
        array(
            'setting' => 'footer_layout',
            'operator' => '==',
            'value' => 'minimal'
        )
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'radio',
    'settings' => 'footer_columns',
    'label' => esc_html__('Widget Columns', 'vinero'),
    'description' => esc_html__('Select number of columns', 'vinero'),
    'section' => 'section_footer_general',
    'default' => '4',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        '1' => esc_html__('One Column', 'vinero'),
        '2' => esc_html__('Two Columns', 'vinero'),
        '3' => esc_html__('Three Columns', 'vinero'),
        '4' => esc_html__('Four Columns', 'vinero'),
    ),
    'active_callback' => array(
        array(
            'setting' => 'footer_layout',
            'operator' => '==',
            'value' => 'standard'
        )
    )
));


Kirki::add_field( 'vinero_customize', array(
    'type' => 'textarea',
    'settings' => 'footer_copyright',
    'label' => esc_html__('Copyright', 'vinero'),
    'section' => 'section_footer_general',
    'default' => 'Copyright &copy; 2017 Vinero. Powered by <a href="#" class="vl-link reverse">VLThemes</a>',
    'priority' => $priority++,
    'transport' => 'auto',
    'sanitize_callback' => 'wp_kses_post',
));

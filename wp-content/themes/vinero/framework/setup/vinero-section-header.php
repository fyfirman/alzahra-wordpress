<?php

/*
 * Navbar General
 * */

$priority = 0;


Kirki::add_field('vinero_customize', array(
    'type' => 'select',
    'settings' => 'header_layout',
    'label' => esc_html__('Header Layout', 'vinero'),
    'description' => esc_html__('Select header layout', 'vinero'),
    'section' => 'section_header_general',
    'default' => 'fullscreen',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'standard' => esc_html__('Standard', 'vinero'),
        'fullscreen' => esc_html__('Fullscreen', 'vinero'),
        'aside' => esc_html__('Aside', 'vinero'),
    ),
));




Kirki::add_field('vinero_customize', array(
    'type' => 'image',
    'settings' => 'header_logo',
    'label' => esc_html__('Navbar Logo', 'vinero'),
    'description' => esc_html__('Choose a logo image to display for "Navbar"', 'vinero'),
    'section' => 'section_header_general',
    'default' => $theme_path_images . 'logo.png',
    'transport' => 'auto',
    'priority' => $priority++,
));

Kirki::add_field( 'vinero_customize', array(
    'type'        => 'dimension',
    'settings'    => 'header_height',
    'label'       => esc_html__( 'Logo Height', 'vinero' ),
    'section'     => 'section_header_general',
    'default' => '13px',
    'transport' => 'auto',
    'priority' => $priority++,
) );

Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'header_fixed',
    'label' => esc_html__('Fixed Header', 'vinero'),
    'description' => esc_html__('Switch "Enable" if you want to activate fixed effect', 'vinero'),
    'section' => 'section_header_general',
    'default' => '1',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__('Enable', 'vinero'),
        'off' => esc_html__('Disable', 'vinero')
    )
));

Kirki::add_field('vinero_customize', array(
    'type' => 'select',
    'settings' => 'header_position',
    'label' => esc_html__('Header Position', 'vinero'),
    'description' => esc_html__('Select header position', 'vinero'),
    'section' => 'section_header_general',
    'default' => 'fixed',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'fixed' => esc_html__('Fixed', 'vinero'),
        'static' => esc_html__('Static', 'vinero'),
    ),
    'active_callback' => array(
        array(
            'setting' => 'header_fixed',
            'operator' => '!=',
            'value' => '1'
        ),
    )
));

/*
 * Navbar Social
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'navbar_show_social',
    'label' => esc_html__('Show Social', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to display "Social Lists"', 'vinero'),
    'section' => 'section_navbar_social',
    'default' => '0',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    ),
));

Kirki::add_field('vinero_customize', array(
    'type' => 'repeater',
    'label' => esc_html__('Social List', 'vinero'),
    'description' => esc_html__('Here you can add social icon and url', 'vinero'),
    'settings' => 'navbar_socials',
    'priority' => $priority++,
    'transport' => 'auto',
    'section' => 'section_navbar_social',
    'row_label' => array(
        'type' => 'text',
        'value' => esc_html__('Social Link', 'vinero'),
    ),
    'default' => '',
    'fields' => array(
        'navbar_social_icon' => array(
            'type' => 'select',
            'label' => esc_html__('Icon', 'vinero'),
            'choices' => vinero_social_icons()
        ),
        'navbar_social_url' => array(
            'type' => 'text',
            'label' => esc_html__('Social URL', 'vinero'),
        ),
        'navbar_social_name' => array(
            'type' => 'text',
            'label' => esc_html__('Social Name', 'vinero'),
        )
    ),
    'active_callback' => array(
        array(
            'setting' => 'navbar_show_social',
            'operator' => '==',
            'value' => '1'
        ),
    )
));

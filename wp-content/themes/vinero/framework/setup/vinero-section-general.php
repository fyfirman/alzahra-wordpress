<?php

/*
 * General Settings
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'show_back_to_top',
    'label' => esc_html__('Show "Back to top" button', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to show "Back to Top" button', 'vinero'),
    'section' => 'section_general',
    'default' => '1',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    )
));

/*
 * Site preloader
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'show_preloader',
    'label' => esc_html__('Show Preloader', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to show preloader', 'vinero'),
    'section' => 'general_preloader',
    'default' => '1',
    'priority' => $priority++,
    'transport' => 'postMessage',
    'choices' => array(
        'on'  => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    )
));


/*
 * Selection
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'color',
    'settings' => 'selection_color',
    'label' => esc_html__('Selection Text Color', 'vinero'),
    'description' => esc_html__('Select the text color, matches the portion of an element that is selected by a user', 'vinero'),
    'section' => 'general_selection',
    'default' => '#ffffff',
    'priority' => $priority++,
    'choices' => array(
        'alpha' => false,
    ),
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '::selection',
            'property' => 'color',
            'suffix' => '!important',
        ),
        array(
            'element' => '::-moz-selection',
            'property' => 'color',
            'suffix' => '!important',
        )
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'color',
    'settings' => 'selection_background_color',
    'label' => esc_html__('Selection Background Color', 'vinero'),
    'description' => esc_html__('Select the text background color, matches the portion of an element that is selected by a user', 'vinero'),
    'section' => 'general_selection',
    'default' => '#000000',
    'priority' => $priority++,
    'choices' => array(
        'alpha' => false,
    ),
    'transport' => 'auto',
    'output' => array(
        array(
            'element' => '::selection',
            'property' => 'background-color',
            'suffix' => '!important',
        ),
        array(
            'element' => '::-moz-selection',
            'property' => 'background-color',
            'suffix' => '!important',
        )
    )
));


/*
 * Login Logo
 * */

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'image',
    'settings' => 'login_logo_image',
    'label' => esc_html__('Authorization Logo', 'vinero'),
    'description' => esc_html__('If you want to change the logo of WordPress to your logo, you can use this options', 'vinero'),
    'section' => 'general_login_logo',
    'default' => $theme_path_images . 'vlthemes.png',
    'transport' => 'postMessage',
    'priority' => $priority++
));

Kirki::add_field('vinero_customize', array(
    'type' => 'dimension',
    'settings' => 'login_logo_image_height',
    'label' => esc_html__('Logo Height', 'vinero'),
    'description' => esc_html__('Enter logo height', 'vinero'),
    'section' => 'general_login_logo',
    'default' => '115px',
    'transport' => 'postMessage',
    'priority' => $priority++,
    'active_callback' => array(
        array(
            'setting' => 'login_logo_image',
            'operator' => '!=',
            'value' => ''
        )
    )
));

Kirki::add_field('vinero_customize', array(
    'type' => 'dimension',
    'settings' => 'login_logo_image_width',
    'label' => esc_html__('Logo Width', 'vinero'),
    'description' => esc_html__('Enter logo width', 'vinero'),
    'section' => 'general_login_logo',
    'default' => '102px',
    'transport' => 'postMessage',
    'priority' => $priority++,
    'active_callback' => array(
        array(
            'setting' => 'login_logo_image',
            'operator' => '!=',
            'value' => ''
        )
    )
));

/*
 * Scrollbar
 * */

$priority = 0;


Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'custom_scrollbar',
    'label' => esc_html__('Custom Scrollbar', 'vinero'),
    'description' => esc_html__('Switch "YES" if you want to configure the scrollbar', 'vinero'),
    'section' => 'general_scrollbar',
    'default' => '0',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__('Yes', 'vinero'),
        'off' => esc_html__('No', 'vinero')
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'color',
    'settings' => 'custom_scrollbar_bg',
    'label' => esc_html__('Bar Background', 'vinero'),
    'description' => esc_html__('Select background color for scrollbar', 'vinero'),
    'section' => 'general_scrollbar',
    'default' => '#dddddd',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'alpha' => false
    ),
    'output' => array(
        array(
            'element' => '.vl-custom-scrollbar ::-webkit-scrollbar',
            'property' => 'background'
        )
    ),
    'active_callback' => array(
        array(
            'setting' => 'custom_scrollbar',
            'operator' => '==',
            'value' => '1'
        )
    )
));

Kirki::add_field('vinero_customize', array(
    'type' => 'color',
    'settings' => 'custom_scrollbar_color',
    'label' => esc_html__('Bar Color', 'vinero'),
    'description' => esc_html__('Select color for scrollbar', 'vinero'),
    'section' => 'general_scrollbar',
    'default' => '#000000',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'alpha' => false
    ),
    'output' => array(
        array(
            'element' => '.vl-custom-scrollbar ::-webkit-scrollbar-thumb',
            'property' => 'background'
        )
    ),
    'active_callback' => array(
        array(
            'setting' => 'custom_scrollbar',
            'operator' => '==',
            'value' => '1'
        )
    )
));



Kirki::add_field('vinero_customize', array(
    'type' => 'slider',
    'settings' => 'custom_scrollbar_width',
    'label' => esc_html__('Bar Width', 'vinero'),
    'description' => esc_html__('Select the thickness of the scrollbar', 'vinero'),
    'section' => 'general_scrollbar',
    'priority' => $priority++,
    'transport' => 'auto',
    'default' => 8,
    'choices' => array(
        'min' => '0',
        'max' => '16',
        'step' => '2',
    ),
    'output' => array(
        array(
            'element' => '.vl-custom-scrollbar ::-webkit-scrollbar',
            'property' => 'width',
            'units' => 'px',
        )
    ),
    'active_callback' => array(
        array(
            'setting' => 'custom_scrollbar',
            'operator' => '==',
            'value' => '1'
        )
    )
));



/*
 * Site Border
 * */

$priority = 0;


Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'show_site_border',
    'label' => esc_html__('Show Border', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to customize the display of the border', 'vinero'),
    'section' => 'general_site_border',
    'default' => '0',
    'priority' => $priority++,
    'choices' => array(
        'on'  => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'color',
    'settings' => 'site_border_color',
    'label' => esc_html__('Border Color', 'vinero'),
    'description' => esc_html__('Choose the color of the border', 'vinero'),
    'section' => 'general_site_border',
    'default' => '#000000',
    'priority' => $priority++,
    'alpha' => false,
    'output' => array(
        array(
            'element' => '.vl-site-border',
            'property' => 'border-color'
        )
    ),
    'active_callback' => array(
        array(
            'setting' => 'show_site_border',
            'operator' => '==',
            'value' => '1'
        )
    )
));

Kirki::add_field( 'vinero_customize', array(
    'type'        => 'dimension',
    'settings'    => 'site_border_width',
    'label' => esc_html__('Border Width', 'vinero'),
    'description' => esc_html__('Enter the thickness of the border (in px)', 'vinero'),
    'section'     => 'general_site_border',
    'default'     => '15',
    'transport' => 'auto',
    'priority' => $priority++,
    'output' => array(
        array(
            'element' => '.vl-site-border',
            'property' => 'border-width',
            'units' => 'px',
        ),
        array(
            'element' => '.vl-site-bordered',
            'property' => 'padding',
            'units' => 'px',
        ),
        array(
            'element' => '.vl-header-holder',
            'property' => 'top',
            'units' => 'px',
            'suffix' => '!important'
        ),
        array(
            'element' => '.vl-footer-holder',
            'property' => 'bottom',
            'units' => 'px',
            'suffix' => '!important'
        ),
        array(
            'element' => '.vl-footer-holder, .vl-header-holder',
            'property' => 'left',
            'units' => 'px',
            'suffix' => '!important'
        ),
        array(
            'element' => '.vl-footer-holder, .vl-header-holder',
            'property' => 'right',
            'units' => 'px',
            'suffix' => '!important'
        ),
    ),
    'active_callback' => array(
        array(
            'setting' => 'show_site_border',
            'operator' => '==',
            'value' => '1'
        )
    )
) );

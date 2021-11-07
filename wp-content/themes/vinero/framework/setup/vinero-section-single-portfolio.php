<?php

/*
 * Single Post
 * */

$priority = 0;


Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'singleportfolio_navigation',
    'label' => esc_html__('Show navigation', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to show navigation', 'vinero'),
    'section' => 'section_singleportfolio',
    'default' => '1',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    )
));
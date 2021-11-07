<?php

/*
* Typekit Settings
* */

$priority = 0;

Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'enable_typekit',
    'label' => esc_html__('Enable Typekit', 'vinero') ,
    'section' => 'section_typekit',
    'default' => '0',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on'  => esc_html__('Enable', 'vinero'),
        'off' => esc_html__('Disable', 'vinero')
    )
));

Kirki::add_field('vinero_customize', array(
    'type' => 'text',
    'settings' => 'typekit_id',
    'label' => esc_html__('Typekit ID', 'vinero') ,
    'section' => 'section_typekit',
    'default' => '',
    'priority' => $priority++,
    'transport' => 'auto',
    'active_callback' => array(
        array(
            'setting' => 'enable_typekit',
            'operator' => '==',
            'value' => '1',
        )
    )
));
Kirki::add_field('vinero_customize', array(
    'type' => 'repeater',
    'label' => esc_html__('Typekit Fonts', 'vinero') ,
    'description' => esc_html__('Here you can add typekit fonts', 'vinero') ,
    'settings' => 'typekit_fonts',
    'priority' => $priority++,
    'transport' => 'auto',
    'section' => 'section_typekit',
    'row_label' => array(
        'type' => 'text',
        'value' => esc_html__('Typekit Font', 'vinero') ,
    ),
    'default' => '',
    'fields' => array(
        'font_name' => array(
            'type' => 'text',
            'label' => esc_html__('Name', 'vinero') ,
        ) ,
        'font_css_name' => array(
            'type' => 'text',
            'label' => esc_html__('CSS Name', 'vinero') ,
        ) ,
        'font_variants' => array(
            'type' => 'select',
            'label' => esc_html__('Variants', 'vinero') ,
            'multiple' => 18,
            'choices' => array(
                '100' => esc_html__('100', 'vinero') ,
                '100italic' => esc_html__('100italic', 'vinero') ,
                '200' => esc_html__('200', 'vinero') ,
                '200italic' => esc_html__('200italic', 'vinero') ,
                '300' => esc_html__('300', 'vinero') ,
                '300italic' => esc_html__('300italic', 'vinero') ,
                'regular' => esc_html__('regular', 'vinero') ,
                'italic' => esc_html__('italic', 'vinero') ,
                '500' => esc_html__('500', 'vinero') ,
                '500italic' => esc_html__('500italic', 'vinero') ,
                '600' => esc_html__('600', 'vinero') ,
                '600italic' => esc_html__('600italic', 'vinero') ,
                '700' => esc_html__('700', 'vinero') ,
                '700italic' => esc_html__('700italic', 'vinero') ,
                '800' => esc_html__('800', 'vinero') ,
                '800italic' => esc_html__('800italic', 'vinero') ,
                '900' => esc_html__('900', 'vinero') ,
                '900italic' => esc_html__('900italic', 'vinero') ,
            )
        ),
        'font_fallback' => array(
            'type' => 'select',
            'label' => esc_html__('Fallback', 'vinero') ,
            'choices' => array(
                'sans-serif' => esc_html__('Helvetica, Arial, sans-serif', 'vinero') ,
                'serif' => esc_html__('Georgia, serif', 'vinero') ,
                'display' => esc_html__('"Comic Sans MS", cursive, sans-serif', 'vinero') ,
                'handwriting' => esc_html__('"Comic Sans MS", cursive, sans-serif', 'vinero') ,
                'monospace' => esc_html__('"Lucida Console", Monaco, monospace', 'vinero') ,
            )
        ) ,
        'font_subsets' => array(
            'type' => 'select',
            'label' => esc_html__('Subsets', 'vinero') ,
            'multiple' => 7,
            'choices' => array(
                'cyrillic' => esc_html__('Cyrillic', 'vinero') ,
                'cyrillic-ext' => esc_html__('Cyrillic Extended', 'vinero') ,
                'devanagari' => esc_html__('Devanagari', 'vinero') ,
                'greek' => esc_html__('Greek', 'vinero') ,
                'greek-ext' => esc_html__('Greek Extended', 'vinero') ,
                'khmer' => esc_html__('Khmer', 'vinero') ,
                'latin' => esc_html__('Latin', 'vinero') ,
            )
        ) ,
    ) ,
    'active_callback' => array(
        array(
            'setting' => 'enable_typekit',
            'operator' => '==',
            'value' => '1'
        )
    )
));


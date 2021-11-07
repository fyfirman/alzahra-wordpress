<?php


/*
 * Blog
 * */


$priority = 0;


Kirki::add_field('vinero_customize', array(
    'type' => 'select',
    'settings' => 'blog_layout',
    'label' => esc_html__('Blog Layout', 'vinero'),
    'description' => esc_html__('Select a blog layout from the list below', 'vinero'),
    'section' => 'section_blog',
    'default' => 'standard',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'standard' => esc_html__('Standard', 'vinero'),
    )
));

Kirki::add_field('vinero_customize', array(
    'type' => 'text',
    'settings' => 'blog_title',
    'label' => esc_html__('Blog Title', 'vinero'),
    'description' => esc_html__('Title for blog page', 'vinero'),
    'section' => 'section_blog',
    'default' => esc_html__('Recent News', 'vinero'),
    'priority' => $priority++,
    'transport' => 'auto',
));

Kirki::add_field('vinero_customize', array(
    'type' => 'textarea',
    'settings' => 'blog_subtitle',
    'label' => esc_html__('Blog Subtitle', 'vinero'),
    'description' => esc_html__('Subtitle for blog page', 'vinero'),
    'section' => 'section_blog',
    'default' => esc_html__('Read the latest news and stories.', 'vinero'),
    'priority' => $priority++,
    'transport' => 'auto',
));


Kirki::add_field('vinero_customize', array(
    'type' => 'image',
    'settings' => 'blog_bg',
    'label' => esc_html__('Blog Background Image', 'vinero'),
    'section' => 'section_blog',
    'default' => $theme_path_images . 'index.jpg',
    'priority' => $priority++,
    'transport' => 'auto',
));


Kirki::add_field('vinero_customize', array(
    'type' => 'select',
    'settings' => 'blog_type_pagination',
    'label' => esc_html__('Type Pagination', 'vinero'),
    'description' => esc_html__('Select the type of navigation below', 'vinero'),
    'section' => 'section_blog',
    'default' => 'numeric',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'buttons' => esc_html__('Prev/Next buttons', 'vinero'),
        'numeric' => esc_html__('Numeric', 'vinero'),
        'ajax' => esc_html__('Load More Button', 'vinero'),
        'infinite' => esc_html__('Infinite Scroll', 'vinero')
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'blog_show_popular_news',
    'label' => esc_html__('Show/Hide Popular News', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to show popular news.', 'vinero'),
    'section' => 'section_blog',
    'default' => '0',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on' => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    )
));


/*
 * Archive
 * */


$priority = 0;


Kirki::add_field('vinero_customize', array(
    'type' => 'select',
    'settings' => 'archive_layout',
    'label' => esc_html__('Archive Layout', 'vinero'),
    'description' => esc_html__('Select a blog layout from the list below', 'vinero'),
    'section' => 'section_archive',
    'default' => 'standard',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'standard' => esc_html__('Standard', 'vinero'),
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'image',
    'settings' => 'archive_bg',
    'label' => esc_html__('Archive Background Image', 'vinero'),
    'section' => 'section_archive',
    'default' => $theme_path_images . 'index.jpg',
    'priority' => $priority++,
    'transport' => 'auto',
));


Kirki::add_field('vinero_customize', array(
    'type' => 'select',
    'settings' => 'archive_type_pagination',
    'label' => esc_html__('Type Pagination', 'vinero'),
    'description' => esc_html__('Select the type of navigation below', 'vinero'),
    'section' => 'section_archive',
    'default' => 'numeric',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'buttons' => esc_html__('Prev/Next buttons', 'vinero'),
        'numeric' => esc_html__('Numeric', 'vinero'),
        'ajax' => esc_html__('Load More Button', 'vinero'),
        'infinite' => esc_html__('Infinite Scroll', 'vinero')
    )
));


Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'archive_show_popular_news',
    'label' => esc_html__('Show/Hide Popular News', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to show popular news.', 'vinero'),
    'section' => 'section_archive',
    'default' => '0',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on' => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    )
));


/*
 * Search
 * */


$priority = 0;


Kirki::add_field('vinero_customize', array(
    'type' => 'select',
    'settings' => 'search_layout',
    'label' => esc_html__('Search Layout', 'vinero'),
    'description' => esc_html__('Select a blog layout from the list below', 'vinero'),
    'section' => 'section_search',
    'default' => 'standard',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'standard' => esc_html__('Standard', 'vinero'),
    )
));

Kirki::add_field('vinero_customize', array(
    'type' => 'image',
    'settings' => 'search_bg',
    'label' => esc_html__('Search Background Image', 'vinero'),
    'section' => 'section_search',
    'default' => $theme_path_images . 'index.jpg',
    'priority' => $priority++,
    'transport' => 'auto',
));

Kirki::add_field('vinero_customize', array(
    'type' => 'select',
    'settings' => 'search_type_pagination',
    'label' => esc_html__('Type Pagination', 'vinero'),
    'description' => esc_html__('Select the type of navigation below', 'vinero'),
    'section' => 'section_search',
    'default' => 'numeric',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'buttons' => esc_html__('Prev/Next buttons', 'vinero'),
        'numeric' => esc_html__('Numeric', 'vinero'),
        'ajax' => esc_html__('Load More Button', 'vinero'),
        'infinite' => esc_html__('Infinite Scroll', 'vinero')
    )
));

Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'search_show_popular_news',
    'label' => esc_html__('Show/Hide Popular News', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to show popular news.', 'vinero'),
    'section' => 'section_search',
    'default' => '0',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on' => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    )
));


/*
 * Single Post
 * */

$priority = 0;



Kirki::add_field('vinero_customize', array(
    'type' => 'switch',
    'settings' => 'singlepost_recent_news',
    'label' => esc_html__('Show/Hide Recent News', 'vinero'),
    'description' => esc_html__('Switch "Show" if you want to show recent news.', 'vinero'),
    'section' => 'section_singlepost',
    'default' => '0',
    'priority' => $priority++,
    'transport' => 'auto',
    'choices' => array(
        'on' => esc_html__('Show', 'vinero'),
        'off' => esc_html__('Hide', 'vinero')
    )
));


/*
 * Error
 * */


$priority = 0;


Kirki::add_field('vinero_customize', array(
    'type' => 'text',
    'settings' => 'error_title',
    'label' => esc_html__('Error Title', 'vinero'),
    'description' => esc_html__('Enter a title for page 404', 'vinero'),
    'section' => 'section_error',
    'default' => esc_html__('Error 404', 'vinero'),
    'priority' => $priority++,
    'transport' => 'auto',
));


Kirki::add_field('vinero_customize', array(
    'type' => 'textarea',
    'settings' => 'error_subtitle',
    'label' => esc_html__('Error Subtitle', 'vinero'),
    'description' => esc_html__('Enter a subtitle for page 404', 'vinero'),
    'section' => 'section_error',
    'default' => esc_html__('Page not found', 'vinero'),
    'priority' => $priority++,
    'transport' => 'auto',
));

Kirki::add_field('vinero_customize', array(
    'type' => 'image',
    'settings' => 'error_bg',
    'label' => esc_html__('Error Background Image', 'vinero'),
    'section' => 'section_error',
    'default' => $theme_path_images . 'index.jpg',
    'priority' => $priority++,
    'transport' => 'auto',
));
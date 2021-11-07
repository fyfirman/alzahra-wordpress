<?php
// Legacy Update
function kora_visual_composer_legacy_update() {
    if ( defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '4.3.5', '<' ) ) {
        do_action( 'vc_before_init' );
    }
}
add_action( 'admin_init', 'kora_visual_composer_legacy_update' );

/* Set Visual Composer */
// Removes tabs such as the "Design Options" from the Visual Composer Settings & page and disables automatic updates.
function kora_visual_composer_set_as_theme() {
    vc_set_as_theme( true );
}
add_action( 'vc_before_init', 'kora_visual_composer_set_as_theme' );
// Remove Default Shortcodes
if ( ! function_exists( 'kora_visual_composer_remove_default_shortcodes' ) ) {
    function kora_visual_composer_remove_default_shortcodes() {
        vc_remove_element( 'vc_pinterest' );
        vc_remove_element( 'vc_toggle' );
        vc_remove_element( 'vc_gallery' );
        vc_remove_element( 'vc_images_carousel' );
        vc_remove_element( 'vc_tabs' );
        vc_remove_element( 'vc_tour' );
        vc_remove_element( 'vc_accordion' );
        vc_remove_element( 'vc_posts_grid' );
        vc_remove_element( 'vc_carousel' );
        vc_remove_element( 'vc_posts_slider' );
        vc_remove_element( 'vc_widget_sidebar' );
        vc_remove_element( 'vc_button' );
        vc_remove_element( 'vc_cta_button' );
        vc_remove_element( 'vc_video' );
        vc_remove_element( 'vc_gmaps' );
        vc_remove_element( 'vc_raw_html' );
        vc_remove_element( 'vc_raw_js' );
        vc_remove_element( 'vc_flickr' );
        vc_remove_element( 'rev_slider_vc' );
        vc_remove_element( 'rev_slider' );
        vc_remove_element( 'vc_wp_search' );
        vc_remove_element( 'vc_wp_meta' );
        vc_remove_element( 'vc_wp_recentcomments' );
        vc_remove_element( 'vc_wp_calendar' );
        vc_remove_element( 'vc_wp_pages' );
        vc_remove_element( 'vc_wp_tagcloud' );
        vc_remove_element( 'vc_wp_custommenu' );
        vc_remove_element( 'vc_wp_posts' );
        vc_remove_element( 'vc_wp_links' );
        vc_remove_element( 'vc_wp_categories' );
        vc_remove_element( 'vc_wp_archives' );
        vc_remove_element( 'vc_wp_rss' );
        vc_remove_element( 'vc_button2' );
        vc_remove_element( 'vc_cta_button2' );
        vc_remove_element( 'vc_tta_tabs' );
        vc_remove_element( 'vc_tta_tour' );
        vc_remove_element( 'vc_tta_accordion' );
        vc_remove_element( 'vc_tta_pageable' );
        vc_remove_element( 'vc_cta' );
        vc_remove_element( 'vc_round_chart' );
        vc_remove_element( 'vc_line_chart' );
        vc_remove_element( 'vc_basic_grid' );
        vc_remove_element( 'vc_masonry_grid' );
    }
    add_action( 'vc_before_init', 'kora_visual_composer_remove_default_shortcodes' );
}
// Remove Default Templates
if ( ! function_exists( 'kora_visual_composer_remove_default_templates' ) ) {
    function kora_visual_composer_remove_default_templates( $data ) {
        return array();
    }
    add_filter( 'vc_load_default_templates', 'kora_visual_composer_remove_default_templates' );
}
// Remove Meta Boxes
if ( ! function_exists( 'kora_visual_composer_remove_meta_boxes' ) ) {
    function kora_visual_composer_remove_meta_boxes() {
        if ( is_admin() ) {
            foreach ( get_post_types() as $post_type ) {
                remove_meta_box( 'vc_teaser',  $post_type, 'side' );
            }
        }
    }
    add_action( 'do_meta_boxes', 'kora_visual_composer_remove_meta_boxes' );
}
// Disable Frontend Editor
if ( function_exists( 'vc_disable_frontend' ) ) {
    vc_disable_frontend();
}
// Map Shortcodes
if ( ! function_exists( 'kora_visual_composer_map_shortcodes' ) ) {
    function kora_visual_composer_map_shortcodes() {
        $animations = array(
            'Select' => '',
            'bounce' => 'bounce',
            'bounceIn'     => 'bounceIn',
            'flash'     => 'flash',
            'pulse'     => 'pulse',
            'rubberBand'     => 'rubberBand',
            'shake'     => 'shake',
            'swing'     => 'swing',
            'tada'     => 'tada',
            'wobble'     => 'wobble',
            'jello'     => 'jello',
            'fadeIn'     => 'fadeIn',
            'fadeInDown'     => 'fadeInDown',
            'fadeInDownBig'     => 'fadeInDownBig',
            'fadeInLeft'     => 'fadeInLeft',
            'fadeInLeftBig'     => 'fadeInLeftBig',
            'fadeInRight'     => 'fadeInRight',
            'fadeInRightBig'     => 'fadeInRightBig',
            'fadeInUp'     => 'fadeInUp',
            'fadeInUpBig'     => 'fadeInUpBig',
            'fadeOut'     => 'fadeOut',
            'fadeOutDown'     => 'fadeOutDown',
            'fadeOutDownBig'     => 'fadeOutDownBig',
            'fadeOutLeft'     => 'fadeOutLeft',
            'fadeOutLeftBig'     => 'fadeOutLeftBig',
            'fadeOutRight'     => 'fadeOutRight',
            'fadeOutRightBig'     => 'fadeOutRightBig',
            'fadeOutUp'     => 'fadeOutUp',
            'fadeOutUpBig'     => 'fadeOutUpBig',
            'slideInUp'     => 'slideInUp',
            'slideInDown'     => 'slideInDown',
            'slideInLeft'     => 'slideInLeft',
            'slideInRight'     => 'slideInRight',
            'zoomIn'     => 'zoomIn',
            'zoomInDown'     => 'zoomInDown',
            'zoomInLeft'     => 'zoomInLeft',
            'zoomInRight'     => 'zoomInRight',
            'zoomInUp'     => 'zoomInUp',
        );
        // Container
        vc_map(
            array(
                'base'            => 'container',
                'name'            => esc_html__( 'Container', 'kora-wp' ),
                'weight'          => 1,
                'class'           => 'container',
                'icon'            => 'kora_vc_container',
                'category'        => esc_html__( 'Kora WP', 'kora-wp' ),
                'description'     => esc_html__( 'Include a container in your content', 'kora-wp' ),
                'as_parent'       => array( 'only' => 'time_lines,blog_posts,portfolio,text_services,title_block,contact_info,img_with_column,social_links,vc_single_image,simple_img_slides,pricing_table,simple_heading,testimonials,counter_box,services_box,vc_column_text,vc_separator,vc_text_separator,vc_message,vc_facebook,vc_tweetmeme,vc_googleplus,vc_progress_bar,vc_pie,contact-form-7,vc_wp_text,vc_custom_heading,vc_empty_space,vc_icon,vc_btn,vc_media_grid,vc_masonry_media_grid,vc_row'),
                'content_element' => true,
                'js_view'         => 'VcColumnView',
                'params'          => array(
                    array(
                        'param_name'  => 'class',
                        'heading'     => esc_html__( 'Class', 'kora-wp' ),
                        'description' => esc_html__( '(Optional) Enter a unique class/classes.', 'kora-wp' ),
                        'type'        => 'textfield'
                    )
                )
            )
        );
        // Services Boxes
        vc_map(
            array(
                'base'            => 'services_box',
                'name'            => esc_html__( 'Services Boxes', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_services1',
                'category'        => esc_html__( 'Kora WP', 'kora-wp' ),
                'description'     => esc_html__( 'Add service boxes with icon, heading & text. ', 'kora-wp' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Enter heading.', 'kora-wp' ),
                        'description' => esc_html__( 'Heading for the service.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'holder'      => 'h3'
                    ),
                    // Text Description
                    array(
                        'param_name'  => 'txt_desc',
                        'heading'     => esc_html__( 'Enter service description.', 'kora-wp' ),
                        'description' => esc_html__( 'Enter large description about service.', 'kora-wp' ),
                        'type'        => 'textarea',
                        'holder'      => 'div'
                    ),
                    // Icon
                    array(
                        'param_name'  => 'icon',
                        'heading'     => esc_html__( 'Icon Class', 'kora-wp' ),
                        'description' => esc_html__( 'Enter icon class, choose from documentation.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Style', 'kora-wp' ),
                        'description' => esc_html__( 'Service display style.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'White' => 'why8',
                            'Light Gray'     => 'light-gray-bg'
                        ),
                        "admin_label"	=> true
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Animation type', 'kora-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Animation delay.', 'kora-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in seconds like 0.4, 0.7 etc.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )

                )
            )
        );
        // Text Services
        vc_map(
            array(
                'base'            => 'text_services',
                'name'            => esc_html__( 'Text Services', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_services2',
                'category'        => esc_html__( 'Kora WP', 'kora-wp' ),
                'description'     => esc_html__( 'Add text services to your content. ', 'kora-wp' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Enter heading.', 'kora-wp' ),
                        'description' => esc_html__( 'Heading for the service.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'holder'      => 'h3'
                    ),
                    // Text Description
                    array(
                        'param_name'  => 'txt_desc',
                        'heading'     => esc_html__( 'Enter service description.', 'kora-wp' ),
                        'description' => esc_html__( 'Enter large description about service.', 'kora-wp' ),
                        'type'        => 'textarea',
                        'holder'      => 'div'
                    ),
                    // Column Size
                    array(
                        'param_name'  => 'column',
                        'heading'     => __( 'Column Size', 'kora-wp' ),
                        'description' => __( 'Choose column size,based on 12 column grid system.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'col-sm-1' => '1',
                            'col-sm-2'     => '2',
                            'col-sm-3'     => '3',
                            'col-sm-4'     => '4',
                            'col-sm-5'     => '5',
                            'col-sm-6'     => '6',
                            'col-sm-7'     => '7',
                            'col-sm-8'     => '8',
                            'col-sm-9'     => '9',
                            'col-sm-10'     => '10',
                            'col-sm-11'     => '11',
                            'col-sm-12'     => '12',
                        ),
                        'admin_label' => true,
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Animation type', 'kora-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Animation delay.', 'kora-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in seconds like 0.4, 0.7 etc.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )

                )
            )
        );
        // Counter Boxes
        vc_map(
            array(
                'base'            => 'counter_box',
                'name'            => esc_html__( 'Counter Boxes', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_counters',
                'category'        => esc_html__( 'Kora WP', 'kora-wp' ),
                'description'     => esc_html__( 'Add counter boxes with icon, number & heading. ', 'kora-wp' ),
                'params'          => array(
                    // Heading
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Enter heading.', 'kora-wp' ),
                        'description' => esc_html__( 'Heading for the counter.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'holder'      => 'h3'
                    ),
                    // Icon
                    array(
                        'param_name'  => 'icon',
                        'heading'     => esc_html__( 'Icon Class', 'kora-wp' ),
                        'description' => esc_html__( 'Enter icon class, choose from documentation.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Number
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Value', 'kora-wp' ),
                        'description' => esc_html__( 'Enter numeric value only.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Animation type', 'kora-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Animation delay.', 'kora-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in seconds like 0.4, 0.7 etc.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )

                )
            )
        );
        // Client Testimonials
        vc_map(
            array(
                'base'            => 'testimonials',
                'name'            => esc_html__( 'Client Testimonials', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_testimonials',
                'category'        => esc_html__( 'Kora WP', 'kora-wp' ),
                'description'     => esc_html__( 'Add testimonials to your content.', 'kora-wp' ),
                'params'          => array(
                    // Number Of Testimonials
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Testimonials', 'kora-wp' ),
                        'description' => esc_html__( 'Only numeric values, default is 3.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'kora-wp' ),
                        'description' => esc_html__( 'Set testimonials display order.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    ),
                    // Group Slug
                    array(
                        'param_name'  => 'grp_slug',
                        'heading'     => esc_html__( 'Group Slug', 'kora-wp' ),
                        'description' => esc_html__( 'Enter group slug or leave empty for all.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Simple Heading
        vc_map(
            array(
                'base'            => 'simple_heading',
                'name'            => __( 'Simple Heading', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_heading',
                'category'        => __( 'Kora WP', 'kora-wp' ),
                'description'     => __( 'Add simple heading to your content.', 'kora-wp' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'txt',
                        'heading'     => __( 'Enter Heading', 'kora-wp' ),
                        'description' => __( 'Input heading text.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'holder' => 'h4'
                    ),
                    // Choose Heading
                    array(
                        'param_name'  => 'heading_style',
                        'heading'     => __( 'Heading Style', 'kora-wp' ),
                        'description' => __( 'Choose heading style.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'H1' => 'h1',
                            'H2'     => 'h2',
                            'H3'     => 'h3',
                            'H4'     => 'h4',
                            'H5'     => 'h5',
                            'H6'     => 'h6'
                        ),
                        'admin_label' => true,
                    )
                )
            )
        );
        // Pricing Table
        vc_map(
            array(
                'base'            => 'pricing_table',
                'name'            => esc_html__( 'Pricing Table', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_pricing_table',
                'category'        => esc_html__( 'Kora WP', 'kora-wp' ),
                'description'     => esc_html__( 'Add pricing table to your content. ', 'kora-wp' ),
                'params'          => array(
                    // Package Title
                    array(
                        'param_name'  => 'pkg_title',
                        'heading'     => esc_html__( 'Package Title', 'kora-wp' ),
                        'description' => esc_html__( 'Enter package title for table.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'holder'      => 'h3'
                    ),
                    // Package Price
                    array(
                        'param_name'  => 'pkg_price',
                        'heading'     => esc_html__( 'Package Price', 'kora-wp' ),
                        'description' => esc_html__( 'Enter package price including currency symbol.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Text
                    array(
                        'param_name'  => 'btn_txt',
                        'heading'     => esc_html__( 'Button Text', 'kora-wp' ),
                        'description' => esc_html__( 'Enter text for button.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Button Link
                    array(
                        'param_name'  => 'btn_link',
                        'heading'     => esc_html__( 'Button Link', 'kora-wp' ),
                        'description' => esc_html__( 'Enter link for button.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Style', 'kora-wp' ),
                        'description' => esc_html__( 'Table display style.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'White' => 'why8',
                            'Light Gray'     => 'light-gray-bg'
                        ),
                        "admin_label"	=> true
                    ),
                    // Package Content
                    array(
                        'param_name'  => 'content',
                        'heading'     => esc_html__( 'Package Content', 'kora-wp' ),
                        'description' => esc_html__( 'For default view you can input simple un-ordered list tags.', 'kora-wp' ),
                        'type'        => 'textarea_html'
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Animation type', 'kora-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Animation delay.', 'kora-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in seconds like 0.4, 0.7 etc.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )

                )
            )
        );
        // Simple Image Slider
        vc_map( array(
            "name" => esc_html__("Simple Image Slider", "kora-wp"),
            "base" => "simple_img_slides",
            'icon'  => 'kora_vc_slider',
            "content_element" => true,
            'as_parent'       => array( 'only' => 'simple_img_slide' ),
            'category'        => esc_html__( 'Kora WP', 'kora-wp' ),
            "show_settings_on_create" => false,
            "params" => array(),
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add simple image slides to your content.', 'kora-wp' ),
        ) );
        vc_map( array(
            "name" => esc_html__("Slide Image", "kora-wp"),
            "base" => "simple_img_slide",
            'as_child'       => array( 'only' => 'simple_img_slides' ),
            "content_element" => true,
            "params" => array(
                // Slide Image
                array(
                    'param_name'  => 'image',
                    'heading'     => esc_html__( 'Select image', 'kora-wp' ),
                    'description' => esc_html__( 'Upload slide image to display.', 'kora-wp' ),
                    'type'        => 'attach_image',
                    'holder' => 'img'
                ),
            )
        ) );
        // Social Links
        vc_map(
            array(
                'base'            => 'social_links',
                'name'            => esc_html__( 'Social Link', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_social',
                'category'        => esc_html__( 'Kora WP', 'kora-wp' ),
                'description'     => esc_html__( 'Add social links to your content. ', 'kora-wp' ),
                'params'          => array(
                    // Facebook
                    array(
                        'param_name'  => 'facebook',
                        'heading'     => esc_html__( 'Facebook', 'kora-wp' ),
                        'description' => esc_html__( 'Leave empty if not required.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Twitter
                    array(
                        'param_name'  => 'twitter',
                        'heading'     => esc_html__( 'Twitter', 'kora-wp' ),
                        'description' => esc_html__( 'Leave empty if not required.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Linkedin
                    array(
                        'param_name'  => 'linkedin',
                        'heading'     => esc_html__( 'Linkedin', 'kora-wp' ),
                        'description' => esc_html__( 'Leave empty if not required.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Behance
                    array(
                        'param_name'  => 'behance',
                        'heading'     => esc_html__( 'Behance', 'kora-wp' ),
                        'description' => esc_html__( 'Leave empty if not required.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Google Plus
                    array(
                        'param_name'  => 'google_plus',
                        'heading'     => esc_html__( 'Google +', 'kora-wp' ),
                        'description' => esc_html__( 'Leave empty if not required.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Pinterest
                    array(
                        'param_name'  => 'pinterest',
                        'heading'     => esc_html__( 'Pinterest', 'kora-wp' ),
                        'description' => esc_html__( 'Leave empty if not required.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Instagram
                    array(
                        'param_name'  => 'instagram',
                        'heading'     => esc_html__( 'Instagram', 'kora-wp' ),
                        'description' => esc_html__( 'Leave empty if not required.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),

                )
            )
        );
        // Image With Column
        vc_map(
            array(
                'base'            => 'img_with_column',
                'name'            => __( 'Image With Column', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_img1',
                'category'        => __( 'Kora WP', 'kora-wp' ),
                'description'     => __( 'Add simple image with column.', 'kora-wp' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'image',
                        'heading'     => __( 'Upload Image', 'kora-wp' ),
                        'description' => __( 'Upload column image.', 'kora-wp' ),
                        'type'        => 'attach_image',
                        'holder' => 'img'
                    ),
                    // Image Caption
                    array(
                        'param_name'  => 'caption',
                        'heading'     => esc_html__( 'Image Caption', 'kora-wp' ),
                        'description' => esc_html__( 'Enter image caption if required.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Column Size
                    array(
                        'param_name'  => 'column',
                        'heading'     => __( 'Column Size', 'kora-wp' ),
                        'description' => __( 'Choose column size,based on 12 column grid system.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'col-sm-1' => '1',
                            'col-sm-2'     => '2',
                            'col-sm-3'     => '3',
                            'col-sm-4'     => '4',
                            'col-sm-5'     => '5',
                            'col-sm-6'     => '6',
                            'col-sm-7'     => '7',
                            'col-sm-8'     => '8',
                            'col-sm-9'     => '9',
                            'col-sm-10'     => '10',
                            'col-sm-11'     => '11',
                            'col-sm-12'     => '12',
                        ),
                        'admin_label' => true,
                    ),
                    // Padding Left
                    array(
                        'param_name'  => 'padding_left',
                        'heading'     => esc_html__( 'Left Padding', 'kora-wp' ),
                        'description' => esc_html__( 'Need to override, numeric value only.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Padding Right
                    array(
                        'param_name'  => 'padding_right',
                        'heading'     => esc_html__( 'Right Padding', 'kora-wp' ),
                        'description' => esc_html__( 'Need to override, numeric value only.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Contact Info
        vc_map(
            array(
                'base'            => 'contact_info',
                'name'            => __( 'Contact Info', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_contact_info',
                'category'        => __( 'Kora WP', 'kora-wp' ),
                'description'     => __( 'Add simple contact info to your content.', 'kora-wp' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => __( 'Heading', 'kora-wp' ),
                        'description' => __( 'Input heading text.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'holder' => 'h3'
                    ),
                    // Address
                    array(
                        'param_name'  => 'address',
                        'heading'     => esc_html__( 'Address', 'kora-wp' ),
                        'description' => esc_html__( 'Input complete address.', 'kora-wp' ),
                        'type'        => 'textarea',
                        "holder"	=> 'p'
                    ),
                    // Phone
                    array(
                        'param_name'  => 'phone',
                        'heading'     => esc_html__( 'Phone', 'kora-wp' ),
                        'description' => esc_html__( 'Input phone number.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Email
                    array(
                        'param_name'  => 'email',
                        'heading'     => esc_html__( 'Email', 'kora-wp' ),
                        'description' => esc_html__( 'Input email address.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Animations
                    array(
                        'param_name'  => 'animations',
                        'heading'     => esc_html__( 'Animation type', 'kora-wp' ),
                        'description' => esc_html__( 'Select animation type.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => $animations,
                        "admin_label"	=> true
                    ),
                    // Animation Delay
                    array(
                        'param_name'  => 'delay',
                        'heading'     => esc_html__( 'Animation delay.', 'kora-wp' ),
                        'description' => esc_html__( 'Enter numeric value only in seconds like 0.4, 0.7 etc.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    )
                )
            )
        );
        // Title Block
        vc_map(
            array(
                'base'            => 'title_block',
                'name'            => __( 'Title Block', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_feature_heading',
                'category'        => __( 'Kora WP', 'kora-wp' ),
                'description'     => __( 'Add simple title block to your content.', 'kora-wp' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => __( 'Heading', 'kora-wp' ),
                        'description' => __( 'Input heading text.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'holder' => 'h3'
                    ),
                    // Small Description
                    array(
                        'param_name'  => 'small_desc',
                        'heading'     => esc_html__( 'Small Description', 'kora-wp' ),
                        'description' => esc_html__( 'Input small description below title.', 'kora-wp' ),
                        'type'        => 'textarea',
                        "holder"	=> 'p'
                    ),
                    // Choose Heading
                    array(
                        'param_name'  => 'heading_style',
                        'heading'     => __( 'Heading Style', 'kora-wp' ),
                        'description' => __( 'Choose heading style.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'H1' => 'h1',
                            'H2'     => 'h2',
                            'H3'     => 'h3',
                            'H4'     => 'h4',
                            'H5'     => 'h5',
                            'H6'     => 'h6'
                        ),
                        'admin_label' => true,
                    )
                )
            )
        );
        // Portfolio
        vc_map(
            array(
                'base'            => 'portfolio',
                'name'            => __( 'Portfolio', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_porfolio',
                'category'        => __( 'Kora WP', 'kora-wp' ),
                'description'     => __( 'Add portfolio to your content.', 'kora-wp' ),
                'params'          => array(
                    // Portfolio Layout
                    array(
                        'param_name'  => 'layout',
                        'heading'     => __( 'Portfolio Layout', 'kora-wp' ),
                        'description' => __( 'Select portfolio display layout.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Portfolio Wide With Out Filters' => 'pl1',
                            'Portfolio Grid With Small Filters'     => 'pl2',
                            'Portfolio Wide With Large Filters'     => 'pl3'
                        ),
                        'admin_label' => true
                    ),
                    // Portfolio Columns
                    array(
                        'param_name'  => 'columns',
                        'heading'     => __( 'Portfolio Columns', 'kora-wp' ),
                        'description' => __( 'Set portfolio columns.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            '2 Columns' => 'col-2',
                            '3 Columns'     => 'col-3',
                            '4 Columns'     => 'col-4'
                        ),
                        'admin_label' => true
                    ),
                    // Hide Filters
                    array(
                        'param_name'  => 'hide_filters',
                        'heading'     => __( 'Hide Filters', 'kora-wp' ),
                        'description' => __( 'You can hide filters for this layout.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Yes' => 'yes',
                            'No'     => 'no'
                        ),
                        "dependency" => array(
                            "element" => "layout",
                            "value" => "pl2"
                        ),
                        'admin_label' => true
                    ),
                    // Portfolio Categories
                    array(
                        'param_name'  => 'portfolio_categories',
                        'heading'     => __( 'Portfolio Categories ID', 'kora-wp' ),
                        'description' => __( 'Enter category ID separating by single comma else all will be displayed.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Number Of Posts To display
                    array(
                        'param_name'  => 'number_of_posts',
                        'heading'     => __( 'Number Of Posts To Display', 'kora-wp' ),
                        'description' => __( 'Number of portfolio items to display.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Load more page
                    array(
                        'param_name'  => 'load_more_page',
                        'heading'     => __( 'Load More Page ID', 'kora-wp' ),
                        'description' => __( 'Load more page ID, you can find it by editing load more page in top browser address bar e.g ?post=2, 2 is ID for that page.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => __( 'Display Order', 'kora-wp' ),
                        'description' => __( 'Display order for portfolio items, it should be the same in load more page too else portfolio may repeats.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        'admin_label' => true
                    ),
                    // Load More Text
                    array(
                        'param_name'  => 'load_more_txt',
                        'heading'     => __( 'Load More Button Text', 'kora-wp' ),
                        'description' => __( 'Load more button text.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // Loading Button Text
                    array(
                        'param_name'  => 'loading_txt',
                        'heading'     => __( 'Loading Button Text', 'kora-wp' ),
                        'description' => __( 'Loading button text.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),
                    // No Work Text
                    array(
                        'param_name'  => 'no_work_txt',
                        'heading'     => __( 'No Work Button Text', 'kora-wp' ),
                        'description' => __( 'No work button text.', 'kora-wp' ),
                        'type'        => 'textfield',
                        'admin_label' => true
                    ),

                )
            )
        );
        // Blog Posts
        vc_map(
            array(
                'base'            => 'blog_posts',
                'name'            => esc_html__( 'Blog Posts', 'kora-wp' ),
                'class'           => '',
                'icon'            => 'kora_vc_blog',
                'category'        => esc_html__( 'Content', 'kora-wp' ),
                'description'     => esc_html__( 'Use to insert blog posts to your content.', 'kora-wp' ),
                'params'          => array(
                    // Number Of Posts
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Posts', 'kora-wp' ),
                        'description' => esc_html__( 'Only numeric values, default is 2.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'kora-wp' ),
                        'description' => esc_html__( 'Set posts display order.', 'kora-wp' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    ),
                    // Category Slug
                    array(
                        'param_name'  => 'cat_slug',
                        'heading'     => esc_html__( 'Category Slug', 'kora-wp' ),
                        'description' => esc_html__( 'Enter category slug or leave empty for all.', 'kora-wp' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Timeline
        vc_map( array(
            "name" => esc_html__("Time Lines", "kora-wp"),
            "base" => "time_lines",
            'icon'  => 'kora_vc_list_items',
            "content_element" => true,
            'as_parent'       => array( 'only' => 'time_line' ),
            'category'        => esc_html__( 'Kora WP', 'kora-wp' ),
            "show_settings_on_create" => false,
            "params" => array(),
            "js_view" => 'VcColumnView',
            'description'     => esc_html__( 'Add simple time line to your content.', 'kora-wp' ),
        ) );
        vc_map( array(
            "name" => esc_html__("Time Line", "kora-wp"),
            "base" => "time_line",
            'as_child'       => array( 'only' => 'time_lines' ),
            "content_element" => true,
            'params'          => array(
                // Duration
                array(
                    'param_name'  => 'duration',
                    'heading'     => __( 'Duration', 'kora-wp' ),
                    'description' => __( 'Input duration.', 'kora-wp' ),
                    'type'        => 'textfield',
                    'holder' => 'h3'
                ),
                // Heading Text
                array(
                    'param_name'  => 'heading',
                    'heading'     => __( 'Heading', 'kora-wp' ),
                    'description' => __( 'Input heading text.', 'kora-wp' ),
                    'type'        => 'textfield',
                    'holder' => 'h4'
                ),
                // Small Description
                array(
                    'param_name'  => 'small_desc',
                    'heading'     => esc_html__( 'Small Description', 'kora-wp' ),
                    'description' => esc_html__( 'Input small description below heading.', 'kora-wp' ),
                    'type'        => 'textarea',
                    "holder"	=> 'p'
                ),
                // Position
                array(
                    'param_name'  => 'position',
                    'heading'     => esc_html__( 'Position', 'kora-wp' ),
                    'description' => esc_html__( 'Set display position.', 'kora-wp' ),
                    'type'        => 'dropdown',
                    'value'       => array(
                        'Select' => '',
                        'Left' => 'pull-left',
                        'Right'     => 'pull-right'
                    ),
                    "admin_label"	=> true
                ),
                // Animations
                array(
                    'param_name'  => 'animations',
                    'heading'     => esc_html__( 'Animation type', 'kora-wp' ),
                    'description' => esc_html__( 'Select animation type.', 'kora-wp' ),
                    'type'        => 'dropdown',
                    'value'       => $animations,
                    "admin_label"	=> true
                ),
                // Animation Delay
                array(
                    'param_name'  => 'delay',
                    'heading'     => esc_html__( 'Animation delay.', 'kora-wp' ),
                    'description' => esc_html__( 'Enter numeric value only in seconds like 0.4, 0.7 etc.', 'kora-wp' ),
                    'type'        => 'textfield',
                    "admin_label"	=> true
                )

            )
        ) );

    }
    add_action( 'vc_before_init', 'kora_visual_composer_map_shortcodes' );
    // Extend container class (parents).
    if(class_exists('WPBakeryShortCodesContainer')){
        class WPBakeryShortCode_Container extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Simple_img_slides extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Time_lines extends WPBakeryShortCodesContainer { }
    }
    // Extend shortcode class (children).
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_Services_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Counter_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Testimonials extends WPBakeryShortCode { }
        class WPBakeryShortCode_Simple_heading extends WPBakeryShortCode { }
        class WPBakeryShortCode_Pricing_table extends WPBakeryShortCode { }
        class WPBakeryShortCode_Simple_img_slide extends WPBakeryShortCode { }
        class WPBakeryShortCode_Social_links extends WPBakeryShortCode { }
        class WPBakeryShortCode_Img_with_column extends WPBakeryShortCode { }
        class WPBakeryShortCode_Contact_info extends WPBakeryShortCode { }
        class WPBakeryShortCode_Title_block extends WPBakeryShortCode { }
        class WPBakeryShortCode_Text_services extends WPBakeryShortCode { }
        class WPBakeryShortCode_Portfolio extends WPBakeryShortCode { }
        class WPBakeryShortCode_Blog_posts extends WPBakeryShortCode { }
        class WPBakeryShortCode_Time_line extends WPBakeryShortCode { }
    }

}

// Update Existing Elements
if ( ! function_exists( 'kora_visual_composer_update_existing_shortcodes' ) ) {
    function kora_visual_composer_update_existing_shortcodes() {
    }
    add_action( 'admin_init', 'kora_visual_composer_update_existing_shortcodes' );
}
// Incremental ID Counter for Templates
if ( ! function_exists( 'kora_visual_composer_templates_id_increment' ) ) {
    function kora_visual_composer_templates_id_increment() {
        static $count = 0; $count++;
        return $count;
    }
}
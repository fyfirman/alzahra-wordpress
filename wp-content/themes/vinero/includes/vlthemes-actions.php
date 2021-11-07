<?php

/*
 * Register Sidebars
 * */

function vinero_register_sidebar() {
    register_sidebar(array(
        'name' => esc_html__('Blog Sidebar', 'vinero'),
        'id' => 'blog_sidebar',
        'description' => esc_html__('Blog Sidebar Area', 'vinero'),
        'before_widget' => '<div id="%1$s" class="vl-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="vl-widget-title">',
        'after_title' => '</h5>'
    ));


    if(class_exists('WooCommerce')){
        register_sidebar(array(
            'name' => esc_html__('Shop Sidebar', 'vinero'),
            'id' => 'shop_sidebar',
            'description' => esc_html__('Shop Sidebar Area', 'vinero'),
            'before_widget' => '<div id="%1$s" class="vl-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="vl-widget-title">',
            'after_title' => '</h5>'
        ));
    }
    $footer_columns = get_theme_mod('footer_columns', 4);
    for ($i = 1; $i < $footer_columns + 1; $i++) {
        register_sidebar(array(
            'name' => sprintf( esc_html__( 'Footer Sidebar: %s Column', 'vinero' ), $i ),
            'id' => sanitize_key('footer_sidebar_' . $i),
            'description' => esc_html__('Footer Sidebar Area', 'vinero'),
            'before_widget' => '<div id="%1$s" class="vl-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="vl-widget-title">',
            'after_title' => '</h5>'
        ));
    }
}

add_action('widgets_init', 'vinero_register_sidebar');

/**
 * Before Site
 */

function vinero_before_site() {
    $class = 'vl-site-holder';
    if(get_theme_mod('show_preloader', true)){
        $class .= ' animsition';
    }
    if(get_theme_mod('footer_fixed', true)) {
        $class .= ' vl-footer-fixed';
    }

    echo '<div class="'. vinero_sanitize_class($class) .'">';
}

add_action('vinero/before_site', 'vinero_before_site');

/**
 * After Site
 */

function vinero_after_site() {
    echo '</div>';
    echo '<!--/.vl-site-holder-->';
    if(get_theme_mod('show_site_border', false)){
        echo '<div class="vl-site-border"></div>';
    }
}

add_action('vinero/after_site', 'vinero_after_site');

/**
 * Before Main Content
 */

function vinero_before_main_content() {
    echo '<div class="vl-content-holder">';
}

add_action('vinero/before_main_content', 'vinero_before_main_content');

/**
 * After Main Content
 */

function vinero_after_main_content() {
    echo '</div>';
    echo '<!--/.vl-content-holder-->';
}

add_action('vinero/after_main_content', 'vinero_after_main_content');

/**
 * Back to Top Button
 */

function vinero_site_backtotop() {
    if (!vinero_get_button_top()) {
        return;
    }
    echo '<a href="#" class="vl-back-to-top hidden"><i class="fa fa-angle-up"></i></a>';
}

add_action('vinero/site_backtotop', 'vinero_site_backtotop');

/**
 * Action Widgets Init
 */

function vinero_register_widgets() {
    $vinero_widgets = array(
        'about' => 'vinero_widget_about',
        'subscribe' => 'vinero_widget_subscribe',
        'socials' => 'vinero_widget_socials',
        'twitter' => 'vinero_widget_twitter'
    );
    if(class_exists('acf')){
        foreach ($vinero_widgets as $key => $value) {
            require_once VINERO_REQUIRE_DIRECTORY . 'includes/widgets/' . sanitize_key($key) . '.php';
            register_widget($value);
        }
    }
}

add_action('widgets_init', 'vinero_register_widgets');

/*
 * Admin Logo
 * */

function vinero_change_admin_logo() {
    if ( '' === get_theme_mod( 'login_logo_image', VINERO_THEME_DIRECTORY . 'assets/img/vlthemes.png' ) ) {
        return;
    }
    $image_url = get_theme_mod( 'login_logo_image', VINERO_THEME_DIRECTORY . 'assets/img/vlthemes.png' );
    $image_w   = get_theme_mod( 'login_logo_image_width', '102px' );
    $image_h   = get_theme_mod( 'login_logo_image_height', '115px' );
    echo '<style type="text/css">
        h1 a { 
            background: transparent url(' . esc_url( $image_url ) . ') 50% 50% no-repeat !important;
            width:' . esc_attr( $image_w ) . '!important; 
            height:' . esc_attr( $image_h ) . '!important; 
            background-size: cover !important;
        }
    </style>';
}

add_action('login_head', 'vinero_change_admin_logo');

/*
 * Add thumbnail post to admin
 * */

function vinero_display_thumbnail_post($column) {
    global $post;
    switch ($column) {
        case 'thumbnail':
            if (get_the_post_thumbnail($post->ID)) {
                echo get_the_post_thumbnail($post->ID, array(50,50));
            }
            break;
    }
}

add_action('manage_post_posts_custom_column', 'vinero_display_thumbnail_post', 10, 1);


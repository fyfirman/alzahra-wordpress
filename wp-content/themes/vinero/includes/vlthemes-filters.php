<?php

/*
 * Add class to body
 * */

function vinero_add_body_class($classes){
    $classes[] = '';

    if(get_theme_mod('show_site_border', false)){
        $classes[] = 'vl-site-bordered';
    }

    return $classes;
}

add_filter('body_class', 'vinero_add_body_class');


function vinero_add_html_class(){
    $classes[] = '';

    if(get_theme_mod('custom_scrollbar', false)){
        $classes[] = 'vl-custom-scrollbar';
    }

    return vinero_sanitize_class($classes);
}




/*
 * Remove page in search
 * */

function vinero_remove_page_in_search($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts', 'vinero_remove_page_in_search');

/*
 * Post password
 * */

function vinero_custom_post_password() {
    global $post;
    $label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);
    $output = '<form class="post-password-form" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
    <input name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_html__('Password:' , 'vinero') . '">
    <input type="submit" name="Submit" class="vl-btn vl-btn-primary" value="' . esc_html__('Submit' , 'vinero') . '" />
    </form>';
    return apply_filters('vinero/custom_post_password', $output);
}

add_filter('the_password_form', 'vinero_custom_post_password');

/*
 * Admin Logo Link
 * */

function vinero_change_admin_logo_link() {
    return home_url('/');
}

add_filter('login_headerurl', 'vinero_change_admin_logo_link');

/*
 * Add thumbnail post to admin
 * */

function vinero_add_thumbnail_column_post($columns) {
    $column_thumbnail = array(
        'thumbnail' => esc_html__('Thumbnail', 'vinero')
    );
    $columns = array_slice($columns, 0, 2, true) + $column_thumbnail + array_slice($columns, 1, NULL, true);
    return $columns;
}

add_filter('manage_edit-post_columns', 'vinero_add_thumbnail_column_post', 10, 1);








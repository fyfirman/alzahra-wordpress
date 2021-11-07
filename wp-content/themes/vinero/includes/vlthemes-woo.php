<?php

if(class_exists('WooCommerce')){

    /*
     * Add cart to menu
     * */

    function vinero_add_cart_to_menu($items, $args) {
        global $woocommerce, $page;
        if('primary-menu' === $args->theme_location && is_woocommerce()) {
            $items .= '<li class="menu-item">';
            $items .= '<a href="'.esc_url($woocommerce->cart->get_cart_url()).'">'.esc_html__('Cart', 'vinero') . '(<span class="vl-cart-count">'.esc_attr($woocommerce->cart->get_cart_contents_count()).'</span>)</a>';
            $items .= '</li>';
        }
        return $items;
    }
    
    add_filter('wp_nav_menu_items','vinero_add_cart_to_menu', 10, 2);



    function vinero_ajax_cart_total($fragments) {
        global $woocommerce;
        ob_start();
        echo '<span class="vl-cart-count">'. $woocommerce->cart->get_cart_contents_count() .'</span>';
        $fragments['span.vl-cart-count'] = ob_get_clean();
        return $fragments;
    }

    add_filter('add_to_cart_fragments', 'vinero_ajax_cart_total');



    function vinero_custom_override_checkout_fields( $fields ) {
        $fields['order']['order_comments']['placeholder'] = '';
        return $fields;
    }

    add_filter( 'woocommerce_checkout_fields' , 'vinero_custom_override_checkout_fields' );
    

    /*
     * Remove WooCommerce Stylesheets
     * */

    add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

    /*
     * Max products per page
     * */

    $shop_type_pagination = get_theme_mod('shop_type_pagination', 'infinite');
    $shop_max_products = get_theme_mod('shop_max_products', 6);
    $shop_max_products = $shop_type_pagination == 'none' ? -1 : $shop_max_products;

    add_filter('loop_shop_per_page', create_function( '$cols', 'return '.$shop_max_products.';' ), 20);


    /*
     * Max products crossells per page
     * */

    function vinero_max_crosssell_products($total) {
        $total = '4';
        return $total;
    }

    add_filter('woocommerce_cross_sells_total', 'vinero_max_crosssell_products');

    /*
     * Max related products per page
     * */

    function vinero_related_products_args( $args ) {
        $args['posts_per_page'] = 4; // 4 related products
        return $args;
    }

    add_filter('woocommerce_output_related_products_args', 'vinero_related_products_args');

}



function vinero_get_products_rating($rating, $echo = true){
    $output = '<div class="vl-product-rating">';
    if($rating == 0 || $rating <= 0.5){
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
    }elseif($rating == 0.5 || $rating <= 1){
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
    }elseif($rating == 1.5 || $rating <= 2) {
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
    }elseif($rating == 2.5 || $rating <= 3) {
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot"></span>';
        $output .= '<span class="vl-review-dot"></span>';
    }elseif($rating == 3.5 || $rating <= 4) {
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot"></span>';
    }elseif($rating == 4.5 || $rating <= 5) {
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
        $output .= '<span class="vl-review-dot active"></span>';
    }
    $output .= '</div>';

    if($echo){
        echo wp_kses($output, array('div' => array('class' => array()), 'span' => array('class' => array())));
    }else{
        return apply_filters('vinero/get_products_rating', $output);
    }
}


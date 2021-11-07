<?php function kora_styling() {
    // Styling Options
    $heading_h1 = kora_wp_option("heading_h1");
    $heading_h2 = kora_wp_option("heading_h2");
    $heading_h3 = kora_wp_option("heading_h3");
    $heading_h4 = kora_wp_option("heading_h4");
    $heading_h5 = kora_wp_option("heading_h5");
    $heading_h6 = kora_wp_option("heading_h6");

    $menu_normal = kora_wp_option("menu_normal");
    $menu_active = kora_wp_option("menu_active");
    $header_bg = kora_wp_option("header_bg");

    $body_color = kora_wp_option("body_color");

    $footer_bg = kora_wp_option("footer_bg");
    $footer_color = kora_wp_option("footer_color");

    $page_title = kora_wp_option("page_title");
    $single_post = kora_wp_option("single_post");
    $links_normal = kora_wp_option("links_normal");
    $links_hover = kora_wp_option("links_hover");
    $widget_title = kora_wp_option("widget_title");
    ?>
    <style type="text/css">
        <?php if(!empty($heading_h1)){ ?>
        h1 {color: <?php echo esc_attr($heading_h1); ?>;}
        <?php } if(!empty($heading_h2)){ ?>
        h2 {color: <?php echo esc_attr($heading_h2); ?>;}
        <?php } if(!empty($heading_h3)){ ?>
        h3 {color: <?php echo esc_attr($heading_h3); ?>;}
        <?php } if(!empty($heading_h4)){ ?>
        h4 {color: <?php echo esc_attr($heading_h4); ?>;}
        <?php } if(!empty($heading_h5)){ ?>
        h5 {color: <?php echo esc_attr($heading_h5); ?>;}
        <?php } if(!empty($heading_h6)){ ?>
        h6 { color: <?php echo esc_attr($heading_h6); ?>;}
        <?php } if(!empty($menu_normal)){ ?>
        header nav li a,header .simpleNav ul.dropdown li a,.left-header li a,.left-header .sub-menu li a {color: <?php echo esc_attr($menu_normal); ?>!important;}
        <?php } if(!empty($menu_active)){ ?>
        header nav li a:hover,header .simpleNav ul.dropdown li a:hover,.left-header li a:hover {color: <?php echo esc_attr($menu_active); ?>!important;}
        <?php } if(!empty($header_bg)){ ?>
        .header-fix,#cd-lateral-nav { background: <?php echo esc_attr($header_bg); ?>;}
        <?php } if(!empty($body_color)){ ?>
        body,p { color: <?php echo esc_attr($body_color); ?> !important;}
        <?php } if(!empty($footer_bg)){ ?>
        footer { background: <?php echo esc_attr($footer_bg); ?> !important;}
        <?php } if(!empty($footer_color)){ ?>
        footer p,footer a,footer { color: <?php echo esc_attr($footer_color); ?> !important; }
        <?php } if(!empty($page_title)){ ?>
        h2.pg-title {color: <?php echo esc_attr($page_title); ?>;}
        <?php } if(!empty($single_post)){ ?>
        h2.pst-title { color: <?php echo esc_attr($single_post); ?>;}
        <?php } if(!empty($links_normal)){ ?>
        a { color: <?php echo esc_attr($links_normal); ?>;}
        <?php } if(!empty($links_hover)){ ?>
        a:hover { color: <?php echo esc_attr($links_hover); ?>;}
        <?php } if(!empty($widget_title)){ ?>
        .widget h6 { color: <?php echo esc_attr($widget_title); ?>;}
        <?php } ?>
    </style>
    <?php
    // Typography
    $heading_font = kora_wp_option("headings_font_face");
    $heading_weight = kora_wp_option("headings_font_weight");
    $meta_font = kora_wp_option("meta_font_face");
    $meta_weight = kora_wp_option("meta_font_weight");
    $body_font = kora_wp_option("body_font_face");
    $body_weight = kora_wp_option("body_font_weight");

    $body_size = intval(kora_wp_option("body_font_size"));
    $h1_size = intval(kora_wp_option("h1_font_size"));
    $h2_size = intval(kora_wp_option("h2_font_size"));
    $h3_size = intval(kora_wp_option("h3_font_size"));
    $h4_size = intval(kora_wp_option("h4_font_size"));
    $h5_size = intval(kora_wp_option("h5_font_size"));
    $h6_size = intval(kora_wp_option("h6_font_size"));
    $menu_size = intval(kora_wp_option("menu_font_size"));
    $page_title_size = intval(kora_wp_option("page_title_font_size"));
    $post_title_size = intval(kora_wp_option("post_title_font_size"));
    ?>
    <style type="text/css">
        <?php if(!empty($heading_font)){ ?>
        h1,h2,h3 {
            font-family: <?php echo esc_attr($heading_font); ?>;
            font-weight: <?php echo esc_attr($heading_weight); ?>;
        }
        <?php } if(!empty($meta_font)){ ?>
        h4,h5,h6,header nav li a,header .simpleNav ul.dropdown li a,.left-header li a,.left-header .sub-menu li a {
            font-family: <?php echo esc_attr($meta_font); ?>;
            font-weight: <?php echo esc_attr($meta_weight); ?>;
        }
        <?php } if(!empty($body_font)){ ?>
        html,body,p {
            font-family: <?php echo esc_attr($body_font); ?> !important;
            font-weight: <?php esc_attr($body_weight); ?>;
        }
        <?php } if(!empty($body_size)){ ?>
        body,p {
            font-size: <?php echo intval($body_size); ?>px;
        }
        <?php } if(!empty($h1_size)){ ?>
        h1 {
            font-size: <?php echo intval($h1_size); ?>px;
        }
        <?php } if(!empty($h2_size)){ ?>
        h2 {
            font-size: <?php echo intval($h2_size); ?>px;
        }
        <?php } if(!empty($h3_size)){ ?>
        h3 {
            font-size: <?php echo intval($h3_size); ?>px;
        }
        <?php } if(!empty($h4_size)){ ?>
        h4 {
            font-size: <?php echo intval($h4_size); ?>px;
        }
        <?php } if(!empty($h5_size)){ ?>
        h5 {
            font-size: <?php echo intval($h5_size); ?>px;
        }
        <?php } if(!empty($h6_size)){ ?>
        h6 {
            font-size: <?php echo intval($h6_size); ?>px;
        }
        <?php } if(!empty($menu_size)){ ?>
        header nav li a,header .simpleNav ul.sub-menu li a,.left-header li a,.left-header .sub-menu li a {
            font-size: <?php echo intval($menu_size); ?>px;
        }
        <?php } if(!empty($page_title_size)){ ?>
        h2.pg-title {
            font-size: <?php echo intval($page_title_size); ?>px;
        }
        <?php } if(!empty($post_title_size)){ ?>
        h2.pst-title {
            font-size: <?php echo intval($post_title_size); ?>px;
        }
        <?php } ?>
        /** Theme Options CSS **/
        <?php $custom_css = kora_wp_option("custom_css");
        if(!empty($custom_css)){
            echo ''.$custom_css;
         } ?>
    </style>
<?php }
add_action( 'wp_head', 'kora_styling' );
// Theme Options JS
function kora_theme_options_js(){
    $custom_js = kora_wp_option("custom_js");
if(!empty($custom_js)){ ?>
    <script type="text/javascript">
        <?php echo ''.$custom_js; ?>
    </script>
<?php }
} add_action('wp_footer', 'kora_theme_options_js');
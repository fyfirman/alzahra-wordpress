<?php
/**
 * Theme Functions Page
 * @ Kora WP Theme
 * @ Kora WP Theme 2.0
 **/
// Load all scripts and stylesheets
function kora_load_styles() {
    wp_enqueue_style( 'ionicons.min' , get_template_directory_uri()."/css/ionicons.min.css");
    wp_enqueue_style( 'bootstrap.min' , get_template_directory_uri()."/css/bootstrap.min.css");
    wp_enqueue_style( 'font-awesome.min' , get_template_directory_uri()."/css/font-awesome.min.css");
    wp_enqueue_style( 'main' , get_template_directory_uri()."/css/main.css");
    wp_enqueue_style( 'style' , get_template_directory_uri()."/css/style.css");
    wp_enqueue_style( 'responsive' , get_template_directory_uri()."/css/responsive.css");
    wp_enqueue_style( 'animate' , get_template_directory_uri()."/css/animate.css");
    wp_enqueue_style( 'style-root' , get_template_directory_uri()."/style.css");
    wp_enqueue_style( 'Merriweather' , "https://fonts.googleapis.com/css?family=Merriweather:400,300italic,300,400italic,700,700italic,900,900italic");
    wp_enqueue_style( 'Roboto' , "https://fonts.googleapis.com/css?family=Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic");
}
add_action('wp_enqueue_scripts', 'kora_load_styles');
function kora_load_scripts_footer() {
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '', false  );
    wp_enqueue_script('wow.min', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '', true  );
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true  );
    wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true  );
    wp_enqueue_script('counter', get_template_directory_uri() . '/js/counter.js', array('jquery'), '', true  );
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true  );
    if(is_page_template('page-contact.php')){
        $map_api = kora_wp_option('map_api');
        if(!empty($map_api)){
            wp_enqueue_script('google-map', 'http://maps.google.com/maps/api/js?key='.$map_api, array('jquery'), '', false  );
        } else {
            wp_enqueue_script('google-map', 'http://maps.google.com/maps/api/js?sensor=false', array('jquery'), '', false  );
        }
    }
    /* IE Scripts */
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array('jquery'));
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js', array('jquery'));
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
// Load scripts in footer
add_action('wp_enqueue_scripts', 'kora_load_scripts_footer');
// After Theme Setup
function kora_theme_setup() {
    // Add custom backgroud support
    add_theme_support( 'custom-background' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Add editor style support
    add_editor_style(array( 'css/editor-style.css'));
    // Theme Title
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'kora_theme_setup' );
// Text Domain
load_theme_textdomain( 'kora-wp', get_template_directory() . '/languages' );
// Add custom background support
require get_template_directory() . '/lib/custom-header.php';
// Add Thumbnail Support
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}
// Content Width
if ( !isset( $content_width ) ) $content_width = 1000;
// Registering sidebars
function kora_wp_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__( 'Post Sidebar','kora-wp' ),
        'id' => 'blog',
        'description' => esc_html__( 'Widgets in this area will be shown at blog post sidebar position.','kora-wp' ),
        'before_title' => '<h6 class="font-bold margin-top-50 margin-bottom-20">',
        'after_title' => '</h6>',
        'after_widget' => '</div><div class="clearfix "></div>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Footer Widget Area 1','kora-wp' ),
        'id' => 'f1',
        'description' => esc_html__( 'Widgets in this area will be shown at footer widget area 1 position.','kora-wp' ),
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        'after_widget' => '</div><div class="clearfix margin-bottom-20"></div>',
        'before_widget' => '<div id="%1$s" class="%2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Footer Widget Area 2','kora-wp' ),
        'id' => 'f2',
        'description' => esc_html__( 'Widgets in this area will be shown at footer widget area 2 position.','kora-wp' ),
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        'after_widget' => '</div><div class="clearfix margin-bottom-20"></div>',
        'before_widget' => '<div id="%1$s" class="%2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Footer Widget Area 3','kora-wp' ),
        'id' => 'f3',
        'description' => esc_html__( 'Widgets in this area will be shown at footer widget area 3 position.','kora-wp' ),
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        'after_widget' => '</div><div class="clearfix margin-bottom-20"></div>',
        'before_widget' => '<div id="%1$s" class="%2$s">'
    ));
}
add_action( 'widgets_init', 'kora_wp_widgets_init' );
// Registering Menus
function kora_register_menu() {
    $locations = array(
        'primary-menu' => esc_html__( 'Primary Menu', 'kora-wp' )
    );
    register_nav_menus( $locations );
}
add_action( 'init', 'kora_register_menu' );
// Changing excerpt 'more' text
function new_excerpt_more($more) {
    global $post;
}
add_filter('excerpt_more', 'new_excerpt_more');
//kora multiple excerpt
function kora_excerpt($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if(strlen($excerpt)>$charlength) {
        $subex = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
        $excut = -(strlen($exwords[count($exwords)-1]));
        if($excut<0) {
            echo do_shortcode(substr($subex,0,$excut));
        } else {
            echo do_shortcode($subex);
        }
        echo "..";
    } else {
        echo do_shortcode($excerpt);
    }
}
function kora_shortcode_excerpt($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if(strlen($excerpt)>$charlength) {
        $subex = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
        $excut = -(strlen($exwords[count($exwords)-1]));
        if($excut<0) {
            return do_shortcode(substr($subex,0,$excut));
        } else {
            return do_shortcode($subex);
        }
    } else {
        return do_shortcode($excerpt);
    }
}
// Controling excerpt length
function custom_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// Get Feature Image URL By Post ID
function get_feature_image_url($post_id){
    $image_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
    return $image_url;
}
//Pagination
function kora_pagination($pages = '', $range = 2){
    $showitems = ($range * 2)+1;
    $paged = $GLOBALS['paged'];
    if(empty($paged)) $paged = 1;
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages){
        echo "<div class='clearfix clear'></div>";
        echo "<ul class='pagination no-margin animate fadeInUp' data-wow-delay='0.4s'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'><i class='fa fa-long-arrow-left'></i></a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&laquo;</a></li>";
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<li><a class='current'>".sprintf('%02d', $i).".</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".sprintf('%02d', $i).".</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&raquo;</a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'><i class='fa fa-long-arrow-right'></i></a></li>";
        echo "</ul>\n";
    }
}
// Set avatar Class
add_filter('get_avatar','add_gravatar_class');
function add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar img-circle", $class);
    return $class;
}
// Registering custom Comments
function kora_comment($comment, $args, $depth) {
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = '';
        $add_below = 'div-comment';
    } ?>
    <li class="margin-bottom-30">
        <div class="media">
            <div class="media-left">
                <div class="avatar">
                    <?php echo get_avatar( $comment, 70 ); ?>
                </div>
            </div>
            <div class="media-body">
                <div class="a-com">
                    <span class="a-name text-color-primary"><?php comment_author(); ?></span>
                    <span class="date"><?php printf( esc_html__('%1$s at %2$s','kora-wp'), get_comment_date(),  get_comment_time()); ?></span>
                    <p class="margin-top-20"><?php comment_text(); ?></p>
                    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>
            </div>
        </div>
    </li>
<?php
}
// Setting Post Views Count
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0);
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Kora Styles
include_once(get_template_directory() . '/kora-styles.php');
// Google Web Fonts For Theme Options
function kora_theme_options_fonts_url() {
    $heading_font = kora_wp_option("headings_font_face");
    if(empty($heading_font)){
        $heading_font = 'Dancing Script';
    }
    $heading_weight = kora_wp_option("headings_font_weight");
    if(empty($heading_weight)){
        $heading_weight = 400;
    }
    $meta_font = kora_wp_option("meta_font_face");
    if(empty($meta_font)){
        $meta_font = 'Roboto';
    }
    $meta_weight = kora_wp_option("meta_font_weight");
    if(empty($meta_weight)){
        $meta_weight = 700;
    }
    $body_font = kora_wp_option("body_font_face");
    if(empty($body_font)){
        $body_font = 'Oswald';
    }
    $body_weight = kora_wp_option("body_font_weight");
    if(empty($body_weight)){
        $body_weight = 700;
    }

    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'kora-wp' ) ) {
        $font_url = add_query_arg( 'family', urlencode( $heading_font.'|'.$meta_font.'|'.$body_font.':'.$heading_weight.','.$meta_weight.','.$body_weight ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
// Enqueue Fonts For Theme Options
function kora_theme_options_scripts() {
    wp_enqueue_style( 'kora-theme-options-fonts', kora_theme_options_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'kora_theme_options_scripts' );
//Plugin Activation Class
function kora_style_tgm() {
    echo '<style type="text/css"> #setting-error-tgmpa {width: 95% !important;}</style>';
}
add_action( 'admin_head', 'kora_style_tgm' );
require_once(get_template_directory() .'/lib/plugin-activation.php');
add_action( 'tgmpa_register', 'kora_register_required_plugins' );
function kora_register_required_plugins() {
    $plugins = array(
        // Advanced Custom Fields
        array(
            'name'      => esc_html__('Advanced Custom Fields','kora-wp'),
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
        // Visual Composer
        array(
            'name'               => esc_html__('Visual Composer','kora-wp'),
            'slug'               => 'js_composer',
            'source'             => get_template_directory_uri() . '/lib/plugins/js_composer.zip',
            'required'           => true,
        ),
        // Theme Core
        array(
            'name'               => esc_html__('Theme Core','kora-wp'),
            'slug'               => 'theme-core',
            'source'             => get_template_directory_uri() . '/lib/plugins/theme-core.zip',
            'required'           => true,
        ),
        // Kora Revolution Slider
        array(
            'name'               => esc_html__('Revolution Slider','kora-wp'),
            'slug'               => 'revslider',
            'source'             => get_template_directory() . '/lib/plugins/revslider.zip',
            'required'           => true,
        ),
        // Contact Form 7
        array(
            'name'      => esc_html__('Contact Form 7','kora-wp'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),

    );
    $config = array(
        'id'           => 'kora-wp',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',

    );
    tgmpa( $plugins, $config );
}
/* Visual Composer Functions */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// check for plugin using plugin name
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    require_once( get_template_directory() . '/lib/visual-composer.php' );
    function kora_vc_styles() {
        wp_register_style( 'kora_vc_icons', get_template_directory_uri() . '/lib/vc_icons/kora_vc_icons.css', false, '1.0.0' );
        wp_enqueue_style( 'kora_vc_icons' );
    }
    add_action( 'admin_enqueue_scripts', 'kora_vc_styles' );
}
// Option Hook
function kora_wp_option( $name ){
    if(function_exists('vp_option')){
        return vp_option( "vpt_option." . $name );
    } else{
        return '';
    }
}
// Get Post/Pages Meta Fields
function kora_get_field( $name ){
    if(function_exists('get_field')){
        if(is_category() || (function_exists('is_product_category') && is_product_category()) ||
            (function_exists('is_product_tag') && is_product_tag())){
            $queried_object = get_queried_object();
            return get_field($name,$queried_object);
        } elseif(function_exists('is_shop') && is_shop()){
            $shop_id = get_option( 'woocommerce_shop_page_id' );
            return get_field($name,$shop_id);
        } elseif(is_home() || is_404()){
            // Do Nothing
        } else {
            return get_field($name);
        }
    } else{
        return '';
    }
}
// Google Maps Data For Contact Template
function kora_google_map(){
if ( is_page_template( 'page-contact.php' )) {
    $map_latitude = kora_get_field('map_latitude');
    $map_longitude = kora_get_field('map_longitude');
    $zoom_level = kora_get_field('zoom_level');
    $map_marker = kora_get_field('map_marker');
    $hide_map = kora_get_field('hide_map');
    if($hide_map != 'yes'){ ?>
    <script type="text/javascript">
        var map;
        function initialize_map() {
            if (jQuery('#map').length) {
                var myLatLng = new google.maps.LatLng(<?php echo esc_attr($map_latitude); ?>, <?php echo esc_attr($map_longitude); ?>);
                var mapOptions = {
                    zoom: <?php echo esc_attr($zoom_level); ?>,
                    center: myLatLng,
                    scrollwheel: false,
                    panControl: false,
                    zoomControl: true,
                    scaleControl: false,
                    mapTypeControl: false,
                    streetViewControl: false
                };
                map = new google.maps.Map(document.getElementById('map'), mapOptions);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    tittle: '',
                    icon: '<?php echo esc_url($map_marker); ?>'
                });}
            else {
                return false;
            }}
        google.maps.event.addDomListener(window, 'load', initialize_map);
    </script>
<?php } }
}
add_action('wp_footer', 'kora_google_map');
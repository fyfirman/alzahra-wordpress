<?php


class BershkaEnqueueAssets{

    const ASSETS_DIRECTORY_URI = '/assets/';

    public function __construct() {
        $theme_info = wp_get_theme();
        $this->assets_dir = get_template_directory_uri() . self::ASSETS_DIRECTORY_URI;
        $this->theme_version = $theme_info['Version'];
        $this->vl_init_assets();
    }

    public function vl_init_assets(){
        add_action('wp_enqueue_scripts', array($this, 'vl_enqueue_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'vl_enqueue_styles'));
        add_action('admin_enqueue_scripts', array($this, 'vl_enqueue_styles_admin'));
    }

    public function vl_enqueue_scripts() {
        if(is_singular() && comments_open()) {
            wp_enqueue_script('comment-reply');
        }
        wp_enqueue_script('vl-plugins', $this->assets_dir .'scripts/plugins.min.js', array('jquery'), $this->theme_version, true);
        wp_enqueue_script('vl-custom-script', $this->assets_dir .'scripts/script.js', array('jquery'), $this->theme_version, true);
    }

    public function fonts_url() { 
        $fonts_url = ''; 
        $fonts = array(); 
        $subsets = 'latin-ext'; 
        $fonts[] = 'Source+Sans+Pro:400,400italic,700,700italic';
        $fonts[] = 'Droid+Serif:400italic';

        if ( $fonts ) { 
            $fonts_url = add_query_arg( array( 
                'family' => urlencode( implode( '|', $fonts ) ), 
                'subset' => urlencode( $subsets ), 
            ), 'https://fonts.googleapis.com/css' ); 
        } 
        return $fonts_url; 
    }

    public function vl_enqueue_styles() {
        wp_enqueue_style('fontawesome', $this->assets_dir .'fonts/fontawesome/font-awesome.min.css', array(), $this->theme_version);
        wp_enqueue_style('iconsmind', $this->assets_dir .'fonts/iconsmind/iconsmind.css', array(), $this->theme_version);
        wp_enqueue_style('vl-plugins', $this->assets_dir .'css/plugins.min.css', array(), $this->theme_version);
        wp_enqueue_style('vl-custom-css', $this->assets_dir .'css/style.css', array(), $this->theme_version);

        if ( !class_exists( 'Kirki' ) ) {
            wp_enqueue_style( 'vl-google-fonts', $this->fonts_url(), false, $this->theme_version );
            wp_enqueue_style( 'vl-customizer', VINERO_THEME_DIRECTORY .'framework/customizer.css', array(), $this->theme_version );
        }

    }

    public function vl_enqueue_styles_admin() {
        wp_enqueue_style('fontawesome', $this->assets_dir .'fonts/fontawesome/font-awesome.min.css', array(), $this->theme_version);
        wp_enqueue_style('vl-custom-admin-css', $this->assets_dir .'css/wp-admin.css', array(), $this->theme_version);
        wp_enqueue_script('vl-admin', $this->assets_dir .'scripts/admin.js', array('jquery'), $this->theme_version, true);
    }

}


new BershkaEnqueueAssets;
<?php

    $logo_image = get_theme_mod('header_logo', VINERO_THEME_DIRECTORY . 'assets/img/logo.png');
    $output_logo_image = '<img src="'.$logo_image.'" alt="'.get_bloginfo('name').'" style="max-height:'.get_theme_mod('header_height', '13px').';">';
    $header_class = 'vl-header-holder';
    $header_class .= ' vl-header-' . get_theme_mod('header_position', 'fixed');
?>

<header class="<?php echo vinero_sanitize_class($header_class); ?>" data-header-fixed="<?php echo get_theme_mod('header_fixed', true); ?>">
    <div class="container">
        <div class="vl-header-inner">


            <div class="vl-header-left">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="vl-site-logo">
                    <?php
                    echo wp_kses($output_logo_image , array(
                        'img' => array(
                            'src' => array(),
                            'alt' => array(),
                            'class' => array(),
                            'style' => array()
                        )
                    ));
                    ?>
                </a>
            </div>

            <div class="vl-header-right">

                <div class="vl-menu-toggle vl-aside-menu-toggle" data-before-text="<?php esc_html_e('Menu', 'vinero'); ?>">
                    <span class="line line-one"><span class="inner"></span></span>
                    <span class="line line-two"><span class="inner"></span></span>
                    <span class="line line-three"><span class="inner"></span></span>
                </div>

            </div>

        </div>
    </div>
</header>
<!--/.vl-header-holder-->



<div class="vl-navigation-aside-holder">
    <div class="vl-navigation-aside">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'depth' => 3,
            'container' => false,
            'fallback_cb' => 'vinero_fallback_menu'
        ));
        ?>
        <?php get_template_part('templates/header/global/vinero-header', 'socials'); ?>
    </div>
</div>
<!--/.vl-navigation-aside-holder-->

<div class="vl-navigation-aside-overlay"></div>
<!--/.vl-navigation-aside-overlay-->

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<?php $extra_classes = kora_get_field('extra_classes');
$enable_dark = kora_wp_option('enable_dark');
if(!empty($extra_classes) || $enable_dark == 1){
    $enable_dark_class = 'dark-layout';
    $bClass = $extra_classes.' '.$enable_dark_class;
} else {
    $bClass = '';
} ?>
<body <?php body_class($bClass); ?>>
<?php $disable_pre_loader = kora_wp_option('disable_pre_loader');
if($disable_pre_loader != 1){
    $pre_loader_text = kora_wp_option('pre_loader_text');
    $pre_loader_logo = kora_wp_option('pre_loader_logo'); ?>
    <!-- LOADER -->
    <div id="loader">
        <div class="loader">
            <div class="position-center-center">
                <?php if(!empty($pre_loader_logo)){ ?>
                    <img src="<?php echo esc_url($pre_loader_logo); ?>" alt="">
                <?php } ?>
                <?php if(!empty($pre_loader_text)){ ?>
                    <p class="font-merriweather font-italic text-center"><?php echo esc_attr($pre_loader_text); ?></p>
                <?php } ?>
                <div class="loaderContainer">
                    <div class="loaderBG">
                        <span class="loaderCircle"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Page Wrap -->
<div id="wrap" class="no-padding">
    <?php $enable_hamburg_menu = kora_wp_option('enable_hamburg_menu');
    if($enable_hamburg_menu == 1){ ?>
    <!-- Nav Button -->
    <a id="cd-menu-trigger" class="fix-navi-btn light-navi" href="#.">
        <span class="cd-menu-icon"></span>
    </a>
    <!-- Header Left -->
    <nav id="cd-lateral-nav" class="left-header">
        <!-- Logo -->
        <div class="text-center">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php $logo = kora_wp_option('image_logo');
                if(!empty($logo)){ ?>
                    <img src="<?php echo esc_url($logo); ?>" alt="">
                <?php } else{ ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-2.png" alt="" >
                <?php } ?>
            </a>
        </div>

        <!-- Menu -->
        <ul class="cd-navigation">
            <?php if ( has_nav_menu( 'primary-menu' ) ) :
                wp_nav_menu( array( 'theme_location' => 'primary-menu','container' => '','items_wrap' => '%3$s' ) );
            else:
                echo '<li><a>' . esc_html__( 'Define your site menu', 'kora-wp' ) . '</a></li>';
            endif; ?>
        </ul>
    </nav>
    <!-- Main Content -->
    <div class="cd-main-content">
        <div id="main-wrapper">
            <?php } else{ ?>
            <div id="main-wrapper">
                <!-- HEADER -->
                <header class="main-header header-fix">
                    <div class="container">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php $logo = kora_wp_option('image_logo');
                                if(!empty($logo)){ ?>
                                    <img src="<?php echo esc_url($logo); ?>" alt="">
                                <?php } else{ ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="">
                                <?php } ?>
                            </a>
                        </div>
                        <!-- Nav -->
                        <nav>
                            <div class="showhide navbar-toggle collapsed" data-toggle="collapse" data-target=".simpleNav" aria-expanded="false" aria-controls="simpleNav" role="navigation">
                                <span class="title"></span>
                                <span class="icon fa fa-bars"></span>
                            </div>
                            <ul id="simpleNav" class="simpleNav collapse">
                                <?php if ( has_nav_menu( 'primary-menu' ) ) :
                                    wp_nav_menu( array( 'theme_location' => 'primary-menu','container' => '','items_wrap' => '%3$s' ) );
                                else:
                                    echo '<li><a>' . esc_html__( 'Define your site menu', 'kora-wp' ) . '</a></li>';
                                endif; ?>
                            </ul>
                        </nav>
                    </div>
                </header>
                <?php } ?>
                <div class="clear"></div>
                <?php if ( get_header_image() ) : ?>
                    <div id="site-header">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                        </a>
                    </div>
                <?php endif; ?>
                <div class="clear"></div>
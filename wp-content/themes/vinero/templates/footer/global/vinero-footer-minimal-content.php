<div class="text-center">

    <?php if(get_theme_mod('footer_logo', true)): ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="vl-site-logo">
            <?php
                $logo_image = get_theme_mod('header_logo', VINERO_THEME_DIRECTORY . 'assets/img/logo.png');
                $output_logo_image = '<img src="'.$logo_image.'" alt="'.get_bloginfo('name').'" style="max-height:'.get_theme_mod('header_height', '13px').';">';
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
    <?php endif; ?>

    <?php
        if(has_nav_menu('footer-menu')){
            echo '<div class="vl-footer-menu">';
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'depth' => 1,
            ));
            echo '</div>';
        }
    ?>

    <div class="vl-footer-copyright">
        <p><?php echo get_theme_mod('footer_copyright', 'Your copyright'); ?></p>
    </div>

</div>

<!-- Footer -->
<footer class="light-gray-bg">
    <div class="container">
        <!-- Social Links -->
        <ul class="social-link margin-top-0 margin-bottom-80 text-center">
            <?php $facebook = kora_wp_option('facebook');
            $twitter = kora_wp_option('twitter');
            $dribbble = kora_wp_option('dribbble');
            $google = kora_wp_option('google');
            $linkedin = kora_wp_option('linkedin');
            $pinterest = kora_wp_option('pinterest');
            $behance = kora_wp_option('behance');
            $instagram = kora_wp_option('instagram');
            if(!empty($facebook)){ ?>
                <li><a href="<?php echo esc_url($facebook); ?>"><?php echo esc_html__('Facebook','kora-wp'); ?></a></li>
            <?php } if(!empty($google)){ ?>
                <li><a href="<?php echo esc_url($google); ?>"><?php echo esc_html__('Google+','kora-wp'); ?></a></li>
            <?php } if(!empty($twitter)){ ?>
                <li><a href="<?php echo esc_url($twitter); ?>"><?php echo esc_html__('Twitter','kora-wp'); ?></a></li>
            <?php } if(!empty($behance)){ ?>
                <li><a href="<?php echo esc_url($behance); ?>"><?php echo esc_html__('Behance','kora-wp'); ?></a></li>
            <?php } if(!empty($dribbble)){ ?>
                <li><a href="<?php echo esc_url($dribbble); ?>"><?php echo esc_html__('Dribbble','kora-wp'); ?></a></li>
            <?php } if(!empty($linkedin)){ ?>
                <li><a href="<?php echo esc_url($linkedin); ?>"><?php echo esc_html__('Linkedin','kora-wp'); ?></a></li>
            <?php } if(!empty($pinterest)){ ?>
                <li><a href="<?php echo esc_url($pinterest); ?>"><?php echo esc_html__('Pinterest','kora-wp'); ?></a></li>
            <?php } if(!empty($instagram)){ ?>
                <li><a href="<?php echo esc_url($instagram); ?>"><?php echo esc_html__('Instagram','kora-wp'); ?></a></li>
            <?php } ?>
        </ul>
        <!-- Footer Row -->
        <div class="row">
            <!-- Left Section -->
            <div class="col-sm-4">
                <?php if ( ! dynamic_sidebar( 'f1' ) ) : ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-4 margin-top-30 text-center">
                <?php if ( ! dynamic_sidebar( 'f2' ) ) : ?>
                <?php endif; ?>
            </div>
            <!-- Right Section -->
            <div class="col-sm-4 text-right">
                <?php if ( ! dynamic_sidebar( 'f3' ) ) : ?>
                <?php endif; ?>
            </div>
        </div>
        <?php $footer_copyright = kora_wp_option('footer_copyright');
        if(!empty($footer_copyright)){ ?>
            <div class="clearfix"></div>
            <div class="copyright">
                <p><?php echo esc_attr($footer_copyright); ?></p>
            </div>
        <?php } ?>
    </div>
</footer>
<?php $enable_hamburg_menu = kora_wp_option('enable_hamburg_menu');
if($enable_hamburg_menu == 1){
    echo '</div>';
} ?>
</div>
</div>
<!-- Wrap End -->
<?php wp_footer(); ?>
</body>
</html>
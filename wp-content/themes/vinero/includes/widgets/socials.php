<?php


class vinero_widget_socials extends WP_Widget {

    public function __construct() {
        $widget_details = array(
            'classname' => 'vinero_widget_socials',
            'description' => esc_html__('Display Social Links.', 'vinero')
        );
        parent::__construct('vinero_widget_socials', esc_html__('Vinero: Social Links', 'vinero'), $widget_details);
    }

    public function widget($args, $instance) {

        if (!isset( $args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = !empty($instance['title']) ? $instance['title'] : '';

        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        echo $args['before_widget'];

        $widget_id = $args['widget_id'];


        $twitter = get_field('twitter', 'widget_' . $widget_id);
        $dribbble = get_field('dribbble', 'widget_' . $widget_id);
        $facebook = get_field('facebook', 'widget_' . $widget_id);
        $google_plus = get_field('google_plus', 'widget_' . $widget_id);
        $linkedin = get_field('linkedin', 'widget_' . $widget_id);
        $pinterest = get_field('pinterest', 'widget_' . $widget_id);
        $instagram = get_field('instagram', 'widget_' . $widget_id);
        $youtube = get_field('youtube', 'widget_' . $widget_id);
        $flickr = get_field('flickr', 'widget_' . $widget_id);
        $tumblr = get_field('tumblr', 'widget_' . $widget_id);
        $deviantart = get_field('deviantart', 'widget_' . $widget_id);
        $skype = get_field('skype', 'widget_' . $widget_id);
        $vimeo = get_field('vimeo', 'widget_' . $widget_id);
        $digg = get_field('digg', 'widget_' . $widget_id);
        $github = get_field('github', 'widget_' . $widget_id);
        $vine = get_field('vine', 'widget_' . $widget_id);
        $soundcloud = get_field('soundcloud', 'widget_' . $widget_id);
        $vk = get_field('vk', 'widget_' . $widget_id);
        $behance = get_field('behance', 'widget_' . $widget_id);


        if($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }


        if(!empty($twitter)) {  echo '<a class="twitter" title="Twitter" target="_blank" href="' . esc_url($twitter) . '"><i class="fa fa-fw fa-twitter"></i></a>'; }
        if(!empty($dribbble)) { echo '<a class="dribbble" title="Dribbble" target="_blank" href="' . esc_url($dribbble) . '"><i class="fa fa-fw fa-dribbble"></i></a>'; }
        if(!empty($facebook)) { echo '<a class="facebook" title="Facebook" target="_blank" href="' . esc_url($facebook) . '"><i class="fa fa-fw fa-facebook"></i></a>'; }
        if(!empty($google_plus)) { echo '<a class="google_plus" title="Google Plus" target="_blank" href="' . esc_url($google_plus) . '"><i class="fa fa-fw fa-google-plus"></i></a>'; }
        if(!empty($linkedin)) { echo '<a class="linkedin" title="LinkedIn" target="_blank" href="' . esc_url($linkedin) . '"><i class="fa fa-fw fa-linkedin"></i></a>'; }
        if(!empty($pinterest)) { echo '<a class="pinterest" title="Pinterest" target="_blank" href="' . esc_url($pinterest) . '"><i class="fa fa-fw fa-pinterest"></i></a>'; }
        if(!empty($instagram)) {  echo '<a class="instagram" title="Instagram" target="_blank" href="' . esc_url($instagram) . '"><i class="fa fa-fw fa-instagram"></i></a>'; }
        if(!empty($youtube)) { echo '<a class="youtube" title="Youtube" target="_blank" href="' . esc_url($youtube) . '"><i class="fa fa-fw fa-youtube"></i></a>'; }
        if(!empty($flickr)) { echo '<a class="flickr" title="Flickr" target="_blank" href="' . esc_url($flickr) . '"><i class="fa fa-fw fa-flickr"></i></a>'; }
        if(!empty($tumblr)) { echo '<a class="tumblr" title="Tumblr" target="_blank" href="' . esc_url($tumblr) . '"><i class="fa fa-fw fa-tumblr"></i></a>'; }
        if(!empty($vine)) { echo '<a class="vine" title="Vine" target="_blank" href="' . esc_url($vine) . '"><i class="fa fa-fw fa-vine"></i></a>'; }
        if(!empty($vk)) { echo '<a class="vk" title="VK" target="_blank" href="' . esc_url($vk) . '"><i class="fa fa-fw fa-vk"></i></a>'; }
        if(!empty($deviantart)) { echo '<a class="deviantart" title="Deviantart" target="_blank" href="' . esc_url($deviantart) . '"><i class="fa fa-fw fa-deviantart"></i></a>'; }
        if(!empty($skype)) { echo '<a class="skype" title="Skype" target="_blank" href="' . esc_url($skype) . '"><i class="fa fa-fw fa-skype"></i></a>'; }
        if(!empty($vimeo)) { echo '<a class="vimeo" title="Vimeo" target="_blank" href="' . esc_url($vimeo) . '"><i class="fa fa-fw fa-vimeo"></i></a>'; }
        if(!empty($digg)) { echo '<a class="digg" title="Digg" target="_blank" href="' . esc_url($digg) . '"><i class="fa fa-fw fa-digg"></i></a>'; }
        if(!empty($soundcloud)) { echo '<a class="soundcloud" title="Soundcloud" target="_blank" href="' . esc_url($soundcloud) . '"><i class="fa fa-fw fa-soundcloud"></i></a>'; }
        if(!empty($github)) { echo '<a class="github" title="Github" target="_blank" href="' . esc_url($github) . '"><i class="fa fa-fw fa-github"></i></a>'; }
        if(!empty($behance)) { echo '<a class="behance" title="Behance" target="_blank" href="' . esc_url($behance) . '"><i class="fa fa-fw fa-behance"></i></a>'; }


        echo $args['after_widget'];

    }

    public function form($instance) {

        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

        ?>
        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'vinero'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <?php

    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        return $instance;
    }
}


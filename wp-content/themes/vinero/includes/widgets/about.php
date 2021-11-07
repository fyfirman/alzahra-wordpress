<?php


class vinero_widget_about extends WP_Widget {

    public function __construct() {
        $widget_details = array(
            'classname' => 'vinero_widget_about',
            'description' => esc_html__('Display Image, Text and Link.', 'vinero')
        );
        parent::__construct('vinero_widget_about', esc_html__('Vinero: About', 'vinero'), $widget_details);

    }

  public function widget($args, $instance) {

        if (!isset( $args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = !empty($instance['title']) ? $instance['title'] : '';

        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        echo $args['before_widget'];

        $widget_id = $args['widget_id'];

        $about_image = get_field('about_image', 'widget_' . $widget_id);
        $about_text = get_field('about_text', 'widget_' . $widget_id);
        $about_link_text = get_field('about_link_text', 'widget_' . $widget_id);
        $about_link_url = get_field('about_link_url', 'widget_' . $widget_id);


        if($about_image) {
            echo '<img src="'.$about_image.'" alt="">';
        }

        if($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        if($about_text) { ?>

            <div class="vl-widget-about-content">
                <?php echo($about_text); ?>
            </div>

        <?php } ?>

        <?php if(!empty($about_link_text) && !empty($about_link_url)) { ?>

        <div class="vl-widget-about-footer">
            <a href="<?php echo esc_url($about_link_url); ?>" class="vl-btn vl-btn-primary">
                <?php echo esc_html($about_link_text); ?>
            </a>
        </div>

        <?php }

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


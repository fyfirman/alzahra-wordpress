<?php


class vinero_widget_subscribe extends WP_Widget {

    public function __construct() {
        $widget_details = array(
            'classname' => 'vinero_widget_subscribe',
            'description' => esc_html__('Display MailChimp Subscribe Form.', 'vinero')
        );
        parent::__construct('vinero_widget_subscribe', esc_html__('Vinero: Subscribe', 'vinero'), $widget_details);
    }

    public function widget($args, $instance) {

        if (!isset( $args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = !empty($instance['title']) ? $instance['title'] : '';

        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        echo $args['before_widget'];

        $widget_id = $args['widget_id'];


        $subscribe_url = get_field('subscribe_url', 'widget_' . $widget_id);
        $subscribe_text = get_field('subscribe_text', 'widget_' . $widget_id);




        if($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }


        if(!empty($subscribe_url)) { ?>

            <form method="post" action="<?php echo esc_url($subscribe_url); ?>">

                <?php if($subscribe_text) { echo($subscribe_text); } ?>
                <div class="vl-form-group">
                    <input type="email" name="EMAIL">
                </div>
                <button type="submit" class="vl-btn vl-btn-primary block"><?php esc_html_e('Subscribe', 'vinero'); ?></button>

            </form>

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


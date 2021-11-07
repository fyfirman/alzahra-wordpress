<?php




    function vinero_convert_links($status, $targetBlank = true) {

        $target = $targetBlank ? " target=\"_blank\" " : "";
        $status = preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[A-Z0-9+&@#\/%=~_|]/i', '<a href="\0" target="_blank">\0</a>', $status);
        $status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>", $status);
        $status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>", $status);

        return $status;
    }


    function vinero_relative_time($a) {

        $b = strtotime('now');
        $c = strtotime($a);
        $d = $b - $c;
        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;

        if(is_numeric($d) && $d > 0) {
            //if less then 3 seconds
            if($d < 3) return esc_html__('right now', 'vinero');
            //if less then minute
            if($d < $minute) return floor($d) . esc_html__(' seconds ago', 'vinero');
            //if less then 2 minutes
            if($d < $minute * 2) return esc_html__('about 1 minute ago',  'vinero');
            //if less then hour
            if($d < $hour) return floor($d / $minute) . esc_html__(' minutes ago', 'vinero');
            //if less then 2 hours
            if($d < $hour * 2) return esc_html__('about 1 hour ago', 'vinero');
            //if less then day
            if($d < $day) return floor($d / $hour) . esc_html__(' hours ago', 'vinero');
            //if more then day, but less then 2 days
            if($d > $day && $d < $day * 2) return esc_html__('yesterday', 'vinero');
            //if less then year
            if($d < $day * 365) return floor($d / $day) . esc_html__(' days ago', 'vinero');
            //else return more than a year
            return esc_html__('over a year ago', 'vinero');
        }

    }


    class vinero_widget_twitter extends WP_Widget {

        public function __construct() {
            $widget_details = array(
                'classname' => 'vinero_widget_twitter',
                'description' => esc_html__('Display Twitter Feed Widget.', 'vinero')
            );
            parent::__construct('vinero_widget_twitter', esc_html__('Vinero: Twitter', 'vinero'), $widget_details);
        }

      public function widget($args, $instance) {

          if (!isset($args['widget_id'])) {
              $args['widget_id'] = $this->id;
          }

          $title = !empty($instance['title']) ? $instance['title'] : '';

          $title = apply_filters('widget_title', $title, $instance, $this->id_base);

          echo $args['before_widget'];

          $widget_id = $args['widget_id'];

          $twt_cache_time = get_field('twt_cache_time', 'widget_' . $widget_id);
          $twt_max_tweets = get_field('twt_max_tweets', 'widget_' . $widget_id);
          $twt_consumer_key = get_field('twt_consumer_key', 'widget_' . $widget_id);
          $twt_consumer_secret = get_field('twt_consumer_secret', 'widget_' . $widget_id);
          $twt_access_token = get_field('twt_access_token', 'widget_' . $widget_id);
          $twt_access_token_secret = get_field('twt_access_token_secret', 'widget_' . $widget_id);

          if($title) {
              echo $args['before_title'] . $title . $args['after_title'];
          }

          if(empty($twt_consumer_key) || empty($twt_consumer_key) || empty($twt_access_token) || empty($twt_access_token_secret) || empty($twt_cache_time)) {

              echo '<p>' . esc_html__('Unable to load tweets. Please enter all required fields.', 'vinero') . '</p>';

          } else {

              // Check if transient already exists

              $tweets = get_transient('vinero_widget_twitter_tweets_' . $widget_id);

              if (!empty($tweets)) {

                  // Fetch tweets from the transient
                  $tweets = maybe_unserialize($tweets);

              } else {


                  if (!function_exists('vinero_get_tweets')) {

                      echo '<p>' . esc_html__('Unable to load tweets.', 'vinero') . '</p>';

                  } else {



                      // Get Tweets via Twitter OAuth

                      $tweets = vinero_get_tweets($twt_consumer_key, $twt_consumer_secret, $twt_access_token, $twt_access_token_secret, array('count' => $twt_max_tweets, 'include_rts' => false, 'exclude_replies' => true));


                      // Check if errors have been returned

                      if (!empty($tweets) && isset($tweets->errors)) {


                          echo '<p>' . $tweets->errors[0]->message . '</p>';

                      } elseif (!empty($tweets) && !isset($tweets->errors)) {

                          // Set a new transient if no errors returned
                          set_transient('vinero_widget_twitter_tweets_' . $widget_id, maybe_serialize($tweets), $twt_cache_time * 60);

                      }
                  }
              }

              // Check if there're valid tweets

              if (isset($tweets) && !empty($tweets) && !isset($tweets->errors)) {


                  echo '<ul>';

                      foreach ($tweets as $tweet) {


                          $text = vinero_convert_links($tweet->text);
                          $screen_name = $tweet->user->screen_name;
                          $tweet_id = $tweet->id_str;
                          $time = vinero_relative_time($tweet->created_at);


                          echo '<li>';

                          echo '<p class="tweet">' . $text . '</p>';
                          echo '<p class="timestamp"><a href="https://twitter.com/' . $screen_name . '/status/' . $tweet_id . '" target="_blank">' . $time . '</a></p>';

                          echo '</li>';
                      }

                  echo '</ul>';
              }

          }

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
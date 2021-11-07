<?php

/*
 * Is Blog Page
 * */

function vinero_is_blog() {
    global $post;
    $posttype = get_post_type($post);
    return (((is_archive()) || (is_author()) || (is_search()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ($posttype == 'post')) ? true : false;
}

/*
 * Sanitize Class
 * */

function vinero_sanitize_class($class, $fallback = null) {
    if (is_string($class)) {
        $class = explode(' ', $class);
    }
    if (is_array($class) && count($class) > 0) {
        $class = array_map('sanitize_html_class', $class);
        return implode(' ', $class);
    } else {
        return sanitize_html_class($class, $fallback);
    }
}

/*
 * Sanitize Style
 * */

function vinero_sanitize_style($style) {
    $allowed_html = array(
        'style' => array()
    );
    return wp_kses($style, $allowed_html);
}

/*
 * Get Header Layout
 * */

function vinero_get_header_layout() {
    global $post;
    if (is_search() || !(isset($post->ID))) {
        return get_theme_mod('header_layout', 'fullscreen');
    }
    $header = false;
    if (class_exists('acf')) {
        $header = get_field('is_override_header', $post->ID);
    }
    if ('' == $header || false == $header || 'none' == $header) {
        $header = get_theme_mod('header_layout', 'fullscreen');
    }
    return $header;
}

/*
 * Get Footer Layout
 * */

function vinero_get_footer_layout() {
    global $post;
    if (is_search() || !(isset($post->ID))) {
        return get_theme_mod('footer_layout', 'minimal');
    }
    $footer = false;
    
    if (class_exists('acf')) {
        $footer = get_field('is_override_footer');
    }
    if ('' == $footer || false == $footer || 'none' == $footer) {
        $footer = get_theme_mod('footer_layout', 'minimal');
    }
    return $footer;
}

/*
 * Get Page Title
 * */

function vinero_get_title_layout() {
    global $post;
    if (is_search() || !(isset($post->ID))) {
        return 'hero';
    }
    $page_title = false;
    if (class_exists('acf')) {
        $page_title = get_field('is_override_page_title', $post->ID);
    }
    if ('' == $page_title || false == $page_title || 'none' == $page_title) {
        $page_title = 'hero';
    }
    return $page_title;
}

/*
 * Get Back to Top Button
 * */

function vinero_get_button_top() {
    global $post;
    if (is_search() || !(isset($post->ID))) {
        return get_theme_mod('show_back_to_top', true);
    }
    $btt = false;
    if (class_exists('acf')) {
        $btt = get_field('is_override_back_to_top');
        if ($btt == 'hide') {
            return false;
        } elseif ($btt == 'show') {
            return true;
        }
    }
    if ('' == $btt || false == $btt || 'none' == $btt) {
        $btt = get_theme_mod('show_back_to_top', true);
    }
    return $btt;
}

/*
 * Custom comment
 * */

function vinero_custom_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    global $post;
    ?>
    <li class="vl-comment-item">
    <div id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
        <div class="vl-comment-left">
            <div class="vl-comment-avatar">
                <?php echo get_avatar($comment, 50, $default = ''); ?>
            </div>
        </div>
        <div class="vl-comment-content">
            <div class="vl-comment-header-holder">
                <div class="vl-comment-header">
                    <h6 class="vl-comment-author <?php if ($comment->user_id === $post->post_author) { echo esc_attr('comment-author'); } ?>">
                        <?php comment_author(); ?>
                    </h6>
                    <div class="vl-comment-date">
                        <?php echo get_comment_date(); ?>
                    </div>
                </div>
            </div>
            <div class="vl-comment-text">
                <?php comment_text(); ?>
                <?php if ($comment->comment_approved == '0'): ?>
                    <i class="moderate">
                        <?php esc_html_e('Your comment is awaiting moderation.', 'vinero'); ?>
                    </i>
                <?php endif; ?>

                <?php edit_comment_link(esc_html__('Edit', 'vinero'), '  ', ''); ?>

                <?php
                    comment_reply_link(array_merge($args, array(
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => esc_html__('Reply', 'vinero')
                    )));
                ?>
            </div>
        </div>
    </div>
    <!-- </li> is added by WordPress automatically -->
    <?php
}

/*
 * Text Excerpt
 * */

function vinero_limit_text($content = false, $length) {
    if ($content == false) {
        return;
    }
    $content = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $content);
    $content = strip_tags($content);
    $words = explode(' ', $content, $length + 1);
    if (count($words) > $length) {
        array_pop($words);
        array_push($words, '...', '');
    }
    $content = implode(' ', $words);
    $content = esc_html($content);
    return $content;
}

/*
 * Get post taxonomy
 * */

function vinero_post_taxonomy($post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true) {
    $tags = wp_get_post_terms($post_id, $taxonomy);
    $list = '';
    foreach ($tags as $tag) {
        if ($link) {
            $list .= '<a href="' . get_category_link($tag->term_id) . '">' . $tag->$get . '</a>' . $delimiter;
        } else {
            $list .= $tag->$get . $delimiter;
        }
    }
    return substr($list, 0, strlen($delimiter) * (-1));
}

/*
 * Post share
 * */

function vinero_post_share_buttons() {
    global $post;
    $url   = urlencode(get_permalink($post->ID));
    $title = urlencode(get_the_title($post->ID));
    $media = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'vinero_fullsize');
    $output = '';
    $output .= '<a class="twitter" target="_blank" href="https://twitter.com/home?status=' . $title . '+' . $url . '"><i class="fa fa-fw fa-twitter"></i></a>';
    $output .= '<a class="facebook" target="_blank" href="https://www.facebook.com/share.php?u=' . $url . '&title=' . $title . '"><i class="fa fa-fw fa-facebook"></i></a>';
    $output .= '<a class="linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&title=' . $title . '"><i class="fa fa-fw fa-linkedin"></i></a>';
    $output .= '<a class="pinterest" target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?media=' . $media[0] . '&url=' . $url . '&is_video=false&description=' . $title . '"><i class="fa fa-fw fa-pinterest"></i></a>';
    return apply_filters('vinero/post_share_buttons', $output);
}

/*
 * Post navigation
 * */

function vinero_post_navigation() {
    $prevPost = get_adjacent_post(false, '', true);
    $nextPost = get_adjacent_post(false, '', false);
    $output = '';
    $output .= '<nav class="vl-post-navigation">';
    if (!empty($nextPost)) {
        $output .= '<div class="prev-post"><a href="' . get_permalink($nextPost->ID) . '"><i class="icon-Arrow-OutLeft"></i></a></div>';
    } else {
        $output .= '<div class="prev-post inactive"><span><i class="icon-Arrow-OutLeft"></i></span></div>';
    }
    if (!empty($prevPost)) {
        $output .= '<div class="next-post"><a href="' . get_permalink($prevPost->ID) . '"><i class="icon-Arrow-OutRight"></i></a></div>';
    } else {
        $output .= '<div class="next-post inactive"><span><i class="icon-Arrow-OutRight"></i></span></div>';
    }
    $output .= '</nav>';
    return apply_filters('vinero/post_navigation', $output);
}



/*
 * Portfolio navigation
 * */

function vinero_portfolio_navigation() {
    $prevPost = get_adjacent_post(false, '', true);
    $nextPost = get_adjacent_post(false, '', false);
    $output = '';
    $output .= '<nav class="vl-portfolio-navigation">';
    $output .= '<div class="container"><div class="vl-portfolio-navigation-inner">';
    if (!empty($nextPost)) {
        $output .= '<div class="prev-post"><a href="' . get_permalink($nextPost->ID) . '"><i class="fa fa-angle-left"></i>'.esc_html__('Previous Project', 'vinero').'</a></div>';
    } else {
        $output .= '<div class="prev-post inactive"><span><i class="fa fa-angle-left"></i>'.esc_html__('Previous Project', 'vinero').'</span></div>';
    }
    if (!empty($prevPost)) {
        $output .= '<div class="next-post"><a href="' . get_permalink($prevPost->ID) . '">'.esc_html__('Next Project', 'vinero').'<i class="fa fa-angle-right"></i></a></div>';
    } else {
        $output .= '<div class="next-post inactive"><span>'.esc_html__('Next Project', 'vinero').'<i class="fa fa-angle-right"></i></span></div>';
    }
    $output .= '</div></div>';
    $output .= '</nav>';
    return apply_filters('vinero/portfolio_navigation', $output);
}



/*
 * Comment pagination
 * */

function vinero_comment_pagination() {
    $output = '';
    if (get_comment_pages_count() > 1):
        $output .= '<nav class="vl-pagination-buttons">';
        if (get_previous_comments_link()) {
            add_filter('previous_comments_link_attributes', function() {
                return 'class="prev-page"';
            });
            $output .= get_previous_comments_link('<i class="icon-Arrow-OutLeft"></i>');
        } else {
            $output .= '<span class="prev-page inactive"><i class="icon-Arrow-OutLeft"></i></span>';
        }
        if (get_next_comments_link()) {
            add_filter('next_comments_link_attributes', function() {
                return 'class="next-page"';
            });
            $output .= get_next_comments_link('<i class="icon-Arrow-OutRight"></i>');
        } else {
            $output .= '<span class="next-page inactive"><i class="icon-Arrow-OutRight"></i></span>';
        }
        $output .= '</nav>';
    endif;
    return apply_filters('vinero/comment_pagination', $output);
}

/*
 * Page navigation
 * */

function vinero_pagination($query = null, $paginated = 'numeric') {
    if ($query == null) {
        global $wp_query;
        $query = $wp_query;
    }
    $page  = $query->query_vars['paged'];
    $pages = $query->max_num_pages;
    $paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
    if ($page == 0) {
        $page = 1;
    }
    $output = '';
    if ($pages > 1) {
        if ($paginated == 'buttons') {
            $output .= '<nav class="vl-pagination-buttons">';
            $output .= '<ul>';
            if ($page + 1 <= $pages) {
                $output .= '<li class="prev-page"><a href="' . get_pagenum_link($page + 1) . '"><i class="fa fa-fw fa-angle-left"></i><span>'.esc_html__('Prev', 'vinero').'</span></a></li>';
            } else {
                $output .= '<li class="prev-page inactive"></li>';
            }
            if ($page - 1 >= 1) {
                $output .= '<li class="next-page"><a href="' . get_pagenum_link($page - 1) . '"><i class="fa fa-fw fa-angle-right"></i><span>'.esc_html__('Next', 'vinero').'</span></a></li>';
            } else {
                $output .= '<li class="next-page inactive"></li>';
            }
            $output .= '</ul>';
            $output .= '</nav>';
        }
        if ($paginated == 'numeric') {
            $numeric_links = paginate_links(array(
                'foramt' => '',
                'add_args' => '',
                'current' => $paged,
                'total' => $pages,
                'prev_text' => esc_html__('Prev', 'vinero'),
                'next_text' => esc_html__('Next', 'vinero'),
            ));
            $output .= '<nav class="vl-pagination-numeric">';
            $output .= $numeric_links;
            $output .= '</nav>';
        }
        if ($paginated == 'ajax') {
            $output .= '<nav class="vl-pagination-load-more-btn"><a href="#" class="vl-btn vl-btn-primary vl-btn-ajax-load">' . esc_html__('Load More', 'vinero') . '</a></nav>';
            $output .= vinero_load_more_btn($query);
        }
        if ($paginated == 'infinite') {
            $output .= '<nav class="vl-infinity-load"><a href="' . next_posts($pages, false) . '"></a></nav>';
            $output .= vinero_infinity_scroll($query);
        }
    }
    return apply_filters('vinero/pagination', $output);
}

/*
 * Post views
 * */

function vinero_set_post_views($postID) {
    $count_key = 'vinero_post_views_count';
    $count     = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

add_action('wp_head', 'vinero_track_post_views');

function vinero_track_post_views($postID) {
    if (!is_single()) {
        return;
    }
    if (empty($postID)) {
        global $post;
        $postID = $post->ID;
    }
    vinero_set_post_views($postID);
}


function vinero_get_post_views($postID) {
    $count_key = 'vinero_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

/*
 * Reading Time
 * */

function vinero_reading_time() {
    global $post;
    $wpm     = 200;
    $words   = str_word_count(strip_tags($post->post_content));
    $minutes = floor($words / $wpm);
    if (1 <= $minutes) {
        $output = $minutes . esc_html__(' min read', 'vinero');
    } else {
        $output = esc_html__('1 min read', 'vinero');
    }
    return apply_filters('vinero/reading_time', $output);
}

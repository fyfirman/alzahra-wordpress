<?php
/**
 * Theme Comments
 * @Kora WP
 * @Kora WP 2.0
 **/
// load comment scripts only on single pages
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
?>
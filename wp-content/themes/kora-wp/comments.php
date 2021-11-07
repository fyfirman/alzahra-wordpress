<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<div class="comments">
    <?php if ( have_comments() ) : ?>
    <!-- Main Heading -->
    <div class="heading-side-bar margin-bottom-50 margin-top-100">
        <h4 class="font-bold"><?php esc_html_e('Comments ','kora-wp'); comments_number( '0', '1', '%' ); ?></h4>
    </div>
    <ul class="pad-l-0">
        <?php wp_list_comments('type=comment&callback=kora_comment'); ?>

    </ul>
        <div class="clear clearfix"></div>
        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'kora-wp' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'kora-wp' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'kora-wp' ) ); ?></div>
            </nav>
        <?php endif;
    endif; ?>
    <!-- Comments Form -->
    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $fields =  array(
        'author' =>
        '<li class="col-sm-4 margin-top-20">
                    <label>'.esc_html__('*NAME','kora-wp').'<input id="author" placeholder="" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'"/></label>
                </li>',
        'email' =>
        '<li class="col-sm-4 margin-top-20">
                    <label>'.esc_html__('*EMAIL ADDRESS','kora-wp').'<input id="email" placeholder="" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/></label>
                </li>',
        'url' =>
        '<li class="col-sm-4 margin-top-20">
                    <label> '.esc_html__('WEBSITE','kora-wp').'<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" /></label>
                </li>'
    );
    $args = array(
        'id_form'           => 'commentform',
        'class_form'      => 'comment-form',
        'id_submit'         => 'submit',
        'class_submit'      => 'btn btn-dark',
        'name_submit'       => 'submit',
        'title_reply'       => '',
        'title_reply_to'    => '',
        'cancel_reply_link' => '',
        'comment_notes_after' => '',
        'comment_notes_before' => '',
        'label_submit'      => __( 'POST COMMENT','kora-wp' ),
        'format'            => 'xhtml',
        'comment_field' =>  '<li class="col-sm-12">' .
            '<textarea id="comment" name="comment" placeholder="'.esc_html__('YOUR MESSAGE','kora-wp').'" aria-required="true">' .
            '</textarea></li>',
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    ); ?>
    <?php if ( comments_open() ) : ?>
        <div class="comment-form">
        <!-- Main Heading -->
        <div class="heading-side-bar margin-top-80">
            <h4 class="font-bold"><?php esc_html_e('Post to Reply','kora-wp'); ?></h4>
        </div>
            <ul class="row pad-l-0">
                <?php comment_form($args); ?>
            </ul>
    </div>
    <?php endif; ?>
</div>
<!-- End -->
<script type="text/javascript">
    // Change submit HTML
    jQuery(".comment-form p.form-submit").each(function () {
        jQuery(this).replaceWith("<li class='col-sm-12'>" + jQuery(this).html() + "</li>");
    });
    // Add class to the children comments
    jQuery(".comments ul.children").each(function () {
        jQuery(this).addClass('margin-left-100');
    });
    // Change reply text
    jQuery( document ).ready(function() {
        // Adding Reply Class
        jQuery( ".comment-reply-link" ).addClass( "reply text-right" );
        jQuery( ".reply" ).removeClass( "comment-reply-link" );
        jQuery( '.reply' ).html( ' REPLAY <i class="fa fa-reply"></i>' );
    });
</script>
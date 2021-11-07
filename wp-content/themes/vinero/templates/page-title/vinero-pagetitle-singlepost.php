<div class="vl-hero-title-holder jarallax" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
    <div class="vl-hero-title-inner">
        <h1 class="vl-hero-title"><?php the_title(); ?></h1>
        <div class="vl-hero-meta">
        	<div class="vl-post-meta">
        		<span class="vl-post-author"><i class="fa fa-fw fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span>
				<span class="vl-post-date"><i class="fa fa-fw fa-clock-o"></i><time datetime="<?php the_time( 'c' ); ?>'"><?php echo get_the_date(); ?></time></span>
				<span class="vl-post-comments"><i class="fa fa-fw fa-comment-o"></i><a class="no-anims" href="<?php comments_link(); ?>"><?php comments_number(esc_html__('0 Comments', 'vinero'), esc_html__('1 Comment', 'vinero'), esc_html__('% Comments', 'vinero')); ?></a></span>
        	</div>
        </div>
    </div>
</div>
<!--/.vl-hero-title-holder-->
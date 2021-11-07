<?php get_header(); ?>

<?php get_template_part('templates/page-title/vinero-pagetitle-hero', 'blog'); ?>

<main class="vl-main-holder vl-main-padding">
	<div class="container">

        <div class="row">
            <div class="col-md-9">
                <div class="vl-postlist-holder">
                    <?php
                    if (have_posts()):
                        get_template_part('loop/loop-blog', get_theme_mod('blog_layout', 'standard'));
                        echo vinero_pagination(null, get_theme_mod('blog_type_pagination', 'numeric'));

                    else:
                        get_template_part('templates/content/vinero-content', 'none');
                    endif;
                    ?>
                </div>

                <?php
                    if(get_theme_mod('blog_show_popular_news', false)){
                        get_template_part('loop/loop', 'popular-news');
                    }
                ?>
            </div>
            <div class="col-md-3 hidden-sm-down">
                <?php get_sidebar(); ?>
            </div>
        </div>

	</div>
</main>


<?php get_footer(); ?>
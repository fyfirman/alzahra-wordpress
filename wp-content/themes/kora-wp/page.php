<?php get_header();
while(have_posts()): the_post();
    $page_layout = kora_get_field('page_layout');
    $extra_classes = kora_get_field('extra_classes');
    $hide_page_title = kora_get_field('hide_page_title');
    // Banners
    get_template_part('includes/kora','banners');
    if($page_layout == 'full-width'){
        the_content();
    } else { ?>
    <section class="padding-top-30 padding-bottom-50 cn">
        <div class="container">
            <?php if($hide_page_title != 'yes'){ ?>
                <h2 class="margin-bottom-20 pg-title"><?php the_title(); ?></h2>
            <?php } ?>
            <?php the_content(); ?>
        </div>
    </section>
    <?php } ?>
    <section class="pg-comments">
        <div class="container">
            <!-- Start Comments -->
            <?php comments_template(); ?>
            <!-- End Comments -->
        </div>
    </section>
<?php endwhile;
get_footer(); ?>
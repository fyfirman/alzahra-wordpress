<?php
/*
 * Template Name: Portfolio Pages
 */
get_header();
// Banners
get_template_part('includes/kora','banners');
while(have_posts()): the_post();
    $select_portfolio_layout = get_field('select_portfolio_layout');
    if($select_portfolio_layout == 'masonry-2-column'):
        get_template_part('includes/portfolio/portfolio','two-column-masonry');
    elseif($select_portfolio_layout == 'masonry-3-column-full'):
        get_template_part('includes/portfolio/portfolio','three-column-masonry');
    elseif($select_portfolio_layout == 'normal-4-column-full'):
        get_template_part('includes/portfolio/portfolio','four-column');
    else:
        get_template_part('includes/portfolio/portfolio','three-column');
    endif;
endwhile;
get_footer(); ?>
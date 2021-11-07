<?php get_header();
// Banners
get_template_part('includes/kora','banners');
// Calling Each Category Layout
$queried_object = get_queried_object();
$select_category_page_layout = kora_get_field('select_category_page_layout');
if($select_category_page_layout == 'fullWidthParallax'):
    get_template_part('includes/categories/category','two');
elseif($select_category_page_layout == 'sideImage'):
    get_template_part('includes/categories/category','three');
else:
    get_template_part('includes/categories/category','one');
endif;
get_footer(); ?>
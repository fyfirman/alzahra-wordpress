<?php get_header();
// Banners
get_template_part('includes/kora','banners');
$page_layout = kora_get_field('page_layout');
if($page_layout == 'sidebar'):
    get_template_part('includes/post-layouts/layout','two');
else:
    get_template_part('includes/post-layouts/layout','one');
endif;
get_footer(); ?>
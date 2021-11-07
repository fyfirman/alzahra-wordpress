<?php $single_portfolio_page_layout = get_field('single_portfolio_page_layout');
if($single_portfolio_page_layout == 'popup-detailed' || $single_portfolio_page_layout == 'popup-side-info' || $single_portfolio_page_layout == 'popup-case-details'){
    // Do Nothing
} else {
    get_header();
}
while(have_posts()): the_post();
    // Banners
    get_template_part('includes/kora','banners');
    if($single_portfolio_page_layout == 'popup-detailed'):
        get_template_part('includes/single-portfolio/single','popup-detailed');
    elseif($single_portfolio_page_layout == 'popup-side-info'):
        get_template_part('includes/single-portfolio/single','popup-side-info');
    elseif($single_portfolio_page_layout == 'single-case-details'):
        get_template_part('includes/single-portfolio/single','case-details');
    elseif($single_portfolio_page_layout == 'popup-case-details'):
        get_template_part('includes/single-portfolio/single','popup-case-details');
    elseif($single_portfolio_page_layout == 'single-multi-cases'):
        get_template_part('includes/single-portfolio/single','multi-cases');
    else:
        get_template_part('includes/single-portfolio/single','detailed');
    endif;
endwhile;
if($single_portfolio_page_layout == 'popup-detailed' || $single_portfolio_page_layout == 'popup-side-info' || $single_portfolio_page_layout == 'popup-case-details'){
    // Do Nothing
} else {
    get_footer();
} ?>
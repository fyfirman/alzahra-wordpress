<?php
/*
 * Template Name: Portfolio Load More Page
 */
$number_of_portfolio_items_to_display = kora_get_field('number_of_portfolio_items_to_display');
$portfolio_items_display_order = kora_get_field('portfolio_items_display_order');
$select_portfolio_categories = esc_attr($_REQUEST['select_portfolio_categories']); // From Main Portfolio Page
if($select_portfolio_categories != 'no_cat'){
    $expo_cats = explode(',',$select_portfolio_categories);
} else {
    $expo_cats = '';
} $pl = esc_attr($_REQUEST['pl']);
if(!empty($pl)){
    $portfolio_layout = esc_attr($_REQUEST['pl']);
    $previously_loaded_posts = esc_attr($_REQUEST['number_of_posts']);
    if($portfolio_layout == 'masonry-2-column' || $portfolio_layout == 'masonry-3-column-full'){
        if(is_array($expo_cats)){
            $categories = get_terms( 'kora_genre', array(
                'orderby'    => 'count',
                'hide_empty' => 1,
                'include'    => $expo_cats
            ) );
        }else{
            $categories = get_terms( 'kora_genre', array(
                'orderby'    => 'count',
                'hide_empty' => 1
            ) );
        } $portfolio_term_array = array();
        foreach($categories as $cat) {
            $portfolio_term_array[] = $cat->slug;
        }
        $portfolio = array(
            'post_type' => 'kora_portfolio',
            'posts_per_page' => -1,
            'order' => $portfolio_items_display_order,
            'tax_query' => array(
                array(
                    'taxonomy' => 'kora_genre',
                    'field'    => 'slug',
                    'terms'    => $portfolio_term_array,
                ),
            ),
        );
        $portfolio_loop = new WP_Query($portfolio); ?>
        <!-- BLOCK -->
        <?php $portfolio_count = 1;
        $z = 0;
        $block = 1;
        while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post();
            $count_posts = wp_count_posts();
            $pub_posts = $count_posts->publish;
            $published_posts = $pub_posts - $previously_loaded_posts;
            $terms = get_the_terms(get_the_ID(), 'kora_genre');
            if($portfolio_loop->current_post >= $previously_loaded_posts){ ?>
                <?php if($portfolio_count == 1){ ?>
                    <div class="cbp-loadMore-block1">
                <?php }
                $b = $portfolio_count - $z;
            if(($b == 1) && ($portfolio_count != 1)){
                $block++; ?>
                <div class="cbp-loadMore-block<?php echo esc_attr($block); ?>">
            <?php } ?>
                <!-- Item -->
                <div class="cbp-item <?php foreach ($terms as $ter){ echo esc_attr($ter->slug). ' '; } ?>">
                    <?php if(has_post_thumbnail()){
                        echo '<img src="'.get_feature_image_url(get_the_ID()).'" alt=""/>';
                    } else {
                        echo '<img src="https://placeholdit.imgix.net/~text?txtsize=28&txt=No+Image&w=370&h=370" alt=""/>';
                    }?>
                    <div class="hover-port">
                        <div class="hover-in">
                            <div class="position-center-center full-width">
                                <h6><?php the_title(); ?></h6>
                            <span>
                                <?php $term_counter = 0;
                                $len = count($terms);
                                foreach ($terms as $ter){
                                    if ($term_counter == $len - 1) {
                                        echo esc_attr($ter->name);
                                    } else {
                                        echo esc_attr($ter->name). ' , ';
                                    }
                                    $term_counter++;
                                } ?>
                            </span>
                                <?php $single_portfolio_page_layout = kora_get_field('single_portfolio_page_layout');
                                if($single_portfolio_page_layout == 'popup-detailed' || $single_portfolio_page_layout == 'popup-side-info'|| $single_portfolio_page_layout == 'popup-case-details'){
                                    $single = 'cbp-singlePage';
                                } else {
                                    $single = 'singlePage';
                                }?>
                                <a href="<?php the_permalink(); ?>" class="<?php echo esc_attr($single); ?>" rel="nofollow">
                                    <i class="fa fa-link"></i>
                                </a>
                                <a href="<?php echo get_feature_image_url(get_the_ID()); ?>" class="cbp-lightbox" data-title="">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($portfolio_count % $number_of_portfolio_items_to_display == 0) {
                $z = $portfolio_count; ?>
                </div>
            <?php }
                if($portfolio_count == $published_posts){ ?>
                    </div>
                <?php }
                $portfolio_count++; ?>
            <?php }
        endwhile; ?>
    <?php } else {
        if(is_array($expo_cats)){
            $categories = get_terms( 'kora_genre', array(
                'orderby'    => 'count',
                'hide_empty' => 1,
                'include'    => $expo_cats
            ) );
        }else{
            $categories = get_terms( 'kora_genre', array(
                'orderby'    => 'count',
                'hide_empty' => 1
            ) );
        } $portfolio_term_array = array();
        foreach($categories as $cat) {
            $portfolio_term_array[] = $cat->slug;
        }
        $portfolio = array(
            'post_type' => 'kora_portfolio',
            'posts_per_page' => -1,
            'order' => $portfolio_items_display_order,
            'tax_query' => array(
                array(
                    'taxonomy' => 'kora_genre',
                    'field'    => 'slug',
                    'terms'    => $portfolio_term_array,
                ),
            ),
        );
        $portfolio_loop = new WP_Query($portfolio); ?>
        <!-- BLOCK -->
        <?php $portfolio_count = 1;
        $z = 0;
        $block = 1;
        while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post();
            $count_posts = wp_count_posts();
            $pub_posts = $count_posts->publish;
            $published_posts = $pub_posts - $previously_loaded_posts;
            $terms = get_the_terms(get_the_ID(), 'kora_genre');
            if($portfolio_loop->current_post >= $previously_loaded_posts){ ?>
                <?php if($portfolio_count == 1){ ?>
                    <div class="cbp-loadMore-block1">
                <?php }
                $b = $portfolio_count - $z;
            if(($b == 1) && ($portfolio_count != 1)){
                $block++; ?>
                <div class="cbp-loadMore-block<?php echo esc_attr($block); ?>">
            <?php } ?>
                <!-- Item -->
                <div class="cbp-item <?php foreach ($terms as $ter){ echo esc_attr($ter->slug). ' '; } ?>">
                    <?php if(has_post_thumbnail()){
                        echo '<img src="'.get_feature_image_url(get_the_ID()).'" alt=""/>';
                    } else {
                        echo '<img src="https://placeholdit.imgix.net/~text?txtsize=28&txt=No+Image&w=370&h=370" alt=""/>';
                    }?>
                    <div class="hover-port">
                        <div class="hover-in">
                            <div class="position-center-center full-width">
                                <h6><?php the_title(); ?></h6>
                                <span>
                                    <?php $term_counter = 0;
                                    $len = count($terms);
                                    foreach ($terms as $ter){
                                        if ($term_counter == $len - 1) {
                                            echo esc_attr($ter->name);
                                        } else {
                                            echo esc_attr($ter->name). ' , ';
                                        }
                                        $term_counter++;
                                    } ?>
                                </span>
                                <?php $single_portfolio_page_layout = kora_get_field('single_portfolio_page_layout');
                                if($single_portfolio_page_layout == 'popup-detailed' || $single_portfolio_page_layout == 'popup-side-info'|| $single_portfolio_page_layout == 'popup-case-details'){
                                    $single = 'cbp-singlePage';
                                } else {
                                    $single = 'singlePage';
                                }?>
                                <a href="<?php the_permalink(); ?>" class="<?php echo esc_attr($single); ?>" rel="nofollow">
                                    <i class="fa fa-link"></i>
                                </a>
                                <a href="<?php echo get_feature_image_url(get_the_ID()); ?>" class="cbp-lightbox" data-title="">
                                    <i class="ion-ios-search-strong"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($portfolio_count % $number_of_portfolio_items_to_display == 0) {
                $z = $portfolio_count; ?>
                </div>
            <?php }
                if($portfolio_count == $published_posts){ ?>
                    </div>
                <?php }
                $portfolio_count++; ?>
            <?php }
        endwhile; ?>
    <?php }
} else{ ?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="padding-bottom-100 padding-top-100">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-warning _adj">
                <h4><?php esc_attr_e('We\'re sorry!','kora-wp'); ?></h4>
                <p><?php esc_attr_e('The page you want isn\'t available because it\'s just used for loading portfolio items. Go back to portfolio page or','kora-wp'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_attr_e('BACK TO HOME','kora-wp'); ?></a></p>
            </div>
        </div>
    </div>
</section>
<!-- Wrap End -->
<?php wp_footer(); ?>
</body>
</html>
<?php } ?>
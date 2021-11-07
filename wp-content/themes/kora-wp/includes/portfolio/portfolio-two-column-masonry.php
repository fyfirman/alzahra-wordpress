<?php $select_portfolio_layout = kora_get_field('select_portfolio_layout');
$select_portfolio_categories = kora_get_field('select_portfolio_categories');
$number_of_portfolio_items_to_display = kora_get_field('number_of_portfolio_items_to_display');
$portfolio_items_display_order = kora_get_field('portfolio_items_display_order');
$select_load_more_page = kora_get_field('select_load_more_page');
$view_more_button_text = kora_get_field('view_more_button_text');
$loading_text = kora_get_field('loading_text');
$no_more_work_available = kora_get_field('no_more_work_available'); ?>
<!-- Masonry 2 Columns -->
<section class="portfolio padding-top-100 padding-bottom-100">

    <!-- PORTFOLIO ITEMS  FILTER -->
    <div id="js-filters-awesome-work" class="cbp-l-filters-buttonCenter">
        <?php if(is_array($select_portfolio_categories)){
            $categories = get_terms( 'kora_genre', array(
                'orderby'    => 'count',
                'hide_empty' => 1,
                'include'    => $select_portfolio_categories
            ) );
            // For Load More Page
            $sp_cats = '';
            $sp_counter = 0;
            $len = count($select_portfolio_categories);
            foreach ($select_portfolio_categories as $cat){
                if ($sp_counter == $len - 1) {
                    $sp_cats .= $cat;
                } else {
                    $sp_cats .= $cat.',';
                }
                $sp_counter++;
            }
        }else{
            $sp_cats = 'no_cat';
            $categories = get_terms( 'kora_genre', array(
                'orderby'    => 'count',
                'hide_empty' => 1
            ) );
        } ?>
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> <?php echo esc_html__('All','kora-wp'); ?>
            <div class="cbp-filter-counter"></div>
        </div>
        <?php foreach($categories as $cats){ ?>
            <div data-filter=".<?php echo esc_attr($cats->slug); ?>" class="cbp-filter-item"> <?php echo esc_attr($cats->name); ?>
                <div class="cbp-filter-counter"></div>
            </div>
        <?php } ?>
    </div>
    <!-- PORTFOLIO ITEMS -->
    <div class="container">
        <div id="js-grid-awesome-work" class="with-space col-2">

            <!-- PORTFOLIO ITEM -->
            <?php $term_array = array();
            foreach($categories as $cat) {
                $term_array[] = $cat->slug;
            }
            $portfolio = array(
                'post_type' => 'kora_portfolio',
                'posts_per_page' => $number_of_portfolio_items_to_display,
                'order' => $portfolio_items_display_order,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'kora_genre',
                        'field'    => 'slug',
                        'terms'    => $term_array,
                    ),
                ),
            );
            $portfolio_loop = new WP_Query($portfolio);
            while ( $portfolio_loop->have_posts() ) : $portfolio_loop->the_post();
            $terms = get_the_terms(get_the_ID(), 'kora_genre'); ?>
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
            <?php endwhile;
            wp_reset_query(); ?>
        </div>
    </div>

    <!-- LOAD MORE -->
    <?php if(!empty($view_more_button_text)){ ?>
    <div id="js-loadMore-awesome-work" class="text-center">
        <a href="<?php echo esc_url(home_url('/')); ?>?page_id=<?php echo esc_attr($select_load_more_page->ID); ?>&number_of_posts=<?php echo esc_attr($number_of_portfolio_items_to_display); ?>&pl=normal-4-column-full&select_portfolio_categories=<?php echo esc_attr($sp_cats); ?>" class="cbp-l-loadMore-link btn text-center" rel="nofollow">
            <span class="cbp-l-loadMore-defaultText"><?php echo esc_attr($view_more_button_text); ?></span>
            <span class="cbp-l-loadMore-loadingText"><?php echo esc_attr($loading_text); ?></span>
            <span class="cbp-l-loadMore-noMoreLoading"><?php echo esc_attr($no_more_work_available); ?></span>
        </a>
    </div>
    <?php } ?>
</section>
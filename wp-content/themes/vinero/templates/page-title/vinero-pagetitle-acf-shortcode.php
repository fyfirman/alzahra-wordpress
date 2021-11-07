<?php

$shortcode = get_field('page_title_shortcode', get_queried_object_id());
echo do_shortcode($shortcode);


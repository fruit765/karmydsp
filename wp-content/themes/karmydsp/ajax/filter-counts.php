<?php

    $sort_type = $_POST['sort_type'];

    $cat_id = $_POST['cat_id'];

    switch($sort_type) {

        case 'price':

            $meta_key = 'price';

            $order = 'ASC';

            $query_array = array('posts_per_page' => -1, 'post_type' => 'post', 'cat' => $cat_id, 'meta_key' => $meta_key, 'orderby' => array('meta_value_num' => $order, 'title' => 'ASC'));

            break;

        case 'pop':

            $meta_key = 'post_views_count';

            $order = 'DESC';

            $query_array = array('posts_per_page' => -1, 'post_type' => 'post', 'cat' => $cat_id, 'meta_key' => $meta_key, 'orderby' => array('meta_value_num' => $order, 'title' => 'ASC'));

            break;

        case 'discount':

            $meta_key = 'discount';

            $order = 'DESC';

            $query_array = array('posts_per_page' => -1, 'post_type' => 'post', 'cat' => $cat_id, 'meta_key' => $meta_key, 'meta_value' => 0, 'meta_compare' => '!=', 'orderby' => array('meta_value_num' => $order, 'title' => 'ASC'));

            break;
        
        default:

            break;
    }

    $cards = [];

    $pagination = [];

    if (($loop = new WP_Query($query_array)) && ($count_posts = $loop->post_count)) {
        
        global $post;

        if ($_POST['count_posts_on_page'] !== 'все') {
            
            $count_posts_on_page = $_POST['count_posts_on_page'];
        }
        else {

            $count_posts_on_page = $count_posts;
        }

        $num_page = $_POST['num_page'];

        $num_post = 0;

        $right = $num_page * $count_posts_on_page;

        $left = $right - $count_posts_on_page + 1;
        
        while ($loop->have_posts()) {

            $loop->the_post();

            $num_post++;

            if (($num_post >= $left) && ($num_post <= $right)) {

                if (get_field('new', false)) {

                    $new = ' new';
                }
                else {

                    $new = '';
                }

                $href = get_permalink();

                $id = $post->ID;

                $img = get_the_post_thumbnail_url($post, 'medium');

                if (!$img || preg_match('/no\-img/u', $img)) {

                    for ($i = 1; $i <= 10; $i++) {
                    
                        $image_id = get_field("img$i", false);

                        if ($image_id) {
                        
                            $img = wp_get_attachment_image_url($image_id, 'medium');

                            break;
                        }
                    }
                }

                $title = get_the_title();

                $views = get_field('post_views_count', false);

                if ($views) {
                
                    $views = "<div class=\"post-views\"><i class=\"far fa-eye\"></i>$views</div>";
                }
                else {

                    $views = '';
                }

                $price = get_field('price', false);

                if ($price) {
                
                    $price = "<div class=\"post-price\">{$price} руб.</div>";
                }
                else {

                    $price = '';
                }

                $discount = get_field('discount', false);

                if ($discount) {
                
                    $discount = "<div class=\"post-discount\">скидка -{$discount}%</div>";
                }
                else {

                    $discount = '';
                }

                $card = "<a href=\"$href\" class=\"item$new\" id-card=\"$id\">

                                    <div class=\"item-wrap\">

                                        <div class=\"img\"><img src=\"$img\" alt=\"\"></div>

                                        <div class=\"title\">$title</div>

                                        <div class=\"inform\">
                                        
                                            <!--$views-->
                                            
                                            $price
                                        </div>

                                        <div class=\"btn\">подробнее</div>

                                        $discount
                                    </div>
                                </a>";

                $cards[] = $card;
            }
        }

        wp_reset_query();

        $count_pages = floor($count_posts / $count_posts_on_page);

        if ($count_posts % $count_posts_on_page !== 0) {

            $count_pages++;
        }

        if ($count_pages > 1) {
        
            for ($i = 1; $i <= $count_pages; $i++){

                if ($num_page == $i) {

                    $current_page = ' current';
                }
                else {

                    $current_page = '';
                }
            
                $pagination[] = "<span class=\"item$current_page\">$i</span>";
            }
        }
    }

    $response = ['cards' => $cards, 'pagination' => $pagination];

    echo json_encode($response);
?>
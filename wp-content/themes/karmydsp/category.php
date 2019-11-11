
<?php get_header(); ?>

<div class="wrapper inside-page catalog-page">

    <div class="header-container">

        <div class="header">

            <a href="/" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/imgs/logo.svg" alt=""></a>

            <div class="logo-desc">

                Российский производитель<br>товаров для животных
            </div>

            <a href="tel:88003500261" class="phone">

                8 800 350 02 61
            
                <span>звонок по России бесплатно</span>
            </a>

            <div class="menu-btn"></div>
        </div>
    </div>

    <div class="bread-crumbs-block">

        <div class="white-bg"></div>

        <div class="bread-crumbs-block-wrapper">

            <div class="bread-crumbs"><?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs(' / '); ?></div>

            <div class="filter" cat-id="<?php echo get_queried_object()->term_id; ?>">

                <div class="sort">
                    
                    <span class="title">Сортировать: </span>

                    <span class="sort-item active" sort-type="price">по цене</span>

                    <span class="sort-item" sort-type="pop">по популярности</span>

                    <span class="sort-item" sort-type="discount">по скидке</span>
                </div>

                <div class="count">
                    
                    <span class="title">Товаров на странице: </span>

                    <span class="count-item">5</span>

                    <span class="count-item">10</span>

                    <span class="count-item active">все</span>
                </div>
            </div>
        </div>
    </div>

    <div class="main-block">

        <?php get_sidebar(); ?>

        <div class="main-block-wrapper">

            <div class="catalog-block">

                <?php if ($loop = new WP_Query(array('posts_per_page' => -1, 'post_type' => 'post', 'cat' => get_queried_object()->term_id, 'meta_key' => 'price', 'orderby' => array('meta_value_num' => 'ASC', 'title' => 'ASC')))) { ?>

                    <?php
                    
                        $count_posts = $loop->post_count;

                        $num_page = 1;

                        $num_post = 0;

                        $right = $num_page * $count_posts;

                        $left = $right - $count_posts + 1;
                    ?>
                    
                    <?php while ($loop->have_posts()) { $loop->the_post(); ?>

                        <?php $num_post++; ?>

                        <?php if (($num_post >= $left) && ($num_post <= $right)) { ?>

                            <a href="<?php the_permalink(); ?>" class="item<?php if (get_field('new', false)) echo ' new'; ?>" id-card="<?php echo $post->ID; ?>">

                                <div class="item-wrap">

                                    <?php

                                        $thumbnail_url = get_the_post_thumbnail_url($post, 'medium');

                                        if (!$thumbnail_url || preg_match('/no\-img/u', $thumbnail_url)) {

                                            for ($i = 1; $i <= 10; $i++) {
                                            
                                                $image_id = get_field("img$i", false);

                                                if ($image_id) {
                                                
                                                    $thumbnail_url = wp_get_attachment_image_url($image_id, 'medium');

                                                    if (!preg_match('/no\-img/u', $thumbnail_url)) {

                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    ?>

                                    <div class="img"><img src="<?php echo $thumbnail_url; ?>" alt=""></div>

                                    <div class="title"><?php the_title(); ?></div>

                                    <div class="inform">
                                    
                                        <?php if (get_field('post_views_count', false)) { ?>

                                            <!-- <div class="post-views"><i class="far fa-eye"></i><?php the_field('post_views_count', false); ?></div> -->
                                        <?php } ?>
                                        
                                        <?php if (get_field('price', false)) { ?>

                                            <div class="post-price"><?php the_field('price', false); ?> руб.</div>
                                        <?php } ?>
                                    </div>

                                    <div class="btn">подробнее</div>

                                    <?php if (get_field('discount', false)) { ?>

                                        <div class="post-discount">скидка -<?php the_field('discount', false); ?>%</div>
                                    <?php } ?>
                                </div>
                            </a>
                        <?php } ?>
                    <?php } wp_reset_query(); ?>
                <?php } ?>
            </div>

            <div class="pagination">

                <?php
                
                    $count_pages = floor($count_posts / $count_posts);

                    if ($count_posts % $count_posts !== 0) {

                        $count_pages++;
                    }
                ?>
            
                <?php if ($count_pages > 1) { ?>

                    <?php for ($i = 1; $i <= $count_pages; $i++){ ?>

                        <span class="item<?php if ($num_page == $i) echo ' current'; ?>"><?php echo $i; ?></span>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>

<?php get_header(); ?>

<?php

    if (have_posts()) {

        the_post();
    }
?>

<div class="wrapper inside-page card-page">

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
        </div>
    </div>

    <div class="main-block">

        <?php get_sidebar(); ?>

        <div class="main-block-wrapper">

            <div class="card-block">

                <div class="card-top-block row">

                    <!-- Получаем url картинок всех цветов и размеров -->

                        <?php

                            $imgs = [];

                            function get_imges_by_size($size, $range) {

                                global $post;

                                $imgs_arr = [];

                                $left = (int)explode('-', $range)[0];

                                $right = (int)explode('-', $range)[1] - 1;

                                if ($left == 1) {

                                    $imgs_arr[] = get_the_post_thumbnail_url($post, $size);
                                }
                                else {

                                    $left--;
                                }

                                for ($i = $left; $i <= $right; $i++) {

                                    $image_id = get_field("img$i", false);

                                    if($image_id) {
                                
                                        $thumb_image_link = wp_get_attachment_image_url($image_id, $size);
        
                                        $imgs_arr[] = $thumb_image_link;
                                    }
                                }

                                return $imgs_arr;
                            }

                            if (!get_field('color-for-card', false)) {

                                $range = '1-10';

                                $imgs[] = array('large_imgs_arr' => get_imges_by_size('large', $range), 'medium_large_imgs_arr' => get_imges_by_size('medium_large', $range), 'medium_imgs_arr' => get_imges_by_size('medium', $range), 'thumbnail_imgs_arr' => get_imges_by_size('thumbnail', $range));
                            }
                            else {

                                for ($i = 1; $i <= 10; $i++) {
                                
                                    if (get_field("color$i", false) && get_field("range$i", false)) {

                                        $range = get_field("range$i", false);

                                        $imgs[] = array('large_imgs_arr' => get_imges_by_size('large', $range), 'medium_large_imgs_arr' => get_imges_by_size('medium_large', $range), 'medium_imgs_arr' => get_imges_by_size('medium', $range), 'thumbnail_imgs_arr' => get_imges_by_size('thumbnail', $range), 'color' => wp_get_attachment_image_url(get_field("color$i", false), 'thumbnail'));
                                    }
                                }
                            }
                        ?>

                        <script>

                            var imgs = <?php echo json_encode($imgs); ?>;
                        </script>
                    <!-- Получаем url картинок всех цветов и размеров КОНЕЦ -->

                    <div class="card-left-block col-md-4">

                        <?php

                            $color_num = 0;

                            for($i = 1; $i <= 15; $i++) {

                                $size_range = get_field("size-range$i", false);

                                if ($size_range && get_field('color-for-card', false)) {
                                
                                    $color_num = explode(';', $size_range)[0] - 1;

                                    break;
                                }
                            }
                        ?>

                        <div class="mobile-imgs-over"><div class="preloader"></div></div>
                        <div class="mobile-imgs owl-carousel">

                            <?php if ($imgs[$color_num]['medium_large_imgs_arr'][0]) { ?>

                                <?php foreach($imgs[$color_num]['medium_large_imgs_arr'] as $image_url) { ?>

                                    <img src="<?php echo $image_url; ?>" alt="">
                                <?php } ?>
                            <?php } ?>
                        </div>

                        <div class="desctop-imgs">

                            <div class="main-img">

                                <?php if ($imgs[$color_num]['medium_imgs_arr'][0]) { ?>

                                    <img src="<?php echo $imgs[$color_num]['medium_imgs_arr'][0]; ?>" alt="" position="0" color="<?php echo $color_num; ?>">
                                <?php } ?>
                            </div>

                            <div class="imgs">

                                <?php if ($imgs[$color_num]['thumbnail_imgs_arr'][0]) { ?>
                                
                                    <?php $i = 0; ?>

                                    <?php foreach($imgs[$color_num]['thumbnail_imgs_arr'] as $image_url) { ?>

                                        <div class="img<?php if ($i === 0) echo ' active'; ?>" position="<?php echo $i; ?>" color="<?php echo $color_num; ?>"><img src="<?php echo $image_url; ?>" alt=""></div>
                                    <?php $i++; } ?>

                                <?php } ?>
                            </div>
                        </div>

                        <?php if (get_field('color-for-card', false)) { ?>
                        
                            <div class="colors">
                            
                                <div class="title">цвет:</div>

                                <div class="imgs">

                                    <?php if ($size_range) { ?>

                                        <?php 

                                            foreach(explode(';', $size_range) as $key => $item) {

                                                ?>
                                                    <div class="img<?php if ($key === 0) echo ' active'; ?>" color="<?php echo $item - 1; ?>"><img src="<?php echo $imgs[$item - 1]['color']; ?>" alt=""></div>
                                                <?php
                                            }
                                        ?>
                                    <?php } else { ?>

                                        <?php $i = 0; ?>
                                    
                                        <?php foreach($imgs as $item) { ?>

                                            <div class="img<?php if ($i === 0) echo ' active'; ?>" color="<?php echo $i; ?>"><img src="<?php echo $item['color']; ?>" alt=""></div>
                                        <?php $i++; } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                        <?php

                            $add_price_arr = [];

                            for($i = 0; $i <= 15; $i++) {

                                for($j = 0; $j <= 10; $j++) {
                                
                                    $add_price_arr[$i][$j] = 0;
                                }
                            }

                            for($i = 1; $i <= 51; $i++) {
                            
                                $add_price = get_field("add-price$i", false);

                                if ($add_price) {

                                    $add_price = explode('-', $add_price);

                                    $add_price_arr[$add_price[0]][$add_price[1]] = (int)$add_price[2];
                                }
                            }

                            $index_size = 0;

                            for($i = 1; $i <= 15; $i++) {

                                if (get_field("size$i", false)) {

                                    $index_size = 1;

                                    break;
                                }
                            }

                            if (get_field('color-for-card', false)) {

                                $index_color = 1;
                            }
                            else {

                                $index_color = 0;
                            }
                        ?>

                        <script>

                            var addPriceArr = <?php echo json_encode($add_price_arr); ?>
                        </script>

                        <?php if ($price = get_field('price', false)) { ?>

                            <div class="price" price="<?php echo $price; ?>">

                                <div class="title">цена:</div>

                                <div><span class="value"><?php echo $price + $add_price_arr[$index_size][$index_color]; ?></span> руб.</div>
                            </div>
                        <?php } ?>

                        <?php for($k = 1; $k <= 15; $k++) { ?>

                            <?php if (get_field("size$k", false)) { ?>

                                <div class="size">

                                    <div class="title">размеры:</div>

                                    <div class="items">

                                        <?php for($i = $k; $i <= 15; $i++) { ?>

                                            <?php if (get_field("size$i", false)) { ?>

                                                <div class="item <?php if ($i === $k) echo 'active'; ?>" size-range="<?php echo the_field("size-range$i", false); ?>"><?php the_field("size$i", false); ?></div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>

                                <?php break; ?>
                            <?php } ?>
                        <?php } ?>
                    </div>

                    <div class="text col-md-8 d-flex">

                        <div class="inform<?php if (get_field('new', false)) echo ' new'; ?>">
                    
                            <?php if (get_field('discount', false)) { ?>

                                <div class="post-discount">скидка -<?php the_field('discount', false); ?>%</div>
                            <?php } ?>
                        </div>

                        <h1 class="title"><?php the_title(); ?></h1>

                        <div class="desc"><?php the_content(); ?></div>

                        <button class="square-btn">ГДЕ КУПИТЬ</button>
                    </div>
                </div>

                <div class="card-bottom-block row">

                    <div class="card-bottom-block-wrapper this_project_tabs col-md-8">

                        <?php

                            $arr = [];

                            if ($desc = get_field('desc', false)) $arr['desc'] = $desc;

                            if ($composition = get_field('composition', false)) $arr['composition'] = $composition;

                            if ($characteristic = get_field('characteristic', false)) $arr['characteristic'] = $characteristic;
                        ?>

                        <?php if ($arr) { ?>

                            <ul class="this_project_tabs_head">

                                <?php $num = 1; ?>

                                <?php foreach ($arr as $key => $value) { ?>

                                    <li class="<?php if ($num === 1) echo 'active'; ?>"><?php if ($key === 'desc') echo 'описание'; if ($key === 'composition') echo 'состав'; if ($key === 'characteristic') echo 'характеристики'; ?></li>

                                    <?php $num++; ?>
                                <?php } ?>
                            </ul>

                            <div class="this_project_tabs_body">

                                <?php foreach ($arr as $value) { ?>

                                    <div class="this_project_tabs_item"><?php echo $value; ?></div>
                                <?php } ?>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
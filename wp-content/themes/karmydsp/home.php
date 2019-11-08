
<?php get_header(); ?>

<div class="wrapper container-fluid home-page">

    <div class="header-container">

        <div class="header container">

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

    <div class="catalog-container">

        <div class="catalog container row">

            <div class="content col-md-6">

                <h1 class="title">Товары для животных от производителя</h1>

                <div class="desc">Предлагаем товары оптом и в розницу собственной торговой марки «Для самых преданных». Ассортимент более 500 единиц, бесплатная доставка от 2000 руб.</div>
            </div>

            <div class="carousel col-md-6">

                <img src="<?php echo get_template_directory_uri().'/imgs/main-img-for-slider.png'; ?>" class="main-img-for-slider" alt="">

                <div class="owl-carousel owl-carousel-catalog">
                    
                    <?php if ($categories = get_categories(array('number' => 4, 'parent' => 0, 'hide_empty' => false, 'include' => [2, 7, 6, 3], 'orderby' => 'id', 'order' => 'ASC'))) { ?>

                        <?php foreach ($categories as $category) { ?>

                            <a href="<?php echo get_category_link($category->term_id); ?>" class="item">

                                <?php
                                
                                    if ($image_url_back = get_field('slider-img-back', 'category_' . $category->term_id)) {

                                        ?>
                                            <img src="<?php if ($image_url_back) echo $image_url_back; ?>" class="slider-img-back" alt="">
                                        <?php
                                    }

                                    if ($image_url_front = get_field('slider-img-front', 'category_' . $category->term_id)) {

                                        ?>
                                            <img src="<?php if ($image_url_front) echo $image_url_front; ?>" class="slider-img-front" alt="">
                                        <?php
                                    }
                                ?>

                                <img src="<?php echo get_template_directory_uri().'/imgs/img-for-slider-over.png'; ?>" class="img-for-slider-over" alt="" location="<?php echo get_category_link($category->term_id); ?>">
                                
                                <?php

                                    $alternative_title = get_field('alternative_title', 'category_' . $category->term_id);

                                    if (!$alternative_title) {

                                        $alternative_title = $category->cat_name;
                                    }
                                ?>

                                <div class="title"><span><?php echo $alternative_title; ?></span></div>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="categories-container">

        <div class="categories container">

            <div class="title sub-title">Наш ассортимент</div>

            <div class="items row">

                <?php if ($categories = get_categories(array('number' => 4, 'parent' => 0, 'hide_empty' => false, 'exclude' => [1], 'orderby' => 'id', 'order' => 'ASC'))) { ?>

                    <?php foreach ($categories as $category) { ?>

                        <?php
                        
                            $image_id = get_term_meta($category->term_id, '_thumbnail_id', 1);

                            $image_url = wp_get_attachment_image_url($image_id, 'full');
                        ?>

                        <a href="<?php echo get_category_link($category->term_id); ?>" class="item col-lg-6" id-category="<?php echo $category->term_id; ?>">

                            <div class="row">

                                <div class="img col-sm-6"><img src="<?php echo $image_url; ?>" alt=""></div>

                                <div class="content col-sm-6 d-flex">
            
                                    <h2 class="title"><?php echo $category->cat_name; ?></h2>
            
                                    <div class="desc"><?php //echo $category->category_description; ?></div>
            
                                    <div class="btn">выбрать</div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>

                <?php } ?>
            </div>

            <button id="load-all-categories" class="square-btn">СМОТРЕТЬ ВСЕ КАТЕГОРИИ</button>
        </div>
    </div>

    <!--<div class="action-news-container">

        <div class="action-news container row">

            <div class="action col-lg-6 owl-carousel owl-carousel-action">

                <?php $loop = new WP_Query(array('posts_per_page' => 3, 'post_type' => 'ouractions', 'orderby' => 'id', 'order' => 'DESC')); ?>
            
                <?php while ($loop->have_posts()) { $loop->the_post() ?>
            
                    <a href="<?php the_permalink(); ?>" class="bg-container row">

                        <div class="img col-sm-4"><img src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>" alt=""></div>

                        <div class="content col-sm-8 d-flex">

                            <div class="label"><?php the_title(); ?></div>

                            <div class="title sub-h2">Акция</div>

                            <div class="desc"><?php the_content(); ?></div>

                            <div class="btn">подробнее</div>
                        </div>
                    </a>
                <?php } wp_reset_query(); ?>
            </div>

            <div class="news col-lg-6">

                <?php $loop = new WP_Query(array('posts_per_page' => 1, 'post_type' => 'ournews', 'orderby' => 'id', 'order' => 'DESC')); ?>

                <?php while ($loop->have_posts()) { $loop->the_post() ?>

                    <a href="<?php the_permalink(); ?>" class="bg-container row">

                        <div class="img col-sm-4"><img src="<?php echo get_the_post_thumbnail_url($post, 'full'); ?>" alt=""></div>

                        <div class="content col-sm-8 d-flex">

                            <div class="label">новое поступление</div>

                            <div class="title sub-h2">Наши новинки</div>

                            <div class="desc"><?php the_title(); ?></div>

                            <div class="btn">подробнее</div>
                        </div>
                    </a>
                <?php } wp_reset_query(); ?>
            </div>
        </div>
    </div>-->

    <div class="maker-container">

        <div class="maker container">

            <div class="sub-title">Сами производим товар</div>

            <div class="desc">Все что вы видите на сайте, мы производим сами,<br>поэтому вы получите преимущества:</div>

            <div class="items row">

                <div class="item col-sm">

                    <div class="img"></div>

                    <div class="text">Бесплатно отправим товар при заказе от 2000 Р по России</div>
                </div>
                
                <div class="item col-sm">

                    <div class="img"></div>
                
                    <div class="text">Экономьте время: покупайте качественный товар в одном месте</div>
                </div>

                <div class="item col-sm">

                    <div class="img"></div>
                
                    <div class="text">Проверяем товар с помощью международной системы стандартов</div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form-container">

        <div class="contact-form container d-flex">

            <div class="sub-title">Мы всегда готовы помочь с выбором</div>

            <div class="desc">Подберем товар под ваши задачи. Проконсультируем и быстро отправим заказ.<br>Консультация бесплатна и ни к чему вас не обязывает.</div>

            <form id="contact-form">

                <div class="inputs row">

                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="contact-form-name" placeholder="Имя" name="name-string-!">
                    </div>

                    <div class="form-group col-sm-6">
                        <input type="text" class="form-control" id="contact-form-phone" placeholder="Телефон" name="phone-phone-*">
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" id="contact-form-text" placeholder="Комментарии или пожелания" name="text-text-!"></textarea>
                </div>

                <button type="submit" class="square-btn form_submit_btn">ОТПРАВИТЬ ДАННЫЕ</button>

                <input type="hidden" name="subject-string-*" value="Заявка на обратный звонок">
                
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="contact-form-check" name="captcha-captcha-*">
                    <label class="form-check-label" for="contact-form-check">Согласен с политикой конфиденциальности</label>
                </div>
            </form>
        </div>
    </div>

    <?php get_sidebar(); ?>

<?php get_footer(); ?>
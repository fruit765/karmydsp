<?php
/*
Template Name: Политика конфиденциальности
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php

    if (have_posts()) {

        the_post();
    }
?>

<div class="wrapper inside-page policy-page">

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

            <div class="policy-block">
            
                <h1><?php the_title(); ?></h1>

                <?php the_content(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
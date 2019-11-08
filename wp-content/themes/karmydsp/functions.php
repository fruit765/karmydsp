<?php
    // Подключаем сторонние библиотеки php
    require_once('inc/category-img.php');
    require_once('inc/breadcrumbs.php');

    // Подключаем стили
    function css_mystyle() {
        if(!is_admin()){
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
            wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
            wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fonts/font-awesome/5.2.0/css/all.min.css');
        }

        if (is_front_page()) {
            wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel-home-page.css');
        }

        if (is_single()) {
            wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.min.css');
        }
    }
    add_action('wp_print_styles', 'css_mystyle', 1);

    // Подключаем скрипты
    function jquery_script_method() {
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.js', false, false, true);
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), false, true);

        wp_enqueue_script('form-validator', get_template_directory_uri().'/js/form-validator.js', array('jquery'), false, true);
        wp_enqueue_script('form-dispatcher', get_template_directory_uri().'/js/form-dispatcher.js', array('jquery'), false, true);
        wp_enqueue_script('maskedinput', get_template_directory_uri().'/js/maskedinput.min.js', array('jquery'), false, true);
        wp_enqueue_script('contact-form-modal', get_template_directory_uri().'/js/contact-form-modal.js', array('jquery'), false, true);
        wp_enqueue_script('jquery-easing', get_template_directory_uri().'/js/jquery.easing.min.js', array('jquery'), false, true);
        wp_enqueue_script('jquery-easing-compatibility', get_template_directory_uri().'/js/jquery.easing.compatibility.js', array('jquery'), false, true);
        wp_enqueue_script('detect', get_template_directory_uri().'/js/detect.min.js', array('jquery'), false, true);

        wp_localize_script('bootstrap', 'myAjax', 
            array(
                'url' => admin_url('admin-ajax.php')
            )
        );
        
        if (is_front_page()) {

            wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel-home-page.js', array('jquery'), false, true);
            wp_enqueue_script('owl-activate', get_template_directory_uri().'/js/owl-activate.js', array('jquery'), false, true);
            wp_enqueue_script('contact-form-checkbox', get_template_directory_uri().'/js/contact-form-checkbox.js', array('jquery'), false, true);
            wp_enqueue_script('sidebar-home-page', get_template_directory_uri().'/js/sidebar-home-page.js', array('jquery'), false, true);
            wp_enqueue_script('load-all-categories', get_template_directory_uri().'/js/load-all-categories.js', array('jquery'), false, true);
            wp_enqueue_script('home-page-slider-mobile', get_template_directory_uri().'/js/home-page-slider-mobile.js', array('jquery'), false, true);
        }

        if (is_category()) {

            wp_enqueue_script('inside-page', get_template_directory_uri().'/js/inside-page.js', array('jquery'), false, true);
            wp_enqueue_script('sidebar', get_template_directory_uri().'/js/sidebar.js', array('jquery'), false, true);
            wp_enqueue_script('filter', get_template_directory_uri().'/js/filter.js', array('jquery'), false, true);
        }

        if (is_single()) {

            wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array('jquery'), false, true);
            wp_enqueue_script('owl-activate', get_template_directory_uri().'/js/owl-activate.js', array('jquery'), false, true);
            wp_enqueue_script('inside-page', get_template_directory_uri().'/js/inside-page.js', array('jquery'), false, true);
            wp_enqueue_script('sidebar', get_template_directory_uri().'/js/sidebar.js', array('jquery'), false, true);
            wp_enqueue_script('tabs', get_template_directory_uri().'/js/tabs.js', array('jquery'), false, true);
            wp_enqueue_script('desctop-imgs', get_template_directory_uri().'/js/desctop-imgs.js', array('jquery'), false, true);
            wp_enqueue_script('card-imgs-slider', get_template_directory_uri().'/js/card-imgs-slider.js', array('jquery'), false, true);
            wp_enqueue_script('colors', get_template_directory_uri().'/js/colors.js', array('jquery'), false, true);
            wp_enqueue_script('size-control', get_template_directory_uri().'/js/size-control.js', array('jquery'), false, true);
            wp_enqueue_script('add-price', get_template_directory_uri().'/js/add-price.js', array('jquery'), false, true);
        }

        if (is_page()) {

            wp_enqueue_script('inside-page', get_template_directory_uri().'/js/inside-page.js', array('jquery'), false, true);
            wp_enqueue_script('sidebar', get_template_directory_uri().'/js/sidebar.js', array('jquery'), false, true);
        }
	}    
    add_action('wp_enqueue_scripts', 'jquery_script_method');

    // Подключаем произвольное меню и миниатюру поста
	if (function_exists('add_theme_support')) {
		add_theme_support('menus');
		add_theme_support('post-thumbnails');
	}
    register_nav_menu('header-menu', 'Верхнее меню');

    // Просмотры
	function auto_set_count_view(){
		if( is_single() || is_page() ){
			if( !isset($_COOKIE['postview']) ){
				setPostViews( get_the_ID() );
			}
		}
	}
	add_action('wp_head','auto_set_count_view');
	function set_count_cookies(){   
		setcookie ("postview", 'stop',time()+3);
	}
	add_action('init','set_count_cookies');
	function getPostViews($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if(!$count){
			// delete_post_meta($postID, $count_key);
			// add_post_meta($postID, $count_key, '0');
			return '0';
		}
		return $count;
	}
	function setPostViews($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if(!$count){
			//delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '1');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	function posts_column_views($defaults){
		$defaults['post_views'] = __('просмотров');
		return $defaults;
	}
	add_filter('manage_posts_columns', 'posts_column_views');
	function posts_custom_column_views($column_name, $id){
		if($column_name === 'post_views'){
			echo getPostViews(get_the_ID());
		}
	}
    add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
    
    // Остановить предзагрузку следующей статьи и двойную обработку шаблоана single.php
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    
    // AJAX
    function load_all_categories_callback() {
        
        require_once('ajax/load-all-categories.php');
        
        wp_die();
    }

    function filter_counts_callback() {
        
        require_once('ajax/filter-counts.php');
        
        wp_die();
    }

    if(wp_doing_ajax()){

        add_action('wp_ajax_load_all_categories', 'load_all_categories_callback');
        add_action('wp_ajax_nopriv_load_all_categories', 'load_all_categories_callback');

        add_action('wp_ajax_filter_counts', 'filter_counts_callback');
        add_action('wp_ajax_nopriv_filter_counts', 'filter_counts_callback');
    }

    function filter_jpeg_quality($quality) {

        return 100;
    }
    add_filter('jpeg_quality', 'filter_jpeg_quality');

    // Выводим название сайта в пользовательском соглашении
	function set_site_name($content) {
		if (is_page('policy')) {

            $content =  str_replace ('[site-url]', get_bloginfo('url'), $content);

            $content =  str_replace ('[site-email]', get_bloginfo('admin_email'), $content);
        }
		
		return $content;
	}
	add_filter('the_content', 'set_site_name', 100);
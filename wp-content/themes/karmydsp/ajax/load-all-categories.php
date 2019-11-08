
<?php

    $id_categories = json_decode(stripslashes($_POST['id_categories']));

    $id_categories[] = '1';

    $categories_result = [];

    if ($categories = get_categories(array('parent' => 0, 'hide_empty' => false, 'exclude' => $id_categories, 'orderby' => 'id', 'order' => 'ASC'))) {
    
        foreach($categories as $category) {

            $category_result = '<a href="<#>href<#>" class="item col-lg-6" id-category="<#>id<#>">

                                    <div class="row">

                                        <div class="img col-sm-6"><img src="<#>img<#>" alt=""></div>

                                        <div class="content col-sm-6 d-flex">
                    
                                            <h2 class="title"><#>title<#></h2>
                    
                                            <div class="desc"><#>desc<#></div>
                    
                                            <div class="btn">выбрать</div>
                                        </div>
                                    </div>
                                </a>';

            $category_result = str_replace('<#>href<#>', get_category_link($category->term_id), $category_result);

            $category_result = str_replace('<#>id<#>', $category->term_id, $category_result);

            $category_result = str_replace('<#>img<#>', wp_get_attachment_image_url(get_term_meta($category->term_id, '_thumbnail_id', 1), 'full'), $category_result);

            $category_result = str_replace('<#>title<#>', $category->cat_name, $category_result);

            $category_result = str_replace('<#>desc<#>', $category->category_description, $category_result);

            $categories_result[] = $category_result;
        }

        echo json_encode($categories_result);
    }
?>
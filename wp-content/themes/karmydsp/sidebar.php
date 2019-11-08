<div class="sidebar-cover"></div>
<div class="sidebar">

    <?php if ($categories = get_categories(array('parent' => 0, 'hide_empty' => false, 'exclude' => [1], 'orderby' => 'name', 'order' => 'ASC'))) { ?>

        <ul>

            <?php foreach ($categories as $category) { ?>

                <?php $subcategories = get_categories(array('parent' => $category->term_id, 'orderby' => 'name', 'hide_empty' => false)); ?>

                <li class="<?php if ($subcategories) echo 'subcategories'; ?>">
                
                    <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->cat_name; ?></a><div></div>

                    <?php if ($subcategories) { ?>

                        <ul>

                            <?php foreach ($subcategories as $subcategorie) { ?>

                                <li class="sub"><a href="<?php echo get_category_link($subcategorie->term_id); ?>"><?php echo $subcategorie->cat_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <div id="free-consultation" class="consult">
        бесплатная консультация

        <div class="line"></div>
    </div>

    <div class="close"></div>
</div>
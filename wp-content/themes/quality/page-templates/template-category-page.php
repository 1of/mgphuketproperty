<?php
//  Category Page

get_header();
quality_breadcrumbs();

?>

<?php
// Задаем параметры цикла:
$category_name = get_field('category_type');
$args = array(
    'numberposts' => -1,
    'post_type' => 'page',
    'meta_key' => 'obj_category',
    //'meta_value'	=> $category_name
);
// С помощью WP_Query создаем переменную, содержащую все страницы со значением meta_value в поле
$the_query = new WP_Query($args);

?>
<section id="section-block" class="site-content">
    <div class="container">
        <?php if ($the_query->have_posts()): ?>
            <ul class="home-objects">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php
                    $object_category_list = get_field('obj_category');
                    if (in_array($category_name, $object_category_list)) :
                        ?>
                        <li>
                            <p class="obj-name"><?php

                                $key = array_search($category_name, $object_category_list);
                                echo $category_name[$key];
                                ?></p>
                            <?php
                            $image = get_field('obj_photos'); //set first photo from apartment
                            if (!empty($image)): ?>
                                <div class="obj-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo $image['url']; ?>" alt="">
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="obj-description"><?php echo the_field('home_description'); ?></div>
                            <span class="obj-price"> <?php //the_field('home_price');
                                //the_field('home_currency');
                                ?></span>
                            <a href="<?php the_permalink(); ?>" class="btn-default text-center default-btn">Смотреть</a>
                        </li>
                    <?php endif; ?>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

        <?php wp_reset_query();     // Возвращаем в норму все глобальные переменные ?>
    </div>
</section>
<?php

get_footer();

?>
		
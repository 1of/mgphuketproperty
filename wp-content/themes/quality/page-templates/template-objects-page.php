<?php
// Template Name: Шаблон Объекты

get_header();


?>
<section id="section-block" class="site-content">
    <div class="container">
        <div class="breadcrumbs" typeof="BreadcrumbList">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
        <!-- Rent section-->
        <div class="row">
            <?php
            $header_txt = get_field('objects_page_header');
            echo $header_txt;
            ?>
            <button class="btn-request" data-toggle="modal" data-target="#contact-modal">
                Запросить актуальные объекты
            </button>
        </div>
        <div class="row">

            <?php

            $terms = get_field('category_list');
            if ($terms): ?>

                <ul class="home-objects">

                    <?php foreach ($terms as $term): ?>

                        <li>
                            <p class="obj-name"><?php echo $term->name; ?></p>
                            <div class="obj-image">
                                <a href="<?php echo get_term_link($term); ?>">
                                    <img src="<?php echo the_field('category_image', $term->taxonomy . '_' . $term->term_id); ?>"
                                         alt="">
                                </a>
                            </div>
                            <div class="obj-description"><?php echo $term->description; ?></div>
                            <a href="<?php echo get_term_link($term); ?>" class="btn-default text-center default-btn">Смотреть</a>
                        </li>


                    <?php endforeach; ?>

                </ul>

            <?php endif; ?>


        </div>
    </div>
</section>

<?php

get_footer();

?>
		
<?php
/*
 * Template Name: Шаблон Объекта
 * Template Post Type: estate
 */

get_header();

$obj_photos = get_field("obj_photos");
$home_description = get_field("home_description");
$home_price = get_field("home_price");
$home_currency = get_field("home_currency");
$fields = get_fields();
//Carousel statements
$active = true;
$carousel_inc = 0;
?>
    <section id="section-block" class="site-content">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>
            <div class="row apartment-header">

                <h1 class="text-left object-title"><?php the_title();

                    ?></h1>
                <button class="btn-request mb-10" data-toggle="modal" data-target="#contact-modal">
                    Запросить актуальные объекты
                </button>
                <!--                --><?php //if (strlen($home_price) > 1): ?>
                <!--                    <div class="price-container">-->
                <!--                        <span class="home-price"> -->
                <?php //echo $home_price ? $home_price : ""; ?><!-- </span>&nbsp;-->
                <!--                        <span class="home-currency"> -->
                <?php //echo $home_currency ? $home_currency : ""; ?><!-- </span>-->
                <!--                    </div>-->
                <!--                --><?php //endif; ?>
            </div>
            <!-- Carousel gallery -->
            <?php if (!empty($obj_photos)) { ?> <!-- Check if there is no photos -->
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="7000">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php $active = true;
                        if (!empty($obj_photos)): ?>
                            <?php foreach ($fields as $name => $value): ?>
                                <?php
                                if (is_array($value) && in_array('url', $value)) { ?>
                                    <div class="item <?php if ($active) {
                                        echo 'active';
                                        $active = false;
                                    } ?>">
                                        <img src="<?php echo $value['url']; ?>" alt="<?php echo $value['alt']; ?>"/>
                                        <div class="carousel-caption">
                                            <?php echo $value['caption']; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            <?php } ?>
            <ol class="carousel-indicators-custom">
                <?php if (!empty($obj_photos)): ?>
                    <?php foreach ($fields as $name => $value): ?>
                        <?php
                        if (is_array($value) && in_array('url', $value)) { ?>
                            <li
                                    data-target="#carousel-example-generic"
                                    data-slide-to="<?php echo $carousel_inc++; ?>"
                                    class="<?php if ($active) {
                                        echo 'active';
                                        $active = false;
                                    } ?>">
                                <img class="carousel-indicator-image" src="<?php echo $value['url']; ?>"
                                     alt="<?php echo $value['alt']; ?>"/>
                            </li>
                        <?php } ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ol>
            <div class="description">

                <?php echo $home_description ? $home_description : ""; ?>
            </div>

            <?php
            the_post();
            the_content();
            ?>

        </div>
    </section>
<?php

get_footer();

?>
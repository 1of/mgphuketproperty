<?php
// Template Name: Шаблон Контакты

get_header();
$adress_text = get_field("contact_adress");
$map_embeded = get_field("contact_map");
$facts = get_field("contact_facts");
$office_text = get_field("contact_office");

?>

<section id="section-block" class="site-content contacts-page">
    <div class="container">
        <div class="breadcrumbs" typeof="BreadcrumbList">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
        <div class="row">
            <div class="col-md-12 mb-10">
                <?php the_field('contact_adress'); ?>
            </div>
            <div class="col-md-6 col-xs-12 map-embeded">
                <?php the_field('contact_map'); ?>
            </div>
            <div class="col-md-6 col-xs-12">
                <?php the_field('contact_facts'); ?>
            </div>
        </div>
        <div class="row mb-10 mt-10">
            <?php the_field('contact_office'); ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
            the_post();
            the_content(); ?>
        </div>
    </div>
</section>

<?php

get_footer();

?>
		
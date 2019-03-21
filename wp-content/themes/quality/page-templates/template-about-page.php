<?php
// Template Name: Шаблон О себе

get_header();
$company_logo = get_field("about_company_logo");
$company_text = get_field("about_company_text");
$text_1 = get_field("about_page_text_1");
$text_2 = get_field("about_page_text_2");
$video = get_field("about_page_video_url");
$services_text = get_field("about_services_text");

?>
<section id="section-block" class="site-content">
    <div class="container">
        <div class="breadcrumbs" typeof="BreadcrumbList">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
        <div class="row">
            <p>
                <?php if (strlen($company_text) > 2): ?>
                    <img src="<?php echo $company_logo; ?>" class="company-logo" alt="company logo">
                    <?php echo $company_text ?>
                <?php endif; ?>

            </p>

        </div>
        <div class="row mb-10 mt-10">
            <?php echo $text_1; ?>
        </div>
        <!-- Video section-->
        <div class="row">
            <div class="video">
                <?php if (strlen($video) > 6): ?>
                    <iframe width="100%" height="500px" src="<?php echo $video; ?>?controls=0">
                    </iframe>
                <?php endif; ?>

            </div>
        </div>
        <div class="row mb-10">
            <?php echo $text_2; ?>
        </div>
        <div class="row">
            <?php
            the_post();
            the_content(); ?>

        </div>
        <div class="row">
            <p>
                <?php echo $services_text; ?>
            </p>
        </div>
        <!-- Rent section-->
    </div>
</section>

<?php

get_footer();

?>
		
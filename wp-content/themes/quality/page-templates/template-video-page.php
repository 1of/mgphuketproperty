<?php
// Template Name: Шаблон Видео

get_header();
$text_1 = get_field("video_page_text_1");
$text_2 = get_field("video_page_text_2");
$video = get_field("video_page_video_url");
$youtube_url = get_field("video_page_channel_url");
$youtube_channel = get_field("video_page_channel_url_name");
?>
<section id="section-block" class="site-content">
    <div class="container">
        <div class="breadcrumbs" typeof="BreadcrumbList">
            <?php if (function_exists('bcn_display')) {
                bcn_display();
            } ?>
        </div>
        <div class="row">
            <?php if (strlen($youtube_channel) > 2): ?>
                <a href="<?php echo $youtube_url ?>" target="_blank"
                   class="contact-btn pull-left mb-10"><?php echo $youtube_channel ?></a>
            <?php endif; ?>
        </div>
        <div class="row mb-10 video-txt-section">
            <?php echo $text_1; ?>
        </div>
        <!-- Video section-->
        <div class="row">
            <div class="video">
                <iframe width="100%" height="500px" src="<?php echo $video; ?>?controls=0">
                </iframe>
            </div>
        </div>
        <div class="row mb-10">
            <?php echo $text_2; ?>
        </div>
        <!-- Rent section-->
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
		
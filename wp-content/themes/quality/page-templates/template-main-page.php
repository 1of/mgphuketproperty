<?php
// Template Name: Шаблон Главная страница

get_header();
$video = get_field("main_video");
$user_photo = get_field('user_photo');
$about_us_text = get_field('about_us_text');
$main_video_text = get_field('main_video_text');

?>

<section id="section-block" class="site-content">
    <div class="container">
        <!-- About section-->
        <div class="row">
            <div class="about-us">
                <div class="text-img"><img class="user-photo" src="<?php echo $user_photo; ?>" alt="">
                </div>
                <div class=""><?php echo $about_us_text; ?></div>
            </div>
        </div>
        <!-- Video section-->
        <div class="row video-container">
            <?php
            the_post();
            the_content(); ?>

            <div class="video col-md-12">
                <iframe width="70%" height="474px" src="<?php echo $video; ?>?controls=0">
                </iframe>

                <p><?php echo $main_video_text ?></p>
            </div>
        </div>
        <!-- Rent section-->
        <div class="row col-md-12">

            <?php

            $terms = get_field('estate_category');

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
        <!-- Text section-->
        <div class="row main-text-block col-md-12">
            <div class="text-img"><img src="<?php
                $image = get_field('main_text_block_img');
                $text = get_field('main_text_block_text');
                echo $image; ?>" alt=""></div>
            <p><?php echo $text; ?></p>
            <a href="<?php get_home_url() ?>/контакты" class="btn-default contact-btn">Связаться</a>
        </div>
    </div>
</section>
<?php

get_footer();

?>
		
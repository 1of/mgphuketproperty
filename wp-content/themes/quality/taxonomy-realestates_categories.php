<?php
get_header();
?>
    <section id="section-block" class="site-content objects-section">
        <div class="container">
            <div class="breadcrumbs" typeof="BreadcrumbList">
                <?php if (function_exists('bcn_display')) {
                    bcn_display();
                } ?>
            </div>

            <div class="row">
                <h1><?php echo single_term_title(); ?></h1>
                <button class="btn-request" data-toggle="modal" data-target="#contact-modal">
                    Запросить актуальные объекты
                </button>
                <!--Blog Posts-->
                <?php echo '<div class="col-md-' . (!is_active_sidebar("sidebar-primary") ? "12" : "12") . ' col-xs-12">'; ?>
                <div class="news category-list">
                    <?php if (have_posts()) :
                        // Start the Loop.
                        while (have_posts()) : the_post();
                            {
                                ?>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <?php
                                    $image = get_field("obj_photos"); //Images from ACF plugin
                                    ?>
                                    <article class="post">
                                        <div class="post-content">
                                            <header class="entry-header">
                                                <div class="category-item">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php echo $image['url']; ?>"
                                                             alt="<?php echo $image['alt']; ?>"
                                                             class="category-small-img"/>
                                                    </a>
                                                </div>
                                            </header>
                                            <div class="entry-content">
                                                <h5 class="entry-title"><a
                                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h5>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php } endwhile;
                        ?>
                        <div class="paginations">
                            <!-- Pagination -->
                            <?php
                            // Previous/next page navigation.
                            the_posts_pagination(array(
                                'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                                'next_text' => '<i class="fa fa-angle-double-right"></i>',
                            ));
                            ?>
                        </div>
                        <?php
                    else:
                        ?>
                        <div class="col-md-12">
                            <h2 style="height: 20vh">Извините, в выбранной Вами категории нет объектов</h2>
                        </div>
                    <?php endif;
                    ?>
                </div>
                <!--/Blog Content-->
            </div>
            <?php //get_sidebar(); ?>
        </div>
        </div>
    </section>
<?php
get_footer();
?>
<!-- Footer Widget Secton -->
<footer class="site-footer">
    <div class="container">
        <?php
        if (is_active_sidebar('footer-widget-area')) {
            ?>
            <div class="row footer-sidebar">
                <?php
                dynamic_sidebar('footer-widget-area');
                ?>
            </div>
        <?php } ?>
        <?php
        $quality_pro_options = theme_data_setup();
        $current_options = wp_parse_args(get_option('quality_pro_options', array()), $quality_pro_options); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row footer-box">
                    <div class="col-md-3 col-xs-12">
                        <p class="footer-title"><?php if ($current_options['footer_title_1'] != '') { ?>
                                <?php echo $current_options['footer_title_1'];
                            } ?>
                        </p>
                        <div>
                            <?php if ($current_options['footer_section_1'] != '') { ?>
                                <?php echo $current_options['footer_section_1'];
                            } ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <p class="footer-title"><?php if ($current_options['footer_title_2'] != '') { ?>
                                <?php echo $current_options['footer_title_2'];
                            } ?>
                        </p>
                        <div>
                            <?php if ($current_options['footer_section_2'] != '') { ?>
                                <?php echo $current_options['footer_section_2'];
                            } ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <p class="footer-title"><?php if ($current_options['footer_title_3'] != '') { ?>
                                <?php echo $current_options['footer_title_3'];
                            } ?>
                        </p>
                        <div>
                            <?php if ($current_options['footer_section_3'] != '') { ?>
                                <?php echo $current_options['footer_section_3'];
                            } ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <p class="footer-title"><?php if ($current_options['footer_title_4'] != '') { ?>
                                <?php echo $current_options['footer_title_4'];
                            } ?>
                        </p>
                        <div>
                            <?php if ($current_options['footer_section_4'] != '') { ?>
                                <?php echo $current_options['footer_section_4'];
                            } ?>
                        </div>
                        <div class="row footer-social-list">
                            <?php if ($current_options['footer_section_4_facebook'] != ''): ?>
                                <a target="_blank" href="<?php echo $current_options['footer_section_4_facebook'] ?>">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            <?php endif; ?>
                            <?php if ($current_options['footer_section_4_linkedin'] != ''): ?>
                                <a target="_blank" href="<?php echo $current_options['footer_section_4_linkedin'] ?>">
                                    <i class="fa fa-linkedin-square"></i>
                                </a>
                            <?php endif; ?>
                            <?php if ($current_options['footer_section_4_instagram'] != ''): ?>
                                <a target="_blank" href="<?php echo $current_options['footer_section_4_instagram'] ?>">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            <?php if ($current_options['footer_section_4_twitter'] != ''): ?>
                                <a target="_blank" href="<?php echo $current_options['footer_section_4_twitter'] ?>">
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="site-info">
                    <?php if ($current_options['footer_copyright_text'] != '') { ?>
                        <?php echo $current_options['footer_copyright_text'];
                    } ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer Widget Secton -->
</div>
<!------  Google Analytics code end ------->
</div> <!-- end of wrapper -->

<!-- Page scroll top -->
<a href="#" class="scroll-up"><i class="fa fa-chevron-up"></i></a>
<!-- Page scroll top -->
<?php
do_action('quality_demo_lite_switcher');

//Show this modal when clicked receive consultation in header
include get_template_directory() . '/inc/modal/contact-modal.php';
include get_template_directory() . '/inc/modal/sending-confirmation-modal.php';

wp_footer(); ?>
</body>
</html>
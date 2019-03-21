<?php
// Footer section Settings
function quality_footer_custom_customizer( $wp_customize ) {

    $wp_customize->add_section(
        'footer_custom_section',
        array(
            'title' => __('Footer custom settings','quality'),
            'priority' => 300,
        )
    );


    //Section 1
    $wp_customize->add_setting( 'quality_pro_options[footer_title_1]', array('default' => 'Услуги','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_title_1]',array('label' => __('Footer Section 1','quality'),'section' => 'footer_custom_section','type' => 'text','priority'   => 10,));
    $wp_customize->add_setting( 'quality_pro_options[footer_section_1]', array('default' => '','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_section_1]',array('label' => __('Footer Section 1 Text','quality'),'section' => 'footer_custom_section','type' => 'textarea','priority'   => 20,));

    //Section 2
    $wp_customize->add_setting( 'quality_pro_options[footer_title_2]', array('default' => 'Публикации','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_title_2]',array('label' => __('Footer Section 2','quality'),'section' => 'footer_custom_section','type' => 'text','priority'   => 30,));
    $wp_customize->add_setting( 'quality_pro_options[footer_section_2]', array('default' => '','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_section_2]',array('label' => __('Footer Section 2 Text','quality'),'section' => 'footer_custom_section','type' => 'textarea','priority'   => 40,));

    //Section 3
    $wp_customize->add_setting( 'quality_pro_options[footer_title_3]', array('default' => 'Миссия','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_title_3]',array('label' => __('Footer Section 3','quality'),'section' => 'footer_custom_section','type' => 'text','priority'   => 50,));
    $wp_customize->add_setting( 'quality_pro_options[footer_section_3]', array('default' => '','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_section_3]',array('label' => __('Footer Section 3 Text','quality'),'section' => 'footer_custom_section','type' => 'textarea','priority'   => 60,));

    //Section 4
    $wp_customize->add_setting( 'quality_pro_options[footer_title_4]', array('default' => 'Контакты','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_title_4]',array('label' => __('Footer Section 4','quality'),'section' => 'footer_custom_section','type' => 'text','priority'   => 70,));
    $wp_customize->add_setting( 'quality_pro_options[footer_section_4]', array('default' => '','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_section_4]',array('label' => __('Footer Section 4 Text','quality'),'section' => 'footer_custom_section','type' => 'textarea','priority'   => 80,));
    //Section 4 Social media
    $wp_customize->add_setting( 'quality_pro_options[footer_section_4_facebook]', array('default' => '','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_section_4_facebook]',array('label' => __('Section 4 Facebook URL','quality'),'section' => 'footer_custom_section','type' => 'url','priority'   => 90,));
    $wp_customize->add_setting( 'quality_pro_options[footer_section_4_linkedin]', array('default' => '','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_section_4_linkedin]',array('label' => __('Section 4 Linkedin URL','quality'),'section' => 'footer_custom_section','type' => 'url','priority'   => 100,));
    $wp_customize->add_setting( 'quality_pro_options[footer_section_4_instagram]', array('default' => '','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_section_4_instagram]',array('label' => __('Section 4 Instagram URL','quality'),'section' => 'footer_custom_section','type' => 'url','priority'   => 110,));
    $wp_customize->add_setting( 'quality_pro_options[footer_section_4_twitter]', array('default' => '','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[footer_section_4_twitter]',array('label' => __('Section 4 Twitter URL','quality'),'section' => 'footer_custom_section','type' => 'url','priority'   => 120,));

}



add_action( 'customize_register', 'quality_footer_custom_customizer' );

/**
 * Add selective refresh for Front page section section controls.
 */
function quality_register_footer_section_partials( $wp_customize ){

    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[footer_title_1]', array(
        'selector'            => '.footer-box > div:nth-child(1)',
        'settings'            => 'quality_pro_options[footer_title_1]',

    ) );

    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[footer_title_2]', array(
        'selector'            => '.footer-box > div:nth-child(2)',
        'settings'            => 'quality_pro_options[footer_title_2]',

    ) );

    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[footer_title_3]', array(
        'selector'            => '.footer-box > div:nth-child(3)',
        'settings'            => 'quality_pro_options[footer_title_3]',

    ) );

    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[footer_title_4]', array(
        'selector'            => '.footer-box > div:nth-child(4)',
        'settings'            => 'quality_pro_options[footer_title_4]',

    ) );

    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[footer_section_4_facebook]', array(
        'selector'            => '.fa-facebook',
        'settings'            => 'quality_pro_options[footer_section_4_facebook]',

    ) );

    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[footer_section_4_linkedin]', array(
        'selector'            => '.fa-linkedin-square',
        'settings'            => 'quality_pro_options[footer_section_4_linkedin]',

    ) );

    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[footer_section_4_instagram]', array(
        'selector'            => '.fa-instagram',
        'settings'            => 'quality_pro_options[footer_section_4_instagram]',

    ) );
    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[footer_section_4_twitter]', array(
        'selector'            => '.fa-twitter-square',
        'settings'            => 'quality_pro_options[footer_section_4_twitter]',

    ) );


}
add_action( 'customize_register', 'quality_register_footer_section_partials' );
?>
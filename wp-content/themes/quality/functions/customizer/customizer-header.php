<?php
// Header section Settings
function quality_header_custom_customizer( $wp_customize ) {

    $wp_customize->add_section(
        'header_custom_section',
        array(
            'title' => __('Header custom settings','quality'),
            'priority' => 250,
        )
    );

//   //Header Personal Photo setting
//    $wp_customize->add_setting(
//        'quality_pro_options[header_personal_photo]'
//        , array(
//        'capability'     => 'edit_theme_options',
//        'sanitize_callback' => 'esc_url_raw',
//        'type' => 'option',
//    ));
//
//    $wp_customize->add_control(
//        new WP_Customize_Image_Control(
//            $wp_customize,
//            'quality_pro_options[header_personal_photo]',
//            array(
//                'label'          => __('Choose personal photo in header','quality' ),
//                'section'        => 'header_custom_section',
//                'priority'   => 20,
//            )
//        )
//    );
    //Personal Site Name 1

    $wp_customize->add_setting(
        'quality_pro_options[personal_site_name_1]',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '<b>MG</b> Phuket property',
        'type' => 'option',

    ));

    $wp_customize->add_control(
        'quality_pro_options[personal_site_name_1]',
        array(
            'type' => 'text',
            'label' => __('Logo Site Name','quality'),
            'section' => 'header_custom_section',
            'priority'   => 30,
        )
    );

    //Personal Site Name 1
    $wp_customize->add_setting(
        'quality_pro_options[personal_site_name_2]',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'Aгенство недвижимости на пхукете',
        'type'=>'option',

    ));

    $wp_customize->add_control(
        'quality_pro_options[personal_site_name_2]',
        array(
            'type' => 'text',
            'label' => __('Logo Site Text','quality'),
            'section' => 'header_custom_section',
            'priority'   =>35,
        )
    );



//Adress and Phone number section
    $wp_customize->add_setting( 'quality_pro_options[header_address_1]', array('default' => 'адрес 1','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[header_address_1]',array('label' => __('Address 1','quality'),'section' => 'header_custom_section','type' => 'text','priority'   => 60,));
    $wp_customize->add_setting( 'quality_pro_options[header_address_2]', array('default' => 'адрес 2','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[header_address_2]',array('label' => __('Address 2','quality'),'section' => 'header_custom_section','type' => 'text','priority'   => 70,));
    $wp_customize->add_setting( 'quality_pro_options[header_address_3]', array('default' => 'адрес 3','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[header_address_3]',array('label' => __('Address 3','quality'),'section' => 'header_custom_section','type' => 'text','priority'   => 80,));
    $wp_customize->add_setting( 'quality_pro_options[header_phone_1]', array('default' => '+987654321000','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[header_phone_1]',array('label' => __('Phone 1','quality'),'section' => 'header_custom_section','type' => 'text','priority'   => 90,));
    $wp_customize->add_setting( 'quality_pro_options[header_phone_2]', array('default' => '+987654321000','type' =>'option',));
    $wp_customize->add_control('quality_pro_options[header_phone_2]',array('label' => __('Phone 2','quality'),'section' => 'header_custom_section','type' => 'text','priority'   => 100,));
}



add_action( 'customize_register', 'quality_header_custom_customizer' );

/**
 * Add selective refresh for Front page section section controls.
 */
function quality_register_custom_header_section_partials( $wp_customize ){

    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[personal_site_name_1]', array(
        'selector'            => '.logo-text',
        'settings'            => 'quality_pro_options[personal_site_name_1]',

    ) );


    $wp_customize->selective_refresh->add_partial( 'quality_pro_options[header_address_1]', array(
        'selector'            => '.header-contacts',
        'settings'            => 'quality_pro_options[header_address_1]',

    ) );

}
add_action( 'customize_register', 'quality_register_custom_header_section_partials' );
?>
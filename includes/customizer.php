<?php

function def_wp__customize_register( $wp_customize ) {

// Get the Google Fonts via API
    $http = new WP_Http();
    $response = $http->get( 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyDqBTJaWL-nwltueKf6XZxWbZ73SYhQ1m4');
    $fonts = json_decode( $response['body'], true );
    $fontList = [];
    foreach($fonts['items'] as $font) {
        $fontList[$font['family']] = $font['family'];
    }

// Create our panels

    $wp_customize->add_panel( 'def_wp_typography', array(
        'capability'     => 'edit_theme_options',
        'title'          => 'Typography',
    ) );

    $wp_customize->add_panel( 'def_wp_header', array(
        'capability'     => 'edit_theme_options',
        'title'          => 'Header',
    ) );

    $wp_customize->add_panel( 'def_wp_footer', array(
        'capability'     => 'edit_theme_options',
        'title'          => 'Footer',
    ) );

// Create our sections

    $wp_customize->add_section( 'def_wp_header_typography' , array(
        'title'             => 'Header Typography',
        'panel'             => 'def_wp_typography',
    ) );

    $wp_customize->add_section( 'def_wp_body_typography' , array(
        'title'             => 'Body Typography',
        'panel'             => 'def_wp_typography',
    ) );

// Create our settings

    $wp_customize->add_setting( 'def_wp_typography_header' , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ) );

    $wp_customize->add_control( 'def_wp_typography_header_control', array(
        'label'      => 'Font Family',
        'section'    => 'def_wp_header_typography',
        'settings'   => 'def_wp_typography_header',
        'type'       => 'select',
        'choices'    => $fontList
    ) );

    $wp_customize->add_setting( 'def_wp_typography_body' , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ) );

    $wp_customize->add_control( 'def_wp_typography_body_control', array(
        'label'      => 'Font Family',
        'section'    => 'def_wp_body_typography',
        'settings'   => 'def_wp_typography_body',
        'type'       => 'select',
        'choices'    => $fontList
    ) );

    $wp_customize->add_setting( 'def_wp_typography_body_size' , array(
        'type'          => 'theme_mod',
        'transport'     => 'refresh',
    ) );

    $wp_customize->add_control( 'def_wp_typography_body_size_control', array(
        'label'      => 'Font Size',
        'section'    => 'def_wp_body_typography',
        'settings'   => 'def_wp_typography_body_size',
        'type'       => 'number',
        'input_attrs'=> array(
            'step' => 1,
            'min' => 10,
            'max' => 100,
        ),
    ) );

//    $wp_customize->add_setting( 'def_wp_typography_body_color' , array(
//        'type'          => 'theme_mod',
//        'transport'     => 'refresh',
//    ) );
//
//    $wp_customize->add_control( 'def_wp_typography_body_color_control', array(
//        'label'      => 'Font Color',
//        'section'    => 'def_wp_body_typography',
//        'settings'   => 'def_wp_typography_body_color',
//        'type'       => 'color',
//    ) );

}
add_action( 'customize_register', 'def_wp__customize_register' );
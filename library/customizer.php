<?php
/**
 * Customizer Additions
 *
 * @since   1.0.1
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage GreaterJacksonHabitatTheme2018/library
 */

add_action( 'customize_register', function( $wp_customize ) {
    
    // General Theme Options
    $wp_customize->add_section( 'greater_jackson_habitat_customizer_section' , array(
            'title'      => __( 'Greater Jackson Habitat for Humanity Settings', 'greater-jackson-habitat-theme' ),
            'priority'   => 30,
        ) 
    );
	
	$wp_customize->add_setting( 'gjh_logo_image', array(
            'default'     => 1,
            'transport'   => 'refresh',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'gjh_logo_image', array(
        'label'        => __( 'Interior Page Hero (Recommended 18:5 ratio, at least 1440x400)', 'greater-jackson-habitat-theme' ),
        'section'    => 'greater_jackson_habitat_customizer_section',
        'settings'   => 'gjh_logo_image',
        'mime_type'  => 'image',
    ) ) );
	
	$wp_customize->add_setting( 'gjh_events_archive_image', array(
            'default'     => 1,
            'transport'   => 'refresh',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'gjh_events_archive_image', array(
        'label'        => __( 'Events Archive Page Hero (Recommended 18:5 ratio, at least 1440x400)', 'greater-jackson-habitat-theme' ),
        'section'    => 'greater_jackson_habitat_customizer_section',
        'settings'   => 'gjh_events_archive_image',
        'mime_type'  => 'image',
    ) ) );
    
} );
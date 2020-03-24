<?php
/**
 * Add a TinyMCE button to create [gjh_slider] and [gjh_slide] Shortcodes
 *
 * @since   {{VERSION}}
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage  GreaterJacksonHabitatTheme2018/library/admin/tinymce
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Add Slider Shortcode to TinyMCE
 *
 * @since       {{VERSION}}
 * @return      void
 */
add_action( 'admin_init', 'add_gjh_slider_tinymce_filters' );
function add_gjh_slider_tinymce_filters() {
    
    if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
        
        add_filter( 'mce_buttons', function( $buttons ) {
            array_push( $buttons, 'gjh_slider_shortcode' );
            array_push( $buttons, 'gjh_slide_shortcode' );
            return $buttons;
        } );
        
        // Attach script to the button rather than enqueueing it
        add_filter( 'mce_external_plugins', function( $plugin_array ) {
            $plugin_array['gjh_slider_shortcode_script'] = get_stylesheet_directory_uri() . '/dist/assets/js/tinymce/gjh-slider.js';
            $plugin_array['gjh_slide_shortcode_script'] = get_stylesheet_directory_uri() . '/dist/assets/js/tinymce/gjh-slide.js';
            return $plugin_array;
        } );
        
    }
    
}

/**
 * Add Localized Text for our TinyMCE Button
 *
 * @since       {{VERSION}}
 * @return      Array Localized Text
 */
add_filter( 'gjh_tinymce_l10n', 'gjh_slider_tinymce_l10n' );
function gjh_slider_tinymce_l10n( $l10n ) {
    
    $l10n['gjh_slider_shortcode'] = array(
        'tinymce_title' => __( 'Add Slider', 'greater-jackson-habitat-theme' ),
        'slider_screenreader_title' => array(
            'label' => __( 'Screen Reader Title', 'greater-jackson-habitat-theme' ),
        ),
        'placeholder' => __( 'Place Slides within this container', 'greater-jackson-habitat-theme' ),
    );

    $l10n['gjh_slide_shortcode'] = array(
        'tinymce_title' => __( 'Add Slide', 'greater-jackson-habitat-theme' ),
        'slide_active' => array(
            'label' => __( 'Is this the default active Slide? Only one should be active at a time.', 'greater-jackson-habitat-theme' ),
        ),
        'placeholder' => __( 'Place an Image here', 'greater-jackson-habitat-theme' ),
    );
    
    return $l10n;
    
}
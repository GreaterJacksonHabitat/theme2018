<?php
/**
 * Add a TinyMCE button to create [gjh_button] Shortcodes
 *
 * @since   1.0.1
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage  GreaterJacksonHabitatTheme2018/library/admin/tinymce
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Add Button Shortcode to TinyMCE
 *
 * @since       1.0.1
 * @return      void
 */
add_action( 'admin_init', 'add_gjh_button_tinymce_filters' );
function add_gjh_button_tinymce_filters() {
    
    if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
        
        add_filter( 'mce_buttons', function( $buttons ) {
            array_push( $buttons, 'gjh_button_shortcode' );
            return $buttons;
        } );
        
        // Attach script to the button rather than enqueueing it
        add_filter( 'mce_external_plugins', function( $plugin_array ) {
            $plugin_array['gjh_button_shortcode_script'] = get_stylesheet_directory_uri() . '/dist/assets/js/tinymce/gjh-button.js';
            return $plugin_array;
        } );
        
    }
    
}

/**
 * Add Localized Text for our TinyMCE Button
 *
 * @since       1.0.1
 * @return      Array Localized Text
 */
add_filter( 'gjh_tinymce_l10n', 'gjh_button_tinymce_l10n' );
function gjh_button_tinymce_l10n( $l10n ) {
    
    $l10n['gjh_button_shortcode'] = array(
        'tinymce_title' => _x( 'Add Button', 'Button Shortcode TinyMCE Button Text', 'greater-jackson-habitat-theme' ),
        'button_text' => array(
            'label' => _x( 'Button Text', "Button's Text", 'greater-jackson-habitat-theme' ),
        ),
        'button_url' => array(
            'label' => _x( 'Button Link', 'Link for the Button', 'greater-jackson-habitat-theme' ),
        ),
        'colors' => array(
            'label' => _x( 'Color', 'Button Color Selection Label', 'greater-jackson-habitat-theme' ),
            'default' => 'secondary',
            'choices' => array(
                'primary' => _x( 'Habitat Blue', 'Primary Theme Color', 'greater-jackson-habitat-theme' ),
                'secondary' => _x( 'Habitat Green', 'Secondary Theme Color', 'greater-jackson-habitat-theme' ),
            ),
        ),
        'size' => array(
            'label' => _x( 'Size', 'Button Size Selection Lable', 'greater-jackson-habitat-theme' ),
            'default' => '',
            'choices' => array(
				'' => _x( 'Default', 'Default Button Size', 'greater-jackson-habitat-theme' ),
                'tiny' => _x( 'Tiny', 'Tiny Button Size', 'greater-jackson-habitat-theme' ),
                'small' => _x( 'Small', 'Small Button Size', 'greater-jackson-habitat-theme' ),
                'medium' => _x( 'Medium', 'Medium Button Size', 'greater-jackson-habitat-theme' ),
                'large' => _x( 'Large', 'Large Button Size', 'greater-jackson-habitat-theme' ),
            ),
        ),
        'hollow' => array(
            'label' => _x( 'Hollow/"Ghost" Button?', 'Hollow Button Style', 'greater-jackson-habitat-theme' ),
        ),
        'expand' => array(
            'label' => _x( 'Full Width?', 'Full Width Button', 'greater-jackson-habitat-theme' ),
        ),
        'new_tab' => array(
            'label' => __( 'Open Link in a New Tab?', 'greater-jackson-habitat-theme' ),
        ),
    );
    
    return $l10n;
    
}
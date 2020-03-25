<?php
/**
 * Add a TinyMCE button to create [gjh_row] and [gjh_column] Shortcodes
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
 * Add Button Shortcode to TinyMCE
 *
 * @since       {{VERSION}}
 * @return      void
 */
add_action( 'admin_init', 'add_gjh_column_tinymce_filters' );
function add_gjh_column_tinymce_filters() {
    
    if ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' ) ) {
        
        add_filter( 'mce_buttons', function( $buttons ) {
            array_push( $buttons, 'gjh_row_shortcode' );
            array_push( $buttons, 'gjh_column_shortcode' );
            return $buttons;
        } );
        
        // Attach script to the button rather than enqueueing it
        add_filter( 'mce_external_plugins', function( $plugin_array ) {
            $plugin_array['gjh_row_shortcode_script'] = get_stylesheet_directory_uri() . '/dist/assets/js/tinymce/gjh-row.js';
            $plugin_array['gjh_column_shortcode_script'] = get_stylesheet_directory_uri() . '/dist/assets/js/tinymce/gjh-column.js';
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
add_filter( 'gjh_tinymce_l10n', 'gjh_row_tinymce_l10n' );
function gjh_row_tinymce_l10n( $l10n ) {
    
    $l10n['gjh_row_shortcode'] = array(
        'tinymce_title' => __( 'Add Row', 'greater-jackson-habitat-theme' ),
		'equalizer' => array(
            'label' => __( 'Should all Columns be the same height?', 'greater-jackson-habitat-theme' ),
        ),
		'placeholder_text' => "<p>" . __( 'Place your Columns here', 'greater-jackson-habitat-theme' ) . "</p>",
    );
    
    return $l10n;
    
}

/**
 * Add Localized Text for our TinyMCE Button
 *
 * @since       {{VERSION}}
 * @return      Array Localized Text
 */
add_filter( 'gjh_tinymce_l10n', 'gjh_column_tinymce_l10n' );
function gjh_column_tinymce_l10n( $l10n ) {
	
	$screen_sizes = array(
		'small',
		'medium',
		'large',
	);
	
	foreach ( $screen_sizes as $screen_size ) {
		
		${ $screen_size . '_options' } = array();
	
		for ( $index = 1; $index <= 12; $index++ ) {

			${ $screen_size . '_options' }[ $screen_size . '-' . $index ] = sprintf( 
				_x( '%s of the Row', 'Amount of space used in row', 'greater-jackson-habitat-theme' ),
				sprintf( "%s%%", round( ( $index / 12 ) * 100 ) )
			);

		}
		
	}
    
    $l10n['gjh_column_shortcode'] = array(
        'tinymce_title' => __( 'Add Column', 'greater-jackson-habitat-theme' ),
		'small' => array(
            'label' => __( 'Small Screens (Below 640px wide)', 'greater-jackson-habitat-theme' ),
            'default' => 'small-12',
            'choices' => $small_options,
        ),
		'medium' => array(
            'label' => __( 'Medium Screens (Between 640px wide and 1024px wide)', 'greater-jackson-habitat-theme' ),
            'default' => 'medium-12',
            'choices' => $medium_options,
        ),
		'large' => array(
            'label' => __( 'Large Screens (Above 1024px wide)', 'greater-jackson-habitat-theme' ),
            'default' => 'large-12',
            'choices' => $large_options,
        ),
		'placeholder_text' => "<p>" . __( 'Place your Column content here', 'greater-jackson-habitat-theme' ) . "</p>",
    );
    
    return $l10n;
    
}
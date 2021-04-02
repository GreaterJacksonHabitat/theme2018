<?php
/**
 * Edit the Color Palette so only Theme Colors are available
 *
 * @since   1.0.4
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage  GreaterJacksonHabitatTheme2018/library/admin/tinymce
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_filter( 'tiny_mce_before_init', 'gjh_tinymce_color_palette' );

/**
 * Customize the TinyMCE Color Palette with brand colors
 * 
 * @param		array $options TinyMCE Options
 *                                
 * @since		1.0.4
 * @return		array TinyMCE Options
 */
function gjh_tinymce_color_palette( $options ) {
	
    $custom_colors =  '"02abd7", "' . __( 'Bright Blue', 'greater-jackson-habitat-theme' ) . '",
						"c3d500", "' . __( 'Bright Green', 'greater-jackson-habitat-theme' ) . '",
						"ffffff", "' . __( 'White', 'greater-jackson-habitat-theme' ) . '",
						"8a8a8d", "' . __( 'Gray', 'greater-jackson-habitat-theme' ) . '",
						"000000", "' . __( 'Black', 'greater-jackson-habitat-theme' ) . '",
                        "385888", "' . __( 'Habitat Blue', 'greater-jackson-habitat-theme' ) . '",
						"3eae2a", "' . __( 'Habitat Green', 'greater-jackson-habitat-theme' ) . '",
						"ff7d3f", "' . __( 'Orange', 'greater-jackson-habitat-theme' ) . '",
						"a83338", "' . __( 'Brick', 'greater-jackson-habitat-theme' ) . '"';
	
    $options['textcolor_map'] = '[' . $custom_colors . ']';
	
    return $options;
	
}
<?php
/**
 * Home extra meta.
 *
 * @since   1.0.0
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage  GreaterJacksonHabitatTheme2018/library/admin/extra-meta
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'init', 'greater_jackson_habitat_remove_home_supports' );
add_action( 'do_meta_boxes', 'greater_jackson_habitat_remove_home_metaboxes' );
add_action( 'add_meta_boxes', 'greater_jackson_habitat_add_home_metaboxes' );

add_filter( 'post_type_labels_page', 'greater_jackson_habitat_home_featured_image_labels' );

/**
 * Determine if we're editing the Home Page
 * 
 * @since       1.0.0
 * @return      boolean Whether we're editing the Home Page or not
 */
function greater_jackson_habitat_is_editing_home() {
    
    if ( is_admin() && 
        isset( $_REQUEST['post'] ) && 
        $_REQUEST['post'] == get_option( 'page_on_front' ) ) {
        return true;
    }
    
    return false;
    
}

/**
 * Remove Supports from the Home Page
 * 
 * @since       1.0.0
 * @return      void
 */
function greater_jackson_habitat_remove_home_supports() {
    
    if ( greater_jackson_habitat_is_editing_home() ) {

        //remove_post_type_support( 'page', 'thumbnail' );
        
    }
    
}

/**
 * Change Featured Image Labels for Home
 * 
 * @param		array $labels Featured Image Labels
 *                                      
 * @since		1.0.0
 * @return		array Featured Image Labels
 */
function greater_jackson_habitat_home_featured_image_labels( $labels ) {
	
	if ( greater_jackson_habitat_is_editing_home() ) {

		$labels->featured_image = __( 'Background Image (Recommended 7:5 ratio, at least 1400x1000)', 'greater-jackson-habitat-theme' );
		$labels->set_featured_image = __( 'Set Background Image', 'greater-jackson-habitat-theme' );
		$labels->remove_featured_image = __( 'Remove Background Image', 'greater-jackson-habitat-theme' );
		$labels->use_featured_image = __( 'Use as Background Image', 'greater-jackson-habitat-theme' );
		
	}

	return $labels;

}

/**
 * Needs to be called at do_meta_boxes since it is created at a different time than Supports Metaboxes
 * 
 * @since       1.0.0
 * @return      void
 */
function greater_jackson_habitat_remove_home_metaboxes() {
    
    if ( greater_jackson_habitat_is_editing_home() ) {
    
        // "Attributes" Meta Box
        remove_meta_box( 'pageparentdiv', 'page', 'side' );
        
    }
    
}

/**
 * Create Metaboxes for the Home Page
 * 
 * @since       1.0.0
 * @return      void
 */
function greater_jackson_habitat_add_home_metaboxes() {
    
    if ( greater_jackson_habitat_is_editing_home() ) {
        
    }
    
}
<?php
/**
 * Page extra meta.
 *
 * @since   1.0.0
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage  GreaterJacksonHabitatTheme2018/library/admin/extra-meta
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', 'greater_jackson_habitat_add_page_metaboxes' );

add_filter( 'post_type_labels_page', 'greater_jackson_habitat_page_featured_image_labels' );
add_filter( 'post_type_labels_tribe_events', 'greater_jackson_habitat_page_featured_image_labels' );

/**
 * Change Featured Image Labels for other Pages
 * 
 * @param		array $labels Featured Image Labels
 *                                      
 * @since		1.0.0
 * @return		array Featured Image Labels
 */
function greater_jackson_habitat_page_featured_image_labels( $labels ) {
	
	if ( ! greater_jackson_habitat_is_editing_home() ) {

		$labels->featured_image = __( 'Hero Image (Recommended 18:5 ratio, at least 1440x400)', 'greater-jackson-habitat-theme' );
		$labels->set_featured_image = __( 'Set Hero Image', 'greater-jackson-habitat-theme' );
		$labels->remove_featured_image = __( 'Remove Hero Image', 'greater-jackson-habitat-theme' );
		$labels->use_featured_image = __( 'Use as Hero Image', 'greater-jackson-habitat-theme' );
		
	}

	return $labels;

}

/**
 * Create Metaboxes for Pages
 * 
 * @since       1.0.0
 * @return      void
 */
function greater_jackson_habitat_add_page_metaboxes() {
	
	global $post;
	
	// Each page except the Home Page
	if ( greater_jackson_habitat_is_editing_home() ) return;
	
	if ( get_post_meta( $post->ID, '_wp_page_template', true ) !== 'page-templates/about.php' ) {
	
		add_meta_box(
			'gjh-subtitle',
			__( 'Subtitle', 'greater-jackson-habitat-theme' ),
			'greater_jackson_habitat_subtitle_metabox_content',
			'page',
			'normal',
			'high'
		);
		
	}
	
	add_meta_box(
		'gjh-extra-meta',
		__( 'Extra Section', 'greater-jackson-habitat-theme' ),
		'greater_jackson_habitat_extra_metabox_content',
		'page',
		'normal',
		'low'
	);
    
}

/**
 * Adds Become a Volunteer Metabox
 * 
 * @since		1.0.0
 * @return		void
 */
function greater_jackson_habitat_extra_metabox_content() {
	
	greater_jackson_habitat_do_field_textarea( array(
		'name' => 'gjh_extra',
		'group' => 'gjh_extra',
		'wysiwyg' => true,
	) );
	
	greater_jackson_habitat_init_field_group( 'gjh_extra' );
	
}

/**
 * Adds Become a Subtitle Metabox
 * 
 * @since		1.0.0
 * @return		void
 */
function greater_jackson_habitat_subtitle_metabox_content() {
	
	greater_jackson_habitat_do_field_text( array(
		'name' => 'gjh_subtitle',
		'group' => 'gjh_subtitle',
		'input_atts' => array(
			'style' => 'width: 100%',
		),
	) );
	
	greater_jackson_habitat_init_field_group( 'gjh_subtitle' );
	
}
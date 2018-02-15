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
	
	add_meta_box(
		'gjh-extra-meta',
		__( 'Extra Section', 'greater-jackson-habitat-theme' ),
		'greater_jackson_habitat_extra_metabox_content',
		'page',
		'normal',
		'low'
	);
    
}/**
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
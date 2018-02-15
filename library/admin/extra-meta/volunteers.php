<?php
/**
 * Volunteers page extra meta.
 *
 * @since   1.0.0
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage  GreaterJacksonHabitatTheme2018/library/admin/extra-meta
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', 'greater_jackson_habitat_add_volunteer_metaboxes' );

/**
 * Create Metaboxes for the volunteer Page
 * 
 * @since       1.0.0
 * @return      void
 */
function greater_jackson_habitat_add_volunteer_metaboxes() {
	
	global $post;
	
	if ( get_post_meta( $post->ID, '_wp_page_template', true ) !== 'page-templates/volunteers.php' ) return;
    
    add_meta_box(
		'volunteer-faq-meta',
		__( 'Volunteer FAQs', 'greater-jackson-habitat-theme' ),
		'greater_jackson_habitat_volunteer_faq_metabox_content',
		'page',
		'normal'
	);
    
}

/**
 * Adds Volunteer FAQ Metabox
 * 
 * @since		1.0.0
 * @return		void
 */
function greater_jackson_habitat_volunteer_faq_metabox_content() {
	
	greater_jackson_habitat_do_field_repeater( array(
		'name' => 'volunteer_faqs',
		'group' => 'volunteer_faqs',
		'fields' => array(
			'label' => array(
				'type' => 'text',
				'args' => array(
					'label' => __( 'Label', 'greater-jackson-habitat-theme' ),
					'input_class' => 'regular-text',
				),
			),
			'content' => array(
				'type' => 'textarea',
				'args' => array(
					'label' => __( 'Content', 'greater-jackson-habitat-theme' ),
					'wysiwyg' => true,
				),
			),
		),
	) );
	
	greater_jackson_habitat_init_field_group( 'volunteer_faqs' );
	
}
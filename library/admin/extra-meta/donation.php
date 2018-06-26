<?php
/**
 * Donation page extra meta.
 *
 * @since   1.0.0
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage  GreaterJacksonHabitatTheme2018/library/admin/extra-meta
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', 'greater_jackson_habitat_add_donation_metaboxes' );

/**
 * Create Metaboxes for the donation Page
 * 
 * @since       1.0.0
 * @return      void
 */
function greater_jackson_habitat_add_donation_metaboxes() {
	
	global $post;
	
	if ( get_post_meta( $post->ID, '_wp_page_template', true ) !== 'page-templates/donation.php' ) return;
	
	add_meta_box(
		'donation-sections-meta',
		__( 'Donatation Sections', 'greater-jackson-habitat-theme' ),
		'greater_jackson_habitat_donation_section_metabox_content',
		'page',
		'normal'
	);
    
}

/**
 * Adds Sections Metabox
 * 
 * @since		1.0.0
 * @return		void
 */
function greater_jackson_habitat_donation_section_metabox_content() {
	
	greater_jackson_habitat_do_field_repeater( array(
		'name' => 'donation_sections',
		'group' => 'donation_sections',
		'fields' => array(
			'title' => array(
				'type' => 'text',
				'args' => array(
					'label' => __( 'Section Title', 'greater-jackson-habitat-theme' ),
					'input_class' => 'regular-text',
				),
			),
			'image' => array(
				'type' => 'media',
				'args' => array(
					'label' => __( 'Image (Recommended Size 950x450)', 'greater-jackson-habitat-theme' ),
					'type' => 'image',
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
	
	greater_jackson_habitat_init_field_group( 'donation_sections' );
	
}
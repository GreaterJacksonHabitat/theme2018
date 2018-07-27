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

function greater_jackson_habitat_single_post_types() {
	
	return apply_filters( 'gjh_single_post_types', array(
		'programs',
		'projects',
		'post',
		'page'
	) );
	
}

add_action( 'add_meta_boxes', 'greater_jackson_habitat_add_single_metaboxes' );

/**
 * Create Metaboxes for Single Posts
 * 
 * @since       1.0.0
 * @return      void
 */
function greater_jackson_habitat_add_single_metaboxes() {
	
	global $post;
	
	if ( ! in_array( $post->post_type, greater_jackson_habitat_single_post_types() ) || 
		( $post->post_type == 'page' && get_post_meta( $post->ID, '_wp_page_template', true ) !== 'page-templates/about.php' ) ) return;
	
	add_meta_box(
		'gjh-hero-text',
		__( 'Hero Text', 'greater-jackson-habitat-theme' ),
		'greater_jackson_habitat_single_hero_text_metabox_content',
		$post->post_type,
		'normal',
		'high'
	);
    
}

/**
 * Adds Become a Hero Text Metabox
 * 
 * @since		1.0.0
 * @return		void
 */
function greater_jackson_habitat_single_hero_text_metabox_content() {
	
	greater_jackson_habitat_do_field_textarea( array(
		'name' => 'gjh_hero_text',
		'group' => 'gjh_hero_text',
		'wysiwyg' => true,
		'wysiwyg_options' => array(
			'mediaButtons' => true,
			'tinymce' => array(
				'toolbar1' => 'formatselect,bold,italic,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,wp_more,wp_adv',
				'toolbar2' => 'strikethrough,hr,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help'
			),
    	),
	) );
	
	greater_jackson_habitat_init_field_group( 'gjh_hero_text' );
	
}
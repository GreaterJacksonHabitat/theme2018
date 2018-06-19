<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package GreaterJacksonHabitatTheme2018
 * @since FoundationPress 1.0.0
 */

$theme_header = wp_get_theme();

define( 'THEME_VER', $theme_header->get( 'Version' ) );
define( 'THEME_URL', get_stylesheet_directory_uri() );
define( 'THEME_DIR', get_stylesheet_directory() );

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/class-foundationpress-top-bar-walker.php' );
require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );

global $greater_jackson_habitat_field_helpers;

require_once( 'library/rbm-field-helpers/rbm-field-helpers.php' );
$greater_jackson_habitat_field_helpers = new RBM_FieldHelpers( array(
    'ID'   => 'greater_jackson_habitat', // Your Theme/Plugin uses this to differentiate its instance of RBM FH from others when saving/grabbing data
    'l10n' => array(
        'field_table'    => array(
            'delete_row'    => __( 'Delete Row', 'greater-jackson-habitat-theme' ),
            'delete_column' => __( 'Delete Column', 'greater-jackson-habitat-theme' ),
        ),
        'field_select'   => array(
            'no_options'       => __( 'No select options.', 'greater-jackson-habitat-theme' ),
            'error_loading'    => __( 'The results could not be loaded', 'greater-jackson-habitat-theme' ),
            /* translators: %d is number of characters over input limit */
            'input_too_long'   => __( 'Please delete %d character(s)', 'greater-jackson-habitat-theme' ),
            /* translators: %d is number of characters under input limit */
            'input_too_short'  => __( 'Please enter %d or more characters', 'greater-jackson-habitat-theme' ),
            'loading_more'     => __( 'Loading more results...', 'greater-jackson-habitat-theme' ),
            /* translators: %d is maximum number items selectable */
            'maximum_selected' => __( 'You can only select %d item(s)', 'greater-jackson-habitat-theme' ),
            'no_results'       => __( 'No results found', 'greater-jackson-habitat-theme' ),
            'searching'        => __( 'Searching...', 'greater-jackson-habitat-theme' ),
        ),
        'field_repeater' => array(
            'collapsable_title' => __( 'New Row', 'greater-jackson-habitat-theme' ),
            'confirm_delete'    => __( 'Are you sure you want to delete this element?', 'greater-jackson-habitat-theme' ),
            'delete_item'       => __( 'Delete', 'greater-jackson-habitat-theme' ),
            'add_item'          => __( 'Add', 'greater-jackson-habitat-theme' ),
        ),
        'field_media'    => array(
            'button_text'        => __( 'Upload / Choose Media', 'greater-jackson-habitat-theme' ),
            'button_remove_text' => __( 'Remove Media', 'greater-jackson-habitat-theme' ),
            'window_title'       => __( 'Choose Media', 'greater-jackson-habitat-theme' ),
        ),
        'field_checkbox' => array(
            'no_options_text' => __( 'No options available.', 'greater-jackson-habitat-theme' ),
        ),
    ),
) );

require_once( 'library/rbm-field-helpers-functions.php' );

// Customizer
require_once( 'library/customizer.php' );

// Extra Meta
require_once( 'library/admin/extra-meta/front-page.php' );
require_once( 'library/admin/extra-meta/page.php' );
require_once( 'library/admin/extra-meta/volunteers.php' );

add_filter( 'post_type_labels_programs', 'greater_jackson_habitat_cpt_featured_image_labels' );
add_filter( 'post_type_labels_projects', 'greater_jackson_habitat_cpt_featured_image_labels' );
add_filter( 'post_type_labels_sponsors', 'greater_jackson_habitat_cpt_featured_image_labels' );

/**
 * Change Featured Image Labels for other our CPTs
 * 
 * @param		array $labels Featured Image Labels
 *                                      
 * @since		1.0.0
 * @return		array Featured Image Labels
 */
function greater_jackson_habitat_cpt_featured_image_labels( $labels ) {

	$labels->featured_image = __( 'Featured Image (Recommended 32:17 ratio, at least 640x340)', 'greater-jackson-habitat-theme' );
	$labels->set_featured_image = __( 'Set Featured Image', 'greater-jackson-habitat-theme' );
	$labels->remove_featured_image = __( 'Remove Featured Image', 'greater-jackson-habitat-theme' );
	$labels->use_featured_image = __( 'Use as Featured Image', 'greater-jackson-habitat-theme' );

	return $labels;

}

// Shortcodes
require_once( 'library/shortcodes/gjh-button.php' );

// TinyMCE functionality
require_once( 'library/admin/tinymce/localization.php' );
require_once( 'library/admin/tinymce/gjh-button.php' );
require_once( 'library/admin/tinymce/color-palette.php' );
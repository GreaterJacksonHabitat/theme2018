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

add_filter( 'github_updater_disable_wpcron', '__return_true' );

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

if ( class_exists( 'RBM_FieldHelpers' ) ) {

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

}
else {
    wp_die( 'RBM Field Helpers Wrapper must be active' );
}

// Customizer
require_once( 'library/customizer.php' );

// Extra Meta
require_once( 'library/admin/extra-meta/front-page.php' );
require_once( 'library/admin/extra-meta/page.php' );
require_once( 'library/admin/extra-meta/single.php' );
require_once( 'library/admin/extra-meta/volunteers.php' );
require_once( 'library/admin/extra-meta/donation.php' );

require_once( 'library/advanced-custom-fields.php' );

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
require_once( 'library/shortcodes/gjh-grid.php' );
require_once( 'library/shortcodes/gjh-slider.php' );

// TinyMCE functionality
require_once( 'library/admin/tinymce/localization.php' );
require_once( 'library/admin/tinymce/gjh-button.php' );
require_once( 'library/admin/tinymce/gjh-grid.php' );
require_once( 'library/admin/tinymce/gjh-slider.php' );
require_once( 'library/admin/tinymce/color-palette.php' );

/**
 * Add Google Tag Manager code to <head>
 * 
 * @since		{{VERSION}}
 * @return		void
 */
add_action( 'wp_head', 'gjh_tag_manager_head' );
function gjh_tag_manager_head() {
	
	?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TDZQ4LB');</script>
	<!-- End Google Tag Manager -->

	<?php 
	
}

/**
 * Add Google Tag Manager code to <body>
 * 
 * @since		{{VERSION}}
 * @return		void
 */
add_action( 'gjh_body_start', 'gjh_tag_manager_body' );
function gjh_tag_manager_body() {
	
	?>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDZQ4LB"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php 
	
}

add_filter( 'tribe_event_featured_image', 'gjh_tribe_event_featured_image', 10, 3 );

/**
 * Stop Events Calendar from putting in a Featured Image when we don't want it
 * 
 * @param		string  $featured_image_html Featured Image HTML
 * @param		integer $post_id             Post ID
 * @param		string  $size                Image Size Name
 *                                                 
 * @since		{{VERSION}}
 * @return		string  Featured Image HTML
 */
function gjh_tribe_event_featured_image( $featured_image_html, $post_id, $size ) {
	return '';
}

// No. Just... no
remove_action( 'wp_head', array( 'Tribe__Events__Templates', 'wpHeadFinished' ), 999 );

require_once __DIR__ . '/vendor/autoload.php';

use function SSNepenthe\ColorUtils\{
    rgb, scale_color, is_light
};

/**
 * Determine brightness of Hex color similar to SASS lightness()
 * 
 * @param       string $hex Hex Color
 * @param		integer Percentage of lightness to check against. 33% seems to match against what Foundation's defaults for button text color choices
 *                         
 * @since       {{VERSION}}
 * @return      boolean True for light, false for dark
 */
function gjh_is_light( $hex, $percentage = 65 ) {
    
    return is_light( $hex, $percentage );
    
}

/**
 * Replicates SASS scale-color()
 * 
 * @param		string $hex  Hex Color
 * @param		array  $args Arguments, such as 'lightness'
 *                                         
 * @since		{{VERSION}}
 * @return		string Scaled Hex Color
 */
function gjh_scale_color( $hex, $args ) {
	
	return scale_color( $hex, $args );
	
}

/**
 * Convert a Hex Color to RGB
 * 
 * @param		string $hex Hex Color
 *                         
 * @since		{{VERSION}}
 * @return		array  RGB Color Array
 */
function gjh_hex_to_rgb( $hex ) {
	
	$rgb = rgb( $hex );
	
	return array(
		'r' => $rgb->getRed(),
		'g' => $rgb->getGreen(),
		'b' => $rgb->getBlue(),
	);
	
}
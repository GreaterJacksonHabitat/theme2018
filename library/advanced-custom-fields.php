<?php
/**
 * Extra functionality for ACF
 *
 * @since   {{VERSION}}
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage  GreaterJacksonHabitatTheme2018/library
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_filter( 'acf/load_field/name=theme_color', 'gjh_acf_load_theme_colors' );

function gjh_acf_load_theme_colors( $field ) {

    $colors = array(
        'primary' => _x( 'Habitat Blue', 'Primary Theme Color', 'greater-jackson-habitat-theme' ),
        'secondary' => _x( 'Habitat Green', 'Secondary Theme Color', 'greater-jackson-habitat-theme' ),
    );

    foreach ( $colors as $key => $value ) {

        $field['choices'][ $key ] = $value;

    }

    return $field;

}
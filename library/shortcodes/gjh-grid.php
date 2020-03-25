<?php
/**
 * Adds the [gjh_row] and [gjh_column] shortcode
 *
 * @since   {{VERSION}}
 * @package GreaterJacksonHabitatTheme2018
 * @subpackage  GreaterJacksonHabitatTheme2018/library/shortcodes
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Add Row Shortcode
 *
 * @since       {{VERSION}}
 * @return      void
 */
add_shortcode( 'gjh_row', 'add_gjh_row_shortcode' );
function add_gjh_row_shortcode( $atts, $content = '' ) {
    
    $atts = shortcode_atts(
        array( // a few default values
			'equalizer' => false,
        ),
        $atts,
        'gjh_row'
    );
    
    ob_start();
	
	if ( $atts['equalizer'] ) {
	
		// Pass equalizer attribute to child columns
		$content = preg_replace( '/\[gjh_column\s/is', '[gjh_column equalizer=1 ', $content );
		
	}
	
	?>
    
    <div class="row expanded vibrant-life-row-shortcode"<?php echo ( $atts['equalizer'] ) ? ' data-equalizer': ''; ?>>
		<?php echo do_shortcode( $content ); ?>
	</div>

    <?php
    
    $output = ob_get_contents();
    ob_end_clean();
    
    return html_entity_decode( $output );
    
}

/**
 * Add Column Shortcode
 *
 * @since       {{VERSION}}
 * @return      void
 */
add_shortcode( 'gjh_column', 'add_gjh_column_shortcode' );
function add_gjh_column_shortcode( $atts, $content = '' ) {
    
    $atts = shortcode_atts(
        array( // a few default values
			'small' => 'small-12',
			'medium' => 'medium-12',
			'large' => 'large-12',
			'equalizer' => false,
        ),
        $atts,
        'gjh_column'
    );
    
    ob_start();
	
	?>
    
    <div class="<?php echo $atts['small']; ?> <?php echo $atts['medium']; ?> <?php echo $atts['large']; ?> columns gjh-column-shortcode"<?php echo ( $atts['equalizer'] ) ? ' data-equalizer-watch' : ''; ?>>
		<?php echo do_shortcode( $content ); ?>
	</div>

    <?php
    
    $output = ob_get_contents();
    ob_end_clean();
    
    return html_entity_decode( $output );
    
}
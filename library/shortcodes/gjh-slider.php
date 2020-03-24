<?php
/**
 * Adds the [gjh_slider] and [gjh_slide] shortcode
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
 * Add Slider Shortcode
 *
 * @since       {{VERSION}}
 * @return      HTML
 */
add_shortcode( 'gjh_slider', 'add_gjh_slider_shortcode' );
function add_gjh_slider_shortcode( $atts, $content = '' ) {
    
    $atts = shortcode_atts(
        array( // a few default values
            'slider_screenreader_title' => '',
        ),
        $atts,
        'gjh_slider'
    );
    
    ob_start();
    ?>

    <div class="orbit" role="region" aria-label="<?php echo $atts['slider_screenreader_title']; ?>" data-orbit>
        <div class="orbit-wrapper">

            <div class="orbit-controls">

                <button class="orbit-previous">
                    <span class="show-for-sr">
                        <?php _e( 'Previous Slide', 'greater-jackson-habitat-theme' ); ?>
                    </span>
                    &#x25C0;
                </button>

                <button class="orbit-next">
                    <span class="show-for-sr">
                        <?php _e( 'Next Slide', 'greater-jackson-habitat-theme' ); ?>
                    </span>
                    &#x25B6;
                </button>
            
            </div>

            <ul class="orbit-container">

                <?php

                    $content = preg_replace( '/<p>|<\/p>/', '', $content );

                ?>

                <?php echo do_shortcode( $content ); ?>

            </ul>

        </div>
    </div>

    <?php
    
    $output = ob_get_contents();
    ob_end_clean();
    
    return html_entity_decode( $output );
    
}

/**
 * Add Slide Shortcode
 *
 * @since       {{VERSION}}
 * @return      HTML
 */
add_shortcode( 'gjh_slide', 'add_gjh_slide_shortcode' );
function add_gjh_slide_shortcode( $atts, $content = '' ) {
    
    $atts = shortcode_atts(
        array( // a few default values
            'slide_active' => false,
        ),
        $atts,
        'gjh_slide'
    );
    
    ob_start();
    ?>

    <li class="orbit-slide<?php echo ( $atts['slide_active'] ) ? ' is-active' : ''; ?>">
        <?php echo $content; ?>
    </li>

    <?php
    
    $output = ob_get_contents();
    ob_end_clean();
    
    return html_entity_decode( $output );
    
}
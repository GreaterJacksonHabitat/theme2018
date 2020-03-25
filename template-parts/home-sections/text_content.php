<?php
/**
 * Text Content - Home Page Section
 *
 * @package GreaterJacksonHabitatTheme2018
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

$border = get_sub_field( 'border' );

?>

<div class="container<?php echo ( $border ) ? ' callout' : ''; ?>">

    <?php if ( $background_color = get_sub_field( 'background_color' ) ) : ?>

        <style type="text/css">

            #home-section-<?php echo $row_count; ?> .text_content.column-<?php echo $column_count; ?> .container {

                background-color: <?php echo $background_color; ?>;

            }

            #home-section-<?php echo $row_count; ?> .text_content.column-<?php echo $column_count; ?> .container, #home-section-<?php echo $row_count; ?> .text_content.column-<?php echo $column_count; ?> .container p, #home-section-<?php echo $row_count; ?> .text_content.column-<?php echo $column_count; ?> .container h1, #home-section-<?php echo $row_count; ?> .text_content.column-<?php echo $column_count; ?> .container h2, #home-section-<?php echo $row_count; ?> .text_content.column-<?php echo $column_count; ?> .container h3, #home-section-<?php echo $row_count; ?> .text_content.column-<?php echo $column_count; ?> .container h4, #home-section-<?php echo $row_count; ?> .text_content.column-<?php echo $column_count; ?> .container h5, #home-section-<?php echo $row_count; ?> .text_content.column-<?php echo $column_count; ?> .container h6 {

                <?php if ( ! gjh_is_light( $background_color ) ) : ?>

                    color: #fff;
                    font-weight: 700;

                <?php else : ?>

                    color: #0a0a0a;

                <?php endif; ?>

            }

        </style>

    <?php endif; ?>

    <?php echo apply_filters( 'the_content', get_sub_field( 'wysiwyg' ) ); ?>

</div>
<?php
/**
 * Icon Block - Home Page Section
 *
 * @package GreaterJacksonHabitatTheme2018
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

?>

<div class="icon-block">

    <?php if ( $background_color = get_sub_field( 'background_color' ) ) : ?>

        <style type="text/css">

            #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> {

                background-color: <?php echo $background_color; ?>;

            }

            #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?>, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> p, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h1, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h2, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h3, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h4, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h5, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h6 {

                <?php if ( ! gjh_is_light( $background_color ) ) : ?>

                    color: #fff;

                <?php else : ?>

                    color: #0a0a0a;

                <?php endif; ?>

            }

        </style>

    <?php endif; ?>

    <?php if ( $icon_background_color = get_sub_field( 'icon_background_color' ) ) : ?>

        <style type="text/css">

            #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> .circle {

                background-color: <?php echo $icon_background_color; ?>;

            }

        </style>

    <?php endif; ?>

    <?php 

    $icon_link = get_sub_field( 'icon_link' ); 
    
    if ( $icon_link ) : ?>

        <a href="<?php echo $icon_link; ?>">

    <?php endif; ?>

    <div class="circle">

        <div class="icon">

            <?php echo wp_get_attachment_image( get_sub_field( 'icon' ), 'full' ); ?>

        </div>

    </div>

    <?php if ( $icon_link ) : ?>

        </a>

    <?php endif; ?>

    <?php if ( $below_text = get_sub_field( 'below_text' ) ) : ?>

        <div class="below-text">
            <?php echo apply_filters( 'the_content', $below_text ); ?>
        </div>

    <?php endif; ?>

</div>
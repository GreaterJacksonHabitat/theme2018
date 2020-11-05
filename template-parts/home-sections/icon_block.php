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

            #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> .icon-block {

                background-color: <?php echo $background_color; ?>;

            }

            #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> .icon-block, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> p.icon-block, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h1.icon-block, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h2.icon-block, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h3.icon-block, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h4.icon-block, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h5.icon-block, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> h6 {

                <?php gjh_light_or_dark_text( $background_color, '#0a0a0a' ); ?>

                <?php if ( ! gjh_is_light( $background_color ) ) : ?>

                    font-weight: 700;

                <?php endif; ?>

            }

            <?php gjh_light_or_dark_link( '#home-section-' . $row_count . ' .icon_block.column-' . $column_count . ' .icon-block a', $background_color ); ?>

        </style>

    <?php endif; ?>

    <?php if ( $icon_background_color = get_sub_field( 'icon_background_color' ) ) : ?>

        <style type="text/css">

            #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> .circle {

                background-color: <?php echo $icon_background_color; ?>;

            }

            #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> > .icon-block > a:hover .circle, #home-section-<?php echo $row_count; ?> .icon_block.column-<?php echo $column_count; ?> > .icon-block > a:focus .circle {

                <?php $hover_color = gjh_smart_scale( $icon_background_color, 14 ); ?>

                background-color: <?php echo $hover_color; ?>;

            }

            <?php gjh_light_or_dark_link( '#home-section-' . $row_count . ' .icon_block.column-' . $column_count . ' > .icon-block > a .circle', $hover_color ); ?>

        </style>

    <?php endif; ?>

    <?php 

    $icon_link = get_sub_field( 'icon_link' ); 
    
    if ( $icon_link ) : ?>

        <a href="<?php echo $icon_link; ?>"<?php echo ( ! empty( get_sub_field( 'open_link_in_new_tab' ) ) ? ' target="_blank"' : '' ); ?>>

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
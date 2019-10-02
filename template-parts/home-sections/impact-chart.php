<?php
/**
 * Impact Chart - Home Page Section
 *
 * @package GreaterJacksonHabitatTheme2018
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( $above_text = get_sub_field( 'above_text' ) ) : ?>

	<div class="above-text">
		<?php echo apply_filters( 'the_content', $above_text ); ?>
	</div>

<?php endif;

$chart_columns = ( $chart_columns = get_sub_field( 'columns' ) ) ? count( $chart_columns ) : 0;
$chart_medium_class = 'medium-' . ( 12 / $chart_columns );

if ( have_rows( 'columns' ) ) : ?>

	<div class="row">

		<?php while ( have_rows( 'columns' ) ) : the_row(); ?>

			<div class="small-12 <?php echo $chart_medium_class; ?> columns chart-columns">

				<div class="circle">



				</div>

				<div class="text-center">

					<h5 class="number">
						<?php echo get_sub_field( 'number' ); ?>
					</h5>

					<h6 class="text-label">
						<?php echo get_sub_field( 'label' ); ?>
					</h6>

				</div>

			
			</div>

		<?php endwhile; ?>

	</div>

<?php endif;
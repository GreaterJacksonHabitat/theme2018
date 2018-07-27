<?php
/**
 * Interior Page Above Footer Area
 *
 * @package GreaterJacksonHabitatTheme2018
 */

?>

<?php /*

<?php if ( get_post_type() !== 'tribe_events' ) : ?>

	<div class="expanded row extra-meta-section" data-equalizer data-equalize-on="small" data-equalize-on-stack="true">

		<div class="small-12 medium-6 columns extra-meta" data-equalizer-watch>

			<?php echo apply_filters( 'the_content', ( $extra = greater_jackson_habitat_get_field( 'gjh_extra' ) ) ? $extra : __( 'Add to this by editing the Page', 'greater-jackson-habitat-theme' ) ); ?>

		</div>
		<div class="small-12 medium-6 columns events" data-equalizer-watch>
			
			<h4><?php _e( 'Latest Event', 'greater-jackson-habitat-theme' ); ?></h4>

			<?php 
			
				global $post;
			
				$past_event = new WP_Query( array(
					'post_type' => 'tribe_events',
					'posts_per_page' => 1,
					'eventDisplay' => 'past',
					'order' => 'DESC',
				) );
			
				if ( $past_event->have_posts() ) : 
			
					while ( $past_event->have_posts() ) : $past_event->the_post(); ?>
			
						<strong>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
						</strong>
			
						<p>
							<strong>
								<?php echo tribe_get_start_date( get_the_ID(), false, tribe_get_date_format( true ) ); ?>
							</strong>
						</p>
			
						<?php the_excerpt(); ?>
			
					<?php endwhile; 
			
					wp_reset_postdata();
			
				else : ?>
			
					<strong><?php _e( 'There are no Past Events yet', 'greater-jackson-habitat-theme' ); ?></strong>
			
				<?php endif;
			
			?>

		</div>

	</div>

<?php endif; ?>

*/ ?>

<div class="expanded row sponsors-section" data-equalizer data-equalize-on="small" data-equalize-on-stack="true">
	
	<div class="small-12 medium-5 columns text">
		
		<div data-equalizer-watch>
		
			<h5><?php _e( 'Our Featured Sponsors', 'greater-jackson-habitat-theme' ); ?></h5>

			<p><?php _e( 'Thank you for being a featured sponsor!', 'greater-jackson-habitat-theme' ); ?></p>
			
		</div>
	
	</div>
	
	<div class="small-12 medium-7 columns sponsors-loop">
		
		<div class="row">
			
			<?php
			
				global $post;
			
				$sponsors = new WP_Query( array(
					'post_type' => 'sponsors',
					'posts_per_page' => 4, // Only 4 will show for space reasons
				) );
			
				if ( $sponsors->have_posts() ) : 
			
					while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>
			
						<div <?php post_class( array(
							'small-12',
							'medium-3',
							'columns',
							'text-center',
						) ); ?> data-equalizer-watch>
							
							<?php $website = get_post_meta( get_the_ID(), 'rbm_cpts_gjh_sponsor_website', true ); ?>
							
							<?php if ( $website ) : ?>
							
								<a href="<?php echo $website; ?>" target="_blank" title="<?php the_title(); ?>">
									
							<?php endif; ?>
							
							<?php the_post_thumbnail( 'medium' ); ?>
									
							<?php if ( $website ) : ?>
							
								</a>
									
							<?php endif; ?>
			
						</div>
			
					<?php endwhile;
			
					wp_reset_postdata();
			
				endif; 
			
			?>
		
		</div>
	
	</div>

</div>
<?php
/**
 * Interior Page Above Footer Area
 *
 * @package GreaterJacksonHabitatTheme2018
 */

?>

<div class="expanded row extra-meta-section" data-equalizer data-equalize-on="small" data-equalize-on-stack="true">
	
	<div class="small-12 medium-6 columns extra-meta" data-equalizer-watch>
		
		<?php echo apply_filters( 'the_content', ( $extra = greater_jackson_habitat_get_field( 'gjh_extra' ) ) ? $extra : __( 'Add to this by editing the Page', 'greater-jackson-habitat-theme' ) ); ?>
		
	</div>
	<div class="small-12 medium-6 columns events" data-equalizer-watch>
		
		Events stuff will go here later
		
	</div>
	
</div>

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
							
							<?php the_post_thumbnail( 'medium' ); ?>
			
						</div>
			
					<?php endwhile;
			
					wp_reset_postdata();
			
				endif; 
			
			?>
		
		</div>
	
	</div>

</div>
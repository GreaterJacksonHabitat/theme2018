<?php
/*
Template Name: Volunteers
*/
get_header();

get_template_part( 'template-parts/interior', 'hero' );

do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

	<div class="main-wrap row">
		<div class="small-12 columns main-content">
			
			<?php the_content(); ?>
			
		</div>
	</div>

<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<div class="main-wrap row expanded volunteer-sections" data-equalizer data-equalize-on="medium" data-equalize-by-row="true">
	
	<?php 
	
		$sections = greater_jackson_habitat_get_field( 'volunteer_sections' );
	
		foreach ( $sections as $section ) : ?>
			
			<div class="card small-12 medium-6 columns" data-equalizer-watch>
	
				<?php echo wp_get_attachment_image( $section['image'], 'full' ); ?>

				<div class="card-content">
					
					<h4><?php echo $section['title']; ?></h4>

					<?php echo apply_filters( 'the_content', $section['content'] ); ?>

				</div>

			</div>
			
		<?php endforeach; ?>
	
</div>

<div class="main-wrap row">
	<div class="small-12 columns faqs">
		
		<h2 class="text-center"><?php _e( 'F.A.Q.', 'greater-jackson-habitat-theme' ); ?></h2>

		<ul class="accordion" data-accordion>

			<?php

			$faqs = greater_jackson_habitat_get_field( 'volunteer_faqs' );

			foreach ( $faqs as $faq ) : ?>

				<li class="accordion-item" data-accordion-item>
					<a href="#" class="accordion-title text-center"><?php echo $faq['label']; ?></a>
					<div class="accordion-content" data-tab-content>
						<?php echo apply_filters( 'the_content', $faq['content'] ); ?>
					</div>
				</li>

			<?php endforeach; ?>

		</ul>
		
	</div>
</div>

<?php get_template_part( 'template-parts/interior', 'footer' );

get_footer();
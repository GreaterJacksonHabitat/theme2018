<?php
/**
 * Frontpage Template
 * @since {{VERSION}}
 *
 * @package RBMTheme
 */

global $post;

get_header(); 

while ( have_posts() ) : the_post(); ?>

	<header class="featured-hero front-hero" role="banner" style="background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>');">
		<div class="marketing main-wrap">
			<div class="row tagline">
				<div class="small-12 columns">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</header>

	<?php 

	$row_count = 0;
	
	if ( have_rows( 'rows' ) ) : 

		while ( have_rows( 'rows' ) ) : the_row(); 
		
			if ( $background_color = get_sub_field( 'background_color' ) ) : ?>

				<style type="text/css">

					#home-section-<?php echo $row_count; ?> {
						background: <?php echo $background_color; ?>;
					}

					<?php if ( ! gjh_is_light( $background_color ) ) : ?>

						#home-section-<?php echo $row_count; ?>, #home-section-<?php echo $row_count; ?> p, #home-section-<?php echo $row_count; ?> h1, #home-section-<?php echo $row_count; ?> h2, #home-section-<?php echo $row_count; ?> h3, #home-section-<?php echo $row_count; ?> h4, #home-section-<?php echo $row_count; ?> h5, #home-section-<?php echo $row_count; ?> h6 {
							color: #fff;
						}

					<?php else : ?>

						#home-section-<?php echo $row_count; ?>, #home-section-<?php echo $row_count; ?> p, #home-section-<?php echo $row_count; ?> h1, #home-section-<?php echo $row_count; ?> h2, #home-section-<?php echo $row_count; ?> h3, #home-section-<?php echo $row_count; ?> h4, #home-section-<?php echo $row_count; ?> h5, #home-section-<?php echo $row_count; ?> h6 {
							color: #0a0a0a;
						}

					<?php endif; ?>

				</style>

			<?php endif; ?>

			<section id="home-section-<?php echo $row_count; ?>" class="row expanded home-section" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">

				<div class="small-12 columns">

					<div class="row">

						<?php if ( $title = get_sub_field( 'section_title' ) ) : ?>

							<div class="small-12">
								<h3 class="section-title">
									<?php echo $title; ?>
								</h3>
							</div>

						<?php endif;

						$columns = ( $columns = get_sub_field( 'columns' ) ) ? count( $columns ) : 0;
						$medium_class = 'medium-' . ( 12 / $columns );
						$column_count = 0;

						if ( have_rows( 'columns' ) ) : 

							while ( have_rows( 'columns' ) ) : the_row(); 

								if ( have_rows( 'content' ) ) : 

									while ( have_rows( 'content' ) ) : the_row();

										$section_type = get_row_layout(); 
										
										// We've restricted this to only one Flexible Content field per Column, so this is fine ?>
										<div class="small-12 <?php echo $medium_class; ?> <?php echo $section_type; ?> columns column-<?php echo $column_count; ?>" data-equalizer-watch>

											<?php include locate_template( 'template-parts/home-sections/' . $section_type . '.php', false, false ); ?>

										</div>

									<?php 

										$column_count++;
									
									endwhile;

								endif;

							endwhile;

						endif; ?>

					</div>

				</div>

			</section>

		<?php 

		$row_count++;
		
		endwhile;

	endif; ?>

<?php endwhile;

get_footer();
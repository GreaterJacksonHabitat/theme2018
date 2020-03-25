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

					#home-section-<?php echo $row_count; ?>, #home-section-<?php echo $row_count; ?> p, #home-section-<?php echo $row_count; ?> h1, #home-section-<?php echo $row_count; ?> h2, #home-section-<?php echo $row_count; ?> h3, #home-section-<?php echo $row_count; ?> h4, #home-section-<?php echo $row_count; ?> h5, #home-section-<?php echo $row_count; ?> h6 {

						<?php if ( ! gjh_is_light( $background_color ) ) : ?>

							color: #fff;
							font-weight: 700;

						<?php else : ?>
							
							color: #0a0a0a;

						<?php endif; ?>

					}

					<?php if ( ! gjh_is_light( $background_color ) ) : ?>

						#home-section-<?php echo $row_count; ?> h1 a, #home-section-<?php echo $row_count; ?> h2 a, #home-section-<?php echo $row_count; ?> h3 a, #home-section-<?php echo $row_count; ?> h4 a, #home-section-<?php echo $row_count; ?> h5 a, #home-section-<?php echo $row_count; ?> h6 a {

							color: #fff;

						}

						#home-section-<?php echo $row_count; ?> h1 a:hover, #home-section-<?php echo $row_count; ?> h2 a:hover, #home-section-<?php echo $row_count; ?> h3 a:hover, #home-section-<?php echo $row_count; ?> h4 a:hover, #home-section-<?php echo $row_count; ?> h5 a:hover, #home-section-<?php echo $row_count; ?> h6 a:hover, #home-section-<?php echo $row_count; ?> h1 a:focus, #home-section-<?php echo $row_count; ?> h2 a:focus, #home-section-<?php echo $row_count; ?> h3 a:focus, #home-section-<?php echo $row_count; ?> h4 a:focus, #home-section-<?php echo $row_count; ?> h5 a:focus, #home-section-<?php echo $row_count; ?> h6 a:focus {

							color: <?php echo gjh_scale_color( '#ffffff', array( 'lightness' => -14 ) ); ?>

						}

					<?php endif; ?>

				</style>

			<?php endif; ?>

			<section id="home-section-<?php echo $row_count; ?>" class="row expanded home-section" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">

				<div class="small-12 columns">

					<div class="row">

						<?php if ( $title = get_sub_field( 'section_title' ) ) : 
							
							$no_tags = strip_tags( $title );

							$surrounding_tags = explode( $no_tags, $title );
							
							?>

							<div class="small-12">

								<?php if ( isset( $surrounding_tags[0] ) && $surrounding_tags[0] ) : 

									echo $surrounding_tags[0]; 

								endif; ?>

								<h3 class="section-title">

									<?php 
									
									$link = get_sub_field( 'section_title_link' ); 

									if ( $link ) : ?>

										<a href="<?php echo esc_attr( $link ); ?>"<?php echo ( ! empty( get_sub_field( 'open_link_in_new_tab' ) ) ? ' target="_blank"' : '' ); ?>>
									
									<?php endif; ?>

											<?php echo $no_tags; ?>

									<?php if ( $link ) : ?>

										</a>

									<?php endif; ?>

								</h3>

								<?php if ( isset( $surrounding_tags[1] ) && $surrounding_tags[1] ) : 

									echo $surrounding_tags[1]; 

								endif; ?>

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
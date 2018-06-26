<?php
/*
Template Name: Donation
*/
get_header();

get_template_part( 'template-parts/interior', 'hero' );

do_action( 'foundationpress_before_content' ); ?>

<div class="main-wrap row">
	 <?php while ( have_posts() ) : the_post(); ?>

		<div <?php post_class( array( 'expanded', 'row' ) ) ?> id="post-<?php the_ID(); ?>">
			<div class="small-12 columns content" data-equalizer-watch>
				<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
			
	 	</div>
	<?php endwhile;?>
</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<div class="expanded row donations-loop">

	<?php

	$even = false;
	$count = 1; // Not zero indexed to make modulus make more sense

	$sections = greater_jackson_habitat_get_field( 'donation_sections' );
	
	foreach ( $sections as $section ) : 

		if ( $count % 2 == 0 ) {
			$even = true;
		}
		else {
			$even = false;
		}

		?>

		<section class="post-cta">

			<?php 

				$post_class = array( 'expanded', 'row' );

				// Invert coloration
				if ( ! $even ) {
					$post_class[] = 'even';
				}

			?>

			<div class="<?php echo trim( implode( $post_class, ' ' ) ); ?>" id="section-<?php echo $count; ?>" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">

				<div class="small-12 medium-5 columns image-container<?php echo ( ! $even ) ? ' medium-push-7' : ''; ?>" data-equalizer-watch>
					<div class="image" style="background-image: url('<?php echo wp_get_attachment_image_url( $section['image'], 'full' ); ?>')">
					</div>
				</div>

				<div class="small-12 medium-7 columns content<?php echo ( ! $even ) ? ' medium-pull-5' : ''; ?>" data-equalizer-watch>
					<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
					<div class="entry-content">
						<h3 class="post-title"><?php echo $section['title']; ?></h3>
						<?php echo apply_filters( 'the_content', $section['content'] ); ?>
					</div>
				</div>

			</div>

		</section>

		<?php

		$count++;

	endforeach;
	
	?>
	
</div>

<?php get_template_part( 'template-parts/interior', 'footer' );

get_footer();
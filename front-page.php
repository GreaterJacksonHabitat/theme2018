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

	$even = false;
	$count = 1; // Not zero indexed to make modulus make more sense
	
	if ( have_rows( 'sections' ) ) : 

		while ( have_rows( 'sections' ) ) : the_row();

			if ( $count % 2 == 0 ) {
				$even = true;
			}
			else {
				$even = false;
			}

			$section_type = get_row_layout();

			switch ( $section_type ) {

				case 'leftright_block':
					include locate_template( 'template-parts/home-sections/leftright-block.php', false, false );
					break;

			}

			$count++;

		endwhile;

	endif; ?>

<?php endwhile;

get_footer();
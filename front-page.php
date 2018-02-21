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

	<header class="front-hero" role="banner">
		<div class="marketing main-wrap">

			<div class="image">
				<div class="color-overlay"></div>
			</div>
			
			<div class="row tagline">
				<div class="small-12 columns">
					<?php the_content(); ?>
				</div>
			</div>

		</div>

	</header>

<?php endwhile;

get_footer();
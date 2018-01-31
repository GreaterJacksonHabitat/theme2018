<?php
/**
 * Frontpage Template
 *
 * @package GreaterJacksonHabitatTheme2018
 */

global $post;

get_header(); 

while ( have_posts() ) : the_post(); ?>

	<header class="front-hero" role="banner">
		<div class="marketing">

			<div class="image">
				<div class="color-overlay"></div>
			</div>
			
			<div class="expanded row tagline">
				<div class="small-12 medium-6 columns">
					<?php the_content(); ?>
				</div>
			</div>

		</div>

	</header>

<?php endwhile;

get_footer();
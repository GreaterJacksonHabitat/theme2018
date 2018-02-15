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
			
			<div class="expanded row tagline">
				<div class="small-12 columns">
					<?php the_content(); ?>
				</div>
			</div>

		</div>

	</header>

	 <div class="main-wrap row case-studies-header">
		 <div class="small-12 columns text-center">
			<?php //echo apply_filters( 'the_content', rbm_theme_get_field( 'case_studies_header' ) ); ?>
		 </div>
	 </div>

<?php endwhile;

get_footer();
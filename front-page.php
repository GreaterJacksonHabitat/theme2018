<?php
/**
 * Frontpage Template
 * @since 1.0.1
 *
 * @package RBMTheme
 */

global $post;

get_header(); 

while ( have_posts() ) : the_post(); ?>

	<header class="featured-hero front-hero" role="banner">
		<div class="marketing main-wrap">
			
			<?php if ( has_post_thumbnail() ) : ?>
			
				<div class="image" style="background-image: url('<?php echo the_post_thumbnail_url('full'); ?>;">
				</div>
			
			<?php endif; ?>
			
			<div class="row tagline">
				<div class="small-12 columns">
					<?php the_content(); ?>
				</div>
			</div>

		</div>

	</header>

<?php endwhile;

get_footer();
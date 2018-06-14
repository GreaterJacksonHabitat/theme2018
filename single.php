<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package GreaterJacksonHabitatTheme2018
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<?php $full_width_post_types = apply_filters( 'gjh_full_width_post_types', array(
	'programs',
	'projects',
) ); ?>

<div class="main-wrap row">
	<main class="main-content small-12<?php echo ( ! in_array( get_post_type(), $full_width_post_types ) ? ' medium-8' : '' ); ?> columns">
		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php get_template_part( 'template-parts/content', '' ); ?>
		
			<?php if ( ! in_array( get_post_type(), $full_width_post_types ) ) {
				the_post_navigation(); 
				comments_template();
			} ?>
		
		<?php endwhile;?>
	</main>
	
<?php if ( ! in_array( get_post_type(), $full_width_post_types ) ) {
	get_sidebar(); 
} ?>
</div>
<?php get_footer();

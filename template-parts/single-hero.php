<?php
/**
 * Interior Single Hero
 *
 * @package GreaterJacksonHabitatTheme2018
 */

?>

<?php if ( has_post_thumbnail() ) : ?>
		
	<header class="featured-hero" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('featured-large'); ?>, large], [<?php echo the_post_thumbnail_url('featured-xlarge'); ?>, xlarge]">

<?php else : 

	$interior_hero_id = get_theme_mod( 'gjh_logo_image', false ); ?>

	<header class="featured-hero" role="banner" data-interchange="[<?php echo wp_get_attachment_image_src( $interior_hero_id, 'featured-small', false )[0] ?>, small], [<?php echo wp_get_attachment_image_src( $interior_hero_id, 'featured-medium', false )[0]; ?>, medium], [<?php echo wp_get_attachment_image_src( $interior_hero_id, 'featured-large', false )[0]; ?>, large], [<?php echo wp_get_attachment_image_src( $interior_hero_id, 'featured-xlarge', false )[0]; ?>, xlarge]">

<?php endif; ?>
				
	<div class="main-wrap">

		<div class="row expanded tagline text-center">
			<div class="small-8 small-push-2 medium-12 medium-push-0 columns">
				
				<?php echo apply_filters( 'the_content', greater_jackson_habitat_get_field( 'gjh_hero_text', get_the_ID() ) ); ?>
				
			</div>
		</div>

	</div>

</header>
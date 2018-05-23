<?php
/**
 * Interior Page Hero
 *
 * @package GreaterJacksonHabitatTheme2018
 */

?>

<header class="interior-hero" role="banner">
	<div class="main-wrap">
		
		<?php if ( $interior_hero_id = get_theme_mod( 'gjh_logo_image', false ) ) : ?>

			<div class="image" style="background-image: url('<?php echo wp_get_attachment_image_src( $interior_hero_id, 'full', false )[0];?>')">
				<div class="color-overlay"></div>
			</div>
		
		<?php endif; ?>

		<div class="row tagline text-center">
			<div class="small-8 small-push-2 columns">
				<h1 class="page-title">
					
					<?php
					
					// There's no reason why get_post_type() shouldn't work, but Events Calendar is weird in that the Archive is technically rendered as a Page but still reports as an Archive and uses Archive CSS Classes
					// Even though the Post Type is defined in $wp_query, get_post_type() thinks it is a Page
					global $wp_query;
					global $post;

					if ( is_archive() && 
						$wp_query->query['post_type'] == 'tribe_events' ) {

						echo tribe_get_event_label_plural();

					}
					elseif ( is_single() && 
						   $wp_query->query['post_type'] == 'tribe_events' ) {
						
						// Same problem with get_the_ID()/the_title() really
						echo get_the_title( $wp_query->queried_object_id );
						
					}
					else {
						the_title();
					}
					
					?>
					
				</h1>
				
				<?php echo apply_filters( 'the_content', greater_jackson_habitat_get_field( 'gjh_subtitle', get_the_ID(), get_bloginfo( 'description' ) ) ); ?>
				
			</div>
		</div>

	</div>

</header>
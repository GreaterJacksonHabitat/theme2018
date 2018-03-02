<?php
/**
 * Interior Page Hero
 *
 * @package GreaterJacksonHabitatTheme2018
 */

?>

<header class="interior-hero" role="banner">
	<div class="main-wrap">

		<div class="image">
			<div class="color-overlay"></div>
		</div>

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
				
				<?php echo apply_filters( 'the_content', get_bloginfo( 'description' ) ); ?>
				
			</div>
		</div>

	</div>

</header>
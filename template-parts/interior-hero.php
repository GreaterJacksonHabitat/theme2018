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
					
					// There's no reason why get_post_type() shouldn't work, but Events Calendar is weird in that the Archive is technically a Page but still reports as an Archive and uses Archive CSS Classes
					// Even though the Post Type is defined in $wp_query, get_post_type() thinks it is a Page
					global $wp_query;

					if ( is_archive() && 
						$wp_query->query['post_type'] == 'tribe_events' ) {

						$post_type = get_post_type_object( 'tribe_events' );

						echo $post_type->labels->name;

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
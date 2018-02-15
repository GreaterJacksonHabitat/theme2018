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
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php echo apply_filters( 'the_content', get_bloginfo( 'description' ) ); ?>
			</div>
		</div>

	</div>

</header>
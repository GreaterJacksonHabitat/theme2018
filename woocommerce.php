<?php
/**
 * Basic WooCommerce support
 * For an alternative integration method see WC docs
 * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package GreaterJacksonHabitatTheme2018
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-wrap row">
	<main class="main-content small-12 columns">
		<?php woocommerce_content(); ?>
	</main>
<?php get_sidebar(); ?>
</div>
<?php get_footer();

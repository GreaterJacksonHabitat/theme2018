<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package GreaterJacksonHabitatTheme2018
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/interior', 'hero' );

do_action( 'foundationpress_before_content' ); ?>

<div class="main-wrap">
	 <?php while ( have_posts() ) : the_post(); ?>

		<div <?php post_class( array( 'expanded', 'row' ) ) ?> id="post-<?php the_ID(); ?>" data-equalizer data-equalize-on="small" data-equalize-on-stack="true">
			<div class="small-12 columns content" data-equalizer-watch>
				<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
			
	 	</div>
	<?php endwhile;?>
</div>

<?php do_action( 'foundationpress_after_content' ); ?>

<?php 

get_template_part( 'template-parts/interior', 'footer' );

get_footer();
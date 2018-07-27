<?php
/*
Template Name: About
*/
get_header(); ?>

<?php get_template_part( 'template-parts/single', 'hero' );

do_action( 'foundationpress_before_content' ); ?>

<div class="main-wrap row">
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
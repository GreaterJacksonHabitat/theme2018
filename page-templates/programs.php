<?php
/*
Template Name: Programs
*/
get_header();

get_template_part( 'template-parts/interior', 'hero' );

do_action( 'foundationpress_before_content' ); ?>

<div class="main-wrap">
	 <?php while ( have_posts() ) : the_post(); ?>

		<div <?php post_class( array( 'expanded', 'row' ) ) ?> id="post-<?php the_ID(); ?>">
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

<div class="expanded row programs-loop">

	<?php

	global $post;
	$even = false;
	$count = 1; // Not zero indexed to make modulus make more sense

	$programs = new WP_Query( array(
		'post_type' => 'programs',
		'posts_per_page' => -1,
	) );

	if ( $programs->have_posts() ) : 

		while ( $programs->have_posts() ) : $programs->the_post(); 
	
			if ( $count % 2 == 0 ) {
				$even = true;
			}
			else {
				$even = false;
			}
	
			include locate_template( 'template-parts/loop/post-cta.php', false, false );
	
			$count++;
	
		endwhile;

		wp_reset_postdata();

	endif;
	
	?>
	
</div>

<?php get_template_part( 'template-parts/interior', 'footer' );

get_footer();
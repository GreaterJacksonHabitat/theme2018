<?php
/*
Template Name: Volunteers
*/
get_header();

get_template_part( 'template-parts/interior', 'hero' );

do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>

	</div>

</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<div class="row">
	<div class="small-12 columns faqs">
		
		<h2 class="text-center"><?php _e( 'F.A.Q.', 'greater-jackson-habitat-theme' ); ?></h2>

		<ul class="accordion" data-accordion>

			<?php

			$faqs = greater_jackson_habitat_get_field( 'volunteer_faqs' );

			foreach ( $faqs as $faq ) : ?>

				<li class="accordion-item" data-accordion-item>
					<a href="#" class="accordion-title text-center"><?php echo $faq['label']; ?></a>
					<div class="accordion-content" data-tab-content>
						<?php echo apply_filters( 'the_content', $faq['content'] ); ?>
					</div>
				</li>

			<?php endforeach; ?>

		</ul>
		
	</div>
</div>

<?php get_footer();
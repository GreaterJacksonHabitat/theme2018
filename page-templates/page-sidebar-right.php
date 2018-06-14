<?php
/*
Template Name: Right Sidebar
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<div class="main-wrap row sidebar-right">
<?php get_sidebar(); ?>
	<main class="main-content small-12 medium-8 columns">
		<?php while ( have_posts() ) : the_post(); ?>	
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php comments_template(); ?>
		<?php endwhile;?>
	 </main>
</div>
<?php get_footer();

<?php
/*
Template Name: Left Sidebar
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<div class="main-wrap row sidebar-left">
	<main class="main-content small-12 medium-8 columns">
		<?php while ( have_posts() ) : the_post(); ?>	
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php comments_template(); ?>
		<?php endwhile;?>
	 </main>
<?php get_sidebar(); ?>
</div>
<?php get_footer();

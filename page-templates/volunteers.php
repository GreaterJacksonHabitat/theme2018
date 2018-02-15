<?php
/*
Template Name: Volunteers
*/
get_header(); ?>

<header class="front-hero" role="banner">
	<div class="marketing">
		<div class="tagline">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<h4 class="subheader"><?php bloginfo( 'description' ); ?></h4>
			<a role="button" class="download large button sites-button hide-for-small-only" href="https://github.com/olefredrik/foundationpress">Download FoundationPress</a>
		</div>

		<div class="watch">
			<span id="stargazers"><a href="https://github.com/olefredrik/foundationpress">1.5k stargazers</a></span>
			<span id="twitter"><a href="https://twitter.com/olefredrik">@olefredrik</a></span>
		</div>
	</div>

</header>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php
					wp_link_pages(
						array(
							'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'real-big-marketing' ),
							'after'  => '</p></nav>',
						)
					);
				?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</div>

	</div>

</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>



<?php get_footer();

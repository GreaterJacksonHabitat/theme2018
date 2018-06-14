<?php
/**
 * Interior Page Hero
 *
 * @package GreaterJacksonHabitatTheme2018
 */

?>

<section class="post-cta">
	
	<?php 
	
		$post_class = array( 'expanded', 'row' );
	
		if ( $even ) {
			$post_class[] = 'even';
		}
	
	?>

	<div <?php post_class( $post_class ) ?> id="post-<?php the_ID(); ?>" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">
		
		<div class="small-12 medium-5 columns image-container<?php echo ( ! $even ) ? ' medium-push-7' : ''; ?>" data-equalizer-watch>
			<div class="image" style="background-image: url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>')">
			</div>
		</div>
		
		<div class="small-12 medium-7 columns content<?php echo ( ! $even ) ? ' medium-pull-5' : ''; ?>" data-equalizer-watch>
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<h3 class="post-title"><?php the_title(); ?></h3>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="button secondary" title"<?php _e( 'Read More', '' ); ?>">
					<?php _e( 'Read More', '' ); ?>
				</a>
			</div>
		</div>
		
	</div>

</section>
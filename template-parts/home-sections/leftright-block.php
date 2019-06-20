<?php
/**
 * Left/Right Block - Home Page Section
 *
 * @package GreaterJacksonHabitatTheme2018
 */

?>

<section class="post-cta">
	
	<?php 
	
        $post_class = array( 'expanded', 'row' );

        $orientation = get_sub_field( 'orientation' );
        
        if ( $orientation !== 'none' ) {

            if ( $orientation == 'left' ) {
                $even = true;
            }
            else {
                $even = false;
            }

        }
	
		if ( $even ) {
			$post_class[] = 'even';
		}
	
	?>

	<div class="<?php echo implode( ' ', $post_class ); ?>" id="home-section-<?php echo $count; ?>" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">
		
		<div class="small-12 medium-5 columns image-container<?php echo ( ! $even ) ? ' medium-push-7' : ''; ?>" data-equalizer-watch>
			<div class="image" style="background-image: url('<?php echo wp_get_attachment_image_url( get_sub_field( 'image' ), 'full' ); ?>')">
			</div>
		</div>
		
		<div class="small-12 medium-7 columns content<?php echo ( ! $even ) ? ' medium-pull-5' : ''; ?>" data-equalizer-watch>
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<h3 class="post-title"><?php the_sub_field( 'title' ); ?></h3>
                <?php echo apply_filters( 'the_content', get_sub_field( 'content' ) ); ?>

                <?php if ( $button_url = get_sub_field( 'button_url' ) ) : ?>
                
                    <a href="<?php echo $button_url; ?>" class="button secondary" title"<?php _e( 'Read More', '' ); ?>">
                        <?php _e( 'Read More', '' ); ?>
                    </a>

                <?php endif; ?>
                
			</div>
		</div>
		
	</div>

</section>
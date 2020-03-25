<?php
/**
 * Text Content - Home Page Section
 *
 * @package GreaterJacksonHabitatTheme2018
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

?>
<div class="image-container">

	<?php 

	$link = get_sub_field( 'button_url' );

	if ( $link ) : ?>

		<a href="<?php echo esc_attr( get_sub_field( 'button_url' ) ); ?>" class="image-link"<?php echo ( ! empty( get_sub_field( 'open_button_in_new_tab' ) ) ? ' target="_blank"' : '' ); ?>>

	<?php endif; ?>

		<div class="background-image" style="background-image: url('<?php echo esc_attr( wp_get_attachment_image_url( get_sub_field( 'background_image'), 'full' ) ); ?>');">
		</div>

	<?php if ( $link ) : ?>
		</a>
	<?php endif; ?>

	<?php if ( $text = get_sub_field( 'image_text' ) ) : ?>

		<div class="image-text">
			<?php echo apply_filters( 'the_content', $text ); ?>
		</div>

	<?php endif; ?>

</div>

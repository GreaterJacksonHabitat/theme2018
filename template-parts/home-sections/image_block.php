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
<div class="img-container">
<a href="<?php echo esc_attr( get_sub_field( 'image_link' ) ); ?>" class="image_link"?>
<div class="background-image" style="background-image: url('<?php echo esc_attr( wp_get_attachment_image_url( get_sub_field( 'background_image'), 'full' ) ); ?>');">
</div>
</a></a>
</div>

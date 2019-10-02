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

<div class="container">

    <?php echo apply_filters( 'the_content', get_sub_field( 'wysiwyg' ) ); ?>

</div>
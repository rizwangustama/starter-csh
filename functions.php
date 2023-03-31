<?php
/**
 * csh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package csh
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
/**
 * Enqueue scripts and custom.
 */
require get_template_directory() . '/inc/app/setup.php';
require get_template_directory() . '/inc/app/helpers.php';
require get_template_directory() . '/inc/app/graphql-custom.php';
require get_template_directory() . '/inc/app/rest-endpoints.php';
require get_template_directory() . '/inc/app/enqueue-scripts-styles.php';
require get_template_directory() . '/inc/app/theme-settings.php';
require get_template_directory() . '/inc/custom-post-types/staff.php';
require get_template_directory() . '/inc/custom-post-types/testimonial.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}



// Hide metabox partner -> description in template template-home-style-one.php
// After the field to enter post title and the permalink to post
add_action( 'edit_page_form', 'callback__edit_form_after_title' );
function callback__edit_form_after_title( $post ) {
	if ($post->post_type === 'page' && 'template-home-style-one.php' === get_page_template_slug( $post->ID )) { ?>
			<script>
				let findMetabox = document.querySelector("[data-key='field_63aba0cb9e979']");
				findMetabox.style.display = 'none';
			</script>
		<?php } ?>
	<div style="margin-top: 10px;padding: 15px;color: #fff;background: #9876aa;clear: both;">
		Place of the hook <b>edit_form_after_title</b>.
	</div>
	<?php
}
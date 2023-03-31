<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package csh
 */
global $post;
?>

	<footer id="vue-footer">
		<?php if ('template-home-style-two.php' === get_page_template_slug( $post->ID )): ?>
			<main-footer customstyle="<?php echo 'bg-navy' ?>"></main-footer>
		<?php else: ?>
			<main-footer></main-footer>
		<?php endif ?>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

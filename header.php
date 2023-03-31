<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package csh
 */

?>

<?php
global $post;

$classes = 'w-full bg-blue flex justify-center pt-[15px] pb-5 border-b-4 border-b-red sticky top-0 z-[999]';
$navStyle ='';
if ('template-home-style-two.php' === get_page_template_slug( $post->ID )) {
	$classes = 'w-full bg-navy flex justify-center py-2 sticky top-0 z-[999]';
	$navStyle = 'template-home-style-two';
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<?php if(!empty(get_field('meta_alert_banner', 'option'))): ?>
		<div class="<?php echo $classes ?>">
			<p class="text-white"><?php echo get_field('meta_alert_banner', 'option') ?></p>
		</div>
	<?php endif ?>
	<header id="vue-header" class="<?php echo $navStyle ?>">
		<?php if ('template-home-style-two.php' === get_page_template_slug( $post->ID )): ?>
			<?php if (is_user_logged_in()): global $current_user; wp_get_current_user();?>
				<main-header-overlay :is-login="true" account-name="<?php echo $current_user->display_name ?>"></main-header-overlay>
			<?php else: ?>
				<main-header-overlay :is-login="false"></main-header-overlay>
			<?php endif ?>
		<?php else: ?>
			<?php if (is_user_logged_in()): global $current_user; wp_get_current_user();?>
				<main-header :is-login="true" account-name="<?php echo $current_user->display_name ?>"></main-header>
			<?php else: ?>
				<main-header :is-login="false"></main-header>
			<?php endif ?>
		<?php endif ?>
	</header>

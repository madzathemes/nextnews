<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head class="animated">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<?php
$option = get_option("nextnews_theme_options");
?>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<?php
$bg_post = get_post_meta(get_the_ID(), "magazin_background_image", true);
$style = get_post_meta(get_the_ID(), "magazin_post_style", true);

$body_class = "";
if(!empty($style)){
	$body_class = $style;
} else if (!empty($option['post_style'])) {
	$body_class = $option['post_style'];
}
?>
<?php if(is_single() and $body_class == "8") { ?>
	<div class="background-image lazyload" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(),"full"); ?>');"></div>
<?php } else if(!empty($bg_post)) {
	// Fix for SSL
		$bg = esc_url($bg_post);
		if(is_ssl() and 'http' == parse_url($bg, PHP_URL_SCHEME) ){
				$bg = str_replace('http://', 'https://', $bg);
		}
	 ?>
	<div class="background-image lazyload" style="background-image:url('<?php echo esc_url($bg); ?>');"></div>
<?php } else if(!empty($option['background_image'])) {
	// Fix for SSL
		$bg = esc_url($option['background_image']);
		if(is_ssl() and 'http' == parse_url($bg, PHP_URL_SCHEME) ){
				$bg = str_replace('http://', 'https://', $bg);
		}
	 ?>
	<div class="background-image lazyload" style="background-image:url('<?php echo esc_url($bg); ?>');"></div>
<?php } ?>
<div class="mt-smart-menu-out"></div>
<?php if ( function_exists( 'magazine_themes_bar' ) ) { magazine_themes_bar(); } ?>
<div class="mt-smart-menu">
	<span class="close pointer"></span>
	<?php nextnews_nav_mobile(); ?>
	<div class="mt-smart-menu-widget">
		<?php if ( is_active_sidebar( 'mobile-menu-widget-area' ) ) { dynamic_sidebar( 'mobile-menu-widget-area' ); } ?>
	</div>
	<?php nextnews_socials(); ?>
</div>

<?php nextnews_header(); ?>

<div class="mt-outer-wrap">

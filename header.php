<?php 
global $aa;
?><!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<!--[if lt IE 9]>
	<script src="<?php bloginfo('template_directory'); ?>/javascript/html5shiv.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css" media="all">
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
if(!empty($aa['facebook_sdk'])) {
	echo $aa['facebook_sdk'];
}
?>
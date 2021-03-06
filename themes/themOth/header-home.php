<!DOCTYPE html>
<html <?php language_attributes();?> >
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<title>
		<?php wp_title('|','true','right');?>
		<?php  bloginfo('name');?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback"  href="<?php bloginfo("pingback_url");?>">
	<link rel="shortcut icon" href="<?='http://tawdi7atnet.com/home_files/tw7.jpg';?>" type="image/x-icon"/>
	<?php wp_head();?>
</head>
<body>
<?php include "nav-menu.php";?>
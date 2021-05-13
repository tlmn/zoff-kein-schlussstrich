<?php
global $post, $themeColor;
if (get_field('themeColor', $post->ID)) {
	$themeColor = get_field('themeColor', $post->ID);
} else {
	$themeColor = 'red';
}
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title('&ndash;', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . "/assets/images/favicons/"; ?>apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . "/assets/images/favicons/"; ?>favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . "/assets/images/favicons/"; ?>favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri() . "/assets/images/favicons/"; ?>site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri() . "/assets/images/favicons/"; ?>safari-pinned-tab.svg" color="#5bbad5">
	<?php wp_head(); ?>
</head>

<body class="<?php print join(' ', get_body_class()); ?>'">
	<div class="header bg-white flex justify-center shadow--bottom py-2">
		<div class="container grid-6 md:grid-16">
			<div class="col-span-full flex justify-between items-center">
				<a href="/">
					<?php
					echo file_get_contents(get_template_directory() . '/assets/icons/logo-header.svg');
					?>
				</a>
				<div class="hidden md:block">
					<div id="top-menu">
						<?php
						wp_nav_menu(array('theme_location' => 'navigation-menu', 'depth' => 1));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="header shadow--bottom relative bg-lightGray" id="sub-menu__container" style="display:none">
		<div class="absolute flex h-full w-full z-10">
			<div class="bg-yellow h-full flex-1"></div>
		</div>
		<div class="flex justify-center">
			<div class="container grid-6 md:grid-16 z-20 relative">
				<div class="col-span-full flex justify-end ">
					<div class="bg-blue py-2 px-2" id="sub-menu">
						<?php
						wp_nav_menu(array('theme_location' => 'navigation-submenu', 'depth' => 1));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
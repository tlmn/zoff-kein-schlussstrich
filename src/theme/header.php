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

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/favicon.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="48x48" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/favicon-48x48.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/manifest.json">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="theme-color" content="#fff">
	<meta name="application-name" content="Kein Schlussstrich">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="167x167" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-167x167.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-180x180.png">
	<link rel="apple-touch-icon" sizes="1024x1024" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-icon-1024x1024.png">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="apple-mobile-web-app-title" content="Kein Schlussstrich">
	<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-640x1136.png">
	<link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-750x1334.png">
	<link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-828x1792.png">
	<link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1125x2436.png">
	<link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1242x2208.png">
	<link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1242x2688.png">
	<link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1536x2048.png">
	<link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1668x2224.png">
	<link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1668x2388.png">
	<link rel="apple-touch-startup-image" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-2048x2732.png">
	<link rel="apple-touch-startup-image" media="(device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1620x2160.png">
	<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1136x640.png">
	<link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1334x750.png">
	<link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-1792x828.png">
	<link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-2436x1125.png">
	<link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-2208x1242.png">
	<link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-2688x1242.png">
	<link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-2048x1536.png">
	<link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-2224x1668.png">
	<link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-2388x1668.png">
	<link rel="apple-touch-startup-image" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-2732x2048.png">
	<link rel="apple-touch-startup-image" media="(device-width: 810px) and (device-height: 1080px) and (-webkit-device-pixel-ratio: 2) and (orientation: landscape)" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/apple-touch-startup-image-2160x1620.png">
	<link rel="icon" type="image/png" sizes="228x228" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/coast-228x228.png">
	<meta name="msapplication-TileColor" content="#fff">
	<meta name="msapplication-TileImage" content="favicons/mstile-144x144.png">
	<meta name="msapplication-config" content="favicons/browserconfig.xml">
	<link rel="yandex-tableau-widget" href="<?php echo get_template_directory_uri() . ""; ?>/assets/favicons/yandex-browser-manifest.json">
	<link rel="manifest" href="<?php echo get_template_directory_uri() . "/assets/images/favicons/"; ?>site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri() . "/assets/images/favicons/"; ?>safari-pinned-tab.svg" color="#5bbad5">
	<?php wp_head(); ?>
</head>

<body class="<?php print join(' ', get_body_class()); ?>'">
	<div class="header bg-white flex justify-center shadow--bottom py-2 px-2 md:px-0 relative" style="z-index: 100">
		<div class="container grid-6 md:grid-16">
			<div class="col-span-full flex justify-between items-center">
				<a href="/">
					<?php
					echo file_get_contents(get_template_directory() . '/assets/icons/logo-header.svg');
					?>
				</a>
				<div class="block md:hidden">
					<button id="hamburger--open">
						<?php
						echo file_get_contents(get_template_directory() . '/assets/images/svg/hamburger--open.svg');
						?>
					</button>
					<button id="hamburger--close" class="hidden">
						<?php
						echo file_get_contents(get_template_directory() . '/assets/images/svg/hamburger--close.svg');
						?>
					</button>
				</div>
				<div class="hidden md:flex md:items-center">
					<div id="top-menu">
						<?php
						wp_nav_menu(array('theme_location' => 'navigation-menu', 'depth' => 1));
						?>
					</div>
					<div id="socialmedia-menu">
						<?php
						wp_nav_menu(array('theme_location' => 'social-media', 'depth' => 1));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="top-menu--mobile" class="relative hidden">
		<div class="absolute right-0 flex flex-col bg-black text-white h-screen overflow-scroll" style="z-index: 100;">
			<?php
			wp_nav_menu(array('theme_location' => 'navigation-menu', 'depth' => 2));
			wp_nav_menu(array('theme_location' => 'footer', 'depth' => 1, 'menu_class' => 'is-style-text-running', 'container_id' => 'footer-menu'));
			wp_nav_menu(array('theme_location' => 'social-media--white', 'depth' => 1));

			?>
		</div>
	</div>

	<div class="header shadow--bottom relative bg-lightGray z-50 overflow-hidden" id="sub-menu__container" style="display:none">
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
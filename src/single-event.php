<?php
get_header();

global $themeColor;

if (have_posts()) :
	while (have_posts()) : the_post();
		$schwerpunktField = get_field('schwerpunkt');
		$schwerpunkt = $schwerpunktField[0];
		$schwerpunktPost = get_post($schwerpunkt);
		$blocks = parse_blocks($schwerpunktPost->post_content);

		the_content();
?>
		<div class="bg-gray hover:bg-<?php print $themeColor; ?> py-2 px-2 sm:px-0">
			<div class="w-full mx-auto md:container grid-12">
				<?php
				$projects = array();

				foreach ($blocks as $block) {
					if ($block['blockName'] === 'acf/projektteaser-karte') {
						if (isset($block['attrs']['data']['link'])) {
							array_push($projects, $block['attrs']['data']['link']);
						}
					}
				}
				$projectsNavigationCurrent = array_search(get_the_ID(), $projects);
				$projectsNavigation = array(
					0 => ($projectsNavigationCurrent - 1) < 0 ? end($projects) : $projects[$projectsNavigationCurrent - 1],
					1 => get_the_ID(),
					2 => ($projectsNavigationCurrent + 1) > (count($projects) - 1) ? $projects[0] : $projects[$projectsNavigationCurrent + 1]
				);
				?>
				<div class="col-span-4 flex justify-start">
					<a href="<?php print get_permalink($projectsNavigation[0]); ?>" class="navBottom navBottom__prev" data-projecttitle="<?php print get_the_title($projectsNavigation[0]); ?>"></a>
				</div>
				<div class="col-span-4 flex justify-center">
					<div class="navBottom navBottom__current cursor-pointer" id="navBottom__current" data-projecttitle="<?php print get_the_title($projectsNavigation[1]); ?>"></div>
				</div>
				<div class="col-span-4 flex justify-end">
					<a href="<?php print get_permalink($projectsNavigation[2]); ?>" class="navBottom navBottom__next" data-projecttitle="<?php print get_the_title($projectsNavigation[2]); ?>"></a>
				</div>
			</div>
		</div>
<?php
	endwhile;
endif;

get_footer();

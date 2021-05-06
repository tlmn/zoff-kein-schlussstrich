<?php
require("functions/func-theme.php");
require("locales/locales.php");

get_header();

global $post;
$post_slug = $post->post_name;

isset($_GET['date']) ? $date = $_GET['date'] : $date = 0;
isset($_GET['time']) ? $time = $_GET['time'] : $time = 0;

function occurences_where($where)
{
	$where = str_replace("meta_key = 'meta_occurences_$", "meta_key LIKE 'meta_occurences_%", $where);
	return $where;
}

add_filter('posts_where', 'occurences_where');

$args = array(
	'numberposts'	=> 1,
	'post_type'		=> 'event',
	'name'			=> $post->post_name,
	'meta_query'	=> array(
		array(
			'key'		=> 'meta_occurences_$_timestamp',
			'compare'	=> 'LIKE',
			'value'		=> date_long($date, "-") . " " . time_long($time, ":"),
		)
	)
);

$the_query = new WP_Query($args);


if ($the_query->have_posts()) :
	$occurrences = get_fields()['meta']['occurences'];
	$currentEvent = $occurrences[array_search(date_long($date, "/") . " " . time_long($time, ":"), array_column($occurrences, 'timestamp'))];
	$currentEvent['date'] = explode(" ", $currentEvent['timestamp'])[0];
	$currentEvent['time'] = explode(" ", $currentEvent['timestamp'])[1];
	$currentEvent['general'] = get_fields()['meta'];

	$currentVenue = get_fields($currentEvent['venue'][0]->ID);

	while ($the_query->have_posts()) : $the_query->the_post(); ?>
		<div class="relative">
			<div class="flex absolute top-0 left-0 w-full h-full z-0">
				<div class="bg-black flex-1"></div>
				<div class="bg-white flex-1"></div>
			</div>

			<div class="flex justify-center">
				<div class="container grid-6 md:grid-16 relative z-10 text-white border-b-2 border-black">
					<div class="md:col-span-2 bg-black">
						<h3 class="rotate--90 text-white text-3xl">Kalender</h3>
					</div>

					<div class="md:col-span-8">
						<?php
						$feature_image_srcset = wp_get_attachment_image_srcset(get_fields()['meta']['feature_image']['image']['ID']);
						$feature_image_alt = get_fields()['meta']['feature_image']['image']['alt']; ?>
						<img srcset="<?php echo $feature_image_srcset; ?>" alt="<?php print $feature_image_alt; ?>" />
					</div>

					<div class="md:col-span-6 flex flex-col">
						<div class="bg-black text-white flex justify-between md:gap-collapse">
							<span class="md:text-6xl md:font-light mt-2 leading-none">
								<?php echo date_short($currentEvent['date'], "."); ?>
							</span>
							<span class="md:text-base md:font-normal">
								<?php echo $l_weekdays[date("N", strtotime(($currentEvent['date'])))]; ?>
							</span>
						</div>
						<div class="bg-white flex flex-1 flex-col justify-between text-black md:gap-collapse">
							<div class="mx-2 mt-3">labels</div>
							<div class="mx-2 mb-3">
								<span class="md:text-3xl font-medium leading-snug block"><?php print time_short($currentEvent["time"], ":"); ?> Uhr</span>
								<span class="md:text-3xl font-medium leading-snug block"><?php the_title(); ?></span>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>



		<div class="flex justify-center">
			<div class="container grid-6 md:grid-16 relative z-10">
				<div class="md:col-span-8 md:col-start-3 border-r-2">
					<?php
					if ($feature_image_alt !== "") { ?>
						<div class="border-b-2 md:py-5 font-normal text-xs leading-snug">
							<?php print $feature_image_alt; ?>
						</div>
					<?php
					}
					?>

					<?php
					if ($currentEvent['general']['credits'] !== "") { ?>
						<div class="border-b-2 md:py-7 font-normal text-lg leading-snug">
							<?php print $currentEvent['general']['credits']; ?>
						</div>
					<?php
					}
					?>

					<div class="py-7">
						<?php
						if ($currentEvent['general']['short_description'] !== "") { ?>
							<div class="font-medium text-lg leading-wider mb-7 border-b-2">
								<?php print $currentEvent['general']['short_description']; ?>
							</div>
						<?php
						}
						?>

						<div class="font-normal text-m leading-normal">
							<?php

							echo the_content();

							?>
						</div>
					</div>
				</div>


				<div class="md:col-span-6">
					<?php
					if ($currentEvent['general']['duration'] !== "") { ?>
						<div class="font-medium text-lg leading-wider py-6 border-b-2 gap-collapse">
							Dauer <?php print $currentEvent['general']['duration']; ?> Minuten
						</div>
					<?php
					}
					?>

					<div class="font-medium text-lg leading-wider py-6 border-b-2 gap-collapse">
						<?php
						$items = get_field("meta");

						while (have_rows("meta")) : the_row();
							if (have_rows("occurences")) :
						?>
								<span class="uppercase">Weitere Termine</span>
								<?php
								while (have_rows("occurences")) : the_row();
									$timestamp = strtotime(str_replace('/', '-', get_sub_field('timestamp')));
								?>
									<a href="<?php echo get_page_uri(); ?>/?date=<?php echo date("dmY", $timestamp); ?>&time=<?php echo date("Hi", $timestamp); ?>" class="block underline hover:no-underline">
										<?php
										echo date("j.n.y", $timestamp) . " in " . get_field('address', get_sub_field('venue')[0]->ID)['city'];
										?>
									</a>
						<?php
								endwhile;
							endif;
						endwhile; ?>
					</div>


					<?php
					if ($currentVenue['url'] !== "") { ?>
						<div class="font-medium text-lg leading-wider py-6 border-b-2 gap-collapse">
							<a href="<?php print $currentVenue['url'] ?>" target="_blank" class="underline hover:no-underline">
								<?php print explode("/", preg_replace('#^https?://#', '', rtrim($currentVenue['url'], '/')))[0]; ?>
							</a>
						</div>
					<?php
					}
					?>



					<div class="font-medium text-lg leading-wider py-6 border-b-2 gap-collapse">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_page_uri() . "/?date=" . $date . "&time=" . $time; ?>" target="_blank" class="underline hover:no-underline flex items-center">
							<span class="mr-2">
								<?php
								echo file_get_contents(get_template_directory() . '/assets/icons/fb-event.svg');
								?>
							</span>
							<span>Event teilen</span>
						</a>
					</div>



				</div>
				<?php


				?>
			</div>
		</div>
<?php
	endwhile;
endif;

get_footer();

wp_reset_query();

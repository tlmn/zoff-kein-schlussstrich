<?php
require("functions/func-theme.php");
require("locales/locales.php");

error_reporting(E_ALL);


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


if ($date !== 0  && $time !== 0) {
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
} else {
	$args = array(
		'numberposts'	=> 1,
		'post_type'		=> 'event',
		'name'			=> $post->post_name,
	);
}

$the_query = new WP_Query($args);



if ($the_query->have_posts()) :
	if ($date !== 0  && $time !== 0) {
		$occurrences = get_fields()['meta']['occurences'];
		$currentEvent = $occurrences[array_search(date_long($date, "/") . " " . time_long($time, ":"), array_column($occurrences, 'timestamp'))];
	} else {
		$occurrences = get_fields()['meta']['occurences'];
		$currentEvent = $occurrences[0];
	}

	$currentEvent['date'] = explode(" ", $currentEvent['timestamp'])[0];
	$currentEvent['time'] = explode(" ", $currentEvent['timestamp'])[1];
	$currentEvent['general'] = get_fields()['meta'];
	$currentVenue = get_fields($currentEvent['venue'][0]->ID);
	$feature_image_alt = isset(get_fields()['meta']['feature_image']['image']['alt']) ? get_fields()['meta']['feature_image']['image']['alt'] : "";
	$feature_image_description = isset(get_fields()['meta']['feature_image']['image']['description']) ? get_fields()['meta']['feature_image']['image']['description'] : "";

	$args_teaser = array(
		'numberposts'	=> 1,
		'post_type'		=> 'generalBlock',
		'meta_query'	=> array(
			array(
				'key'		=> 'teaserDivision_taxonomyDivision',
				'compare'	=> 'LIKE',
				'value'		=> get_the_terms(get_the_ID(), "division")[0]->term_id,
			)
		)
	);
	$the_query_teaser = new WP_Query($args_teaser);


	while ($the_query->have_posts()) : $the_query->the_post();

		if (!isset(get_fields()['meta']['feature_image']['image']['ID'])) {
			// TEMPLATE: has no feature image
			include(get_template_directory() . "/template-parts/single-event/desktop--no-image.php");
		} else {
			// TEMPLATE: has feature image
			include(get_template_directory() . "/template-parts/single-event/desktop--with-image.php");
		}

		include(get_template_directory() . "/template-parts/single-event/mobile.php");

	endwhile;
endif;

get_footer();

wp_reset_query();

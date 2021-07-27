<?php
require 'functions/func-theme.php';
require 'locales/locales.php';

error_reporting(E_ALL);

get_header();

global $post;
$post_slug = $post->post_name;

isset($_GET['date']) ? ($date = $_GET['date']) : ($date = 0);
isset($_GET['time']) ? ($time = $_GET['time']) : ($time = 0);

function occurrences_where($where)
{
    $where = str_replace(
        "meta_key = 'meta_occurrences_$",
        "meta_key LIKE 'meta_occurrences_%",
        $where
    );
    return $where;
}

add_filter('posts_where', 'occurrences_where');

if ($date !== 0 && $time !== 0) {
    $args = [
        'numberposts' => 1,
        'post_type' => 'event',
        'name' => $post->post_name,
        'meta_query' => [
            [
                'key' => 'meta_occurrences_$_timestamp',
                'compare' => 'LIKE',
                'value' => date_long($date, '-') . ' ' . time_long($time, ':'),
            ],
        ],
    ];
} else {
    $args = [
        'numberposts' => 1,
        'post_type' => 'event',
        'name' => $post->post_name,
    ];
}

$the_query = new WP_Query($args);

if ($the_query->have_posts()):
    if ($date !== 0 && $time !== 0) {
        $occurrences = get_fields()['meta']['occurrences'];
        $currentEvent =
            $occurrences[
                array_search(
                    date_long($date, '/') . ' ' . time_long($time, ':'),
                    array_column($occurrences, 'timestamp')
                )
            ];
    } else {
        $occurrences = get_fields()['meta']['occurrences'];
        $currentEvent = $occurrences[0];
    }

    $currentEvent['date'] = explode(' ', $currentEvent['timestamp'])[0];
    $currentEvent['time'] = explode(' ', $currentEvent['timestamp'])[1];
    $currentEvent['general'] = get_fields()['meta'];
    if (
        array_key_exists('venue', $currentEvent) &&
        count($currentEvent['venue']) > 0
    ) {
        $currentVenue = get_fields($currentEvent['venue'][0]->ID);
    }
    $feature_image_alt = isset(
        get_fields()['meta']['feature_image']['image']['alt']
    )
        ? get_fields()['meta']['feature_image']['image']['alt']
        : '';
    $feature_image_description = isset(
        get_fields()['meta']['feature_image']['image']['description']
    )
        ? get_fields()['meta']['feature_image']['image']['description']
        : '';

    $labels = [];
    if (isset(get_the_terms(get_the_ID(), 'division')[0])) {
        foreach (get_the_terms(get_the_ID(), 'division') as $term) {
            array_push($labels, $term->name);
        }
    }

    if (isset(get_the_terms(get_the_ID(), 'label')[0])) {
        foreach (get_the_terms(get_the_ID(), 'label') as $term) {
            $term->name !== '' && array_push($labels, $term->name);
        }
    }

    $currentEvent['venue'][0]->post_title !== '' &&
        array_push($labels, $currentEvent['venue'][0]->post_title);

    get_fields($currentEvent['venue'][0]->ID)['address']['city'] !== '' &&
        array_push(
            $labels,
            get_fields($currentEvent['venue'][0]->ID)['address']['city']
        );

    $tags = [];
    if (
        array_key_exists('tags', $currentEvent) &&
        is_array($currentEvent['tags'])
    ) {
        foreach ($currentEvent['tags'] as $tag) {
            array_push($tags, get_term($tag)->name);
        }
    }
    $args_teaser = [
        'numberposts' => 1,
        'post_type' => 'generalBlock',
        'meta_query' => [
            [
                'key' => 'teaserDivision_taxonomyDivision',
                'compare' => 'LIKE',
                'value' =>
                    isset(get_the_terms(get_the_ID(), 'division')[0]) &&
                    get_the_terms(get_the_ID(), 'division')[0]->term_id,
            ],
        ],
    ];
    $the_query_teaser = new WP_Query($args_teaser);

    while ($the_query->have_posts()):
        $the_query->the_post();

        if (!isset(get_fields()['meta']['feature_image']['image']['ID'])) {
            // TEMPLATE: has no feature image
            include get_template_directory() .
                '/template-parts/single-event/desktop--no-image.php';
        } else {
            // TEMPLATE: has feature image
            include get_template_directory() .
                '/template-parts/single-event/desktop--with-image.php';
        }

        include get_template_directory() .
            '/template-parts/single-event/mobile.php';
    endwhile;
endif;

get_footer();

wp_reset_query();

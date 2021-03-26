<?php

include('functions/func-style.php');
include('functions/func-acf.php');
include('functions/func-cpt.php');
include('functions/func-menus.php');
include('functions/func-scripts.php');
include('functions/func-blocks.php');
include('functions/func-admin.php');
include('functions/func-taxonomies.php');

add_action('init', 'custom_taxonomy_labels', 0);
add_action('init', 'cpt_event', 0);
add_action('init', 'register_menus', 0);

add_action('wp_enqueue_scripts', 'js_scripts_jquery', 0);
add_action('wp_enqueue_scripts', 'js_scripts_custom', 1);

add_filter('acf/settings/remove_wp_meta_box', '__return_false');
add_action('acf/init', 'acf_init_fields');
add_action('acf/init', 'acf_blocks');
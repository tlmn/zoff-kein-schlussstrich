<?php

include('functions/func-style.php');
include('functions/func-cpt.php');
include('functions/func-menus.php');
include('functions/func-scripts.php');
include('functions/func-blocks.php');
include('functions/func-admin.php');

add_action('wp_enqueue_scripts', 'js_scripts_jquery', 0);
add_action('wp_enqueue_scripts', 'js_scripts_custom', 1);
add_action('admin_head', 'gb_gutenberg_admin_styles');
add_action('acf/init', 'acf_init_blocks');

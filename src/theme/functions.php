<?php

include('functions/func-style.php');
include('functions/func-acf.php');
include('functions/func-cpt.php');
include('functions/func-menus.php');
include('functions/func-scripts.php');
include('functions/func-editor.php');
include('functions/func-blocks.php');
include('functions/func-admin.php');
include('functions/func-taxonomies.php');

add_action('init', 'custom_taxonomy_labels', 0);
add_action('init', 'custom_taxonomy_divisions', 0);
add_action('init', 'cpt_event', 0);
add_action('init', 'cpt_eventLocation', 0);
add_action('init', 'cpt_generalBlock', 0);
add_action('init', 'register_menus', 0);

add_action('wp_enqueue_scripts', 'js_scripts_jquery', 0);
add_action('wp_enqueue_scripts', 'js_scripts_custom', 1);

add_filter('acf/settings/remove_wp_meta_box', '__return_false');
add_action('acf/init', 'acf_init_fields');
add_action('acf/init', 'acf_blocks');

add_action('after_setup_theme', function () {
    remove_action('enqueue_block_editor_assets', 'generate_enqueue_backend_block_editor_assets');
});


function remove_gutenberg_blocks_style_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}

//add_action('wp_enqueue_scripts', 'add_editor_styles');

add_filter( 'block_editor_settings' , 'remove_guten_wrapper_styles' );
 function remove_guten_wrapper_styles( $settings ) {
    unset($settings['styles'][0]);

    return $settings;
}
//add_action('wp_enqueue_scripts', 'remove_gutenberg_blocks_style_css', 99);

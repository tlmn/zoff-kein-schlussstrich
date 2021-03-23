<?php

function wp_theme_styles()
{
    wp_enqueue_style('theme-styles', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    wp_enqueue_style('hamburgers-styles', get_template_directory_uri() . '/hamburgers.css', array(), '1.0.0', 'all');
}

function wp_dequeue_gutenberg_styles()
{
    wp_dequeue_style('wp-block-library');
};


function add_block_editor_assets()
{
    wp_enqueue_style('block_editor_css', get_template_directory_uri() . '/style.css');
}


function wpdocs_theme_add_editor_styles()
{
    add_editor_style(get_template_directory_uri() . '/style.css');
}


add_action('admin_init', 'wpdocs_theme_add_editor_styles');
add_action('enqueue_block_editor_assets', 'add_block_editor_assets', 10, 0);
add_action('wp_enqueue_scripts', 'wp_theme_styles');

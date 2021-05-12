<?php
function remove_gutenberg_default_styles()
{
    wp_deregister_style('wp-admin');
}


function add_editor_styles()
{

    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
}

function organic_origin_gutenberg_styles()
{
    wp_enqueue_style('organic-origin-gutenberg', get_theme_file_uri('/editor-style.css'), false, '1.0', 'all');
}
add_action('enqueue_block_editor_assets', 'organic_origin_gutenberg_styles');

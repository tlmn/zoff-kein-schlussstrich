<?php

function js_scripts_jquery()
{
    wp_enqueue_script('jquery');
}

function js_scripts_custom()
{
    wp_enqueue_script('js-file', get_template_directory_uri() . '/assets/js/scripts/common.js', false);
}

function js_editor_block_styles()
{
    wp_enqueue_script('ks-editor', get_template_directory_uri() . '/assets/js/scripts/editor.js', array('wp-blocks', 'wp-dom'), true);
}

<?php

function wp_theme_styles()
{
    wp_enqueue_style('ks-styles', get_stylesheet_uri());
}

function load_editor_styles()
{
    add_theme_support('editor-styles');
    add_editor_style('style.css');
}

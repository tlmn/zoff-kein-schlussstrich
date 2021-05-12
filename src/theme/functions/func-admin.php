<?php

function gb_gutenberg_admin_styles()
{
    echo '
        <style>
            /* 
            .wp-block {
                max-width: 100%;
            }
 
            .wp-block[data-align="wide"] {
                max-width: 1080px;
            } */
 
            /* Width of "full-wide" blocks */
            .wp-block {
                max-width: none;
            }	
        </style>
    ';
}

function remove_wp_block_styles()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wp-block-style');
}

function remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
}

function gutenberg_editor_assets()
{
    add_theme_support('editor-styles');
    wp_enqueue_style('my-gutenberg-editor-styles', get_theme_file_uri('/style.css'), FALSE);
}

function remove_comment_support()
{
    remove_post_type_support('post');
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}

function admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}

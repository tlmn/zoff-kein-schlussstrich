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

function remove_guten_wrapper_styles($settings)
{
    unset($settings['styles'][0]);
    return $settings;
}

function remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
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

add_filter('block_editor_settings', 'remove_guten_wrapper_styles');
add_action('wp_enqueue_scripts', 'remove_wp_block_styles');

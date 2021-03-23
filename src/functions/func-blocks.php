<?php

$BLOCKS = [];

function acf_init_blocks()
{
    global $BLOCKS;

    if (function_exists('acf_register_block_type')) {
        foreach ($BLOCKS as $block) {
            acf_register_block_type($block);
        }
    }
}

function allowed_block_types()
{
    global $BLOCKS;

    $acf_blocks = array_map(function ($block) {
        return "acf/{$block['name']}";
    }, $BLOCKS);

    $allowed_core_blocks = [
        'core/heading',
        'core/paragraph',
        'core/image',
        'core/gallery',
        'core/quote',
        'core-embed/vimeo',
    ];

    return array_merge($acf_blocks, $allowed_core_blocks);
}

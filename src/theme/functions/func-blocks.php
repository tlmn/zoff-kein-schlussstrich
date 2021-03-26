<?php

function acf_blocks()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'Feature',
            'title'             => __('Feature'),
            'description'       => __('Feature'),
            'render_template'   => 'template-parts/blocks/feature.php',
            'category'          => 'formatting',
            'icon'              => 'dashicons-format-quote',
            'is_preview'        => true,
            'keywords'          => array('feature'),
        ));
    }
}

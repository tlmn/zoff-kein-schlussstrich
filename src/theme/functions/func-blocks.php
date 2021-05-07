<?php

function acf_blocks()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'feature',
            'title'             => __('Feature'),
            'description'       => __('Feature'),
            'render_template'   => 'template-parts/blocks/feature.php',
            'category'          => 'formatting',
            'icon'              => 'dashicons-format-quote',
            'is_preview'        => true,
            'keywords'          => array('feature'),
        ));

        acf_register_block_type(array(
            'name'              => 'general-blocks/division-teaser',
            'title'             => __('Teaser Säule'),
            'description'       => __('Teaser Säule'),
            'render_template'   => 'template-parts/blocks/generalBlocks/divisionTeaser.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array('testimonial', 'quote'),
        ));
    }
}

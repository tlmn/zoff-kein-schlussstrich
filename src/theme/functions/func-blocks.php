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
            'icon'              => 'format-quote',
            'is_preview'        => true,
            'keywords'          => array('feature'),
        ));

        acf_register_block_type(array(
            'name'              => 'programme/division-teaser',
            'title'             => __('Teaser Säule'),
            'description'       => __('Teaser Säule'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => false,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/programme/division-teaser.php',
        ));

        acf_register_block_type(array(
            'name'              => 'general-blocks/horizontal-line',
            'title'             => __('Horizontale Linie'),
            'description'       => __('Horizontale Linie'),
            'render_template'   => 'template-parts/blocks/general/horizontal-line.php',
            'category'          => 'formatting',
            'icon'              => 'minus',
            'is_preview'        => true,
            'keywords'          => array('horizonzal', 'linie'),
        ));

        acf_register_block_type(array(
            'name'              => 'general-blocks/container-constraint',
            'title'             => __('Container schmal'),
            'description'       => __('Schmaler Container für Elemente wie Überschriften oder Absätze'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/general/container--constraint.php',
        ));

        acf_register_block_type(array(
            'name'              => 'general-blocks/container-wide',
            'title'             => __('Text-Container breit'),
            'description'       => __('Breiter Container für Elemente wie Überschriften oder Absätze'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/general/container--wide.php',
        ));

        acf_register_block_type(array(
            'name'              => 'general-blocks/container-tab',
            'title'             => __('Text-Container mit Lasche'),
            'description'       => __('Text-Container mit Lasche'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/general/container--with-tab.php',
        ));

        acf_register_block_type(array(
            'name'              => 'general-blocks/text-quote',
            'title'             => __('Fließtext-Zitat'),
            'description'       => __('Fließtext-Zitat'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/general/text-quote.php',
        ));

        acf_register_block_type(array(
            'name'              => 'images/images-wide',
            'title'             => __('Bilder breit'),
            'description'       => __('Bilder breit'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/images/images-wide.php',
        ));

        acf_register_block_type(array(
            'name'              => 'images/image-inline',
            'title'             => __('Bild inline'),
            'description'       => __('Bild inline'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/images/image-inline.php',
        ));

        acf_register_block_type(array(
            'name'              => 'programme/venue-teaser',
            'title'             => __('Teaser Veranstaltungsort'),
            'description'       => __('Teaser Veranstaltungsort'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/programme/venue-teaser.php',
        ));

        acf_register_block_type(array(
            'name'              => 'programme/hero--with-image',
            'title'             => __('Hero Säule mit Bild'),
            'description'       => __('Hero Säule mit Bild'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/programme/division-hero--with-image.php',
        ));

        acf_register_block_type(array(
            'name'              => 'programme/hero--no-image',
            'title'             => __('Hero Säule ohne Bild'),
            'description'       => __('Hero Säule ohne Bild'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/programme/division-hero--no-image.php',
        ));

        acf_register_block_type(array(
            'name'              => 'programme/teaser',
            'title'             => __('Progammteaser'),
            'description'       => __('Progammteaser'),
            'category'          => 'formatting',
            'supports'          => array(
                'align' => true,
                'mode' => false,
                'jsx' => true
            ),
            'render_template' => 'template-parts/blocks/programme/teaser.php',
        ));
    }
}


function page_allowed_block_types($allowed_blocks, $post)
{

    $allowed_blocks = array(
        "core/paragraph",
        "core/button",
        "core/list",
        "core/heading",
        "acf/feature",
        "acf/images-images-wide",
        "acf/programme-division-teaser",
        "acf/general-blocks-horizontal-line",
        "acf/general-blocks-container-constraint",
        "acf/general-blocks-container-tab",
        "acf/general-blocks-text-quote",
        "acf/programme-venue-teaser",
        "acf/programme-hero--with-image",
        "acf/programme-hero--no-image",
        "acf/programme-teaser",
    );

    if ($post->post_type === 'page') {
        $allowed_blocks[] = 'core/shortcode';
    }

    return $allowed_blocks;
}

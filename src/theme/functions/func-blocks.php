<?php
$BLOCKS = array(
    array(
        'name'              => 'background-container',
        'title'             => __('Hintergrund Container'),
        'description'       => __('Hintergrund Container'),
        'category'          => 'formatting',
        'render_template' => 'template-parts/blocks/background-container.php',
        'supports'          => array(
            'jsx' => true
        ),
    ),

    array(
        'name'              => 'background-teaser',
        'title'             => __('Hintergrund Teaser'),
        'description'       => __('Hintergrund Teaser'),
        'category'          => 'formatting',
        'parent'            => ['acf/background-container'],
        'render_template' => 'template-parts/blocks/background-teaser.php',
        'supports'          => array(
            'jsx' => true
        ),
    ),

    array(
        'name'              => 'background-readmore',
        'title'             => __('Hintergrund mehr lesen'),
        'description'       => __('Hintergrund mehr lesen'),
        'category'          => 'formatting',
        'parent'            => ['acf/background-container'],
        'render_template' => 'template-parts/blocks/background-readmore.php',
        'supports'          => array(
            'jsx' => true
        ),
    ),

    array(
        'name'              => 'button',
        'title'             => __('Button'),
        'description'       => __('Button'),
        'category'          => 'formatting',
        'supports'          => array(
            'mode' => false,
        ),
        'render_template' => 'template-parts/blocks/button.php',
    ),

    array(
        'name'              => 'button--external',
        'title'             => __('Button (externer Link)'),
        'description'       => __('Button (externer Link)'),
        'category'          => 'formatting',
        'supports'          => array(
            'mode' => false,
        ),
        'render_template' => 'template-parts/blocks/button--external.php',
    ),

    array(
        'name'              => 'container',
        'title'             => __('Container'),
        'description'       => __('Container für Elemente wie Überschriften oder Absätze'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/container.php',
    ),

    array(
        'name'              => 'container--w-tab',
        'title'             => __('Container mit Lasche'),
        'description'       => __('Container mit Lasche'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/container--w-tab.php',
    ),

    array(
        'name'              => 'hero-landing',
        'title'             => __('Hero Landing'),
        'description'       => __('Hero Landing'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
        ),
        'render_template' => 'template-parts/blocks/hero-landing.php',
    ),

    array(
        'name'              => 'hero--w-image',
        'title'             => __('Hero mit Bild'),
        'description'       => __('Hero mit Bild'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/hero--w-image.php',
    ),

    array(
        'name'              => 'hero--wo-image',
        'title'             => __('Hero ohne Bild'),
        'description'       => __('Hero ohne Bild'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/hero--wo-image.php',
    ),

    array(
        'name'              => 'images--wide',
        'title'             => __('Bilder breit'),
        'description'       => __('Bilder breit'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/images--wide.php',
    ),
    array(
        'name'              => 'image--inline',
        'title'             => __('Bild inline'),
        'description'       => __('Bild inline'),
        // 'parent'            => ['acf/container', 'acf/container--w-tab'],
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/image--inline.php',
    ),

    array(
        'name'              => 'logos',
        'title'             => __('Partner / Logos'),
        'description'       => __('Partner / Logos'),
        'category'          => 'formatting',
        'parent'            => ['acf/container', 'acf/container--w-tab'],
        'supports'          => array(
            'align' => true,
            'mode' => false,
        ),
        'render_template' => 'template-parts/blocks/logos.php',
    ),

    array(
        'name'              => 'marquee',
        'title'             => __('Laufband'),
        'description'       => __('Laufband'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
        ),
        'render_template' => 'template-parts/blocks/marquee.php',
    ),

    array(
        'name'              => 'quote',
        'title'             => __('Fließtext-Zitat'),
        'description'       => __('Fließtext-Zitat'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/quote.php',
    ),

    array(
        'name'              => 'quote--big',
        'title'             => __('Zitat groß'),
        'description'       => __('Zitat groß'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/quote--big.php',
    ),
    array(
        'name'              => 'teaser-division',
        'title'             => __('Teaser Säule'),
        'description'       => __('Teaser Säule'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/teaser-division.php',
    ),
    array(
        'name'              => 'teaser-programme',
        'title'             => __('Teaser Programm'),
        'description'       => __('Teaser Programm'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/teaser-programme.php',
    ),
    array(
        'name'              => 'teaser-venue',
        'title'             => __('Teaser Veranstaltungsort'),
        'description'       => __('Teaser Veranstaltungsort'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/teaser-venue.php',
    ),

    array(
        'name'              => 'teaser-latest',
        'title'             => __('Aktuelles Block'),
        'description'       => __('Aktuelles Block'),
        'category'          => 'formatting',
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
        'render_template' => 'template-parts/blocks/teaser-latest.php',
    ),


);

function register_acf_blocks()
{
    global $BLOCKS;
    if (function_exists('acf_register_block_type')) {
        foreach ($BLOCKS as $BLOCK)
            acf_register_block_type($BLOCK);
    }
}


function page_allowed_block_types($allowed_blocks, $post)
{
    global $BLOCKS;
    $allowed_blocks = array(
        'core/paragraph',
        'core/list',
        'core/heading',
        'core/video',
        'core/embed'
    );

    foreach ($BLOCKS as $BLOCK) {
        array_push($allowed_blocks, 'acf/' . $BLOCK['name']);
    }

    if ($post->post_type === 'page') {
        array_push($allowed_blocks, 'core/shortcode');
    }

    return $allowed_blocks;
}
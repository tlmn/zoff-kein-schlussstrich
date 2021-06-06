<?php

/*
 * Background Teaser
 */

$allowed_blocks = array('core/paragraph', 'core/heading');

$template = array(
    array('core/paragraph', array(
        'content'    => 'Datum',
        'blockStyle' => 'text--medium'
    )),
    array('core/heading', array(
        'content'   => 'Name der Person',
        'level'     => 2,
    )),
    array('core/paragraph', array(
        'content'    => 'Teaser-Text',
        'blockStyle' => 'text--large'
    ))
);

?>

<div class="bg-black text-white">
    <div class="container grid-6 md:grid-16">
        <div class="col-span-full md:col-span-11 md:col-start-4 py-7 md:py-8">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
        </div>
    </div>
</div>
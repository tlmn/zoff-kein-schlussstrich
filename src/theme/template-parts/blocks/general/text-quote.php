<?php

/*
 * Text Quote Block
 */


$allowed_blocks = array('core/heading', 'core/paragraph', 'core/button');

$template = array(
    array('core/paragraph', array(
        'content' => 'Zitattext',
        'className' => 'textQuote-body'
    )),
    array('core/paragraph', array(
        'content' => 'Autor:in',
        'className' => 'textQuote-author'
    ))
);

?>
<div class="w-full flex justify-center textQuote row-collapse">
    <div class="container grid-6 md:grid-16 md:py-7 border-2">
        <div class="col-span-full md:col-span-14 md:col-start-2">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
        </div>
    </div>
</div>
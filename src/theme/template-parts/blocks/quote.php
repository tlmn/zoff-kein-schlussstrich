<?php

/*
 * Text Quote Block
 */


$allowed_blocks = array(
    'core/heading', 'core/paragraph', 'acf/button', 'acf/button--external',
);

$template = array(
    array('core/paragraph', array(
        'content' => 'Zitattext',
        'className' => 'wp-block-quote__body'
    )),
    array('core/paragraph', array(
        'content' => 'Autor:in',
        'className' => 'wp-block-quote__author'
    ))
);

?>
<div class="wp-block-quote">
    <div class="wp-block-quote__wrapper">
        <div class="wp-block-quote__content">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
        </div>
    </div>
</div>
<?php

/*
 * Text Quote Big
 */

$bgColor = get_field('bgColor') ?: 'blue';

$allowed_blocks = array('core/paragraph');

$template = array(
    array('core/paragraph', array(
        'content' => 'Zitattext',
        'className' => 'wp-block-quote-big__quote'
    )),
    array('core/paragraph', array(
        'content' => 'Autor:in',
        'className' => 'wp-block-quote-big__author'
    )),

);
?>

<div class="wp-block-quote-big bg-<?php echo $bgColor; ?>">
    <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
</div>
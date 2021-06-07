<?php

/*
 * Container with Tab
 */


$allowed_blocks = array(
    'core/heading',
    'core/paragraph',
    'acf/button',
    'acf/button--external',
    'acf/logos'
);

$title = get_field('title') ?: 'Titel';
$bgColor = get_field('bgColor') ?: 'white';

?>
<div class="wp-block-container--w-tab">
    <div class="wp-block-container--w-tab__wrapper bg-<?php echo $bgColor; ?>">
        <div class="wp-block-container--w-tab__tab">
            <span class="wp-block-container--w-tab__tab-text">
                <?php echo $title; ?>
            </span>
        </div>

        <div class="wp-block-container--w-tab__content">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" />
        </div>
    </div>
</div>
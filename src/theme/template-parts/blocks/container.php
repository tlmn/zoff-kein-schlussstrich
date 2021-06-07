<?php

/*
 * Container
 */


$allowed_blocks = array(
    'core/heading',
    'core/paragraph',
    'acf/button',
    'acf/button--external',
    'acf/logos',
    'acf/image--inline'
);

?>

<div class="wp-block-container">
    <div class="wp-block-container__wrapper">
        <div class="wp-block-container__content">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" />
        </div>
    </div>
</div>
<?php

/*
 * Wide Container
 */


$allowed_blocks = array('core/heading', 'core/paragraph', 'core/button');

?>
<div class="w-full flex justify-center md:py-7 ks-container--wide">
    <div class="container grid-6 md:grid-16">
        <div class="col-span-full">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" />
        </div>
    </div>
</div>
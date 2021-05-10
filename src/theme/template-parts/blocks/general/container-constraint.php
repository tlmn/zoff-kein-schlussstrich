<?php

/*
 * Constraint Container
 */


$allowed_blocks = array('core/heading', 'core/paragraph', 'core/button', 'acf/images-image-inline');

?>
<div class="w-full flex justify-center md:py-7 ks-container--constraint">
    <div class="container grid-6 md:grid-16">
        <div class="col-span-full md:col-span-10 md:col-start-4">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" />
        </div>
    </div>
</div>
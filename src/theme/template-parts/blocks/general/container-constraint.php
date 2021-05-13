<?php

/*
 * Constraint Container
 */


$allowed_blocks = array('core/heading', 'core/paragraph', 'core/button', 'acf/images-image-inline');

?>
<div class="w-full flex justify-center row-collapse">
    <div class="container grid-6 md:grid-16 py-7 border-t-2 border-b-2 md:border-l-2 md:border-r-2">
        <div class="col-span-full md:col-span-10 md:col-start-4 ks-container--constraint">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" />
        </div>
    </div>
</div>
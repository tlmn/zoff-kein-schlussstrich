<?php

/*
 * Container with Tab
 */


$allowed_blocks = array('core/heading', 'core/paragraph', 'core/button');

$title = get_field('title') ?: 'Titel';
$bgColor = get_field('bgColor') ?: 'white';

?>
<div class="border-t-2 border-b-2 row-collapse flex justify-center bg-<?php echo $bgColor; ?>">
    <div class="container grid-6 md:grid-16 md:border-l-2 md:border-r-2">
        <div class="md:border-r-2 col-span-full md:col-span-1 flex md:gap-collapse--right h-full items-center justify-center md:relative">
            <span class="font-sans font-medium md:absolute md:rotate--270 text-3xl md:text-xl py-3 md:py-0 leading-snug md:max-w-max md:whitespace-nowrap">
                <?php echo $title; ?>
            </span>
        </div>

        <div class="col-span-full md:col-span-11 md:col-start-4 py-7 md:py-8 px-2 md:px-0">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" />
        </div>
    </div>
</div>
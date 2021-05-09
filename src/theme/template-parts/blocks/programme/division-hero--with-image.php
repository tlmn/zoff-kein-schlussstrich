<?php

/*
 *  Programme Hero Container With Image
 */

$stripeColor = get_field('stripeColor') ?: 'red';
$title = get_field('title') ?: 'Titel';
$image = get_field('image') ?: '1';

$allowed_blocks = array('core/heading');

$template = array(
    array('core/heading', array(
        'content'   => 'Unterzeile',
        'level'     => 1,

    ))
);

?>
<div class="w-full flex justify-center">
    <div class="container grid-6 md:grid-16 border-b-2 border-l-2 border-r-2 border-black">
        <div class="md:col-span-2 bg-<?php echo $stripeColor; ?> shadow--bottom-right gap-collapse--right border-r-2">
            <div class="h-full flex items-center">
                <div>
                    <span class="font-sans rotate-center--90 text-3xl font-medium leading-wider" style="padding-top: 25%"><?php echo $title; ?></span>
                </div>
            </div>
        </div>
        <div class="md:col-span-7">
            <img srcset="<?php echo wp_get_attachment_image_srcset($image['ID']) ?>" class="border-0 shadow--left shadow--bottom-right" alt="<?php echo array_key_exists('alt', $image) && $image['alt']; ?>" />
        </div>
        <div class="md:col-span-7 font-sans font-medium md:text-5xl md:p-7 md:leading-tight">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
        </div>
    </div>
</div>
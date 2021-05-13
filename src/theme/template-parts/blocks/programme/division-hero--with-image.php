<?php

/*
 *  Programme Hero Container With Image
 */

$stripeColor = get_field('stripeColor') ?: 'yellow';
$title = get_field('title') ?: 'Titel';
$image = get_field('image') ?: '1';

$allowed_blocks = array('core/heading');

$template = array(
    array('core/heading', array(
        'content'   => 'Unterzeile',
        'level'     => 2,
    ))
);

?>
<div class="w-full flex justify-center">
    <div class="container grid-6 md:grid-16  border-t-2 border-b-2 md:border-l-2 md:border-r-2 border-black">
        <div class="col-span-full md:col-span-2 bg-<?php echo $stripeColor; ?> md:shadow--bottom-right md:gap-collapse--right">
            <div class="flex justify-center md:justify-start md:items-center leading-normal md:h-full py-4 md:py-0">
                <div class="text-center md:text-left">
                    <span class="font-sans md:rotate-center--90 text-black text-3xl font-medium leading-snug md:leading-wider md:pt-1/4 md:whitespace-nowrap">
                        <?php echo $title; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-span-full md:col-span-7">
            <img srcset="<?php echo wp_get_attachment_image_srcset($image['ID']) ?>" class="border-0 md:shadow--left md:shadow--bottom-right" alt="<?php echo array_key_exists('alt', $image) && $image['alt']; ?>" />
        </div>

        <div class="col-span-full md:col-span-7 py-7 px-2 md:px-7 font-sans text-black font-medium text-lg md:text-5xl leading-snug md:leading-tight">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
        </div>
    </div>
</div>
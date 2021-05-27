<?php

/*
 * Upcoming Event Teaser
 */

$title = get_field('title') ?: 'Titel';
$feature_image = get_field('featureImage') ?: 1;

$allowed_blocks = array(
    'core/heading',
    'core/paragraph',
    'acf/button',
);

$template = array(
    array('core/heading', array(
        'content'   => 'Titel',
        'level'     => 3,
    )),
    array('core/paragraph', array(
        'content'   => 'Untertitel',
        'level'     => 4,
    )),
    array('acf/button', array(
        'content'   => 'Weiter',
    ))
);

?>
<div class="border-t-2 border-b-2 row-collapse flex justify-center bg-<?php echo $bgColor; ?>">
    <div class="container grid-6 md:grid-16 md:border-l-2 md:border-r-2">
        <div class="border-b-2 md:border-b-0 md:border-r-2 col-span-full md:col-span-1 flex md:gap-collapse--right h-full items-center justify-center md:relative">
            <span class="font-sans font-medium md:absolute md:rotate--270 text-3xl md:text-xl py-3 md:py-0 leading-snug md:max-w-max md:whitespace-nowrap">
                <?php echo $title; ?>
            </span>
        </div>
        <div class="col-span-full md:col-span-15 grid-6 md:grid-15">
            <div class="col-span-full md:col-span-8 p-2 py-7 md:p-7 order-last md:order-1">
                <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
            </div>

            <div class="col-span-full md:col-span-7 order-1 md:order-last h-full w-full relative">
                <img srcset="<?php echo wp_get_attachment_image_srcset($feature_image['ID']); ?>" class="absolute top-0 left-0 h-full w-full object-cover shadow--left" />
            </div>
        </div>
    </div>
</div>
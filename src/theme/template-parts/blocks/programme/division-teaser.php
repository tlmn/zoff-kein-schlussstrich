<?php

/*
 *  Division Teaser Container
 */

$divisionNumber = get_field('divisionNumber') ?: '1';
$featureImage = get_field('featureImage');

$allowed_blocks = array('core/paragraph');

$template = array(
    array('core/heading', array(
        'content'   => 'Beschreibung Theater',
        'level'     => 2,
        'className' => 'block md:mb-4 // font-medium md:text-5xl md:leading-tight'
    )),
    array('core/paragraph', array(
        'content' => 'Beschreibung Theater',
        'className' => 'block font-medium md:text-lg md:leading-wider'
    )),
);

?>
<div class="border-black border-t-2 border-b-2 flex justify-center">
    <div class="container grid-6 md:grid-16">
        <div class="md:col-span-1 border-l-2">
            <div class="h-full flex items-center">
                <div>
                    <span class="rotate-center--90 text-3xl font-medium md:pt-2 leading-wider">Säule <?php echo $divisionNumber; ?></span>
                </div>
            </div>
        </div>
        <div class="md:col-span-7 md:p-7 border-l-2">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
        </div>
        <div class="md:col-span-8 border-r-2">
            <img srcset="<?php echo wp_get_attachment_image_srcset($featureImage) ?>" class="border-0 shadow--left" alt="" />
        </div>
    </div>
</div>
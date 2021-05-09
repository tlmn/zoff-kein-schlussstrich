<?php

/*
 * Venue Teaser Container
 */

$venueNumber = get_field('number');
$venueName = get_field('name');

$allowed_blocks = array('core/paragraph');

$template = array(
    array('core/paragraph', array(
        'content' => 'Beschreibung Theater',
    )),
);

?>
<div class="w-full flex justify-center border-t-2 border-b-2" style="margin-top: -1px; margin-bottom: -1px;">
    <div class="container grid-6 md:grid-16 border-l-2 border-r-2">
        <div class="col-span-2 h-full flex justify-center items-center border-r-2 gap-collapse">
            <span class="font-bold leading-tight py-3 md:text-5xl">
                <?php echo $venueNumber; ?>
            </span>
        </div>

        <div class="border-r-2 col-span-1 flex gap-collapse--right h-full items-center justify-center relative">
            <span class="absolute rotate--270 md:text-xl md:leading-snug" style="width:max-content">Theater Heilbonn</span>
        </div>

        <div class="col-span-10 grid-10">
            <div class="md:col-span-8 md:col-start-2 flex items-center">
                <div class="body-text">
                    <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
                </div>
            </div>
        </div>
    </div>
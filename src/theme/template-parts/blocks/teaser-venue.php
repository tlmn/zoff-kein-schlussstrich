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
<div class="w-full flex justify-center md:min-h--big" style="margin-top: -2px; margin-bottom: -2px;">
    <div class="container grid-6 md:grid-16 md:border-l-2 md:border-r-2 border-t-2 border-b-2">
        <div class="col-span-2 h-full flex justify-center items-center border-r-2 md:gap-collapse">
            <span class="font-sans font-bold leading-tight py-3 text-5xl">
                <?php echo $venueNumber; ?>
            </span>
        </div>

        <div class="md:border-r-2 col-span-4 md:col-span-1 flex md:gap-collapse--right h-full items-center justify-center md:relative">
            <span class="font-sans font-medium md:absolute md:rotate--270 text-xl leading-snug md:max-w-max md:whitespace-nowrap">
                <?php echo $venueName; ?>
            </span>
        </div>

        <div class="col-span-full border-t-2 md:border-t-0 md:col-span-10 md:grid-10">
            <div class="md:col-span-8 md:col-start-2 md:flex md:items-center py-7 md:py-3 px-2 md:px-0">
                <div class="body-text">
                    <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
                </div>
            </div>
        </div>
    </div>
</div>
<?php

/*
 *  Programme Hero Container Without Image
 */

$stripeColor = get_field('stripeColor') ?: 'yellow';
$title = get_field('title') ?: 'Titel';
$subtitle = get_field('subtitle') ?: 'Unterzeile';

$allowed_blocks = array('core/paragraph');

$template = array(
    array('core/paragraph', array(
        'content'   => 'Beschreibung',
    ))
);

?>
<div class="w-full flex justify-center">
    <div class="container grid-6 md:grid-16 border-b-2 md:border-l-2 md:border-r-2">
        <div class="col-span-full md:col-span-2 bg-<?php echo $stripeColor; ?> md:shadow--bottom-right md:gap-collapse--right">
            <div class="flex justify-center md:justify-start leading-normal md:h-full py-4 md:py-0">
                <div class="text-center md:text-left">
                    <span class="font-sans md:rotate-left--90 text-black text-3xl font-medium leading-snug md:leading-wider md:whitespace-nowrap md:pr-3">
                        <?php echo $title; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-span-full md:col-span-14 flex flex-col">
            <div class="grid-14 border-b-2 md:gap-collapse--left">
                <div class="font-sans text-black col-span-full md:col-span-10 md:col-start-2 py-5 md:py-8 text-2xl md:text-5xl font-medium leading-snug md:leading-tight ">
                    <?php echo $subtitle; ?>
                </div>
            </div>

            <div class="grid-14">
                <div class="col-span-full md:col-span-10 md:col-start-2 py-7 font-sans text-black font-medium text-lg leading-wider">
                    <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
                </div>
            </div>
        </div>
    </div>
</div>
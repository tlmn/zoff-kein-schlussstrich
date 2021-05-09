<?php

/*
 *  Programme Hero Container Without Image
 */

$stripeColor = get_field('stripeColor') ?: 'red';
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
    <div class="container grid-6 md:grid-16 border-black border-b-2 border-l-2 border-r-2">
        <div class="md:col-span-2 bg-<?php echo $stripeColor; ?> shadow--bottom-right">
            <div class="h-full flex items-center">
                <div>
                    <span class="font-sans rotate-center--90 text-3xl font-medium leading-wider" style="padding-top: 25%"><?php echo $title; ?></span>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:col-span-14 border-black">
            <div class="grid-14 border-black border-b-2 gap-collapse--left">
                <div class="font-sans md:col-span-10 md:col-start-2 md:py-8 md:text-5xl md:font-medium md:leading-tight ">
                    <?php echo $subtitle; ?>
                </div>
            </div>
            <div class="grid-14">
                <div class="font-sans md:col-span-10 md:col-start-2 md:py-7 font-medium md:text-lg md:leading-wider">
                    <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
                </div>
            </div>
        </div>
    </div>
</div>
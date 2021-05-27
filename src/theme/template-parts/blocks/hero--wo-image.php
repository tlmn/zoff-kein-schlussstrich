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
<div class="wp-block-hero--wo-image">
    <div class="wp-block-hero--wo-image__wrapper">
        <div class="wp-block-hero--w-image__tab bg-<?php echo $stripeColor; ?>">
            <div class="wp-block-hero--w-image__tab-text-wrapper">
                <div class="text-center md:text-left">
                    <span class="wp-block-hero--w-image__tab-text">
                        <?php echo $title; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="wp-block-hero--wo-image__content-wrapper">
            <div class="grid-14 border-b-2 md:gap-collapse--left">
                <div class="wp-block-hero--wo-image__subtitle-wrapper">
                    <h2><?php echo $subtitle; ?></h2>
                </div>
            </div>

            <div class="grid-14">
                <div class="wp-block-hero--wo-image__description-wrapper">
                    <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
                </div>
            </div>
        </div>
    </div>
</div>
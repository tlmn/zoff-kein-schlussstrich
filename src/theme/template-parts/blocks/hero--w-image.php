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
<div class="wp-block-hero--w-image">
    <div class="wp-block-hero--w-image__wrapper">
        <div class="wp-block-hero--w-image__tab bg-<?php echo $stripeColor; ?>">
            <div class="wp-block-hero--w-image__tab-text-wrapper">
                <div class="text-center md:text-left">
                    <span class="wp-block-hero--w-image__tab-text">
                        <?php echo $title; ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="wp-block-hero--w-image__image-wrapper">
            <img srcset="<?php echo wp_get_attachment_image_srcset($image['ID']) ?>" class="wp-block-hero--w-image__image" alt="<?php echo array_key_exists('alt', $image) && $image['alt']; ?>" />
        </div>

        <div class="wp-block-hero--w-image__content-wrapper">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
        </div>
    </div>
</div>
<?php

/*
 *  Division Teaser Container
 */

$divisionNumber = get_field('divisionNumber') ?: '1';
$featureImage = get_field('featureImage');

$allowed_blocks = array('core/paragraph');

$template = array(
    array('core/heading', array(
        'content'   => 'Beschreibung Säule',
        'level'     => 2,
    )),
    array('core/paragraph', array(
        'content' => 'Beschreibung Säule',
        'className' => 'block font-medium md:text-lg md:leading-wider'
    )),
);

?>
<div class="wp-block-teaser-division">
    <div class="wp-block-teaser-division__wrapper">
        <div class="teaser__tab">
            <div class="teaser__tab-text__wraper">
                <div>
                    <span class="teaser__tab-text">Säule <?php echo $divisionNumber; ?></span>
                </div>
            </div>
        </div>
        <div class="wp-block-teaser-division__content__wrapper">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
        </div>
        <div class="wp-block-teaser-division__image__wrapper">
            <img srcset="<?php echo wp_get_attachment_image_srcset($featureImage) ?>" class="wp-block-teaser-division__image" alt="" />
        </div>
    </div>
</div>
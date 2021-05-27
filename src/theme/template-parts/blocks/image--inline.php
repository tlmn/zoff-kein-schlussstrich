<?php

/*
 * Image Inline
 */

$image = get_field('image') ?: 1;

?>

<div class="wp-block-image--inline">
    <img class="wp-block-image--inline__image" srcset="<?php echo wp_get_attachment_image_srcset($image['ID']); ?>" alt="<?php echo $image['alt']; ?>" />
    <span class="wp-block-image--inline__caption">
        <?php echo $image['description']; ?>
    </span>
</div>
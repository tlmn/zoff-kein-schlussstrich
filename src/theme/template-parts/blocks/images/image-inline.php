<?php

/*
 * Image Inline
 */

$image = get_field('image') ?: 1;

?>
<div class="w-full flex flex-col md:py-8">
    <img class="border-0 shadow--bottom-right" srcset="<?php echo wp_get_attachment_image_srcset($image['ID']); ?>" alt="<?php echo $image['alt']; ?>" />
    <span class="mt-6 md:mt-4 text-xs leading-snug"><?php echo $image['description']; ?></span>
</div>
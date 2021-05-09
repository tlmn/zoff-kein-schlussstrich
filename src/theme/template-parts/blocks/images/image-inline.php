<?php

/*
 * Image Inline
 */

$images = get_field('image');

?>
<div class="w-full flex md:py-8">
    <img class="border-0 shadow--bottom-right" srcset="<?php echo wp_get_attachment_image_srcset($image['image']['ID']); ?>" alt="<?php echo array_key_exists('alt', $image['image']) && $image['image']['alt']; ?>" />
    <span class="mt-4 font-sans md:text-xs md:leading-snug"><?php echo array_key_exists('description', $image['image']) && $image['image']['description']; ?></span>
</div>
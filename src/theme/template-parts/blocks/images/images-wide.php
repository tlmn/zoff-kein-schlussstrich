<?php

/*
 * Images Wide
 */

$images = get_field('images');
$count_images = count($images);

?>
<div class="w-full flex justify-center">
    <div class="container grid-6 md:grid-16">
        <?php
        if ($count_images === 1) {
        ?>
            <div class="col-span-full">
                <img srcset="<?php echo wp_get_attachment_image_srcset($images[0]['image']['ID']); ?>" alt="<?php echo array_key_exists('alt', $images[0]['image']) && $images[0]['image']['alt']; ?>" />
            </div>
            <div class="md:col-span-10 md:col-start-4">
                <span class="mt-4 font-sans md:text-xs md:leading-snug"><?php echo array_key_exists('description', $images[0]['image']) && $images[0]['image']['description']; ?></span>
            </div>

        <?php
        } else {
        ?>
            <div class="col-span-full flex py-5">
                <?php
                foreach ($images as $image) {
                ?>
                    <div class="pb-4">
                        <img class="border-0 shadow--bottom-right" srcset="<?php echo wp_get_attachment_image_srcset($image['image']['ID']); ?>" alt="<?php echo array_key_exists('alt', $image['image']) && $image['image']['alt']; ?>" />
                        <span class="mt-4 px-4 font-sans md:text-xs md:leading-snug"><?php echo array_key_exists('description', $image['image']) && $image['image']['description']; ?></span>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>
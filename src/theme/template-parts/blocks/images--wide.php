<?php

/*
 * Images Wide
 */

$images = get_field('images');
$count_images = count($images);

?>

<div class="wp-block-images--wide">
    <div class="wp-block-images--wide__wrapper">
        <?php
        if ($count_images === 1) {
        ?>
            <div class="col-span-full">
                <img srcset="<?php echo wp_get_attachment_image_srcset($images[0]['image']['ID']); ?>" alt="<?php echo $images[0]['image']['alt']; ?>" class="shadow--bottom " />
            </div>
            <div class="col-span-full md:col-span-10 md:col-start-4">
                <span class="px-2 md:px-0 mt-4 font-sans text-xs leading-snug"><?php echo $images[0]['image']['description']; ?></span>
            </div>

        <?php
        } else {
        ?>
            <div class="col-span-full flex flex-col md:flex-row">
                <?php
                foreach ($images as $image) {
                ?>
                    <div class="h-full relative">
                        <img class="border-0 shadow--bottom-right w-full h-full object-cover" srcset="<?php echo wp_get_attachment_image_srcset($image['image']['ID']); ?>" alt="<?php echo $image['image']['alt']; ?>" />
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="col-span-full flex flex-col md:flex-row">
                <?php
                foreach ($images as $image) {
                ?>
                    <span class="flex-1 p-2 is-style-caption"><?php echo $image['image']['description']; ?></span>
                <?php
                }
                ?>
            </div>
    </div>
<?php
        }
?>
</div>
</div>
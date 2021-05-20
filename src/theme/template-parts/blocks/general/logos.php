<?php

/*
 * Logos
 */


$title = get_field("title") ?: "Titel";
$logos = get_field("logos") ?: [];

?>
<div class="w-full">
    <span class="h7">
        <?php echo $title; ?>
    </span>
    <div class="">
        <?php
        foreach ($logos as $logo) {
        ?>
            <img srcset="<?php echo wp_get_attachment_image_srcset($logo['image']['ID']); ?>" />
        <?php
        }
        ?>
    </div>
</div>
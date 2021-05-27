<?php

/*
 * Logos
 */


$title = get_field("title") ?: "Titel";
$logos = get_field("logos") ?: [];

?>

<div class="wp-block-logos">
    <span class="h7 wp-block-logos__title">
        <?php echo $title; ?>
    </span>
    <div class="wp-block-logos__wrapper">
        <?php
        foreach ($logos as $logo) {
        ?>
            <a href="<?php echo $logo['url']; ?>" target="_blank" rel="noreferrer">
                <?php
                echo wp_get_attachment_image($logo['image']['ID'], '', "", ["class" => "wp-block-logos__item"]);
                ?>
            </a>
        <?php
        }
        ?>
    </div>
</div>
<?php

/*
 * Marquee
 */


$text = get_field("text") ?: "Laufband-Text";
$bgColor = get_field("bgColor") ?: "white";

?>
<div class="wp-block-marquee">
    <div class="wp-block-marquee__wrapper bg-<?php echo $bgColor; ?>">
        <span class="wp-block-marquee__text" id="marquee-cities-wrapper">
            <?php echo $text; ?>
        </span>
    </div>
</div>
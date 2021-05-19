<?php

/*
 * Marquee
 */


$text = get_field("text") ?: "Laufband-Text";
$bgColor = get_field("bgColor") ?: "white";

?>
<div class="w-full flex justify-center">
    <div class="container py-7 border-l-2 border-r-2 bg-<?php echo $bgColor; ?> shadow--bottom">
        <span class="w-full h-full block h7 overflow-hidden" id="marquee-cities-wrapper">
            <?php echo $text; ?>
        </span>
    </div>
</div>
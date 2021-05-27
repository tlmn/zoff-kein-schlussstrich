<?php

/*
 * Button Block
 */


$arrowType = get_field("arrowType") ?: 'right';
$buttonColor = get_field("buttonColor") ?: 'black';
$buttonText = get_field("buttonText") ?: 'Buttontext';
$link = get_field("link") ?: '';

if ($is_preview === true) {
?>
    <div class="wp-block-button wp-block-button--<?php echo $buttonColor; ?> <?php if ($arrowType === "left") { ?> flex-row-reverse <?php } ?>" href="<?php echo $link ?>">
    <?php
} else {
    ?>
        <a class="wp-block-button wp-block-button--<?php echo $buttonColor; ?> <?php if ($arrowType === "left") { ?> flex-row-reverse <?php } ?>" href="<?php echo $link ?>">
        <?php
    } ?>
        <div class="wp-block-button__text">
            <?php
            echo $buttonText;
            ?>
        </div>
        <?php
        if ($arrowType !== "none") {
        ?>
            <div class="<?php if ($arrowType === "left") { ?> mr-2 <?php } else { ?>ml-2<?php } ?>">
                <div style="transform: rotate(
            <?php
            if ($arrowType === "left") {
                echo "180deg";
            }

            if ($arrowType === "down") {
                echo "90deg";
            }
            ?>
                                        )">
                    <?php
                    echo file_get_contents(get_template_directory() . '/assets/icons/arrow.svg');
                    ?>
                </div>
            </div>
        <?php
        }
        if ($is_preview === true) {
        ?>
    </div><?php
        } else {
            ?></a><?php
                } ?>
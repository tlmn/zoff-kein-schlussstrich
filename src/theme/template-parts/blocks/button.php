<?php

/*
 * Button Block
 */


$arrowType = get_field("arrowType") ?: 'right';
$buttonColor = get_field("buttonColor") ?: 'black';
$buttonText = get_field("buttonText") ?: 'Buttontext';
$link = get_field("link") ?: '';

?>
<a class="wp-block-button wp-block-button--<?php echo $buttonColor; ?>" href="<?php echo $link ?>">
    <div class="wp-block-button__text">
        <?php
        echo $buttonText;
        ?>
    </div>
    <div class="ml-2">
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
</a>
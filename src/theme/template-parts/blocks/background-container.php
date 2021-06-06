<?php

/*
 * Background Container
 */

$allowed_blocks = array('acf/background-teaser', 'acf/background-readmore');

$template = array(
    array('acf/background-teaser'),
    array('acf/background-readmore')
);

?>

<div>
    <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
</div>
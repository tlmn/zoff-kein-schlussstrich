<?php

/*
 * Background Read More
 */

$allowed_blocks = array('core/paragraph', 'core/heading');

$template = array(
    array('core/paragraph', array(
        'content'   => 'Ausgeklappter Text',
        'className' => 'is-style-text--running'
    ))
);

?>

<div class="container grid-6 md:grid-16 px-2 md:px-0 bg-white <?php if (!$is_preview) { ?>md:border-l-2 md:border-r-2 border-black<?php } ?>">
    <div class="col-span-full md:col-span-11 md:col-start-4">
        <div class="z-50 sticky" style="top: 50px">
            <button type="button" class="wp-block-button bg-white text-black readmore-button" style="transform:translateY(-50%)">
                Mehr lesen
            </button>
        </div>
        <div class="py-5 md:pt-6 md:pb-8" <?php if (!$is_preview) { ?>style="display: none"<?php } ?>>
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
        </div>
    </div>
</div>
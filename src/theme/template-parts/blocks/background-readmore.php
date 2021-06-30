<?php

/*
 * Background Read More
 */

$allowed_blocks = array('core/paragraph', 'core/heading', 'acf/inline-image');

$template = array(
    array('core/paragraph', array(
        'content'   => 'Ausgeklappter Text',
        'className' => 'is-style-text--running'
    ))
);

?>

<div class="container grid-6 md:grid-16 px-2 md:px-0 bg-white md:border-l-2 md:border-r-2 border-black">
    <div class="col-span-full md:col-span-11 md:col-start-4">
        <div class="z-50 sticky" style="top: 50px">
            <button type="button" class="wp-block-button bg-white text-black readmore-button" style="transform:translateY(-50%)">
                Mehr lesen
            </button>
        </div>
        <div class="py-5 md:py-6" style="display: none">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
        </div>
    </div>
</div>
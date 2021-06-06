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

<div class="bg-white">
    <div class="container grid-6 md:grid-16">
        <div class="col-span-full md:col-span-11 md:col-start-4 py-7 md:py-8">
            <InnerBlocks allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
        </div>
    </div>
</div>
<?php

/**
 * Banner Feature Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'feature-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = 'feature';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>
<div class="grid-12">
    <div class="col-span-6">
        <?php
        print(wp_get_attachment_image(get_field('image')['image']['id'], "srcset", '', ["class" => ""])); ?>

    </div>
    <div class="col-span-6">
        <?php
        the_field('title');
        ?>
    </div>
</div>
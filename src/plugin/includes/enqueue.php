<?php
// This file enqueues scripts and styles

defined('ABSPATH') or die('Direct script access disallowed.');

add_action('init', function () {

    add_filter('script_loader_tag', function ($tag, $handle) {
        if (!preg_match('/^ks-/', $handle)) {
            return $tag;
        }
        return str_replace(' src', ' async defer src', $tag);
    }, 10, 2);

    add_action('wp_enqueue_scripts', function () {

        $asset_manifest = json_decode(file_get_contents(KSCAL_ASSET_MANIFEST), true)['files'];

        if (isset($asset_manifest['main.css'])) {
            wp_enqueue_style('ks', KSCAL_WIDGET_URL . "/build" . $asset_manifest['main.css']);
        }

        wp_enqueue_script('ks-runtime', KSCAL_WIDGET_URL . "/build" . $asset_manifest['runtime-main.js'], array(), null, true);

        wp_enqueue_script('ks-main', KSCAL_WIDGET_URL . "/build" . $asset_manifest['main.js'], array('ks-runtime'), null, true);

        foreach ($asset_manifest as $key => $value) {
            if (preg_match('@static/js/(.*)\.chunk\.js@', $key, $matches)) {
                if ($matches && is_array($matches) && count($matches) === 2) {
                    $name = "ks-" . preg_replace('/[^A-Za-z0-9_]/', '-', $matches[1]);
                    wp_enqueue_script($name, KSCAL_WIDGET_URL . "/build" . $value, array('ks-main'), null, true);
                }
            }

            if (preg_match('@static/css/(.*)\.chunk\.css@', $key, $matches)) {
                if ($matches && is_array($matches) && count($matches) == 2) {
                    $name = "ks-" . preg_replace('/[^A-Za-z0-9_]/', '-', $matches[1]);
                    wp_enqueue_style($name, KSCAL_WIDGET_URL . "/build/" . $value, array('ks'), null);
                }
            }
        }
    });
});

<?php

/**
 * @wordpress-plugin
 * Plugin Name: React calendar for Kein Schlussstrich Festival
 */

defined('ABSPATH') or die('Direct script access disallowed.');

define('KSCAL_WIDGET_PATH', plugin_dir_path(__FILE__) . 'widget');
define('KSCAL_WIDGET_URL', plugin_dir_url(__FILE__) . 'widget');
define('KSCAL_ASSET_MANIFEST', KSCAL_WIDGET_PATH . '/build/asset-manifest.json');
define('KSCAL_INCLUDES', plugin_dir_path(__FILE__) . '/includes');

require_once(KSCAL_INCLUDES . '/enqueue.php');
require_once(KSCAL_INCLUDES . '/shortcode.php');

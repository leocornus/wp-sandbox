<?php
/**
 * Plugin Name: WordPress Sandbox
 * Plugin URI: http://github.com/leocornus/wp-sandbox
 * Description: A playgroud to explore and learn WordPress!
 * Veraion: 0.1
 * Author: Sean Chen <sean.chen@leocorn.com>
 */

// if the file is called directly, abort!
if(!defined('WPINC')) {
    die;
}

$the_plugin_file = __FILE__;
// define some constants, make sure your constants name are unique.
define('WPBOX_PLUGIN_FILE', $the_plugin_file);
define('WPBOX_PLUGIN_PATH', 
       WP_PLUGIN_DIR . '/' . basename(dirname($the_plugin_file)));

// load the web components, include js, css, fonts, etc.
require_once(WPBOX_PLUGIN_PATH . '/admin/index.php');

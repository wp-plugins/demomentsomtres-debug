<?php

/*
 Plugin Name: DeMomentSomTres Debug
 Plugin URI: http://demomentsomtres.com/english/wordpress-plugins/demomentsomtres-debug/
 Description: Adds On Screen Debug Messages
 Version: 1.0
 Author: marcqueralt
 Author URI: http://demomentsomtres.com
 License: GPLv2 or later
 */

define(DMS3_DEBUG_TEXT_DOMAIN, 'DMS3-debug');

$dms3Debug = new DeMomentSomTres_Debug();

class DeMomentSomTres_Debug {

    const TEXT_DOMAIN = DMS3_DEBUG_TEXT_DOMAIN;
    const MENU_SLUG = 'dmst_debug';
    const OPTIONS = 'dmst_debug_options';

    private $pluginURL;
    private $pluginPath;
    private $langDir;

    function __construct() {
        $this -> pluginURL = plugin_dir_url(__FILE__);
        $this -> pluginPath = plugin_dir_path(__FILE__);
        $this -> langDir = dirname(plugin_basename(__FILE__)) . '/languages';

        add_action('plugins_loaded', array(&$this, 'plugin_init'));
    }

    function plugin_init() {
        load_plugin_textdomain(DMS3_DEBUG_TEXT_DOMAIN, false, $this -> langDir);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('log_errors', 1);
        ini_set('error_log', WP_CONTENT_DIR . '/debug.log');
    }

}

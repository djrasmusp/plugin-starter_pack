<?php

/**
 * Plugin Name: Plugin - Starter Pack
 * Version: 0.0.1
 * Plugin URI: https://rasmusp.com
 * Description: Plugin Starter Pack
 * Author: Rasmus P
 * Author URI: https://rasmusp.com
 * Requires at least: 5.0
 * Tested up to: 5.5.1
 * License: GLPv2 or later
 * Text-domain: plugin-starter_pack
 */

defined( 'ABSPATH' ) or exit();
define('PLUGIN_FILE_NAME', basename(plugin_basename(__FILE__)));

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require 'vendor/autoload.php';
}

use AVEO_StarterPack\Base\Install;

register_activation_hook( __FILE__, function () {
	Install::activate();
} );

register_deactivation_hook( __FILE__, function () {
	Install::deactivate();
} );

if ( class_exists( 'PLUGIN_StarterPack\\Init' ) ) {
    PLUGIN_StarterPack\Init::register_services();
}

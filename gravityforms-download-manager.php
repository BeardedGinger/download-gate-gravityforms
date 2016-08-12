<?php
/**
 * Plugin Name:     Download Manager for Gravity Forms
 * Plugin URI:      http://limecuda.com
 * Description:     Works with Gravity Forms plugin to allow visitors to download files after submitting a gravity form
 * Version:         0.1.0
 * Author:          Josh Mallard
 * Author URI:      http://limecuda.com
 * License:         GPL-2.0+
 * Text Domain:     lc-gravityforms-download-manager
 */

// if this file is called directly, abort.
if( ! defined( 'WPINC' ) ) {
  die;
}

/**
 * Get the main class for the plugin. Where everything is pulled together for
 * global and front-end elements of the plugin
 */
require plugin_dir_path( __FILE__ ) . 'includes/Main.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gravityforms_download_manager() {

  // Don't do anything if Gravity Forms isn't activated
  if( ! class_exists( 'GFForms' ) )
    return;

	$plugin = new LC_Gforms_Download_Manager\Main();
	$plugin->run();

}

run_gravityforms_download_manager();

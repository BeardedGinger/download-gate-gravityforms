<?php
/**
 * Plugin Name:     Download Manager for Gravity Forms
 * Plugin URI:      http://limecuda.com
 * Description:     Works with Gravity Forms plugin to allow visitors to download files after submitting a gravity form
 * Version:         0.1.0
 * Author:          Josh Mallard
 * Author URI:      http://limecuda.com
 * License:         GPL-2.0+
 * Text Domain:     lc-gforms_dm
 */

// if this file is called directly, abort.
if( ! defined( 'WPINC' ) ) {
  die;
}

add_action( 'gform_loaded', 'lc_gforms_dm_register_gform_addon' );
/**
 * Get the Gravity Forms AddOn stuff going
 *
 * @since    0.1.0
 */
function lc_gforms_dm_register_gform_addon() {

 if ( ! method_exists( 'GFForms', 'include_addon_framework' ) )
   return;

 GFAddOn::register( '\LC_Gforms_Download_Manager\GF_AddOn\AddOn' );

}

/**
 * Putting this here for now to be able to access it more easily
 * throughout the plugin
 *
 * @since     0.1.0
 */
function lc_gforms_dm_form_id() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/GForm_AddOn.php';
  return \LC_Gforms_Download_Manager\GF_AddOn\AddOn::get_instance()->get_plugin_setting( 'lc_gforms_dm_settings_download_form' );
}

/**
 * Get the main class for the plugin. Where everything is pulled together for
 * global and front-end elements of the plugin
 */
require plugin_dir_path( __FILE__ ) . 'includes/Main.php';

/**
 * Begins execution of the plugin.
 *
 * @since    0.1.0
 */
function run_gravityforms_download_manager() {

  // Don't do anything if Gravity Forms isn't activated
  if( ! class_exists( 'GFForms' ) )
    return;

	$plugin = new LC_Gforms_Download_Manager\Main();
	$plugin->run();

}

run_gravityforms_download_manager();

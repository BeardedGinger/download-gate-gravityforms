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

add_filter( 'gform_pre_render_1', 'download_id_insert' );
/**
 * Insert the ID for the current download page as a hidden field into our form
 */
function download_id_insert( $form ) {

  $properties = array(
    'type' => 'hidden',
    'defaultValue' => 'my-hidden-field'
  );

  $hidden_field = GF_Fields::create( $properties );
  $form['fields'][] = $hidden_field;

  return $form;
}

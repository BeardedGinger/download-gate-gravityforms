<?php
/**
 * The main file for the plugin, including all hooks and filters
 *
 * @since       0.1.0
 * @package     gravityforms-download-manager
 * @subpackage  gravityforms-download-manager/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Manager\Admin;

class Admin {

  /**
   * Pulls everything together for the admin class here
   * and used to instantiate the class for the plugin
   *
   * @since     0.1.0
   */
  public function run() {

    $this->get_files();

    $this->setup_hooks();
    $this->setup_filters();

  }

  /**
   * Setup all the admin action hooks used for the plugin
   *
   * @since     0.1.0
   */
  public function setup_hooks() {

  }

  /**
   * Setup all the admin filter hooks used for this plugin
   *
   * @since     0.1.0
   */
  public function setup_filters() {

    add_filter( 'gform_entry_detail_meta_boxes', array( Entry_Details\Entry_Details::instance(), 'download_information_metabox' ), 10, 3 );

  }

  /**
   * Get all the necessary admin files
   *
   * @since     0.1.0
   */
  public function get_files() {

    require plugin_dir_path( __FILE__ ) . 'Entry_Details.php';

  }

}

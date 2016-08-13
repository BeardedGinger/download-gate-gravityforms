<?php
/**
 * The main file for the plugin, including all hooks and filters
 *
 * @since       0.1.0
 * @package     gravityforms-download-manager
 * @subpackage  gravityforms-download-manager/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Manager;

class Main {

  protected $version = '0.1.0';

  protected $text_domain = 'lc-gravityforms-download-manager';

  /**
   * Pulls everything together for the main class here
   * and used to instantiate the class for the plugin
   *
   * @since     0.1.0
   */
  public function run() {

    $this->get_files();

    CPT\CPT::instance()->register_cpt();

    $this->setup_hooks();
    $this->setup_filters();

  }

  /**
   * Setup all the front-end action hooks used for the plugin
   *
   * @since     0.1.0
   */
  public function setup_hooks() {

    add_action( 'gform_after_submission_1', array( Modify_Form\Modify_Form::instance(), 'save_added_fields' ) );
    add_action( 'cmb2_admin_init', array( Upload_Field\Upload_Field::instance(), 'upload_field' ) );

  }

  /**
   * Setup all the front-end filter hooks used for this plugin
   *
   * @since     0.1.0
   */
  public function setup_filters() {

    // uncomment to have form variable dumped for testing
    //add_filter( 'gform_pre_render_1', function( $form ) { var_dump( $form['fields'] ); } );

    add_filter( 'gform_pre_render_1', array( Modify_Form\Modify_Form::instance(), 'download_id_insert' ) );
    add_filter( 'gform_pre_render_1', array( Modify_Form\Modify_Form::instance(), 'download_title_insert' ) );

    add_filter( 'the_content', array( Download_Single\Download_Single::instance(), 'append_form' ) );

  }

  /**
   * Get all the necessary global and front-end files
   *
   * @since     0.1.0
   */
  public function get_files() {

    require plugin_dir_path( __FILE__ ) . '../resources/CMB2/init.php';

    require plugin_dir_path( __FILE__ ) . 'Modify_Form.php';
    require plugin_dir_path( __FILE__ ) . 'CPT.php';
    require plugin_dir_path( __FILE__ ) . 'Upload_Field.php';
    require plugin_dir_path( __FILE__ ) . 'Download_Single.php';

  }

}

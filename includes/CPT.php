<?php
/**
 * The CPT to manage our downloads
 *
 * @since       0.1.0
 * @package     gravityforms-download-manager
 * @subpackage  gravityforms-download-manager/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Manager\CPT;

class CPT {

  /**
   * Instance of this class
   *
   * @since     0.1.0
   */
  protected static $instance;

  /**
   * Used for getting an instance of this class
   *
   * @since     0.1.0
   */
  public static function instance() {

    if ( empty( self::$instance ) ) {
      self::$instance = new self();
    }

    return self::$instance;

  }

  /**
   * Register our CPT
   *
   * @uses     register_via_cpt_core()
   * @since    0.1.0
   */
  public function register_cpt() {

    $this->get_cpt_core_class();

    register_via_cpt_core(
      $this->cpt_name(),
      $this->cpt_args()
    );

  }

  /**
   * CPT name array
   *
   * @return    array()
   * @since     0.1.0
   */
  public function cpt_name() {

    $args = array(
      __( 'Download', 'lc-gform_dm' ),
      __( 'Downloads', 'lc-gform_dm' ),
      'lc-gform-downloads'
    );

    return apply_filters( 'lc_gforms_dm_cpt_name', $args );

  }

  /**
   * CPT args array
   *
   * @return    array()
   * @since     0.1.0
   */
  public function cpt_args() {

    $args = array(
      'menu_icon'           => 'dashicons-download',
      'publicly_queryable' 	=> true,
      'rewrite'             => array( 'slug' => 'download' ),
      'hierarchical'        => false,
      'supports'            => array( 'title', 'editor', 'revisions', 'thumbnail' )
    );

    return apply_filters( 'lc_gforms_dm_cpt_args', $args );

  }

  /**
   * Get the CPT Core class created by WebDev Studios
   *
   * @since     0.1.0
   */
  public function get_cpt_core_class() {

    require plugin_dir_path( __FILE__ ) . '../resources/CPT_Core.php';

  }

}

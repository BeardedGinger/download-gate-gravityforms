<?php
/**
 * Update the entry details for the form submissions to
 * include the additional meta about the download driving the entry
 *
 * @since       0.1.0
 * @package     gravityforms-download-manager
 * @subpackage  gravityforms-download-manager/apache_child_terminate
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Manager\Admin\Entry_Details;

class Entry_Details {

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
   * The metabox to show the associated download information
   * for the entry
   *
   * @since     0.1.0
   */
  public function download_information_metabox( $meta_boxes, $entry, $form ) {

    $download_id_field_id = apply_filters( 'lc_gforms_dm_inserted_id_field_id', 101 );
    $download_title_field_id = apply_filters( 'lc_gforms_dm_inserted_title_field_id', 102 );

    if( array_key_exists( $download_id_field_id, $entry ) && array_key_exists( $download_title_field_id, $entry ) ) {
      $meta_boxes['lc_gforms_dm_details'] = array(
        'title'    => __( 'Download Information', 'lc_gforms_dm' ),
        'callback' => array( $this, 'download_metabox_callback' ),
        'context'  => 'side',
        'priority' => 'high'
      );
    }

    return $meta_boxes;

  }

  /**
   * The download information to go into our entry detal metabox
   *
   * @since     0.1.0
   */
  public function download_metabox_callback( $args, $metabox ) {

    $download_id_field_id = apply_filters( 'lc_gforms_dm_inserted_id_field_id', 101 );
    $download_title_field_id = apply_filters( 'lc_gforms_dm_inserted_title_field_id', 102 );

    echo '<strong>Associated Download</strong><br>';
    echo '<a target="_blank" href="' . get_permalink( $args['entry'][$download_id_field_id] ) . '">' . esc_attr( urldecode( $args['entry'][$download_title_field_id] ) ) . '</a>';

  }

}

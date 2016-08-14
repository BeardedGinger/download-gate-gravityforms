<?php
/**
 * Update the confirmation of our download form to include the download link
 *
 * @since       0.1.0
 * @package     gravityforms-download-manager
 * @subpackage  gravityforms-download-manager/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Manager\Confirmation;

class Confirmation {

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
   * Append the download button to the form confirmation
   *
   * @since     0.1.0
   */
  public function confirmation_download( $confirmation, $form, $entry, $ajax ) {

    ob_start();

    $download_file = get_post_meta( get_the_ID(), 'lc_gform_dm_upload_file', true );

    echo $confirmation;
    echo '<a href="' . $download_file . '" class="button lc-gforms-dm-button"><i class="fa fa-download"></i> Download ' . get_the_title() . '</a>';

    return ob_get_clean();

  }

}

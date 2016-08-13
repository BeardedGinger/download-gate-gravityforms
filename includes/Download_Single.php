<?php
/**
 * Add the selected form to the front-end downloads template
 *
 * @since       0.1.0
 * @package     gravityforms-download-manager
 * @subpackage  gravityforms-download-manager/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Manager\Download_Single;

class Download_Single {

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
   * Append the selected form for accessing downloads
   * to the content of our download posts
   *
   * @since     0.1.0
   */
  public function append_form( $content ) {

    global $post;

    if( $post->post_type == 'lc-gform-downloads' ) {
      $content .= '[gravityform id="1"]';
    }

    return $content;

  }

}

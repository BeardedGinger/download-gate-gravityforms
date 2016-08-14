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
   * The metabox to show the associated download information
   * for the entry
   *
   * @since     0.1.0
   */
  public function download_information_metabox( $meta_boxes, $entry, $form ) {

    var_dump( $entry );

    return $meta_boxes;
    
  }

}

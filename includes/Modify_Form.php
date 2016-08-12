<?php
/**
 * Modify the selected form for the download page to include the
 * needed hidden fields so users don't have to manually add this to
 * their form
 *
 * @since       0.1.0
 * @package     gravityforms-download-manager
 * @subpackage  gravityforms-download-manager/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Manager\Modify_Form;

class Modify_Form {

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
   * Insert the ID for the current download page as a hidden field
   * into our selected form
   *
   * @since     0.1.0
   */
  public function download_id_insert( $form ) {

    $properties = array(
      'type'          => 'hidden',
      'defaultValue'  => $this->get_download_page_id(),
      'id'        => apply_filters( 'lc_gforms_dm_inserted_id_field_id', 101 )
    );

    $hidden_field = \GF_Fields::create( $properties );
    $form['fields'][] = $hidden_field;

    return $form;

  }

  /**
   * Insert the title for the current download page as a hidden field
   * into our selected form
   *
   * @since     0.1.0
   */
  public function download_title_insert( $form ) {

    $properties = array(
      'type'          => 'hidden',
      'defaultValue'  => $this->get_download_page_title(),
      'id'            => apply_filters( 'lc_gforms_dm_inserted_title_field_id', 102 )
    );

    $hidden_field = \GF_Fields::create( $properties );
    $form['fields'][] = $hidden_field;

    return $form;

  }

  /**
   * Get the ID for the current page where the form
   * is being displayed
   *
   * @since     0.1.0
   */
  public function get_download_page_id() {

    global $post;
    return $post->ID;

  }

  /**
   * Get the page title for the current page where the form
   * is being displayed
   *
   * @since     0.1.0
   */
  public function get_download_page_title() {

    $download_page_id = $this->get_download_page_id();
    $download_page_title = urlencode( get_the_title( $download_page_id ) );

    return apply_filters( 'lc_gforms_dm_inserted_page_title', $download_page_title );

  }

}

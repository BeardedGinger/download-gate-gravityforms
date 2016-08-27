<?php
/**
 * Adds the "Upload Field" to the Downloads CPT for users to
 * upload the file available for download uses the CMB2 library by WebDev Studios
 *
 * @link        https://github.com/WebDevStudios/CMB2
 * @since       0.1.0
 * @package     gravityforms-download-manager
 * @subpackage  gravityforms-download-manager/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Manager\Upload_Field;

class Upload_Field {

	/**
	 * Instance of this class
	 *
	 * @since     0.1.0
	 * @var       $instance
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
	 * Register the upload field for our downloads post type
	 *
	 * @since     0.1.0
	 */
	public function upload_field() {

		$this->create_upload_metabox();
		$this->create_upload_field();

	}

	/**
	 * Create the metabox to contain the upload field
	 *
	 * @since     0.1.0
	 */
	public function create_upload_metabox() {

		$upload_metabox = new_cmb2_box( array(
			'id'            => 'lc_gform_dm_upload_file_metabox',
			'title'         => __( 'Downloadable File', 'lc-gform_dm' ),
			'object_types'  => array( 'lc-gform-downloads' ),
			'context'    => 'normal',
			'priority'   => 'high',
		) );

		return apply_filters( 'lc_gform_dm_upload_file_metabox', $upload_metabox );

	}

	/**
	 * Add the upload field to our metabox
	 *
	 * @since     0.1.0
	 */
	public function create_upload_field() {

		$this->create_upload_metabox()->add_field( array(
			'name' => __( 'File', 'lc-gform_dm' ),
			'desc' => __( 'Upload the file that will be available for download once the user completes your selected form', 'lc-gform_dm' ),
			'id'   => 'lc_gform_dm_upload_file',
			'type' => 'file',
		) );

	}
}

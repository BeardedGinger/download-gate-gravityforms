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
	 * Append the download button to the form confirmation
	 *
	 * @since     0.1.0
	 * @param     string|array $confirmation    The current confirmation text.
	 * @param     object       $form            The current Form object.
	 * @param     object       $entry           The current Entry object.
	 * @param     bool         $ajax            Whether this form is set to be submitted via AJAX.
	 * @return    string|array
	 */
	public function confirmation_download( $confirmation, $form, $entry, $ajax ) {

		ob_start();

		$download_file = get_post_meta( get_the_ID(), 'lc_gform_dm_upload_file', true );

		echo esc_html( $confirmation );
		echo '<a href="' . esc_url( $download_file ) . '" class="button lc-gforms-dm-button"><i class="fa fa-download"></i> Download ' . get_the_title() . '</a>';

		return ob_get_clean();

	}
}

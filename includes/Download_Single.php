<?php
/**
 * Add the selected form to the front-end downloads template
 *
 * @since       0.1.0
 * @package     download-gate-gravityforms
 * @subpackage  download-gate-gravityforms/includes
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Gate\Download_Single;

class Download_Single {

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
	 * Append the selected form for accessing downloads
 	 * to the content of our download posts
	 *
	 * @since     0.1.0
	 * @uses      lc_gforms_dm_form_id()
	 * @param     string $content     The post content.
	 */
	public function append_form( $content ) {

		global $post;

		if ( 'lc-gform-downloads' === $post->post_type ) {
			$content .= '[gravityform id="' . lc_gforms_dm_form_id() . '"]';
		}

		return $content;

	}
}

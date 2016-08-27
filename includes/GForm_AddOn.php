<?php
/**
 * The AddOn feature for working with Gravity Forms
 *
 * @since       0.1.0
 * @package     download-gate-gravityforms
 * @subpackage  download-gate-gravityforms/admin
 * @author      Josh Mallard <josh@limecuda.com>
 */

namespace LC_Gforms_Download_Gate\GF_AddOn;

\GFForms::include_addon_framework();

class AddOn extends \GFAddOn {

	protected $_version = '0.1.0';
	protected $_min_gravityforms_version = '1.9';
	protected $_slug = 'gravityforms-download-manager';
	protected $_path = 'gravityforms-download-manager/includes/GForm_AddOn.php';
	protected $_full_path = __FILE__;
	protected $_title = 'Download Manager for Gravity Forms';
	protected $_short_title = 'Downloads';

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
	public static function get_instance() {

		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;

	}

	/**
	 * Add a settings page for our plugin
	 *
	 * @since     0.1.0
	 */
	public function plugin_settings_fields() {

		$settings = array(
			array(
				'title'  => esc_html__( 'Download Manager Settings', 'lc-gforms_dm' ),
				'fields' => array(
					array(
						'name'              => 'lc_gforms_dm_settings_download_form',
						'tooltip'           => esc_html__( 'The form a visitor will need to complete prior to accessing each downloadable file', 'lc-gforms_dm' ),
						'label'             => esc_html__( 'Download Access Form', 'lc-gforms_dm' ),
						'type'              => 'select',
						'choices'           => $this->forms_select_choices(),
						'feedback_callback' => array( $this, 'is_valid_setting' ),
					),
				),
			),
		);

		return apply_filters( 'lc_gforms_dm_settings', $settings );

	}

	/**
	 * Get all our Gravity Forms available and set an array of choices
	 * for our select settings field
	 *
	 * @since     0.1.0
	 */
	public function forms_select_choices() {

		$forms = \GFAPI::get_forms();
		$form_choices = array();
		$count = 0;

		foreach ( $forms as $form ) {
			$form_choices[ $count ]['label'] = $form['title'];
			$form_choices[ $count ]['value'] = $form['id'];
			$count++;
		}

		return apply_filters( 'lc_gforms_dm_form_choices_array', $form_choices );

	}
}

<?php
/**
 * This customizer plugin branch of Kirki Customizer Plugin.
 * https://github.com/aristath/kirki
 *
 * @author GosoDesign
 * @since 1.0.0
 * @package authow
 */

namespace AuthowFW\Customizer;

use AuthowFW\Customizer\Partial\Lazy_Partial;
use AuthowFW\Customizer\Setting\Default_Setting;
use AuthowFW\Util\Sanitize;

/**
 * Class Customizer
 *
 * @package AuthowFW
 */
class Customizer {

	/**
	 * Customizer
	 *
	 * @var Customizer Customizer Instance
	 */
	private static $instance;
	/**
	 * Endpoint used for ajax request
	 *
	 * @var string
	 */
	public $endpoint = 'customizer';
	/**
	 * An array containing all panels.
	 *
	 * @access private
	 * @var array
	 */
	private $panels = array();
	/**
	 * An array containing all sections.
	 *
	 * @access private
	 * @var array
	 */
	private $sections = array();
	/**
	 * An array containing all fields.
	 *
	 * @access private
	 * @var array
	 */
	private $fields = array();
	/**
	 * Cached Array for faster access
	 *
	 * @var array
	 */
	private $cache_fields = array();
	/**
	 * An array containing partial refresh
	 *
	 * @access private
	 * @var array
	 */
	private $partial_refresh = array();
	/**
	 * Version of Customizer
	 *
	 * @var string
	 */
	private $version;

	/**
	 * Init constructor.
	 */
	private function __construct() {
		$this->set_version();

		add_action( 'customize_register', array( $this, 'register_control_types' ) );
		add_action( 'customize_register', array( $this, 'register_section_types' ) );
		add_action( 'customize_register', array( $this, 'deploy_panels' ), 97 );
		add_action( 'customize_register', array( $this, 'deploy_sections' ), 98 );
		add_action( 'customize_register', array( $this, 'deploy_fields' ), 96 );
		add_action( 'customize_register', array( $this, 'register_customizer' ) );
		add_action( 'customize_register', array( $this, 'move_settings' ), 30 );
		add_action( 'customize_preview_init', array( $this, 'preview_init' ), 99 );
		add_action( 'customize_controls_print_styles', array( $this, 'customizer_styles' ), 99 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'register_scripts' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_script' ), 11 );
		add_action( 'customize_controls_print_styles', array(
			$this,
			'gosodesign_customizer_devices_preview_width'
		) );

		// Partial Refresh.
		add_filter( 'customize_partial_render', array( $this, 'partial_render' ), null, 3 );
		add_filter( 'customize_dynamic_partial_args', array( $this, 'filter_dynamic_partial_args' ), 10, 2 );
		add_filter( 'customize_dynamic_partial_class', array( $this, 'filter_dynamic_partial_class' ), 10, 2 );

		// Handle dynamic setting save.
		add_filter( 'customize_dynamic_setting_args', array( $this, 'filter_dynamic_setting_args' ), 10, 2 );
		add_filter( 'customize_dynamic_setting_class', array( $this, 'filter_dynamic_setting_class' ), 10, 2 );
		add_action( 'parse_request', array( $this, 'ajax_parse_request' ) );

		// Javascript Template.
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'search_template' ) );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'widget_template' ) );
	}

	/**
	 * Get theme version if using themes
	 */
	public function set_version() {
		$this->version = PENCI_SOLEDAD_VERSION;
	}

	/**
	 * Get Instance of Customizer
	 *
	 * @return Customizer
	 */
	public static function get_instance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Handle ajax request for retrieving lazy section
	 *
	 * @param \WP $wp Handle request.
	 */
	public function ajax_parse_request( $wp ) {
		$nonce   = isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], $this->endpoint );
		$section = isset( $_REQUEST['sections'] ) && $_REQUEST['sections'] ? $_REQUEST['sections'] : '';
		$search  = isset( $_REQUEST['search'] ) && $_REQUEST['search'] ? $_REQUEST['search'] : '';
		if ( $nonce ) {
			add_filter( 'wp_doing_ajax', '__return_true' );
			if ( $section ) {
				$this->get_lazy_section_control( $section );
			}
			if ( $search ) {
				$this->get_search_result( $search );
			}
		}

		return $wp;
	}

	/**
	 * Get lazy section control control
	 *
	 * @param array $sections array of sections.
	 */
	public function get_lazy_section_control( $sections ) {
		$results = array();

		foreach ( $sections as $section_id ) {
			$section = $this->get_lazy_section_files( $section_id );

			if ( ! empty( $section ) ) {
				$results[ $section_id ] = $this->compose_lazy_fields( $section, $section_id );
			}
		}

		wp_send_json_success( $results );
	}

	/**
	 * Get file location for lazy section
	 *
	 * @param string $id ID of lazy section to be searched.
	 *
	 * @return mixed
	 */
	public function get_lazy_section_files( $id ) {
		$sections = $this->get_registered_lazy_section();

		if ( isset( $sections[ $id ] ) ) {
			return $sections[ $id ];
		}

		return array();
	}

	/**
	 * Get all registered section and their respective file
	 *
	 * @return mixed
	 */
	public function get_registered_lazy_section() {
		return apply_filters( 'authow_fw_register_lazy_section', array() );
	}

	/**
	 * Preparing lazy fields
	 *
	 * @param array $section Array of section.
	 * @param string $section_id Name of section.
	 *
	 * @return array
	 */
	public function compose_lazy_fields( $section, $section_id ) {
		$this->wp_customize();
		$results = array();

		foreach ( $section as $file ) {
			$options = $this->get_lazy_options( $file );

			foreach ( $options as $option ) {
				$results[ $option['id'] ] = $this->compose_lazy_option( $option, $section_id );
			}
		}

		return $results;
	}

	/**
	 * Get WP Customize Instance. if its empty then we need to create one
	 *
	 * @return \WP_Customize_Manager
	 */
	public function wp_customize() {
		global $wp_customize;

		if ( empty( $wp_customize ) || ! ( $wp_customize instanceof \WP_Customize_Manager ) ) {
			require_once ABSPATH . WPINC . '/class-wp-customize-manager.php';
			$wp_customize = new \WP_Customize_Manager();
		}

		return $wp_customize;
	}

	/**
	 * Get all option
	 *
	 * @param array|callable $file Callback or path to option.
	 *
	 * @return array|mixed
	 */
	public function get_lazy_options( $file ) {
		$options = array();

		if ( is_array( $file ) ) {
			$options = call_user_func_array( $file['function'], $file['parameter'] );
		} elseif ( file_exists( $file ) ) {
			$options = include $file;
		}

		return apply_filters( 'authow_fw_customizer_get_lazy_options', $options );
	}

	/**
	 * Prepare lazy option to fit with customizer setting
	 *
	 * @param array $option Raw option.
	 * @param string $section_id Name of section.
	 *
	 * @return array
	 */
	public function compose_lazy_option( $option, $section_id ) {
		$result = array();

		// force assign section & dynamic control.
		$option['section'] = $section_id;
		$option['dynamic'] = true;
		$field             = $this->filter_field( $option, true );

		// Assign Setting ID.
		$setting_id          = Default_Setting::create_lazy_setting( $section_id, $option['id'] );
		$result['settingId'] = $setting_id;

		// assign setting json.
		$setting           = $field['setting'];
		$setting_instance  = $this->do_add_setting( $setting, $setting_id );
		$result['setting'] = $setting_instance->json();

		// assign control json.
		$control           = $field['control'];
		$control_instance  = $this->do_add_control( $control, $setting_instance );
		$result['control'] = $control_instance->json();

		return $result;
	}

	/**
	 * Create Customizer setting, control, and partial refresh
	 *
	 * @param array $field Unfiltered control.
	 * @param boolean $dynamic flag for dynamic control.
	 *
	 * @return array
	 */
	public function filter_field( $field, $dynamic = false ) {
		$setting = $this->compose_setting( $field );
		$control = $this->compose_control( $field, $dynamic );
		$partial = $this->setup_partial_refresh( $field );

		// Hack transport to have postMessage.
		if ( ! empty( $partial ) ) {
			$setting['transport'] = 'postMessage';
		}

		return [
			'setting' => $setting,
			'control' => $control,
		];
	}

	/**
	 * Prepare single setting
	 *
	 * @param array $field Unfiltered setting.
	 *
	 * @return array
	 */
	public function compose_setting( $field ) {
		$setting = array();

		$setting['id']           = $field['id'];
		$setting['type']         = isset( $field['option_type'] ) ? $field['option_type'] : 'theme_mod';
		$setting['default']      = isset( $field['default'] ) ? $field['default'] : '';
		$setting['transport']    = isset( $field['transport'] ) ? $field['transport'] : 'refresh';
		$setting['sanitize']     = isset( $field['sanitize'] ) ? $field['sanitize'] : $this->sanitize_handler( $field['type'] );
		$setting['control_type'] = $field['type'];
		$setting['settings']     = isset( $field['settings'] ) ? $field['settings'] : '';

		return $setting;
	}

	/**
	 * Handle input sanitize for every type
	 *
	 * @param string $type Type of control and what kind sanitized to be used.
	 *
	 * @return array|string
	 */
	public function sanitize_handler( $type ) {
		$sanitize_class = Sanitize::get_instance();

		switch ( $type ) {
			case 'checkbox':
			case 'authow-fw-toggle':
				$sanitize = array( $sanitize_class, 'sanitize_checkbox' );
				break;
			case 'image':
			case 'upload':
				$sanitize = array( $sanitize_class, 'sanitize_url' );
				break;
			case 'authow-fw-typography':
				$sanitize = array( $sanitize_class, 'sanitize_typography' );
				break;
			case 'authow-fw-number':
			case 'authow-fw-slider':
				$sanitize = array( $sanitize_class, 'sanitize_number' );
				break;
			case 'repeater':
			case 'authow-fw-repeater':
				$sanitize = array( $sanitize_class, 'by_pass' );
				break;
			default:
				$sanitize = array( $sanitize_class, 'sanitize_input' );
				break;
		}

		return $sanitize;
	}

	/**
	 * Prepare single control
	 *
	 * @param array $field Unfiltered control.
	 * @param boolean $dynamic flag for dynamic control.
	 *
	 * @return array
	 */
	public function compose_control( $field, $dynamic ) {
		$control               = array();
		$active_callback_class = Active_Callback::get_instance();

		$control['id']            = $field['id'];
		$control['type']          = $field['type'];
		$control['label']         = $field['label'];
		$control['section']       = isset( $field['section'] ) ? $field['section'] : '';
		$control['description']   = isset( $field['description'] ) ? $field['description'] : '';
		$control['multiple']      = isset( $field['multiple'] ) ? $field['multiple'] : 0;
		$control['default']       = isset( $field['default'] ) ? $field['default'] : 0;
		$control['choices']       = isset( $field['choices'] ) ? $field['choices'] : array();
		$control['fields']        = isset( $field['fields'] ) ? $field['fields'] : array();
		$control['row_label']     = isset( $field['row_label'] ) ? $field['row_label'] : esc_html__( 'Row', 'authow' );
		$control['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : array();
		$control['ajax_action']   = isset( $field['ajax_action'] ) ? $field['ajax_action'] : '';
		$control['data_type']     = isset( $field['data_type'] ) ? $field['data_type'] : '';
		$control['nonce']         = isset( $field['nonce'] ) ? $field['nonce'] : '';
		$control['callback']      = isset( $field['callback'] ) ? $field['callback'] : '';
		$control['input_attrs']   = isset( $field['input_attrs'] ) ? $field['input_attrs'] : '';

		// additional control option.
		$control['partial_refresh'] = isset( $field['partial_refresh'] ) ? $field['partial_refresh'] : null;
		$control['active_rule']     = isset( $field['active_callback'] ) ? $field['active_callback'] : null;
		$control['output']          = isset( $field['output'] ) ? $field['output'] : null;
		$control['postvar']         = isset( $field['postvar'] ) ? $field['postvar'] : [];
		$control['dynamic']         = isset( $field['dynamic'] ) ? $field['dynamic'] : false;
		$control['settings']        = isset( $field['settings'] ) ? $field['settings'] : '';
		$control['ids']             = isset( $field['ids'] ) ? $field['ids'] : '';

		// only load active callback on normal field.
		if ( ! $dynamic ) {
			$control['active_callback'] = isset( $field['active_callback'] ) ? function () use ( $field, $active_callback_class ) {
				return $active_callback_class->evaluate( $field['active_callback'] );
			} : '__return_true';
		}

		return $control;
	}

	/**
	 * Prepare partial refresh
	 *
	 * @param array $field Partial refresh field.
	 *
	 * @return array
	 */
	public function setup_partial_refresh( $field ) {
		if ( ! isset( $field['partial_refresh'] ) ) {
			$field['partial_refresh'] = array();
		}

		foreach ( $field['partial_refresh'] as $id => $args ) {
			if ( ! is_array( $args ) || ! isset( $args['selector'] ) || ! isset( $args['render_callback'] ) || ! is_callable( $args['render_callback'] ) ) {
				unset( $this->partial_refresh[ $id ] );
				continue;
			}
		}

		return $field['partial_refresh'];
	}

	/**
	 * Add Setting to wp customize instance base on what kind of class instance used
	 *
	 * @param array $setting Array of setting.
	 * @param string $setting_id Name of setting ID.
	 *
	 * @return \WP_Customize_Setting
	 */
	public function do_add_setting( $setting, $setting_id = null ) {
		$wp_customize = $this->wp_customize();

		if ( null === $setting_id ) {
			$setting_id = $setting['id'];
		}

		$setting_class    = $this->get_setting_class( $setting['control_type'] );
		$setting_instance = new $setting_class( $wp_customize, $setting_id, $setting );
		$wp_customize->add_setting( $setting_instance );

		return $setting_instance;
	}

	/**
	 * Get setting class
	 *
	 * @param string $type Type of class for setting option.
	 *
	 * @return string
	 */
	public function get_setting_class( $type ) {
		switch ( $type ) {
			case 'authow-fw-repeater':
				$setting_class = 'AuthowFW\Customizer\Setting\Repeater_Setting';
				break;
			case 'authow-fw-spacing':
				$setting_class = 'AuthowFW\Customizer\Setting\Spacing_Setting';
				break;
			default:
				$setting_class = 'AuthowFW\Customizer\Setting\Default_Setting';
				break;
		}

		return $setting_class;
	}

	/**
	 * Add control to wp customize instance
	 *
	 * @param array $field Array of field.
	 * @param \WP_Customize_Setting $setting instance of Setting.
	 *
	 * @return mixed
	 */
	public function do_add_control( $field, $setting = null ) {
		$wp_customize  = $this->wp_customize();
		$control_class = $this->get_control_class( $field['type'] );

		if ( null !== $setting && $setting instanceof \WP_Customize_Setting ) {
			$field['settings'] = $setting->id;
		}

		$control_instance = new $control_class( $wp_customize, $field['id'], $field );
		$wp_customize->add_control( $control_instance );

		return $control_instance;
	}

	/**
	 * Get control class
	 *
	 * @param string $type Type of control field.
	 *
	 * @return mixed
	 * @throws \InvalidArgumentException Throw if type of customizer have issue.
	 */
	public function get_control_class( $type ) {
		$handler = $this->get_all_control_class();

		if ( array_key_exists( $type, $handler ) ) {
			return $handler[ $type ];
		} else {
			throw new \InvalidArgumentException( 'Unrecognized Type. Please update Authow Theme to latest version.' );
		}
	}

	/**
	 * Get all Control Class
	 *
	 * @return array
	 */
	public function get_all_control_class() {
		$handler = array(
			'authow-fw-alert'           => 'AuthowFW\Customizer\Control\Alert',
			'authow-fw-header'          => 'AuthowFW\Customizer\Control\Header',
			'authow-fw-color'           => 'AuthowFW\Customizer\Control\Color',
			'authow-fw-toggle'          => 'AuthowFW\Customizer\Control\Toggle',
			'authow-fw-slider'          => 'AuthowFW\Customizer\Control\Slider',
			'authow-fw-number'          => 'AuthowFW\Customizer\Control\Number',
			'authow-fw-select'          => 'AuthowFW\Customizer\Control\Select',
			'authow-fw-ajax-select'     => 'AuthowFW\Customizer\Control\Ajax_Select',
			'authow-fw-range-slider'    => 'AuthowFW\Customizer\Control\Range_Slider',
			'authow-fw-radio-image'     => 'AuthowFW\Customizer\Control\Radio_Image',
			'authow-fw-radio-buttonset' => 'AuthowFW\Customizer\Control\Radio_Button_Set',
			'authow-fw-preset'          => 'AuthowFW\Customizer\Control\Preset',
			'authow-fw-preset-image'    => 'AuthowFW\Customizer\Control\Preset_Image',
			'authow-fw-text'            => 'AuthowFW\Customizer\Control\Text',
			'authow-fw-password'        => 'AuthowFW\Customizer\Control\Password',
			'authow-fw-textarea'        => 'AuthowFW\Customizer\Control\Textarea',
			'authow-fw-radio'           => 'AuthowFW\Customizer\Control\Radio',
			'authow-fw-image'           => 'AuthowFW\Customizer\Control\Image',
			'authow-fw-upload'          => 'AuthowFW\Customizer\Control\Upload',
			'authow-fw-spacing'         => 'AuthowFW\Customizer\Control\Spacing',
			'authow-fw-repeater'        => 'AuthowFW\Customizer\Control\Repeater',
			'authow-fw-typography'      => 'AuthowFW\Customizer\Control\Typography',
			'authow-fw-gradient'        => 'AuthowFW\Customizer\Control\Gradient',
			'authow-fw-size'            => 'AuthowFW\Customizer\Control\Size',
			'authow-fw-box-model'       => 'AuthowFW\Customizer\Control\Box_Model',
			'authow-fw-button'          => 'AuthowFW\Customizer\Control\Button',
			'authow-fw-code'            => 'AuthowFW\Customizer\Control\Code',
			'authow-fw-hidden'          => 'AuthowFW\Customizer\Control\Hidden',
			'authow-fw-multi-check'     => 'AuthowFW\Customizer\Control\MultiCheck',
		);

		return $handler;
	}

	/**
	 * Return search result
	 *
	 * @param string $search Search keyword.
	 */
	public function get_search_result( $search ) {
		$fields_search = $this->get_all_fields();
		$results       = array();

		foreach ( $fields_search as $key => $field ) {
			$field['title']       = isset( $field['title'] ) ? $field['title'] : '';
			$field['label']       = isset( $field['label'] ) ? $field['label'] : '';
			$field['description'] = isset( $field['description'] ) ? $field['description'] : '';
			$match                = $this->match_search( $search, implode( ' ', array(
				$field['title'],
				$field['description'],
				$field['label'],
			) ) );

			if ( $match > 0 ) {
				$results[ $key ] = array(
					'id'          => $field['id'],
					'label'       => $field['label'],
					'description' => $field['description'],
					'section'     => $field['section'],
					'match'       => $match,
				);
			}
		}

		wp_send_json_success( $results );
	}

	/**
	 * Get both normal & lazy loaded fields
	 *
	 * @param array $extract Callable for excluding field.
	 *
	 * @return array
	 */
	public function get_all_fields( $extract = null ) {
		$extract   = is_callable( $extract ) ? $extract : array( $this, 'extract_fields' );
		$cache_key = $extract[1];

		if ( ! isset( $this->cache_fields[ $cache_key ] ) ) {
			$lazy_fields   = $this->get_lazy_fields();
			$normal_fields = $this->get_fields();
			$fields        = array_merge( $normal_fields, $lazy_fields );
			$results       = array();

			foreach ( $fields as $key => $field ) {
				$result = call_user_func_array( $extract, array( $field, $key ) );
				if ( $result ) {
					$results[ $key ] = $result;
				}
			}

			$this->cache_fields[ $cache_key ] = $results;
		}

		return $this->cache_fields[ $cache_key ];
	}

	/**
	 * Get all registered lazy fields
	 *
	 * @return array
	 */
	public function get_lazy_fields() {
		$fields_search   = [];
		$sections_search = $this->get_registered_lazy_section();

		foreach ( $sections_search as $key => $section ) {
			foreach ( $section as $file ) {
				$options = $this->get_lazy_options( $file );
				foreach ( $options as $opt ) {
					$id                              = $opt['id'];
					$fields_search[ $id ]            = $opt;
					$fields_search[ $id ]['section'] = $key;
				}
			}
		}

		return $fields_search;
	}

	/**
	 * Only Normal Field
	 *
	 * @return array
	 */
	public function get_fields() {
		return $this->fields;
	}

	/**
	 * Check total search match
	 *
	 * @param string $keywords Search keyword.
	 * @param string $description Search description.
	 *
	 * @return int
	 */
	public function match_search( $keywords, $description ) {
		preg_match_all( '/\w+/i', $keywords, $words );
		$total = 0;

		foreach ( $words[0] as $search ) {
			$found = preg_match_all( "/($search)/i", $description );

			if ( 0 === $found ) {
				return 0;
			} else {
				$total += $found;
			}
		}

		return $total;
	}

	/**
	 * Find lazy setting
	 *
	 * @param array $options Array of lazy option.
	 * @param string $name Name of setting to be searched for.
	 *
	 * @return mixed
	 */
	public function filter_lazy_setting( $options, $name ) {
		foreach ( $options as $key => $option ) {
			if ( $option['id'] === $name ) {
				return $option;
			}
		}

		return null;
	}

	/**
	 * Find partial setting
	 *
	 * @param array $options Array of partial setting option.
	 * @param string $name Name of setting to be searched for.
	 *
	 * @return mixed
	 */
	public function filter_lazy_partial_setting( $options, $name ) {
		foreach ( $options as $key => $option ) {
			if ( isset( $option['partial_refresh'] ) ) {
				$partials = $option['partial_refresh'];
				if ( array_key_exists( $name, $partials ) ) {
					return [
						'setting' => $option['id'],
						'partial' => $partials[ $name ],
					];
				}
			}
		}

		return null;
	}

	/**
	 * Find setting class for option
	 *
	 * @param string $class Class name for setting.
	 * @param \WP_Customize_Setting|string $id Customize Setting object, or ID.
	 *
	 * @return string
	 */
	public function filter_dynamic_setting_class( $class, $id ) {
		if ( preg_match( Default_Setting::$lazy_pattern, $id, $matches ) ) {
			$option = $this->get_lazy_field( $matches['section'], $matches['id'], array(
				$this,
				'filter_lazy_setting',
			) );
			$class  = $this->get_setting_class( $option['type'] );
		}

		return $class;
	}

	/**
	 * Get filtered lazy field
	 *
	 * @param string $section Section of lazy field.
	 * @param string $name name of setting or option.
	 * @param callable $callback filtered callback.
	 *
	 * @return mixed
	 */
	public function get_lazy_field( $section, $name, $callback ) {
		$section = $this->get_lazy_section_files( $section );

		if ( ! empty( $section ) ) {
			foreach ( $section as $file ) {
				$options = $this->get_lazy_options( $file );

				return call_user_func_array( $callback, array( $options, $name ) );
			}
		}

		return null;
	}

	/**
	 * Find setting arguemnt for option
	 *
	 * @param array $setting_args Array of properties for the new WP_Customize_Setting. Default empty array.
	 * @param \WP_Customize_Setting|string $setting_id Customize Setting object, or ID.
	 *
	 * @return mixed
	 */
	public function filter_dynamic_setting_args( $setting_args, $setting_id ) {
		if ( preg_match( Default_Setting::$lazy_pattern, $setting_id, $matches ) ) {
			$option       = $this->get_lazy_field( $matches['section'], $matches['id'], array(
				$this,
				'filter_lazy_setting',
			) );
			$field        = $this->filter_field( $option, true );
			$setting_args = $field['setting'];
		}

		return $setting_args;
	}

	/**
	 * Partial render
	 *
	 * @param string|array|false $rendered The partial value. Default false.
	 * @param \WP_Customize_Partial $partial WP_Customize_Setting instance.
	 * @param array $container_context Optional array of context data associated with
	 *                                                 the target container.
	 *
	 * @return mixed|string
	 */
	public function partial_render( $rendered, \WP_Customize_Partial $partial, $container_context ) {
		if ( preg_match( Lazy_Partial::$pattern, $partial->id, $matches ) ) {
			$option = $this->get_lazy_field( $matches['section'], $matches['id'], array(
				$this,
				'filter_lazy_partial_setting',
			) );

			if ( $option ) {
				ob_start();
				$return_render = call_user_func( $option['partial']['render_callback'], $this, $container_context );
				$ob_render     = ob_get_clean();

				if ( null !== $return_render && '' !== $ob_render ) {
					_doing_it_wrong( __FUNCTION__, esc_html__( 'Partial render must echo the content or return the content string (or array), but not both.', 'authow' ), '4.5.0' );
				}

				$rendered = null !== $return_render ? $return_render : $ob_render;
			}
		}

		return $rendered;
	}

	/**
	 * Filters a dynamic partial's constructor arguments.
	 *
	 * @param false|array $args The arguments to the WP_Customize_Partial constructor.
	 * @param string $id ID for dynamic partial.
	 *
	 * @return array
	 */
	public function filter_dynamic_partial_args( $args, $id ) {
		if ( preg_match( Lazy_Partial::$pattern, $id, $matches ) ) {
			$option = $this->get_lazy_field( $matches['section'], $matches['id'], array(
				$this,
				'filter_lazy_partial_setting',
			) );
			$args   = array(
				'selector'            => $option['partial']['selector'],
				'settings'            => array( Default_Setting::create_lazy_setting( $matches['section'], $option['setting'] ) ),
				'container_inclusive' => false,
				'fallback_refresh'    => false,
			);
		}

		return $args;
	}

	/**
	 * Filters the class used to construct partials.
	 *
	 * Allow non-statically created partials to be constructed with custom WP_Customize_Partial subclass.
	 *
	 * @param string $class WP_Customize_Partial or a subclass.
	 * @param string $id ID for dynamic partial.
	 *
	 * @return string
	 */
	public function filter_dynamic_partial_class( $class, $id ) {
		if ( preg_match( Lazy_Partial::$pattern, $id, $matches ) ) {
			$class = 'AuthowFW\Customizer\Partial\Lazy_Partial';
		}

		return $class;
	}

	/**
	 * Create register customizer hook specifically for AuthowFW Framework
	 */
	public function register_customizer() {
		do_action( 'authow_fw_register_customizer_option', $this );
	}

	/**
	 * Load script for preview init
	 */
	public function preview_init() {
		add_action( 'wp_enqueue_scripts', array( $this, 'previewer_script' ) );
	}

	/**
	 * Add panel functionality exposed to public
	 *
	 * @param array $panel Panel option.
	 */
	public function add_panel( $panel ) {
		$this->panels[ $panel['id'] ] = $panel;
	}

	/**
	 * Section functionality exposed to public
	 *
	 * @param array $section Section option.
	 */
	public function add_section( $section ) {
		$section = apply_filters( 'authow_fw_customizer_add_section', $section );

		$this->sections[ $section['id'] ] = $section;
	}

	/**
	 * Add field functionality exposed to public
	 *
	 * @param array $field Add option.
	 */
	public function add_field( $field ) {
		$field = apply_filters( 'authow_fw_customizer_add_field', $field );

		$this->fields[ $field['id'] ] = $field;

		if ( isset( $field['partial_refresh'] ) ) {
			$this->partial_refresh[ $field['id'] ] = $field['partial_refresh'];
		}
	}

	/**
	 * Deploy registered panel
	 */
	public function deploy_panels() {
		$wp_customize          = $this->wp_customize();
		$active_callback_class = Active_Callback::get_instance();

		foreach ( $this->panels as $panel ) {
			$panel['type'] = isset( $panel['type'] ) ? $panel['type'] : 'default';

			$panel_class = 'WP_Customize_Panel';

			$wp_customize->add_panel( new $panel_class( $wp_customize, $panel['id'], array(
				'title'           => $panel['title'],
				'description'     => isset( $panel['description'] ) && $panel['description'] ? $panel['description'] : '',
				'priority'        => $panel['priority'],
				'active_callback' => isset( $panel['active_callback'] ) ? function () use ( $panel, $active_callback_class ) {
					return $active_callback_class->evaluate( $panel['active_callback'] );
				} : '__return_true',
			) ) );
		}
	}

	/**
	 * Deploy registered section
	 */
	public function deploy_sections() {
		$wp_customize          = $this->wp_customize();
		$active_callback_class = Active_Callback::get_instance();

		foreach ( $this->sections as $section ) {
			$section['type'] = isset( $section['type'] ) ? $section['type'] : 'default';

			switch ( $section['type'] ) {
				case 'authow-fw-helper-section':
					$section_class = 'AuthowFW\Customizer\Section\Helper_Section';
					break;
				case 'authow-fw-lazy-section':
					$section_class = 'AuthowFW\Customizer\Section\Lazy_Section';
					break;
				case 'authow-fw-link-section':
					$section_class = 'AuthowFW\Customizer\Section\Link_Section';
					break;
				default:
					$section_class = 'AuthowFW\Customizer\Section\Default_Section';
					break;
			}

			$wp_customize->add_section( new $section_class( $wp_customize, $section['id'], array(
				'title'           => $section['title'],
				'description'     => isset( $section['description'] ) ? $section['description'] : '',
				'panel'           => isset( $section['panel'] ) ? $section['panel'] : '',
				'priority'        => $section['priority'],
				'dependency'      => isset( $section['dependency'] ) ? $section['dependency'] : [],
				'url'             => isset( $section['url'] ) ? $section['url'] : home_url( '/' ),
				'label'           => isset( $section['label'] ) ? $section['label'] : '',
				'active_callback' => isset( $section['active_callback'] ) ? function () use ( $section, $active_callback_class ) {
					return $active_callback_class->evaluate( $section['active_callback'] );
				} : '__return_true',
			) ) );
		}
	}

	/**
	 * Deploy all registered field
	 */
	public function deploy_fields() {
		foreach ( $this->fields as $field ) {
			$filtered_field = $this->filter_field( $field );
			$this->do_add_setting( $filtered_field['setting'] );
			$this->do_add_control( $filtered_field['control'] );
		}

		$this->register_partial_refresh();
	}

	/**
	 * Setup_partial_refresh
	 */
	public function register_partial_refresh() {
		$wp_customize = $this->wp_customize();

		if ( ! isset( $wp_customize->selective_refresh ) ) {
			return;
		}

		foreach ( $this->fields as $field_id => $args ) {
			if ( isset( $args['partial_refresh'] ) && ! empty( $args['partial_refresh'] ) ) {
				// Start going through each item in the array of partial refreshes.
				foreach ( $args['partial_refresh'] as $partial_refresh => $partial_refresh_args ) {
					// If we have all we need, create the selective refresh call.
					if ( isset( $partial_refresh_args['render_callback'] ) && isset( $partial_refresh_args['selector'] ) ) {
						$wp_customize->selective_refresh->add_partial( $partial_refresh, array(
							'selector'            => $partial_refresh_args['selector'],
							'settings'            => array( $args['id'] ),
							'render_callback'     => $partial_refresh_args['render_callback'],
							'container_inclusive' => isset( $partial_refresh_args['container_inclusive'] ) ? $partial_refresh_args['container_inclusive'] : false,
							'fallback_refresh'    => false,
						) );
					}
				}
			}
		}
	}

	/**
	 * Register control type
	 */
	public function register_control_types() {
		$wp_customize = $this->wp_customize();
		$handler      = $this->get_all_control_class();

		foreach ( $handler as $handle ) {
			$wp_customize->register_control_type( $handle );
		}
	}

	/**
	 * Register Section Type
	 */
	public function register_section_types() {
		$wp_customize = $this->wp_customize();

		$wp_customize->register_section_type( 'AuthowFW\Customizer\Section\Helper_Section' );
		$wp_customize->register_section_type( 'AuthowFW\Customizer\Section\Lazy_Section' );
		$wp_customize->register_section_type( 'AuthowFW\Customizer\Section\Link_Section' );
		$wp_customize->register_section_type( 'AuthowFW\Customizer\Section\Default_Section' );
	}

	/**
	 * Return Fields without Partial Refresh
	 *
	 * @param array $field Field.
	 *
	 * @return mixed
	 */
	public function extract_fields( $field ) {
		unset( $field['partial_refresh'] );

		return $field;
	}

	/**
	 * Get all registered section
	 *
	 * @return array
	 */
	public function get_sections() {
		return $this->sections;
	}

	/**
	 * Get all registered panel
	 *
	 * @return array
	 */
	public function get_panels() {
		return $this->panels;
	}

	/**
	 * Build search template
	 */
	public function search_template() {
		?>
        <script type="text/html" id="tmpl-search-wrapper">
            <div class='customizer-search-wrapper'>
                <a href='#' class='customizer-search-toggle'>
                    <i class='fa fa-search'></i>
                </a>
                <form class='customizer-form-search'>
                    <input type='text' name='customizer-form-input'/>
                </form>
            </div>
            <div class='customizer-search-result'>
                <div class='customizer-search-result-wrapper'></div>
                <div class='search-loader hidden'>
                    <div class='loader'></div>
                </div>
            </div>
        </script>

        <script type="text/html" id="tmpl-search-overlay">
            <div class='customizer-search-overlay'></div>
        </script>

        <script type="text/html" id="tmpl-search-control">
            <ul>
                <# for ( key in data ) { #>
                <# var control = data[key]; #>
                <li class='search-li' data-section='{{ control.section }}' data-control='{{ control.id }}'>
                    <span>{{ control.path }}</span>
                    <h3>{{ control.label }}</h3>
                    <em>{{ control.description }}</em>
                </li>
                <# } #>
            </ul>
        </script>
		<?php
	}

	/**
	 * Build widget template
	 */
	public function widget_template() {
		?>
        <script type="text/html" id="tmpl-widget-alert">
            <div class='customize-alert customize-alert-info'>
                <label>
                    <strong class='customize-control-title'>{{ data.title }}</strong>
                    <div class='description customize-control-description'>
                        <ul>
                            <# for ( word in data.words ) { #>
                            <li>{{ data.words[word] }}</li>
                            <# } #>
                        </ul>
                    </div>
                </label>
            </div>
        </script>
		<?php
	}

	public function move_settings( $wp_customize ) {
		// Remove Sections
		$wp_customize->remove_section( 'title_tagline' );
		$wp_customize->remove_section( 'nav' );
		$wp_customize->remove_section( 'static_front_page' );
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_section( 'custom_css' );
	}

	public function gosodesign_customizer_devices_preview_width() {
		/* We add a filter to help you can modify it by use a hook */
		$sizes = apply_filters( 'gosodesign_customize_preview_width', array(
			'tablet'        => 780,
			'mobile'        => 414,
			'mobile_height' => 736,
		) );
		?>
        <style>
			.wp-customizer .preview-tablet .wp-full-overlay-main {
				width: <?php echo absint( $sizes['tablet'] ); ?>px;
				margin-left: 0;
				margin-right: 0;
				left: 50%;
				-webkit-transform: translateX(-50%);
				transform: translateX(-50%);
			}
			.wp-customizer .preview-mobile .wp-full-overlay-main {
				width: <?php echo absint( $sizes['mobile'] ); ?>px;
				height: <?php echo absint( $sizes['mobile_height'] ); ?>px;
				margin-left: 0;
				margin-right: 0;
				left: 50%;
				-webkit-transform: translateX(-50%);
				transform: translateX(-50%);
			}
			.rtl.wp-customizer .preview-tablet .wp-full-overlay-main,
			.rtl.wp-customizer .preview-mobile .wp-full-overlay-main {
				-webkit-transform: translateX(50%);
				transform: translateX(50%);
			}
        </style>
		<?php
	}

	/**
	 * Register scripts for AuthowFW Customizer.
	 */
	public function register_scripts() {
		$wp_scripts = wp_scripts();

		$handle    = 'authow-fw-extend-widget';
		$src       = PENCI_URL . '/assets/js/customizer/widget-extend.js';
		$deps      = array( 'jquery', 'customize-widgets' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'selectize';
		$src       = PENCI_URL . '/assets/js/vendor/selectize.js';
		$deps      = array( 'jquery' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'serialize-js';
		$src       = PENCI_URL . '/assets/js/vendor/serialize.js';
		$deps      = array();
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'wp-color-picker-alpha';
		$src       = PENCI_URL . '/assets/js/vendor/wp-color-picker-alpha.js';
		$deps      = array( 'wp-color-picker' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$wp_scripts->localize(
			'wp-color-picker-alpha',
			'wpColorPickerL10n',
			array(
				'clear'            => esc_html__( 'Clear', 'authow' ),
				'clearAriaLabel'   => esc_html__( 'Clear color', 'authow' ),
				'defaultString'    => esc_html__( 'Default', 'authow' ),
				'defaultAriaLabel' => esc_html__( 'Select default color', 'authow' ),
				'pick'             => esc_html__( 'Select color', 'authow' ),
				'defaultLabel'     => esc_html__( 'Color value', 'authow' ),
			)
		);

		$handle    = 'codemirror';
		$src       = PENCI_URL . '/assets/js/vendor/codemirror/lib/codemirror.js';
		$deps      = array( 'jquery', 'jquery-ui-core', 'jquery-ui-button' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-validate-css';
		$src       = PENCI_URL . '/assets/js/customizer/validate-css-value.js';
		$deps      = array( 'jquery' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-active-callback';
		$src       = PENCI_URL . '/assets/js/customizer/active-callback.js';
		$deps      = array( 'underscore' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-search-customizer';
		$src       = PENCI_URL . '/assets/js/customizer/search-control.js';
		$deps      = array( 'jquery', 'underscore' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-customizer-late-init';
		$src       = PENCI_URL . '/assets/js/customizer/late-init-customizer.js';
		$deps      = array( 'jquery' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'ion-range-slider';
		$src       = PENCI_URL . '/assets/js/vendor/ion.rangeSlider.min.js';
		$deps      = array( 'jquery' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-set-setting-value';
		$src       = PENCI_URL . '/assets/js/customizer/set-setting-value.js';
		$deps      = array( 'jquery' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		// ... Control
		$handle    = 'authow-fw-default-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-default.js';
		$deps      = array( 'customize-controls', 'underscore' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-alert-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-alert.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-header-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-header.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-color-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-color.js';
		$deps      = array(
			'jquery',
			'customize-controls',
			'wp-color-picker-alpha',
			'authow-fw-default-control',
		);
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-toggle-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-toggle.js';
		$deps      = array( 'jquery', 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-slider-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-slider.js';
		$deps      = array( 'jquery', 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-number-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-number.js';
		$deps      = array( 'jquery', 'authow-fw-default-control', 'jquery-ui-spinner' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-select-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-select.js';
		$deps      = array( 'jquery', 'authow-fw-default-control', 'selectize' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-ajax-select-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-ajax-select.js';
		$deps      = array( 'jquery', 'authow-fw-default-control', 'selectize' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-range-slider-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-range-slider.js';
		$deps      = array( 'jquery', 'authow-fw-default-control', 'ion-range-slider' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-radio-image-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-radio-image.js';
		$deps      = array( 'jquery', 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-radio-buttonset-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-radio-buttonset.js';
		$deps      = array( 'jquery', 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-preset-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-preset.js';
		$deps      = array( 'jquery', 'authow-fw-default-control', 'authow-fw-set-setting-value' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-preset-image-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-preset-image.js';
		$deps      = array( 'jquery', 'authow-fw-default-control', 'selectize' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-text-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-text.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-password-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-text.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-textarea-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-textarea.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-radio-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-radio.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-image-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-image.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-upload-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-upload.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-spacing-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-spacing.js';
		$deps      = array( 'authow-fw-default-control', 'authow-fw-validate-css' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-repeater-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-repeater.js';
		$deps      = array(
			'authow-fw-default-control',
			'jquery-ui-sortable',
			'wp-color-picker',
			'selectize',
			'serialize-js',
		);
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-typography-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-typography.js';
		$deps      = array( 'authow-fw-default-control', 'selectize', 'wp-color-picker-alpha' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-gradient-control';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-gradient.js';
		$deps      = array( 'authow-fw-default-control', 'selectize', 'wp-color-picker-alpha' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-size';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-size.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-box-model';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-box-model.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-button';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-button.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-code';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-code.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-multi-check';
		$src       = PENCI_URL . '/assets/js/customizer-control/control-multi-check.js';
		$deps      = array( 'authow-fw-default-control' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		// ... Section
		$handle    = 'authow-fw-default-section';
		$src       = PENCI_URL . '/assets/js/customizer-section/default-section.js';
		$deps      = array( 'jquery' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-link-section';
		$src       = PENCI_URL . '/assets/js/customizer-section/link-section.js';
		$deps      = array( 'jquery' );
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-lazy-section';
		$src       = PENCI_URL . '/assets/js/customizer-section/lazy-section.js';
		$deps      = array(
			'jquery',
			'underscore',
			'authow-fw-default-section',
			'authow-fw-alert-control',
			'authow-fw-header-control',
			'authow-fw-color-control',
			'authow-fw-toggle-control',
			'authow-fw-slider-control',
			'authow-fw-number-control',
			'authow-fw-select-control',
			'authow-fw-ajax-select-control',
			'authow-fw-range-slider-control',
			'authow-fw-radio-image-control',
			'authow-fw-radio-buttonset-control',
			'authow-fw-preset-control',
			'authow-fw-preset-image-control',
			'authow-fw-text-control',
			'authow-fw-textarea-control',
			'authow-fw-radio-control',
			'authow-fw-image-control',
			'authow-fw-upload-control',
			'authow-fw-spacing-control',
			'authow-fw-repeater-control',
			'authow-fw-typography-control',
			'authow-fw-gradient-control',
			'authow-fw-size',
			'authow-fw-box-model',
			'authow-fw-button',
			'authow-fw-code',
			'authow-fw-multi-check'
		);
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		// ... Connect To Previewer
		$handle    = 'authow-fw-previewer-sync';
		$src       = PENCI_URL . '/assets/js/customizer/previewer-sync.js';
		$deps      = array(
			'underscore',
			'customize-controls',
		);
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );
	}

	/**
	 * Load css on Customizer Panel
	 */
	public function customizer_styles() {
		wp_enqueue_style( 'selectize', PENCI_URL . '/assets/css/selectize.default.css', null, $this->version );
		wp_enqueue_style( 'authow-fw-customizer-css', PENCI_URL . '/assets/css/customizer.css', array( 'wp-color-picker' ), $this->version );
		wp_enqueue_style( 'codemirror', PENCI_URL . '/assets/js/vendor/codemirror/lib/codemirror.css', null, $this->version );
		wp_enqueue_style( 'font-awesome', PENCI_URL . '/assets/font/font-awesome/font-awesome.css', null, $this->version );

		wp_enqueue_style( 'ion-range-slider', PENCI_URL . '/assets/css/ion.rangeSlider.css', null, $this->version );
		wp_enqueue_style( 'ion-range-slider-skin', PENCI_URL . '/assets/css/ion.rangeSlider.skinFlat.css', null, $this->version );

		if ( is_rtl() ) {
			wp_enqueue_style( 'authow-fw-customizer-css-rtl', PENCI_URL . '/assets/css/customizer-rtl.css', null, $this->version );
		}
	}

	/**
	 * Load script on Customizer Panel
	 */
	public function enqueue_control_script() {
		wp_enqueue_script( 'authow-fw-customizer-late-init' );
		wp_enqueue_script( 'authow-fw-active-callback' );
		wp_enqueue_script( 'authow-fw-previewer-sync' );
		wp_enqueue_script( 'authow-fw-lazy-section' );
		wp_enqueue_script( 'authow-fw-link-section' );

		if ( ! isset( $_REQUEST['layout_id'] ) ) {
			wp_enqueue_script( 'authow-fw-search-customizer' );
		}

		wp_enqueue_script( 'authow-fw-extend-widget' );

		wp_localize_script( 'authow-fw-lazy-section', 'lazySetting', array(
			'ajaxUrl' => add_query_arg( array( $this->endpoint => 'authow' ), esc_url( home_url( '/', 'relative' ) ) ),
			'nonce'   => wp_create_nonce( $this->endpoint ),
		) );

		wp_localize_script( 'authow-fw-search-customizer', 'searchSetting', array(
			'ajaxUrl' => add_query_arg( array( $this->endpoint => 'authow' ), esc_url( home_url( '/', 'relative' ) ) ),
			'nonce'   => wp_create_nonce( $this->endpoint ),
		) );

		wp_localize_script( 'authow-fw-previewer-sync', 'partialSetting', array(
			'patternTemplate' => Lazy_Partial::js_pattern_template(),
		) );

		wp_localize_script( 'authow-fw-extend-widget', 'widgetLang', array(
			'title' => esc_html__( 'Notice', 'authow' ),
			'words' => array(
				esc_html__( 'To improve customizer load speed, we disable widget option on customizer for element.', 'authow' ),
				esc_html__( 'You can still modify widget content from Widget Panel on Admin Page', 'authow' ),
			),
		) );
	}

	/**
	 * Load script at Customizer Preview
	 */
	public function previewer_script() {
		$wp_scripts = wp_scripts();

		// ... Customizer Preview Script
		$handle    = 'authow-fw-customizer-preview';
		$src       = PENCI_URL . '/assets/js/customizer/customizer-preview.js';
		$deps      = array(
			'underscore',
			'customize-preview',
		);
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'authow-fw-customizer-partial-preview';
		$src       = PENCI_URL . '/assets/js/customizer/partial-refresh-preview.js';
		$deps      = array(
			'jquery',
			'underscore',
			'customize-preview',
		);
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		$handle    = 'vex';
		$src       = PENCI_URL . '/assets/js/customizer/vex.combined.min.js';
		$deps      = array(
			'jquery',
		);
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );


		$handle    = 'authow-fw-customizer-redirect-tag-preview';
		$src       = PENCI_URL . '/assets/js/customizer/redirect-tag-preview.js';
		$deps      = array(
			'vex',
			'jquery',
			'underscore',
			'customize-preview',
		);
		$in_footer = 1;
		$wp_scripts->add( $handle, $src, $deps, $this->version, $in_footer );

		// enqueue script.
		wp_enqueue_script( 'authow-fw-customizer-preview' );
		wp_enqueue_script( 'authow-fw-customizer-partial-preview' );

		// ... Load style
		wp_enqueue_style( 'vex', PENCI_URL . '/assets/css/vex.css', null, $this->version );
		wp_enqueue_style( 'theme-customizer', PENCI_URL . '/assets/css/theme-customizer.css', null, $this->version );
	}
}

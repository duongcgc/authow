<?php
/**
 * Elementor autocomplete controls
 *
 * @package authow
 */

namespace GosoAuthowElementor\Controls;

use Elementor\Base_Data_Control;

/**
 * Elementor goso_el_autocomplete control.
 *
 * @since 1.0.0
 */
class Autocomplete extends Base_Data_Control {
	/**
	 * Get goso_el_autocomplete control type.
	 *
	 * Retrieve the control type, in this case `goso_el_autocomplete`.
	 *
	 * @return string Control type.
	 * @since  1.0.0
	 * @access public
	 *
	 */
	public function get_type() {
		return 'goso_el_autocomplete';
	}

	/**
	 * Enqueue control scripts and styles.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_script( 'goso_el_autocomplete-control', get_template_directory_uri() . '/inc/elementor/assets/js/goso-el-autocomplete.js', array( 'jquery' ), GOSO_SOLEDAD_VERSION, false );
	}

	/**
	 * Render goso_el_autocomplete control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
        <div class="elementor-control-field">
            <label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">{{{ data.label
                }}}</label>
            <div class="elementor-control-input-wrapper">
                <# var multiple = ( data.multiple ) ? 'multiple' : ''; #>
                <select id="<?php echo esc_attr( $control_uid ); ?>" class="elementor-select2" type="select2" {{
                        multiple }} data-setting="{{ data.name }}" data-post-type="{{ data.post_type }}"
                        data-taxonomy="{{ data.taxonomy }}"
                        data-placeholder="<?php echo esc_attr__( 'Search', 'authow' ); ?>">
                    <# _.each( data.options, function( option_title, option_value ) {
                    var value = data.controlValue;
                    if ( typeof value == 'string' ) {
                    var selected = ( option_value === value ) ? 'selected' : '';
                    } else if ( null !== value ) {
                    var value = _.values( value );
                    var selected = ( -1 !== value.indexOf( option_value ) ) ? 'selected' : '';
                    }
                    #>
                    <option {{ selected }} value="{{ option_value }}">{{{ option_title }}}</option>
                    <# } ); #>
                </select>
            </div>
        </div>
        <# if ( data.description ) { #>
        <div class="elementor-control-field-description">{{{ data.description }}}</div>
        <# } #>
		<?php
	}

	/**
	 * Get goso_el_autocomplete control default settings.
	 *
	 * Retrieve the default settings of the goso_el_autocomplete control. Used to return the
	 * default settings while initializing the goso_el_autocomplete control.
	 *
	 * @return array Control default settings.
	 * @since  1.8.0
	 * @access protected
	 *
	 */
	protected function get_default_settings() {
		return [
			'label_block' => true,
			'multiple'    => false,
			'taxonomy'    => false,
			'post_type'   => false,
			'options'     => [],
			'callback'    => '',
		];
	}
}

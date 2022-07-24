<?php
$output = $el_class = $css_animation = $css = '';

$_design_style = $_use_img = $_image = '';
$image_width = $image_height = $image_mar_top = $image_mar_bottom = '';
$_heading = $_subheading = $_price = $_unit = '';
$_btn_text = $_btn_link = $_featured = $min_height = '';

$_heading_mar_bottom = $_subheading_mar_b = $_price_mar_bottom = '';
$_unit_mar_bottom    = $_features_martop = $_features_bottom = $item_fea_bottom = '';
$btn_mar_top         = $btn_width = $btn_height = '';

$bg_color = $border_color = '';
$_heading_color = $_heading_fsize = $_heading_typo = '';
$_subheading_color = $_subheading_fsize = $_subheading_typo = '';
$_price_color = $_price_fsize = $_price_typo = '';
$_unit_color = $_unit_fsize = $_unit_typo = '';
$features_color = $features_fsize = $features_typo = '';
$btn_bgcolor =  $btn_borcolor = $btn_text_color = '';
$btn_hbgcolor = $btn_hborcolor = $btn_text_hcolor = '';
$_btn_fsize = $_btn_typo = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = 'goso-pricing-table';
$css_class .= ' goso-pricing-item';
$css_class .= $_featured ? ' goso-pricing_featured' : '';
$css_class .= $_design_style ? ' goso-pricing-' . esc_attr( $_design_style ) : '';

$class_to_filter = vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$block_id = Goso_Vc_Helper::get_unique_id_block( 'pricing_table' );
?>
	<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
		<?php
		if( $_featured && 's2' == $_design_style  ){
			echo '<span class="goso-pricing-ribbon">' . goso_icon_by_ver('fas fa-star') . '</span>';
		}
		?>
		<div class="goso-block_content">
			<?php
			echo '<div class="goso-pricing-header">';
			if ( $_image && $_use_img ) {
				echo '<div class="goso-pricing-image"><img src="' . esc_url( wp_get_attachment_url( $_image ) ) . '"></div>';
			}
			if ( $_heading ) {
				echo '<div class="goso-pricing-title">' . do_shortcode( $_heading ) . '</div>';
			}

			if ( $_subheading ) {
				echo '<div class="goso-pricing-subtitle">' . do_shortcode( $_subheading ) . '</div>';
			}
			echo '</div>';

			if ( $_price || $_unit ) {
				echo '<div class="goso-price-unit">';

				if ( $_price ) {
					echo '<span class="goso-pricing-price">' . do_shortcode( $_price ) . '</span>';
				}

				if ( $_unit ) {
					echo '<span class="goso-pricing-unit">' . do_shortcode( $_unit ) . '</span>';
				}

				echo '</div>';
			}

			if ( $content ) {
				$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
				$content = do_shortcode( shortcode_unautop( $content ) );

				echo '<div class="goso-pricing-featured">' . $content . '</div>';
			}

			if ( $atts['_btn_text'] ) {
				$a_before = '<span class="goso-pricing-btn button">';
				$a_after  = '</span>';

				if ( $_btn_link ) {
					$url = vc_build_link( $_btn_link );
					if ( strlen( $url['url'] ) > 0 ) {
						$rel = '';
						if ( ! empty( $url['rel'] ) ) {
							$rel = ' rel="' . esc_attr( $url['rel'] ) . '"';
						}

						$a_before = '<a class="goso-pricing-btn goso-button" href="' . esc_attr( $url['url'] ) . '" ' . $rel . ' title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">';
						$a_after  = '</a>';
					}
				}
				echo $a_before . do_shortcode( $_btn_text ) . $a_after;
			}
			?>
		</div>
	</div>
<?php
$css_custom = '';
$id_pricing_table = '#' . $block_id;

// General
if( $bg_color ) {
	$css_custom .= $id_pricing_table . '.goso-pricing-item{ background-color:' . esc_attr( $bg_color ) . '; }';
}
if( $border_color ) {
	$css_custom .= $id_pricing_table . '.goso-pricing-item{ border-color:' . esc_attr( $border_color ) . '; }';
}
if( $min_height ) {
	$css_custom .= $id_pricing_table . '.goso-pricing-item{ min-height:' . esc_attr( $min_height ) . 'px; }';
}

// Image
if ( $_image && $_use_img ) {
	$custom_img_css = '';

	if ( $image_width ) {
		$custom_img_css .= 'width:' . esc_attr( $image_width ) . ';';
	}
	if ( $image_height ) {
		$custom_img_css .= 'height:' . esc_attr( $image_height ) . ';';
	}
	if ( $image_mar_top ) {
		$custom_img_css .= 'margin-top:' . esc_attr( $image_mar_top ) . ';';
	}
	if ( $image_height ) {
		$custom_img_css .= 'margin-bottom:' . esc_attr( $image_mar_bottom ) . ';';
	}

	if ( $custom_img_css ) {
		$css_custom .= $id_pricing_table . ' .goso-pricing-image{' . $custom_img_css . '}';
	}
}
// Heading
if( $_heading_color ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-title{ color:' . esc_attr( $_heading_color ) . '; }';
}
if( $_heading_mar_bottom ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-title{ margin-bottom:' . esc_attr( $_heading_mar_bottom ) . '; }';
}

$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $_heading_fsize,
	'font_style' => $_heading_typo,
	'template'   => $id_pricing_table . ' .goso-pricing-title{ %s }',
) );

// Sub heading
if( $_subheading_color ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-subtitle{ color:' . esc_attr( $_subheading_color ) . '; }';
}
if( $_subheading_mar_b ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-subtitle{ margin-bottom:' . esc_attr( $_subheading_mar_b ) . '; }';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $_subheading_fsize,
	'font_style' => $_subheading_typo,
	'template'   => $id_pricing_table . ' .goso-pricing-subtitle{ %s }',
) );

// Pricing
if( $_price_color ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-price{ color:' . esc_attr( $_price_color ) . '; }';
}
if( $_price_mar_bottom ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-price{ margin-bottom:' . esc_attr( $_price_mar_bottom ) . '; }';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $_price_fsize,
	'font_style' => $_price_typo,
	'template'   => $id_pricing_table . ' .goso-pricing-price{ %s }',
) );

// Unit
if( $_unit_color ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-unit{ color:' . esc_attr( $_unit_color ) . '; }';
}
if( $_unit_mar_bottom ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-unit{ margin-bottom:' . esc_attr( $_unit_mar_bottom ) . '; }';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $_unit_fsize,
	'font_style' => $_unit_typo,
	'template'   => $id_pricing_table . ' .goso-pricing-unit{ %s }',
) );
// Featured
if( $features_color ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-featured li,';
	$css_custom .= $id_pricing_table . ' .goso-pricing-featured{ color:' . esc_attr( $features_color ) . '; }';
}
if( $_features_martop ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-featured{ margin-top:' . esc_attr( $_features_martop ) . '; }';
}
if( $_features_bottom ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-featured{ margin-bottom:' . esc_attr( $_features_bottom ) . '; }';
}
if( $item_fea_bottom ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-featured li{ margin-bottom:' . esc_attr( $item_fea_bottom ) . '; }';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $features_fsize,
	'font_style' => $features_typo,
	'template'   => $id_pricing_table . ' .goso-pricing-featured{ %s }',
) );

// Button
$btn_custom_css = '';
if ( $btn_mar_top ) {
	$btn_custom_css .= 'margin-top:' . esc_attr( $btn_mar_top ) . ';';
}
if ( $btn_width ) {
	$btn_custom_css .= 'width:' . esc_attr( $btn_width ) . ';';
}
if ( $btn_height ) {
	$btn_custom_css .= 'height:' . esc_attr( $btn_height ) . ';';
}

if( $btn_bgcolor ){
	$btn_custom_css .= 'background-color:' . esc_attr( $btn_bgcolor ) . ';';
}
if( $btn_borcolor ){
	$btn_custom_css .= 'border-color:' . esc_attr( $btn_borcolor ) . ';';
}
if( $btn_text_color ){
	$btn_custom_css .= 'color:' . esc_attr( $btn_text_color ) . ';';
}
if( $btn_custom_css ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-btn{' . esc_attr( $btn_custom_css ) . '}';
}
$btn_custom_hover_css = '';
if( $btn_hbgcolor ){
	$btn_custom_hover_css .= 'background-color:' . esc_attr( $btn_hbgcolor ) . ';';
}
if( $btn_hborcolor ){
	$btn_custom_hover_css .= 'border-color:' . esc_attr( $btn_hborcolor ) . ';';
}
if( $btn_text_hcolor ){
	$btn_custom_hover_css .= 'color:' . esc_attr( $btn_text_hcolor ) . ';';
}
if( $btn_custom_hover_css ) {
	$css_custom .= $id_pricing_table . ' .goso-pricing-btn:hover{' . esc_attr( $btn_custom_hover_css ) . '}';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $_btn_fsize,
	'font_style' => $_btn_typo,
	'template'   => $id_pricing_table . ' .goso-pricing-btn{ %s }',
) );

if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}

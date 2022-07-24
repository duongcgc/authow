<?php
/**
 * Shortcode attributes
 * @var $atts
 * @var $title_text
 * @var $_use_line
 * @var $description_text
 * @var $icon_position
 * @var $stitle_mar_top
 * @var $title_mar_top
 * @var $title_mar_bottom
 * @var $des_mar_top
 * @var $icon_type
 * @var $image
 * @var $image_hover
 * @var $icon_fontawesome
 * @var $icon_view
 * @var $icon_shape
 * @var $icon_hover_animation
 * @var $img_wh
 * @var $icon_mar_bottom
 * @var $icon_padding
 * @var $icon_width
 * @var $_link
 * @var $pline_width
 * @var $pline_height
 * @var $line_margin_top
 * @var $line_margin_bottom
 * @var $line_color
 * @var $icon_color
 * @var $icon_bgcolor
 * @var $icon_border_color
 * @var $icon_hcolor
 * @var $icon_hbgcolor
 * @var $icon_hborder_color
 * @var $title_color
 * @var $_title_typo
 * @var $_title_fsize
 * @var $_content_color
 * @var $_content_typo
 * @var $_content_fsize
 * @var $css_animation
 * @var $el_class
 * @var $css
 */

$el_class = $css_animation = $css = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_class = 'goso-block-vc goso-info-box';
$css_class .= $icon_position ? ' goso-ibox-' . $icon_position : 'goso-ibox-float-left';
$css_class .= $icon_view ? ' goso-view-' . $icon_view : '';
$css_class .= $icon_shape ? ' goso-shape-' . $icon_shape : '';
$css_class .= ' ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$inner_class = $icon_hover_animation ? ' goso-animation-' . $icon_hover_animation : '';

$block_id = Goso_Vc_Helper::get_unique_id_block( 'info_box' );

$url      = vc_build_link( $_link );
vc_icon_element_fonts_enqueue( 'fontawesome' );

$a_before = '<span class="goso-ibox-icon-fa">';
$a_after  = '</span>';
if ( strlen( $_link ) > 0 && strlen( $url['url'] ) > 0 ) {
	$a_before = '<a class="goso-ibox-icon-fa-fix" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '"></a>';
	$a_before .= '<a class="goso-ibox-icon-fa" href="' . esc_attr( $url['url'] ) . '" title="' . esc_attr( $url['title'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">';
	$a_after  = '</a>';
}
?>
<div id="<?php echo esc_attr( $block_id ) ?>" class="<?php echo esc_attr( $css_class ); ?>">
	<div class="goso-ibox-inner<?php echo $inner_class; ?>">
		<?php
		if ( in_array( $icon_type, array( 'icon', 'text' ) ) ) {
			echo '<div class="goso-ibox-icon goso-ibox-icon--icon goso-icon goso-tibox-'. $icon_type .'">';
			echo $a_before;
			if( 'text' == $icon_type ){
				echo '<div class="pc-ibox-ctext">'. $icontext .'</div>';
			} else {
				echo '<i class="goso-ibox-icon--i ' . $icon_fontawesome . '"></i>';
			}
			echo $a_after;
			echo '</div>';
		} elseif ( $image ) {
			echo '<div class="goso-ibox-icon goso-ibox-icon--image">';
			echo $a_before;
			echo '<img class="' . ( $image_hover ? 'goso-ibox-img_active' : '' ) . '" src="' . esc_url( wp_get_attachment_url( $image ) ) . '">';

			if ( $image_hover ) {
				echo '<img class="goso-ibox-img_hover" src="' . esc_url( wp_get_attachment_url( $image_hover ) ) . '">';
			}

			echo $a_after;
			echo '</div>';
		}
		?>
		<div class="goso-ibox-content-wrap">
		<?php if( $subtitle ): ?><div class="goso-ibox-stit"><?php echo $subtitle; ?></div><?php endif; ?>
		<?php if( $title_text ): ?><h3 class="goso-ibox-title"><?php echo $title_text; ?></h3><?php endif; ?>
		<?php if( $_use_line ): ?><div class="pc-ibox-wpline"><span class="goso-ibox-line"></span></div><?php endif; ?>
		<?php if( $description_text ): ?><div class="goso-ibox-content"><?php echo do_shortcode( wpautop( $description_text ) ); ?></div><?php endif; ?>
		</div>
	</div>
</div>
<?php
$id_info_box = '#' . $block_id;

$css_custom = '';
if ( $atts['stitle_mar_top'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-stit{margin-top:' . esc_attr( $atts['stitle_mar_top'] ) . '}';
}
if ( $atts['title_mar_top'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-title{margin-top:' . esc_attr( $atts['title_mar_top'] ) . '}';
}
if ( $atts['title_mar_bottom'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-title{margin-bottom:' . esc_attr( $atts['title_mar_bottom'] ) . '}';
}
if ( $atts['des_mar_top'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-content{margin-top:' . esc_attr( $atts['des_mar_top'] ) . '}';
}
if ( $atts['ib_bgcolor'] ) {
	$css_custom .= $id_info_box . '{ background-color: ' . esc_attr( $atts['ib_bgcolor'] ) . '; }';
}
if ( $atts['ib_bdcolor'] ) {
	$css_custom .= $id_info_box . '{ border: 1px solid ' . esc_attr( $atts['ib_bdcolor'] ) . '; }';
}
if ( $atts['ib_borderwidth'] ) {
	$css_custom .= $id_info_box . '{ border-width: ' . esc_attr( $atts['ib_borderwidth'] ) . '; }';
}
if ( $atts['ib_paddingleft'] ) {
	$css_custom .= $id_info_box . '{ padding-left: ' . esc_attr( $atts['ib_paddingleft'] ) . '; padding-right: ' . esc_attr( $atts['ib_paddingleft'] ) . '; }';
}
if ( $atts['ib_paddingtop'] ) {
	$css_custom .= $id_info_box . '{ padding-top: ' . esc_attr( $atts['ib_paddingtop'] ) . '; padding-bottom: ' . esc_attr( $atts['ib_paddingtop'] ) . '; }';
}

$line_custom_css = '';
if ( $atts['pline_width'] ) {
	$line_custom_css .= 'width:' . esc_attr( $atts['pline_width'] ) . ';';
}
if ( $atts['pline_height'] ) {
	$line_custom_css .= 'height:' . esc_attr( $atts['pline_height'] ) . ';';
}
if ( $atts['line_margin_top'] ) {
	$line_custom_css .= 'margin-top:' . esc_attr( $atts['line_margin_top'] ) . ';';
}
if ( $atts['line_margin_bottom'] ) {
	$line_custom_css .= 'margin-bottom:' . esc_attr( $atts['line_margin_bottom'] ) . ';';
}
if ( $atts['line_color'] ) {
	$line_custom_css .= 'color:' . esc_attr( $atts['line_color'] ) . ';';
}
if ( $line_custom_css ) {
	$css_custom .= $id_info_box . ' .goso-ibox-line{' . esc_attr( $line_custom_css ) . '}';
}

if ( $atts['icon_padding'] ) {
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-icon, '. $id_info_box . '.goso-view-framed .goso-icon{ padding:' . esc_attr( $atts['icon_padding'] ) . '}';
}
if ( ! $atts['icon_width'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-icon{width: ' . esc_attr( $atts['icon_width'] ) . ';height:' . esc_attr( $atts['icon_width'] ) . ';display: flex; align-items: center; justify-content: center;}';
}

if ( $atts['icon_color'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-icon,';
	$css_custom .= $id_info_box . ' .goso-ibox-icon svg,';
	$css_custom .= $id_info_box . ' .goso-ibox-icon a { color:' . esc_attr( $atts['icon_color'] ) . '; fill:' . esc_attr( $atts['icon_color'] ) . '; }';
}
if ( $atts['icon_bgcolor'] ) {
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-3 .goso-ibox-icon:after,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-4 .goso-ibox-icon:after,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-5 .goso-ibox-icon:after';
	$css_custom .= '{ background-color:' . esc_attr( $atts['icon_bgcolor'] ) . ' }';
}
if ( $atts['icon_border_color'] ) {
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-icon,';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-icon,';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-animation-custom-2 .goso-ibox-icon:after';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-animation-custom-5 .goso-ibox-icon:after{ border-color: ' . esc_attr( $atts['icon_border_color'] ) . '; }';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-3 .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-4 .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-5 .goso-ibox-icon{ box-shadow: inset 0 0 0 3px ' . esc_attr( $atts['icon_border_color'] ) . '; }';
}

if ( $atts['icon_hcolor'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-inner:hover .goso-ibox-icon,';
	$css_custom .= $id_info_box . ' .goso-ibox-inner:hover .goso-ibox-icon svg,';
	$css_custom .= $id_info_box . ' .goso-ibox-inner:hover .goso-ibox-icon a { color:' . esc_attr( $atts['icon_hcolor'] ) . ';fill:' . esc_attr( $atts['icon_hcolor'] ) . '; }';
}
if ( $atts['icon_hbgcolor'] ) {
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-ibox-inner:hover .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-ibox-inner:hover .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-3:hover .goso-ibox-icon:after,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-4:hover .goso-ibox-icon:after,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-5:hover .goso-ibox-icon:after,';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-animation-custom-1 .goso-ibox-icon:after';
	$css_custom .= '{ background-color:' . esc_attr( $atts['icon_hbgcolor'] ) . ' }';
}
if ( $atts['icon_hborder_color'] ) {
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-ibox-inner:hover .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-ibox-inner:hover .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-animation-custom-2:hover  .goso-ibox-icon:after,';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-animation-custom-5:hover  .goso-ibox-icon:after';
	$css_custom .= '{ border-color:' . esc_attr( $atts['icon_hbgcolor'] ) . ' }';

	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-2 .goso-ibox-icon:after,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-1 .goso-ibox-icon:after{ box-shadow: 0 0 0 3px ' . esc_attr( $atts['icon_hborder_color'] ) . '; }';

	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-3:hover .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-4:hover .goso-ibox-icon,';
	$css_custom .= $id_info_box . '.goso-view-stacked .goso-animation-custom-5:hover .goso-ibox-icon{ box-shadow: inset 0 0 0 3px ' . esc_attr( $atts['icon_hborder_color'] ) . '; }';
	$css_custom .= $id_info_box . '.goso-view-framed .goso-animation-custom-5:hover .goso-ibox-icon{ box-shadow: 0 0 0 6px ' . esc_attr( $atts['icon_hborder_color'] ) . '; }';
}

if ( $atts['stitle_color'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-stit{ color: ' . esc_attr( $atts['stitle_color'] ) . '; }';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $atts['_stitle_fsize'],
	'font_style' => $atts['_stitle_typo'],
	'template'   => $id_info_box . ' .goso-ibox-stit{ %s }',
) );

if ( $atts['title_color'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-title{ color: ' . esc_attr( $atts['title_color'] ) . '; }';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $atts['_title_fsize'],
	'font_style' => $atts['_title_typo'],
	'template'   => $id_info_box . ' .goso-ibox-title{ %s }',
) );

if ( $atts['_content_color'] ) {
	$css_custom .= $id_info_box . ' .goso-ibox-content{ color: ' . esc_attr( $atts['_content_color'] ) . '; }';
}
$css_custom .= Goso_Vc_Helper::vc_google_fonts_parse_attributes( array(
	'font_size'  => $atts['_content_fsize'],
	'font_style' => $atts['_content_typo'],
	'template'   => $id_info_box . ' .goso-ibox-content{ %s }',
) );


if ( $css_custom ) {
	echo '<style>';
	echo $css_custom;
	echo '</style>';
}


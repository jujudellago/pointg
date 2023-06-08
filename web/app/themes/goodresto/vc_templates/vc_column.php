<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * @var $parallax
 * @var $parallax_image
 * @var $parallax_speed_bg
 * @var $transitions
 * @var $transitions_image
 * @var $transitions_type
 * @var fixed_bg
 * @var fixed_bg_image
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $parallax_speed_bg = $css = $offset = $css_animation = '';
$output = '';

$parallax = '';
$parallax_image = '';
$parallax_speed_bg = '1.5';
$column_background = '';

$transitions = '';
$transitions_image = '';
$transitions_type = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}


$parallax_speed = $parallax_speed_bg;

if (!isset($parallax_speed) || empty($parallax_speed)) {
	$parallax_speed = 1.5;
}

if ($transitions == "true") {

	$fixed_bg = $parallax = "false";

	$wrapper_attributes[] = 'data-transition-type="'.$transitions_type.'"';

	if ( ! empty( $transitions_image ) ) {
		$transitions_image_id = preg_replace( '/[^\d]/', '', $transitions_image );
		$transitions_image_src = wp_get_attachment_image_src( $transitions_image_id, 'full' );
		if ( ! empty( $transitions_image_src[0] ) ) {
			$transitions_image_src = $transitions_image_src[0];
		}
	}

	$css_classes[] = 'vc-transitions';

	$column_background = '<div class="transitions-container" style="background-image:url('.$transitions_image_src.');"></div>';

}

if ($parallax == "true") {

	$wrapper_attributes[] = 'data-parallax-speed="' . esc_attr( $parallax_speed ) . '"';

	if ( ! empty( $parallax_image ) ) {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}

	$css_classes[] = 'vc-parallax';

	$column_background = '<div class="parallax-container" style="background-image:url('.$parallax_image_src.');"></div>';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if (isset($animation_delay)) {
	$animation_delay = 'data-animation-delay="'.esc_attr($animation_delay).'"';
}

$output .= '<div '.$animation_delay.' ' . implode( ' ', $wrapper_attributes ) . '>';
	$output .= '<div class="vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
		$output .= '<div class="wpb_wrapper">';
			$output .= wpb_js_remove_wpautop( $content );
		$output .= '</div>';
		$output .= $column_background;
	$output .= '</div>';
$output .= '</div>';

echo html_entity_decode($output);

<?php

$atts = vc_shortcode_attribute_parse( array(
    'title' => '',
    'title_align' => '',
    'align' => 'align_center',
    'el_width' => '',
    'border_width' => '',
    'style' => '',
    'color' => '',
    'accent_color' => '',
    'el_class' => '',
    'layout' => 'separator_with_text',
    'icon_type' => '',
), $atts );
extract( $atts );

$class = "vc_separator wpb_content_element";

//$el_width = "90";
//$style = 'double';
//$title = '';
//$color = 'blue';

if($layout == 'separator_with_icon') {
	$iconClass = isset( ${"icon_" . $icon_type} ) ? ${"icon_" . $icon_type} : '';
	if($iconClass) {
		vc_icon_element_fonts_enqueue( $icon_type );
		$title='<i class="'.$iconClass.'"></i>'.$title;
	}
}

$class .= ($title_align!='') ? ' vc_'.$title_align : '';
$class .= ($el_width!='') ? ' vc_sep_width_'.$el_width : ' vc_sep_width_100';
$class .= ($style!='') ? ' vc_sep_'.$style : '';
$class .= ($border_width!='') ? ' vc_sep_border_width_'.$border_width : '';
$class .= ($align!='') ? ' vc_sep_pos_'.$align : '';

$class .= ($layout!='') ? ' vc_'.$layout : '';
if( $color!= '' && 'custom' != $color ) {
	$class .= ' vc_sep_color_' . $color;
}
$inline_css = ( 'custom' == $color && $accent_color!='') ? ' style="'.vc_get_css_color('border-color', $accent_color).'"' : '';
$inline_css_h = ( 'custom' == $color && $accent_color!='') ? ' style="'.vc_get_css_color('color', $accent_color).'"' : '';

$class .= $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );

?>
<div class="<?php echo esc_attr(trim($css_class)); ?>">
	<span class="vc_sep_holder vc_sep_holder_l"><span<?php echo  $inline_css; ?> class="vc_sep_line"></span></span>
	<?php if($title!=''): ?><h4<?php echo  $inline_css_h; ?>><?php echo  $title; ?></h4><?php endif; ?>
	<span class="vc_sep_holder vc_sep_holder_r"><span<?php echo  $inline_css; ?> class="vc_sep_line"></span></span>
</div>
<?php echo  $this->endBlockComment('separator')."\n";
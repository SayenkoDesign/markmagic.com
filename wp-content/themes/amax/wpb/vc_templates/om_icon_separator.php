<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
//extract( $atts );

$atts['title']='';
$atts['add_icon']='true';
$atts['i_color']='default';
if(isset($atts['icon_type'])) {
	$atts['i_type']=$atts['icon_type'];
	unset($atts['icon_type']);
}

$sc='[vc_text_separator';

foreach($atts as $k=>$v) {
	if(strpos($k,'icon_') === 0) {
		$k=str_replace('icon_','i_icon_',$k);
	}
	$sc.=' '.$k.'="'.$v.'"';
}

$sc.=']';

echo do_shortcode( $sc );

<?php
/**
 * Shortcodes
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

function xmmusic($atts, $content=null, $code=""){
    return '<div class="sb-xiami" songid="'.$content.'"><div class="sb-player"><div class="sb-cover"></div><div class="sb-info clearfix"><div class="sb-title left"></div><div class="play-timer right">--:--</div></div><div class="play-button"> </div><div class="play-prosess"><div class="play-prosess-bar"></div></div></div><div class="sb-jplayer"></div></div>';
}
add_shortcode('xiami','xmmusic');

add_filter('the_content', 'addhighslideclass_replace');
function addhighslideclass_replace ($content) {
	global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png|swf)('|\")(.*?)>(.*?)<\/a>/i";
	$replacement = '<a$1href=$2$3.$4$5 class="slimbox2" $6>$7</a>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}

add_filter('pre_get_posts','search_filter');
function search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}

function boxattention($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxattention">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('attention' , 'boxattention' );

function boxbag($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxbag">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('bag' , 'boxbag' );

function boxbonus($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxbonus">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('bonus' , 'boxbonus' );

function boxcalendar($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxcalendar">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('calendar' , 'boxcalendar' );

function boxcheck($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxcheck">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('check' , 'boxcheck' );

function boxdelete($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxdelete">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('delete' , 'boxdelete' );

function boxedit($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxedit">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('edit' , 'boxedit' );

function boxflag($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxflag">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('flag' , 'boxflag' );

function boxhelp($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxhelp">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('help' , 'boxhelp' );

function boxinformation($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxinformation">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('information' , 'boxinformation' );

function boxlove($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxlove">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('love' , 'boxlove' );

function boxtag($atts, $content=null, $code="") {
	$return = '<div class="shortbox boxtag">';
	$return .= $content;
	$return .= '</div>';
	return $return;
}
add_shortcode('tag' , 'boxtag' );


 ?>

<?php
/**
 * Functions for articles
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1][0];
    if(empty($first_img)) {
        return false;
    }
    echo '<a href="'.$first_img.'"><img src="'.$first_img.'"/></a>';
}

//删除内容中的图片
function the_content_nopic($more_link_text = null, $stripteaser = false) {
	$content = get_the_content($more_link_text, $stripteaser);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$content = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', "", $content);
	echo $content;
}

function postformat_gallery(){
    global $post;
    ob_start();
    ob_end_clean();
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content,$matches ,PREG_SET_ORDER);
    $cnt = count( $matches );
    if($cnt>0){
        $images = "";
        $nav = "";
        for($i=0; $i<$cnt; $i++){
            $src = $matches[$i][1];
            $images .= '<li data-thumb="'.$src.'"><img src="'.$src.'" /></li>';
        }
		echo $images;
    } else {
		return false;
	}
}

if( dopt('d_lazyload_b') != '' ) {
	add_filter ('the_content', 'lazyload');
	function lazyload($content) {
	    $loadimg_url=get_bloginfo('template_directory').'/loading.gif';
	    if(!is_feed()||!is_robots) {
	        $content=preg_replace('/<img(.+)src=[\'"]([^\'"]+)[\'"](.*)>/i',"<img\$1data-original=\"\$2\" src=\"$loadimg_url\"\$3>\n<noscript>\$0</noscript>",$content);
	    }
	    return $content;
	}
}

 ?>

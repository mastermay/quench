<?php

function post_thumbnail( $width = 180,$height = 180 ,$flag = true) {
    global $post;
    if( has_post_thumbnail() ){
        $timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        if($flag) {
			$post_timthumb = '<a href="'.get_permalink().'"><img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" title="'.get_the_title().'"/></a>';
		} else {
			$post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" title="'.get_the_title().'"/>';
		}
        return $post_timthumb;
    } else {
		$content = $post->post_content;
		preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
		$n = count($strResult[1]);
		if($n > 0){
			if($flag) {
				return '<a href="'.get_permalink().'"><img src="'.get_bloginfo("template_url").'/timthumb.php?w='.$width.'&amp;h='.$height.'&amp;src='.$strResult[1][0].'" title="'.get_the_title().'" alt="'.get_the_title().'"/></a>';
			} else {
				return '<img src="'.get_bloginfo("template_url").'/timthumb.php?w='.$width.'&amp;h='.$height.'&amp;src='.$strResult[1][0].'" title="'.get_the_title().'" alt="'.get_the_title().'"/>';
			}
		} else {
			if($flag) {
				return '<a href="'.get_permalink().'"><img class="rounded" src="'.get_bloginfo('template_url').'/images/random/'.rand(1,7).'.jpg" title="'.get_the_title().'" alt="'.get_the_title().'"/></a>';
			} else {
				return '<img class="rounded" src="'.get_bloginfo('template_url').'/images/random/'.rand(1,7).'.jpg" title="'.get_the_title().'" alt="'.get_the_title().'" width="'.$width.'" height="'.$height.'"/>';
			}
		}
	}
}

 ?>

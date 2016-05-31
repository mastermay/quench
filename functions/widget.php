<?php
/**
 * Functions for widgets
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

// 删除wp自带的小工具
function unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Pages');
	//unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	//unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

function lo_sidebar(){
    register_sidebar(array(
        'id'=>'index_sidebar',
        'name'=>'首页边栏',
		'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</h3></span>',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
    ));

	if( dopt('d_same_sidebar_b') == '' ) {
		register_sidebar(array(
			'id'=>'single_sidebar',
			'name'=>'文章页边栏',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</h3></span>',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
		));

		register_sidebar(array(
			'id'=>'page_sidebar',
			'name'=>'页面边栏',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</h3></span>',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
		));
	}
}
add_action('widgets_init','lo_sidebar');

include (TEMPLATEPATH . '/functions/widgets/author.php');
include (TEMPLATEPATH . '/functions/widgets/bookmarks.php');
include (TEMPLATEPATH . '/functions/widgets/comments.php');
include (TEMPLATEPATH . '/functions/widgets/post.php');
include (TEMPLATEPATH . '/functions/widgets/readers.php');
include (TEMPLATEPATH . '/functions/widgets/search.php');
include (TEMPLATEPATH . '/functions/widgets/tags.php');

?>

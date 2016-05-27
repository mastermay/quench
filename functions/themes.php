<?php
/**
 * Load scripts and styles
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

function my_enqueue_scripts_frontpage() {
	wp_enqueue_style( 'default', get_template_directory_uri() . '/style.min.css', array(), '3.1' );
	wp_enqueue_style( 'fa', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.1.0' );
	//载入jquery库
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.12.4.min.js');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'base', get_template_directory_uri() . '/js/global.min.js', array(), '3.1.1', true);
	wp_enqueue_script( 'slider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '1.0', true);
	wp_enqueue_script( 'slimbox', get_template_directory_uri() . '/js/slimbox2.min.js', array(), '1.0', true);
	wp_enqueue_script( 'jplayer', get_template_directory_uri() . '/js/jquery.jplayer.min.js', array(), '1.0', true);
	wp_enqueue_script( 'lazyload', get_template_directory_uri() . '/js/jquery.lazyload.min.js', array(), '1.0', true);

	if( dopt('d_ajax_b') != '' )
		wp_enqueue_script( 'ajax', get_template_directory_uri() . '/js/ajax.min.js', array(), '1.0.1', true);
	if( dopt('d_autospace_b') != '' )
		wp_enqueue_script( 'autospace', get_template_directory_uri() . '/js/autospace.min.js', array(), '1.0', true);

	wp_localize_script('base', 'ajax', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'home' => home_url()
	));
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts_frontpage' );

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('quench', get_template_directory() . '/languages');
}

register_nav_menus(array('header-menu' => '顶部导航'));

add_theme_support( 'post-formats', array( 'status', 'image', 'gallery', 'audio' ));
add_theme_support( 'post-thumbnails' );

function dopt($e){
    return stripslashes(get_option($e));
}

?>

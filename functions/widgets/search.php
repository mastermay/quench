<?php
/**
 * widget: search 
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

add_action( 'widgets_init', create_function('', 'return register_widget("lo_search");'));

class lo_search extends WP_Widget {
	function lo_search() {
		$widget_ops = array( 'classname' => 'lo_search', 'description' => '站内搜索' );
		$this->__construct( 'lo_search', '站内搜索', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		?>
		<form id="searchform" class="searchform" action="<?php echo get_bloginfo ('url'); ?>" method="GET">
			<div>
				<input name="s" id="s" size="15" placeholder="Enter Keywords..." type="text">
				<input value="Search" type="submit">
			</div>
		</form>
<?php
		echo $after_widget;
	}
	function form($instance) {
?>
		<p>
			<label>
			无选项
			</label>
		</p>

<?php
	}
}


?>

<?php
/**
 * widget: bookmarks
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

add_action( 'widgets_init', create_function('', 'return register_widget("lo_bookmarks");'));

class lo_bookmarks extends WP_Widget {
	function lo_bookmarks() {
		$widget_ops = array( 'classname' => 'lo_bookmarks', 'description' => '友情链接' );
		$this->__construct( 'lo_bookmarks', '友情链接', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_name', $instance['title']);
		$cate = $instance['cate'];
		$limit = $instance['limit'];

		echo $before_widget;
		echo $before_title.$title.$after_title;
		echo '<ul id="bookmarks">';
		echo lo_bookmarks($cate, $limit);
		echo '</ul>';
		echo $after_widget;
	}
	function form($instance) {

?>
		<p>
			<label>
				标题：
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</label>
		</p>
		<p>
			<label>
				分类：
				<select class="widefat" id="<?php echo $this->get_field_id('cate'); ?>" name="<?php echo $this->get_field_name('cate'); ?>" style="width:100%;">
					<?php
					$cates = bookmarks_cate();
					foreach($cates as $key=>$value){
						echo '<option value="'.$key.'" ';
						selected($key, $instance['cate']);
						echo '>'.$value.'</option>';
					}
					?>
				</select>

			</label>
		</p>
		<p>
			<label>
				显示数目：
				<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo $instance['limit']; ?>" />
			</label>
		</p>

<?php
	}
}

function lo_bookmarks($id,$limits){
		if(! $limits) $limits = -1;
		$bookmarks = get_bookmarks('orderby=date&category=' .$id .'&limit='.$limits);
	    $output = '';
	    if ( !empty($bookmarks) ) {
	        foreach ($bookmarks as $bookmark) {
	            $output .=  '<li><img src="//api.byi.pw/favicon/?url=' . $bookmark->link_url . '"><a href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '" target="_blank" >'.  $bookmark->link_name .'</a></li>';
	        }
	    }
	    return $output;
}

?>

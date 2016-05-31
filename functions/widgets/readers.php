<?php
/**
 * widget: readers
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

add_action( 'widgets_init', create_function('', 'return register_widget("lo_reader");'));

class lo_reader extends WP_Widget {
	function lo_reader() {
		$widget_ops = array( 'classname' => 'lo_reader', 'description' => '显示近期评论频繁的网友头像等' );
		$this->__construct( 'lo_reader', '活跃读者', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_name', $instance['title']);
		$limit = $instance['limit'];
		$outer = $instance['outer'];
		$timer = $instance['timer'];
		$addlink = $instance['addlink'];

		echo $before_widget;
		echo $before_title.$title.$after_title;
		echo '<div class="sidebar_readers">';
		echo lo_readers_list( $out=$outer, $tim=$timer, $lim=$limit, $addlink );
		echo '</div>';
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
				显示数目：
				<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo $instance['limit']; ?>" />
			</label>
		</p>
		<p>
			<label>
				排除某人：
				<input class="widefat" id="<?php echo $this->get_field_id('outer'); ?>" name="<?php echo $this->get_field_name('outer'); ?>" type="text" value="<?php echo $instance['outer']; ?>" />
			</label>
		</p>
		<p>
			<label>
				几天内：
				<input class="widefat" id="<?php echo $this->get_field_id('timer'); ?>" name="<?php echo $this->get_field_name('timer'); ?>" type="number" value="<?php echo $instance['timer']; ?>" />
			</label>
		</p>
		<p>
			<label>
				<input style="vertical-align:-3px;margin-right:4px;" class="checkbox" type="checkbox" <?php checked( $instance['addlink'], 'on' ); ?> id="<?php echo $this->get_field_id('addlink'); ?>" name="<?php echo $this->get_field_name('addlink'); ?>">加链接
			</label>
		</p>

<?php
	}
}

function lo_readers_list($out,$tim,$lim,$addlink){
	global $wpdb;
	$counts = $wpdb->get_results("select count(comment_author) as cnt, comment_author, comment_author_url, comment_author_email from (select * from $wpdb->comments left outer join $wpdb->posts on ($wpdb->posts.id=$wpdb->comments.comment_post_id) where comment_date > date_sub( now(), interval $tim day ) and user_id='0' and comment_author != '".$out."' and post_password='' and comment_approved='1' and comment_type='') as tempcmt group by comment_author order by cnt desc limit $lim");
	foreach ($counts as $count) {
		$c_url = $count->comment_author_url;
		if ($c_url == '') $c_url = 'javascript:;';

		if($addlink == 'on'){
			$c_urllink = ' href="'. $c_url . '"';
		}else{
			$c_urllink = '';
		}
		$type .= '<a title="['.$count->comment_author.']" target="_blank"'.$c_urllink.'>'.get_avatar( $count->comment_author_email, $size = '36' , '' ) .'</a>';
	}
	return $type;
}
?>

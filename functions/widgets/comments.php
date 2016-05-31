<?php
/**
 * widget: recent comments
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

add_action( 'widgets_init', create_function('', 'return register_widget("lo_recent_comment");'));

class lo_recent_comment extends WP_Widget {
	function lo_recent_comment() {
		$widget_ops = array( 'classname' => 'lo_recent_comment', 'description' => '显示近期评论' );
		$this->__construct( 'lo_recent_comment', '最近评论', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_name', $instance['title']);
		$limit = $instance['limit'];
		$addlink = !empty($instance['addlink']) ? $instance['addlink'] : 'on';

		echo $before_widget;
		echo $before_title.$title.$after_title;
		echo '<ul id="recentcomments">';
		lo_recent_comment_list($limit, $addlink );
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
				显示数目：
				<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo $instance['limit']; ?>" />
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

function lo_recent_comment_list($lim,$addlink){
	$my_email = get_bloginfo ('admin_email');
	$counts = get_comments('number=200&status=approve&type=comment');
	$i = 1;
	foreach ($counts as $count) {
		if ($count->comment_author_email != $my_email) {
			$c_url = $count->comment_author_url;
			if ($c_url == '') $c_url = 'javascript:;';
			if($addlink == 'on'){
				$c_urllink = ' href="'. $c_url . '"';
			}else{
				$c_urllink = ' href="javascript:;"';
			}
			echo '<li class="recentcomments clearfix"><div class="alignleft">'.get_avatar( $count->comment_author_email, $size = '45' , '' ).
			'</div><div class="comment-right"><span class="comment-author"><a'.$c_urllink.'>'.$count->comment_author.'</a>: </span><div class="comment-c"><a href="'.
			get_permalink($count->comment_post_ID).'#comment-'.$count->comment_ID.'">'.$count->comment_content.
			'</a></div></div></li>';
			if ($i == $lim) break;
			$i++;
		}
	}
}
?>

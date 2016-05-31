<?php
/**
 * widget: post
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

add_action('widgets_init', create_function('', 'return register_widget("lo_siderbar_post");'));

class lo_siderbar_post extends WP_Widget {
	function lo_siderbar_post() {
		global $prename;
		$this->__construct('lo_siderbar_post', $prename.'文章列表', array( 'description' => '多功能文章列表，可按时间、评论、随机排序' ));
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title        = apply_filters('widget_name', $instance['title']);
		$limit        = $instance['limit'];
		$cat          = $instance['cat'];
		$orderby      = $instance['orderby'];

		echo $before_title.$title.$after_title;

		echo lo_posts_list( $orderby,$limit,$cat );

		echo $after_widget;
	}
	function update($new_instance, $old_instance) {
		$instance                 = $old_instance;
		$instance['title']        = strip_tags($new_instance['title']);
		$instance['limit']        = strip_tags($new_instance['limit']);
		$instance['cat']          = strip_tags($new_instance['cat']);
		$instance['orderby']      = strip_tags($new_instance['orderby']);
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'        => '',
			'limit'        => '6',
			'cat'          => '',
			'orderby'      => 'date',
			)
		);
		$title        = strip_tags($instance['title']);
		$limit        = strip_tags($instance['limit']);
		$cat          = strip_tags($instance['cat']);
		$orderby      = strip_tags($instance['orderby']);
?>

		<p>
			<label>
				标题：
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</label>
		</p>
		<p>
			<label>
				排序：
				<select class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" style="width:100%;">
					<option value="comment_count" <?php selected('comment_count', $instance['orderby']); ?>>按评论数</option>
					<option value="date" <?php selected('date', $instance['orderby']); ?>>按发布时间</option>
					<option value="rand" <?php selected('rand', $instance['orderby']); ?>>随机显示</option>
				</select>
			</label>
		</p>
		<p>
			<label>
				分类限制：
				<a style="font-weight:bold;color:#f60;text-decoration:none;" href="javascript:;" title="格式：1,2 &nbsp;表限制ID为1,2分类的文章&#13;格式：-1,-2 &nbsp;表排除分类ID为1,2的文章&#13;也可直接写1或者-1；注意逗号须是英文的">？</a>
				<input class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="text" value="<?php echo esc_attr($cat); ?>" size="24" />
			</label>
		</p>
		<p>
			<label>
				显示数目：
				<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo esc_attr($limit); ?>" size="24" />
			</label>
		</p>
<?php
	}
}

function lo_posts_list($orderby,$limit,$cat) {

	$args = array(
		'order'            => 'DESC',
		'cat'              => $cat,
		'orderby'          => $orderby,
		'showposts'        => $limit,
		'ignore_sticky_posts' => 1
	);

	query_posts($args);
	echo '<div class="smart_post"><ul>';
	while (have_posts()) :
		the_post();
		global $post;
		echo '<li class="clearfix">';
		echo '<div class="post-thumb">';
		echo post_thumbnail(45, 45, false);
		echo '</div>';
		echo '<div class="post-right">';
		echo '<h3><a href="'.get_permalink().'">';
		the_title();
		echo '</a></h3><div class="post-meta"><span>';
		comments_popup_link('No Reply', '1 Reply', '% Replies');
		echo '</span> | <span>';
		lo_post_views(' Views');
		echo '</span></div></div>';
		echo '</li>';
    endwhile; wp_reset_query();
	echo '</ul></div>';
}
?>

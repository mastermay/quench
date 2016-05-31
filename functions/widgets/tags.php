<?php
/**
 * widget: tags
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

add_action('widgets_init', create_function('', 'return register_widget("lo_siderbar_tags");'));

class lo_siderbar_tags extends WP_Widget {
	function lo_siderbar_tags() {
		global $prename;
		$this->__construct('lo_siderbar_tags', $prename.'标签云', array( 'description' => '适配主题的标签云' ));
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$tag_title        = apply_filters('widget_name', $instance['tag_title']);
		$tag_limit        = $instance['tag_limit'];

		echo $before_title.$tag_title.$after_title;

		$tag_args = array(
		'order'         => DESC,
		'orderby'       => count,
		'number'        => $tag_limit,
		);
		$tags_list = get_tags($tag_args);
		if ($tags_list) {
			echo '<div class="tagcloud">';
			foreach($tags_list as $tag) {
				echo '<a href="'.get_tag_link($tag).'">'. $tag->name .'</a>';
			}
			echo '</div>';
		}


		echo $after_widget;
	}
	function update($new_instance, $old_instance) {
		$instance                 = $old_instance;
		$instance['tag_title']        = strip_tags($new_instance['tag_title']);
		$instance['tag_limit']        = strip_tags($new_instance['tag_limit']);
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array(
			'tag_title'        => '',
			'tag_limit'        => '15'
			)
		);
		$tag_title        = strip_tags($instance['tag_title']);
		$tag_limit        = strip_tags($instance['tag_limit']);
?>

		<p>
			<label>
				标题：
				<input class="widefat" id="<?php echo $this->get_field_id('tag_title'); ?>" name="<?php echo $this->get_field_name('tag_title'); ?>" type="text" value="<?php echo $instance['tag_title']; ?>" />
			</label>
		</p>
		<p>
			<label>
				显示数目：
				<input class="widefat" id="<?php echo $this->get_field_id('tag_limit'); ?>" name="<?php echo $this->get_field_name('tag_limit'); ?>" type="number" value="<?php echo esc_attr($tag_limit); ?>" size="24" />
			</label>
		</p>

<?php
	}
}

 ?>

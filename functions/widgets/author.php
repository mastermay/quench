<?php
/**
 * widget: author
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

add_action( 'widgets_init', create_function('', 'return register_widget("lo_admin");'));

class lo_admin extends WP_Widget {
	function lo_admin() {
		$widget_ops = array( 'classname' => 'lo_admin', 'description' => '显示作者的信息机个人简介' );
		$this->__construct( 'lo_admin', '作者信息', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		?>
		<img src="<?php bloginfo('template_directory'); ?>/images/bg_small.jpg">
		<div class="author-body">
			<div class="author_img">
			<?php echo get_avatar( get_the_author_meta('email'), $size = '80' , '' );?>
			</div>
			<div class="author_bio">
				<h3><?php the_author_meta('nickname');?> </h3>
				<p class="muted"><?php the_author_meta('user_description');?> </p>
			</div>
		</div>
		<?php if( dopt('d_sns_open') ) {
			echo '<div class="social">';
			if( dopt('d_rss_b') ) echo '<a class="rss" href="'.dopt('d_rss').'"><i class="fa fa-rss"></i></a>';
			if( dopt('d_mail_b') ) echo '<a class="mail" href="'.dopt('d_mail').'"><i class="fa fa-envelope"></i></a>';
			if( dopt('d_rss_sina_b') ) echo '<a class="weibo" href="'.dopt('d_rss_sina').'"><i class="fa fa-weibo"></i></a>';
			if( dopt('d_rss_twitter_b') ) echo '<a class="twitter" href="'.dopt('d_rss_twitter').'"><i class="fa fa-twitter"></i></a>';
			if( dopt('d_rss_google_b') ) echo '<a class="google" href="'.dopt('d_rss_google').'"><i class="fa fa-google-plus "></i></a>';
			if( dopt('d_rss_facebook_b') ) echo '<a class="facebook" href="'.dopt('d_rss_facebook').'"><i class="fa fa-facebook"></i></a>';
			if( dopt('d_rss_github_b') ) echo '<a class="github" href="'.dopt('d_rss_github').'"><i class="fa fa-github"></i></a>';
			if( dopt('d_rss_tencent_b') ) echo '<a class="tweibo" href="'.dopt('d_rss_tencent').'"><i class="fa fa-tencent-weibo"></i></a>';
			if( dopt('d_rss_linkedin_b') ) echo '<a class="linkedin" href="'.dopt('d_rss_linkedin').'"><i class="fa fa-linkedin"></i></a>';
			//if( dopt('d_rss_b') ) echo '<a class="weixin" href="'.dopt('d_rss').'"><i class="fa fa-weixin"></i></a>';
			echo '</div>';
		}
		?>
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

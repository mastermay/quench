<?php
/**
 * The template for displaying posts in the Status post format
 *
 * Used for index.
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */
?>
<article <?php post_class(); ?>>
	<div class="entry-content" itemprop="description">
        <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 400,"……"); ?>
    </div>
</article>

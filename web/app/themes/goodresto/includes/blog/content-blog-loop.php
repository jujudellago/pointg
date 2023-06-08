<?php
	goodresto_enovathemes_global_variables();

	$blog_container        = (isset($GLOBALS['goodresto_enovathemes']['blog-container']) && $GLOBALS['goodresto_enovathemes']['blog-container']) ? $GLOBALS['goodresto_enovathemes']['blog-container'] : "boxed";
	$blog_sidebar          = (isset($GLOBALS['goodresto_enovathemes']['blog-sidebar']) && $GLOBALS['goodresto_enovathemes']['blog-sidebar']) ? $GLOBALS['goodresto_enovathemes']['blog-sidebar'] : "none";
	$blog_post_size        = (isset($GLOBALS['goodresto_enovathemes']['blog-post-size']) && $GLOBALS['goodresto_enovathemes']['blog-post-size']) ? $GLOBALS['goodresto_enovathemes']['blog-post-size'] : "medium";
	$blog_post_layout      = (isset($GLOBALS['goodresto_enovathemes']['blog-post-layout']) && $GLOBALS['goodresto_enovathemes']['blog-post-layout']) ? $GLOBALS['goodresto_enovathemes']['blog-post-layout'] : "grid";
	$blog_animation_effect = (isset($GLOBALS['goodresto_enovathemes']['blog-animation-effect']) && $GLOBALS['goodresto_enovathemes']['blog-animation-effect']) ? $GLOBALS['goodresto_enovathemes']['blog-animation-effect'] : "none";

	$lazy_class   = ($blog_animation_effect == "none") ? "lazy lazy-load" : "";

	$class = 'blog-layout';
	$class .= ' blog-container-'.$blog_container;
	$class .= ' blog-sidebar-'.$blog_sidebar;
	$class .= ' post-size-'.$blog_post_size;
	$class .= ' blog-layout-'.$blog_post_layout;
	$class .= ' '.$blog_post_layout;

?>
<div id="et-content" class="content et-clearfix padding-false">
	<div class="<?php echo esc_attr($class); ?> <?php echo esc_attr($lazy_class); ?>">
		<div class="container et-clearfix">
			<?php if ($blog_container == "wide" && $blog_sidebar != "none"): ?>
				<p class='post-message warning'><?php echo esc_html__('"Wide" blog container does not work with active blog sidebar. Please either set "Blog sidebar position" to "None" or switch "Blog container" to "Boxed"', 'goodresto'); ?></p>
			<?php else: ?>
				<?php if ($blog_sidebar == "left"): ?>
					<div class="blog-sidebar et-clearfix">
						<?php get_sidebar(); ?>
					</div>
					<div class="blog-content et-clearfix">
						<?php get_template_part( '/includes/blog/content-blog-loop-code' ); ?>
					</div>
				<?php elseif ($blog_sidebar == "right"): ?>
					<div class="blog-content et-clearfix">
						<?php get_template_part( '/includes/blog/content-blog-loop-code' ); ?>
					</div>
					<div class="blog-sidebar et-clearfix">
						<?php get_sidebar(); ?>
					</div>
				<?php else: ?>
					<?php get_template_part( '/includes/blog/content-blog-loop-code' ); ?>
				<?php endif ?>
			<?php endif ?>
		</div>
	</div>
</div>
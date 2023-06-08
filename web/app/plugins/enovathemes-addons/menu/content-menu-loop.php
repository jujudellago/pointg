<?php
	goodresto_enovathemes_global_variables();

	$menu_container        = (isset($GLOBALS['goodresto_enovathemes']['menu-container']) && !empty($GLOBALS['goodresto_enovathemes']['menu-container'])) ? $GLOBALS['goodresto_enovathemes']['menu-container'] : "boxed";
	$menu_post_size        = (isset($GLOBALS['goodresto_enovathemes']['menu-post-size']) && !empty($GLOBALS['goodresto_enovathemes']['menu-post-size'])) ? $GLOBALS['goodresto_enovathemes']['menu-post-size'] : "medium";
	$menu_post_layout      = (isset($GLOBALS['goodresto_enovathemes']['menu-post-layout']) && !empty($GLOBALS['goodresto_enovathemes']['menu-post-layout'])) ? $GLOBALS['goodresto_enovathemes']['menu-post-layout'] : "menu-with-details";
	$menu_animation_effect = (isset($GLOBALS['goodresto_enovathemes']['menu-animation-effect']) && !empty($GLOBALS['goodresto_enovathemes']['menu-animation-effect'])) ? $GLOBALS['goodresto_enovathemes']['menu-animation-effect'] : "none";
	$menu_sidebar          = (isset($GLOBALS['goodresto_enovathemes']['menu-sidebar']) && $GLOBALS['goodresto_enovathemes']['menu-sidebar']) ? $GLOBALS['goodresto_enovathemes']['menu-sidebar'] : "none";

	$lazy_class   = ($menu_animation_effect == "none") ? "lazy lazy-load" : "";

	$class = 'menu-layout';
	$class .= ' menu-container-'.$menu_container;
	$class .= ' menu-sidebar-'.$menu_sidebar;
	$class .= ' post-size-'.$menu_post_size;
	$class .= ' gap-true';
	$class .= ' '.$menu_post_layout;

?>
<div id="et-content" class="content et-clearfix padding-false">
	<div class="<?php echo esc_attr($class); ?> <?php echo $lazy_class; ?>">
		<div class="container et-clearfix">
			<?php if ($menu_container == "wide" && $menu_sidebar != "none"): ?>
				<p class='post-message warning'><?php echo esc_html__('"Wide" menu container does not work with active menu sidebar. Please either set "Blog sidebar position" to "None" or switch "Blog container" to "Boxed"', 'enovathemes-addons'); ?></p>
			<?php else: ?>
				<?php if ($menu_sidebar == "left"): ?>
					<div class="menu-sidebar et-clearfix">
						<?php get_sidebar('restaurant-menu'); ?>
					</div>
					<div class="menu-content et-clearfix">
						<?php include(ENOVATHEMES_ADDONS.'menu/content-menu-loop-code.php'); ?>
					</div>
				<?php elseif ($menu_sidebar == "right"): ?>
					<div class="menu-content et-clearfix">
						<?php include(ENOVATHEMES_ADDONS.'menu/content-menu-loop-code.php'); ?>
					</div>
					<div class="menu-sidebar et-clearfix">
						<?php get_sidebar('restaurant-menu'); ?>
					</div>
				<?php else: ?>
					<?php include(ENOVATHEMES_ADDONS.'menu/content-menu-loop-code.php'); ?>
				<?php endif ?>
			<?php endif ?>
		</div>
	</div>
</div>
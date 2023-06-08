<?php
	goodresto_enovathemes_global_variables();

	$event_container        = (isset($GLOBALS['goodresto_enovathemes']['event-container']) && !empty($GLOBALS['goodresto_enovathemes']['event-container'])) ? $GLOBALS['goodresto_enovathemes']['event-container'] : "boxed";
	$event_post_size        = (isset($GLOBALS['goodresto_enovathemes']['event-post-size']) && !empty($GLOBALS['goodresto_enovathemes']['event-post-size'])) ? $GLOBALS['goodresto_enovathemes']['event-post-size'] : "medium";
	$event_post_layout      = "grid";
	$event_animation_effect = (isset($GLOBALS['goodresto_enovathemes']['event-animation-effect']) && !empty($GLOBALS['goodresto_enovathemes']['event-animation-effect'])) ? $GLOBALS['goodresto_enovathemes']['event-animation-effect'] : "none";
	$event_sidebar          = (isset($GLOBALS['goodresto_enovathemes']['event-sidebar']) && $GLOBALS['goodresto_enovathemes']['event-sidebar']) ? $GLOBALS['goodresto_enovathemes']['event-sidebar'] : "none";

	$lazy_class   = ($event_animation_effect == "none") ? "lazy lazy-load" : "";

	$class = 'event-layout';
	$class .= ' event-container-'.$event_container;
	$class .= ' event-sidebar-'.$event_sidebar;
	$class .= ' post-size-'.$event_post_size;
	$class .= ' '.$event_post_layout;

?>
<div id="et-content" class="content et-clearfix padding-false">
	<div class="<?php echo esc_attr($class); ?> <?php echo $lazy_class; ?>">
		<div class="container et-clearfix">
			<?php if ($event_container == "wide" && $event_sidebar != "none"): ?>
				<p class='post-message warning'><?php echo esc_html__('"Wide" event container does not work with active event sidebar. Please either set "Blog sidebar position" to "None" or switch "Blog container" to "Boxed"', 'enovathemes-addons'); ?></p>
			<?php else: ?>
				<?php if ($event_sidebar == "left"): ?>
					<div class="event-sidebar et-clearfix">
						<?php get_sidebar('event'); ?>
					</div>
					<div class="event-content et-clearfix">
						<?php include(ENOVATHEMES_ADDONS.'event/content-event-loop-code.php'); ?>
					</div>
				<?php elseif ($event_sidebar == "right"): ?>
					<div class="event-content et-clearfix">
						<?php include(ENOVATHEMES_ADDONS.'event/content-event-loop-code.php'); ?>
					</div>
					<div class="event-sidebar et-clearfix">
						<?php get_sidebar('event'); ?>
					</div>
				<?php else: ?>
					<?php include(ENOVATHEMES_ADDONS.'event/content-event-loop-code.php'); ?>
				<?php endif ?>
			<?php endif ?>
		</div>
	</div>
</div>
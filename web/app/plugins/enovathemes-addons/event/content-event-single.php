<?php

	goodresto_enovathemes_global_variables();

	$event_single_sidebar          = (isset($GLOBALS['goodresto_enovathemes']['event-single-sidebar']) && $GLOBALS['goodresto_enovathemes']['event-single-sidebar']) ? $GLOBALS['goodresto_enovathemes']['event-single-sidebar'] : "right";

	$class = 'event-layout-single';
	$class .= ' event-single-sidebar-'.$event_single_sidebar;

?>
<div id="et-content" class="content et-clearfix padding-false">
	<div class="<?php echo esc_attr($class); ?>">
		<div class="container et-clearfix">
			<?php if ($event_single_sidebar == "left"): ?>
				<div class="event-sidebar et-clearfix">
					<?php get_sidebar('event-single'); ?>
				</div>
				<div class="event-content et-clearfix">
					<?php include(ENOVATHEMES_ADDONS.'event/content-event-single-code.php'); ?>
				</div>
			<?php elseif ($event_single_sidebar == "right"): ?>
				<div class="event-content et-clearfix">
					<?php include(ENOVATHEMES_ADDONS.'event/content-event-single-code.php'); ?>
				</div>
				<div class="event-sidebar et-clearfix">
					<?php get_sidebar('event-single'); ?>
				</div>
			<?php else: ?>
				<?php include(ENOVATHEMES_ADDONS.'event/content-event-single-code.php'); ?>
			<?php endif ?>
		</div>
	</div>
</div>
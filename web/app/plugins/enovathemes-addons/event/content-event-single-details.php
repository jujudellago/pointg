<?php
goodresto_enovathemes_global_variables();
$values 		    = get_post_custom( get_the_ID() );
$event_date         = isset( $values['event_date'][0] ) ? date_create($values["event_date"][0]) : "";
$event_time         = isset( $values['event_time'][0] ) ? $values["event_time"][0] : "";
$event_meta         = isset( $values['event_meta'][0] ) ? $values["event_meta"][0] : "";
$event_social_share = (isset($GLOBALS['goodresto_enovathemes']['event-single-social']) && $GLOBALS['goodresto_enovathemes']['event-single-social'] == 1) ? "true" : "false";
?>
<div class="event-meta">
	<div class="event-date-time">
		<?php if (!empty($event_date)): ?>

			<div class="event-date"><?php echo esc_html__("On ", 'enovathemes-addons').date_i18n("F j, Y", strtotime(date_format($event_date,"F j, Y"))); ?></div>
		<?php endif ?>
		<?php if (!empty($event_time)): ?>
			<div class="event-time"><?php echo " / ".$event_time; ?></div>
		<?php endif ?>
	</div>
	<?php if (!empty($event_meta)): ?>
		<div class="event-additional"><?php echo $event_meta ?></div>
	<?php endif ?>
</div>
<?php if (function_exists('enovathemes_addons_post_social_share') && $event_social_share == "true"): ?>
	<?php echo enovathemes_addons_post_social_share('event'); ?>
<?php endif ?>

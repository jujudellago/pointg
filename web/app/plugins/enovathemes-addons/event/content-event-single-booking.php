<?php

	goodresto_enovathemes_global_variables();
	$event_booking = (isset($GLOBALS['goodresto_enovathemes']['event-booking']) && $GLOBALS['goodresto_enovathemes']['event-booking'] == 1) ? "true" : "false";

	$values                 = get_post_custom( get_the_ID() );
    $booking_closed         = isset( $values['booking_closed'] ) ? esc_attr( $values["booking_closed"][0] ) : "false";
    $booking_closed_message = isset( $values['booking_closed_message'] ) ? esc_attr( $values["booking_closed_message"][0] ) : esc_html__('Sorry, but you are too late, all the seats are booked for this event','enovathemes-addons');
    $event_title            = get_the_title( get_the_ID() );
	$event_date             = isset( $values['event_date'][0] ) ? date_create($values["event_date"][0]) : "";
	$event_time             = isset( $values['event_time'][0] ) ? $values["event_time"][0] : "";
	$event_details          = $event_title.' / '.date_format($event_date,"F j, Y").' / '.$event_time;

	$date       = new DateTime($values["event_date"][0]);
	$today      = new DateTime();

	$date  = $date->format('Y-m-d\TH:i:s.uO');
	$today = $today->format('Y-m-d\TH:i:s.uO');

	if ($date < $today) {
		$event_booking = "false";
	}

?>
<?php if ($event_booking == "true"): ?>
	<div class="event-booking">
		<h3><?php echo esc_html__('Book a table for this event', 'enovathemes-addons') ?></h3>
		<p><?php echo esc_html__('After booking our manager will contact you for details', 'enovathemes-addons') ?></p>
		<?php if ($booking_closed == "false"): ?>
			<form name="event-booking-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="event-booking-form" method="POST">
				<div>
					<span class="event-booking-alert event-booking-form-name-valid warning"><?php echo esc_html__('Please enter your name', 'enovathemes-addons'); ?></span>
					<input type="text" name="event_booking_form_name" class="event-booking-form-name" placeholder="<?php echo esc_html__('Name', 'enovathemes-addons'); ?>" />
				</div>

				<div>
					<span class="event-booking-alert event-booking-form-tel-valid warning"><?php echo esc_html__('Please enter your telephone', 'enovathemes-addons'); ?></span>
					<input type="text" name="event_booking_form_tel" class="event-booking-form-tel" placeholder="<?php echo esc_html__('Tel', 'enovathemes-addons'); ?>" />
				</div>

				<div>
					<span class="event-booking-alert event-booking-form-email-valid warning"><?php echo esc_html__('Invalid or empty email', 'enovathemes-addons'); ?></span>
					<input type="text" name="event_booking_form_email" class="event-booking-form-email" placeholder="<?php echo esc_html__('Your Email', 'enovathemes-addons'); ?>" /> 
				</div>

				<div>
					<span class="event-booking-alert event-booking-form-person-valid warning"><?php echo esc_html__('Please choose person number', 'enovathemes-addons'); ?></span>
					<select name="event_booking_form_person" class="event-booking-form-person">
						<option value="none"><?php echo esc_html__('Number of persons', 'enovathemes-addons'); ?></option>
	                    <option value="1"><?php echo esc_html__('1 person', 'enovathemes-addons') ?></option>
	                    <option value="2"><?php echo esc_html__('2 persons', 'enovathemes-addons') ?></option>
	                    <option value="2-5"><?php echo esc_html__('2-5 persons', 'enovathemes-addons') ?></option>
	                    <option value="5-10"><?php echo esc_html__('5-10 persons', 'enovathemes-addons') ?></option>
	                    <option value="10-15"><?php echo esc_html__('10-15 persons', 'enovathemes-addons') ?></option>
	                    <option value="15+"><?php echo esc_html__('15 and more', 'enovathemes-addons') ?></option>
					</select>
				</div>

				<div class="message-div">
					<textarea name="event_booking_form_mgs" class="event-booking-form-mgs" placeholder="<?php echo esc_html__('Additional notes', 'enovathemes-addons'); ?>"></textarea>
				</div>
				<div class="send-div">
					<input type="hidden" name="event_booking_form_details" class="event-booking-form-details" value="<?php echo($event_details); ?>" />
					<input type="hidden" name="action" value="event_booking_form" />
					<input class="event-booking-form-submit" type="submit" value="<?php echo esc_html__('Book event', 'enovathemes-addons'); ?>" name="submit" id="event_booking_form_submit">
					<div class="sending"></div>
				</div>
		    	<div class="event-booking-respond-message event-booking-form-submit-success success"><?php echo esc_html__('Your booking is successfully sent', 'enovathemes-addons'); ?></div>
		    	<div class="event-booking-respond-message event-booking-form-submit-error warning"><?php echo esc_html__('Something went wrong. Your booking was not send.', 'enovathemes-addons'); ?></div>
		    </form>
		<?php else: ?>
			<p class="event-booking-form-booking-alert et-clearfix"><?php echo $booking_closed_message; ?></p>
	    <?php endif ?>
	</div>
<?php endif ?>
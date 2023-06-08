<?php if(is_active_sidebar('event-single-widgets')): ?>
	<div class='event-single-widgets widget-area'>  
		<?php if ( function_exists( 'dynamic_sidebar' )){dynamic_sidebar('event-single-widgets');} ?>
	</div>
<?php endif ?>	

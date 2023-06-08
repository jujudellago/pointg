<?php if(is_active_sidebar('event-widgets')): ?>
	<div class='event-widgets widget-area'>  
		<?php if ( function_exists( 'dynamic_sidebar' )){dynamic_sidebar('event-widgets');} ?>
	</div>
<?php endif ?>	

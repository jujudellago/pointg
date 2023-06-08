<?php if(is_active_sidebar('restaurant-menu-widgets')): ?>
	<div class='restaurant-menu-widgets widget-area'>  
		<?php if ( function_exists( 'dynamic_sidebar' )){dynamic_sidebar('restaurant-menu-widgets');} ?>
	</div>
<?php endif ?>

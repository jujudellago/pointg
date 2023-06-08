<?php
goodresto_enovathemes_global_variables();
$product_navigation           = (isset($GLOBALS['goodresto_enovathemes']['product-navigation']) && $GLOBALS['goodresto_enovathemes']['product-navigation']) ? $GLOBALS['goodresto_enovathemes']['product-navigation'] : "pagination";
$product_navigation_alignment = (isset($GLOBALS['goodresto_enovathemes']['product-navigation-alignment']) && $GLOBALS['goodresto_enovathemes']['product-navigation-alignment']) ? $GLOBALS['goodresto_enovathemes']['product-navigation-alignment'] : "left";
?>
<?php if ($product_navigation == 'pagination'): ?>
	<?php goodresto_enovathemes_post_nav_num('product',$product_navigation_alignment); ?>
<?php elseif($product_navigation == 'loadmore'): ?>
	<div class="ajax-container <?php echo esc_attr($product_navigation_alignment); ?>">
		<div id="product-ajax-loader" class="et-ajax-loader"><?php echo esc_html__("Load more", "goodresto"); ?></div>
		<div id="product-ajax-error" class="et-ajax-error"><?php echo esc_html__("Something went wrong, please try again later or contact the site administrator", "goodresto"); ?></div>
	</div>
<?php else: ?>
	<div class="ajax-container <?php echo esc_attr($product_navigation_alignment); ?>">
		<div id="product-ajax-loading" class="et-ajax-loading"></div>
		<div id="product-ajax-loading-status" class="et-ajax-loading-status"></div>
		<div id="product-ajax-error" class="et-ajax-error"><?php echo esc_html__("Something went wrong, please try again later or contact the site administrator", "goodresto"); ?></div>
	</div>
<?php endif ?>
	
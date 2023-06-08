<?php

    goodresto_enovathemes_global_variables();

	$product_single_sidebar          = (isset($GLOBALS['goodresto_enovathemes']['product-single-sidebar']) && $GLOBALS['goodresto_enovathemes']['product-single-sidebar']) ? $GLOBALS['goodresto_enovathemes']['product-single-sidebar'] : "right";
    $product_single_post_layout      = (isset($GLOBALS['goodresto_enovathemes']['product-single-post-layout']) && !empty($GLOBALS['goodresto_enovathemes']['product-single-post-layout'])) ? $GLOBALS['goodresto_enovathemes']['product-single-post-layout'] : "single-product-tabs-under";

	$class = 'product-layout-single lazy lazy-load';

	$class .= ' product-single-sidebar-'.$product_single_sidebar;
	$class .= ' '.$product_single_post_layout;

?>
<div id="et-content" class="content et-clearfix padding-false">
	<div class="<?php echo esc_attr($class); ?>">
		<div class="container et-clearfix">
			<?php if ($product_single_sidebar == "left"): ?>
				<div class="product-sidebar et-clearfix">
					<?php get_sidebar('shop-single'); ?>
				</div>
				<div class="product-content et-clearfix">
					<?php woocommerce_content(); ?>
					<?php goodresto_enovathemes_post_nav('product',get_the_ID()); ?>
				</div>
			<?php elseif ($product_single_sidebar == "right"): ?>
				<div class="product-content et-clearfix">
					<?php woocommerce_content(); ?>
					<?php goodresto_enovathemes_post_nav('product',get_the_ID()); ?>
				</div>
				<div class="product-sidebar et-clearfix">
					<?php get_sidebar('shop-single'); ?>
				</div>
			<?php else: ?>
				<?php woocommerce_content(); ?>
				<?php goodresto_enovathemes_post_nav('product',get_the_ID()); ?>
			<?php endif ?>
		</div>
	</div>
</div>
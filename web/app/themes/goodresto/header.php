<?php goodresto_enovathemes_global_variables();?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<!-- META TAGS -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=8">
	<!-- LINK TAGS -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	
	
</head>
<body <?php body_class(); ?>>
<?php if ((isset($GLOBALS['goodresto_enovathemes']['layout']) && $GLOBALS['goodresto_enovathemes']['layout'] == "frame")): ?>
	<div class="body-borders">
		<div class="top-border"></div>
		<div class="right-border"></div>
		<div class="bottom-border"></div>
		<div class="left-border"></div>
	</div>
<?php endif ?>
<?php include(get_parent_theme_file_path('/includes/header/header-opt.php')); ?>
<?php get_template_part( '/includes/custom-loading' ); ?>
<?php get_template_part( '/includes/under-construction' ); ?>
<!-- general wrap start -->
<div id="gen-wrap">

	<?php if (class_exists('Woocommerce')): ?>
		<div class="woo-cart et-clearfix">
			<div class="woo-cart-toggle"><?php echo esc_html__("close","goodresto"); ?></div>
			<div class="et-clearfix"></div>
			<div class="woo-cart-content et-clearfix">
				<h4 class="woo-cart-title"><?php echo esc_html__("Cart","goodresto"); ?></h4>
				<?php echo goodresto_enovathemes_get_the_widget( 'WC_Widget_Cart', 'title=Cart' ); ?>
			</div>
		</div>
	<?php endif ?>

	<?php if ($et_booking == "true"): ?>
		<div class="et-booking et-clearfix">
			<div class="et-booking-toggle"><?php echo esc_html__("close","goodresto"); ?></div>
			<div class="et-clearfix"></div>
			<div class="et-booking-content et-clearfix">
				<h4 class="et-booking-title"><?php echo esc_html__("Booking","goodresto"); ?></h4>
				<?php if(shortcode_exists("et_booking")): ?>
					<?php echo(do_shortcode('[et_booking]')); ?>
					<?php if (isset($GLOBALS['goodresto_enovathemes']['booking-text']) && !empty($GLOBALS['goodresto_enovathemes']['booking-text'])): ?>
						<div class="booking-text et-clearfix">
							<?php echo do_shortcode(wp_kses($GLOBALS['goodresto_enovathemes']['booking-text'], wp_kses_allowed_html( 'post' ))); ?>
						</div>
					<?php endif ?>
				<?php endif ?>
			</div>
		</div>
	<?php endif ?>

	<?php if ($et_working_hours == "true"): ?>
		<div class="et-working-hours et-clearfix">
			<div class="et-working-hours-toggle"><?php echo esc_html__("close","goodresto"); ?></div>
			<div class="et-clearfix"></div>
			<div class="et-working-hours-content et-clearfix">

				<?php

					$et_working_hours_logo   = (isset($GLOBALS['goodresto_enovathemes']['working-hours-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['working-hours-logo']['url'])) ? esc_url($GLOBALS['goodresto_enovathemes']['working-hours-logo']['url']) : "";
					$et_working_hours_logo_w = (isset($GLOBALS['goodresto_enovathemes']['working-hours-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['working-hours-logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['working-hours-logo']['width']: "";
					$et_working_hours_logo_h = (isset($GLOBALS['goodresto_enovathemes']['working-hours-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['working-hours-logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['working-hours-logo']['height'] : "";
					if (isset($GLOBALS['goodresto_enovathemes']['working-hours-logo-retina']['url']) && !empty($GLOBALS['goodresto_enovathemes']['working-hours-logo-retina']['url'])) 
					{$et_working_hours_logo  = esc_url($GLOBALS['goodresto_enovathemes']['working-hours-logo-retina']['url']);}

				?>

				<?php if (!empty($et_working_hours_logo)): ?>
					<div class="logo working-hours-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
							<img style="max-width:<?php echo esc_attr($et_working_hours_logo_w); ?>px;max-height:<?php echo esc_attr($et_working_hours_logo_h); ?>px;" src="<?php echo esc_url($et_working_hours_logo); ?>" alt="<?php bloginfo('name'); ?>">
						</a>
					</div>
					<?php $icon_decorative = (isset($GLOBALS['goodresto_enovathemes']['icon-decorative']) && !empty($GLOBALS['goodresto_enovathemes']['icon-decorative'])) ? $GLOBALS['goodresto_enovathemes']['icon-decorative'] : 'icon-sep-sep5'; ?>
					<div class="et-separator-decorative small <?php echo esc_attr($icon_decorative); ?>"></div>
				<?php endif ?>

				<?php if (isset($GLOBALS['goodresto_enovathemes']['working-hours-mf']) && !empty($GLOBALS['goodresto_enovathemes']['working-hours-mf'])): ?>
					<div class="working-hours-title et-clearfix">
						<h6><?php echo esc_html__("Monday - Friday","goodresto"); ?></h6>
						<?php echo esc_attr($GLOBALS['goodresto_enovathemes']['working-hours-mf']); ?>
					</div>
				<?php endif ?>

				<?php if (isset($GLOBALS['goodresto_enovathemes']['working-hours-saturday']) && !empty($GLOBALS['goodresto_enovathemes']['working-hours-saturday'])): ?>
					<div class="working-hours-title et-clearfix">
						<h6><?php echo esc_html__("Saturday","goodresto"); ?></h6>
						<?php echo esc_attr($GLOBALS['goodresto_enovathemes']['working-hours-saturday']); ?>
					</div>
				<?php endif ?>

				<?php if (isset($GLOBALS['goodresto_enovathemes']['working-hours-sunday']) && !empty($GLOBALS['goodresto_enovathemes']['working-hours-sunday'])): ?>
					<div class="working-hours-title et-clearfix">
						<h6><?php echo esc_html__("Sunday","goodresto"); ?></h6>
						<?php echo esc_attr($GLOBALS['goodresto_enovathemes']['working-hours-sunday']); ?>
					</div>
				<?php endif ?>

				<?php if (isset($GLOBALS['goodresto_enovathemes']['working-hours-text']) && !empty($GLOBALS['goodresto_enovathemes']['working-hours-text'])): ?>
					<div class="working-hours-text et-clearfix">
						<?php echo do_shortcode(wp_kses($GLOBALS['goodresto_enovathemes']['working-hours-text'], wp_kses_allowed_html( 'post' ))); ?>
					</div>
				<?php endif ?>

			</div>
		</div>
	<?php endif ?>

	<?php if ($et_sidebar == "true"): ?>
		<div class="site-sidebar">
			<div class="mobile-site-sidebar-toggle"></div>
			<?php get_sidebar('site'); ?>
		</div>
	<?php endif ?>

	<?php if (($et_header_search == "true" && $et_fullscreen_navigation == "false") || ($et_fullscreen_navigation == "true" && $et_fullscreen_search == "true")): ?>
		<div class="header-search-modal">
			<div class="modal-close"></div>
			<?php get_search_form(); ?>
		</div>
	<?php endif ?>

	<?php if ($et_navigation == "sidebar"): ?>
		<?php include(get_parent_theme_file_path('/includes/header/header-sidebar.php')); ?>
	<?php elseif ($et_navigation == "fullscreen"): ?>
		<div class="fullscreen-modal">
			<div class="fullscreen-modal-close"></div>
			<div class="fullscreen-modal-content">
				<?php if (!empty($et_fullscreen_logo)): ?>
					<div class="logo logo-modal">
						<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
							<img class="normal-logo" style="max-width:<?php echo esc_attr($et_fullscreen_logo_w); ?>px;max-height:<?php echo esc_attr($et_fullscreen_logo_h); ?>px;" src="<?php echo esc_url($et_fullscreen_logo); ?>" alt="<?php bloginfo('name'); ?>">
						</a>
					</div>
				<?php endif ?>
				<?php if(has_nav_menu("fullscreen-menu")): ?>
					<?php $fullscreen_menu_color_reg = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-menu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['fullscreen-menu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['fullscreen-menu-color']['regular'] : '#ffffff'; ?>
					<nav class="fullscreen-menu et-clearfix" data-color="<?php echo esc_attr($fullscreen_menu_color_reg); ?>">
						<?php wp_nav_menu($fullscreenarg); ?>
					</nav>
				<?php endif; ?>
			</div>
		</div>
	<?php elseif ($et_navigation == "default"): ?>
		<?php $mob_menu_color_reg = (isset($GLOBALS['goodresto_enovathemes']['mob-header-menu-color']['regular']) && !empty($GLOBALS['goodresto_enovathemes']['mob-header-menu-color']['regular'])) ? $GLOBALS['goodresto_enovathemes']['mob-header-menu-color']['regular'] : '#616161'; ?>
		<div class="mobile-navigation" data-color="<?php echo esc_attr($mob_menu_color_reg); ?>">
			<div class="mob-menu-toggle-alt"></div>
			<?php if ($et_mob_header_shop_cart == "true"): ?>
				<?php if (class_exists('Woocommerce')): ?>
					<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php echo esc_attr__('View your shopping cart', 'goodresto'); ?>">
		                <span class="cart-title"><?php echo esc_html__('Cart','goodresto'); ?></span>
		                <span class="cart-total"><?php echo html_entity_decode($GLOBALS['woocommerce']->cart->get_cart_total()); ?></span>
		                <span class="cart-info"><?php echo esc_attr($GLOBALS['woocommerce']->cart->cart_contents_count); ?></span>
		            </a>
				<?php endif ?>
			<?php endif ?>

			<?php if (function_exists('icl_object_id')): ?>
				<?php if ($et_mob_language_switcher == "true"): ?>
					<div class="language-switcher et-clearfix">
						<?php do_action('icl_language_selector'); ?>
					</div>
				<?php endif ?>
			<?php endif ?>

			<?php if ($et_logo_position == "center" && $et_menu_under_logo == "false"): ?>
				
				<nav class="mob-menu et-clearfix">

					<?php if (has_nav_menu("mobile-menu")): ?>
						<?php wp_nav_menu($mobarg_main); ?>
					<?php else: ?>
						<?php if(has_nav_menu("header-menu-left")): ?>
							<?php wp_nav_menu($mobarg_1); ?>
						<?php endif ?>
						<?php if(has_nav_menu("header-menu-right")): ?>
							<?php wp_nav_menu($mobarg_2); ?>
						<?php endif ?>
					<?php endif ?>
					<?php if ($et_mob_header_top == "true"): ?>
						<?php if(has_nav_menu("top-menu")): ?>
							<?php wp_nav_menu($toparg); ?>
						<?php endif; ?>
					<?php endif; ?>
				</nav>

			<?php else: ?>

				<?php if(has_nav_menu("header-menu")): ?>
					<nav class="mob-menu et-clearfix">
						<?php if (has_nav_menu("mobile-menu")): ?>
							<?php wp_nav_menu($mobarg_main); ?>
						<?php else: ?>
							<?php if(has_nav_menu("header-menu")): ?>
								<?php wp_nav_menu($mobarg); ?>
							<?php endif; ?>
						<?php endif; ?>
						<?php if ($et_mob_header_top == "true"): ?>
							<?php if(has_nav_menu("top-menu")): ?>
								<?php wp_nav_menu($toparg); ?>
							<?php endif; ?>
						<?php endif; ?>
					</nav>
				<?php endif; ?>

			<?php endif; ?>
		</div>
	<?php endif ?>

	<!-- wrap start -->
	<div id="wrap" data-navigation="<?php echo esc_attr($et_navigation); ?>" data-sidebar-pos="<?php echo esc_attr($et_sidebar_position); ?>">

		<?php include(get_parent_theme_file_path('/includes/header/header-mob.php')); ?>
		<?php
			$wishlistpage    = "false";
			$wishlistpage_id = get_option('yith_wcwl_wishlist_page_id');
			if (defined('YITH_WCWL') && !empty($wishlistpage_id)) {
				$wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
			}
		?>
		<div class="overlay"></div>
		<div class="overlay-cart"></div>
		<div class="overlay-booking"></div>
		<div class="overlay-working-hours"></div>
		<?php if ($et_navigation == "sidebar"): ?>
			<?php if ($wishlistpage == "true"): ?>
				<div class="page-content-wrap">
				<?php get_template_part( '/woocommerce/content-product-header' ); ?>
			<?php else: ?>
				<?php if (is_page()): ?>
					<div class="page-content-wrap">
					<?php get_template_part( '/includes/page/content-page-header' ); ?>
				<?php else: ?>
					<?php if (class_exists('Woocommerce')): ?>
						<?php if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url()) : ?>
							<div class="page-content-wrap">
							<?php get_template_part( '/woocommerce/content-product-header' ); ?>
						<?php else: ?>
							<div class="page-content-wrap">
						<?php endif; ?>
					<?php else: ?>
						<div class="page-content-wrap">
					<?php endif ?>
				<?php endif; ?>
			<?php endif ?>
		<?php elseif ($et_navigation == "fullscreen"): ?>
			<?php include(get_parent_theme_file_path('/includes/header/header-fullscreen.php')); ?>
			<?php if ($wishlistpage == "true"): ?>
				<div class="page-content-wrap">
				<?php get_template_part( '/woocommerce/content-product-header' ); ?>
			<?php else: ?>
				<?php if (is_page()): ?>
					<div class="page-content-wrap">
					<?php get_template_part( '/includes/page/content-page-header' ); ?>
				<?php else: ?>
					<?php if (class_exists('Woocommerce')): ?>
						<?php if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url()) : ?>
							<div class="page-content-wrap">
							<?php get_template_part( '/woocommerce/content-product-header' ); ?>
						<?php else: ?>
							<div class="page-content-wrap">
						<?php endif; ?>
					<?php else: ?>
						<div class="page-content-wrap">
					<?php endif ?>
				<?php endif; ?>
			<?php endif ?>
		<?php else: ?>
			<?php if ($wishlistpage == "true"): ?>
				<?php include(get_parent_theme_file_path('/includes/header/header-desk.php')); ?>
				<div class="page-content-wrap sticky-status-<?php echo esc_attr($et_sticky_header); ?>">
				<?php get_template_part( '/woocommerce/content-product-header' ); ?>
			<?php else: ?>
				<?php if (is_page() && !is_home()): ?>
					<?php 
						$values        = get_post_custom( get_the_ID() );
						$et_rev_slider = (isset($values["rev_slider"][0])) ? $values["rev_slider"][0] : "";
					?>
					<?php if ($et_header_under_slider == "true" && (shortcode_exists("rev_slider") && !empty($et_rev_slider))): ?>
						<div class="page-content-wrap revolution-slider-active sticky-status-<?php echo esc_attr($et_sticky_header); ?> top-status-<?php echo esc_attr($et_header_top); ?> under-logo-status-<?php echo esc_attr($et_menu_under_logo); ?>">
						<?php get_template_part( '/includes/page/content-page-header' ); ?>
					<?php else: ?>	
						<?php include(get_parent_theme_file_path('/includes/header/header-desk.php')); ?>
						<div class="page-content-wrap sticky-status-<?php echo esc_attr($et_sticky_header); ?>">
						<?php if (class_exists('Woocommerce')): ?>
							<?php if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url()): ?>
								<?php get_template_part( '/woocommerce/content-product-header' ); ?>
							<?php else: ?>
								<?php if (!is_shop() && !is_product_category() && !is_product_tag()): ?>
									<?php get_template_part( '/includes/page/content-page-header' ); ?>
								<?php endif ?>
							<?php endif ?>
						<?php else: ?>
							<?php get_template_part( '/includes/page/content-page-header' ); ?>
						<?php endif ?>
					<?php endif ?>
				<?php else: ?>
					<?php include(get_parent_theme_file_path('/includes/header/header-desk.php')); ?>
					<div class="page-content-wrap sticky-status-<?php echo esc_attr($et_sticky_header); ?>">
				<?php endif; ?>
			<?php endif ?>
		<?php endif ?>
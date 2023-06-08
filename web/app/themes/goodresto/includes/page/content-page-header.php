<?php
	goodresto_enovathemes_global_variables();
	$values                            = get_post_custom( get_the_ID() );
	
	$et_rev_slider                     = (isset($values["rev_slider"][0])) ? $values["rev_slider"][0] : "";
	$et_header_under_slider            = (isset($GLOBALS['goodresto_enovathemes']['header-under-slider']) && $GLOBALS['goodresto_enovathemes']['header-under-slider'] == 1) ? "true" : "false";
	$et_fullscreen_navigation          = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-navigation']) && $GLOBALS['goodresto_enovathemes']['fullscreen-navigation'] == 1) ? "true" : "false";
	$et_sidebar_navigation             = (isset($GLOBALS['goodresto_enovathemes']['sidebar-navigation']) && $GLOBALS['goodresto_enovathemes']['sidebar-navigation'] == 1) ? "true" : "false";
    
    $page_title_opacity                = (isset($GLOBALS['goodresto_enovathemes']['page-title-opacity']) && $GLOBALS['goodresto_enovathemes']['page-title-opacity'] == 1) ? "true" : "false";
    
    $title_section                     = isset( $values['title_section'][0]) ? $values['title_section'][0] : "true";
    $title_section_back_img_attachment = isset( $values['title_section_back_img_attachment'][0] ) ? esc_attr( $values["title_section_back_img_attachment"][0] ) : 'scroll';
    $title_section_parallax            = isset( $values['title_section_parallax'][0] ) ? esc_attr( $values["title_section_parallax"][0] ) : 'false';
    $title_section_subtitle            = isset( $values['title_section_subtitle'][0] ) ? esc_attr( $values["title_section_subtitle"][0] ) : "";

    $page_breadcrumbs                  = (isset($GLOBALS['goodresto_enovathemes']['page-breadcrumbs']) && $GLOBALS['goodresto_enovathemes']['page-breadcrumbs'] == 1) ? "true" : "false";

    $title_text_align     = (isset($GLOBALS['goodresto_enovathemes']['page-title-text-align']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-text-align']) ) ? 'page-title-text-align-'.$GLOBALS['goodresto_enovathemes']['page-title-text-align'] : 'page-title-text-align-center';
    $title_text_align_mob = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-text-align']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-title-text-align']) ) ? 'mob-page-title-text-align-'.$GLOBALS['goodresto_enovathemes']['mob-page-title-text-align'] : 'mob-page-title-text-align-center';
    $et_navigation     = "default";

	if ($et_fullscreen_navigation == "true") {
    	$et_navigation = "fullscreen";
    }

	if ($et_sidebar_navigation == "true") {
    	$et_navigation = "sidebar";
    }

    if ($et_sidebar_navigation == "false" && $et_fullscreen_navigation == "false") {
    	$et_navigation = "default";
    }

?>
<?php if(shortcode_exists("rev_slider") && !empty($et_rev_slider)): ?>
	<?php echo(do_shortcode('[rev_slider '.$et_rev_slider.']')); ?>
	<?php if ($et_header_under_slider == "true" && $et_navigation == "default"): ?>
		<div class="revolution-slider-active">
			<?php include(get_parent_theme_file_path('/includes/header/header-desk.php')); ?>
		</div>
	<?php endif ?>
<?php else: ?>
	<?php if ($title_section != "false"): ?>
		<header class="rich-header page-header <?php echo esc_attr($title_text_align); ?> <?php echo esc_attr($title_text_align_mob); ?>" data-opacity="<?php echo esc_attr($page_title_opacity); ?>" data-parallax="<?php echo esc_attr($title_section_parallax); ?>" data-fixed="<?php echo esc_attr($title_section_parallax); ?>">
			<?php if ($title_section_parallax == "true"): ?>
				<div class="parallax-container">&nbsp;</div>
			<?php endif ?>
			<?php if ($title_section_back_img_attachment == "fixed"): ?>
				<div class="fixed-container">&nbsp;</div>
			<?php endif ?>
			<div class="container">
				<div class="rh-content et-clearfix">
					<div class="rh-title">
						<h1><?php echo the_title_attribute( 'echo=0' ); ?></h1>
						<?php if (!empty($title_section_subtitle)): ?>
							<div class="separator"></div>
							<p><?php echo esc_attr($title_section_subtitle); ?></p>
						<?php endif ?>						
					</div>
					<?php if ( $page_breadcrumbs == "true" && function_exists('enovathemes_addons_breadcrumbs')): ?>
						<div class="et-breadcrumbs et-clearfix"><?php enovathemes_addons_breadcrumbs(); ?></div>
					<?php endif ?>
				</div>
			</div>
		</header>
	<?php endif ?>
<?php endif ?>




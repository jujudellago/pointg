<?php
    goodresto_enovathemes_global_variables();


    $blog_title = "true";

    if (isset($GLOBALS['goodresto_enovathemes']['blog-title']) && $GLOBALS['goodresto_enovathemes']['blog-title'] == 0) {
        $blog_title = "false";
    }

    $blog_title_back_img_attachment    = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment'] : 'scroll';
    $blog_title_parallax               = (isset($GLOBALS['goodresto_enovathemes']['blog-title-parallax']) && $GLOBALS['goodresto_enovathemes']['blog-title-parallax'] == 1) ? "true" : "false";
    $blog_title_opacity                = (isset($GLOBALS['goodresto_enovathemes']['page-title-opacity']) && $GLOBALS['goodresto_enovathemes']['page-title-opacity'] == 1) ? "true" : "false";
    $blog_title_text                   = (isset($GLOBALS['goodresto_enovathemes']['blog-title-text']) && $GLOBALS['goodresto_enovathemes']['blog-title-text']) ? $GLOBALS['goodresto_enovathemes']['blog-title-text'] : '';
    $blog_subtitle_text                = (isset($GLOBALS['goodresto_enovathemes']['blog-subtitle-text']) && $GLOBALS['goodresto_enovathemes']['blog-subtitle-text']) ? $GLOBALS['goodresto_enovathemes']['blog-subtitle-text'] : '';
    $blog_breadcrumbs                  = (isset($GLOBALS['goodresto_enovathemes']['blog-breadcrumbs']) && $GLOBALS['goodresto_enovathemes']['blog-breadcrumbs'] == 1) ? "true" : "false";
    
    $page_title_text_align     = (isset($GLOBALS['goodresto_enovathemes']['page-title-text-align']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-text-align']) ) ? 'page-title-text-align-'.$GLOBALS['goodresto_enovathemes']['page-title-text-align'] : 'page-title-text-align-center';
    $page_title_text_align_mob = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-text-align']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-title-text-align']) ) ? 'mob-page-title-text-align-'.$GLOBALS['goodresto_enovathemes']['mob-page-title-text-align'] : 'mob-page-title-text-align-center';
    $et_header_under_slider    = (isset($GLOBALS['goodresto_enovathemes']['header-under-slider']) && $GLOBALS['goodresto_enovathemes']['header-under-slider'] == 1) ? "true" : "false";
    $et_fullscreen_navigation  = (isset($GLOBALS['goodresto_enovathemes']['fullscreen-navigation']) && $GLOBALS['goodresto_enovathemes']['fullscreen-navigation'] == 1) ? "true" : "false";
    $et_sidebar_navigation     = (isset($GLOBALS['goodresto_enovathemes']['sidebar-navigation']) && $GLOBALS['goodresto_enovathemes']['sidebar-navigation'] == 1) ? "true" : "false";
    $slider_settings           = get_option('archive_slider_settings');
    $slider                    = isset($slider_settings["blog_slider_id"]) ? $slider_settings["blog_slider_id"] : "none";

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

    $blog_filter = (is_category() || is_tag() || is_day() || is_month() || is_year() || is_author() || is_single()) ? "true" : "false";
?>
<?php if(shortcode_exists("rev_slider") && $slider != "none" && $blog_filter == "false"): ?>
    <?php echo(do_shortcode('[rev_slider '.$slider.']')); ?>
    <?php if ($et_header_under_slider == "true" && $et_navigation == "default"): ?>
        <div class="revolution-slider-active">
            <?php include(get_parent_theme_file_path('/includes/header/header-desk.php')); ?>
        </div>
    <?php endif ?>
<?php else: ?>
    <?php if ($blog_title != "false"): ?>
        <header class="rich-header blog-header <?php echo esc_attr($page_title_text_align); ?> <?php echo esc_attr($page_title_text_align_mob); ?>" data-opacity="<?php echo esc_attr($blog_title_opacity); ?>" data-parallax="<?php echo esc_attr($blog_title_parallax); ?>" data-fixed="<?php echo esc_attr($blog_title_parallax); ?>">
            <?php if ($blog_title_parallax == "true"): ?>
                <div class="parallax-container">&nbsp;</div>
            <?php endif ?>
            <?php if ($blog_title_back_img_attachment == "fixed"): ?>
                <div class="fixed-container">&nbsp;</div>
            <?php endif ?>
            <div class="container">
                <div class="rh-content et-clearfix">
                    <div class="rh-title">
                        <?php if (is_category()): ?>
                            <h1><?php echo single_cat_title("", true); ?></h1>
                        <?php elseif(is_tag()): ?>
                            <h1><?php echo single_tag_title("", true); ?></h1>
                        <?php elseif(is_day()): ?>
                            <h1><?php echo get_the_date('F dS Y'); ?></h1>
                        <?php elseif(is_month()): ?>
                            <h1><?php echo get_the_date('Y, F'); ?></h1>
                        <?php elseif(is_year()): ?>
                            <h1><?php echo get_the_date('Y'); ?></h1>
                        <?php elseif(is_author()): ?>
                            <?php
                                $userdata    = get_userdata($GLOBALS['author']);
                                $author      = (!empty($userdata->first_name) && !empty($userdata->last_name)) ? esc_attr($userdata->first_name)." ".esc_attr($userdata->last_name) : $userdata->user_login;
                            ?>
                            <h1><?php echo esc_html__("Articles posted by", 'goodresto'); ?> "<?php echo esc_attr($author); ?>"</h1>
                        <?php else: ?>
                            <?php if (!empty($blog_title_text)): ?>
                                <h1><?php echo esc_attr($blog_title_text); ?></h1>
                            <?php else: ?>
                                <h1><?php echo esc_html__("Blog", 'goodresto'); ?></h1>
                            <?php endif ?>
                        <?php endif; ?>  
                        <?php if (!empty($blog_subtitle_text)): ?>
                            <div class="separator"></div>
                            <p><?php echo esc_attr($blog_subtitle_text); ?></p>
                        <?php endif ?>                      
                    </div>
                    <?php if ($blog_breadcrumbs == "true" && function_exists('enovathemes_addons_breadcrumbs')): ?>
                        <div class="et-breadcrumbs et-clearfix"><?php enovathemes_addons_breadcrumbs(); ?></div>
                    <?php endif ?>
                </div>
            </div>
        </header>
    <?php endif ?>
<?php endif ?>
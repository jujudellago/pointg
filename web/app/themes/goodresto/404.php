<?php get_header(); ?>
<?php
    goodresto_enovathemes_global_variables();

    $blog_breadcrumbs                  = (isset($GLOBALS['goodresto_enovathemes']['blog-breadcrumbs']) && $GLOBALS['goodresto_enovathemes']['blog-breadcrumbs'] == 1) ? "true" : "false";

    $tech_title                        = (isset($GLOBALS['goodresto_enovathemes']['blog-title']) && $GLOBALS['goodresto_enovathemes']['blog-title'] == 1) ? "true" : "false";
    $tech_title_back_img_attachment    = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment'] : 'scroll';
    $tech_title_parallax               = (isset($GLOBALS['goodresto_enovathemes']['blog-title-parallax']) && $GLOBALS['goodresto_enovathemes']['blog-title-parallax'] == 1) ? "true" : "false";
    $tech_title_opacity                = (isset($GLOBALS['goodresto_enovathemes']['page-title-opacity']) && $GLOBALS['goodresto_enovathemes']['page-title-opacity'] == 1) ? "true" : "false";
    $tech_title_text                   = (isset($GLOBALS['goodresto_enovathemes']['blog-title-text']) && $GLOBALS['goodresto_enovathemes']['blog-title-text']) ? $GLOBALS['goodresto_enovathemes']['blog-title-text'] : '';
    $tech_subtitle_text                = (isset($GLOBALS['goodresto_enovathemes']['blog-subtitle-text']) && $GLOBALS['goodresto_enovathemes']['blog-subtitle-text']) ? $GLOBALS['goodresto_enovathemes']['blog-subtitle-text'] : '';

    $page_title_text_align     = (isset($GLOBALS['goodresto_enovathemes']['page-title-text-align']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-text-align']) ) ? 'page-title-text-align-'.$GLOBALS['goodresto_enovathemes']['page-title-text-align'] : 'page-title-text-align-left';
    $page_title_text_align_mob = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-text-align']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-title-text-align']) ) ? 'mob-page-title-text-align-'.$GLOBALS['goodresto_enovathemes']['mob-page-title-text-align'] : 'mob-page-title-text-align-left';
    
?>
<?php if ($tech_title != "false"): ?>
    <header class="rich-header tech-header <?php echo esc_attr($page_title_text_align); ?> <?php echo esc_attr($page_title_text_align_mob); ?>" data-opacity="<?php echo esc_attr($tech_title_opacity); ?>" data-parallax="<?php echo esc_attr($tech_title_parallax); ?>" data-fixed="<?php echo esc_attr($tech_title_parallax); ?>">
        <?php if ($tech_title_parallax == "true"): ?>
            <div class="parallax-container">&nbsp;</div>
        <?php endif ?>
        <?php if ($tech_title_back_img_attachment == "fixed"): ?>
            <div class="fixed-container">&nbsp;</div>
        <?php endif ?>
        <div class="container">
            <div class="rh-content et-clearfix">
                <div class="rh-title">
                    <?php if (!empty($tech_title_text)): ?>
                        <h1><?php echo esc_attr($tech_title_text); ?></h1>
                    <?php else: ?>
                        <h1><?php echo esc_html__("404 page not found", 'goodresto'); ?></h1>
                    <?php endif ?>
                    <?php if (!empty($tech_subtitle_text)): ?>
                        <div class="separator"></div>
                        <p><?php echo esc_attr($tech_subtitle_text); ?></p>
                    <?php endif ?>                      
                </div>
                <?php if ($blog_breadcrumbs == "true" && function_exists('enovathemes_addons_breadcrumbs')): ?>
                    <div class="et-breadcrumbs et-clearfix"><?php enovathemes_addons_breadcrumbs(); ?></div>
                <?php endif ?>
            </div>
        </div>
    </header>
<?php endif ?>
<div id="et-content" class="content et-clearfix padding-false">
    <div class="tech-layout">
        <div class="container et-clearfix">
            <div class="message404 et-clearfix">
                    <h1 class="error404-default-title">40<span class="transform-error">4</span></h1>
                    <p class="error404-default-subtitle"><?php echo esc_html__('Page not found','goodresto'); ?></p>
                    <p class="error404-default-description"><?php echo esc_html__('The page you are looking for could not be found.','goodresto'); ?></p>
                    <div class="sep-wrap center  et-clearfix">
                        <?php $icon_decorative = (isset($GLOBALS['goodresto_enovathemes']['icon-decorative']) && !empty($GLOBALS['goodresto_enovathemes']['icon-decorative'])) ? $GLOBALS['goodresto_enovathemes']['icon-decorative'] : 'icon-sep-sep5'; ?>
                        <div class="et-separator-decorative small <?php echo esc_attr($icon_decorative); ?>"></div>
                    </div>
                <br>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="error404-button et-button large" title="<?php echo esc_attr__('Go to home','goodresto'); ?>"><?php echo esc_html__('Homepage','goodresto'); ?></a>
            </div> 
        </div>
    </div>
</div>
<?php get_footer(); ?>

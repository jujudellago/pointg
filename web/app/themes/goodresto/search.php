<?php get_header(); ?>
<?php
    goodresto_enovathemes_global_variables();
    
    $tech_title                        = (isset($GLOBALS['goodresto_enovathemes']['tech-title']) && $GLOBALS['goodresto_enovathemes']['tech-title'] == 1) ? "true" : "false";
    $tech_title_back_img_attachment    = (isset($GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment']) && $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment']) ? $GLOBALS['goodresto_enovathemes']['blog-title-back']['background-attachment'] : 'scroll';
    $tech_title_parallax               = (isset($GLOBALS['goodresto_enovathemes']['blog-title-parallax']) && $GLOBALS['goodresto_enovathemes']['blog-title-parallax'] == 1) ? "true" : "false";
    $tech_title_opacity                = (isset($GLOBALS['goodresto_enovathemes']['page-title-opacity']) && $GLOBALS['goodresto_enovathemes']['page-title-opacity'] == 1) ? "true" : "false";

    $blog_breadcrumbs                  = (isset($GLOBALS['goodresto_enovathemes']['blog-breadcrumbs']) && $GLOBALS['goodresto_enovathemes']['blog-breadcrumbs'] == 1) ? "true" : "false";

    $page_title_text_align     = (isset($GLOBALS['goodresto_enovathemes']['page-title-text-align']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-text-align']) ) ? 'page-title-text-align-'.$GLOBALS['goodresto_enovathemes']['page-title-text-align'] : 'page-title-text-align-left';
    $page_title_text_align_mob = (isset($GLOBALS['goodresto_enovathemes']['mob-page-title-text-align']) && !empty($GLOBALS['goodresto_enovathemes']['mob-page-title-text-align']) ) ? 'mob-page-title-text-align-'.$GLOBALS['goodresto_enovathemes']['mob-page-title-text-align'] : 'mob-page-title-text-align-left';
    
    $class = 'tech-layout';
?>
<?php if ($tech_title == "true"): ?>
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
                    <h1><?php echo esc_html__("Search", 'goodresto'); ?></h1>
                </div>
                <?php if ($blog_breadcrumbs == "true" && function_exists('enovathemes_addons_breadcrumbs')): ?>
                    <div class="et-breadcrumbs et-clearfix"><?php enovathemes_addons_breadcrumbs(); ?></div>
                <?php endif ?>
            </div>
        </div>
    </header>
<?php endif ?>
<?php $total_results = $wp_query->found_posts; ?>
<div id="et-content" class="content et-clearfix padding-false">
    <div class="<?php echo esc_attr($class); ?>">
        <div class="container et-clearfix">

            <div class="tech-page-search-form">
                <?php echo get_search_form(); ?>
            </div>
            <div class="search-results-title">
                <?php echo esc_attr($total_results).esc_html__(' search results for', 'goodresto').' <strong><i>"'.get_search_query().'</i></strong>"'; ?>
            </div>
            <div class="search-posts">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <?php $post_type = get_post_type( get_the_ID() ); ?>

                        <article <?php post_class('search-term') ?> id="post-<?php the_ID(); ?>">
                            <div class="post-body">

                                <?php if ( '' != the_title_attribute( 'echo=0' ) ): ?>
                                    <h4 class="post-title entry-title">
                                        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr__("Go to", 'goodresto').' '.the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                <?php endif; ?>
                                <?php if ( '' != get_the_content() ): ?>
                                <div class="post-excerpt et-clearfix">
                                    <?php the_excerpt(); ?>
                                </div>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="post-read-more search-button"><?php echo esc_html__("Read more", 'goodresto'); ?><span class="screen-reader-text"> <?php the_title();?></span></a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <?php goodresto_enovathemes_post_nav_num('general','left'); ?>
                <?php else : ?>
                    <div class="suggestions">
                        <p><strong><?php echo esc_html__('Suggestions:', 'goodresto'); ?></strong></p>
                        <ol>
                            <li><?php echo esc_html__('Make sure that all words are spelled correctly', 'goodresto'); ?></li>
                            <li><?php echo esc_html__('Try different keywords', 'goodresto'); ?></li>
                            <li><?php echo esc_html__('Try more general keywords', 'goodresto'); ?></li>
                            <li><?php echo esc_html__('Try fewer keywords', 'goodresto'); ?></li>
                        </ol>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>
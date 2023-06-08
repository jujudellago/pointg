<?php
	goodresto_enovathemes_global_variables();

	$event_post_layout  	    = "grid";
    $event_container   	        = (isset($GLOBALS['goodresto_enovathemes']['event-container']) && !empty($GLOBALS['goodresto_enovathemes']['event-container'])) ? $GLOBALS['goodresto_enovathemes']['event-container'] : "boxed";
    $event_post_size   	        = (isset($GLOBALS['goodresto_enovathemes']['event-post-size']) && !empty($GLOBALS['goodresto_enovathemes']['event-post-size'])) ? $GLOBALS['goodresto_enovathemes']['event-post-size'] : "medium";
	$event_animation_effect     = (isset($GLOBALS['goodresto_enovathemes']['event-animation-effect']) && !empty($GLOBALS['goodresto_enovathemes']['event-animation-effect'])) ? $GLOBALS['goodresto_enovathemes']['event-animation-effect'] : "none";
	$event_navigation           = (isset($GLOBALS['goodresto_enovathemes']['event-navigation']) && !empty($GLOBALS['goodresto_enovathemes']['event-navigation'])) ? $GLOBALS['goodresto_enovathemes']['event-navigation'] : "pagination";
	$event_navigation_alignment = (isset($GLOBALS['goodresto_enovathemes']['event-navigation-alignment']) && !empty($GLOBALS['goodresto_enovathemes']['event-navigation-alignment'])) ? $GLOBALS['goodresto_enovathemes']['event-navigation-alignment'] : "center";
	$event_image_effect         = (isset($GLOBALS['goodresto_enovathemes']['event-image-effect']) && !empty($GLOBALS['goodresto_enovathemes']['event-image-effect'])) ? $GLOBALS['goodresto_enovathemes']['event-image-effect'] : "overlay-fade";

	$event_ajax_filter = (isset($GLOBALS['goodresto_enovathemes']['event-filter']) && $GLOBALS['goodresto_enovathemes']['event-filter'] == 1) ? "true" : "false";
	$events_per_page   = (isset($GLOBALS['goodresto_enovathemes']['event-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['event-per-page'])) ? $GLOBALS['goodresto_enovathemes']['event-per-page'] : get_option( 'posts_per_page' );
    $paged               = (get_query_var('page')) ? get_query_var('page') : 1;

    $thumb_size      = 'goodresto_588X440';
	$post_img_attr   = array();
	$post_img_sizes  = '100vw';
	$post_img_default_size  = $post_img_sizes;

    switch ($event_post_size) {
        case 'small' :
			$thumb_size            = ($event_container == "wide") ? 'goodresto_640X400' : 'goodresto_588X440';
			$post_img_default_size = ($event_container == "wide") ? '640px' : '588px';
			$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
            break;
        case 'medium':
			$thumb_size            = ($event_container == "wide") ? 'goodresto_640X400' : 'goodresto_588X440';
			$post_img_default_size = ($event_container == "wide") ? '640px' : '588px';
			$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
            break;
        case 'large':
			$thumb_size            = ($event_container == "wide") ? 'goodresto_960X600' : 'goodresto_588X440';
			$post_img_default_size = ($event_container == "wide") ? '960px' : '588px';
			$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
            break;
    }

?>
<?php if (have_posts()) : ?>
	<?php if ($event_ajax_filter == "true" && !is_tax()): ?>
		<?php
			$args = array(
			    'orderby'           => 'name', 
			    'order'             => 'ASC',
			    'hide_empty'        => true, 
			    'exclude'           => array(), 
			    'exclude_tree'      => array(), 
			    'number'            => '', 
			    'fields'            => 'all', 
			    'slug'              => '', 
			    'parent'            => '',
			    'hierarchical'      => false, 
			    'child_of'          => 0, 
			    'get'               => '', 
			    'name__like'        => '',
			    'description__like' => '',
			    'pad_counts'        => false, 
			    'offset'            => '', 
			    'search'            => '', 
			    'cache_domain'      => 'core'
			);
			$count_posts = wp_count_posts('et-event');
			$taxonomy  = 'event-category'; 
			$tax_terms = get_terms($taxonomy);
		?>
		<?php if (count($tax_terms) != 0): ?>

			<div id="event-filter" data-posts-per-page="<?php echo $events_per_page; ?>" class="et-event-filter enovathemes-filter button-group filter-button-group">
	            <span data-link="<?php echo get_post_type_archive_link( 'et-event' ); ?>"  class="first-filter active filter" data-filter="*" data-count="<?php echo $count_posts->publish ?>"><?php echo esc_html__('Show All', 'enovathemes-addons'); ?></span>
            	<?php foreach(get_terms('event-category',$args) as $filter_term): ?>
            		<?php
            			$filter_count    = $filter_term->count;
            			$filter_children = get_term_children( $filter_term->term_id, 'event-category' );
            			if(is_array($filter_children) && !empty($filter_children)) {
            				foreach ($filter_children as $filter_child) {
            					$filter_child_obj = get_term($filter_child, 'event-category');
            					$filter_count = $filter_count + $filter_child_obj->count;
            				}
            			}
            		?>
	                <span data-link="<?php echo esc_url(get_term_link($filter_term, 'event-category')) ?>" class="filter" data-filter="<?php echo '.'.$filter_term->slug; ?>" data-count="<?php echo $filter_count; ?>"><?php echo $filter_term->name; ?></span>
	            <?php endforeach; ?>
		    </div>

		<?php endif; ?>
	<?php endif ?>
	<div id="loop-event" data-navigation="<?php echo $event_navigation; ?>" class="loop-posts loop-event <?php echo $event_image_effect; ?> effect-<?php echo $event_animation_effect; ?> nav-<?php echo $event_navigation; ?> et-item-set et-clearfix">
		<div class="grid-sizer"></div>
		<?php while (have_posts()) : the_post(); ?>

			<?php

				$values     = get_post_custom( get_the_ID() );
			    $event_date = isset( $values['event_date'][0] ) ? date_create(esc_attr( $values["event_date"][0] )) : "";

			    $date       = new DateTime($values["event_date"][0]);
				$today      = new DateTime();

				$date  = $date->format('Y-m-d\TH:i:s.uO');

				$today->setTime(0,0);
				$today = $today->format('Y-m-d\TH:i:s.uO');

				$event_status = '';

				if ($date < $today) {
					$event_status = esc_html__("Passed", "enovathemes-addons");
				}

				if ($date > $today) {
					$event_status = esc_html__("Upcoming", "enovathemes-addons");
				}

				if ($date == $today) {
					$event_status = esc_html__("Today", "enovathemes-addons");
				}

			?>

			<article <?php post_class('et-item post event') ?> id="post-<?php the_ID(); ?>">

				<?php

					if (has_post_thumbnail()){

						if ( '' != get_the_title() ){
							$post_img_attr['alt'] = esc_html(get_the_title());
						}

						$post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
						$post_img_588  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_588X440');
						$post_img_640  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_640X400');
						$post_img_960  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_960X600');

						$post_img_srcset = "";

						if (strpos($post_img_588, '588x')) {

							$post_img_srcset .= ', '.$post_img_588.' 588w';
						}

						if (strpos($post_img_640, '640x')) {

							$post_img_srcset .= ', '.$post_img_640.' 640w';
						}

						if (strpos($post_img_960, '960x')) {
							$post_img_srcset .= ', '.$post_img_960.' 960w';
						}

						if (empty($post_img_srcset)) {
							$post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
							$post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
						}

						$post_img_attr['srcset'] = $post_img_srcset;
						$post_img_attr['sizes']  = $post_img_sizes;
						
						
					}

				?>
				<div class="post-inner et-item-inner et-clearfix">
					<?php if (has_post_thumbnail()): ?>
						<div class="post-image overlay-hover post-media">
							<?php echo goodresto_enovathemes_event_image_overlay(get_the_ID(),$event_post_layout); ?>
							<div class="image-preloader"></div>
							<?php echo get_the_post_thumbnail( get_the_ID(), $thumb_size ,$post_img_attr); ?>
						</div>
        			<?php endif ?>
    				<div class="post-body et-clearfix">

    					<?php if (!empty($event_status)): ?>
    						<div class="event-status"><?php echo $event_status; ?></div>
    					<?php endif ?>

						<div class="post-body-inner-wrap">
							<div class="post-body-inner">
								<div class="event-date"><?php echo date_i18n("F j, Y", strtotime(date_format($event_date,"F j, Y"))); ?></div>
								<?php if ( '' != get_the_title() ): ?>
									<h4 class="post-title">
										<a href="<?php the_permalink(); ?>" title="<?php echo esc_html__("Read more about", 'enovathemes-addons').' '.get_the_title(); ?>" rel="bookmark">
											<?php the_title(); ?>
										</a>	
									</h4>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
<?php else : ?>
	<?php goodresto_enovathemes_not_found('event'); ?>
<?php endif; ?>
<div class="navigation-wraper">
	<?php if ($event_navigation == 'pagination'): ?>
		<?php goodresto_enovathemes_post_nav_num('event',$event_navigation_alignment); ?>
	<?php elseif($event_navigation == 'loadmore'): ?>
		<div class="ajax-container <?php echo $event_navigation_alignment; ?>">
			<div id="event-ajax-loader" class="et-ajax-loader"><?php echo esc_html__("Load more", "goodresto"); ?></div>
			<div id="event-ajax-error" class="et-ajax-error"><?php echo esc_html__("Something went wrong, please try again later or contact the site administrator", "goodresto"); ?></div>
		</div>
	<?php else: ?>
		<div class="ajax-container <?php echo $event_navigation_alignment; ?>">
			<div id="event-ajax-loading" class="et-ajax-loading"></div>
			<div id="event-ajax-loading-status" class="et-ajax-loading-status"></div>
			<div id="event-ajax-error" class="et-ajax-error"><?php echo esc_html__("Something went wrong, please try again later or contact the site administrator", "goodresto"); ?></div>
		</div>
	<?php endif ?>
</div>
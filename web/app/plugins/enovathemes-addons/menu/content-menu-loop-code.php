<?php
	goodresto_enovathemes_global_variables();

	$menu_post_layout           = (isset($GLOBALS['goodresto_enovathemes']['menu-post-layout']) && !empty($GLOBALS['goodresto_enovathemes']['menu-post-layout'])) ? $GLOBALS['goodresto_enovathemes']['menu-post-layout'] : "menu-with-details";
    $menu_container   	        = (isset($GLOBALS['goodresto_enovathemes']['menu-container']) && !empty($GLOBALS['goodresto_enovathemes']['menu-container'])) ? $GLOBALS['goodresto_enovathemes']['menu-container'] : "boxed";
    $menu_post_size   	        = (isset($GLOBALS['goodresto_enovathemes']['menu-post-size']) && !empty($GLOBALS['goodresto_enovathemes']['menu-post-size'])) ? $GLOBALS['goodresto_enovathemes']['menu-post-size'] : "medium";
	$menu_animation_effect      = (isset($GLOBALS['goodresto_enovathemes']['menu-animation-effect']) && !empty($GLOBALS['goodresto_enovathemes']['menu-animation-effect'])) ? $GLOBALS['goodresto_enovathemes']['menu-animation-effect'] : "none";
	$menu_navigation            = (isset($GLOBALS['goodresto_enovathemes']['menu-navigation']) && !empty($GLOBALS['goodresto_enovathemes']['menu-navigation'])) ? $GLOBALS['goodresto_enovathemes']['menu-navigation'] : "pagination";
	$menu_navigation_alignment  = (isset($GLOBALS['goodresto_enovathemes']['menu-navigation-alignment']) && !empty($GLOBALS['goodresto_enovathemes']['menu-navigation-alignment'])) ? $GLOBALS['goodresto_enovathemes']['menu-navigation-alignment'] : "center";

	$menu_ajax_filter = (isset($GLOBALS['goodresto_enovathemes']['menu-filter']) && $GLOBALS['goodresto_enovathemes']['menu-filter'] == 1) ? "true" : "false";
	$menu_filter_start_category = (isset($GLOBALS['goodresto_enovathemes']['menu-filter-start-category']) && !empty($GLOBALS['goodresto_enovathemes']['menu-filter-start-category'])) ? $GLOBALS['goodresto_enovathemes']['menu-filter-start-category'] : "all";

	$menus_per_page   = (isset($GLOBALS['goodresto_enovathemes']['menu-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['menu-per-page'])) ? $GLOBALS['goodresto_enovathemes']['menu-per-page'] : get_option( 'posts_per_page' );
    $paged               = (get_query_var('page')) ? get_query_var('page') : 1;

    $thumb_size      = 'goodresto_588X588';
	$post_img_attr   = array();
	$post_img_sizes  = '100vw';
	$post_img_default_size  = $post_img_sizes;

	if ($menu_post_layout == "grid") {
		switch ($menu_post_size) {
	        case 'small' :
				$thumb_size            = 'goodresto_588X588';
				$post_img_default_size = '588px';
				$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
	            break;
	        case 'medium':
				$thumb_size            = 'goodresto_588X588';
				$post_img_default_size = '588px';
				$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
	            break;
	        case 'large':
				$thumb_size            = ($menu_container == "wide") ? 'goodresto_960X600' : 'goodresto_588X588';
				$post_img_default_size = ($menu_container == "wide") ? '960px' : '588px';
				$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
	            break;
	    }
	} elseif ($menu_post_layout == "list") {
		$thumb_size            = 'goodresto_144X144';
		$post_img_default_size = '144px';
		$post_img_sizes        = '(max-width: 319px) 92vw, (max-width: 479px) '.$post_img_default_size.', (max-width: 767px) '.$post_img_default_size.', (max-width: 1023px) '.$post_img_default_size.', (max-width: 1279px) '.$post_img_default_size.', '.$post_img_default_size;
	}

?>
<?php if (have_posts()) : ?>
	<?php if ($menu_ajax_filter == "true" && !is_tax()): ?>
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
			$count_posts = wp_count_posts('menu');
			$taxonomy  = 'menu-category'; 
			$tax_terms = get_terms($taxonomy);
		?>
		<?php if (count($tax_terms) != 0): ?>

			<div id="menu-filter" data-posts-per-page="<?php echo $menus_per_page; ?>" class="menu-filter enovathemes-filter button-group filter-button-group">
	            <?php if ($menu_filter_start_category == "all"): ?>
	           		<span data-link="<?php echo get_post_type_archive_link( 'menu' ); ?>"  class="first-filter active filter" data-filter="*" data-count="<?php echo $count_posts->publish ?>"><?php echo esc_html__('Show All', 'enovathemes-addons'); ?></span>
	            <?php endif ?>
            	<?php foreach(get_terms('menu-category',$args) as $filter_term): ?>
            		<?php
            			$filter_count    = $filter_term->count;
            			$filter_children = get_term_children( $filter_term->term_id, 'menu-category' );
            			if(is_array($filter_children) && !empty($filter_children)) {
            				foreach ($filter_children as $filter_child) {
            					$filter_child_obj = get_term($filter_child, 'menu-category');
            					$filter_count = $filter_count + $filter_child_obj->count;
            				}
            			}

            			$active_class = "";

            			if ($menu_filter_start_category != 'all') {
            				if ($filter_term->term_id == $menu_filter_start_category) {
            					$active_class = "active";
            				}
            			}

            		?>
	                <span data-link="<?php echo esc_url(get_term_link($filter_term, 'menu-category')) ?>" class="filter <?php echo $active_class; ?>" data-filter="<?php echo '.'.$filter_term->slug; ?>" data-count="<?php echo $filter_count; ?>"><?php echo $filter_term->name; ?></span>
	            <?php endforeach; ?>
		    </div>

		<?php endif; ?>
	<?php endif ?>
	<div id="loop-menu" data-navigation="<?php echo $menu_navigation; ?>" class="loop-posts loop-menu effect-<?php echo $menu_animation_effect; ?> nav-<?php echo $menu_navigation; ?> et-item-set et-clearfix">
		<div class="grid-sizer"></div>
		<?php while (have_posts()) : the_post(); ?>

			<?php

				$values     = get_post_custom( get_the_ID() );
			    $menu_ingredients = isset( $values['menu_ingredients'][0] ) ? esc_html( $values["menu_ingredients"][0] ) : "";
			    $menu_price       = isset( $values['menu_price'][0] ) ? esc_attr( $values["menu_price"][0] ) : "";
			    $menu_label       = isset( $values['menu_label'][0] ) ? esc_attr( $values["menu_label"][0] ) : "";
			    $menu_highlight   = isset( $values['menu_highlight'][0] ) ? esc_attr( $values["menu_highlight"][0] ) : "false";
			    $menu_spicy       = isset( $values['menu_spicy'][0] ) ? esc_attr( $values["menu_spicy"][0] ) : "false";
			    $menu_vegetarian  = isset( $values['menu_vegetarian'][0] ) ? esc_attr( $values["menu_vegetarian"][0] ) : "false";
			    $menu_gluten      = isset( $values['menu_gluten'][0] ) ? esc_attr( $values["menu_gluten"][0] ) : "false";
			    $post_width       = isset( $values['menu_width'] ) ? esc_attr( $values['menu_width'][0] ) : "";

			    if (empty($post_width) || !isset($post_width)) {
					switch ($menu_post_size) {
						case 'small':
							$post_width = '25';
							break;
						case 'medium':
							$post_width = '30';
							break;
						case 'large':
							$post_width = '50';
							break;
					}
				}
			?>

			<article <?php post_class('et-item post menu') ?> data-width="<?php echo esc_attr($post_width); ?>" id="post-<?php the_ID(); ?>">

				<?php

					if (has_post_thumbnail()){

						if ( '' != get_the_title() ){
							$post_img_attr['alt'] = esc_html(get_the_title());
						}

						$post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
						$post_img_144  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_144X144');
						$post_img_588  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_588X588');
						$post_img_960  = get_the_post_thumbnail_url(get_the_ID(),'goodresto_960X600');

						$post_img_srcset = "";

						if (strpos($post_img_144, '144x')) {
							$post_img_srcset .= $post_img_144.' 144w';
						}

						if (strpos($post_img_588, '588x')) {

							$post_img_srcset .= ', '.$post_img_588.' 588w';
						}

						if (strpos($post_img_960, '960x')) {
							$post_img_srcset .= ', '.$post_img_960.' 960w';
						}

						if ($menu_post_layout == "masonry2") {
							$thumb_size = 'full';
						}

						if (empty($post_img_srcset) || $menu_post_layout == "masonry2") {
							$post_img_srcset = $post_img_original[0].' '.$post_img_original[1].'w';
							$post_img_sizes  = '(max-width: 479px) 92vw, '.$post_img_original[1].'px';
						}

						$post_img_attr['srcset'] = $post_img_srcset;
						$post_img_attr['sizes']  = $post_img_sizes;
						
						
					}

				?>
				<div class="post-inner et-item-inner et-clearfix highlight-<?php echo $menu_highlight ?>">


					<?php if ($menu_post_layout == "masonry2" && has_post_thumbnail()): ?>
						<div class="post-image-wrapper">
							<div class="post-image overlay-hover post-media">
								<div class="image-container">
									<div class="image-preloader"></div>
									<?php echo get_the_post_thumbnail( get_the_ID(), $thumb_size ,$post_img_attr); ?>
									<?php if (!empty($menu_label)): ?>
										<div class="menu-label"><?php echo $menu_label; ?></div>
									<?php endif ?>
									<div class="menu-additional-info et-clearfix">
										<?php if ($menu_spicy == "true"): ?>
											<span class="menu-additional icon-goodresto-pepper" title="<?php echo esc_html__("Spicy", "enovathemes-addons"); ?>"></span>
										<?php endif ?>
										<?php if ($menu_vegetarian == "true"): ?>
											<span class="menu-additional icon-goodresto-broccoli" title="<?php echo esc_html__("Vegetarian", "enovathemes-addons"); ?>"></span>
										<?php endif ?>
										<?php if ($menu_gluten == "true"): ?>
											<span class="menu-additional icon-goodresto-wheat" title="<?php echo esc_html__("Includes gluten", "enovathemes-addons"); ?>"></span>
										<?php endif ?>
									</div>
								</div>
								<div class="post-image-body">
									<div class="post-image-body-inner-wrap">
										<div class="post-image-body-inner">
											<?php if ( '' != get_the_title() ): ?>
												<h4 class="post-title"><?php the_title(); ?><?php if (!empty($menu_price)): ?> / <?php echo esc_attr($menu_price); ?><?php endif ?></h4>
											<?php endif ?>
											<?php if (!empty($menu_ingredients)): ?>
												<div class="menu-ingredients"><?php echo esc_attr($menu_ingredients); ?></div>
											<?php endif ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php else: ?>
						<?php if ($menu_post_layout == "grid" || $menu_post_layout == "list"): ?>
							<?php if (has_post_thumbnail()): ?>
								<div class="post-image overlay-hover post-media">
									<div class="image-preloader"></div>
									<?php echo get_the_post_thumbnail( get_the_ID(), $thumb_size ,$post_img_attr); ?>
									<?php if (!empty($menu_label)): ?>
										<div class="menu-label"><?php echo $menu_label; ?></div>
									<?php endif ?>
									<?php if ($menu_post_layout == "grid"): ?>
										<div class="menu-additional-info et-clearfix">
											<?php if ($menu_spicy == "true"): ?>
												<span class="menu-additional icon-goodresto-pepper" title="<?php echo esc_html__("Spicy", "enovathemes-addons"); ?>"></span>
											<?php endif ?>
											<?php if ($menu_vegetarian == "true"): ?>
												<span class="menu-additional icon-goodresto-broccoli" title="<?php echo esc_html__("Vegetarian", "enovathemes-addons"); ?>"></span>
											<?php endif ?>
											<?php if ($menu_gluten == "true"): ?>
												<span class="menu-additional icon-goodresto-wheat" title="<?php echo esc_html__("Includes gluten", "enovathemes-addons"); ?>"></span>
											<?php endif ?>
										</div>
									<?php endif ?>
								</div>
		        			<?php endif ?>
						<?php endif ?>
						
					<?php endif ?>
					<?php if ($menu_post_layout != "masonry2"): ?>
	    				<div class="post-body et-clearfix">
							<div class="post-body-inner-wrap">
								<div class="post-body-inner">
									<?php if ( '' != get_the_title() ): ?>
										<h4 class="post-title et-clearfix">
											<span class="menu-title-inline"><?php the_title(); ?></span>
											<?php if ($menu_post_layout == "list" || $menu_post_layout == "list2"): ?>
												<?php if (!empty($menu_price)): ?>
													<span class="menu-price-inline"><?php echo esc_attr($menu_price); ?></span>
												<?php endif ?>
											<?php endif ?>
										</h4>
									<?php endif ?>
									<?php if (!empty($menu_ingredients)): ?>
										<div class="menu-ingredients">
											<?php echo esc_attr($menu_ingredients); ?>
											<?php if ($menu_post_layout == "list" || $menu_post_layout == "list2"): ?>
												<div class="menu-additional-info inline et-clearfix">
													<?php if ($menu_spicy == "true"): ?>
														<span class="menu-additional icon-goodresto-pepper" title="<?php echo esc_html__("Spicy", "enovathemes-addons"); ?>"></span>
													<?php endif ?>
													<?php if ($menu_vegetarian == "true"): ?>
														<span class="menu-additional icon-goodresto-broccoli" title="<?php echo esc_html__("Vegetarian", "enovathemes-addons"); ?>"></span>
													<?php endif ?>
													<?php if ($menu_gluten == "true"): ?>
														<span class="menu-additional icon-goodresto-wheat" title="<?php echo esc_html__("Includes gluten", "enovathemes-addons"); ?>"></span>
													<?php endif ?>
												</div>
											<?php endif ?>
										</div>
									<?php endif ?>
									<?php if ($menu_post_layout == "grid"): ?>
										<?php if (!empty($menu_price)): ?>
											<div class="menu-price"><?php echo esc_attr($menu_price); ?></div>
										<?php endif ?>
									<?php endif ?>
									<?php if ($menu_post_layout == "list2"): ?>
										<?php if (!empty($menu_label)): ?>
											<div class="menu-label"><?php echo $menu_label; ?></div>
										<?php endif ?>
									<?php endif ?>
								</div>
							</div>
						</div>
					<?php endif ?>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
<?php else : ?>
	<?php goodresto_enovathemes_not_found('menu'); ?>
<?php endif; ?>
<div class="navigation-wraper">
	<?php if ($menu_navigation == 'pagination'): ?>
		<?php goodresto_enovathemes_post_nav_num('menu',$menu_navigation_alignment); ?>
	<?php elseif($menu_navigation == 'loadmore'): ?>
		<div class="ajax-container <?php echo $menu_navigation_alignment; ?>">
			<div id="menu-ajax-loader" class="et-ajax-loader"><?php echo esc_html__("Load more", "goodresto"); ?></div>
			<div id="menu-ajax-error" class="et-ajax-error"><?php echo esc_html__("Something went wrong, please try again later or contact the site administrator", "goodresto"); ?></div>
		</div>
	<?php else: ?>
		<div class="ajax-container <?php echo $menu_navigation_alignment; ?>">
			<div id="menu-ajax-loading" class="et-ajax-loading"></div>
			<div id="menu-ajax-loading-status" class="et-ajax-loading-status"></div>
			<div id="menu-ajax-error" class="et-ajax-error"><?php echo esc_html__("Something went wrong, please try again later or contact the site administrator", "goodresto"); ?></div>
		</div>
	<?php endif ?>
</div>
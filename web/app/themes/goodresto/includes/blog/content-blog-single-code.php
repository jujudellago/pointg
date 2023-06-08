<?php
	goodresto_enovathemes_global_variables();
 	$blog_single_social  = (isset($GLOBALS['goodresto_enovathemes']['blog-single-social']) && $GLOBALS['goodresto_enovathemes']['blog-single-social'] == 1) ? "true" : "false";
 	$blog_related_posts  = (isset($GLOBALS['goodresto_enovathemes']['blog-related-posts']) && $GLOBALS['goodresto_enovathemes']['blog-related-posts'] == 1) ? "true" : "false";
	$blog_single_sidebar = (isset($GLOBALS['goodresto_enovathemes']['blog-single-sidebar']) && $GLOBALS['goodresto_enovathemes']['blog-single-sidebar']) ? $GLOBALS['goodresto_enovathemes']['blog-single-sidebar'] : "right";
	$post_img_attr       = array();
?>
<div id="single-post-page" class="single-post-page social-links-<?php echo esc_attr($blog_single_social); ?>">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<?php

					$values 		   = get_post_custom( get_the_ID() );
				    $audio_mp3         = isset( $values['audio_mp3'][0] ) ? $values["audio_mp3"][0] : "";
				    $audio_ogg         = isset( $values['audio_ogg'][0] ) ? $values["audio_ogg"][0] : "";
				    $audio_embed       = isset( $values['audio_embed'][0] ) ? $values["audio_embed"][0] : "";
				    $video_mp4         = isset( $values['video_mp4'][0] ) ? $values["video_mp4"][0] : "";
				    $video_ogv         = isset( $values['video_ogv'][0] ) ? $values["video_ogv"][0] : "";
				    $video_webm        = isset( $values['video_webm'][0] ) ? $values["video_webm"][0] : "";
				    $video_embed       = isset( $values['video_embed'][0] ) ? $values["video_embed"][0] : "";
				    $video_poster      = isset( $values['video_poster'][0] ) ? $values["video_poster"][0] : "";
				    $link_url          = isset( $values['link_url'][0] ) ? $values["link_url"][0] : "";
				    $status_author     = isset( $values['status_author'][0] ) ? $values["status_author"][0] : "";
				    $quote_author      = isset( $values['quote_author'][0] ) ? $values["quote_author"][0] : "";
				    $featured_media    = isset( $values['featured_media'][0] ) ? $values["featured_media"][0] : "false";
				    $post_format       = get_post_format(get_the_ID());
				
				    $post_audio_class  = "";

				    if(!empty($audio_embed) && empty($audio_ogg) && empty($audio_mp3)) {
				    	$post_audio_class = "embed-audio";
					} elseif (!empty($audio_ogg) || !empty($audio_mp3)) {
				    	$post_audio_class = "self-audio";
					}


					if (has_post_thumbnail()){

						if ( '' != the_title_attribute( 'echo=0' ) ){
							$post_img_attr['alt'] = the_title_attribute( 'echo=0' );
						}

						$thumbnail_size    = 'goodresto_1200X440';
						$post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
						$post_img_384      = get_the_post_thumbnail_url(get_the_ID(),'goodresto_384X288');
						$post_img_1200     = get_the_post_thumbnail_url(get_the_ID(),'goodresto_1200X440');
						$post_img_870      = get_the_post_thumbnail_url(get_the_ID(),'goodresto_870X440');

						$post_img_default_size = '1200px';

						if ($blog_single_sidebar != 'none') {
							$post_img_default_size = '870px';
							$thumbnail_size = 'goodresto_870X440';
						}


						$post_img_srcset = "";
						$post_img_sizes  = '(max-width: 479px) 92vw, (max-width: 767px) 384px, '.$post_img_default_size.'px';

						if (strpos($post_img_384, '384x')) {
							$post_img_srcset .= $post_img_384.' 384w, ';
						}

						if (strpos($post_img_870, '870x')) {
							$post_img_srcset .= $post_img_870.' 870w, ';
						}

						if (strpos($post_img_1200, '1200x')) {
							$post_img_srcset .= $post_img_1200.' 1200w, ';
						}

						if (empty($post_img_srcset)) {
							$thumbnail_size = 'full';
						}

						$post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';

						$post_img_attr['srcset'] = $post_img_srcset;
						$post_img_attr['sizes']  = $post_img_sizes;
					}

				?>

				<div class="post-inner <?php echo esc_attr($post_audio_class); ?> et-clearfix">

					<div class="post-title-section">
						<div class="post-meta et-clearfix">
							<?php echo esc_html__("Posted on ", 'goodresto'); ?><div class="post-date-inline"><?php echo get_the_date(); ?></div>
							<?php if ('' != get_the_category_list()): ?>
								<?php echo esc_html__("in ", 'goodresto'); ?><div class="post-category"><?php echo get_the_category_list(esc_html__( ', ', 'goodresto' )); ?></div>
							<?php endif ?>
						</div>
						<?php if ( '' != the_title_attribute( 'echo=0' ) ): ?>
							<h2 class="post-title entry-title">
								<?php the_title(); ?>
							</h2>
						<?php endif ?>
					</div>

					<?php if ($post_format == "0" || $post_format == 'chat'): ?>
						<?php if (has_post_thumbnail() && $featured_media == "false"): ?>
							<div class="post-image post-media curtain-top">
								<?php echo get_the_post_thumbnail( get_the_ID(), $thumbnail_size ,$post_img_attr); ?>
							</div>
	        			<?php endif ?>
					<?php elseif($post_format == "gallery"): ?>
						<?php $images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true); ?>
					    <?php if (!empty($images) && $featured_media == "false"): ?>
					    	<?php
					    		if ( '' != the_title_attribute( 'echo=0' ) ){
									$post_img_attr['alt'] = the_title_attribute( 'echo=0' );
								}
					    	?>
					    	<div class="post-gallery post-media">
					            <ul class="slides">
					                <?php foreach ($images as $image): ?>

					                	<?php
											$post_img_original = wp_get_attachment_image_src( $image, "full" );
											$post_img_480      = wp_get_attachment_image_src( $image, 'goodresto_384X288');

											$post_img_srcset = '';
											$post_img_sizes  = '(max-width: 479px) 92vw, (max-width: 767px) 480px, '.$post_img_original[1].'px';

											if (strpos($post_img_480[0], '480x')) {
												$post_img_srcset .= $post_img_480[0].' 480w, ';
											}

											$post_img_srcset .= $post_img_original[0].' '.$post_img_original[1].'w';

											$post_img_attr['srcset'] = $post_img_srcset;
											$post_img_attr['sizes']  = $post_img_sizes;
											
					                	?>

					                	<li>
					                	<div class="image-container">
					                		<?php echo wp_get_attachment_image($image, $thumbnail_size,false,$post_img_attr); ?>
					                	</div>
					                	</li>
					                <?php endforeach; ?>
					            </ul>
				            </div>
					    <?php else: ?>
				            <?php if (has_post_thumbnail() && $featured_media == "false"): ?>
				            	<div class="post-image post-media">
				                	<?php echo get_the_post_thumbnail( get_the_ID(), $thumbnail_size ,$post_img_attr); ?>
				            	</div>
				            <?php endif ?>
					    <?php endif ?>
					<?php elseif($post_format == "video"): ?>
						<?php if (!empty($video_mp4) || !empty($video_ogv) || !empty($video_webm) || !empty($video_embed)): ?>
							<div class="post-video post-media">
								<?php
									if(!empty($video_embed) && empty($video_mp4) && empty($video_ogv) && empty($video_webm)) {
										echo "<div class='post-video-embed'><div class='flex-mod'>";
											echo wp_kses($video_embed,wp_kses_allowed_html('post'));
										echo "</div></div>";
									} elseif((!empty($video_mp4) || !empty($video_ogv) || !empty($video_webm))) {
										echo do_shortcode('[video mp4="'.$video_mp4.'" ogv="'.$video_ogv.'" webm="'.$video_webm.'" poster="'.$video_poster.'"][/video]');
									}
								?>
							</div>
						<?php endif; ?>
					<?php elseif($post_format == "audio"): ?>
						<div class="post-audio post-media">
							<?php 
								if(!empty($audio_embed) && empty($audio_ogg) && empty($audio_mp3)) {
									echo "<div class='post-audio-embed'>".$audio_embed."</div>";
								} elseif (!empty($audio_ogg) || !empty($audio_mp3)) {
									echo do_shortcode('[audio mp3="'.$audio_mp3.'" ogg="'.$audio_ogg.'"][/audio]'); 
								}
							?>
						</div>
					<?php endif ?>

					<div class="post-body et-clearfix">
						<div class="post-body-inner">
							<?php if ($post_format == "aside"): ?>
								<div class="format-container">
									<?php if ( '' != get_the_content() ): ?>
										<div class="post-excerpt">
											<?php
												the_content(sprintf(
													esc_html__( 'Continue reading %s', 'goodresto' ),
													the_title( '<span class="screen-reader-text">', '</span>', false )
												)); 
												$defaults = array(
													'before'           => '<div id="page-links">',
													'after'            => '</div>',
													'link_before'      => '',
													'link_after'       => '',
													'next_or_number'   => 'next',
													'separator'        => ' ',
													'nextpagelink'     => esc_html__( 'Continue reading', 'goodresto' ),
													'previouspagelink' => esc_html__( 'Go back' , 'goodresto'),
													'pagelink'         => '%',
													'echo'             => 1
												);
												wp_link_pages($defaults);

											?>
										</div>
									<?php endif ?>
								</div>
							<?php elseif($post_format == "quote"): ?>
								<div class="format-container">
									<?php if ( '' != get_the_content() ): ?>
										<div class="post-excerpt">
											<?php

												the_content(); 
												$defaults = array(
													'before'           => '<div id="page-links">',
													'after'            => '</div>',
													'link_before'      => '',
													'link_after'       => '',
													'next_or_number'   => 'next',
													'separator'        => ' ',
													'nextpagelink'     => esc_html__( 'Continue reading', 'goodresto' ),
													'previouspagelink' => esc_html__( 'Go back' , 'goodresto'),
													'pagelink'         => '%',
													'echo'             => 1
												);
												wp_link_pages($defaults);

											?>
										</div>
									<?php endif ?>
									<?php if (!empty($quote_author)): ?>
										<div class="post-quote-auther">- <?php echo esc_attr($quote_author); ?></div>
									<?php endif ?>
								</div>
							<?php elseif($post_format == "status"): ?>
								<div class="format-container">
									<?php if ( '' != get_the_content() ): ?>
										<div class="post-excerpt">
										<?php

											the_content(); 
											$defaults = array(
												'before'           => '<div id="page-links">',
												'after'            => '</div>',
												'link_before'      => '',
												'link_after'       => '',
												'next_or_number'   => 'next',
												'separator'        => ' ',
												'nextpagelink'     => esc_html__( 'Continue reading', 'goodresto' ),
												'previouspagelink' => esc_html__( 'Go back' , 'goodresto'),
												'pagelink'         => '%',
												'echo'             => 1
											);
											wp_link_pages($defaults);
										?>
										</div>
									<?php endif ?>
									<?php if (!empty($status_author)): ?>
										<div class="post-status-auther">- <?php echo esc_attr($status_author); ?></div>
									<?php endif ?>
								</div>
							<?php elseif($post_format == "link"): ?>
								<div class="format-container">
									<a class="post-link" href="<?php echo esc_url($link_url); ?>" target="_blank" ><?php echo esc_url($link_url); ?></a>
								</div>
							<?php else: ?>
								<?php if ( '' != get_the_content() ): ?>
									<div class="post-content et-clearfix">
										<?php the_content(); ?>
										<?php
											$defaults = array(
												'before'           => '<div id="page-links">',
												'after'            => '</div>',
												'link_before'      => '',
												'link_after'       => '',
												'next_or_number'   => 'next',
												'separator'        => ' ',
												'nextpagelink'     => esc_html__( 'Continue reading', 'goodresto' ),
												'previouspagelink' => esc_html__( 'Go back' , 'goodresto'),
												'pagelink'         => '%',
												'echo'             => 1
											);
											wp_link_pages($defaults);
										?>
									</div>
								<?php endif ?>
							<?php endif ?>
							<?php if (has_tag()): ?>
								<div class="post-tags-single"><?php echo esc_html__("Tags:", 'goodresto'); ?> <?php the_tags('', ', ', ''); ?></div>
							<?php endif ?>
						</div>
						<?php if (function_exists('enovathemes_addons_post_social_share') && $blog_single_social == "true"): ?>
							<?php echo enovathemes_addons_post_social_share('post'); ?>
						<?php endif ?>
					</div>

				</div>

			</article>
			<?php if ($blog_related_posts == "true"): ?>
				<?php $terms = wp_get_post_tags(get_the_ID());?>
				<?php if ($terms): ?>

					<?php

						$tagids = array();
						foreach($terms as $tag) {$tagids[] = $tag->term_id;}

						$args = array(
							'post_type' => 'post',
							'tag__in'   => $tagids,
							'posts_per_page'      => 3,
							'ignore_sticky_posts' => 1,
							'orderby'             => 'date',
							'post__not_in'        => array($post->ID)
						);

					    $related_posts = new WP_Query($args);

					?>

					<?php if ($related_posts->have_posts()): ?>
						<div class="related-posts-wrapper et-clearfix">
							<h4 class="related-posts-title"><?php echo esc_html__("Related posts", 'goodresto'); ?></h4>
							<div id="related-posts" class="r-posts et-clearfix">
								<?php while($related_posts->have_posts()) : $related_posts->the_post(); ?>

									<article class="post format-<?php echo get_post_format(); ?> et-clearfix">
										<div class="post-inner et-clearfix">
											<div class="post-body et-clearfix">
												<div class="post-body-inner-wrap">
													<div class="post-body-inner">
														<div class="post-date-inline"><?php echo get_the_date(); ?></div>
														<?php if ( '' != the_title_attribute( 'echo=0' ) ): ?>
															<h3 class="post-title">
																<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr__("Read more about", 'goodresto').' '.the_title_attribute( 'echo=0' ); ?>" rel="bookmark">
																	<?php the_title(); ?>
																</a>
															</h3>
														<?php endif ?>
													</div>
												</div>
											</div>
										</div>
									</article>
										
								<?php endwhile; ?>

								<?php wp_reset_postdata(); ?>
							</div>
						</div>
					<?php endif ?>
					
				<?php endif ?>
			<?php endif ?>
			<?php goodresto_enovathemes_post_nav('post',get_the_ID()); ?>
			<div class="post-comments-section">
				<?php comments_template(); ?>
			</div>
		<?php endwhile; ?>

	<?php else : ?>

		<?php goodresto_enovathemes_not_found('post'); ?>

	<?php endif; ?>
</div>
<!-- Single post page end -->
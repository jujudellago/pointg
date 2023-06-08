<?php
	goodresto_enovathemes_global_variables();
?>
<div id="single-event-page" class="single-event-page">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class('post') ?> id="event-<?php the_ID(); ?>">

				<?php

					$values      = get_post_custom( get_the_ID() );
    				$format      = isset( $values['format'] ) ? esc_attr( $values["format"][0] ) : "gallery";
					$audio_mp3   = isset( $values['audio_mp3'][0] ) ? $values["audio_mp3"][0] : "";
					$audio_ogg   = isset( $values['audio_ogg'][0] ) ? $values["audio_ogg"][0] : "";
					$audio_embed = isset( $values['audio_embed'][0] ) ? $values["audio_embed"][0] : "";
				    $post_audio_class  = "";

				    if(!empty($audio_embed) && empty($audio_ogg) && empty($audio_mp3)) {
				    	$post_audio_class = "embed-audio";
					} elseif (!empty($audio_ogg) || !empty($audio_mp3)) {
				    	$post_audio_class = "self-audio";
					}
				?>

				<div class="post-inner <?php echo $post_audio_class; ?> et-clearfix">

						<div class="post-title-section event-title-section">
							<div class="post-meta et-clearfix">
								<?php if ('' != get_the_term_list( $post->ID, 'event-category', '', ', ', '' )): ?>
									<?php echo esc_html__("Posted in ", 'enovathemes-addons'); ?><div class="post-category"><?php echo get_the_term_list( $post->ID, 'event-category', '', ', ', '' ); ?></div>
								<?php endif ?>
							</div>
							<?php if ( '' != get_the_title() ): ?>
								<h2 class="post-title entry-title">
									<?php the_title(); ?>
								</h2>
							<?php endif ?>
						</div>
						<?php include(ENOVATHEMES_ADDONS.'event/content-event-single-media.php'); ?>
						<div class="post-body et-clearfix">
							<div class="post-body-inner">
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
												'nextpagelink'     => esc_html__( 'Continue reading', 'enovathemes-addons' ),
												'previouspagelink' => esc_html__( 'Go back' , 'enovathemes-addons'),
												'pagelink'         => '%',
												'echo'             => 1
											);
											wp_link_pages($defaults);
										?>
									</div>
								<?php endif ?>
								<div class="event-details et-clearfix">
									<?php $icon_decorative = (isset($GLOBALS['goodresto_enovathemes']['icon-decorative']) && !empty($GLOBALS['goodresto_enovathemes']['icon-decorative'])) ? $GLOBALS['goodresto_enovathemes']['icon-decorative'] : 'icon-sep-sep5'; ?>
            						<div class="et-separator-decorative small <?php echo esc_attr($icon_decorative); ?>"></div>
									<?php include(ENOVATHEMES_ADDONS.'event/content-event-single-details.php'); ?>
								</div>
								<?php include(ENOVATHEMES_ADDONS.'event/content-event-single-booking.php'); ?>
							</div>
						</div>
						
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<div class="container">
			<?php goodresto_enovathemes_not_found('event'); ?>
		</div>
	<?php endif; ?>
</div>
<div class="single-event-navigation et-clearfix">
<?php
	$prev_post = get_adjacent_post(false, '', true);
    $next_post = get_adjacent_post(false, '', false);
    if(!empty($next_post)) {echo '<a class="single-event-navigation-link" rel="prev" href="' . get_permalink($next_post->ID) . '" title="' .esc_html__('Go to', 'enovathemes-addons').' '.$next_post->post_title . '">'.esc_html__('Previous event', 'enovathemes-addons').'</a>'; }
    if(!empty($prev_post)) {echo '<a class="single-event-navigation-link" rel="next" href="' . get_permalink($prev_post->ID) . '" title="' .esc_html__('Go to', 'enovathemes-addons').' '.$prev_post->post_title . '">'.esc_html__('Next event', 'enovathemes-addons').'</a>'; }
?>
</div>
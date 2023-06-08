<?php
	goodresto_enovathemes_global_variables();
	
	$post_img_attr       = array();

	if (has_post_thumbnail()){

		if ( '' != get_the_title() ){
			$post_img_attr['alt'] = esc_html(get_the_title());
		}

		$thumbnail_size    = 'goodresto_1200X440';
		$post_img_original = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), "full" );
		$post_img_384      = get_the_post_thumbnail_url(get_the_ID(),'goodresto_384X288');
		$post_img_1200     = get_the_post_thumbnail_url(get_the_ID(),'goodresto_1200X440');
		$post_img_870      = get_the_post_thumbnail_url(get_the_ID(),'goodresto_870X440');

		$post_img_default_size = '1200px';

		if ($event_single_sidebar != 'none') {
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

<?php $images = get_post_meta(get_the_ID(), 'vdw_gallery_id', true); ?>
	<?php if (!empty($images)): ?>
		<?php
			if ( '' != get_the_title() ){
				$post_img_attr['alt'] = esc_html(get_the_title());
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
	    <?php if (has_post_thumbnail()): ?>
	    	<div class="post-image post-media">
	        	<?php echo get_the_post_thumbnail( get_the_ID(), $thumbnail_size ,$post_img_attr); ?>
	    	</div>
	    <?php endif ?>
	<?php endif ?>

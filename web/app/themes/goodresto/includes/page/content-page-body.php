<?php goodresto_enovathemes_global_variables(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<!-- post start -->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="page-content et-clearfix">
			<?php the_content(); ?>
		</div>
	</div>
	<!-- post end -->
<?php endwhile; ?>
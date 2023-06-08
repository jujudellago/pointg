	<?php goodresto_enovathemes_global_variables();?>
		<?php
			$footer_sticky     = (isset($GLOBALS['goodresto_enovathemes']['footer-sticky']) && $GLOBALS['goodresto_enovathemes']['footer-sticky'] == 1) ? 'true' : 'false'; 
			$footer_settings   = get_option('footer_settings');
			$footer_id         = isset($footer_settings["footer_id"]) ? $footer_settings["footer_id"] : "none";
			$mtt               = (isset($GLOBALS['goodresto_enovathemes']['mtt']) && $GLOBALS['goodresto_enovathemes']['mtt'] == 1) ? 'true' : 'false';
			
		?>
		<?php if ($footer_settings && $footer_id != "none"): ?>
			<?php
				$et_footer = new WP_Query(array( 
					'post_type'=> 'footer', 
					'p'       => $footer_id
				));
			?>
			<?php if($et_footer->have_posts()): ?>
				<footer data-sticky="<?php echo esc_attr($footer_sticky); ?>" class="footer et-clearfix">
					<?php while($et_footer->have_posts()) : $et_footer->the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</footer>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		<?php endif; ?>
		</div>
	</div>
	<!-- wrap end -->
</div>
<?php if ($mtt == "true"): ?>
	<a id="to-top" href="#wrap"></a>
<?php endif ?>
<!-- general wrap end -->
<?php if (is_page()){
	$et_one_page_nav    = (isset($GLOBALS['goodresto_enovathemes']['one-page-navigation']) && !empty($GLOBALS['goodresto_enovathemes']['one-page-navigation'])) ? $GLOBALS['goodresto_enovathemes']['one-page-navigation'] : 'top'; 
	$et_one_page_status = "false";
	$values = get_post_custom( get_the_ID() );
	if (isset($values['one_page'][0]) && $values['one_page'][0] == "true") {
		$et_one_page_status = "true";
	}
?>
	<?php if ($et_one_page_status == "true" && $et_one_page_nav == "side"): ?>
		<?php
			$arg = array( 
				'theme_location' => 'bullets', 
				'depth'          => 1, 
				'container'      => false, 
				'menu_id'        => 'bullets',
				'link_before'    => '',
				'link_after'     => ''
			);
		?>
		<div class="one-page-bullets"><?php wp_nav_menu($arg); ?></div>
	<?php endif; ?>
<?php } ?>
<?php get_template_part( '/includes/photoswip' ); ?>
<?php wp_footer(); ?>
</body>
</html>
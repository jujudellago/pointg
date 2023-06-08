<?php
goodresto_enovathemes_global_variables();
$custom_loading         = (isset($GLOBALS['goodresto_enovathemes']['custom-loading']) && $GLOBALS['goodresto_enovathemes']['custom-loading'] == 1) ? "true" : "false";
$custom_loading_version = (isset($GLOBALS['goodresto_enovathemes']['custom-loading-version']) && !empty($GLOBALS['goodresto_enovathemes']['custom-loading-version'])) ? $GLOBALS['goodresto_enovathemes']['custom-loading-version'] : "load5"; 
$et_loading_logo   = (isset($GLOBALS['goodresto_enovathemes']['loading-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['loading-logo']['url'])) ? esc_url($GLOBALS['goodresto_enovathemes']['loading-logo']['url']) : "";
$et_loading_logo_w = (isset($GLOBALS['goodresto_enovathemes']['loading-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['loading-logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['loading-logo']['width']: "";
$et_loading_logo_h = (isset($GLOBALS['goodresto_enovathemes']['loading-logo']['url']) && !empty($GLOBALS['goodresto_enovathemes']['loading-logo']['url'])) ? $GLOBALS['goodresto_enovathemes']['loading-logo']['height'] : "";
if (isset($GLOBALS['goodresto_enovathemes']['loading-logo-retina']['url']) && !empty($GLOBALS['goodresto_enovathemes']['loading-logo-retina']['url'])) 
{$et_loading_logo = esc_url($GLOBALS['goodresto_enovathemes']['loading-logo-retina']['url']);}
$custom_loading_color   = (isset($GLOBALS['goodresto_enovathemes']['custom-loading-color']) && $GLOBALS['goodresto_enovathemes']['custom-loading-color']) ? $GLOBALS['goodresto_enovathemes']['custom-loading-color'] : "#d3a471";
$custom_loading_svg     = (isset($GLOBALS['goodresto_enovathemes']['custom-loading-svg']) && $GLOBALS['goodresto_enovathemes']['custom-loading-svg']) ? $GLOBALS['goodresto_enovathemes']['custom-loading-svg'] : "";
?>
<?php if ($custom_loading == "true"): ?>
	<div class="site-loading <?php echo esc_attr($custom_loading_version); ?>">
		<?php if ($custom_loading_version == "load3"): ?>
			<div class="loading-bar-full"></div>
		<?php endif ?>
		<div class="site-loading-content">
			<?php if ($custom_loading_version == "load1"): ?>
				<div class="logo logo-loading">
					<img style="max-width:<?php echo esc_attr($et_loading_logo_w); ?>px;max-height:<?php echo esc_attr($et_loading_logo_h); ?>px;" src="<?php echo esc_url($et_loading_logo); ?>" alt="<?php bloginfo('name'); ?>">
					<div class="loading-bar"></div>
				</div>
			<?php endif ?>
			<?php if ($custom_loading_version == "load2" && !empty($custom_loading_svg)): ?>
				<div class="et-signature-wrapper et-clearfix center">
					<div id="et-signature-custom" class="et-signature">
						<?php

							$allowed = array(
								'svg' => array(
									'width' => array(),
									'height' => array(),
									'viewbox' => array(),
									'version' => array(),
									'xmlns' => array(),
									'xmlns:xlink' => array(),
								),
								'g' => array(
									'stroke' => array(),
									'stroke-width' => array(),
									'fill' => array(),
									'fill-rule' => array(),
								),
								'path' => array(
									'd' => array(),
									'id' => array(),
								),
							);

						?>
						<?php echo wp_kses($custom_loading_svg,$allowed); ?>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
<?php endif; ?>
<?php
$premium_link = '<a href="https://wpautorobot.com/" target="_blank">' . __( 'premium version', Auto_Robot::DOMAIN ) . '</a>';
$document_link = '<a href="https://wpautorobot.com/document/" target="_blank">' . __( 'document', Auto_Robot::DOMAIN ) . '</a>';
$demos = array(
	array(
		'href' => 'https://www.youtube.com/watch?v=eeuAVH5W2GM/',
		'demo' => 'RSS Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=fnu4hgrcATQ/',
		'demo' => 'Instagram Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=nDm58uxiZLE/',
		'demo' => 'Vimeo Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=X-kO589Byso/',
		'demo' => 'Flickr Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=m339MVd6tuA/',
		'demo' => 'Twitter Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=nHYa633aj3M/',
		'demo' => 'Youtube Campaign'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=W8lvU6Anj1c/',
		'demo' => 'Schedule Settings'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=M-fARSJFKF4/',
		'demo' => 'Post Template'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=anFfEyfrSFY/',
		'demo' => 'Set Feature Image'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=LwApQaIDb_M/',
		'demo' => 'Video Template'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=guFze2Krfjc/',
		'demo' => 'System Settings'
	),
	array(
		'href' => 'https://www.youtube.com/watch?v=dSGtphbXYdU/',
		'demo' => 'Logs System'
	),
);
$support_url = 'https://codecanyon.net/item/auto-robot/26798462/support/';
$document_url = 'https://wpautorobot.com/document/';
$license_activated = get_option( 'auto_robot_license_activated');
$license_activated = 102;
?>
<div class="wrap about-wrap robot-welcome-wrap">
	<h1>
		<?php
              printf(
                  esc_html__( 'Welcome to Auto Robot %1$s', Auto_Robot::DOMAIN ),
                  AUTO_ROBOT_VERSION
              );
        ?>
	</h1>
	<div class="about-text">
		<p>
		<?php
              printf(
                  esc_html__( 'Thank you for choosing Auto Robot %1$s, the most intuitive and extensible tool to generate WordPress posts from RSS Feed, Social Media, Videos, Images and etc! - %2$s', Auto_Robot::DOMAIN ),
                  AUTO_ROBOT_VERSION,
				  '<a href="https://wpautorobot.com/" target="_blank">Visit Plugin Homepage</a>'
              );
        ?>
		</p>
		<a href="https://wpautorobot.com/pricing" target="_blank">
    		<button class="robot-button robot-button-blue">
            	<?php esc_html_e( 'Get Pro Version', Auto_Robot::DOMAIN ); ?>
        	</button>
    		</a>
			<a href="https://www.spinrewriter.com/?ref=50f2e" target="_blank">
    		<button class="robot-button robot-button-blue">
            	<?php esc_html_e( 'Spin Rewriter', Auto_Robot::DOMAIN ); ?>
        	</button>
    		</a>
		<?php if ( empty($license_activated) || $license_activated != '102' ) : ?>
			<div class="robot-license-notice-message">
			<a href="<?php echo admin_url( 'admin.php?page=auto-robot-license' ); ?>">
    <button class="robot-button robot-button-blue">
            <?php esc_html_e( ' Please add your purchase code and activate the plugin
            ', Auto_Robot::DOMAIN ); ?>
        </button>
    </a>
            </div>
        <?php endif; ?>
	</div>
		<div class="robot-badge-logo">
			<img src="<?php echo esc_url(AUTO_ROBOT_URL.'/assets/images/robot.png'); ?>"aria-hidden="true" alt="<?php esc_attr_e( 'Auto Robot', Auto_Robot::DOMAIN ); ?>">
		</div>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab nav-tab-active" href="#" data-nav="help">
				<?php esc_html_e( 'Getting Started', Auto_Robot::DOMAIN ); ?>
			</a>
			<a class="nav-tab" href="#" data-nav="demo">
				<?php esc_html_e( 'Demos', Auto_Robot::DOMAIN ); ?>
			</a>
			<a class="nav-tab" href="#" data-nav="support">
				<?php esc_html_e( 'Help & Support', Auto_Robot::DOMAIN ); ?>
			</a>
	</h2>
	<div class="robot-welcome-tabs">
	<div id="help" class="active nav-container">
		<div class="changelog section-getting-started">
			<div class="feature-section">
				<h2><?php esc_html_e( 'Create Your First Campaign', Auto_Robot::DOMAIN ); ?></h2>

				<img src="<?php echo esc_url('https://wpautorobot.com/wp-content/uploads/2022/07/create-new-campaign.png') ?>" class="robot-help-screenshot" alt="<?php esc_attr_e( 'Auto Robot', Auto_Robot::DOMAIN ); ?>">

				<h4><?php printf( __( '1. <a href="%s" target="_blank">Add New Campaign</a>', Auto_Robot::DOMAIN ), esc_url ( admin_url( 'admin.php?page=auto-robot-welcome' ) ) ); ?></h4>
				<p><?php _e( 'To create your first campaign, simply click the Create button.', Auto_Robot::DOMAIN ); ?></p>

				<h4><?php _e( '2. Select Campaign Source Type', Auto_Robot::DOMAIN );?></h4>
				<p><?php _e( 'You will need to select the source type between RSS Feed, Social Media, Video.', Auto_Robot::DOMAIN ); ?></p>

				<h4><?php _e( '3. Save Your Campaign Settings', Auto_Robot::DOMAIN );?></h4>
				<p><?php _e( 'There are tons of settings to help you customize the campaign to suit your needs.', Auto_Robot::DOMAIN );?></p>
			</div>
		</div>
		<div class="changelog section-getting-started">
			<div class="robot-tip">
			<?php printf( __( 'Want to more custom campaign types and customize options? Check out all our %s.', Auto_Robot::DOMAIN ), $document_link ); ?>
			</div>
		</div>
		<div class="changelog section-getting-started">
			<div class="feature-section">
				<h2><?php _e( 'Manage Your Campaigns', Auto_Robot::DOMAIN ); ?></h2>

				<img src="<?php echo esc_url('https://wpautorobot.com/wp-content/uploads/2022/07/campaigns-list.png') ?>" class="robot-help-screenshot" alt="<?php esc_attr_e( 'Auto Robot', Auto_Robot::DOMAIN ); ?>">

				<h4><?php printf( __( '1. <a href="%s" target="_blank">Go to Campaigns List</a>', Auto_Robot::DOMAIN ), esc_url ( admin_url( 'admin.php?page=auto-robot-campaign' ) ) ); ?></h4>
				<p><?php _e( 'We make your life easy! Just use the bulk actions you can publish, unpublish and delete campaigns. ', Auto_Robot::DOMAIN );?></p>

				<h4><?php _e( '2. Edit Campaigns', Auto_Robot::DOMAIN );?></h4>
				<p><?php _e( 'To edit any your campaign, simply click the Edit button.', Auto_Robot::DOMAIN ); ?></p>

			</div>
		</div>
	</div>
	<div id="demo" class="nav-container">
		<h2><?php _e( 'Videos Demo', Auto_Robot::DOMAIN ); ?></h2>
		<div class="demos_masonry">
		<?php
			foreach ( $demos as $demo ) {
		?>
				<div class="demo_section">
					<h3><a href="<?php echo esc_url($demo['href']); ?>" target="_blank" title="<?php __('Open demo in new tab',Auto_Robot::DOMAIN); ?>"><?php echo $demo['demo']; ?></a></h3>
				</div>
		<?php
			}
		?>

		</div>
	</div>
	<div id="support" class="nav-container">
		<h2><?php _e( "Need help? We're here for you...", Auto_Robot::DOMAIN ); ?></h2>
		<p class="document-center">
			<span class="dashicons dashicons-editor-help"></span>
			<a href="<?php echo esc_url ( $document_url ); ?>" target="_blank">
			<?php _e('Document',Auto_Robot::DOMAIN); ?>
			- <?php _e('The document articles will help you troubleshoot issues that have previously been solved.', Auto_Robot::DOMAIN); ?>
			</a>
		</p>
		<div class="feature-cta">
			<p><?php _e('Still stuck? Please open a support ticket and we will help:', Auto_Robot::DOMAIN); ?></p>
			<a target="_blank" href="<?php echo esc_url ( $support_url ); ?>"><?php _e('Open a support ticket', Auto_Robot::DOMAIN ); ?></a>
		</div>
	</div>
	</div>
</div>
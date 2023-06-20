<?php
$license_activated = get_option( 'auto_robot_license_activated');
if ( !empty($license_activated) && $license_activated == '102' ) {
    $license_status = 'activated';
    $license_action = 'deactive';
    $license_action_text = 'DEACTIVATE';
    $license_code = get_option('auto_robot_license_code');
}else{
    $license_status = 'inactivated';
    $license_action = 'active';
    $license_action_text = 'ACTIVATE NOW';
}
?>
<div class="page-container header-license">
	<div class="page-content">
		<div class="row row-custom">
			<div class="robot-license-text">
					<h2><?php echo esc_attr( __( 'Auto Robot', Auto_Robot::DOMAIN ) ); ?></h2>
                    <p class="version">
                        <?php
                            printf(
                                esc_html__( 'v%1$s', Auto_Robot::DOMAIN ),
                                AUTO_ROBOT_VERSION
                            );
                        ?>
                    </p>
                    <p class="status">
                    <strong>
                        <?php
                            printf(
                                esc_html__( 'License Status: %1$s', Auto_Robot::DOMAIN ),
                                $license_status
                            );
                        ?>
                    </strong>
                    </p>
                    <div class="robot-license-key-wrapper">
                    <form method="post" name="robot-license-form" class="robot-license-form">
                        <?php if($license_status == 'inactivated') : ?>
                        <input
                            type="text"
                            name="robot_license_key"
                            placeholder="<?php esc_html_e( 'Enter your license key here', Auto_Robot::DOMAIN ); ?>"
                            value=""
                            id="robot_license_key"
                            class="robot-form-control robot-license-key"
                        />
                        <?php endif; ?>
                        <?php if($license_status == 'activated') : ?>
                        <input type="hidden" name="robot_license_key" value="<?php echo esc_attr( $license_code ); ?>">
                        <?php endif; ?>
                        <input type="hidden" name="type" value="<?php echo esc_attr( $license_action ); ?>">
                    </form>
                    </div>
                    <div class="robot-license-action">
                        <button class="robot-button robot-button-blue robot-trigger-license-action">
                            <?php _e( $license_action_text ); ?>
                        </button>
                    </div>
                    <div class="robot-license-verify-message">
                    </div>
			</div>
		</div>
	</div>
</div>

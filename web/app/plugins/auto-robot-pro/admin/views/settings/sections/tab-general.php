<?php
$settings = get_option('auto_robot_global_settings');
$nonce = wp_create_nonce( 'robot_save_global_settings' );
?>
<div id="general" class="robot-box-tab" data-nav="general" >

    <div class="robot-box-header">
        <h2 class="robot-box-title"><?php esc_html_e( 'General', Auto_Robot::DOMAIN ); ?></h2>
    </div>

    <form class="robot-settings-form" method="post" action="">

    <div class="robot-box-body">
        <?php $this->template( 'settings/components/general-settings', $settings ); ?>
    </div>

    <div class="robot-box-footer">

        <div class="robot-actions-right">

            <button class="robot-save-settings robot-button robot-button-blue" type="button">
                <span class="robot-loading-text"><?php esc_html_e( 'Save Settings', Auto_Robot::DOMAIN ); ?></span>
            </button>

        </div>

    </div>

    </form>



</div>



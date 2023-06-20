<?php
$robot_campaign_per_page = isset($settings['robot-campaign-per-page']) ? $settings['robot-campaign-per-page'] : 10;
?>
<div class="robot-box-settings-row">

    <div class="robot-box-settings-col-1">
        <span class="robot-settings-label"><?php esc_html_e( 'Pagination', Auto_Robot::DOMAIN ); ?></span>
        <span class="robot-description"><?php esc_html_e( 'Choose the number of items to show per page on your campaigns listing pages.', Auto_Robot::DOMAIN ); ?></span>
    </div>

    <div class="robot-box-settings-col-2">

        <label class="robot-settings-label"><?php esc_html_e( 'Campaign Limit', Auto_Robot::DOMAIN ); ?></label>

        <span class="robot-description"><?php esc_html_e( 'Choose the number of campaigns to show on each listing page.', Auto_Robot::DOMAIN ); ?></span>

        <div class="robot-form-field">
            <input type="number"
                   name="robot-campaign-per-page"
                   placeholder="<?php esc_html_e( '10', Auto_Robot::DOMAIN ); ?>"
                   value="<?php echo esc_attr( $robot_campaign_per_page ); ?>"
                   min="1"
                   id="robot_campaign_per_page"
                   class="robot-form-control robot-required robot-input-sm robot-field-has-suffix"/>
        </div>


    </div>

</div>

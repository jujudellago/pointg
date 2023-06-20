<?php
$source = isset( $_GET['source'] ) ? sanitize_text_field( $_GET['source'] ) : 'dashboard';
?>
<div class="robot-box-settings-row">

    <div class="robot-box-settings-col-1">
        <span class="robot-settings-label"><?php esc_html_e( 'Campaign Name', Auto_Robot::DOMAIN ); ?></span>
    </div>

    <div class="robot-box-settings-col-2">

        <div>
            <input
                type="text"
                name="robot_campaign_name"
                placeholder="<?php esc_html_e( 'Enter your Campaign Name here', Auto_Robot::DOMAIN ); ?>"
                value="<?php if(isset($settings['robot_campaign_name'])){echo $settings['robot_campaign_name'];}?>"
                id="robot_campaign_name"
                class="robot-form-control"
                aria-labelledby="robot_campaign_name"
            />
        </div>

        <?php if( isset($source) && $source !== 'rss'): ?>

        <p>
          <span class="robot-description">
              <a href="<?php echo admin_url( 'admin.php?page=auto-robot-integrations' );?>">
                  <?php esc_html_e( 'Note: Please Remember to Setup Application API before run this campaign', Auto_Robot::DOMAIN ); ?>
              </a>
          </span>
        </p>

        <?php endif; ?>


    </div>

</div>

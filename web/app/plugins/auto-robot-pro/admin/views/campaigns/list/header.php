<?php $count = $this->countModules(); ?>
<h1 class="robot-header-title"><?php esc_html_e( 'Campaigns', Auto_Robot::DOMAIN ); ?></h1>

<div class="robot-actions-left">
    <a href="<?php echo admin_url( 'admin.php?page=auto-robot-welcome' ); ?>" class="robot-button robot-button-blue robot-button-blue-first">
        <?php esc_html_e( 'Create', Auto_Robot::DOMAIN ); ?>
    </a>
    <a href="https://www.spinrewriter.com/?ref=50f2e" target="_blank" class="robot-button robot-button-blue">
        <?php esc_html_e( 'Spin Rewriter', Auto_Robot::DOMAIN ); ?>
    </a>
</div>

<div class="robot-actions-right">
        <a href="https://wpautorobot.com/document/" target="_blank" class="robot-button robot-button-ghost">
            <ion-icon class="robot-icon-document" name="document-text-sharp"></ion-icon>
            <?php esc_html_e( 'View Documentation', Auto_Robot::DOMAIN ); ?>
        </a>
</div>


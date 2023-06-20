<?php
$list_table = new Auto_Robot_Log_List_Table();
$list_table->prepare_items();
$base_url = admin_url( 'admin.php?page=auto-robot-logs' );
?>
<div class="wrap">
    <form method="get" action="<?php echo esc_url( $base_url ); ?>">
        <div class="robot-row-with-sidenav">
            <input type="hidden" name="page" value="auto-robot-logs"/>
            <?php $list_table->views() ?>
            <?php $list_table->display() ?>
        </div>
    </form>
</div>

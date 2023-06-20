<?php
$import_data = false;
if (isset($_FILES['import_file'])) {
    if ($_FILES['import_file']['error'] > 0) {
        echo '<div class="error"><p>'.__('Invalid file or file size too big.', Auto_Robot::DOMAIN).'</p></div>';
    }else {
        $file_name = $_FILES['import_file']['name'];
		$ext = explode(".", $file_name);
        $file_ext = strtolower(end($ext));
        $file_size = $_FILES['import_file']['size'];
        if ($file_ext == "json") {
            $encode_data = file_get_contents($_FILES['import_file']['tmp_name']);
            $import_data = json_decode($encode_data, true);
        }else {
			echo '<div class="error"><p>'.__('Invalid file or file size too big.', Auto_Robot::DOMAIN).'</p></div>';
        }
    }

    /* Import campaigns */
    if(is_array($import_data)){
        foreach($import_data as $key => $item){
            $form_model = new Auto_Robot_Custom_Form_Model();
            $form_model->settings = $item;
            // status
            $form_model->status = Auto_Robot_Custom_Form_Model::STATUS_PUBLISH;
            // Save data
            $form_model->save();
        }
    }
    echo '<div class="updated"><p>'.__('Campaings has been imported successfully.', Auto_Robot::DOMAIN).'</p></div>';
}


?>
<div id="import" class="robot-box-tab active" data-nav="import" >

    <div class="robot-box-header">
        <h2 class="robot-box-title"><?php esc_html_e( 'Import', Auto_Robot::DOMAIN ); ?></h2>
    </div>

    <form class="robot-settings-form" method="post" action="" enctype="multipart/form-data">

    <div class="robot-box-body">
        <div class="robot-box-settings-row">
            <div class="robot-box-settings-col-1">
                <span class="robot-settings-label"><?php esc_html_e( 'Import Campaigns', Auto_Robot::DOMAIN ); ?></span>
                <span class="robot-description"><?php esc_html_e( 'Import new campaigns from your other sites.', Auto_Robot::DOMAIN ); ?></span>
            </div>
            <div class="robot-box-settings-col-2">
                <div class="robot-import-file-wrapper">
					<input type="file" name="import_file" id="robot-import-file-input" />
				</div>
            </div>
        </div>
    </div>

    <div class="robot-box-footer">
        <div class="robot-actions-left">
            <button class="robot-button robot-button-blue" type="submit">
                <span class="robot-loading-text"><?php esc_html_e( 'Import', Auto_Robot::DOMAIN ); ?></span>
            </button>
        </div>
    </div>

    </form>



</div>



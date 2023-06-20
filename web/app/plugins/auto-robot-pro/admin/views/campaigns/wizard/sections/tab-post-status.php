<?php
$authors = get_users();
?>
<div id="post-status" class="robot-box-tab" data-nav="post-status" >

    <div class="robot-box-header">
        <h2 class="robot-box-title"><?php esc_html_e( 'Post Status, Type & Author', Auto_Robot::DOMAIN ); ?></h2>
    </div>


    <div class="robot-box-body">
        <div class="robot-box-settings-row">
            <div class="robot-box-settings-col-1">
                <span class="robot-settings-label"><?php esc_html_e( 'Post Status', Auto_Robot::DOMAIN ); ?></span>
            </div>
            <div class="robot-box-settings-col-2">
                <div class="post-select-container">
                    <span class="post-dropdown-handle" aria-hidden="true">
                        <ion-icon name="chevron-down" class="robot-icon-down"></ion-icon>
                    </span>
                    <div class="post-select-list-container">
                        <button type="button" class="post-list-value" id="robot-post-status" value="publish">
                            <?php
                            if(isset($settings['robot_post_status'])){
                                echo $settings['robot_post_status'];
                            }else{
                                esc_html_e( 'publish', Auto_Robot::DOMAIN );
                            }
                            ?>
                        </button>
                        <ul tabindex="-1" role="listbox" class="post-list-results robot-sidenav-hide-md" >
                            <li><?php esc_html_e( 'publish', Auto_Robot::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'draft', Auto_Robot::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'private', Auto_Robot::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'pending', Auto_Robot::DOMAIN ); ?></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="robot-box-settings-row">
            <div class="robot-box-settings-col-1">
                <span class="robot-settings-label"><?php esc_html_e( 'Post Type', Auto_Robot::DOMAIN ); ?></span>
            </div>
            <div class="robot-box-settings-col-2">
                <div class="type-select-container">
                    <span class="type-dropdown-handle" aria-hidden="true">
                        <ion-icon name="chevron-down" class="robot-icon-down"></ion-icon>
                    </span>
                    <div class="type-select-list-container">
                        <button type="button" class="type-list-value" id="robot-post-type" value="post">
                            <?php
                            if(isset($settings['robot_post_type'])){
                                echo $settings['robot_post_type'];
                            }else{
                                esc_html_e( 'post', Auto_Robot::DOMAIN );
                            }
                            ?>
                        </button>
                        <ul tabindex="-1" role="listbox" class="type-list-results robot-sidenav-hide-md" >
                            <li><?php esc_html_e( 'post', Auto_Robot::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'page', Auto_Robot::DOMAIN ); ?></li>
                            <li><?php esc_html_e( 'attachment', Auto_Robot::DOMAIN ); ?></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="robot-box-settings-row">
            <div class="robot-box-settings-col-1">
                <span class="robot-settings-label"><?php esc_html_e( 'Post Author', Auto_Robot::DOMAIN ); ?></span>
            </div>
            <div class="robot-box-settings-col-2">
                <div class="author-select-container">
                    <span class="author-dropdown-handle" aria-hidden="true">
                        <ion-icon name="chevron-down" class="robot-icon-down"></ion-icon>
                    </span>
                    <div class="author-select-list-container">
                        <button type="button" class="author-list-value" id="robot-post-author"
                                value="<?php
                                if(isset($settings['robot_post_author'])){
                                    echo $settings['robot_post_author'];
                                }else{
                                    esc_html_e( $authors[0]->data->user_login );
                                }
                                ?>">
                            <?php
                            if(isset($settings['robot_post_author'])){
                                echo $settings['robot_post_author'];
                            }else{
                                esc_html_e( $authors[0]->data->user_login );
                            }
                            ?>
                        </button>
                        <ul class="author-list-results robot-sidenav-hide-md" >
                            <?php foreach ( $authors as $key => $value ) : ?>
                                <li><?php esc_html_e( $value->data->user_login ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>



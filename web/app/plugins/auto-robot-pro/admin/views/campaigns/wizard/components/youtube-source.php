<div class="robot-box-settings-row">

    <div class="robot-box-settings-col-1">
        <span class="robot-settings-label"><?php esc_html_e( 'Source', Auto_Robot::DOMAIN ); ?></span>
        <span class="robot-description"><?php esc_html_e( 'Select source from playlist, channel ans search keywords', Auto_Robot::DOMAIN ); ?></span>
    </div>

    <div class="robot-box-settings-col-2">

        <div class="source-select-container">
            <span class="source-dropdown-handle" aria-hidden="true">
                <ion-icon name="chevron-down" class="robot-icon-down"></ion-icon>
            </span>
            <div class="source-select-list-container">
                <button type="button" class="source-list-value" id="source-robot-field-unit-button" value="Playlist">
                    <?php
                    if(isset($settings['robot_youtube_source_category'])){
                        echo $settings['robot_youtube_source_category'];
                    }else{
                        esc_html_e( 'Playlist', Auto_Robot::DOMAIN );
                    }
                    ?>
                </button>
                <ul tabindex="-1" role="listbox" class="source-list-results source-robot-sidenav-hide-md" >
                    <li data-nav="playlist"><?php esc_html_e( 'playlist', Auto_Robot::DOMAIN ); ?></li>
                    <li data-nav="channel"><?php esc_html_e( 'channel', Auto_Robot::DOMAIN ); ?></li>
                    <li data-nav="keywords"><?php esc_html_e( 'keywords', Auto_Robot::DOMAIN ); ?></li>
                </ul>
            </div>
        </div>

        <div class="sui-tabs-content">
            <div class="sui-tab-content active" id="playlist">
                <div class="robot-form-field">
                    <label for="robot_youtube_playlist" id="robot-youtube-playlist-label" class="robot-label">
                        <span>
                        <?php
                        printf(
                            esc_html__( 'The ID after the list, for example "PL4o29bINVT4EG_y-k5jGoOu3-Am8Nvi10" for  %1$s)', Auto_Robot::DOMAIN ),
                            '<a href="https://www.robot.com/watch?v=SlPhMPnQ58k&list=PL4o29bINVT4EG_y-k5jGoOu3-Am8Nvi10/">this playlist</a>'
                        );
                        ?>
                        </span>
                    </label>
                    <input
                        type="text"
                        name="robot_youtube_playlist"
                        placeholder="<?php esc_html_e( 'Enter your robot playlist id here', Auto_Robot::DOMAIN ); ?>"
                        value="<?php if(isset($settings['robot_youtube_playlist'])){echo $settings['robot_youtube_playlist'];}?>"
                        id="robot-youtube-playlist"
                        class="robot-form-control"
                        aria-labelledby="robot_youtube_playlist"
                    />
                </div>
            </div>

            <div class="sui-tab-content" id="channel">
                <label for="robot_youtube_channel" id="robot-youtube-channel-label" class="robot-label">
                    <p>
                        <span>
                        <?php
                        printf(
                            esc_html__( 'The ID after the channel, for example "UC94pBdaUbepV5n3_F_isSWg" for  %1$s)', Auto_Robot::DOMAIN ),
                            '<a href="https://www.robot.com/channel/UC94pBdaUbepV5n3_F_isSWg/">this channel</a>'
                        );
                        ?>
                        </span>
                    </p>
                </label>
                <input
                    type="text"
                    name="robot_youtube_channel"
                    placeholder="<?php esc_html_e( 'Enter your robot channel id here', Auto_Robot::DOMAIN ); ?>"
                    value="<?php if(isset($settings['robot_youtube_channel'])){echo $settings['robot_youtube_channel'];}?>"
                    id="robot-youtube-channel"
                    class="robot-form-control"
                    aria-labelledby="robot_youtube_channel"
                />
            </div>

            <div class="sui-tab-content" id="keywords">
                <div class="robot-form-field">
                    <label for="robot_search" id="robot-feed-link" class="robot-label"><?php esc_html_e( 'search keyword', Auto_Robot::DOMAIN ); ?></label>
                    <input
                        type="text"
                        name="robot_search"
                        placeholder="<?php esc_html_e( 'Enter your search keyword here', Auto_Robot::DOMAIN ); ?>"
                        value=""
                        id="robot-search"
                        class="robot-form-control"
                        aria-labelledby="robot_search"
                    />
                </div>

                <div class="robot-search-results-wrapper">
                    <ul class="search-result-list">
                    </ul>
                </div>

                <div class="robot-form-field">
                    <label for="robot_selected_keywords" id="robot-feed-link" class="robot-label"><?php esc_html_e( 'Selected Keywords', Auto_Robot::DOMAIN ); ?></label>
                    <textarea class="robot-form-control" id="robot-selected-keywords" rows="5" cols="20" name="robot_selected_keywords" required="required"><?php if(isset($settings['robot_selected_keywords'])){echo $settings['robot_selected_keywords'];}?></textarea>
                </div>
            </div>
        </div>

    </div>

</div>

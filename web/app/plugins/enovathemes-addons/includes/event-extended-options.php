<?php

add_action("admin_init", "enovathemes_addons_add_event_meta_box");
function enovathemes_addons_add_event_meta_box(){

    add_meta_box(
        "enovathemes-event-details", 
        esc_html__("Event extended options", 'enovathemes-addons'),
        "enovathemes_addons_render_event_options", 
        "et-event",
        "normal", 
        "high"
    );

}

function enovathemes_addons_render_event_options($post) {

    global $post;

    $values                 = get_post_custom( $post->ID );
    $booking_closed         = isset( $values['booking_closed'] ) ? esc_attr( $values["booking_closed"][0] ) : "false";
    $booking_closed_message = isset( $values['booking_closed_message'] ) ? esc_attr( $values["booking_closed_message"][0] ) : "";
    $event_date             = isset( $values['event_date'] ) ? esc_attr( $values["event_date"][0] ) : "";
    $event_date_unix        = isset( $values['event_date'] ) ? strtotime( $values["event_date"][0] ) : "";
    $event_time             = isset( $values['event_time'] ) ? esc_attr( $values["event_time"][0] ) : "";
    $event_meta             = isset( $values['event_meta'] ) ? esc_attr( $values["event_meta"][0] ) : "";
    $format                 = isset( $values['format'] ) ? esc_attr( $values["format"][0] ) : "gallery";
    $audio_mp3              = isset( $values['audio_mp3'] ) ? esc_url( $values["audio_mp3"][0] ) : "";
    $audio_ogg              = isset( $values['audio_ogg'] ) ? esc_url( $values["audio_ogg"][0] ) : "";
    $audio_embed            = isset( $values['audio_embed'] ) ? $values["audio_embed"][0] : "";
    $video_mp4              = isset( $values['video_mp4'] ) ? esc_url( $values["video_mp4"][0] ) : "";
    $video_ogv              = isset( $values['video_ogv'] ) ? esc_url( $values["video_ogv"][0] ) : "";
    $video_webm             = isset( $values['video_webm'] ) ? esc_url( $values["video_webm"][0] ) : "";
    $video_embed            = isset( $values['video_embed'] ) ? $values["video_embed"][0] : "";
    $video_poster           = isset( $values['video_poster'] ) ? esc_attr( $values["video_poster"][0] ) : "";

    wp_nonce_field( 'enovathemes_addons_event_meta_nonce', 'enovathemes_addons_event_meta_nonce' );
?>

    <div class="post-section" id="post-section-event-details">
        <h3 class="post-section-title"><?php echo esc_html__("Event details", 'enovathemes-addons'); ?></h3>
        <div class="post-sub-section et-clearfix">

            <div id="event-booking-closed" class="post-option">
                <label for="booking_closed">
                    <?php echo esc_html__('Close event booking?', 'goodresto'); ?>
                </label>
                <input type="checkbox" name="booking_closed" value="true" <?php checked( $booking_closed, "true" ); ?> />
            </div>

            <div id="event-booking-message" class="post-option">
                <label for="booking_closed_message"><?php echo esc_html__('Enter event booking cancellation custom message:', 'enovathemes-addons'); ?></label>
                <div>
                    <textarea name="booking_closed_message" id="booking_closed_message" ><?php echo $booking_closed_message;?></textarea>
                    <p class="post-notice"><?php echo esc_html__('If you leave the textbox blank the default message will be shown', 'enovathemes-addons'); ?></p>
                </div>
            </div>

            <div id="event-date-option" class="post-option">
                <label for="event_date"><?php echo esc_html__('Enter event date:', 'enovathemes-addons'); ?></label>
                <div>
                    <input name="event_date" type="text" id="event_date" value="<?php echo $event_date;?>" />
                    <input name="event_date_unix" type="hidden" id="event_date_unix" value="<?php echo $event_date_unix;?>" />
                    <p class="post-notice"><?php echo esc_html__('Use this format only mm/dd/yyyy (4/17/2018)', 'enovathemes-addons'); ?></p>
                </div>
            </div>

            <div id="event-time-option" class="post-option">
                <label for="event_time"><?php echo esc_html__('Enter event time:', 'enovathemes-addons'); ?></label>
                <div>
                    <input name="event_time" type="text" id="event_time" value="<?php echo $event_time;?>" />
                    <p class="post-notice"><?php echo esc_html__('Use this format only hh:mm AM/PM (21:30 PM)', 'enovathemes-addons'); ?></p>
                </div>
            </div>
            
            <div id="event-meta-option" class="post-option">
                <label for="event_meta"><?php echo esc_html__('Enter event additional details here (Basic HTML is allowed):', 'enovathemes-addons'); ?></label>
                <div>
                    <textarea name="event_meta" id="event_meta" ><?php echo $event_meta;?></textarea>
                    <p class="post-notice"><?php echo esc_html__('Use line break (press Enter) to separate between items', 'enovathemes-addons'); ?></p>
                </div>
            </div>
            
        </div>
    </div>

    <div class="post-section" id="post-section-event-format">
        <h3 class="post-section-title"><?php echo esc_html__("Event format", 'enovathemes-addons'); ?></h3>
        <div class="post-sub-section et-clearfix" id="event-format-subsection">
            <div class="select-event-format">
                <fieldset class="et-clearfix">
                    <div id="event-image" class="post-option">
                        <label for="format"><?php echo esc_html__("Gallery", 'enovathemes-addons'); ?></label>
                        <input type="radio" id="event-format-image" name="format" class="event-format-media" value="gallery" checked <?php checked( $format, "gallery" ); ?> />
                    </div>
                    <div id="event-video" class="post-option">
                        <label for="format"><?php echo esc_html__("Video", 'enovathemes-addons'); ?></label>
                        <input type="radio" id="event-format-video" name="format" class="event-format-media" value="video" <?php checked( $format, "video" ); ?> /> 
                    </div>
                    <div id="event-audio" class="post-option">
                        <label for="format"><?php echo esc_html__("Audio", 'enovathemes-addons'); ?></label>
                        <input type="radio" id="event-format-audio" name="format" class="event-format-media" value="audio" <?php checked( $format, "audio" ); ?> /> 
                    </div>
                </fieldset>
            </div>
            <div id="event-format-options">
                <div class="optional" id="format-audio">
                    <h4 class="post-subsection-title"><?php echo esc_html__("Audio event format options", 'enovathemes-addons'); ?></h4>
                    <div class="post-option">
                        <label for="audio_mp3"><?php echo esc_html__('Enter  MP3 audio file link here:', 'enovathemes-addons'); ?></label>
                        <input name="audio_mp3" id="event-audio-mp3" type="text" value="<?php echo esc_url($audio_mp3);?>"/>
                    </div>
                    <div class="post-option">
                        <label for="audio_ogg"><?php echo esc_html__('Enter  OGG audio file link here:', 'enovathemes-addons'); ?></label>
                        <input name="audio_ogg" id="event-audio-ogg" type="text" value="<?php echo esc_url($audio_ogg);?>"/>
                    </div>
                    <div class="post-option">
                        <label for="audio_embed"><?php echo esc_html__('Embed audio here:', 'enovathemes-addons'); ?></label>
                        <textarea name="audio_embed" id="event-audio-embed"><?php echo $audio_embed;?></textarea>
                    </div>
                </div>
                <div class="optional" id="format-video">
                    <h4 class="post-subsection-title"><?php echo esc_html__("Video event format options", 'enovathemes-addons'); ?></h4>
                    <div class="post-option">
                        <label for="video_mp4"><?php echo esc_html__('Enter  MP4 video file link here:', 'enovathemes-addons'); ?></label>
                        <input name="video_mp4" id="event-video-mp3" type="text" value="<?php echo esc_url($video_mp4);?>"/>
                    </div>
                    <div class="post-option">
                        <label for="video_ogv"><?php echo esc_html__('Enter  OGV video file link here:', 'enovathemes-addons'); ?></label>
                        <input name="video_ogv" id="event-video-ogv" type="text" value="<?php echo esc_url($video_ogv);?>"/>
                    </div>
                    <div class="post-option">
                        <label for="video_webm"><?php echo esc_html__('Enter  WEBM video file link here:', 'enovathemes-addons'); ?></label>
                        <input name="video_webm" id="event-video-webm" type="text" value="<?php echo esc_url($video_webm);?>"/>
                    </div>
                    <br>
                    <div class="post-option">
                        <label for="video_poster"><?php echo esc_html__('Video poster:', 'enovathemes-addons'); ?></label>
                        <div class="enovathemes-upload">
                            <input name="video_poster" id="event-video-poster" type="hidden" class="enovathemes-upload-path" value="<?php echo esc_url($video_poster);?>"/> 
                            <input class="enovathemes-button-upload button" type="button" value="<?php echo esc_html__('Upload video poster image', 'enovathemes-addons') ?>" />
                            <input class="enovathemes-button-remove button" type="button" value="<?php echo esc_html__('Remove video poster image', 'enovathemes-addons') ?>" />
                            <img src='<?php echo esc_url($video_poster); ?>' class='et-img-preview enovathemes-preview-upload'/>
                        </div>
                    </div>

                    <div class="post-option">
                        <label for="video_embed"><?php echo esc_html__('Embed video here:', 'enovathemes-addons'); ?></label>
                        <textarea name="video_embed" id="event-video-embed"><?php echo esc_attr($video_embed);?></textarea>
                    </div>
                </div>
                <div class="optional" id="format-gallery">
                    <div class="post-option">
                        <p class="post-notice">
                            <?php echo esc_html__('Use Gallery metabox (at the bottom of event format) to upload images for the gallery event format', 'enovathemes-addons'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php

}

add_action( 'save_post', 'enovathemes_addons_save_enovathemes_event_options' );  
function enovathemes_addons_save_enovathemes_event_options( $post_id )  
{  
    
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if( !isset( $_POST['enovathemes_addons_event_meta_nonce'] ) || !wp_verify_nonce( $_POST['enovathemes_addons_event_meta_nonce'], 'enovathemes_addons_event_meta_nonce' ) ) return;  
    if ( ! current_user_can( 'edit_page', $post_id ) ) return;
    
    if( isset( $_POST['event_time'] ) ){update_post_meta($post_id, "event_time",$_POST["event_time"]);}
    if( isset( $_POST['event_date'] ) ){update_post_meta($post_id, "event_date",$_POST["event_date"]);}
    if( isset( $_POST['event_date_unix'] ) ){update_post_meta($post_id, "event_date_unix",$_POST["event_date_unix"]);}
    if( isset( $_POST['event_meta'] ) ){update_post_meta($post_id, "event_meta",$_POST["event_meta"]);}
    
    if( isset( $_POST['format'] ) ){update_post_meta($post_id, "format",$_POST["format"]);}

    if( isset( $_POST['audio_mp3'] ) ){update_post_meta($post_id, "audio_mp3",$_POST["audio_mp3"]);}
    if( isset( $_POST['audio_ogg'] ) ){update_post_meta($post_id, "audio_ogg",$_POST["audio_ogg"]);}
    if( isset( $_POST['audio_embed'] ) ){update_post_meta($post_id, "audio_embed",$_POST["audio_embed"]);}
    if( isset( $_POST['video_mp4'] ) ){update_post_meta($post_id, "video_mp4",$_POST["video_mp4"]);}
    if( isset( $_POST['video_ogv'] ) ){update_post_meta($post_id, "video_ogv",$_POST["video_ogv"]);}
    if( isset( $_POST['video_webm'] ) ){update_post_meta($post_id, "video_webm",$_POST["video_webm"]);}
    if( isset( $_POST['video_embed'] ) ){update_post_meta($post_id, "video_embed",$_POST["video_embed"]);}
    if( isset( $_POST['video_poster'] ) ){update_post_meta($post_id, "video_poster",$_POST["video_poster"]);}

    $booking_closed_checked = ( isset( $_POST['booking_closed'] ) ) ? "true" : "false";
    update_post_meta($post_id, "booking_closed", $booking_closed_checked);

    if( isset( $_POST['booking_closed_message'] ) ){update_post_meta($post_id, "booking_closed_message",$_POST["booking_closed_message"]);}

}
?>
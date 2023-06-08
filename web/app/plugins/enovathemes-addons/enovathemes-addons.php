<?php 
/*
    Plugin Name: Enovathemes add-ons
    Plugin URI: http://www.enovathemes.com
    Text Domain: enovathemes-addons
    Domain Path: /languages/
    Description: Plugin comes with Enovathemes to extend theme functionality (shortcodes, custom post types, option panel etc.)
    Author: Enovathemes
    Version: 2.8
    Author URI: http://enovathemes.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function enovathemes_addons_load_plugin_textdomain() {
    load_plugin_textdomain( 'enovathemes-addons', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'enovathemes_addons_load_plugin_textdomain' );

define( 'ENOVATHEMES_ADDONS', plugin_dir_path( __FILE__ ));
define( 'ENOVATHEMES_ADDONS_IMG', plugins_url( 'images/', __FILE__ ));

if ( !class_exists( 'ReduxFramework' ) && file_exists( ENOVATHEMES_ADDONS . '/optionpanel/framework.php' ) ) {
    require_once('optionpanel/framework.php' );
}
if (!isset( $redux_demo ) && file_exists( ENOVATHEMES_ADDONS . '/optionpanel/config.php' ) ) {
    require_once('optionpanel/config.php' );
}

require_once('includes/quick-styles.php' );
require_once('includes/footers.php' );
require_once('includes/archive-sliders.php' );
require_once('includes/banner.php' );
require_once('includes/gallery.php' );
require_once('event/event.php' );
require_once('menu/menu.php' );
require_once('shortcodes/shortcodes.php' );
require_once('includes/post-extended-options.php' );
require_once('includes/page-extended-options.php' );
require_once('includes/event-extended-options.php' );
require_once('includes/menu-extended-options.php' );
require_once('widgets/custom-twitter.php' );
require_once('widgets/custom-schedule.php' );
require_once('widgets/custom-reglog.php' );
require_once('widgets/custom-mailchimp.php' );
require_once('widgets/custom-recent-entries.php' );
require_once('widgets/custom-flickr.php' );
require_once('widgets/custom-recent-event.php' );
require_once('widgets/custom-facebook.php' );
require_once('widgets/custom-contact-form.php' );

add_action( 'pre_get_posts', 'enovathemes_addons_pre_get_post' );
function enovathemes_addons_pre_get_post( $query ) {

    global $goodresto_enovathemes;

    if( (is_post_type_archive( 'et-event' ) || is_tax( 'event-category' ) || is_tax( 'et-event-tag' )) && !is_admin() && $query->is_main_query() ) {
        $event_per_page   = (isset($GLOBALS['goodresto_enovathemes']['event-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['event-per-page'])) ? $GLOBALS['goodresto_enovathemes']['event-per-page'] : get_option( 'posts_per_page' );
        $query->set('posts_per_page',$event_per_page);
        $query->set('meta_key', 'event_date_unix' );
        $query->set( 'orderby', 'meta_value' );
        $query->set( 'order', 'DESC' );
    }

    if( (is_post_type_archive( 'menu' ) || is_tax( 'menu-category' )) && !is_admin() && $query->is_main_query() ) {
        
        $menu_per_page   = (isset($GLOBALS['goodresto_enovathemes']['menu-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['menu-per-page'])) ? $GLOBALS['goodresto_enovathemes']['menu-per-page'] : get_option( 'posts_per_page' );
        
        $menu_filter_start_category = (isset($GLOBALS['goodresto_enovathemes']['menu-filter-start-category']) && !empty($GLOBALS['goodresto_enovathemes']['menu-filter-start-category'])) ? $GLOBALS['goodresto_enovathemes']['menu-filter-start-category'] : "all";
        
        $query->set( 'posts_per_page', $menu_per_page );
        
        if ($menu_filter_start_category != "all" && is_post_type_archive( 'menu' ) && $query->is_main_query()) {
            $query->set( 'tax_query', array(
                array(
                    'taxonomy' => 'menu-category',
                    'field'    => 'id',
                    'terms'    => $menu_filter_start_category,
                )
            ) );
        }
        
    }

    if( (is_post_type_archive( 'product' ) || is_tax( 'product-cat' ) || is_tax( 'product-tag' )) && !is_admin() && $query->is_main_query() ) {
        $product_per_page   = (isset($GLOBALS['goodresto_enovathemes']['product-per-page']) && !empty($GLOBALS['goodresto_enovathemes']['product-per-page'])) ? $GLOBALS['goodresto_enovathemes']['product-per-page'] : get_option( 'posts_per_page' );
        $query->set( 'posts_per_page', $product_per_page );
    }

}

function enovathemes_addons_script(){
    if(!is_admin()){

        global $wp_query;
        wp_enqueue_script( 'enovathemes-contact-form', plugins_url('/js/enovathemes-contact-form.js', __FILE__ ), array('jquery'), '', true);
        wp_enqueue_script( 'enovathemes-event-booking-form', plugins_url('/js/enovathemes-event-booking-form.js', __FILE__ ), array('jquery'), '', true);
        wp_enqueue_script( 'enovathemes-et-booking-form', plugins_url('/js/enovathemes-et-booking-form.js', __FILE__ ), array('jquery'), '', true);

    }
}
add_action( 'wp_enqueue_scripts', 'enovathemes_addons_script' );

/*  Widget FCF
/*-------------------*/

    function enovathemes_addons_enovathemes_contact_form_send(){

        $name    = strip_tags(trim($_POST["enovathemes_contact_form_name"]));
        $name    = str_replace(array("\r","\n"),array(" "," "),$name);
        $email   = filter_var(trim($_POST["enovathemes_contact_form_email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["enovathemes_contact_form_mgs"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo esc_html__("Oops! There was a problem with your submission. Please complete the form and try again.", "enovathemes-addons");
            exit;
        }

        // Set the recipient email address.
        $recipient = get_option('admin_email');

        // Set the email subject.
        $subject = esc_html__("Fast contact mail from ", "enovathemes-addons")." ".$name;

        // Build the email content.
        $email_content .= esc_html__("Name: ", "enovathemes-addons").$name."\n";
        $email_content .= esc_html__("Email: ", "enovathemes-addons").$email."\n";
        $email_content .= esc_html__("Message: ", "enovathemes-addons")."\n\n".$message."\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo esc_html__("Thank You! Your message has been sent.", "enovathemes-addons");
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo esc_html__("Oops! Something went wrong and we couldn't send your message.", "enovathemes-addons");
        }
        die(); 
    }

    add_action('admin_post_nopriv_enovathemes_contact_form', 'enovathemes_addons_enovathemes_contact_form_send');
    add_action('admin_post_enovathemes_contact_form', 'enovathemes_addons_enovathemes_contact_form_send');

/*  Event booking
/*-------------------*/

    function enovathemes_addons_event_booking_form_send(){

        global $goodresto_enovathemes;

        $name    = strip_tags(trim($_POST["event_booking_form_name"]));
        $name    = str_replace(array("\r","\n"),array(" "," "),$name);
        $tel     = strip_tags(trim($_POST["event_booking_form_tel"]));
        $email   = filter_var(trim($_POST["event_booking_form_email"]), FILTER_SANITIZE_EMAIL);
        $persons = strip_tags(trim($_POST["event_booking_form_person"]));
        $message = trim($_POST["event_booking_form_mgs"]);
        $details = strip_tags(trim($_POST["event_booking_form_details"]));

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($tel) OR empty($persons) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo esc_html__("Oops! There was a problem with your submission. Please complete the form and try again.", "enovathemes-addons");
            exit;
        }

        // Set the recipient email address.
        $recipient = (isset($GLOBALS['goodresto_enovathemes']['event-booking-email']) && !empty($GLOBALS['goodresto_enovathemes']['event-booking-email'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['event-booking-email']) : get_option('admin_email');

        if (!is_email($recipient)) {
            $recipient = get_option('admin_email');
        }

        // Set the email subject.
        $subject = esc_html__("Event booking from", "enovathemes-addons")." ".get_bloginfo( 'name' );

        // Build the email content.
        $email_content ='<div style="background-color:#f5f5f5;padding:72px 32px;width:100%;height:100%;">
            <div style="max-width:620px;margin:72px auto;background-color:#ffffff;padding:24px 32px 48px 32px;text-align:left;font-size:16px;line-height:26px;">
                <h1>'.esc_html__("Booking details: ", "enovathemes-addons").'</h1><hr><br>
                <h3>Details</h3>
                <ul style="list-style:none;margin:32px 0 48px 0;padding:0;text-align:left;">
                    <li style="margin-left:0;">'.esc_html__("Event: ", "enovathemes-addons").$details.'</li>
                    <li style="margin-left:0;">'.esc_html__("Name: ", "enovathemes-addons").$name.'</li>
                    <li style="margin-left:0;">'.esc_html__("Telephone: ", "enovathemes-addons").$tel.'</li>
                    <li style="margin-left:0;">'.esc_html__("Email: ", "enovathemes-addons").$email.'</li>
                    <li style="margin-left:0;">'.esc_html__("Number of persons: ", "enovathemes-addons").$persons.'</li>
                </ul>';

                if (!empty($message)) {
                    $email_content .='<hr><br>
                    <h3>'.esc_html__("Additional notes: ", "enovathemes-addons").'</h3>
                    <div>'.$message.'</div>';
                }
            $email_content .='</div>
        </div>';

        // Build the email headers.
        $email_headers = "From: $name <$email>";
        $email_headers .= "MIME-Version: 1.0\r\n";
        $email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo esc_html__("Thank You! Your message has been sent.", "enovathemes-addons");
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo esc_html__("Oops! Something went wrong and we couldn't send your message.", "enovathemes-addons");
        }
        die(); 
    }

    add_action('admin_post_nopriv_event_booking_form', 'enovathemes_addons_event_booking_form_send');
    add_action('admin_post_event_booking_form', 'enovathemes_addons_event_booking_form_send');

/*  General booking
/*-------------------*/

    function enovathemes_addons_et_booking_form_send(){

        global $goodresto_enovathemes;

        $name    = strip_tags(trim($_POST["et_booking_form_name"]));
        $name    = str_replace(array("\r","\n"),array(" "," "),$name);
        $tel     = strip_tags(trim($_POST["et_booking_form_tel"]));
        $email   = filter_var(trim($_POST["et_booking_form_email"]), FILTER_SANITIZE_EMAIL);
        $persons = strip_tags(trim($_POST["et_booking_form_person"]));
        $date    = strip_tags(trim($_POST["et_booking_form_date"]));
        $time    = strip_tags(trim($_POST["et_booking_form_time"]));
        $message = trim($_POST["et_booking_form_mgs"]);
        $details = strip_tags(trim($_POST["et_booking_form_details"]));

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($tel) OR empty($persons) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo esc_html__("Oops! There was a problem with your submission. Please complete the form and try again.", "enovathemes-addons");
            exit;
        }

        // Set the recipient email address.
        $recipient = (isset($GLOBALS['goodresto_enovathemes']['booking-email']) && !empty($GLOBALS['goodresto_enovathemes']['booking-email'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['booking-email']) : get_option('admin_email');

        if (!is_email($recipient)) {
            $recipient = get_option('admin_email');
        }

        // Set the email subject.
        $subject = esc_html__("Event booking from", "enovathemes-addons")." ".get_bloginfo( 'name' );

        // Build the email content.

        $email_content ='<div style="background-color:#f5f5f5;padding:72px 32px;width:100%;height:100%;">
            <div style="max-width:620px;margin:72px auto;background-color:#ffffff;padding:24px 32px 48px 32px;text-align:left;font-size:16px;line-height:26px;">
                <h1>'.esc_html__("Booking details: ", "enovathemes-addons").'</h1><hr><br>
                <h3>Details</h3>
                <ul style="list-style:none;margin:32px 0 48px 0;padding:0;text-align:left;">
                    <li style="margin-left:0;">'.esc_html__("Date: ", "enovathemes-addons").$date.'</li>
                    <li style="margin-left:0;">'.esc_html__("Time: ", "enovathemes-addons").$time.'</li>
                    <li style="margin-left:0;">'.esc_html__("Name: ", "enovathemes-addons").$name.'</li>
                    <li style="margin-left:0;">'.esc_html__("Telephone: ", "enovathemes-addons").$tel.'</li>
                    <li style="margin-left:0;">'.esc_html__("Email: ", "enovathemes-addons").$email.'</li>
                    <li style="margin-left:0;">'.esc_html__("Number of persons: ", "enovathemes-addons").$persons.'</li>
                </ul>';

                if (!empty($message)) {
                    $email_content .='<hr><br>
                    <h3>'.esc_html__("Additional notes: ", "enovathemes-addons").'</h3>
                    <div>'.$message.'</div>';
                }
            $email_content .='</div>
        </div>';

        // Build the email headers.
        $email_headers = "From: $name <$email>";
        $email_headers .= "MIME-Version: 1.0\r\n";
        $email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo esc_html__("Thank You! Your message has been sent.", "enovathemes-addons");
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo esc_html__("Oops! Something went wrong and we couldn't send your message.", "enovathemes-addons");
        }
        die(); 
    }

    add_action('admin_post_nopriv_et_booking_form', 'enovathemes_addons_et_booking_form_send');
    add_action('admin_post_et_booking_form', 'enovathemes_addons_et_booking_form_send');

/*  Widget Instagram
/*-------------------*/

    function enovathemes_addons_scrape_instagram( $username ) {

        $username = trim( strtolower( $username ) );

        switch ( substr( $username, 0, 1 ) ) {
            case '#':
                $url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
                $transient_prefix = 'h';
                break;

            default:
                $url              = 'https://instagram.com/' . str_replace( '@', '', $username );
                $transient_prefix = 'u';
                break;
        }

        if ( false === ( $instagram = get_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {

            $remote = wp_remote_get( $url );

            if ( is_wp_error( $remote ) ) {
                return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'enovathemes-addons' ) );
            }

            if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
                return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'enovathemes-addons' ) );
            }

            $shards      = explode( 'window._sharedData = ', $remote['body'] );
            $insta_json  = explode( ';</script>', $shards[1] );
            $insta_array = json_decode( $insta_json[0], true );

            if ( ! $insta_array ) {
                return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'enovathemes-addons' ) );
            }

            if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
                $images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
            } elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
                $images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];

            } else {
                return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'enovathemes-addons' ) );
            }

            if ( ! is_array( $images ) ) {
                return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'enovathemes-addons' ) );
            }

            $followers = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_followed_by']['count'];

            $instagram = array();

            foreach ( $images as $image ) {
                if ( true === $image['node']['is_video'] ) {
                    $type = 'video';
                } else {
                    $type = 'image';
                }

                $caption = __( 'Instagram Image', 'enovathemes-addons' );
                if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
                    $caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
                }

                $instagram[] = array(
                    'description' => $caption,
                    'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
                    'time'        => $image['node']['taken_at_timestamp'],
                    'comments'    => $image['node']['edge_media_to_comment']['count'],
                    'likes'       => $image['node']['edge_liked_by']['count'],
                    'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
                    'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
                    'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
                    'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
                    'type'        => $type,
                    'followers'   => $followers,
                );
            } // End foreach().

            // do not set an empty transient - should help catch private or empty accounts.
            if ( ! empty( $instagram ) ) {
                $instagram = base64_encode( serialize( $instagram ) );
                set_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', 10 ) );
            }
        }

        if ( ! empty( $instagram ) ) {

            return unserialize( base64_decode( $instagram ) );

        } else {

            return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'enovathemes-addons' ) );

        }
    }

/*  Post social share
/*-------------------*/

    function enovathemes_addons_post_social_share($class){

        $output = '<div id="post-social-share" class="post-social-share '.esc_attr($class).' et-clearfix">';

            $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
            $output .= '<div class="social-links et-clearfix">';
                $output .= '<a title="'.esc_html__("Share on Facebook", 'enovathemes-addons').'" class="social-share post-facebook-share et-icon-facebook" target="_blank" href="//facebook.com/sharer.php?u='.urlencode(get_the_permalink(get_the_ID())).'"></a>';
                $output .= '<a title="'.esc_html__("Tweet this!", 'enovathemes-addons').'" class="social-share post-twitter-share et-icon-twitter" target="_blank" href="//twitter.com/intent/tweet?text='.urlencode(get_the_title(get_the_ID()).' - '.get_the_permalink(get_the_ID())).'"></a>';
                $output .= '<a title="'.esc_html__("Share on Pinterest", 'enovathemes-addons').'" class="social-share post-pinterest-share et-icon-pinterest" target="_blank" href="//pinterest.com/pin/create/button/?url='.urlencode(get_the_permalink(get_the_ID())).'&media='.urlencode(esc_url($url)).'&description='.rawurlencode(get_the_title(get_the_ID())).'"></a>';
                $output .= '<a title="'.esc_html__("Share on LinkedIn", 'enovathemes-addons').'" class="social-share post-linkedin-share et-icon-linkedin" target="_blank" href="//www.linkedin.com/shareArticle?mini=true&url='.urlencode(get_the_permalink(get_the_ID())).'&title='.rawurlencode(get_the_title(get_the_ID())).'"></a>';
            $output .= '</div>';

        $output .= '</div>';

        return $output;

    }

    add_action('wp_head', 'enovathemes_addons_open_graph_tags');
    function enovathemes_addons_open_graph_tags(){ ?>
        <?php

        if (defined( 'WPSEO_PATH' )) {
            return;
        }

        global $post;

        $image       = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
        $url         = get_the_permalink(get_the_ID());
        $title       = get_the_title(get_the_ID());
        $description = get_the_excerpt(get_the_ID());

        ?>
        <?php if ($url): ?>
            <meta property="og:url" content="<?php echo esc_url($url); ?>" />
            <meta property="og:type" content="article" />
        <?php endif ?>
        <?php if ($title): ?>
            <meta property="og:title" content="<?php echo esc_attr($title); ?>" />
        <?php endif ?>
        <?php if ($description): ?>
            <meta property="og:description" content="<?php echo esc_attr($description); ?>" />
        <?php endif ?>
        <?php if ($image): ?>
            <meta property="og:image" content="<?php echo esc_url($image); ?>" />
        <?php endif ?>
    <?php }

/*  Actions/Filters
/*-------------------*/

    function enovathemes_addons_ocdi_before_content_import( $selected_import ) {
        update_option('uploads_use_yearmonth_folders', false);

        if (class_exists('Woocommerce')) {
            $shop_page_id = get_option('woocommerce_shop_page_id');
            if ($shop_page_id) {
                wp_delete_post($shop_page_id);
            }

        }

    }
    add_action( 'ocdi/before_content_import', 'enovathemes_addons_ocdi_before_content_import' );

    function enovathemes_addons_ocdi_after_import( $selected_import ) {

        if (class_exists('Alg_WC_Currency_Switcher')) {
            update_option( 'alg_currency_switcher_format', '%currency_symbol% %currency_code%' );
            update_option( 'alg_wc_currency_switcher_link_list_separator', '' );
        }

        if (class_exists('Woocommerce')) {
            $shop = get_page_by_path( 'shop' );
            if ($shop) {
                update_option( 'woocommerce_shop_page_id', $shop->ID );
            }
        }

        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%category%/%postname%/');
        $wp_rewrite->flush_rules();
    }
    add_action( 'pt-ocdi/after_import', 'enovathemes_addons_ocdi_after_import' );

    remove_filter( 'the_content', 'wp_make_content_images_responsive' );

    add_action('init', 'enovathemes_addons_disable_responsive_images');
    function enovathemes_addons_disable_responsive_images() {

        global $goodresto_enovathemes;

        if (isset($GLOBALS['goodresto_enovathemes']['responsive-image']) && $GLOBALS['goodresto_enovathemes']['responsive-image'] == 1) {

            add_filter( 'wp_get_attachment_image_attributes', function( $attr ){
                if( isset( $attr['sizes'] ) ){unset( $attr['sizes'] );}
                if( isset( $attr['srcset'] ) ){unset( $attr['srcset'] );}
                $attr['data-responsive-images'] = 'false';
                return $attr;

            }, PHP_INT_MAX );

            add_filter( 'wp_calculate_image_sizes', '__return_empty_array',  PHP_INT_MAX );
            add_filter( 'wp_calculate_image_srcset', '__return_empty_array', PHP_INT_MAX );
            remove_filter( 'the_content', 'wp_make_content_images_responsive' );

        }

    }

    add_action( 'redux/loaded', 'enovathemes_addons_remove_demo' );
    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'enovathemes_addons_remove_demo' ) ) {
        function enovathemes_addons_remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

    add_action('init', 'enovathemes_addons_disable_gutenberg');

    function enovathemes_addons_disable_gutenberg(){

        if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {

            // Disable Gutenberg

            if (isset($GLOBALS['goodresto_enovathemes']['disable-gutenberg']) && $GLOBALS['goodresto_enovathemes']['disable-gutenberg'] == 1) {


                $disable_gutenberg_post = (isset($GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['post']) && $GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['post'] == 1) ? 'true' : 'false';
                $disable_gutenberg_page = (isset($GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['page']) && $GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['page'] == 1) ? 'true' : 'false';
                $disable_gutenberg_menu = (isset($GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['menu']) && $GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['menu'] == 1) ? 'true' : 'false';
                $disable_gutenberg_event = (isset($GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['event']) && $GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['event'] == 1) ? 'true' : 'false';
                $disable_gutenberg_product = (isset($GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['product']) && $GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['product'] == 1) ? 'true' : 'false';
                $disable_gutenberg_widgets = (isset($GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['widgets']) && $GLOBALS['goodresto_enovathemes']['disable-gutenberg-type']['widgets'] == 1) ? 'true' : 'false';


                function enovathemes_addons_disable_gutenberg_post($is_enabled, $post_type) {
                    if ($post_type === 'post') return false;
                    
                    return $is_enabled;
                }

                if ($disable_gutenberg_post == "true") {
                    add_filter('use_block_editor_for_post_type', 'enovathemes_addons_disable_gutenberg_post', 10, 2);
                }

                function enovathemes_addons_disable_gutenberg_page($is_enabled, $post_type) {
                    if ($post_type === 'page') return false;
                    
                    return $is_enabled;
                }

                if ($disable_gutenberg_page == "true") {
                    add_filter('use_block_editor_for_post_type', 'enovathemes_addons_disable_gutenberg_page', 10, 2);
                }

                function enovathemes_addons_disable_gutenberg_menu($is_enabled, $post_type) {
                    if ($post_type === 'menu') return false;
                    
                    return $is_enabled;
                }

                if ($disable_gutenberg_menu == "true") {
                    add_filter('use_block_editor_for_post_type', 'enovathemes_addons_disable_gutenberg_menu', 10, 2);
                }

                function enovathemes_addons_disable_gutenberg_product($is_enabled, $post_type) {
                    if ($post_type === 'product') return false;
                    
                    return $is_enabled;
                }

                if ($disable_gutenberg_product == "true") {
                    add_filter('use_block_editor_for_post_type', 'enovathemes_addons_disable_gutenberg_product', 10, 2);
                }
                
                function enovathemes_addons_disable_gutenberg_event($is_enabled, $post_type) {
                    if ($post_type === 'event') return false;
                    
                    return $is_enabled;
                }

                if ($disable_gutenberg_event == "true") {
                    add_filter('use_block_editor_for_post_type', 'enovathemes_addons_disable_gutenberg_event', 10, 2);
                }

                if ($disable_gutenberg_widgets == "true") {
                    add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
                    add_filter( 'use_widgets_block_editor', '__return_false' );
                }

            }

            $list = array(
                'page',
                'footer',
            );

            if(function_exists('vc_set_default_editor_post_types')){
                vc_set_default_editor_post_types( $list );
            }

        }

    }

/*  Allow iframe on post
/*-------------------*/
    
    function enovathemes_addons_allow_post_tags( $allowedposttags ){
        $allowedposttags['iframe'] = array(
            'src' => true,
            'width' => true,
            'height' => true,
            'class' => true,
            'frameborder' => true,
            'webkitAllowFullScreen' => true,
            'mozallowfullscreen' => true,
            'allowFullScreen' => true
        );
        return $allowedposttags;
    }
    add_filter('wp_kses_allowed_html','enovathemes_addons_allow_post_tags', 1);

/*  CPT Templates
/*-------------------*/

    function enovathemes_addons_event_single_template($single_template) {
        global $post;
        if ($post->post_type == 'et-event') {
            if ( $theme_file = locate_template( array ( 'single-event.php' ) ) ) {
                $single_template = $theme_file;
            } else {
                $single_template = ENOVATHEMES_ADDONS . 'event/single-event.php';
            }
        }
        return $single_template;
    }
    add_filter( "single_template", "enovathemes_addons_event_single_template", 20 );

    function enovathemes_addons_event_archive_template($archive_template) {
        global $post;
        if ($post->post_type == 'et-event') {
            if ( $theme_file = locate_template( array ( 'archive-event.php' ) ) ) {
                $archive_template = $theme_file;
            } else {
                $archive_template = ENOVATHEMES_ADDONS . 'event/archive-event.php';
            }
        }
        return $archive_template;
    }
    add_filter( "archive_template", "enovathemes_addons_event_archive_template", 20 );

    function enovathemes_addons_event_taxonomy_template($taxonomy_template) {
        if (is_tax('event-category')) {

            if ( $theme_file = locate_template( array ( 'taxonomy-event.php' ) ) ) {
                $taxonomy_template = $theme_file;
            } else {

                $taxonomy_template = ENOVATHEMES_ADDONS . 'event/taxonomy-event.php';
            }

        }
        return $taxonomy_template;
    }
    add_filter( "taxonomy_template", "enovathemes_addons_event_taxonomy_template", 20 );

    function enovathemes_addons_menu_archive_template($archive_template) {
        global $post;
        if ($post->post_type == 'menu') {
            if ( $theme_file = locate_template( array ( 'archive-menu.php' ) ) ) {
                $archive_template = $theme_file;
            } else {
                $archive_template = ENOVATHEMES_ADDONS . 'menu/archive-menu.php';
            }
        }
        return $archive_template;
    }
    add_filter( "archive_template", "enovathemes_addons_menu_archive_template", 20 );

    function enovathemes_addons_menu_taxonomy_template($taxonomy_template) {
        if (is_tax('menu-category')) {

            if ( $theme_file = locate_template( array ( 'taxonomy-menu.php' ) ) ) {
                $taxonomy_template = $theme_file;
            } else {

                $taxonomy_template = ENOVATHEMES_ADDONS . 'menu/taxonomy-menu.php';
            }

        }
        return $taxonomy_template;
    }
    add_filter( "taxonomy_template", "enovathemes_addons_menu_taxonomy_template", 20 );

    function enovathemes_addons_redux_saved(){

        global $post, $goodresto_enovathemes;

        /* Menu
        ------------------*/

            $menu_post_size       = (isset($GLOBALS['goodresto_enovathemes']['menu-post-size']) && $GLOBALS['goodresto_enovathemes']['menu-post-size']) ? $GLOBALS['goodresto_enovathemes']['menu-post-size'] : "small";
            $menu_post_layout     = (isset($GLOBALS['goodresto_enovathemes']['menu-post-layout']) && $GLOBALS['goodresto_enovathemes']['menu-post-layout']) ? $GLOBALS['goodresto_enovathemes']['menu-post-layout'] : "grid";
            $menu_reset_post_size = (isset($GLOBALS['goodresto_enovathemes']['menu-reset-post-size']) && $GLOBALS['goodresto_enovathemes']['menu-reset-post-size'] == 1) ? "true" : "false";

            $menu_width = '25';

            switch ($menu_post_size) {
                case 'small':
                    $menu_width = '25';
                    break;
                case 'medium':
                    $menu_width = '30';
                    break;
                case 'large':
                    $menu_width = '50';
                    break;
            }

            if ($menu_post_layout == "masonry2" && $menu_reset_post_size == "true") {
                $menus = new WP_Query(array('post_type' => 'menu','posts_per_page'=> -1));
                if($menus->have_posts()){
                    while($menus->have_posts()) : $menus->the_post();
                        update_post_meta( $post->ID, 'menu_width', $menu_width );
                    endwhile;
                }
                wp_reset_postdata();
            }

        /* Post
        ------------------*/

            $blog_post_size       = (isset($GLOBALS['goodresto_enovathemes']['blog-post-size']) && $GLOBALS['goodresto_enovathemes']['blog-post-size']) ? $GLOBALS['goodresto_enovathemes']['blog-post-size'] : "small";
            $blog_post_layout     = (isset($GLOBALS['goodresto_enovathemes']['blog-post-layout']) && $GLOBALS['goodresto_enovathemes']['blog-post-layout']) ? $GLOBALS['goodresto_enovathemes']['blog-post-layout'] : "grid";
            $blog_reset_post_size = (isset($GLOBALS['goodresto_enovathemes']['blog-reset-post-size']) && $GLOBALS['goodresto_enovathemes']['blog-reset-post-size'] == 1) ? "true" : "false";
            
           
            $post_width = '25';

            switch ($blog_post_size) {
                case 'small':
                    $post_width = '25';
                    break;
                case 'medium':
                    $post_width = '30';
                    break;
                case 'large':
                    $post_width = '50';
                    break;
            }

            if (($blog_post_layout == "masonry2" && $blog_reset_post_size == "true")) {
                $posts = new WP_Query(array('post_type' => 'post','posts_per_page'=> -1));
                if($posts->have_posts()){
                    while($posts->have_posts()) : $posts->the_post();
                        update_post_meta( $post->ID, 'post_width', $post_width );
                    endwhile;
                }
                wp_reset_postdata();
            }

        /* Product
        ------------------*/
            
            $product_single_sidebar     = (isset($GLOBALS['goodresto_enovathemes']['product-single-sidebar']) && $GLOBALS['goodresto_enovathemes']['product-single-sidebar']) ? $GLOBALS['goodresto_enovathemes']['product-single-sidebar'] : "right";
            $product_single_post_layout = (isset($GLOBALS['goodresto_enovathemes']['product-single-post-layout']) && !empty($GLOBALS['goodresto_enovathemes']['product-single-post-layout'])) ? $GLOBALS['goodresto_enovathemes']['product-single-post-layout'] : "single-product-tabs-under";
            
            if ($product_single_sidebar != "none" && $product_single_post_layout == "single-product-center-mode") {
                Redux::set_option('goodresto_enovathemes','product-single-sidebar',"none");
            }

        /* Header corrections
        ------------------*/

            $et_no_logo = (isset($GLOBALS['goodresto_enovathemes']['no-logo']) && $GLOBALS['goodresto_enovathemes']['no-logo'] == 1) ? "true" : "false";

            if ($et_no_logo == "true") {
                Redux::set_option('goodresto_enovathemes','logo-position','left');
            }

            $et_mob_header_transparent   = (isset($GLOBALS['goodresto_enovathemes']['mob-header-transparent']) && $GLOBALS['goodresto_enovathemes']['mob-header-transparent'] == 1) ? "true" : "false";

            if ($et_mob_header_transparent == "true") {
                Redux::set_option('goodresto_enovathemes','mob-header-top',0);
            }
            
    }

    add_action( "redux/options/goodresto_enovathemes/saved", "enovathemes_addons_redux_saved");

    add_filter( 'woocommerce_locate_template', 'enovathemes_addons_woocommerce_locate_template', 10, 3 );
    function enovathemes_addons_woocommerce_locate_template( $template, $template_name, $template_path ) {
      global $woocommerce;

      $_template = $template;

      if ( ! $template_path ) $template_path = $woocommerce->template_url;

      $plugin_path  = ENOVATHEMES_ADDONS . '/woocommerce/';

      // Look within passed path within the theme - this is priority
      $template = locate_template(

        array(
          $template_path . $template_name,
          $template_name
        )
      );

      // Modification: Get the template from this plugin, if it exists
      if ( ! $template && file_exists( $plugin_path . $template_name ) )
        $template = $plugin_path . $template_name;

      // Use default template
      if ( ! $template )
        $template = $_template;

      // Return what we found
      return $template;
    }

/*  Breadcrumbs
/*-------------------*/

    function enovathemes_addons_breadcrumbs() {

        global $post, $goodresto_enovathemes;

        $text_before = '<span>';
        $text_after  = '</span>';

        $home_text     = esc_html__('Home','enovathemes-addons');

        if(!empty(get_option('page_on_front')))
        $home_text = get_the_title( get_option('page_on_front') );

        $category_text = esc_html__('Archive by Category "%s"','enovathemes-addons');
        $tax_text      = esc_html__('Archive by "%s"','enovathemes-addons');
        $tag_text      = esc_html__('Posts Tagged "%s"','enovathemes-addons');
        $author_text   = esc_html__('Articles Posted by %s','enovathemes-addons');
        $error_text    = esc_html__('Error 404','enovathemes-addons');
        $search_text   = esc_html__('Search Results for "%s" Query','enovathemes-addons');
        $wishlist_text = esc_html__("Wishlist", 'enovathemes-addons');

        $blog_text     = (isset($GLOBALS['goodresto_enovathemes']['blog-title-text']) && !empty($GLOBALS['goodresto_enovathemes']['blog-title-text'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['blog-title-text']) : esc_html__("Blog", "goodresto");
        $event_text  = (isset($GLOBALS['goodresto_enovathemes']['event-title-text']) && !empty($GLOBALS['goodresto_enovathemes']['event-title-text'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['event-title-text']) : esc_html__("Events", "goodresto");
        $product_text  = (isset($GLOBALS['goodresto_enovathemes']['product-title-text']) && !empty($GLOBALS['goodresto_enovathemes']['product-title-text'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['product-title-text']) : esc_html__("Product", "goodresto");
        $gallery_text  = (isset($GLOBALS['goodresto_enovathemes']['gallery-title-text']) && !empty($GLOBALS['goodresto_enovathemes']['gallery-title-text'])) ? esc_attr($GLOBALS['goodresto_enovathemes']['gallery-title-text']) : esc_html__("Gallery", "goodresto");

        $page_title_text_align    = (isset($GLOBALS['goodresto_enovathemes']['page-title-text-align']) && !empty($GLOBALS['goodresto_enovathemes']['page-title-text-align']) ) ? $GLOBALS['goodresto_enovathemes']['page-title-text-align'] : 'left';

        $home_link = esc_url(home_url('/'));
        $blog_link = get_post_type_archive_link( 'post' );
        $shop_link = (function_exists('wc_get_page_id')) ? get_permalink( wc_get_page_id( 'shop' ) ) : '';


        if (is_home() && is_front_page()) {
            // Post is frontpage
            echo $text_before . $blog_text . $text_after;
        } elseif (is_home() && !is_front_page()) {
            // Post is separate page
            if ($page_title_text_align == "right") {
                echo $text_before . $blog_text . $text_after;
                echo '<a href="' . $home_link . '">' . $home_text . '</a>';
            } else {
                echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                if ( get_query_var('paged') ) {
                   echo '<a href="' . $blog_link . '">' . $blog_text . '</a>';
                } else {
                   echo $text_before . $blog_text . $text_after; 
                }
            }

        } elseif (is_front_page() && !is_home()) {
            // Front page and not post page
            echo $text_before . $home_text . $text_after;
        } else {

            /*  Page
            -------------------*/

                if (is_page()) {

                    $page_title = get_the_title();

                    $wishlistpage    = "false";
                    $wishlistpage_id = get_option('yith_wcwl_wishlist_page_id');
                    if (defined('YITH_WCWL') && !empty($wishlistpage_id)) {
                        $wishlistpage = (is_page(get_option('yith_wcwl_wishlist_page_id'))) ? "true" : "false"; 
                    }

                    if ($wishlistpage == "true") {
                        $page_title = $wishlist_text;
                    }

                    if ($page_title_text_align == "right") {
                        if ($post->post_parent) {

                            $this_parents = get_post_ancestors($post->ID);

                            echo $text_before.$page_title.$text_after;

                            foreach ($this_parents as $parent_ID) {
                                echo '<a href="'.get_page_link($parent_ID, false, false).'">'.get_the_title($parent_ID).'</a>';
                            }

                        } else {
                            echo $text_before.$page_title.$text_after;
                        }

                        if (class_exists('Woocommerce')) {

                            if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || $wishlistpage == "true") {
                                echo '<a href="' . $shop_link . '">' . $product_text . '</a>';
                            }

                        }

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                        if (class_exists('Woocommerce')) {

                            if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url() || $wishlistpage == "true") {
                                echo '<a href="' . $shop_link . '">' . $product_text . '</a>';
                            }

                        }

                        if ($post->post_parent) {

                            $this_parents = get_post_ancestors($post->ID);

                            foreach (array_reverse($this_parents) as $parent_ID) {
                                echo '<a href="'.get_page_link($parent_ID, false, false).'">'.get_the_title($parent_ID).'</a>';
                            }

                            echo $text_before.$page_title.$text_after;

                        } else {
                            echo $text_before.$page_title.$text_after;
                        }

                    }
                }

            /*  Single post
            -------------------*/

                if (is_singular( 'post' )) {

                    $this_cats         = get_the_category();
                    $first_cat         = $this_cats[0];
                    $first_cat_link    = get_category_link($first_cat->cat_ID);


                    if ($page_title_text_align == "right") {

                        echo $text_before.get_the_title().$text_after;
                        echo '<a href="'.$first_cat_link.'">'. $first_cat->name .'</a>';
                        
                        if ($first_cat->parent) {
                            $first_cat_parents = get_category_parents($first_cat->parent, true, '');
                            echo $first_cat_parents;
                        }

                        echo '<a href="' . $blog_link . '">' . $blog_text . '</a>';
                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        echo '<a href="' . $blog_link . '">' . $blog_text . '</a>';

                        if ($first_cat->parent) {
                            $first_cat_parents = get_category_parents($first_cat->parent, true, '');
                            echo $first_cat_parents;
                        }

                        echo '<a href="'.$first_cat_link.'">'. $first_cat->name .'</a>';
                        echo $text_before.get_the_title().$text_after;

                    }
                    
                }

            /*  Category / Tag / Taxonomy
            -------------------*/

                if ( is_category() ) {

                    $this_cat = get_category(get_query_var('cat'), false);

                    if ($page_title_text_align == "right") {

                        if ($this_cat->parent != 0) {
                            $this_parents = get_category_parents($this_cat->parent, true, '');
                            echo $text_before . sprintf($category_text, single_cat_title('', false)) . $text_after;
                            echo $this_parents;
                        } else {
                            echo $text_before . sprintf($category_text, single_cat_title('', false)) . $text_after;
                        }

                        echo '<a href="' . $blog_link . '">' . $blog_text . '</a>';
                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        echo '<a href="' . $blog_link . '">' . $blog_text . '</a>';

                        if ($this_cat->parent != 0) {
                            $this_parents = get_category_parents($this_cat->parent, true, '');
                            echo $this_parents;
                            echo $text_before . sprintf($category_text, single_cat_title('', false)) . $text_after;
                        } else {
                            echo $text_before . sprintf($category_text, single_cat_title('', false)) . $text_after;
                        }

                    }
                    
                }

                if (is_tag()) {

                    if ($page_title_text_align == "right") {

                        echo $text_before . sprintf($tag_text, single_tag_title('', false)) . $text_after;
                        echo '<a href="' . $blog_link . '">' . $blog_text . '</a>';
                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        echo '<a href="' . $blog_link . '">' . $blog_text . '</a>';
                        echo $text_before . sprintf($tag_text, single_tag_title('', false)) . $text_after;

                    }
                }

            /*  Date
            -------------------*/

                if ( is_day() ) {


                    if ($page_title_text_align == "right") {

                        echo $text_before . get_the_time('d') . $text_after;
                        echo '<a href="'.get_month_link(get_the_time('Y'),get_the_time('m')).'">'. get_the_time('F') .'</a>';
                        echo '<a href="'.get_year_link(get_the_time('Y'),get_the_time('Y')).'">'. get_the_time('Y') .'</a>';
                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        echo '<a href="'.get_year_link(get_the_time('Y'),get_the_time('Y')).'">'. get_the_time('Y') .'</a>';
                        echo '<a href="'.get_month_link(get_the_time('Y'),get_the_time('m')).'">'. get_the_time('F') .'</a>';
                        echo $text_before . get_the_time('d') . $text_after;

                    }

                }

                if ( is_month() ) {

                    if ($page_title_text_align == "right") {

                        echo $text_before . get_the_time('F') . $text_after;
                        echo '<a href="'.get_year_link(get_the_time('Y'),get_the_time('Y')).'">'. get_the_time('Y') .'</a>';
                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        
                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        echo '<a href="'.get_year_link(get_the_time('Y'),get_the_time('Y')).'">'. get_the_time('Y') .'</a>';
                        echo $text_before . get_the_time('F') . $text_after;

                    }
                    
                }

                if ( is_year() ) {

                    if ($page_title_text_align == "right") {

                        echo $text_before . get_the_time('Y') . $text_after;
                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        
                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        echo $text_before . get_the_time('Y') . $text_after;
                    }
                    
                }

            /*  Misc
            -------------------*/

                if ( is_search() ) {

                    if ($page_title_text_align == "right") {

                        echo $text_before . sprintf($search_text, get_search_query()) . $text_after;
                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        echo $text_before . sprintf($search_text, get_search_query()) . $text_after;

                    }

                }

                if ( is_author() ) {
                    global $author;
                    $userdata = get_userdata($author);

                    if ($page_title_text_align == "right") {

                        echo $text_before . sprintf($author_text, $userdata->display_name) . $text_after;
                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        echo $text_before . sprintf($author_text, $userdata->display_name) . $text_after;

                    }

                }

                if ( is_404() ) {

                    if ($page_title_text_align == "right") {

                        echo $text_before . $error_text . $text_after;
                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                    } else {

                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                        echo $text_before . $error_text . $text_after;

                    }

                }

            /*  CPT
            -------------------*/

                $cpt_list = get_post_types( array(
                    'public' => true,
                    'publicly_queryable' => true,
                    'exclude_from_search'=> false,
                    '_builtin' => false,
                ), 'objects', 'and' );

                if (is_array($cpt_list)) {
                    foreach ($cpt_list as $cpt) {

                        $cpt_title = $cpt->labels->name;

                        switch ($cpt->name) {
                            case 'event':
                                $cpt_title = $event_text;
                                break;
                            case 'product':
                                $cpt_title = $product_text;
                                break;
                            case 'gallery':
                                $cpt_title = $gallery_text;
                                break;
                        }

                        /*  Archive
                        -------------------*/

                            if (is_post_type_archive($cpt->name)) {

                                if ($page_title_text_align == "right") {

                                    if ( get_query_var('paged') ) {
                                       echo '<a href="' . get_post_type_archive_link($cpt->name) . '">' . $cpt_title . '</a>';
                                    } else {
                                       echo $text_before . $cpt_title . $text_after; 
                                    }
                                    echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                                } else {

                                    echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                                    if ( get_query_var('paged') ) {
                                       echo '<a href="' . get_post_type_archive_link($cpt->name) . '">' . $cpt_title . '</a>';
                                    } else {
                                       echo $text_before . $cpt_title . $text_after; 
                                    }
                                }

                            }

                        /*  Taxonomy
                        -------------------*/

                            $cpt_taxonomies = get_object_taxonomies($cpt->name);
                            if (is_array($cpt_taxonomies)) {
                                foreach ($cpt_taxonomies as $cpt_tax) {
                                    if (is_tax($cpt_tax)) {


                                        $this_tax    = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                                        $this_parents = get_ancestors( $this_tax->term_id, get_query_var('taxonomy') );

                                        if ($page_title_text_align == "right") {

                                            if (is_array($this_parents)) {
                                                echo $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;
                                                foreach ($this_parents as $this_parent_ID) {
                                                    $this_parent = get_term($this_parent_ID, get_query_var('taxonomy'));
                                                    echo '<a href="'.get_term_link( $this_parent->slug, get_query_var('taxonomy')).'">'. $this_parent->name .'</a>';
                                                }
                                            } else {
                                                echo $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;
                                            }

                                            echo '<a href="'.get_post_type_archive_link($cpt->name).'">'. $cpt_title .'</a>';
                                            echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                                        } else {

                                            echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                                            echo '<a href="'.get_post_type_archive_link($cpt->name).'">'. $cpt_title .'</a>';

                                            if (is_array($this_parents)) {
                                                foreach (array_reverse($this_parents) as $this_parent_ID) {
                                                    $this_parent = get_term($this_parent_ID, get_query_var('taxonomy'));
                                                    echo '<a href="'.get_term_link( $this_parent->slug, get_query_var('taxonomy')).'">'. $this_parent->name .'</a>';
                                                }
                                                echo $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;
                                            } else {
                                                echo $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;
                                            }

                                        }


                                        
                                    }
                                }
                            } else {
                                if (is_tax()) {

                                    if ($page_title_text_align == "right") {

                                        echo $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;
                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                                    } else {

                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                                        echo $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;

                                    }

                                }
                            }

                        /*  Single post
                        -------------------*/

                            if ($cpt->name == 'event') {
                                if (is_singular( 'event' )) {

                                    $this_terms = get_the_terms( $post->ID, 'event-category');

                                    $first_term         = $this_terms[0];
                                    $first_term_link    = get_term_link($first_term->term_id,'event-category');
                                    $first_term_parents = get_ancestors($first_term->term_id,'event-category');

                                    if ($page_title_text_align == "right") {

                                        echo $text_before.get_the_title().$text_after;
                                        echo '<a href="'.$first_term_link.'">'. $first_term->name .'</a>';

                                        if ($this_terms && is_array($first_term_parents)) {
                                            foreach ($first_term_parents as $this_parent_ID) {
                                                $this_parent = get_term($this_parent_ID, 'event-category');
                                                echo '<a href="'.get_term_link( $this_parent->slug, 'event-category').'">'. $this_parent->name .'</a>';
                                            }
                                        }

                                        echo '<a href="'.get_post_type_archive_link($cpt->name).'">'. $cpt_title .'</a>';
                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                                    } else {

                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                                        echo '<a href="'.get_post_type_archive_link($cpt->name).'">'. $cpt_title .'</a>';

                                        if ($this_terms && is_array($first_term_parents)) {
                                            foreach (array_reverse($first_term_parents) as $this_parent_ID) {
                                                $this_parent = get_term($this_parent_ID, 'event-category');
                                                echo '<a href="'.get_term_link( $this_parent->slug, 'event-category').'">'. $this_parent->name .'</a>';
                                            }
                                        }

                                        echo '<a href="'.$first_term_link.'">'. $first_term->name .'</a>';
                                        echo $text_before.get_the_title().$text_after;
                                    }

                                    

                                }
                            } elseif ($cpt->name == 'product') {

                                if (is_singular( 'product' )) {

                                    $this_terms         = get_the_terms( $post->ID, 'product_cat');
                                    $first_term         = $this_terms[0];
                                    $first_term_link    = get_term_link($first_term->term_id,'product_cat');
                                    $first_term_parents = get_ancestors($first_term->term_id,'product_cat');

                                    if ($page_title_text_align == "right") {

                                        echo $text_before.get_the_title().$text_after;
                                        echo '<a href="'.$first_term_link.'">'. $first_term->name .'</a>';

                                        if (is_array($first_term_parents)) {
                                            foreach ($first_term_parents as $this_parent_ID) {
                                                $this_parent = get_term($this_parent_ID, 'product_cat');
                                                echo '<a href="'.get_term_link( $this_parent->slug, 'product_cat').'">'. $this_parent->name .'</a>';
                                            }
                                        }

                                        echo '<a href="' . $shop_link . '">' . $product_text . '</a>';
                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                                    } else {

                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                                        echo '<a href="' . $shop_link . '">' . $product_text . '</a>';

                                        if (is_array($first_term_parents)) {
                                            foreach (array_reverse($first_term_parents) as $this_parent_ID) {
                                                $this_parent = get_term($this_parent_ID, 'product_cat');
                                                echo '<a href="'.get_term_link( $this_parent->slug, 'product_cat').'">'. $this_parent->name .'</a>';
                                            }
                                        }

                                        echo '<a href="'.$first_term_link.'">'. $first_term->name .'</a>';
                                        echo $text_before.get_the_title().$text_after;

                                    }

                                }

                            } elseif ($cpt->name == 'gallery') {
                                if (is_singular( 'gallery' )) {

                                    $this_terms = get_the_terms( $post->ID, 'gallery-category');
                                    $first_term         = $this_terms[0];
                                    $first_term_link    = get_term_link($first_term->term_id,'gallery-category');
                                    $first_term_parents = get_ancestors($first_term->term_id,'gallery-category');


                                    if ($page_title_text_align == "right") {

                                        echo $text_before.get_the_title().$text_after;
                                        echo '<a href="'.$first_term_link.'">'. $first_term->name .'</a>';

                                        if (is_array($first_term_parents)) {
                                            foreach ($first_term_parents as $this_parent_ID) {
                                                $this_parent = get_term($this_parent_ID, 'gallery-category');
                                                echo '<a href="'.get_term_link( $this_parent->slug, 'gallery-category').'">'. $this_parent->name .'</a>';
                                            }
                                        }

                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                                    } else {

                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                                        if (is_array($first_term_parents)) {
                                            foreach (array_reverse($first_term_parents) as $this_parent_ID) {
                                                $this_parent = get_term($this_parent_ID, 'gallery-category');
                                                echo '<a href="'.get_term_link( $this_parent->slug, 'gallery-category').'">'. $this_parent->name .'</a>';
                                            }
                                        }

                                        echo '<a href="'.$first_term_link.'">'. $first_term->name .'</a>';
                                        echo $text_before.get_the_title().$text_after;

                                    }

                                }
                            } else {

                                if (is_singular() && $cpt->name != 'event' && $cpt->name != 'product' && $cpt->name != 'gallery' && !is_single() && !is_page()) {

                                    if ($page_title_text_align == "right") {

                                        echo $text_before.get_the_title().$text_after;
                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';

                                    } else {

                                        echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                                        echo $text_before.get_the_title().$text_after;

                                    }

                                }

                            }

                    }
                } else {
                    if (is_tax()) {

                        if ($page_title_text_align == "right") {

                            echo $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;
                            echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                            
                        } else {

                            echo '<a href="' . $home_link . '">' . $home_text . '</a>';
                            echo $text_before . sprintf($tax_text, single_cat_title('', false)) . $text_after;

                        }

                    }
                }
            
        }

        if ( get_query_var('paged') ) {
            echo $text_before.esc_html__('Page','enovathemes-addons') . ' ' . get_query_var('paged').$text_after;
        }
    }
?>
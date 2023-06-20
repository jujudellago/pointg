<?php
/**
 * Plugin Name: Auto Robot Pro
 * Plugin URI: https://wpautorobot.com
 * Description: Auto Robot Pro Version
 * Version: 3.0.7
 * Author: wphobby
 * Author URI: https://wphobby.com/
 *
 * @package Auto Robot
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

/**
 * Set constants
 */
if ( ! defined( 'AUTO_ROBOT_DIR' ) ) {
    define( 'AUTO_ROBOT_DIR', plugin_dir_path(__FILE__) );
}

if ( ! defined( 'AUTO_ROBOT_URL' ) ) {
    define( 'AUTO_ROBOT_URL', plugin_dir_url(__FILE__) );
}

if ( ! defined( 'AUTO_ROBOT_FILE' ) ) {
	define( 'AUTO_ROBOT_FILE', __FILE__ );
}

if ( ! defined( 'AUTO_ROBOT_VERSION' ) ) {
    define( 'AUTO_ROBOT_VERSION', '3.0.7' );
}

if ( ! defined( 'WPHOBBY_STATS_URL' ) ) {
    define( 'WPHOBBY_STATS_URL', 'http://wpautorobot.com' );
}

if ( ! defined( 'WPHOBBY_MAIN_URL' ) ) {
    define( 'WPHOBBY_MAIN_URL', 'https://wphobby.com' );
}

/**
 * Class Auto_Robot
 *
 * Main class. Initialize plugin
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'Auto_Robot' ) ) {
    /**
     * Auto_Robot
     */
    class Auto_Robot {

        const DOMAIN = 'auto-robot';

        /**
         * Instance of Auto_Robot
         *
         * @since  1.0.0
         * @var (Object) Auto_Robot
         */
        private static $_instance = null;

        /**
         * Get instance of Auto_Robot
         *
         * @since  1.0.0
         *
         * @return object Class object
         */
        public static function get_instance() {
            if ( ! isset( self::$_instance ) ) {
                self::$_instance = new self;
            }
            return self::$_instance;
        }

        /**
         * Constructor
         *
         * @since  1.0.0
         */
        private function __construct() {
            $this->includes();
            $this->init();
        }

        /**
         * Load plugin files
         *
         * @since 1.0
         */
        private function includes() {
            // Autoload files.
            require_once AUTO_ROBOT_DIR . '/vendor/autoload.php';

            // Core files.
            require_once AUTO_ROBOT_DIR . '/includes/class-core.php';
            require_once AUTO_ROBOT_DIR . '/includes/class-addon-loader.php';
        }


        /**
         * Init the plugin
         *
         * @since 1.0.0
         */
        private function init() {
            // Initialize plugin core
            $this->auto_robot = Auto_Robot_Core::get_instance();

            // Create tables
            $this->create_tables();

            // Initial Schedule Class for WP Cron Jobs
            Auto_Robot_Schedule::get_instance();

            add_action( 'admin_init', array( $this, 'welcome' ) );

            /**
             * Triggered when plugin is loaded
             */
            do_action( 'auto_robot_loaded' );

            add_action('current_screen', array( $this, 'current_screen_action') );

            add_filter('script_loader_tag', array( $this, 'add_type_attribute') , 10, 3);
        }

        public function add_type_attribute($tag, $handle, $src) {
            // if not your script, do nothing and return original $tag
            if ( 'ionicons' !== $handle ) {
                return $tag;
            }
            // change the script tag by adding type="module" and return it.
            $tag = '<script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>';
            return $tag;
        }

        /**
        * Current screen action
        *
        * @since 1.0.1
        * @return void
        */
        public function current_screen_action() {
            $screen = get_current_screen();
            $where = array(
                'toplevel_page_auto-robot',
                'auto-robot_page_auto-robot-campaign',
                'auto-robot_page_auto-robot-integrations',
                'auto-robot_page_auto-robot-wizard',
                'auto-robot_page_auto-robot-campaign-wizard',
                'auto-robot_page_auto-robot-logs',
                'auto-robot_page_auto-robot-settings',
                'auto-robot_page_auto-robot-upgrade',
                'auto-robot_page_auto-robot-welcome'
            );

            $enable_notice = false;
            if ( in_array($screen->base, $where) ) {
                $enable_notice = true;
            };

            if($enable_notice){
                add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ));
            }
        }

        public function enqueue_scripts() {
            wp_enqueue_style( 'auto-robot-notice-style', AUTO_ROBOT_URL . 'assets/css/notice.css', array(), AUTO_ROBOT_VERSION, false );
        }

        /** Redirect to welcome page when activation */
		public function welcome() {
            $page_url = 'admin.php?page=auto-robot-welcome';
            if ( ! get_transient( '_auto_robot_activation_redirect' ) ) {
                return;
            }
            delete_transient( '_auto_robot_activation_redirect' );
            wp_safe_redirect( admin_url( $page_url ) );
            exit;
		}

        /**
         * @since 1.0.0
         */
        public static function create_tables() {
            global $wpdb;
            $wpdb->hide_errors();

            $table_schema = [
                "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}auto_robot_logs` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `camp_id` int(11) DEFAULT NULL,
                `level` ENUM('log','info','warn','error','success') NOT NULL DEFAULT 'log',
                `message` text DEFAULT NULL,
                `created` DECIMAL(16, 6) NOT NULL,
                PRIMARY KEY (`id`)
            )  CHARACTER SET utf8 COLLATE utf8_general_ci;",
            ];
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            foreach ( $table_schema as $table ) {
                dbDelta( $table );
            }
        }

    }
}

if ( ! function_exists( 'auto_robot' ) ) {
    function auto_robot() {
        return Auto_Robot::get_instance();
    }

    /**
     * Init the plugin and load the plugin instance
     *
     * @since 1.0.0
     */
    add_action( 'plugins_loaded', 'auto_robot' );
}

/**
* Plugin install hook
*
* @since 1.8.0
* @return void
*/
if ( ! function_exists( 'auto_robot_install' ) ) {
    function auto_robot_install(){
        // Hook for plugin install.
		do_action( 'auto_robot_install' );

		/*
		* Set current version.
		*/
		update_option( 'auto_robot_version_pro', AUTO_ROBOT_VERSION );

        set_transient( '_auto_robot_activation_redirect', 1 );
    }
}

// When activated, trigger install method.
register_activation_hook( AUTO_ROBOT_FILE, 'auto_robot_install' );
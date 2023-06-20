<?php
/**
 * Auto_Robot_Admin Class
 *
 * @since  1.0.0
 * @package Auto Robot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Robot_Admin' ) ) :

   class Auto_Robot_Admin {

	   /**
	   * @var array
	   */
	   public $pages = array();

       /**
        * @var array
        */
       public $addons = array();

	   /**
	   * Auto_Robot_Admin constructor.
	   */
	   public function __construct() {
           $this->includes();

		   // Display admin notices
		   //add_action( 'admin_notices', array( $this, 'add_admin_notice' ) );

           // Init admin pages
           add_action( 'admin_menu', array( $this, 'add_dashboard_page' ) );

           // Init Admin AJAX class
           new Auto_Robot_Admin_AJAX();

		   /**
		   * Triggered when Admin is loaded
		   */
		   do_action( 'auto_robot_admin_loaded' );
       }

       /**
	   * Include required files
	   *
	   * @since 1.0.0
	   */
       private function includes() {
           // Admin pages
		   require_once AUTO_ROBOT_DIR . '/admin/pages/dashboard-page.php';
           require_once AUTO_ROBOT_DIR . '/admin/pages/integrations-page.php';
		   require_once AUTO_ROBOT_DIR . '/admin/pages/logs-page.php';
		   require_once AUTO_ROBOT_DIR . '/admin/pages/settings-page.php';
		   require_once AUTO_ROBOT_DIR . '/admin/pages/license-page.php';
		   require_once AUTO_ROBOT_DIR . '/admin/pages/addons-page.php';
		   require_once AUTO_ROBOT_DIR . '/admin/pages/wizard-page.php';
		   require_once AUTO_ROBOT_DIR . '/admin/pages/welcome-page.php';
		   require_once AUTO_ROBOT_DIR . '/admin/pages/import-page.php';

		   // Admin AJAX
		   require_once AUTO_ROBOT_DIR . '/admin/classes/class-admin-ajax.php';

           // Admin Data
           require_once AUTO_ROBOT_DIR . '/admin/classes/class-admin-data.php';

		   // Admin Addons
           require_once AUTO_ROBOT_DIR . '/admin/classes/class-admin-addons.php';
	   }

	   /**
	   * Admin notice
	   *
	   * @since 1.0.0
	   */
	  public function add_admin_notice() {
		$license_activated = get_option( 'auto_robot_license_activated');
		if ( empty($license_activated) || $license_activated != '102' ) {
			echo '<div class="updated"><p><strong>Auto Robot</strong> is ready. Please <a href="'.admin_url( 'admin.php?page=auto-robot-license' ).'">Click Here</a> to add your purchase code and activate the plugin.</p></div>';
		}
   	  }

	   /**
	   * Initialize Dashboard page
	   *
	   * @since 1.0.0
	   */
	   public function add_dashboard_page() {
			$title = __( 'Auto Robot', Auto_Robot::DOMAIN );
			$this->pages['auto_robot']           = new Auto_Robot_Dashboard_Page( 'auto-robot', 'dashboard', $title, $title, false, false );
			$this->pages['auto_robot-dashboard'] = new Auto_Robot_Dashboard_Page( 'auto-robot', 'dashboard', __( 'Auto Robot Dashboard', Auto_Robot::DOMAIN ), __( 'Dashboard', Auto_Robot::DOMAIN ), 'auto-robot' );
	   }

	   /**
		* Add Wizard page
		*
		* @since 1.0.0
		*/
		public function add_wizard_page() {
			add_action( 'admin_menu', array( $this, 'init_wizard_page' ) );
		}

		/**
		 * Initialize Wizard page
		 *
		 * @since 1.0.0
		 */
		public function init_wizard_page() {
			$this->pages['auto-robot-wizard'] = new Auto_Robot_Wizard_Page(
				'auto-robot-wizard',
				'wizard',
				__( 'Activation', Auto_Robot::DOMAIN ),
				__( 'Activation ⇪', Auto_Robot::DOMAIN ),
				'auto-robot'
			);
		}

	   /**
		* Add Integrations page
		*
		* @since 1.0.0
		*/
	   public function add_integrations_page() {
		   add_action( 'admin_menu', array( $this, 'init_integrations_page' ) );
	   }

       /**
        * Initialize Integrations page
        *
        * @since 1.0.0
        */
       public function init_integrations_page() {
           $this->pages['auto-robot-integrations'] = new Auto_Robot_Integrations_Page(
               'auto-robot-integrations',
               'integrations',
               __( 'Integrations', Auto_Robot::DOMAIN ),
               __( 'Integrations', Auto_Robot::DOMAIN ),
               'auto-robot'
           );
       }

	   /**
		* Add Logs page
		*
		* @since 1.0.0
		*/
	   public function add_logs_page() {
		   add_action( 'admin_menu', array( $this, 'init_logs_page' ) );
	   }

	   /**
		* Initialize Logs page
		*
		* @since 1.0.0
		*/
	   public function init_logs_page() {
		   $this->pages['auto-robot-logs'] = new Auto_Robot_Logs_Page(
			   'auto-robot-logs',
			   'logs',
			   __( 'Logs', Auto_Robot::DOMAIN ),
			   __( 'Logs', Auto_Robot::DOMAIN ),
			   'auto-robot'
		   );
	   }

	   /**
		* Add settings page
		*
		* @since 1.0.0
		*/
	   public function add_settings_page() {
		   add_action( 'admin_menu', array( $this, 'init_settings_page' ) );
	   }

	   /**
		* Initialize Logs page
		*
		* @since 1.0.0
		*/
	   public function init_settings_page() {
		   $this->pages['auto-robot-settings'] = new Auto_Robot_Settings_Page(
			   'auto-robot-settings',
			   'settings',
			   __( 'Settings', Auto_Robot::DOMAIN ),
			   __( 'Settings', Auto_Robot::DOMAIN ),
			   'auto-robot'
		   );
	   }

	   /**
		* Add license page
		*
		* @since 1.0.0
		*/
		public function add_license_page() {
			add_action( 'admin_menu', array( $this, 'init_license_page' ) );
		}

		/**
		 * Initialize Logs page
		 *
		 * @since 1.0.0
		 */
		public function init_license_page() {
			$this->pages['auto-robot-license'] = new Auto_Robot_License_Page(
				'auto-robot-license',
				'license',
				__( 'License', Auto_Robot::DOMAIN ),
				__( 'License', Auto_Robot::DOMAIN ),
				'auto-robot'
			);
		}

	   /**
		* Add addons page
		*
		* @since 1.0.0
		*/
		public function add_addons_page() {
			add_action( 'admin_menu', array( $this, 'init_addons_page' ) );
		}

		/**
		 * Initialize addons page
		 *
		 * @since 1.0.0
		 */
		public function init_addons_page() {
			$this->pages['auto-robot-addons'] = new Auto_Robot_Addons_Page(
				'auto-robot-addons',
				'addons',
				__( 'Addons', Auto_Robot::DOMAIN ),
				__( 'Addons', Auto_Robot::DOMAIN ),
				'auto-robot'
			);
		}

		/**
		* Add welcome page
		*
		* @since 1.0.0
		*/
		public function add_welcome_page() {
			add_action( 'admin_menu', array( $this, 'init_welcome_page' ) );
		}

		/**
		 * Initialize Logs page
		 *
		 * @since 1.0.0
		 */
		public function init_welcome_page() {
			$this->pages['auto-robot-welcome'] = new Auto_Robot_Welcome_Page(
				'auto-robot-welcome',
				'welcome',
				__( 'Welcome', Auto_Robot::DOMAIN ),
				__( 'Welcome', Auto_Robot::DOMAIN ),
				'auto-robot'
			);
		}

		/**
		* Add import page
		*
		* @since 1.0.0
		*/
		public function add_import_page() {
			add_action( 'admin_menu', array( $this, 'init_import_page' ) );
		}

		/**
		 * Initialize Logs page
		 *
		 * @since 1.0.0
		 */
		public function init_import_page() {
			$this->pages['auto-robot-import'] = new Auto_Robot_Import_Page(
				'auto-robot-import',
				'import',
				__( 'Import / Export', Auto_Robot::DOMAIN ),
				__( 'Import / Export', Auto_Robot::DOMAIN ),
				'auto-robot'
			);
		}


   }

endif;

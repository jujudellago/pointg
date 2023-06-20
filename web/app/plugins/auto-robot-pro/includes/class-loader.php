<?php
/**
 * Auto_Robot_Loader Class
 *
 * @since  1.0.0
 * @package Auto Robot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Robot_Loader' ) ) :

class Auto_Robot_Loader {

	/**
	 * @var array
	 */
	public $files = array();

	/**
	 * Auto_Robot_Loader constructor.
	 *
	 */
	public function __construct() {}

	/**
	 * Retrieve data
	 *
	 * @since 1.0
	 * @since 1.7 add $requirements
	 *
	 * @param       $dir
	 * @param array $requirements
	 *
	 * @return mixed
	 */
	public function load_files( $dir, $requirements = array() ) {
		$files = scandir( AUTO_ROBOT_DIR . $dir );
		foreach ( $files as $file ) {
			$path = AUTO_ROBOT_DIR . $dir . '/' . $file;

			if( $this->is_php( $file ) && is_file( $path ) ) {

				// check requirement
				if ( ! empty ( $requirements ) ) {
					if ( in_array( $file, array_keys( $requirements ), true ) ) {
						if ( ! $this->is_requirement_fulfilled( $requirements[ $file ] ) ) {
							continue;
						}
					}
				}
				// Get class name
				$class_name = str_replace( '.php', '', $file );
				// Include file
				include $path;

				// Init class
				$object = $this->init( $class_name );

				$this->files[] = $object;
			}
		}

		return $this->files;
	}

	/**
	 * Check if PHP file
	 *
	 * @since 1.0
	 * @param $file
	 *
	 * @return bool
	 */
	public function is_php( $file ) {
		$check = substr( $file, - 4 );
		if ( '.php' === $check ) {
			return true;
		}

		return false;
	}

	/**
	 * Normalize class name
	 *
	 * @since 1.0
	 * @param $name
	 *
	 * @return mixed|string
	 */
	public function normalize( $name ) {
		$name = str_replace( '-', '_', $name );
		$name = ucwords( $name );

		return $name;
	}

	/**
	 * Init class
	 *
	 * @since 1.0
	 * @param $name
	 *
	 * @return mixed
	 */
	private function init( $name ) {
		$class = 'Auto_Robot_' . $this->normalize( $name );

		if ( class_exists( $class ) ) {
			$object = new $class();

			return $object;
		}
	}

	/**
	 * Check if requirement fulfilled by system
	 *
	 * @since 1.7
	 *
	 * @param array $requirement
	 *
	 * @return bool
	 */
	private function is_requirement_fulfilled( $requirement ) {
		// check php version
		if ( isset( $requirement['php'] ) ) {
			$version = $requirement['php'];
			if ( version_compare( PHP_VERSION, $version, 'lt' ) ) {
				return false;
			}
		}

		return true;
	}
}

endif;

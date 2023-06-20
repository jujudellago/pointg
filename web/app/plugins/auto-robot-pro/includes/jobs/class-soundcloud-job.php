<?php
/**
 * Auto_Robot_SoundCloud_Job Class
 *
 * @since  1.0.0
 * @package Auto Robot
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Robot_SoundCloud_Job' ) ) :

    class Auto_Robot_SoundCloud_Job extends Auto_Robot_Job{

        /**
         * Auto_Robot_SoundCloud_Job constructor.
         *
         * @since 1.0.0
         */
        public function __construct($id, $type, $keyword, $settings) {
            $this->id = $id;
            $this->settings = $settings;
            $this->get_api_data($type);
            if(strpos($keyword, ' ')){
                $keyword_array = explode( ' ', $keyword );
                $this->keyword = $keyword_array[0];
            }else{
                $this->keyword = $keyword;
            }
        }

        /**
         * Run this job
         *
         * @return array
         */
        public function run(){

        }

        /**
        * Fetch Data
        *
        * @return array
        */
        public function fetch_data() {

        }
}

endif;

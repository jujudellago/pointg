<?php
/**
 * Auto_Robot_Instagram_Job Class
 *
 * @since  1.0.0
 * @package Auto Robot
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Robot_Instagram_Job' ) ) :

    class Auto_Robot_Instagram_Job extends Auto_Robot_Job{

        public $ch = '';

        /**
         * Auto_Robot_Instagram_Job constructor.
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
            $this->build_ch();
            $this->logger = new Auto_Robot_Log($id);
        }

        /**
         * Build Ch
         */
        public function build_ch(){
        // curl
		$this->ch = curl_init ();
		curl_setopt ( $this->ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $this->ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $this->ch, CURLOPT_CONNECTTIMEOUT, 10 );
		curl_setopt ( $this->ch, CURLOPT_TIMEOUT, 200 );
		curl_setopt ( $this->ch, CURLOPT_REFERER, 'http://www.bing.com/' );
		curl_setopt ( $this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36' );
		// curl_setopt($this->ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8');

		curl_setopt ( $this->ch, CURLOPT_MAXREDIRS, 20 ); // Good leeway for redirections.
		@curl_setopt ( $this->ch, CURLOPT_FOLLOWLOCATION, 1 ); // Many login forms redirect at least once.

		//cooke jar to save cookies, without a cookie jar, cURL will not remember any cookie set and will never send a cookie saved
		$cjname = $this->cookieJarName ();

		@curl_setopt ( $this->ch, CURLOPT_COOKIEJAR, str_replace ( 'core.php', $cjname, __FILE__ ) );
		@curl_setopt ( $this->ch, CURLOPT_COOKIEJAR, $cjname );

		curl_setopt ( $this->ch, CURLOPT_SSL_VERIFYPEER, false );
        }

         /**
	 * Random cookie name
	 *
	 * @return string|unknown|mixed|boolean
	 */
	function cookieJarName() {
		$name = get_option ( 'auto_robot_instagram_cjn', '' );

		if (trim ( $name ) == '') {

			$name = $this->randomString () . '_' . $this->randomString ();
			update_option ( 'auto_robot_instagram_cjnn', $name );
		}

		return $name;
	}

    // random text
	function randomString($length = 10) {
		$str = "";
		$characters = array_merge ( range ( 'A', 'Z' ), range ( 'a', 'z' ), range ( '0', '9' ) );
		$max = count ( $characters ) - 1;
		for($i = 0; $i < $length; $i ++) {
			$rand = mt_rand ( 0, $max );
			$str .= $characters [$rand];
		}
		return $str;
	}


        /**
         * Run this job
         *
         * @return array
         */
        public function run(){
            // Fetch Data
            $data = $this->fetch_data();

            //var_dump($data);

            // Create new post when return data is not null
            if(!is_null($data) && is_array($data)){
                $text = $data['text'];
                $instagram_url = 'https://www.instagram.com/p/'.$data['shortcode'];
                $title = substr($text, 0, 45);

                $this->log[] = array(
                    'message'   => 'Fetch Instagram URL: <a href="'.$instagram_url.'">'.$instagram_url.'</a>',
                    'level'     => 'log'
                );

                // Build post content
                $content = '<a href="'.$instagram_url.'"><img src="'.$data['thumbnail_src'].'" />"</a>';
                $content .= $text.'<br>';
                $content .= '<a href="'.$instagram_url.'">source</a>';

                // extract first image
                preg_match_all ( '/<img [^>]*src[\s]*=[\s]*"(.*?)".*?>/i', stripslashes ( $content ), $matches );
                $image_url = $matches[1][0];

                // Generate New Post
                $this->create_post($title, $content, $this->settings, $image_url);
            }

            // Add this job running log to system log file
            foreach($this->log as $key => $value){
                $this->logger->add($value['message'], $value['level']);
            }

            return $this->log;
        }

        /**
        * fetch_data
        *
        * @return array
        */
        public function fetch_data() {

                $instaScrape = new Auto_Robot_InstaScrape ( $this->ch, $this->api_data['session_id'], false );

                $limit = 2000;
                $url = 'https://www.instagram.com/graphql/query/?';

                //var_dump($url);

                $user_info = array();


                // check if need to fetch data from specific instagram user
                if(!empty($this->settings['instagram_user'])){

                    try {

                        $cg_it_user_numeric = $instaScrape->getUserIDFromName ( $this->settings['instagram_user'] );

                        // echo 'user id: '.$cg_it_user_numeric;
                        // if (is_numeric ( $cg_it_user_numeric )) {

                        //     echo '<br>Found the id:' . $cg_it_user_numeric;
                        //     update_post_meta ( $camp->camp_id, 'wp_instagram_user_' . trim ( $cg_it_user ), $cg_it_user_numeric );
                        // }
                    } catch ( Exception $e ) {
                        echo 'Failed:' . $e->getMessage ();
                        return;
                    }



                    // $instagram_user_id = $this->get_id_by_user($this->settings['instagram_user']);
                    // $user_info = $this->get_user_info($this->settings['instagram_user']);
                    // if(is_numeric($instagram_user_id)){
                    //     $req_params = [
                    //         'query_id'  => '17880160963012870',
                    //         'id' => $instagram_user_id,
                    //         'first' => $limit,
                    //     ];
                    // }else{
                    //     // Return error message when get instagram user id
                    //     return $instagram_user_id;
                    // }



                }else{
                    $req_params = [
                        'query_id'  => '17882293912014529',
                        'tag_name' => $this->keyword,
                        'first' => $limit,
                    ];
                }

                // build url;
			    if (is_numeric ( $cg_it_user_numeric )) {
                    $wp_instagram_next_max_id = 0;
				    // get items
				    try {
					    $result = $instaScrape->getUserItems ( $cg_it_user_numeric, 10, $wp_instagram_next_max_id );
				        //var_dump($jsonArr);
                    } catch ( Exception $e ) {
					    echo '<br>Exception:' . $e->getMessage ();
					    return;
				    }
			    } else {
				    echo '<br>Can not find valid numeric id for the user .. exiting';
				    return;
			    }

                //var_dump($result);

                $feeds_data = array();

                if(!is_null($result)){
                    // check if fetch data from specific instagram user
                    if(!empty($this->settings['instagram_user'])){
                        $feeds_data = $result->data->user->edge_owner_to_timeline_media->edges;
                    }

                    foreach($feeds_data as $key => $value){
                        $feeds[$key]['id'] = $value->node->id;
                        $feeds[$key]['text'] = $value->node->edge_media_to_caption->edges[0]->node->text;
                        $feeds[$key]['shortcode'] = $value->node->shortcode;
                        $feeds[$key]['display_url'] = $value->node->display_url;
                        //$feeds[$key]['thumbnail_src'] = $value->node->thumbnail_src;
                        $feeds[$key]['thumbnail_src'] = auto_robot_instagram_upload_image($value->node->thumbnail_src, $value->node->shortcode, $this->id);
                    }
                }


                $rand = rand(0, 20);
                return $feeds[$rand];
            }

        /**
         * Get ID by Instagram username
         *
         * @return int
         */
        public function get_id_by_user($username) {

            $url = 'https://www.instagram.com/'.trim($username).'/?__a=1';

            try {
                $ch = curl_init();

                // Check if initialization had gone wrong*
                if ($ch === false) {
                    throw new Exception('failed to initialize');
                }

                // Exit when user not set instagram seesionid
                if(!isset($this->api_data['session_id']) || empty($this->api_data['session_id'])){
                    $this->log[] = array(
                        'message'   => '<a href="'.admin_url( 'admin.php?page=auto-robot-integrations' ).'">Note: Your Instagram SessionID is Empty, Please add your settings on integrations page!<a>',
                        'level'     => 'error'
                    );
                    $this->log[] = array(
                        'message'   => '<a href="https://wpautorobot.com/document/api-settings/how-to-setup-instagram-session-cookie/">Here is the document of how to get your instagram sessionid<a>',
                        'level'     => 'error'
                    );
                    return 'Error: Miss Instagram SessionID';
                }



                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_COOKIE, 'sessionid='.$this->api_data['session_id'].'; csrftoken=eqYUPd3nV0gDSWw43IYZjydziMndrn4l;');
                curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
                curl_setopt($ch, CURLOPT_URL, trim($url));

                $content = curl_exec($ch);

                // Check the return value of curl_exec(), too
                if ($content === false) {
                    throw new Exception(curl_error($ch), curl_errno($ch));
                }

                // Close curl handle
                curl_close($ch);

                // Extract the id
                preg_match('/"profilePage_(.*?)"/', $content, $matchs);

                $user_id = $matchs[1];

                if(is_null($user_id)){
                    // Exit when user instagram seesionid not correct
                    $this->log[] = array(
                        'message'   => '<a href="'.admin_url( 'admin.php?page=auto-robot-integrations' ).'">Fetch Instagram User ID Failed, Please check if your instagram sessionid is correct or not!<a>',
                        'level'     => 'error'
                    );
                    $this->log[] = array(
                        'message'   => '<a href="https://wpautorobot.com/document/api-settings/how-to-setup-instagram-api-settings/">Here is the document of how to get your instagram sessionid<a>',
                        'level'     => 'error'
                    );
                    return 'Error: Fetch Instagram Failed';
                }

                return $user_id;


            } catch(Exception $e) {

                trigger_error(sprintf(
                    'Curl failed with error #%d: %s',
                    $e->getCode(), $e->getMessage()),
                    E_USER_ERROR);
            }

        }
}

endif;

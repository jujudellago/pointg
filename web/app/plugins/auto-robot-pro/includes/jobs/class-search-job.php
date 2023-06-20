<?php
/**
 * Auto_Robot_Search_Job Class
 *
 * @since  1.0.0
 * @package Auto Robot
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Robot_Search_Job' ) ) :

    class Auto_Robot_Search_Job extends Auto_Robot_Job{

        /**
         * Feed Link
         *
         * @var string
         */
        public $feed_link = '';

        /**
         * Auto_Robot_Search_Job constructor.
         *
         * @since 1.0.0
         */
        public function __construct($id, $type, $keyword, $settings) {
            $this->id = $id;
            $this->keyword = $keyword;
            $this->settings = $settings;
            $this->logger = new Auto_Robot_Log($id);
            $this->log = array();
        }

        /**
         * Run this job
         *
         * @return array
         */
        public function run(){
            $response = array();

            // Fetch Data
            $data = $this->fetch_data();

            if(is_object($data)){
                $this->log[] = array(
                    'message'   => $data->errors['simplepie-error'][0],
                    'level'     => 'error'
                );
            }else{
                $title = $data['title'];

                // Build post content
                $content = $data['content'].'<br>';
                $content .= '<a href="'.$data['link'].'">source</a>';

                // Generate New Post
                $this->create_post($title, $content, $this->settings, $data['featured_image']);
            }

            // Add this job running log to system log file
            foreach($this->log as $key => $value){
                $this->logger->add($value['message'], $value['level']);
            }

            return $this->log;
        }

        /**
        * Fetch Data
        *
        * @return array
        */
        public function fetch_data() {
            $robot_init_language = str_replace('_', ':' ,$this->settings['robot_init_language']);
            $pieces = explode(":", $robot_init_language);
            $country_code = $pieces[0];
            $language_code = $pieces[1];

            // Search google news feed by keyword
            $url = 'https://news.google.com/rss/search?';
            $req_params = [
                'q' => $this->keyword,
                'hl' => $language_code,
                'gl' => $country_code,
                'ceid' => $robot_init_language,
            ];

            $url .= http_build_query($req_params);

            // Get RSS Feed(s)
            include_once( ABSPATH . WPINC . '/feed.php' );

            // Get a SimplePie feed object from the specified feed source.
            $rss = fetch_feed( $url );

            $maxitems = 0;

            // Checks that the object is created correctly
            if ( ! is_wp_error( $rss ) ) {

                // Figure out how many total items there are, but limit it to 5.
                $maxitems = $rss->get_item_quantity();

                $this->log[] = array(
                    'message'   => 'Feed contains '.$maxitems.' total items',
                    'level'     => 'log'
                );

                // Build an array of all the items, starting with element 0 (first element).
                $rss_items = $rss->get_items(0, $maxitems);

                foreach($rss_items as $item){
                    if(!is_null($item) && !$this->is_title_duplicate($item->get_title())){
                        $single_item = $item;
                    }
                }

                $return = array();
                if(!is_null($single_item)){
                    // translate title
                    $return['title'] = $single_item->get_title();
                    $return['link'] = $single_item->get_permalink();
                    $return['content'] = $single_item->get_content();

                    // Fetch origin content
                    $original_content  = $this->fetch_stream( $return['link'] );

                    $sourceHref = '';
                    if(!empty($original_content)){
                        // Parse DOM HTML
                        // Create DOM from URL or file
                        $html = str_get_html($original_content);
                        if($html){
                            $element = $html->find('a', 0);
                            $sourceHref = $element->href;
                        }
                    }

                    // Fetch origin content
                    $article_content  = $this->fetch_stream( $sourceHref );

                    $return['featured_image'] = $this->get_og_image($article_content);

                    if(!empty($article_content)){
                        // Parse DOM HTML
                        // Create DOM from URL or file
                        $html = str_get_html($article_content);
                        if($html){
                            $main_content = '';
                            // get each paragraph
                            foreach($html->find('p') as $element) {
                                $innertext = $element->innertext;
                                $main_content .= $innertext . '<br>';
                            }
                            $return['content'] = $main_content;
                        }
                    }

                    // Spin rewriter processor
                    if(isset($this->settings['robot_spin_rewriter']) && $this->settings['robot_spin_rewriter'] == 'on'){
                        $return['content'] = $this->maybe_spin_rewriter($return['content']);
                    }

                    $this->log[] = array(
                        'message'   => 'Fetch Title: '.$return['title'],
                        'level'     => 'log'
                    );
                    $this->log[] = array(
                        'message'   => 'Fetch URL: <a href="'.$return['link'].'">'.$return['link'].'</a>',
                        'level'     => 'log'
                    );

                }else{
                    $this->log[] = array(
                        'message'   => 'There is no new post from this source, Auto Robot will generate new post again when this source have update',
                        'level'     => 'log'
                    );
                }


                return $return;
            }else{
                return $rss;
            }

        }

        /**
         * Spin Rewriter
         *
         * @return string
         */
        private function maybe_spin_rewriter($innertext){

            $spin_rewriter_api_data = Auto_Robot_Addon_Loader::get_instance()->get_addon_data('spin-rewriter');

            // spin rewriter service
            if(isset($this->settings['robot_spin_rewriter']) && $this->settings['robot_spin_rewriter'] == 'on'){

                // Spin Rewriter API settings - authentication:
	            $email_address = $spin_rewriter_api_data['email'];			// your Spin Rewriter email address goes here
	            $api_key = $spin_rewriter_api_data['api_key'];	// your unique Spin Rewriter API key goes here

                if(!empty($email_address) && !empty($api_key)){
                    // Authenticate yourself.
	                $spinrewriter_api = new SpinRewriterAPI($email_address, $api_key);

                    // (optional) Set whether the One-Click Rewrite process automatically protects Capitalized Words outside the article's title.
	                $spinrewriter_api->setAutoProtectedTerms(false);

	                // (optional) Set the confidence level of the One-Click Rewrite process.
	                $spinrewriter_api->setConfidenceLevel("medium");

	                // (optional) Set whether the One-Click Rewrite process uses nested spinning syntax (multi-level spinning) or not.
	                $spinrewriter_api->setNestedSpintax(true);

	                // (optional) Set whether Spin Rewriter rewrites complete sentences on its own.
	                $spinrewriter_api->setAutoSentences(false);

	                // (optional) Set whether Spin Rewriter rewrites entire paragraphs on its own.
	                $spinrewriter_api->setAutoParagraphs(false);

	                // (optional) Set whether Spin Rewriter writes additional paragraphs on its own.
	                $spinrewriter_api->setAutoNewParagraphs(false);

	                // (optional) Set whether Spin Rewriter changes the entire structure of phrases and sentences.
	                $spinrewriter_api->setAutoSentenceTrees(false);

	                // (optional) Sets whether Spin Rewriter should only use synonyms (where available) when generating spun text.
	                $spinrewriter_api->setUseOnlySynonyms(false);

	                // (optional) Sets whether Spin Rewriter should intelligently randomize the order of paragraphs and lists when generating spun text.
	                $spinrewriter_api->setReorderParagraphs(false);

	                // (optional) Sets whether Spin Rewriter should automatically enrich generated articles with headings, bullet points, etc.
	                $spinrewriter_api->setAddHTMLMarkup(false);

	                // (optional) Sets whether Spin Rewriter should automatically convert line-breaks to HTML tags.
	                $spinrewriter_api->setUseHTMLLinebreaks(false);

                    // remove img tags before process
                    // $innertext = preg_replace("/<img[^>]+\>/i", "(image)", $innertext);

	                // Make the actual API request and save the response as a native PHP array.
	                $api_response = $spinrewriter_api->getUniqueVariation($innertext);


                    if($api_response['status'] == 'ERROR'){
                        $this->log[] = array(
                            'message'   => $api_response['response'],
                            'level'     => 'error'
                        );
                        return $innertext;
                    }else if($api_response['status'] == 'OK'){
                        return $api_response['response'];
                    }
                }
            }else{
                return $innertext;
            }
        }

        /**
         * Get og:image source
         *
         * @return string
         */
        private function get_og_image($original_content){

            $og_img = '';

            // let's find og:image may be the content we got has no image
            preg_match ( '{<meta[^<]*?(?:property|name)=["|\']og:image["|\'][^<]*?>}s', $original_content, $plain_og_matches );

            if (isset ( $plain_og_matches [0] ) && stristr ( $plain_og_matches [0], 'og:image' )) {
                preg_match ( '{content=["|\'](.*?)["|\']}s', $plain_og_matches [0], $matches );
                $og_img = $matches [1];
            }

            return $og_img;
        }
}

endif;

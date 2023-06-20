<?php

/**
 * InstaScrape Class
 *
 * @since  1.0.0
 * @package Ultimate Instagram
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

class Auto_Robot_InstaScrape {
	public $ch;
	public $debug;
	public $sess;

	/**
	 *
	 * @param
	 *        	curl handler $ch
	 */
	function __construct($ch, $sess, $debug) {
		$this->ch = $ch;
		$this->debug = $debug;

		$this->sess  = $sess;

		// session required starting from 8 April 2018
		curl_setopt ( $this->ch, CURLOPT_COOKIE, 'sessionid=' . $sess . '; csrftoken=eqYUPd3nV0gDSWw43IYZjydziMndrn4l;' );

		// redirect
		curl_setopt ( $this->ch, CURLOPT_MAXREDIRS, 3 ); // Good leeway for redirections.
	}

	/**
	 * Get instagram pics for a specific user using his numeric ID
	 *
	 * @param string $usrID
	 *        	: the user id
	 *        	@$itemsCount integer: number of items to return default to 12
	 * @param number $index
	 *        	: the start index of reurned items (id of the first item) by default starts from the first image
	 *
	 * @return : array of items
	 */
	function getUserItems($usrID, $itemsCount = 12, $index = 0) {
		if ($this->debug)
			echo ' index' . $index;

		if ($index === 0) {

			$after = "";
		} else {

			$after = "&after=" . urlencode ( trim ( $index ) );
		}

		$url = "https://www.instagram.com/graphql/query/?query_id=17880160963012870&id=$usrID&first=12" . $after;

		if ($this->debug)
			echo '<br>URL:' . $url;

		curl_setopt ( $this->ch, CURLOPT_URL, $url );
		$exec = curl_exec ( $this->ch );
		$x = curl_error ( $this->ch );
		$cuinfo = curl_getinfo ( $this->ch );


		if (isset ( $cuinfo ['url'] ) &&  $this->is_not_logged_in($cuinfo ) ) {
			throw new Exception ( '<br><span style="color:red">Added session is not correct or expired. Please visit the plugin settings page and add a fresh session. Also make sure not to logout of your account for the session to stay alive.</span>' );
		}



		// Curl error check
		if (trim ( $exec ) == '') {

			throw new Exception ( 'Empty results from instagram call with possible curl error:' . $x );
		}

		// Verify returned result
		if (! (stristr ( $exec, 'status": "ok' ) || stristr ( $exec, 'status":"ok' ))) {

			throw new Exception ( 'Unexpected page content from instagram' . $x . $exec );
		}

		//var_dump($exec);

		$jsonArr = json_decode ( $exec );

		if (isset ( $jsonArr->status )) {
			return $jsonArr;
		} else {
			throw new Exception ( 'Can not get valid array from instagram' . $x );
		}
	}

	/**
	 * Get instagram user info
	 *
	 * @param string $userName
	 */
	function getUserinfo($userName) {

		$url = 'https://www.instagram.com/' . trim($userName) . '/?__a=1&__d=1';

		if ($this->debug)
			echo '<br>URL:' . $url;

		curl_setopt ( $this->ch, CURLOPT_URL, $url );
		$exec = curl_exec ( $this->ch );
		$x = curl_error ( $this->ch );
		$cuinfo = curl_getinfo ( $this->ch );


		if (isset ( $cuinfo ['url'] ) &&  $this->is_not_logged_in($cuinfo ) ) {
			throw new Exception ( '<br><span style="color:red">Added session is not correct or expired. Please visit the plugin settings page and add a fresh session. Also make sure not to logout of your account for the session to stay alive.</span>' );
		}



		// Curl error check
		if (trim ( $exec ) == '') {

			throw new Exception ( 'Empty results from instagram call with possible curl error:' . $x );
		}

		// Verify returned result
		// if (! (stristr ( $exec, 'status": "ok' ) || stristr ( $exec, 'status":"ok' ))) {

		// 	throw new Exception ( 'Unexpected page content from instagram' . $x . $exec );
		// }

		//var_dump($exec);

		$jsonArr = json_decode ( $exec );

		return $jsonArr;
	}

	/**
	 * Get Instagram pics by a specific hashtag
	 *
	 * @param string $hashTag
	 *        	Instagram Hashtag
	 * @param integer $itemsCount
	 *        	Number of items to return
	 * @param string $index
	 *        	Last cursor from a previous request for the same hashtag
	 */
	function getItemsByHashtag($hashTag, $itemsCount, $index = 0) {

		$this->resetCookies();

		// Build after prameter
		if ($index === 0) {

			$after = "";
		} else {

			//$after = "&max_id=" . urlencode ( trim ( $index ) );
			$after = "&after=" . urlencode ( trim ( $index ) );
		}

		$url = "https://www.instagram.com/graphql/query/?query_id=17882293912014529&tag_name=" . urlencode ( trim ( $hashTag ) ) . "&first=11" . $after;
		//$url = "https://www.instagram.com/explore/tags/" . urlencode ( trim ( $hashTag ) ) . "/?__a=1" . $after  ;

		curl_setopt ( $this->ch, CURLOPT_URL, $url );

		if ($this->debug)
			echo '<br>URL:' . $url;

		$exec = curl_exec ( $this->ch );
		$cuinfo = curl_getinfo ( $this->ch );
		$x = curl_error ( $this->ch );



		// Curl error check
		if (isset ( $cuinfo ['url'] ) &&  $this->is_not_logged_in($cuinfo ) ) {
			throw new Exception ( '<br><span style="color:red">Added session is not correct or expired. Please visit the plugin settings page and add a fresh session. Also make sure not to logout of your account for the session to stay alive.</span>' );
		}

		if (trim ( $exec ) == '') {
			throw new Exception ( 'Empty results from instagram call with possible curl error:' . $x );
		}

		// if incorrect hashtag
		if (stristr ( $exec, 'status":"ok' ) && stristr ( $exec, 'hashtag":null' )) {

			throw new Exception ( 'No hashtag exists on instagram for ' . $hashTag );

			return array ();
		}

		// Verify returned result
		if (! stristr ( $exec, 'status": "ok' ) && ! stristr ( $exec, 'media"' )) {
			throw new Exception ( 'Unexpected page content from instagram, Visit the plugin settings page and renew the Session ID Cookie' . $x . $exec );
		}

		$jsonArr = json_decode ( $exec );


		if (isset ( $jsonArr->graphql->hashtag ) || isset($jsonArr->data)) {

			// when no new items let's get the first page
			if (  ( isset($jsonArr->graphql)  && count ( $jsonArr->graphql->hashtag->edge_hashtag_to_media->edges ) == 0 )   || (isset($jsonArr->data->name) && false )  ) {

				if ($index === 0) {
				} else {
					// index used let's return first page
					return $this->getItemsByHashtag ( $hashTag, $itemsCount );
				}
			}

			return $jsonArr;
		} else {
			throw new Exception ( 'Can not get valid array from instagram' . $x );
		}
	}

	/**
	 *
	 * @param string $name
	 *        	the name of instagram user for example "cnn"
	 * @return : numeric id of the user
	 */
	function getUserIDFromName($name) {

		$this->resetCookies();

		// Curl get
		$x = 'error';
		$url = 'https://www.instagram.com/' . trim ( $name );
		curl_setopt ( $this->ch, CURLOPT_HTTPGET, 1 );
		curl_setopt ( $this->ch, CURLOPT_URL, trim ( $url ) );

		$headers = array();
		$headers[] = "Authority: www.instagram.com";
		$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
		$headers[] = "Accept-Language: en-US,en;q=0.9,ar;q=0.8";
		$headers[] = "Cache-Control: max-age=0";
		$headers[] = "Sec-Fetch-Dest: document";
		$headers[] = "Sec-Fetch-Mode: navigate";
		$headers[] = "Sec-Fetch-Site: none";
		$headers[] = "Sec-Fetch-User: ?1";
		$headers[] = "Upgrade-Insecure-Requests: 1";
		$headers[] = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36";
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);



		$exec = curl_exec ( $this->ch );
		$cuinfo = curl_getinfo ( $this->ch );
		$http_code = $cuinfo ['http_code'];
		$x = curl_error ( $this->ch );



		// Curl error check

		if (isset ( $cuinfo ['url'] ) &&    $this->is_not_logged_in($cuinfo )   ) {
			throw new Exception ( '<br><span style="color:red">Added session is not correct or expired. Please visit the plugin settings page and add a fresh session. Also make sure not to logout of your account for the session to stay alive.</span>' );
		}

		if (trim ( $exec ) == '') {
			throw new Exception ( 'Empty results from instagram call with possible curl error:' . $x );
		}

		// If not found
		if ($http_code == '404') {
			throw new Exception ( 'Instagram returned 404 make sure you have added a correct id. for example add "cnn" for instagram.com/cnn user' );
		}
		;

		// Verify returned result
		if (! stristr ( $exec, 'id' )) {
			throw new Exception ( 'Unexpected page content from instagram' . $x );
		}


		// Extract the id
		// preg_match('{id":\s?"(.*?)"}', $exec,$matchs);
		preg_match ( '{profilePage_(.*?)"}', $exec, $matchs );

		$possibleID = $matchs [1];

		// Validate extracted id
		if (! is_numeric ( $possibleID ) || trim ( $possibleID ) == '') {
			throw new Exception ( 'Can not extract the id from instagram page' . $x );
		}

		// Return ID
		return $possibleID;
	}

	/**
	 *
	 * @param string $itmID
	 *        	id of the item for example "BGUTAhbtLrA" for https://www.instagram.com/p/BGUTAhbtLrA/
	 */
	function getItemByID($itmID) {

		$this->resetCookies();

		// Preparing uri
		//$url = "https://www.instagram.com/p/" . trim ( $itmID ) . "/?__a=1";
		$url = "https://i.instagram.com/api/v1/media/" . trim ( $itmID ) . "/info/" ;

		// curl get
		$x = 'error';

		curl_setopt ( $this->ch, CURLOPT_HTTPGET, 1 );
		curl_setopt ( $this->ch, CURLOPT_URL, trim ( $url ) );
		curl_setopt ( $this->ch, CURLOPT_REFERER, "https://www.instagram.com/p/" . trim ( $itmID ) );




		$headers = array();
		$headers[] = "Authority: i.instagram.com";
		$headers[] = "Accept: */*";
		$headers[] = "Accept-Language: en-US,en;q=0.9,ar;q=0.8";
		//$headers[] = "Cookie: mid=YsLg9wAEAAE5Ic1iAxsRIgrysDDw; ig_did=5DC020C8-F2F0-4F02-BF86-06E348131584; ig_nrcb=1; fbm_124024574287414=base_domain=.instagram.com; csrftoken=BrevByaKGbvEQ2wI3mi51uvZKcftB7Ck; ds_user_id=3297820541; sessionid=3297820541%3ASVuNGspUiPBTUg%3A8%3AAYcggNy5pG_OQoV2AAINjlJsVxwV0vP1VVRilmP4sA; shbid=\"983905432978205410541688475083:01f77698d6de89764f281f44bbc80cc98d1cf27c12a40b696ec951cb4c16d0bd1493213b\"; shbts=\"165693908305432978205410541688475083:01f78c4a7a6d3c0ead33797ba8592f4632d1a4911fa813b2eaf2f04d5b8552cc2bf91df8\"; datr=7OzCYtG-7N1JExKMQdtPHLkG; fbsr_124024574287414=qhOC9YVBOmTOt5sNfWIqigKKKLQuVmCS5aXB4zTmCjs.eyJ1c2VyX2lkIjoiMTQ3NTEyMDIzNyIsImNvZGUiOiJBUUFVTm5ucW10VEphemNIN0NVTWxPV0dyZUl5cW00cF9QMzZyZmJoUi02LW5XMVM5NFNGSUFfblowYWFDQ1F0eVN4RmpHaEJhRXo2RWdHd1I3ZW11eUE2TVdzdEI4dFdvdUtjSEg2NHcycExuWU9DYWJkNGhoSVNSTlQwZGMxUGU3RV9GR19DQzIyeUE3ZDhsMllockNlamxKS1JKb0ZWVlFwNnF4WGFPYTZBTE1vUDBnNmVsNkxKcGx6RHJlM0RVV0hpTkVRbWhHWVd0MG4zNW9hYVFabjlEUTRNVXF0OTBUUDU4NjFNTTJFYU04UGlDYTlpOUNPMnJpWlZNU0NNWkV5LVNsM1pQaEIwWHNacmo2WWQtVTdpNHhjSXhLanVTU2FXaEFCTUpncUpZWXNNRVo4MXBabTY5cnhOWkZuVDlhOCIsIm9hdXRoX3Rva2VuIjoiRUFBQnd6TGl4bmpZQkFJWkM4V2U0QXg3Q3FQSlVHbVdxd1Q2RGI2WFRzekxWd1pDWkFUNGthcVpBWkM2TTdSWkFOeUNIVHZTeVBMOHp6VkJDWFlZdXVvQjdvbTRSU1ZNaGs2VVJ0NmJkMVJlbVREMmg3dHFPMVNENElkV2ZKUGptMElBTDl6MGtGWGVDU3hpT3BGTzJWNUZDUzlQZ0NQcTNrV3MyWDQyazZGS2tQakhySDVBaXhkIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE2NTY5NTI5MzR9; rur=\"ODN05432978205410541688488973:01f7050fd3abd9af3b2797e42d5366fc1e36114f16dbf3510f0c1e12cbe0ec6bbb120344\"";
		$headers[] = "Origin: https://www.instagram.com";
		$headers[] = "Referer: https://www.instagram.com/";
		$headers[] = "Sec-Ch-Ua: \".Not/A)Brand\";v=\"99\", \"Google Chrome\";v=\"103\", \"Chromium\";v=\"103\"";
		$headers[] = "Sec-Ch-Ua-Mobile: ?0";
		$headers[] = "Sec-Ch-Ua-Platform: \"macOS\"";
		$headers[] = "Sec-Fetch-Dest: empty";
		$headers[] = "Sec-Fetch-Mode: cors";
		$headers[] = "Sec-Fetch-Site: same-site";
		$headers[] = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36";
		//$headers[] = "X-Asbd-Id: 198387";
		//$headers[] = "X-Csrftoken: BrevByaKGbvEQ2wI3mi51uvZKcftB7Ck";
		$headers[] = "X-Ig-App-Id: 936619743392459";
		//$headers[] = "X-Ig-Www-Claim: hmac.AR3-365c0myQUxMUooD2u7aSW_B_FyLYH5Hmgx_m28jJvUOS";
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);


		$exec = curl_exec ( $this->ch );
		$x = curl_error ( $this->ch );
		$cuinfo = curl_getinfo ( $this->ch );



		if (isset ( $cuinfo ['url'] ) &&  $this->is_not_logged_in($cuinfo ) ) {
			throw new Exception ( '<br><span style="color:red">Added session is not correct or expired. Please visit the plugin settings page and add a fresh session. Also make sure not to logout of your account for the session to stay alive.</span>' );
		}

		// Curl error check
		if (trim ( $exec ) == '') {

			throw new Exception ( 'Empty results from instagram call with possible curl error:' . $x );
		}

		return json_decode ( $exec );
	}

	function resetCookies(){

		//echo '<br>Resetting cookies....';

		//workaround for IG returing error when loading items page, which adds new cookies , this one reset cookis
		curl_setopt( $this->ch, CURLOPT_COOKIELIST	 , 'ALL'); //erases all previous cookies held in memory including ds_user_id which causes the issue
		curl_setopt ( $this->ch, CURLOPT_COOKIE, 'sessionid=' . $this->sess . '; csrftoken=eqYUPd3nV0gDSWw43IYZjydziMndrn4l; ds_user_id=123;' );

	}


	function is_not_logged_in($cuinfo){

		$url = $cuinfo['url'];
		$code = $cuinfo['http_code'];

		if(stristr($url , 'login') || stristr($url, 'privacy/checks' ) || $code == 401 ){
			return true;
		}else{
			return false;
		}

	}

}


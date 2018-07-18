<?php

// Include NEO and XPAPI libraries
require( 'lib' . DIRECTORY_SEPARATOR . 'const.php' );
require( 'lib' . DIRECTORY_SEPARATOR . 'neo.php' );
require( 'lib' . DIRECTORY_SEPARATOR . 'xpapi.php' );

function handle_protocol( $string = false ){
	if( $string ):
		return str_replace( array( 'http://', 'https://' ), '//', $string );
	else:
		return "";
	endif;
}

// XPAPI Actions
function xpapi_controller() {
	$msisdn = (isset($_POST['user_msisdn']) ? $_POST['user_msisdn'] : '');
	$pin 	= (isset($_POST['user_pin']) ? $_POST['user_pin'] : 0);
	$action = (isset($_POST['user_action']) ? $_POST['user_action'] : '');
	$clubid = XPAPI_CLUB_ID_DAILY;
	
	if(isset($msisdn) && isset($action)) {
		$output = xpapi_call($msisdn, $action, XPAPI_USERNAME, XPAPI_PASSWORD, XPAPI_OPERATOR_ID, $clubid, XPAPI_SERVICE_ID, $pin);
		
		if(($action == 'validatePin' && json_decode($output)->validationStatus == 1)) {
			$_SESSION['msisdn'] = $msisdn;
			$_SESSION['loggedIn'] = true;
			$output = xpapi_call($msisdn, 'getSubscription', XPAPI_USERNAME, XPAPI_PASSWORD, XPAPI_OPERATOR_ID, $clubid, XPAPI_SERVICE_ID, $pin);
			if(json_decode($output)->subStatus == 1 && json_decode($output)->respStatus == 1) {
				$_SESSION['userHasBalance'] = true;
				$_SESSION['clubId'] = json_decode($output)->club;
				echo $output;
				wp_die();
			}
		}

		echo $output;
	}
	wp_die();
}

add_action('wp_ajax_xpapi_controller', 'xpapi_controller');
add_action('wp_ajax_nopriv_xpapi_controller', 'xpapi_controller');

function xpapi_session_controller(){
	$_SESSION = array();
	echo 1;
	wp_die();
}

add_action('wp_ajax_xpapi_logout', 'xpapi_session_controller');
add_action('wp_ajax_nopriv_xpapi_logout', 'xpapi_session_controller');

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

/* Addind menu into appearance */
register_nav_menus( array(
  'header' 				=> 'Top Left Menu',
  'footer' 				=> 'Footer menu #1',
  'footer_user' 	=> 'Footer menu User',
  'mid_footer' 		=> 'Footer menu Links',
  'nba_menu' 			=> 'NBA Top Menu'
) );

function request_webservice($url, $content, $method) {
  $method = $method == 'GET' ? 0 : 1;

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_POST, $method);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
	curl_close($ch);

  if ($content != 'JSON') {
			$output = simplexml_load_string($output);
      $output = json_decode(json_encode($output), true);
  } else {
      $output = json_decode($output, true);
  }

  return $output;
}

function nbaTopTen(){
  $url = "http://video.kwesesports.com/json-feeds/nba-videos/category/top-ten";
	$result = request_webservice($url, 'JSON', 'GET');
  return $result;
}

function nbaTopTenItem( $id = null ){
  $url = "http://video.kwesesports.com/json-feeds/nba-videos/category/top-ten";
	$result = request_webservice($url, 'JSON', 'GET');
	if( $id ):
		foreach( $result['items'] as $k => $v ):
			if( $v['id'] == $id ):
				return $v;
			endif;
		endforeach;
		return false;
	else:
		return false;
	endif;
}

function nbaNews(){
  $url = "http://kwese.espn.com/espn/rss/Basketball-Power-Index/espn-nba-basketball-power-index/news";
	$result = request_webservice($url, 'XML', 'GET');
  return $result;
}

function nbaNewsItem( $id = null ){
  $url = "http://kwese.espn.com/espn/rss/Basketball-Power-Index/espn-nba-basketball-power-index/news";
	$result = request_webservice($url, 'XML', 'GET');
  if( $id ):
		foreach( $result['items'] as $k => $v ):
			if( $v["id"] == $id ):
				return $v;
			endif;
		endforeach;
		return false;
	else:
		return false;
	endif;
}

// Function that checks if user is connected via operator (3G/4G)
function has_msisdn_forward() {
	
	// Possible Headers
	$msisdn_headers = array(
	'HTTP-X-MSISDN',
	'HTTP_CLIENT_IP',
	'HTTP_MSISDN',
	'HTTP_X_FORWARDED_FOR',
	'HTTP_X_MSISDN',
	'HTTP_X_NOKIA_MSISDN',
	'HTTP_X_UP_CALLING_LINE_ID',
	'HTTP_X_UP_SUBNO',
	'HTTP_CLI',
	'MSISDN',
	'PIMmsisdn',
	'Proxy-Client-IP',
	'TM_user-id',
	'User-Identity-Forward-msisdn',
	'WL-Proxy-Client-IP',
	'X-Forwarded-For',
	'X-MSISDN',
	'X-UP-CALLING-LINE-ID',
	'X_UP_CALLING_LINE_ID',
	'X_WAP_NETWORK_CLIENT_MSISDN',
	'http_msisdn',
	'http_x_msisdn',
	'msisdn',
	'vzv-msisdn',
	'x-du-msisdn',
	'x-msisdn',
	'x-nokia-msisdn',
	'x-real-ip',
	'x-up-calling-line-id',
	'x-up-subno',
	'x-wap-msisdn',
	'x-wap-network-client-msisdn',
	'x-wsb-identity'
	);
	// Test $_SERVER['x-wap-msisdn'] = '255713123301';
	// Check if MSISDN Header exists
	foreach( $_SERVER as $key => $value ) {
		if( in_array( $key, $msisdn_headers ) ) {
			if (is_valid_msisdn($value)) {
				$msisdn = $value;
				// Store Session
				if(method_exists('\WP_Session', 'get_instance')){
					$wp_session = \WP_Session::get_instance();
				}
				$wp_session['msisdn'] = $msisdn;
				$wp_session['login'] = true;
				$wp_session['msisdn_forward'] = true;
				break;
			}
		}
	}
	
	if (isset($msisdn)) {	
		return true;
	} else {
		return false;
	}
	
}

// Function to validate MSISDN format
function is_valid_msisdn($msisdn) {
	return preg_match('/^255\d{9}$/', $msisdn); //para mudar
}

// Function to validate MSISDN format
function getMsisdn() {
	$msisdn = isset( $_SESSION['msisdn'] ) ? $_SESSION['msisdn'] : false ;
	return $msisdn; 
}

function getWPMenu( $name = null ){
	if( !empty( $name ) ):
		$menu_name = $name;
		$locations = get_nav_menu_locations();
		$menu_id = $locations[ $menu_name ] ;
		$object =  wp_get_nav_menu_object($menu_id);
		$prepareReturn = (object) array( 
			'menu' => $object,
			'items' => wp_get_nav_menu_items( $object ),
			'locations' => $locations,
			'name' => rand( 0, 999 ) . rand( 0, 999 ) . rand( 0, 999 ) . md5( $name )
		);
		if( $prepareReturn->items ):
			_wp_menu_item_classes_by_context($prepareReturn->items);
			$searchParent = null;

			$prepareReturn->items = array_reverse( $prepareReturn->items );

			foreach( $prepareReturn->items as $k => $v ):
				if( in_array( 'current-post-ancestor', $v->classes ) || in_array('current-page-ancestor', $v->classes) || in_array('current-menu-item', $v->classes) ):
					$v->classes[] = 'active';	
				endif; 
				$v->children = array();
			endforeach;

			foreach( $prepareReturn->items as $k => $v ):
				if( $v->menu_item_parent > 0 ):
					foreach( $prepareReturn->items as $rk => $rv ):
						if( $rv->ID === intVal( $v->menu_item_parent ) ):
							$rv->children[] = $v;
						endif;
					endforeach;
				endif;
			endforeach;

			foreach( $prepareReturn->items as $k => $v ):
				if( $v->menu_item_parent > 0 ):
					unset( $prepareReturn->items[$k] );
				endif;
			endforeach;
			
			$prepareReturn->items = array_reverse( $prepareReturn->items );
		endif;
		return $prepareReturn;
	else:
		return false;
	endif;
}

function valid_login() {
  if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
    return true;
  } else {
    return false;
  }
}

function valid_subscription() {
  if(isset($_SESSION['userHasBalance']) && $_SESSION['userHasBalance'] == 1) {
    return true;
  } else {
    return false;
  }
}

// Function to validate clubId
function getClubId() {
  $clubId = isset($_SESSION['clubId']) ? $_SESSION['clubId'] : false ;
  return $clubId; 
}

//Function to verify if user is subscribed
function isSubscribed($msisdn){
	$clubid = XPAPI_CLUB_ID_DAILY . '|' . XPAPI_CLUB_ID_WEEKLY . '|' . XPAPI_CLUB_ID_MONTHLY;
	$output = xpapi_call($msisdn, 'getSubscription', XPAPI_USERNAME, XPAPI_PASSWORD, XPAPI_OPERATOR_ID, $clubid, XPAPI_SERVICE_ID);
	$output =  json_decode($output);

	$_SESSION['club_id'] = $output->club;

	if($output->subStatus == 1){
		$response = array(
			'subscribed' => true,
			'subId' => $output->subId,
			'club' => $output->club
			);
	}
	else{
		$response =  false;
	}
	return $response;
}

function neo_search( $keyword ) {
	//get channel id /types / views
	global $current_language, $current_types_id, $todas_as_categorias;

	$result = array();

	$rows = get_field( 'homepage_manager', 'option' );
	$channel_id = $rows[0]['channel_id']; //if multiple channels add for here
	$channels = get_field( 'global_settings', 'option' );
	$channels = get_field( 'global_settings', 'option' );
	foreach( $channels as $channel ) {
		if( $channel_id == $channel['channel'] ) {
			foreach( $channel['language_view_id'] as $view ) {
				if( $view['language'] == $current_language ) {
					$view_id = $view['view_id'];
				}
			}
		}
	}

	$output = array();
	foreach( $current_types_id as $k => $v ):
		foreach( $todas_as_categorias as $kk => $vv ):
			$tmp = neo_get_content_by_keyword( $keyword, $v, $channel_id, $view_id, $vv->catId );
			if( !is_null( $tmp ) ):
				if( !is_array( $tmp ) ):
					$tmp = array( $tmp );
				endif;
				$output[] = array( 'cat' => $vv, 'data' => $tmp );
			endif;
		endforeach;
	endforeach;

	return $output; 
	//wp_die();
}



/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);
<?php

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

//Function to verify if user is subscribed
function isSubscribed($msisdn){
	$clubid = XPAPI_CLUB_ID_DAILY;
	$output = xpapi_call($msisdn, 'getSubscription', XPAPI_USERNAME, XPAPI_PASSWORD, XPAPI_OPERATOR_ID, $clubid, XPAPI_SERVICE_ID);
	$output =  json_decode($output);


	if($output->subStatus == 1){
		$response = array(
			'subscribed' => true,
			'subId' => $output->subId,
			'club' => $output->club
		);

		$_SESSION['clubId'] = $output->club;
		$_SESSION['userHasBalance'] = true;
	}
	else{
		$response =  false;
	}
	return $response;
}
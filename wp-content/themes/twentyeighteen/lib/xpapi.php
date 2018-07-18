<?php
/* This file is loaded in theme functions.php */

function xpapi_call($msisdn, $action, $username, $password, $operator_id, $club_id, $service_id, $pin = 0, $media_info = array()) {
	// XPAPI URL
	$sandbox_url 	= 'http://devportals.timwe.com/xpapi/v0';
	$live_url 		= 'http://extpartners.timwe.com/xpapi/v0';
	// Curl Call Setup
	$ch = curl_init();
	// Receive server response
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Decide action
	switch ($action) {
		case 'resetPin':
			curl_setopt($ch, CURLOPT_URL, $live_url . '/crm/resetpin/' . $username);
			curl_setopt($ch, CURLOPT_PUT, 1);
			// Add parameters to send
			$parameters = array(
				'msisdn' 		=> $msisdn,
				'operator' 		=> $operator_id,
				'sendmessage'	=> 1,
				'service' 		=> $service_id,
				'entrypoint' 	=> 5,
				'transactionid' => uniqid(),
				'timestamp' 	=> generate_timestamp()
			);
			break;
		case 'validatePin':
			curl_setopt($ch, CURLOPT_URL, $live_url . '/crm/validatepin/' . $username);
			// Add parameters to send
			$parameters = array(
				'msisdn' 		=> $msisdn,
				'operator' 		=> $operator_id,
				'pin'			=> $pin,
				'service' 		=> $service_id,
				'entrypoint' 	=> 5,
				'transactionid' => uniqid(),
				'timestamp' 	=> generate_timestamp()
			);			
			break;
		case 'getSubscription':
			curl_setopt($ch, CURLOPT_URL, $live_url . '/sm/' . $username);
			// Add parameters to send
			$parameters = array(
				'msisdn' 		=> $msisdn,
				'operator' 		=> $operator_id,
				'club'			=> $club_id,
				'service' 		=> $service_id,
				'entrypoint' 	=> 5,
				'transactionid' => uniqid(),
				'timestamp' 	=> generate_timestamp()			
			);			
			break;
		case 'getGameURL':
			curl_setopt($ch, CURLOPT_URL, $live_url . '/m3/download/' . $username);
			// Add parameters to send
			$parameters = array(
				'msisdn' 		=> $msisdn,
				'operator' 		=> $operator_id,			
				'catid'			=> $media_info[1],
				'mediaid'		=> $media_info[0],
				'method' 		=> 1,
				'club'			=> $club_id,
				'sendmessage'	=> 0,
				'service' 		=> $service_id,
				'entrypoint' 	=> 5,
				'transactionid' => uniqid(),
				'timestamp' 	=> generate_timestamp(),
				'lang'			=> $media_info[2]				
			);
			break;			
		default:
			echo('No valid XPAPI action defined.');
			return null;
	}
	$parameters['authorization'] = generate_authorization($username, $password, $parameters);
	// Start building the Headers
	$headers = array();
	foreach($parameters as $key => $value) {
		$headers[] = $key . ': ' . $value;
	}
	// Add Headers
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// Execute Call
	$server_output = curl_exec($ch);
	// Close curl
	curl_close($ch);
	// Output Response
	return $server_output;
}

function generate_timestamp() {
	$time = time();
	$seconds = $time / 1000;
	$remainder = round($seconds - ($seconds >> 0), 3) * 1000;
	return date('YmdHis', $time) . $remainder;
}

function generate_authorization($username, $password, $headers = array()) {
	$auth = array($password, $username);
	$glue = chr(0x0A);
	$input = implode($glue, $auth).$glue.implode($glue, $headers);
	$auth_hash = rtrim(strtr(base64_encode(hash('sha256', $input, true)), '+/', '-_'), '=');
	return $auth_hash;
}
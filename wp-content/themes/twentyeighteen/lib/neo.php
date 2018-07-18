<?php
/* This file is loaded in theme functions.php */

function neo_get_categories($channel_id, $view_id, $channel_type) {
	$client = new SoapClient("http://lx-all-jboss-neo-05.timwe.com:8080/webservice/neom3/CatBean?WSDL");
	$categories = $client->getCatsByChannelViewAndType(array(
		'arg0' => $channel_id,
		'arg1' => $view_id,
		'arg2' => $channel_type
	));
	
	if(!empty($categories->getCatsByChannelViewAndTypeResponse)) {
		return $categories->getCatsByChannelViewAndTypeResponse;
	} else {
		return null;
	}
}

function neo_get_category_info($category_id) {
	$client = new SoapClient("http://lx-all-jboss-neo-05.timwe.com:8080/webservice/neom3/CatBean?WSDL");
	$category = $client->getCatById(array(
		'arg0' => $category_id,
	));
	
	if(!empty($category->return)) {
		return $category->return;
	} else {
		return null;
	}
}

function neo_get_category_games($channel_id, $channel_type, $category_id) {
	if( is_numeric( $category_id ) ) {
		$client = new SoapClient("http://lx-all-jboss-neo-05.timwe.com:8080/webservice/neom3/MediaBean?WSDL");
		$games = $client->getMediasByChannelTypeCat(array(
			'arg0' => $channel_id,
			'arg1' => $channel_type,
			'arg2' => $category_id
		));
	}
	
	if(!empty($games->getMediasByChannelTypeCatResponse)) {
		return $games->getMediasByChannelTypeCatResponse;
	} else {
		return null;
	}
}

function neo_get_game_info($game_id, $category_id) {
	if( is_numeric( $game_id ) && is_numeric( $category_id ) ) {
		$client = new SoapClient("http://lx-all-jboss-neo-05.timwe.com:8080/webservice/neom3/MediaBean?WSDL");
		$game_info = $client->getMediaByIdAndCat(array(
			'arg0' => $game_id,
			'arg1' => $category_id
		));
	}
	
	if(!empty($game_info->getMediaByIdAndCatResponse)) {
		return $game_info->getMediaByIdAndCatResponse;
	} else {
		return null;
	}
}

function neo_get_game_thumbnail($game_id, $thumbnail_size_index = 119) {
	$url = 'http://helm.tekmob.com/m3/cache/';
	$url .= $game_id . '_' . $thumbnail_size_index . '.jpg';
	return $url;
}

function neo_get_games_by_keyword($keyword, $channel_type, $channel_id, $view_id, $device_id = 486, $first_result = 0, $max_results = 100) {
	$client = new SoapClient("http://lx-all-jboss-neo-05.timwe.com:8080/webservice/neom3/MediaBean?WSDL");
	$games = $client->getMediasByCriteriaChannelViewDevType(array(
		"arg0" => $keyword,
		"arg1" => $channel_type,
		"arg2" => $channel_id,
		"arg3" => $view_id,
		"arg4" => $device_id,
		"arg5" => $first_result,
		"arg6" => $max_results
	));
	if(!empty($games->return)) {
		return $games->return;
	} else {
		return null;
	}
}

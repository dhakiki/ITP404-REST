<?php

function redirect($url) {
	header('Location: ' . $url);
}

function searchYoutube($searchterm) {
	$forSearch = ereg_replace(' ', '/', $_POST['searchterm']);
	$url="https://gdata.youtube.com/feeds/api/videos/-/$forSearch";
	$xmlString = file_get_contents($url);
	$simpleXML = simplexml_load_string($xmlString);
	return $simpleXML;
}

?>

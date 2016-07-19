<?
IncludeModuleLangFile(__FILE__);
function getSVReviews () {
	$query = $_SERVER['QUERY_STRING'];
	$key = COption::GetOptionString("shareview", "key", '');

	if (!strlen($key)) {
		echo 'errors:["'.GetMessage("SHAREVIEW_KEY_NOT_SET").'"]';
		return;
	}

	$headers = array(
		'User-Agent: Shareview Bitrix Extention',
		'X-Ismax-Key: '.$key
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,'https://www.shareview.ru/review?'.$query);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$out = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'errors:["'.curl_error($ch).'"]';
	} else {
		curl_close($ch);
		echo "$out";
	}
}
?>
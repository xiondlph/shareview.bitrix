<?
function getSVReviews ($arResult) {
	$out = '<h2>'.$arResult['PRODUCT']['NAME'].'</h2><br />'.$arResult['key'];
	return $out;
}
?>
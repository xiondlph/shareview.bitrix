<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
IncludeModuleLangFile(__FILE__);

header('Content-type: application/json; charset=utf-8');

if(!CModule::IncludeModule('ismax.shareview')){
	echo 'errors:["'.GetMessage("SHAREVIEW_MODULE_NOT_INSTALLED").'"]';
	return;
}

getSVReviews();
?>
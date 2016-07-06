<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
$arResult = array();

$arResult['key'] = COption::GetOptionString("shareview", "key", '');
if(!strlen($arResult['key']))
	return false;

$result = CIBlockElement::getByID($arParams['ELEMENT_ID']);
if(!$obElement = $result->Fetch()) {
	return false;
}


$arResult['PRODUCT'] = $obElement;

CModule::IncludeModule('shareview');
$arResult['out'] = getSVReviews($arResult);

$this->IncludeComponentTemplate();
?>

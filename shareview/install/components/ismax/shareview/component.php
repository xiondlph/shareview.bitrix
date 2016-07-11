<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
$arResult = array();

$result = CIBlockElement::getByID($arParams['ELEMENT_ID']);
if(!$obElement = $result->Fetch()) {
	return false;
}

$arResult['PRODUCT'] = $obElement;

$this->IncludeComponentTemplate();
?>

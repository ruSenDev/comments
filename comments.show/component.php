<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);
$this->setFrameMode(true);

$path = parse_url($APPLICATION->GetCurPage(), PHP_URL_PATH);
$elementID = end(explode("/", trim($path, "/")));


if (CModule::IncludeModule("iblock"))

    $arResult[] = array(
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    );


$arResult['COMMENTS'] = array();

$arOrder = [
    'PROPERTY_PAGE_RATE' => 'DESC',
    'CREATED_BY' => 'ASC'
];
$arFilter = [
    'IBLOCK_ID' => $arParams['IBLOCK_ID']
];


$selectedFields = [
    'ID',
    'IBLOCK_ID',
    'DATE_CREATE',
    'NAME',
    'PREVIEW_TEXT',
    'DETAIL_TEXT',
    'PROPERTY_PAGE_RATE',
    'PROPERTY_ELEMENT_ID',
    'CREATED_BY',
    'ACTIVE',
];

$res = CIBlockElement::GetList(
    $arOrder,
    $arFilter,
    false,
    false,
    $selectedFields
);

while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arResult['COMMENTS'][] = $arFields;
}
//debug($arFields);

$this->includeComponentTemplate();

?>


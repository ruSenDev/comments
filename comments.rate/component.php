<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);
$this->setFrameMode(true);

if (CModule::IncludeModule("iblock"))

    $arResult[] = array(
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    );

//debug($arResult);
$selectedFields = [
    'ID',
    'IBLOCK_ID',
    'PROPERTY_ELEMENT_ID',
    'PROPERTY_PAGE_RATE',
    'ACTIVE',
];

$res = CIBlockElement::GetList(
    array(),
    array('IBLOCK_ID' => $arParams['IBLOCK_ID']),
    false,
    false,
    $selectedFields
);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arResult['COMMENTS'][] = $arFields;
}

$this->includeComponentTemplate();
?>
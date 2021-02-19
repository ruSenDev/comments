<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);
$this->setFrameMode(true);


if (CModule::IncludeModule("iblock"))

    $arResult[] = [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    ];

$arResult['COMMENTS'] = array();
$properties = CIBlockProperty::GetList(
    ["name" => "asc"],
    ["ACTIVE" => "Y", "IBLOCK_ID" => $arParams['IBLOCK_ID']]
);
while ($prop_fields = $properties->GetNext()) {
    array_push($arResult['COMMENTS'], $prop_fields);
}

$arResult['ERROR'] = array();
if ((!empty($_REQUEST['PREVIEW_TEXT'])) && (!empty($_REQUEST['sessid'])) && (empty($_REQUEST['USER']))) {

//    echo '<pre>';
//    print_r($_POST);
//    echo '</pre>';

    $el = new CIBlockElement;
    $sendFields = [];
    foreach ($arResult['COMMENTS'] as $sendProps) {
        $sendFields[$sendProps['CODE']] = strip_tags($_POST[$sendProps['CODE']]);
    }
    $fields = [
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "PROPERTY_VALUES" => $sendFields,
        "ACTIVE" => "N",
        "NAME" => time(),
        "PREVIEW_TEXT" => strip_tags($_REQUEST['PREVIEW_TEXT']),
        "PAGE_RATE" => $_REQUEST['PAGE_RATE'],
        "ELEMENT_ID" => $_REQUEST['ELEMENT_ID'],
    ];

    if ($ID = $el->Add($fields)) {
        array_push($arResult['ERROR'], "NOT_ERROR");
        $arResult["OK_MESSAGE"] = $arParams['OK_TEXT'];

        echo Loc::getMessage('SD_COMMENT_SUCCESSFULLY_ADDED');

    } else {
        echo Loc::getMessage('SD_COMMENT_SUCCESSFULLY_ADDED');
    }

}


$this->includeComponentTemplate();
?>



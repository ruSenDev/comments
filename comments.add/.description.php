<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc;

$arComponentDescription = [
	"NAME" => Loc::getMessage("SD_COMMENTS_ADD_TITLE"),
	"DESCRIPTION" => Loc::getMessage("SD_COMMENTS_ADD_DESCRIPTION"),
    "COMPLEX" => "N",
    "CACHE_PATH" => "Y",
    "PATH" => [
        "ID" => Loc::getMessage("SD_COMMENTS_ADD_PATH_ID"),
        "NAME" => Loc::getMessage("SD_COMMENTS_ADD_PATH_NAME"),
        "CHILD" => [
            "ID" => Loc::getMessage("SD_COMMENTS_ADD_CHILD_PATH_ID"),
            "NAME" => GetMessage("SD_COMMENTS_ADD_NAME")
        ]
    ],
];
?>
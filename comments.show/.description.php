<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc;

$arComponentDescription = [
    "NAME" => Loc::getMessage("SD_COMMENTS_SHOW_TITLE"),
    "DESCRIPTION" => Loc::getMessage("SD_COMMENTS_SHOW_DESCRIPTION"),
    "COMPLEX" => "N",
    "CACHE_PATH" => "Y",
    "PATH" => [
        "ID" => Loc::getMessage("SD_COMMENTS_SHOW_PATH_ID"),
        "NAME" => Loc::getMessage("SD_COMMENTS_SHOW_PATH_NAME"),
        "CHILD" => [
            "ID" => Loc::getMessage("SD_COMMENTS_SHOW_CHILD_PATH_ID"),
            "NAME" => GetMessage("SD_COMMENTS_SHOW_NAME")
        ]
    ],
];
?>
<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */

/** @var CBitrixComponent $component */

use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);
$this->setFrameMode(true);

$path = parse_url($APPLICATION->GetCurPage(), PHP_URL_PATH);
$elementID = end(explode("/", trim($path, "/")));

?>
<hr>
<? foreach ($arResult['COMMENTS'] as $item): ?>
    <?
    $rsUser = CUser::GetByID($item['CREATED_BY']);
    $arUser = $rsUser->Fetch();
    ?>
    <? if (($item['PROPERTY_ELEMENT_ID_VALUE'] == $elementID) && ($item['ACTIVE'] == 'Y')): ?>
        <div class="card text-left mt-2 mb-2">
            <div class="card-header text-muted">
                <div class="row">
                    <div class="col">
                        <small><?= $item['DATE_CREATE'] ?></small>
                    </div>
                    <div class="col">
                        <small>
                            <? echo "{$arUser['LAST_NAME']} {$arUser['NAME']} {$arUser['SECOND_NAME']}"; ?>
                        </small>
                    </div>
                    <div class="col">
                        <div class="rating-result">
                            <span class="<?php if (ceil($item['PROPERTY_PAGE_RATE_VALUE']) >= 1) echo 'active'; ?>"></span>
                            <span class="<?php if (ceil($item['PROPERTY_PAGE_RATE_VALUE']) >= 2) echo 'active'; ?>"></span>
                            <span class="<?php if (ceil($item['PROPERTY_PAGE_RATE_VALUE']) >= 3) echo 'active'; ?>"></span>
                            <span class="<?php if (ceil($item['PROPERTY_PAGE_RATE_VALUE']) >= 4) echo 'active'; ?>"></span>
                            <span class="<?php if (ceil($item['PROPERTY_PAGE_RATE_VALUE']) >= 5) echo 'active'; ?>"></span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $item['PREVIEW_TEXT'] ?>
            </div>
            <? if (($item['DETAIL_TEXT'])): ?>
                <div class="card-footer text-muted">
                    <small><strong><?=Loc::getMessage('MODER_COMMENT')?></strong> <?= $item['DETAIL_TEXT'] ?></small>
                </div>
            <? endif; ?>
        </div>
    <? endif; ?>
<? endforeach; ?>






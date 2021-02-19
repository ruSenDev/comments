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

$rating = 0;
$count = 0;
foreach ($arResult['COMMENTS'] as $key => $item) {
    if ($item['PROPERTY_ELEMENT_ID_VALUE'] == $elementID) {
        $rating += $item['PROPERTY_PAGE_RATE_VALUE'];
        $count++;
    }
}
$rating = $rating / $count;
?>
<?if ($rating > 0):?>
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <p><?= Loc::getMessage('AVERAGE_RATING') ?> <?= round($rating, 1) ?></p>
                </div>
                <div class="col-sm">
                    <div class="rating-result">
                        <span class="<?php if (round($rating) >= 1) echo 'active'; ?>"></span>
                        <span class="<?php if (round($rating) >= 2) echo 'active'; ?>"></span>
                        <span class="<?php if (round($rating) >= 3) echo 'active'; ?>"></span>
                        <span class="<?php if (round($rating) >= 4) echo 'active'; ?>"></span>
                        <span class="<?php if (round($rating) >= 5) echo 'active'; ?>"></span>
                    </div>
                </div>
                <div class="col-sm">
                    <p><?= Loc::getMessage('RATING_BASE') ?> <?= $count ?> <?= Loc::getMessage('RATE_COUNT') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?endif;?>










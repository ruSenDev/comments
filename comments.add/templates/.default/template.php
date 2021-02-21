<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);
$this->setFrameMode(true);

$path = parse_url($APPLICATION->GetCurPage(), PHP_URL_PATH);
$elementID = end(explode("/", trim($path, "/")));
?>

<? if ($USER->IsAuthorized()): ?>
<p class="h5"><?=Loc::getMessage('ADD_COMMENT')?></p>
<div class="comments_add">
    <form name="iblock_add" action="<?= POST_FORM_ACTION_URI ?>" method="post">
        <?= bitrix_sessid_post() ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <small><?= $USER->GetFullName() ?></small>
                    </div>
                    <div class="col">
                        <div class="rating-area send_form_field">
                            <input type="radio" id="star-5" name="PAGE_RATE" value="5">
                            <label for="star-5" title="<?=Loc::getMessage('RATE_MARK')?> «5»"></label>
                            <input type="radio" id="star-4" name="PAGE_RATE" value="4">
                            <label for="star-4" title="<?=Loc::getMessage('RATE_MARK')?> «4»"></label>
                            <input type="radio" id="star-3" name="PAGE_RATE" value="3">
                            <label for="star-3" title="<?=Loc::getMessage('RATE_MARK')?> «3»"></label>
                            <input type="radio" id="star-2" name="PAGE_RATE" value="2">
                            <label for="star-2" title="<?=Loc::getMessage('RATE_MARK')?> «2»"></label>
                            <input type="radio" id="star-1" name="PAGE_RATE" value="1">
                            <label for="star-1" title="<?=Loc::getMessage('RATE_MARK')?> «1»"></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3 send_form_field">
                    <textarea class="form-control" name="PREVIEW_TEXT" id="exampleFormControlTextarea1" rows="3" placeholder="Текст комментария" required></textarea>
                </div>
                <div class="send_form_field">
                    <input hidden type="text" name="ELEMENT_ID" value="<?=$elementID?>">
                </div>
                <div class="send_form_submit">
                <button type="submit" class="submit btn btn-primary"><?=Loc::getMessage('BTN_SEND')?></button>
                </div>
            </div>
        </div>
    </form>
</div>
<?else:?>
    <div class="alert alert-danger" role="alert">
        <?=Loc::getMessage('COMMENT_REGISTER')?>
    </div>
<? endif; ?>

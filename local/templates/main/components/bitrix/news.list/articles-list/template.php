<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$this->setFrameMode(true);
?>

<div class="grid grid-cols-2 xl:grid-cols-1 gap-2 sm:gap-6 xl:gap-10">
    <? if (!empty($arResult)): ?>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="anim anim-up duration-500" data-anim id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="card xl:flex-row xl:justify-between xl:gap-7 bg-transparent rounded-none overflow-visible">
                    <div class="shrink-0 w-full xl:max-w-xl">
                        <a class="pack pack-md xl:pack-xs bg-white rounded-2xl sm:rounded-3xl" data-waved="light"
                           draggable="false" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                            <?php \lib\KitTPL::loader(); ?>
                            <?php \lib\KitTPL::picture("{src: '" . $arItem['PREVIEW_PICTURE']['SRC'] . "', format: 'url', className: 'pack-image image rounded-inherit', data: null}"); ?>
                        </a>
                    </div>
                    <div class="card-content xl:items-start pt-3 sm:pt-5 xl:pb-5">
                        <h3 class="font-alt font-bold uppercase text-sm sm:text-lg lg:text-2xl mb-2 sm:mb-4 lg:mb-6">
                            <?= $arItem['NAME'] ?>
                        </h3>
                        <p class="text-sm sm:text-lg lg:text-2xl line-clamp-2 mb-4 sm:mb-6 lg:mb-8">
                            <?= $arItem['PREVIEW_TEXT'] ?>
                        </p>
                        <a class="btn btn-dark btn-fill btn-lg sm:btn-xl sm:text-xl w-full xl:max-w-72 mt-auto"
                           data-waved="light" draggable="false" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать</a>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    <? endif; ?>
</div>


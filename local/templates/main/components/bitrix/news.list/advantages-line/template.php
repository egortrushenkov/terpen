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


<section class="container flex flex-col gap-4 sm:gap-7 lg:gap-10 overflow-hidden pt-0 px-0">
    <? if (!empty($arResult)): ?>
        <? foreach ($arResult["ITEMS"] as $ketItem => $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="border-y sm:border-y-2 border-solid border-black py-4 sm:py-7 lg:py-10" data-slider="advantages" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="swiper" data-slider-swiper="advantages" <?= $ketItem === 1 ? 'dir="rtl"' : null ?>>
                    <div class="swiper-wrapper !ease-linear">
                        <? if (!empty($arResult)): ?>
                        <? foreach ($arItem['PROPERTIES']['advantages']['VALUE'] as $key => $arAdvantage): ?>
                            <div class="swiper-slide font-alt font-bold uppercase even:text-primary text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl w-auto" <?= $key === 1 ? 'dir="ltr"' : null ?>><?=$arAdvantage?></div>
                            <? endforeach; ?>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    <? endif; ?>
</section>
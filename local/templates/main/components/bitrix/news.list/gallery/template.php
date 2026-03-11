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

$items = $arResult["ITEMS"];

if ($arParams['PAGE_NAME'] === 'ABOUT') {
    $items = array_filter($items, function($item) {
        return $item['ID'] == 9;
    });
}
?>

<section class="container pt-0 xl:px-14">
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-2 sm:gap-5 lg:gap-8">
        <? if (!empty($arResult)): ?>
            <? foreach ($items as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <? if (!empty($arItem['PROPERTIES']['photos']['VALUE'])): ?>
                    <? foreach ($arItem['PROPERTIES']['photos']['VALUE'] as $key => $arPhoto): ?>
                        <div class="anim anim-up duration-500" data-anim
                             id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                            <a class="pack pack-xl bg-white rounded-2xl sm:rounded-3xl" data-fancybox="gallery"
                               data-waved="light" draggable="false" href="<?= CFile::GetPath($arPhoto) ?>">
                                <?php \lib\KitTPL::loader(); ?>
                                <?php \lib\KitTPL::picture("{src: '" . CFile::GetPath($arPhoto) . "', format: 'url', className: 'pack-image image rounded-inherit', data: null}"); ?>
                            </a>
                        </div>
                    <? endforeach; ?>
                <? endif; ?>
            <? endforeach; ?>
        <? endif; ?>
    </div>
</section>

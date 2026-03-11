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

<section class="container xl:px-14" data-section>
    <? if (!empty($arResult)): ?>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <?php \lib\KitTPL::subtitle("{text: '".$arItem['NAME']."', className: 'uppercase text-primary mb-6 xl:mb-0 anim anim-up duration-500', data: 'data-anim'}"); ?>
        <div class="flex flex-col xl:flex-row xl:justify-between gap-8">
            <div class="w-full xl:max-w-5xl xl:py-11">
                <div class="sm:text-xl lg:text-2xl mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500" data-anim>
                    <?=$arItem['PREVIEW_TEXT']?>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 sm:gap-8 lg:gap-12 mb-6 sm:mb-9 lg:mb-12">
                    <? if (!empty($arItem['PROPERTIES']['props']['VALUE'])): ?>
                    <? foreach ($arItem['PROPERTIES']['props']['VALUE'] as $key => $arProp): ?>
                    <div class="flex flex-col">
                        <div class="font-alt font-bold text-second text-lg sm:text-xl lg:text-2xl mb-1 sm:mb-2">
                            <span data-number="<?=$arItem['PROPERTIES']['props']['DESCRIPTION'][$key]?>" data-number-step="1" data-number-time="3" data-number-fixed="1">0</span>%
                        </div>
                        <span class="text-sm sm:text-base lg:text-lg"><?=$arProp?></span>
                    </div>
                    <? endforeach; ?>
                    <?endif;?>
                </div>
                <div class="grid sm:grid-cols-2 xl:flex xl:items-center gap-4 sm:gap-6 lg:gap-8">
                    <a class="btn btn-second btn-fill btn-lg sm:btn-xl sm:text-xl w-full xl:max-w-96" data-fancybox-form
                       data-waved="light" draggable="false" href="../../../../../../../ajax/dialogs/dialog-feedback.php">Как приобрести?</a>
                    <a class="btn btn-dark btn-contur btn-lg sm:btn-xl sm:text-xl w-full xl:max-w-96" data-waved="dark"
                       draggable="false" href="">Читать отзывы</a>
                </div>
            </div>
            <div class="xl:shrink-0 xl:w-full xl:max-w-[635px] -mx-4 sm:mx-0">
                <div class="grid grid-cols-3 gap-1 sm:gap-4 lg:gap-8 h-full">
                    <? if (!empty($arItem['PROPERTIES']['photos']['VALUE'])): ?>
                        <? foreach ($arItem['PROPERTIES']['photos']['VALUE'] as $key => $arPhoto): ?>
                            <div class="anim anim-up duration-500" data-anim>
                                <div class="pack pack-[250] xl:pack-[0] bg-white h-full">
                                    <?php \lib\KitTPL::loader(); ?>
                                    <?php \lib\KitTPL::picture("{src: '".CFile::GetPath($arPhoto)."', format: 'url', className: 'image', data: null}"); ?>
                                </div>
                            </div>
                        <? endforeach; ?>
                    <?endif;?>
                </div>
            </div>
        </div>
<? endforeach; ?>
<? endif; ?>
</section>
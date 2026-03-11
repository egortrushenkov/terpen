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


<section class="container pt-0 xl:px-14">
    <div class="font-alt font-bold text-3xl sm:text-4xl lg:text-5xl mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500"
         data-anim>#03
    </div>
    <?php \lib\KitTPL::subtitle("{text: '<span class=text-primary>Почему</span> выбирают нас?', className: 'uppercase mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500', data: 'data-anim'}"); ?>
    <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
        <? if (!empty($arResult)): ?>
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="card even:bg-dark even:text-white anim anim-up duration-500" data-anim
                     id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="card-content py-8 sm:py-14 lg:py-20 px-4 sm:px-6 lg:px-8">
                        <h3 class="font-normal uppercase text-xl sm:text-2xl lg:text-3xl mb-2">
                            <?= $arItem['NAME']; ?>
                        </h3>
                        <p class="sm:text-xl lg:text-2xl">
                            <?= $arItem['PREVIEW_TEXT']; ?>
                        </p>
                    </div>
                </div>
            <? endforeach; ?>
        <? endif; ?>
    </div>
</section>
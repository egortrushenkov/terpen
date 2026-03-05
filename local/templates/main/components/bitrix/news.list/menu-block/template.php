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
<section class="container xl:px-14">
    <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-4 lg:gap-6">
        <? if (!empty($arResult)): ?>
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="anim anim-up duration-500" data-anim id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="card bg-grey border border-solid border-dark">
                        <div class="card-content py-6 sm:py-8 lg:py-10 px-4">
                            <h3 class="uppercase text-dark text-center text-xl sm:text-2xl lg:text-3xl mb-6 sm:mb-9 lg:mb-12"><?= $arItem['NAME'] ?></h3>
                            <a class="btn btn-dark btn-fill btn-lg sm:btn-xxl sm:text-xl mt-auto" data-waved="light"
                               draggable="false" href="<?= $arItem['CODE'] ?>">Читать</a>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        <? endif; ?>
    </div>
</section>


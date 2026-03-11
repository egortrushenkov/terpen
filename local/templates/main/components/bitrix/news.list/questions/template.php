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

<section class="container overflow-hidden pt-0 xl:px-14">
    <?php \lib\KitTPL::subtitle("{text: 'Полезные вопросы', className: 'uppercase text-primary mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500', data: 'data-anim'}");?>
    <div class="flex flex-col xl:flex-row items-center xl:justify-between gap-8">
        <div class="w-full xl:max-w-4xl">
            <ul class="flex flex-col gap-4 sm:gap-6 lg:gap-8 text-dark">
                <? if (!empty($arResult)): ?>
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <li class="border-b border-solid border-current pb-2 anim anim-right duration-500" data-accordion data-close-click data-anim id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <button class="flex items-center justify-between gap-2 w-full" data-accordion-toggle>
                        <h4 class="font-normal text-xl sm:text-2xl lg:text-3xl">
                            <?= $arItem['NAME'] ?>
                        </h4>
                        <span class="font-alt font-bold text-2xl sm:text-3xl lg:text-4xl">?</span>
                    </button>
                    <div data-accordion-content>
                        <p class="text-sm sm:text-base lg:text-xl pt-4">
                            <?= $arItem['PREVIEW_TEXT'] ?>
                        </p>
                    </div>
                </li>
                    <? endforeach; ?>
                <? endif; ?>
            </ul>
        </div>
        <div class="shrink-0 w-full max-w-60 sm:max-w-96 xl:max-w-xl anim anim-left duration-500" data-anim>
            <?php \lib\KitTPL::picture("{src: '/img/pictures/logo', format: 'svg', className: 'block w-full', data: null}");?>
        </div>
    </div>
</section>


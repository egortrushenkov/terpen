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

<section class="company">
    <div class="container py-0 xl:px-14 mb-12 sm:mb-16 lg:mb-24">
        <?php \lib\KitTPL::subtitle("{text: 'Про компанию', className: 'uppercase text-center text-primary mb-6 anim anim-up duration-500', data: 'data-anim'}");?>
        <div class="w-full xl:max-w-[990px] xl:mx-auto anim anim-up duration-500" data-anim>
            <p class="text-center sm:text-xl lg:text-2xl">
                Описание компании, ценности, отношение к своему продукту, почему решили разрабатывать данный прибор. Люди сейчас покупают у людей и ищут понимания их болей и желаний. Поэтому важно в описании компании быть ближе к своему потенциальному клиенту и написать ДЛЯ НЕГО. Как будто мы общаемся с близким человеком. Нужно позиционировать себя через заботу, понимание. Нужно показать в описании компании, что наша цель, чтобы пользователь устройства в легкости пользовался прибором и неудобства ушли.
            </p>
        </div>
    </div>
    <div class="text-white md:min-h-[var(--scroll-height)] xxl:min-h-full" data-scrolling>
        <div class="container flex xxl:grid xxl:grid-cols-5 flex-col md:flex-row gap-6 md:sticky md:top-28 left-0 right-0 md:overflow-x-hidden py-0 xl:px-14" data-scrolling-horizontal>
            <? if (!empty($arResult)): ?>
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                        <div class="md:shrink-0 md:w-[430px] xxl:w-auto" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                            <div class="company__card card bg-dark">
                                <div class="card-content py-6 sm:py-8 lg:py-10 px-4 sm:px-6">
                                    <div class="w-24 sm:w-32 mb-5 sm:mb-8">
                                        <?php \lib\KitTPL::picture("{src: '".$arItem['PREVIEW_PICTURE']['SRC']."', format: 'url', className: 'block w-full', data: null}");?>
                                    </div>
                                    <h3 class="font-normal uppercase text-xl sm:text-2xl lg:text-3xl mb-3"><?=$arItem['NAME']?></h3>
                                    <p class="sm:text-xl lg:text-2xl"><?=$arItem['PREVIEW_TEXT']?></p>
                                </div>
                            </div>
                        </div>
                <? endforeach; ?>
            <? endif; ?>
        </div>
    </div>
</section>



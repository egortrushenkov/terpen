<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

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

<nav class="hidden xl:flex items-center gap-10 order-3">
    <?if (!empty($arResult)):?>
        <?foreach($arResult as $arItem):?>
            <?$css = ($arItem["SELECTED"]) ? '' : ' opacity-20';?>
            <a class="btn btn-primary text-black rounded-md min-w-max p-2 <%= data.title === item ? 'opacity-50 pointer-events-none' : null %>" data-waved="dark" draggable="false" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
        <?endforeach?>
    <?endif?>
</nav>

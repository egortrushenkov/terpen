<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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
<nav class="flex flex-col items-start gap-2 sm:gap-4 sm:text-xl lg:text-2xl">
    <? if (!empty($arResult)): ?>
        <? foreach ($arResult as $arItem): ?>
            <a class="opacity-45 transition-opacity hover:opacity-100" draggable="false"
               href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
        <? endforeach ?>
    <? endif ?>
</nav>

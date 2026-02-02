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
<nav class="flex flex-row gap-2 mb-5 sm:flex-col">
	<?if (!empty($arResult)):?>
		<?foreach($arResult as $arItem):?>
			<?$css = ($arItem["SELECTED"]) ? '' : ' opacity-20';?>
			<a class="sm:justify-start px-2 sm:px-4 btn btn-fill btn-lg gap-2 flex-grow sm:flex-grow-0 <?= ($arItem["SELECTED"]) ? 'btn-primary pointer-events-none' : 'btn-grey dark:bg-white/10 dark:hover:bg-white/30 text-black dark:text-white' ?>"
			   data-waved="dark" draggable="false" href="<?= $arItem["LINK"] ?>">
					<?= $arItem["TEXT"] ?>
			</a>
		<?endforeach?>
	<?endif?>
</nav>

<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

\Bitrix\Main\UI\Extension::load(['ui.design-tokens']);

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}


$default = 'btn size-7 sm:size-10 rounded shrink-0 font-semibold btn-grey dark:btn-gray btn-contur text-black/60 dark:text-white/60';
$dots = 'btn size-7 sm:size-10 rounded shrink-0 font-semibold btn-grey dark:btn-gray text-black/60 dark:text-white/60 items-end';
$select = 'btn size-7 sm:size-10 rounded shrink-0 font-semibold btn-primary btn-fill pointer-events-none';
?>
<div class="flex items-center justify-center gap-2 mt-8 sm:gap-4 lg:justify-stretch">
<?
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

	$bFirst = true;

	if ($arResult["NavPageNomer"] > 1):
		if($arResult["bSavePage"]):
			?>
			<a class="<?=$select?>" data-waved="light" draggable="false" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=\lib\Kit::icon('arrow-left', 'icon text-sm')?></a>
			<?
		else:
			if ($arResult["NavPageNomer"] > 2):
				?>
				<a class="<?=$default?>" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=\lib\Kit::icon('arrow-left', 'icon text-sm')?></a>
				<?
			else:
				?>
				<a class="<?=$default?>" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=\lib\Kit::icon('arrow-left', 'icon text-sm')?></a>
				<?
			endif;

		endif;

		if ($arResult["nStartPage"] > 1):
			$bFirst = false;
			if($arResult["bSavePage"]):
				?>
				<a class="<?=$select?>" data-waved="light" draggable="false"  href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
				<?
			else:
				?>
				<a class="<?=$default?>" data-waved="light" draggable="false"  href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
				<?
			endif;
			if ($arResult["nStartPage"] > 2):
				?>
				<a class="<?=$dots?>" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">...</a>
				<?
			endif;
		endif;
	endif;

	do
	{
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
			?>
			<span class="<?=$select?>" data-waved="light" draggable="false" ><?=$arResult["nStartPage"]?></span>
			<?
		elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
			?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=$default?>" data-waved="light" draggable="false" ><?=$arResult["nStartPage"]?></a>
			<?
		else:
			?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
			?> class="<?=$default?><?=($bFirst ? "modern-page-first" : "")?>" data-waved="light" draggable="false" ><?=$arResult["nStartPage"]?></a>
			<?
		endif;
		$arResult["nStartPage"]++;
		$bFirst = false;
	} while($arResult["nStartPage"] <= $arResult["nEndPage"]);

	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
			if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
				?>
				<a class="<?=$dots?>" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>" data-waved="light" draggable="false">...</a>
			<? endif; ?>
			<a class="<?=$default?>" data-waved="light" draggable="false" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
		<? endif; ?>
		<a class="<?=$default?>" data-waved="light" draggable="false" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
			<?=\lib\Kit::icon('arrow-right', 'icon text-sm')?>
		</a>
		<?
	endif;

?>
</div>
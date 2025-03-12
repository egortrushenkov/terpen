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

$static = 'btn rounded-lg sm:rounded-xl size-8 sm:size-10 text-sm sm:text-base shrink-0 font-normal ';
$default = 'btn-white btn-fill text-black opacity-60';
$dots = 'text-black opacity-60 items-end';
$select = 'btn-primary btn-fill pointer-events-none';
?>
<div class="flex items-center justify-center gap-2 mt-8 lg:justify-stretch sm:gap-4 sm:mt-11 lg:mt-14">
<?
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

	$bFirst = true;

	if ($arResult["NavPageNomer"] > 1):
		if($arResult["bSavePage"]):
			?>
			<a class="<?=$static?><?=$select?>" data-waved="light" draggable="false" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
				<? \lib\KitTPL::icon("{id: 'arrow-prev', className: 'icon text-lg sm:text-xl', data: false}") ?>
			</a>
			<?
		else:
			if ($arResult["NavPageNomer"] > 2):
				?>
				<a class="<?=$static?><?=$default?>" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
					<? \lib\KitTPL::icon("{id: 'arrow-prev', className: 'icon text-lg sm:text-xl', data: false}") ?>
				</a>
				<?
			else:
				?>
				<a class="<?=$default?>" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
					<? \lib\KitTPL::icon("{id: 'arrow-prev', className: 'icon text-lg sm:text-xl', data: false}") ?>
				</a>
				<?
			endif;

		endif;

		if ($arResult["nStartPage"] > 1):
			$bFirst = false;
			if($arResult["bSavePage"]):
				?>
				<a class="<?=$static?><?=$select?>" data-waved="light" draggable="false"  href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
				<?
			else:
				?>
				<a class="<?=$static?><?=$default?>" data-waved="light" draggable="false"  href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
				<?
			endif;
			if ($arResult["nStartPage"] > 2):
				?>
				<a class="<?=$static?><?=$dots?>" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">...</a>
				<?
			endif;
		endif;
	endif;

	do
	{
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
			?>
			<span class="<?=$static?><?=$select?>" data-waved="light" draggable="false" ><?=$arResult["nStartPage"]?></span>
			<?
		elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
			?>
			<a class="<?=$static?><?=$default?>" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" data-waved="light" draggable="false" ><?=$arResult["nStartPage"]?></a>
			<?
		else:
			?>
			<a class="<?=$static?><?=$default?><?=($bFirst ? "modern-page-first" : "")?>" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
			?> data-waved="light" draggable="false" ><?=$arResult["nStartPage"]?></a>
			<?
		endif;
		$arResult["nStartPage"]++;
		$bFirst = false;
	} while($arResult["nStartPage"] <= $arResult["nEndPage"]);

	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
			if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
				?>
				<a class="<?=$static?><?=$dots?>" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>" data-waved="light" draggable="false">...</a>
			<? endif; ?>
			<a class="<?=$static?><?=$default?>" data-waved="light" draggable="false" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
		<? endif; ?>
		<a class="<?=$static?><?=$default?>" data-waved="light" draggable="false" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
			<? \lib\KitTPL::icon("{id: 'arrow-next', className: 'icon text-lg sm:text-xl', data: false}") ?>
		</a>
		<?
	endif;

?>
</div>
<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
	/**
	 * id
	 * className
	 * data = NULL
	 * @var array $arParams
	 */
?>

<svg class="<?=$arParams['className']?>" <?= $arParams['data'] ?>>
  <use xlink:href="img/icons.svg#<?= $arParams['id'] ?>"></use>
</svg>
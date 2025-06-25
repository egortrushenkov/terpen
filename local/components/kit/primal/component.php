<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	/** @var array $arParams */


	use Bitrix\Main\Loader;
	use Bitrix\Iblock\Elements\ElementPrimalTable;
	use Bitrix\Iblock\PropertyEnumerationTable;

	Loader::includeModule('iblock');

	$arResult = \Bitrix\Iblock\Elements\ElementPrimalTable::getList([
	    'filter' => [
	        'CODE' => $arParams['CODE'],  //код каталога
	    ],
	    'select' => ['ID', 'IBLOCK_ID', 'NAME', 'CODE', "TITLE"=>'PREVIEW_TEXT', "TEXT"=>'DETAIL_TEXT', 'IMG_BACKGROUND'=>'PREVIEW_PICTURE', 'IMG_PRIMAL'=>'DETAIL_PICTURE',  'BTN_TEXT_1_'=>'BTN_TEXT_1', 'BTN_TEXT_2_'=>'BTN_TEXT_2', 'BTN_URL_2_'=>'BTN_URL_2'],
		"cache" => ["ttl" => 3600],
	])->fetch();

	$res = \CIBlockElement::GetProperty($arResult['IBLOCK_ID'], $arResult['ID'], array("sort" => "asc"), array("CODE" => "LABEL_TEXT"));

	while ($ob = $res->Fetch()) {
	    $arResult['LABEL_TEXT'][] = $ob['VALUE'];
	}



	$this->IncludeComponentTemplate();
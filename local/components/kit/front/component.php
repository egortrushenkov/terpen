<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	/** @var array $arParams */

	\Bitrix\Main\Loader::includeModule('iblock');
	$arResult = array();


	$filter = ['ACTIVE'=>'Y'];
	if(isset($_GET['city'])){
		$filter['IBLOCK_SECTION_ID'] = intval($_GET['city']);
	}

	$res = \Bitrix\Iblock\Elements\ElementOfficeTable::getList([
		'filter' => $filter,
	    'select' => ['ID', 'NAME', 'CODE', 'PREVIEW_PICTURE', 'PHONE', 'EMAIL', 'WORK_TIME', 'WORK_DAYS.ITEM', 'COORDINATES', 'IBLOCK_SECTION_ID'],
		"cache" => ["ttl" => 3600],
	])->fetchCollection();

	$resSec = \Bitrix\Iblock\SectionTable::getList([
		'filter' => ['IBLOCK_ID'=>13, 'GLOBAL_ACTIVE'=>'Y'],
		'select' => ['ID', 'NAME', 'CODE', 'IBLOCK_SECTION_ID', 'DEPTH_LEVEL']
	])->fetchCollection();

	foreach ($resSec as $element) {
		if($element->get('DEPTH_LEVEL') == 1){
			$arResult['REGIONS'][$element->getID()] = [
				"NAME" => $element->get('NAME'),
	            "CODE" => $element->get('CODE'),
				"DEPTH_LEVEL" => $element->get('DEPTH_LEVEL')
			];
		}
		if($element->get('DEPTH_LEVEL') == 2){
			$arResult['CITIES'][$element->getID()] = [
				"NAME" => $element->get('NAME'),
	            "CODE" => $element->get('CODE'),
	            "SECTION" => $element->get('IBLOCK_SECTION_ID'),
				"DEPTH_LEVEL" => $element->get('DEPTH_LEVEL')
			];
		}
	}

	foreach ($res as $element) {
		$arWorkDays = [];

		if($element->get('WORK_DAYS')){
			foreach ($element->getWorkDays()->getAll() as $workDay) {
	            $arWorkDays[$workDay->getItem()->getSort()] = $workDay->getItem()->getValue();
	        }
			ksort($arWorkDays);
		}

		$arResult['ITEMS'][$element->getID()] = [
			"NAME" => $element->get('NAME'),
			"IMAGE" => $element->get('PREVIEW_PICTURE'),
			"CITY" => $arResult['CITIES'][$element->get('IBLOCK_SECTION_ID')]['NAME'],
			"CITYID" => $element->get('IBLOCK_SECTION_ID'),
			"PHONE" => ($element->getPhone())?$element->getPhone()->getValue():'',
			"EMAIL" => ($element->getEmail())?$element->getEmail()->getValue():'',
            "WORK_TIME" => ($element->get('WORK_TIME'))?$element->get('WORK_TIME')->getValue():'',
            "WORK_DAYS" => $arWorkDays,
            "COORDINATES" => ($element->getCoordinates())?$element->getCoordinates()->getValue():'',
		];
		unset($arWorkDays);
	}

//	printr($arResult['ITEMS']);

	$this->IncludeComponentTemplate();
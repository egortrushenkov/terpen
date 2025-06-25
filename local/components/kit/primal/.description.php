<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	$arComponentDescription = array(
		"NAME" => GetMessage("Первый блок"),
		"DESCRIPTION" => GetMessage("Выводим первый блок"),
		"PATH" => array(
			"ID" => "kit_components",
			"CHILD" => array(
				"ID" => "Kit",
				"NAME" => "Kit блок"
			)
		)
	);
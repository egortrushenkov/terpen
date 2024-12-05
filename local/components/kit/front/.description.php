<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	$arComponentDescription = array(
		"NAME" => GetMessage("Компоненты шаблона"),
		"DESCRIPTION" => GetMessage("вставляет различные компоненты"),
		"PATH" => array(
			"ID" => "kit_components",
			"CHILD" => array(
				"ID" => "Kit",
				"NAME" => "KIT Блок"
			)
		)
	);
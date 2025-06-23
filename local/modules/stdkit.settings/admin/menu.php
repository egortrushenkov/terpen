<?

	use Bitrix\Main\Localization\Loc;

	AddEventHandler( "main", "OnBuildGlobalMenu", "kitGlobalMenu" );

	function kitGlobalMenu( &$arGlobalMenu, &$arModuleMenu )
	{
		IncludeModuleLangFile( __FILE__ );
		$moduleName = "stdkit.settings";

		global $APPLICATION;
		$APPLICATION->SetAdditionalCss( "/bitrix/css/" . $moduleName . "/menu.css" );


		if( $APPLICATION->GetGroupRight( $moduleName ) > "D" ) {
			$arMenu = array( "menu_id" => "kit-menu", "items_id" => "menu_references", 'text' => Loc::getMessage( 'KIT_MENU_TITLE' ),//описание из файла локализации
				'title' => Loc::getMessage( 'KIT_MENU_TITLE' ),//название из файла локализации
				"sort" => 10, "items" => array( //Настройки
					array( "text" => Loc::getMessage( 'KIT_SUBMENU_0_TITLE' ), "sort" => 20, "url" => "/bitrix/admin/" . $moduleName . "_index.php?lang=" . LANGUAGE_ID, "items_id" => "MOD_main", ),
					array( "text" => "Политика", "sort" => 20, "url" => "/bitrix/admin/" . $moduleName . "_politic.php?lang=" . LANGUAGE_ID, "items_id" => "MOD_politic", ),
				),
			);
			$arGlobalMenu[] = $arMenu;
		}
	}

<?
	$module_id = 'stdkit.settings';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_before.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_after.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $module_id . '/lib/functions.php';

	use Bitrix\Main\Localization\Loc;
	use Bitrix\Main\HttpApplication;
	use Bitrix\Main\Loader;
	use Bitrix\Main\Config\Option;

	Loc::loadMessages( __FILE__ );
	Loc::loadMessages( $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/options.php" );

	$request = HttpApplication::getInstance()->getContext()->getRequest();

	//Loader::includeModule($module_id);

	$MOD_RIGHT = $APPLICATION->GetGroupRight( $module_id );

	if( $MOD_RIGHT >= "R" ):

		if( $_SERVER["REQUEST_METHOD"] == "POST" && $_POST["stop_site"] == "Y" && check_bitrix_sessid() ) {
			COption::SetOptionString( "main", "site_stopped", "Y" );
			CAdminMessage::ShowNote( GetMessage( "MAIN_OPTION_PUBL_CLOSES" ) );
		}

		if( $_SERVER["REQUEST_METHOD"] == "POST" && $_POST["start_site"] == "Y" && check_bitrix_sessid() ) {
			COption::SetOptionString( "main", "site_stopped", "N" );
			CAdminMessage::ShowNote( GetMessage( "MAIN_OPTION_PUBL_OPENED" ) );
		}


		/*получим список названий полей*/
		$arFields = get_def_fields();


		$aTabs = array(
			array(
				"DIV" => "edit0",
				"TAB" => "Контакты",
				"TITLE" => "Контакты",
				"OPTIONS" => array(
					"Контактные данные",
					array( "main_phone", "Телефон", "", array( "text" ) ),
					array( "email", "Email общий", "", array( "text" ) ),

					/*"Footer",
					array( "footer_slogan", "Текст в подвале", "", array( "text" ) ),*/

					/*"Соцсети/Мессенджеры",
					array( "telegram", "Telegram", "", array( "text" ) ),
					array( "ok", "Odnoklassniki", "", array( "text" ) ),
					array( "vk", "VK", "", array( "text" ) ),
					array( "dzen", "Yandex Dzen", "", array( "text" ) ),
					array( "youtube", "YouTube", "", array( "text" ) ),
					array( "use_uds", "Использовать UDS", "Y", array( "checkbox" ) ),
					array( "uds", "UDS", "", array( "text" ) ),

					"Главная",
					array( "main_video", "Видео на главной", "", array( "text" ) ),*/
				)
			),

		);
		$tabControl = new CAdminTabControl( "tabControl", $aTabs );
		?>

		<!-- Основные табы -->
		<form class="ksp_options"
			  action="<? echo( $APPLICATION->GetCurPage() ); ?>?mid=<? echo( $module_id ); ?>&lang=<? echo( LANG ); ?>"
			  method="post">
			<?= bitrix_sessid_post() ?>
			<? $tabControl->Begin(); ?>

			<!-- КОНТАКТЫ -->
			<? $tabControl->BeginNextTab(); ?>
			<?
				if( $aTabs[0]["OPTIONS"] ) {
					__AdmSettingsDrawList( $module_id, $aTabs[0]["OPTIONS"] );
				}
			?>
			<? $tabControl->EndTab(); ?>

			<!-- Отдел кадров -->
			<?/* $tabControl->BeginNextTab(); ?>
			<?
				if( $aTabs[1]["OPTIONS"] ) {
					__AdmSettingsDrawList( $module_id, $aTabs[1]["OPTIONS"] );
				}
			?>
			<? $tabControl->EndTab(); */?>

			<!-- МАГАЗИН -->
			<? /*->BeginNextTab();?>
			<?
			if($aTabs[2]["OPTIONS"]){
				__AdmSettingsDrawList($module_id, $aTabs[2]["OPTIONS"]);
			}
			?>
		<?$tabControl->EndTab();*/
			?>

			<!-- ДОСТУП ПОЛЬЗОВАТЕЛЕЙ -->
			<? /*$tabControl->BeginNextTab();?>
		Доступ для менеджеров, Админы имеют доступ перманентно
		<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");?>
		<?$tabControl->EndTab();*/
			?>

			<? $tabControl->Buttons( array( 'btnApply' => true, 'btnCancel' => true, 'btnSaveAndAdd' => false ) ); ?>
			<? $tabControl->End(); ?>
		</form>

		<!-- Сохранение -->
		<?
		if( $request->isPost() && check_bitrix_sessid() ) {

			/* Сохранение прав доступа*/
			if( $request["save"] || $request["apply"] ) {
				CMain::DelGroupRight( $module_id );
				$GROUP = $_REQUEST['GROUPS'];
				$RIGHT = $_REQUEST['RIGHTS'];

				foreach( $GROUP as $k => $v ) {
					if( $k == 0 ) {
						COption::SetOptionString( $module_id, 'GROUP_DEFAULT_RIGHT', $RIGHT[0], 'Right for groups by default' );
					} else {
						CMain::SetGroupRight( $module_id, $GROUP[ $k ], $RIGHT[ $k ] );
					}
				}
			}

			/* Сохранение полей */
			foreach( $aTabs as $aTab ) {

				foreach( $aTab["OPTIONS"] as $arOption ) {

					if( !is_array( $arOption ) ) {
						continue;
					}

					if( $arOption["note"] ) {
						continue;
					}

					if( $request["apply"] || $request["save"] ) {
						$optionValue = $request->getPost( $arOption[0] );
						Option::set( $module_id, $arOption[0], is_array( $optionValue ) ? implode( ",", $optionValue ) : $optionValue );
					} elseif( $request["default"] ) {
						Option::set( $module_id, $arOption[0], $arOption[2] );
					}
				}
			}

			LocalRedirect( $APPLICATION->GetCurPage() . "?mid=" . $module_id . "&lang=" . LANG );
		}
		?>

		<?/*
		<!-- Закрыть/открыть публичную часть -->
		<h2><?= GetMessage( "MAIN_SUB2" ) ?></h2>
		<?
		$aTabs = array();
		$aTabs = array( array( "DIV" => "fedit2", "TAB" => GetMessage( "MAIN_TAB_4" ), "ICON" => "main_settings", "TITLE" => GetMessage( "MAIN_OPTION_PUBL" ) ) );
		$tabControl = new CAdminTabControl( "tabControl2", $aTabs, true, true );
		$tabControl->Begin();
		?>
		<form method="POST"
			  action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx( $mid ) ?>&amp;lang=<? echo LANG ?>">
			<?= bitrix_sessid_post() ?>
			<input type="hidden" name="tabControl2_active_tab" value="fedit2">

			<? $tabControl->BeginNextTab(); ?>
			<tr>
				<td colspan="2" align="left">
					<? if( COption::GetOptionString( "main", "site_stopped", "N" ) == "Y" ):?>
						<span style="color:red;"><? echo GetMessage( "MAIN_OPTION_PUBL_CLOSES" ) ?></span>
					<? else:?>
						<span style="color:green;"><? echo GetMessage( "MAIN_OPTION_PUBL_OPENED" ) ?></span>
					<? endif ?>
					<br><br>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="left">
					<? if( COption::GetOptionString( "main", "site_stopped", "N" ) == "Y" ):?>
						<input type="hidden" name="start_site" value="Y">
						<input type="submit" <? if( !$USER->CanDoOperation( 'edit_other_settings' ) )
							echo "disabled" ?> name="start_siteb"
							   value="<? echo GetMessage( "MAIN_OPTION_PUBL_OPEN" ) ?>">
					<? else:?>
						<input type="hidden" name="stop_site" value="Y">
						<input type="submit" <? if( !$USER->CanDoOperation( 'edit_other_settings' ) )
							echo "disabled" ?> name="stop_siteb"
							   value="<? echo GetMessage( "MAIN_OPTION_PUBL_CLOSE" ) ?>">
					<? endif ?>
				</td>
			</tr>

			<? $tabControl->EndTab(); ?>
		</form>
		*/?>


	<?php else: ?>
		<? Loc::getMessage( "KIT_OPTIONS_NO_PERMISSIONS" ) ?>
	<? endif; ?>

<? require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_admin.php'; ?>

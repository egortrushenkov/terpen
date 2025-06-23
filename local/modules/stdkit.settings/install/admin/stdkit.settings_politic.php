<?
	$module_id = 'stdkit.settings';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_before.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_after.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/local/modules/' . $module_id . '/lib/functions.php';

	use Bitrix\Main\Localization\Loc;
	use Bitrix\Main\HttpApplication;
	use Bitrix\Main\Loader;
	use Bitrix\Main\Config\Option;
	use Stdkit\Settings\HtmlEditor;
	use CFileMan;

	Loader::includeModule($module_id);

	Loc::loadMessages(__FILE__);
	Loc::loadMessages($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/options.php");


	$request = HttpApplication::getInstance()->getContext()->getRequest();


	$MOD_RIGHT = $APPLICATION->GetGroupRight($module_id);

	if ($MOD_RIGHT >= "R"):

		/*получим список названий полей*/
		$arFields = get_def_fields();


		// Создаем экземпляры редакторов
		$politicSogEditor = new HtmlEditor(
			$module_id,
			'politic_sog',
			HtmlEditor::getOption($module_id, 'politic_sog'),
			'Соглашение обработки ПД'
		);

		$politicPdEditor = new HtmlEditor(
			$module_id,
			'politic_pd',
			HtmlEditor::getOption($module_id, 'politic_pd'),
			'Политика ПД'
		);

		$aTabs = array(
			array(
				"DIV" => "edit0",
				"TAB" => "Политика",
				"TITLE" => "Политика",
				"OPTIONS" => array(
					array("Политика обработки персональных данных"),
					(new HtmlEditor(
						$module_id,
						'politic_sog',
						HtmlEditor::getOption($module_id, 'politic_sog'),
						'Соглашение обработки ПД'
					))->render(),
					(new HtmlEditor(
						$module_id,
						'politic_pd',
						HtmlEditor::getOption($module_id, 'politic_pd'),
						'Политика ПД'
					))->render(),
				)
			),


		);
		$tabControl = new CAdminTabControl("tabControl", $aTabs);
		?>

		<!-- Основные табы -->
		<form class="ksp_options"
			  action="<? echo($APPLICATION->GetCurPage()); ?>?mid=<? echo($module_id); ?>&lang=<? echo(LANG); ?>"
			  method="post">
			<?= bitrix_sessid_post() ?>
			<? $tabControl->Begin(); ?>

			<!-- Политика -->
			<? $tabControl->BeginNextTab(); ?>
			<?
				if ($aTabs[0]["OPTIONS"]) {
					__AdmSettingsDrawList($module_id, $aTabs[0]["OPTIONS"]);
				}
			?>
			<? $tabControl->EndTab(); ?>


			<? $tabControl->Buttons(array('btnApply' => true, 'btnCancel' => true, 'btnSaveAndAdd' => false)); ?>
			<? $tabControl->End(); ?>
		</form>

		<!-- Сохранение -->
		<?
		if ($request->isPost() && check_bitrix_sessid()) {

			/* Сохранение прав доступа*/
			if ($request["save"] || $request["apply"]) {
				CMain::DelGroupRight($module_id);
				$GROUP = $_REQUEST['GROUPS'];
				$RIGHT = $_REQUEST['RIGHTS'];

				foreach ($GROUP as $k => $v) {
					if ($k == 0) {
						COption::SetOptionString($module_id, 'GROUP_DEFAULT_RIGHT', $RIGHT[0], 'Right for groups by default');
					} else {
						CMain::SetGroupRight($module_id, $GROUP[$k], $RIGHT[$k]);
					}
				}
			}

			/* Сохранение полей */
			foreach ($aTabs as $aTab) {

				foreach ($aTab["OPTIONS"] as $arOption) {

					if (!is_array($arOption)) {
						continue;
					}

					if ($arOption["note"]) {
						continue;
					}

					if ($request["apply"] || $request["save"]) {
						$optionValue = $request->getPost($arOption[0]);
						Option::set($module_id, $arOption[0], is_array($optionValue) ? implode(",", $optionValue) : $optionValue);
					} elseif ($request["default"]) {
						Option::set($module_id, $arOption[0], $arOption[2]);
					}
				}
			}

			LocalRedirect($APPLICATION->GetCurPage() . "?mid=" . $module_id . "&lang=" . LANG);
		}
		?>

	<?php else: ?>
		<? Loc::getMessage("KIT_OPTIONS_NO_PERMISSIONS") ?>
	<? endif; ?>

<? require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_admin.php'; ?>

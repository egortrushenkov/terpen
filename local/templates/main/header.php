<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)die(); ?>

<?
	use lib\Kit;
	//use Bitrix\Main\Config\Option;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="autor" content="//STDKIT">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/favicon.ico" type="image/x-icon">

		<title><?$APPLICATION->ShowTitle();?></title>

		<?$APPLICATION->ShowHead();?>
		<?php
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/style.css");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/application.js");
		//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/script.js");
		?>
	</head>
	<body>
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>

		<?$APPLICATION->IncludeComponent("bitrix:menu","custom",Array(
                "ROOT_MENU_TYPE" => "top",
                "MAX_LEVEL" => "2",
                "CHILD_MENU_TYPE" => "left",
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "N",
                "MENU_CACHE_GET_VARS" => ""
            )
        );?>
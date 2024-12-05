<?php
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Главная страница");
?>

<?//$APPLICATION->IncludeComponent("kit:primal", "", ["CODE"=> $APPLICATION->GetCurPage(false)]);?>

<?
	/*$APPLICATION->IncludeFile("/include/homepage/service_list.php", Array(), Array(
		"MODE" => "php",
		"NAME" => "Редактирование Комплекс услуг",
	));*/
?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

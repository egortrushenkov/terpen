<?
	include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

	CHTTP::SetStatus("404 Not Found");
	@define("ERROR_404", "Y");

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

	$APPLICATION->SetTitle("404 Not Found");
?>

	<!--<section class="container flex flex-col items-center justify-center text-center">
		<div class="flex items-center justify-center gap-4 mb-10">
			<b class="text-9xl sm:text-[12rem] text-grey-dark leading-none dark:text-black">4</b>
			<?php /*=\lib\Kit::picture(SITE_TEMPLATE_PATH.'/img/pictures/404', 'png', 'block w-full max-w-36 sm:max-w-56')*/?>
			<b class="text-9xl sm:text-[12rem] text-grey-dark leading-none dark:text-black">4</b>
		</div>
		<p class="mb-6 font-normal text-sm/normal sm:text-base/normal md:mb-9">
			Возможно, запрашиваемая Вами страница была перенесена или удалена. <br class="hidden md:block">
			Либо Вы допустили небольшую опечатку при вводе адреса.
		</p>
		<a class="btn btn-primary btn-lg btn-fill" data-waved="light" draggable="false" href="/">На главную</a>
	</section>-->

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
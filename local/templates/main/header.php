<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)die(); ?>

<?
	use lib\Kit;
	//use Bitrix\Main\Config\Option;
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta http-equiv="autor" content="//STDKIT">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/svg+xml" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/favicon.svg">
        <link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/apple-touch-icon.png">
        <link rel="manifest" href="<?=SITE_TEMPLATE_PATH?>/img/favicon/site.webmanifest">

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

        <!-- Шапка документа -->

        <header class="container flex items-center justify-between gap-4 sticky top-0 left-0 right-0 z-30 bg-white sm:bg-opacity-0 transition-colors duration-300 py-4 sm:py-6 xl:px-14" data-header>
            <button class="btn btn-primary xl:hidden text-black rounded-md order-2 sm:order-1" data-sidebar-open="menu" data-waved="dark">
                <?php \lib\KitTPL::icon("{id: 'burger', className: 'icon text-3xl', data: null}");?>
            </button>
            <a class="shrink-0 order-1 sm:order-2 w-32 sm:w-40 xxl:w-64" draggable="false" href="">
                <?php \lib\KitTPL::picture("{src: '/img/pictures/logo', format: 'svg', className: 'block w-full', data: null}");?>
            </a>
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
            <a class="btn btn-primary btn-fill btn-lg hidden sm:flex xxl:btn-xxl xxl:text-xl order-4" data-fancybox-form data-waved="light" draggable="false" href="/dialogs/dialog-feedback.html">Связаться с нами</a>
        </header>

        <!-- Меню -->

        <div class="group/menu fixed inset-0 z-40 bg-black/50 transition-[opacity,_visibility] duration-100 [&[data-sidebar=close]]:invisible [&[data-sidebar=close]]:opacity-0" data-sidebar="close" data-sidebar-resize="xl" id="menu">
            <div class="flex flex-col gap-10 bg-grey overflow-auto w-full max-w-[375px] h-full pt-4 pb-10 px-4 transition-[opacity,_visibility,_transform] duration-300 group-[[data-sidebar=close]]/menu:invisible group-[[data-sidebar=close]]/menu:opacity-0 group-[[data-sidebar=close]]/menu:-translate-x-full">
                <div class="flex items-center justify-between gap-4">
                    <a class="w-32" draggable="false" href="">
                        <?php \lib\KitTPL::picture("{src: '/img/pictures/logo', format: 'svg', className: 'block w-full', data: null}");?>
                    </a>
                    <button class="btn btn-primary text-black rounded-full" data-sidebar-close="menu" data-waved="dark">
                        <?php \lib\KitTPL::icon("{id: 'close', className: 'icon text-3xl', data: null}");?>
                    </button>
                </div>
                <?$APPLICATION->IncludeComponent("bitrix:menu","custom-mobile",Array(
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
                <div class="flex mt-auto">
                    <a class="btn btn-primary btn-fill btn-lg w-full" data-fancybox-form data-waved="light" draggable="false" href="/dialogs/dialog-feedback.html">Связаться с нами</a>
                </div>
                <div class="flex items-center gap-7">
                    <a class="btn btn-white rounded-xl" data-waved="light" draggable="false" href="" target="_blank">
                        <?php \lib\KitTPL::picture("{src: '/img/pictures/max', format: 'svg', className: 'icon text-5xl', data: null}");?>
                    </a>
                    <a class="btn btn-white rounded-xl" data-waved="light" draggable="false" href="" target="_blank">
                        <?php \lib\KitTPL::picture("{src: '/img/pictures/whatsapp', format: 'svg', className: 'icon text-5xl', data: null}");?>
                    </a>
                    <a class="btn btn-white rounded-full" data-waved="light" draggable="false" href="" target="_blank">
                        <?php \lib\KitTPL::picture("{src: '/img/pictures/telegram', format: 'svg', className: 'icon text-5xl', data: null}");?>
                    </a>
                </div>
            </div>
        </div>

<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
use lib\Kit;
//use Bitrix\Main\Config\Option;
?>

<section class="container flex items-end relative min-h-[620px] sm:min-h-[750px] xl:min-h-[1000px] xl:px-14">
    <div class="absolute inset-0 bg-white">
        <?php \lib\KitTPL::loader();?>
        <?php \lib\KitTPL::picture("{src: '/img/pictures/test', format: 'jpg', className: 'image', data: null}");?>
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
    </div>
    <div class="relative text-white w-full xl:max-w-7xl">
        <?php \lib\KitTPL::title("{text: 'Система измерения концентрации глюкозы в крови ТЕРПЕН', className: 'mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500', data: 'data-anim'}");?>
        <p class="sm:text-xl lg:text-2xl xl:text-3xl mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500 delay-100" data-anim>
            Надёжный и простой инструмент для ежедневного контроля уровня глюкозы — <br class="hidden xl:block"> дома и в дороге.
        </p>
        <div class="flex flex-col md:flex-row md:items-center gap-4 sm:gap-6 lg:gap-8 anim anim-right duration-500 delay-200" data-anim>
            <a class="btn btn-second btn-fill btn-lg sm:btn-xl sm:text-xl w-full sm:max-w-96" data-fancybox-form data-waved="light" draggable="false" href="../ajax/dialogs/dialog-feedback.php">Заказать устройство</a>
            <a class="btn btn-white btn-contur btn-lg sm:btn-xl sm:text-xl w-full sm:max-w-96" data-waved="light" draggable="false" href="">Полезные статьи</a>
        </div>
    </div>
</section>

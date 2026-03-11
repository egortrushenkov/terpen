<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
use lib\Kit;
//use Bitrix\Main\Config\Option;
?>

<section class="container overflow-hidden pt-0 xl:px-14">
    <div class="flex flex-col xl:flex-row xl:justify-between gap-8 sm:gap-12 lg:gap-16">
        <div class="xl:shrink-0 order-2 xl:order-1 w-full md:max-w-[730px] anim anim-right duration-500" data-anim>
            <div class="pack pack-xl bg-white rounded-3xl">
                <?php \lib\KitTPL::loader();?>
                <?php \lib\KitTPL::picture("{src: '/img/pictures/test', format: 'jpg', className: 'image', data: null}");?>
                <div class="flex items-end justify-end absolute inset-0 rounded-inherit p-4 sm:p-6 lg:p-8">
                    <a class="btn btn-second btn-fill btn-lg sm:btn-xl sm:text-xl" data-fancybox-form data-waved="light" draggable="false" href="../ajax/dialogs/dialog-feedback.php">Заказать устройство</a>
                </div>
            </div>
        </div>
        <div class="order-1 xl:order-2 w-full xl:max-w-[1000px] xl:pt-11">
            <?php \lib\KitTPL::subtitle("{text: 'Точность и безопасность', className: 'uppercase text-primary mb-6 anim anim-left duration-500', data: 'data-anim'}");?>
            <div class="sm:text-xl lg:text-2xl mb-6 sm:mb-9 lg:mb-12 anim anim-left duration-500" data-anim>
                <p>
                    Точность измерений — ключевой параметр любой системы контроля глюкозы.
                </p>
                <p>
                    Глюкометр ТЕРПЕН проходит контроль качества и соответствует установленным нормативным требованиям.
                </p>
                <br>
                <p>
                    Устройство предназначено для помощи в самоконтроле и не заменяет консультацию врача.
                </p>
            </div>
            <?php \lib\KitTPL::subtitle("{text: 'Кому подходит?', className: 'uppercase text-second mb-6 anim anim-left duration-500', data: 'data-anim'}");?>
            <ul class="flex flex-col gap-3 sm:text-xl lg:text-2xl anim anim-left duration-500" data-anim>
                <li>
                    – Людям с сахарным диабетом 1 и 2 типа
                </li>
                <li>
                    – Людям с нарушением толерантности к глюкозе
                </li>
                <li>
                    – Тем, кто контролирует уровень сахара по рекомендации врача
                </li>
                <li>
                    – Пожилым пользователям
                </li>
                <li>
                    – Родителям детей с диабетом
                </li>
            </ul>
        </div>
    </div>
</section>
<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
use lib\Kit;
//use Bitrix\Main\Config\Option;
?>

<section class="container overflow-hidden pt-0 xl:px-14">
    <div class="flex flex-col xl:flex-row xl:justify-between gap-8">
        <div class="grow xl:pt-16">
            <div class="font-alt font-bold text-3xl sm:text-4xl lg:text-5xl mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500" data-anim>#03</div>
            <?php \lib\KitTPL::subtitle("{text: 'Про <span class=text-primary>компанию</span>', className: 'uppercase mb-6 anim anim-right duration-500', data: 'data-anim'}");?>
            <div class="sm:text-xl lg:text-2xl mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500" data-anim>
                <p>
                    Описание компании, ценности, история. Почему мы решили производить прибор и в чем наше преимущества. Тут нужна информация про заботу о клиенте, о том, что мы хотим, чтобы люди, которые столкнулись с диабетом, могли позволить себе жить комфортно и получить устройство, которое им поможет в получении точных измерениях, ведь от этого сильно зависит их здоровье.
                </p>
                <br>
                <p>
                    Описание компании, ценности, история. Почему мы решили производить прибор и в чем наше преимущества. Тут нужна информация про заботу о клиенте, о том, что мы хотим, чтобы люди, которые столкнулись с диабетом, могли позволить себе жить комфортно и получить устройство, которое им поможет в получении точных измерениях, ведь от этого сильно зависит их здоровье.
                </p>
            </div>
            <div class="flex anim anim-right duration-500" data-anim>
                <a class="btn btn-second btn-fill btn-lg sm:btn-xl sm:text-xl" data-fancybox-form data-waved="light" draggable="false" href="/dialogs/dialog-feedback.html">Заказать устройство</a>
            </div>
        </div>
        <div class="xl:shrink-0 w-full md:max-w-[730px] anim anim-left duration-500" data-anim>
            <div class="pack pack-xl bg-white rounded-3xl">
                <?php \lib\KitTPL::loader();?>
                <?php \lib\KitTPL::picture("{src: '/img/pictures/test', format: 'jpg', className: 'image', data: null}");?>
            </div>
        </div>
    </div>
</section>
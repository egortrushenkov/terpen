<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
    use lib\Kit;
    //use Bitrix\Main\Config\Option;
?>

<section class="container overflow-hidden pt-0 xl:px-14">
    <div class="flex flex-col xl:flex-row xl:justify-between gap-8 sm:gap-12 lg:gap-16">
        <div class="w-full xl:max-w-[1000px] xl:pt-11">
            <?php \lib\KitTPL::subtitle("{text: 'ТЕРПЕН — это система измерения концентрации глюкозы в крови, разработанная для регулярного самоконтроля.', className: 'text-primary mb-6 anim anim-right duration-500', data: 'data-anim'}");?>
            <div class="sm:text-xl lg:text-2xl mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500" data-anim>
                <p>
                    Устройство предназначено для использования в домашних условиях и помогает принимать решения на основе точных и своевременных данных.
                </p>
                <p>
                    Система соответствует требованиям ТУ 26.60.12-001-59693346-2023 и разработана
                </p>
                <p>
                    с учётом потребностей людей, которым важно контролировать уровень глюкозы каждый день.
                </p>
            </div>
            <?php \lib\KitTPL::subtitle("{text: 'Как работает?', className: 'uppercase text-second mb-6 anim anim-right duration-500', data: 'data-anim'}");?>
            <ul class="flex flex-col gap-3 sm:text-xl lg:text-2xl mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500" data-anim>
                <li>
                    – Подготовьте глюкометр и тест-полоску
                </li>
                <li>
                    – Получите каплю крови с помощью ланцета
                </li>
                <li>
                    – Получите результат через несколько секунд
                </li>
            </ul>
            <div class="flex anim anim-right duration-500" data-anim>
                <a class="btn btn-dark btn-contur btn-lg sm:btn-xxl sm:text-xl" data-fancybox data-waved="dark" draggable="false" href="">
                    Смотреть подробное видео
                    <div class="flex items-center justify-center bg-current rounded-md shrink-0 size-7 sm:size-11 ml-2 sm:ml-4">
                        <?php \lib\KitTPL::icon("{id: 'arrow-right', className: 'icon text-white text-2xl sm:text-3xl', data: null}");?>
                    </div>
                </a>
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
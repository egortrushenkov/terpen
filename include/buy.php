<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
use lib\Kit;
//use Bitrix\Main\Config\Option;
?>

<section class="container py-0 xl:px-14" data-filtering="location" id="location">
    <?php \lib\KitTPL::subtitle("{text: 'Где приобрести глюкометр ТЕРПЕН?', className: 'uppercase text-primary mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500', data: 'data-anim'}");?>
    <div class="grid grid-cols-2 gap-4 sm:gap-6 lg:gap-8 w-full md:max-w-xl">
        <? foreach(['На карте', 'Списком'] as $key => $item ): ?>
            <a class="btn btn-dark btn-contur btn-lg sm:btn-xl sm:text-xl sm:rounded-full rounded-full [&.filtering-active]:bg-dark [&.filtering-active]:text-white [&.filtering-active]:pointer-events-none" data-filtering-category="location" data-filtering-value="<?= $key ?>" data-scroll data-waved="light" draggable="false" href="#location"><?= $item ?></a>
        <? endforeach; ?>
    </div>
    <div class="mt-6 sm:mt-9 lg:mt-12">
        <div data-filtering-card="location" data-filtering-value="0">
            <div class="relative overflow-hidden bg-white rounded-2xl sm:rounded-3xl h-96 sm:h-[520px]">
                <?php \lib\KitTPL::loader();?>
                <div class="absolute inset-0" data-location data-src="<?=SITE_TEMPLATE_PATH?>/img/pictures/point.svg"></div>
            </div>
        </div>
        <div data-filtering-card="location" data-filtering-value="1">
            <ul class="flex flex-col gap-2 sm:gap-4 text-sm sm:text-lg lg:text-xl">

                <li class="flex items-center bg-white rounded-2xl py-4 px-4 sm:px-6">
                    <div class="flex items-center justify-center rounded-full shrink-0 border border-solid border-primary size-4 mr-2 sm:mr-4">
                        <span class="bg-primary rounded-full size-2"></span>
                    </div>
                    <address>
                        350089, г.Краснодар, ул. Рождественская набережная 45/1
                    </address>
                </li>

            </ul>
        </div>
    </div>
</section>
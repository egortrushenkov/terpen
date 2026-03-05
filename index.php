<?php
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Главная страница");
?>

<?
use lib\Kit;
//use Bitrix\Main\Config\Option;
?>

<!--Надёжный и простой инструмент-->
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
            <a class="btn btn-second btn-fill btn-lg sm:btn-xl sm:text-xl w-full sm:max-w-96" data-fancybox-form data-waved="light" draggable="false" href="/dialogs/dialog-feedback.html">Заказать устройство</a>
            <a class="btn btn-white btn-contur btn-lg sm:btn-xl sm:text-xl w-full sm:max-w-96" data-waved="light" draggable="false" href="">Полезные статьи</a>
        </div>
    </div>
</section>

<!-- Навигация -->

<?$APPLICATION->IncludeComponent("bitrix:news.list", "menu-block", Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
        "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
        "AJAX_MODE" => "N",	// Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
        "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
        "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
        "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
        "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
        "CACHE_GROUPS" => "Y",	// Учитывать права доступа
        "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
        "CACHE_TYPE" => "A",	// Тип кеширования
        "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
        "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
        "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
        "DISPLAY_DATE" => "Y",	// Выводить дату элемента
        "DISPLAY_NAME" => "Y",	// Выводить название элемента
        "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
        "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
        "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
        "FIELD_CODE" => array(	// Поля
                0 => "",
                1 => "",
        ),
        "FILTER_NAME" => "",	// Фильтр
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
        "IBLOCK_ID" => "1",	// Код информационного блока
        "IBLOCK_TYPE" => "Content",	// Тип информационного блока (используется только для проверки)
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
        "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
        "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
        "NEWS_COUNT" => "20",	// Количество новостей на странице
        "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
        "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
        "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
        "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
        "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
        "PAGER_TITLE" => "Новости",	// Название категорий
        "PARENT_SECTION" => "",	// ID раздела
        "PARENT_SECTION_CODE" => "",	// Код раздела
        "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
        "PROPERTY_CODE" => array(	// Свойства
                0 => "",
                1 => "",
        ),
        "SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
        "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
        "SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
        "SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
        "SET_STATUS_404" => "N",	// Устанавливать статус 404
        "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
        "SHOW_404" => "N",	// Показ специальной страницы
        "SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
        "SORT_BY2" => "ACTIVE_FROM",	// Поле для второй сортировки новостей
        "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
        "SORT_ORDER2" => "DESC",	// Направление для второй сортировки новостей
        "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
),
        false
);?>

<!-- Про производство -->
<?
$APPLICATION->IncludeFile("/include/production.php", Array(), Array(
        "MODE" => "php",
        "NAME" => "Редактирование Форма бронирования",
));
?>

<!-- Устройство -->


<!-- Про компанию -->

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

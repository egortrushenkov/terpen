<? if( !defined( 'B_PROLOG_INCLUDED' ) || B_PROLOG_INCLUDED !== true )die(); ?>

<?
	use lib\Kit;
	//use Bitrix\Main\Config\Option;
?>



<!-- Подвал -->

<footer class="container bg-dark text-white md:py-16 xl:px-14 mt-auto">
    <div class="flex flex-col sm:flex-row sm:flex-wrap sm:justify-between gap-8 mb-10 sm:mb-16 lg:mb-20 xl:mb-28">
        <div>
            <h4 class="font-normal uppercase text-xl sm:text-2xl mb-4 sm:mb-6">
                Контакты:
            </h4>
            <ul class="flex flex-col gap-2 sm:gap-4 sm:text-xl lg:text-2xl">
                <li>
                    Горячая линия: <a class="underline-offset-4 hover:underline" draggable="false" href="tel: 8 800 323 40 23">8 800 323 40 23</a>
                </li>
                <li>
                    Почта: <a class="underline-offset-4 hover:underline" draggable="false" href="mailto: support.terpen@mail.ru">support.terpen@mail.ru</a>
                </li>
            </ul>
        </div>
        <div>
            <h4 class="font-normal uppercase text-xl sm:text-2xl mb-4 sm:mb-6">
                Продукция:
            </h4>
            <nav class="flex flex-col items-start gap-2 sm:gap-4 sm:text-xl lg:text-2xl">
                <a class="opacity-45 transition-opacity hover:opacity-100" draggable="false" href="">Главная</a>
            </nav>
        </div>
        <div>
            <h4 class="font-normal uppercase text-xl sm:text-2xl mb-4 sm:mb-6">
                Информация:
            </h4>
            <nav class="flex flex-col items-start gap-2 sm:gap-4 sm:text-xl lg:text-2xl">
                <a class="opacity-45 transition-opacity hover:opacity-100" draggable="false" href="">Документы</a>
                <a class="opacity-45 transition-opacity hover:opacity-100" draggable="false" href="">Сертификация</a>
                <a class="opacity-45 transition-opacity hover:opacity-100" draggable="false" href="" target="_blank">Политика конфиденциальности</a>
                <a class="opacity-45 transition-opacity hover:opacity-100" data-fancybox-dialog draggable="false" href="/dialogs/dialog-politics.html">Обработку персональных данных</a>
            </nav>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between gap-8">
        <a class="shrink-0 w-full max-w-52 sm:max-w-72 lg:max-w-md" draggable="false" href="">
            <?php \lib\KitTPL::picture("{src: '/img/pictures/logo-white', format: 'svg', className: 'block w-full', data: null}");?>
        </a>
        <div class="flex items-center gap-4 sm:gap-7 lg:gap-10">
            <a class="btn btn-white rounded-xl" data-waved="light" draggable="false" href="" target="_blank">
                <?php \lib\KitTPL::picture("{src: '/img/pictures/max', format: 'svg', className: 'icon text-4xl sm:text-5xl lg:text-6xl', data: null}");?>
            </a>
            <a class="btn btn-white rounded-xl" data-waved="light" draggable="false" href="" target="_blank">
                <?php \lib\KitTPL::picture("{src: '/img/pictures/whatsapp', format: 'svg', className: 'icon text-4xl sm:text-5xl lg:text-6xl', data: null}");?>
            </a>
            <a class="btn btn-white rounded-full" data-waved="light" draggable="false" href="" target="_blank">
                <?php \lib\KitTPL::picture("{src: '/img/pictures/telegram', format: 'svg', className: 'icon text-4xl sm:text-5xl lg:text-6xl', data: null}");?>
            </a>
        </div>
    </div>
</footer>

<!-- Куки -->
<?php if ($_COOKIE['cookie_cookie_active'] != 1): ?>
<section class="container fixed bottom-4 lg:bottom-10 left-0 right-0 z-20 py-0" data-cookie data-expires="7" id="cookie">
    <div class="card shadow-md">
        <div class="card-content items-start p-4 sm:p-6">
            <p class="text-xs sm:text-sm mb-4">
                Этот веб-сайт использует файлы cookie, чтобы обеспечить удобную работу пользователей с ним и функциональные возможности сайта. Продолжая использовать этот сайт, Вы соглашаетесь с использованием файлов cookie
            </p>
            <button class="btn btn-primary btn-fill btn-md sm:btn-lg text-sm sm:text-base" data-cookie-button data-waved="light">Согласен</button>
        </div>
    </div>
</section>
<?php endif;?>

</main>

</body>

</html>

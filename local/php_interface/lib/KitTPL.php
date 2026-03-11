<?php

namespace lib;

use lib\Kit;
use Bitrix\Main\Config\Option;

class KitTPL
{
    public static function __callStatic($method, $args)
    {
        // Проверяем, существует ли приватный метод с префиксом "_"
        $privateMethod = "_" . $method;
        if (method_exists(__CLASS__, $privateMethod)) {
            // Автоматически конвертируем первый аргумент, если он строка
            if (isset($args[0]) && is_string($args[0])) {
                $args[0] = self::parseStringToObject($args[0]);
            }
            return call_user_func_array([__CLASS__, $privateMethod], $args);
        } else {
            throw new \BadMethodCallException("Метод {$method} не найден в " . __CLASS__);
        }
    }

    public static function _primal($json) {
        ?>
        <section class="container md:pt-16 xl:px-14">
            <?php \lib\KitTPL::title("{text: '".$json['text']."', className: 'uppercase break-words mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500', data: 'data-anim'}");?>
            <div class="pack pack-xl sm:pack-md lg:pack-xs xl:pack-[35] bg-white rounded-3xl mb-6 sm:mb-8 lg:mb-10">
                <?php \lib\KitTPL::loader();?>
                <?php \lib\KitTPL::picture("{src: '/img/pictures/test', format: 'jpg', className: 'image rounded-inherit', data: null}");?>
                <div class="flex items-end absolute inset-0 rounded-inherit p-4 sm:p-7 lg:p-10">
                    <div class="grid md:grid-cols-2 gap-2 md:gap-5 lg:gap-8 w-full xl:max-w-4xl anim anim-up duration-500" data-anim>
                        <?  foreach(['С заботой о вас', 'О вашем здоровье'] as $item ): ?>
                            <div class="flex items-center justify-center bg-white/20 backdrop-blur-2xl rounded-full border border-solid border-white h-12 md:h-16 px-4">
                                <span class="uppercase text-white text-center md:text-xl"><?= $item ?></span>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-2 md:gap-5 lg:gap-8 w-full xl:max-w-4xl xl:ml-auto anim anim-up duration-500" data-anim>
                <a class="btn btn-dark btn-fill btn-lg sm:btn-xl uppercase sm:text-xl" data-fancybox-form data-waved="light" draggable="false" href="/dialogs/dialog-feedback.html">
                    Заказать устройство
                    <?php \lib\KitTPL::icon("{id: 'arrow-right', className: 'icon text-3xl sm:text-4xl -rotate-45 ml-2', data: null}");?>
                </a>
                <a class="btn btn-dark btn-contur btn-lg sm:btn-xl uppercase sm:text-xl" data-waved="dark" draggable="false" href="">
                    Читать статьи
                    <?php \lib\KitTPL::icon("{id: 'arrow-right', className: 'icon text-3xl sm:text-4xl -rotate-45 ml-2', data: null}");?>
                </a>
            </div>
        </section>
        <?php
    }

    public static function _subtitle($json) {
        ?>
            <h2 class="font-alt font-bold text-xl sm:text-2xl lg:text-3xl <?= $json['className'] ?>" <?= $json['data'] ?>> <?= $json['text'] ?></h2>
        <?php
    }

    public static function _icon($json)
    {
        ?>
            <svg class="<?= $json['className'] ?>" <?= $json['data'] ?>>
                <use href="<?=SITE_TEMPLATE_PATH?>/img/icons.svg#<?= $json['id'] ?>"></use>
            </svg>
        <?php
    }

	public static function parseStringToObject($input)
    {
        // Приводим строку к валидному JSON
        $json = preg_replace_callback('/(\w+):\s*(\'[^\']*\'|[^\s,}]+)/', function ($matches) {
            $key = $matches[1];
            $value = trim($matches[2]);

            // Убираем одинарные кавычки, если это строка
            if ($value[0] === "'" && $value[strlen($value) - 1] === "'") {
                $value = '"' . substr($value, 1, -1) . '"';
            } elseif (!in_array($value, ['null', 'true', 'false']) && !is_numeric($value)) {
                // Если это не ключевые слова или число, то оборачиваем в кавычки
                $value = '"' . addslashes($value) . '"';
            }

            return '"' . $key . '":' . $value;
        }, $input);

        $json = str_replace("'", '"', $json);
        $data = json_decode($json, true);

        if ($data === null) {
            throw new \Exception("Ошибка парсинга JSON: " . json_last_error_msg());
        }

        return $data;
    }

     

	private static function _loader(){
		?>
		<div class="loader">
			<span class="loader-progress">
				<?self::_icon(self::parseStringToObject("{id: 'loader', className: 'loader-icon icon', data: null}"));?>
			</span>
		</div>
		<?php
	}

    private static function _title($json) {
        ?>
        <h1 class="font-alt font-bold text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-title [&>span]:inline-block [&>span]:rounded-full [&>span]:border sm:[&>span]:border-2 lg:[&>span]:border-4 [&>span]:border-solid [&>span]:border-primary [&>span]:p-2 sm:[&>span]:p-4 lg:[&>span]:p-6 <?= $json['className'] ?>" <?= $json['data'] ?>> <?= $json['text'] ?> </h1>
        <?php
    }

	private static function _picture($json){
		$src = $json['src'];
		$format=$json['format']?:'url';
		if($format != 'url') $src = SITE_TEMPLATE_PATH."/".$src;
		$className=$json['className']?:"";
		$data = $json['data']?:false;
		$alt = $json['alt'] ?? "";
		$block_webp = $json['block_webp'] ?? "";

		switch ($format){
			case 'jpg':
				$loading = 'lazy';
				break;
			case 'png':
				$loading = 'eager';
				break;
			default:
				$loading = false;
				break;
		}

		// Генерация webp для локальных картинок в режиме url
		$webpSrc = false;
		if ($format === 'url' && $src !== '' && str_starts_with($src, '/')) {
			if (function_exists('makeWebp')) {
				$generated = makeWebp($src);
				if ($generated) {
					$webpSrc = $generated;
				}
			}
		}
		?>
		<picture>
			<? if ($src !== '' && ($format === 'jpg' || $format === 'png')) { ?>
				<source srcset="<?=$src?>.webp" type="image/webp">
			<? } elseif ($format === 'url' && $webpSrc && !$block_webp) { ?>
				<source srcset="<?= $webpSrc ?>" type="image/webp">
			<? } ?>
			<img class="<?= $className ?>" <?= $data ? $data : '' ?> draggable="false" <?if($loading){?>loading="<?= $loading ?>"<?}?> src="<?= $format !== 'url' ? $src.".".$format : $src ?>" alt="<?= htmlspecialchars($alt, ENT_QUOTES) ?>">
		</picture>
		<?php
	}

    private static function _error($json) {
        ?>
        <span class="flex items-center absolute -bottom-4 left-0 right-0 text-second text-xs opacity-0 invisible transition-opacity h-4" data-error><?= $json['text'] ?></span>
        <?php
    }

    private static function _map()
    {
        ?>
        <section class="relative overflow-hidden bg-white h-96">
            <?php \lib\KitTPL::loader();?>
            <div class="absolute inset-0" data-yandex-map="45.03191007458623,38.921171499999936" data-src="<?=SITE_TEMPLATE_PATH?>/img/pictures/point.svg"></div>
        </section>
        <?php
    }

    private static function _feedback() {
        ?>
        <section class="container overflow-hidden pt-0 xl:px-14">
            <?php \lib\KitTPL::subtitle("{text: 'Остались вопросы?', className: 'uppercase mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500', data: 'data-anim'}");?>
            <div class="flex flex-col xl:flex-row xl:items-end xl:justify-between gap-8">
                <form class="w-full xl:max-w-5xl anim anim-right duration-500" data-form="submit" data-anim>
                    <input type="hidden" value="Тема" name="theme">
                    <div class="flex flex-col gap-5 mb-7 sm:mb-10">
                        <label data-label>
                            <div class="relative">
                                <input class="input input-dark input-lg sm:input-xxl bg-transparent sm:text-xl rounded-none border-t-0 border-x-0 focus:shadow-none px-0" data-input="name" type="text" placeholder="Имя" name="name">
                                <?php \lib\KitTPL::error("{text: 'Введите ваше имя'}");?>
                            </div>
                        </label>
                        <label data-label>
                            <div class="relative">
                                <input class="input input-dark input-lg sm:input-xxl bg-transparent sm:text-xl rounded-none border-t-0 border-x-0 focus:shadow-none px-0" data-input="tel" type="tel" placeholder="Номер телефона" name="tel">
                                <?php \lib\KitTPL::error("{text: 'Введите ваш номер'}");?>
                            </div>
                        </label>
                        <label data-label>
                            <div class="relative">
                                <input class="input input-dark input-lg sm:input-xxl bg-transparent sm:text-xl rounded-none border-t-0 border-x-0 focus:shadow-none px-0" data-input="email" type="text" placeholder="Почта" name="email">
                                <?php \lib\KitTPL::error("{text: 'Введите корректный адрес'}");?>
                            </div>
                        </label>
                        <label data-label>
                            <div class="relative">
                                <textarea class="input input-dark input-lg bg-transparent sm:text-xl rounded-none border-t-0 border-x-0 focus:shadow-none px-0 h-20" data-input="text" placeholder="Ваш вопрос" name="text"></textarea>
                                <?php \lib\KitTPL::error("{text: 'Заполните это поле'}");?>
                            </div>
                        </label>
                    </div>
                    <button class="btn btn-dark btn-fill btn-lg sm:btn-xl sm:text-xl w-full lg:max-w-xl" data-waved="light" type="submit">Отправить анкету</button>
                    <div class="flex sm:items-center mt-5">
                        <input class="switch switch-checkbox mr-2" data-toggle-submit type="checkbox">
                        <p class="text-xs opacity-60">
                            Согласие на <a class="underline underline-offset-4" data-fancybox-dialog draggable="false" href="/dialogs/dialog-politics.html">обработку персональных данных</a> на условиях <a class="underline underline-offset-4" draggable="false" href="" target="_blank">политики конфиденциальности</a>
                        </p>
                    </div>
                </form>
                <div class="flex flex-col gap-5 w-full xl:max-w-xl anim anim-left duration-500" data-anim>
                    <a class="btn btn-dark btn-contur btn-lg sm:btn-xl justify-start text-left sm:text-xl rounded-none sm:rounded-none border-t-0 border-x-0 px-0 sm:px-0" data-waved="dark" draggable="false" href="<?=Option::get("stdkit.settings", "max");?>" target="_blank">MAX</a>
                    <a class="btn btn-dark btn-contur btn-lg sm:btn-xl justify-start text-left sm:text-xl rounded-none sm:rounded-none border-t-0 border-x-0 px-0 sm:px-0" data-waved="dark" draggable="false" href="<?=Option::get("stdkit.settings", "whatsapp");?>" target="_blank">WhatsApp</a>
                    <a class="btn btn-dark btn-contur btn-lg sm:btn-xl justify-start text-left sm:text-xl rounded-none sm:rounded-none border-t-0 border-x-0 px-0 sm:px-0" data-waved="dark" draggable="false" href="<?=Option::get("stdkit.settings", "telegram");?>" target="_blank">Telegram</a>
                </div>
            </div>
        </section>
        <?php
    }

	private static function _preloader(){
		?>
        <div class="w-64 animate-pulse">
            <?php \lib\KitTPL::picture("{src: '/img/pictures/logo', format: 'svg', className: 'block w-full', data: null}");?>
        </div>
        <?php
	}

	private static function _swiperButtonPrev($json){
		?>
		<button
			class="absolute hidden rounded-full shadow-md size-14 swiper-button-prev btn btn-white btn-fill lg:flex -left-8 xl:-left-12"
			data-slider-prev="<?= $json['value'] ?>" data-waved="dark">
			<?self::_icon(self::parseStringToObject("{id: 'arrow-left', className: 'text-2xl text-black', data: null}"));?>
		</button>
		<?php
	}
	private static function _swiperButtonNext($json){
		?>
		<button
			class="absolute hidden rounded-full shadow-md size-14 swiper-button-next btn btn-white btn-fill lg:flex -right-8 xl:-right-12"
			data-slider-next="<?= $json['value'] ?>" data-waved="dark">
			<?self::_icon(self::parseStringToObject("{id: 'arrow-right', className: 'text-2xl text-black', data: null}"));?>
		</button>
		<?php
	}



}

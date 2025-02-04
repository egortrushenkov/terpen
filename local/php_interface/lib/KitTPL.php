<?php

namespace lib;

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

    private static function _icon($json)
    {
        ?>
        <svg class="<?= $json['className'] ?>" <?= $json['data'] ?>>
            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/icons.svg#<?= $json['id'] ?>"></use>
        </svg>
        <?php
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

	private static function _title($json){
		?>
		<h2 class="font-bold uppercase text-2.5xl sm:text-4xl lg:text-title <?= $json['className'] ?>" <?= $json['data'] ?>><?= $json['text'] ?></h2>
		<?php
	}

	private static function _picture($json){
		$src = $json['src'];
		$format=$json['format']?:'url';
		$className=$json['className']?:"image";
		$data = $json['data']?:false;
		switch ($format){
			case 'jpg':
				$loading = 'lazy';
				break;
			case 'png':
				$loading = 'eager';
				break;
			default:
				$loading = 'auto';
				break;
		}
		?>
		<picture>
			<? if ($src !== '' && ($format === 'jpg' || $format === 'png')) { ?>
				<source srcset="<?=$src?>.webp" type="image/webp">
			<?}?>
			<img class="<?= $className ?>" <?= $data ? $data : '' ?> draggable="false" loading="<?= $loading ?>" src="<?= $format !== 'url' ? $src.".".$format : $src ?>" alt="">
		</picture>
		<?php
	}

	private static function _preloader(){
		?><div class="preloader"></div><?php
	}

	private static function _fish(){
		?><div class="absolute inset-0 pointer-events-none" data-fish-wrapper></div><?php
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

	private static function _tabs($json) {
		?>
		<div class="sticky z-10 top-[73px] md:top-[102px]" data-filtering-tabs data-slider="tabs">
			<div class="px-4 -mx-4 swiper sm:mx-0 sm:px-0" data-slider-swiper="tabs">
				<div class="swiper-wrapper">
					<? for ($i = 0; $i < 5; $i++) {
						?>
						<div class="swiper-slide">
							<a class="text-black btn btn-akva btn-fill btn-xl btn-light sm:btn-xxl font-normal text-lg sm:text-1.5xl px-2 active:transform-none [&.filtering-category]:text-white [&.filtering-category]:font-semibold [&.filtering-category]:btn-second [&.filtering-category]:btn-gradient [&.filtering-category]:pointer-events-none"
							   data-filtering-category="tabs" data-filtering-value="<?=$i?>" data-scroll data-waved="dark"
							   draggable="false" href="#tabs">
								2<?=$i?> октября
							</a>
						</div>

						<?
					}?>
				</div>
			</div>
			<?self::_swiperButtonPrev(self::parseStringToObject("{value: 'tabs'}"));?>
			<?self::_swiperButtonNext(self::parseStringToObject("{value: 'tabs'}"));?>
		</div>
		<?php
	}

	private static function _materials($json)
	{
		?>
		<div class="mt-10">
			<? for ($i = 0; $i < 5; $i++) {
				?>
					<div data-filtering-card="tabs" data-filtering-value="<?=$i?>">
						<? if ($json['status']) { ?>
						<h3 class="font-bold mb-8 text-2.5xl sm:text-4xl lg:text-title text-primary">
							2<?=$i?> октября (День <?=$i?>)
						</h3>
						<? } ?>
						<div class="flex flex-col gap-2 sm:gap-4">
							<% for (var j = 0; j < 3; j++) { %>
							<div class="border border-solid shadow-md border-grey card" id="copy-<?=$i?>-<%= j %>">
								<div class="px-4 py-6 sm:px-6 lg:px-8 sm:py-8 card-content">
									<div class="flex flex-wrap items-center gap-2 sm:gap-4">
										<div
											class="flex items-center justify-center px-6 border border-solid rounded-full h-9 sm:h-10 sm:px-8 border-primary/30 shrink-0">
											<span class="text-sm font-semibold sm:text-base text-primary">12:30 - 14:50</span>
										</div>
										<div
											class="flex items-center justify-center px-4 border border-solid rounded-full h-9 sm:h-10 sm:px-6 border-grey shrink-0">
											<span class="text-sm sm:text-base">Конференц-зал</span>
										</div>
										<div
											class="flex items-center justify-center rounded-full size-9 sm:size-10 shrink-0 bg-aqua/15">
											<?self::_icon(self::parseStringToObject("{id: 'star', className: 'icon text-aqua text-1.5xl sm:text-2xl', data: null}"));?>
										</div>
										<div
											class="flex items-center justify-center border border-solid rounded-full size-9 sm:size-10 shrink-0 border-grey">
											<?self::_icon(self::parseStringToObject("{id: 'headphones', className: 'icon text-1.5xl sm:text-2xl', data: null}"));?>
										</div>
										<div class="relative w-9 sm:w-10 shrink-0"
											 data-copy="http://localhost:9000/index.html#copy-<?=$i?>-<%= j %>">
											<button class="text-black rounded-full btn btn-grey btn-contur size-10"
													data-copy-button data-waved="dark">
												<?self::_icon(self::parseStringToObject("{id: 'link', className: 'icon text-1.5xl sm:text-2xl', data: null}"));?>
											</button>
											<span
												class="absolute invisible text-xs duration-300 -translate-x-1/2 opacity-0 pointer-events-none left-1/2 top-full text-aqua"
												data-copy-result>Скопировано!</span>
										</div>
										<div
											class="flex items-center justify-between pl-1 pr-6 text-sm border border-solid rounded-full h-9 sm:h-10 shrink-0 border-grey sm:text-base">
											<div
												class="flex items-center justify-center mr-3 rounded-full size-7 sm:size-8 shrink-0 bg-aqua">
												<?self::_icon(self::parseStringToObject("{id: 'online', className: 'icon text-white text-1.5xl sm:text-2xl', data: null}"));?>
											</div>
											Online
										</div>
										<a class="pl-1 pr-6 text-sm font-normal text-black rounded-full btn btn-aqua h-9 sm:h-10 shrink-0 bg-aqua/15 sm:text-base"
										   data-waved="dark" draggable="false" href="">
											<div
												class="flex items-center justify-center mr-3 rounded-full size-7 sm:size-8 shrink-0 bg-aqua">
												<?self::_icon(self::parseStringToObject("{id: 'notes', className: 'icon text-white text-1.5xl sm:text-2xl', data: null}"));?>
											</div>
											Материалы
										</a>
									</div>
									<h4 class="mt-3 text-xl font-semibold sm:mt-4 sm:text-2xl lg:text-3xl">
										Кейс-сессия “Международная кооперация и инновации на рынке термочувствительных грузов”
									</h4>
									<p class="mt-5 font-semibold sm:text-lg sm:mt-6 lg:text-xl">
										Пленарная сессия “Международная кооперация и инновации на рынке термочувствительных
										грузов”
									</p>
									<div class="mt-3 sm:mt-6 group/accordion" data-accordion>
										<div data-accordion-content>
											<div class="pb-4 description text-sm/normal sm:text-base/normal">
												<p>
													<b>Ключевые вопросы:</b>
												</p>
												<br>
												<ol>
													<li>Роль и место повестки продуктовой безопасности во внутренней и внешней
														политике России.
													</li>
													<li>Императивы развития перевозок скоропорта в новых экономических
														условиях.
													</li>
													<li>Государственные меры поддержки развития экспорта российской продукции
														АПК на рынки АТР и ЮВА.
													</li>
													<li>Инвестиционные проекты в рыбной отрасли.</li>
													<li>Развитие инфраструктуры и технологий для обеспечения НХЦ на торговых
														маршрутах международного рынка скоропортящейся продукции.
													</li>
													<li>Фарма-рынок: интеграция производства и логистики.</li>
													<li>Подготовка кадров для холодильной отрасли.</li>
												</ol>
												<br>
												<ul>
													<li>Роль и место повестки продуктовой безопасности во внутренней и внешней
														политике России.
													</li>
													<li>Императивы развития перевозок скоропорта в новых экономических
														условиях.
													</li>
													<li>Государственные меры поддержки развития экспорта российской продукции
														АПК на рынки АТР и ЮВА.
													</li>
													<li>Инвестиционные проекты в рыбной отрасли.</li>
													<li>Развитие инфраструктуры и технологий для обеспечения НХЦ на торговых
														маршрутах международного рынка скоропортящейся продукции.
													</li>
													<li>Фарма-рынок: интеграция производства и логистики.</li>
													<li>Подготовка кадров для холодильной отрасли.</li>
												</ul>
												<br>
												<p>
													Китай – крупнейший стратегический партнёр России, в том числе и в области
													рыбной промышленности (поставка специализированного оборудования и
													комплектующих, взаимная торговля рыбой и морепродуктами).
													<br><br>
													В последнее время также появляется всё больше примеров работ китайских
													судостроителей для российских судовладельцев промыслового флота. Во всех
													известных авторам случаях постройка велась по типовым китайским проектам.
													Такое решение имеет как свои плюсы (например, за счёт массовости и
													дешевизны), так и минусы, которые стоят отдельных обсуждений.
													<br><br>
													В нашей же презентации будет раскрыт уникальный опыт постройки рыболовных
													судов в Китае по передовым зарубежным проектам. Будут рассмотрены ключевые
													этапы — от проведения тендера между заводами и проработки проекта до
													завершения постройки и дальнейшей эксплуатации.
												</p>
											</div>
										</div>
										<button class="py-1 btn btn-second btn-lines" data-accordion-toggle data-waved="light">
											<span
												class="group-[[data-accordion=active]]/accordion:hidden">Показать полностью</span>
											<span class="hidden group-[[data-accordion=active]]/accordion:block">Скрыть</span>
											<?self::_icon(["id"=>'arrow-right', "className"=>'icon ml-2 ease-linear text-sm duration-300 rotate-90 group-[[data-accordion=active]]/accordion:-rotate-90', "data"=>null]);?>
										</button>
									</div>
									<div class="flex flex-col gap-6 mt-6">
										<% for (var k = 0; k < 2; k++) { %>
										<div>
											<h4 class="mb-4 text-xl font-semibold">
												Спикеры
											</h4>
											<div class="grid grid-cols-1 gap-3 md:grid-cols-2 md:gap-6">
												<% for (var m = 0; m < 4; m++) { %>
												<div class="flex items-center">
													<div
														class="relative mr-3 overflow-hidden rounded-full size-14 bg-sea shrink-0">
														<?=self::_loader()?>
														<?=self::_picture(self::parseStringToObject("{src: '".SITE_TEMPLATE_PATH."/img/pictures/test', format: 'jpg', className: 'image rounded-full', data: null}"))?>
													</div>
													<div>
														<h5 class="text-sm font-semibold sm:text-base">
															Дмитрий Патрушев
														</h5>
														<p class="mt-1 text-xs/normal sm:text-sm/normal opacity-60">
															Министр сельского хозяйства Российской Федерации
														</p>
													</div>
												</div>
												<% } %>
											</div>
										</div>
										<% } %>
									</div>
									<div class="flex flex-col gap-6 mt-6 md:flex-row md:flex-wrap lg:gap-14">
										<% for (var k = 0; k < 2; k++) { %>
										<div>
											<h4 class="mb-4 text-xl font-semibold">
												Организаторы
											</h4>
											<div class="grid grid-cols-2 gap-4 md:flex md:flex-wrap">
												<% for (var m = 0; m < (k === 0 ? 4 : 2); m++) { %>
												<a class="md:w-40 md:shrink-0" draggable="false" href="" target="_blank">
													<div
														class="duration-200 border border-solid pack pack-md rounded-2xl hover:bg-grey/20 border-grey"
														data-waved="dark">
														<?=self::_picture(self::parseStringToObject("{src: '". SITE_TEMPLATE_PATH."/img/pictures/logo-aqua', format: 'svg', className: 'image object-scale-down p-2', data: null}"))?>
													</div>
												</a>
												<% } %>
											</div>
										</div>
										<% } %>
									</div>
								</div>
							</div>
							<% } %>
						</div>
					</div>
				<?
			}?>
			<? if ($json['status']) { ?>
			<ul class="flex flex-col gap-2 mt-8">
				<li class="flex items-center">
					<div
						class="flex items-center justify-center mr-2 rounded-full size-9 sm:size-10 bg-aqua/15 shrink-0">
						<?self::_icon(self::parseStringToObject("{id: 'star', className: 'icon text-aqua text-1.5xl sm:text-2xl', data: null}"));?>
					</div>
					<span class="text-sm sm:text-base">Главное событие</span>
				</li>
				<li class="flex items-center">
					<div
						class="flex items-center justify-center mr-2 border border-solid rounded-full size-9 sm:size-10 border-grey shrink-0">
						<?self::_icon(self::parseStringToObject("{id: 'headphones', className: 'icon text-1.5xl sm:text-2xl', data: null}"));?>
					</div>
					<span class="text-sm sm:text-base">Мероприятия с синхронным переводом</span>
				</li>
				<li class="flex items-center">
					<div
						class="flex items-center justify-center mr-2 border border-solid rounded-full size-9 sm:size-10 border-grey shrink-0">
						<?self::_icon(self::parseStringToObject("{id: 'link', className: 'icon text-1.5xl sm:text-2xl', data: null}"));?>
					</div>
					<span class="text-sm sm:text-base">Ссылка</span>
				</li>
				<li class="flex items-center">
					<div class="flex items-center justify-center mr-2 rounded-full size-9 sm:size-10 bg-aqua shrink-0">
						<?self::_icon(self::parseStringToObject("{id: 'online', className: 'icon text-white text-1.5xl sm:text-2xl', data: null}"));?>
					</div>
					<span class="text-sm sm:text-base">Online</span>
				</li>
				<li class="flex items-center">
					<div class="flex items-center justify-center mr-2 rounded-full size-9 sm:size-10 bg-aqua shrink-0">
						<?self::_icon(self::parseStringToObject("{id: 'notes', className: 'icon text-white text-1.5xl sm:text-2xl', data: null}"));?>
					</div>
					<span class="text-sm sm:text-base">Материалы</span>
				</li>
			</ul>
			<? } ?>
		</div>
		<?php
	}
}

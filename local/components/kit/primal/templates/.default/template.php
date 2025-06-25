<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
	/** @var array $arResult */
	/** @var array $arParams */
	/** @var Main $APPLICATION */

	$this->setFrameMode(true);
	//printr($arResult);
?>
<section class="container relative pt-10 overflow-hidden md:pt-28 xl:pt-56 xl:pb-32 gradient-primary">
	<? if ($arParams['CODE'] === 'cleaning') { ?>
	<div class="absolute inset-0 bg-grey">
		<? \lib\KitTPL::loader() ?>
		<? \lib\KitTPL::picture("{src: 'img/pictures/primal-bg', format: 'jpg', className: 'image', data: null}") ?>
	</div>
	<? } ?>
	<div class="relative flex flex-col items-center w-full gap-6 sm:gap-10 xl:flex-row xl:justify-between">
		<div class="order-2 w-full xl:max-w-xl xl:order-1">
			<h1 class="mb-2 text-2xl font-semibold uppercase duration-500 ease-in sm:mb-4 sm:text-3xl lg:text-title font-alt anim anim-right" data-anim><?=$arResult['TITLE']?></h1>
			<p class="mb-6 duration-500 ease-in delay-100 sm:mb-8 lg:mb-10 opacity-70 text-sm/normal sm:text-base/normal anim anim-right" data-anim><?=$arResult['TEXT']?></p>
			<div
				class="flex flex-col gap-4 mb-8 duration-500 ease-in delay-200 sm:flex-row sm:items-center sm:flex-wrap sm:mb-12 lg:mb-16 xl:mb-24 anim anim-right"
				data-anim>
				<a class="btn btn-primary btn-lg btn-fill btn-gradient" data-scroll data-waved="light" draggable="false"
				   href="#quiz"><?=$arResult['BTN_TEXT_1_VALUE']?></a>
				<?if($arResult['BTN_TEXT_2_VALUE']){?>
					<?$feedback_data = ['TITLE'=>$arResult['BTN_TEXT_2_VALUE'], 'BTN_NAME' => 'Отправить'];?>
						<?if ($arResult['CODE'] === '/construction/'):?>
						<a class="btn btn-second btn-fill btn-lg btn-gradient" data-waved="light" href="#projects">
							<? \lib\KitTPL::picture("{src: 'img/pictures/gift', format: 'svg', className: 'icon text-3xl mr-2', data: null}") ?>
							<?=$arResult['BTN_TEXT_2_VALUE']?>
						</a>
						<?else:?>
					<button class="btn btn-second btn-fill btn-lg btn-gradient" data-waved="light" data-fancybox-dialog
							data-type="ajax" data-src="<?=$arResult['BTN_URL_2_VALUE']??feedbackurl($feedback_data)?>">
						<? \lib\KitTPL::picture("{src: 'img/pictures/gift', format: 'svg', className: 'icon text-3xl mr-2', data: null}") ?>
						<?=$arResult['BTN_TEXT_2_VALUE']?>
					</button>
						<?endif;?>
				<?}?>
			</div>
			<div class="relative w-full sm:max-w-96">
				<div
					class="absolute h-full left-4 sm:left-2 right-4 sm:right-2 -bottom-2 bg-white/40 rounded-3xl"></div>
				<div class="relative" data-slider="text">
					<div class="swiper" data-slider-swiper="text">
						<div class="swiper-wrapper">
							<? foreach ($arResult['LABEL_TEXT'] as $item): ?>
								<div class="h-auto swiper-slide">
									<div
										class="bg-transparent card bg-gradient-to-r from-white to-white/40 backdrop-blur-md">
										<div class="flex-row items-center p-2 sm:p-4 card-content">
											<div class="relative mr-2 sm:mr-4">
												<? \lib\KitTPL::picture("{src: 'img/pictures/square', format: 'svg', className: 'icon text-6xl', data: null}") ?>
												<div class="absolute inset-0 flex items-center justify-center">
													<?
														$icon = 'test';
														if ($arResult['CODE'] === '/cleaning/') $icon = 'Verified_Check';
														if ($arResult['CODE'] === '/construction/') $icon = 'Verified_Check';
													?>
													<? \lib\KitTPL::picture("{src: 'img/pictures/".$icon."', format: 'svg', className: 'icon text-2xl', data: null}") ?>
												</div>
											</div>
											<p class="font-semibold sm:text-lg/normal font-alt">
												<?=$item?>
											</p>
										</div>
									</div>
								</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="order-1 w-full max-w-80 sm:max-w-md xl:max-w-xl xl:order-2 xl:pr-14">
			<div class="inverted" data-inverted>
				<div class="inverted-before border border-white border-solid p-1.5 sm:p-3 bg-white/50 rounded-full"
					 data-inverted-before>
					<div class="rounded-full pack pack-xl bg-grey" data-inverted-upper>
						<? \lib\KitTPL::loader() ?>
						<? \lib\KitTPL::picture("{src: '".CFile::GetPath($arResult['IMG_BACKGROUND'])."', format: 'url', className: 'image rounded-full', data: null}") ?>
					</div>
					<div class="absolute z-10 bottom-1.5 sm:bottom-3 left-1.5 sm:left-3 right-1.5 sm:right-3">
						<? \lib\KitTPL::picture("{src: '".CFile::GetPath($arResult['IMG_PRIMAL'])."', format: 'url', className: 'block w-full', data: null}") ?>
					</div>
				</div>
				<div class="inverted-after border border-white border-solid p-1.5 sm:p-3 bg-white/50 rounded-full"
					 data-inverted-after>
					<div class="rounded-full pack pack-xl bg-grey" data-inverted-upper>
						<? \lib\KitTPL::loader() ?>
						<? \lib\KitTPL::picture("{src: '".CFile::GetPath($arResult['IMG_BACKGROUND'])."', format: 'url', className: 'image rounded-full', data: null}") ?>
					</div>
					<div class="absolute z-10 bottom-1.5 sm:bottom-3 left-1.5 sm:left-3 right-1.5 sm:right-3">
						<? \lib\KitTPL::picture("{src: '".CFile::GetPath($arResult['IMG_PRIMAL'])."', format: 'url', className: 'block w-full', data: null}") ?>
					</div>
					<? if ($arResult['CODE'] === '/') { ?>
					<div
						class="absolute w-full px-2 py-4 text-center xl:px-3 -right-4 xl:right-0 top-4 xl:top-10 inverted-upper max-w-28 xl:max-w-44 rounded-3xl xl:rounded-4xl bg-leafy bg-gradient-to-tr from-white/50 to-transparent xl:py-7"
						data-inverted-upper>
						<div class="flex items-center justify-center w-full h-12 mx-auto mb-2 text-3xl font-semibold rounded-full max-w-20 sm:max-w-32 xl:mb-5 xl:h-20 bg-white/30 xl:text-4xl font-alt">
							20+
						</div>
						<p class="text-xs xl:text-sm">
							Первоклассных специалиста в штате
						</p>
					</div>
					<div class="absolute w-full px-2 py-4 text-center xl:px-3 -left-4 xl:-left-14 bottom-6 xl:bottom-14 inverted-upper max-w-28 xl:max-w-44 rounded-3xl xl:rounded-4xl bg-purple bg-gradient-to-tr from-white/50 to-transparent xl:py-7" data-inverted-upper>
						<div class="flex items-center justify-center w-full h-12 mx-auto mb-2 text-3xl font-semibold rounded-full max-w-20 sm:max-w-32 xl:mb-5 xl:h-20 bg-white/30 xl:text-4xl font-alt">
							10
						</div>
						<p class="text-xs xl:text-sm">
							лет опыта в сфере ремонта
						</p>
					</div>
					<div class="absolute bottom-0 xl:-bottom-5 right-0 xl:right-8 w-full max-w-40 xl:max-w-[200px] inverted-upper" data-inverted-upper>
						<? \lib\KitTPL::icon("{id: 'arrow', className: 'icon absolute text-second -top-3 -left-3 text-2xl', data: false}") ?>
						<div
							class="relative z-10 flex flex-col items-center justify-center h-12 px-4 text-xs text-center text-white rounded-full xl:h-16 xl:text-sm bg-second bg-gradient-to-t from-transparent to-white/30">
							<b>Дамир Русланович</b>
							<span class="opacity-60">Руководитель</span>
						</div>
					</div>
					<? } else if ($arResult['CODE'] === '/cleaning/') { ?>
					<div class="absolute w-full px-2 py-4 text-center xl:px-3 -left-6 xl:-left-12 top-2 xl:-top-8 inverted-upper max-w-36 xl:max-w-44 rounded-3xl xl:rounded-4xl bg-purple bg-gradient-to-tr from-white/50 to-transparent xl:py-7" data-inverted-upper>
						<div class="relative z-10 flex items-center justify-center w-full h-12 mx-auto mb-2 text-3xl font-semibold rounded-full max-w-[74px] xl:max-w-24 xl:mb-5 xl:h-16 bg-white/30 xl:text-4xl font-alt">
							<? \lib\KitTPL::icon("{id: 'success', className: 'icon text-violet text-3xl xl:text-4xl', data: null}") ?>
						</div>
						<h5 class="mb-1 text-xs font-semibold xl:text-base">
							Гарантия качества
						</h5>
						<p class="text-xs xl:text-sm">
							Обеспечим сохранность вашего имущества
						</p>
					</div>
					<div class="absolute w-full px-2 py-4 text-center xl:px-3 -right-6 xl:-right-16 bottom-2 xl:bottom-14 inverted-upper max-w-36 xl:max-w-44 rounded-3xl xl:rounded-4xl bg-leafy bg-gradient-to-tr from-white/50 to-transparent xl:py-7" data-inverted-upper>
						<div class="relative z-10 flex items-center justify-center w-full h-12 mx-auto mb-2 text-3xl font-semibold rounded-full max-w-[74px] xl:max-w-24 xl:mb-5 xl:h-16 bg-white/30 xl:text-4xl font-alt">
							<? \lib\KitTPL::icon("{id: 'wallet', className: 'icon text-green text-3xl xl:text-4xl', data: null}") ?>
						</div>
						<h5 class="mb-1 text-xs font-semibold xl:text-base">
							Без предоплаты
						</h5>
						<p class="text-xs xl:text-sm">
							Оплата после уборки, любым удобным для вас способом
						</p>
					</div>
					<? } else if ($arResult['CODE'] === '/construction/') { ?>
					<div class="absolute w-full px-2 py-4 text-center xl:px-3 -left-6 xl:-left-12 top-2 xl:-top-8 inverted-upper max-w-36 xl:max-w-44 rounded-3xl xl:rounded-4xl bg-blue bg-gradient-to-tr from-white/50 to-transparent xl:py-7" data-inverted-upper>
						<div class="relative z-10 flex items-center justify-center w-full h-12 mx-auto mb-2 text-3xl font-semibold rounded-full max-w-[74px] xl:max-w-24 xl:mb-5 xl:h-16 bg-white/30 xl:text-4xl font-alt">
							<? \lib\KitTPL::icon("{id: 'shield', className: 'icon text-sky text-3xl xl:text-4xl', data: null}") ?>
						</div>
						<h5 class="mb-1 text-xs font-semibold xl:text-base">
							Гарантия 5 ЛЕТ
						</h5>
						<p class="text-xs xl:text-sm">
							Предоставляем 5 лет гарантии на дом
						</p>
					</div>
					<div
						class="absolute w-full px-2 py-4 text-center xl:px-3 -right-6 xl:-right-16 bottom-2 xl:bottom-14 inverted-upper max-w-36 xl:max-w-44 rounded-3xl xl:rounded-4xl bg-yellow bg-gradient-to-tr from-white/50 to-transparent xl:py-7"
						data-inverted-upper>
						<div class="relative z-10 flex items-center justify-center w-full h-12 mx-auto mb-2 text-3xl font-semibold rounded-full max-w-[74px] xl:max-w-24 xl:mb-5 xl:h-16 bg-white/30 xl:text-4xl font-alt">
							<? \lib\KitTPL::icon("{id: 'calendar', className: 'icon text-brown text-3xl xl:text-4xl', data: null}") ?>
						</div>
						<h5 class="mb-1 text-xs font-semibold xl:text-base">
							За 120 дней
						</h5>
						<p class="text-xs xl:text-sm">
							От проекта до дома “под ключ”
						</p>
					</div>
					<? } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>

<section class="container md:pt-16 xl:px-14">
    <?php \lib\KitTPL::title("{text: '".$arResult['NAME']."', className: 'uppercase break-words mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500', data: 'data-anim'}");?>
    <div class="pack pack-md sm:pack-xs bg-white rounded-2xl sm:rounded-3xl w-full xl:max-w-3xl mb-6 sm:mb-9 lg:mb-12">
        <?php \lib\KitTPL::loader();?>
        <?php \lib\KitTPL::picture("{src: '".$arResult["DETAIL_PICTURE"]["SRC"]."', format: 'url', className: 'image rounded-inherit', data: null}");?>
    </div>
    <div class="description sm:text-xl lg:text-2xl">
        <?= $arResult["DETAIL_TEXT"] ?>
    </div>
</section>


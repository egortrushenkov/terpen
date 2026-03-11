<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

<section class="container overflow-hidden pt-0 xl:px-14">
    <?php \lib\KitTPL::subtitle("{text: 'Полезные статьи', className: 'uppercase text-primary mb-6 anim anim-right duration-500', data: 'data-anim'}"); ?>
    <p class="sm:text-xl lg:text-2xl mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500" data-anim>
        Мы заботимся о вашем здоровье и именно поэтому подготовили <br class="hidden xl:block"> подборку полезной
        информации.
    </p>
    <div class="grid xl:grid-cols-2 gap-8 sm:gap-12 lg:gap-16">
        <div class="grid grid-cols-2 gap-2 sm:gap-5 lg:gap-8 order-2 xl:order-1">
            <? if (!empty($arResult)): ?>
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="anim anim-up duration-500" data-anim id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a class="pack pack-xl bg-white rounded-2xl sm:rounded-3xl" data-waved="light" draggable="false"
                           href="">
                            <?php \lib\KitTPL::loader(); ?>
                            <?php \lib\KitTPL::picture("{src: '" . $arItem['PREVIEW_PICTURE']['SRC'] . "', format: 'url', className: 'pack-image image rounded-inherit', data: null}"); ?>
                            <div class="flex flex-col justify-between gap-4 absolute inset-0 bg-gradient-to-t from-black to-transparent rounded-inherit pt-2 sm:pt-4 pb-4 sm:pb-8 pl-4 sm:pl-8 pr-2 sm:pr-4">
                                <button class="btn btn-white btn-fill text-black rounded-full size-10 sm:size-16 ml-auto">
                                    <?php \lib\KitTPL::icon("{id: 'arrow-right', className: 'icon text-2xl sm:text-5xl -rotate-45', data: null}"); ?>
                                </button>
                                <h4 class="font-normal uppercase text-white text-xl sm:text-2xl lg:text-3xl truncate w-full">
                                    <?= $arItem['NAME'] ?>
                                </h4>
                            </div>
                        </a>
                    </div>
                <? endforeach; ?>
            <? endif; ?>
        </div>
        <div class="flex flex-col justify-center order-1 xl:order-2">
            <?php \lib\KitTPL::subtitle("{text: 'Информация, что перед применением каких-либо рекомендаций надо проконсультироваться с врачом.', className: 'uppercase mb-6 anim anim-left duration-500', data: 'data-anim'}"); ?>
            <p class="sm:text-xl lg:text-2xl mb-6 sm:mb-9 lg:mb-12 anim anim-left duration-500" data-anim>
                Объяснение почему и что мы не несем ответственность и тд.
            </p>
            <div class="flex anim anim-left duration-500" data-anim>
                <a class="btn btn-primary btn-fill btn-lg sm:btn-xl sm:text-xl w-full sm:max-w-96" data-waved="light"
                   draggable="false" href="">Все статьи</a>
            </div>
        </div>
    </div>
</section>


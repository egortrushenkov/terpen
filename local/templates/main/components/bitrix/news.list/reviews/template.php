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

<section class="container pt-0 xl:px-14">
<!--    --><?php //= printr($arResult); ?>
    <?php \lib\KitTPL::subtitle("{text: 'Отзывы наших клиентов', className: 'uppercase text-primary mb-6 sm:mb-9 lg:mb-12 anim anim-right duration-500', data: 'data-anim'}"); ?>
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-2 sm:gap-5 lg:gap-8 mb-6 sm:mb-9 lg:mb-12">
        <? if (!empty($arResult)): ?>
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="anim anim-up duration-500" data-anim id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a class="pack pack-xxl bg-white rounded-2xl sm:rounded-3xl" data-fancybox-dialog data-waved="light"
                       draggable="false" href="/ajax/dialogs/dialog-review.php?ID=<?= $arItem['ID'] ?>">
                        <?php \lib\KitTPL::loader(); ?>
                        <?php \lib\KitTPL::picture("{src: '".$arItem['PREVIEW_PICTURE']['SRC']."', format: 'url', className: 'pack-image image rounded-inherit', data: null}"); ?>
                        <div class="flex flex-col items-start justify-end gap-1 absolute inset-0 bg-gradient-to-t from-black to-transparent text-white rounded-inherit p-3 sm:p-5 md:p-8 lg:p-10">
                            <h4 class="font-normal sm:text-xl lg:text-3xl">
                                <?= $arItem['NAME'] ?>
                            </h4>
                            <span class="font-alt font-bold italic text-xs sm:text-sm lg:text-lg"><?= $arItem['PROPERTIES']['profession']['VALUE'] ?></span>
                            <span class="font-alt font-bold text-sm sm:text-base lg:text-xl underline underline-offset-4"><?= $arItem['PROPERTIES']['age']['VALUE'] ?> лет</span>
                        </div>
                    </a>
                </div>
            <? endforeach; ?>
        <? endif; ?>
    </div>
    <div class="flex justify-center anim anim-up duration-500" data-anim>
        <a class="btn btn-primary btn-fill btn-lg sm:btn-xl sm:text-xl w-full sm:max-w-96" data-waved="light"
           draggable="false" href="">Все отзывы</a>
    </div>
</section>


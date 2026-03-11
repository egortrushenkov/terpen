<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

$id = intval($_GET['ID']);
if ($id <= 0) {
    echo "Отзыв не найден";
    return;
}

$res = CIBlockElement::GetList(
        [],
        ["ID" => $id, "IBLOCK_ID" => 6, "ACTIVE" => "Y"],
        false,
        false,
        ["ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE"]
);

if ($arItem = $res->GetNext()) {
    // Получаем путь к картинке из ID файла
    $pictureSrc = CFile::GetPath($arItem['PREVIEW_PICTURE']);

    // Если нужны свойства — догружаешь:
    $props = CIBlockElement::GetProperty(6, $id, [], []);
    $arProps = [];
    while ($prop = $props->GetNext()) {
        $arProps[$prop['CODE']] = $prop['VALUE'];
    }
}
?>
<?

use lib\Kit;

//use Bitrix\Main\Config\Option;
?>

<dialog class="w-full max-w-lg lg:max-w-4xl bg-grey text-dark rounded-3xl py-6 lg:py-10 px-4 lg:px-7">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 lg:gap-6 mb-7">
        <div class="shrink-0 w-full max-w-48">
            <div class="pack pack-xl bg-white rounded-2xl">
                <?php \lib\KitTPL::loader(); ?>
                <?php \lib\KitTPL::picture("{src: '".$pictureSrc."', format: 'url', className: 'image rounded-inherit', data: null}"); ?>

            </div>
        </div>
        <div class="grow">
            <h2 class="font-alt font-bold text-2xl lg:text-3xl">
                <?= $arItem['NAME'] ?>
            </h2>
            <h3 class="font-alt font-bold lg:text-lg">
                <?= $arProps['profession'] ?>
            </h3>
            <h4 class="font-alt font-bold text-lg lg:text-xl underline underline-offset-4">
                <?= $arProps['age'] ?>
                лет
            </h4>
        </div>
    </div>
    <div class="description text-sm lg:text-base">
        <?= $arItem['PREVIEW_TEXT'] ?>
    </div>
</dialog>
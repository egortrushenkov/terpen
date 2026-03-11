<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use lib\Kit;
use Bitrix\Main\Config\Option;

?>
<dialog class="w-full max-w-72 bg-grey text-dark rounded-3xl py-10 px-4">
    <div class="flex flex-col items-center text-center">
        <?php \lib\KitTPL::icon("{id: 'error', className: 'icon text-second text-9xl fill-white mb-5', data: null}"); ?>
        <h2 class="font-alt font-bold uppercase text-2xl mb-2">
            Ошибка :(
        </h2>
        <p class="opacity-70">
            Возникла непредвиденная <br> ошибка
        </p>
    </div>
</dialog>
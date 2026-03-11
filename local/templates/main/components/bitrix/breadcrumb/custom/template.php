<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @global CMain $APPLICATION */
global $APPLICATION;

if (empty($arResult))
    return "";

$strReturn = '';

$strReturn .= '<section class="container pt-4 sm:pt-0 pb-0 xl:px-14">';
$strReturn .= '<div class="flex items-center flex-wrap gap-4 text-xs sm:text-sm opacity-60">';

ob_start();
\lib\KitTPL::icon("{id: 'arrow-right', className: 'icon text-base sm:text-lg', data: null}");
$arrow = ob_get_clean();

$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($index > 0) {
        $strReturn .= $arrow;
    }

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= '<a class="underline-offset-4 hover:underline" draggable="false" href="' . $arResult[$index]["LINK"] . '">' . $title . '</a>';
    } else {
        $strReturn .= '<span class="pointer-events-none">' . $title . '</span>';
    }
}

$strReturn .= '</div>';

$strReturn .= '<div class="flex mt-4 sm:mt-6">';
$strReturn .= '<a class="btn btn-primary btn-fill btn-lg sm:btn-xl sm:text-xl px-3 sm:px-7" data-waved="light" draggable="false" href="javascript:history.back()">';
ob_start();
\lib\KitTPL::icon("{id: 'arrow-left', className: 'icon text-2xl sm:text-3xl', data: null}");
$strReturn .= ob_get_clean();
$strReturn .= '<span class="hidden sm:block ml-2">Назад</span>';
$strReturn .= '</a>';
$strReturn .= '</div>';

$strReturn .= '</section>';

return $strReturn;

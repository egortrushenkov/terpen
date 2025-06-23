<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

\Bitrix\Main\Loader::registerAutoLoadClasses(
    'stdkit.settings',
    [
        'Stdkit\\Settings\\HtmlEditor' => 'lib/HtmlEditor.php',
    ]
);

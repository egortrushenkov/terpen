<?php
namespace Stdkit\Settings;

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class HtmlEditor
{
    protected $moduleId;
    protected $key;
    protected $value;
    protected $title;
    protected $hint;

    public function __construct($moduleId, $key, $value = '', $title = '', $hint = '')
    {
        $this->moduleId = $moduleId;
        $this->key = $key;
        $this->value = $value;
        $this->title = $title;
        $this->hint = $hint;
    }

    public static function getOption($moduleId, $optionName)
    {
        return \COption::GetOptionString($moduleId, $optionName);
    }

    public function render()
    {
        \CModule::IncludeModule('fileman');

        ob_start();
        $GLOBALS['APPLICATION']->IncludeComponent(
            'bitrix:fileman.light_editor',
            '',
            array(
                'CONTENT' => $this->value,
                'INPUT_NAME' => $this->key,
                'INPUT_ID' => $this->key,
                'WIDTH' => '100%',
                'HEIGHT' => '200px',
                'USE_FILE_DIALOGS' => false,
                'ID' => $this->key.'_editor'
            ),
            null,
            array('HIDE_ICONS' => 'Y')
        );
        $editor = ob_get_clean();

        return '
        <tr>
            <td colspan="2" class="adm-detail-content-cell-l">
                '.$this->title.'
            </td>
        </tr>
        <tr>
        	<td colspan="2" class="adm-detail-content-cell-r">'.$editor.'</td>
		</tr>
        ';
    }
}
<?
require_once( $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/autoload.php');
//var_dump($_SERVER['DOCUMENT_ROOT']);

/**************************** универсальный print_r**********************************/
	function printr($array)
	{
		if (!is_array($array)) return false;
		$args = func_get_args();
		if (count($args) > 1) {
			foreach ($args as $values)
				printr($values);
		} else {
			echo "<pre>";
			print_r($array);
			echo "</pre>";
		}
	}
/**************************** /универсальный print_r**********************************/

/**************************** WEBP **********************************/
function makeWebp ($src) {
    $newImgPath = false;

    if (function_exists('imagewebp')) {
        $info = getimagesize($_SERVER['DOCUMENT_ROOT'].$src);
        if ($info !== false) {
            $type = $info[2];
            switch($type) {
                case IMAGETYPE_JPEG:
                    $newImg = imagecreatefromjpeg($_SERVER['DOCUMENT_ROOT'].$src);
                    $newImgPath = str_replace(array('.jpg', '.jpeg'), '.webp', $src);
                    break;
                case IMAGETYPE_GIF:
                    $newImg = imagecreatefromgif($_SERVER['DOCUMENT_ROOT'].$src);
                    $newImgPath = str_replace('.gif', '.webp', $src);
                    break;
                case IMAGETYPE_PNG:
                    $newImg = imagecreatefrompng($_SERVER['DOCUMENT_ROOT'].$src);
                    $newImgPath = str_replace('.png', '.webp', $src);
                    break;
            }
            if ($newImg) {
                if (!file_exists($_SERVER['DOCUMENT_ROOT'].$newImgPath)) {
                    imagewebp($newImg, $_SERVER['DOCUMENT_ROOT'].$newImgPath);
                }
                imagedestroy($newImg);
            }
        }
    }

    return $newImgPath;
}
/**************************** /WEBP **********************************/

/**************************** telegram **********************************/
function t_me($tgText, $files=false, $chats_id = ["-1001976568863"], $thread_id = 12){

    $token = "11111111111:AAAAAAAAAAAAAAAAAAAAAAAA";
    $site = $_SERVER['SERVER_NAME'];//$_SERVER['HTTP_ORIGIN']

    foreach ($chats_id as $chat) {
        $url = "https://api.telegram.org/bot{$token}/sendMessage";

        $arrayQuery = [
            "chat_id" => $chat,
            "text" => $tgText.$site . $files[0],
            "parse_mode" => "html",
            "message_thread_id"=> $thread_id//id нужного топика
        ];

        if (is_array($files)) {
            if(count($files) == 1) {
                $url = 'https://api.telegram.org/bot' . $token . '/sendDocument';
                $arrayQuery['document'] = $site . $files[0];
                $arrayQuery["caption"] = $tgText;
            }else {
                $arMedia = array();
                $url = 'https://api.telegram.org/bot' . $token . '/sendMediaGroup';
                foreach ($files as $key => $path) {
                    if($key == 0) {
                        $arMedia[] = array('type' => 'photo', 'media' => $site.$path, "caption" => $tgText, "parse_mode"=>"html");
                    }else{
                        $arMedia[] = array('type' => 'photo', 'media' => $site.$path);
                    }
                }
                $arrayQuery['media'] = json_encode( $arMedia );
            }
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $res = curl_exec($ch);
        curl_close ($ch);

        return $res;
    }
}
/**************************** /telegram **********************************/

/**************************** b24 **********************************/
function sendB24($action = "crm.lead.add.json", $data)
{
	$url = "https://ДОМЕН.bitrix24.ru/rest/ID REST/ХУК/".$action;

	$obCurl = curl_init();
	curl_setopt($obCurl, CURLOPT_URL, $url);
	curl_setopt($obCurl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($obCurl, CURLOPT_POST, true);
	curl_setopt($obCurl, CURLOPT_POSTFIELDS, $data);

	$out = curl_exec($obCurl);
	curl_close($obCurl);

	return $out;
}

function b24AddLead($data)
{
	$ENTITY_TYPE = 'lead'; // lead|deal ставь нужное

	$urlParamsArr = array();
	$urlParamsArr['FIELDS[NAME]'] = $data['NAME'];
	$urlParamsArr['FIELDS[PHONE][0][VALUE]'] = $data['PHONE'];
	$urlParamsArr['FIELDS[PHONE][0][VALUE_TYPE]'] = 'WORK';
	$res_contact = sendB24("crm.contact.add", $urlParamsArr);

	$urlParamsArr = array();
	$urlParamsArr['FIELDS[TITLE]'] = $data['TITLE'] ?: 'Заявка с сайта';
	$urlParamsArr['FIELDS[SOURCE_ID]'] = 'WEB';
	$urlParamsArr['FIELDS[CONTACT_ID]'] = json_decode($res_contact)->result;
	//$urlParamsArr['FIELDS[ASSIGNED_BY_ID]'] = 22; // ответственный
	$res_deal = sendB24('crm.'.$ENTITY_TYPE.'.add.json', $urlParamsArr);


	$comment = str_replace("%0A", "\r\n", $data['COMMENT']);
	$urlParamsArr = array();
	$urlParamsArr['fields[ENTITY_ID]'] = json_decode($res_deal)->result;
	$urlParamsArr['fields[ENTITY_TYPE]'] = $ENTITY_TYPE;
	$urlParamsArr['fields[COMMENT]'] = $comment;
	sendB24('crm.timeline.comment.add', $urlParamsArr);

}
/**************************** /b24 **********************************/

/**************************** YouTUBE **********************************/
	function getYoutubeThumbnail($url, $size = "maxresdefault"):string {
		$video_id = explode("?v=", $url);
		if (empty($video_id[1])) {
			$video_id = explode("https://youtu.be/", strstr($url, "?", true) );
		}
		if (empty($video_id[1])) {
			$video_id = explode("/v/", $url);
		}
		if (empty($video_id[1])) {
			$video_id = explode("https://youtu.be/", $url );
		}
		$video_id = explode("&", $video_id[1]);
		$video_id = $video_id[0];

		$thumbnail_url = 'https://img.youtube.com/vi/'.$video_id.'/'.$size.'.jpg';

		return $thumbnail_url;
	}
/**************************** /YouTUBE **********************************/


/**************************** FeedBackURL **********************************/
	function feedbackurl($params = [] )
	{
		global $APPLICATION;

		/**
		 * Поля которые могут быть в $params
		 * PAGE - обязательный но если пришёл пустой то установится автоматически
		 * TITLE
		 * CRM_TITLE
		 * BTN_NAME
		 * IMG
		 */

		// Обработка обязательного параметра PAGE
	    $defaultParams = [
	        'PAGE' => $APPLICATION->GetCurPage(false),
	        'TITLE' => '',
	        'CRM_TITLE' => '',
	        'BTN_NAME' => '',
	        'IMG' => ''
	    ];

		// Объединение переданных параметров с параметрами по умолчанию
        $mergedParams = array_merge($defaultParams, $params);

		// Фильтрация параметров - удаляем пустые значения (кроме PAGE)
	    $filteredParams = array_filter($mergedParams, function($value, $key) {
	        return ($key === 'PAGE') || !empty($value);
	    }, ARRAY_FILTER_USE_BOTH);

		// Кодирование параметров для URL
        $encodedParams = http_build_query(['PARAMS' => $filteredParams]);

		// Формирование итогового URL
        return '/ajax/dialogs/dialog-feedback.php?' . $encodedParams;
	}
/**************************** /FeedBackURL **********************************/
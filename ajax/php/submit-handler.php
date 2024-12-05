<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
	$error = '';
	$status = true;

	echo json_encode(['status' => $status, 'error' => $error]);

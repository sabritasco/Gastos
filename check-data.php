<?php
require_once 'class/ParametersDB.php';
$db = new class_ConnectDB();

//Validar que no se repita email de deudor
if (isset($_POST['email']) && !empty($_POST['email'])) {
	$email = mysqli_real_escape_string($db->con, trim($_POST['email']));
	$query = " SELECT count(CORREO) cnt FROM DEUDORES where CORREO = '$email' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if ($data['cnt'] > 0) {
		echo 'false';
	} else {
		echo 'true';
	}
	exit;
}

//Validar que no se repita telefono de un deudor
if (isset($_POST['mobile_debtors']) && !empty($_POST['mobile_debtors'])) {
	$mobile_debtors = mysqli_real_escape_string($db->con, trim($_POST['mobile_debtors']));
	$query = " SELECT count(CELULAR) cnt FROM DEUDORES where CELULAR = '$mobile_debtors' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if ($data['cnt'] > 0) {
		echo 'false';
	} else {
		echo 'true';
	}
	exit;
}

//Validar que no se repita ultimos 4 digitos de tarjeta
if (isset($_POST['digits_cards']) && !empty($_POST['digits_cards'])) {
	$digits_cards = mysqli_real_escape_string($db->con, trim($_POST['digits_cards']));
	$query = " SELECT count(TERMINACION) cnt FROM TARJETAS where TERMINACION = '$digits_cards' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if ($data['cnt'] > 0) {
		echo 'false';
	} else {
		echo 'true';
	}
	exit;
}

//Validar que no se repita identificador de tarjeta
if (isset($_POST['identifier_cards']) && !empty($_POST['identifier_cards'])) {
	$identifier_cards = mysqli_real_escape_string($db->con, trim($_POST['identifier_cards']));
	$query = " SELECT count(IDENTIFICADOR) cnt FROM TARJETAS where IDENTIFICADOR = '$identifier_cards' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if ($data['cnt'] > 0) {
		echo 'false';
	} else {
		echo 'true';
	}
	exit;
}

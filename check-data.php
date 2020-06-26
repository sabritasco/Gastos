<?php
require_once 'class/ParametersDB.php';
$db = new class_ConnectDB();

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

if (isset($_POST['mobile']) && !empty($_POST['mobile'])) {
	$mobile = mysqli_real_escape_string($db->con, trim($_POST['mobile']));
	$query = " SELECT count(CELULAR) cnt FROM DEUDORES where CELULAR = '$mobile' ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if ($data['cnt'] > 0) {
		echo 'false';
	} else {
		echo 'true';
	}
	exit;
}

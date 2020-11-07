<?php
ob_start();
session_start();
require_once 'class/ParametersDB.php';
if (!isset($_SESSION['logged_in'])) {
  header('Location: index.php');
}
setlocale(LC_ALL, 'es_MX.UTF-8');
require_once 'templates/title.php';
?>
<!DOCTYPE html>
<html lang="es">

<!-- /Head -->
<head>
  <title><?= $title ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/SB_Admin.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome/css/all.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	<!--===============================================================================================-->
</head>
<!-- /Head -->


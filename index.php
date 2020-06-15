<?php
ob_start();
session_start();
require_once 'class/ParametersDB.php';
?>
<?php
if (!empty($_POST)) {
	try {
		$user_obj = new class_User();
		$data = $user_obj->login($_POST);
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
			header('Location: home.php');
		}
	} catch (Exception $e) {
		$error = $e->getMessage();
	}
}
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
	header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/SB_Admin.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome/css/all.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="wrap-login100 p-t-15 p-b-30">

				<div class="message_div wrap-input100 p-b-20">
					<?php require_once 'templates/mensajes.php'; ?>
				</div>

				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<div class="login100-form-avatar">
						<img src="images/Avatar.jpg" alt="Avatar">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Emmanuel González
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
						<input class="input100" type="text" name="user" placeholder="Username" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

</body>
<!--===============================================================================================-->
<script src="js/index.js"></script>
<!--===============================================================================================-->

</html>
<?php ob_end_flush(); ?>
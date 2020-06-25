<?php require_once 'templates/head.php'; ?>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<?php require_once 'templates/sidebar.php'; ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<?php require_once 'templates/nav.php'; ?>
				<!-- Begin Page Content -->
				<div class="container-fluid">

					<?php /*if (!empty($_POST)) {
						try {
							$user_obj = new class_User();
							$data = $user_obj->login($_POST);
							if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
								header('Location: home.php');
							}
						} catch (Exception $e) {
							$error = $e->getMessage();
						}
					}*/
					if (!empty($error)) : ?>
						<div class="message_div wrap-input100 p-b-20">
							<?php require_once 'templates/mensajes.php'; ?>
						</div>
					<?php endif ?>


					<!-- Content Row -->
					<div class="row justify-content-center">

						<!-- form user info -->
						<div class="card card-outline-secondary border-left-primary border-bottom-primary m-b-30 p-2 w-100">
							<div class="card-header">
								<h3 class="mb-0">Debtors Information</h3>
							</div>
							<div class="card-body">
								<form id="form-validate" class="form validate-form" role="form" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">





									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">First name</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="First name is required">
												<input class="form-control input" type="text" name="name">
												<span class="focus-input"></span>

											</div>
										</div>
									</div>


									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Last name</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Last name is required">
												<input class="form-control input" type="text" name="last_name">
												<span class="focus-input"></span>

											</div>
										</div>
									</div>



									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Email</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Email is required">
												<input class="form-control input" type="text" name="email">
												<span class="focus-input"></span>

											</div>
										</div>
									</div>


									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Mobile</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Mobile is required">
												<input class="form-control input" type="text" name="mobile">
												<span class="focus-input"></span>

											</div>
										</div>
									</div>



									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label"></label>
										<div class="col-lg-9">
											<input type="reset" class="btn btn-secondary" value="Cancel">
											<input type="submit" class="btn btn-primary" value="Save">
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- /form user info -->



					</div>
					<!-- End Content Row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->
			<?php require_once 'templates/footer.php'; ?>
		</div>
		<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->
</body>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<!--===============================================================================================-->
<script src="js/formularios.js"></script>
<!--===============================================================================================-->

</html>
<?php ob_end_flush(); ?>
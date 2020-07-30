<?php require_once 'templates/head.php'; ?>
<!-- Adicionales -->
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/datetimepicker/build/jquery.datetimepicker.min.css">
<!--===============================================================================================-->
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
<!--===============================================================================================-->
<!--End Adicionales -->

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

					<?php
					/*if (!empty($_POST)) {
						try {
							$cards_obj = new class_Cards();
							$data = $cards_obj->insert($_POST);
							if ($data) $success = CARDS_INSERT_SUCCESS;
						} catch (Exception $e) {
							$error = $e->getMessage();
						}
					}
					if (!empty($success) || !empty($error)) : ?>
						<div class="message_div wrap-input100 p-b-20">
							<?php require_once 'templates/mensajes.php'; ?>
						</div>
					<?php endif */
					require_once 'class/ParametersDB.php';
					$db = new class_ConnectDB();
					?>


					<!-- Content Row -->
					<div class="row justify-content-center">







						<!-- Card form -->
						<div class="card card-outline-secondary border-left-primary border-bottom-primary m-b-30 p-2 col-lg-12">
							<div class="card-header">
								<h3 class="mb-0">Expense data</h3>
							</div>
							<div class="card-body">
								<form id="form-validate" class="form validate-form" role="form" autocomplete="off" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">



									<!-- Deudores -->
									<?php
									$query = " SELECT ID_DEUDOR, NOMBRE FROM DEUDORES WHERE ID_USUARIO = '" . $_SESSION['ID_USUARIO'] . "' ";
									$result = mysqli_query($db->con, $query);
									$deudores = mysqli_fetch_all($result);
									?>
									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Debtor</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row" data-validate="Debtor is required">
												<select class="form-control input" name="debtor">
													<option value="">Seleccione...</option>
													<?php for ($i = 0; $i < count($deudores); $i++) : ?>
														<option value="<?= $deudores[$i]['0'] ?>"><?= $deudores[$i]['1'] ?></option>
													<?php endfor ?>
												</select>
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End Deudores -->


									<!-- Tarjetas y efectivo -->
									<?php
									$query = " SELECT ID_TARJETA, IDENTIFICADOR, TIPO FROM TARJETAS WHERE ID_USUARIO = '" . $_SESSION['ID_USUARIO'] . "' ";
									$result = mysqli_query($db->con, $query);
									$tarjetas = mysqli_fetch_all($result);
									?>
									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Expense destination</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row" data-validate="Expense destination is required">
												<select class="form-control input" name="destination">
													<option value="">Seleccione...</option>
													<option value="E">Efectivo</option>
													<?php for ($i = 0; $i < count($tarjetas); $i++) : ?>
														<option value="<?= $tarjetas[$i]['0'] ?>"><?= $tarjetas[$i]['1'] ?> - <?= $tarjetas[$i]['2'] ?></option>
													<?php endfor ?>
												</select>
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End Tarjetas y efectivo -->




									<!-- -->
									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Expense tag</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Expense tag amount is required">
												<input class="form-control input" type="text" name="tag">
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End Monto del cargo-->



									<!-- Fecha de el cargo -->
									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Expense date</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Charge date is required">
												<input id="expense_date" class="form-control input" type="text" name="expense_date" placeholder="aaaa/mm/dd" readonly>
												<span class="icon">
													<i id="calendar_one" class="fal fa-calendar-alt"></i>
												</span>
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End Fecha de el cargo -->



									<!-- Monto del cargo-->
									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Expense amount</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Charge amount is required">
												<input class="form-control input" type="text" name="amount">
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End Monto del cargo-->





									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label"></label>
										<div class="col-lg-9">
											<input type="reset" class="btn btn-secondary" value="Cancel">
											<input id="send" type="submit" class="btn btn-primary" value="Save">
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- /Card form -->











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
<script src="js/main.js"></script>
<!--===============================================================================================-->
<script src="js/expense_capture.js"></script>
<!--===============================================================================================-->

</html>
<?php ob_end_flush(); ?>
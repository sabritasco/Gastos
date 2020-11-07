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



					<?php if (!empty($_POST)) {
						try {
							$expense_obj = new class_Debts();
							$data = $expense_obj->insert($_POST);
							if ($data) {
								$success = DEBTS_INSERT_SUCCESS;
							}
						} catch (Exception $e) {
							$error = $e->getMessage();
						}
					}
					if (!empty($success) || !empty($error)) : ?>
						<div class="message_div wrap-input100 p-b-20">
							<?php require_once 'templates/mensajes.php'; ?>
						</div>
					<?php endif;
					require_once 'class/ParametersDB.php';
					$db = new class_ConnectDB();
					?>



					<!-- Content Row -->
					<div class="row justify-content-center">



						<!-- Card form -->
						<div class="card card-outline-secondary border-left-primary border-bottom-primary m-b-30 p-2 col-lg-12">
							<div class="card-header">
								<h3 class="mb-0">Información de la Deuda</h3>
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
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Deudor</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row" data-validate="El deudor es requerido">
												<select class="form-control input" name="debtor">
													<option value="">Seleccione...</option>
													<?php for ($i = 0; $i < count($deudores); $i++) : ?>
														<option value="<?= $deudores[$i]['0'] ?>"><?= $deudores[$i]['1'] ?>
														</option>
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
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Forma
											de pago</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row" data-validate="El destino de la deuda es reuqrido.">
												<select class="form-control input" name="destination">
													<option value="">Seleccione...</option>
													<option value="Efectivo">Efectivo</option>
													<?php for ($i = 0; $i < count($tarjetas); $i++) : ?>
														<option value="<?= $tarjetas[$i]['0'] ?>"><?= $tarjetas[$i]['1'] ?>
															- <?= $tarjetas[$i]['2'] ?></option>
													<?php endfor ?>
												</select>
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End Tarjetas y efectivo -->



									<!-- Etiqueta de la deuda -->
									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Etiqueta
											de la deuda</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="La información de la compra es requerida.">
												<input class="form-control input" type="text" name="tag">
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End Etiqueta de la deuda -->



									<!-- Fecha de la deuda -->
									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Fecha
											de la deuda</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="La fecha de la deuda es requerida.">
												<input id="debt_date" class="form-control input" type="text" name="debt_date" placeholder="aaaa/mm/dd" readonly>
												<span class="icon">
													<i id="calendar_one" class="fal fa-calendar-alt"></i>
												</span>
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End echa de la deuda -->



									<!-- Monto parcial de la deuda -->
									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Monto mensual de la deuda</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="El monto mensual de la deuda es requerido.">
												<input class="form-control input" type="text" name="amount_partial">
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End Monto parcial de la deuda -->


									<!-- Mensualidades restantes -->
									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Pagos pendientes</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="El numero de pagos pendientes es requerido.">
												<select class="form-control input" name="number_payments">
													<option value="">Seleccione...</option>
													<option value="Recurrente">Recurrente</option>
													<?php for ($i = 1; $i < 25; $i++) : ?>
														<option value="<?= $i ?>"><?= $i ?>
														</option>
													<?php endfor ?>
												</select>
												<span class="focus-input"></span>
											</div>
										</div>
									</div>
									<!-- End Mensualidades restantes -->






									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label"></label>
										<div class="col-lg-9">
											<input type="reset" class="btn btn-secondary" value="Cancelar">
											<input id="send" type="submit" class="btn btn-primary" value="Guardar">
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
<script src="js/debts_capture.js"></script>
<!--===============================================================================================-->

</html>
<?php ob_end_flush(); ?>
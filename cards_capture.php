<?php require_once 'templates/head.php'; ?>
<!-- Adicionales -->
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
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
					if (!empty($_POST)) {
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
					<?php endif ?>


					<!-- Content Row -->
					<div class="row justify-content-center">

						<!-- Card form -->
						<div class="card card-outline-secondary border-left-primary border-bottom-primary m-b-30 p-2 col-lg-12">
							<div class="card-header">
								<h3 class="mb-0">Card data</h3>
							</div>
							<div class="card-body">
								<form id="form-validate" class="form validate-form" role="form" autocomplete="off" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">





									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 mb-lg-0">Last 4 digits</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Last 4 digits is required">
												<input id="digits_cards" class="form-control input" type="text" name="digits_cards">
												<span class="focus-input"></span>
											</div>
										</div>
									</div>

									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Identifier</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Identifier is required">
												<input id="identifier_cards" class="form-control input" type="text" name="identifier_cards">
												<span class="focus-input"></span>
											</div>
										</div>
									</div>

									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Type</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row" data-validate="Type is required">
												<select id="type" class="form-control input" name="type">
													<option value="">Seleccione...</option>
													<option value="Debito">Debito</option>
													<option value="Credito">Credito</option>
												</select>
												<span class="focus-input"></span>
											</div>
										</div>
									</div>


									<!--- Inicia credito -->
									<div id="credito">
										<div class="form-group row caja">
											<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Credit limit</label>
											<div class="col-lg-9">
												<div class="wrap-input validate-input form-group row " data-validate="Credit limit is required">
													<input id="limit" class="form-control input" type="text" name="limit">
													<span class="focus-input"></span>
												</div>
											</div>
										</div>

										<div class="form-group row caja">
											<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Cutoff date</label>
											<div class="col-lg-9">
												<div class="wrap-input validate-input form-group row " data-validate="Cutoff date is required">
													<input id="cutoff" class="form-control input" type="text" name="cutoff">
													<span class="focus-input">
													</span>
												</div>
											</div>
										</div>
									</div>
									<!--- Termina credito -->

									<!--- Inicia debito -->
									<div id="debito">
										<div class="form-group row caja">
											<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Balance</label>
											<div class="col-lg-9">
												<div class="wrap-input validate-input form-group row " data-validate="Balance is required">
													<input id="balance" class="form-control input" type="text" name="balance">
													<span class="focus-input"></span>
												</div>
											</div>
										</div>
									</div>
									<!--- Termina debito -->







									<!-- Expiration -->
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Expiration date</label>
										<div class="col-lg-9">
											<div class="form-group row">



												<label class="col-xl-1 col-form-label form-control-label border-left-secondary mb-2 lg-sm-0">Month</label>
												<div class="col caja">
													<div class="wrap-input validate-input form-group row" data-validate="Month is required">
														<select id="month" class="form-control input" name="month">
															<option value="">Seleccione...</option>
															<option value="1">Enero</option>
															<option value="2">Febrero</option>
															<option value="3">Marzo</option>
															<option value="4">Abril</option>
															<option value="5">Mayo</option>
															<option value="6">Junio</option>
															<option value="7">Julio</option>
															<option value="8">Agosto</option>
															<option value="9">Septiembre</option>
															<option value="10">Octubre</option>
															<option value="11">Noviembre</option>
															<option value="12">Diciembre</option>
														</select>
														<span class="focus-input"></span>
													</div>
												</div>


												<label class="col-xl-1 col-form-label form-control-label border-left-secondary mb-2 lg-sm-0">Year</label>
												<div class="col caja">
													<div class="wrap-input validate-input form-group row" data-validate="Year is required">
														<select id="year" class="form-control input" name="year">
															<option value="">Seleccione...</option>
															<?php $year = date("Y");
															for ($i = 1; $i <= 10; $i++) : ?>
																<option value="<?= $year + $i; ?>"><?= $year + $i; ?></option>
															<?php endfor; ?>
														</select>
														<span class="focus-input"></span>
													</div>
												</div>

											</div>
										</div>
									</div>
									<!-- /Expiration -->








									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Banking institution</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Banking institution is required">
												<input id="institution" class="form-control input" type="text" name="institution">
												<span class="focus-input"></span>
											</div>
										</div>
									</div>

									<div class="form-group row caja">
										<label class="col-lg-3 col-form-label form-control-label border-left-info mb-2 lg-sm-0">Bank institution phone</label>
										<div class="col-lg-9">
											<div class="wrap-input validate-input form-group row " data-validate="Banking institution phone is required">
												<input class="form-control input" type="text" name="phone">
												<span class="focus-input"></span>
											</div>
										</div>
									</div>







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
<script src="js/cards_capture.js"></script>
<!--===============================================================================================-->
</html>
<?php ob_end_flush(); ?>
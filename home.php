<?php require_once 'templates/head.php'; ?>
<!-- Adicionales -->
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
				<!-- Contenido Home -->
				<div class="container-fluid">


					<?php
					$mes = strftime("%B");
					?>


					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 text-uppercase mb-0 text-gray-800"><?= $mes ?></h1>
					</div>







					<!-- Row -->
					<div class="row">


						<?php
						require_once 'class/ParametersDB.php';
						$db = new class_ConnectDB();
						$query = " SELECT * FROM TARJETAS WHERE ID_USUARIO = '" . $_SESSION['ID_USUARIO'] . "' AND TIPO = 'CREDITO'";
						$result = mysqli_query($db->con, $query);
						$data = mysqli_fetch_all($result);
						for ($i = 0; $i < count($data); $i++) :
							$limit_credit = $data[$i]['5'];
							$deuda = 8500;
							$porcent_credit = round($deuda / $limit_credit * 100, 2);
							if (!($porcent_credit <= 100)) {
								$porcent_credit = 100;
							}
							$disponible_porcent = 100 - $porcent_credit;
							$disponible = number_format($limit_credit - $deuda, 2);
						?>


							<div class="col-lg-6">
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary"><?= $data[$i]['3'] ?></h6>
									</div>

									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="mb-1"><span class="text-xs font-weight-bold text-info text-uppercase">Credito disponible</span> <span class="">$<?= $disponible ?></span></div>
												<div class="row no-gutters align-items-center">
													<div class="col-auto">
														<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $disponible_porcent ?>%</div>
													</div>
													<div class="col">
														<div class="progress progress-sm mr-2">
															<div class="progress-bar bg-info" role="progressbar" style="width: <?= $disponible_porcent ?>%" aria-valuenow="<?= $disponible_porcent ?>" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-usd-circle fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>

									<div class="card-footer">

									</div>
								</div>
							</div>


						<?php
						endfor;
						?>

















						<!-- End Row -->
					</div>
				</div>
				<!-- End Contenido Home -->





				<!-- End of Main Content -->
			</div>
			<!-- End of Main Content -->
			<?php require_once 'templates/footer.php'; ?>
			<!-- End of Content Wrapper -->
		</div>
		<!-- End of Content Wrapper -->
		<!-- End of Page Wrapper -->
	</div>
	<!-- End of Page Wrapper -->
</body>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<!--===============================================================================================-->

</html>
<?php ob_end_flush(); ?>
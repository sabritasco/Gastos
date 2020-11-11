<?php require_once 'templates/head.php'; ?>
<!-- Adicionales -->
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/DataTables/SB_Admin/dataTables.bootstrap4.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/DataTables/Responsive-2.2.5/css/responsive.bootstrap4.css">
<!--===============================================================================================-->
<script src="vendor/DataTables/datatables.js"></script>
<!--===============================================================================================-->
<script src="vendor/DataTables/SB_Admin/dataTables.bootstrap4.js"></script>
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
				<!-- Contenido Home -->
				<div class="container-fluid">


					<!-- Navegacion por meses -->
					<?php
					$referencia = "Gastos";
					require_once 'templates/navegacion_meses.php';
					?>
					<div class="mb-4">
						<h1 class="h3 text-uppercase text-gray-800 text-center text-lg-left"><?= $month_current_t; ?> del año <?= $year_current; ?> </h1>
					</div>
					<!-- End Navegacion por meses -->








					<!-- Barra de tarjetas (TABS)-->
					<div id="tabs" class="mb-4">
						<nav class="navbar navbar-expand-lg navbar-light bg-gradient-success">
							<span class="navbar-brand text-white">Cuentas</span>
							<button class="navbar-toggler mb-2" type="button" data-toggle="collapse" data-target="#navbarCuentas" aria-controls="navbarCuentas" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarCuentas">
								<ul class="navbar-nav nav nav-tabs">
									<li class="nav-item">
										<a class="nav-link active" id="nav-resumen-tab" data-toggle="tab" href="#nav-resumen" role="tab" aria-controls="nav-resumen" aria-selected="true"><span class="p-3">Resumen</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="nav-efectivo-tab" data-toggle="tab" href="#nav-efectivo" role="tab" aria-controls="nav-efectivo" aria-selected="false">
											<sapan class="p-3">Efectivo</sapan>
										</a>
									</li>





									<!-- Tarjetas de Credito 1 -->
									<?php


									// CONSULTA GENERAL DE TARJETAS 
									$db = new class_ConnectDB();
									$query = " SELECT * FROM TARJETAS WHERE ID_USUARIO = '" . $_SESSION['ID_USUARIO'] . "'";
									$result = mysqli_query($db->con, $query);
									$data_cards = mysqli_fetch_all($result, MYSQLI_BOTH);
									// END CONSULTA GENERAL DE TARJETAS 


									// GENERAR LOS TABS DE TARJETAS DE CREDITO DE LA BARRA DE TARJETAS
									if (in_array("Credito", array_column($data_cards, 'TIPO'))) :
										for ($i = 0; $i < count($data_cards); $i++) :
											if ($data_cards[$i]["TIPO"] == "Credito") :
									?>

												<li class="nav-item">
													<a class="nav-link" id="nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>-tab" data-toggle="tab" href="#nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>" role="tab" aria-controls="nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>" aria-selected="false">
														<sapan class="p-3"><?= $data_cards[$i]["IDENTIFICADOR"] ?></sapan>
													</a>
												</li>


									<?php
											endif;
										endfor;
									endif;
									// GENERAR LOS TABS DE TARJETAS DE CREDITO DE LA BARRA DE TARJETAS
									?>
									<!-- End Tarjetas de Credito 1 -->





									<!-- Tarjetas de Debito 1 -->
									<?php
									// GENERAR LOS TABS DE TARJETAS DE CREDITO DE LA BARRA DE TARJETAS
									if (in_array("Debito", array_column($data_cards, 'TIPO'))) :
										for ($i = 0; $i < count($data_cards); $i++) :
											if ($data_cards[$i]["TIPO"] == "Debito") :
									?>

												<li class="nav-item">
													<a class="nav-link" id="nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>-tab" data-toggle="tab" href="#nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>" role="tab" aria-controls="nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>" aria-selected="false">
														<sapan class="p-3"><?= $data_cards[$i]["IDENTIFICADOR"] ?></sapan>
													</a>
												</li>
									<?php
											endif;
										endfor;
									endif;
									// GENERAR LOS TABS DE TARJETAS DE CREDITO DE LA BARRA DE TARJETAS
									?>
									<!-- End Tarjetas de Debito 1 -->
								</ul>
							</div>
						</nav>
					</div>
					<!-- End Barra de tarjetas (TABS)-->








					<!-- Contenido de tarjetas-->
					<div class="mb-4">
						<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-resumen" role="tabpanel" aria-labelledby="nav-resumen-tab">
								Resumen
							</div>
							<div class="tab-pane fade" id="nav-efectivo" role="tabpanel" aria-labelledby="nav-efectivo-tab">
								Efectivo
							</div>



							<!-- Tarjetas de Credito 2 -->
							<?php
							if (in_array("Credito", array_column($data_cards, 'TIPO'))) :
								for ($i = 0; $i < count($data_cards); $i++) :
									if ($data_cards[$i]["TIPO"] == "Credito") :


							?>


										<!-- Panel Credito por tarjeta -->

										<div class="tab-pane fade" id="nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>" role="tabpanel" aria-labelledby="nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>-tab">




											<!-- GASTOS o compras corrientes GASTOS-->

											<!-- Consulta de GASTOS o compras corrientes -->
											<?php
											$query = " SELECT GASTOS.*, DEUDORES.NOMBRE
														 FROM GASTOS 
														 LEFT JOIN DEUDORES ON GASTOS.ID_DEUDOR = DEUDORES.ID_DEUDOR
														 WHERE GASTOS.ID_USUARIO = '" . $_SESSION['ID_USUARIO'] . "' 
														 AND GASTOS.ID_TARJETA = '" . $data_cards[$i]["ID_TARJETA"] . "'
														 AND MONTH(GASTOS.FECHA_CARGO) = '$month_current'
														 AND YEAR(GASTOS.FECHA_CARGO) = '$year_current'";
											$result = mysqli_query($db->con, $query);
											$data_cards_expense = mysqli_fetch_all($result, MYSQLI_BOTH);
											?>
											<!-- Consulta de GASTOS o compras corrientes -->


											<!-- Car Tabla -->
											<div class="card shadow border-left-warning border-bottom-warning mb-1">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-warning text-center text-lg-left">Gastos corrientes del mes de la tarjeta <?= $data_cards[$i]["IDENTIFICADOR"] ?></h6>
												</div>
												<!-- Car Tabla -->
												<div class="card-body">
													<!-- Car Tabla Body -->
													<div class="table-responsive">
														<table class="table table-sm table-hover responsive" style="width: 100%;" id="<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>Gastos">
															<thead>
																<tr>
																	<th>N°</th>
																	<th>Fecha</th>
																	<th>Descripción</th>
																	<th>Monto</th>
																	<th>Deudor</th>
																</tr>
															</thead>
															<tbody>
																<?php
																if (count($data_cards_expense) >= 1) :
																	for ($j = 0; $j < count($data_cards_expense); $j++) :
																?>
																		<tr>
																			<td><?= $j + 1; ?></td>
																			<td><?= $data_cards_expense[$j]["FECHA_CARGO"] ?></td>
																			<td><?= $data_cards_expense[$j]["TITULO_CARGO"] ?></td>
																			<td> <?= $data_cards_expense[$j]["VALOR_CARGO"] ?> </td>
																			<td> <?= $data_cards_expense[$j]["NOMBRE"] ?> </td>
																		</tr>
																<?php
																	endfor;
																endif;
																?>
															</tbody>
														</table>
													</div>
													<!-- End Tabla Datatbles -->
												</div>
												<!-- End Card Tabla Body -->
											</div>
											<!-- End  Card Tabla -->
											<!-- End GASTOS o compras corrientes GASTOS -->









											<!--  DEUDAS --  DEUDAS  -->

											<!-- Consulta de DEUDAS -->
											<?php
											$query = "SELECT DEUDAS.*, DEUDORES.NOMBRE
													  FROM DEUDAS
											          LEFT JOIN DEUDORES ON DEUDAS.ID_DEUDOR = DEUDORES.ID_DEUDOR
											          WHERE DEUDAS.ID_USUARIO = '" . $_SESSION['ID_USUARIO'] . "' 
													  AND DEUDAS.ID_TARJETA = '" . $data_cards[$i]["ID_TARJETA"] . "'
													  AND DEUDAS.FECHA_ULTIMO_PAGO > '" . date("Y-m-t", strtotime($year_current . "-" . $month_current . "-" . getdate()["mday"])) . "' 
													  AND DEUDAS.FEHCA_PRIMER_PAGO <= '" . date("Y-m-t", strtotime($year_current . "-" . $month_current . "-" . getdate()["mday"])) . "' 
													  OR DEUDAS.FECHA_ULTIMO_PAGO IS NULL";

											$result = mysqli_query($db->con, $query);
											$data_cards_debts = mysqli_fetch_all($result, MYSQLI_BOTH);
											?>
											<!-- Consulta de DEUDAS -->



											<!-- Car Tabla -->
											<div class="card shadow border-left-primary border-bottom-primary">
												<div class="card-header py-3">
													<h6 class="m-0 font-weight-bold text-primary text-center text-lg-left">Deudas la tarjeta <?= $data_cards[$i]["IDENTIFICADOR"] ?></h6>
												</div>
												<!-- Car Tabla -->
												<div class="card-body">
													<!-- Car Tabla Body -->
													<div class="table-responsive">
														<table class="table table-sm table-hover responsive" style="width: 100%;" id="<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>Deudas">
															<thead>
																<tr>
																	<th>N°</th>
																	<th>Fecha original de compra</th>
																	<th>Descripción</th>
																	<th>Mensualidad</th>
																	<th>Deudor</th>
																</tr>
															</thead>
															<tbody>
																<?php
																if (count($data_cards_debts) >= 1) :
																	for ($k = 0; $k < count($data_cards_debts); $k++) :
																?>
																		<tr>
																			<?php
																			$finpago = new DateTime($data_cards_debts[$k]["FECHA_ULTIMO_PAGO"]);
																			$fechactual = new DateTime($year_current . "-" . $month_current . "-" . getdate()["mday"]);
																			$intervalo = $fechactual->diff($finpago);
																			$meses = $intervalo->format("%m");
																			$years = $intervalo->format("%y") * 12;
																			$mesesrestantes = $meses + $years;

																			

																			if ($data_cards_debts[$k]["NUMERO_PAGOS"] != 0) :
																				$leyendarestante = " (" . ($data_cards_debts[$k]["NUMERO_PAGOS"] - $mesesrestantes + 1)   . " de " . $data_cards_debts[$k]["NUMERO_PAGOS"] . ")";
																			else :
																				$leyendarestante = " (Pago Recurrente)";
																			endif;


																			?>
																			<td><?= $k + 1 ?></td>
																			<td><?= $data_cards_debts[$k]["FECHA_DEUDA"] ?></td>
																			<td><?= $data_cards_debts[$k]["TITULO_DEUDA"] . $leyendarestante ?></td>
																			<td> <?= $data_cards_debts[$k]["MONTO_MENSUALIDAD"] ?> </td>
																			<td> <?= $data_cards_debts[$k]["NOMBRE"] ?> </td>
																		</tr>
																<?php
																	endfor;
																endif;
																?>
															</tbody>
														</table>


													</div>
													<!-- End Tabla Datatbles -->
												</div>
												<!-- End Card Tabla Body -->
											</div>
											<!-- End  Card Tabla -->
											<!-- End DEUDAS --  DEUDAS  -->









										</div>
										<!-- End  Panel Credito por tarjeta -->










							<?php
									endif;
								endfor;
							endif;
							?>

							<!-- End Tarjetas de Credito 2 -->








							<!-- Tarjetas de Debito 2 -->
							<?php
							if (in_array("Debito", array_column($data_cards, 'TIPO'))) :
								for ($i = 0; $i < count($data_cards); $i++) :
									if ($data_cards[$i]["TIPO"] == "Debito") :
							?>

										<div class="tab-pane fade" id="nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>" role="tabpanel" aria-labelledby="nav-<?= str_replace(' ', '', $data_cards[$i]["IDENTIFICADOR"]) ?>-tab">
											<?= $data_cards[$i]["IDENTIFICADOR"] ?>
										</div>


							<?php
									endif;
								endfor;
							endif;
							?>
							<!-- End Tarjetas de Debito 2 -->



						</div>

					</div>
					<!-- End Contenido de tarjetas-->
















					<div class="row mb-4">

						<?php

						for ($i = 0; $i < count($data_cards); $i++) :
							$limit_credit = $data_cards[$i]['5'];
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
										<h6 class="m-0 font-weight-bold text-primary"><?= $data_cards[$i]['3'] ?></h6>
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



						<?php endfor; ?>
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
<script src="js/home.js"></script>
<!--===============================================================================================-->

</html>
<?php ob_end_flush(); ?>
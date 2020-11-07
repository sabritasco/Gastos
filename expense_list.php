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
	<!-- Content Wrapper -->
	<div id="wrapper">
		<?php require_once 'templates/sidebar.php'; ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<?php require_once 'templates/nav.php'; ?>
				<!-- Begin Page Content -->
				<!-- Contenido Expense List -->
				<div class="container-fluid">






					<!-- Navegacion por meses -->
					<?php
					$referencia = "Gastos";
					require_once 'templates/navegacion_meses.php';
					?>

					<div class="mb-4">
						<h1 class="h3 text-gray-800 text-center text-lg-left">Gastos del mes de <?= $month_current_t; ?> del año <?= $year_current; ?> </h1>
					</div>

					<!-- End Navegacion por meses -->





					<!-- Listado Deudores -->


					<!-- Tabla de deudas -->
					<div class="card shadow mb-4">
						<!-- Car Tabla -->
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Gastos</h6>
						</div>
						<!-- Car Tabla -->
						<div class="card-body">
							<!-- Car Tabla Body -->
							<div class="table-responsive">
								<!-- Tabla Datatbles -->
								<table class="table table-bordered table-hover responsive w-100" id="dataTable">

									<thead>
										<tr>
											<th>N°</th>
											<th>Fecha de la compra</th>
											<th>Compra</th>
											<th>Monto</th>
											<th>Deudor</th>
											<th>Medio de pago</th>

										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>N°</th>
											<th>Fecha de la compra</th>
											<th>Compra</th>
											<th>Monto</th>
											<th>Deudor</th>
											<th>Medio de pago</th>
										</tr>
									</tfoot>
									<tbody>


										<?php
										require_once 'class/ParametersDB.php';
										$db = new class_ConnectDB();
										$query = "SELECT GASTOS.FECHA_CARGO, GASTOS.TITULO_CARGO, GASTOS.VALOR_CARGO, DEUDORES.NOMBRE, TARJETAS.IDENTIFICADOR FROM GASTOS
										LEFT JOIN TARJETAS 
										ON GASTOS.ID_TARJETA = TARJETAS.ID_TARJETA
										LEFT JOIN DEUDORES 
										ON GASTOS.ID_DEUDOR = DEUDORES.ID_DEUDOR 
										WHERE GASTOS.ID_USUARIO = '" . $_SESSION['ID_USUARIO'] . "' AND MONTH(GASTOS.FECHA_CARGO) = '$month_current' AND YEAR(GASTOS.FECHA_CARGO) = '$year_current'";
										$result = mysqli_query($db->con, $query);
										$data = mysqli_fetch_all($result);


										if (count($data) >= 1) :
											for ($i = 0; $i < count($data); $i++) :
												$identificador = ($data[$i][4] == '') ? 'Efectivo' : $data[$i][4];
										?>
												<tr>
													<td> <?= $i + 1 ?></td>
													<td> <?= $data[$i][0] ?></td>
													<td> <?= $data[$i][1] ?></td>
													<td> <?= $data[$i][2] ?></td>
													<td> <?= $data[$i][3] ?></td>
													<td> <?= $identificador ?></td>
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
						<!-- End Car Tabla Body -->
					</div>
					<!-- End <!-- Car Tabla -->






					<!-- End Contenido Expense List -->
				</div>
				<!-- End of Main Content -->
			</div>
			<!-- End of Main Content -->
			<?php require_once 'templates/footer.php'; ?>
			<!-- End of Content Wrapper -->
		</div>
		<!-- End of Content Wrapper -->
		<!-- End of PMonto Wrapper -->
	</div>
	<!-- End of PMonto Wrapper -->
</body>
<!--===============================================================================================-->
<script src="js/main.js"></script>
<!--===============================================================================================-->
<script src="js/expense_list.js"></script>
<!--===============================================================================================-->

</html>
<?php ob_end_flush(); ?>
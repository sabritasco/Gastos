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




				<!-- Listado Deudores -->
				<div class="container-fluid">

					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Tarjetas</h1>
					</div>

					<!-- Row -->
					<div class="row">


						<?php
						require_once 'class/ParametersDB.php';
						$db = new class_ConnectDB();
						$query = " SELECT * FROM TARJETAS WHERE ID_USUARIO = '" . $_SESSION['ID_USUARIO'] . "'";
						$result = mysqli_query($db->con, $query);
						$data = mysqli_fetch_all($result);
						for ($i = 0; $i < count($data); $i++) :
						?>


							<div class="col-lg-6">
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary"><?= $data[$i]['3'] ?></h6>
									</div>
									<div class="card-body">
										Tipo: <?= $data[$i]['4'] ?>
										</br>
										Institución: <?= $data[$i]['9'] ?>
										</br>
										Tel. Institución: <?= $data[$i]['10'] ?>
									</div>
									<div class="card-footer">

										<a href="#1" class="btn btn-icon" title="Add charge" role="button">
											<i class="fas fa-plus"></i>
										</a>


										<a href="#1" class="btn btn-icon" title="Add debt" role="button">
											<i class="fas fa-calendar-plus"></i>
										</a>

										<a href="#1" class="btn btn-icon" title="Delete" role="button">
											<i class="fas fa-trash-alt"></i>
										</a>
									</div>
								</div>
							</div>


						<?php
						endfor;
						?>




						<!-- End Row -->
					</div>
				</div>
				<!-- End Listado Deudores -->




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
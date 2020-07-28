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
						<h1 class="h3 mb-0 text-gray-800">Debtors</h1>
					</div>

					<!-- Row -->
					<div class="row">




						<div class="col-xl-6 col-lg-6 card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Nombre:</h6>
							</div>
							<div class="card-body">
								<p>Tel: </p>
								<p>Correo: </p>
							</div>
							<div class="card-footer">
								Footer
							</div>
						</div>



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
<script src="js/debtors_list.js"></script>
<!--===============================================================================================-->

</html>
<?php ob_end_flush(); ?>
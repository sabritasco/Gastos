<?php require_once 'templates/head.php'; ?>
<!-- Adicionales -->
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/DataTables/datatables.min.css">
<!--===============================================================================================-->
<script src="vendor/DataTables/datatables.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/DataTables/SB_Admin/dataTables.bootstrap4.min.js"></script>
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




				<!-- Listado Deudores -->
				<div class="container-fluid">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Debtors</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Actions</th>
											<th>Name</th>
											<th>Mobile</th>
											<th>Email</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Actions</th>
											<th>Name</th>
											<th>Mobile</th>
											<th>Email</th>
										</tr>
									</tfoot>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
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
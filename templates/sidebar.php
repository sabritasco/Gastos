<!-- Sidebar -->
<ul id="accordionSidebar" class="sb-sidenav navbar-nav bg-gray-900 sidebar sidebar-dark accordion">

	<!-- Sidebar - Brand -->
	<span class="sidebar-brand d-flex align-items-center justify-content-center">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Gastos</div>
	</span>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">
	<!-- Nav Item - Dashboard -->

	<li class="nav-item">
		<a class="nav-link" href="home.php">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Panel Principal</span></a>
	</li>





	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading text-warning">
		Admón.
	</div>

	<!-- Debts -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseZero" aria-expanded="true" aria-controls="collapseOne">
			<i class="fas fa-dollar-sign"></i>
			<span>Gastos y Deudas
			</span>
		</a>
		<div id="collapseZero" class="collapse" aria-labelledby="headingZero" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Opciones:</h6>
				<a class="collapse-item" href="expense_capture.php">Capturar Gasto</a>
				<a class="collapse-item" href="debts_capture.php">Capturar Deuda</a>
				<a class="collapse-item" href="expense_list.php">Lista de Gastos</a>
				<a class="collapse-item" href="debts_list.php">Lista de Deudas</a>
			</div>
		</div>
	</li>
	<!-- End Debts -->


	<!-- Debtors -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			<i class="fas fa-user-friends"></i>
			<span>Deudores</span>
		</a>
		<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Opciones:</h6>
				<a class="collapse-item" href="debtors_list.php">Lista</a>
				<a class="collapse-item" href="debtors_capture.php">Capturar</a>
			</div>
		</div>
	</li>
	<!-- End debtors -->



	<!-- Cards -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-credit-card"></i>
			<span>Tarjetas</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Opciones:</h6>
				<a class="collapse-item" href="cards_list.php">Lista</a>
				<a class="collapse-item" href="cards_capture.php">Capturar</a>
			</div>
		</div>
	</li>
	<!-- End Cards -->


	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Addons
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
			<i class="fas fa-fw fa-folder"></i>
			<span>Pages</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Recursos:</h6>
				<a class="collapse-item" href="template.php">Template</a>
				<a class="collapse-item" href="#">Register</a>
				<a class="collapse-item" href="#">Forgot Password</a>
				<div class="collapse-divider"></div>
				<h6 class="collapse-header">Other Pages:</h6>
				<a class="collapse-item" href="#">404 Page</a>
				<a class="collapse-item" href="#">Blank Page</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link" href="charts.html">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Charts</span></a>
	</li>

	<!-- Nav Item - Tables -->
	<li class="nav-item">
		<a class="nav-link" href="tables.html">
			<i class="fas fa-fw fa-table"></i>
			<span>Tables</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>

<!-- End of Sidebar -->
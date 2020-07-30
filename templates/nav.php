<nav class="navbar navbar-expand navbar-dark bg-gray-900 topbar mb-4 static-top shadow border-left">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <span class="navbar-brand"><?php echo $title; ?></span>
   
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php if ($_SESSION['logged_in']) :
                        echo $_SESSION['NOMBRE'];
                    endif ?>
                </span>
                &nbsp;<img class="img-profile rounded-circle" src="images/sabritasco.jpg">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
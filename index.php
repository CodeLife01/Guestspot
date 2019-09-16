<?php
session_start();

$verified = false;

// Is the user logged in?
if(!isset($_SESSION['logged_in'])) {
    session_destroy();
    header('Location: login.inc.php');
}

// Is the previous session valid?
if ($_SESSION['ua'] != $_SERVER['HTTP_USER_AGENT'] . 'fable3') {
    session_destroy();
    header('Location: login.inc.php');
}

// Is the user verified?
if(isset($_SESSION['verified'])) {
    if($_SESSION['verified']) {
        $verified = true;
    }
    
}
require 'connect.inc.php';
  // Fetching Numbers Of Rows in Guest Info To Display In Current Visitors
    $result1 = mysqli_query($db, "SELECT * FROM guest_info");
    $rows = mysqli_num_rows($result1);
// Fetching Numbers Of Rows in Guest Records To Display In Visitors This Month
    $result2 = mysqli_query($db, "SELECT * FROM guest_record");
    $rows1 = mysqli_num_rows($result2);
// Fetching Numbers Of Rows in Guest Records To Display In Visitors This Month
    $result3 = mysqli_query($db, "SELECT * FROM user");
    $rows2 = mysqli_num_rows($result3);
    // Expire session here after 2 hours (user will be watching a movie, no point expiring before hand)
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UBA SAMARU</title>
<!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom style for url -- adding icon-->
  <link rel="shortcut icon" type="image/x-icon" href="image/ub.png">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"  style="background-color:#d51709;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">UBA SAMARU</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider my-0" style="background-color:white;">
       <!-- Nav Item - Register Guest -->
      <li class="nav-item active">
        <a class="nav-link" href="register.php">
          <i class="fas fa-registered"></i>
          <span>Register Guest</span></a>
      </li>
      <hr class="sidebar-divider my-0" style="background-color:white;">

      <!-- Nav Item - Guest Check Out -->
      <li class="nav-item active">
        <a class="nav-link" href="report.php">
          <i class="fas fa-check-square"></i>
          <span>Guest Check Out</span></a>
      </li>
      <hr class="sidebar-divider my-0" style="background-color:white;">
      <!-- Nav Item - Guest Report -->
      <li class="nav-item active">
        <a class="nav-link" href="report.php">
          <i class="fas fa-flag-checkered"></i>
          <span>Guest Report</span></a>
      </li>
      <hr class="sidebar-divider my-0" style="background-color:white;">
   

         <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          
        

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small" style="color:#d51709;">Admin</span>
                <img class="img-profile rounded-circle" src="image/ub.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color:#d51709;"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0" style="color:#d51709;">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Current Visitors -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1"style="color:#d51709;">Current Visitors</div>
                      <div class="h5 mb-0 font-weight-bold" style="color:#d51709;"><?php echo $rows;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Visitor This Month -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1"style="color:#d51709;">Visitors (This Month)</div>
                      <div class="h5 mb-0 font-weight-bold "style="color:#d51709;"><?php echo $rows1;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Guest Report Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1"style="color:#d51709;">Total Guest Report</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold"style="color:#d51709;"><?php echo $rows1;?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Active Operator Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#d51709;">Active Operator</div>
                      <div class="h5 mb-0 font-weight-bold "style="color:#d51709;"><?php echo $rows2;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

              

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-outline-danger" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

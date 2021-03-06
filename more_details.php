<?php
session_start();
require 'connect.inc.php';

if (isset($_GET["id"])) {
    try {
      $id = $_GET["id"];
      $sql = "SELECT * FROM guest_record WHERE id = $id";
      $result = $db->query($sql);
    }catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
      }
    }else{
        echo 'NOT OK...';
    }
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
        <a class="nav-link" href="checkout.php">
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
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 " style="color:#d51709;"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold" style="color:#d51709;">Guest Detail</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive"> 
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0" style="color:#d51709;">
                <?php 
                    while($row = $result->fetch_assoc()){
                    ?>
                <tr>
        <td>ID</td>
        <td><?php echo ($row["id"]); ?></td>
         </tr>
       <tr>
        <td>First Name</td>
        <td><?php echo ($row["firstName"]); ?></td>
        </tr>
        <tr>
        <td>Last Name</td>
        <td><?php echo ($row["lastName"]); ?></td>
        </tr>
        <tr>
        <td>Phone Number</td>
        <td><?php echo ($row["phoneNumber"]); ?></td>
        </tr>
        <tr>
        <td>Whom To See</td>
        <td><?php echo ($row["whomtosee"]); ?></td>
        </tr>
        <tr>
        <td>Address</td>
        <td><?php echo ($row["address"]); ?></td>
        </tr>
        <td>Purpose Of Visiting</td>
        <td><?php echo ($row["purpose"]); ?></td>
        </tr>
        <td>Time-In</td>
        <td><?php echo ($row["time_in"]); ?></td>
        </tr>
        <td>Time=Out</td>
        <td><?php echo ($row["time_out"]); ?></td>
        </tr>
        <tr>
        <td></td>
        <td>
            <a href='report.php' class='btn btn-outline-danger'>Back to Guest Records</a>
        </td>
        </tr>
        <?php } ?>
                </table>
              
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

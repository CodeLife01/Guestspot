<?php
session_start();
$errors = array(); 
// connect to the database
require 'connect.inc.php';

if(isset($_POST['submit'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $whomtosee = $_POST['whomtosee'];
  $phone = $_POST['phone'];
  $addr = $_POST['addr'];
  $pp = $_POST['pp'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { array_push($errors, "First Name is required"); }
  if (empty($lname)) { array_push($errors, "Last Name is required"); }
  if (empty($phone)) { array_push($errors, "phone Number is required"); }
  if (empty($whomtosee)) { array_push($errors, "Whom to see is required"); }
  if (empty($addr)) { array_push($errors, "Address is required"); }
  if (empty($pp)) { array_push($errors, "Purpose of visit is required"); }
  if ($whomtosee == 'choose...') {
	array_push($errors, "Whom to see is required");
  }
  if (count($errors) == 0) {
    $query = "INSERT INTO `guest_info` VALUES (NULL, '$fname', '$lname', '$phone', '$whomtosee', '$addr', '$pp', current_timestamp(), current_timestamp())";
    $result = mysqli_query($db, $query);
    //
    if(!$result){
      die("OOPPS! query failed".mysqli_error($db)); 
  }else{
    echo "<div class='alert alert-success alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Guest Check Out Succesful</strong>
  </div>";
  }
}

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
            <h1 class="h3 mb-0" style="color:#d51709;">Register Guest</h1>
          </div>

          <!-- Content Row -->
          <div class="align-items-center">
         <form method="POST" action="register.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label style="color:#d51709;">First Name</label>
                <input type="text" name="fname" class="form-control" id="inlineFormInputName" placeholder="Enter First Name..." required> 
                </div>
                <div class="form-group col-md-6">
                <label style="color:#d51709;">Last Name</label>
                <input type="text" name="lname" class="form-control" id="inlineFormInputName" placeholder="Enter Last Name..." required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label style="color:#d51709;">Phone Number</label>
                <input type="number" name="phone" class="form-control" id="inlineFormInputNumber" placeholder="Enter Number..." required>
                </div>
                <div class="form-group col-md-6">
                <label style="color:#d51709;">Whom To See</label>
                <select id="inlineForminputState" class="form-control" name="whomtosee" required>
                    <option selected></option>
                    <option>Manager</option>
                    <option>V.Manager</option>
                    <option>Customer Care</option>
                    <option>Mrs Hauwa</option>
                    <option>Mr Keen</option>
                </select>
                </div>
               <div class="form-group col-md-10">
                    <label style="color:#d51709;" >Address</label>
                    <textarea class="form-control" rows="2" name="addr" required></textarea>
                </div>

                <div class="form-group col-md-10">
                    <label style="color:#d51709;">Purpose Of Visit</label>
                    <textarea class="form-control" rows="2" name="pp" required></textarea>
                </div>
                </div>
        <button type="submit" name="submit" class="btn btn-outline-danger">Submit</button>
          </div>
            
        </form> 
        

              

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

<?php
require 'connect.inc.php';

/*try {
  $sql = "SELECT * FROM guest_record";
  $result = $db->query($sql);
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

*/

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
      $page_no = 1;
      }
      $total_records_per_page = 5;

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count = mysqli_query(
  $db,
  "SELECT COUNT(*) As total_records FROM `guest_record`"
  );
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
  $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total pages minus 1


  $result = mysqli_query(
    $db,
    "SELECT * FROM `guest_record` LIMIT $offset, $total_records_per_page"
    );

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GuestSpot</title>
<!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GuestSpot</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider my-0">
       <!-- Nav Item - Register Guest -->
      <li class="nav-item active">
        <a class="nav-link" href="register.php">
          <i class="fas fa-registered"></i>
          <span>Register Guest</span></a>
      </li>
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Guest Check Out -->
      <li class="nav-item active">
        <a class="nav-link" href="checkout.php">
          <i class="fas fa-check-square"></i>
          <span>Guest Check Out</span></a>
      </li>
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Guest Report -->
      <li class="nav-item active">
        <a class="nav-link" href="report.php">
          <i class="fas fa-flag-checkered"></i>
          <span>Guest Report</span></a>
      </li>
      <hr class="sidebar-divider my-0">


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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="image/pp.jpeg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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
              <h6 class="m-0 font-weight-bold text-primary">Guest DataTables</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Phone Number</th>
                      <th>Whom To See</th>
                      <th>Time In</th>
                      <th>Time Out</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php 
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                    <td><?php echo ($row["id"]); ?></td>
                    <td><?php echo ($row["firstName"]); ?></td>
                    <td><?php echo ($row["lastName"]); ?></td>
                    <td><?php echo ($row["phoneNumber"]); ?></td>
                    <td><?php echo ($row["whomtosee"]); ?></td>
                    <td><?php echo ($row["time_in"]); ?></td>
                    <td><?php echo ($row["time_out"]); ?></td>

                    <td><a href="more_details.php?id=<?php echo ($row["id"]); ?>"><button type="button" class="btn btn-success">More Details</button></a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
              </div>
              <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
              <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
              </div>
              <ul class="pagination">
              <?php if($page_no > 1){
              echo "<li><a href='?page_no=1'>First Page</a></li>";
              } ?>
                  
              <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>&nbsp;
              <a <?php if($page_no > 1){
              echo "href='?page_no=$previous_page'";
              } ?>>Previous</a>
              </li>
              &nbsp;
              <li <?php if($page_no >= $total_no_of_pages){
              echo "class='disabled'";
              } ?>>&nbsp;
              <a <?php if($page_no < $total_no_of_pages) {
              echo "href='?page_no=$next_page'";
              } ?> &nbsp;>Next</a>&nbsp;
              </li>&nbsp;
              
              <?php if($page_no < $total_no_of_pages){
              echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
              } ?>
              </ul>
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
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
require '../action.php';
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php');
	exit;
}

$noww = time(); // Checking the time now when home page starts.
if ($noww > $_SESSION['expire']) {
    session_destroy();
    header('Location: ../index.php');
}

    require '../../components/adminAside.php';
    require '../../components/adminNavbar.php';
    require '../../components/adminFooter.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tanzania ICT Awards | Nominator List</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- ata table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  </head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php echo $adminNav ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php echo $aside ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../adminPages/admnHome.php">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card-body table-responsive p-0">
      <a href="../report/announce_pdf.php" style="color:white; font-size:15px"><i style="color:white; font-size:15px" class="fas fa-print"></i> PRINT</a></br>
              <table id="table_id" class="display table table-hover text-nowrap">
                <thead style='color:white'>
                  <?php 
                  $id = $_GET['id'];
                  $nomineeDetails = "SELECT categories.name,wapendekezwa.companyName FROM wapendekezanawapendekezwa,categories,wapendekezwa WHERE wapendekezwa.id = wapendekezanawapendekezwa.pendekezwaID AND categories.id = wapendekezanawapendekezwa.categoriesFK AND pendekezaID = '$id'";
                  $nomineeDetails = $con->query($nomineeDetails);

                    if ($nomineeDetails->num_rows > 0) {
                        echo '<thead>
                        <tr>
                          <th class="th-sm">NO
                    
                          </th>
                          <th class="th-sm">Category
                    
                          </th>
                          <th class="th-sm">Company/Institution/Individual
                    
                          </th>
                        </tr>
                      </thead>
                        ';
                    }
                  ?>
                </thead>
                <tbody style='color:black'>
                  <?php 
                    $no = 1;
                    if ($nomineeDetails->num_rows > 0) {
                      while($row = $nomineeDetails->fetch_assoc()) {
                        $category = "{$row['name']}";
                        $pendekezwa = "{$row['companyName']}";				
                        echo "<tr>
                        <td>$no</td>
                        <td>$category</td>
                        <td>$pendekezwa</td>
                        </tr>
                        ";
                        $no++;
                      }
                    } else {
                      echo "<tr><td>No Nominators Yet</td></tr>";
                    }
                  ?>
                  </tr>
                </tbody>
              </table>

            <!-- /.card-body -->
          </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php echo $adminFooter;?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>

<!-- sript for ata table -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


<script>
$(document).ready( function () {
    $('#table_id').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search company",
        }
    });
} );
</script>
</body>
</html>
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
  <title>Tanzania ICT Awards | Dashboard</title>

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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $sql1 = "SELECT * FROM wapendekezwa";
                  $total_companies = mysqli_query($con,$sql1);
                  $total_companies = mysqli_num_rows($total_companies);
                ?>
                <h3><?php 
                echo $total_companies; ?></h3>

                <p>All Companies Nominated</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="../adminPages/companies.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
               <?php
                  $sql1 = "SELECT pendekezwaID FROM wapendekezanawapendekezwa WHERE status IN('confirmed','Approved','Announced')";
                  $total_Ncompanies = mysqli_query($con,$sql1);
                  $total_Ncompanies = mysqli_num_rows($total_Ncompanies);
                ?>
                <h3><?php 
                echo $total_Ncompanies ?></h3>
                <p>confirmed Companies</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="../adminPages/allconfirmed.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
               <?php 
                  $sql2 = "SELECT pendekezwaID FROM wapendekezanawapendekezwa WHERE status IN('Approved','Announced')";
                  $total_Ncompanies = mysqli_query($con,$sql2);
                  $total_Ncompanies = mysqli_num_rows($total_Ncompanies);
                ?> 
                <h3><?php 
                echo $total_Ncompanies ?></h3>
                <p>Approved Companies</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="../adminPages/approvedlist.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
               <?php 
                  $sql2 = "SELECT pendekezwaID FROM wapendekezanawapendekezwa WHERE status = 'Announced'";
                  $total_Acompanies = mysqli_query($con,$sql2);
                  $total_Acompanies = mysqli_num_rows($total_Acompanies);
                ?> 
                <h3><?php 
                echo $total_Acompanies ?></h3>
                <p>Announced Companies</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="../adminPages/announcedlist.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        </div>
        <!-- /.row -->
<br><br>
<h3>Nomination Summary</h3>
        <div class="row"> 
          <div class="col card-body table-responsive p-0">
          <table id="table_id" class="display table table-striped table-bordered dt-responsive  text-align">
                <thead style="color:white">
                  <?php 
                  $sql = "SELECT count(wapendekezanawapendekezwa.pendekezwaID) AS counta,wapendekezanawapendekezwa.categoriesFK,categories.name FROM categories INNER JOIN wapendekezanawapendekezwa ON categories.id = wapendekezanawapendekezwa.categoriesFK GROUP BY wapendekezanawapendekezwa.categoriesFK";
                  $results = $con->query($sql);

                    if ($results->num_rows > 0) {
                      echo '<tr>
                      <th>SN</th>
                      <th>Category</th>
                      <th>Total Companies</th>
                    </tr>';
                    }
                  ?>
                </thead>
                <tbody style="color:black">
                  <?php 
                    $NO = 1;
                    if ($results->num_rows > 0) {
                      while($row = $results->fetch_assoc()) {
                        $count=$row["counta"];
                        $cname=$row["name"];
                        
                        echo "<tr><td>" . $NO. "</td><td>". $cname."</td><td><a>$count</a></td>";
                        $NO++;
                      }
                    } else {
                      echo "<tr><td>No Records</td></tr>";
                    }
                  ?>
                  </tr>
                </tbody>
              </table>
          </div>
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
          searchPlaceholder: "Search category",
        }
    });
} );
</script>
</body>
</html>

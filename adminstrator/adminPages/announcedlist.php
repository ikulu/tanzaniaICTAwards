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
  <title>Tanzania ICT Awards | Approved Companies</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!--EXCEL DOCUMENT-->
  <script type="text/javascript" src="downloadFile.js"></script>

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
            <h1 class="m-0">Announced Companies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../adminPages/admnHome.php">Home</a></li>
              <li class="breadcrumb-item active">Approved Companies</li>
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
      <button onclick="exportData()">
        EXPORT EXCEL
      </button>
      <table id="tblStocks" class="display table table-hover text-nowrap">
                <thead style='color:white'>
                  <?php 
                  $nomineeTypeName = "SELECT wapendekezwa.companyName,wapendekezanawapendekezwa.id,wapendekezanawapendekezwa.status,categories.name FROM wapendekezwa INNER JOIN wapendekezanawapendekezwa ON wapendekezwa.id=wapendekezanawapendekezwa.pendekezwaID INNER JOIN categories ON categories.id = wapendekezanawapendekezwa.categoriesFK WHERE wapendekezanawapendekezwa.status IN('Announced')";
                  $normineeName = $con->query($nomineeTypeName);

                    if ($normineeName->num_rows > 0) {
                      echo '<tr>
                      <th>No</th>
                      <th>Full Name</th>
                      <th>Category</th>
                      </tr>';
                    }
                  ?>
                </thead>
                <tbody style="color:black">
                  <?php 
                  function add_or_update_params($url,$key,$value){
                    $a = parse_url($url);
                    $query = $a['query'] ? $a['query'] : '';
                    parse_str($query,$params);
                    $params[$key] = $value;
                    $query = http_build_query($params);
                    $result = '';
                    if($a['path']){
                        $result .=  $a['path'];
                    }
                    if($query){
                        $result .=  '?' . $query;
                    }
                    return $result;
                  }
                
                $url1 = '../../app/action.php?moreAnnounce=0';
                $forLink = 0;

                    $NO = 1;
                    $link = '';
                    $class = 'class="btn btn-primary"type="button" data-toggle="modal" data-target="#exampleModal"';
                    if ($normineeName->num_rows > 0) {
                      while($row = $normineeName->fetch_assoc()) {
                        $Nnamee = $row["companyName"];
                        $Cname = $row["name"];
                        $forLink = $row["id"];
                        $url = add_or_update_params($url1,'more',$forLink);
                        $link = 'href="'.$url.'"';
                        $status = $row["status"];
                        echo "<tr><td>" . $NO. "</td><td>". $Nnamee."</td><td>". $Cname."</td>";
                        $NO++;
                      }
                    } else {
                      echo "<tr><td>No Company announced</td></tr>";
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
    $('#tblStocks').DataTable({
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

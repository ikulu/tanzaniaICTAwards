<?php
    require '../../app/action.php';
    require '../../components/adminAside.php';
    require '../../components/adminNavbar.php';
    require '../../components/adminFooter.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tanzania ICT Awards | Companies</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
            <h1 class="m-0">Norminated Companies</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admnHome.php">Home</a></li>
              <li class="breadcrumb-item active">Norminated Companies</li>
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
              <table id="table_id" class="display table table-hover text-nowrap">
                <thead>
                  <?php 
                  $sql = "SELECT category,pendekezwa FROM confirmedNorminees";
                  $results = $con->query($sql);

                    if ($results->num_rows > 0) {
                      echo '<tr>
                      <th>No</th>
                      <th>Company Name</th>
                      <th>Category</th>
                      <th>Action</th>
                      </tr>';
                    }
                  ?>
                </thead>
                <tbody>
                  <?php 
                    $NO = 1;
                    $more = "<select>
                    <option>Select</option>
                    <option>Notify</option>
                    <option>Dis Qualify</option>
                    </select>"; 
                    if ($results->num_rows > 0) {
                      while($row = $results->fetch_assoc()) {
                        $compnyName = $row["companyName"];
                        $normineeTypeID=$row["normineetypeFK"];
                        $category = $row["name"];
                        $categoriesFK = $row["categoriesFK"];
                       
                        $nomineeTypeName = "SELECT name FROM normineeType WHERE id = '$normineeTypeID'";
                        $normineeName = $con->query($nomineeTypeName);
                        if($normineeName->num_rows > 0){
                          while($normineeNames = $normineeName->fetch_assoc()){
                            $Nnamee = $normineeNames["name"];
                          }
                        }
                        
                        echo "<tr><td>" . $NO. "</td><td>". $compnyName."</td><td>".$category."</td><td><a>$more</a></td>";
                        $NO++;
                      }
                    } else {
                      echo "<tr><td>No Active Ad at the moment...</td></tr>";
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
</body>
</html>

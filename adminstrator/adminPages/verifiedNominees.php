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
  <title>Tanzania ICT Awards | Verified Nominees</title>

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
            <h1 class="m-0">Verified Nominees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./admnHome.php">Home</a></li>
              <li class="breadcrumb-item active">Verified Nominees</li>
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
                  $results = mysqli_query($con, "SELECT wapendekezanawapendekezwa.pendekezwaID,verify.name AS vname,verify.vtime,categories.name From categories INNER JOIN wapendekezanawapendekezwa ON categories.id = wapendekezanawapendekezwa.categoriesFK INNER JOIN wapendekezwa ON wapendekezwa.id = wapendekezanawapendekezwa.pendekezwaID INNER JOIN verify ON wapendekezwa.id = verify.wapendekezwa_fk");
                  
                    if ($results->num_rows > 0) {
                      echo '<tr>
                      <th>No</th>
                      <th>Full Name</th>
                      <th>Verification Time</th>
                      <th>Category</th>
                      <th>Action</th>
                      </tr>';
                    }
                  ?>
                  <a href='./verifiedNominees.php' id='myBtn'> name try</a>
                </thead>
                <tbody  style='color:black'>
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
              
                  $url1 = '../action.php?moreVerified=0';
                  $forLink = 0;
                  $more = 'View';
                  $NO = 1;
                  $link = '';
                  $class = 'class="btn btn-primary"type="button"';
                  
                    if ($results->num_rows > 0) {
                      while($data = mysqli_fetch_array($results)){
                        $time = $data['vtime'];
                        $forLink = $data["pendekezwaID"];
                        $url = add_or_update_params($url1,'more',$forLink);
                        $link = 'href="'.$url.'"';
                        $class = "class='btn btn-primary'";
                        echo "<tr><td>" .$NO. "</td><td>". $data['vname']."</td><td>". $time ."</td><td>". $data['name']."</td><td><a $class $link>View</a></td>";
                        $NO++;
                      }
                    } else {
                      echo "<tr><td>No Company nominated</td></tr>";
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
   <!--php echo $adminFooter;?--> 
</div>
<!-- ./wrapper -->

<!-- Modal  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"-->
<div class="modal" id="myModal" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Register Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $_GET['id']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

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

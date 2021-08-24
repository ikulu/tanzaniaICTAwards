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

$url1 = '../action.php?moreApprove=0';
$more = "Approve";
$forLink = 0;

    $q = $_GET['q'];
    $sql="SELECT DISTINCT(wapendekezanawapendekezwa.pendekezwaID),wapendekezwa.companyName,wapendekezanawapendekezwa.id FROM wapendekezanawapendekezwa,wapendekezwa WHERE wapendekezwa.id = wapendekezanawapendekezwa.pendekezwaID AND wapendekezanawapendekezwa.status = 'confirmed' AND wapendekezanawapendekezwa.categoriesFK = '$q'";
 

    $result = mysqli_query($con,$sql);
    $id="table_id";
    $cls = 'display table table-hover text-nowrap';
    $cardheader = 'card-header';
    $cardtitle = 'card-title';
    $margin = 'margin-left:90px';
    $card = 'card-body table-responsive p-0';
 
    echo '
  </div>
  <!-- /.card-header -->
  <div class="$card">';
    echo "<table id='$id' class='$cls'>
    <thead>
    ";
    $num = $result->num_rows;
    if ($result->num_rows > 0) {
      echo '<tr>
      <th>No</th>
      <th>Company Name</th>
      <th>Approve Companies</th>
      <th>'.$num.'</th>
    </tr>';
    }
    echo "
    </thead>
    <tbody>";
    $NO = 1;
    $link = '';
    
    if ($result->num_rows > 0) {
      while($row = mysqli_fetch_array($result)) {
        $forLink = $row["id"];
        $url = add_or_update_params($url1,'more',$forLink);
        $link = 'href="'.$url.'"';
        $class = 'class="btn btn-primary"type="button" data-toggle="modal" data-target="#exampleModal"';
        echo "<tr><td>" . $NO. "</td><td>". $row["companyName"]."</td><td><button $class>$more</button></td><td>";
        $NO++;
      }
    }else{ 
      echo '<tr><td>No Company Confirmed for this category yet</td></tr>';
    }
    echo "  </tr>
    </tbody>
  </table>";
?>
<html>
<head>
  <!-- ata table -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<head>
<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to confirm and send email notification to this company?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <?php echo '<a '.$link.'>Confirm </a>' ?>
            <!-- <button type="button" class="btn btn-primary">Confirm</button> -->
        </div>
        </div>
    </div>
    </div>

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
          searchPlaceholder: "Search catgory/company",
        }
    });
} );
</script>
</body>

</html>
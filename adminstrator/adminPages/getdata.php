<html>
<head>
    <!-- ata table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    
</head>
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

$url1 = '../action.php?moreConfirm=0';
$forLink = 0;

    $q = $_GET['q'];
    $sql="SELECT DISTINCT(wapendekezanawapendekezwa.pendekezwaID),wapendekezwa.companyName,wapendekezanawapendekezwa.pendekezwaID,wapendekezanawapendekezwa.id,wapendekezanawapendekezwa.status FROM wapendekezanawapendekezwa,wapendekezwa WHERE wapendekezwa.id = wapendekezanawapendekezwa.pendekezwaID AND wapendekezanawapendekezwa.categoriesFK = '$q'";
    
    $result = mysqli_query($con,$sql);
    
    $cls = 'display table table-hover text-nowrap';
    $id="tblStocks";

    $cardheader = 'card-header';
    $cardtitle = 'card-title';
    $margin = 'margin-left:90px';
    $card = 'card-body table-responsive p-0';
    echo '
  </div>
  <!-- /.card-header -->
  <div class="$card">';
    echo "<table id='$id' class='$cls'>
    <thead style='color:white'>
    ";
    $num = $result->num_rows;
    
    if ($result->num_rows > 0) {
      echo "<tr>
      <th>No</th>
      <th>Company/Institution/Individual</th>
      <th>Details</th>
      <th>Confirm</th>
    </tr>";
    }
    echo "
    </thead>
    <tbody style='color:white'>";
    $NO = 1;
    $link = '';
    
    if ($result->num_rows > 0) {
      while($row = mysqli_fetch_array($result)) {
        $IDID = $row["pendekezwaID"];
        $forLink = $row["id"];
        $url = add_or_update_params($url1,'more',$forLink);
        $link = 'href="'.$url.'"';
        $button = "href='./norminatedPerCategoryDetails.php?id=$IDID' class='btn btn-success'";
        $status = $row["status"];
        if($status == 'confirmed' || $status == 'Approved'|| $status == 'Announced'){
          $class = 'class="btn btn-danger" type="button" style="pointer-events: none;
          cursor: default;"';
          $more = "Confirmed";
        }else{
          $more = "Confirm";
          $class = 'class="btn btn-primary"type="button"';
        }
        echo "<tr><td>" . $NO. "</td><td>". $row["companyName"]."</td><td><a $button>View <i class='fa fa-eye' aria-hidden='true'></i></a>"."</td><td><a $class $link>$more</a></td>";
        $NO++;
      }
    }else{
      echo '<tr><td>No Company nominated for that category yet</td></tr>';
    }
    echo "  </tr>
    </tbody>
  </table>";
?>
<body>

<!-- sript for ata table -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


<script>
  function exportData(){
    alert('clicked');
  }

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
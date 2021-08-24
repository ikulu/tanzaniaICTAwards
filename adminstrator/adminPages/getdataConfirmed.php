
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
    $sql="SELECT wapendekezanawapendekezwa.pendekezwaID,wapendekezwa.companyName,wapendekezanawapendekezwa.id,wapendekezanawapendekezwa.status FROM wapendekezanawapendekezwa,wapendekezwa WHERE wapendekezwa.id = wapendekezanawapendekezwa.pendekezwaID AND wapendekezanawapendekezwa.categoriesFK = '$q' AND wapendekezanawapendekezwa.status IN ('confirmed','Approved','Announced')";
  
    $result = mysqli_query($con,$sql);
  
    $cls = 'display table table-hover text-nowrap';
    $cardheader = 'card-header';
    $cardtitle = 'card-title';
    $margin = 'margin-left:90px';
    $card = 'card-body table-responsive p-0';
  
    echo '
  </div>
  <!-- /.card-header -->
  <div class="$card">';
    echo "<table class='$cls'>
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
        $status = $row["status"];
        if($status == 'Approved' || $status == 'Announced'){
          $class = 'class="btn btn-danger" type="button" style="pointer-events: none;
          cursor: default;"';
          $more = "Approved";
        }else{
          $more = "Approve";
          $class = 'class="btn btn-primary"type="button"';
        }
        // $class = 'class="btn btn-primary"type="button" data-toggle="modal" data-target="#exampleModal"';
        echo "<tr><td>" . $NO. "</td><td>". $row["companyName"]."</td><td><a $link $class>$more</a></td><td>";
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
<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Approve</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to Approve?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <?php echo '<a '.$link.'>Approve</a>' ?>
        </div>
        </div>
    </div>
    </div>
</body>
</html>
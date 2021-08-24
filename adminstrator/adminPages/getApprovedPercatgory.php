
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

$url1 = '../action.php?moreAnnounce=0';
$more = "Approve";
$forLink = 0;

    $q = $_GET['q'];
    $sql = "SELECT wapendekezwa.companyName,wapendekezanawapendekezwa.id,wapendekezanawapendekezwa.status FROM wapendekezwa INNER JOIN wapendekezanawapendekezwa ON wapendekezwa.id=wapendekezanawapendekezwa.pendekezwaID WHERE wapendekezanawapendekezwa.categoriesFK = '$q' AND wapendekezanawapendekezwa.status IN('Approved','Announced')";
    
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
        if($status == 'Announced'){
          $class = 'class="btn btn-danger" type="button" style="pointer-events: none;
          cursor: default;"';
          $more = "Announced";
        }else{
          $more = "Announce";
          $class = 'class="btn btn-primary"type="button"';
        }
        echo "<tr><td>" . $NO. "</td><td>". $row["companyName"]."</td><td><a $link $class>$more</a></td><td>";
        $NO++;
      }
    }else{
        echo '<tr><td>No Company Approved for this category yet</td></tr>';
    }
    echo "  </tr>
    </tbody>
  </table>";
?>

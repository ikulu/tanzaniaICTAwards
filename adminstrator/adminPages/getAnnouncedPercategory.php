
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
    $q = $_GET['q'];
    $sql = "SELECT wapendekezwa.companyName,wapendekezanawapendekezwa.pendekezwaID FROM wapendekezwa INNER JOIN wapendekezanawapendekezwa ON wapendekezwa.id=wapendekezanawapendekezwa.pendekezwaID WHERE wapendekezanawapendekezwa.categoriesFK = '$q' AND wapendekezanawapendekezwa.status = 'Announced'";
    
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
      <th>Company/Institution/Individual</th>
      <th>Details</th>
      <th>'.$num.'</th>
    </tr>';
    }
    echo "
    </thead>
    <tbody>";
    $NO = 1;
    if ($result->num_rows > 0) {
      while($row = mysqli_fetch_array($result)) {
        $IDID = $row["pendekezwaID"];
        $button = "href='./norminatedPerCategoryDetails.php?id=$IDID' class='btn btn-success'";
        echo "<tr><td>" . $NO. "</td><td>". $row["companyName"]."</td><td><a $button>View <i class='fa fa-eye' aria-hidden='true'></i></a>"."</td>";
        $NO++;
      }
    }else{
      echo '<tr><td>No Company Announced for this category yet</td></tr>';
    }
    echo "  </tr>
    </tbody>
  </table>";
?>

<?php
$server="localhost";
$db="ictctz_awards";
$host="root";
$pwd="";
$con = mysqli_connect("$server","$host","$pwd","$db");
if(!$con){
    echo "Server is offline.. comeback later!";
}
?>


<?php
<<<<<<< HEAD
$server="localhost";
$db="awards2021";
$host="root";
$pwd="";
$con = mysqli_connect("$server","$host","$pwd","$db");
// mysqli_query($con, "CREATE DATABASE $db");
// $mysqli= new mysqli("$server","$host","$pwd","$db");
$yes=mysqli_select_db($con, "$db");
if(!$yes){
 echo"Server is offline.. comeback later!";
}

?>
=======
// $server="localhost";
// $db="ictctz_awards2021";
// $host="ictctz_clausevn";
// $pwd="nicholaus12345678910";
// $con=mysqli_connect("$server","$host","$pwd");
// $mysqli= new mysqli("$server","$host","$pwd","$db");
// $yes=mysqli_select_db($con, "$db");
// if(!$yes){
//  echo"Server is offline.. comeback later!";
// }

$server="localhost";
$db="ictctz_awards2021";
$host="ictctz_neema36";
$pwd="faraja36";
$con = mysqli_connect("$server","$host","$pwd","$db");
if(!$con){
    echo "Server is offline.. comeback later!";
}
?>
>>>>>>> d8315d1 (commited 24/08/2021)

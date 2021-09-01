<?php
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
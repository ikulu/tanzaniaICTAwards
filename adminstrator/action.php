<?php
require 'default.php';
session_start();

// register kampuni zanazopendekezwa
if(isset($_POST['RegisterCompany'])){
	$cname = trim($_POST['cname']);
	$cemail = trim($_POST['cemail']);
	$cphone = trim($_POST['cphone']);
	$ctype = trim($_POST['type']);

	//validation for the inputs 
	if($cname == ""){
		echo '<script language="javascript">';
        echo 'alert("Company name is required");location.href="./adminPages/companies.php";';
        echo '</script>';	
	}

	if($cemail == ""){
		echo '<script language="javascript">';
        echo 'alert("Email Field is required");location.href="./adminPages/companies.php";';
        echo '</script>';	
	}

	if($cphone == ""){
		echo '<script language="javascript">';
        echo 'alert("Company Phone number is required");location.href="./adminPages/companies.php";';
        echo '</script>';	
	}
	if($ctype == ""){
		echo '<script language="javascript">';
        echo 'alert("Company Type is required");location.href="./adminPages/companies.php";';
        echo '</script>';	
	}

	$sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,status,type) VALUES ('$cname', '$cemail', '$cphone', 'Active' ,'$ctype')";
	if ($con->query($sql) === TRUE) {
		echo '<script language="javascript">';
        echo 'alert("Saccesful registered new company");location.href="./adminPages/companies.php";';
        echo '</script>';	
	} else {
		echo '<script language="javascript">';
        echo 'alert("Sever temporal Offline, Please comeback later!");location.href=".adminPages/companies.php";';
        echo '</script>';	
	}
}

// log in
if(isset($_POST['login'])){
	$user = $_POST['email'];
	$pwd = $_POST['password'];
    
    if($user == "" || $pwd == ""){
        echo '<script language="javascript">';
        echo 'alert("Please Feed all Required Fields");location.href="./index.php";';
        echo '</script>';
    }
	$queryOne = "SELECT * FROM admins WHERE email = '$user' AND password = '$pwd'";
    $query_runOne = mysqli_query($con,$queryOne);

    $upOne = mysqli_num_rows($query_runOne); 
    if($upOne > 0){
        session_regenerate_id();
        $_SESSION['loggedin'] = true;
        $_SESSION['start'] = time(); // Taking now logged in time.
        $_SESSION['expire'] = $_SESSION['start'] + (720 * 60);// Ending a session in 12 hrs from the starting time.

		while($rows = mysqli_fetch_array($query_runOne)){
			$_SESSION['USER_NAME'] = "{$rows['name']}";
			$_SESSION['USERID'] = "{$rows['id']}";				
		}
	  header('location:./adminPages/admnHome.php');
    }else{
		echo '<script language="javascript">';
        echo 'alert("Username or password is incorrect");location.href="./index.php";';
        echo '</script>';
    } 

}
//log in ends

// log out
if(isset($_GET['out_admin'])){
    echo 'log out';
    session_start();
	session_destroy();
    header("Location: ./index.php");
}
//LOG OUT ENDS

//send email and confirm approved
if(isset($_GET['moreConfirm'])){
    $id = $_REQUEST['more'];
	$qry = "UPDATE wapendekezanawapendekezwa SET status = 'confirmed' WHERE id = '$id'";
    $query_runOne = mysqli_query($con,$qry);
	echo '<script language="javascript">';
    echo 'alert("Confirmed");location.href="./adminPages/norminatedPerCategory.php";';
    echo '</script>';
}

//send email and Approve approved
if(isset($_GET['moreApprove'])){
    $id = $_REQUEST['more'];
	$qry = "UPDATE wapendekezanawapendekezwa SET status = 'Approved' WHERE id = '$id'";
    $query_runOne = mysqli_query($con,$qry);
	echo '<script language="javascript">';
    echo 'alert("Approved");location.href="./adminPages/morminees.php";';
    echo '</script>';
}

//Announ ompanis
if(isset($_GET['moreAnnounce'])){
    $id = $_REQUEST['more'];
	$qry = "UPDATE wapendekezanawapendekezwa SET status = 'Announced' WHERE id = '$id'";
    $query_runOne = mysqli_query($con,$qry);
	echo '<script language="javascript">';
    echo 'alert("Announced");location.href="./adminPages/morminees.php";';
    echo '</script>';
}

?>
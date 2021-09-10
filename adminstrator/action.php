<?php
require 'default.php';
session_start();

$verify = "verify";
mysqli_query($con, "CREATE TABLE IF NOT EXISTS $verify (
    id int(200) NOT NULL,
    name varchar(255) NOT NULL,
    url varchar(255) DEFAULT NULL,
    phone varchar(10) NOT NULL,
    descr varchar(500) NOT NULL,
    vtime datetime NOT NULL,
    filee varchar(255) COLLATE utf8_unicode_ci,
    wapendekezwa_fk int(11) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

mysqli_query($con,"ALTER TABLE $verify ADD PRIMARY KEY (id),ADD KEY pendekezwaID (wapendekezwa_fk);");
mysqli_query($con,"ALTER TABLE $verify MODIFY id int(200) NOT NULL AUTO_INCREMENT;");
mysqli_query($con,"ALTER TABLE $verify ADD CONSTRAINT mpendekezwafk_1 FOREIGN KEY (wapendekezwa_fk) REFERENCES wapendekezwa (id);");

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

//delete nominator
if(isset($_GET['moreNominatorDelete'])){
    $id = $_REQUEST['more'];
    $qry = "DELETE wapendekezwa,wapendekezanawapendekezwa FROM wapendekezwa INNER JOIN wapendekezanawapendekezwa ON wapendekezanawapendekezwa.pendekezwaID = wapendekezwa.id WHERE wapendekezanawapendekezwa.pendekezaID = $id";
    $qry2 = "DELETE FROM wapendekeza WHERE id = $id";
    if(mysqli_query($con,$qry) && mysqli_query($con,$qry2)){
        echo '<script language="javascript">';
        echo 'alert("Deleted");location.href="./adminPages/nominatorlist.php";';
        echo '</script>';
    }else{
        echo '<script language="javascript">';
        echo 'alert("Something went wrong");';
        echo '</script>';
    }
}

//delete user
if(isset($_GET['moreUserDelete'])){
    $id = $_REQUEST['more'];
    $qry = "DELETE FROM admins WHERE id = $id";
    if(mysqli_query($con,$qry)){
        echo '<script language="javascript">';
        echo 'alert("User Deleted");location.href="./adminPages/users.php";';
        echo '</script>';
    }else{
        echo '<script language="javascript">';
        echo 'alert("Something went wrong");';
        echo '</script>';
    }
}

//update nominators
if(isset($_GET['moreAnnounce'])){
    $id = $_REQUEST['more'];
	$qry = "UPDATE wapendekezanawapendekezwa SET status = 'Announced' WHERE id = '$id'";
    $query_runOne = mysqli_query($con,$qry);
	echo '<script language="javascript">';
    echo 'alert("Announced");location.href="./adminPages/morminees.php";';
    echo '</script>';
}

//update category
if(isset($_POST['moreCategoryUpdate'])){
    $cname = $_POST['categoryN'];
    $id = $_GET['id'];
	$qry = "UPDATE categories SET name = '$cname' WHERE id = '$id'";
    $query_runOne = mysqli_query($con,$qry);
	echo '<script language="javascript">';
    echo 'alert("Category Updated");location.href="./adminPages/categories.php";';
    echo '</script>';
}

//get nominators
if(isset($_GET['moreNominees'])){
    $id = $_REQUEST['more'];
	header("Location: ./adminPages/nominatorslistDetails.php?id=$id");
}

//get verified nominators
if(isset($_GET['moreVerified'])){
    $id = $_REQUEST['more'];
	header("Location: ./adminPages/verifiedNomineesList.php?id=$id");
}

//Update category
if(isset($_GET['moreCategoryUpdate'])){
    $id = $_REQUEST['more'];
	header("Location: ./adminPages/updateCategory.php?id=$id");
}

//View perticula users
if(isset($_GET['moreUsers'])){
    $id = $_REQUEST['more'];
	header("Location: ./adminPages/usersDetails.php?id=$id");
}

//View individual category
if(isset($_GET['moreCategory'])){
    $id = $_REQUEST['more'];
	header("Location: ./adminPages/categoryDetails.php?id=$id");
}

// Save users
if(isset($_POST['saveUser'])){
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = "ictAwards2021";

    $sqll = "INSERT INTO admins (name,phone,email,password) VALUES ('$name','$phone','$email','$password')";
    if ($con->query($sqll) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("User registered successful!");location.href="./adminPages/categories.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Sever is temporal Offline, Please comeback later!");location.href="./adminPages/categories.php";';
        echo '</script>';
    }
}

// Save Sector
if(isset($_POST['saveSector'])){
    $name = trim($_POST['name']);
    $awards = trim($_POST['awards']);
    $sqll = "INSERT INTO sector (name,awardsFK) VALUES ('$name','$awards')";
    if ($con->query($sqll) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Sector registered successful!");location.href="./adminPages/categories.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Sever is temporal Offline, Please comeback later!");location.href="./adminPages/categories.php";';
        echo '</script>';
    }
}

// Save Category
if(isset($_POST['saveCategory'])){
    $name = trim($_POST['name']);
    $sector = trim($_POST['sector']);
    $sqll = "INSERT INTO categories (name,sectorFK) VALUES ('$name','$sector')";
    if ($con->query($sqll) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Category registered successful!");location.href="./adminPages/categories.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Sever is temporal Offline, Please comeback later!");location.href="./adminPages/categories.php";';
        echo '</script>';
    }
}

// Save users
if(isset($_POST['saveUser'])){
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = "ictAwards2021";

    $sqll = "INSERT INTO admins (name,phone,email,password) VALUES ('$name','$phone','$email','$password')";
    if ($con->query($sqll) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("User registered successful!");location.href="./adminPages/users.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Sever is temporal Offline, Please comeback later!");location.href="./adminPages/users.php";';
        echo '</script>';
    }
}

// Change users Password
if(isset($_POST['changeUserPassword'])){
    $passNew = trim($_POST['pnew']);
    $passOld = trim($_POST['pold']);
    $id = $_SESSION['USERID'];
    // $password = "ictAwards2021";
    
    $qry = "UPDATE admins SET password = '$passNew' WHERE id = '$id'";
    if ($con->query($qry) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Password updated successful!");location.href="./adminPages/admnHome.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Sever is temporal Offline, Please comeback later!");location.href="./adminPages/admnHome.php";';
        echo '</script>';
    }
}

if(isset($_POST["verify"])){
    $t=time();
    $name = $_POST['name'];
    $url = $_POST['url'];
    $phone = $_POST['phone'];
    $descr = $_POST['descr'];
    $time = date("Y-m-d",$t);
    if($_GET['id'] != ''){
        $wapendekezwaFK = $_GET['id'];
    }
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = "INSERT INTO verify (name,url,phone,descr,vtime,filee,wapendekezwa_fk) VALUES ('$name','$url','$phone','$descr','$time','$fileName','$wapendekezwaFK')";
            $inserted = $con->query($sql);
            if($inserted){
                echo "done \n<a href='../index.php'>Continue browsing</a>";
                // echo "<script language='javascript'>";
                // echo "alert('Congratulations!!\nYou have Successfully Verified');location.href='../confirm/confirm.php';";
                // echo "</script>";
            }else{
                echo "Something went wrong.<a href='../confirm/confirm.php'>Go back</a>";
                // echo '<script language="javascript">';
                // echo 'alert("Something went wrong, please come back later.");location.href="../confirm/confirm.php";';
                // echo '</script>';
            }        
        }else{
            echo "Sorry, there was an error uploading your file.";
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GF, & PDF files are allowed to upload.';
        echo "<script type='text/javascript'>alert('$statusMsg');</script>";
        // header("Location: ../confirm/confirm.php");
    }
}
?>
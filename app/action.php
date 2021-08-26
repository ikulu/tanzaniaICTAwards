<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

require '../adminstrator/default.php';
session_start();

$mail = new PHPMailer(true);

//retrieve nomination
if(isset($_POST['getNomination'])){
	$email = trim($_POST['email2']);
    $codes = rand(100000,999999);
    //check if email exists
    $select = mysqli_query($con,"SELECT 'email' FROM wapendekeza WHERE email = '$email'");
	if(mysqli_num_rows($select)) {
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;         
            $mail->isSMTP();                               
            $mail->Host       = 'smtp.gmail.com';     
            $mail->SMTPAuth   = true;                      
            $mail->Username   = 'clausevee@gmail.com';
            $mail->Password   = 'nicholaus12345678910';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //'tls'
            $mail->Port       = 465;                     

            //Recipients
            $mail->setFrom('clausevee@gmail.com', 'ICT Awards2021');
            $mail->addAddress($email, $name);
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'ICT Awards2021 Email Verification Code';
            $mail->Body    = 'Hi..! <b>'.$name.'</b><br>
            Here is your email verification code <br><br><br><br>
            '.$codes;
            
            /* Finally send the mail. */
            $mail->send();
            $sql = "INSERT INTO tmp2 (codes,email) VALUES ('$codes','$email')";
            $con->query($sql);
            $_SESSION['email'] = $email;
            echo '<script language="javascript">';
            echo 'alert("Email with verification codes has been sent");location.href="./getYourNomination.php";';
            echo '</script>';
	    }catch (Exception $e){
		    echo $e->errorMessage();
	    }catch (\Exception $e){
		    echo $e->getMessage();
	    }
	}else{
		echo '<script language="javascript">';
        echo 'alert("This email is not in our records. Nominate now...");location.href="./regNominees.php";';
        echo '</script>';
        exit;
    }
}

//verify codes for user to acces their nomination
if(isset($_POST['getNominationVerify'])){
    $code = trim($_POST['codes']);

    // validate codes first
    $queryOne = "SELECT * FROM tmp2 WHERE codes = '$code' ";
    $query_runOne = mysqli_query($con,$queryOne);
    while($rows = mysqli_fetch_array($query_runOne)){
        $codes = "{$rows['codes']}";
    }
    if($codes != $code){
        echo '<script language="javascript">';
        echo 'alert("Please give valid codes");location.href="./getYourNomination.php";';
        echo '</script>';
        exit;
    }else{
        header("Status: 301 Moved Permanently");
        header("Location:./userNomination.php?codes=". $code);
    }
}



//send verification codes
if(isset($_POST['verification'])){
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
    $codes = rand(100000,999999);

    //check if email exists
    $select = mysqli_query($con,"SELECT 'email' FROM wapendekeza WHERE email = '$email'");
	if(mysqli_num_rows($select)) {
		echo '<script language="javascript">';
        echo 'alert("This email is already being used");location.href="./regNominees.php";';
        echo '</script>';
        exit;
	}else{
try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;         
        $mail->isSMTP();                               
        $mail->Host       = 'smtp.gmail.com';     
        $mail->SMTPAuth   = true;                      
        $mail->Username   = 'clausevee@gmail.com';
        $mail->Password   = 'nicholaus12345678910';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //'tls'
        $mail->Port       = 465;                     

        //Recipients
        $mail->setFrom('clausevee@gmail.com', 'ICT Awards2021');
        $mail->addAddress($email, $name);
	
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'ICT Awards2021 Email Verification Code';
        $mail->Body    = 'Hi..! <b>'.$name.'</b><br>
        Here is your email verification code <br><br><br><br>
        '.$codes;
		
		/* Finally send the mail. */
		$mail->send();
        $sql = "INSERT INTO tmp (codes) VALUES ('$codes')";
        $con->query($sql);
        echo '<script language="javascript">';
        echo 'alert("Email with Verification code has been sent");location.href="./regNominees.php";';
        echo '</script>';
	 }
	 catch (Exception $e)
	 {
		echo $e->errorMessage();
	 }
	 catch (\Exception $e)
	 {
		echo $e->getMessage();
	 }
    }
}

// register watu wanaopendekeza
if(isset($_POST['register'])){
    
	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$code = trim($_POST['codes']);
	$bisISP = trim($_POST['bisISP']);
	$bisIS = trim($_POST['bisIS']);
	$bisAS = trim($_POST['bisAS']);
	$bisHS = trim($_POST['bisHS']);
	$fsa = trim($_POST['fsa']);
	$isa = trim($_POST['isa']);
	$asa = trim($_POST['asa']);
	$hsa = trim($_POST['hsa']);
    $esa = trim($_POST['esa']);
    $ra = trim($_POST['ra']);
    $ra2 = trim($_POST['ra2']);
    $byie = trim($_POST['byie']);
    $bir = trim($_POST['bir']);
    $bir2 = trim($_POST['bir']);
    $laa = trim($_POST['laa']);
    $laa2 = trim($_POST['laa2']);

    $bisISPInput = trim($_POST['bisISPInput']);
	$bisISInput = trim($_POST['bisISInput']);
	$bisASInput = trim($_POST['bisASInput']);
	$bisHSInput = trim($_POST['bisHSInput']);
	$fsaInput = trim($_POST['fsaInput']);
	$isaInput = trim($_POST['isaInput']);
	$asaInput = trim($_POST['asaInput']);
	$hsaInput = trim($_POST['hsaInput']);
    $esaInput = trim($_POST['esaInput']);
    $raInput = trim($_POST['raInput']);
    $raInput2 = trim($_POST['raInput2']);
    $laaInput  = trim($_POST['laaInput']);
    $laaInput2  = trim($_POST['laaInput2']);
    $byieInput = trim($_POST['byieInput']);
    $birInput = trim($_POST['birInput']);
    $birInput2 = trim($_POST['birInput2']);
    
    
    $bisISPInputWeb = trim($_POST['bisISPInputWeb']);
	$bisISInputWeb = trim($_POST['bisISInputWeb']);
	$bisASInputWeb = trim($_POST['bisASInputWeb']);
	$bisHSInputWeb = trim($_POST['bisHSInputWeb']);
    $laaInputWeb  = trim($_POST['laaInputWeb']);
    $laaInputWeb2  = trim($_POST['laaInputWeb2']);
	$fsaInputWeb = trim($_POST['fsaInputWeb']);
	$isaInputWeb = trim($_POST['isaInputWeb']);
	$asaInputWeb = trim($_POST['asaInputWeb']);
	$hsaInputWeb = trim($_POST['hsaInputWeb']);
    $esaInputWeb = trim($_POST['esaInputWeb']);
    $raInputWeb = trim($_POST['raInputWeb']);
    $raInputWeb2 = trim($_POST['raInputWeb2']);
    $byieInputWeb = trim($_POST['byieInputWeb']);
    $birInputWeb = trim($_POST['birInputWeb']);
    $birInputWeb2 = trim($_POST['birInputWeb2']);

    $bisISPInputWeb2 = trim($_POST['bisISPInputWeb2']);
	$bisISInputWeb2 = trim($_POST['bisISInputWeb2']);
	$bisASInputWeb2 = trim($_POST['bisASInputWeb2']);
	$bisHSInputWeb2 = trim($_POST['bisHSInputWeb2']);
    $laaInputWeb2  = trim($_POST['laaInputWeb2']);
    $laaInputWeb22  = trim($_POST['laaInputWeb22']);
	$fsaInputWeb2 = trim($_POST['fsaInputWeb2']);
	$isaInputWeb2 = trim($_POST['isaInputWeb2']);
	$asaInputWeb2 = trim($_POST['asaInputWeb2']);
	$hsaInputWeb2 = trim($_POST['hsaInputWeb2']);
    $esaInputWeb2 = trim($_POST['esaInputWeb2']);
    $raInputWeb2 = trim($_POST['raInputWeb2']);
    $raInputWeb22 = trim($_POST['raInputWeb22']);
    $byieInputWeb2 = trim($_POST['byieInputWeb2']);
    $birInputWeb2 = trim($_POST['birInputWeb2']);
    $birInputWeb22 = trim($_POST['birInputWeb22']);

    $bisISPInputWeb22 = trim($_POST['bisISPInputWeb22']);
	$bisISInputWeb22 = trim($_POST['bisISInputWeb22']);
	$bisASInputWeb22 = trim($_POST['bisASInputWeb22']);
	$bisHSInputWeb22 = trim($_POST['bisHSInputWeb22']);
    $laaInputWeb22  = trim($_POST['laaInputWeb22']);
    $laaInputWeb222  = trim($_POST['laaInputWeb222']);
	$fsaInputWeb22 = trim($_POST['fsaInputWeb22']);
	$isaInputWeb22 = trim($_POST['isaInputWeb22']);
	$asaInputWeb22 = trim($_POST['asaInputWeb22']);
	$hsaInputWeb22 = trim($_POST['hsaInputWeb22']);
    $esaInputWeb22 = trim($_POST['esaInputWeb22']);
    $raInputWeb22 = trim($_POST['raInputWeb22']);
    $raInputWeb222 = trim($_POST['raInputWeb222']);
    $byieInputWeb22 = trim($_POST['byieInputWeb22']);
    $birInputWeb22 = trim($_POST['birInputWeb22']);
    $birInputWeb222 = trim($_POST['birInputWeb222']);
    
	$user = '';

    //validate codes first
    $queryOne = "SELECT * FROM tmp WHERE codes = '$code'";
    $query_runOne = mysqli_query($con,$queryOne);
    while($rows = mysqli_fetch_array($query_runOne)){
        $codes = "{$rows['codes']}";
    }
    if($codes != $code){
        echo '<script language="javascript">';
        echo 'alert("Please give valid codes");location.href="./regNominees.php";';
        echo '</script>';
        exit;
    }else{
        $sql = "delete from tmp WHERE codes = '$code'";
        $con->query($sql);
    }

    //validation for the inputs 
	if($laaInput != "" || $laaInput2 != "" || $bisISPInput != "" || $bisISInput != "" || $bisASInput != "" ||  $bisHSInput != "" ||  $fsaInput != "" || $isaInput != "" || $asaInput != "" || $hsaInput != "" || $esaInput != "" || $raInput != "" || $raInput2 != "" || $byieInput != "" || $birInput != "" || $birInput2 != ""){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script language="javascript">';
            echo 'alert("Invalid email address");location.href="./regNominees.php";';
            echo '</script>';
            exit;
        }
        if($name == "" || $email == "" || $code == ""){
            echo '<script language="javascript">';
            echo 'alert("Please fill out the form");location.href="./regNominees.php";';
            echo '</script>';
            exit;
        }

        $sql = "INSERT INTO wapendekeza (name,email,code) VALUES ('$name','$email','$code')";
        if ($con->query($sql) === TRUE) {
            
        } else {
            echo '<script language="javascript">';
            echo 'alert("Sever is temporal Offline, Please comeback later!");location.href="./regNominees.php";';
            echo '</script>';
        }

        $queryOne = "SELECT * FROM wapendekeza WHERE name = '$name' AND email = '$email' AND code = '$code'";
        $query_runOne = mysqli_query($con,$queryOne);
        while($rows = mysqli_fetch_array($query_runOne)){
            $user = "{$rows['id']}";
        }


        //check if user inserted new company
        if($bisISPInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$bisISPInput','$bisISPInputWeb','$bisISPInputWeb2','$bisISPInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$bisISPInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bisISP = $id;
            }
        }

        if($bisISInput  != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$bisISInput','$bisISInputWeb','$bisISInputWeb2','$bisISInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$bisISInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bisIS  = $id;
            }
        }

        if($bisASInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$bisASInput','$bisASInputWeb','$bisASInputWeb2','$bisASInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$bisASInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bisAS = $id;
            }
        }

        if($bisHSInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$bisHSInput','$bisHSInputWeb','$bisHSInputWeb2','$bisHSInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$bisHSInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bisHS = $id;
            }
        }
        
        if($fsaInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$fsaInput','$fsaInputWeb','$fsaInputWeb2','$fsaInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$fsaInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $fsa = $id;
            }
        }

        if($isaInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$isaInput','$isaInputWeb','$isaInputWeb2','$isaInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$isaInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $isa = $id;
            }
        }

        if($asaInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$asaInput','$asaInputWeb','$asaInputWeb2','$asaInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$asaInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $asa = $id;
            }
        }

        if($hsaInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$hsaInput','$hsaInputWeb','$hsaInputWeb2','$hsaInputWeb22)";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$hsaInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $hsa = $id;
            }
        }

        if($esaInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$esaInput','$esaInputWeb','$esaInputWeb2','$esaInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$hsaInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $esa = $id;
            }
        }

        if($raInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$raInput','$raInputWeb','$raInputWeb2','$raInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$raInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $ra = $id;
            }
        }

        if($raInput2 != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$raInput2','$raInputWeb2','$raInputWeb22','$raInputWeb222')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$raInput2'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $ra2 = $id;
            }
        }

        if($byieInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$byieInput','$byieInputWeb','$byieInputWeb2','$byieInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$byieInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $byie = $id;
            }
        }

        if($birInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$birInput','$birInputWeb','$birInputWeb2','$birInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$birInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bir = $id;
            }
        }

        if($birInput2 != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$birInput','$birInputWeb2','$birInputWeb22','$birInputWeb222')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$birInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bir2 = $id;
            }
        }

        if($laaInput != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$laaInput','$laaInputWeb','$laaInputWeb2','$laaInputWeb22')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$laaInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $laa = $id;
            }
        }

        if($laaInput2 != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$laaInput','$laaInputWeb2','$laaInputWeb22','$laaInputWeb222')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$laaInput'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $laa2 = $id;
            }
        }

        $sql2 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (1,'$user','$bisISP','not confirmed')";
        $sql3 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (2,'$user','$bisIS','not confirmed')";
        $sql4 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (3,'$user','$bisAS','not confirmed')";
        $sql5 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (4,'$user','$bisHS','not confirmed')";
        // $sql6 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (3,'$user','$bisSD','not confirmed')";

        $sql7 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (5,'$user','$fsa','not confirmed')";
        $sql8 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (6,'$user','$isa','not confirmed')";
        $sql9 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (7,'$user','$asa','not confirmed')";
        $sql10 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (8,'$user','$hsa','not confirmed')";
        $sql11 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (9,'$user','$esa','not confirmed')";
        $sql12 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (10,'$user','$ra','not confirmed')";
        $sql13 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (14,'$user','$byie','not confirmed')";
        $sql14 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (16,'$user','$bir2','not confirmed')";
        $sql15 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (15,'$user','$bir','not confirmed')";
        $sql16 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (12,'$user','$laa','not confirmed')";
        $sql17 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (13,'$user','$laa2','not confirmed')";
        $sql18 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (11,'$user','$ra2','not confirmed')";
        
        $con->query($sql2);
        $con->query($sql3);
        $con->query($sql4);
        $con->query($sql5);
        $con->query($sql6);
        $con->query($sql7);
        $con->query($sql8);
        $con->query($sql9);
        $con->query($sql10);
        $con->query($sql11);
        $con->query($sql12);
        $con->query($sql13);
        $con->query($sql14);
        $con->query($sql15);
        $con->query($sql16);
        $con->query($sql17);
        $con->query($sql18);
        echo '<script language="javascript">';
        echo 'alert("congrats!!! You have Successful nominate");location.href="./regNominees.php";';
        echo '</script>';
	}else{
        echo '<script language="javascript">';
        echo 'alert("You have to nominate in atleast one category");location.href="./regNominees.php";';
        echo '</script>';
    }
}

// register kampuni zanazopendekezwa
if(isset($_POST['RegisterCompany'])){
	$cname = trim($_POST['cname']);
	$cemail = trim($_POST['cemail']);
	$cphone = trim($_POST['cphone']);
	$ctype = trim($_POST['type']);

	//validation for the inputs 
	if($cname == ""){
		echo '<script language="javascript">';
        echo 'alert("Company name is required");location.href="../adminstrator/adminPages/companies.php";';
        echo '</script>';	
	}

	if($cemail == ""){
		echo '<script language="javascript">';
        echo 'alert("Email Field is required");location.href="../adminstrator/adminPages/companies.php";';
        echo '</script>';	
	}

	if($cphone == ""){
		echo '<script language="javascript">';
        echo 'alert("Company Phone number is required");location.href="../adminstrator/adminPages/companies.php";';
        echo '</script>';	
	}
	if($ctype == ""){
		echo '<script language="javascript">';
        echo 'alert("Company Type is required");location.href="../adminstrator/adminPages/companies.php";';
        echo '</script>';	
	}

	$sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,status,type) VALUES ('$cname', '$cemail', '$cphone', 'Active' ,'$ctype')";
	if ($con->query($sql) === TRUE) {
		echo '<script language="javascript">';
        echo 'alert("Saccesful registered new company");location.href="../adminstrator/adminPages/companies.php";';
        echo '</script>';	
	} else {
		echo '<script language="javascript">';
        echo 'alert("Sever temporal Offline, Please comeback later!");location.href="../adminstrator/adminPages/companies.php";';
        echo '</script>';	
	}
}

// log in
if(isset($_POST['login'])){
	$user = $_POST['email'];
	$pwd = $_POST['password'];

	$queryOne = "SELECT * FROM admins WHERE email = '$user' AND password = '$pwd'";
    $query_runOne = mysqli_query($con,$queryOne);

    $upOne = mysqli_num_rows($query_runOne); 
    if($upOne > 0){
		while($rows = mysqli_fetch_array($query_runOne)){
			$_SESSION['USER_NAME'] = "{$rows['name']}";
			$_SESSION['USERID'] = "{$rows['id']}";				
		}
	  header('location:../adminstrator/adminPages/admnHome.php'); 
    }else{
		echo '<script language="javascript">';
        echo 'alert("Username or password is incorrect");location.href="../adminstrator/index.php";';
        echo '</script>';
    } 

}
//log in ends

// log out
if(isset($_GET['out_admin'])){
	session_destroy();
	require('index.php');

}
//LOG OUT ENDS

//send email and confirm approved
if(isset($_GET['moreConfirm'])){
    $id = $_REQUEST['more'];
	$qry = "UPDATE wapendekezanawapendekezwa SET status = 'confirmed' WHERE id = '$id'";
    $query_runOne = mysqli_query($con,$qry);
	echo '<script language="javascript">';
    echo 'alert("Confirmed And Email sent");location.href="../adminstrator/adminPages/norminatedPerCategory.php";';
    echo '</script>';
	
}
?>
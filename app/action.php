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
	$bisISP = "";
	$bisIS = "";
	$bisAS = "";
	$bisHS = "";
	$fsa = "";
	$isa = "";
	$asa = "";
	$hsa = "";
    $esa = "";
    $ra = "";
    $BFTCID = "";
    $byie = "";
    $bir = "";
    $BISAID = "";

    $bestMF = "";
    $bestJ = "";
    $bestMD = "";
    $bestM = "";

    $laa = "";
    $bmICTRID = "";

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
    $BFTC = trim($_POST['BFTC']);
    $laaInput  = trim($_POST['laaInput']);
    $bmICTR  = trim($_POST['bmICTR']);
    $byieInput = trim($_POST['byieInput']);
    $birInput = trim($_POST['birInput']);
    $BISA = trim($_POST['BISA']);
    $bestMaleFemaleName = trim($_POST['bestMaleFemaleName']);
    $bestJounalistName = trim($_POST['bestJounalistName']);
    $bestMediaName = trim($_POST['bestMediaName']);
    $bestMinistryName = trim($_POST['bestMinistryName']);
    
    
    $bisISPInputWeb = trim($_POST['bisISPInputWeb']);
	$bisISInputWeb = trim($_POST['bisISInputWeb']);
	$bisASInputWeb = trim($_POST['bisASInputWeb']);
	$bisHSInputWeb = trim($_POST['bisHSInputWeb']);
    $laaInputWeb  = trim($_POST['laaInputWeb']);
    $bmICTRPerson  = trim($_POST['bmICTRPerson']);
	$fsaInputWeb = trim($_POST['fsaInputWeb']);
	$isaInputWeb = trim($_POST['isaInputWeb']);
	$asaInputWeb = trim($_POST['asaInputWeb']);
	$hsaInputWeb = trim($_POST['hsaInputWeb']);
    $esaInputWeb = trim($_POST['esaInputWeb']);
    $raInputWeb = trim($_POST['raInputWeb']);
    $BFTCPerson = trim($_POST['BFTCPerson']);
    $byieInputWeb = trim($_POST['byieInputWeb']);
    $birInputWeb = trim($_POST['birInputWeb']);
    $BISAPerson = trim($_POST['BISAPerson']);
    $bestMaleFemalePerson = trim($_POST['bestMaleFemalePerson']);
    $bestJounalistPerson = trim($_POST['bestJounalistPerson']);
    $bestMediaPerson = trim($_POST['bestMediaPerson']);
    $bestMinistryPerson = trim($_POST['bestMinistryPerson']);

    $bisISPInputWeb2 = trim($_POST['bisISPInputWeb2']);
	$bisISInputWeb2 = trim($_POST['bisISInputWeb2']);
	$bisASInputWeb2 = trim($_POST['bisASInputWeb2']);
	$bisHSInputWeb2 = trim($_POST['bisHSInputWeb2']);
    $laaInputWeb2  = trim($_POST['laaInputWeb2']);
    $bmICTRPhone  = trim($_POST['bmICTRPhone']);
	$fsaInputWeb2 = trim($_POST['fsaInputWeb2']);
	$isaInputWeb2 = trim($_POST['isaInputWeb2']);
	$asaInputWeb2 = trim($_POST['asaInputWeb2']);
	$hsaInputWeb2 = trim($_POST['hsaInputWeb2']);
    $esaInputWeb2 = trim($_POST['esaInputWeb2']);
    $raInputWeb2 = trim($_POST['raInputWeb2']);
    $BFTCPhone = trim($_POST['BFTCPhone']);
    $byieInputWeb2 = trim($_POST['byieInputWeb2']);
    $birInputWeb2 = trim($_POST['birInputWeb2']);
    $BISAPhone = trim($_POST['BISAPhone']);
    $bestMaleFemalePhone = trim($_POST['bestMaleFemalePhone']);
    $bestJounalistPhone = trim($_POST['bestJounalistPhone']);
    $bestMediaPhone = trim($_POST['bestMediaPhone']);
    $bestMinistryPhone = trim($_POST['bestMinistryPhone']);

    $bisISPInputWeb22 = trim($_POST['bisISPInputWeb22']);
	$bisISInputWeb22 = trim($_POST['bisISInputWeb22']);
	$bisASInputWeb22 = trim($_POST['bisASInputWeb22']);
	$bisHSInputWeb22 = trim($_POST['bisHSInputWeb22']);
    $laaInputWeb22  = trim($_POST['laaInputWeb22']);
    $bmICTRWhy  = trim($_POST['bmICTRWhy']);
	$fsaInputWeb22 = trim($_POST['fsaInputWeb22']);
	$isaInputWeb22 = trim($_POST['isaInputWeb22']);
	$asaInputWeb22 = trim($_POST['asaInputWeb22']);
	$hsaInputWeb22 = trim($_POST['hsaInputWeb22']);
    $esaInputWeb22 = trim($_POST['esaInputWeb22']);
    $raInputWeb22 = trim($_POST['raInputWeb22']);
    $BFTCWhy = trim($_POST['BFTCWhy']);
    $byieInputWeb22 = trim($_POST['byieInputWeb22']);
    $birInputWeb22 = trim($_POST['birInputWeb22']);
    $BISAWhy = trim($_POST['BISAWhy']);
    $bestMaleFemaleWhy = trim($_POST['bestMaleFemaleWhy']);
    $bestJounalistWhy = trim($_POST['bestJounalistWhy']);
    $bestMediaWhy = trim($_POST['bestMediaWhy']);
    $bestMinistryWhy = trim($_POST['bestMinistryWhy']);
    
	$user = '';

    //validation for the inputs 
	if($laaInput != "" || $bmICTR != "" || $bisISPInput != "" || $bisISInput != "" || $bisASInput != "" ||  $bisHSInput != "" ||  $fsaInput != "" || $isaInput != "" || $asaInput != "" || $hsaInput != "" || $esaInput != "" || $raInput != "" || $BFTC != "" || $byieInput != "" || $birInput != "" || $BISA != "" || $bestMaleFemaleName != "" || $bestJounalistName != "" || $bestMediaName != "" || $bestMinistryName != ""){
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
            echo 'alert("Server is temporal Offline, Please comeback later!");';
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
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$hsaInput','$hsaInputWeb','$hsaInputWeb2','$hsaInputWeb22')";
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
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$esaInput'";
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

        if($BFTC != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$BFTC','$BFTCPerson','$BFTCPhone','$BFTCWhy')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$BFTC'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $BFTCID = $id;
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

        if($BISA != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$BISA','$BISAPerson','$BISAPhone','$BISAWhy')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$BISA'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $BISAID = $id;
            }
        }

        if($bestMaleFemaleName != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$bestMaleFemaleName','$bestMaleFemalePerson','$bestMaleFemalePhone','$bestMaleFemaleWhy')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$bestMaleFemaleName'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bestMF = $id;
            }
        }

        if($bestJounalistName != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$bestJounalistName','$bestJounalistPerson','$bestJounalistPhone','$bestJounalistWhy')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$bestJounalistName'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bestJ = $id;
            }
        }

        if($bestMediaName != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$bestMediaName','$bestMediaPerson','$bestMediaPhone','$bestMediaWhy')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$bestMediaName'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bestMD = $id;
            }
        }
        if($bestMinistryName != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$bestMinistryName','$bestMinistryPerson','$bestMinistryPhone','$bestMinistryWhy')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$bestMinistryName'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bestM = $id;
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

        if($bmICTR != ""){
            $sql = "INSERT INTO wapendekezwa (companyName,companyAddress,contact,reason) VALUES ('$bmICTR','$bmICTRPerson','$bmICTRPhone','$bmICTRWhy')";
            if ($con->query($sql) === TRUE){
                $queryOne = "SELECT * FROM wapendekezwa WHERE companyName = '$bmICTR'";
                $query_runOne = mysqli_query($con,$queryOne);
                $upOne = mysqli_num_rows($query_runOne); 
                if($upOne > 0){
                    while($rows = mysqli_fetch_array($query_runOne)){
                        $id = "{$rows['id']}";
                    }
                }
                $bmICTRID = $id;
            }
        }


        $sql2 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (1,'$user','$bisISP','not confirmed')";
        $sql3 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (2,'$user','$bisIS','not confirmed')";
        $sql4 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (3,'$user','$bisAS','not confirmed')";
        $sql5 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (4,'$user','$bisHS','not confirmed')";

        $sql7 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (5,'$user','$fsa','not confirmed')";
        $sql8 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (6,'$user','$isa','not confirmed')";
        $sql9 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (7,'$user','$asa','not confirmed')";
        $sql10 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (8,'$user','$hsa','not confirmed')";
        $sql11 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (9,'$user','$esa','not confirmed')";
        $sql12 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (10,'$user','$ra','not confirmed')";
        $sql13 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (14,'$user','$byie','not confirmed')";
        $sql14 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (16,'$user','$BISAID','not confirmed')";
        $sql15 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (15,'$user','$bir','not confirmed')";
        $sql16 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (12,'$user','$laa','not confirmed')";
        $sql17 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (13,'$user','$bmICTRID','not confirmed')";
        $sql18 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (11,'$user','$BFTCID','not confirmed')";
        $sql19 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (17,'$user','$bestMF','not confirmed')";
        $sql20 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (18,'$user','$bestJ','not confirmed')";
        $sql21 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (19,'$user','$bestMD','not confirmed')";
        $sql22 = "INSERT INTO wapendekezanawapendekezwa (categoriesFK,pendekezaID,pendekezwaID,status) VALUES (20,'$user','$bestM','not confirmed')";
    
        if($bisISP != "" && $user != ""){
            $con->query($sql2);
        }

        if($bisIS != "" && $user != ""){
            $con->query($sql3);
        }

        if($bisAS != "" && $user != ""){
            $con->query($sql4);
        }

        if($bisHS != "" && $user != ""){
            $con->query($sql5);
        }

        if($fsa != "" && $user != ""){
            $con->query($sql7);
        }

        if($isa != "" && $user != ""){
            $con->query($sql8);
        }

        if($asa != "" && $user != ""){
            $con->query($sql9);
        }

        if($hsa != "" && $user != ""){
            $con->query($sql10);
        }

        if($esa != "" && $user != ""){
            $con->query($sql11);
        }

        if($ra != "" && $user != ""){
            $con->query($sql12);
        }

        if($byie != "" && $user != ""){
            $con->query($sql13);
        }

        if($BISAID != "" && $user != ""){
            $con->query($sql14);
        }

        if($bir != "" && $user != ""){
            $con->query($sql15);
        }

        if($laa != "" && $user != ""){
            $con->query($sql16);
        }

        if($bmICTRID != "" && $user != ""){
            $con->query($sql17);
        }

        if($BFTCID != "" && $user != ""){
            $con->query($sql18);
        }

        if($bestMF != "" && $user != ""){
            $con->query($sql19);
        }

        if($bestJ != "" && $user != ""){
            $con->query($sql20);
        }

        if($bestMD != "" && $user != ""){
            $con->query($sql21);
        }
        
        if($bestM != "" && $user != ""){
            $con->query($sql22);
        }
        
        echo '<script language="javascript">';
        echo 'alert("congrats!!! You have Successful nominated");location.href="./regNominees.php";';
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

if(isset($_POST['mail'])){
    $category = $_GET['category'];
    $id = $_GET['id'];
    $results = mysqli_query($con, "SELECT * From wapendekezwa WHERE id = $id");
    while($data = mysqli_fetch_array($results)){
        $company = $data['companyName'];
    }
    // $company = $_GET['company'];
    // https://ictawards.ictc.go.tz
    $link = "<a href='https://ictawards.ictc.go.tz/confirm/confirm.php?company=$company&category=$category&id=$id'>here</a>";
    $email = $_POST['email'];

    try {
        $mail->isSMTP();                               
        $mail->Host       = 'smtp.gmail.com';     
        $mail->SMTPAuth   = true;                      
        $mail->Username   = 'clausevee@gmail.com';
        $mail->Password   = 'nicholaus12345678910';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //'tls'
        $mail->Port       = 465;                     

        //Recipients
        $mail->setFrom('clausevee@gmail.com', 'ICT Awards2021');
        $mail->addAddress($email, $company);
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'ICT Awards2021 Nominees Verification';
        $mail->Body    = '<div class="container" style="background-color:#EDDDCB">
        <div class="" style="background-color:white;margin:0px 200px;">
            <div class="row">
                <div class="col-4" style="text-align:center">
                    <img src="https://ictawards.ictc.go.tz/assets/img/logo2.png" alt="ictc logo">
                </div>
            </div>
            <div class="row" style="padding:20px; color:black; text-align:center">
                <div class="col" ><h2>Hello! '.$company.'</h2></div>
            </div>
            <div class="row">
                <div class="col" style="padding:35px">
                    <p style="font-size:15px;color:black;text-align:center">Congratulations you have been nominated for Tanzania ICT Award 2021 as <b>'.$category.'</b>.
        The initial stage is complete, the next step is to verify nominees in each category.
        Click '.$link.' to verify.</p>
                </div>
            </div>
        </div>
      </div>';
        $mail->send();
        echo '<script language="javascript">';
        echo 'alert("Email has been sent");location.href="../adminstrator/adminPages/sendEmail.php";';
        echo '</script>';
    }catch (Exception $e){
        echo $e->errorMessage();
    }catch (\Exception $e){
        echo $e->getMessage();
    }
}
?>


<?php 
// require 'action.php';
// $queryOne = "SELECT * FROM tmp2";
//     $query_runOne = mysqli_query($con,$queryOne);

//     $upOne = mysqli_num_rows($query_runOne); 
//     if($upOne > 0){
// 		while($rows = mysqli_fetch_array($query_runOne)){
// 			$email = "{$rows['email']}";
// 		}
//     }
//     $mail = $email;
//     $sql = 'delete from tmp2';
// 	$con->query($sql);
    //fetch data here
    // echo 'I will get your nomination soon Mr/Mrs '. $mail;
?>
<?php 
require 'action.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Tanzania ICT Awards : getNomination</title>
      <!-- Favicon-->
      <link rel="icon" href="../assets/fevicon.png" />
      <!-- Bootstrap Icons-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
      <!-- Google fonts-->
      <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
      <!-- SimpleLightbox plugin CSS-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="../css/styles.css" rel="stylesheet" />
    <!-- MDBootstrap Datatables  -->
    <link href="./css/addons/datatables.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
        <style type="text/css" >
            .errorMsg{border:1px solid red; }
            .message{color: red; font-weight:bold; }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
          <div class="container px-4 px-lg-5">
              <a class="navbar-brand" href="../index.php" style="color: black;">ICTAwards2021</a>
              <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ms-auto my-2 my-lg-0">
                      <li class="nav-item"><a class="nav-link" href="../index.php" style="color:black">Continue Browsing</a></li>
                  </ul>
              </div>
          </div>
        </nav>
        
       
        
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Your Nomination</h2>
                        <hr class="divider" />
                    </div>
                    <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-12">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">NO

      </th>
      <th class="th-sm">Category

      </th>
      <th class="th-sm">Company/Institution/Individual

      </th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $email = 'mmayenganicholaus66@gmail.com';
    // $id = 0;
    $codes = $_GET['codes'];

    $qry2 = "SELECT * FROM tmp2 WHERE codes = '$codes'";
    $qry_run2 = mysqli_query($con,$qry2);
    while($rows = mysqli_fetch_array($qry_run2)){
        $email = "{$rows['email']}";
    }

    $qry3 = "SELECT * FROM wapendekeza WHERE email = '$email'";
    $qry_run3 = mysqli_query($con,$qry3);
    $upOne3 = mysqli_num_rows($qry_run3);
    if($upOne3 > 0){
        while($rows = mysqli_fetch_array($qry_run3)){
            $id = "{$rows['id']}";
        }
    }

    $qry = "SELECT categories.name,wapendekezwa.companyName FROM wapendekezanawapendekezwa,categories,wapendekezwa WHERE wapendekezwa.id = wapendekezanawapendekezwa.pendekezwaID AND categories.id = wapendekezanawapendekezwa.categoriesFK AND pendekezaID = '$id'";
    $qry_run = mysqli_query($con,$qry);
    $upOne = mysqli_num_rows($qry_run); 
    if($upOne > 0){
        $no = 1;
		while($rows = mysqli_fetch_array($qry_run)){
			$category = "{$rows['name']}";
			$pendekezwa = "{$rows['companyName']}";				
            echo "<tr>
            <td>$no</td>
            <td>$category</td>
            <td>$pendekezwa</td>
            </tr>
            ";
            $no++;
		}
    }
  ?>
  </tbody>
</table>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - ICTC All Rights Reserved</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="./js/addons/datatables.min.js"></script>
        <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript">
      var a = document.getElementById('disc-50');
      a.onclick = function () {
        Clipboard_CopyTo("T9TTVSQB");
        var div = document.getElementById('code-success');
        div.style.display = 'block';
        setTimeout(function () {
          document.getElementById('code-success').style.display = 'none';
        }, 900);
      };

      function Clipboard_CopyTo(value) {
        var tempInput = document.createElement("input");
        tempInput.value = value;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
      }
    </script>
        <script>
            $(document).ready(function () {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        </script>
    </body>
</html>

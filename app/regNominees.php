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
      <title>Tanzania ICT Awards : Index</title>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style type="text/css" >
            .errorMsg{border:1px solid red; }
            .message{color: red; font-weight:bold; }

            /* The Modal (background) */
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  -webkit-animation-name: fadeIn; /* Fade in the background */
  -webkit-animation-duration: 0.4s;
  animation-name: fadeIn;
  animation-duration: 0.4s
}

/* Modal Content */
.modal-content {
  position: fixed;
  bottom: 0;
  background-color: white;
  width: 100%;
  -webkit-animation-name: slideIn;
  -webkit-animation-duration: 0.4s;
  animation-name: slideIn;
  animation-duration: 0.4s
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #ED8E7C;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #ED8E7C;
  color: white;
}

/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}
        </style>
        <script>
$(document).ready(function(){
    document.getElementById('phoneNumber1').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber1');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber2').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber2');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber3').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber3');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber4').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber4');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber5').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber5');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber6').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber6');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber7').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber7');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber8').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber8');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber9').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber9');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber10').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber10');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber11').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber11');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber12').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber12');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber13').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber13');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber14').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber14');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber15').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber15');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

    document.getElementById('phoneNumber16').addEventListener('keyup',function(evt){
        var phoneNumber = document.getElementById('phoneNumber16');
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        phoneNumber.value = phoneFormat(phoneNumber.value);
    });

	$("#1").hide();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#16").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
    $("#16").hide();

  $("#btn1").click(function(){
    $("#1").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#16").hide();
    $("#14").hide();
    $("#15").hide();
  });
  
  $("#btn2").click(function(){
    $("#2").show();
    $("#1").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#16").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn3").click(function(){
    $("#3").show();
    $("#2").hide();
    $("#1").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#16").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn4").click(function(){
    $("#4").show();
    $("#2").hide();
    $("#3").hide();
    $("#1").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#16").hide();
    $("#12").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn5").click(function(){
    $("#5").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#1").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#16").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn6").click(function(){
    $("#6").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#1").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#16").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn7").click(function(){
    $("#7").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#1").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#16").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn8").click(function(){
    $("#8").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#1").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#16").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn9").click(function(){
    $("#9").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#1").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#16").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn10").click(function(){
    $("#10").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#1").hide();
    $("#11").hide();
    $("#16").hide();
    $("#12").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn11").click(function(){
    $("#11").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#1").hide();
    $("#16").hide();
    $("#12").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn12").click(function(){
    $("#12").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#16").hide();
    $("#10").hide();
    $("#11").hide();
    $("#1").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn13").click(function(){
    $("#13").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#16").hide();
    $("#1").hide();
    $("#14").hide();
    $("#15").hide();
  });

  $("#btn14").click(function(){
    $("#14").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#1").hide();
    $("#16").hide();
    $("#15").hide();
  });

  $("#btn15").click(function(){
    $("#15").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#14").hide();
    $("#1").hide();
    $("#16").hide();
  });

    $("#btn16").click(function(){
    $("#16").show();
    $("#2").hide();
    $("#3").hide();
    $("#4").hide();
    $("#5").hide();
    $("#6").hide();
    $("#7").hide();
    $("#8").hide();
    $("#9").hide();
    $("#10").hide();
    $("#11").hide();
    $("#12").hide();
    $("#13").hide();
    $("#14").hide();
    $("#15").hide();
    $("#1").hide();
  });
function phoneFormat(input){
        // Strip all characters from the input except digits
        input = input.replace(/\D/g,'');
        
        // Trim the remaining input to ten characters, to preserve phone number format
        input = input.substring(0,10);

        // Based upon the length of the string, we add formatting as necessary
        var size = input.length;
        if(size == 0){
                input = input;
        }else if(size < 4){
                input = input;
        }else if(size < 7){
                input = input.substring(0,3)+'- '+input.substring(3,6);
        }else{
                input = input.substring(0,3)+'- '+input.substring(3,6)+' - '+input.substring(6,10);
        }
        return input; 
}
});
</script>
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
                        <h2 class="mt-0">Choose Nominee!</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Tell us little about you and choose who to receive award this year!</p>
                    </div>
                    <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form action="action.php" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name="name" placeholder="Enter your name..." data-sb-validations="required" required/>
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" data-sb-validations="required,email" required/>
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="submit" name="verification" class="btn btn-primary" value="Request Verifiation code"></input><span style="margin-left:6px; color:green" id="alert"></span>
                                <input class="form-control" id="email" type="text" name="codes" placeholder="" data-sb-validations="required,code"/>
                                <div class="invalid-feedback" data-sb-feedback="code:required">Verification code is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="code:email">code is not valid.</div>
                            </div>
                           <br>
                            <h6>Choose your Normination</h6>
                            <br>
                            <div class="form-floating mb-3">
                                <div class="row">
                                    <div class="col">
                                        <h4 style="font-weight:bold">BEST ICT INNOVATION AWARDS</h4>
                                        <div class="row">
                                            <div class="col">
                                                <h5><a href="#btn1" id="btn1">Best ICT Incubation hub</a></h5>
                                                <div id="1">
                                                    <p>This award recognises Incubators that have played a
pivotal role in the tech and business eco-system by
supporting ideas and startup companies with
innovation spaces, office spaces, link to funding, and
connections into academic environments.</p>
                                                    <!-- Name input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="name" type="text" name="bisISPInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Institution Name</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <!-- site input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="name" type="text" name="bisISPInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Contact Person</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="phoneNumber1" type="text" name="bisISPInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Phone Number</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="" name="bisISPInputWeb22" rows="2" cols="10"> </textarea>
                                                        <label for="name">Why</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                            <h5><a href="#btn2" id="btn2">Best ICT Startup</a></h5>
                                            <div id="2">
                                                <p>This award recognises the outstanding local ICT
startup companies focusing on software, hardware
and social innovation areas and rewards their
distinguished development based on growth,
innovation, creativity, functionality, market potential
and performance.</p>
                                                    <!-- Name input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="name" type="text" name="bisISInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Institution Name</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <!-- site input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="name" type="text" name="bisISInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Contact Person</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <!-- site input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="phoneNumber2" type="text" name="bisISInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Phone Number</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="" name="bisISInputWeb22" rows="2" cols="10"> </textarea>
                                                        <label for="name">Why</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                            </div>
                                            </div>
                                        <br>
                                        
                                        <div class="row">
                                            <div class="col">
                                                <h5><a id="btn3"href="#btn3">Best Innovative ICT Student (Female)</a></h5>
                                                <div id="3">
                                                <p>This award is given in recognition of a Higher
Learning Institution female student who is
developing an ICT innovation, demonstrated passion,
commitment and talent in the ICT field.</p>
                                                    <!-- Name input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="name" type="text" name="bisASInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Full Name</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <!-- site input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="name" type="text" name="bisASInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Institution/College/University</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <!-- site input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="phoneNumber3" type="text" name="bisASInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Phone Number</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="" name="bisASInputWeb22" rows="2" cols="10"> </textarea>
                                                        <label for="name">Why</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                 </div>   
                                            </div>
                                            
                                            <div class="col">
                                            <h5><a id="btn4" href="#btn4">Best Innovative ICT Student (Male)</a></h5>
                                            <div id="4">
                                            <p>This award is given in recognition of a Higher
Learning Institution male student who is developing
an ICT innovation, demonstrated passion,
commitment and talent in the ICT field.</p>
                                                    <!-- Name input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="name" type="text" name="bisHSInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Full Name</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                    <!-- site input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="name" type="text" name="bisHSInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Institution/College/University</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                                                                        <!-- site input-->
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="phoneNumber4" type="text" name="bisHSInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                        <label for="name">Phone Number</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                                     <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="" name="bisHSInputWeb22" rows="2" cols="10"> </textarea>
                                                        <label for="name">Why</label>
                                                        <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                                    </div>
                                            </div>
                                            </div>

                                        </div>
                                       
                                        <br>
                            
                                </div>
                                <hr style="color:#f4623a"/>
                                
                                <br>
                                <div class="row">
                                <h4><a id="btn5" href="#btn5">BEST MOBILE NETWORK OPERATOR</a></h4>
                                <div class="col">
                                    <div id="5">
                                    <p>These are mobile network companies that continually
seeks to enhance the development process and
played big role in Corporate Social Responsibilities
(CSR).</p>
                                        <!-- Name input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="name" type="text" name="fsaInput" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="name">Operator Name</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        <!-- site input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="name" type="text" name="fsaInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="name">Contact Person</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        <!-- site input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="phoneNumber5" type="text" name="fsaInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="name">Phone Number</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="fsaInputWeb22" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <hr style="color:#f4623a"/>

                                <br>
                                <div class="row">
                                    <h4><a id="btn6"href="#btn6">BEST COMPANY PROVIDING SERVICES
ON IT</a></h4>
                                    <div class="col">
                                    <div id="6">
                                    <p>This award is for outsourcing IT service providers
that provide the application of business and
technical expertise to enable organizations in the
creation, management, and optimization of or access
to information and business processes.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="isaInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Company Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="isaInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Contact Person</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                                                                        <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber6" type="text" name="isaInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                              <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="isaInputWeb22" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color:#f4623a"/>

                                <br>
                                <div class="row">
                                <h4><a id="btn7" href="#btn7">BEST COMPANY IN SOFTWARE
DEVELOPMENT</a></h4>
                                <div class="col">
                                    <div id="7">
                                        <p>These are Local software development companies
that their software solution has significant impact to
local challenges.</p>
                                        <!-- Name input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="name" type="text" name="asaInput" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="name">Company Name</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        <!-- site input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="name" type="text" name="asaInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="name">Contact Person</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        <!-- site input-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="phoneNumber7" type="text" name="asaInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="name">Phone Number</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="asaInputWeb22" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <hr style="color:#f4623a"/>

                                <br>
                                <div class="row">
                                <h4><a id="btn8" href="#btn8">BEST ICT TRANSFORMATIVE TRAINING
INSTITUTION</a></h4>
                                    <div class="col">
                                        <div id="8">
                                        <p>This Award recognizes achievements of Schools and
Educational institutions for their optimum utilization
of ICT in the education sector. The Award will be
awarded on the basis of implementation of digital
education as an effective tool for learning service.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="hsaInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Institution Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="hsaInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Contact Person</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber8" type="text" name="hsaInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="hsaInputWeb22" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color:#f4623a"/>

                                <br>
                                <div class="row">
                                <h4><a id="btn9" href="#btn9">BEST ICT TRANSFORMATIVE INSTITUTION
IN PROVISION OF HEALTH SERVICES</a></h4>
                                <div class="col">
                                        <div id="9">
                                        <p>These are health facilities that have adapted to
digital technology and have efficiently used digital
tools to improve their efficiency in delivering health
services.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="esaInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Institution Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="esaInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Contact Person</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber9" type="text" name="esaInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="esaInputWeb22" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                </div>
                                </div>
                                <hr style="color:#f4623a"/>

                                <br>
                                <div class="row">
                                <h4><a id="btn10" href="#btn10">BEST ICT INSTITUTION PROVIDING
SERVICES IN FINANCIAL SECTOR</a></h4>
                                    <div class="col">
                                        <div id="10">
                                        <p>This award will go to the most innovative and agile
fintech that are leading digital transformation in the
financial sector.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="raInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Institution Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="raInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Contact Person</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber10" type="text" name="raInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="raInputWeb22" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color:#f4623a"/>

                                <br>
                                <div class="row">
                                <h4><a id="btn16" href="#btn16">BEST FINANCIAL TECHNOLOGY COMPANY AWARD</a></h4>
                                    <div class="col">
                                        <div id="16">
                                        <p>This award will go to the most innovative and agile
bank that are leading digital transformation in the
financial sector.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="raInput2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Institution Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="raInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Contact Person</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber11" type="text" name="raInputWeb22" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="raInputWeb222" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color:#f4623a"/>

                                <br>
                                <div class="row">
                                <h4>BEST ICT RESEARCHER AWARDS</h4>
                                    <div class="col">
                                    <h5><a id="btn11" href="#btn11">Best Female ICT researcher</a></h5>
                                        <div id="11">
                                        <p>This award recognises female individuals whose
research works has contributed to develop or
promote the ICT sector in Tanzania.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="laaInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Full Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="laaInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Institution</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber12" type="text" name="laaInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="laaInputWeb22" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                    <h5><a id="btn12" href="#btn12">Best Male ICT researcher</a></h5>
                                        <div id="12">
                                        <p>This award recognises male individuals who have
research contributions in terms of development or
promotion of ICT in Tanzania.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="laaInput2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Full Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="laaInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Institution</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber13" type="text" name="laaInputWeb22" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="laaInputWeb222" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color:#f4623a"/>

                                <br>
                                <div class="row">
                                <h4><a id="btn13" href="#btn13">BEST COMPANY IN DIGITAL INSURANCE
SERVICES</a></h4>
                                    <div class="col">
                                        <div id="13">
                                        <p>This award is given to the insurance organization that
has well harnessed technology and digital solutions
to improve business processes and leverage overall
client experience.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="byieInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Company Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="byieInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Contact Person</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber14" type="text" name="byieInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="byieInputWeb22" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="color:#f4623a"/>

                                <br>
                                <div class="row">
                                <h4><a id="btn14" href="#btn14">BEST LGA IN USING ICT APPLICATIONS</a></h4>
                                <div class="col">
                                        <div id="14">
                                        <p>These are Local Government Authorities that are
using tech solutions and digital tools to improve
convenience, efficiency and productivity.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="birInput" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">LGA Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="birInputWeb" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Contact Person</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber15" type="text" name="birInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="birInputWeb22" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                </div>
                                <hr style="color:#f4623a"/>
                                <br>
                                <div class="row">
                                <h4><a id="btn15" href="#btn15">BEST ICT SOLUTION IN AGRICULTURE</a></h4>
                                <div class="col">
                                        <div id="15">
                                        <p>This award recognises local innovators who are
creating digital solutions for agriculture. These are
individuals, companies or institutions that are
spearheading game changing agriculture solutions.</p>
                                            <!-- Name input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="birInput2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Full Name</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text" name="birInputWeb2" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Contact Person</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <!-- site input-->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="phoneNumber16" type="text" name="birInputWeb22" placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="name">Phone Number</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <textarea class="form-control" id="" name="birInputWeb222" rows="2" cols="10"> </textarea>
                                            <label for="name">Why</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                                        </div>
                                        </div>
                                </div>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid"><input class="btn btn-primary btn-xl" id="submitButton" value="Nominate" name="register" type="submit"></div>
                            <br>
                            <div class="d-grid"><h6><a id="myBtn" href="#">Or See my Normination</a></h6></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

 <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
      <p>Enter your Email Address</p>
      <form method="post" action="action.php">
      <!-- Email address input-->
        <div class="form-floating mb-3">
        <input class="form-control" id="email" type="email" name="email2" placeholder="name@example.com" data-sb-validations="required,email" required/>
            <label for="email">Email address</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
        </div>

        <!-- Submit Button-->
        <div class="d-grid"><input class="btn btn-primary btn-xl" id="submitButton" value="Submit" name="getNomination" type="submit"></div>
      </form>
    </div>
    <div class="modal-footer">
    </div>
  </div>

</div>

        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - ICTC. All Rights Reserved</div></div>
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
        <script>
     // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
        </script>
    </body>
</html>

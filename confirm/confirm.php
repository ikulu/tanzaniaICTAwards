<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tanzania ICT Awards : Index</title>
        <!-- Favicon-->
        <link rel="icon" href="./assets/fevicon.png" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleais.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

           <!-- SimpleLightbox plugin CSS-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="../css/styles.css" rel="stylesheet" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            body{
                background: url('../assets/img/bg-.jpg') fixed;
                background-size: cover;
            }

            *[role="form"] {
                max-width: 530px;
                padding: 15px;
                margin: 0 auto;
                border-radius: 0.3em;
                background-color: #f2f2f2;
                min-height:700px;
                height: 100%;
            }

            *[role="form"] h2 {
                font-family: 'Open Sans' , sans-serif;
                font-size: 40px;
                font-weight: 600;
                color: #000000;
                margin-top: 0%;
                text-align: center;
                text-transform: uppercase;
                letter-spacing: 4px;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <?php 
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }else{
                        $id = 0;
                    }
                echo "<form enctype='multipart/form-data' action='../adminstrator/action.php?id=$id' method='POST' class='form-horizontal' role='form'>"?>
                    <h2>Verification</h2>
                    <br>
                    <span id="errMsg"></span>
                    <div class="form-group">
                        <label for="firstName" class="col-sm-3 control-label">Full Name*:</label>
                        <div class="col-sm-9">
                            <input type="text" id="firstName" name="name" placeholder="Company/Institution/Individual" class="form-control" autofocus required/>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">URL: </label>
                        <div class="col-sm-9">
                            <input type="url" id="email" placeholder="Url if any " class="form-control" name= "url">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="phoneNumber" class="col-sm-3 control-label">Phone number*: </label>
                        <div class="col-sm-9">
                            <input type="text" id="phoneNumber27" name="phone" placeholder="Phone number" class="form-control" required/>
                            <span class="help-block">Your phone number won't be disclosed anywhere </span>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Description*: </label>
                        <div class="col-sm-9">
                            <textarea type="text" name="descr" id="height" placeholder="Why Do you think you deserve?" class="form-control" required></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">Attachment: </label>
                        <div class="col-sm-9">
                            <input type="file" name="file" id="height">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <span class="help-block">*Required fields</span>
                        </div>
                    </div>
                    <!-- <php $id = $_GET['id']; $value = "value='$id'"; echo "<input type='hidden' $value name='pendekezwaID'>"; ?> -->
                    <br>
                    <button name="verify" type="submit" class="btn btn-primary btn-block">Verify</button>
                </form> 
            </div> 
        </header>    
    </body>
</html>
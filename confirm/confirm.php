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

                $placeHolder = 'placeholder=""';
                if($_GET['category'] == 'Best ICT Incubation hub'){
                    $placeHolder = 'placeholder="1.	Successful ideas that the innovation intermediary has supported to be a business
                    2.	Startups/ innovators supported Successfully entered the market
                    3.	Number of startups and innovators incubated/ accelerated
                    4.	Total number of jobs created by startups groomed by your center
                    "';
                }elseif($_GET['category'] == 'Best ICT Startup'){
                    $placeHolder = 'placeholder="1.	Describe your successful ICT solution and its impact;
                    2.	Amount raised per year
                    3.	Employment created (both direct and indirect)
                    "';
                }elseif($_GET['category'] == 'Best Innovative ICT Student (Female)'){
                    $placeHolder = 'placeholder="1.	Describe an innovative idea of a student;
                    2.	State prospect potentials of an idea in social and economic aspect
                    "';
                }elseif($_GET['category'] == 'Best Innovative ICT Student (Male)'){
                    $placeHolder = 'placeholder="1.1.	Describe an innovative idea of a student;
                    2.	State prospect potentials of an idea in social and economic aspect
"';
                }elseif($_GET['category'] == 'Best Mobile Network Operator'){
                    $placeHolder = 'placeholder="1.	Describe the most successful CSR program your company has supported;
                    2.	Explain overall outcome of such a CSR program to society;
                    3.	What percentage of revenue your company allocate for CSR program;
                    4.	Explain your CSR provision methodology
                    "';
                }elseif($_GET['category'] == 'Best Company Providing Services on IT'){
                    $placeHolder = 'placeholder="1.	Explain your core outsource business;
                    2.	State your company contribution in creation of job;
                    3.	How successful is your company in provision of outsource service? (please quantify)
                    4.	Your contribution in performance enhancement of organizations your company is serving;
                    "';
                }elseif($_GET['category'] == 'Best Company In Software Development'){
                    $placeHolder = 'placeholder="1.	explain to what extent has company contributed in developing the software industry in Tanzania (please quantify your response);"';
                }elseif($_GET['category'] == 'Best ICT Transformative Training Institution'){
                    $placeHolder = 'placeholder="1.	Explain your program to transform processes of your institute into digital (it should include using ICT as a tool for management, collaboration, teaching, learning, etc)
                    2.	Describe outcomes your Institute community has realized in digital transformation (please quantify)
                    "';
                }elseif($_GET['category'] == 'Best ICT Transformative Institution In Provision Of Health Services'){
                    $placeHolder = 'placeholder="1.	Explain your program to transform processes of your institute into digital (it should include using ICT as a tool for management, collaboration, teaching, learning, etc)
                    2.	Describe outcomes your Institute community has realized in digital transformation (please quantify)
                    "';
                }elseif($_GET['category'] == 'BEST ICT INSTITUTION PROVIDING SERVICES IN FINANCIAL SECTOR'){
                    $placeHolder = 'placeholder="1.	Explain your program to transform processes of your institute into digital (it should include using ICT as a tool for management, collaboration, teaching, learning, etc)
                    2.	Describe outcomes your Institute community has realized in digital transformation (please quantify)
                    "';
                }elseif($_GET['category'] == 'BEST FINANCIAL TECHNOLOGY COMPANY'){
                    $placeHolder = 'placeholder="1.	Describe your successful fintech solution and its impact;
                    2.	Amount raised per year
                    3.	Employment created (both direct and indirect)
                    "';
                }elseif($_GET['category'] == 'Best Female ICT researcher'){
                    $placeHolder = 'placeholder="1.	Explain your ICT research work and its impact to socio-economic development"';
                }elseif($_GET['category'] == 'Best Male ICT researcher'){
                    $placeHolder = 'placeholder="1.	Explain your ICT research work and its impact to socio-economic development"';
                }elseif($_GET['category'] == 'Best Company In Digital Insurance Services'){
                    $placeHolder = 'placeholder="1.	Explain your program to transform processes of your institute into digital (it should include using ICT as a tool for management, collaboration, teaching, learning, etc)
                    2.	Describe outcomes your Institute community has realized in digital transformation (please quantify)
                    "';
                }elseif($_GET['category'] == 'Best LGA In Using ICT Applications'){
                    $placeHolder = 'placeholder="Explain the tech solutions and digital tools used to improve convenience, efficiency and productivity in your Local government Authority (LGA)."';
                }elseif($_GET['category'] == 'Best ICT Solution In Agriculture'){
                    $placeHolder = 'placeholder="1.	Explain to what extent has your ICT software impacted development of the agricultural community in Tanzania (please quantify your response);"';
                }elseif($_GET['category'] == 'Best Artist in Using ICTs For Development'){
                    $placeHolder = 'placeholder="Explain to which extent  have you been using ICT in business processes, management and delivery of your work?"';
                }elseif($_GET['category'] == 'Best Journalist in Using ICT For Development'){
                    $placeHolder = 'placeholder="Explain to which extent  have you been using ICT in business processes, management and delivery of your work?"';
                }elseif($_GET['category'] == 'Best Media House in Using ICT For Development'){
                    $placeHolder = 'placeholder="Explain to which extent  have you been using ICT in business processes, management and delivery of your work?"';
                }elseif($_GET['category'] == 'Best Ministry on ICT Integration in Sectors Policies Award'){
                    $placeHolder = 'placeholder="Explain how your Ministry has integrated ICT in delivery of sector policies. You should explain projects, guidelines, strategies and legal frameworks related to integration of ICT in your sector
                    "';
                }

                echo "<form enctype='multipart/form-data' action='../adminstrator/action.php?id=$id' method='POST' class='form-horizontal' role='form'>"?>
                    <h2>Verification</h2>
                    <h6><?php if(isset($_GET['category']))echo $_GET['category'];  ?></h6>
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
                        <?php echo "<textarea type='text' name='descr' id='height'  $placeHolder  class='form-control' required></textarea>" ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <span class="help-block">*Required fields</span>
                            <span class="help-block">*Verification is done once</span>
                        </div>
                    </div>
                    <br>
                    <button name="verify" type="submit" class="btn btn-primary btn-block">Verify</button>
                </form> 
            </div> 
        </header>    
    </body>
</html>
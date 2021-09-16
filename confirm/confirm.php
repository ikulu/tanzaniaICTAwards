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
                    $placeHolder = 'placeholder="How did you support ideas and startup companies with innovation spaces, office spaces, link to funding, and connections into academic environments?"';
                }elseif($_GET['category'] == 'Best ICT Startup'){
                    $placeHolder = 'placeholder="What are your software, hardware and social innovation areas? And your distinguished development based on growth, innovation, creativity, functionality, market potential and performance."';
                }elseif($_GET['category'] == 'Best Innovative ICT Student (Female)'){
                    $placeHolder = 'placeholder="What’s your ICT Innovation, demonstrated passion, commitment and talent in the ICT field?"';
                }elseif($_GET['category'] == 'Best Innovative ICT Student (Male)'){
                    $placeHolder = 'placeholder="What’s your ICT Innovation, demonstrated passion, commitment and talent in the ICT field?"';
                }elseif($_GET['category'] == 'Best Mobile Network Operator'){
                    $placeHolder = 'placeholder="What development process have you played in corporate social responsibility (CSR)?"';
                }elseif($_GET['category'] == 'Best Company Providing Services on IT'){
                    $placeHolder = 'placeholder="Are you an outsourcing IT service provider? What have you provided in the application of business and technical expertise that enabled organizations in the creation, management, and optimization of or access to information and business processes?"';
                }elseif($_GET['category'] == 'Best Company In Software Development'){
                    $placeHolder = 'placeholder="What software solution have you developed that brought a significant impact to local challenges?"';
                }elseif($_GET['category'] == 'Best ICT Transformative Training Institution'){
                    $placeHolder = 'placeholder="Tell us your achievements and optimum utilization of ICT in the education sector, and what’s your implementation of digital education as an effective tool for learning service?"';
                }elseif($_GET['category'] == 'Best ICT Transformative Institution In Provision Of Health Services'){
                    $placeHolder = 'placeholder="Explain the digital tools used to improve your efficiency in delivering health services."';
                }elseif($_GET['category'] == 'BEST ICT INSTITUTION PROVIDING SERVICES IN FINANCIAL SECTOR'){
                    $placeHolder = 'placeholder="What’s your innovation that led digital transformation in the financial sector?"';
                }elseif($_GET['category'] == 'BEST FINANCIAL TECHNOLOGY COMPANY'){
                    $placeHolder = 'placeholder="What’s your innovation as an agile bank that led digital transformation in the financial sector?"';
                }elseif($_GET['category'] == 'Best Female ICT researcher'){
                    $placeHolder = 'placeholder="What’s your research work that has contributed to develop or promote the ICT sector in Tanzania?"';
                }elseif($_GET['category'] == 'Best Male ICT researcher'){
                    $placeHolder = 'placeholder="What research have you done as contributions in terms of development or promotion of ICT in Tanzania?"';
                }elseif($_GET['category'] == 'Best Company In Digital Insurance Services'){
                    $placeHolder = 'placeholder="How well have you harnessed technology and digital solutions to improve business processes and digital solutions and leverage overall client experience?"';
                }elseif($_GET['category'] == 'Best LGA In Using ICT Applications'){
                    $placeHolder = 'placeholder="Explain the tech solutions and digital tools used to improve convenience, efficiency and productivity in your Local government Authority (LGA)."';
                }elseif($_GET['category'] == 'Best ICT Solution In Agriculture'){
                    $placeHolder = 'placeholder="Tell us the innovative digital solutions you created for agriculture?"';
                }elseif($_GET['category'] == 'Best Artist in Using ICTs For Development'){
                    $placeHolder = 'placeholder="How do you use social media and ICT in general in production, marketing and distribution of your artistic work and talent development?"';
                }elseif($_GET['category'] == 'Best Journalist in Using ICT For Development'){
                    $placeHolder = 'placeholder="How do you use ICT in production and distribution of professional journalism works to educate the public timely? How do you  frequently use websites, blogs and social networks to promote your work?"';
                }elseif($_GET['category'] == 'Best Media House in Using ICT For Development'){
                    $placeHolder = 'placeholder="Tell us how your media house uses ICT for production and distribution of content."';
                }elseif($_GET['category'] == 'Best Ministry on ICT Integration in Sectors Policies Award'){
                    $placeHolder = 'placeholder="What are the strategies, guidelines, regulations and projects that integrate ICT adoption in respective sectors?
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
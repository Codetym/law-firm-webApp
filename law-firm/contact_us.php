<?php 

?>


<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/formValidations.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sign_in.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/dmj.css">
	
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <style> 
            body { 
                width:100%;
                color: bisque;
            } 
            .container .box { 
                width:100%; 
                margin:0px; 
                display:table; 
            } 
            .container .box .box-row { 
                display:table-row; 
            } 
            .container .box .box-cell { 
                display:table-cell; 
                width:60%; 
                padding:30px; 
            } 
            .container .box .box-cell.box1 { 
                background:green; 
                color:white; 
                text-align:justify; 
             } 
            .container .box .box-cell.box2 { 
                background:lightgreen; 
                text-align:justify; 
            }
        .form-header{
            height: 70px;
            padding: 5px;
            border-radius: 16px;
        }
        .container{
            padding: 16px;
        }
        
        .errorClass{
            background-color: #CC6666;
        }
        #errorDiv{
            color: red;
        }
       .errorFeedback{
            visibility: hidden;
        }
        .ok{
            font-weight: bolder;
            color: white;
        }
        .alert{
            width: 50%;
            margin-left: 25px;
        }
        .btn-sm{
            margin-left: 50%;
            font-weight: bolder;
        }
        
        </style> 
    
</head>
<body>
        <center>
        <nav>
			<ul class='horizontal-list' style="height: 32%;">
				<div class="alert" style="margin-top: 0; width: 100%; padding: 0; background-color: white;">
				<img src="images/logo.jpg" width="150px" height="80px" align="center" style="border-radius:100%;" />  
				<h1 align='left' style="color: blue; font-weight: bolder;">BROSH & CO ADVOCATES COMMUNICATIONS SYSTEM</h1>
                </div>
					<li><a href="index.php"><b>HOME</b></a></li>
                     <li><a href="services.php"><b>OUR SERVICES</b></a></li>
					<li><a href="contact_us.php" class="active"><b>CONTACT US</b></a></li>
					<li><a href="forum.php"><b>FORUM</b></a></li>
					<li><a href="about-us.php"><b>ABOUT US</b></a></li>
					<li><a href="officials.php"><b>AUTHENTICATED AREA</b></a></li>
            </ul>
        </nav>
        </center>
	<br /><br /><br /><br /><br />
	<br /><br /><br /><br />
        <div class="container"> 
            <div class="box"> 
                <div class="box-row"> 
                    <div class="box-cell box1" style="background: #f0f0f0;"> 
                    <div class="signup-form" style="padding: 16px;">
                        <?php include_once('includes/contsct-us-process.php'); ?>
		<form action="" method="POST" name="broshForm" id="broshForm">

			<div class="form-header">
				<h2>Contact us</h2>
			</div>
            
            <div id="errorDiv"></div>

			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Full Name" autocomplete="on" id="name">
                <span class="errorFeedback errorSpan" id="nameError">Name Is Required!</span>
			</div>

			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email Address" autocomplete="on" id="email">
                <span class="errorFeedback errorSpan" id="emailError">Email Is Required!</span>
			</div>

			<div class="form-group">
				<input type="phone" name="phone" class="form-control" placeholder="Telephone Number" autocomplete="on" id="phone">
                <span class="errorFeedback errorSpan" id="phoneError">Phone Number Is Required!</span>
			</div>

			<div class="form-group">
                <textarea name="msg" placeholder="Message Here..." class="form-control" id="msg"></textarea>
                <span class="errorFeedback errorSpan" id="msgError">Message Is Required!</span>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success btn-block btn-lg" name="submit">SEND</button>
			</div>

		</form>

	</div>
 
                    </div> 
                    <div class="box-cell box2">
                        <div class="form-header">
                            <h2>HELLO!!</h2>
                        </div>
                      <div class="form-group">
                        <img alt="Envelope" src="images/envelope2.jpg" class="img-responsive img-fluid">   
                     </div>
                        <br />
                    <div class="form-group">
                        <img alt="Envelope" src="images/envelope1.jpg" class="img-responsive img-fluid">   
                    </div>
                        
                    </div> 
                </div> 
            </div> 
        </div>
    
    <br /><br /><br />
	
	
	<footer id = "footer"> 
          
    <!-- Company Details -->
    <!-- 1. Address  
         2. Contact Number 
         3. Enquiry Mail  
    -->
    <div class="company-details"> 
        <div class="row"> 
            <div id ="col1"> 
                <span id = "icon" class="fa fa-map-marker"></span> 
                    <div> 
					<p>Location:<br />
                    Plot 710-B<br />
					Nakawa Industrial Area 
                    <br />Sector-142<br />
					Ntinda Road</p>
					</div>
            </div> 
                  
            <div id ="cdiv2"> 
                <span id="icon" class="fa fa-phone"></span> 
  
                <span> 
                    Telephone<br /> +256751676107 <br /> +256791093369
                </span> 
            </div> 
                      
            <div id ="col3"> 
                <span id="icon" class="fa fa-envelope"></span> 
                <span>info@brosh.org</span> 
            </div> 
        </div> 
    </div> 
              
    <!-- Copyright Section -->
    <div class="copyright"> 
        <p>©  All rights reserved | Brosh & Co Advocates.</p> 
      
       <div class="contact"> 
            <li> 
                <a href="https://www.twitter.com/">
                    <span class="fa fa-twitter" id="icon">&nbsp;</span>
                </a> 
            </li> 
              
            <li> 
                <a href="https://www.facebook.com/"> 
                    <span class="fa fa-facebook" id="icon">&nbsp;</span> 
                </a> 
            </li> 
              
            <li> 
                <a href="https://www.instagram.com/"> 
                    <span class="fa fa-instagram"  id="icon">&nbsp;</span> 
                </a> 
            </li>
           
           <li> 
                <a href="https://www.whatsapp.com/"> 
                    <span class="fa fa-whatsapp" id="icon">&nbsp;</span> 
                </a> 
            </li>
           
           <li> 
                <a href="https://www.youtube.com/"> 
                    <span class="fa fa-youtube" id="icon">&nbsp;</span> 
                </a> 
            </li> 
           
           <li> 
                <a href="#"> 
                    <span class="fa fa-rss-square fa-5x" id="icon">&nbsp;</span> 
                </a> 
            </li> 
        </div>
    </div> 
</footer>
    
</body>
</html>


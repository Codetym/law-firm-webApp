<?php
	require_once("functions.php");
	/**$user = new User;
	$user->logout();
	//fuFrF6Kx^v!DnsM#q4hl**/
?>
<!DOCTYPE html>
<html>
<head>
	<title>BROSH & Co Advocates</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ckeditor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="javascript/formValidations.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/dmj.css">
    <link rel="stylesheet" type="text/css" href="css/sign_in.css">
    
    <style>
         ol li {
            padding: 30px;
            font-size: 18px;
        }
        
        .copyright{
            align-content: center;
        }
        
        span{
            color:red;
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
        label{
            color: black;
            font-weight: bolder;
            font-size: 20px;
        }
    </style>

</head>
<body style="background:url('images/courtHammer.jpg');">
	<nav>
			<ul class='horizontal-list' style="height: 32%;">
				<div class="alert" style="margin-top: 0; width: 100%; padding: 0; background-color: white;">
				<img src="images/logo.jpg" width="150px" height="80px" align="center" style="border-radius:100%;" />  
				<h1 align='left'>BROSH & CO. ADVOCATES COMMUNICATIONS SYSTEM</h1>
                </div>
					<li><a href="index.php"><b>HOME</b></a></li>
                     <li><a href="services.php"><b>OUR SERVICES</b></a></li>
					<li><a href="contact_us.php"><b>CONTACT US</b></a></li>
					<li><a href="forum.php"><b>FORUM</b></a></li>
					<li><a href="about-us.php"><b>ABOUT US</b></a></li>
					<li><a href="officials.php" class="active"><b>AUTHENTICATED AREA</b></a></li>
        </ul>
       </nav>
	<br /><br /><br /><br />
	<br /><br /><br />
	<div class="signin-form" style="margin-top: 40px; position: relative;">
		<form action="" method="POST" name="broshForm" id="broshForm">

			<div class="form-header">
				<h2>LOGIN</h2>
				<p>Don't Have An Account? <a href="signup.php" style="color:red;">Contact Site Admin</a></p>
			</div>

			<div class="form-group">
				<span style="font-size: 24px;"><i class="fa fa-envelope"></i></span>
				<label style="font-size: 20px; font-weight: bolder;">Email</label>
				<input type="email" name="email" class="form-control" placeholder="example@site.com" autocomplete="on" id="email">
                <span class="errorFeedback errorSpan" id="emailError">Email Is Required!</span>
			</div>

			<div class="form-group">
                <span style="font-size: 24px;"><i class="fa fa-lock"></i></span>
				<label style="font-size: 20px; font-weight: bolder;">Password</label>
				<input type="password" name="pass" class="form-control" placeholder="Password" autocomplete="off" id="password">
                 <span class="errorFeedback errorSpan" id="passwordError">Password Is Required!</span>
			</div>

			<div>Forgot Password? <a href="forgot_password.php">Click Here</a></div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Sign In</button>
			</div>

			<?php include_once('signin_user.php'); ?>

		</form>

		

	</div>
	<br />
	<br />
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
                  
            <div id ="col2"> 
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
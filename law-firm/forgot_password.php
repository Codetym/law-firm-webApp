<?php
	/**session_start();
	require_once('includes/find_friends_function.php');
	include_once('includes/header.php');
	
	if (!isset($_SESSION['user_email'])) {
		header("Location: signin.php");
	}
	else{**/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login To Your Account</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">
	<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Tangerine">

	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sign_in.css">
	<link rel="stylesheet" type="text/css" href="css/dmj.css">
</head>
<body style="background:url('images/courtHammer.jpg');">
	<ul>
		<img src="images/broshLogo.jpg" width="180px" height="110px" align="left" style="border-radius:50%;" />  
		<h1>BROSH &  CO ADVOCATES</h1>
			
			<li><a href="index.php"><b>HOME</b></a></li>
			<li><a href="appointments.php"><b>APPOINTMENTS</b></a></li>
			<li><a href="officials.php" class="active"><b>FIRM OFFICIALS ONLY</b></a></li>
			<li><a href="contact_us.php"><b>CONTACT US</b></a></li>
			<li><a href="forum.php"><b>FORUM</b></a></li>
			<li><a href="about-us.php"><b>ABOUT-US</b></a></li>
	</ul>
	<br /><br /><br /><br /><br /><br /><br />
	<div class="signin-form">
		<form action="" method="POST">

			<div class="form-header">
				<h2>Forgot Password</h2>
				<p>MyChat</p>
			</div>

			<div class="form-group">
				<span><i class="fa fa-envelope"></i></span>
				<label>Email</label>
				<input type="email" name="email" class="form-control" placeholder="example@site.com" required autocomplete="on">
			</div>

			<div class="form-group">
				<label>Best Friend Name</label>
				<input type="text" name="bf" class="form-control" placeholder="Someone's Name" required autocomplete="off">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
			</div>
			
			<div class="text-center small" style="color: red;">Back To Sign In <a href="
			signin.php">Click Here</a></div>

		</form>

		

	</div>
	<?php
		session_start();

		include 'includes/connection.php';

		if (isset($_POST['submit'])) {
			$email = htmlentities(mysqli_escape_string($con, $_POST['email']));
			$recovery_account = htmlentities(mysqli_escape_string($con, $_POST['bf']));

			$select_user = "SELECT * FROM users WHERE user_email = '$email' AND forgotten_answer = '$recovery_account'";
			$query = mysqli_query($con, $select_user);
			$check_user = mysqli_num_rows($query);

			if ($check_user == 1) {
				$_SESSION['user_email'] = $email;

				echo "<script>window.open('create_password.php', '_self')</script>";
			}
			else{
				echo "<script>alert('Either your Email or Best Friend Name is Incorrect')</script>";

				echo "<script>window.open('forgot_password.php', '_self')</script>";
			}
		}
	?>
	
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
      
       <!-- <ul class="contact"> 
            <li> 
                <a href="#" class="fa fa-twitter"> 
                    <span>Twitter</span> 
                </a> 
            </li> 
              
            <li> 
                <a href="#" class="fa fa-facebook"> 
                    <span></span> 
                </a> 
            </li> 
              
            <li> 
                <a href="#" class="fa fa-rss"> 
                    <span>Pinterest</span> 
                </a> 
            </li> 
        </ul> -->
    </div> 
</footer>


</body>
</html>
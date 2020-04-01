<?php include_once('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create New User</title>
		<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">
	<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Tangerine">

	<link rel="stylesheet" type="text/css" href="css/sign_in.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<meta charset="utf-8" name="viewport" content="width=divice-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootsrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/dmj.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<ul>
		<img src="images/broshLogo.jpg" width="180px" height="110px" align="left" style="border-radius:50%;" /> 
		<h1>BROSH &  CO ADVOCATES</h1>
			
			<li><a href="index.php"><b>HOME</b></a></li>
			<li><a href="appointments.php"><b>APPOINTMENTS</b></a></li>
			<li><a href="officials.php"><b>FIRM OFFICIALS ONLY</b></a></li>
			<li><a href="contact_us.php"><b>CONTACT US</b></a></li>
			<li><a href="forum.php">FORUM</a></li>
			<li><a href="about-us.php"><b>ABOUT-US</b></a></li>
			
	</ul>
	<br /><br /><br /><br />
	<div class="header">
		<h2>Create New User</h2>
	</div>
	
	<form method="post" action="create_user.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> + Create user</button>
		</div>
	</form>
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
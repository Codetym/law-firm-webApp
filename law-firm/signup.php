<!DOCTYPE html>
<html>
<head>
	<title>Create New Account</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sign_up.css">
</head>
<body>
	<div class="signup-form">
		<form action="" method="POST">

			<div class="form-header">
				<h2>Sign Up</h2>
				<p>Fill Out This Form</p>
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" name="user_name" class="form-control" placeholder="example: Nelly" required autocomplete="on">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" name="user_pass" class="form-control" placeholder="Password" required autocomplete="off">
			</div>

			<div class="form-group">
				<label>Email Address</label>
				<input type="email" name="user_email" class="form-control" placeholder="example@site.com" required autocomplete="on">
			</div>

			<div class="form-group">
				<label>Country</label>
				<select class="form-control" name="user_country" required >
					<option disabled="">Select a Country</option>
					<option>Pakistan</option>
					<option>U.S.A</option>
					<option>Uganda</option>
					<option>South Sudan</option>
					<option>Kenya</option>
				</select>
			</div>

			<div class="form-group">
				<label>Gender</label>
				<select class="form-control" name="user_gender" required >
					<option disabled="">Select Gender</option>
					<option>Female</option>
					<option>Male</option>
					<option>Other</option>
				</select>
			</div>
            
            <div class="form-group">
				<label>User Type</label>
				<select class="form-control" name="user_type" required >
					<option disabled="">User Type</option>
					<option>Admin</option>
					<option>User</option>
				</select>
			</div>

			<div class="form-group">
				<label class="checkbox-inline"><input type="checkbox" required>I accept the <a href="#"> Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
			</div>

			<?php include_once('signup_user.php'); ?>

		</form>

		<div class="text-center small" style="color: #67428B;">Already Have An Account? <a href="
			officials.php">Login</a></div>

	</div>

</body>
</html>
<?php
	session_start();
	require_once('includes/find_friends_function.php');
	include_once('includes/header.php');
	
	if (!isset($_SESSION['user_email'])) {
		header("Location: signin.php");
	}
	else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create New Password</title>
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
</head>
<body style="background:url('images/courtHammer.jpg');">
	<div class="signin-form">
		<form action="" method="POST">

			<div class="form-header">
				<h2>Create New Password</h2>
				<p>MyChat</p>
			</div>

			<div class="form-group">
				<label>Enter Password</label>
				<input type="password" name="pass1" class="form-control" placeholder="Password" required autocomplete="off">
			</div>

			<div class="form-group">
				<label>Confirm Password </label>
				<input type="password" name="pass2" class="form-control" placeholder="Confirm Password" required autocomplete="on">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Change</button>
			</div>

		</form>
	</div>
	<?php
		session_start();
		include 'includes/connection.php';

		if (isset($_POST['change'])) {
			$user  = $_SESSION['user_email'];
			
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];

			if ($pass1 !== $pass2) {
							
				echo "
					<div class='alert alert-danger'>
						<strong>The New and Confirm Password don/'t Match</strong>
					</div>
				";
			}

			if ($pass1 < 7 AND $pass2 < 7) {
				
				echo "
					<div class='alert alert-danger'>
						<strong>Use atleast 8 Characters</strong>
					</div>
				";
			}

			if ($pass1 === $pass2) {
				$update_pass = mysqli_query($con, "UPDATE users SET user_pass = '$pass1' WHERE user_email = '$user'");
				session_destroy();
				echo "<script>alert('Go Ahead and Sign In')</script>";

				echo "<script>window.open('signin.php', '_self')</script>";
			}
		}


	?>
</body>
</html>
<?php } ?>
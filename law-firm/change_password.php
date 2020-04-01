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
	<title>Change Profile Picture</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">

	<link rel="stylesheet" type="text/css" href="../css/find_people.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="jquery3.4.1.min.js"></script>
	
</head>
<style type="">
	body{
		overflow-x: hidden;
	}
</style>
<body>
	
	<div class="row">
		<div class="col-sm-2">	
		</div>
		<div class="col-sm-8">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="table table-bordered table-hover">
					<tr align="center">
						<td colspan="6" class="active"><h2>Change Password</h2></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Current Password</td>
						<td>
							<input type="password" id="mypass" name="current_pass" class="form-control"  placeholder="Current 
							Password" />
						</td>
					</tr>

					<tr>
						<td style="font-weight: bold;">New Password</td>
						<td>
							<input type="password" id="mypass" name="u_pass1" class="form-control"  placeholder="New Password" />
						</td>
					</tr>

					<tr>
						<td style="font-weight: bold;">Confirm Password</td>
						<td>
							<input type="password" id="mypass" name="u_pass2" class="form-control"  placeholder="Confirm 
							Password" />
						</td>
					</tr>

					<tr align="center">
						<td colspan="6">
							<input type="submit" name="change" value="Change" class="btn btn-info">
						</td>
					</tr>
				</table>
			</form>

			<?php
				if (isset($_POST['change'])) {

					
						$c_pass = $_POST['current_pass'];
						$pass1 = $_POST['u_pass1'];
						$pass2 = $_POST['u_pass2'];

								//fetching data of logged in user...
						$user 		= 		$_SESSION['user_email'];
						$get_user	 = 		"SELECT * FROM users WHERE user_email='$user'";
						$run_user	 =	mysqli_query($con, $get_user);
						$row 		=	mysqli_fetch_array($run_user);

						$user_password	=	$row['user_pass'];

						if ($c_pass != $user_password) {
							
							echo "
								<div class='alert alert-danger'>
									<strong>Your Old Password didn\'t Match</strong>
								</div>
							";
						}

						if ($pass1 != $pass2) {
							
							echo "
								<div class='alert alert-danger'>
									<strong>The New and Confirm Password don\'t Match</strong>
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

						if ($pass1 == $pass2 AND $c_pass == $user_password) {
							
							$update_pass = mysqli_query($con, "UPDATE users SET user_pass = '$pass1' WHERE user_email = '$user'");

							echo "
								<div class='alert alert-danger'>
									<strong>Password Change Successful</strong>
								</div>
							";
						}
				}
			?>
		</div>

		<div class="col-sm-2">
			
		</div>
	</div>

</body>
</html>
<?php } ?>
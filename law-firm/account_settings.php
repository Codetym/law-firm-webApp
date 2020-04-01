<?php
	session_start();
	require_once('includes/find_friends_function.php');
	//require_once('includes/chatAppFunctions.php');
	require_once('includes/header.php');
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
	<title>Account Settings</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">
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
<body>
	<div class="row">
		<div class="col-sm-2">
			
		</div>
		<?php  
		//fetching data of logged in user...
			$user = $_SESSION['user_email'];
			$get_user = "SELECT * FROM users WHERE user_email='$user'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);

			$user_name		=	$row['user_name'];
			$user_pass		=	$row['user_pass'];
			$user_email		=	$row['user_email'];
			$user_profile	=	$row['user_profile'];
			$user_country	=	$row['user_country'];
			$user_gender	=	$row['user_gender'];

		?>

		<!--Echoing the fetched data-->
		<div class="col-sm-8">
			<form action="" method="POST" enctype="multipart/form-data">
				<table class="table table-bordered table-hover">
					<tr align="center">
						<td colspan="6" class="active" style="background-color: green; color: white;"><h2>Change Account Settings</h2></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change Your Username</td>
						<td>
							<input type="text" name="u_name" class="form-control"  value="<?php echo $user_name; ?>" />
						</td>
					</tr>
						<tr><td></td><td><a href="upload.php" class="btn btn-default" style="text-decoration: none; font-size: 15px;"><i class="fa-fa-user" aria-hidden="true"></i>Change Profile</a></td>
					</tr>

					<tr>
						<td style="font-weight: bold;">Change Your Email</td>
						<td>
							<input type="email" name="u_email" class="form-control"  value="<?php echo $user_email; ?>" />
						</td>
					</tr>

					<tr>
						<td style="font-weight: bold;">Country</td>
						<td>
							<select class="form-control" name="u_country">
								<option><?php echo $user_country; ?></option>
								<option>U.S.A</option>
								<option>U.K.</option>
								<option>U.A.E</option>
								<option>Saudi Arabia</option>
								<option>Pakistan</option>
								<option>Uganda</option>
							</select>
						</td>
					</tr>

					<tr>
						<td style="font-weight: bold;">Gender</td>
						<td>
							<select class="form-control" name="u_gender">
								<option><?php echo $user_gender; ?></option>
								<option>Female</option>
								<option>Male</option>
								<option>Other</option>
							</select>
						</td>
					</tr>

					<tr>
						<td style="font-weight: bold;">Forgotten Password?</td>
						<td>
							<button type="submit" class="btn btn-default" data-toggle="modal" data-target="myModal">Forgotten Password</button>

							<div id="myModal" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="midal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<form action="recovery.php?id=<?php echo $user_id; ?>" method="POST" id="f">
												<strong>What Is Your School Best Friend's Name?</strong>
												<textarea class="form-control" cols="83" rows="4" name="content" placeholder="Someone's Name"></textarea><br />
												<input type="submit" class="btn btn-default" name="sub" value="Submit" style="width: 100px;"><br /><br />
												<pre>Answer the above Question.We will ask you this question if You forget your <br>Password</pre><br><br>
											</form>

											<?php
												if (isset($_POST['sub'])) {
													$bfn = htmlentities($_POST['content']);
													if ($bfn == '') {
														echo "<script>alert('Please Enter Something')</script>";

														echo "<script>window.open('account_settings.php', '_self')</script>";
														exit();
													}
													else{
														$update ="UPDATE users SET forgotten_answer ='$bfn' WHERE user_email = '$user'";
														$run = mysqli_query($con, $update);
														if ($run) {
															echo "<script>alert('Successsfull')</script>";

															echo "<script>window.open('account_settings.php', '_self')</script>";
														}
														else{
															echo "<script>alert('Error Occured while updating information')</script>";
															echo "<script>window.open('account_settings.php', '_self')</script>";
														}
													}
												}

											?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
					</tr>

					<tr>
						<td></td><td><a href="change_password.php" class="btn btn-default" style="text-decoration: none; font-size: 15px;"><i class="fa fa-key fa-fw" aria-hidden="true"></i>Change Password</a></td>
					</tr>

					<tr align="center">
						<td colspan="6">
							<input type="submit" name="update" value="Update" class="btn btn-info" style="background-color: green;">
						</td>
					</tr>

				</table>
			</form>

			<?php
				if (isset($_POST['update'])) {
					$user_name 	= htmlentities($_POST['u_name']);
					$email 		= htmlentities($_POST['u_email']);
					$u_country 	= htmlentities($_POST['u_country']);
					$u_gender 	= htmlentities($_POST['u_gender']);

					$update = "UPDATE users SET user_name = '$user_name', user_email = '$email', user_country = 'u_country', user_gender = '$u_gender' WHERE user_email = '$user'";
					$run = mysqli_query($con, $update);

					if ($run) {
						echo "<script>window.open('account_settings.php', '_self')</script>";
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
<?php
	session_start();
	include_once('includes/find_friends_function.php');
	include_once('includes/header.php');
	
	if (!isset($_SESSION['user_email'])) {
		header("Location: officials.php");
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

	<style type="text/css">
		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			max-width: 400px;
			margin: auto;
			text-align: center;
			font-family: arial;
		}
		.card img{
			height: 200px;
		}
		.title{
			color: grey;
			font-size: 18px;
		}
		button{
			border: none;
			outline: 0;
			display: inline-block;
			padding: 9px;
			color: white;
			background-color: #000;
			text-align: center;
			cursor: pointer;
			width: 100px;
			font-size: 18px;
		}
		#update_profile{
			position: absolute;
			cursor: pointer;
			padding: 10px;
			border-radius: 4px;
			color: white;
			background-color: #000;
		}
		label{
			padding: 7px;
			display: table;
			color: #fff;
		}
		input[type="file"]{
			display: none;
		}
	</style>
	
</head>
<body>
	
	<?php  
		//fetching data of logged in user...
			$user = $_SESSION['user_email'];
			$get_user = "SELECT * FROM users WHERE user_email='$user'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);

			$user_name		=	$row['user_name'];
			$user_profile	=	$row['user_profile'];

			//display data of clicked on user.....

		echo "
				<div class='card'>
					<img src='$user_profile'>
					<h1>$user_name</h1>
					<form method='POST' enctype='multipart/form-data'>
						<label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i>Select Image
							<input type='file' name='u_image' size='60'>
						</label>

						<button id='button_profile' name='update'>&nbsp;&nbsp;&nbsp;Update Image</button>
					</form>
				</div><br /><br />
		";

		//what happens if the update button is clicked. retrieve images from file.
		if (isset($_POST['update'])) {
			
			$u_image = $_FILES['u_image']['name'];
			$imge_tmp = $_FILES['u_image']['tmp_name'];
			$random_number = rand(1,100);

			if ($u_image == "") {
				
				echo "<script>alert('Please Select a Profile Image')</script>";
				echo "<script>window.open('upload.php', '_self')</script>";
				exit();
			}
			else{

				move_uploaded_file($imge_tmp, "images/$u_image.$random_number");

				//update database
				$update = "UPDATE users SET user_profile = 'images/$u_image.$random_number' WHERE user_email = '$user'";

				$run_update = mysqli_query($con, $update);

				if ($run_update) {
					
					echo "<script>alert('Profile Image Updated')</script>";
					echo "<script>window.open('upload.php', '_self')</script>";

				}
			}
		}

		?>

</body>
</html>
<?php } ?>
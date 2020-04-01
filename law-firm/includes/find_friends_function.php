<?php

//helps a user to retrieve a firend to chat with
require_once('connection.php');

function search_user(){

	global $con;

//when the user clicks on the search btn....
	if (isset($_GET['search_btn'])) {
		$search_query = htmlentities($_GET['search_query']);
		$get_user = "SELECT * FROM users WHERE user_name LIKE '%$search_query%' OR user_country LIKE '%$search_query%'";
	}
	else{
		$get_user = "SELECT *  FROM users ORDER BY user_country, user_name DESC LIMIT 5";
	}

	$run_user = mysqli_query($con, $get_user);

//using while loop, we r going to iterate through each of the fields we r retrieving
	while ($row_user = mysqli_fetch_array($run_user)) {
		
		$user_name		=	$row_user['user_name'];
		$user_profile	=	$row_user['user_profile'];
		$country  		=	$row_user['user_country'];
		$gender			=	$row_user['user_gender'];

		//display data of clicked on user.....

		echo "

			<div class='card'>
				<img src='../$user_profile'>
				<h1>$user_name</h1>
				<p class='title'>$country</p>
				<p>$gender</p>
				<form method='post'>
					<p><button name='add'>Chat with $user_name</button></p>
				</form>
			</div><br /><br />


		";

		if (isset($_POST['add'])) {
			echo "<script>window.open('../users_home.php?user_name=$user_name', '_self')</script>";
		}
	}
}

function logout(){

	global $con;

	// log user out if logout button clicked
	
	if(isset($_GET['logout'])){
		$update_msg = mysqli_query($con, "UPDATE users SET log_in = 'Offline' WHERE user_name = '$user_name'");
		header("Location:logout.php");

		session_destroy();
		unset($_SESSION['user_email']);
		header("Location:signin.php");
		exit();
	}
}

?>
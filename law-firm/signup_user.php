<?php  
include_once('includes/connection.php');

if (isset($_POST['sign_up'])) {
	//escaping form input before storage in db
	$name	= htmlentities(mysqli_escape_string($con, $_POST['user_name']));
	$pass	= htmlentities(mysqli_escape_string($con, $_POST['user_pass']));
	$email	= htmlentities(mysqli_escape_string($con, $_POST['user_email']));
	$country= htmlentities(mysqli_escape_string($con, $_POST['user_country']));
	$gender =   htmlentities(mysqli_escape_string($con, $_POST['user_gender']));
    $userType= htmlentities(mysqli_escape_string($con, $_POST['user_type']));
	$rand	= rand(1, 2);//gives users a chance to choose one of given two profile pics :male/female

	//validate form fields
	if ($name == '') {
		echo "<script>alert('Name Can't Be Empty)</script>";
	}
	if (strlen($pass) < 8) {
		echo "<script>alert('Password should be minimum 8 characters')</script>";
		exit();
	}
	//check if entered user email is already resident in our db.
	$check_email = "SELECT * FROM users WHERE user_email = '$email'";
	$run_email = mysqli_query($con, $check_email);
	$check 	= mysqli_num_rows($run_email);

	if ($check == 1) {
		echo "<script>alert('This Email Address {$email} is taken')</script>";
		echo "<script>window.open('signup.php'))</script>";//redirect
		exit();
	}
	if ($rand == 1) 
		$profile_pic = "images/codingcafe1.png";
	else if($rand == 2)
		$profile_pic = "images/codingcafe2.png";

	//inserting into the db tbl name users
	$insert = "INSERT INTO users (user_name, user_pass, user_email, user_profile, user_country, user_gender, user_type) VALUES ('$name', '$pass', '$email', '$profile_pic', '$country', '$gender', '$userType')";
	$query = mysqli_query($con, $insert);

	if ($query) {
		echo "<script>alert('Congragulations $name, your account has been created successfully')</script>";
		echo "<script>window.open('officials.php', '_self')</script>";
	}
	else{
		echo "<script>alert('Registration Failed, Try Again')</script>";
		echo "<script>window.open('signup.php')</script>";
	}
	


}

?>
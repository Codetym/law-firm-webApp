<?php
include_once('includes/connection.php');

if (isset($_POST['submit'])) {
	$email	= htmlentities(mysqli_escape_string($con, $_POST['email']));
	$pass	= htmlentities(mysqli_escape_string($con, $_POST['pass']));

	//retrieve user from the db
	$select_user = "SELECT * FROM users WHERE user_email = '$email' AND user_pass = '$pass'";
	$query = mysqli_query($con, $select_user);
	$count_user = mysqli_num_rows($query);

	if ($count_user == 1) {
        //user has been found...
        //check this user's user type.
        $logged_in_user = mysqli_fetch_assoc($query);
        if($logged_in_user['user_type'] == 'Admin'){
            $_SESSION['user_email'] = $email;
            $logged_in_user;

            //update table to set user status to online
            $update_status = mysqli_query($con, "UPDATE users SET log_in ='Online' WHERE user_email = '$email'");

            $user 		= $_SESSION['user_email'];
            $get_user 	= "SELECT * FROM users WHERE user_email = '$user'";
            $run_user	= mysqli_query($con, $get_user);
            $row	 	= mysqli_fetch_array($run_user);
            $user_name 	= $row['user_name'];

            echo "<script>window.open('admin_home.php?$user_name', '_self')</script>";
        }
        else{
            $_SESSION['user_email'] = $email;
            $logged_in_user;
            
             //update table to set user status to online
            $update_status = mysqli_query($con, "UPDATE users SET log_in ='Online' WHERE user_email = '$email'");

            $user 		= $_SESSION['user_email'];
            $get_user 	= "SELECT * FROM users WHERE user_email = '$user'";
            $run_user	= mysqli_query($con, $get_user);
            $row	 	= mysqli_fetch_array($run_user);
            $user_name 	= $row['user_name'];

            echo "<script>window.open('users_CP.php?$user_name', '_self')</script>";
        }
    }
    
   /* else if ($count_user == 1 && $userType == 'User') {
		$_SESSION['user_email'] = $email;

		//update table to set user status to online
		$update_status = mysqli_query($con, "UPDATE users SET log_in ='Online' WHERE user_email = '$email'");

		$user 		= $_SESSION['user_email'];
		$get_user 	= "SELECT * FROM users WHERE user_email = '$user'";
		$run_user	= mysqli_query($con, $get_user);
		$row	 	= mysqli_fetch_array($run_user);
        $user_name 	= $row['user_name'];

		echo "<script>window.open('users_CP.php?$user_name', '_self')</script>";
    }*/
    
	else{
		echo "

		<div class='alert alert-danger'>
			<strong>Check Your Email and Password Combination.</strong>
		</div>


		";
	}
}


?>
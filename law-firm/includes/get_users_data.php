<?php
	require_once('connection.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	//$con = mysqli_connect("localhost", "root", "", "dmj_db") or die('db not fund');
	$user = "SELECT * FROM users";

	$run_user = mysqli_query($con, $user);

	while ($row_user 		= mysqli_fetch_array($run_user)) {
		$user_id 			= $row_user['user_id'];
		$user_name 			= $row_user['user_name'];
		$user_profile_image = $row_user['user_profile'];
		$login 				= $row_user['log_in'];

		echo "
			<li>
				<div class='chat-left-img'>
					<img src='$user_profile_image'>
				</div>

				<div class='chat-left-details'>
					<p><a href='chatApp.php?user_name=$user_name'>$user_name</a></p>
            ";

		if ($login == 'Online') {
			echo "<span><i class='fa fa-circle' aria-hidden='true'></i> <small>Online</small></span>";
		}
		else{
			echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i> <small>Offline</small></span>";
		}
		" 
			</div>
		</li>
		";
}

?>
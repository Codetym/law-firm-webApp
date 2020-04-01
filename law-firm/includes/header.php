<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<button class="btn btn-primary btn-lg"><a href="../chatApp.php" class="navbar-brand">
			<?php
				global $con;
				$user = $_SESSION['user_email'];
				$get_user = "SELECT * FROM users WHERE user_email = '$user'";
				$run_user = mysqli_query($con, $get_user);
				$row = mysqli_fetch_array($run_user);

				$user_name = $row['user_name'];
				echo "<a class='navbar-brand' href='../chatApp.php?user_name=$user_name'>MyChat</a>";
			?>
		</a></button>

		<ul class="navbar-nav">
			<li><button class="btn btn-success btn-lg"><a href="../account_settings.php" style="color: white; text-decoration: none; font-size: 20px;"><i class="fa fa-settings"></i>Settings</a></button></li>
		</ul>
	</nav><br />
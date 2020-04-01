<?php
	session_start();
	require_once('includes/connection.php');
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//include_once('includes/header.php');
	//require_once('includes/find_friends_function.php');
	
	if (!isset($_SESSION['user_email'])) {
		die(header("Location:officials.php"));
	}
	else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Chat Room</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ckeditor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/home.css">
	
	
</head>
<body>
	<div class="container main-section">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<div class="input-group-btn">
						<center>
							<a href="includes/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit" style="color: white; background: green;">Add New User</button></a>
						</center>
					</div>
				</div>
				<div class="left-chat">
					<ul>
						<?php include_once('includes/get_users_data.php'); ?>
					</ul>
				</div>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
				<div class="row">
					<!--Getting the user info who is logged in-->
					<?php 
						$user = $_SESSION['user_email'];
						$get_user = "SELECT * FROM users WHERE user_email = '$user'";
						$run_user = mysqli_query($con, $get_user);
						$row = mysqli_fetch_array($run_user);

						$user_id = $row['user_id'];
						$user_name = $row['user_name'];
                        $email = $row['user_email'];
					?>

					<!--Getting the user data on which a user clicks-->
					<?php
						if (isset($_GET['user_name'])) {
							global $con;

							$get_username = $_GET['user_name'];
							$get_user = "SELECT * FROM users WHERE user_name = '$get_username'";
							$run_user = mysqli_query($con, $get_user);
							$row_user = mysqli_fetch_array($run_user);

							$username = $row_user['user_name'];
							$user_profile_image = $row_user['user_profile'];
						}
						$total_messages = "SELECT * FROM users_chat WHERE (sender_username = '$user_name' AND receiver_username = '$username') OR (receiver_username = '$user_name' AND sender_username = '$username')";
						$run_messages = mysqli_query($con, $total_messages);
						$total = mysqli_num_rows($run_messages);
					?>

					<div class="col-md-12 right-header">
						<div class="right-header-img">
							<img src="<?php echo $user_profile_image;?>">
						</div>
						<div class="right-header-detail">
							<form method="POST">
								<p><?php echo $username;?></p>
								<span><?php echo $total;?> messages</span>&nbsp;&nbsp;
                                
                                <?php
                                    if(isset($_POST['logout'])){
                                        $sql = "UPDATE users SET log_in = 'Offline' WHERE user_email = '$email'";
                                        $update = mysqli_query($con, $sql);
                                    }
                                ?>
								<button name="logout" class="btn btn-danger" onclick="<?php $update ?>"><a href="logout.php">Logout</a></button>
                                
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div id="scrolling-to-bottom" class="col-md-12 right-header-contentChat">
						<?php
							$update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status = 'read' WHERE sender_username = '$username' AND receiver_username = '$user_name'");
							$sel_msg = "SELECT * FROM users_chat WHERE (sender_username='$username' AND receiver_username='$user_name') OR (receiver_username='$username' AND sender_username='$user_name') ORDER BY 1 ASC";
							$run_msg = mysqli_query($con, $sel_msg);

							while ($row = mysqli_fetch_array($run_msg)) {
								$sender_username = $row['sender_username'];
								$receiver_username = $row['receiver_username'];
								$msg_content = $row['msg_content'];
								$msg_date = $row['msg_date'];
							
						?>
						<ul>
							<?php  
								if ($user_name == $sender_username AND $username == $receiver_username) {
									echo "
										<li>
											<div class='rightside-right-chat'>
												<span>$user_name <small>$msg_date</small></span><br /><br />
												<p>$msg_content</p>
											</div>
										</li>
									";
								}

								else if ($user_name == $receiver_username AND $username == $sender_username) {
									echo "
										<li>
											<div class='rightside-left-chat'>
												<span>$username <small>$msg_date</small></span><br /><br />
												<p>$msg_content</p>
											</div>
										</li>
									";
								}
							?>
						</ul>
					<?php } ?>
					</div>
                    <div class="row">
					<div class="col-md-12 right-chat-textbox">
						<form method="POST">
							<!--<input type="text" name="msg_content" autocomplete="off" placeholder="Write Your Message...">-->
                            <textarea name="msg_content" id="body" cols="90" rows="3" placeholder="Message Here ..." autofocus maxlength="100"></textarea>
							<button class="btn" name="submit" style="background: green; color: white;"><i class="fa fa-telegram"></i>SEND</button>
						</form>
					</div>
				</div>
				</div>
				
			</div>
		</div>
	</div>

	<?php
		if (isset($_POST['submit'])) {
			$msg = htmlentities($_POST['msg_content']);

			if ($msg == "") {
				echo "
					<div class='alert alert-danger'>
						<strong><center>Type A Message</center></strong>
					</div>
				";
			}
			else if (strlen($msg) > 100) {
				echo "
					<div class='alert alert-danger'>
						<strong><center>Message is too long. Use 100 characters only.</center></strong>
					</div>
				";
			}
			else{
				$insert_msg = "INSERT INTO users_chat (sender_username, receiver_username, msg_content, msg_status, msg_date) VALUES ('$user_name', '$username', '$msg', 'unread', NOW())";
				$run_insert_msg = mysqli_query($con, $insert_msg);
				echo "<meta http-equiv=refresh content=0;url=chatApp.php?user_name=$username>";
			}
		}
	?>
	

	<script type="text/javascript">
		$('#scrolling-to-bottom').animate({
			scrollTop: $('#scrolling-to-bottom').get(0).scrollHeight}, 1000);
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			var height = $(window).height();
			$('.left-chat').css('height', (height - 92) + 'px');
			$('.right-header-contentChat').css('height', (height - 163) + 'px');
		});
	</script>

</body>
</html>
<?php } ?>
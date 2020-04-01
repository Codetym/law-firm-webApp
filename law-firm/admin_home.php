<?php
	require_once('includes/connection.php');
    session_start();
	
	if (!isset($_SESSION['user_email'])) {
		header("Location:officials.php");
	}
	else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Admin Section</title>
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
    <link rel="stylesheet" type="text/css" href="css/sign_up.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/dmj.css">
    <link rel="stylesheet" type="text/css" href="css/admin_home.css">
    <!--<script type="text/javascript" src="javascript/clickabletd.js"></script>-->
	<style>
        .alert alert-danger form-group{
            color: black;
        }
        span{
            color: whitesmoke;
            font-weight: bolder;
            font-size: 18px;
        }
        img{
            height: 75px;
            width:  75px;
        }
        a ,.logout{
            color: white;
        }
        .profile{
            color: blue;
        }
	</style>
</head>
<body>
        <nav>
			<ul class='horizontal-list' style="height: 32%;">
				<div class="alert" style="margin-top: 0; width: 100%; padding: 0; background-color: white;">
				<img src="images/logo.jpg" width="150px" height="80px" align="center" style="border-radius:100%;" />  
				<h1 align='left' style="color: blue; font-weight: bolder;">BROSH & CO. ADVOCATES COMMUNICATIONS SYSTEM</h1>
                </div>
					<li><a href="index.php"><b>HOME</b></a></li>
                     <li><a href="services.php"><b>OUR SERVICES</b></a></li>
					<li><a href="contact_us.php"><b>CONTACT US</b></a></li>
					<li><a href="forum.php"><b>FORUM</b></a></li>
					<li><a href="about-us.php"><b>ABOUT US</b></a></li>
					<li><a href="officials.php"><b>AUTHENTICATED AREA</b></a></li>
            </ul>
        </nav>
	<br /><br /><br /><br /><br /><br /><br />
	<br /><br /><br /><br /> 
        <div class="container">
            <div class="box"> 
                <div class="box-row">
                    <div class="box-cell box1">
                    <div class="form-header">
                        <h2>PROFILE</h2>
			         </div>
                        <div class="form-group">
                            <?php
                               include_once('includes/connection.php');
                                    $user = $_SESSION['user_email'];
                                    $get_user = "SELECT * FROM users WHERE user_email = '$user'";
                                    $run_user = mysqli_query($con, $get_user);
                                    $row = mysqli_fetch_array($run_user);

                                    $user_id = $row['user_id'];
                                    $user_name = $row['user_name'];
                                    $email = $row['user_email'];
                                    $profile_img = $row['user_profile'];
                                    $country = $row['user_country'];
                                    $gender = $row['user_gender'];
                                    
                                    echo
                                        "<div class='alert alert-warning form-group'>
                                            <div class='chat-left-img form-group'>
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               <img src='$profile_img'>
                                            </div><br><br><br>
                                            <div class='form-group'>
                                            Username: <span class='profile'>$user_name</span><br>
                                            Email: <span class='profile'>$email</span><br>
                                            Country: <span class='profile'>$country</span><br>
                                            Gender: <span class='profile'>$gender</span><br>
                                            </div>
                                        </div>";
                        ?>
                        </div>
                    </div> 
                    
                  <div class="box-cell box2">
                 <div class="form-header">
                    <h2>ADMIN CONTROL PANEL</h2>
                 </div>
                <center>                    
                <table>
                  <tr>
                    <th class="c1" id="clickable"><span class="fa fa-user-plus" id="icon"></span><br><a href="signup.php">Users</a></th>
                   <!-- <th class="c1"><span class="fa fa-user-plus" id="icon"></span><br>Add user</th>-->

                    <th class="c2"><img src="images/edit-users.jpg"><br><a href="lawyers.php">Manage Users</a></th>

                      <th class="c3" id="clickable"><span class="fa fa-legal" id="icon"></span><br><a href="lawyerToCase.php">Lawyer & Case</a></th>

                      <th class="c4"><span class="fa fa-cogs" id="icon"></span><br><a href="admin/edit-case.php">Edit Case</a></th>

                  </tr>
                  <tr>
                      <th class="c1"><span class="fa fa-plus-circle" id="icon"></span><br><a href="addCase.php">Add Case</a></th>

                      <th class="c2"><span class="fa fa-calendar" id="icon"></span><br><a href="check-appointments.php" style="text-decoration: none; display: block; position: relative;">Check Appointments</a></th>

                      <th class="c3"><span class="fa fa-cogs" id="icon"></span><br><a href="contact-msgs.php">Contact Messages</a></th>

                      <th class="c4"><span class="fa fa-comments" id="icon"></span><br><a href="chatApp.php">Chat App</a></th>
                  </tr>
                </table>
                </center> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
	<footer id = "footer"> 
          
    <!-- Company Details -->
    <!-- 1. Address  
         2. Contact Number 
         3. Enquiry Mail  
    -->
    <div class="company-details"> 
        <div class="row"> 
            <div id ="col1"> 
                <span id = "icon" class="fa fa-map-marker"></span> 
                    <div> 
					<p>Location:<br />
                    Plot 710-B<br />
					Nakawa Industrial Area 
                    <br />Sector-142<br />
					Ntinda Road</p>
					</div>
            </div> 
                  
            <div id ="col2"> 
                <span id="icon" class="fa fa-phone"></span> 
  
                <span> 
                    Telephone<br /> +256751676107 <br /> +256791093369
                </span> 
            </div> 
                      
            <div id ="col3"> 
                <span id="icon" class="fa fa-envelope"></span> 
                <span>info@brosh.org</span> 
            </div> 
        </div> 
    </div> 
              
     <!-- Copyright Section -->
    <div class="copyright"> 
        <p>©  All rights reserved | Brosh & Co Advocates.</p> 
      
       <div class="contact"> 
            <li> 
                <a href="https://www.twitter.com/">
                    <span class="fa fa-twitter" id="icon">&nbsp;</span>
                </a> 
            </li> 
              
            <li> 
                <a href="https://www.facebook.com/"> 
                    <span class="fa fa-facebook" id="icon">&nbsp;</span> 
                </a> 
            </li> 
              
            <li> 
                <a href="https://www.instagram.com/"> 
                    <span class="fa fa-instagram"  id="icon">&nbsp;</span> 
                </a> 
            </li>
           
           <li> 
                <a href="https://www.whatsapp.com/"> 
                    <span class="fa fa-whatsapp" id="icon">&nbsp;</span> 
                </a> 
            </li>
           
           <li> 
                <a href="https://www.youtube.com/"> 
                    <span class="fa fa-youtube" id="icon">&nbsp;</span> 
                </a> 
            </li> 
           
           <li> 
                <a href="#"> 
                    <span class="fa fa-rss-square fa-5x" id="icon">&nbsp;</span> 
                </a> 
            </li> 
        </div>
    </div> 
</footer>
</body>
</html>
<?php } ?>
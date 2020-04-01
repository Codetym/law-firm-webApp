<?php
	session_start();
	require_once('includes/connection.php');
	//include_once('includes/header.php');
	//require_once('includes/find_friends_function.php');
	
	if (!isset($_SESSION['user_email'])) {
		header("Location:officials.php");
	}
	else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Users Control Panel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="../jquery3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=roboto[Courgette]Pacificio:400,700">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/sign_up.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" type="text/css" href="css/dmj.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<!--<link rel="stylesheet" type="text/css" href="css/dmj.css">-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin_home.css">
	<style>
        body{
            background-color: bisque;
        }
        .inner{
            margin-left: 0;
            width: 70%;
        }
        .container{
            align-content: center;
        }
        .table{
            text-align: center;
        }
        table{
            border: 0;
            padding: 18px;
        }
        a{
            font-weight: bolder;
            color: white;
            text-decoration: none;
        }
        i{
            font-size: 2em;
        }
        .profile{
            color: blue;
        }
        h2{
            color: gold
        }
	</style>
</head>
<body>
        <nav>
			<ul class='horizontal-list' style="height: 32%;">
                <div style="background-color: white">
				<img src="images/logo.jpg" width="150px" height="80px" align="center" style="border-radius:100%;" />  
				<h1 align='left' style="color: blue;">BROSH & CO ADVOCATES COMMINICATIONS SYSTEM</h1>
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
	<br /><br /><br /><br /><br />
	<!--<h1>User Control Panel</h1>--> 
    <div class="container alert alert-danger" style="">
        <div class="form-header">
            <h1 style="color: white;">USER CONTROL PANEL</h1>
        </div>
        <div class="inner">
            <table>
                <tr>
                    <th rowspan="3">
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
                                    
                                   
                                    echo "
                                        <div class='list-group'>
                                            <a href='#' class='list-group-item list-group-item-action'><h2 style='font-weight: bolder;'>User Profile</h2></a>
                                            <a href='#' class='list-group-item list-group-item-action list-group-item-success'><div class='chat-left-img form-group'>
                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                               <img src='$profile_img'>
                                            </div><br><br><br></a>
                                            <a href='#' class='list-group-item list-group-item-action list-group-item-success'>Username | $user_name</a>
                                            <a href='#' class='list-group-item list-group-item-action list-group-item-success'>Email | $email</a>
                                            <a href='#' class='list-group-item list-group-item-action list-group-item-success'>Country | $country</a>
                                            <a href='#' class='list-group-item list-group-item-action list-group-item-success'>Gender | $gender</a>
                                    ";
                                ?>
                        </div>
                    </th>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-primary btn-block btn-lg"><a href="appointments.php"><i class="fa fa-calendar" style="font-size: 3em;"></i>&nbsp;&nbsp;BOOK APPOINTMENT</a></button>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-block btn-lg"><a><i style="font-size: 3em;"></i>&nbsp;&nbsp;Book Appointment</a></button>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-block btn-lg"><a><i style="font-size: 3em;"></i>&nbsp;&nbsp;Book Appointment</a></button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-primary btn-block btn-lg"><a href="chatApp.php"><i class="fa fa-comments" style="font-size: 3em;"></i>&nbsp;&nbsp;CHAT APP</a></button>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-block btn-lg"><a href="account_settings.php"><i class="fa fa-cogs" style="font-size: 3em;"></i>&nbsp;&nbsp;ACCOUNT SETTINGS</a></button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-block btn-lg"><a><i class="fa fa-exit" style="font-size: 3em;"></i>&nbsp;&nbsp;LOGOUT</a></button>
                    </td>
                </tr>
            </table>
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
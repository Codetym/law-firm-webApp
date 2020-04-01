<?php 
	//require_once('includes/appointment-process.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Appointments</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ckeditor -->
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
	<!--<link rel="stylesheet" type="text/css" href="css/home.css">-->
    <link rel="stylesheet" type="text/css" href="css/sign_in.css">
    <link rel="stylesheet" type="text/css" href="css/dmj.css">
    
    <style> 
            h1 { 
                text-align:center; 
                color:blue;
                font-weight: bolder;
            } 
            body { 
                width:100%; 
            }
            
             ol li {
            padding: 30px;
            font-size: 18px;
        }
        
        .copyright{
            align-content: center;
        }
        
            .container .box { 
                width:100%; 
                margin:0px; 
                display:table; 
            } 
            .container .box .box-row { 
                display:table-row; 
            } 
            .container .box .box-cell { 
                display:table-cell; 
                width:50%; 
                padding:30px; 
            } 
            .container .box .box-cell.box1 { 
                background:green; 
                color:white; 
                text-align:justify; 
             } 
            .container .box .box-cell.box2 { 
                background:lightgreen; 
                text-align:justify 
            }
			.form-header{
				padding: 0;
				border-radius: 22px;
                font-weight: bolder;
			}
        label{
            font-weight: bolder;
            color: black;
        }
        .ok{
            font-weight: bolder;
            color: white;
        }
        .alert{
            width: 50%;
            margin-left: 25px;
        }
        .btn-sm{
            margin-left: 50%;
            font-weight: bolder;
        }
        label{
            font-size: 20px;
        }
        </style> 
</head>
<body>
    <nav>
			<ul class='horizontal-list' style="height: 32%;">
                <div class="alert" style="margin-top: 0; width: 100%; padding: 0; background-color: white;">
				<img src="images/logo.jpg" width="150px" height="80px" align="center" style="border-radius:100%;" />  
				<h1 align='left'>BROSH &  CO ADVOCATES</h1>
                </div>
					<li><a href="index.php"><b>HOME</b></a></li>
                    <li><a href="services.php" class="active"><b>OUR SERVICES</b></a></li>
					<li><a href="contact_us.php"><b>CONTACT US</b></a></li>
					<li><a href="forum.php"><b>FORUM</b></a></li>
					<li><a href="about-us.php"><b>ABOUT US</b></a></li>
					<li><a href="officials.php"><b>AUTHENTICATED AREA</b></a></li>
            </ul>
        </nav>
	<br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br /><br>
	
    <div class="container"> 
            <div class="box"> 
                <div class="box-row"> 
                    <div class="box-cell box1" style="padding: 10px; background: #f0f0f0;"> 
                <div class="signup-form">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="broshForm">

        <div class="form-header">
            <h2>Book Your Appointment With Us</h2>
            <h4>You Must Be A Client to Book Online</h4>
        </div>
        <div>
            <?php include_once('includes/appointment-process.php'); ?>
        </div>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" placeholder="Nabwami Catherine" required autocomplete="on">
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="example@site.com" required autocomplete="on">
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="phone" name="phone" class="form-control" placeholder="Phone Number" required autocomplete="on">
        </div>



        <div class="form-group">
            <label>Date Of Appointment</label>
            <input type="date" name="appointment_date" class="form-control" placeholder="DD/MM/YYYY" required autocomplete="on">
        </div>
		
		
        </div>

            </div> 
            <div class="box-cell box2" style="padding: 10px;">
                <div class="form-header">
                    <h2>We'll Get Back To You ASAP</h2>
                    <h4>Visit Our Offices to Become Our Client</h4>
                </div>
                
            <div class="form-group">
                <label>Time Of Appointment</label>
                <input type="time" name="appointment_time" class="form-control" placeholder="HRS:MINS" required autocomplete="on">
        </div>
				
            <div class="form-group">
        <label>Choose Specialist</label>
        <select class="form-control" name="specialist" required >
            <option disabled="">Select A Specialist</option>
            <option>Criminal Lawyer</option>
            <option>Immigration Lawyer</option>
            <option>Estate Planning Lawyer</option>
            <option>Bankruptcy Lawyer</option>
            <option>Intellectual Property Lawyer</option>
            <option>Coporate Lawyer</option>
            <option>Personal Injury Lawyer</option>
        </select>
    </div>

    <div class="form-group">
        <label>Choose Office</label>
        <select class="form-control" name="office" required >
            <option disabled="">Select Office</option>
            <option>Kampala</option>
            <option>Gulu</option>
            <option>Mbale</option>
            <option>Mbarara</option>
            <option>Kisoro</option>
            <option>Kasese</option>
            <option>West Nile</option>
        </select>
    </div>

    <div class="form-group">
        <label>Gender</label>
        <select class="form-control" name="gender" required >
            <option disabled="">Select Gender</option>
            <option>Female</option>
            <option>Male</option>
            <option>Other</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit" value="submit">SEND</button>
    </div> 
    

</form>
            </div> 
        </div> 
    </div> 
</div> 

    <div class="alert alert-danger" style="text-align:center; width: 74%; margin-left: 13%;">
        <p style="font-weight: bolder; font-size: 16px;">You Need To Be Our Client To Book Appointments With Us.Contact Us On How To Become Our Client.</p>
    </div>
	

<footer id = "footer">
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
    <script type="text/javascript" src="javascript/formValidations.js"></script>
</body>
</html>
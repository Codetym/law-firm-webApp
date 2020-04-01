<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require_once('includes/connection.php');
    session_start();
	
	if (!isset($_SESSION['user_email'])) {
		header("Location:officials.php");
	}
	else {
?>
<html>
    <head>
        <title>Add Case</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/dmj.css">
    <link rel="stylesheet" type="text/css" href="css/sign_in.css">
        <style>
            .signin-form{
                width: 80%;
                margin: 10%;
            }
            input, select{
                margin-left: 30px;
                width: 30%;
            }
            textarea, button{
                margin-left: 30%;
                width: 20%;
            }
            .form-group short{
                width: 50%;
                margin-left: 25%;
            }
        </style>
    </head>
    <body>
        <nav>
			<ul class='horizontal-list' style="height: 32%;">
				<div class="alert" style="margin-top: 0; width: 100%; padding: 0; background-color: white;">
				<img src="images/logo.jpg" width="200px" height="80px" align="center" style="border-radius:100%;" />  
				<h1 align='left' style="color: blue;">BROSH & CO ADVOCATES COMMUNICATIONS SYSTEM</h1>
                </div>
					<li><a href="index.php"><b>HOME</b></a></li>
                    <li><a href="services.php"><b>OUR SERVICES</b></a></li>
					<li><a href="contact_us.php"><b>CONTACT US</b></a></li>
					<li><a href="forum.php"><b>FORUM</b></a></li>
					<li><a href="about-us.php"><b>ABOUT US</b></a></li>
					<li><a href="officials.php"><b>AUTHENTICATED AREA</b></a></li>
            </ul>
        </nav>
        <br><br><br><br><br><br><br>
         <div class="signin-form" style="margin-top: 40px; position: relative;">

			<div class="form-header">
				<h2>REGISTER CASE</h2>
			</div>
             <div>
                <h3>Plentiff Details</h3>
            </div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="broshForm" id="broshForm1" class="form-inline">

			<div class="form-group">
                
				<input type="text" name="sname" class="form-control" placeholder="Surname(Plentiff)" autocomplete="on" id="psname">
                <span class="error">* <?php echo $nameErr; ?></span>
                <input type="text" name="poname" class="form-control" placeholder="Other Names(Plentiff)" autocomplete="on" id="oname">
                <span class="error">* <?php echo $onameErr; ?></span>
                
                <input type="email" name="email" class="form-control" placeholder="Email Address" autocomplete="on" id="email">
                <span class="error">* <?php echo $emailErr; ?></span>
                
                <select class="form-control" name="gender" required >
                    <option disabled="">Select Gender</option>
                    <option>Female</option>
                    <option>Male</option>
                    <option>Other</option>
                </select>
                <span class="error">* <?php echo $genderErr; ?></span>
            </div>
        </form>
             <div>
                <h3>Defendant Details</h3>
            </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="broshForm" id="broshForm2" class="form-inline">

			<div class="form-group">
                
				<input type="text" name="dsname" class="form-control" placeholder="Surname(Defendant)" autocomplete="on" id="dsname">
                <span class="error">* <?php echo $nameErr1; ?></span>
                
                <input type="text" name="doname" class="form-control" placeholder="Other Names(Defendant)" autocomplete="on" id="oname">
                <span class="error">* <?php echo $onameErr1; ?></span>
                
                <input type="email" name="email1" class="form-control" placeholder="Email Address" autocomplete="on" id="email1">
                <span class="error">* <?php echo $emailErr1; ?></span>
                
                <select class="form-control" name="gender" required >
                    <option disabled="">Select Gender</option>
                    <option>Female</option>
                    <option>Male</option>
                    <option>Other</option>
                </select>
                <span class="error">* <?php echo $genderErr1; ?></span>
                
            </div>
        </form>
            <div>
                <h3>Other Details</h3>
            </div> 
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="broshForm" id="broshForm3" class="form-inline">
            <div class="form-group">
                <input type="date" name="date" class="form-control" placeholder="MM/DD/YYYY" autocomplete="on" id="date">
                <span class="error">* <?php echo $dateErr;?></span>
                
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
        <span class="error">* <?php echo $lawyerErr;?></span>
          
            <input type="phone" name="phone" class="form-control" placeholder="Phone Number" autocomplete="on" id="phone">
            <span class="error">* <?php echo $phoneErr;?></span>
        </div>
        </form>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="broshForm" id="broshForm4" class="">
			<div class="form-group short" style="width: 50%; margin-left: 15%;">
               <textarea class="form-control" placeholder="Case Description" name="case_desc"></textarea>
			</div>
            <span class="error">* <?php echo $caseErr;?></span>
            
            <div class="form-group short" style="width: 50%; margin-left: 15%;">
                <button class="btn btn-primary btn-lg btn-block" name="submit" onclick="submitForms();">REGISTER CASE</button>
			</div>
		</form>
             <?php
                include_once('includes/addCase-process.php');
             ?>
	</div>
        
    </body>
</html>
<?php } ?>
<?php
include_once('functions.php'); 
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: officials.php');
}

	if (isset($_GET['edit'])) {
		$email = $_GET['edit'];
		$update = true;
		$query = mysqli_query($db, "SELECT username, email, user_type FROM users WHERE email= '$email'");

		if (count($query) == 1 ) {
			$n = mysqli_fetch_array($query);
			$username = $n['username'];
			$email = $n['email'];
			$user_type = $n['user_type'];
		}
	}

//include('server.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: officials.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: officials.php");
}

//update user info 

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$user_type = $_POST['user_type'];

	mysqli_query($db, "UPDATE users SET username='$username', email='$email', user_type='$user_type' WHERE id=$id");
	$_SESSION['message'] = "Information updated!"; 
	header('location: manage-users.php');
}
//deleting records
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM users WHERE id=$id");
	$_SESSION['message'] = "User deleted!"; 
	header('location: manage-users.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Users</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="dmj.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<style type="text/css">
			table{
    width: 60%;
    margin: 10px auto;
    border-collapse: collapse;
    text-align: left;
    padding: 10px;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 100px;
    padding: 10px;
}
tr:hover {
    background: #F5F5F5;
	color: black;
}
			
		</style>
</head>
<body>
	<table align="center">
			<ul class='horizontal-list'>
				<img src="images/broshLogo.jpg" width="150px" height="80px" align="center" style="border-radius:100%;" />  
				<h1 align='left'>BROSH &  CO ADVOCATES</h1>
					<li><a href="index.php"><b>HOME</b></a></li>
                <li><a href="appointments.php"><b>APPOINTMENTS</b></a></li>
					<li><a href="officials.php"><b>FIRM OFFICIALS ONLY</b></a></li>
					<li><a href="contact_us.php"><b>CONTACT US</b></a></li>
					<li><a href="forum.php"><b>FORUM</b></a></li>
					<li><a href="about-us.php"><b>ABOUT US</b></a></li>
					
	</table>
	</div>
	<br /><br /><br /><br /><br /><br /><br />
	<br /><br /><br /><br /><br /><br /><br />


<?php $results = mysqli_query($db, "SELECT username, email, user_type FROM users"); ?>

<table>
	<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>User-Type</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['user_type']; ?></td>
			<td>
				<a href="manage-users.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="manage-users.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form>
	<input type='hidden' name='id' value='<?php echo $id; ?>'>

	<input type='text' name='username' value='<?php echo $username; ?>' placeholder="Username">
	<br />
	<br />
	<input type='text' name='email' value='<?php echo $email; ?>' placeholder="Email">
	<br />
	<br />
	<input type='text' name='user_type' value='<?php echo $user_type; ?>' placeholder="User-Type">
	<br />
	<br />
	<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
</form>

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
      
       <!-- <ul class="contact"> 
            <li> 
                <a href="#" class="fa fa-twitter"> 
                    <span>Twitter</span> 
                </a> 
            </li> 
              
            <li> 
                <a href="#" class="fa fa-facebook"> 
                    <span></span> 
                </a> 
            </li> 
              
            <li> 
                <a href="#" class="fa fa-rss"> 
                    <span>Pinterest</span> 
                </a> 
            </li> 
        </ul> -->
    </div> 
</footer>
</body>
</html>
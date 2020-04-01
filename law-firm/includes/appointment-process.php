<?php
    //require_once('includes/connection.php');
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
    $server = 'localhost';
    $user   = 'root';
    $pass   = '';
    $db     = 'dmj_db';
    $con   = mysqli_connect($server, $user, $pass, $db);
    
    if(!$con){
        echo "
        <div class='alert alert-danger'>Something Is Seriously Wrong</div>
        ";
    }
    else{
         //global $con;
    $errors     = array();
    
    if(isset($_POST['submit'])){
        //escaping form input before storage in db
        $now       = new DateTime();
        $fname	 =       htmlentities($_POST['full_name']);
        $phone	=        htmlentities($_POST['phone']);
        $appDate	=    htmlentities($_POST['appointment_date']);
        $appTime   =    htmlentities($_POST['appointment_time']);
        $email  =          htmlentities($_POST['email']);
        $gender =         htmlentities($_POST['gender']);
        $specialist= htmlentities($_POST['specialist']);
        $office = htmlentities($_POST['office']);
        
        if(empty($fname) || empty($phone) || empty($appDate) || empty($appTime) || empty($email) || empty($office) || empty($specialist) || empty($gender)){
            echo "<div class='alert alert-danger'>
                <b>All Fields Are Required!</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(strlen($email) > 25 || strlen($fname) > 30){
            echo "<div class='alert alert-danger'>
                <b>Either Email Or Name is Too Long!</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(strlen($phone) > 10){
            echo "<div class='alert alert-danger'>
                <b>Phone Digits Can Only Be 10!</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(!preg_match('/^[a-zA-Z]/', $_POST['full_name'])){
            echo "<div class='alert alert-danger'>
               <b> Name Must Contain Letters Only!</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(!preg_match('/^[0-9]+$/', $_POST['phone'])){
            echo "<div class='alert alert-danger'>
                <b>Phone Number Must Contain Digits Only!</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(strlen($msg) > 255){
             echo "<div class='alert alert-danger'>
                <b>Message Can Only Contain 254 Characters!</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
            </div>";
            exit();
            
        }
        
        
        //$user_date = DateTime::createFromFormat('m/d/Y', $userDate);
        if ($appDate > $now){ 
            echo "<div class='alert alert-danger'>
                <b>You Can't Book For An Appointment In The Past!</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if ($appTime <= 8 || $appTime >= 17){ 
            echo "<div class='alert alert-danger'>
                <b>You Cannot Place An Appointment On Non-working Hours!</b><br>
                <b>Working Hours: 8:00 Hrs - 17:00 Hrs</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
       if(empty($errors)){ 
                //inserting into the db tbl appointments
            $insert = "INSERT INTO appointments (full_name, phone, appointment_date, appointment_time, specialist, office, gender, email, today) VALUES ('$fname', '$phone', '$appDate', '$appTime', '$specialist', '$office', '$gender', '$email', NOW())";
            $query = mysqli_query($con, $insert);
           
           if ($query) {
               echo "<div class='alert alert-success'>
                <b>Congragulations $fname! Your Appointment Has Been Placed</b><br>
                <b>You Will Get A Message From The Admin Soon.</b><br>
                <b>Thank You For Letting Us Represent You!</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
                </div>";
                exit();
            }
            else{
                echo "<div class='alert alert-success'>
                <b>The System is Temporarily down</b><br>
                <b>We are Working on Solving it ASAP!</b><br>
                <button class='btn btn-primary btn-sm'><a href='appointments.php' class='ok'>OK</a></button>
                </div>";
                exit();
        }
        mysqli_close($con);
        }
        
        else{
            foreach($errors as $error){
                echo'<p><strong'.$error.'</strong></p>';
            }
        }
    }
   
        
        
        
}
?>
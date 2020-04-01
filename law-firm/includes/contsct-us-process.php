<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    require_once('connection.php');
    global $con;
    
    
    $errors     = array();
    
                
    
    if(isset($_POST['submit'])){
        $time   = time();
        $name  =   htmlentities(mysqli_escape_string($con, $_POST['name']));
        $phone    =   htmlentities(mysqli_escape_string($con, $_POST['phone']));
        $email  =   htmlentities(mysqli_escape_string($con, $_POST['email']));
        $msg    =   htmlentities(mysqli_escape_string($con, $_POST['msg']));
        
        if(empty($email) || empty($msg) || empty($phone) || empty($name)){
         /* echo "<script>
                    alert('All Fields Are Required!');
                </script>";
            echo "<script>window.open('contact_us.php', '_self')</script>";*/
            echo "<div class='alert alert-danger'>
                <b>All Fields Are Required!</b><br>
                <button class='btn btn-primary btn-sm'><a href='contact_us.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(strlen($email) > 25 || strlen($name) > 20){
            echo "<div class='alert alert-danger'>
                <b>Either Email Or Name is Too Long!</b><br>
                <button class='btn btn-primary btn-sm'><a href='contact_us.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(strlen($phone) > 25){
            echo "<div class='alert alert-danger'>
                <b>Phone Digits Can Only Be 10!</b><br>
                <button class='btn btn-primary btn-sm'><a href='contact_us.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(!preg_match('/^[a-zA-Z]/', $_POST['name'])){
            echo "<div class='alert alert-danger'>
                <b>Name Must Contain Letters Only!</b><br>
                <button class='btn btn-primary btn-sm'><a href='contact_us.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(!preg_match('/^[0-9]+$/', $_POST['phone'])){
            echo "<div class='alert alert-danger'>
                <b>Phone Number Must Contain Digits Only!</b><br>
                <button class='btn btn-primary btn-sm'><a href='contact_us.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(strlen($msg) > 255){
             echo "<div class='alert alert-danger'>
                <b>Message Can Only Contain 254 Characters!</b><br>
                <button class='btn btn-primary btn-sm'><a href='contact_us.php' class='ok'>OK</a></button>
            </div>";
            exit();
        }
        
        if(empty($errors)){
            $sql = "INSERT INTO contacts (posted_at, name, email, phone, msg) VALUES (NOW(),'$name', '$email', '$phone', '$msg')";
            
            $exec = mysqli_query($con, $sql);
            if($exec){
                echo "<div class='alert alert-success'>
                    <strong>Thank You For Contacting Us!<br>We Shall Get Back To You Shortly.</strong><br>
                    <button class='btn btn-primary btn-sm'><a href='contact_us.php' class='ok'>OK</a></button>
                 </div>";
                exit();
                
                
            }
            else{
                foreach($errors as $error){
                echo'<p><strong'.$error.'</strong></p>';
            }
        }
            
            mysqli_close($con);
        }
        
    }

?>